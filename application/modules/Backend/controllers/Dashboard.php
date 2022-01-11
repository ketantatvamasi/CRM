<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends BackendController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        user_is_logged_in();
        $this->data['site_title'] = ucfirst('Dashboard');
		// $this->data['taplate_css']=$this->load_grid_css('login');
		// $this->data['template_js']=$this->load_grid_js('login');
		$this->render_page($this->data['sitename_folder'].'dashboard',$this->data);
    }
}
