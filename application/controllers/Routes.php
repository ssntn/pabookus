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

    }

    public function signup()
    {

    }

    public function schedule()
    {
        
    }
}
