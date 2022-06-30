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

        // RETURN SERVICE DATA
        $service = $this->Service_model->get_table($user_id);
        $data['key_service'] = $service;
               
        if(!isset($user_details)) 
            redirect(base_url('home'));

        $data['key_details'] = $user_details;

        $this->load->view('inc/header');
        $this->load->view('inc/navbar');
        $this->load->view("inc/profile_company", $data);
        $this->load->view('inc/footer');
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

        $this->load->model('User_model');
        $this->load->model('Industry_model');
        $this->load->model("Service_model");
        $this->load->model("Calendar_model");
        
        $data["booked"] = array();
        if($user_type == "client") {
            $user_details = $this->User_model->get_client_id($user_id);
            $page = 'inc/profile_client';
            $book_data = $this->Calendar_model->client_schedule($user_id);

            $book_counter=0;
            $temp_booked = array();
            foreach($book_data as $b){

                if($b["status"]!=1) continue;
                $temp_company = $this->User_model->get_company_id($b['company_id']);
                $temp_service = $this->Service_model->get_service($temp_company['services_id'], $b["service_id"]);
                
                $temp_booked[$book_counter++] = array(
                    "company_name" => $temp_company['company_name'],
                    "company_id" => $temp_company['company_id'],
                    "service_name" => $temp_service["name"],
                    "service_id" => $temp_service["id"],
                    "service_price" => $temp_service["price"],
                    "month" => $b["month"],
                    "day" => $b["day"],
                    "year" => $b["year"],
                );
            }
            $data["booked"] = $temp_booked;

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
            
            // RETURN COMPANY BOOKING DATA
            $booking = $this->Calendar_model->company_schedule($user_id);
            
            // RETURN INDUSTRY DATA
            $temp_i = $this->Industry_model->get_table();
            $industry = array();
            foreach($temp_i as $i){
                $industry[$i['name']] = $i;
            }
            
            ksort($industry); 
            $data['key_industry'] = $industry;
            $data['key_industry_default'] = $temp_i;

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
        $this->load->view('inc/footer');
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
        // GET COMPANY ID FROM URI
        $company_id = $this->uri->segment(2);
 
        // GET SERVICE ID FROM URI
        $service_id = $this->uri->segment(3);
        
        // GET YEAR FROM URI/CURRENT
        $year = ($this->uri->segment(4)=="")
            ?date("Y") 
            :$this->uri->segment(4);

        // GET MONTH FROM URI/CURRENT
        $month = ($this->uri->segment(5)=="")
            ?date("n") 
            :$this->uri->segment(5);

        $id_exist = isset($company_id) || 
            ($this->session->userdata('UserLoginSession'));

        if($id_exist == false)
            redirect(base_url('error/page_missing'));
            
        $cur_link = $company_id."/".$service_id."/";

        // CALENDAR PREFERENCES
        $prefs = array(
            'start_day' => 'sunday',
            'month_type' => 'long',
            'day_type' => 'short',
            'show_next_prev' => true,
            'next_prev_url' => base_url("schedule/".$cur_link),
        );
        
        $prefs['template'] = '

            {table_open}<table class="calendar_table" border="0" cellpadding="0" cellspacing="0">{/table_open}

            {heading_row_start}<tr>{/heading_row_start}

            {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
            {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
            {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

            {heading_row_end}</tr>{/heading_row_end}

            {week_row_start}<tr>{/week_row_start}
            {week_day_cell}<td>{week_day}</td>{/week_day_cell}
            {week_row_end}</tr>{/week_row_end}

            {cal_row_start}<tr>{/cal_row_start}
            {cal_cell_start}<td>{/cal_cell_start}
            {cal_cell_start_today}<td>{/cal_cell_start_today}
            {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

            {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}

            {cal_cell_no_content}{day}{/cal_cell_no_content}

            {cal_cell_blank}&nbsp;{/cal_cell_blank}

            {cal_cell_other}{day}{/cal_cel_other}

            {cal_cell_end}</td>{/cal_cell_end}
            {cal_cell_end_today}</td>{/cal_cell_end_today}
            {cal_cell_end_other}</td>{/cal_cell_end_other}
            {cal_row_end}</tr>{/cal_row_end}

            {table_close}</table>{/table_close}
        ';
        
        $this->load->model('User_model');
        $this->load->model('Service_model');
        $this->load->model('Calendar_model');
        $this->load->library('calendar', $prefs);

        // GET COMPANY DATA
        $company = $this->User_model->get_company_id($company_id);
        
        // GET SERVICE DATA
        $service = $this->Service_model
            ->get_service($company['services_id'], $service_id);

        $schedule = $this->Calendar_model
            ->get($company_id, $service_id, $year, $month);

        $booked_list = array();
        foreach($schedule as $s){
            $booked_list[$s['day']] ="";
        }

        $data['key_service'] = $service;
        $data['key_company'] = $company; 
        $data['bookings'] = $booked_list;
        $data['year'] = $year;
        $data['month'] = $month;
        $data['calendar'] = $this->calendar->generate($year, $month);

        $this->session->set_userdata('page', 'schedule');
        $this->load->view('inc/header');
        $this->load->view('inc/navbar');
        $this->load->view('schedule', $data);
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
