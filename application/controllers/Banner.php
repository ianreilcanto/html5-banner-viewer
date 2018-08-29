<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('clientModel');
        $this->load->model('loginmodel');
        $this->load->model('bannerModel');
    }

	public function index()
	{
        
    }

    public function remove(){
        $id = $_POST['banner_id'];
        echo  $this->bannerModel->removeById($id);
    }


    public function view($clientId,$bannerId){

        $data = $this->bannerModel->get_entryById($bannerId);
        $js = "";
        if($data->js_file != null ){
            $js = file_get_contents($data->js_file);
        }
         $html = file_get_contents($data->html_file);


         $this->load->view("frontEnd/header");
           echo "<a href='".$data->html_file."' class='btn btn-success' download>download html</a>";
        if($data->js_file != null ){
               
                 echo "<a href='".$data->js_file."' class='btn btn-success' download>download js</a>";
        }
         
            echo $html;
            echo "<script>".$js."</script>";
        $this->load->view("frontEnd/footer");

         
    }

    public function iframe($bannerId){

        $data = $this->bannerModel->get_entryById($bannerId);
        $js = "";
        if($data->js_file != null ){
            $js = file_get_contents($data->js_file);
        }
         $html = file_get_contents($data->html_file);
       
            echo $html;
            echo "<script>".$js."</script>";
           
    }

    public function getFile(){
        
        $id = $this->input->post('banner_id');

        $data = $this->bannerModel->get_entryById($id);

        $size = $data->size;

        header('Content-Type: application/json');
        echo json_encode(array($id,$size));
        
        // if(!empty($data->js_file)){
        //     $js = file_get_contents($data->js_file);
        // }
        
        //  $html = file_get_contents($data->html_file);

        // if(!empty($data->js_file)){
        //     echo "<script>".$js."</script>";
        // }

        
        //  echo $html;

       // print_r($data);

         //$this->output->set_output(json_encode($data));
    }

     public function has_name($name){
             $value = $this->bannerModel->getName($name);

             if(!empty($value))
                return true;
             else
             return false;
    }

    
}
