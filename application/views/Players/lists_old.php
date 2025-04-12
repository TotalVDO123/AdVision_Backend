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
        <li class="active">All Players</li>
	  </ol>
			</div>
			
			<div class="col-sm-12">
				<?php if($this->session->flashdata('message')): 
								$add_class=$this->session->flashdata('add_class');
			?>
				<div class="alert alert-dismissible <?= $add_class ?>">
					<?= $this->session->flashdata('message'); ?>
				</div>
			<?php endif; 
			$this->session->set_flashdata('message',"");
			?>
			</div>
			     
	    <!-- Main content -->
	    <section class="content">
	        <div class="row">
				
				<div class="col-xs-3">
                    <ul class="list-group">
                        <li class="list-group-item"><b>Store Admin</b></li>
                        <?php 
						
						if(!empty($user)){
                        foreach($user as $results){ 
						$style_active='';
						$style_color='';
						if($user_id==$results['id'])
						{
							$style_active='style="background-color:#333;color:#FFF; "';
							$style_color='style="color:#FFF;"';
						}	
						
						?>
                            <li class="list-group-item" <?php echo $style_active; ?> ><a <?php echo $style_color; ?> href="<?php echo base_url().'index.php/users/location/'.$location_id.'/'.$results['id'];?>"><?php echo  $results['first_name']." ".$results['last_name'];?></a></li>
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
								<td><a href="<?php echo base_url()?>/players/player/<?php echo $res['id']  ?>" target="_blank" ><?php echo $res['player_id']; ?></a></td>
								<td><a href="<?php echo base_url()?>/players/player/<?php echo $res['id']  ?>" target="_blank" ><?php echo $res['name']; ?></a></td>
								<td>
			                  	<a href="<?php echo base_url()."index.php"; ?>/players/single/<?php echo $res['id']; ?>/<?php echo $location_id ?>"><i class="fa fa-edit"></i></a> 
			                  	<a onclick="return myConfirmation()" href="<?php echo base_url()."index.php"; ?>/players/delete/<?php echo $res['id']; ?>"><i class="fa fa-trash-o"></i></a>
			                  </td>
			                </tr>
											<?php }
											}else{
												?>
													<td colspan="4" class="text-center">
													<p class="text-left">Please select a user from list on the left side.</p>
													
													
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
