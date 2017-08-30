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
        
        $this->load->view('templates/header', $data);
        $this->load->view('penjualan/index', $data);
        $this->load->view('templates/footer', $data);
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
                $data['message_display'] = 'Registration Successfully !';
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
                $this->load->view('penjualan/index');
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
                    $this->load->view('penjualan/index');
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
        $this->load->view('penjualan/index');
        $this->load->view('templates/footer');
        
        
    }
}
?>