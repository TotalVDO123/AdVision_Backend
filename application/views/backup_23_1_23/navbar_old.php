


<style>
.dropbtn {
  background-color: #3d2e69;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #3d2e69;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #353a75;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: #353a75;}
</style>

<header class="main-header">
    
    <a href="<?php echo base_url()."index.php/Users"; ?>" class="logo">
    
      <span class="logo-mini"><b>KL</b></span>
    
      <span class="logo-lg">
	 <!-- <img src="<?php echo base_url()?>/assets/images/logo.png" alt="Ovoo" height="30" style="margin-top:-15px;"> -->
	SUBZERO	  
	  </span>
    </a>
    
    <nav class="navbar navbar-static-top">
      
      <a href="<?php echo base_url()."assets/"; ?>#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
		<div  style="width:200px;float: left;color:white;text-align:center;padding:10px 5px 15px 50px;width: 50%;"><strong>User vs Player Model </strong> </div>
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
		
		if($this->session->userdata('user_type')==1 )
		{
		?>
		<li class="<?=($this->uri->segment(1)==='users')?'active':''?>">
          <a href="<?php echo base_url()."index.php"; ?>/users">
            <i class="fa fa-user-plus"></i> <span>Users</span>
          </a>
        </li>
        <?php
		}
		?>
		
		<?php /* ?>
		<li class="<?=($this->uri->segment(1)==='players')?'active':''?>">
          <a href="<?php echo base_url()."index.php"; ?>/users/location">
            <i class="fa fa-file-text-o"></i>
            <span>Location</span>
          </a>
        </li>
		
		<?php */ ?>




		<li class=" <?=($this->uri->segment(2)==='location')?'active':''?> treeview">
          <a href="<?php echo base_url()."assets/"; ?>#">
            <i class="fa fa-pie-chart"></i>
            <span>Location</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
		  
		  <ul class="treeview-menu">
		  
		   <?php
		if($this->session->userdata('user_type')!=1 )
		{	
			$where_as=" and users.id='". $this->session->userdata('user_id')."'";
		}
		$sql = "SELECT location.* FROM  location left join  users on FIND_IN_SET(location.id,users.location_id ) where 1 ". $where_as ." group by location.id ";
		
		$res = $this->db->query($sql);
		$result_location= $res->result_array();
		 foreach($result_location as $location )
		{
		?> 
		  
		  
            <li ><a href="<?php echo base_url()."index.php"; ?>/users/location/<?php echo $location['id'] ?>"><i class="fa fa-folder-open"></i> <?php echo $location['location'] ?></a></li>
          
		<?php
		}
		?>
		  
		 
		  </ul>
        </li>
	


		<?php /* ?>
		<div class="dropdown" >
		  <div class="dropbtn" style="width:230px;"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;Location</div>
		  <div class="dropdown-content" style="left:150px;">
		  <?php
		if($this->session->userdata('user_type')!=1 )
		{	
		$where_as=" and users.id='". $this->session->userdata('user_id')."'";
		//$sql = "SELECT location.* FROM  location   where 1 ".$where_as;
		
		//$sql = "SELECT location.* FROM  location left join  users on FIND_IN_SET(location.id,users.location_id ) where 1 and location_id in ( select * from users)";
		
		}
		$sql = "SELECT location.* FROM  location left join  users on FIND_IN_SET(location.id,users.location_id ) where 1 ". $where_as ." group by location.id ";
		
		$res = $this->db->query($sql);
		$result_location= $res->result_array();
		
		
		foreach($result_location as $location )
		{
		?>
		  
		  
			<li class="<?=($this->uri->segment(1)==='screens')?'active':''?>">
			  <a href="<?php echo base_url()."index.php"; ?>/users/location/<?php echo $location['id'] ?>"> 
				<i class="fa fa-file-text-o"></i> <span><?php echo $location['location'] ?></span>
			  </a>
			</li>
		
		<?php
		}
		?>
				
		  </div>
		</div>

		<?php */ ?>
		
		<?php /* ?>
		<li class="<?=($this->uri->segment(1)==='players')?'active':''?>">
          <a href="<?php echo base_url()."index.php"; ?>/players">
            <i class="fa fa-file-text-o"></i>
            <span>Players</span>
          </a>
        </li>
		
		<?php */ ?>
        <?php
		
		if($this->session->userdata('user_type')==3)
		{
		?>
        <li class="<?=($this->uri->segment(1)==='playlists')?'active':''?>">
          <a href="<?php echo base_url()."index.php"; ?>/playlists">
            <i class="fa fa-file-text-o"></i> <span>My Players</span>
          </a>
        </li>
       
		
		
		<div class="dropdown" >
		  <div class="dropbtn" style="width:230px;"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;screens</div>
		  <div class="dropdown-content" style="left:150px;">
		  
			<li class="<?=($this->uri->segment(1)==='screens')?'active':''?>">
			  <a href="<?php echo base_url()."index.php"; ?>/playlists/view_screen"> 
				<i class="fa fa-file-text-o"></i> <span>View screens</span>
			  </a>
			</li>

			
			
			<li class="<?=($this->uri->segment(1)==='screens')?'active1fs':''?>">
			  <a href="<?php echo base_url()."index.php"; ?>/screens/add"> 
				<i class="fa fa-file-text-o"></i> <span>New screens</span>
			  </a>
			</li>
		
		  </div>
		</div>
       
    
		
		
		
		
		
		<li class="<?=($this->uri->segment(1)==='section')?'active':''?>">
          <a href="<?php echo base_url()."index.php"; ?>/section/"> 
            <i class="fa fa-file-text-o"></i> <span>Section</span>
          </a>
        </li>
		 <?php
		}
		?>
		
		<li class="<?=($this->uri->segment(1)==='supports')?'active':''?>">
        <a href="#">
          <!-- <a href="<?php echo base_url()."index.php"; ?>/supports"> -->
            <i class="fa fa-file-text-o"></i> <span>Support</span>
        </a>
        </li>
		  
		<li class="<?=($this->uri->segment(1)==='change_password')?'active':''?>">
			  <a href="<?php echo base_url()."index.php"; ?>/users/change_password/"> <i class="fa fa-file-text-o"></i><span>Change password</span></a>
		   
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
      
	  
	  <?php /* ?>
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
        
		</li> 
	  <?php */ ?>
	  
	  
	  
	  </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
