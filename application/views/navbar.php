<section>
          <!-- user -->
          <?php
		  $avtar_image="";
			if(empty($this->session->userdata('profile_image')))
			{
			$avtar_image="avatar.png";	
			}	
			else
			{
			$avtar_image=$this->session->userdata('profile_image');		
			}	
			?>
		  
		  <!--<div class="bg-success nav-user hidden-xs pos-rlt">-->
		  <?php /* ?>
		  <div class="nav-user hidden-xs pos-rlt">
            <div class="nav-avatar pos-rlt">
              <a href="#" class="thumb-sm avatar animated rollIn" data-toggle="dropdown">
                <img src="<?php echo base_url()?>images/profile_image/<?php echo $avtar_image; ?>" alt="" class="">
                <span class="caret caret-white"></span>
              </a>
              <ul class="dropdown-menu m-t-sm animated fadeInLeft">
              	<span class="arrow top"></span>
                <li>
                  <a href="<?php echo base_url()?>users/profile/">Profile</a>
                </li>
                
				<li>
				<a href="<?php echo base_url()?>users/change_password">Change password</a>
				</li>
				
				<li>
                  <a href="<?php echo base_url()?>login/sign_out">Logout</a>
                </li>
              </ul>
			  
			</div>
			</div>  
			 <?php */ ?> 
              
			
            <!--
			<div class="nav-msg">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <b class="badge badge-white count-n">2</b>
              </a>
              <section class="dropdown-menu m-l-sm pull-left animated fadeInRight">
                <div class="arrow left"></div>
                <section class="panel bg-white">
                  <header class="panel-heading">
                    <strong>You have <span class="count-n">2</span> notifications</strong>
                  </header>
                  <div class="list-group">
                    <a href="#" class="media list-group-item">
                      <span class="pull-left thumb-sm">
                        <img src="images/avatar.jpg" alt="John said" class="img-circle">
                      </span>
                      <span class="media-body block m-b-none">
                        Use awesome animate.css<br>
                        <small class="text-muted">28 Aug 13</small>
                      </span>
                    </a>
                    <a href="#" class="media list-group-item">
                      <span class="media-body block m-b-none">
                        1.0 initial released<br>
                        <small class="text-muted">27 Aug 13</small>
                      </span>
                    </a>
                  </div>
                  <footer class="panel-footer text-sm">
                    <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                    <a href="#">See all the notifications</a>
                  </footer>
                </section>
              </section>
            </div>
          -->
		  
		  <?php
		$controler= $this->uri->segment(1);  
		$page= $this->uri->segment(2);		  
		
		
		$action_player='';
		if($page=='player' and $controler=='players') $action_player='active';  
		
		$action_screen='';
		if($controler=='screens' and $page=="" ) $action_screen='active';  

		$new_screen='';
		if($page=='add') $new_screen='active';  

		$action_change_password='';
		if($page=='change_password' and $controler=='users' ) $action_change_password='active';  
		
		$action_playlists='';
		if($controler=='Playlists' or $controler=='playlists'  ) $action_playlists='active';  	
	
		 ?>
		  
		  
          <!-- / user -->
          <!-- nav -->
          <nav class="nav-primary hidden-xs">
            <ul class="nav">
              
			  <li class="<?php echo $action_player; ?>">
                <a href="<?php echo base_url()?>players/player/<?php echo $this->session->userdata('player_id');?>">
                  <i class="fa fa-laptop" aria-hidden="true"></i>
                  <span>Players</span>
                </a>
              </li>
              
			  <?php /* ?>
			  <li class="dropdown-submenu <?php echo $action_screen; ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                  <span>Screens</span>
                </a>
                <ul class="dropdown-menu">                
                  <li>
                    <a href="<?php echo base_url() ?>screens">View Screen</a>
                  </li>
                 
                  <li>
                    <a href="<?php echo base_url() ?>screens/add">New Screen</a>
                  </li>
                 
                </ul>
              </li>
			  <?php */ ?>
			   
	
			   
			   <li class="<?php echo $action_screen; ?>">
                <a href="<?php echo base_url() ?>screens">
                  <i class="fa fa-laptop" aria-hidden="true"></i>
                  <span>View Screen</span>
                </a>
              </li>
			   
			   <li class="<?php echo $new_screen; ?>">
                <a href="<?php echo base_url() ?>screens/add">
                  <i class="fa fa-laptop" aria-hidden="true"></i>
                  <span>Add items</span>
                </a>
              </li>
			   
			   <?php /* ?>
			   
			   <li class="<?php echo $action_screen; ?>">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
				<i class="fa fa-play-circle-o" aria-hidden="true"></i>
				Screens
				</a>
                <ul class="collapse list-unstyled" id="homeSubmenu" style="margin-left:25px;">
                    <li class="<?php echo $action_screen; ?>">
                        <a href="<?php echo base_url() ?>screens"><i class="fa fa-television" aria-hidden="true"></i>View Screen</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>screens/add"><i class="fa fa-play" aria-hidden="true"></i>New Screen</a>
                    </li>
                    
                </ul>
            </li>
			  
			  <?php */ ?>
			  
			  
			  <li class="<?php echo $action_playlists; ?>">
                <a href="<?php echo base_url()?>Playlists">
                  <i class="fa fa-list-alt" aria-hidden="true"></i>
                  <span>Playlists</span>
                </a>
              </li>
            <?php /* ?>
			<li class="<?php echo $action_change_password; ?>">
				<a href="<?php echo base_url()?>users/change_password">
				  <i class="fa fa-envelope-o"></i>
				  <span>Change password</span>
				</a>
		    </li>
			<?php */ ?>
			
			
			
         
            </ul>
            
          </nav>

 <p class="small logout"><a href="<?php echo base_url()."index.php"; ?>/login/sign_out"><i class="fa fa-sign-out"></i> Logout</a></p> 
 
 
          <!-- / nav -->
          <!-- note -->
          
          <!-- / note -->
        </section>
        <footer class="footer bg-gradient hidden-xs">
          <!--
		  <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-sm btn-link m-r-n-xs pull-right">
            <i class="fa fa-power-off"></i>
          </a>
          -->
		 <!-- <a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm">
            <i class="fa fa-bars"></i>-->
          </a>
        </footer>
      </section>
    </aside>
    
    

 
    