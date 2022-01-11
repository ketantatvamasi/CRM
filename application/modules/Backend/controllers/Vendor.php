<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendor extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vendor_m', 'vendor_m');
    }

    public function index()
    {
        user_is_logged_in();
        $this->data['site_title'] = ucfirst('Vendor');
        $this->data['template_css'] = $this->load_grid_css('add');
        $this->data['template_js'] = $this->load_grid_js('vendor');
        $this->render_page($this->data['sitename_folder'] . 'vendor_v', $this->data);
    }

    public function vendorList()
    {
        $records = $this->vendor_m->get_datatables();
        $data = array();
        $no = 0;
        foreach ($records as $record) {
            $no++;
            $data[] = array(
                "number" =>  $no,
                "id" => $record->id,
                "company_name" => $record->company_name,
                "contact_person_name" => $record->contact_person_name,
                "email" => $record->email,
                "mobile_main" => $record->mobile_main,
                "code" => $record->code,
                "country" => $record->country,
                "status" => $record->status,
                "created_at" => date('d-m-Y H:i:s', strtotime($record->created_at))
            );
        }
        $output = array(
            // "draw" => $_POST['draw'],
            "recordsTotal" => $this->vendor_m->count_all(),
            "recordsFiltered" => $this->vendor_m->count_filtered(),
            "data" => $data,
        );

        //output to json format
        echo json_encode($output);
    }

    public function addVendor()
    {
        $data = $this->input->post();

        if ($data['id'] == "") {
            $data['user_id'] = $_SESSION['user_id'];
            if ($_SESSION['role_id'] == 2) {
                $data['parent_id'] = $_SESSION['user_id'];
            } else {
                $data['parent_id'] = $_SESSION['parent_id'];
            }
            $data['status']=1;
            // echo "<pre>";
            // print_r($data);
            // exit;
            $result = $this->common_m->insert_record('vendors', $data);
        } else {
            // $udata = array('name' => $data['name'], 'organization_name' => $data['organization_name'], 'email' => $data['email'], 'contact' => $data['contact'], 'address' => $data['address'], 'pincode' => $data['pincode']);
            $result = $this->common_m->update_record('vendors', $data, array('id' => $data['id']));
        }

        $rsp['response'] = $result;
        echo json_encode($rsp);
    }

    public function editVendor()
    {
        $data = $this->input->post();
        $result = $this->common_m->edit_id(array('*'), 'vendors', array('id' => $data['id']));
        echo json_encode($result);
    }

    public function deleteVendor(){
        $data = $this->input->post();
        $result=$this->common_m->delete_record('vendors', array('id' => $data['id']));
        $rsp['response'] = $result;
        echo json_encode($rsp);
    }
}
