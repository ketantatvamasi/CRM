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
        if ($this->input->is_ajax_request()) {
            $records = $this->vendor_m->get_datatables();
            $data = array();
            $no = 0;
            foreach ($records as $record) {
                $no++;
                $data[] = array(
                    "number" =>  $no,
                    "id" => $record->id,
                    "vendor_creator" => $record->vendor_creator,
                    "company_name" => $record->company_name,
                    "contact_person_name" => $record->contact_person_name,
                    "email" => $record->email,
                    "mobile_main" => $record->mobile_main,
                    "code" => $record->code,
                    "country" => $record->country,
                    // "status" => $record->status,
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
    }

    public function addVendor()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();

            $this->form_validation->set_rules('code', 'Code', 'required');
            $this->form_validation->set_rules('contact_person_name', 'Contact Person name', 'required');
            $this->form_validation->set_rules('mobile_main', 'Mobile', 'required');


            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('pincode', 'Pincode', 'required');

            $this->form_validation->set_rules('bank_name', 'Bank name', 'required');
            $this->form_validation->set_rules('account_name', 'Account name', 'required');
            $this->form_validation->set_rules('bank_branch', 'Bank Branch name', 'required');

            $this->form_validation->set_rules('ifsc_code', 'IFSC code', 'required');

            $this->form_validation->set_rules('gst_no', 'GST no', 'required');

            if ($data['id'] == "") {
                $this->form_validation->set_rules('company_name', 'Company name', 'required|is_unique[vendors.company_name]');
                $this->form_validation->set_rules('email', 'Email', 'required|is_unique[vendors.email]');
                $this->form_validation->set_rules('acccount_no', 'Account number', 'required|is_unique[vendors.acccount_no]');
            } else {
                $this->form_validation->set_rules('company_name', 'Company name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('acccount_no', 'Account number', 'required');
            }

            if (!$this->form_validation->run()) {

                $errors['company_name'] = form_error('name');
                $errors['acccount_no'] = form_error('organization_name');
                $errors['email'] = form_error('email');

                // print_r($errors);
                // exit;
                return $this->output
                    ->set_content_type('application/json')
                    // ->set_status_header(407)
                    ->set_output(json_encode($errors));
            }

            if ($data['id'] == "") {
                $data['user_id'] = $_SESSION['user_id'];
                $data['company_id'] = $_SESSION['company_id'];
                $data['status'] = 0;
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
        } else {
            redirect('backend/vendor');
        }
    }

    public function editVendor()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();
            $result = $this->common_m->edit_id(array('*'), 'vendors', array('id' => $data['id']));
            echo json_encode($result);
        } else {
            redirect('backend/vendor');
        }
    }

    public function deleteVendor()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();
            $result = $this->common_m->delete_record('vendors', array('id' => $data['id']));
            $rsp['response'] = $result;
            echo json_encode($rsp);
        } else {
            redirect('backend/vendor');
        }
    }
}
