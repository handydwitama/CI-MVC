<?php
class Homepage extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [];
        $data["title"] = "bisa";

        $this->load->view('templates/header', $data);
        $this->load->view('pages/homepage', $data);

    }
}

?>