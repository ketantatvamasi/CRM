<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends BackendController
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_m', 'login_m');
	}


	public function index()
	{
		user_is_session_login();
		$this->data['site_title'] = ucfirst('User Login');
		// $this->data['taplate_css']=$this->load_grid_css('login');
		$this->data['template_js'] = $this->load_grid_js('login');
		$this->render_page($this->data['sitename_folder'] . 'login', $this->data, 1);
	}

	public function login()
	{

		$data['email'] = $this->input->post('email');
		$data['password'] = $this->input->post('password');
		// print_r($data); exit;
		$this->form_validation->set_rules('email', 'Email address', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() == FALSE) {

			$data_e['error'] = validation_errors();

			return $this->output
				->set_content_type('application/json')
				->set_status_header(422)
				->set_output(json_encode($data_e));
		} else {


			$query = $this->login_m->login($data);


			if ($query) {

				if ($query[0]->role_id == 2) {
					$company_id = $query[0]->user_id;
				} else {
					$company_id = $query[0]->parent_id;
				}

				$user = array(
					'response' => 'success',
					'user_id' => $query[0]->user_id,
					'parent_id' => $query[0]->parent_id,
					'company_id' => $company_id,
					'user_name' => $query[0]->firstname,
					'email' => $query[0]->email,
					'role_id' => $query[0]->role_id
				);

				$this->session->set_userdata($user);
				echo json_encode($user);
			} else {
				$data_e['token'] = 'false';
				return $this->output
					->set_content_type('application/json')
					->set_status_header(401)
					->set_output(json_encode($data_e));
			}
		}
	}

	public function logout()
	{
		$sessionData = $this->session->all_userdata();
		foreach ($sessionData as $key => $val) {
			$this->session->unset_userdata($key);
		}
		//$this->session->sess_destroy();
		redirect(base_url());
	}
}
