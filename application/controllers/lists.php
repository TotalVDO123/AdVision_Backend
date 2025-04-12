<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <div class="float-left">
            <ol class="breadcrumb">
                <li><a href="#">Playlist</a></li>
                <li class="active">All Playlist</li>
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
                        <li class="list-group-item"><b>All Players</b></li>
                        <?php if(!empty($result->players)){
                        foreach($result->players as $results){ ?>
                            <li class="list-group-item"><a href="<?php echo base_url().'index.php/playlists/index/'.$results['id'];?>"><?php echo $results['player_id']." | ".$results['name'];?></a></li>
                        <?php } }else {
                            echo '<li class="list-group-item text-center">No player found!</li>';
                        } ?>
                    </ul>
                </div>
		        <div class="col-xs-9">
                    <?php if(!empty($this->uri->segment(3))){ ?>
			        <div class="box">
						<div class="row" style="margin-top:20px">
							<div class="col-xs-9">
								<div class="box-header">
			                  		<h3 class="box-title">Showing Playlist for Player : 
                                        <?php echo $this->uri->segment(3);?>
                                    </h3>
			            		</div>
                            </div>
							<div class="col-xs-2 col-xs-offset-1 ">
								<a href="<?php echo base_url().'index.php/playlists/add/'.$this->uri->segment(3);?>" class="mt-10"> 
							    	<button type="button" class="btn btn-primary">Add Playlist</button>
									
								 </a> 
						    </div>
						</div>
			            
			            <!-- /.box-header -->
			            <div class="box-body">
			              <table id="example1" class="table table-bordered table-striped">
			                <thead>
			                <tr>
                                <th>Playlist Id</th>
                                <th>Playlist Name</th>
                                <th>From Time</th>
                                <th>To Time</th>
                                <th>Screen count</th>
                                <th>Total File Size</th>
                                <th>Action</th>
			                </tr>
			                </thead>
			                <tbody>
                            <?php
							if((isset($result->playlists)&& !empty($result->playlists)) && (isset($result->details)&&!empty($result->details))){
                            foreach ($result->playlists as $res) {
                            ?>
			                <tr>
                                <td><?php echo $res['id']; ?></td>
                                <td><?php echo $res['name']; ?></td>
                                <td><?php echo $res['from_time']; ?></td>
                                <td><?php echo $res['to_time']; ?></td>
                                <td><?php echo "7"; ?></td>
                                <td><?php echo "15.00 MB"; ?></td>
                                <td>
                                    <!--a href="#"><i class="fa fa-edit"></i></a-->
                                    <a href="<?php echo base_url()."index.php"; ?>/playlists/single/<?php echo $res['id']; ?>"><i class="fa fa-edit"></i></a>

									 <a href="javascript:void(0);" data-href="<?php echo base_url()."index.php/playlists/add_scrolltext/".$res['id']; ?>" data-id="<?php echo $res['id']; ?>" class="openPopup"><i class="fa fa-comments-o" aria-hidden="true"></i>
</a>
	
                                </td>
			                </tr>
                            <?php } } ?>                                
			                </tbody>
			                <tfoot>
			                <tr>
                                <th>Playlist Id</th>
                                <th>Playlist Name</th>
                                <th>From Time</th>
                                <th>To Time</th>
                                <th>Screen count</th>
                                <th>Total File Size</th>
                                <th>Action</th>
			                </tr>
			                </tfoot>
			              </table>
			            </div>
			            <!-- /.box-body -->
			        </div>
                    <?php }else{ ?>
                    <div class="alert alert-primary mt-20" role="alert">
                    Please select a player from list on the left side.
                  </div>
                    <?php } ?>
		        </div>
	         <!-- /.col -->
	        </div>
	      <!-- /.row -->
	    </section>
    </div>
   <!-- ./ Content wrapper -->
  </div> 
  <!-- ./wrapper -->
  
  <!-- Trigger the modal with a button -->


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Scrolling Text</h4>
            </div>
            <div class="modal-body"></div>
		
			<div class="row">
				<div class="col-sm-6" >
					<div class="form-group"  style="align-items: center" >
					  <textarea  class="form-control rounded-0" id="scroll_text" rows="3"></textarea>
					</div>
				
				
				</div>
			</div>
			<input type="hidden" id="playlist_id" value="">
			
			
			
			<div class="modal-footer">
                <button type="button" class="btn btn-default" id="add_text" >ADD</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
		var playlist_id =$(this).attr('data-id');
		$('#playlist_id').val(playlist_id);
		$('#scroll_text').load(dataURL,function(){
            $('#myModal').modal({show:true});
        });
    }); 
});
</script>

<script>
	$(document).ready(function(){		
	$('#add_text').on('click',function(){		
			$.ajax({
			type: 'POST',
			url: "<?php echo base_url().'index.php/playlists/update_scrollText';?>",
			data: "scroll_text=" + $('#scroll_text').val() + "&playlist_id=" + $('#playlist_id').val(),
			dataType: 'json',
			success: function(response) 
			{
						alert('Scrolling text saved successfully');
						$('#myModal').modal('hide');
			}
		});
	});	
	});	
</script>




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


