<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* @author JosT
	* @date   Apr 2015
	*/
	class model_news extends CI_Model
	{
		protected $_table   = "tbl_news";
		protected $_primary = "id";
		protected $_name    = "name";
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		public function listNews($limit, $start)
		{
			$this->db->limit($limit, $start);
			return $this->db->get($this->_table)->result_array();
		}
		public function insertNews($value)
		{
			$this->db->insert($this->_table,$value);
		}
		public function updateNews($value,$id)
		{
			$this->db->where($this->_primary,$id);
			$this->db->update($this->_table,$value);
		}
		public function deleteNews($id)
		{
			$this->db->where_in($this->_primary,$id);
			$this->db->delete($this->_table);
		}
		public function getNews($id)
		{
			$this->db->where($this->_primary, $id);
			return $this->db->get($this->_table)->row_array();
		}
		public function getTotal()
		{
			return $this->db->get($this->_table)->num_rows();
		}
		public function checkInsert($value)
		{
			$this->db->where($this->_name,$value);
			return $this->db->get($this->_table)->num_rows();
		}
	}
 ?>