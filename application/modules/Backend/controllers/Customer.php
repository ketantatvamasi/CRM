<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_m', 'customer_m');
    }

    public function index()
    {
        user_is_logged_in();
        $this->data['site_title'] = ucfirst('customer');
        $this->data['template_css'] = $this->load_grid_css('add');
        $this->data['template_js'] = $this->load_grid_js('customer');
        $this->render_page($this->data['sitename_folder'] . 'customer_v', $this->data);
    }
    public function customerList()
    {
        if (!$this->input->is_ajax_request()) {
            $this->error();
            return false;
        }
        $records = $this->customer_m->get_datatables();
        $data = array();
        $no = 0;
        foreach ($records as $record) {
            $no++;
            $data[] = array(
                "number" =>  $no,
                "id" => $record->id,
                "customer_name" => $record->customer_name,
                "customer_category" => $record->customer_category,
                "email" => $record->email,
                "mobile_main" => $record->mobile_main,
                "gst_no" => $record->gst_no,
                "address" => $record->address,
                "status" => $record->status
            );
        }
        $output = array(
            // "draw" => $_POST['draw'],
            "recordsTotal" => $this->customer_m->count_all(),
            "recordsFiltered" => $this->customer_m->count_filtered(),
            "data" => $data,
        );

        //output to json format
        echo json_encode($output);
    }
    public function addCustomer()
    {
        if (!$this->input->is_ajax_request()) {
            $this->error();
            return false;
        }
        $data = $this->input->post();

        if ($data['id'] == "") {
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[customers.email]');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'required');
        }

        if (!$this->form_validation->run()) {

            $errors['email'] = form_error('email');
            return $this->output
                ->set_content_type('application/json')
                // ->set_status_header(407)
                ->set_output(json_encode($errors));
        }

        if ($data['id'] == "") {
            $data['user_id'] = $_SESSION['user_id'];
            $data['company_id'] = $_SESSION['company_id'];
            $data['status'] = 0;
            
            $result = $this->common_m->insert_record('customers', $data);
        } else {
            // $udata = array('name' => $data['name'], 'organization_name' => $data['organization_name'], 'email' => $data['email'], 'contact' => $data['contact'], 'address' => $data['address'], 'pincode' => $data['pincode']);
            $result = $this->common_m->update_record('customers', $data, array('id' => $data['id']));
        }

        $rsp['response'] = $result;
        echo json_encode($rsp);
    }
    public function editCustomer()
    {
        if (!$this->input->is_ajax_request()) {
            $this->error();
            return false;
        }
        $data = $this->input->post();
        $result = $this->common_m->edit_id(array('*'), 'customers', array('id' => $data['id']));
        echo json_encode($result);
    }
    public function deleteCustomer()
    {
        if (!$this->input->is_ajax_request()) {
            $this->error();
            return false;
        }
        $data = $this->input->post();
        $result = $this->common_m->delete_record('customers', array('id' => $data['id']));
        $rsp['response'] = $result;
        echo json_encode($rsp);
    }
}
?>