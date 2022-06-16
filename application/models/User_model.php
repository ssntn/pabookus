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
        $q = $this->db->get($user_type)->row_array();

        if($q) return $q;
        else return false;
    }

    public function get_client_id($id){
        $this->db->select(
            'client_id,
            email,
            first_name,
            last_name,
            contact,
            address,
            birthdate,
            schedule_id'
        );

        $this->db->where('client_id', $id);
        $q = $this->db->get('client')->row_array();

        if($q) return $q;
        else return false;
    }

    public function get_company_id($id){
        $this->db->select(
            'company_id,
            company_name,
            email,
            address,
            industry,
            contact,
            owner,
            founding_date,
            bio_id,
            link_id,
            schedule_id,
            review_id'
        );

        $this->db->where('company_id', $id);
        $q = $this->db->get('company')->row_array();

        if($q) return $q;
        else return false;
    }

    public function update_company($id, $data){
        $this->db->set($data);
        $this->db->where('company_id', $id);
        
        $q = $this->db->update('company');
        if($q) return true;
        else return false;
    }

    public function update_client($id, $data){
        $this->db->set($data);
        $this->db->where('client_id', $id);
        
        $q = $this->db->update('client');
        if($q) return true;
        else return false;
    }

    public function update_client_password($id, $password){
        $this->db->set($password);
        $this->db->where('client_id', $id);
        
        $q = $this->db->update('client');
        if($q) return true;
        else return false;
    }

    public function update_company_password($id, $password){
        $this->db->set($password);
        $this->db->where('company_id', $id);
        
        $q = $this->db->update('company');
        if($q) return true;
        else return false;
    }
}