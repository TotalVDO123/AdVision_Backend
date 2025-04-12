<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Forgot Password |Kimbl </title>
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
    <a class="nav-brand" href="<?php echo base_url(); ?>">Kimbl</a>
    <div class="row m-n">
      <div class="col-md-4 col-md-offset-4 m-t-lg">
	  <div>&nbsp;</div>
	  <div>&nbsp;</div>         
		<?php 
		///if($message=$this->session->flashdata('message')): 
        // $add_class=$this->session->flashdata('add_class');
		if ($this->session->flashdata('password_reset') == 'failed'):
		?>
		<div class="alert alert-danger">
         <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
         <i class="fa fa-ban-circle"></i>
		  <?php echo 'Email not found';?>
        </div>
		 <?php 
		 endif; 
		 if ($this->session->flashdata('password_reset') == 'success'):
		 ?>
	
		<div class="alert alert-success" >
         <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
         <i class="fa fa-ban-circle"></i>
		  <?php echo 'Password sent to your email';?>
        </div>	
	
		
		<?php endif;?>
			
	  
        <section class="panel">
          <header class="panel-heading text-center">
            <strong>Forgot Password</strong>
			<div>&nbsp; </div>
          <div>Enter your email address. We will send you a temporary password.</div>
		  </header>
          
		  <form action="<?php echo base_url();?>index.php/login/forget" class="panel-body" method="post">
            
			<div class="form-group">
              <label class="control-label">Email</label>
              <input type="email" name="email" placeholder="test@example.com" class="form-control" required>
            </div>
            
			<!--
			<div class="form-group">
              <label class="control-label">Password</label>
              <input type="password" id="inputPassword" placeholder="Password" class="form-control">
            </div>
            -->
			<!--
			<div class="checkbox">
              <label>
                <input type="checkbox"> Keep me logged in
              </label>
            </div>
            
			<a href="#" class="pull-right m-t-xs"><small>Forgot password?</small></a>
            -->
			<div>&nbsp;</div> 
			<button type="submit" class="btn btn-info"><strong>Email me</strong></button>
            <!--
			<div class="line line-dashed"></div>
            <a href="#" class="btn btn-facebook btn-block m-b-sm"><i class="fa fa-facebook pull-left"></i>Sign in with Facebook</a>
            <a href="#" class="btn btn-twitter btn-block"><i class="fa fa-twitter pull-left"></i>Sign in with Twitter</a>
            <div class="line line-dashed"></div>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a href="signup.html" class="btn btn-white btn-block">Create an account</a>
			-->
			
			
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