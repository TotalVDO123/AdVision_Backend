    <section id="content">
      <section class="vbox">
	   <?php
		$this->load->view('mid_header');
		?>
        <section class="scrollable wrapper">
          <div class="tab-content">
            <section class="tab-pane active" id="basic">
              
			  
			  <div class="row">
			   <?php 
				$this->load->view('breadcrumb_nav');
				?>
                
				<div class="col-sm-12" style="height:60px;" >
				
				</div>
				<div class="col-sm-3">
				</div>
				 <form method="post" action="<?php echo base_url();?>index.php/users/change_password" onsubmit="return chkpassword()">
				<div class="col-sm-6">
                  
				  
				<?php if($message=$this->session->flashdata('message')): 
				$add_class=$this->session->flashdata('add_class');
				?>
				
				<div class="alert <?= $add_class ?>">
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
				<i class="fa fa-ban-circle"></i>
				  <?= $message; ?>
				</div>
				<?php endif; ?>
				  
				  
				  <section class="panel">
                    <header class="panel-heading font-bold">Change Password</header>
                    <div class="panel-body">
                      <form role="form">
                        <div class="form-group">
                          <label>Current password</label>
                          <input type="password" class="form-control" placeholder="" name="current_password" required>
                        </div>
                        <div class="form-group">
                          <label> New password</label>
                          <input type="password" class="form-control" placeholder="" name="new_password" id="new_password" required>
                        </div>
                        
						<div class="form-group">
                          <label>Confirm new password</label>
                          <input type="password" class="form-control" name="confirm_password" placeholder="" id="confirm_password" required>
                        </div>
						<input type="hidden" name="task" value="update_password" />
                        <button type="submit" class="btn btn-sm btn-default">Change Password</button>
                      </form>
                    </div>
                  </section>
                </div>
               </form> 
				
				<!--
				<div class="col-sm-6">
                  <section class="panel">
                    <header class="panel-heading font-bold">Horizontal form</header>
                    <div class="panel-body">
                      <form class="bs-example form-horizontal">
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
                      </form>
                    </div>
                  </section>
                </div>
              -->
			  
			  
			  
			  </div>
              
			  
			 
            </section>
            
			
			
		  
		  
		  </div>
        </section>
      </section>
    </section>
    <!-- /.vbox -->
   
  </section>
  <script>
  function chkpassword()
  {
	  var confirm_password = document.getElementById("confirm_password");
	  var new_password = document.getElementById("new_password");
	  if( new_password.value!= confirm_password.value)
	  {
		  alert('Passwords do not match.')
		  new_password.value='';
		  confirm_password.value='';	
		  return false;
	  }
	  
	  return true;
	  
	  
  }
  </script>