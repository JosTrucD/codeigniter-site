<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	/**
	* @author JosT
	* @date   May 2015
	*/
	class model_product extends CI_Model
	{
		protected $_table   = "tbl_product";
		protected $_primary = "pro_id";
		protected $_name    = "pro_name";
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		public function listPro()
		{
			$this->db->where('pro_status', 1)
					 ->limit(12)
					 ->order_by($this->_primary, 'RANDOM');
			return $this->db->get($this->_table)->result_array();
		}
		public function getPro($id)
		{
			$this->db->where($this->_primary, $id);
			return $this->db->get($this->_table)->row_array();
		}
		public function getCatePro($cate)
		{
			$this->db->join('tbl_category_product', 'tbl_category_product.pro_id = tbl_product.pro_id')
			         ->where('cate_id', $cate)
			         ->where('pro_status', 1);
			return $this->db->get($this->_table)->result_array();
			// debug($this->db->last_query());
		}
	}
 ?>