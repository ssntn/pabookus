<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function get_calendar(){

        $data = array(
            22 => "asd"
        );
        
        $company_id = $_POST['company_id'];
        $service_id = $_POST['service_id'];
        $cur_link = $company_id."/".$service_id."/";
        
        $prefs = array(
            'start_day' => 'sunday',
            'month_type' => 'long',
            'day_type' => 'short',
            'show_next_prev' => TRUE,
            'next_prev_url' => base_url("schedule/".$cur_link),
        );
        $this->load->library('calendar', $prefs);


        echo $this->calendar->generate(2022, 7, $data);
    }

}