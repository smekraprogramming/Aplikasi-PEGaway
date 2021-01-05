<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_frontend extends CI_Model {


	public function load($page,$data=array())
	{
		// $data['menu'] = $this->menu;
		$data['page'] = $this->load->view($page, $data, TRUE);
		$this->load->view('template/index_frontend', $data);
	}

}

/* End of file template.php */
/* Location: ./application/models/template.php */