<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<section id="content">
      <section class="vbox" style="height:60%;">
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
				<div class="col-sm-12 wrapper2">
                    <?php //echo "<pre>"; print_r($result);
					 foreach($result->gallery as $data): 
						echo "<div class='col-md-2 col-sm-2 col-xs-2 pb-2 pt-2' style='height:135px;'>";
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
        </div>
      
			  </div>
			</div>
		  </div>
        </section>
      
	  
	  
	  </section>
	  
	  
	  <!-- playlist image -->
	  <section class="vbox" style="height:40%;" >
       <header class="panel-heading text-center"></header>
       <form action="<?php echo base_url()?>index.php/playlists/save_playlist" method="POST">
		<input type="submit" style="margin: 10px 20px;" class="btn btn-sm btn-default" name="submit" value="Save">

		<section class="scrollable wrapper2">
          <div class="tab-content">
            <div class="tab-pane active" id="static">
			  <div class="row">
			  
			  <div class="col-sm-12 wrapper2">
			  
			<ul id="sortable">
				
			<?php
			if( empty($playlist_gallery) )	
			{
				//echo "There is not image/video assign in this playlist";
			}	
			else
			{
				foreach( $playlist_gallery as $row)
				{
				?>
				<li id="<?php echo $row['screen_id'] ?>" class="ui-state-default"><div screen_id="<?php echo $row['screen_id']; ?>" class="del" ><i class="fa fa-close"></div></i>
				<?php 
				if($row['file_type']==1)
				{
				?>	
				<img src="<?php echo $row['file_upload'] ?>" height="84" width="150"/>
				<?php	
				}
				elseif($row['file_type']==2)
				{
				?>	
				<video width='150' height='85'  controls>";
				<source src="<?php echo $row['file_upload'] ?>">
				</video>
				<?php	
				}
				elseif($row['file_type']==3)
				{
				
					if(exif_imagetype($row['file_upload']))
					{
    				?>
					<img src="<?php echo $row['file_upload'] ?>" height="84" width="150"/>
					
					<?php
					}
					elseif(video_type($row['file_upload']) == 'youtube')	
							{
								$youtube_id=get_youtube_video_id($row['file_upload']);	
								
								echo "<object data='https://www.youtube.com/embed/".$youtube_id."?autoplay=0'
									width='150px' height='85px'>
								</object>";
							
								
								
							}
							elseif(video_type($row['file_upload']) == 'vimeo')	
							{
								
								$vimeo_id=get_vimeo_video_id($row['file_upload']);
								//echo "<video width='320' height='240' controls>
								//  <source src='http://player.vimeo.com/video/".$video_id."'>
								//</video>";
								
								echo '<iframe sandbox="allow-same-origin allow-scripts allow-popups"
								  id="foo" width="150px" height="85px"
								  allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen="" 
								  src="http://player.vimeo.com/video/'.$vimeo_id.'?api=1">
								</iframe>';

																
							}	
							elseif(video_type($row['file_upload']) == 'zoho')	
							{
					
					echo '<iframe src="'.$row['file_upload'].'" scrolling="no" frameborder="0" allowfullscreen=true width="150px" height="85px" ></iframe>';

					
							}
					
					
					
					else
					{
					?>
				<video width='150' height='85'  controls>";
				<source src="<?php echo $row['file_upload'] ?>">
				</video>
					
					<?php
					
					}
				
				}	
				?>
				
				<input type="hidden" name="screen_id[]" value="<?php echo $row['screen_id']; ?>">
				
				<input type="hidden" name="playlist_id" value="<?php echo $playlist_id; ?>">
				
				<div class="row-fluid">
				<div  class="col-lg-6 text-left" style="padding-left:0;padding-right:0;" >
				<input type="text" class="form-control" name="duration[]" placeholder="Duration" value="<?php echo $row['duration']; ?>" >  
				</div>
				
				<div class="col-lg-6 text-right" style="padding-right:0;padding-left:0;" >
				<select id="image_display_type" name=image_display_type[] class="selectpicker form-control col-lg-1" >
				<option value="0" >Default</option>
                <option value="1" <?php if($row['image_display_type']==1){ echo "selected"; } ?>  >Blink</option>
                <option value="2" <?php if($row['image_display_type']==2){ echo "selected"; } ?> >Clockwise Rotate</option>
				<option value="3" <?php if($row['image_display_type']==3){ echo "selected"; } ?> >Fade Out</option>
				<option value="4" <?php if($row['image_display_type']==4){ echo "selected"; } ?> >Flip</option>
				<option value="5" <?php if($row['image_display_type']==5){ echo "selected"; } ?>>Anticlockwise Rotate</option>
				<option value="6" <?php if($row['image_display_type']==6){ echo "selected"; } ?> >Slide Left</option>
				<option value="7" <?php if($row['image_display_type']==7){ echo "selected"; } ?> >Slide Right</option>
				<option value="8" <?php if($row['image_display_type']==8){ echo "selected"; } ?> >Zoom In</option>
				<option value="9" <?php if($row['image_display_type']==9){ echo "selected"; } ?>>Zoom Inn</option>
				<option value="10" <?php if($row['image_display_type']==10){ echo "selected"; } ?> >Zoom Out</option>
				</select> 
				</div>
				</div>
				</li> 
				<?php
				}
			}
			?>
			</ul>


				
			</div>
			</div>	
			
			</div>
			</div>
	 </section>
	 </form>
	 </section>
	  <!-- playlist image end -->
	  
	  
	  
	  
	  
	  
    </section>
    
	
	<!-- /.vbox -->
  
</section>

     
	