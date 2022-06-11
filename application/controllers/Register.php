<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function add_user(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(!empty($this->session->flashdata('error')))
                echo $this->session->flashdata('error');

            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user_type = $this->input->post('user_type');

            $data = array(
                'email' => $email, 
                'password' => $password
            );

            if (!$this->User_model->add_user($user_type,$data)){                
                $this->session->set_flashdata('error','Can\'t create account. Try again');

                if($user_type == 'client') redirect(base_url('client_signup'));
                else if ($user_type == 'company') redirect(base_url('company_signup'));
            }

            redirect(base_url('signin'));
        }
    }

}
