<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_m', 'customer_m');
        $this->load->model('Vendor_m', 'vendor_m');
        $this->load->model('Item_m', 'item_m');
        $this->load->model('Sale_m', 'sale_m');
        $this->load->model('Purchase_m', 'purchase_m');
        $this->load->model('User_m', 'user_m');
    }

    public function index()
    {
        user_is_logged_in();
        $this->data['site_title'] = ucfirst('Dashboard');
        $this->data['customerCount']=$this->customer_m->count_filtered();
        $this->data['vendorCount']=$this->vendor_m->count_filtered();
        $this->data['itemCount']=$this->item_m->count_filtered();
        $this->data['userCount']=$this->user_m->count_filtered();
        $this->data['saleCount']=$this->sale_m->count_filtered();
        $this->data['purchaseCount']=$this->purchase_m->count_filtered();
        $this->data['saletotal']=number_format($this->sale_m->get_saleTotal(),2,'.',',');
        $this->data['purchasetotal']=number_format($this->purchase_m->get_purchaseTotal(),2,'.',',');

		$this->render_page($this->data['sitename_folder'].'dashboard',$this->data);
    }
}
