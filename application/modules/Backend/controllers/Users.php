<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_m','user_m');
        $this->load->model('Common_m','common_m');
    }

    public function index()
    {
        user_is_logged_in();
        $this->data['site_title'] = ucfirst('User');
        $this->data['template_css'] = $this->load_grid_css('add');
        $this->data['template_js'] = $this->load_grid_js('user');
        $this->render_page($this->data['sitename_folder'] . 'user_v', $this->data);
    }

    public function UserList()
    {
        $records = $this->user_m->get_datatables();

        $data = array();
        $no = 0;
        foreach ($records as $record) {
            $no++;
            $data[] = array(
                "id" =>  $no,
                "user_id"=> $record->user_id,
                "organization_name" => $record->organization_name,
                "firstname" => $record->firstname,
                "role_name" =>$record->role_name,
                "email" => $record->email,
                "phone" => $record->phone,
                "status" => $record->status,
            );
        }


        $output = array(
            // "draw" => $_POST['draw'],
            "recordsTotal" => $this->user_m->count_all(),
            "recordsFiltered" => $this->user_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
    public function adduser()
    {
        $data = $this->input->post();
        if ($data['user_id'] == "") {
            $data['parent_id'] = $_SESSION['user_id'];
            if ($_SESSION['role_id'] == 1) {
                $data['role_id'] = 2;
            } else {
                $data['role_id'] = 3;
            }
            $result = $this->common_m->insert_record('users', $data);
        } 
        else {
            $udata = array('firstname' => $data['firstname'],'lastname' => $data['lastname'], 'organization_name' => $data['organization_name'], 'email' => $data['email'], 'phone' => $data['phone'], 'address' => $data['address'], 'pincode' => $data['pincode'],'password'=>$data['password'],'city' => $data['city'],'state'=> $data['state'],'country'=>$data['country'],);
            $result = $this->common_m->update_record('users', $udata, array('user_id' => $data['user_id']));
        }
        $dt['response'] = $result;
        echo json_encode($dt);
    }
    public function edituser()
    {
        $data = $this->input->post();
        $result = $this->common_m->edit_id(array('*'), 'users', array('user_id' => $data['user_id']));
        echo json_encode($result);
    }
    public function deleteuser(){
        $user_id = $this->input->post('user_id');
        $this->common_m->delete_record('users', array("user_id" => $user_id));
        $data['response'] = "success";
        echo json_encode($data);
    }
}
