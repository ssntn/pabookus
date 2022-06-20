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
        if(!empty($this->session->flashdata('signinSuccess')))
            echo $this->session->flashdata('signinSuccess');

        $this->load->view('inc/header');
        $this->load->view('inc/navbar');
		$this->load->view('newsfeed');
        
        $this->load->view('inc/footer');
	}

    public function profile()
    {
        
        if(!empty($this->session->flashdata('signinSuccess')))
            $this->session->unset_userdata('signinSuccess');

        $id_exist = isset($_GET['id']) ||
            ($this->session->userdata('UserLoginSession'));

        if($id_exist == false)
            redirect(base_url('home'));

        $this->load->model('User_model');
        $this->load->model('Industry_model');

        // RETURNS INFO
        // 1 = client, 2 = company
        if($_GET['ut'] == 1) {
            $user_details = $this->User_model->get_client_id($_GET['id']);
            $page = 'inc/profile_client';
        } else if($_GET['ut'] == 2) {
            $user_details = $this->User_model->get_company_id($_GET['id']);
            $page = 'inc/profile_company';
            
            // RETURNS INDUSTRY DATA
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
            
        } else redirect(base_url('home'));

        if(!isset($user_details)) 
            redirect(base_url('home'));

        $data['key_details'] = $user_details;

        $this->load->view('inc/header');
        $this->load->view('inc/navbar');
        $this->load->view($page, $data);
        $this->load->view('inc/footer');
    }

    public function login()
    {
        $this->load->view('inc/header');
        $this->load->view('login');
        $this->load->view('inc/footer');
    }

    public function schedule()
    {
        $this->load->view('inc/header');
        $this->load->view('inc/navbar');
        $this->load->view('schedule');
        $this->load->view('inc/footer');
    }

    public function logout()
    {
        if($this->session->has_userdata('signinSuccess'))
            $this->session->unset_userdata('signinSuccess');
        $this->session->unset_userdata('UserLoginSession');
        $this->session->sess_destroy();
        redirect('home');
    }
}
