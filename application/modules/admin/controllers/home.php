<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Class home
	* @author JosT
	* @date   Mar 2015
	*/
	class home extends BackEnd_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function index()
		{
			$data['home']     = "xin chao";
			$data['template'] = "home/index";
			$this->load->view('layout/index',$data);
		}
	}
?>