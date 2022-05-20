<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Routes extends CI_Controller {
    
	public function index()
	{
		$this->load->view('welcome_message');
	}
    
	public function newsfeed()
	{
		$this->load->view('newsfeed');
	}

    public function profile()
    {
        $this->load->view('profile');
    }

    public function signin()
    {
        $this->load->view('signin');
    }

    public function signup()
    {
        $this->load->view('signup');
    }

    public function schedule()
    {
        $this->load->view('schedule');
    }
}
