<?php
class Crud extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('crud_model');
    }

    public function index()
    {
        session_start();
        $data["title"] = "Toko online";
            
        $_SESSION['username'] = 
        $this->load->view('templates/header', $data);
        $this->load->view('penjualan/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
            
        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['logged_in'])){
            	$this->load->view('admin_page');
            }else{
            	$this->load->view('login_form');
            }
        }else{
            $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
            );
            $result = $this->login_database->login($data);
            if ($result == TRUE) {
            
            	$username = $this->input->post('username');
           		$result = $this->login_database->read_user_information($username);
            	if ($result != false) {
            		$session_data = array(
            		'username' => $result[0]->user_name,
            		'email' => $result[0]->user_email);
            // Add user data in session
            		$this->session->set_userdata('logged_in', $session_data);
            		$this->load->view('admin_page');
            	}
            } else {
            $data = array(
            'error_message' => 'Invalid Username or Password'
            );
            $this->load->view('login_form', $data);
            }
        }
    }         
}
?>