<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function edit_profile(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
   
            echo $_POST['name'];
        }
    }
}