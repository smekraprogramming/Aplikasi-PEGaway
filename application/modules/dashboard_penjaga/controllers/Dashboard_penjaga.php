<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_penjaga extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in')['status_id']!=6) {
			redirect('dashboard','refresh');
		}
		// $this->load->model('Model_dashboard','m_dash');
		is_logged_in();
	}

	public function index()
	{	
		$data['judul'] = 'Dashboard';
		$data['title'] = 'Dashboard';
		// print_r($this->session->
		$this->template->load('dashboard_penjaga',$data);
	}

	public function get_detail($var = null)
	{
		if ($this->input->is_ajax_request()) {
			# code...
			$data = array(
				'tanggal' => date('y-m-d'),
				'idpegawai' => $this->session->userdata('logged_in')['id_user']
			);
			$query = $this->db->get_where('presensi', $data);
			// print_r($query);
			$html='';

			if ($query->num_rows() > 0) {
				$dt=$query->row();
				$disabled ='';
				if ($dt->pulang!=null) {
					$disabled ='disabled';
				}
				
				$izin = ($dt->keterangan == NULL) ? '' : '<li><span id="ket-izin"><strong class="font-bold col-pink"> Keterangan : '.$dt->keterangan.'</strong></span></li>' ;

				$html=' <ul>
							<li>
								<span class="label label-danger">Pulang</span>
								<span id="check-masuk"><strong class="font-bold col-teal">'.$dt->masuk.'</strong></span>
							</li>
							<li>
								<span class="label label-success">Masuk</span>
								<span id="check-pulang"><strong class="font-bold col-pink">'.$dt->pulang.'</strong></span>
							</li>
							'.$izin.'
						</ul>
						<button class="btn btn-danger btn-lg waves-effect btn-block '.$disabled.'" data-toggle="modal" data-target="#defaultModal">Check - Out</button>
					';
			}else{
				$html=' <ul>
							<li>
								<span class="label label-danger">Pulang</span>
								<span id="check-masuk">00:00:00</span>
							</li>
							<li>
								<span class="label label-success">Masuk</span>
								<span id="check-pulang">00:00:00</span>
							</li>
						</ul>
						<button class="btn btn-primary btn-lg waves-effect btn-block" data-toggle="modal" data-target="#defaultModal">Check - In</button>
					';
			}
			echo $html;
		}else{
				
		}
	}

	public function simpan_absen($var = null)
	{
		if ($this->input->is_ajax_request()) {

			$data = array(
				'tanggal' => date('y-m-d'),
				'idpegawai' => $this->session->userdata('logged_in')['id_user']
			);
			$query = $this->db->get_where('presensi', $data);

			if ($query->num_rows() > 0) {
				
				$data_update = array(
					'pulang' => date("H:i:s"),
					'longtitude_pulang' => $this->input->post('longtitude'),
					'latitude_pulang' => $this->input->post('latitude'),
					'jarak_pulang' => $this->input->post('distance'),
				);
				$query=$this->db->update('presensi', $data_update, $data);
				if ($query==true) {
					echo 'success';
				}else{
					echo 'failed';
				}
			} else {
				$data = array(
						'tanggal' => date('y-m-d'),
						'idpegawai' => $this->session->userdata('logged_in')['id_user'],
						'masuk' => date("H:i:s"),
						'longtitude_masuk' => $this->input->post('longtitude'),
						'latitude_masuk' => $this->input->post('latitude'),
						'jarak_masuk' => $this->input->post('distance'),
				);
				// print_r($data);			
				$query=$this->db->insert('presensi', $data);
				if ($query==true) {
					echo 'success';
				}else{
					echo 'failed';
				}
			}
						
		}else{
			show_404();
		}
	}


}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */