<?php
class Loginmodel extends CI_Model {



    public function getLogin($username,$password)
    {
        $this->db->where('username', $username)->where('password',md5($password));
        $query=$this->db->get('LOGIN');

        return  $result=$query->result();
    }

    

}