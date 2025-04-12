<style>
.password .form-label {
    margin-bottom: 0.5rem;
    color: #fff;
}
</style>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Vision</title>

<!--
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/font-awesome.css"/>
<link rel="stylesheet" href="css/font-awesome.min.css"/>
-->

<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/font-awesome.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/font-awesome.min.css" type="text/css" />
</head>

<body>
<main class="change_password_page">
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="rounded-3 text-black">
				<div class="row g-0">
				
				<?php
				  $this->load->view('./navbar_digital_admin');
				  ?>
				 
				<!--
				 <div class="col-lg-2 d-flex align-items-center bg1">
					<div class="text-white px-3 py-4 mx-md-4 user"> <a href="#"> <img src="images/Add_Vision_Logo.svg"></a>
					  <p class="small logout"><a href="#"><i class="fa fa-sign-out"></i> Logout</a></p>
					</div>
					<div class="sidenav"> <a href="#"><i class="fa fa-user"></i> Profile</a> <a href="#"><i class="fa fa-users"></i> Users</a>
					  <button class="dropdown-btn"><i class="fa fa-map-marker"></i> Locations <i class="fa fa-caret-down"></i> </button>
					  <div class="dropdown-container"> <a href="#">Link 1</a> <a href="#">Link 2</a> </div>
					</div>
				  </div>
				  -->
				  
				  <div class="col-lg-10 bg3">
					<div class="card-body  mx-md-4">
					  <div class="">
						<ul class="breadcrumb">
						  <li><a href="#">Users</a></li>
						  <li>Change Password</li>
						</ul>
					  </div>
					  <hr>
					  <div class="text-center">
						<h4 class="mt-1 pb-1 user-heading">Change Password</h4>
					  </div>
					  <form method="post" action="<?php echo base_url();?>index.php/users/change_password" onsubmit="return chkpassword()">
					 <div class="row password"> 
					  	
				<?php if($this->session->flashdata('message')): 
					$add_class=$this->session->flashdata('add_class');
			?>
				<div class="alert alert-dismissible <?= $add_class ?>">
					<?= $this->session->flashdata('message'); ?>
				</div>
			<?php 
			endif; 
			$this->session->set_flashdata('message',"");
			?>
			
					  
					  
					  
						
							<div class="form-outline mb-4"> 
							  <label class="form-label" for="form2Example11">Current Password:</label>
							  <input type="password" name="current_password" id="form2Example11" class="form-control form-control1" placeholder="Current Password" required />
							</div>
							<div class="form-outline mb-4"> 
							  <label class="form-label" for="form2Example11">New Password:</label>
							  <input type="password" id="form2Example12" class="form-control form-control1" name="new_password" id="new_password" placeholder="New Password" required />
							</div>
							<input type="hidden" name="task" value="update_password">
							
							<div class="form-outline mb-4"> 
							  <label class="form-label" for="form2Example11">Confirm New Password:</label>
							  <input type="password" id="form2Example13" class="form-control form-control1" name="confirm_password" placeholder="Confirm New Password" required />
							</div>
						  <div class="pb-4" align="right">
							<button type="submit" name="update" Value="Change Password" class="btn btn-primary">Change Password</button>
						  </div>
						</div>
					  </form>
					</div>
				  </div>
				</div>
          
		  </div>
        </div>
      </div>
    </div>
  </section>
</main>
</body>

<script src="<?php echo base_url()?>assets/digital/js/bootstrap.js"></script>

<script src="<?php echo base_url()?>assets/digital/js/bootstrap.min.js"></script>
<!--
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
-->
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
</html>
