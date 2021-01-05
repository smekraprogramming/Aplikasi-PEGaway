<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
// 		is_logged_in();
// 		$this->load->model('Model_status','m_status');
    }
    
    public function index()
    {
    	$data['judul'] = 'Maintenance';
		$data['title'] = 'Maintenance';
		$this->load->view('v_maintenance',$data);    
    }


}

/* End of file Status.php */

?>