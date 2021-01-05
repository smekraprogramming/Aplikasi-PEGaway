<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_auth', 'm_auth');
        //maintenance
        // redirect('maintenance','refresh');

      
    }

    public function index()
    {
        // if ($this->session->userdata('logged_in')) {
        //     redirect('dashboard','refresh');
        // }
    //    echo getHashedPassword('admin');
        if ($this->input->post()) {
               
            // print_r($this->input->post()); 
            // die(); 
            // validasi form untuk captcha
            //  $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|callback_valid_captcha');

             $this->form_validation->set_rules('username', 'Username', 'required|trim');
             $this->form_validation->set_rules('password', 'Password', 'required|trim');
             
             $this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');
             
             if ($this->form_validation->run() == TRUE)
             {
                 $cek=$this->_cek_login($this->input->post('username', TRUE),$this->input->post('password', TRUE));
                //  print_r($cek);
                //  die('true');
                 if ($cek==TRUE) {
                     // $this->session->set_flashdata('pesan',notif_err('Username atau Password Salah...!'));
                     // $data['tes']='Login berhasil';
                //    alihkan_login();
                    // $this->session->set_flashdata('error',succ_msg('Selamat Datang, '.$this->session->userdata('logged_in')['fullname']));
                    $this->session->set_flashdata('welcome',notif_success($this->session->userdata('logged_in')['nama_user']));
                    redirect('dashboard','refresh');

                 }else{
                    $this->session->set_flashdata('error',err_msg('Username atau Password Salah !'));
                }
                //  die('false');
             }else{
                $this->session->set_flashdata('error',err_msg('Captcha Tidak Valid !'));
             }
             
        }

        $data['title']='Login';
        // $data['captcha'] = $this->_set_captcha();
        $this->load->view('login',$data);
    }

    private function _cek_login()
    {
        $r=$this->m_auth->cek_login($this->input->post('username', TRUE),$this->input->post('password', TRUE));
        //  print_r($r);
        if ($r==TRUE) {
                foreach ($r as $row)
                {
                    $sess_array=array(
                                'id_user'=>$row->idpegawai,
                                'nama_user'=>$row->nama,
                                'nip'=>$row->nip,
                                'status_id'=>$row->tbl_status_id,
                                'status_user'=>$row->status,
                                'username'=>$row->username,
                                'foto'=>$row->foto,
                                'is_admin'=>$row->is_admin,

                        );
                     $this->session->set_userdata('logged_in',$sess_array);
                }
                // print_r($r);
                return TRUE;
        }else{
            // echo "gagal";
            return FALSE;
        }
    }


    private function _set_captcha()
    {
        $this->load->helper('string');
        $vals = array(
            'font_path'     => './assets/font/Candy Randy.ttf',
            'img_path' => './assets/captcha/',
            'img_url' => base_url().'assets/captcha/',
            'img_width' => '250',
            'img_height' => 40,
            'font_size'=>20,
            'expiration' => 7200,
            'word'  =>random_string('numeric', 6)
        );
        
        $cap = create_captcha($vals);
        
        $data = array(
            'captcha_time' => $cap['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word']
        );
        
        $query = $this->db->insert_string('captcha', $data);
        $this->db->query($query);
        return $cap;
    }

    function valid_captcha($str)
    {
        // First, delete old captchas
        $expiration = time()-7200; // Two hour limit
        $this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
        
        // Then see if a captcha exists:
        $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
        $binds = array($str, $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();

        if ($row->count == 0)
        {
            $this->form_validation->set_message('valid_captcha', 'Capctha tidak valid');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect(site_url('auth'));
    }

}

/* End of file  */
/* Location: ./application/controllers/ */