<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  //require_once('header_new.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Forgot Password |Totalvdo </title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  
  
  <link rel="stylesheet" href="<?php echo base_url()?>assets/new_kimble/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/new_kimble/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/new_kimble/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/new_kimble/css/font.css" type="text/css" cache="false" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/new_kimble/js/select2/select2.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/new_kimble/js/fuelux/fuelux.css" type="text/css" />
   <link rel="stylesheet" href="<?php echo base_url()?>assets/new_kimble/css/plugin.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/new_kimble/css/app.css" type="text/css" />
  
  <!--[if lt IE 9]>
    <script src="js/ie/respond.min.js" cache="false"></script>
    <script src="js/ie/html5.js" cache="false"></script>
    <script src="js/ie/fix.js" cache="false"></script>
  <![endif]-->
</head>






<body>
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
<!--    <a class="nav-brand" href="index.html">KIMBL</a> -->
     <!--
	 <a class="nav-brand" href="#">Kimbl</a>
	-->
	
	
	<div class="row m-n">
      <div class="col-md-4 col-md-offset-4 m-t-lg">
	  <div  style="text-align:center";>
	<img src="<?php base_url() ?>images/TotalVDO.png" width="250px" >
	</div>
	  
	  <div>&nbsp;</div>
	  <div>&nbsp;</div> 
        <section class="panel">
        <?php if($feedback=$this->session->flashdata('feedback')): 
              $feedback_class=$this->session->flashdata('feedback_class');
		?>
		<div class="alert alert-danger">
         <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
         <i class="fa fa-ban-circle"></i>
		  <?= $feedback; ?>
        </div>
		 <?php endif; ?> 
		  
		  <header class="panel-heading text-center">
           <strong> SIGN IN </strong>
          </header>
		  
		  <form action="<?php echo base_url();?>index.php/Login/process" class="panel-body" method="post">
            <div class="form-group">
              <label class="control-label">Username</label>
              <input type="text" placeholder="username" name="email"  class="form-control" required>
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <input type="password" id="inputPassword" placeholder="Password" name="password" class="form-control" required>
            </div>
            <div class="checkbox">
                          <label>
                            <input type="checkbox"> Remember me
                          </label>
                        </div>
            <a href="<?php echo base_url() ?>index.php/login/forget" class="pull-right m-t-xs"><small>Forgot password?</small></a>
            <button type="submit" class="btn btn-info"><strong>Sign in</strong></button>
            <div class="line line-dashed"></div>
			<!--
            <a href="#" class="btn btn-facebook btn-block m-b-sm"><i class="fa fa-facebook pull-left"></i>Sign in with Facebook</a>
            <a href="#" class="btn btn-twitter btn-block"><i class="fa fa-twitter pull-left"></i>Sign in with Twitter</a>
            -->
		<!--
		<div class="line line-dashed"></div>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a href="signup.html" class="btn btn-white btn-block">Create an account</a> -->
			</form>
        </section>
      </div>
    </div>
  
  </section>
  
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder clearfix">
      <p>
        <!--<small>Mobile first web app framework base on Bootstrap<br>&copy; 2013</small>-->
      </p>
    </div>
  </footer>
  
  <script src="<?php echo base_url()?>assets/new_kimble/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url()?>assets/new_kimble/js/bootstrap.js"></script>
  <!-- app -->
  <script src="<?php echo base_url()?>assets/new_kimble/js/app.js"></script>
  <script src="<?php echo base_url()?>assets/new_kimble/js/app.plugin.js"></script>
  <script src="<?php echo base_url()?>assets/new_kimble/js/app.data.js"></script>  
  
  
  
  
  
  </body>
</html>


<?php 
///require_once('footer_new.php');
?>
