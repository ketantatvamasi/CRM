<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_m', 'item_m');
    }

    public function index()
    {
        user_is_logged_in();
        $this->data['site_title'] = ucfirst('Item');
        $this->data['template_css'] = $this->load_grid_css('add');   //wizard3
        $this->data['template_js'] = $this->load_grid_js('item');
        $this->render_page($this->data['sitename_folder'] . 'item_v', $this->data);
    }
    public function itemList()
    {
        if ($this->input->is_ajax_request()) {
            $records = $this->item_m->get_datatables();
            $data = array();
            $no = 0;
            foreach ($records as $record) {
                $no++;
                $data[] = array(
                    "number" =>  $no,
                    "id" => $record->id,
                    "item_name" => $record->item_name,
                    "item_code" => $record->item_code,
                    "sale_price" => $record->sale_price,
                    "opening_quantity" => $record->opening_quantity,                    
                    "total_quantity" => $record->total_quantity                    
                );
            }
            $output = array(
                // "draw" => $_POST['draw'],
                "recordsTotal" => $this->item_m->count_all(),
                "recordsFiltered" => $this->item_m->count_filtered(),
                "data" => $data,
            );

            //output to json format
            echo json_encode($output);
        } else {
            redirect('backend/item');
        }
    }
    public function addItem()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();

            if ($data['id'] == "") {
                $data['user_id'] = $_SESSION['user_id'];
                $data['company_id'] = $_SESSION['company_id'];
                $data['status'] = 0;
                // echo "<pre>";
                // print_r($data);
                // exit;
                $result = $this->common_m->insert_record('items', $data);
            } else {
                // $udata = array('name' => $data['name'], 'organization_name' => $data['organization_name'], 'email' => $data['email'], 'contact' => $data['contact'], 'address' => $data['address'], 'pincode' => $data['pincode']);
                $result = $this->common_m->update_record('items', $data, array('id' => $data['id']));
            }

            $rsp['response'] = $result;
            echo json_encode($rsp);
        } else {
            redirect('backend/item');
        }
    }
    public function editItem()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();
            $result = $this->common_m->edit_id(array('*'), 'items', array('id' => $data['id']));
            echo json_encode($result);
        } else {
            redirect('backend/item');
        }
    }
    public function deleteItem()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();
            $result = $this->common_m->delete_record('items', array('id' => $data['id']));
            $rsp['response'] = $result;
            echo json_encode($rsp);
        } else {
            redirect('backend/item');
        }
    }
}
