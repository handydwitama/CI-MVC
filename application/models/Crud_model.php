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

    public function get_user($id)
	{   
	    $query = $this->db->get_where('username', array('id' => $id));
	    return $query->row_array();
    }

    public function get_barang($id)
	{   
	    $query = $this->db->get_where('master_barang', array('id_barang' => $id));
	    return $query->row_array();
    }

    public function addbarang($data) {        
        $condition = "nama_barang =" . "'" . $data['nama_barang'] . "'";
        $this->db->select('*');
        $this->db->from('master_barang');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            $this->db->insert('master_barang', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
        return false;
        }
    }

    public function get_laporan_user()
    {
        $this->db->select('list_pembelian.id_pembelian, list_pembelian.id_user, username.nama, list_pembelian.tanggal, SUM(jumlah) AS jml');
        $this->db->from('list_pembelian');
        $this->db->join('username', 'username.id = list_pembelian.id_user', 'inner');
        $this->db->group_by('username.nama');
        $this->db->order_by('list_pembelian.tanggal', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_detail_laporan1($nama)
    {
        $this->db->select('list_pembelian.id_pembelian, list_pembelian.tanggal, username.nama, master_barang.nama_barang,
        list_pembelian.qty, list_pembelian.jumlah');
        $this->db->from('list_pembelian');
        $this->db->join('username', 'username.id = list_pembelian.id_user', 'inner');
        $this->db->join('master_barang', 'master_barang.id_barang = list_pembelian.id_barang', 'inner');
        $this->db->where('username.nama', $nama);
        $this->db->order_by('list_pembelian.id_pembelian', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_laporan_date()
    {
        $this->db->select('list_pembelian.id_pembelian, username.nama, list_pembelian.tanggal, SUM(jumlah) AS jml');
        $this->db->from('list_pembelian');
        $this->db->join('username', 'username.id = list_pembelian.id_user', 'inner');
        $this->db->group_by('list_pembelian.id_pembelian');
        $this->db->order_by('list_pembelian.id_pembelian', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_detail_laporan2($id)
    {
        $this->db->select('list_pembelian.id_pembelian, list_pembelian.tanggal, username.nama, master_barang.nama_barang,
        list_pembelian.qty, list_pembelian.jumlah');
        $this->db->from('list_pembelian');
        $this->db->join('username', 'username.id = list_pembelian.id_user', 'inner');
        $this->db->join('master_barang', 'master_barang.id_barang = list_pembelian.id_barang', 'inner');
        $this->db->where('list_pembelian.id_pembelian', $id);
        $this->db->order_by('list_pembelian.tanggal', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    
        
}



?>