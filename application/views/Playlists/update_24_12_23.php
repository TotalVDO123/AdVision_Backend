<?php

$this->load->view('./header_digital');
?>

  <section class="play">
    <div class="container">
      <div class="col-md-10 offset-1">
	  <div class="gallery-btn" align="left">
          <button  class="btn btn-primary" id="show"> Show Gallery</button>
          
        </div>
	  <div class="gallery">
          <div class="gallery-item">
			<div class="row">
			
			<?php //echo "<pre>"; print_r($result);
					 foreach($result->gallery as $data): 
						echo "<div class='col-md-3 col-sm-3 col-xs-3 pb-2 pt-2' style='height:135px;'>";
							if($data['file_type'] == "1"){ 
				echo "<img width='150' height='95' src=".$data['file_upload']." style=' border: 3px solid #000;' >";							
							}
						elseif($data['file_type'] == "2")
							{
								echo "<video width='150' height='95' style='border:3px solid #000;
' controls>";
								echo "<source src=".$data['file_upload'].">";
									echo "Your browser does not support HTML5 video.";
								echo "</video>";
							}
							elseif($data['file_type'] == "3")
							{
							
								if(exif_imagetype($data['file_upload']))
								{
									$data['file_type']=1;
									echo "<img width='150' height='95' src=".$data['file_upload']." style=' border: 3px solid #000;' >";	
								}
								
								elseif(video_type($data['file_upload']) == 'youtube')	
							{
								$youtube_id=get_youtube_video_id($data['file_upload']);	
								$data['file_type']=4;
								echo "<object data='https://www.youtube.com/embed/".$youtube_id."?autoplay=0'
									width='150px' height='95px'>
								</object>";
							
								
								$data['file_upload']=$youtube_id;
							}
							elseif(video_type($data['file_upload']) == 'vimeo')	
							{
								$vimeo_id=get_vimeo_video_id($data['file_upload']);
								$data['file_type']=5;
								//echo "<video width='320' height='240' controls>
								//  <source src='http://player.vimeo.com/video/".$video_id."'>
								//</video>";
								
								echo '<iframe sandbox="allow-same-origin allow-scripts allow-popups"
								  id="foo" width="90%" height="80%"
								  allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen="" 
								  src="http://player.vimeo.com/video/'.$vimeo_id.'?api=1">
								</iframe>';
								$data['file_upload']=$vimeo_id;
																
							}	
							elseif(video_type($data['file_upload']) == 'zoho')	
							{
							$data['file_type']=6;
							echo '<iframe src="'.$data['file_upload'].'" scrolling="no" frameborder="0" allowfullscreen=true width="90%" height="80%" ></iframe>';

					
							}
								
								
								
								
								
								else
								{
									$data['file_type']=3;
								echo "<video width='150' height='95' style='border:3px solid #000;
' controls>";
								echo "<source src=".$data['file_upload'].">";
									echo "Your browser does not support HTML5 video.";
								echo "</video>";

								}

							
							
							}	
							
							$pathinfo = pathinfo($data['file_upload']);	
							$file_name=   strip_tags($data['file_name']);
							//echo '<span class="alert alert-primary mt-20" role="alert">'.
								//$pathinfo['filename'].'.'.$pathinfo['extension'].
							//'</div>';	
							
							//echo "<span class='float-left'>".$file_name."</span>"; 
							
							?>
							<div>
							<div> <center> <?php echo $file_name ?> 
							
				<?php /* ?>			
				<a href="javascript:void(0)" screen_id="<?php echo $data['id']; ?>"  class="del_screen"><i class="fa fa-close"></i></a>
				<?php */ ?>			
						
							<span class='float-right'><i  class='fa fa-plus-square fa-6' aria-hidden='true' onClick="image(<?php echo "'".$data['file_upload']."', ".$data['id'].','.$data['file_type'];?>)"></i></span>
						</center>
						</div>
						</div>
						
					<?php echo "</div>";
					endforeach;
					?>

			
			
			
			<!--
              <div class="col-md-3">
                <div class="g-item"> <img src="images/movie.jpg"/>
                  <h6>Animal <i class="fa fa-plus-square-o"></i></h6>
                </div>
              </div>
              <div class="col-md-3">
                <div class="g-item"> <img src="images/movie.jpg"/>
                  <h6>Animal <i class="fa fa-plus-square-o"></i></h6>
                </div>
              </div>
              <div class="col-md-3">
                <div class="g-item"> <img src="images/movie.jpg"/>
                  <h6>Animal <i class="fa fa-plus-square-o"></i></h6>
                </div>
              </div>
              <div class="col-md-3">
                <div class="g-item"> <img src="images/movie.jpg"/>
                  <h6>Animal <i class="fa fa-plus-square-o"></i></h6>
                </div>
              </div>
              <div class="col-md-3">
                <div class="g-item"> <img src="images/movie.jpg"/>
                  <h6>Animal <i class="fa fa-plus-square-o"></i></h6>
                </div>
              </div>
              <div class="col-md-3">
                <div class="g-item"> <img src="images/movie.jpg"/>
                  <h6>Animal <i class="fa fa-plus-square-o"></i></h6>
                </div>
              </div>
              <div class="col-md-3">
                <div class="g-item"> <img src="images/movie.jpg"/>
                  <h6>Animal <i class="fa fa-plus-square-o"></i></h6>
                </div>
              </div>
              <div class="col-md-3">
                <div class="g-item"> <img src="images/movie.jpg"/>
                  <h6>Animal <i class="fa fa-plus-square-o"></i></h6>
                </div>
              </div>
			  
			  -->
			  
			  
            </div>
            </div>
			<span><button  class="btn btn-primary" id="hide"> Hide Gallery</button></span>
			</div>
		
	  
	  
        <div class="row">
          <div class="col-md-7">
           <!-- <div class="row">
              <div class="new-item" align="right">
                <button type="button" class="btn btn-info"><i class="fa fa-plus-square-o"></i> Add New Item</button>
                <button type="button" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save The Playlist</button>
              </div>
            </div> -->
			
            <div class="playlist-heading">
              <div class="playlist-cont">
                <p class="location">Location</p>
                <p>Playlist name</p>
              </div>
            </div>
			
            <div class="video" id="show_hide_video" >
              <video id="video1" width="100%" height="300" controls>
                <source  src="movie.mp4" type="video/mp4">
              </video>
            </div>
			
			<div id="show_hide_image" style="display:none;" >
			<img id="image1" src="dinosaur.jpg" alt="Dinosaur" width="100%" height="300" />
			</div>
			<?php
			//echo "<pre>";
			//print_r($playlist_gallery);
			
			//exit;
			foreach( $playlist_gallery as $row)
			{
				
				//print_r($row);
			?>
            <div class="video-category" id="<?php echo $row['screen_id'] ?>">
              <div class="row">
                <div class="col-md-8">
				
				
                  <div class="video-cont">
                    <?php
					//echo "=================".$row['file_type'];
					if($row['file_type']==1)
					{	
					$file_name=   strip_tags($row['file_name']);
					?>
					<p class="title" screen_id="<?php echo $row['screen_id']; ?>"  onclick="show_image('<?php echo $row['file_upload']?>')" >Image <br> <?php echo $file_name; ?></p>
					<?php 
					}
					if($row['file_type']==2)
					{
					?>
					<p class="title" screen_id="<?php echo $row['screen_id']; ?>" onclick="play_season('<?php echo $row['file_upload']?>')" >Video <br> <?php echo $file_name; ?></p>
					<?php 
					}
					if($row['file_type']==3)
					{
					?>
					<p class="title" screen_id="<?php echo $row['screen_id']; ?>" onclick="show_image('<?php echo $row['file_upload']?>')" >Image <br> <?php echo $file_name; ?></p>
					<?php
					}
					
					?>
                    
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="video-btn"> 
				  <!--<span><a href="#"><i class="fa fa-2x fa-pencil-square-o"></i></a></span> -->
				 <!-- <span><button screen_id="<?php //echo $row['screen_id']; ?>"  ><i class="fa fa-2x fa-trash-o del"></i></button></span> -->
				 <div screen_id="<?php echo $row['screen_id']; ?>" class="del" ><i class="fa fa-close"></div></i>
				  </div>
                </div>
              </div>

            </div>
			<?php
			}
			?>
			<!--
            <div class="video-category">
              <div class="row">
                <div class="col-md-8">
                  <div class="video-cont">
                    <p class="title">Image</p>
                    <p>Playlist name1</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="video-btn"> <span><a href="#"><i class="fa fa-2x fa-pencil-square-o"></i></a></span> <span><a href="#"><i class="fa fa-2x fa-trash-o"></i></a></span> </div>
                </div>
              </div>
            </div>
            <div class="video-category">
              <div class="row">
                <div class="col-md-8">
                  <div class="video-cont">
                    <p class="title">Image</p>
                    <p>Playlist name2</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="video-btn"> <span><a href="#"><i class="fa fa-2x fa-pencil-square-o"></i></a></span> <span><a href="#"><i class="fa fa-2x fa-trash-o"></i></a></span> </div>
                </div>
              </div>
            </div>
            <div class="video-category">
              <div class="row">
                <div class="col-md-8">
                  <div class="video-cont">
                    <p class="title">Image</p>
                    <p>Playlist name</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="video-btn"> <span><a href="#"><i class="fa fa-2x fa-pencil-square-o"></i></a></span> <span><a href="#"><i class="fa fa-2x fa-trash-o"></i></a></span> </div>
                </div>
              </div>
            </div>
            <div class="video-category">
              <div class="row">
                <div class="col-md-8">
                  <div class="video-cont">
                    <p class="title">Image</p>
                    <p>Playlist name</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="video-btn"> <span><a href="#"><i class="fa fa-2x fa-pencil-square-o"></i></a></span> <span><a href="#"><i class="fa fa-2x fa-trash-o"></i></a></span> </div>
                </div>
              </div>
            </div>
			
			-->
          </div>
          <div class="col-md-5">
            <div class="realted-videos">
              <h4>Related Videos</h4>
              <div class="related">
                <div class="row">
                  <div class="col-md-5">
                    <div class="realted-videos1">
                      <video width="100%" height="115" controls>
                        <source src="movie.mp4" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="realted-videos-con">
                      <h6>Sed do eiusmod tempor incididunt ut labore et</h6>
                      <p>Ut labore et dolore magna aliqua...</p>
                      <p class="date">10 JUL 2023</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="related">
                <div class="row">
                  <div class="col-md-5">
                    <div class="realted-videos1">
                      <video width="100%" height="115" controls>
                        <source src="movie.mp4" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="realted-videos-con">
                      <h6>Sed do eiusmod tempor incididunt ut labore et</h6>
                      <p>Ut labore et dolore magna aliqua...</p>
                      <p class="date">10 JUL 2023</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="related">
                <div class="row">
                  <div class="col-md-5">
                    <div class="realted-videos1">
                      <video width="100%" height="115" controls>
                        <source src="movie.mp4" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="realted-videos-con">
                      <h6>Sed do eiusmod tempor incididunt ut labore et</h6>
                      <p>Ut labore et dolore magna aliqua...</p>
                      <p class="date">10 JUL 2023</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="related">
                <div class="row">
                  <div class="col-md-5">
                    <div class="realted-videos1">
                      <video width="100%" height="115" controls>
                        <source src="movie.mp4" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="realted-videos-con">
                      <h6>Sed do eiusmod tempor incididunt ut labore et</h6>
                      <p>Ut labore et dolore magna aliqua...</p>
                      <p class="date">10 JUL 2023</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="related">
                <div class="row">
                  <div class="col-md-5">
                    <div class="realted-videos1">
                      <video width="100%" height="115" controls>
                        <source src="movie.mp4" type="video/mp4">
                      </video>
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="realted-videos-con">
                      <h6>Sed do eiusmod tempor incididunt ut labore et</h6>
                      <p>Ut labore et dolore magna aliqua...</p>
                      <p class="date">10 JUL 2023</p>
                    </div>
                  </div>
                </div>
              </div>
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
</body>

<script src="<?php echo base_url()?>assets/digital/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>assets/digital/js/bootstrap.min.js"></script>

<script src="<?php echo base_url()?>https://code.jquery.com/jquery-3.7.1.min.js"></script>




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
<script>


function play_season(url)
{
	//alert(url);
	//alert(extension);
	
	//$("#show_hide_image").html('');
	//$("#show_hide_image").show("slow");
	
	$("#show_hide_image").hide();
	$("#show_hide_video").show("slow");
	$("#video1").attr("src", url);

}



function show_image(url)
{
	//alert(url);
	//alert(extension);
	$("#show_hide_video").hide();
	$("#show_hide_image").show("slow");
	$("#image1").attr("src", url);

}

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$(".gallery").hide();
  $("#hide").click(function(){
	 
    $(".gallery").hide();
  });
  $("#show").click(function(){
	  
    $(".gallery").show();
  });
});
</script>
</html>
