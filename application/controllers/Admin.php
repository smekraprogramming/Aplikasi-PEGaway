<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('username')=="") {
		// 	redirect('login');
		// }
		is_logged_in();
	}

    public function index()
    {
        $data['judul'] = 'Admin';
		$data['title'] = 'Admin';

		$this->load->view('template/index',$data);
    }

}

/* End of file Admin.php */

?>