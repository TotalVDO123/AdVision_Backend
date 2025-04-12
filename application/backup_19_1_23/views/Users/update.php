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
    <li class="active"> User edit</li>
</ol>
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Edit user</h3>

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
          <form method="post" action="<?php echo base_url();?>index.php/users/update">
              <input type="hidden" name="userId" value="<?php echo $result->id;?>"/>
              
			  <div class="col-sm-5">
                <div class="form-group">
                  <label for="email">Email-id:</label>
                  <input class="form-control" type="email" name="email" value="<?php echo $result->email; ?>" required>
                </div>                    
              </div>
			  
			  
			  <div class="col-sm-5">
                <div class="form-group">
                  <label for="email">First Name:</label>
                  <input class="form-control" type="text" name="first_name" value="<?php echo $result->first_name; ?>" required>                      
                </div>
              </div>
              
			  <div class="col-sm-5">
                <div class="form-group">
                  <label for="email">Phone number:</label>
                  <input class="form-control" type="text" name="phone" value="<?php echo $result->phone; ?>" required>
                </div>                    
              </div>
			  
			  
			  <div class="col-sm-5">
                <div class="form-group">
                  <label for="email">Last Name:</label>
                  <input class="form-control" type="text" name="last_name" value="<?php echo $result->last_name; ?>" required>
                </div>
              </div>
              
			  <div class="col-sm-5">
                <div class="form-group">
                  <label for="email">Country:</label>
                  <input class="form-control" type="text" name="country" value="<?php echo $result->country; ?>" required>
                </div>                    
            </div>		
			
			<div class="col-sm-5">
                <div class="form-group">
                  <label for="email">Notes:</label>
                  <input class="form-control" type="text" name="notes" value="<?php echo $result->notes; ?>" required>
                </div>                    
            </div>	
			
			
			<div class="col-sm-5">
                <div class="form-group">
                  <label for="email">Company name:</label>
                  <input class="form-control" type="text" name="company_name" value="<?php echo $result->company_name; ?>" required>
                </div>                    
            </div>		
			  
			  
			  <!--
			  <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">User Name:</label>
                  <input class="form-control" type="text" name="username" value="<?php echo $result->username; ?>" required>
                </div>
              </div>
			  -->
              <div class="col-sm-10">
                  <input class="btn btn-block btn-info btn-flat " type="submit" name="update" Value="Update">
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
