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
<div id="header">
  <h1><a href="dashboard.html">Banner Previewer</a></h1>
</div>

<div id="user-nav" class="navbar navbar-inverse">
	<ul class="nav">
		<li><a href="<?php echo base_url()."login/logout" ?>"><i class="icon-key"></i> Log Out</a></li>
	</ul>
</div>
<!--close-Header-part--> 


<!--sidebar-menu-->
<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-fullscreen"></i>Full width</a>
  <ul>
    <li><a href="<?php echo base_url(); ?>login/addClient"><i class="icon icon-plus"></i> <span>Add Client</span></a> </li>
    <?php foreach ($clients as $key => $value) { ?>
      <li><a href="<?php echo base_url(); ?>client/banner/<?php echo $value->Name."/".$value->id; ?>"><i class="icon icon-minus"></i> <span><?php echo $value->Name; ?></span></a> </li>
    <?php  } ?>
  </ul>
</div>



