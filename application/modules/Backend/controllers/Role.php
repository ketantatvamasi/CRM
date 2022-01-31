<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Role_m', 'role_m');
    }

    public function index()
    {
        user_is_logged_in();
        $this->data['site_title'] = ucfirst('Role');
        $this->data['template_js'] = $this->load_grid_js('role');
        $this->render_page($this->data['sitename_folder'] . 'role_v', $this->data);
    }
    public function roleList()
    {
        if (!$this->input->is_ajax_request()) {
            $this->error();
            return false;
        }
        $records = $this->role_m->get_datatables();

        $data = array();
        $no = 0;
        foreach ($records as $record) {
            $no++;
            $data[] = array(
                "id" =>  $no,
                "role_name" => $record->role_name
            );
        }


        $output = array(
            // "draw" => $_POST['draw'],
            "recordsTotal" => $this->role_m->count_all(),
            "recordsFiltered" => $this->role_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function addRole()
    {
        $input = $this->input->post();
        $roleInput = array(
            "role_name" => $input['role_name'],
            "company_id" => $this->session->userdata('company_id')
        );
        $role_permissoin = array();

        $this->db->trans_begin();
        $role_id = $this->common_m->last_insert_id('role', $roleInput);

        foreach ($input['permissions'] as $key => $value) {
            $role_permissoin[$key] = ['role_id' => $role_id, 'permission_id' => $value];
        }
        $result = $this->common_m->multiple_insert_batch('role_permission', $role_permissoin);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
        redirect('backend/role');
    }
}
