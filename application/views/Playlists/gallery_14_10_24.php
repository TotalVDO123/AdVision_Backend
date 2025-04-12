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
     	
	  
	  <?php
	  
	  //print_r($gallery);
	  ?>
	  
	  <!--
	  <div class="row">
		 <div class="row row-cols-4 g-4">
	  <h5 style="color:#FFF" >Folder</h5>
	  
	  </div>
	  </div>
	  
	  
         <div class="row">
		 <div class="row row-cols-4 g-4">
		 <div class="col" style="margin: 0 0 0;">
			<input type="text" class="form-control  bg-dark text-white" placeholder="MAY 2024" value="May 2024">
    
		 </div>
		 
		 
		 <div class="col" style=" margin: 0 0 0;">
			<input type="text" class="form-control bg-dark text-white" placeholder="DEMO" value="Demo">
    
		 </div>


		<div class="col" style=" margin: 0 0 0;">
			<input type="text" class="form-control bg-dark text-white" placeholder="April 2024" value="April 2024">
    
		 </div>

<div class="col" style=" margin: 0 0 0;">
			<input type="text" class="form-control bg-dark text-white" placeholder="Feb 2024" value="Feb 2024">
    
		 </div>
		 
		 </div>
		 </div>
		
		-->
		
	  
		
		<div class="row">
   
   
  
	  <h5 style="color:#FFF;" >File</h5>
	   
<?php
if(!empty($gallery))
{	
?>		
   <div class="row row-cols-6 g-4">
   
   <?php
   foreach($gallery as $row)
   {
   ?>
  <div class="col del_screen"    screen_id="<?php echo $row['id']; ?>">
  <div><i class="fa fa-trash-o"></i></div>
    <div class="card" >
      
	  <?php /* ?><img height="120" src="<?php echo $row['file_upload'] ?>" class="card-img-top" alt="<?php echo $row['file_name'] ?>">
	  <?php */ ?>
     
		 <?php
					//echo "=================".$row['file_type'];
					if($row['file_type']==1)
					{	
					$file_name=   strip_tags($row['file_name']);
					?>
					
					
					<img id="image1" screen_id="<?php echo $row['screen_id']; ?>"  onclick="show_image('<?php echo $row['file_upload']?>')" src="<?php echo $row['file_upload'] ?>" alt="Dinosaur"  height="120" />
					
					<?php /* ?>
					<p class="title" screen_id="<?php echo $row['screen_id']; ?>"  onclick="show_image('<?php echo $row['file_upload']?>')" >Image <br> <?php echo $file_name; ?></p>
					<?php */ ?>
					
					<?php 
					}
					if($row['file_type']==2)
					{
					
								echo "<video  height='120%' style='border:3px solid #000;' controls>";
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
									echo "<img height='120' src=".$row['file_upload']." style=' border: 3px solid #000;' >";	
								}
								
								elseif(video_type($row['file_upload']) == 'youtube')	
							{
								$youtube_id=get_youtube_video_id($row['file_upload']);	
								$data['file_type']=4;
								echo "<object data='https://www.youtube.com/embed/".$youtube_id."?autoplay=0'
									height='120'>
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
								  id="foo"  height="120"
								  allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen="" 
								  src="http://player.vimeo.com/video/'.$vimeo_id.'?api=1">
								</iframe>';
								$row['file_upload']=$vimeo_id;
																
							}	
							elseif(video_type($row['file_upload']) == 'zoho')	
							{
							$data['file_type']=6;
							echo '<iframe src="'.$row['file_upload'].'" scrolling="no" frameborder="0" allowfullscreen=true height="120" ></iframe>';
							}
								
								
								
								
								
								else
								{
									$row['file_type']=3;
								echo "<video  height='120%' style='border:3px solid #000;' controls>";
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





	 <div class="card-body_11">
        <!--<h5 class="card-title"></h5> -->
        
		<p class="card-text">
        <?php echo $row['file_name'] ?>
        </p>
		
	  </div>
    </div>
  </div>
  
  <?php
   }
  ?>
  
  
  
  
</div>
<?php
}
else
{	
?>
	
<div  style="height:200px;">&nbsp;</div>
<div class="row row-cols-6 g-5"><strong>Data not found</strong> </div>
<?php } ?>	
		  <!-- --- -->
	<div  style="height:200px;">&nbsp;</div>	  
	
		  
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




</html>

