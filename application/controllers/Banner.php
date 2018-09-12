<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('clientModel');
        $this->load->model('loginmodel');
        $this->load->model('bannerModel');

        $this->load->library('zip');
        $this->load->helper('directory');
    }

	public function index()
	{
        
    }

    public function remove(){
        $id = $_POST['banner_id'];
      
        $banner = $this->bannerModel->get_entryById($id);
        $client = $this->clientModel->get_clientById($banner["CLIENT_id"]);

        $path =  'banner_file/'.$client["Name"].'/'.$banner["name"].'/';

        delete_files($path, true , false, 1);

        echo  $this->bannerModel->removeById($id);
    }


    public function view($clientId,$bannerId){

        $banner = $this->bannerModel->get_entryById($bannerId);
        $client = $this->clientModel->get_clientById($banner["CLIENT_id"]);
     
    
        $size = explode("x",$banner["size"]);

        $header = '<!DOCTYPE html>';
        $header .= '<html lang="en">';

        $header .= '<head>';
        $header .= '<meta charset="UTF-8">';
        $header .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        $header .= '<meta http-equiv="X-UA-Compatible" content="ie=edge">';
        $header .= '<title>Document</title>';
        $header .= '</head>';

        $header .= '<body style="background:#2E363F">';

        $footer = '</div>';
        $footer .= '</body>';
        $footer .= '</html>';

  
        echo $header;
            echo '<div style="width:'.$size[0].'px;margin:20px auto">';
    
            
                echo '<a style="width:200px;color:#fff;text-decoration:none;background: rgb(5, 180, 49); padding: 10px" href="/banner/downloadFile/'.$bannerId.'" class="btn btn-success" download>Download Files</a>';


                echo ' <div id="view-here" style="margin: 20px auto;"> <iframe style="overflow:hidden;" width="'.$size[0].'" height="'.$size[1].'" frameborder="0" src="'.$banner['html_file'].'"></iframe> </div>';

            echo '</div>';

        echo $footer;

         
    }

    public function iframe($bannerId){

        //return the html value only

        $data = $this->bannerModel->get_entryById($bannerId);
        $js = "";
        if($data['js_file'] != null ){
            $js = file_get_contents($data['js_file']);
        }
        $html ="";
        if(!empty($data['html_file'])){
         $html = file_get_contents($data['html_file']);
        }
       
        echo $html;
        if($data['js_file'] != null ){
            echo '<script>'.$js.'</script>';
        }
          
           
    }

    public function getFile(){
        
        $id = $this->input->post('banner_id');

        $data = $this->bannerModel->get_entryById($id);

        $size = $data['size'];

        $dir = explode("/",$data["html_file"]);
        $removed = array_pop($dir);

        $dir = implode("/",$dir);


        header('Content-Type: application/json');
        echo json_encode(array($id,$size,$data['html_file']));
        
    }

    public function downloadFile($id){

        $banner = $this->bannerModel->get_entryById($id);
        $client = $this->clientModel->get_clientById($banner["CLIENT_id"]);

        $path = 'banner_file/'.$client["Name"].'/'.$banner["name"].'/';

        $this->zip->read_dir($path);

        // Download the file to your desktop. Name it "my_backup.zip"
        $this->zip->download($client["Name"].'-'.$banner["name"].'.zip');
      
    }


     public function has_name($name){
             $value = $this->bannerModel->getName($name);

             if(!empty($value))
                return true;
             else
             return false;
    }


    
}
