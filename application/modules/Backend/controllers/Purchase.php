<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Purchase_m', 'purchase_m');
    }

    public function index()
    {
        user_is_logged_in();
        $this->data['site_title'] = ucfirst('Purchase');
        $this->data['template_css'] = $this->load_grid_css('add');   //wizard3
        $this->data['template_js'] = $this->load_grid_js('purchase');
        $this->render_page($this->data['sitename_folder'] . 'purchase_v', $this->data);
    }

    public function purchaseList()
    {
        if ($this->input->is_ajax_request()) {
            $records = $this->purchase_m->get_datatables();
            $data = array();
            $no = 0;
            foreach ($records as $record) {
                $no++;
                $data[] = array(
                    "number" =>  $no,
                    "id" => $record->id,
                    // "item_name" => $record->item_name,
                    // "item_code" => $record->item_code,
                    "vendor_name" => $record->vendor_name,
                    "total_quantity" => $record->total_quantity,
                    "total_price" => $record->total_price,
                    "total_gst_amount" => $record->total_gst_amount,
                    "total_amount" => $record->total_amount
                );
            }
            $output = array(
                // "draw" => $_POST['draw'],
                "recordsTotal" => $this->purchase_m->count_all(),
                "recordsFiltered" => $this->purchase_m->count_filtered(),
                "data" => $data,
            );

            //output to json format
            echo json_encode($output);
        } else {
            redirect('backend/purchase');
        }
    }
    public function addpurchase_page()
    {
        $session = $this->session->userdata['company_id'];
        user_is_logged_in();
        $this->data['site_title'] = ucfirst('Purchase');
        $this->data['template_css'] = $this->load_grid_css('add');   //wizard3
        $this->data['template_js'] = $this->load_grid_js('purchase');
        $this->data['record']['vendor_list'] = $this->common_m->get_common_master('vendors', array("id", "contact_person_name","company_name"), array("company_id" => $session), "contact_person_name ASC");
        $this->data['record']['item_list'] = $this->common_m->get_common_master('items', array("id", "item_name"), array("company_id" => $session), "item_name ASC");
        $this->render_page($this->data['sitename_folder'] . 'addpurchase_v', $this->data);
    }

    public function editpurchase()
    {
        user_is_logged_in();
        $this->data['site_title'] = ucfirst('purchase');
        $this->data['template_js'] = $this->load_grid_js('purchase');
        $company_id = $this->session->userdata['company_id'];
        $this->data['vendors'] = $this->common_m->get_common_master('vendors', array('id', 'user_id', 'company_id', 'company_name', 'contact_person_name'), array("company_id" => $company_id), 'contact_person_name asc');
        $id = $this->uri->segment(4);
        $this->data['item_list'] = $this->common_m->get_common_master('items', array('*'), array("company_id" => $company_id), 'item_name asc');
        $this->data['purchase_data'] = $this->common_m->get_common_master('purchase', array('*'), array("id" => $id), null);
        $this->data['purchase_item_data'] = $this->common_m->get_common_master('purchase_item', array('*'), array("purchase_id" => $id), null);
        $this->render_page($this->data['sitename_folder'] . 'purchaseEdit_v', $this->data);
    }
    public function setitem()
    {
        $id = $this->input->post('id');
        $record = $this->purchase_m->getitem($id);
        echo json_encode($record);
    }
    public function addpurchse()
    {
        if ($this->input->is_ajax_request()) {
            $input = $this->input->post();
            $total_gst = $input['cgst_taxs'] + $input['sgst_taxs'] + $input['igst_taxs'];
            $data = array(
                "id" => $input['id'],
                "vendor_id" => $input['vendor_id'],
                "company_id" => $this->session->userdata['company_id'],
                "user_id" => $this->session->userdata['user_id'],
                "purchse_date" => $input['purchse_date'],
                "vendor_invoice_no" => $input['vendor_invoice_no'],
                "total_quantity" => $input['qty'],
                "total_price" => $input['amount'],
                "cgst_price" => $input['cgst_taxs'],
                "sgst_price" => $input['sgst_taxs'],
                "igst_price" => $input['igst_taxs'],
                "total_amount" => $input['total'],
                "total_gst_amount" => $total_gst
            );

            $data2 = $input['data'];
           
            if ($data['id'] == "") {
              
                $this->db->trans_begin();
                $purchase_id = $this->common_m->last_insert_id('purchase', $data);
                foreach ($data2 as  $key => $value) {
                    $data2[$key]['purchase_id'] = $purchase_id;
                    $this->common_m->updateQty('items', array("id" => $data2[$key]['item_id']), 'total_quantity', $data2[$key]['quantity']);
                }
                $result = $this->common_m->muliple_insert_batch('purchase_item', $data2);
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                } else {
                    $this->db->trans_commit();
                }
            } else {
                $this->db->trans_begin();
                $result = $this->common_m->edit_multiple_id(array('*'), 'purchase_item', array('purchase_id' => $data['id']));
                foreach ($result as  $key => $value) {
                    $this->common_m->updateQty('items', array("id" => $value->item_id), 'total_quantity', 0 - $value->quantity);
                }
                $this->common_m->delete_record('purchase_item', array('purchase_id' => $data['id']));
                $this->common_m->update_record('purchase', $data, array('id' => $data['id']));
                foreach ($data2 as  $key => $value) {
                    $data2[$key]['purchase_id'] = $data['id'];
                    $this->common_m->updateQty('items', array("id" => $data2[$key]['item_id']), 'total_quantity',  $data2[$key]['quantity']);
                }
                $result = $this->common_m->muliple_insert_batch('purchase_item', $data2);
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                } else {
                    $this->db->trans_commit();
                }
            }
            $rsp['response'] = $result;
            echo json_encode($rsp);
        } else {
            $this->error();
        }
    }
    public function deletePurchase()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();
            $result = $this->common_m->edit_multiple_id(array('*'), 'purchase_item', array('purchase_id' => $data['id']));
                foreach ($result as  $key => $value) {
                    $this->common_m->updateQty('items', array("id" => $value->item_id), 'total_quantity', 0 - $value->quantity);
                }
            $result = $this->common_m->delete_record('purchase', array('id' => $data['id']));
            $result = $this->common_m->delete_record('purchase_item', array('purchase_id' => $data['id']));
            $rsp['response'] = $result;
            echo json_encode($rsp);
        } else {
            $this->error();
        }
    }
}
