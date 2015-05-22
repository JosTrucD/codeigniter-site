<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* @author JosT
	* @date   May 2015
	*/
	class model_cate_pro extends CI_Model
	{
		protected $_table    = "tbl_category_product";
		protected $_primary  = "id";
		protected $_category = "cate_id";
		protected $_product  = "pro_id";
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		public function insertCatePro($value)
		{
			$this->db->insert($this->_table,$value);
		}
		public function deleteCatePro($id)
		{
			$this->db->where_in($this->_product,$id);
			$this->db->delete($this->_table);
		}
		public function getCatePro($value)
		{
			$this->db->where($this->_product, $value);
			return $this->db->get($this->_table)->result_array();
		}
		public function getCate($value)
		{
			$this->db->where($this->_category, $value);
			return $this->db->get($this->_table)->result_array();
		}
	}
 ?>