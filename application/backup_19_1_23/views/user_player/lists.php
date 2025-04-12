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
				  <div class="wrapper b-b font-bold">All Players</div>
				  <ul class="nav">
					
					 <?php if(!empty($result)){
						 $playerid= $this->uri->segment(3);
                        foreach($result as $results){ 
						$li_style='';
						if( $results['id']==$playerid )
						{
						  $li_style='style="background-color:#ccc;" '; 
						} 
						
						?>
						 <li class="b-b" <?php echo $li_style ?>  ><a href="<?php echo base_url().'players/player/'.$results['id'];?>"><?php echo $results['player_id']." | ".$results['name'];?></a>
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
                          <th>Dimension</th>                    
                          <th>On/Off</th>
						  <th>Action</th>
                        </tr>
                      </thead>
                      <?php
					  if(empty($sections))
					  {
					  ?>
					  <form method="post" action="<?php echo base_url();?>section/Add_All_Section" >
					  <?php
					  }
					  else
					  {	  
					  ?>
					  <form method="post" action="<?php echo base_url();?>section/update_section" >
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
                          
						  <td width="40%">
						  <div class="col-md-4">
                            
							
						<select class="form-control" name="H_size[]">
						<?php
							for($c=0;$c<=10;$c++)
							{
							?>
							<option value="<?php echo $c ?>" <?php if(@$sections[$ii]['H_size']==$c){?> selected="selected" <?php }?> ><?php echo $c ?></option>
                            <?php
							}
						?>
                          </select>
							
						<?php /* ?>	
							<input type="text" name="H_size[]" class="form-control" value="<?php echo @$sections[$ii]['H_size'] ?>" placeholder="H Size" required>
                         <?php */ ?> 
						  
						  </div>
						  
						  <div class="col-md-4">
							<select class="form-control" name="V_size[]">
						<?php
							for($c=0;$c<=10;$c++)
							{
							?>
							<option value="<?php echo $c ?>" <?php if(@$sections[$ii]['V_size']==$c){?> selected="selected" <?php }?> ><?php echo $c ?></option>
                            <?php
							}
						?>
                          </select>
							
							<?php /* ?>
							<input type="text" name="V_size[]" class="form-control" value="<?php echo @$sections[$ii]['V_size'] ?>" placeholder="V Size" required>
                            <?php */ ?>
						  
						  </div>
						  </td>
                          
						  <td>
							 <label class="switch">
                          <input type="checkbox" <?php if(@$sections[$ii]['status']==1){ ?> checked="checked" <?php } ?> id="status_<?php echo ($ii+1) ?>" name="status<?php echo $ii ?>" value="1" >
                          <span></span>
								</label>
						  </td>
						
						<td>
						<a href="javascript:void(0);" data-href="<?php echo base_url()."section/model_get_Section_detaile/".@$sections[$ii]['id'] ?>" class="dropdown-toggle openPopup" data-toggle="dropdown"><i class="fa fa-pencil"></i></a>
						</td>
						
						</tr>
                        <?php
						$scrolling_text=@$sections[$ii]['scrolling_text'];
						$rss_feeds=@$sections[$ii]['rss_feeds'];
						$show_scrolling_rss=@$sections[$ii]['show_scrolling_rss'];
						}
						?>
						
						<td colspan="3" >
						<div class="form-group">
                        <label>Scrolling Text</label>    
						
                            <textarea class="form-control" name="scrolling_text" rows="1" data-minwords="3" data-required="true" placeholder="Scrolling text"> <?php echo trim($scrolling_text); ?></textarea>
						</div>
						
                         <!--
						<div class="form-group">
                            <label>Rss feeds</label>
                            <textarea class="form-control" name="rss_feeds" rows="1" data-minwords="1" data-required="true" placeholder="Rss feeds"> <?php echo trim($rss_feeds); ?></textarea>
						</div>
						-->

						</td>
						
						
						<td>
						<div class="form-group">
                        <label>&nbsp;</label>    
						<span class="input-group-addon">
                           <input type="radio" name="scrollingtext_rssfeeds" value="0" <?php if($show_scrolling_rss==0){ ?> checked="checked" <?php } ?>>
                        </span>
						</div>
						</td>
						<tr>
						
						<tr>
						<td colspan="3" >
						<div class="form-group">
                            <label>RSS Feeds</label>
                            <textarea class="form-control" name="rss_feeds" rows="1" data-minwords="1" data-required="true" placeholder="Rss feeds"> <?php echo trim($rss_feeds); ?></textarea>
						</div>
						<td>
						<div class="form-group">
                        <label>&nbsp;</label>    
						<span class="input-group-addon">
                           <input type="radio" name="scrollingtext_rssfeeds" value="1" <?php if($show_scrolling_rss==1){ ?> checked="checked" <?php } ?> >
                        </span>
						</div>
						</td>
						
						</td>
						</tr>					
						
						
						
						
						<td colspan="4" >
						
						<input type="submit" class="btn btn-white" value="Update" name="SUBMIT">
						
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
        
		<form method="post" action="<?php echo base_url();?>section/update"  >
		<div class="modal-content" >
				<div class="row">
                <div class="col-sm-12">
                  <section class="panel">
                    <header class="panel-heading">
                      <div class="col-sm-10" id="section_txt" >
					  Section
					  </div>	
						<label class="switch">
                          <input id="statusid" name="status" value="" type="checkbox">
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
						if(!empty($playlists))
						{
							foreach($playlists as $playlist)
							{
							?>
							<option value="<?php echo $playlist['id'] ?>" ><?php echo $playlist['name'] ?></option>
                            <?php
							}
						}		
						?>
                          </select>
                       <div>&nbsp;</div>
					   <a href="javascript:void(0); " id="addplaylist" data-playlisturl="<?php echo base_url().'playlists/add/'?>" ><strong>ADD PLAYLIST</strong></a>
                          </td>
                          <td width="30%" >
						  <div class="input-group bootstrap-timepicker timepicker">
							<input id="from_date" type="text" class="form-control input-small" readonly="readonly">
							<span class="input-group-addon"  ><i class="glyphicon glyphicon-time"></i></span>
						  </div>
						  
						  </td>
                          
						  <td class="text-right">
                             <div class="input-group bootstrap-timepicker timepicker">
							<input id="to_date" type="text" class="form-control input-small" readonly="readonly">
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
                <button type="button" class="btn btn-default" url-data="<?php echo base_url();?>section/update" id="section_update" >Update</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
	</form>	
    </div>
</div>


<!-- Modal Playlist -->
<div class="modal fade" id="myModal_playlist" role="dialog" >


 <div class="modal-dialog" style="width:650px;" > 
        <!-- Modal content-->
        <input type="hidden" name="section_id" id="playlist_open">
		<div class="col-sm-12">
                  <section class="panel">
                    <div> &nbsp; </div>
					<header class="panel-heading font-bold">Add Playlist</header>
                    <div> &nbsp; </div>
					<div class="panel-body">
                        
						
						<div class="form-group">
                          <label class="col-lg-2 control-label">Playlist Name</label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" id="playlist_name" required>
                          </div>
                        </div>
					   
					   </div> 
                       <div class="modal-footer">   
                            <button type="button" class="btn btn-sm btn-default" id="add_playlist" url-data-playlist="<?php echo  base_url()?>playlists/add/" >Add</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                       </div>  
                       
                   
                  </section>
                </div>
              
		
		
		
		
		
		
		
			<!--
			<input type="hidden" name="section_id" id="playlist_open">
			<div class="modal-footer">
                <button type="button" class="btn btn-default" url-data="<?php echo base_url();?>index.php/section/update" id="section_update" >Update</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        -->
		
		
		
		
		
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
			
				//$('#statusid').val(1);
			
			$('#statusid').prop('checked', true);
			}
			else
			{
			//$('#statusid').val(0);
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
    $('#addplaylist').on('click',function(){
        var dataURL = $(this).attr('data-playlisturl');
		//var playlist_id =$(this).attr('data-id');
		//$('#playlist_id').val(playlist_id);
		
		$('#playlist_open').load(dataURL,function(aa){
		//$("#playlistId option:selected").prop("selected", false);	
		$('#playlist_name').val('');
			
            $('#myModal_playlist').modal({show:true});
        });
    }); 
});
</script>







                        
<script>
	$(document).ready(function(){		
	
	
	$('#add_playlist').on('click',function(){
		
		if($('#playlist_name').val()=='')
		{
				alert('Playlist name is required');
				return false
		}
		
		
			$.ajax({
			type: 'POST',
			url: $(this).attr('url-data-playlist'),
			data: "playerId="+$('#player_id').val()+"&name="+$('#playlist_name').val(),
			dataType: 'text',
			success: function(response) 
			{
				var fields = response.split('XXXX');
				
				
				$('#playlistId').append($("<option></option>")
                    .attr("value",fields[0])
                    .text($('#playlist_name').val()));
				
				alert(fields[1]);
				//alert('Section saved successfully');
				$('#myModal_playlist').modal('hide');
			}
		});
	});	
	
	
	
	
	
	
	
	
	
	
	
	$('#section_update').on('click',function(){
		
		
		//alert($('#statusid').prop('checked')	);
		
		//var from = $('#from_date').val();
		//var to = $('#to_date').val();
		//if(from > to){
			//$('#Msg').text('To date must be greater than from').css('color','red');
		//	alert('To date must be greater than from time');
		//	return false;
		
		//}

			$.ajax({
			type: 'POST',
			url: $(this).attr('url-data'),
			data: "section_id="+$('#sectionid').val()+"&player_id="+$('#player_id').val()+"&from_date="+$('#from_date').val()+"&to_date=" + $('#to_date').val() + "&playlist_id=" + $('select#playlistId').val()+"&status="+$('#statusid').prop('checked'),
			dataType: 'json',
			success: function(response) 
			{
				var tmp_section=$('#section_txt').html();
				var array_section = tmp_section.split(' ');
				//alert(array_section[1]);
				if($('#statusid').prop('checked')==true)
				{	
					$('#status_'+array_section[1]).prop('checked', true);
				}
				else
				{
					$('#status_'+array_section[1]).prop('checked', false);	
				}
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

<SCRIPT TYPE="text/JavaScript">
    function chktimevalidation()
	{
		var from = $('#from_date').val();
		var to = $('#to_date').val();
		if(from > to){
			//$('#Msg').text('To date must be greater than from').css('color','red');
			alert('To date must be greater than from time');
			return false;
		} else{
			//$('#Msg').text('Valid').css('color','green');
			return true;
		}	
	}
</SCRIPT>

