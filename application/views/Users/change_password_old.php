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
    <li class="active"> Change Password</li>
</ol>
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Change Password</h3>

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
			</div>
			<div class="col-sm-2"></div> 
	  
	 
        <div class="col-sm-8">
          <form method="post" action="<?php echo base_url();?>index.php/users/change_password" onsubmit="return chkpassword()">
              <input type="hidden" name="userId" value="<?php echo $result->id;?>"/>
              
			  <div class="col-sm-8">
                <div class="form-group">
                  <label for="email">Current password :</label>
                  <input type="password" class="form-control" placeholder="" name="current_password" required>
                </div>                    
              </div>
			  
			  
			  <div class="col-sm-8">
                <div class="form-group">
                  <label for="email">New password :</label>
                  <input type="password" class="form-control" placeholder="" name="new_password" id="new_password" required>
                </div>
              </div>
              
			  <div class="col-sm-8">
                <div class="form-group">
                  <label for="email">Confirm new password :</label>
                  <input type="password" class="form-control" name="confirm_password" placeholder="" id="confirm_password" required>
                </div>                    
              </div>
			  <input type="hidden" name="task" value="update_password" />
			  
			  
			 
              <div class="col-sm-10">
                  <input class="btn btn-block btn-info btn-flat " type="submit" name="update" Value="Change Password">
              </div>
          </form>              
        </div>
		<div class="col-sm-2"></div>
      </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- ./ Content wrapper -->
</div>
<!-- ./wrapper -->
<script>
  function chkpassword()
  {
	  var confirm_password = document.getElementById("confirm_password");
	  var new_password = document.getElementById("new_password");
	  if( new_password.value!= confirm_password.value)
	  {
		  alert('Passwords do not match.')
		  new_password.value='';
		  confirm_password.value='';	
		  return false;
	  }
	  
	  return true;
	  
	  
  }
  </script>