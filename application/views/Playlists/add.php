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
    <li class="active"> Playlist add</li>
</ol>
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Add Playlist</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-sm-12">
          <form method="post" action="<?php echo base_url();?>index.php/playlists/add" onsubmit="return  chktimevalidation()">
            <input class="form-control" type="hidden" name="playerId" value="<?php echo $this->uri->segment(3);?>" >                     
            <div class="row">
              <div class="col-sm-12">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="email">Playlist Name:</label>
                    <input class="form-control" type="text" name="name" value="" required>                      
                  </div>
                </div>              
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="text">From Time:</label>
                    <input class="form-control" type="time" id="txtFrom" name="from_time" value="" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="text">TO Time:</label>
                    <input class="form-control" type="time" id="txtTo" name="to_time" value="" required>
                  </div>
                </div>
             
   
			
				</div>
			
			
			
			</div>            
            <div class="col-sm-2">
              <input class="btn btn-block btn-info btn-flat " type="submit" name="save" Value="Save">
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
