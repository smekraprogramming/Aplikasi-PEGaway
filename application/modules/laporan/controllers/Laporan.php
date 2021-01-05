<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		is_logged_in();
		if($this->session->userdata('logged_in')['is_admin']!=1){
		      redirect('dashboard','refresh');

		}
	}

    public function index()
    {
        $data['judul'] = 'Laporan';
		$data['title'] = 'Laporan';
		// print_r($this->session->
		$this->template->load('v_laporan',$data);
    }
    
     public function show_laporan($var = null)
    {
        if ($this->input->is_ajax_request()) {
            // print_r($this->input->post());
            $header_tgl='<th>No</th><th>Nama</th>';
            // $begin = new DateTime($this->input->post('start_date'));
            // $end = new DateTime($this->input->post('end_date'));

            // for($i = $begin; $i <= $end; $i->modify('+1 day')){
            //     // echo $i->format("Y-m-d");
            //     $header_tgl.='<th>'.tgl_ind_lap($i->format("Y-m-d")).'</th>';
            // }

            $begin = new DateTime($this->input->post('start_date'));
            $end = new DateTime($this->input->post('end_date'));
            $end = $end->modify( '+1 day' ); 
            
            $interval = new DateInterval('P1D');
            $daterange = new DatePeriod($begin, $interval ,$end);

            foreach($daterange as $date){
                // echo $date->format("Ymd") . "<br>";
                $header_tgl.='<th>'.tgl_ind_lap($date->format("Y-m-d")).'</th>';

            }
            
            // die();
           
            $tbl='';
            $tbl_in='';
            // $data_gtk = $this->db->get_where('pegawai', array('tbl_status_id ' != 0))->result();
            $this->db->select('idpegawai,nama,tbl_status_id');
            $this->db->from('pegawai');
            $this->db->where('tbl_status_id != 0');
            $query = $this->db->get()->result();
            $no=1;
            foreach ($query as $peg) {
                $tbl.='<tr>
                        <td>'.$no.'</td>
                        <td>'.$peg->nama.'</td>
                        ';
                $idp=$peg->idpegawai;

                foreach($daterange as $date){
                        $q = $this->db->get_where('presensi', array('idpegawai' => $peg->idpegawai,'tanggal' => $date->format("Y-m-d")));

                         if ($q->num_rows() > 0 ) {
                            $log=$q->row();
                            // $tbl_in.='<td>'.$log->masuk.'ada'.$log->pulang.'</td>';
                            if ( $log->keterangan == NULL ) {
                                $in = ($log->masuk != NULL ) ? date("H:i", strtotime($log->masuk)) : ' ' ;
                                $out = ($log->pulang != NULL ) ? date("H:i", strtotime($log->pulang)) : ' ' ;
    
                                $tbl.='<td>'.$in.' - '.$out.'</td>';
                            } else {
                                $tbl.='<td>'.$log->keterangan.'</td>';
                            }
                        }else{
                            $tbl.='<td>-</td>';

                        }
                        // $tbl_in.= '<td>'.$idp.'</td>';
                    // echo $date->format("Ymd") . "<br>";
                }
    
                $tbl.='</tr>';
                $no++;
            }
            // print_r($query);
            $html='<div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-xs-1" style="text-align:right;">
                            <img src="'.base_url().'/assets/images/logo-sekolah.png"/>
                            </div>
                            <div class="col-xs-11">
                            <h2><strong> PEMERINTAH PROVINSI JAWA TIMUR</strong></h2>
                            <h2><strong> DINAS PENDIDIKAN</strong></h2>
                            <h2><strong> SMK NEGERI 2 NGANJUK</strong></h2>
                            <h2>Jl. Lawu No. 3  Kramat Nganjuk</h2>
                            </div>
                        </div>
                        
                    </div>
                    <div class="body">            
                        <div class="table-responsive">
                            
                            <div class="col-md-12" style="text-align:left;">
                            <h4 class="col-pink"><strong> LAPORAN ABSENSI GURU DAN TENAGA KEPENDIDIKAN</strong></h4>
                            <h4 class="col-pink"><strong> Bulan : '.judul_bulan_lap($this->input->post('start_date')).'</strong></h4>
                            </div>


                            <table class="table table-bordered table-striped table-hover" id="sample_1">
                                <thead>
                                    <tr>'.$header_tgl.'</tr>
                                </thead>
                                <tbody>'.$tbl.'</tbody>
                            </table>
                        </div>
                            <div class="col-xs-6 col-xs-offset-2">
                                Mengetahui,<br>
                                Kepala SMKN 2 Nganjuk
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <strong>Dra. YATINI, M.Si</strong><br>
                                NIP.19650923 199412 2 002
                            </div>
                            <div class="col-xs-4">
                                Nganjuk, '.tgl_ttd(date('Y-m-d')).'<br>
                                Ka.TAS
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <strong>ROKHMAD, S.Pd</strong><br>
                                NIP.19660309 199010 1 001
                            </div>

                        <div class="row">
                            <div class="col-md-12">
                                <strong><i class="col-teal">Dicetak melalui Absensi Online SMK Negeri 2 Nganjuk ( APK PEGaway ) pada hari : '.tgl_ind(date("Y-m-d")).'</i></strong>
                            </div>
                        </div>
                    </div>
                </div>';
            echo $html;
        } else {
            # code...
            show_404();
        }
        
    }
    
    public function harian()
    {
        $data['judul'] = 'Laporan harian';
		$data['title'] = 'Laporan harian';
		// print_r($this->session->
		$this->template->load('v_harian',$data);
    }

    public function show_laporan_harian($var = null)
    {
        if ($this->input->is_ajax_request()) {
            // print_r($this->input->post());
            $header_tgl='<th>No</th>
                        <th>Nama</th>
                        <th>Chek In - Check Out</th>
                        <th>Jarak Masuk</th>
                        <th>Jarak Pulang</th>
                        <th>Aksi</th>
                        ';
         
           
            // die();
           
            $tbl='';
            $tbl_in='';
            // $data_gtk = $this->db->get_where('pegawai', array('tbl_status_id ' != 0))->result();
            $this->db->select('idpegawai,nama,tbl_status_id');
            $this->db->from('pegawai');
            $this->db->where('tbl_status_id != 0');
            $query = $this->db->get()->result();
            $no=1;
            foreach ($query as $peg) {
                $tbl.='<tr>
                        <td>'.$no.'</td>
                        <td>'.$peg->nama.'</td>
                        ';
                $idp=$peg->idpegawai;

                
                        $q = $this->db->get_where('presensi', array('idpegawai' => $peg->idpegawai,'tanggal' => $this->input->post('start_date')));

                         if ($q->num_rows() > 0 ) {
                            $log=$q->row();
                            // $tbl_in.='<td>'.$log->masuk.'ada'.$log->pulang.'</td>';
                            if ( $log->keterangan == NULL ) {
                                $in = ($log->masuk != NULL ) ? date("H:i", strtotime($log->masuk)) : ' ' ;
                                $out = ($log->pulang != NULL ) ? date("H:i", strtotime($log->pulang)) : ' ' ;
    
                                $tbl.='<td>'.$in.' - '.$out.'</td>';
                                $tbl.='<td>'.$log->jarak_masuk.' m</td>
                                        <td>'.$log->jarak_pulang.' m</td>
                                        <td>
                                            <a href="javascript:void(0);" onclick="edit_absen('.$log->idpresensi.')" title="Edit" class="btn btn-xs btn-info waves-effect"><i class="material-icons">mode_edit</i><span></span></a>
                                            <a href="javascript:void(0);" onclick="hapus_absen('.$log->idpresensi.')" title="Hapus" class="btn btn-xs btn-danger waves-effect"><i class="material-icons">delete</i><span></span></a>
                                            <a href="javascript:void(0);" onclick="reset_absen('.$log->idpresensi.')" title="Reset Pulang" class="btn btn-xs btn-warning waves-effect"><i class="material-icons">refresh</i><span></span></a>
                                        </td>';
                            } else {
                                $tbl.='<td>'.$log->keterangan.' m</td>';
                                $tbl.='<td>'.$log->jarak_masuk.' m</td>
                                <td>'.$log->jarak_pulang.'</td>
                                <td>
                                    <a href="javascript:void(0);" onclick="edit_absen('.$log->idpresensi.')" title="Edit" class="btn btn-xs btn-info waves-effect"><i class="material-icons">mode_edit</i><span></span></a>
                                    <a href="javascript:void(0);" onclick="hapus_absen('.$log->idpresensi.')" title="Hapus" class="btn btn-xs btn-danger waves-effect"><i class="material-icons">delete</i><span></span></a>
                                    <a href="javascript:void(0);" onclick="reset_absen('.$log->idpresensi.')" title="Reset Pulang" class="btn btn-xs btn-warning waves-effect"><i class="material-icons">refresh</i><span></span></a>
                                </td>';
                            }
                        }else{
                            $tbl.='<td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                         ';
                            

                        }
                   
               
                $tbl.='</tr>';
                $no++;
            }
            // print_r($query);
            $html='<div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-xs-1" style="text-align:right;">
                            <img src="'.base_url().'/assets/images/logo-sekolah.png"/>
                            </div>
                            <div class="col-xs-11">
                            <h2><strong> PEMERINTAH PROVINSI JAWA TIMUR</strong></h2>
                            <h2><strong> DINAS PENDIDIKAN</strong></h2>
                            <h2><strong> SMK NEGERI 2 NGANJUK</strong></h2>
                            <h2>Jl. Lawu No. 3  Kramat Nganjuk</h2>
                            </div>
                        </div>
                        
                    </div>
                    <div class="body">            
                        <div class="table-responsive">
                            
                            <div class="col-md-12" style="text-align:left;">
                            <h4 class="col-pink"><strong> LAPORAN HARIAN</strong></h4>
                            <h4 class="col-pink"><strong> Tanggal : '.tgl_ttd($this->input->post('start_date')).'</strong></h4>
                            </div>


                            <table class="table table-bordered table-striped table-hover" id="sample_1">
                                <thead>
                                    <tr>'.$header_tgl.'</tr>
                                </thead>
                                <tbody>'.$tbl.'</tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <strong><i class="col-teal">Dicetak melalui Absensi Online SMK Negeri 2 Nganjuk ( APK PEGaway ) pada hari : '.tgl_ind(date("Y-m-d")).'</i></strong>
                            </div>
                        </div>
                    </div>
                </div>';
            echo $html;
        } else {
            # code...
            show_404();
        }
        
    }
    
    public function reset_pulang($var = null)
	{
    	if ($this->input->is_ajax_request()) {
    
                $data_update = array(
    				'pulang' => NULL,
    				'longtitude_pulang' => NULL,
    				'latitude_pulang' => NULL,
    				'jarak_pulang' => NULL,
    				'ip_pulang' => NULL
    			);
    			$query=$this->db->update('presensi', $data_update, array('idpresensi' => $this->input->post('id')));
    			if ($query==true) {
    				echo 'success';
    			}else{
    				echo 'failed';
    			}
    	}else{
    		show_404();
    	}
	}
	
	public function hapus_absen($var = null)
	{
    	if ($this->input->is_ajax_request()) {
    			$query=$this->db->delete('presensi', array('idpresensi' => $this->input->post('id')));  // Produces: // DELETE FROM mytable  // WHERE id = $id
    			if ($query==true) {
    				echo 'success';
    			}else{
    				echo 'failed';
    			}
    	}else{
    		show_404();
    	}
	}
	
	public function update_absen($var = null)
    {
    if ($this->input->is_ajax_request()) {
        
        $data = array(
                'masuk' => trim($this->input->post('masuk', TRUE)),
                'jarak_masuk' => trim($this->input->post('jarak_masuk', TRUE)),
                'pulang' => trim($this->input->post('pulang', TRUE)),
                'jarak_pulang' => trim($this->input->post('jarak_pulang', TRUE))
        );
        
        $this->db->where('idpresensi', $this->input->post('idpresensi', TRUE));
        $result = $this->db->update('presensi', $data);
        // print_r($this->input->post());
        if ($result==true) {
            echo "success";
        }else{
            echo "failed";
        }
    }else{
        show_404();
    }
  }
  
    public function get_ceklog($var = null)
    {
    if ($this->input->is_ajax_request()) {
        
        
        $query = $this->db->get_where('presensi', array('idpresensi' => $this->input->post('id')),1)->row();
        echo json_encode($query, JSON_PRETTY_PRINT);
        
    }else{
        show_404();
    }
  }

}

/* End of file Laporan.php */

?>