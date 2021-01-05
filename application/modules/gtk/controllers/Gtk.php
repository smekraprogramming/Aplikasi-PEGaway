<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gtk extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Model_gtk','m_gtk');
		if($this->session->userdata('logged_in')['is_admin']!=1){
		      redirect('dashboard','refresh');

		}
	}

	public function index()
	{	
		$data['judul'] = 'Halaman Guru dan Tenaga Kependidikan';
		$data['title'] = 'Data Guru dan Tenaga Kependidikan';

		$this->template->load('v_gtk',$data);
	}

	public function ajax_list_gtk()
  {
        if ($this->input->is_ajax_request()) {
              # code...
              $status='';
              $list = $this->m_gtk->get_datatables();
              $data = array();
              $no = $_POST['start'];
              $is_admin='';
              foreach ($list as $l) {
                // $is_admin = '<br><strong> Is Admin : </strong>'.$l->is_admin == 1 ? 'Ya' : '';
                $is_admin = $l->is_admin == 1 ? '<br><span class="badge bg-red">Admin</span>' : '' ;
                  $no++;
                  $row = array();
                  $row[] = $no;
                  $row[] = $l->nama;
                  $row[] = $l->nip;
                  $row[] = $l->status;
                  $row[] = '<strong>Username : </strong> '.$l->username.' <br><strong>Token : </strong>'.$l->token;
                  $row[] = $l->is_active = 1 ? '<span class="badge bg-teal">aktif</span>'. $is_admin : '<span class="badge bg-red">nonaktif</span>'. $is_admin;
                  $row[] = '<a href="javascript:void(0);" onclick="nonaktifkan('.$l->idpegawai.')" title="Kunci" class="btn btn-xs btn-info waves-effect"><i class="material-icons">lock</i><span></span></a>
                            <a href="javascript:void(0);" title="Edit User" class="btn btn-xs btn-success waves-effect"><i class="material-icons">create</i><span></span></a>
                            <a href="javascript:void(0);" title="Hapus User" class="btn btn-xs btn-danger waves-effect"><i class="material-icons">delete</i><span></span></a>
                            <a href="javascript:void(0);" onclick="reset_token('.$l->idpegawai.')" title="Ganti Token" class="btn btn-xs btn-warning waves-effect"><i class="material-icons">refresh</i><span></span></a>
                             <a href="https://wa.me/'.$l->no_hp.'?text=Username Anda : '.$l->username.', Token : '.$l->token.' . Jika alami kendala hubungi Tim Kami. Hormat kami, Timplungan Team." title="Kirim Token lewat WA" class="btn btn-xs btn-success waves-effect"><i class="material-icons">send</i><span></span></a>
                            ';	 
                  // $row[] = '<img src="'.base_url().'/assets/foto_gtk/'.$l->foto.'" width="50" height="50" alt="1">';
                  $data[] = $row;
              }
  
              $output = array(
                              "draw" => $_POST['draw'],
                              "recordsTotal" => $this->m_gtk->count_all(),
                              "recordsFiltered" => $this->m_gtk->count_filtered(),
                              "data" => $data,
                      );
              //output to json format
  
              echo json_encode($output);
        }else{
            show_404();
        }
          
  }

	public function uploadData($value='')
  {
		// print_r($this->input->post());/
            if ($this->input->is_ajax_request()) {
                $path = 'uploads/';
                require_once APPPATH . "/third_party/PHPExcel.php";
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'xlsx|xls';
                $config['remove_spaces'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);            
                if (!$this->upload->do_upload('uploadFile')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                if(empty($error)){
                  if (!empty($data['upload_data']['file_name'])) {
                    $import_xls_file = $data['upload_data']['file_name'];
                } else {
                    $import_xls_file = 0;
                }
                $inputFileName = $path . $import_xls_file;
                
                try {
                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFileName);
                    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    $flag = true;
                    $i=0;
                    foreach ($allDataInSheet as $value) {
                      if($flag){
                        $flag =false;
                        continue;
                      }
                      $inserdata[$i]['nama'] = $value['A'];
                      $inserdata[$i]['nip'] = $value['B'];
                      $inserdata[$i]['no_hp'] = $value['G'];
                      $inserdata[$i]['tbl_status_id'] = $value['C'];
                      $inserdata[$i]['password'] = getHashedPassword($value['E']);
                      $inserdata[$i]['username'] = $value['D'];
                      $inserdata[$i]['token'] = $value['E'];
                      $inserdata[$i]['foto'] = $value['F'];
                      $i++;
                    }
                    $result = $this->db->insert_batch('pegawai',$inserdata);
                        // if($res){
                        //     return TRUE;
                        // }else{
                        //     return FALSE;
                        // }               
                    // $result = $this->m_datasiswa->import($inserdata);   
                    if($result){
                      echo "success";
                    }else{
                      echo "error";
                    }             
                    // redirect('akun','refresh');
              } catch (Exception $e) {
                   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                            . '": ' .$e->getMessage());
                }
              }else{
					echo "error";
                }
            }else{
				show_404();
			}
  }

  public function reset_gtk($var = null)
  {
    if ($this->input->is_ajax_request()) {
        // $id=trim($this->input->post('id', TRUE));
        // $this->db->where('*');
        $result=$this->db->empty_table('pegawai');;
        if ($result==true) {
            echo "success";
        }else{
            echo "failed";
        }
    }else{
        show_404();
    }
  }

  public function uploadFoto($value='')
  {
		// print_r($this->input->post());/
    if ($this->input->is_ajax_request())
    {
        $path = 'assets/foto_gtk/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'zip';
        $config['max_size']    = '';
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            echo 'error';
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $zip = new ZipArchive;
            $file = $data['upload_data']['full_path'];
            chmod($file,0777);
            if ($zip->open($file) === TRUE) {
                    $zip->extractTo('assets/foto_gtk/');
                    $zip->close();
                    echo 'success';
            } else {
                    echo 'error';
            }
        }              
    }else{
			show_404();
		}
  }

  public function hapus_siswa($var = null)
  {
    if ($this->input->is_ajax_request()) {
        $result=$this->db->delete('gtk', array('id_gtk' => $this->input->post('id')));  // Produces: // DELETE FROM mytable  // WHERE id = $id
        if ($result==true) {
            echo "success";
        }else{
            echo "failed";
        }
    }else{
        show_404();
    }
  }
  
   public function update_token($var = null)
  {
    if ($this->input->is_ajax_request()) {
        
        $data = array(
                'username' => strtolower(trim($this->input->post('username', TRUE))),
                'token' => strtoupper(trim($this->input->post('token', TRUE))),
                'password' => getHashedPassword(strtoupper(trim($this->input->post('token', TRUE))))
        );
        
        $this->db->where('idpegawai', $this->input->post('user_id', TRUE));
        $result = $this->db->update('pegawai', $data);
        print_r($this->input->post());
        if ($result==true) {
            echo "success";
        }else{
            echo "failed";
        }
    }else{
        show_404();
    }
  }
  
  public function get_usertoken($var = null)
  {
    if ($this->input->is_ajax_request()) {
        
        
        $query = $this->db->get_where('pegawai', array('idpegawai' => $this->input->post('id')),1)->row();
        echo json_encode($query, JSON_PRETTY_PRINT);
        
    }else{
        show_404();
    }
  }

}

/* End of file Controllername.php */

?>