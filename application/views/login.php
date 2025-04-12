<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Vision</title>

<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/bootstrap.css" type="text/css" />
<!--<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/style.css"/>
-->
<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/style.css" type="text/css" />

</head>

<body>
<main>
  <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container-fluid h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-12">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-3 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4 logo1"> <img src="<?php echo base_url()?>assets/digital/images/Add_Vision_Logo.svg">
                 <!-- <p class="small help">Having Troubles? Get Help</p> -->
                </div>
              </div>
              <div class="col-lg-9">
                <div class="card-body p-md-6 mx-md-4">
                  <div class="text-center">
                    <h4 class="mt-1 pb-1">Sign in to Add Vision</h4>
                  </div>
                  
				  
				 <form action="<?php echo base_url();?>index.php/Login/process" class="panel-body" method="post">
                  <div class="form-outline mb-4">
                   <label class="form-label" for="form2Example11">Email address</label>
                    <!--<input type="email" id="form2Example11" class="form-control"
                      placeholder="johndoe@gmail.com" />-->
					  
					  <input type="text" placeholder="username" name="email"  class="form-control" required>
                  </div>

                  <div class="form-outline mb-4">
                   <label class="form-label" for="form2Example22">Password</label>
                    <!--<input type="password" id="form2Example22" class="form-control" placeholder="password"/>-->
					<input type="password" id="inputPassword" placeholder="Password" name="password" class="form-control" required>
                  </div>

                  <div class="pt-1 mb-5 pb-1">
                  <a class="text-muted" href="<?php echo base_url() ?>index.php/login/forget">Forgot password?</a>
                    <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 sign-btn" type="button">Sign In</button>
                    
                  </div>

                  <!--<div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <button type="button" class="btn btn-outline-danger">Create new</button>
                  </div>-->

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

</html>
