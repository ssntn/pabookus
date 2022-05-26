<?php 

class Register_model extends CI_Model {

    public function __construct(){
        $this->load->database('default');
        parent::__construct();
    }

    public function add_user($user_type, $data){
        if($this->db->insert($user_type, $data))
            return true;
        else return false;
    }

    public function checker(){
        $this->db->select('ID');
        $this->db->where('email', $_POST['email']);
        $query = $this->db->get('users')->num_rows();
        return (int)$query;
    }
}