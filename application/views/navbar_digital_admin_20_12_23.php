<div class="col-lg-2 d-flex align-items-center bg1">
<div class="text-white px-3 py-4 mx-md-4 user"> <a href="#"> 

<!--<img src="images/Add_Vision_Logo.svg"></a>-->
 <div class="logo"> <a href="#"><img src="<?php echo base_url()?>assets/digital/images/Add_Vision_Logo.svg"/></a></div>

  <p class="small logout"><a href="<?php echo base_url()."index.php"; ?>/login/sign_out"><i class="fa fa-sign-out"></i> Logout</a></p>
</div>
<div class="sidenav"> 

<a href="<?php echo base_url()."index.php"; ?>/users"><i class="fa fa-users"></i> User</a>

  <button class="dropdown-btn"><i class="fa fa-map-marker"></i> Locations <i class="fa fa-caret-down"></i> </button>
  
   <div class="dropdown-container">
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
		$tmp_action='';
		if($location['id']==$this->uri->segment(3))
		{
			$tmp_action='class="active"';
		}	
		?> 
            
			<?php /* ?>
			<li <?php echo $tmp_action; ?>><a href="<?php echo base_url()."index.php"; ?>/users/location/<?php echo $location['id'] ?>"><i class="fa fa-folder-open"></i> <?php echo $location['location'] ?></a></li>
          <?php */ ?>
		  
		  <a href="<?php echo base_url()."index.php"; ?>/users/location/<?php echo $location['id'] ?>"> <?php echo $location['location'] ?></a> 
		  
		<?php
		}
		?>
  
  </div>
  
  
  
  <a href="<?php echo base_url()."index.php"; ?>/users/change_password/"><i class="fa fa-user"></i> Change password</a> 
</div>
</div>