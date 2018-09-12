<!DOCTYPE html>
<html lang="en">
<head>
<title>Banner Previewer</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.gritter.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/matrix-media.css" />
<link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div  id="header">
  <!-- <h1><a href="dashboard.html">Banner Previewer</a></h1> -->
  <h2 style="padding: 15px 50px"><?php echo $name; ?></h2>
</div>

<div id="user-nav" class="navbar navbar-inverse">
	<ul class="nav">
        <li><a href="<?php echo base_url()."dashboard/logout" ?>"><i class="icon-key"></i> Log Out</a></li>
        <li><a data-toggle="modal" data-target="#settings" href="#"><i class="icon-cog"></i>Settings</a></li>
	</ul>
</div>
<!--close-Header-part--> 


<!--sidebar-menu-->
<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-fullscreen"></i>Full width</a>
    <ul>
        <?php foreach ($banners as $key => $value) { ?>
            <li class="banner" attr-id="<?php echo $value->id ?>"><a href="#"><i class="icon icon-minus"></i> <span><?php echo $value->name; ?></span></a> </li>
        <?php } ?>
    </ul>
</div>



