<?php
$this->load->view('./header_digital'); 
?>
 <section class="category">
    <div class="container">
        
        <h4 style="color:#FFF;">Screens</h4>
        
      <div class="col-md-12">
        <div class="row">
         <?php
		 //foreach($result->gallery as $data)
		 //{
		
		
		    $user_id=  $this->session->userdata('user_id');
		
		
		
		$sql = "SELECT P.*, PL.id as playlist_id , PL.name as playlist_name FROM players P inner join playlists PL on P.id=PL.playerId    where P.user_id='".$user_id."'";
		$res = $this->db->query($sql);
		$players= $res->result_array();
		
		foreach($players as $player)
		{
		?>
		
		
		<div>
		    
		   <?php echo $player['player_id'] ?>|<?php echo $player['name'] ?>
		</div>
		<br>
		<?php
		if(!empty($player['playlist_id']))
		{
			$playlist_id=$player['playlist_id'];
			$playlist_gallery=$this->playlists_model->GetPlaylistGallery($playlist_id);
				
		foreach($playlist_gallery as $row)		

		{	
		
		
			 $file_name=   strip_tags($row['file_name']);
		  ?>
		  <div class="col-md-3" id="screen_<?php echo $row['id']?>"  >
            <div class="playlist-details">
              <div class="row action">
                <div class="col-md-12">
                    
                    
                <div class="live" align="right">
                    <button type="button" class="btn btn-secondary"><i class="fa fa-stop-circle-o"></i> Offline</button>
                </div>

                <!--  <div class="live" align="right">
                    <button type="button" class="btn btn-success"><i class="fa fa-circle"></i> Live</button>
                  </div>-->

                </div>
              </div>
              <div class="playlist-cont">
               <!-- <p class="location">Location</p> -->
                <p><?php echo $file_name; ?></p>
              </div>
              <div class="btnn">
                <div class="row">
                <div class="col-md-6 edit">
                  <!--  <p class="text-center"><a href="#"><i class="fa fa-pencil-square-o"></i></a></p> -->
                  </div>
                  <div class="col-md-6 delete1 del_screen" screen_id="<?php echo $data['id']; ?>" >
                    <p class="text-center"><a href="#"><i class="fa fa-trash-o"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  
		  <?php
		}
		    
		}
		} 
		  ?>
		   <!--
		 
          <div class="col-md-3">
            <div class="playlist-details">
              <div class="row action">
                <div class="col-md-12">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-danger"><i class="fa fa-pause-circle"></i> Pause</button>
                  </div>
                </div>
              </div>
              <div class="playlist-cont">
                <p class="location">Location</p>
                <p>Playlist name</p>
              </div>
              <div class="btnn">
                <div class="row">
                  <div class="col-md-6 edit">
                    <p class="text-center"><a href="#"><i class="fa fa-pencil-square-o"></i></a></p>
                  </div>
                  <div class="col-md-6 delete1">
                    <p class="text-center"><a href="#"><i class="fa fa-trash-o"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="playlist-details">
              <div class="row action">
                <div class="col-md-12">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-secondary"><i class="fa fa-stop-circle-o"></i> Offline</button>
                  </div>
                </div>
              </div>
              <div class="playlist-cont">
                <p class="location">Location</p>
                <p>Playlist name</p>
              </div>
              <div class="btnn">
                <div class="row">
                  <div class="col-md-6 edit">
                    <p class="text-center"><a href="#"><i class="fa fa-pencil-square-o"></i></a></p>
                  </div>
                  <div class="col-md-6 delete1">
                    <p class="text-center"><a href="#"><i class="fa fa-trash-o"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="playlist-details">
              <div class="row action">
                <div class="col-md-12">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-success"><i class="fa fa-circle"></i> Live</button>
                  </div>
                </div>
              </div>
              <div class="playlist-cont">
                <p class="location">Location</p>
                <p>Playlist name</p>
              </div>
              <div class="btnn">
                <div class="row">
                  <div class="col-md-6 edit">
                    <p class="text-center"><a href="#"><i class="fa fa-pencil-square-o"></i></a></p>
                  </div>
                  <div class="col-md-6 delete1">
                    <p class="text-center"><a href="#"><i class="fa fa-trash-o"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="playlist-details">
              <div class="row action">
                <div class="col-md-12">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-success"><i class="fa fa-circle"></i> Live</button>
                  </div>
                </div>
              </div>
              <div class="playlist-cont">
                <p class="location">Location</p>
                <p>Playlist name</p>
              </div>
              <div class="btnn">
                <div class="row">
                  <div class="col-md-6 edit">
                    <p class="text-center"><a href="#"><i class="fa fa-pencil-square-o"></i></a></p>
                  </div>
                  <div class="col-md-6 delete1">
                    <p class="text-center"><a href="#"><i class="fa fa-trash-o"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="playlist-details">
              <div class="row action">
                <div class="col-md-12">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-danger"><i class="fa fa-pause-circle"></i> Pause</button>
                  </div>
                </div>
              </div>
              <div class="playlist-cont">
                <p class="location">Location</p>
                <p>Playlist name</p>
              </div>
              <div class="btnn">
                <div class="row">
                  <div class="col-md-6 edit">
                    <p class="text-center"><a href="#"><i class="fa fa-pencil-square-o"></i></a></p>
                  </div>
                  <div class="col-md-6 delete1">
                    <p class="text-center"><a href="#"><i class="fa fa-trash-o"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="playlist-details">
              <div class="row action">
                <div class="col-md-12">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-secondary"><i class="fa fa-stop-circle-o"></i> Offline</button>
                  </div>
                </div>
              </div>
              <div class="playlist-cont">
                <p class="location">Location</p>
                <p>Playlist name</p>
              </div>
              <div class="btnn">
                <div class="row">
                  <div class="col-md-6 edit">
                    <p class="text-center"><a href="#"><i class="fa fa-pencil-square-o"></i></a></p>
                  </div>
                  <div class="col-md-6 delete1">
                    <p class="text-center"><a href="#"><i class="fa fa-trash-o"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="playlist-details">
              <div class="row action">
                <div class="col-md-12">
                  <div class="live" align="right">
                    <button type="button" class="btn btn-success"><i class="fa fa-circle"></i> Live</button>
                  </div>
                </div>
              </div>
              <div class="playlist-cont">
                <p class="location">Location</p>
                <p>Playlist name</p>
              </div>
              <div class="btnn">
                <div class="row">
                  <div class="col-md-6 edit">
                    <p class="text-center"><a href="#"><i class="fa fa-pencil-square-o"></i></a></p>
                  </div>
                  <div class="col-md-6 delete1">
                    <p class="text-center"><a href="#"><i class="fa fa-trash-o"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  -->
        </div>
      </div>
    </div>
  </section>
</main>
</body>

<script src="<?php echo base_url()?>assets/digital/js/bootstrap.js"></script>

<script src="<?php echo base_url()?>assets/digital/js/bootstrap.min.js"></script>

<!--
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
-->

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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready( function() {
  $(".del_screen").click( function() {
    var result = confirm("Are you sure you want to delete this image/video?");
	if (result) {
	   var screen_id=$(this).attr("screen_id");
		
		$.ajax({
			type: 'POST',
			url: "<?php echo base_url().'index.php/screens/delete_screen_image';?>",
			data: "screen_id=" + screen_id ,
			dataType: 'json',
			success: function(response) 
			{
				//alert(response);
				if(response>0)
				{
					//alert(response);
					$('#screen_'+screen_id).remove();
					//$(this).parents("li").remove();	
					//$(this).closest('li').remove();
				}
			}
		});
	
		
	}
	
	
	
	
  });
  
});
</script>



