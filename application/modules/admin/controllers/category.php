<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Class category
	* @author JosT
	* @date   Apr 2015
	*/
	class category extends BackEnd_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library(array('form_validation', 'string'));
			$this->load->helper(array('recursive','url'));
			// Tieng viet
			$this->lang->load('vi', 'vietnamese');
			// Load model
			$this->load->model('model_category');
		}
		/**
		 * [index description]
		 * @return [type] [description]
		 */
		public function index()
		{
			$data['template'] = "category/index";
			$data['category'] = $this->model_category->listCate();
			$data['category'] = buildArr($data['category'],'cate_name');
			$this->load->view('layout/index',$data);
		}
		/**
		 * [insert category]
		 * @return [type] [description]
		 */
		public function insert()
		{
			$data['template'] = "category/insert";
			// Danh sach category theo cate_parent
			$data['category'] = $this->model_category->listCate();
			$data['category'] = buildArr($data['category'],'cate_name');

			$params = $this->input->post();
			if ($this->_validation()) {
				$dataInsert = array(
								'cate_name'    => $params['name'] ,
								'cate_title'   => $params['title'] ,
								'cate_status'  => $params['status'] ,
								'cate_rewrite' => $params['rewrite'] ,
								'cate_parent'  => $params['parent']
								);
				// Check data insert
				$check = $this->model_category->checkInsert($params['name']);
				if ($check < 1) {
					$this->model_category->insertCate($dataInsert);
					redirect('phan-loai');
				} else {
					$data['error'] = "Tên đã tồn tại !";
				}
			}
			$this->load->view('layout/index',$data);
		}
		/**
		 * [edit category]
		 * @return [type] [description]
		 */
		public function edit()
		{
			$data['template'] = 'category/edit';
			// Danh sach category theo cate_parent
			$data['category'] = $this->model_category->listCate();
			$data['category'] = buildArr($data['category'],'cate_name');
			// Lay category can sua
			$id               = $this->uri->segment(2);
			$data['categoryEdit'] = $this->model_category->getCate($id);
			// Kiem tra category can sua
			if (empty($data['categoryEdit'])) {
				$data['template'] = 'error/404';
			}
			$params = $this->input->post();
			if ($this->_validation()) {				
				$dataUpdate = array(
								'cate_name'    => $params['name'] ,
								'cate_title'   => $params['title'] ,
								'cate_status'  => $params['status'] ,
								'cate_rewrite' => $params['rewrite'] ,
								'cate_parent'  => $params['parent']
								);
				$this->model_category->updateCate($dataUpdate, $id);
				redirect('phan-loai');
			}
			$this->load->view('layout/index',$data);
		}
		public function delete()
		{
			$params = $this->input->post();
			if ($params['id']) {
				foreach ($params['id'] as $value) {
					$category = $this->model_category->getParent($value);
					$params['id'][] = $category['cate_id'];
				}
				$this->model_category->deleteCate($params['id']);
			}
			redirect('phan-loai');
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
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('rewrite', 'lang:rewrite', 'required');

			if ($this->form_validation->run() == false) {
				$flag = false;
			}
			return $flag;
		}
	}
 ?>