

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

    public function add_table($id){
       
        $fields = array(
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 5,
                'unique' => TRUE,
            ),
            'price' => array(
                'type' => 'int',
                'constraint' => 11,
                'default' => null
            ),
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_field('id', true);
        $q = $this->dbforge->create_table("company".$id."_service");

        if($q) return true;
        return false;
    }

    
}