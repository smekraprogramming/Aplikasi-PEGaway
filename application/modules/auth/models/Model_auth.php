<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_auth extends CI_Model {

    public $variable;

    public function __construct()
    {
        parent::__construct();
        
    }

    public function cek_login($us,$pw)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('status','status.idstatus=pegawai.tbl_status_id');
        $this->db->where('username',$us);
        // $this->db->where('is_active',1);
        $this->db->limit(1);
        $user = $this->db->get()->result();
        // $query = $this->db->get_where('admin', array('username' => $username),1);
        // // $user=$query->result();
        if(!empty($user)){
            if(password_verify($pw, $user[0]->password)==1){
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
        // return password_verify($pw,$password=$user[0]->password);
    }

}

/* End of file  */
/* Location: ./application/models/ */