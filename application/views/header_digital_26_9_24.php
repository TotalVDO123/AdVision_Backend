<!doctype html>
<html>
<head>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add Vision</title>



<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/bootstrap.css" type="text/css" />

<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/bootstrap.min.css" type="text/css" />

<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/style.css" type="text/css" />

<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/font-awesome.css" type="text/css" />

<link rel="stylesheet" href="<?php echo base_url()?>assets/digital/css/font-awesome.min.css" type="text/css" />


<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


 <style type="text/css">
        body{
            background:#d1d1d2;
        }
        .mian-section{
            padding:20px 60px;
            margin-top:100px;
            background:#fff;
        }
        .title{
            margin-bottom:50px;
        }
        .label-success{
            position: relative;
            top:20px;
        }
    </style>
<!--
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/font-awesome.css"/>
<link rel="stylesheet" href="css/font-awesome.min.css"/>
-->
</head>

<body class="bg">
<main>
  <header>
   <div class="container">
      <div class="head">
        <div class="row">
          <div class="col-md-3">
            <div class="logo"> <a href="<?php echo base_url() ?>"><img src="<?php echo base_url()?>assets/digital/images/Add_Vision_Logo.svg"/></a></div>
			
			
          </div>
          <div class="col-md-6">
            <nav align="center">
              <ul>
                <li><a href="<?php echo base_url() ?>/users/companies/"><i class="fa fa-th-large"></i> Dashboard</a></li>
                
                <?php /* ?>
				
				<li>
                  <div class="dropdown">
                    <button class="dropbtn"><i class="fa fa-map-marker"></i> Locations</button>
				<div class="dropdown-content">	
					<?php
		$where_as="";				
		if($this->session->userdata('user_type')!=1 )
		{	
			$where_as=" and users.id='". $this->session->userdata('user_id')."'";
		}
		$sql = "SELECT location.* FROM  location left join  users on FIND_IN_SET(location.id,users.location_id ) where 1 ". $where_as ." group by location.id ";
		
		$res = $this->db->query($sql);
		$result_location= $res->result_array();
		 foreach($result_location as $location )
		{
		
		
		$tmp_action='';
		@$location_name=$location['location'];
		if($location['id']==$this->uri->segment(3))
		{
			$tmp_action='class="active"';
		}	
		?> 
		
		
		<a href="<?php echo base_url()."index.php"; ?>/users/location/<?php echo $location['id'] ?>"> <?php echo $location['location'] ?></a>
		
         
         
		<?php
		}
		?>
		 </div>  
				
		
                  </div>
                  
                  
                  
                  
                  
                </li>
		 <?php */ ?>
		 <?php /* ?>
		 <li ><a href="<?php echo base_url() ?>/users/companies/"><i class="fa fa-th-large"></i> Companies</a></li>
		 
		 <?php */ ?>
				 
				<!-- <li><a href="<?php echo base_url()?>players/player/<?php echo $this->session->userdata('player_id');?>"><i class="fa fa-desktop"></i> Players</a></li>-->
		<?php /* ?>
                <li><a href="<?php echo base_url('screens')?>"><i class="fa fa-desktop"></i> Screens</a></li>
        <?php */ ?>      
			  
			  <li><a href="<?php echo base_url('playlists/playlistgallery')?>"><i class="fa fa-desktop"></i> Gallery</a></li>
			  
			  <li><a href="<?php echo base_url('Playlists')?>"><i class="fa fa-youtube-play"></i> Playlists</a></li>
			  
			    <li><a href="<?php echo base_url('index.php/players/add')?>"><i class="fa fa-desktop"></i> Screens</a></li>
			    <li><a href="<?php echo base_url('index.php/users')?>"><i class="fa fa-user"></i> User</a></li>
                <!--  <li><a href="#"><i class="fa fa-calendar"></i> Schedule</a></li>-->
			 <?php /* ?>	
			 <li><a href="<?php echo base_url()."index.php"; ?>/login/sign_out"><i class="fa fa-youtube-play"></i> Logout</a></li>
				 <?php */ ?>
				
              </ul>
            </nav>
          </div>
          <div class="col-md-3">
            <div class="right-side">
              <ul>
                <li><a href="#"><i class="fa fa-search"></i></a></li>
                <li><a href="#"><i class="fa fa-bell-o"></i></a></li>
                
               
             
                <li><img class="rounded-circle" width="60" height="50" src="<?php echo base_url()  ?>assets/company_logo/<?php echo $this->session->userdata('user_id') ?>.jpg"></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
