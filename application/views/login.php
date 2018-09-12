<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Matrix Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/matrix-login.css" />
        <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">     

        <?php   
            $attributes = array('class' => 'form-vertical', 'id' => 'loginform');

            echo form_open( base_url().'dashboard/process_login', $attributes); 
        ?>
             <!-- <img src="<?php echo base_url() ?>assets/img/logo.png" alt="Logo" /> -->
				 <div class="control-group normal_text"> <h3>Banner Previewer</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><?php echo form_input(array("name" => "user_name", "placeholder" => "User Name")); ?>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><?php echo form_password(array("name" => "password", "placeholder" => "Password")); ?>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><?php echo form_submit(array("type" => "submit" , "value" => "Login", "class" => "btn-success")); ?></span>
                </div>
        <?php 

        echo form_close(); 

        echo $error;

        ?>
                
        </div>
        
        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>  
        <script src="<?php echo base_url() ?>assets/js/matrix.login.js"></script> 
    </body>

</html>
