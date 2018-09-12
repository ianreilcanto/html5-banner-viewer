<?php
class Loginmodel extends CI_Model {



    public function getLogin($username,$password)
    {
        $this->db->where('username', $username)->where('password',$password);
        $query=$this->db->get('LOGIN');

        return  $result=$query->result();
    }

    public function removeById($id){
        $result = $this->db->delete('LOGIN', array('id' => $id));

        return $result;
    }

    public function get_loginByLoginId($loginId){
        $this->db->where('id', $loginId);
        $query=$this->db->get('LOGIN');

        return  $result=$query->row_array();
    }

    public function update_login_client($id,$data = array()){

        // $data = array(
        //     'name' => $name,
        //     'username' => $username,
        //     'password' => $password
        // );

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('LOGIN');

    }

    

}