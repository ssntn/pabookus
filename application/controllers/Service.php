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

    public function add_service(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $user_id = $_POST['user_id'];
            $name = $_POST['name'];
            $price = $_POST['price'];

            $data = array(
                "name" => $name,
                "price" => $price
            );

            $q = $this->Service_model->add_service($user_id, $data);

            if($q) echo true;
            else echo false;        
        }
    }

    public function edit_service(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $user_id = $_POST['user_id'];
            $id = $_POST['service_id'];
            $name = $_POST['name'];
            $price = $_POST['price'];

            $data = array(
                "name" => $name,
                "price" => $price
            );

            $q = $this->Service_model->edit_service($user_id, $id, $data);

            if($q) echo true;
            else echo false;        
        }
    }
}