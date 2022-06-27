

<?php 

class Service_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database('default');
        $this->load->dbforge();
        parent::__construct();
    }

    public function get_table($id){        
        $t_name = "company".$id."_service";
        $this->db->select('*');
        return $this->db->get($t_name)->result_array();
    }

    public function get_table_full($t_name){
        $this->db->select('*');
        return $this->db->get($t_name)->result_array();
    }

    public function get_service($table, $service_id){
        $this->db->select('id, name, price, duration');
        $this->db->where('id', $service_id);
        return $this->db->get($table)->row_array();
    }

    public function add_table($t_name){
       
        $fields = array(
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => TRUE,
            ),
            'price' => array(
                'type' => 'int',
                'constraint' => 11,
                'default' => null
            ),
            'duration' => array(
                'type' => 'int',
                'constraint' => 4,
                'default' => 0
            ),
        );

        $this->dbforge->add_field('id', true);
        $this->dbforge->add_field($fields);
        $q = $this->dbforge->create_table($t_name);

        if($q) return true;
        return false;
    }

    public function add_service($id, $data){
        $t_name = "company".$id."_service";
        $q = $this->db->insert($t_name, $data);

        if($q) return true;
        return false;
    }

    public function edit_service($user_id, $id, $data){
        $t_name = "company".$user_id."_service";

        $this->db->set($data);
        $this->db->where('id', $id);
        $q = $this->db->update($t_name);
        
        if($q) return true;
        return false;
    }

    public function delete_service($table, $id){
        $this->db->where('id', $id);
        $q = $this->db->delete($table);

        if($q) return true;
        return false;
    }
    
}