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
        $this->load->view('inc/header');
        $this->load->view('inc/navbar');
		$this->load->view('newsfeed');
        $this->load->view('inc/footer');
	}

    public function profile()
    {
        $id_exist = isset($_GET['id']) ||
            ($udata = $this->session->userdata('UserLoginSession'));

        if($id_exist == false)
            redirect(base_url('newsfeed'));

        $this->load->model('User_model');

        if($_GET['ut'] == 1)
            $user_details = $this->User_model->get_client_id($_GET['id']);
        else if($_GET['ut'] == 2)
            $user_details = $this->User_model->get_company_id($_GET['id']);
        else redirect(base_url('newsfeed'));


        if(!isset($user_details)) 
            redirect(base_url('newsfeed'));

        print_r($user_details);

        // $this->load->view('inc/header');
        // $this->load->view('inc/navbar');
        // $this->load->view('profile');
        // $this->load->view('inc/footer');
    }

    public function signin()
    {
        $this->load->view('inc/header');
        $this->load->view('signin');
        $this->load->view('inc/footer');
    }

    public function signup()
    {
        $this->load->view('inc/header');
        $this->load->view('signup');
        $this->load->view('inc/footer');
    }
    
    public function client_signup()
    {
        $this->load->view('inc/header');
        $this->load->view('client_signup');
        $this->load->view('inc/footer');
    }

    public function company_signup()
    {
        $this->load->view('inc/header');
        $this->load->view('company_signup');
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
        $this->session->unset_userdata('UserLoginSession');
        // $this->session->sess_destroy();
        // redirect('newsfeed');
    }
}
