<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Class login
	* @author JosT
	* @date   Mar 2015
	*/
	class login extends MX_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			// Thu vien va helper cua Form
			$this->load->helper(array('form', 'url')); 
			$this->load->library(array('form_validation', 'session'));
			// Tieng viet
			$this->lang->load('vi', 'vietnamese');
			// Load model
			$this->load->model('model_user');
		}

		public function index()
		{
			$this->form_validation->set_message('required', $this->lang->line('required'));
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			$this->form_validation->set_rules('password', 'lang:password', 'required');

			$data = "";
			$params = $this->input->post();
			if ($this->form_validation->run() == true) {
				$name     = $params['name'];
				$password = $params['password'];
				$check = $this->model_user->checkLogin($name,$password);
				if ($check < 1) {
					$data['error'] = "Tên hoặc mật khẩu không đúng !";
				} else {
					$this->session->set_userdata('name',$name);
					redirect('admin');
				}
			}
			$this->load->view('login/index',$data);
		}
		// Funtion logout
		public function logout()
		{
			$this->session->unset_userdata('name');
			redirect('dang-nhap');
		}
	}
 ?>