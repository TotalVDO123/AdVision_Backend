  <section class="page company_page">
<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

$this->load->view('./header_digital');
?>


  <!--  <section class="search-bar">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="search">
            <input type="text" id="searchInput" placeholder="Search by name">
            <div id='submitsearch'> <span>Search</span> </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="filter-buttons">
            <div class="list-view-button"><i class="fa fa-bars"></i></div>
            <div class="grid-view-button"><i class="fa fa-th-large"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>-->
  <section class="category company_page_content">
    <div class="container">
	

	
	
	 <!--offset-1 -->
      <div class="col-md-11">
	  
	  <h4 style="color:#FFF;">Company Screens</h4>
          
          <?php /* ?>
	  
	     <h4>Locations</h4>
		  <ul class="list-group">
		  
		   <?php
		 $where_as="";
		if($this->session->userdata('user_type')!=1 )
		{	
			$where_as=" and users.id='". $this->session->userdata('user_id')."'";
		}
		$sql = "SELECT location.* FROM  location left join  users on FIND_IN_SET(location.id,users.location_id ) where 1 ". $where_as ." group by location.id ";
		
		$res = $this->db->query($sql);
		$result_location= $res->result_array();
		 foreach($result_location as $location )
		{
		$tmp_action='';
		
		
		$style_active='';
		$style_color='';
		if($location['id']===$location_id)
		{
			//$tmp_action='class="list-group-item active"';
			$style_active='style="background-color:#333;color:#FFF; "';
			$style_color='style="color:#FFF;"';
							
		}
	
		?> 
            <li  class="list-group-item"  <?php echo $style_active; ?>  ><a <?php echo $style_color; ?> href="<?php echo base_url()."index.php"; ?>/users/location/<?php echo $location['id'] ?>"><strong> <?php echo $location['location'] ?> </strong></a></li>
          
		<?php
		}
		?>
		  
		 
		  </ul>
	  
	   <?php */ ?>
	  
	  
	  
	  <div>
	  
	  <?php
	  
	  if(!empty($user))
	  {
	  
	  ?>
	  
	
                    
                        <?php 
						
                        foreach($user as $results){ 
						$style_active='style=""';
						$style_color='';
						if($user_id==$results['id'])
						{
							$style_active='style=""';
							$style_color='style=""'; 
						
						  if(!empty($results['company_logo']))
						    {
						        ?>
						     
							 
						
							 <img height="35" width="35" src="<?php echo base_url()  ?>assets/company_logo/<?php echo $results['company_logo'] ?>">
							 <span style="color:#FFF;"><strong ><?php echo  $results['company_name'];?></strong>	</span>	
		

							<?php
                                }
						     
							 
							 
						}	 
						?>
						
						
					
						 
						
					
			
                    
                    
              <?php
              
                }
				
				
	  }	
              ?>  
          
		
				<span style="float:right"><a href="<?php echo base_url()."index.php"; ?>/players/add/0">
                <input class="btn btn-block btn-info btn-flat " type="button" name="Add Player" Value="Add Screen"> 
				</a></span>
				&nbsp;&nbsp;&nbsp;
				<div>&nbsp;</div>
		</div>		
		  
                
          
					
        <div class="row">
            
		
		
		
		
		
		
		<?php
		
		
		
		
		if(!empty($result)){
		foreach ($result as $res) {
		?>

          <div class="col-md-4">
		  *****
		  
		  
		  
		  
		  
		  
            <div class="cate-details">
              <div class="row action">
			  
			  
			  
			  
			  
			  
                <div class="col-md-6">
                  <div class="delete"> <span><a onclick="return confirm('Are you sure you want to delete this Screen?');" href="<?php echo base_url()."index.php"; ?>/players/delete/<?php echo $res['id'] ?>/<?php echo $res['user_id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span> </div>
                </div>
                
                
                <?php
                //echo "=============".$res['reaccess_flag'];
               if($res['reaccess_flag']==1)
               {
                ?>
                <div class="col-md-6" id="show_hide" >
                  <div class="live" align="right">
                    <button type="button" id="live_player" class="btn btn-success" onClick = "change_player_access_flag(<?php echo $res['id'] ?>);" ><i class="fa fa-circle"></i> Live</button>
                   
                    </div>
                </div>
                <?php
                
               }
                ?>
              </div>
              
              <?php /* ?>
              <div class="details">
                <p>Player Id:  <span><a href="<?php echo base_url()?>/players/player/<?php echo $res['id']  ?>" target="_blank" ><?php echo $res['player_id']; ?></a></span></p>
                <p>Player Name: <span><a href="<?php echo base_url()?>/players/player/<?php echo $res['id']  ?>" target="_blank" ><?php echo $res['name']; ?></a></span></p>
                <p>Pin: <span><a href="<?php echo base_url()?>/players/player/<?php echo $res['id']  ?>" target="_blank" ><?php echo $res['pin']; ?></a></span></p>
              </div>
              <?php */ ?>
              
              <div class="details">
                <p>Player Id:  <span><?php echo $res['player_id']; ?></a></span></p>
                <p>Player Name: <span><?php echo $res['name']; ?></a></span></p>
                <p>Pin: <span><?php echo $res['pin']; ?></a></span></p>
                
                <?php
                
                if(!empty($res['schedule_id']))
                {
                
                	$schedule_result =$this->db->where(['id'=>$res['schedule_id']])->get('schedule');	
                    $schedule_res= $schedule_result->row();
                    //print_r($schedule_res->name);
                ?>
                
                <p>Schedule Name: <a target="_blank" href="<?php echo base_url() ?>/Playlists/playlistschedule/<?php echo $res['schedule_id'] ?>"> <span><?php echo $schedule_res->name; ?></a></span></a></p>
                
                <?php
                
                }
                ?>
                
                
              </div>
              
              
              
              <div class="edit-btn">
                <p class="text-center"><a href="<?php echo base_url()."index.php"; ?>/players/single/<?php echo $res['id']; ?>/<?php echo $location_id ?>" style="text-decoration: none;" >
                    <input class="btn btn-block btn-info btn-flat" type="button" name="Edit" Value="EDIT"> </a>
                     
                     
                     <?php /* ?>
                     &nbsp;&nbsp;&nbsp;
                     
                      <a href="<?php echo base_url()?>/players/player/<?php echo $res['id']  ?>">
                    <input class="btn btn-block btn-info btn-flat " type="button" name="VIEW" Value="VIEW"> 
                     </a>
                     <?php */ ?>
                      <?php /* ?>
                     <a href="<?php echo base_url()?>players/player_schedules/<?php echo $res['id']  ?>">
                    <input class="btn btn-block btn-info btn-flat " type="button" name="VIEW" Value="VIEW"> 
                     </a>
                      <?php */ ?>
                     
                     
                     </p>
              </div>
              
          
              
            </div>
          </div>
		  
		  <?php /*?>
          <div class="col-md-4">
            <div class="cate-details">
              <div class="row action">
                <div class="col-md-6">
                  <div class="delete"> <span><a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-danger"><i class="fa fa-pause-circle"></i> Pause</button>
                    <!--<a href="#" class="btn btn_live"><span class="live-icon"></span> Live</a> --></div>
                </div>
              </div>
              <div class="details">
                <p>Location: <span>Bar Main</span></p>
                <p>Playing: <span>National</span></p>
              </div>
              <div class="edit-btn">
                <p class="text-center"><span><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></span></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="cate-details">
              <div class="row action">
                <div class="col-md-6">
                  <div class="delete"> <span><a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-secondary"><i class="fa fa-stop-circle-o"></i> Offline</button>
                    <!--<a href="#" class="btn btn_live"><span class="live-icon"></span> Live</a>--> </div>
                </div>
              </div>
              <div class="details">
                <p>Location: <span>From Window</span></p>
                <p>Playing: <span>National</span></p>
              </div>
              <div class="edit-btn">
                <p class="text-center"><span><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></span></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="cate-details">
              <div class="row action">
                <div class="col-md-6">
                  <div class="delete"> <span><a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-success"><i class="fa fa-circle"></i> Live</button>
                    <!--<a href="#" class="btn btn_live"><span class="live-icon"></span> Live</a>--> </div>
                </div>
              </div>
              <div class="details">
                <p>Location: <span>Manchester</span></p>
                <p>Playing: <span>National</span></p>
              </div>
              <div class="edit-btn">
                <p class="text-center"><span><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</span></a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="cate-details">
              <div class="row action">
                <div class="col-md-6">
                  <div class="delete"> <span><a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-danger"><i class="fa fa-pause-circle"></i> Pause</button>
                    <!--<a href="#" class="btn btn_live"><span class="live-icon"></span> Live</a> --></div>
                </div>
              </div>
              <div class="details">
                <p>Location: <span>Bar Main</span></p>
                <p>Playing: <span>National</span></p>
              </div>
              <div class="edit-btn">
                <p class="text-center"><span><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></span></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="cate-details">
              <div class="row action">
                <div class="col-md-6">
                  <div class="delete"> <span><a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-secondary"><i class="fa fa-stop-circle-o"></i> Offline</button>
                    <!--<a href="#" class="btn btn_live"><span class="live-icon"></span> Live</a>--> </div>
                </div>
              </div>
              <div class="details">
                <p>Location: <span>From Window</span></p>
                <p>Playing: <span>National</span></p>
              </div>
              <div class="edit-btn">
                <p class="text-center"><span><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></span></p>
              </div>
            </div>
          </div>
		  
		  <?php */?>
		  
		  <?php }
											}else{
												?>
													<td colspan="4" class="text-center">
													<!--<p class="text-left" style="color:#fff;"><strong>Please select a Companies from list on the left side.</strong></p> -->
													
													<!--<p class="text-left" style="color:#fff;"><strong>Please select a Company from Companies list.</strong></p> -->
													<div style="height:100px" >&nbsp;</div>
													<p class="text-left" style="color:#fff;"><strong>There are not screen in this company.</strong></p>
													</td>
											<?php }
											?>
		  
		  
        </div>
      </div>
    </div>
  </section>
  </section>
</main>
</body>
<!--
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
-->

<script src="<?php echo base_url()?>assets/digital/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>assets/digital/js/bootstrap.min.js"></script>



<script>
    
    function change_player_access_flag(player_id) 
    {
        
        
        
       //var nvalue= $('#duration_'+screen_id+'_'+playlist_id).val();
       //alert('---------------------'+player_id);
       
         $.ajax({
            url: "<?php echo base_url() ?>/users/update_player_access_flag",
            type: "POST",
            data: { player_id:player_id},
            success: function(response) {
                
                alert('Access Flag is updated successfully');
                
                $('#show_hide').html('');
                
                
              // Update the response element with the response from the server
              //$("#response").html(response);
              //return false
            }
  });

         return false
    }
    
</script>

<script>


function convenio_unam(company_id)
{
	
	///alert('---------------'+company_id);
	window.location.href = '<?php echo base_url()?>index.php/users/companies/0/'+company_id;
}
</script>

<!--<script>
 $("#searchInput").focus(function () {
  
        $("#searchInput").css({
          "display": "inline",
          "width": "40%",
          "border": "1px solid #40585d",
          "opacity": "1",
          "padding": "8px 20px 8px 20px",
          "background-image": "none",
          "box-shadow": "0 0 1px black"
        });
        $("#submitsearch").css("display", "inline");
       
        $("#searchInput").prop("placeholder", "");
      });
</script>-->
<!--<script>

const listViewButton = document.querySelector('.list-view-button');
const gridViewButton = document.querySelector('.grid-view-button');
const list = document.querySelector('ol');

listViewButton.onclick = function () {
  list.classList.remove('grid-view-filter');
  list.classList.add('list-view-filter');
}

gridViewButton.onclick = function () {
  list.classList.remove('list-view-filter');
  list.classList.add('grid-view-filter');
}
</script>-->
</html>
