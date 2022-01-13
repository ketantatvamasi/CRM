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

    
}
