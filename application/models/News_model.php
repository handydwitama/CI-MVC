<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
}

public function get_news($jumlah = FALSE)
{
        if ($jumlah === FALSE)
        {
                $query = $this->db->get('list_pembelian');
                return $query->result_array();
        }

        $query = $this->db->get_where('list_pembelian', array('jumlah' => $jumlah));
        return $query->row_array();
}

?>