

<!-- footer -->
  
  <!--
  <footer id="footer">
    <div class="text-center padder clearfix">
      <p>
        <small>kimbl<br>&copy; 2013</small>
      </p>
    </div>
  </footer>
  -->
  
  <!-- / footer -->
	<script src="<?php echo base_url()?>assets/new_kimble/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url()?>assets/new_kimble/js/bootstrap.js"></script>
  <!-- app -->
  <script src="<?php echo base_url()?>assets/new_kimble/js/app.js"></script>
  <script src="<?php echo base_url()?>assets/new_kimble/js/app.plugin.js"></script>
  <script src="<?php echo base_url()?>assets/new_kimble/js/app.data.js"></script>  
  <script src="<?php echo base_url()?>assets/new_kimble/js/libs/underscore-min.js"></script>
   <!-- datatables -->
  <script src="<?php echo base_url()?>assets/new_kimble/js/datatables/jquery.dataTables.min.js"></script>
  
  <script src="<?php echo base_url()?>assets/new_kimble/js/libs/backbone-min.js"></script>
  <script src="<?php echo base_url()?>assets/new_kimble/js/libs/backbone.localStorage-min.js"></script>  
  <script src="<?php echo base_url()?>assets/new_kimble/js/libs/moment.min.js"></script>
  <!-- Notes -->
  <script src="<?php echo base_url()?>assets/new_kimble/js/apps/notes.js" cache="false"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js" cache="false"></script>
  
  
</body>
</html>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
 
	  
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
 
  </script>



<script type="text/javascript">
            $('#from_date').timepicker();
        </script>


<script type="text/javascript">
            $('#to_date').timepicker();
</script>




<script>
function image(image, id, type)
{
    //dynamically add an image and set its attribute
		$.ajax({
			type: 'POST',
			url: "<?php echo base_url().'index.php/playlists/add_image';?>",
			data: "screen_id=" + id + "&playlist_id=" + '<?php echo $playlist_id ?>',
			dataType: 'json',
			success: function(response) 
			{
				if(response==1)
				{
				var li = document.createElement('li');
				li.className = 'ui-state-default ui-sortable-handle image_'+id;
				var img = "";
				if(type === 1){
				  img = document.createElement("img");
				  img.width = "150";
				  img.height = "84";
				  img.src = image;
				}
				else if(type === 4)
				{
				  img = document.createElement("object");
				  img.data='https://www.youtube.com/embed/'+image;
				  img.width = "150";
				  img.height = "84";
				  //img.src = image;
				}
				
				else if(type === 5  )
				{
				  img = document.createElement("iframe");
				  img.data='https://www.youtube.com/embed/';
				  img.width = "150";
				  img.height = "84";
				  img.src = 'http://player.vimeo.com/video/'+image;
				}
				
				else if(type === 6  )
				{
				  img = document.createElement("iframe");
				  img.data='https://workdrive.zohoexternal.com/embed/';
				  img.width = "150";
				  img.height = "84";
				  img.src = image;
				}
				else
				{
				  img = document.createElement("video");
				  img.width = "150";
				  img.height = "84";
				  img.controls = true;
				  var source = document.createElement('source');
				  source.src = image;
				  img.appendChild(source);
				}
				
				var div = document.createElement("div");
				div.className="del";
				div.onclick = function() {
					//alert('test test test test');
				
				var result = confirm("Are you sure you want to delete this image/video?");
				if (result)
				{

				$(this).parent().remove();
				
				$.ajax({
					type: 'POST',
					url: "<?php echo base_url().'index.php/playlists/del_playlist_image';?>",
					data: "screen_id=" + id + "&playlist_id=" + '<?php echo $playlist_id ?>',
					dataType: 'json',
					success: function(response) 
					{
						if(response==1)
						{
							$(this).parent().remove();
							//alert(response);
							//$('#'+screenID).remove();
							//$(this).parents("li").remove();	
							//$(this).closest('li').remove();
						}
					}
				});
				
				
				}
				
				
				
				};	
					
				div.setAttribute('screen_id',id);
				li.appendChild(div); 
				
				var closeIcon = document.createElement("i");
				closeIcon.className="fa fa-close";
				li.appendChild(closeIcon);
				div.appendChild(closeIcon);
				li.appendChild(img);

				var input = document.createElement("input");
				input.setAttribute("type", "hidden");
				input.setAttribute("name", "screen_id[]");
				input.setAttribute("value", id);
				li.appendChild(input);
				
				
				var input = document.createElement("input");
				input.setAttribute("type", "hidden");
				input.setAttribute("name", "playlist_id");
				input.setAttribute("value", '<?php echo $playlist_id ?>');
				li.appendChild(input);
				
				
			///duration//////////	
				
				var div_duration = document.createElement("div");
				div_duration.className="row-fluid";
				
				var div_duration2 = document.createElement("div");
				div_duration2.className="col-lg-6 text-left";
				div_duration2.style.paddingLeft=0;
				div_duration2.style.paddingRight=0;
				
				//div_duration2.style.padding-right=0;
				
				var input_div = document.createElement("input");
				input_div.setAttribute("type", "text");
				input_div.setAttribute("name", "duration[]");
				input_div.setAttribute("value", 10);
				input_div.className="form-control";
				div_duration2.appendChild(input_div);
				///div_duration2.appendChild(input_div);
				div_duration.appendChild(div_duration2);
				
				//image display type////
				//<div class="col-lg-6 text-right" style="padding-right:0;padding-left:0;" >
				
				var div_image_type = document.createElement("div");
				div_image_type.className="col-lg-6 text-right";
				div_image_type.style.paddingLeft=0;
				div_image_type.style.paddingRight=0;
				
				
				var select_image_type = document.createElement("select");
				
				select_image_type.setAttribute("name", "image_display_type[]");
				
				var OPT1 = document.createElement('OPTION');
				OPT1.setAttribute('value', 0);
				var OPT2 = document.createElement('OPTION');
				OPT2.setAttribute('value', 1);
				
				var OPT3 = document.createElement('OPTION');
				OPT3.setAttribute('value', 2);
				
				var OPT4 = document.createElement('OPTION');
				OPT4.setAttribute('value', 3);
				
				var OPT5 = document.createElement('OPTION');
				OPT5.setAttribute('value', 4);
				
				var OPT6 = document.createElement('OPTION');
				OPT6.setAttribute('value', 5);
				
				var OPT7 = document.createElement('OPTION');
				OPT7.setAttribute('value', 6);
				
				var OPT8 = document.createElement('OPTION');
				OPT8.setAttribute('value', 7);
				
				var OPT9 = document.createElement('OPTION');
				OPT9.setAttribute('value', 8);
				
				var OPT10 = document.createElement('OPTION');
				OPT10.setAttribute('value', 9);
				
				var OPT11 = document.createElement('OPTION');
				OPT11.setAttribute('value', 10);
				
				OPT1.appendChild( document.createTextNode( 'Default' ));
				OPT2.appendChild( document.createTextNode( 'Blink'));
				OPT3.appendChild( document.createTextNode( 'Clockwise Rotate' ));
				OPT4.appendChild( document.createTextNode( 'Fade Out'));
				OPT5.appendChild( document.createTextNode( 'Flip' ));
				OPT6.appendChild( document.createTextNode( 'Anticlockwise Rotate'));
				OPT7.appendChild( document.createTextNode( 'Slide Left' ));
				OPT8.appendChild( document.createTextNode( 'Slide Right'));
				OPT9.appendChild( document.createTextNode( 'Zoom In' ));
				OPT10.appendChild( document.createTextNode( 'Zoom Inn'));
				OPT11.appendChild( document.createTextNode( 'Zoom Out'));
				
				select_image_type.appendChild(OPT1);
				select_image_type.appendChild(OPT2);
				
				select_image_type.appendChild(OPT3);
				select_image_type.appendChild(OPT4);
				
				select_image_type.appendChild(OPT5);
				select_image_type.appendChild(OPT6);
				
				select_image_type.appendChild(OPT7);
				select_image_type.appendChild(OPT8);
				
				select_image_type.appendChild(OPT9);
				select_image_type.appendChild(OPT10);
				
				select_image_type.appendChild(OPT11);
				
				select_image_type.className="selectpicker form-control col-lg-1";
				
				div_image_type.appendChild(select_image_type);
				
				div_duration.appendChild(div_image_type);
				
				
				//end image display type////
				
				
				li.appendChild(div_duration); 

				///duration//////////	
				
				
				
			
				var parentDiv = document.getElementById("sortable");
				parentDiv.appendChild(li);	 
					 
				}		
			}
		});
	
	
	
	
}
</script>

<script>
///$( function() {
// alert('-------');
  $(".del").click( function() {
	  
	  
	  
    var result = confirm("Are you sure you want to delete this image/video?");
	if (result) {
	   var screenID=$(this).attr("screen_id");
		
		$.ajax({
			type: 'POST',
			url: "<?php echo base_url().'index.php/playlists/del_playlist_image';?>",
			data: "screen_id=" + $(this).attr("screen_id") + "&playlist_id=" + '<?php echo $playlist_id ?>',
			dataType: 'json',
			success: function(response) 
			{
				if(response==1)
				{
					//alert(response);
					$('#'+screenID).remove();
					//$(this).parents("li").remove();	
					//$(this).closest('li').remove();
				}
			}
		});
	
		
	}
	
	
	
	
  });
  
//});
</script>




