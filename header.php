<?php
session_start ();
ob_start();
require_once 'db.php';
require_once 'function.php';

?>
<!DOCTYPE HTML>

<html>
<head>
	<meta charset="utf-8"/>

	      <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Effort Tracking</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	
     
</head>
	<body >
<!-- Start Our Navbar -->
        <nav   class="navbar navbar-default navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ournavbar" aria-expanded="false">
             <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
				  
				<img  height="60px"src="logo%20final.png"/>
            </div>
            <div class="collapse navbar-collapse" id="ournavbar">
				
              <ul class="nav navbar-nav navbar-right">
				  
                <li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
                  
				                 
				                  
            
				
				
                <?php 
		  
		  if(!isset($_SESSION ["user_id"]))
		  {
			 
			   echo "
             <li><a href='register.php'>Register</a></li>
             ";
		  }
          if(isset($_SESSION ["is_admin"]))
          
          echo "
             <li><a href='admin.php'>control panel</a></li>
             ";
             ?>
				
				</ul>
				
				
            </div><!-- /.navbar-collapse -->
          </div><!-- End Of The container-fluid -->
        </nav>
	
	
        <!-- End Our Navbar -->
         <?php
require_once 'login-out.php';
?>
		