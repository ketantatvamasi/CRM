<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sale extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Sale_m', 'sale_m');
    }

    public function index()
    {
        user_is_logged_in();
        $this->data['site_title'] = ucfirst('sale');
        // $this->data['template_css'] = $this->load_grid_css('add');   //wizard3
        $this->data['template_js'] = $this->load_grid_js('sale');
        $this->render_page($this->data['sitename_folder'] . 'sale_v', $this->data);
    }

    public function addSale()
    {
        user_is_logged_in();
        $this->data['site_title'] = ucfirst('Sale');
        // $this->data['template_css'] = $this->load_grid_css('add');   //wizard3
        $this->data['template_js'] = $this->load_grid_js('sale');
        $company_id = $this->session->userdata['company_id'];

        $this->data['customers'] = $this->common_m->get_common_master('customers', array('id', 'user_id', 'company_id', 'customer_name'), array("company_id" => $company_id), 'customer_name asc');
        $this->data['items'] = $this->common_m->get_common_master('items', array('id', 'user_id', 'company_id','item_code' ,'item_name'), array("company_id" => $company_id), 'item_name asc');

        $this->render_page($this->data['sitename_folder'] . 'saleForm_v', $this->data);
    }
}
