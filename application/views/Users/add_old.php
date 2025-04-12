<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <ol class="breadcrumb">
    <li>
        <a href="#"> Users</a>
    </li>
    <li class="active"> User add</li>
</ol>
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Add user</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button> -->
        </div>
    </div>
    <div class="box-body">
      
	  
	  <div class="row">
        <div class="col-sm-8">
          <form method="post" action="<?php echo base_url();?>index.php/users/add">
                
			  <div class="col-sm-5">
              <div class="form-group">
                 <label for="email">User Name:</label>
                 <input class="form-control" type="text" name="username" value="" required>
              </div>
              </div>
			  <div class="col-sm-5">
                <div class="form-group">
                  <label for="email">First Name:</label>
                  <input class="form-control" type="text" name="first_name" value="" required>
                </div>
              </div>
			  
			 
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="email">Password:</label>
                  <input class="form-control" type="password" name="password" value="" required>
                </div>                    
              </div>
			  
			   <div class="col-sm-5">
                <div class="form-group">
                  <label for="email">Last Name:</label>
                  <input class="form-control" type="text" name="last_name" value="" required>
                </div>
              
			  </div>
			  
			  <div class="col-sm-5">
                <div class="form-group">
                  <label for="email">Email-id:</label>
                  <input class="form-control" type="email" name="email" value="" required>
                </div>                    
              </div>
			  
			  <div class="col-sm-5">
                <div class="form-group">
                  <label for="email">Phone number:</label>
                  <input class="form-control" type="text" name="phone" value="" required>
                </div>                    
              </div>
			  

			<div class="col-sm-5">
                <div class="form-group">
                  <label for="email">Location:</label>
                  <select class="form-control form-control-lg" name="location_id[]" multiple required >
				  <!--<option value="2" >Select Location</option>-->
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
			
			<div class="col-sm-5">
                <div class="form-group">
                  <label for="email">Notes:</label>
                  <input class="form-control" type="text" name="notes" value="" required>
                </div>                    
            </div>	
			
			
			<div class="col-sm-5">
                <div class="form-group">
                  <label for="email">Company name:</label>
                  <input class="form-control" type="text" name="company_name" value="" required>
                </div>                    
            </div>		

			<div class="col-sm-5">
                <div class="form-group">
                <label for="email">Role:</label>
				<select class="form-control form-control-lg" name="user_type" required >
				<option value="2" >Store Admin</option>
				</select>
                </div>                    
            </div>	
				
             
              
              <div class="col-sm-8">
                  <input class="btn btn-block btn-info btn-flat " type="submit" name="save" Value="Save">
              </div>
          </form>              
        </div>
      </div>
    
	
	
	</div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- ./ Content wrapper -->
</div>
<!-- ./wrapper -->
