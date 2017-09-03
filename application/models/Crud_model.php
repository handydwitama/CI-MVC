<?php
class Crud_model extends CI_Model {

    public function __construct()
    {
             
        $this->load->database();
    }

    public function login($data)
    {
        $n = $data['username'];
        $p = $data['password'];
        $this->db->select('*');
        $this->db->from('username');
        $this->db->where('nama', $n);
        $this->db->where('password', $p);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return true;
        }else{
            return false;
        }
        
    }
	    
    public function get_all_user($id = FALSE)
	{   
	    if ($id === FALSE)
	    {
	        $query = $this->db->get('username');
	        return $query->result_array();
		}

	    $query = $this->db->get_where('username', array('id' => $id));
	    return $query->row_array();
    }
    
    public function user_info($username) 
    {
        $condition = "nama =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('username');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function regist($data) {
        
        
        $condition = "nama =" . "'" . $data['nama'] . "'";
        $this->db->select('*');
        $this->db->from('username');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            $this->db->insert('username', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
        return false;
        }
    }

    public function get_all_barang($id_barang = FALSE)
	{   
	    if ($id_barang === FALSE)
	    {
	        $query = $this->db->get('master_barang');
	        return $query->result_array();
		}

	    $query = $this->db->get_where('master_barang', array('id_barang' => $id_barang));
	    return $query->row_array();
    }

    
        
}



?>