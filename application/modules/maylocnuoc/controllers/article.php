<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Class article
	* @author JosT
	* @date   May 2015
	*/
	class article extends MX_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library(array('string'));
			$this->load->helper(array('recursive'));
			$this->load->model('admin/model_slider');
			$this->load->model('admin/model_news');
			$this->load->model('model_cate_pro');
			$this->load->model('model_category');
			$this->load->model('model_product');
			$this->load->helper('recursive');
		}
		public function index()
		{
			$data['template'] = 'article/news';
			$data['slider']   = $this->model_slider->listSlider(4);
			$category         = $this->model_category->listCate();
			$data['category'] = buildArr($category,'cate_name');
			$this->load->view('layout/index', $data);
		}
		public function intro()
		{
			$data['template'] = 'article/intro';
			$data['slider']   = $this->model_slider->listSlider(4);
			$category         = $this->model_category->listCate();
			$data['category'] = buildArr($category,'cate_name');
			$data['intro']    = $this->model_news->getNews(1);
			$this->load->view('layout/index', $data);
		}
		public function help()
		{
			$data['template'] = 'article/help';
			$data['slider']   = $this->model_slider->listSlider(4);
			$category         = $this->model_category->listCate();
			$data['category'] = buildArr($category,'cate_name');
			$data['help']     = $this->model_news->getNews(2);
			$this->load->view('layout/index', $data);

		}
		public function contract()
		{
			$data['block']    = 'article/contract';
			$data['slider']   = $this->model_slider->listSlider(4);
			$category         = $this->model_category->listCate();
			$data['category'] = buildArr($category,'cate_name');
			$this->load->view('layout/index', $data);
		}
	}