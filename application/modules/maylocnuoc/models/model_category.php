<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* @author JosT
	* @date   Apr 2015
	*/
	class model_category extends CI_Model
	{
		protected $_table   = "tbl_category";
		protected $_primary = "cate_id";
		protected $_name    = "cate_name";
		protected $_parent  = "cate_parent";
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		public function listCate()
		{
			$this->db->where('cate_status', 1);
			return $this->db->get($this->_table)->result_array();
		}
		public function getCate($id)
		{
			$this->db->where($this->_primary, $id);
			return $this->db->get($this->_table)->row_array();
		}
		public function getParent($value)
		{
			$this->db->where($this->_parent, $value);
			return $this->db->get($this->_table)->result_array();
		}
	}
 ?>