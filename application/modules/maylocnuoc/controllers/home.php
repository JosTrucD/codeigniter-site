<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Class home
	* @author JosT
	* @date   May 2015
	*/
	class home extends MX_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library(array('string'));
			$this->load->helper(array('recursive'));
			$this->load->model('admin/model_slider');
			$this->load->model('model_cate_pro');
			$this->load->model('model_category');
			$this->load->model('model_product');
			$this->load->helper('recursive');
		}
		/**
		 * [index home]
		 * @return [type] [description]
		 */
		public function index()
		{
			$data['template'] = 'home/index';
			$data['slider']   = $this->model_slider->listSlider(4);
			$category         = $this->model_category->listCate();
			$data['category'] = buildArr($category,'cate_name');
			$data['product']  = $this->model_product->listPro();
			$this->load->view('layout/index', $data);
		}
		public function detail()
		{
			$params    = $this->uri->segment(1);
			$paramsArr = explode('-', $params);
			$id        = end($paramsArr) ;
			$data['template'] = 'home/detail';
			$data['slider']   = $this->model_slider->listSlider(4);
			$category         = $this->model_category->listCate();
			$data['category'] = buildArr($category,'cate_name');
			$data['product']  = $this->model_product->getPro($id);
			$this->load->view('layout/index', $data);
		}
		public function listCatePro()
		{
			$data['template'] = 'home/list';
			$params = $this->uri->segment(2);
			$paramsArr = explode('-', $params);
			$id        = end($paramsArr) ;
			$data['slider']   = $this->model_slider->listSlider(4);
			$category         = $this->model_category->listCate();
			$data['category'] = buildArr($category,'cate_name');
			$data['title']    = $this->model_category->getCate($id);
			$data['product']  = $this->model_product->getCatePro($id);
			$this->load->view('layout/index', $data);
		}
	}
 ?>