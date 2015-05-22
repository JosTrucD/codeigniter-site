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
		// Danh sach product
		public function listPro($limit, $start)
		{
			$this->db->limit($limit, $start);
			return $this->db->get($this->_table)->result_array();
		}
		public function totalPro()
		{
			return $this->db->get($this->_table)->num_rows();
		}
		public function insertPro($value)
		{
			$this->db->insert($this->_table,$value);
		}
		public function updatePro($value,$id)
		{
			$this->db->where($this->_primary,$id)
			         ->update($this->_table,$value);
		}
		// Lay san pham theo id
		public function getPro($id)
		{
			$this->db->where($this->_primary,$id);
			return $this->db->get($this->_table)->row_array();
		}
		// Lay san pham theo ten
		public function getProName($value)
		{
			$this->db->where($this->_name,$value);
			return $this->db->get($this->_table)->row_array();
		}
		public function deletePro($id)
		{
			$this->db->where_in($this->_primary,$id);
			$this->db->delete($this->_table);
		}
		public function checkInsert($name)
		{
			$this->db->where($this->_name, $name);
			return $this->db->get($this->_table)->num_rows();
		}
	}
 ?>