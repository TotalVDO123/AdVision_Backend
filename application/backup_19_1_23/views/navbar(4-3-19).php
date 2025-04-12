<header class="main-header">
    
    <a href="<?php echo base_url()."index.php/Users"; ?>" class="logo">
    
      <span class="logo-mini"><b>KL</b></span>
    
      <span class="logo-lg"><b>KIMBL</b></span>
    </a>
    
    <nav class="navbar navbar-static-top">
      
      <a href="<?php echo base_url()."assets/"; ?>#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="<?php echo base_url()."assets/"; ?>#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="<?php echo base_url()."assets/"; ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs">Welcome <?php  echo $this->session->userdata('user_name');?></span>
            </a>
            <ul class="dropdown-menu col-sm-2">
              <!-- User image -->
              <!-- <li class="user-header">
                <img src="<?php echo base_url()."assets/"; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                 <?php  echo $this->session->userdata('user_name');?>
                  <small>Admin Since <?php echo date('Y');?></small>
                </p>
              </li> -->
               <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="<?php echo base_url()."assets/"; ?>#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <!-- <div class="pull-right"> -->
                  <a href="<?php echo base_url()."index.php"; ?>/login/sign_out/" class="btn btn-default btn-flat">Sign out</a>
                <!-- </div> -->
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="<?php echo base_url()."assets/"; ?>#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()."assets/"; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        <p class="user_profileName"><?php  echo $this->session->userdata('user_name');?></p>
          <!-- <a href="<?php echo base_url()."assets/"; ?>#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       
        <!-- <li class="<?=($this->uri->segment(1)==='welcome')?'active':''?> treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=($this->uri->segment(2)==='welcome')?'active':''?>"><a href="<?php echo base_url()."index.php"; ?>/login/welcome/"><i class="fa fa-circle-o"></i>Admin </a></li>
            <li><a href="<?php echo base_url()."index.php"; ?>/login/welcome/"><i class="fa fa-circle-o"></i> Students </a></li>
            <li><a href="<?php echo base_url()."index.php"; ?>/login/welcome/"><i class="fa fa-circle-o"></i> Parents </a></li>
          </ul>
        </li>
        <li class="<?=($this->uri->segment(1)==='login')?'active':''?> treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Students</span>
            
          </a>
          <ul class="treeview-menu">
            <li class="<?=($this->uri->segment(2)==='students')?'active':''?>"><a href="<?php echo base_url()."index.php"; ?>/login/students/"><i class="fa fa-circle-o"></i> All Students </a></li>
            <li class="<?=($this->uri->segment(2)==='add_student')?'active':''?>" ><a href="<?php echo base_url()."index.php"; ?>/login/add_student/"><i class="fa fa-circle-o"></i> Add Students Form</a></li>
            <li class="<?=($this->uri->segment(2)==='welcome')?'active':''?>" ><a href="<?php echo base_url()."index.php"; ?>/login/welcome/"><i class="fa fa-circle-o"></i> Students Promotion</a></li>
            
          </ul>
        </li> -->

       
		<?php
		
		if($this->session->userdata('user_type')==1 or $this->session->userdata('user_type')==2 )
		{
		?>
		<li class="<?=($this->uri->segment(1)==='users')?'active':''?>">
          <a href="<?php echo base_url()."index.php"; ?>/users">
            <i class="fa fa-user-plus"></i> <span>Users</span>
          </a>
        </li>
        <li class="<?=($this->uri->segment(1)==='players')?'active':''?>">
          <a href="<?php echo base_url()."index.php"; ?>/players">
            <i class="fa fa-file-text-o"></i>
            <span>All Players</span>
          </a>
        </li>
        <?php
		}
		if($this->session->userdata('user_type')==3)
		{
		?>
        <li class="<?=($this->uri->segment(1)==='playlists')?'active':''?>">
          <a href="<?php echo base_url()."index.php"; ?>/playlists">
            <i class="fa fa-file-text-o"></i> <span>My Players</span>
          </a>
        </li>
        <?php
		}
		?>
		<li class="<?=($this->uri->segment(1)==='screens')?'active':''?>">
          <a href="<?php echo base_url()."index.php"; ?>/screens/add"> 
            <i class="fa fa-file-text-o"></i> <span>Screens</span>
          </a>
        </li>
        
		
		<li class="<?=($this->uri->segment(1)==='section')?'active':''?>">
          <a href="<?php echo base_url()."index.php"; ?>/section/"> 
            <i class="fa fa-file-text-o"></i> <span>Section</span>
          </a>
        </li>
		
		
		<li class="<?=($this->uri->segment(1)==='supports')?'active':''?>">
        <a href="#">
          <!-- <a href="<?php echo base_url()."index.php"; ?>/supports"> -->
            <i class="fa fa-file-text-o"></i> <span>Support</span>
          </a>
        </li>
        <!-- <li class="treeview">
          <a href="<?php echo base_url()."assets/"; ?>#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()."assets/"; ?>pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="<?php echo base_url()."assets/"; ?>pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="<?php echo base_url()."assets/"; ?>pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="<?php echo base_url()."assets/"; ?>pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
