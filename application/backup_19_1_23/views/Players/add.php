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
        <a href="#"> Player</a>
    </li>
    <li class="active"> Player add</li>
</ol>
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Add player</h3>

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
          <form method="post" action="<?php echo base_url();?>index.php/players/add">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">Player Id:</label>
                  <input class="form-control" type="text" name="player_id" value="" required>                      
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">Player Name:</label>
                  <input class="form-control" type="text" name="name" value="" required>
                </div>
              </div>
              
			  <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">Pin:</label>
                  <input class="form-control" type="text" name="pin" value="" required>
                </div>
              </div>
              
			  <div class="col-sm-6">
                <div class="form-group">
                 <label for="email">&nbsp;</label>
				 <input  class="form-control" type="hidden" name="user_id" value="<?php echo $user_id; ?>" >
				</div>
              </div>
              
			  <div class="clearfix hidden-sm"></div>
			  
			  <div class="row">
			  <div class="col-sm-2">
                  <input class="btn btn-block btn-info btn-flat " type="submit" name="save" Value="Save">
              </div>
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
