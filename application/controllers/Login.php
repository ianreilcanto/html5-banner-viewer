<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


    function __construct() {

        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('clientModel');
        $this->load->model('loginmodel');
           
    }

    public function index(){

        if(!isset($_SESSION['login_name'])){
            $this->load->view('login', array('error' =>  ''));
        }else{
            redirect('/login/addClient');
        }

    	
    }
        
    public function addClient()
    {
        
        if(!isset($_SESSION['login_name'])){
            $user_name =  $this->input->post('user_name');
            $password =  $this->input->post('password');

            $result = $this->loginmodel->getLogin($user_name,$password);


            if(!empty($result)){

                $this->session->set_userdata('login_name', $result[0]->name);
            }

        }


        //load dashboard view if login 

        if (!empty($result) || !empty(isset($_SESSION['login_name']))) {

            $client =  $this->clientModel->get_entries();
            $headerData = array("clients" => $client);


            $data = array( "title" => "Add Client" );

            
            $this->load->view("dashboard/header", $headerData);
                $this->load->view("main_content_client", $data);
            $this->load->view("dashboard/footer");

        }else{
            $this->load->view('login', array('error' => '<div class="alert alert-error">
              <button class="close" data-dismiss="alert">×</button>
              <strong>Login Faild!</strong> Please Input your username and password </div>'));
        }

    }

    public function logout(){
        session_destroy();
        redirect(base_url());
    }
}
