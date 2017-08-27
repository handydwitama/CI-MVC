<?php
class Crud extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('crud_model');
        }

         public function index()
        {
            $data['list'] = $this->crud_model->get_list();
            $data["title"] = "List User";
            $this->load->view('penjualan/index', $data);

        }
}
?>