<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_app extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        
    }

    public function insert($table,$data)
    {
        $query = $this->db->insert( $table, $data);
        return $query ? TRUE : FALSE ;
    }

    public function deleteData($table,$key,$id)
    {
        return $this->db->delete($table, array($key => $id)) ? TRUE : FALSE ;
    }

    public function selectData($table,$key=null,$id=null)
    {
        if (!is_null($key) && !is_null($id)) {
            // return $this->db->get_where($table, array($key => $id));
            $this->db->where('md5(concat("app",'.$key.'))',($id)); //which row want to upgrade  
            return $this->db->get($table);
        }else{
            return $this->db->get($table); 
        }
        
    }

    public function updateData($table,$data,$id)
    {
        // $this->db->update($table, $data, array($key => $id));
        $this->db->where('md5(concat("app",id))',($id)); //which row want to upgrade  
        $this->db->update($table, $data);
        return true;
    }

    public function check_data_exist($table,$key,$param)
    {
        return $this->db->get_where($table, array($key => $param));
    }

    public function inactive($table,$field,$key,$id)
    {
        $this->db->set($field,FALSE); //value that used to update column  
        $this->db->where($key, $id); //which row want to upgrade  
        return $this->db->update($table) ? TRUE : FALSE ;  //table name
    }

    public function deactivated($table,$field,$id,$pk='id')
    {
        $this->db->set($field,FALSE); //value that used to update column  
        $this->db->where('md5(concat("app",'.$pk.'))',($id)); //which row want to upgrade  
        return $this->db->update($table) ? TRUE : FALSE ;  //table name
    }

    public function deactivated_thak($table,$field,$id)
    {
        $this->db->set($field,TRUE); //value that used to update column  
        $this->db->where('md5(concat("app",id_thak))',($id)); //which row want to upgrade  
        return $this->db->update($table) ? TRUE : FALSE ;  //table name
    }

    public function activated($table,$field,$id,$pk='id')
    {
        $this->db->set($field,TRUE); //value that used to update column  
        $this->db->where('md5(concat("app",'.$pk.'))',($id)); //which row want to upgrade  
        return $this->db->update($table) ? TRUE : FALSE ;  //table name
    }

    public function get($table,$select='*',$where_arr=null,$join=null)
    {
        $this->db->select($select);
        $this->db->from($table);
        if (!is_null($join)) {
            foreach ($join as $d) {
                $this->db->join($d['tbl'], $d['val']);
            }
        }
        if (!is_null($where_arr)) {
            $this->db->where($where_arr);
        }
        $query = $this->db->get();
        return $query;
    }

    public function manualQuery($q)
    {
        return $this->db->query($q);
    }
}

/* End of file Model_app.php */
/* Location: ./application/models/Model_app.php */