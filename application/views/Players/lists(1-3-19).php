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
        <li><a href="#"></i> Players</a></li>
        <li class="active">All Players</li>
	</ol>
			</div>
			
			<div class="col-sm-12">
				<?php if($message=$this->session->flashdata('message')): 
								$add_class=$this->session->flashdata('add_class');
			?>
				<div class="alert alert-dismissible <?= $add_class ?>">
					<?= $message; ?>
				</div>
			<?php endif; ?>
			</div>
			     
	    <!-- Main content -->
	    <section class="content">
	        <div class="row">
				
				<div class="col-xs-3">
                    <ul class="list-group">
                        <li class="list-group-item"><b>All Users</b></li>
                        <?php 
						
						if(!empty($user)){
                        foreach($user as $results){ ?>
                            <li class="list-group-item"><a href="<?php echo base_url().'index.php/players/index/'.$results['id'];?>"><?php echo  $results['first_name']." ".$results['last_name'];?></a></li>
                        <?php } }else {
                            echo '<li class="list-group-item text-center">No user found!</li>';
                        } ?>
                    </ul>
                </div>
				
				
		        <div class="col-xs-9">
			        <div class="box">
						<div class="row" style="margin-top:20px">
							<div class="col-xs-9">
								<div class="box-header">
									<h3 class="box-title">All Players Details</h3>
								</div>
							</div>
							<div class="col-xs-2 col-xs-offset-1 ">
								
										
								<?php
								if(!empty($user_id))
								{
								?>		
									
									<a href="<?php echo base_url().'index.php/players/add/'.$user_id ?>" class="mt-10">
									<button type="button" class="btn btn-primary">Add Player</button>
									</a>
								<?php
								}
								?>
								
							</div>
						</div>
			            
			            <!-- /.box-header -->
			            <div class="box-body">
			              <table id="example1" class="table table-bordered table-striped">
			                <thead>
			                <tr>
												<th>Player Id</th>
												<th>Player Name</th>
												<th>Action</th>
			                </tr>
			                </thead>
			                <tbody>
											<?php
											if(!empty($result)){
											 foreach ($result as $res) {
											?>
			                <tr>
											 <td><?php echo $res['player_id']; ?></td>
											 <td><?php echo $res['name']; ?></td>
											  <td>
			                  	<a href="<?php echo base_url()."index.php"; ?>/players/single/<?php echo $res['id']; ?>"><i class="fa fa-edit"></i></a> 
			                  	<a onclick="return myConfirmation()" href="<?php echo base_url()."index.php"; ?>/players/delete/<?php echo $res['id']; ?>"><i class="fa fa-trash-o"></i></a>
			                  </td>
			                </tr>
											<?php }
											}else{
												?>
													<td colspan="4" class="text-center">
													<p class="text-left">Whoops!</p>
													<p class="text-left">Looks like you do not have any players assigned to your account at this point.</p>
													
													<p class="text-left">Please contact the Reseller who sold your system and w'll get this sorted out right away!</p>
													
													</td>
											<?php }
											?>
			                </tbody>
			                <tfoot>
			                <tr>
												<th>Player Id</th>
												<th>Player Name</th>
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
    var a = confirm("Are You sure To Delete this player");
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
