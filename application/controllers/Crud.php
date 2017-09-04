<?php
class Crud extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('crud_model');
    }

    public function index()
    {
        
        $data["title"] = "Toko online";
        
        $this->load->view('templates/header');
        $this->load->view('templates/left_bar');
        $this->load->view('penjualan/index');
        $this->load->view('templates/right_bar');
        $this->load->view('templates/footer');
    }

    public function new_regist() {
      
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email_value', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('umur', 'Password', 'required');
        $this->form_validation->set_rules('alamat', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('penjualan/registrasi');
        } else {
                $data = array(
                    'id' => '',
                    'nama' => $this->input->post('username'),
                    'email' => $this->input->post('email_value'),
                    'password' => $this->input->post('password'),
                    'umur' => $this->input->post('umur'),
                    'alamat' => $this->input->post('alamat')
                );
            $result = $this->crud_model->regist($data);
            if ($result == TRUE) {
                $data['message_display'] = 'Registration Successful !';
                $this->load->view('penjualan/login', $data);
            } else {
                $data['message_display'] = 'Username already exist !';
                $this->load->view('penjualan/registrasi', $data);
            }
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
            
        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['logged_in'])){
                
                $this->load->view('templates/header');
                $this->load->view('templates/left_bar');
                $this->load->view('penjualan/index');
                $this->load->view('templates/right_bar');
                $this->load->view('templates/footer');
            }else{
            	$this->load->view('penjualan/login');
            }
        }else{
            $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            );
            $result = $this->crud_model->login($data);
            if ($result == TRUE) {
            
            	$username = $this->input->post('username');
           		$result = $this->crud_model->user_info($username);
            	if ($result != false) {
            		$session_data = array(
            		'username' => $result[0]->nama,
                    'email' => $result[0]->email,
                    );
            
            		$this->session->set_userdata('logged_in', $session_data);
                    $this->load->view('templates/header');
                    $this->load->view('templates/left_bar');
                    $this->load->view('penjualan/index');
                    $this->load->view('templates/right_bar');
                    $this->load->view('templates/footer');
            	}
            } else {
            $data = array(
            'error_message' => 'Invalid Username or Password'
            );
            $this->load->view('penjualan/login', $data);
            }
        }
    }         
    public function logout() {
        
        $sess_array = array(
        'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        
        $this->load->view('templates/header');
        $this->load->view('templates/left_bar');
        $this->load->view('penjualan/index');
        $this->load->view('templates/right_bar');
        $this->load->view('templates/footer');
        
        
    }

    public function buy()
    {
        
        $data['barang'] = $this->crud_model->get_all_barang();
        $data['title'] = 'News archive';

        $this->load->view('templates/header');
        $this->load->view('templates/left_bar');
        $this->load->view('penjualan/pembelian', $data);
        $this->load->view('templates/right_bar');
        $this->load->view('templates/footer');
    }


    public function ajax_harga()
    {
        
        $nama_barang = $this->input->post('nama_barang');
        $this->db->select('harga');
        $this->db->from('master_barang');
        $this->db->where('nama_barang', $nama_barang);
        $this->db->limit(1);
        $query = $this->db->get();
        $hasil = $query->result_array();
        
        foreach($hasil as $barang){
            $arr = array(
				"harga" => $barang['harga'], 
			);
        
        echo json_encode($arr);}

    }

    public function buy_proses()
    {
        $today = date("Y-m-d H:i:s");
        $nama = $this->input->post('nama');
        $barang[] = $this->input->post('barang');
        $qty[] = $this->input->post('quantity');
        $this->db->select('id_pembelian');
        $this->db->from('list_pembelian');
        $this->db->order_by('id_pembelian', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->result_array();
        foreach($res as $row){
            $kode = $row['id_pembelian'];
        }

        preg_match("/(\D+)(\d+)/", $kode, $matches);
        $product_kode = $matches[1];
        $new_id = intval($matches[2]);
        $new_id++;
        $kodelength = 4;
        $idlength = strlen($new_id);
        $missing = $kodelength - $idlength;
        
        for ($i=0; $i < $missing; $i++) { 
            $new_id = "0".$new_id;
        }
        $id_baru = $product_kode.$new_id;

        foreach ($barang as $value) {
            foreach ($qty as $k) {
                for ($i=0; $i < 100 ; $i++) { 
                    if (isset($value[$i])==TRUE){
                        $sql= "INSERT INTO list_pembelian(id_pembelian,id_user,id_barang,tanggal,qty,jumlah)
                            VALUES ('$id_baru',(SELECT id FROM username WHERE nama='$nama'),
                                (SELECT id_barang FROM master_barang WHERE nama_barang='$value[$i]'),
                                '$today', '$k[$i]', 
                                (SELECT (SELECT harga FROM master_barang WHERE nama_barang='$value[$i]') * '$k[$i]'))";

                        
                        $sql1 = "UPDATE master_barang SET stock = (stock - '$k[$i]') WHERE nama_barang='$value[$i]'";
                        if($query=$this->db->query($sql))
                        {
                            if($qu= $this->db->query($sql1)){
                                $data['message_display'] = 'Pembelian Berhasil !';
                            }
                            else{
                                $data['message_display'] = 'Pembelian Gagal Dilakukan !';
                            }
                        }
                    }
                }
            }
        }
        
        $data['barang'] = $this->crud_model->get_all_barang();
        
        $this->load->view('templates/header');
        $this->load->view('templates/left_bar');
        $this->load->view('penjualan/pembelian', $data);
        $this->load->view('templates/right_bar');
        $this->load->view('templates/footer');
    }
    public function lihat_user($data = FALSE)
    {
        $data['user'] = $this->crud_model->get_all_user();
        $this->load->view('templates/header');
        $this->load->view('templates/left_bar');
        $this->load->view('penjualan/alluser', $data);
        $this->load->view('templates/right_bar');
        $this->load->view('templates/footer');
    }
    public function detail_user()
    {
        $id = $this->input->get('id');
        $data['user'] = $this->crud_model->get_user($id);
        $this->load->view('templates/header');
        $this->load->view('templates/left_bar');
        $this->load->view('penjualan/detail_user', $data);
        $this->load->view('templates/right_bar');
        $this->load->view('templates/footer');
    }

    public function edit_user()
    {
        $id = $this->input->get('id');
        $nama = $this->input->post('username');
        $pw = $this->input->post('password');
        $umur = $this->input->post('umur');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $data['message_display'] = '';
        if(isset($pw)){
            $arr = array(
                'nama' => $nama,
                'password' => $pw,
                'Umur' => $umur,
                'email' => $email,
                'alamat' => $alamat 
            );
            $this->db->where('id', $id);
            $this->db->update('username', $arr);
            
                $data['user'] = $this->crud_model->get_all_user();
                $data['message_display'] = 'Edit User Berhasil !';
                $this->load->view('templates/header');
                $this->load->view('templates/left_bar');
                $this->load->view('penjualan/alluser', $data);
                $this->load->view('templates/right_bar');
                $this->load->view('templates/footer');
            
        }
        else{
            $data['user'] = $this->crud_model->get_user($id);
            $data['id'] = $id;
            $this->load->view('templates/header');
            $this->load->view('templates/left_bar');
            $this->load->view('penjualan/edit_user', $data);
            $this->load->view('templates/right_bar');
            $this->load->view('templates/footer');
        }
    }
    public function del_user()
    {
        $id = $this->input->get('id');

        $this->db->where('id', $id);
        $this->db->db_debug = FALSE; 
        if($this->db->delete('username') == TRUE){
            
            header("location: http://handy.orange.com/CodeIgniter-3.1.5/crud/lihat_user");
        }
        else{
            $data['message_display'] = 'Remove User Gagal !';
            $this->lihat_user($data);
        }
        
    }
    
}
?>