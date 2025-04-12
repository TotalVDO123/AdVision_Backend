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
        <a href="#"> Players</a>
    </li>
    <li class="active"> Players edit</li>
</ol>
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Edit player</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button> -->
        </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-sm-12">
          <form method="post" action="<?php echo base_url();?>index.php/players/update">
              <input type="hidden" name="playerId" value="<?php echo $result->id;?>"/>
			  
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">Player Id:</label>
                  <input class="form-control" type="text" name="player_id" value="<?php echo $result->player_id; ?>" required>                      
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">Player Name:</label>
                  <input class="form-control" type="text" name="name" value="<?php echo $result->name; ?>" required>
                </div>
              </div>
              
			  
			  
			  
			   <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">Pin:</label>
                  <input class="form-control" type="text" name="pin" value="<?php echo $result->pin; ?>" required>
                </div>
              </div>
			  <div class="clearfix hidden-sm"></div>
			  
			  <div class="col-sm-2">
                  <input class="btn btn-block btn-info btn-flat " type="submit" name="update" Value="Update">
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
