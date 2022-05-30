<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminRoutes extends CI_Controller {
    
	public function index(){
        $this->session->userdata('page');
        $this->session->set_userdata('page','AdminLogin');
        redirect(base_url('admin/AdminLogin'));
    }
    
	public function AdminLogin()
	{
        $this->session->userdata('page');
        $this->load->helper('url');
		$this->load->view('admin/AdminLogin');
	}

    public function AdminRegister()
    {
        $this->session->userdata('page');
        $this->load->helper('url');
        $this -> load -> view ('Admin/inc/header'); 
        $this->load->view('Admin/AdminRegister');
    }

    public function signin()
    {
        $this->load->view('signin');
    }

    public function dashboard()
    {
        $this->load->view('signup');
    }

    public function logs()
    {
        $this->load->view('schedule');
    }
}
