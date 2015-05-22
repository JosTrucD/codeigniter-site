<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	/**
	* @author JosT
	* @date   Mar 2015
	*/
	class model_user extends CI_Model
	{
		protected $_table   = "tbl_user";
		protected $_primary = "id";
		protected $_name    = "name";
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		// Danh sach user
		public function listUser($limit, $start)
		{
			$this->db->limit($limit, $start);
			return $this->db->get($this->_table)->result_array();
		}
		public function totalUser()
		{
			return $this->db->get($this->_table)->num_rows();
		}
		public function insertUser($value)
		{
			$this->db->insert($this->_table,$value);
		}
		public function updateUser($value,$id)
		{
			$this->db->where($this->_primary,$id)
			         ->update($this->_table,$value);
		}
		public function getUser($id)
		{
			$this->db->where($this->_primary,$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function deleteUser($id)
		{
			$this->db->where_in($this->_primary,$id);
			$this->db->delete($this->_table);
		}
		// Check login
		public function checkLogin($name,$password)
		{
			$this->db->where('name'    ,$name);
			$this->db->where('password',md5($password));
			return $this->db->get($this->_table)->num_rows();
		}
		public function checkInsert($value)
		{
			$this->db->where($this->_name,$value);
			return $this->db->get($this->_table)->num_rows();
		}
	}
 ?>