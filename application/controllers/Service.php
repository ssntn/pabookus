<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Service_model');
        $this->load->library('session');
    }

    public function add_table(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id'];            
            $this->Service_model->add_table($id);
        }
    }
}