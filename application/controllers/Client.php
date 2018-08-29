<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('clientModel');
        $this->load->model('loginmodel');
        $this->load->model('bannerModel');
    }

	public function index()
	{
        
    }

    public function insert_entry()
    {
        if(!isset($_SESSION['login_name'])){
            redirect(base_url());
        }

         if(isset($_POST['clientName'])){

            //check if name exist

            if(!$this->has_name($_POST['clientName'])){
                $this->clientModel->insert_entry($_POST['clientName']);
                redirect('/login/addClient');
            }else{
                redirect('/login/addClient');
            }

                

         }
    }

    public function banner($clientName,$id){

        if(!isset($_SESSION['login_name'])){
            redirect(base_url());
        }

       $client =  $this->clientModel->get_entries();
       $banners = $this->bannerModel->get_entriesByClient($id);

       $headerData = array("clients" => $client);


       $data = array( "title" => "Banner Area", "clientName" => $clientName, "clientId" => $id, "banners" => $banners );

        $this->load->view("dashboard/header", $headerData);
            $this->load->view("main_content_client_banner", $data);
        $this->load->view("dashboard/footer");
    }

    public function do_upload(){

      
        $file_ext = array('js' , 'html');
        $fileName = array();

        if (!empty($_FILES) && isset($_FILES['html_file']['name']) && !empty($_FILES['html_file']['name'])) {

            $uploaddir = "banner_file/".$_POST['clientName'];
            $uploaddir1 = "banner_file/".$_POST['clientName']."/".$_POST['banner_name']."/";
           
               if(!file_exists($uploaddir)){
                        mkdir($uploaddir, 0777);
                }

                if(!file_exists($uploaddir1)){
                        mkdir($uploaddir1, 0777);
                }
            
           
            foreach ($_FILES as $key => $file) {

                $uploadfile = $uploaddir1 . basename($file['name']);

                if(in_array($this->getExt($file['name']), $file_ext)){        

                    move_uploaded_file($file['tmp_name'], $uploadfile);

                    array_push($fileName, $file['name']);

                }else{
                    //if not uplaoded
                }
               
            }

           $js_file_path =( isset($_FILES['js_file']['name']) && !empty($_FILES['js_file']['name']) ) ? base_url().$uploaddir1.$fileName[1] : null;

            $data = array( 'name' => $_POST['banner_name'],"banner_size" => $_POST["banner_size"] ,"html_file" => base_url().$uploaddir1.$fileName[0], "js_file" => $js_file_path , "client_id" => $_POST['clientId']);


            //do insert here
            $this->bannerModel->insert_entry($data);

            redirect('/client/banner/'.$_POST['clientName'].'/'.$_POST['clientId']);


    }else{
       //addd error message
    }



    }

    public function has_name($name){
             $value = $this->clientModel->getName($name);

             if(!empty($value))
                return true;
             else
             return false;
    }

    public function getExt($fileName){

        $value = explode(".", $fileName);

        return $value[count($value) - 1];
    }

    public function remove(){
        $id = $_POST['client_id'];
        $this->clientModel->removeById($id);

        echo base_url()."login/addClient";
    }
    
}
