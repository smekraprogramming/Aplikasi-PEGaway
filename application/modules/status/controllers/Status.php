<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Model_status','m_status');
    }
    
    public function index()
    {
    	$data['judul'] = 'Halaman Jenis Status GTK';
		$data['title'] = 'Data Jenis Status GTK';
		$this->template->load('v_status',$data);    
    }

    public function ajax_list_status()
    {
        if ($this->input->is_ajax_request()) {
              # code...
              $status='';
              $list = $this->m_status->get_datatables();
              $data = array();
              $no = $_POST['start'];
              foreach ($list as $l) {
                  $no++;

                  $row = array();
                  $row[] = $no;
                  $row[] = '<span class="badge bg-red">'.$l->idstatus.'</span>';
                  $row[] = $l->status;
                  $row[] = $l->masuk;
                  $row[] = $l->pulang;
                  $row[] = $l->is_active == 1 ? '<span class="badge bg-teal">aktif</span>' : '<span class="badge bg-red">nonaktif</span>';
				          // $row[] = $l->status == 1 ? 'Aktif' : 'Tidak Aktif';
                  $row[] = '
                            <a href="javascript:void(0);" title="Kunci" class="btn btn-xs btn-info waves-effect"><i class="material-icons">lock</i><span></span></a>
                            <a href="javascript:void(0);" title="Edit User" class="btn btn-xs btn-success waves-effect"><i class="material-icons">create</i><span></span></a>
                            <a href="javascript:void(0);" title="Hapus User" class="btn btn-xs btn-danger waves-effect"><i class="material-icons">delete</i><span></span></a>
                            <a href="javascript:void(0);" title="Ganti Token" class="btn btn-xs btn-warning waves-effect"><i class="material-icons">refresh</i><span></span></a>
                            ';	 
                  $data[] = $row;
              }
  
              $output = array(
                              "draw" => $_POST['draw'],
                              "recordsTotal" => $this->m_status->count_all(),
                              "recordsFiltered" => $this->m_status->count_filtered(),
                              "data" => $data,
                      );
              //output to json format
  
              echo json_encode($output);
        }else{
            show_404();
        }
          
    }

}

/* End of file Status.php */

?>