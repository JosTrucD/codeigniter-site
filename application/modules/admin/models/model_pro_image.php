<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* @author JosT
	* @date   May 2015
	*/
	class model_pro_image extends CI_Model
	{
		protected $_table    = "tbl_pro_image";
		protected $_primary  = "id";
		protected $_product  = "pro_id";
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		public function insertProImage($value)
		{
			$this->db->insert($this->_table,$value);
		}
		public function deleteProImage($id)
		{
			$this->db->where_in($this->_product,$id);
			$this->db->delete($this->_table);
		}
		public function getProImage($value)
		{
			$this->db->where_in($this->_product,$value);
			return $this->db->get($this->_table)->result_array();
		}
	}
 ?>