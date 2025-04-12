<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <ol class="breadcrumb">
    <li>
        <a href="#"> Playlist</a>
    </li>
    <li class="active"> Playlist edit</li>
</ol>

<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Playlist</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button> -->
        </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-sm-12 galleryheight" >
                    <?php //echo "<pre>"; print_r($result);
					 foreach($result->gallery as $data): 
						echo "<div class='col-md-2 col-sm-2 col-xs-2 pb-2 pt-2' style='background-url'>";
							if($data['file_type'] == "1"){ 
								echo "<img width='150' height='84' src=".$data['file_upload'].">";							
							}else{
								echo  "<video width='150' controls>";
								echo "<source src=".$data['file_upload'].">";
									echo "Your browser does not support HTML5 video.";
								echo "</video>";
							}
							
							$pathinfo = pathinfo($data['file_upload']);								
							echo "<span class='float-left'>".$pathinfo['filename'].".".$pathinfo['extension']."</span>"; ?>
							
							<a href="<?php echo base_url()."index.php"; ?>/playlists/playlistEdit_delete/<?php echo $data['id']; ?>/<?php echo $playlist_id;?>" title="Delete" class="del1">         <i class="fa fa-close"></i></a>
							
							<span class='float-right'><i  class='fa fa-plus-square fa-6' aria-hidden='true' onClick="image(<?php echo "'".$data['file_upload']."', ".$data['id'].','.$data['file_type'];?>)"></i></span>
						<?php echo "</div>";
					endforeach;
					?>
        </div>
      </div>
	  
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

<div class="box">
    
    <div class="box-body">
      <form action="<?php echo base_url()?>index.php/playlists/save_playlist" method="POST">
	  <input type="submit" name="submit" value="Update">
	  <div class="row">
        <div class="col-sm-12 gallerycanvas">
            <ul id="sortable">
				<!--
				<li class="ui-state-default"><i class="fa fa-close"></i><img src="http://[::1]/CodeIgniter2/uploads/2019/02/1549706848390.jpg" width="142"/></li>               
				-->
			<?php
			if( empty($playlist_gallery) )	
			{
				echo "There is not image/video assign in this playlist";
			}	
			else
			{
				foreach( $playlist_gallery as $row)
				{
				?>
				<li id="<?php echo $row['screen_id'] ?>" class="ui-state-default"><div screen_id="<?php echo $row['screen_id']; ?>" class="del" ><i class="fa fa-close"></div></i><img src="<?php echo $row['file_upload'] ?>" width="142"/>
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
    </form>
	
	</div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- ./ Content wrapper -->
</div>
<!-- ./wrapper -->
