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

            $i_id = $this->User_model->add_user($user_type,$data);
            if (!$i_id){      
                // display flashdata error msg
                $this->session->set_flashdata(
                    'signinError',
                    'We can\'t create your account.
                    You could always try again or give up if you wanted to!');
            }

            if($user_type == "company"){
                // CREATES UNIQUE SERVICE TABLE FOR COMPANY
                $this->load->model('Service_model');
                $table_name = "company".$i_id."_service";
                
                $q = $this->Service_model->add_table($table_name);

                if(!$q){                
                    // display flashdata error msg
                    $this->session->set_flashdata(
                        'signinError',
                        'Some fn database error occured.
                        We\'re not sorry, it\'s not us.'
                    );

                    return;
                }

                $this->User_model->set_service_name($i_id, $table_name);

                $this->session->set_flashdata(
                    'signinSuccess',
                    'We recommend first time users to put their nametags on!
                    You can go to profile tab to edit your information.'
                );
            } else if ($user_type == "client");
            else {
                $this->session->set_flashdata(
                    'signinError',
                    'We can\'t recognize your type.
                    Maybe try being someone first, like a client!'
                );
            }

            redirect(base_url('login'));

        }
    }

}
