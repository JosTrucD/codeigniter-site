<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Class slider
	* @author JosT
	* @date   Apr 2015
	*/
	class slider extends BackEnd_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library(array('form_validation', 'pagination', 'upload'));
			// Tieng viet
			$this->lang->load('vi', 'vietnamese');
			// Load model
			$this->load->model('model_slider');
		}
		/**
		 * [index description]
		 * @return [type] [description]
		 */
		public function index()
		{
			$data['template'] = 'slider/index';
			// Phan trang
			$totalRows = $this->model_slider->totalSlider();
			// So ban ghi tren mot trang
			$limit                   = 10;
			$config['base_url']      = base_url().'slider/trang/';
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
			$data['links']           = explode('&nbsp;',$pagination );

			$data['slider']   = $this->model_slider->listSlider($limit, $start);
			$this->load->view('layout/index', $data);
		}
		/**
		 * [insert slider]
		 * @return [type] [description]
		 */
		public function insert()
		{
			$data['template'] = 'slider/insert';
			$params = $this->input->post();
			if ($this->_validation()) {				
				$dataInsert = array(
								'name'        => $params['name'],
								'status'      => $params['status'],
								'description' => $params['description'],
								'rewrite'     => $params['rewrite']
									);
				$check = $this->model_slider->checkInsert($params['name']);
				if ($check < 1) {
					$this->model_slider->insertSlider($dataInsert);
					if (!empty($_FILES['image']['name'])) {
						// Get slider with name inserted
						$slider = $this->model_slider->getName($params['name']);
						// Name folder
						$folder = $slider['id'];
						// Upload image
						$this->upload->do_upload('upload/slider/', $folder);
						$image = $_FILES['image']['name'];
						$dataUpdate  = array(
								'name'        => $params['name'],
								'status'      => $params['status'],
								'description' => $params['description'],
								'rewrite'     => $params['rewrite'],
								'images'      => $image
											);
						$this->model_slider->updateSlider($dataUpdate, $folder);
					}
					redirect('slider');
				} else {
					$data['error'] = "Tên đã tồn tại !";
				}
			}
			$this->load->view('layout/index', $data);
		}
		/**
		 * [edit slider]
		 * @return [type] [description]
		 */
		public function edit()
		{
			$data['template']   = 'slider/edit';
			$id = $this->uri->segment(2);
			$data['sliderEdit'] = $this->model_slider->getSlider($id);
			// Kiem tra slider can sua
			if (empty($data['sliderEdit'])) {
				$data['template'] = 'error/404';
			}
			$params = $this->input->post();
			if ($this->_validation()) {
				if (empty($_FILES['image']['name'])) {
					$dataUpdate = array(
								'name'        => $params['name'],
								'status'      => $params['status'],
								'description' => $params['description'],
								'rewrite'     => $params['rewrite']
									);
				} else {
					// Upload and update image
					$this->upload->do_upload('upload/slider/', $id);
					$image = $_FILES['image']['name'];
					$dataUpdate  = array(
							'name'        => $params['name'],
							'status'      => $params['status'],
							'description' => $params['description'],
							'rewrite'     => $params['rewrite'],
							'images'      => $image
										);
				}
				$this->model_slider->updateSlider($dataUpdate, $id);
				redirect('slider');
			}
			$this->load->view('layout/index', $data);
		}
		/**
		 * [delete slider]
		 * @return [type] [description]
		 */
		public function delete()
		{
			$params = $this->input->post();
			$id = $params['id'];
			if (empty($id)) {
				redirect('slider');
			}
			$this->model_slider->deleteSlider($id);
			// Xoa anh
			$this->upload->delete_multi_folder('upload/slider/', $id);
			redirect('slider');
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
			$this->form_validation->set_rules('description', 'Mô tả', 'required');
			$this->form_validation->set_rules('rewrite', 'Bài viết', 'required');
			if ($this->form_validation->run() == false) {
				$flag = false;
			}
			return $flag;
		}
	}