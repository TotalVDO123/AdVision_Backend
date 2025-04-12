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
        <a href="#"> Section</a>
    </li>
    <li class="active">Edit section </li>
</ol>
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Section user</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button> -->
        </div>
    </div>
    <div class="box-body">
	  <div class="row">
        <div class="col-sm-8">
          <form method="post" action="<?php echo base_url();?>index.php/section/update">
             <input type="hidden" name="player_id" value="<?php echo $this->uri->segment(3) ?>">   
			  <div class="col-sm-5">
              <div class="form-group">
                 <label for="Section Name">Section Name:</label>
                 <input class="form-control" type="text" name="name" value="<?php echo $section_detaile->name ?>" required >
              </div>
              </div>
			  <div class="col-sm-5">
                <div class="form-group">
                  <label for="Horizontal">Horizontal:</label>
                  <input class="form-control" type="text" name="H_size" value="<?php echo $section_detaile->H_size ?>" required>
                </div>
              </div>
			  
			 
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="Vertical">Vertical:</label>
                  <input class="form-control" type="text" name="V_size" value="<?php echo $section_detaile->V_size ?>" required>
                </div>                    
              </div>
			
			<div class="col-sm-5">
                <div class="form-group">
                <label for="playlist">Playlist:</label>
				<select class="form-control form-control-lg" name="playlist_id[]" multiple="multiple" required >
				<option value="" >Select</option>
				<?php 
				$array_playlist=explode(",", $section_detaile->playlist_id);
				foreach($result->playlists as $row)
				{
				?>
				<option value="<?php echo $row['id']; ?>" <?php if (in_array($row['id'], $array_playlist)){echo 'selected'; } ?> ><?php echo $row['name'] ?></option>
				<?php
				}
				?>
				</select>
                </div>                    
            </div>	
            
			<input type="hidden" name="section_id" value="<?php echo $section_id; ?>">
			<div class="col-sm-8">
                  <input class="btn btn-block btn-info btn-flat " type="submit" name="save" Value="update">
            </div>
          </form>              
        </div>
      </div>
    
	
	
	</div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- ./ Content wrapper -->
</div>
<!-- ./wrapper -->
