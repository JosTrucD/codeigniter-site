<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Class news
	* @author JosT
	* @date   May 2015
	*/
	class news extends BackEnd_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library(array('form_validation', 'string', 'pagination'));
			$this->load->helper(array('recursive','url'));
			// Tieng viet
			$this->lang->load('vi', 'vietnamese');
			// Load model
			$this->load->model('model_news');
		}
		/**
		 * [index description]
		 * @return [type] [description]
		 */
		public function index()
		{
			$data['template'] = "news/index";
			// Phan trang
			$totalRows = $this->model_news->getTotal();
			// So ban ghi tren mot trang
			$limit                   = 10;
			$config['base_url']      = base_url().'bai-viet/trang/';
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

			$data['news'] = $this->model_news->listNews($limit, $start);
			$this->load->view('layout/index',$data);
		}
		/**
		 * [insert news]
		 * @return [type] [description]
		 */
		public function insert()
		{
			$data['template'] = "news/insert";
			// Danh sach news theo cate_parent

			$params = $this->input->post();
			// Session user
			$user   = $this->session->userdata('name');
			if ($this->_validation()) {
				$dataInsert = array(
								'name'    => $params['name'] ,
								'status'  => $params['status'] ,
								'rewrite' => $params['rewrite'] ,
								'user'    => $user,
								'date'    => date('Y-m-d H:i:s',time())
								);
				// Check data insert
				$check = $this->model_news->checkInsert($params['name']);
				if ($check < 1) {
					$this->model_news->insertNews($dataInsert);
					redirect('bai-viet');
				} else {
					$data['error'] = "Tên bài viết đã tồn tại !";
				}
			}
			$this->load->view('layout/index',$data);
		}
		/**
		 * [edit news]
		 * @return [type] [description]
		 */
		public function edit()
		{
			$data['template'] = 'news/edit';;
			// Lay news can sua
			$id               = $this->uri->segment(2);
			$data['newsEdit'] = $this->model_news->getNews($id);
			// Kiem tra news can sua
			if (empty($data['newsEdit'])) {
				$data['template'] = 'error/404';
			}
			$params = $this->input->post();
			// Session user
			$user   = $this->session->userdata('name');
			if ($this->_validation()) {				
				$dataUpdate = array(
								'name'    => $params['name'] ,
								'status'  => $params['status'] ,
								'rewrite' => $params['rewrite'] ,
								'user'    => $user,
								'date'    => date('Y-m-d H:i:s',time())
								);
				$this->model_news->updateNews($dataUpdate, $id);
				redirect('bai-viet');
			}
			$this->load->view('layout/index',$data);
		}
		public function delete()
		{
			$params = $this->input->post();
			$id = $params['id'];
			if (!empty($id)) {
				$this->model_news->deleteNews($id);
			}
			redirect('bai-viet');
		}
		/**
		 * [_validation form]
		 * @return [type] [description]
		 */
		private function _validation()
		{
			$flag = true;

			$this->form_validation->set_message('required', $this->lang->line('required'));
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			$this->form_validation->set_rules('rewrite', 'lang:rewrite', 'required');

			if ($this->form_validation->run() == false) {
				$flag = false;
			}
			return $flag;
		}
	}
 ?>