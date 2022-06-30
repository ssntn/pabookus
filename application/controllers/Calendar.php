<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("Calendar_model");
    }

    public function get_bookings(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $company_id = $_POST['company_id'];
            $service_id = $_POST['service_id'];
            $day = $_POST['day'];
            $month = $_POST['month'];
            $year = $_POST['year'];

            $data = array(
                "company_id" => $company_id,
                "service_id" => $service_id,
                "day" => $day,
                "month" => $month,
                "year" => $year
            );

            $booked = $this->Calendar_model->count_slot($data);
            echo $booked;            
        }
    }

    public function add_booking(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $client_id = $_POST['client_id'];
            $company_id = $_POST['company_id'];
            $service_id = $_POST['service_id'];
            $day = $_POST['day'];
            $month = $_POST['month'];
            $year = $_POST['year'];

            $data = array(
                "booker_id" => $client_id,
                "company_id" => $company_id,
                "service_id" => $service_id,
                "day" => $day,
                "month" => $month,
                "year" => $year,
                "status" => 1
            );

            $q = $this->Calendar_model->book($data);
            
            if($q) echo true;
            echo false;
        }
    }

    public function cancel_book(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $schedule_id = $_POST["schedule_id"];

            $q = $this->Calendar_model->cancel($schedule_id);
            if($q) return true;
            return false;
        }
    }

}