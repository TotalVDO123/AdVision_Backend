
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins -->
  
 <section id="content">
      <section class="vbox">
	   <?php
		$this->load->view('mid_header');
	   ?>
        <section class="scrollable wrapper">
          <div class="tab-content">
            <section class="tab-pane active" id="basic">
              
			  
			  <div class="row">
			   <?php 
				$this->load->view('breadcrumb_nav');
				?>
                

            
		       <div class="col-sm-12">
			   <?php if($message=$this->session->flashdata('message')): 
         $add_class=$this->session->flashdata('add_class');
		?>
		<div class="alert <?= $add_class ?>">
         <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
         <i class="fa fa-ban-circle"></i>
		  <?= $message=$this->session->flashdata('message'); ?>
        </div>
		 <?php endif; 
		 $this->session->set_flashdata('message',"");
		 ?>
			   
			   
                        <form method="post" name="add_screens" action="<?php echo base_url();?>index.php/screens/add" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id') ?>">
                        <div id="example-embed">
                                <h3>Step 1</h3>
                                <section>
                                    <h4 style="color:#fff;">Choose Orientation & Size</h4>                    
                                    <div class="col-sm-6 here_centerLine">
                                        <div class="col-sm-6">
                                            <div class="col-sm-3 first">
                                                <input type="radio" name="orientation_type" id="optionsRadios1" value="1" checked change="orienationsChange(this.id)">
                                            </div>
                                            <div class="col-sm-9" style='background: red; height: 115px;'>
                                                <div class="col-sm-8" >
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-sm-6">
                                            <div class="col-sm-3 second">
                                                <input type="radio" name="orientation_type" id="optionsRadios2" value="2">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="col-sm-10" style='background: red; height: 180px;'>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									
									
									
                                    <div class="col-sm-6 ">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-6 background_color">
                                            <p class="horigantal_content">&#8592 <span class="with_image">1920</span> &#8594</p>
                                            <input type="hidden" name="with_image" value="1920">
                                            <p class="vartical_content">&#8592 <span class="height_image">1080</span> &#8594</p>
                                            <input type="hidden" name="height_image" value="1080">
                                        </div>
                                        <div class="col-sm-3"></div>
                                    </div>
                                </section>                    
                                <h3>Step 2</h3>
                                <section>
                                    <h4 style="color:#fff;">Choose Content</h4>
                                    <div class="col-sm-6 here_centerLine">
                                        <div class="col-sm-4">
                                            <label for="image_file" style="color:#fff;"><input type="radio" name="file_type" id="image_file" value="1"   checked >Image</label>
                                        </div>
                                        <div class="col-sm-4">
                                        <label for="video_file" style="color:#fff;"><input type="radio" name="file_type" id="video_file" value="2">Video</label>
                                        </div>
										
										<div class="col-sm-4">
                                        <label for="video_file" style="color:#fff;"><input type="radio" name="file_type" id="video_file" value="3">File Url</label>
                                        </div>
										
                                        <div class="col-sm-12">
                                            <div class="form-group" id="image_video_id">
                                                <label for="" style="color:#fff;">Select Image</label>
                                                
                                                <input type="file" name="file_upload" class="form-control file_image" accept="image/*" >
                                            </div>
                                           
											<div class="form-group"  id="file_url_id" style="display: none">
                                                <label for="" style="color:#fff;">File Url</label>
                                                <input type="text" name="file_url" class="form-control">
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="" style="color:#fff;">File Name</label>
                                                <input type="text" name="file_name" class="form-control" >
                                                <p id="validation_error" class="text-danger hidden">Please fill required field.</p>
                                            </div>
                                            
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8">
                                            <h4 style="color:#fff;">Choose Content</h4>
                                            <div class="background_color" style="height:150px; width:290px;">
                                                <img id="blah" src="#" alt="your image" class="hidden_image" width="290" height="150"/>
                                                <!-- <video height="180" autoplay>
                                                    <source  src="" type="video/MP4" class="hidden_vedio">
                                                    Your browser does not support the video tag.
                                                </video> -->
                                                <video width="280" height="150" controls class="hidden_vedio">
                                                    <source src="mov_bbb.mp4" id="video_here">
                                                    Your browser does not support HTML5 video.
                                                </video>
                                            </div>
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                </section>                
                            </div>
                        </form>              
                    </div>
                

				
				
			
			  
			  </div>
            </section>
  
		  </div>
        </section>
      </section>
    </section>
    <!-- /.vbox -->
   
  </section>



	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>dist/js/jquery.steps.min.js"></script>
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
	  
	  var radio_val = $('[name="file_type"]:checked').val();
    var fileValue = $("input[name='file_upload']").val();
	  
	  var fileName = $("input[name='file_name']").val();
	  
		  
    var file_url_val = $("input[name='file_url']").val();
	   
	  //alert(radio_val);
	 if(radio_val==3 )
	 {
	 	if(file_url_val== "")
		   {
		   alert('File url is required');
		 	return false;
		   }   
	 }
	  else
	  {
	  	if(fileValue=="")
		{
			if(radio_val==2 )
	 		{
			alert('Video file is required');
			return false;
			}
			if(radio_val==1 )
	 		{
			alert('image file is required');
			return false;
			}
				
				
		}	
	  
	  }
	  
    console.log(fileValue);
    console.log(fileName);
   // if((fileValue !== undefined && fileValue !== "") && (fileName !== undefined && fileName !== "")){
	  if( fileName!== ""){
	
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
	
	$(function() {
	$(document).on('change', '[name="file_type"]' , function(){
  	var radio_val = $('[name="file_type"]:checked').val();
   
	if(radio_val==3)
	{
		$("#image_video_id").css("display", "none");
		$('#image_video_id').prop('required',false);
		$("#file_url_id").css("display", "block");
		$('#file_url_id').prop('required',true);

	}
    else
	{
		$("#file_url_id").css("display", "none");
		$('#file_url_id').prop('required',false);
		$("#image_video_id").css("display", "block");
		$('#image_video_id').prop('required',true);
	}
   
  }); 

});
	
</script>	
	