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
      <div class="row d-flex justify-content-center align-items-center h-100">
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
                      <li>Create Company</li>
                    </ul>
                  </div>
                  <hr>
                  <div class="text-center">
                    <h4 class="mt-1 pb-1 user-heading">Create Company</h4>
                  </div>
                  <form method="post" name="myForm" enctype="multipart/form-data" onsubmit="return validateForm()" action="<?php echo base_url();?>index.php/users/add">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Full Name</label>-->
                         <!--<input type="text" id="form2Example11" class="form-control form-control1" placeholder="Full Name" />-->
						  <input class="form-control form-control1" type="text" name="username" placeholder="User name" onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || (event.charCode >= 48 && event.charCode <= 57));"   value="" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Last Name</label>-->
                          <!--<input type="text" id="form2Example12" class="form-control form-control1" placeholder="Last Name" />-->
						   <input class="form-control form-control1" type="text" name="first_name" placeholder="First Name" onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 );" value="" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Email address</label>-->
                          <!--<input type="email" id="form2Example13" class="form-control form-control1" placeholder="Email Address" />-->
						  
						  <input class="form-control form-control1 masked" type="password" name="password" id="pwd" placeholder="Password" value="" required>
						  
						  <button type="button" id="eye">
						<img src="https://cdn0.iconfinder.com/data/icons/feather/96/eye-16.png" alt="eye" />
						</button>
						  
						  
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Phone Number</label>-->
                         <!-- <input type="text" id="form2Example14" class="form-control form-control1" placeholder="Phone Number" /> -->
						  
						  <input class="form-control form-control1" type="text" name="last_name" placeholder="Last name" onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8  );" value="" required>
						  
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Company Name</label>-->
                        <!--  <input type="text" id="form2Example15" class="form-control form-control1" placeholder="Company Name" /> -->
						   <input class="form-control form-control1" type="email" name="email" placeholder="Email"  value="" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Company Address</label>-->
                        <!--  <input type="text" id="form2Example16" class="form-control form-control1" placeholder="Company Address" /> -->
						  
						   <!--<input class="form-control form-control1" type="text" name="phone" placeholder="Phone"  pattern="[1-9]{1}[0-9]{9}" title="Enter 10 digit mobile number" placeholder="Mobile number"  value="" required>-->
                        
                          <input class="form-control form-control1" type="text" name="phone" placeholder="Phone"   title="Enter 10 digit mobile number" placeholder="Mobile number"  value="" required>
                        
                        </div>
                      </div>
                      
                      
                      
                    <?php /* ?>  
                      <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          
						 
				<select class="form-control form-control1" name="location_id[]" multiple required >
				 
				  <?php
				 foreach($locations as $location)
				 {
				  ?>
				<option value="<?php echo $location['id']?>" ><?php echo $location['location']?></option>
				
				<?php
				 }
				?>
				</select>
						 
						 
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                         
						  <input class="form-control form-control1" type="text" name="notes" placeholder="Notes" value="" required>
						  
                        </div>
                      </div>
                      
                      <?php */ ?>
                      
					  
					  <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Notes</label>-->
                          <!--<input type="text" id="form2Example18" class="form-control form-control1" placeholder="Notes" />-->
						  
						 <!-- <input class="form-control form-control1" type="text" name="notes" placeholder="Notes" value="" required> -->
						   <input class="form-control form-control1" type="text" name="company_name" placeholder="Company name" value="" onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || (event.charCode >= 48 && event.charCode <= 57));" required>
						  
                        </div>
                      </div>
					  
					  <div class="col-md-6">
                        <div class="form-outline mb-4"> 
                          <!--<label class="form-label" for="form2Example11">Notes</label>-->
                          <!--<input type="text" id="form2Example18" class="form-control form-control1" placeholder="Notes" />-->
						  
						 <!-- <input class="form-control form-control1" type="text" name="notes" placeholder="Notes" value="" required> -->
						   <select class="form-control form-control1" name="user_type" required >
							<option value="2">Admin</option>
							<option value="1">Super Admin</option>
							</select>
						  
                        </div>
                      </div>
                      
                      
                         <div class="col-md-6">
                        <div class="form-outline mb-4"> 
		        <label class="form-label" for="customFile" style="color:#FFFFFF;" >Upload Company Logo</label>
                <input type="file" name="company_logo" class="form-control" id="customFile" />
					  
						   
						  
                        </div>
                      </div>
					  
					  
					  
                      <div class="pb-4" align="right">
                        <button  class="btn btn-primary" type="submit" name="save" Value="Save" ><i class="fa fa-floppy-o"></i> Create New Company</button>
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

<script>

 function validateForm() {
    var x = document.myForm;
    var input = x.username.value;
    //var errMsgHolder = document.getElementById('nameErrMsg');
    if (input.length < 3) {
        //errMsgHolder.innerHTML =
         //   'Please enter a name with at least 3 letters';
        x.username.focus();
		alert('Please enter a Username with at least 4 letters');
		return false;
    } 



var x = document.myForm;
    var input = x.first_name.value;
    //var errMsgHolder = document.getElementById('nameErrMsg');
    if (input.length < 3) {
        //errMsgHolder.innerHTML =
         //   'Please enter a name with at least 3 letters';
        x.first_name.focus();
		alert('Please enter a First name with at least 4 letters');
		return false;
    } 

	if (input.length > 18) {
        //errMsgHolder.innerHTML =
         //   'Please enter a name with at least 3 letters';
        x.first_name.focus();
		alert('Please enter a First name must be 18 letters');
		return false;
    } 


var x = document.myForm;
    var input = x.last_name.value;
    //var errMsgHolder = document.getElementById('nameErrMsg');
    if (input.length < 3) {
        //errMsgHolder.innerHTML =
         //   'Please enter a name with at least 3 letters';
        x.last_name.focus();
		alert('Please enter a Last name with at least 4 letters');
		return false;
    } 
	
	
	if (input.length >18 ) {
        //errMsgHolder.innerHTML =
         //   'Please enter a name with at least 3 letters';
        x.last_name.focus();
		alert('Please enter a Last name must be 18 letters');
		return false;
    } 
	
	
	
	var x = document.myForm;
    var p = x.password.value;
	
    
    //var p = document.getElementById('newPassword').value,
    const errors = [];
    if (p.length < 3) {
        errors.push("Your password must be at least 3 characters");
    }
    if (p.length > 18) {
        errors.push("Your password must be at max 18 characters");
    }
    if (p.search(/[a-z]/) < 0) {
        errors.push("Your password must contain at least one lower case letter."); 
    }
    if (p.search(/[A-Z]/) < 0) {
        errors.push("Your password must contain at least one upper case letter."); 
    }

    if (p.search(/[0-9]/) < 0) {
        errors.push("Your password must contain at least one digit.");
    }
   if (p.search(/[!@#\$%\^&\*_]/) < 0) {
        errors.push("Your password must contain at least special char from -[ ! @ # $ % ^ & * _ ]"); 
    }
    if (errors.length > 0) {
        alert(errors.join("\n"));
		x.password.focus();
        return false;
    }
   // return true;
	
	
	var x = document.myForm;
    var Email = x.email.value;
	 var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(Email) == false) 
        {
            alert('Invalid Email Address');
			x.email.focus();
            return false;
        }
	
     
}
	
	
	
	


</script>

<script>
function show() {
    var p = document.getElementById('pwd');
    p.setAttribute('type', 'text');
}

function hide() {
    var p = document.getElementById('pwd');
    p.setAttribute('type', 'password');
}

var pwShown = 0;

document.getElementById("eye").addEventListener("click", function () {
    if (pwShown == 0) {
        pwShown = 1;
        show();
    } else {
        pwShown = 0;
        hide();
    }
}, false);


</script>

</html>
