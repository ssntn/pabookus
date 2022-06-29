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

}