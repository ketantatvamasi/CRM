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

    public function saleList()
    {
        if ($this->input->is_ajax_request()) {
            $records = $this->sale_m->get_datatables();
            $data = array();
            $no = 0;
            foreach ($records as $record) {
                $no++;
                $data[] = array(
                    "number" =>  $no,
                    "id" => $record->id,
                    "customer_name" => $record->customer_name,
                    "total_quantity" => $record->total_quantity,
                    "total_price" => $record->total_price,
                    "total_gst_amount" => $record->total_gst_amount,
                    "total_amount" => $record->total_amount
                );
            }
            $output = array(
                // "draw" => $_POST['draw'],
                "recordsTotal" => $this->sale_m->count_all(),
                "recordsFiltered" => $this->sale_m->count_filtered(),
                "data" => $data,
            );

            //output to json format
            echo json_encode($output);
        } else {
            redirect('backend/sale');
        }
    }

    public function addSale_Page()
    {
        user_is_logged_in();
        $this->data['site_title'] = ucfirst('Sale');
        $this->data['template_css'] = $this->load_grid_css('add');   //wizard3
        $this->data['template_js'] = $this->load_grid_js('sale');
        $company_id = $this->session->userdata['company_id'];

        $this->data['customers'] = $this->common_m->get_common_master('customers', array('id', 'user_id', 'company_id', 'customer_name'), array("company_id" => $company_id), 'customer_name asc');
        $this->data['items'] = $this->common_m->get_common_master('items', array('id', 'user_id', 'company_id', 'item_code', 'item_name','total_quantity'), array("company_id" => $company_id), 'item_name asc');

        $this->render_page($this->data['sitename_folder'] . 'saleForm_v', $this->data);
    }

    public function setItem()
    {
        $id = $this->input->post('id');
        $record = $this->sale_m->getitem($id);
        echo json_encode($record);
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
            $input2 = $input['data'];

            if ($input['id'] == "") {
                $this->db->trans_begin();

                $sale_id = $this->common_m->last_insert_id('sale', $input1);


                foreach ($input2 as  $key => $value) {
                    $input2[$key]['sale_id'] = $sale_id;
                    $this->common_m->updateQty('items', array("id" => $input2[$key]['item_id']), 'total_quantity', 0 - $input2[$key]['quantity']);
                }

                $result = $this->common_m->multiple_insert_batch('sale_item', $input2);

                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                } else {
                    $this->db->trans_commit();
                }
            } else {
                $this->db->trans_begin();
                $sale_item_list = $this->common_m->edit_multiple_id(array('*'), 'sale_item', array('sale_id' => $input1['id']));

                foreach ($sale_item_list as  $key => $value) {
                    $this->common_m->updateQty('items', array("id" => $value->item_id), 'total_quantity', $value->quantity);
                }
                $this->common_m->delete_record('sale_item', array('sale_id' => $input1['id']));
                $this->common_m->update_record('sale', $input1, array('id' => $input1['id']));
                foreach ($input2 as  $key => $value) {

                    $input2[$key]['sale_id'] = $input1['id'];
                    $this->common_m->updateQty('items', array("id" => $input2[$key]['item_id']), 'total_quantity', 0 - $input2[$key]['quantity']);
                }
                $result = $this->common_m->multiple_insert_batch('sale_item', $input2);

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

    public function editSale_Page()
    {
        user_is_logged_in();
        $this->data['site_title'] = ucfirst('Sale');
        $this->data['template_js'] = $this->load_grid_js('sale');
        $company_id = $this->session->userdata['company_id'];

        $this->data['customers'] = $this->common_m->get_common_master('customers', array('id', 'customer_name'), array("company_id" => $company_id), 'customer_name asc');
        $id = $this->uri->segment(4);
        $this->data['item_list'] = $this->common_m->get_common_master('items', array('*'), array("company_id" => $company_id), 'item_name asc');
        $this->data['sale_data'] = $this->common_m->get_common_master('sale', array('*'), array("id" => $id), null);
        $this->data['sale_item_data'] = $this->common_m->get_common_master('sale_item', array('*'), array("sale_id" => $id), null);

        $this->render_page($this->data['sitename_folder'] . 'saleEdit_v', $this->data);
    }

    public function deleteSale()
    {
        if (!$this->input->is_ajax_request()) {
            $this->error();
            return false;
        }
        $data = $this->input->post();
        $this->db->trans_begin();
        $sale_item_list = $this->common_m->edit_multiple_id(array('*'), 'sale_item', array('sale_id' => $data['id']));

        foreach ($sale_item_list as  $key => $value) {
            $this->common_m->updateQty('items', array("id" => $value->item_id), 'total_quantity', $value->quantity);
        }
        $result = $this->common_m->delete_record('sale', array('id' => $data['id']));
        $result = $this->common_m->delete_record('sale_item', array('sale_id' => $data['id']));

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
        $rsp['response'] = $result;
        echo json_encode($rsp);
    }
}
