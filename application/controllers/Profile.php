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

    public function edit_user(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $industry = $_POST['industry'];
            $owner = $_POST['owner'];
            $founding_date = $_POST['founding_date'];

            $data = array(
                $name,
                $email,
                $contact,
                $address,
                $industry,
                $owner,
                $founding_date
            );

            if(!$this->User_model->update_user())
                echo false;
            else
                echo true;
        }
    }
}