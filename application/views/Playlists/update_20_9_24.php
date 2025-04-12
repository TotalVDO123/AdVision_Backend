<?php

$this->load->view('./header_digital');
?>

    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
    -->
    
    

  <section class="play">
    <div class="container">
     	
	  
	  
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
                  <?php
                  if(!empty($row_playlist[0]['company_name']))
                  {
                  ?>
                <p class="location">Company <?php echo $row_playlist[0]['company_name']?></p>
                <?php
                  }
                ?>
                <p><strong><? echo $row_playlist[0]['playlist_name']?></strong></p>
              </div>
            </div>
			
            <div class="video" id="show_hide_video" style="display:none;" >
              <video id="video1" width="100%" height="300" controls>
                <source  src="movie.mp4" type="video/mp4">
              </video>
            </div>
            
			<div id="show_hide_image"  >
			<img id="image1" src="<?php echo base_url() ?>assets/dist/img/boxed-bg.png" alt="Dinosaur" width="100%" height="300" />
			</div>
			 <table  class="table table-bordered" width="100%">
			     
			      <thead>
    <tr>
      
      <th>IMAGE / VIDEO</th>
      
      <th>Duration</th>
      
     <th>Delete</th>
    </tr>
  </thead>
		
			<tbody class="row_position" >
			<?php
			
			$counter=0;
			foreach( $playlist_gallery as $row)
			{
			//print_r($row);
			?>
			
			<tr  id="<?php echo $row['id'] ?>">
			 
			
			 
			<th  class="video-category" id="<?php echo $row['screen_id'] ?>">   
           
            	
				
                 
                    <?php
					//echo "=================".$row['file_type'];
					if($row['file_type']==1)
					{	
					$file_name=   strip_tags($row['file_name']);
					?>
					
					
					<img id="image1" screen_id="<?php echo $row['screen_id']; ?>"  onclick="show_image('<?php echo $row['file_upload']?>')" src="<?php echo $row['file_upload'] ?>" alt="Dinosaur" width="120" height="100" />
					
					<?php /* ?>
					<p class="title" screen_id="<?php echo $row['screen_id']; ?>"  onclick="show_image('<?php echo $row['file_upload']?>')" >Image <br> <?php echo $file_name; ?></p>
					<?php */ ?>
					
					<?php 
					}
					if($row['file_type']==2)
					{
					
								echo "<video width='120' height='100%' style='border:3px solid #000;' controls>";
								echo "<source src=".$row['file_upload'].">";
									echo "Your browser does not support HTML5 video.";
								echo "</video>";
					
					
					?>
					<?php /* ?>
					<p class="title" screen_id="<?php echo $row['screen_id']; ?>" onclick="play_season('<?php echo $row['file_upload']?>')" >Video <br> <?php echo $file_name; ?></p>
					<?php */ ?>
					<?php 
					}
					if($row['file_type']==3)
					{
					
						
							
								if(exif_imagetype($row['file_upload']))
								{
									$data['file_type']=1;
									echo "<img width='120' height='100%' src=".$row['file_upload']." style=' border: 3px solid #000;' >";	
								}
								
								elseif(video_type($row['file_upload']) == 'youtube')	
							{
								$youtube_id=get_youtube_video_id($row['file_upload']);	
								$data['file_type']=4;
								echo "<object data='https://www.youtube.com/embed/".$youtube_id."?autoplay=0'
									width='120' height='100'>
								</object>";
							
								
								$data['file_upload']=$youtube_id;
							}
							elseif(video_type($row['file_upload']) == 'vimeo')	
							{
								$vimeo_id=get_vimeo_video_id($row['file_upload']);
								$row['file_type']=5;
								//echo "<video width='320' height='240' controls>
								//  <source src='http://player.vimeo.com/video/".$video_id."'>
								//</video>";
								
								echo '<iframe sandbox="allow-same-origin allow-scripts allow-popups"
								  id="foo" width="120" height="100%"
								  allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen="" 
								  src="http://player.vimeo.com/video/'.$vimeo_id.'?api=1">
								</iframe>';
								$row['file_upload']=$vimeo_id;
																
							}	
							elseif(video_type($row['file_upload']) == 'zoho')	
							{
							$data['file_type']=6;
							echo '<iframe src="'.$row['file_upload'].'" scrolling="no" frameborder="0" allowfullscreen=true width="120" height="100%" ></iframe>';

					
							}
								
								
								
								
								
								else
								{
									$row['file_type']=3;
								echo "<video width='120' height='100%' style='border:3px solid #000;' controls>";
								echo "<source src=".$row['file_upload'].">";
									echo "Your browser does not support HTML5 video.";
								echo "</video>";

								}

							
							
							
							
					
					
					
					
					
					
					?>
					
					<?php /* ?>
					<p class="title" screen_id="<?php echo $row['screen_id']; ?>" onclick="show_image('<?php echo $row['file_upload']?>')" >Image <br> <?php echo $file_name; ?></p>
					<?php */ssssss ?>
					<?php
					}
					
					?>
                    
          
            </th>
            
            <th>
			 <div class="item">
			 <button class="quantity-minus" onclick="azalt(this);updateElements( <?php echo $row['screen_id'] ?> , <?php echo $row['playlist_id']  ?>)">-</button>
			   <input type="text" name="duration[]" id="duration_<?php echo $row['screen_id'] ?>_<?php echo $row['playlist_id']  ?>"  size="3"  value="<?php echo $row['duration'] ?>" onchange ="updateElements( <?php echo $row['screen_id'] ?> , <?php echo $row['playlist_id']  ?>)">
			  <button class="quantity-plus"  onclick="arttir(this);updateElements( <?php echo $row['screen_id'] ?> , <?php echo $row['playlist_id']  ?>)">+</button>
            </div>
			</th>    
            
               <th  >
             
				  <!--<span><a href="#"><i class="fa fa-2x fa-pencil-square-o"></i></a></span> -->
				 <!-- <span><button screen_id="<?php //echo $row['screen_id']; ?>"  ><i class="fa fa-2x fa-trash-o del"></i></button></span> -->
				 <div screen_id="<?php echo $row['screen_id']; ?>" class="del" ><i class="fa fa-close"></i></div>

            </th>
          
            </tr>
			<?php
			}
			?>
			</tbody>
			</table>
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
             <!-- <h4>Related Videos</h4>
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
              </div>-->
           
		    <div class="col-md-10 offset-1">
	  <div class="gallery-btn" align="left">
          <button  class="btn btn-primary" id="show"> Show Gallery</button>
          
        </div>
	  <div class="gallery">
          <div class="gallery-item">
			<div class="row">
			    
			    

			
			<?php //echo "<pre>"; print_r($result);
					 foreach($result->gallery as $data): 
						echo "<div id=".$data['id']." class='col-md-3 col-sm-3 col-xs-3 pb-2 pt-2' style='height:165px;'>";
						//$screen_id=$data['id'];
						
						echo "<a href='javascript:void(0)' screen_id=". $data['id']." class='del_screen'><i class='fa fa-close'></i></a>";
							if($data['file_type'] == "1"){ 
				echo "<img width='140' height='60%' src=".$data['file_upload']." style=' border: 3px solid #000;' >";
				
			
            	
				
							}
						elseif($data['file_type'] == "2")
							{
								echo "<video width='140%' height='60%' style='border:3px solid #000;
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
									echo "<img width='140%' height='60%' src=".$data['file_upload']." style=' border: 3px solid #000;' >";	
								}
								
								elseif(video_type($data['file_upload']) == 'youtube')	
							{
								$youtube_id=get_youtube_video_id($data['file_upload']);	
								$data['file_type']=4;
								echo "<object data='https://www.youtube.com/embed/".$youtube_id."?autoplay=0'
									width='150%' height='90%'>
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
							echo '<iframe src="'.$data['file_upload'].'" scrolling="no" frameborder="0" allowfullscreen=true width="90%" height="60%" ></iframe>';

					
							}
								
								
								
								
								
								else
								{
									$data['file_type']=3;
								echo "<video width='140%' height='80%' style='border:3px solid #000;
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
							<div> <center>
							    
							<span class='float-right'><i  class='fa fa-plus-square fa-6' aria-hidden='true' onClick="image(<?php echo "'".$data['file_upload']."', ".$data['id'].','.$data['file_type'];?>)"></i></span>   
							    
							    
							    <?php echo $file_name ?> 
							
				<?php /* ?>			
				<a href="javascript:void(0)" screen_id="<?php echo $data['id']; ?>"  class="del_screen"><i class="fa fa-close"></i></a>
				<?php */ ?>			
						
							
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





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript">
        $(".row_position").sortable({
            delay: 150,
            stop: function() {
                var selectedData = new Array();
                $('.row_position>tr').each(function() {
                    selectedData.push($(this).attr("id"));
                });
                updateOrder(selectedData);
            }
        });
        function updateOrder(data) {
            $.ajax({
                url:"<?php echo base_url() ?>playlists/ajax_gallery_image_update_sno",
                type:'post',
                data:{position:data},
                success:function(data){
                    toastr.success('Your Change Successfully Saved.');
                }
            })
        }
    </script>
<!--
<script src="<?php //echo base_url()?>https://code.jquery.com/jquery-3.7.1.min.js"></script>

-->


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
	//$(".gallery").hide();
  $("#hide").click(function(){
	 
    $(".gallery").hide();
  });
  $("#show").click(function(){
	  
    $(".gallery").show();
  });
});
</script>

<script>
    
    function updateElements(screen_id,playlist_id) 
    {
        
       var nvalue= $('#duration_'+screen_id+'_'+playlist_id).val();
       //alert('---------------------'+nvalue);
       
         $.ajax({
            url: "<?php echo base_url() ?>/playlists/update_duration",
            type: "POST",
            data: { nvalue:nvalue,screen_id:screen_id,playlist_id:playlist_id },
            success: function(response) {
                
               // alert('Duration is updated successfully');
              // Update the response element with the response from the server
              //$("#response").html(response);
              //return false
            }
  });

         return false
    }
    
</script>


<script>
$(document).ready( function() {
  $(".del_screen").click( function() {
    var result = confirm("Are you sure you want to delete this image/video?");
	if (result) {
	   var screen_id=$(this).attr("screen_id");
		
		$.ajax({
			type: 'POST',
			url: "<?php echo base_url() ?>/screens/delete_screen_image",
			data: "screen_id=" + screen_id ,
			dataType: 'json',
			success: function(response) 
			{
				//alert(response);
				if(response>0)
				{
					//alert(response);
					$('#'+screen_id).remove();
					
					//window.location.href="<?php echo base_url() ?>/playlists/single/"+screen_id;
					//https://purplemoontest.com/digital/playlists/single/84
					//$(this).parents("li").remove();	
					//$(this).closest('li').remove();
				}
			}
		});
	
		
	}
	
	
	
	
  });
  
});
</script>


  <script type="text/javascript">
    function azalt(ele) {
        if (ele.nextSibling.nextSibling.value > 1) {
            ele.nextSibling.nextSibling.value = parseInt(ele.nextSibling.nextSibling.value) - 1;
        }
    }

    function arttir(ele1) {
        if (ele1.previousSibling.previousSibling.value > 0) {
            ele1.previousSibling.previousSibling.value = parseInt(ele1.previousSibling.previousSibling.value) + 1;
        }
    }
</script>





</html>

