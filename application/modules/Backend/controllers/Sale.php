<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sale extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sale_m', 'sale_m');
    }

    public function index()
    {
        user_is_logged_in();
        $this->data['site_title'] = ucfirst('sale');
        // $this->data['template_css'] = $this->load_grid_css('add');   //wizard3
        $this->data['template_js'] = $this->load_grid_js('sale');
        $this->render_page($this->data['sitename_folder'] . 'sale_v', $this->data);
    }

    public function addSale_Page()
    {
        user_is_logged_in();
        $this->data['site_title'] = ucfirst('Sale');
        // $this->data['template_css'] = $this->load_grid_css('add');   //wizard3
        $this->data['template_js'] = $this->load_grid_js('sale');
        $company_id = $this->session->userdata['company_id'];

        $this->data['customers'] = $this->common_m->get_common_master('customers', array('id', 'user_id', 'company_id', 'customer_name'), array("company_id" => $company_id), 'customer_name asc');
        $this->data['items'] = $this->common_m->get_common_master('items', array('id', 'user_id', 'company_id', 'item_code', 'item_name'), array("company_id" => $company_id), 'item_name asc');

        $this->render_page($this->data['sitename_folder'] . 'saleForm_v', $this->data);
    }

    public function addSale()
    {
        if ($this->input->is_ajax_request()) {

            $input = $this->input->post();
            $input1 = array(
                'id' => $input['id'],
                'total_quantity' => $input['total_quantity'],
                'total_price' => $input['total_price'],
                'cgst_price' => $input['total_price'],
                'sgst_price' => $input['cgst_price'],
                'igst_price' => $input['igst_price'],
                'total_gst_amount' => $input['total_gst_amount'],
                'total_amount' => $input['total_amount'],
                'customer_id' => $input['customer_id'],
                'customer_invoice_id' => $input['customer_invoice_id'],
                'bill_date' => $input['bill_date'],
                'company_id' => $this->session->userdata['company_id'],
                'user_id' => $this->session->userdata['user_id']
            );

            $this->db->trans_begin();
            $sale_id = $this->sale_m->insert_record('sale', $input1);
            
            $input2= $input['data'];
            foreach($input2 as  $key => $value){
                $input2[$key]['sale_id']= $sale_id;
                $this->common_m->updateQty('items', array("id" => $input2[$key]['item_id']), 'total_quantity', 0 - $input2[$key]['quantity']);
            }
            
            $result = $this->common_m->muliple_insert_batch('sale_item', $input2);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();  
            }
            $rsp['response'] = $result;
            echo json_encode($rsp);
        } else {
            $this->error();
        }
    }
}
