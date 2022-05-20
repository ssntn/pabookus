<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Routes extends CI_Controller {
    
	public function index()
	{
		$this->load->view('welcome_message');
	}
    
	public function newsfeed()
	{
		$this->load->view('newsfeed.html');
	}

    public function profile()
    {
        $this->load->view('profile.html');
    }

    public function signin()
    {
        $this->load->view('signin.html');
    }

    public function signup()
    {
        $this->load->view('signup.html');
    }

    public function schedule()
    {
        $this->load->view('schedule.html');
    }
}
