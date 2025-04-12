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
        <li class="active">All Users</li>
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
			              		<h3 class="box-title">All Users Details</h3>
			            		</div>
										</div>
										<div class="col-xs-2 col-xs-offset-1 ">
											<a href="<?php echo base_url().'index.php/users/add';?>" class="mt-10">
													<button type="button" class="btn btn-primary">Add User</button>
											</a>
										</div>
									</div>
			            
			            <!-- /.box-header -->
			            <div class="box-body">
			              <table id="example1" class="table table-bordered table-striped">
			                <thead>
			                <tr>
							<th>Username</th>
							<th>Name</th>
							<th>Phone number</th>
							<th>Email</th>
							<th>User Type</th>
							<th>Company</th>
							<th>Status</th>
							<th>Action</th>
			                </tr>
			                </thead>
			                <tbody>
											<?php
											if(!empty($result)){
											 foreach ($result as $res) {
									$user_type="";
									if($res['user_type']==1)
									{
											$user_type="Super Admin";
									}
									elseif($res['user_type']==2)
									{
										$user_type="Admin";
									}
									elseif($res['user_type']==3)
									{
										$user_type="User";
									}
												 
											?>
			                <tr>
											 <td><?php echo $res['username']; ?></td>
											 <td><?php echo $res['first_name']," ".$res['last_name']; ?></td>
											 <td><?php echo $res['phone']; ?></td>
			                  <td><?php echo $res['email']; ?></td>
							  <td><?php echo $user_type; ?></td>
			                  <td><?php echo $res['company_name']; ?></td>
							  <td><?php echo $res['is_active']?"Active":"Inactive"; ?></td>
			                  <td>
			                  	<a href="<?php echo base_url()."index.php"; ?>/users/single/<?php echo $res['id']; ?>"><i class="fa fa-edit"></i></a> 
			                  	<a onclick="return myConfirmation()" href="<?php echo base_url()."index.php"; ?>/users/delete/<?php echo $res['id']; ?>"><i class="fa fa-trash-o"></i></a>
			                  </td>
			                </tr>
											<?php }
											}else{
												?>
													<td colspan="4" class="text-center">Data Not Found</td>
											<?php }
											?>
			                </tbody>
			                <tfoot>
			                <tr>
												<th>Username</th>
							<th>Name</th>
							<th>Phone number</th>
							<th>Email</th>
							<th>User Type</th>
							<th>Company</th>
							<th>Status</th>
							<th>Action</th>
			                </tr>
			                </tfoot>
			              </table>
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
