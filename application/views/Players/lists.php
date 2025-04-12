  <section class="page company_page">
<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

$this->load->view('./header_digital');
?>

<style>
    .page-display {
    float: right;
}
.pagination b {
    border: 1px solid #999999;
    transition: background-color .3s;
    text-decoration: none;
    padding: 8px 16px;
    color: #fff;
    background: #999999;
    float: left;

}
.pagination a:first-child {
    border-bottom-left-radius: 6px;
    border-top-left-radius: 6px;
}
.pagination a:last-child {
    border-bottom-right-radius: 6px;
    border-top-right-radius: 6px;
}
.pagination .label-pagination {
    float: left;
}
.pagination a:hover {
    background: #999999;
}

.pagination1 {
    display: inline-block;
    width: 100%;
}

.pagination a {
    color: white;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
}



.pagination a:hover:not(.active) {background-color: #ddd;}

.pagination-btns {
float: right;
}
    
    
    
</style>
  
  <section class="category company_page_content">
    <div class="container">
	

	
	
	
      <div class="col-md-10 offset-1">
          
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
	  
	  
	  
	  
	  <?php
	  
	  if(!empty($user))
	  {
	  
	  ?>
	  
	  <ul class="list-group">
                        <h4 style="color:#FFF;">Companies</h4>
        <div>&nbsp;</div>
        <div>&nbsp;</div>                
         <div class="row">
        <div class="col-md-8">
        </div>                         
        <div class="col-md-4">
        <form method="post" action="<?php echo base_url() ?>users/companies/">    
       <div class="input-group d-flex text-right">
        <div class="form-outline" data-mdb-input-init>
        <input id="search-focus" type="search" name="str_search" id="form1" class="form-control" value="<?php echo $str_search ?>" />
        </div>
   
                <input class="btn btn-block btn-info btn-flat" type="submit" name="Search" Value="Search"> 
        </div>
        </form>
        </div>
        </div>
         <div>&nbsp;</div>
        <div>&nbsp;</div> 
                       
                        <?php 
						
						
                        foreach($user as $results){ 
						$style_active='style=""';
						$style_color='';
						if($user_id==$results['id'])
						{
							$style_active='style=""';
							$style_color='style=""'; 
						}	
						 
						//print_r($results['company_logo']);
						
					
						
						?>
                            <?php /*?>
							<li class="list-group-item" <?php echo $style_active; ?> ><a <?php echo $style_color; ?> href="<?php echo base_url().'index.php/users/location/'.$location_id.'/'.$results['id'];?>"><?php echo  $results['first_name']." ".$results['last_name'];?></a></li>
                        <?php */?>
						 <li class="list-group-item" <?php echo $style_active; ?> >
						    
						     
							 
							 <input type="radio" name="select" onchange="convenio_unam(<?php echo $results['id'] ?>)" /> 
							 &nbsp;
							 
							<?php 
						     if(!empty($results['company_logo']))
						    {
						    ?>
							 
							 <img  src="<?php echo base_url()  ?>assets/company_logo/<?php echo $results['company_logo'] ?>">
						     <?php
                                }
						     else
							 {	 
							 ?>
						     <img  src="<?php echo base_url()  ?>assets/company_logo/image_not_avlable.jpg">
							 
							 <?php
							 }
							 ?>
							 
							 <a <?php echo $style_color; ?> href="<?php echo base_url().'index.php/users/companies_player/0/'.$results['id']?>"><strong><?php echo  $results['company_name'];?></strong></a></li>
                        
						
						<?php  } ?>
                    </ul>
                     
                    
              <?php
              
                }
                
                ?>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                 <div>&nbsp;</div>
        <div>&nbsp;</div> 
                    <div class="text-right"><?php echo $links ?></div>
                    
        <div class="row">
            
		 <div class="edit-btn">
				<?php /* ?>
                <span><a href="<?php echo base_url()."index.php"; ?>/players/add/<?php echo $location_id; ?>">
                <input class="btn btn-block btn-info btn-flat " type="button" name="Add Player" Value="Add Player">
                
				</span></a>
              <?php */ ?>
			  
			  
			  <?php
			  
			if($this->session->userdata('user_type')==1 )
		    {
			  
			  ?>
			  <span><a href="<?php echo base_url()."index.php"; ?>/users/add">
                
                <input class="btn btn-block btn-info btn-flat " type="button" name="Add Company" Value="Add Company"> 
				</span></a>

			  <?php
		    }
			  ?>
			  
			  </div>
		
		
		
		
		
		
		<?php
		
	
		
		if(!empty($result)){
		foreach ($result as $res) {
		?>

          <div class="col-md-4">
		  
		  
		  
		  
		  
		  
		  
            <div class="cate-details">
              <div class="row action">
			  
			  
			  
			  
			  
			  
                <div class="col-md-6">
                  <div class="delete"> <span><a href="<?php echo base_url()."index.php"; ?>/players/delete/<?php echo $res['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span> </div>
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
              <div class="details">
                <p>Player Id:  <span><a href="<?php echo base_url()?>/players/player/<?php echo $res['id']  ?>" target="_blank" ><?php echo $res['player_id']; ?></a></span></p>
                <p>Player Name: <span><a href="<?php echo base_url()?>/players/player/<?php echo $res['id']  ?>" target="_blank" ><?php echo $res['name']; ?></a></span></p>
                <p>Pin: <span><a href="<?php echo base_url()?>/players/player/<?php echo $res['id']  ?>" target="_blank" ><?php echo $res['pin']; ?></a></span></p>
              </div>
              <div class="edit-btn">
                <p class="text-center"><a href="<?php echo base_url()."index.php"; ?>/players/single/<?php echo $res['id']; ?>/<?php echo $location_id ?>" style="text-decoration: none;" >
                    <input class="btn btn-block btn-info btn-flat" type="button" name="Edit" Value="EDIT"> </a>
                     
                     &nbsp;&nbsp;&nbsp;
                     <a href="<?php echo base_url()?>/players/player/<?php echo $res['id']  ?>">
                    <input class="btn btn-block btn-info btn-flat " type="button" name="VIEW" Value="VIEW"> 
                     </a>
                     
                     
                     
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
													<!--
													<td colspan="4" class="text-center">
													
													
													<p class="text-left" style="color:#fff;"><strong>Please select a Company from Companies list.</strong></p>
													-->
													
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
	window.location.href = '<?php echo base_url()?>index.php/users/companies_player/0/'+company_id;
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
