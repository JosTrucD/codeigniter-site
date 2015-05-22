<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Class user
	* @author JosT
	* @date   Mar 2015
	*/
	class user extends BackEnd_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('model_user');
			$this->load->library(array('form_validation', 'pagination'));
			// Tieng viet
			$this->lang->load('vi', 'vietnamese');
		}
		/**
		 * [index user]
		 * @return [type] [description]
		 */
		public function index()
		{
			$data['template']        = "user/index";
			// Phan trang
			$totalRows = $this->model_user->totalUser();
			// So ban ghi tren mot trang
			$limit                   = 2;
			$config['base_url']      = base_url().'nguoi-dung/trang/';
			$config['total_rows']    = $totalRows;
			$config['per_page']      = $limit;
			$config['use_page_numbers'] = TRUE;
			$config['next_link']     = 'Next';
			$config['prev_link']     = 'Prev';
			$config['cur_tag_open']  = '&nbsp;<a class="current">';
			$config['cur_tag_close'] = '</a>';
			$config['num_links']	 = 5;
			$config['uri_segment']	 = 3;

			$this->pagination->initialize($config); 
			$pagination              = $this->pagination->create_links();
			$page 				     = ($this->uri->segment(3) == null) ? 1 : $this->uri->segment(3);
			$start                   = $limit * ($page - 1);
			$data["links"]           = explode('&nbsp;',$pagination );

			// View data
			$data['user']            = $this->model_user->listUser($limit, $start);
			$this->load->view('layout/index', $data);
		}
		/**
		 * [insert user]
		 * @return [type] [description]
		 */
		public function insert()
		{
			$data['template'] = 'user/insert';
			$params = $this->input->post();
			if ($this->_validation()) {
				$dataInsert = array(
								'name'     => $params['name'],
								'password' => md5($params['password']),
								'email'    => $params['email'],
								'address'  => $params['address'],
								'lever'    => $params['lever']
					);
				// Kiem tra user them moi
				$check = $this->model_user->checkInsert($params['name']);
				if ($check < 1) {
					$this->model_user->insertUser($dataInsert);
					redirect('nguoi-dung');
				} else {
					$data['errorName'] = "Người dùng đã tồn tại !";
				}
			}
			$this->load->view('layout/index', $data);
		}
		/**
		 * [edit user]
		 * @return [type] [description]
		 */
		public function edit()
		{
			$data['template'] = 'user/edit';
			// Lay user can sua
			$id = $this->uri->segment(2);
			$data['userEdit'] = $this->model_user->getUser($id);
			// Kiem tra user can sua
			if (empty($data['userEdit'])) {
				$data['template'] = 'error/404';
			}
			$params = $this->input->post();
			if ($this->_validation()) {
				$dataUpadte = array(
								'name'     => $params['name'],
								'password' => md5($params['password']),
								'email'    => $params['email'],
								'address'  => $params['address'],
								'lever'    => $params['lever']
					);
				$this->model_user->updateUser($dataUpadte, $id);
				redirect('nguoi-dung');
			}

			$this->load->view('layout/index', $data);
		}
		/**
		 * [delete user]
		 * @return [type] [description]
		 */
		public function delete()
		{
			$params = $this->input->post();
			$id = $params['id'];
			if (!empty($id)) {
				$this->model_user->deleteUser($id);
			}
			redirect('nguoi-dung');
		}
		/**
		 * [_validation form]
		 * @return [type] [description]
		 */
		private function _validation()
		{
			$flag = true;
			$this->form_validation->set_message('required', $this->lang->line('required'));
			$this->form_validation->set_message('min_length', $this->lang->line('min_length'));
			$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));

			$this->form_validation->set_rules('name', 'lang:name', 'required');
			$this->form_validation->set_rules('password', 'lang:password', 'required|min_length[6]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('address', 'Address', 'required');
			if ($this->form_validation->run() == false) {
				$flag = false;
			}
			return $flag;
		}
	}
 ?>