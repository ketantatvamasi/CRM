<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_m', 'user_m');
        $this->load->model('Role_m', 'role_m');
    }

    public function index()
    {
        user_is_logged_in();
        $session = $this->session->userdata();
        $userPermissionArr = $session['permission'];
        if (!in_array(1, $userPermissionArr)) {
            return $this->error();
        }
        $session = $this->session->userdata['company_id'];
        $this->data['site_title'] = ucfirst('User');
        $this->data['template_css'] = $this->load_grid_css('add');
        $this->data['template_js'] = $this->load_grid_js('user');
        $this->data['record']['permission'] = $this->role_m->getPermission();
        $this->data['record']['role_list'] = $this->common_m->get_common_master('role', array("id", "role_name"), array("company_id" => $session), "role_name ASC");
        $this->render_page($this->data['sitename_folder'] . 'user_v', $this->data);
    }

    public function UserList()
    {
        if (!$this->input->is_ajax_request()) {
            $this->error();
            return false;
        }
        $records = $this->user_m->get_datatables();

        $data = array();
        $no = 0;
        foreach ($records as $record) {
            $no++;
            $data[] = array(
                "id" =>  $no,
                "user_id" => $record->user_id,
                "organization_name" => $record->organization_name,
                "firstname" => $record->firstname,
                "role_name" => $record->role_name,
                "email" => $record->email,
                "phone" => $record->phone,
                "status" => $record->status,
            );
        }

        $output = array(
            // "draw" => $_POST['draw'],
            "recordsTotal" => $this->user_m->count_all(),
            // "recordsFiltered" => $this->user_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function adduser()
    {
        if (!$this->input->is_ajax_request()) {
            $this->error();
            return false;
        }
        $data = $this->input->post();
        $userdata = array(
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'organization_name' => $data['organization_name'],
            'email' => $data['email'], 'phone' => $data['phone'],
            'address' => $data['address'],
            'pincode' => $data['pincode'],
            'password' => $data['password'],
            'city' => $data['city'],
            'state' => $data['state'],
            'country' => $data['country']
        );
        $permissions = $data['permissions'];

        if ($data['user_id'] == "") {
            $userdata['parent_id'] = $_SESSION['user_id'];

            $this->db->trans_begin();
            $user_id = $this->common_m->last_insert_id('users', $userdata);
            if ($this->session->userdata('user_id') != 1) {
                $userdata['company_id'] = $this->session->userdata('company_id');
            } else {
                $userdata['company_id'] = $user_id;
            }
            $this->common_m->update_record('users', $userdata, array('user_id' => $user_id));
            foreach ($permissions as  $key => $value) {
                $roledata[$key]['permission_id'] = $value;
                $roledata[$key]['role_id'] = $data['role_id'];
                $roledata[$key]['user_id'] = $user_id;
            }
            $result = $this->common_m->multiple_insert_batch('user_role_permission', $roledata);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
            }
        } else {

            $this->db->trans_begin();
            $this->common_m->update_record('users', $userdata, array('user_id' => $data['user_id']));
            foreach ($permissions as  $key => $value) {
                $roledata[$key]['permission_id'] = $value;
                $roledata[$key]['role_id'] = $data['role_id'];
                $roledata[$key]['user_id'] = $data['user_id'];
            }
            $this->common_m->delete_record('user_role_permission', array('user_id' => $data['user_id']));
            $result = $this->common_m->multiple_insert_batch('user_role_permission', $roledata);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
            }
        }
        $dt['response'] = $result;
        echo json_encode($dt);
    }
    public function edituser()
    {
        if (!$this->input->is_ajax_request()) {
            $this->error();
            return false;
        }
        $data = $this->input->post();
        $result = $this->common_m->edit_id(array('*'), 'users', array('user_id' => $data['user_id']));
        $result->roledata = $this->common_m->get_common_master('user_role_permission', array('*'), array("user_id" => $data['user_id']), null);
        echo json_encode($result);
    }
    public function deleteuser()
    {
        if (!$this->input->is_ajax_request()) {
            $this->error();
            return false;
        }
        $user_id = $this->input->post('user_id');
        $this->common_m->delete_record('user_role_permission', array('user_id' => $user_id));
        $this->common_m->delete_record('users', array("user_id" => $user_id));
        $data['response'] = "success";
        echo json_encode($data);
    }
}
