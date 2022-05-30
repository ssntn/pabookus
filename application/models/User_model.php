<?php 

class User_model extends CI_Model {

    public function __construct(){
        $this->load->database('default');
        parent::__construct();
    }

    public function add_user($user_type, $data){
        if($this->db->insert($user_type, $data))
            return true;
        else return false;
    }

    public function client_exist($email){
        $this->db->select('client_id');
        $this->db->where('email', $email);
        $query = $this->db->get('client')->num_rows();
        return (int)$query;
    }

    public function company_exist($email){
        $this->db->select('company_id');
        $this->db->where('email', $email);
        $query = $this->db->get('company')->num_rows();
        return (int)$query;
    }

    public function check_pass($user_type, $email, $password){
        $this->db->select($user_type."_id");
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $q = $this->db->get($user_type);

        if($q) return $q;
        else return false;
    }

}