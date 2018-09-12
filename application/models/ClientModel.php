<?php
class ClientModel extends CI_Model {

    public $id;
    public $name;
    public $info;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_entries()
    {
        $this->db->where('is_active', TRUE);
        $query=$this->db->get('CLIENT');

        return  $result=$query->result();
    }

    // public function hash($password){
    //     return md5($password);
    // }

    public function insert_login_details($clientName, $username, $password){
        $this->db->insert('LOGIN', array("name"=> $clientName, "username" => $username, "password" => $password, "type" => "client"));

        return $this->db->insert_id();
    }

    public function insert_entry($clientName, $username, $password)
    {

        $id = $this->insert_login_details($clientName, $username, $password);

        if(!empty($id)){
            $this->db->insert('CLIENT', array("name" => $clientName, "is_active" => TRUE, "date_added" => date("Y-m-d H:i:s"), "date_remove" => null, "info" => "", "login_id" => $id ));
        }
       
    
           
       

        //return something to identify if added
    }

    public function get_client($loginId){
        $this->db->where('login_id', $loginId);
        $query=$this->db->get('CLIENT');

        return  $result=$query->result();
    }

    public function get_clientById($id){
        $this->db->where('id', $id);
        $query=$this->db->get('CLIENT');

        return  $result=$query->row_array();
    }

    public function getName($clientName){
        $this->db->where('Name', $clientName);
        $query=$this->db->get('CLIENT');

        return  $result=$query->result();
    }

    public function update_entry()
    {
            $this->title    = $_POST['title'];
            $this->content  = $_POST['content'];
            $this->date     = time();

            $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

    public function removeById($id){
        $result = $this->db->delete('CLIENT', array('id' => $id));

        return $result;
    }

}