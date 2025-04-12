<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  require_once('header.php');
?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url(); ?>index.php"><b>KIMBL</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
     <?php if($feedback=$this->session->flashdata('feedback')): 
              $feedback_class=$this->session->flashdata('feedback_class');
     ?>
      <div class="row">
        <div class="col-md-12 col-md-offset-3" style="margin: 0">
            <div class="alert alert-dismissible <?= $feedback_class ?>">
              <?= $feedback; ?>
            </div>
        </div>
      </div>
    <?php endif; ?>
     
    <form action="<?php echo base_url();?>index.php/Login/process" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="username" name="email" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="Login">
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php 
require_once('footer.php');
?>
