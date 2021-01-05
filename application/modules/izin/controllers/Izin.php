<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Izin extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

    public function index()
    {
        $data['judul'] = 'Izin GTK';
		$data['title'] = 'Izin GTK';
		$data['ket_izin'] = 'belum';
		// print_r($this->session->
		$data = array(
			'tanggal' => date('y-m-d'),
			'idpegawai' => $this->session->userdata('logged_in')['id_user'],
			'keterangan !=' => NULL
		);
		$query = $this->db->get_where('presensi', $data);
		
		if ($query->num_rows() > 0) {
			// $dt=$query->row();
			$data['ket_izin'] = 'sudah';
			
		}
		$this->template->load('v_izin',$data);
	}
	
	public function simpan_izin($var = null)
	{
		if ($this->input->is_ajax_request()) {
			
		// print_r($this->input->post())   ;
		$config['upload_path']          = './uploads/izin/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		// $config['max_size']             = 400;
		$config['encrypt_name']         = TRUE;
		// $config['max_width']            = 600;
		// $config['max_height']           = 600;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('userfile'))
		{
				$error = array('error' => $this->upload->display_errors());
				// print_r($error);
				// $this->session->set_flashdata('error',err_msg('File tidak terupload'));
				// redirect('makanan/tambah','refresh');
				echo 'gagal';
				// $this->load->view('upload_form', $error);
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());
				$data2 = array(
					'tanggal' => date('y-m-d'),
					'idpegawai' => $this->session->userdata('logged_in')['id_user'],
					'keterangan' => $this->input->post('ket'),
					'masuk' => date("H:i:s"),
					'longtitude_masuk' => $this->input->post('longtitude'),
					'latitude_masuk' => $this->input->post('latitude'),
					'pulang' => date("H:i:s"),
					'longtitude_pulang' => $this->input->post('longtitude'),
					'latitude_pulang' => $this->input->post('latitude'),
				);
				$this->db->insert('presensi', $data2);
				// redirect('makanan','refresh');
				// print_r($data2);
				// $this->load->view('upload_success', $data);
				echo 'success';
				// print_r($data2);
		}

		}else{
			show_404();
		}
	}

}

/* End of file Izin.php */


?>