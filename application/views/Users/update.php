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
<main>
  <section class="h-100">
    <div class="container-fluid h-100">
      <div class="row d-flex align-items-center h-100">
        <div class="col-xl-12">
          <div class="rounded-3 text-black">
            <div class="row g-0">
              
			  
			  
			  <?php
			  $this->load->view('./navbar_digital_admin');
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
                  <div class="">
                    <ul class="breadcrumb">
                      <li><a href="#">Company</a></li>
                      <li>Update Company</li>
                    </ul>
                  </div>
                  <hr>
                  <div class="text-center">
                    <h4 class="mt-1 pb-1 user-heading">Update Company</h4>
                  </div>
                  <form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/users/update">
				   <input type="hidden" name="userId" value="<?php echo $result->id;?>"/>
                    <div class="row">
                        
                        
                    <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Last Name</label>-->
                          <!--<input type="text" id="form2Example12" class="form-control form-control1" placeholder="Last Name" />-->
						   <input class="form-control form-control1" type="text" name="username" placeholder="User Name" value="<?php echo $result->username; ?>" required>  
                        </div>
                      </div>
					
                      <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Full Name</label>-->
                         <!--<input type="text" id="form2Example11" class="form-control form-control1" placeholder="Full Name" />-->
						  <input class="form-control form-control1" type="email" name="email" placeholder="Email" value="<?php echo $result->email; ?>" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Last Name</label>-->
                          <!--<input type="text" id="form2Example12" class="form-control form-control1" placeholder="Last Name" />-->
						   <input class="form-control form-control1" type="text" name="first_name" placeholder="First Name" value="<?php echo $result->first_name; ?>" required>  
                        </div>
                      </div>
                      
                       <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Phone Number</label>-->
                         <!-- <input type="text" id="form2Example14" class="form-control form-control1" placeholder="Phone Number" /> -->
						  
						  <input class="form-control form-control1" type="text" name="last_name" value="<?php echo $result->last_name; ?>" placeholder="Last Name" required>
						  
                        </div>
                      </div>
                      
                      
                      <?php /* ?>
                      
                      <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          
						  
						  <input class="form-control form-control1" type="text" name="phone" placeholder="Phone" value="<?php echo $result->phone; ?>" required>
                        </div>
                      </div>
                     
                 
                    
                      <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          
						 
				 <select class="form-control form-control1" name="location_id[]" multiple required >
				
				  <?php
				 $array_location=array();
				 $array_location=explode(",",$result->location_id);
				 foreach($locations as $location)
				 {
				  ?>
				<option value="<?php echo $location['id']?>"<?php if( in_array($location['id'],$array_location)  ){  echo "selected"; }?> ><?php echo $location['location']?></option>
				
				<?php
				 }
				?>
				</select>
						 
						 
                        </div>
                      </div>
                      
                      
                      <?php */ ?>
                      
                      
                      
                      
                      
					  <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Notes</label>-->
                          <!--<input type="text" id="form2Example18" class="form-control form-control1" placeholder="Notes" />-->
						  
						  <input class="form-control form-control1" type="text" name="notes" value="<?php echo $result->notes; ?>" placeholder="Notes" required>
						  
                        </div>
                      </div>
					  
					  <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Notes</label>-->
                          <!--<input type="text" id="form2Example18" class="form-control form-control1" placeholder="Notes" />-->
						  
						 <!-- <input class="form-control form-control1" type="text" name="notes" placeholder="Notes" value="" required> -->
						  <input class="form-control form-control1" type="text" name="company_name" value="<?php echo $result->company_name; ?>" placeholder="Company" required>
						  
                        </div>
                      </div>
                      
                      
                      
                      
                      
                        <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <?php 
						     if(!empty($result->company_logo))
						    {
						        ?>
						     <img width="15%" height="12%" src="<?php echo base_url()  ?>assets/company_logo/<?php echo $result->company_logo ?>">
						     
						     <?php
                                }
						     ?>
						 <br>
		<label class="form-label" for="customFile" style="color:#FFFFFF;" >Upload Company Logo</label>
<input type="file" name="company_logo" class="form-control" id="customFile" />
					  
						   
						  
                        </div>
                      </div>
					  
                      
                       <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Notes</label>-->
                          <!--<input type="text" id="form2Example18" class="form-control form-control1" placeholder="Notes" />-->
						  
						 <!-- <input class="form-control form-control1" type="text" name="notes" placeholder="Notes" value="" required> -->
						   <select class="form-control form-control1" name="user_type" required >
							<option value="2" <?php if($result->user_type==2  ){  echo "selected"; }?> >Admin</option>
							<option value="1" <?php if($result->user_type==1  ){  echo "selected"; }?>>Super Admin</option>
							</select>
						  
                        </div>
                      </div>
                      
                      
                    
					
					
                      <div class="pb-4" align="right">
                        <!--<button  class="btn btn-primary" type="submit" name="save" Value="Save" ><i class="fa fa-floppy-o"></i> Create New User</button>-->
						<input class="btn btn-block btn-info btn-flat " type="submit" name="update" Value="Update">
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
