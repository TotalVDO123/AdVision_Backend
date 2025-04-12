<!-- TOP LANDING SECTION -->
<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/font-awesome/css/font-awesome.min.css">
 <style> 
 .black_text {
    color: #000;
    background-color: #f3f3f3;
}
 </style>
	
	<!-- logo -->
	<?php /* ?>
	<div style="float: left;">
		<a href="<?php echo base_url();?>index.php?home">
			<img src="<?php echo base_url();?>/assets/global/logo.png" style="margin: 18px 40px; height: 50px;" />
		</a>
	</div>
    <?php */ ?>
	
	
	
	<div style="float: right;margin: 18px 40px; height: 50px;">
        <a href="<?php echo base_url();?>index.php?home/signin" class="" style="color: #e50914;font-weight: 700;font-size: 20px;">
        	<?php //echo get_phrase('sign_in');?></a>
    </div>
	<form action="<?php echo base_url();?>index.php/login/forget" method="post">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4" style="clear: both;">
				<div style="background-color: #f3f3f3; padding: 30px;">
					<?php 
					if ($this->session->flashdata('password_reset') == 'failed'):
					?>
						<!-- ERROR MESSAGE -->
						<div class="alert alert-dismissible alert-danger">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  	<?php echo 'Email not found';?>
						</div>
					<?php endif;?>
					
					<?php 
					if ($this->session->flashdata('password_reset') == 'success'):
					?>
						<!-- SUCCESS MESSAGE -->
						<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  	<?php echo 'Password sent to your_email';?>
						  <a href="<?php echo base_url();?>"><?php echo 'sign in';?></a>
						</div>
					<?php endif;?>
					<h3 class="black_text"><?php echo 'Forgot Password';?></h3>
					<?php echo 'Enter your email address. We will send you a temporary password.';?>
					<div class="black_text" style="margin-top: 20px;">
					<?php echo 'Email';?> 
					</div>
					<div class="black_text">
						<input type="email" name="email" style="padding: 10px; width:100%;" />
					</div>
					<button type="submit" class="btn btn-primary" style=" width: 100%; margin: 20px 0px;"><?php echo 'Email me';?></button>
				</div>
			</div>
		</div>
	</form>
</div>

<!-- MIDDLE TAB SECTION -->
<div class="container">
	<?php //include 'footer.php';?>
</div>
