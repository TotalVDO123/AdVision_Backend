<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section id="content">
      <section class="vbox">
        <?php
		$this->load->view('mid_header');
		?>
        <section class="scrollable wrapper">
          <div class="tab-content">
            <div class="tab-pane active" id="static">
              <div class="row">
			    <?php 
				$this->load->view('breadcrumb_nav');
				?>
                
		<?php if($message=$this->session->flashdata('message')): 
         $add_class=$this->session->flashdata('add_class');
		?>
		<div class="alert <?= $add_class ?>">
         <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
         <i class="fa fa-ban-circle"></i>
		  <?= $message; ?>
        </div>
		 <?php endif; ?>
				
				
				<div class="col-sm-3">
                <section class="hbox stretch">
                 <aside class="aside bg-white b-r" id="subNav">
				  <div class="wrapper b-b font-bold">All Player</div>
				  <ul class="nav">
					
					 <?php if(!empty($result->players)){
                        foreach($result->players as $results){ ?>
						 <li class="b-b"><a href="<?php echo base_url().'index.php/players/player/'.$results['id'];?>"><?php echo $results['player_id']." | ".$results['name'];?></a>
						 </li>
						
						<?php } 
						
						}else {
                            echo '<li class="b-b">No player found!</li>';
						} ?>
				  
				  </ul>
				 </aside>
                   
				  
				</section>
                </div>
                
				<div class="col-sm-9">
				<section class="panel">	
				<?php 
				  if(!empty($player_id))
				  {	
				  ?>
				  
				  
				  
				  
                    <!--<header class="panel-heading">Stats</header> -->
                    <table class="table table-striped m-b-none text-sm">
                      <thead>
                        <tr>
                          <th>Section</th>
                          <th>dimension</th>                    
                          <th>On/Off</th>
						  <th>Action</th>
                        </tr>
                      </thead>
                      <?php
					  if(empty($sections))
					  {
					  ?>
					  <form method="post" action="<?php echo base_url();?>index.php/section/Add_All_Section" >
					  <?php
					  }
					  else
					  {	  
					  
					  ?>
					  <form method="post" action="<?php echo base_url();?>index.php/section/update_section" >
					  <?php
					  }
					  ?>
					  
					  
					  <tbody>
                        <input type="hidden" name="player_id" id="player_id" value="<?php echo @$player_id ?>">
						<?php
				
						for($ii=0;$ii<4;$ii++)
						{
						?>
						<tr>                    
                          <input type="hidden" name="sno[]" value="<?php echo ($ii+1); ?>">
						  <input type="hidden" name="section_id[]" value="<?php echo @$sections[$ii]['id']?>">
						  
						  
						  <td><?php echo ($ii+1); ?></td>
                          
						  <td width="40%" >
						  <div class="col-md-4">
                            <input type="text" name="H_size[]" class="form-control" value="<?php echo @$sections[$ii]['H_size'] ?>" placeholder="H Size" required>
                          </div>
						  
						  <div class="col-md-4">
                            <input type="text" name="V_size[]" class="form-control" value="<?php echo @$sections[$ii]['V_size'] ?>" placeholder="V Size" required>
                          </div>
						  
						  </td>
                          
						  <td>
							 <label class="switch">
                          <input type="checkbox" <?php if(@$sections[$ii]['status']==1){ ?> checked="checked" <?php } ?> name="status<?php echo $ii ?>" value="1" >
                          <span></span>
								</label>
						  </td>
						
						<td>
						<a href="javascript:void(0);" data-href="<?php echo base_url()."index.php/section/model_get_Section_detaile/".@$sections[$ii]['id'] ?>" class="dropdown-toggle openPopup" data-toggle="dropdown"><i class="fa fa-pencil"></i></a>
						</td>
						
						</tr>
                        <?php
						}
						?>
						
						<tr>
						<td colspan="4" >
						
						<input type="submit" class="btn btn-white" name="SUBMIT">
						
						</td>
						</tr>
						
                      
                      </tbody>
					  </form>
                    </table>
                  
                <?php
				  }
				  else
				  { 	   
				?>
				<div class="alert alert-primary mt-20" role="alert">
                  <strong> Please select a player from list on the left side.</strong>
                </div>
				<?php
				  }
				?>
				</section>
				</div>
              
			  
			  </div>
              
            
						
			
			</div>
            
			
			
		  
		  </div>
        </section>
      </section>
      <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
    </section>
    <!-- /.vbox -->
  </section>
	


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        
		<form method="post" action="<?php echo base_url();?>index.php/section/update" >
		<div class="modal-content"  >
				<div class="row">
                <div class="col-sm-12">
                  <section class="panel">
                    <header class="panel-heading">
                      <div class="col-sm-10" id="section_txt" >
					  Section
					  </div>	
						<label class="switch">
                          <input id="statusid" name="status" type="checkbox">
                          <span></span>
						</label>		
                    </header>
                    <table class="table table-striped m-b-none text-sm">
                      <thead>
                        <tr>
                          <th>Playlist</th>
                          <th>From Time</th>                    
                          <th>To Time</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>                    
                          <td width="30%">
                         
                          <select multiple class="form-control" name="playlist_id[]" id="playlistId" >
						<?php
						if(!empty($result->playlists))
						{
							foreach($result->playlists as $playlist)
							{
							?>
							<option value="<?php echo $playlist['id'] ?>" ><?php echo $playlist['name'] ?></option>
                            <?php
							}
						}		
						?>
                          </select>
                       
                          </td>
                          <td width="30%" >
						  <div class="input-group bootstrap-timepicker timepicker">
							<input id="from_date" type="text" class="form-control input-small">
							<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
						  </div>
						  
						  </td>
                          
						  <td class="text-right">
                             <div class="input-group bootstrap-timepicker timepicker">
							<input id="to_date" type="text" class="form-control input-small">
							<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
						  </div>
                          </td>
                        </tr>
                      
                      </tbody>
                    </table>
                  </section>
                </div>
                
              </div>
			<!--
			<div class="row">
				<div class="col-sm-12"  style="margin: 10px 100px;" >
					<div class="form-group"  style="align-items: center" >
					  <textarea  class="form-control rounded-0" id="scroll_text" rows="3"></textarea>
					</div>
				</div>
			</div>
			<input type="hidden" id="playlist_id" value="">
			-->
			<input type="hidden" name="section_id" id="sectionid">
			<div class="modal-footer">
                <button type="button" class="btn btn-default" url-data="<?php echo base_url();?>index.php/section/update" id="section_update" >Update</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
	</form>	
    </div>
</div>






<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

<script>
$(document).ready(function(){
    $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
		//var playlist_id =$(this).attr('data-id');
		//$('#playlist_id').val(playlist_id);
		
		$('#sectionid').load(dataURL,function(aa){
		$("#playlistId option:selected").prop("selected", false);	
		var fields = aa.split('XXXX');
				
			$.each(fields[3].split(","), function(i,e){
				$("#playlistId option[value='" + e + "']").prop("selected", true);
			});
			
			
			$('#from_date').val(fields[1]);
			$('#to_date').val(fields[2]);
			$('#sectionid').val(fields[5]);
			$('#section_txt').html(fields[6]);
			
			
			if(fields[4]==1)
			{	
			$('#statusid').prop('checked', true);
			}
			else
			{
			$('#statusid').prop('checked', false);	
			}	
			
			//$('#scroll_text').val(aa);	
            $('#myModal').modal({show:true});
        });
    }); 
});
</script>

                        
<script>
	$(document).ready(function(){		
	$('#section_update').on('click',function(){

			$.ajax({
			type: 'POST',
			url: $(this).attr('url-data'),
			data: "section_id="+$('#sectionid').val()+"&player_id="+$('#player_id').val()+"&from_date="+$('#from_date').val()+"&to_date=" + $('#to_date').val() + "&playlist_id=" + $('select#playlistId').val(),
			dataType: 'json',
			success: function(response) 
			{
				alert('Section saved successfully');
				$('#myModal').modal('hide');
			}
		});
	});	
	
	
	$('#section_dim_update').on('click',function(){

			$.ajax({
			type: 'POST',
			url: $(this).attr('url-dim-data'),
			data: "section_id="+$('#sectionid').val()+"&player_id="+$('#player_id').val()+"&from_date="+$('#from_date').val()+"&to_date=" + $('#to_date').val() + "&playlist_id=" + $('select#playlistId').val(),
			dataType: 'json',
			success: function(response) 
			{
				alert('Section saved successfully');
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


