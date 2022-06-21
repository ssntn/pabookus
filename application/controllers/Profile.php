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
            $company_name = (empty($_POST['name']))? "company_".$id :$_POST['name'];
            $email = (empty($_POST['email']))? null :$_POST['email'];
            $contact = (empty($_POST['contact']))? null :$_POST['contact'];
            $address = (empty($_POST['address']))? null :$_POST['address'];
            $industry = (empty($_POST['industry']))? null :$_POST['industry'];
            $owner = (empty($_POST['owner']))? null :$_POST['owner'];
            $founding_date = (empty($_POST['founding_date']))? null :$_POST['founding_date'];

            $data = array(
                "company_name" => $company_name,
                "email" => $email,
                "contact" => $contact,
                "address" => $address,
                "industry" => $industry,
                "owner" => $owner,
                "founding_date" => $founding_date
            );

            $q = $this->User_model->update_company($id, $data);

            if($q) echo true;
            else echo false;
        }
    }
    
    public function edit_client(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $id = $_POST['id'];
            $fullname = (empty($_POST['name']))? "user_".$id :$_POST['name'];
            $email = (empty($_POST['email']))? null :$_POST['email'];
            $contact = (empty($_POST['contact']))? null :$_POST['contact'];
            $address = (empty($_POST['address']))? null :$_POST['address'];
            $birthdate = (empty($_POST['birthdate']))? null :$_POST['birthdate'];

            $data = array(
                "fullname" => $fullname,
                "email" => $email,
                "contact" => $contact,
                "address" => $address,
                "birthdate" => $birthdate
            );

            $q = $this->User_model->update_client($id, $data);

            if($q) echo true;
            else echo false;
        }
    }
}