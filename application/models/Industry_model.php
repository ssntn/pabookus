
<?php 

class Industry_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database('default');
        parent::__construct();
    }

    public function get_table(){
        $this->db->select('*');
        return $this->db->get("industry")->result_array();
    }
}