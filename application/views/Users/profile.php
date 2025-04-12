<section id="content">
      <section class="vbox">
        <?php
		$this->load->view('mid_header');
		?>
        <section class="scrollable wrapper">
          <div class="tab-content">
            <div class="tab-pane active" id="static">
              <div class="row">
			    <?php 
				$this->load->view('breadcrumb_nav');
				?>
        <!--
		<aside class="aside-lg bg-light lter b-r">
		<section class="vbox">
                <section class="scrollable">
				<div class="wrapper">
                    <div class="clearfix m-b">
                      <a href="#" class="pull-left thumb m-r">
                        <img src="images/avatar.jpg" class="img-circle">
                      </a>
                      <div class="clear">
                        <div class="h3 m-t-xs m-b-xs">John.Smith</div>
                        <small class="text-muted"><i class="fa fa-map-marker"></i> London, UK</small>
                      </div>                
                    </div>
                    <div class="panel wrapper">
				   </div>
                    </div>
                 </section> 
				 </section>  
			<aside	  
			-->
			<?php
			
			$avtar_image="";
			if(empty($result->profile_image))
			{
			$avtar_image="avatar.png";	
			}	
			else
			{
			$avtar_image=$result->profile_image;		
			}	
			?>
			

<div class="col-sm-6">
                  <section class="panel">
                    <header class="panel-heading font-bold"></header>
                    <div class="panel-body">
                      <form method="post" class="bs-example form-horizontal" action="<?php echo base_url();?>index.php/users/update_profile" enctype="multipart/form-data" >	
                        <div class="clearfix m-b">
                      <input type="hidden" name="user_id" value="<?php echo $user_id ?>"> 
					  <div class="image-upload">
					  <label for="file-input">
						<img src="<?php echo base_url()?>images/profile_image/<?php echo $avtar_image ?>" class="img-circle pull-left thumb m-r"/>
					  </label>

					  <input id="file-input" name="profile_image"  type="file" style="display: none"  />
					</div>
					  
					  <div class="clear">
                        <div class="h3 m-t-xs m-b-xs"><?php echo $result->first_name.' '.$result->last_name ?> </div>
                        <small class="text-muted"><i class="fa fa-map-marker"></i> <?php echo ' '.$result->country ?> </small>
                      </div>                
                    </div>
						
						
						<!--
						<div class="form-group">
                          <label class="col-lg-2 control-label">Email</label>
                          <div class="col-lg-10">
                            <input type="email" class="form-control" placeholder="Email">
                            <span class="help-block m-b-none">Example block-level help text here.</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Password</label>
                          <div class="col-lg-10">
                            <input type="password" class="form-control" placeholder="Password">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox"> Remember me
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-sm btn-default">Sign in</button>
                          </div>
                        </div>
                      -->
					  
					  <div class="form-group">
                          <div class="col-lg-10">
                            <button type="submit" class="btn btn-sm btn-default">Change Image</button>
                          </div>
                        </div>
					  </form>
                    </div>
                  </section>
                </div>
              			
				  
				  
				  
				  
				  </div>

				
			  
			  </div>
			</div>
		  </div>
        </section>
      </section>
      <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
    </section>
    <!-- /.vbox -->
  </section>
	

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->


