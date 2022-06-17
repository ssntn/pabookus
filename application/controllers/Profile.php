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

    public function edit_company(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $id = $_POST['id'];
            $company_name = $_POST['name'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $industry = $_POST['industry'];
            $owner = $_POST['owner'];
            $founding_date = $_POST['founding_date'];

            $data = array(
                $company_name,
                $email,
                $contact,
                $address,
                $industry,
                $owner,
                $founding_date
            );

            echo $this->User_model->update_company($id, $data);
        }
    }
    
    public function edit_client(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $id = $_POST['id'];
            $fullname = $_POST['name'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $birthdate = $_POST['birthdate'];

            $data = array(
                $fullname,
                $email,
                $contact,
                $address,
                $birthdate
            );

            if(!$this->User_model->update_client($id, $data)) echo true;
            else echo false;
        }
    }
}