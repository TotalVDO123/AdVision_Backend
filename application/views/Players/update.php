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

<body class="bg2 add_player_page">
<main>
  <section class="h-100">
       <?php
     $this->load->view('./header_digital');
      ?>
    <div class="container-fluid h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-12">
          <div class="rounded-3 text-black">
            <div class="row g-0">
			
			<?php
			//$this->load->view('./navbar_digital_admin');
			?>
			
			<?php /* ?>
              <div class="col-lg-2 d-flex align-items-center bg1">
                <div class="text-white px-3 py-4 mx-md-4 user"> <a href="#"> 
				
				<!--<img src="images/Add_Vision_Logo.svg"></a>-->
				 <div class="logo"> <a href="#"><img src="<?php echo base_url()?>assets/digital/images/Add_Vision_Logo.svg"/></a></div>
				
                  <p class="small logout"><a href="#"><i class="fa fa-sign-out"></i> Logout</a></p>
                </div>
                <div class="sidenav"> <a href="#"><i class="fa fa-user"></i> Profile</a> <a href="#"><i class="fa fa-users"></i> User</a>
                  <button class="dropdown-btn"><i class="fa fa-map-marker"></i> Locations <i class="fa fa-caret-down"></i> </button>
                  <div class="dropdown-container"> <a href="#">Link 1</a> <a href="#">Link 2</a> </div>
                </div>
              </div>
			  
			  <?php */ ?>
              <div class="col-lg-10">
                <div class="card-body mx-md-4">
                  <!--<div class="">
                    <ul class="breadcrumb">
                      <li><a href="#">User</a></li>
                      <li>Create User</li>
                    </ul>
                  </div>-->
                  <hr>
                   <div class="col-md-10 offset-1">
                  <div style="text-align: left !important;" >
                   <h6 class="mt-1 pb-1 user-heading">  <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><i class="fa fa-arrow-left"></i></a> </h6> 
                  </div>
                  
                  <div class="text-center">
                    <h4 class="mt-1 pb-1 user-heading">Edit Screen</h4>
                  </div>
                 </div>
                  <form method="post" action="<?php echo base_url();?>index.php/players/update">
				  <input type="hidden" name="playerId" value="<?php echo $result->id;?>"/>
				  <input type="hidden" name="user_id" value="<?php echo $result->user_id;?>"/>
			  
					<input type="hidden" name="location_id" value="<?php echo $location_id;?>"/>
				  
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Full Name</label>-->
                         <!--<input type="text" id="form2Example11" class="form-control form-control1" placeholder="Full Name" />-->
						  <label for="email" style="color:#fff;">Screen Id:</label>
						  <input class="form-control form-control1" type="text" name="player_id" value="<?php echo $result->player_id; ?>" required>  
                        </div>
                      </div>
					  
                      <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Last Name</label>-->
                          <!--<input type="text" id="form2Example12" class="form-control form-control1" placeholder="Last Name" />-->
						   <label for="email" style="color:#fff;">Screen Name:</label>
						    <input class="form-control form-control1" type="text" name="name" value="<?php echo $result->name; ?>" required>
                        </div>
                      </div>
					  
					  
                      <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Email address</label>-->
                          <!--<input type="email" id="form2Example13" class="form-control form-control1" placeholder="Email Address" />-->
						   <label for="email" style="color:#fff;">Pin:</label>
						  <input class="form-control form-control1" type="text" name="pin" value="<?php echo $result->pin; ?>" required>
                        </div>
                      </div>
                     
					 <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Email address</label>-->
                          <!--<input type="email" id="form2Example13" class="form-control form-control1" placeholder="Email Address" />-->
						   <label for="schedule" style="color:#fff;">Select Schedule</label>
						  
						    <select class="form-control" name="schedule_id" id="schedule_id" >
                              
						<option value="">Select </option> 		
						   <?php
                           
                               foreach ($schedule as $row)
                                {
                                ?>
                                 <option value="<?php echo $row['id'] ?>" <?php if($result->schedule_id==$row['id']) { echo 'selected'; } ?>
								 
								 > <?php echo $row['name'] ?></option> 
                            <?php        
                                }
                               
                               ?>   
                                
                              </select>
						  
						  
						  
                        </div>
                      </div>
  				  
                      <div class="pb-4" align="right">
                        <button  class="btn btn-primary"type="submit" name="update" Value="Update" ><i class="fa fa-floppy-o"></i> Update</button>
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

<!--
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
-->

<script src="<?php echo base_url()?>assets/digital/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>assets/digital/js/bootstrap.min.js"></script>

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
