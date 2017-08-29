<?php
class Crud_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
    }

    public function login($data)
    {
        $this->db->select('*');
        $this->db->from('username');
        $this->db->where('nama', $data['nama']);
        $this->db->where('password', $data['password']);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result_array();
        }
        
    }
	    
    public function get_list($id = FALSE)
	{   
	    if ($id === FALSE)
	    {
	        $query = $this->db->get('username');
	        return $query->result_array();
		}

	    $query = $this->db->get_where('news', array('id' => $id));
	    return $query->row_array();
	}
}



?>