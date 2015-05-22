<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Class category
	* @author JosT
	* @date   Apr 2015
	*/
	class product extends BackEnd_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			// Load model
			$this->load->model('model_product');
			$this->load->model('model_pro_image');
			$this->load->model('model_category');
			$this->load->model('model_cate_pro');
			// Load library
			$this->load->library(array('form_validation', 'pagination', 'session', 'upload'));
			// Load helper
			$this->load->helper(array('recursive','url'));
			// Library tieng Viet
			$this->lang->load('vi', 'vietnamese');
		}
		/**
		 * [index description]
		 * @return [type] [description]
		 */
		public function index()
		{
			$data['template'] = 'product/index';
			// Phan trang
			$totalRows = $this->model_product->totalPro();
			// So ban ghi tren mot trang
			$limit                   = 10;
			$config['base_url']      = base_url().'san-pham/trang/';
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
			$data['product']            = $this->model_product->listPro($limit, $start);
			$this->load->view('layout/index', $data);
		}
		/**
		 * [insert product]
		 * @return [type] [description]
		 */
		public function insert()
		{
			$data['template'] = 'product/insert';
			// Lay danh sach phan loai
			$category         = $this->model_category->listCate();
			$data['category'] = buildArr($category, 'cate_name');
			// Session user
			$user   = $this->session->userdata('name');
			$params = $this->input->post();
			if ($this->_validation()) {
				$dataInsert = array(
								'pro_name'             => $params['name'],
								'pro_price'            => $params['price'],
								'pro_status'           => $params['status'],
								'pro_information'      => $params['info'],
								'pro_rewrite'          => $params['rewrite'],
								'pro_create_date'      => date('Y-m-d H:i:s',time()),
								'pro_user'             => $user
									);
				$check = $this->model_product->checkInsert($params['name'], $params['url']);
				if ($check > 1) {
					$data['error'] = "Sản phẩm đã tồn tại";
				} else {					
					$this->model_product->insertPro($dataInsert);
					// Lay san pham vua them moi
					$product = $this->model_product->getProName($params['name']);
					// Insert category product
					if (!empty($params['category'])) {
						foreach ($params['category'] as $value) {
							$insertCatePro[] = array(
												'cate_id' => $value,
												'pro_id'  => $product['pro_id']
												);
						}
						for ($i=0; $i < count($insertCatePro); $i++) { 
							$this->model_cate_pro->insertCatePro($insertCatePro[$i]);
						}
					}
					// Upload anh dai dien san pham
					if (!empty($_FILES['image']['name'])) {
						$this->upload->do_upload('upload/product/', $product['pro_id']);
						$image = $_FILES['image']['name'];
						$dataUpdate = array(
										'pro_image'            => $image,
										'pro_name'             => $params['name'],
										'pro_price'            => $params['price'],
										'pro_status'           => $params['status'],
										'pro_information'      => $params['info'],
										'pro_rewrite'          => $params['rewrite'],
										'pro_create_date'      => date('Y-m-d H:i:s',time()),
										'pro_user'             => $user
											);
						$this->model_product->updatePro($dataUpdate, $product['pro_id']);
					}
					// Upload ảnh sản phẩm
					if ($_FILES['images']['name'][0] !=null) {
						$this->upload->upload_multi_file("upload/product/images/",$product['pro_id']);
						$images = $_FILES['images']['name'];
						foreach ($images as $valueImages) {
							$insertImage[] = array(
												'pro_id' => $product['pro_id'],		
												'image' => $valueImages		
								); 
						}
						for ($i=0; $i < count($insertImage); $i++) { 
							$this->model_pro_image->insertProImage($insertImage[$i]);
						}
					}
					redirect('san-pham');
				}
			}

			$this->load->view('layout/index', $data);
		}
		/**
		 * [edit product]
		 * @return [type] [description]
		 */
		public function edit()
		{
			$data['template']    = 'product/edit';
			$id = $this->uri->segment(2);
			$data['productEdit'] = $this->model_product->getPro($id);
			// Kiem tra san pham can sua
			if (empty($data['productEdit'])) {
				$data['template'] = 'error/404';
			}
			// Lay danh sach phan loai
			$category           = $this->model_category->listCate();
			$data['categories'] = buildArr($category, 'cate_name');
			// Lay phan loai cua san pham
			$data['category']   = $this->model_cate_pro->getCatePro($id);
			// Lay anh san pham
			$data['images']     = $this->model_pro_image->getProImage($id);
			// Session user
			$user   = $this->session->userdata('name');
			$params = $this->input->post();
			if ($this->_validation()) {
				if (!empty($_FILES['image']['name'])) {
					$image = $_FILES['image']['name'];
					$this->upload->do_upload('upload/product/', $id);
					$dataUpdate = array(
									'pro_image'            => $image,
									'pro_name'             => $params['name'],
									'pro_price'            => $params['price'],
									'pro_status'           => $params['status'],
									'pro_information'      => $params['info'],
									'pro_rewrite'          => $params['rewrite'],
									'pro_update_date'      => date('Y-m-d H:i:s',time()),
									'pro_user'             => $user
										);
				} else {
					$dataUpdate = array(
									'pro_name'             => $params['name'],
									'pro_price'            => $params['price'],
									'pro_status'           => $params['status'],
									'pro_information'      => $params['info'],
									'pro_rewrite'          => $params['rewrite'],
									'pro_update_date'      => date('Y-m-d H:i:s',time()),
									'pro_user'             => $user
										);
				}
				// Update category product
				if (!empty($params['category'])) {
					// Kiem tra phan loai da chon neu co thi xoa
					if (!empty($data['category'])) {
						foreach ($data['category'] as $value) {
							$cateProId[] = $value['id'];
						}
						$this->model_cate_pro->deleteCatePro($cateProId);
					}
					// Them moi phan loai
					foreach ($params['category'] as $valueCatePro) {
						$insertCatePro[] = array(
											'cate_id' => $valueCatePro,
											'pro_id'  => $id
							);
					}
					for ($i=0; $i < count($insertCatePro); $i++) { 
						$this->model_cate_pro->insertCatePro($insertCatePro[$i]);
					}						
				}
				// Upload ảnh sản phẩm
				if ($_FILES['images']['name'][0] !=null) {
					// Kiểm tra ảnh sản phẩm nếu có thì xóa sau đó thêm mới
					if ($data['images'][0] != null) {
						foreach ($data['images'] as $image) {
							$deleteImage[] = $image['id'];
						}
						$this->model_pro_image->deleteProImage($deleteImage);
						$this->upload->delete_folder("upload/product/images/".$id);
					}
					$this->upload->upload_multi_file("upload/product/images/",$id);
					$images = $_FILES['images']['name'];
					foreach ($images as $valueImages) {
						$insertImage[] = array(
											'pro_id' => $id,		
											'image' => $valueImages		
							); 
					}
					for ($i=0; $i < count($insertImage); $i++) { 
						$this->model_pro_image->insertProImage($insertImage[$i]);
					}
				}
				$this->model_product->updatePro($dataUpdate, $id);
				redirect('san-pham');
			}
			$this->load->view('layout/index', $data);
		}
		/**
		 * [delete product]
		 * @return [type] [description]
		 */
		public function delete()
		{
			$params = $this->input->post();
			$id = $params['id'];
			if ($id) {
				// Xoa bo san pham
				$this->model_product->deletePro($id);
				// Xoa bo phan loai san pham
				$this->model_cate_pro->deleteCatePro($id);
				// Xoa bo anh san pham
				$this->model_pro_image->deleteProImage($id);
				$this->upload->delete_multi_folder('upload/product/', $id);
				$this->upload->delete_multi_folder('upload/product/images/', $id);
			}
			redirect('san-pham');
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
			$this->form_validation->set_rules('price', 'lang:price', 'required');
			$this->form_validation->set_rules('info', 'lang:info', 'required');
			$this->form_validation->set_rules('rewrite', 'lang:rewrite', 'required');

			if ($this->form_validation->run() == false) {
				$flag = false;
			}
			return $flag;
		}
	}