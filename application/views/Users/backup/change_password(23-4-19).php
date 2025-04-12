<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//var_dump($result);die;

?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
			<div class="float-left">
      <ol class="breadcrumb">
        <li><a href="#"></i> Users</a></li>
        <li class="active">Change password</li>
			</ol>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-6">
				<?php if($message=$this->session->flashdata('message')): 
								$add_class=$this->session->flashdata('add_class');
			?>
				<div class="alert alert-dismissible <?= $add_class ?>">
					<?= $message; ?>
				</div>
			<?php endif; ?>
			</div>
			<div class="col-sm-4"></div>      
	    <!-- Main content -->
	    <section class="content">
	        <div class="row">
		        <div class="col-xs-12">
			        <div class="box">
									<div class="row" style="margin-top:20px">
										<div class="col-xs-9">
											<div class="box-header">
			              		<h3 class="box-title">Change Password</h3>
			            		</div>
										</div>
										
									</div>
			            
			            <!-- /.box-header -->
			            <?php
					$user_id	=	$this->session->userdata('user_id');
					$user_detail = $this->db->get_where('users',array('id'=>$user_id))->row();
					?>
						<div class="box-body">
			            <form method="post" action="<?php echo base_url();?>index.php/users/change_password" enctype="multipart/form-data">
					<input type="hidden" name="task" value="update_password" />
					<div class="form-group mb-3">
	                    <label for="simpleinput3">New password</label>
	                    <input type="password" class="form-control" id = "simpleinput3" name="new_password" value="">
	                </div>
					<div class="form-group mb-3">
	                    <label for="simpleinput4">Current password</label>
	                    <input type="password" class="form-control" id = "simpleinput4" name="old_password" value="">
	                </div>
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Update password">
					</div>
				</form>
						
						</div>
			            <!-- /.box-body -->
			        </div>
		        </div>
	         <!-- /.col -->
	        </div>
	      <!-- /.row -->
	    </section>
    </div>
   <!-- ./ Content wrapper -->
  </div> 
  <!-- ./wrapper -->
<script>
function myConfirmation() {
    var a = confirm("Are You sure To Delete this user");
    if(a)
    {
    	return true;
    }
    else
    {
    	return false;
    }
}
</script>
