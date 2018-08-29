<?php
class BannerModel extends CI_Model {



    public function get_entryById($id)
    {
        $this->db->where('id', $id);
        $query=$this->db->get('BANNER');

        return  $result=$query->result()[0];
    }

    public function get_entriesByClient($id)
    {
       $this->db->where('CLIENT_id', $id);
        $query=$this->db->get('BANNER');

        return  $result=$query->result();
    }

    public function insert_entry($data = array() )
    {

      	$this->db->insert('BANNER', array("name" => $data["name"], "size" => $data["banner_size"],"html_file" => $data["html_file"], "js_file" => $data["js_file"], "CLIENT_id" => $data["client_id"]));
    }

    public function removeById($id){
    	$result = $this->db->delete('BANNER', array('id' => $id));

    	return $result;
    }

     public function getName($bannerName){
        $this->db->where('name', $bannerName);
        $query=$this->db->get('BANNER');

        return  $result=$query->result();
    }

   

}