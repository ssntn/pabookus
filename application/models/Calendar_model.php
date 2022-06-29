
<?php 

class Calendar_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database('default');
        parent::__construct();
    }

    public function get_table(){
        $this->db->select('*');
        return $this->db->get("schedule")->result_array();
    }

    public function book($data){
        $q = $this->db->insert("schedule", $data);
        return $q;
    }

    public function delete_schedule($id){
        $this->db->where('id', $id);
        $q = $this->db->delete('schedule');

        if($q) return true;
        return false;
    }

    public function get($company, $service, $year, $month){

        $this->db->select('*');
        $this->db->where('company_id', $company);
        $this->db->where('service_id', $service);
        $this->db->where('year', $year);
        $this->db->where('month', $month);
        
        return $this->db->get("schedule")->result_array();
    }

    public function count_slot($data){

        $this->db->select('schedule_id');
        $this->db->where('company_id', $data["company_id"]);
        $this->db->where('service_id', $data["service_id"]);
        $this->db->where('year', $data["year"]);
        $this->db->where('month', $data["month"]);
        $this->db->where('day', $data["day"]);
        
        $this->db->from('schedule');
        return $this->db->count_all_results();
    }

}