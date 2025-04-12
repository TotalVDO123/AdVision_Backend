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
        <a href="#"> View Screen</a>
    </li>
    <li class="active"> Playlist edit</li>
</ol>
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">View Screen</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button> -->
        </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-sm-12 galleryheight" style="height:400px!important;" >
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
							
							<a href="<?php echo base_url()."index.php"; ?>/playlists/viewscreen_delete/<?php echo $data['id']; ?>" title="Delete" class="del"><i class="fa fa-close"></i></a>
							
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



<!-- /.box -->
</div>
<!-- ./ Content wrapper -->
</div>
<!-- ./wrapper -->
