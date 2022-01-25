<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ForgetPassword extends BackendController
{

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('Login_m', 'login_m');
	}


	public function index()
	{
		user_is_session_login();
		$this->data['site_title'] = ucfirst('User Login');
		// $this->data['taplate_css']=$this->load_grid_css('login');
		$this->data['template_js'] = $this->load_grid_js('forgot');
		$this->render_page($this->data['sitename_folder'] . 'forgetpassword_v', $this->data, 1);
	}
	public function check_email()
    {
		if (!$this->input->is_ajax_request()) {
            $this->error();
            return false;
        }
        $data = $this->input->post('email');
        $dt = $this->common_m->getEmail(array('*'),"users",array('email' => $data));
        if ($dt != "") {
            $data = array("status" => "success", "check_email" => $dt, "msg" => "");
        } else {
            $data = array("status" => "fail", "msg" => "Email is not exist");
        }
        echo json_encode($data);
    }
	public function for_send_otp()
    {
		if (!$this->input->is_ajax_request()) {
            $this->error();
            return false;
        }
            $to_email = $this->input->post('email');
            $otp = rand(100000, 999999);

            $this->load->library('email');
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.gmail.com';
            $config['smtp_port'] = '465';
            $config['smtp_timeout'] = '60';
            $config['smtp_user'] = 'moneytracker741@gmail.com';
            $config['smtp_pass'] = 'money@tracker';

            $config['smtp_crypto'] = 'ssl';
            $config['charset'] = 'utf-8';
            $config['newline'] = "\r\n";
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';

            $this->email->initialize($config);

            $this->email->from('moneytracker741@gmail.com', 'CRM');
            $this->email->to($to_email);
            $this->email->subject('Forgot Password');
            $this->email->message("<h2>" . $otp . "</h2><p style='color:red;'>Don't share otp to anyone..</p>");
            if (!$this->email->send()) {
                echo json_encode($this->email->print_debugger());
            } else {
                $dt = array("status" => "success", "otp" => $otp, "msg" => "OTP Successfully Send On Your Email Address");
            }
            echo json_encode($dt);
		
    }
	public function forget_pass()
    {
		if (!$this->input->is_ajax_request()) {
            $this->error();
            return false;
        }
        $user_id = $this->input->post('user_id');
        $password = $this->input->post('password');
		// $result = $this->common_m->update_record('users', array('passwor'=>$password), array('user_id' => $user_id));
        if ($this->common_m->update_record('users', array('password'=> $password), array('user_id' => $user_id))) {
            $data = array("status" => "success", "msg" => "Password Successfully Forgeted ");
        } else {
            $data = array("status" => "fail", "msg" => "Password Not Seted");
        }
        echo json_encode($data);
    }
}
?>