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
       
	   <div class="col-sm-12 wrapper2">
                    <?php //echo "<pre>"; print_r($result);
					 foreach($result->gallery as $data): 
						echo "<div class='col-md-2 col-sm-2 col-xs-2 pb-2 pt-2' id='".$data['id']."' style='height:135px;'>";
							if($data['file_type'] == "1"){ 
								echo "<img width='150' height='95' src=".$data['file_upload']." style=' border: 3px solid #000;
							' >";						
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
								
								echo "<object data='https://www.youtube.com/embed/".$youtube_id."?autoplay=0'
									width='150px' height='95px'>
								</object>";
							
								
								
							}
							elseif(video_type($data['file_upload']) == 'vimeo')	
							{
								
								$vimeo_id=get_vimeo_video_id($data['file_upload']);
								//echo "<video width='320' height='240' controls>
								//  <source src='http://player.vimeo.com/video/".$video_id."'>
								//</video>";
								
								echo '<iframe sandbox="allow-same-origin allow-scripts allow-popups"
								  id="foo" width="90%" height="80%"
								  allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen="" 
								  src="http://player.vimeo.com/video/'.$vimeo_id.'?api=1">
								</iframe>';

																
							}	
							elseif(video_type($data['file_upload']) == 'zoho')	
							{
					
					
					
		

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
							
							
							}else{
								echo  "<video width='150' height='95' style='border:3px solid #000;
' controls>";
								echo "<source src=".$data['file_upload'].">";
									echo "Your browser does not support HTML5 video.";
								echo "</video>";
							}
							
							$pathinfo = pathinfo($data['file_upload']);	
							$file_name=   strip_tags($data['file_name']);
							//echo '<span class="alert alert-primary mt-20" role="alert">'.
								//$pathinfo['filename'].'.'.$pathinfo['extension'].
							//'</div>';	
							
							//echo "<span class='float-left'>".$file_name."</span>"; 
							
							
							echo "<div id='outer'><center>$file_name</center></div>"; 
							?>
							
				<a href="javascript:void(0)" screen_id="<?php echo $data['id']; ?>"  class="del_screen"><i class="fa fa-close"></i></a>
							
						<?php /* ?>	
							<span class='float-right'><i  class='fa fa-plus-square fa-6' aria-hidden='true' onClick="image(<?php echo "'".$data['file_upload']."', ".$data['id'].','.$data['file_type'];?>)"></i></span>
						
						<?php */ ?>
						
					<?php echo "</div>";
					endforeach;
					?>
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
					$('#'+screen_id).remove();
					//$(this).parents("li").remove();	
					//$(this).closest('li').remove();
				}
			}
		});
	
		
	}
	
	
	
	
  });
  
});
</script>


