<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        
        $prefs = array(
            'start_day' => 'sunday',
            'month_type' => 'long',
            'day_type' => 'short'
        );
        $this->load->library('calendar', $prefs);
    }

    public function next(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $month = $_POST['month'];
            $year = $_POST['year'];
 
            $next_year = ($month==12) ?$year+1 :$year;
            $next_month = ($month==12) ?1 :$month+1;

            echo $this->calendar->generate($next_year, $next_month);
        }
    }

    public function previous(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $month = $_POST['month'];
            $year = $_POST['year'];
 
            $next_year = ($month==1) ?$year-1 :$year;
            $next_month = ($month==1) ?12 :$month-1;

            echo $this->calendar->generate($next_year, $next_month);
        }
    }

}