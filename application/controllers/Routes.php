<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Routes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
    
	public function index()
	{
		$this->load->view('welcome_message');
	}
    
	public function newsfeed()
	{
        $this->session->set_userdata('page', 'home');
        if(!empty($this->session->flashdata('signinSuccess')))
            echo $this->session->flashdata('signinSuccess');

        $this->load->model('User_model');
        $this->load->model('Service_model');
        $company_table = $this->User_model->get_table();
        $services = array();
        $x=0;

        foreach($company_table as $c){            
            foreach($this->Service_model->get_table_full($c['services_id']) as $tbs){
                $tbs["company_name"] = $c["company_name"];
                $tbs["company_id"] = $c["company_id"];
                $services[$x++] = $tbs;
            }
        }
        $data["key_services"] = $services;
        
        // echo "<pre>";
        // print_r($services);

        $this->load->view('inc/header');
        $this->load->view('inc/navbar');
		$this->load->view('newsfeed', $data);
        $this->load->view('inc/footer');
	}

    public function profile()
    {
        // GET USER TYPE FROM URI
        $user_type = $this->uri->segment(2);
        // GET ID FROM URI
        $user_id = $this->uri->segment(3);

        $id_exist = isset($user_id) ||
             ($this->session->userdata('UserLoginSession'));

        if($id_exist == false)
            redirect(base_url('home'));

        $this->load->model('User_model');
        $this->load->model('Industry_model');
        $this->load->model("Service_model");

        // RETURN USER DATA
        $user_details = $this->User_model->get_company_id($user_id);
        
        // RETURN INDUSTRY DATA
        $temp_i = $this->Industry_model->get_table();
        $industry = array();
        foreach($temp_i as $i){
            $industry[$i['name']] = $i;
        }
        
        // echo "<pre>";
        ksort($industry);     
        $data['key_industry'] = $industry;
        $data['key_industry_default'] = $temp_i;
        // print_r($data['key_industry_default']);

        // RETURN SERVICE DATA
        $service = $this->Service_model->get_table($user_id);
        $data['key_service'] = $service;
               
        if(!isset($user_details)) 
            redirect(base_url('home'));

        $data['key_details'] = $user_details;

        $this->load->view('inc/header');
        $this->load->view('inc/navbar');
        $this->load->view("inc/profile_company", $data);
        //$this->load->view('inc/footer');
    }

    public function user_profile(){

        $this->session->set_userdata('page', 'profile');
        if(!empty($this->session->flashdata('signinSuccess')))
            $this->session->unset_userdata('signinSuccess');
        
        if($this->session->userdata('UserLoginSession'))
            $udata = $this->session->userdata('UserLoginSession');
        else redirect(base_url("Routes/login"));

        $user_id = $udata['id'];
        $user_type = $udata['user_type'];
        echo $user_type;

        $this->load->model('User_model');
        $this->load->model('Industry_model');
        $this->load->model("Service_model");
        
        if($user_type == "client") {
            $user_details = $this->User_model->get_client_id($user_id);
            $page = 'inc/profile_client';
        } else if($user_type == "company") {

            // RETURN USER DATA
            $user_details = $this->User_model->get_company_id($user_id);
            $page = 'inc/profile_company';
            
            $id_exist = isset($user_id) ||
            ($this->session->userdata('UserLoginSession'));

            if($id_exist == false)
                redirect(base_url('home'));

            // RETURN USER DATA
            $user_details = $this->User_model->get_company_id($user_id);
            
            // RETURN INDUSTRY DATA
            $temp_i = $this->Industry_model->get_table();
            $industry = array();
            foreach($temp_i as $i){
                $industry[$i['name']] = $i;
            }
            
            // echo "<pre>";
            ksort($industry);     
            $data['key_industry'] = $industry;
            $data['key_industry_default'] = $temp_i;
            // print_r($data['key_industry_default']);

            // RETURN SERVICE DATA
            $service = $this->Service_model->get_table($user_id);
            $data['key_service'] = $service;
        }
                
        if(!isset($user_details)) 
            redirect(base_url('home'));

        $data['key_details'] = $user_details;

        $this->load->view('inc/header');
        $this->load->view('inc/navbar');
        $this->load->view($page, $data);
        //$this->load->view('inc/footer');
    }

    public function login()
    {
        $this->session->set_userdata('page', 'login');
        $this->load->view('inc/header');
        $this->load->view('login');
        $this->load->view('inc/footer');
    }

    public function schedule()
    {
        $this->session->set_userdata('page', 'schedule');
        $this->load->view('inc/header');
        $this->load->view('inc/navbar');
        $this->load->view('schedule');
        $this->load->view('inc/footer');
    }

    public function logout()
    {
        $this->session->set_userdata('page', 'logout');
        if($this->session->has_userdata('signinSuccess'))
            $this->session->unset_userdata('signinSuccess');
        $this->session->unset_userdata('UserLoginSession');
        $this->session->sess_destroy();
        redirect('home');
    }
}
