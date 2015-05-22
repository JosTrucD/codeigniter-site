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
			return $this->db->get($this->_table)->result_array();
		}
		public function insertCate($value)
		{
			$this->db->insert($this->_table,$value);
		}
		public function updateCate($value,$id)
		{
			$this->db->where($this->_primary,$id);
			$this->db->update($this->_table,$value);
		}
		public function deleteCate($id)
		{
			$this->db->where_in($this->_primary,$id);
			$this->db->delete($this->_table);
		}
		public function getCate($id)
		{
			$this->db->where($this->_primary, $id);
			return $this->db->get($this->_table)->row_array();
		}
		public function getParent($value)
		{
			$this->db->where($this->_parent, $value);
			return $this->db->get($this->_table)->row_array();
		}
		public function checkInsert($value)
		{
			$this->db->where($this->_name,$value);
			return $this->db->get($this->_table)->num_rows();
		}
	}
 ?>