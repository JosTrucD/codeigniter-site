<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	/**
	* @author JosT
	* @date   May 2015
	*/
	class model_slider extends CI_Model
	{
		protected $_table   = "tbl_slider";
		protected $_primary = "id";
		protected $_name    = "name";
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		// Danh sach slider
		public function listSlider($limit, $start = "")
		{
			if ($start != null) {
				$this->db->limit($limit, $start);
			}
			$this->db->limit($limit);
			return $this->db->get($this->_table)->result_array();
		}
		public function totalSlider()
		{
			return $this->db->get($this->_table)->num_rows();
		}
		public function insertSlider($value)
		{
			$this->db->insert($this->_table,$value);
		}
		public function updateSlider($value,$id)
		{
			$this->db->where($this->_primary,$id)
			         ->update($this->_table,$value);
		}
		public function getSlider($id)
		{
			$this->db->where($this->_primary,$id);
			return $this->db->get($this->_table)->row_array();
		}
		// Get slider of name
		public function getName($value)
		{
			$this->db->where($this->_name,$value);
			return $this->db->get($this->_table)->row_array();
		}
		public function deleteSlider($id)
		{
			$this->db->where_in($this->_primary,$id);
			$this->db->delete($this->_table);
		}
		public function checkInsert($value)
		{
			$this->db->where($this->_name,$value);
			return $this->db->get($this->_table)->num_rows();
		}
	}
 ?>