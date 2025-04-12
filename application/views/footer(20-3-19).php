<!-- jQuery 3 -->
<!-- <script src="<?php echo base_url()."assets/"; ?>bower_components/jquery/dist/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- <script src="<?php echo base_url()."assets/"; ?>js/jquery-1.9.1.min.js"></script> -->
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()."assets/"; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>
<!-- iCheck -->
<!-- <script src="<?php echo base_url()."assets/"; ?>plugins/iCheck/icheck.min.js"></script> -->


<!-- jQuery UI 1.11.4 -->
<!-- <script src="<?php echo base_url()."assets/"; ?>bower_components/jquery-ui/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->


<!-- InputMask -->
<!-- <script src="<?php echo base_url()."assets/"; ?>plugins/input-mask/jquery.inputmask.js"></script> -->
<!-- <script src="<?php echo base_url()."assets/"; ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script> -->
<!-- <script src="<?php echo base_url()."assets/"; ?>plugins/input-mask/jquery.inputmask.extensions.js"></script> -->

<!-- Morris.js charts -->
<!-- <script src="<?php echo base_url()."assets/"; ?>bower_components/raphael/raphael.min.js"></script> -->
<script src="<?php echo base_url()."assets/"; ?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<!-- <script src="<?php echo base_url()."assets/"; ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script> -->
<!-- jvectormap -->
<!-- <script src="<?php echo base_url()."assets/"; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> -->
<!-- <script src="<?php echo base_url()."assets/"; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="<?php echo base_url()."assets/"; ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<script src="<?php echo base_url()."assets/"; ?>bower_components/moment/min/moment.min.js"></script>
<!-- <script src="<?php echo base_url()."assets/"; ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script> -->
<!-- datepicker -->
<!-- <script src="<?php echo base_url()."assets/"; ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
<!-- Bootstrap WYSIHTML5 -->
<!-- <script src="<?php echo base_url()."assets/"; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->
<!-- Slimscroll -->
<!-- <script src="<?php echo base_url()."assets/"; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
<!-- FastClick -->
<!-- <script src="<?php echo base_url()."assets/"; ?>bower_components/fastclick/lib/fastclick.js"></script> -->
<!-- DataTables -->
<script src="<?php echo base_url()."assets/"; ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<!-- <script src="<?php echo base_url()."assets/"; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
<!-- FastClick -->
<!-- <script src="<?php echo base_url()."assets/"; ?>bower_components/fastclick/lib/fastclick.js"></script> -->
<!-- AdminLTE App -->
<script src="<?php echo base_url()."assets/"; ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url()."assets/"; ?>dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()."assets/"; ?>dist/js/demo.js"></script>
<script src="<?php echo base_url()."assets/"; ?>dist/js/jquery.steps.min.js"></script>

 <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
$("#example-embed").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "fade"
});
</script>
<script>
function readURL(input, fileType) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    var $source = $('#video_here');
    var $image_hidden = $(".hidden_image");
    var $blah = $('#blah');
    var $vedio_image = $(".hidden_vedio");

    reader.onload = function(e) {
      if(fileType == "1"){        
        $vedio_image.hide();
        // $blah[0].src = URL.createObjectURL(input.files[0]);        
        $source.attr('src', "");
        $blah.attr('src', e.target.result);
        $image_hidden.show();
      }else{
        $image_hidden.hide();
        $blah.attr('src', "");
        $source[0].src = URL.createObjectURL(input.files[0]);
        $source.parent()[0].load();
        $vedio_image.show();
      }      
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("input[name='file_upload']").change(function() {
  var fileType = $("input[name='file_type']:checked").val();
  readURL(this, fileType);
});

$("input[name='file_type']").click(function(){
  var fileType = $("input[name='file_type']:checked").val();
  $file_upload = $("input[name='file_upload']");
  if(fileType === '1'){
    $file_upload.attr('accept','image/*');
  }else{
    $file_upload.attr('accept','video/*');
  }
})
</script>
<script>
  $("a[href$='#finish']").on('click', function() {
    var fileValue = $("input[name='file_upload']").val();
    var fileName = $("input[name='file_name']").val();
    console.log(fileValue);
    console.log(fileName);
    if((fileValue !== undefined && fileValue !== "") && (fileName !== undefined && fileName !== "")){
      $('form[name=add_screens]').submit();
    }else{
      $("#validation_error").removeClass('hidden');
    }
    
  });
</script>
<script>
 
    $("input[name='orientation_type']").change(function(){
      var id= this.id;
        var check = $("#"+id).val();
        if(check === "1"){
          $("input[name='with_image']").val("1920");
          $("input[name='height_image']").val("1080");
          $('.with_image').text("1920");
          $('.height_image').text("1080");
        }else{
          $("input[name='with_image']").val("720");
          $("input[name='height_image']").val("1080");
          $('.with_image').text("720");
          $('.height_image').text("1080");
        }
    });
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
				  img.width = "142";
				  img.src = image;      
				}else{
				  img = document.createElement("video");
				  img.width = "142";
				  img.height = "105";
				  img.controls = true;
				  var source = document.createElement('source');
				  source.src = image;
				  img.appendChild(source);
				}
				
				var div = document.createElement("div");
				div.className="del";
				div.setAttribute('screen_id',id);
				li.appendChild(div); 
				
				var closeIcon = document.createElement("i");
				closeIcon.className="fa fa-close";
				li.appendChild(closeIcon);
				div.appendChild(closeIcon);
				li.appendChild(img); 
				var parentDiv = document.getElementById("sortable");
				parentDiv.appendChild(li);	 
					 
				}		
			}
		});
	
	
	
	
}
</script>


<script>
$(document).ready( function() {

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
  
});
</script>



</body>
</html>