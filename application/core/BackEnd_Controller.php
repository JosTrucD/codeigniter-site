<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
*
*/
class BackEnd_Controller extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$sessionName = $this->session->userdata('name');
		if (!isset($sessionName) || $sessionName == null) {
			session_destroy();
			redirect('dang-nhap');
		}
	}
}
 ?>