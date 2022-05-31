<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Routes extends CI_Controller {
    
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
        $this->load->view('inc/header');
        $this->load->view('inc/navbar');
        $this->load->view('profile');
        $this->load->view('inc/footer');
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
}
