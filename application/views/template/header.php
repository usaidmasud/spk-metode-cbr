<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Case Based Reasoning</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://bootstraptaste.com" />
<!-- css -->
<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/jcarousel.css" rel="stylesheet" />
<link href="<?php echo base_url();?>css/flexslider.css" rel="stylesheet" />
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" />

<link href="<?php echo base_url();?>css/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
 <link href="<?php echo base_url();?>css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- DataTables CSS -->
<link href="<?php echo base_url();?>css/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="<?php echo base_url();?>css/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    
<!-- Theme skin -->
<link href="<?php echo base_url();?>skins/default.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<style type="text/css">
    th{
        text-align: center;
    }
    
    .bg {
        text-align: center;
    }
</style>
</head>
<body>
<div id="wrapper">
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url().'home';?>"><span>CBR </span>Demam Berdarah  </a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                    <?php 
                    if ($this->session->userdata('isLogin')){
                    ?>
                        <li <?php echo ($key == 'Home')?'class="active"':'';?>> <a href="<?php echo base_url().'home';?>">Home</a></li>
                        <li <?php echo ($key == 'Konsultasi')?'class="active"':'';?>><a href="<?php echo base_url().'konsultasi';?>">Konsultasi</a></li>
                        <li <?php echo ($key == 'Kasus')?'class="active"':'';?>><a href="<?php echo base_url().'kasus';?>">Kasus</a></li>
                        <li <?php echo ($key == 'Basis Kasus')?'class="active"':'';?>><a href="<?php echo base_url().'basis_kasus';?>">Basis Kasus</a></li>
                        <li <?php echo ($key == 'Master')?'class="dropdown active"':'class="dropdown"';?>>
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Master <b class=" icon-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url().'gejala';?>">Gejala</a></li>
                                <li><a href="<?php echo base_url().'penyakit';?>">Penyakit</a></li>
                                <li><a href="<?php echo base_url().'admin';?>">Admin</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url().'home/logout';?>">Logout</a></li>
                        <?php } else { ?> 
                        <!-- 
                        
                        Jika tidak sedang login
                         
                        -->
                        <li <?php echo ($key == 'Guest')?'class="active"':'';?>><a href="<?php echo base_url().'guest';?>">Home</a></li>
                        <li <?php echo ($key == 'Login')?'class="active"':'';?>><a href="<?php echo base_url().'auth';?>">Login</a></li>
                        <li <?php echo ($key == 'Help')?'class="active"':'';?>><a href="<?php echo base_url().'help';?>">Help</a></li>
                        <li <?php echo ($key == 'About')?'class="active"':'';?>><a href="<?php echo base_url().'about';?>">About</a></li>
                        <li <?php echo ($key == 'Konsultasi')?'class="active"':'';?>><a href="<?php echo base_url().'konsultasi';?>">Konsultasi</a></li>
                        
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->