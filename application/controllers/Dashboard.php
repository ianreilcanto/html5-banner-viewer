<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


    function __construct() {

        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('clientModel');
        $this->load->model('loginmodel');
        $this->load->model('bannerModel');
        
    }

    public function index(){

        if(!isset($_SESSION['data'])){
      
            $this->load->view('login', array('error' =>  ''));
        }else{

                if ($_SESSION["data"]->type == "admin" ) {

                    redirect('/dashboard/admin');

                }elseif($_SESSION["data"]->type == "client"){

                    redirect('/dashboard/client');

                }   
        }
    	
    }
        
    public function process_login()
    {
    
        if(!isset($_SESSION['data'])){
            $user_name =  $this->input->post('user_name');
            $password =  $this->input->post('password');

            $result = $this->loginmodel->getLogin($user_name,$password);



            if(!empty($result)){

                $this->session->set_userdata('data', $result[0]);
            }

        }


        if (!empty($result) && $_SESSION["data"]->type == "admin" ) {
            redirect('/dashboard/admin');

        }elseif(!empty($result) && $_SESSION["data"]->type == "client"){
            redirect('/dashboard/client');
        }else{
          $this->load->view('login', array('error' => '<div class="alert alert-error">
               <button class="close" data-dismiss="alert">×</button>
               <strong>Login Faild!</strong> Please Input your username and password </div>'));
        }

    }

    public function admin(){

        if(!isset($_SESSION['data'])){
            redirect(base_url());
        }else{
            
            if($_SESSION['data']->type == "client"){
                redirect('/dashboard/client');
            }
        }

        $client =  $this->clientModel->get_entries();
        $headerData = array("clients" => $client);


        $data = array( "title" => "Add Client" );

        
        $this->load->view("dashboard/header", $headerData);
            $this->load->view("main_content_client", $data);
        $this->load->view("dashboard/footer");
    }

    public function client(){
        if(!isset($_SESSION['data'])){
            redirect(base_url());
        }else{

            if($_SESSION['data']->type == "admin"){
                redirect('/dashboard/admin');
            }
        }
  
      
        $client = $this->clientModel->get_client($_SESSION['data']->id);
        $banners =  $this->bannerModel->get_banners($client[0]->id);



        $headerData = array("name" => $_SESSION['data']->name, "banners" => $banners);

        $data = array( "title" => "Banner List");

        $this->load->view("client/header", $headerData);
            $this->load->view("client/client-table", $data);
        $this->load->view("dashboard/footer");


    }

    public function logout(){
        session_destroy();
        redirect(base_url());
    }
}
