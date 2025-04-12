<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

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
                
		<?php if($message=$this->session->flashdata('message')): 
         $add_class=$this->session->flashdata('add_class');
		?>
		<div class="alert <?= $add_class ?>">
         <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
         <i class="fa fa-ban-circle"></i>
		  <?= $message; ?>
        </div>
		 <?php endif; 
		 
		 //print_r($playlists);
		 
		 ?>
				
				<!-- starting table -->
				<section class="panel">
                <header class="panel-heading">
                  All PLaylist
                </header>
				<div class="table-responsive">
                  <table class="table table-striped b-t text-sm">
                    <thead>
                      <tr>
                        
						<th width="120" >Playlist name</th>
                        <th width="60" >Screen count</th>
                        <th width="60" >Section size</th>
                        <th width="70" > Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
					<?php
					if(!empty($playlists))
					{
					
					foreach($playlists as $playlist)
					{
					
					//print_r($playlist);
					
					?>  
					  <tr>
                        
						<td><?php echo $playlist['name']; ?></td>
                        <td><?php echo $playlist['scount']; ?></td>
                        <td>12 MB</td>
						<td>
						  <a href="<?php echo base_url()?>playlists/single/<?php echo $playlist['id'] ?>" onclick="return confirm('Are you want to Edit?');" ><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						  
						  <a href="<?php echo base_url()?>playlists/playlist_delete/<?php echo $playlist['id'] ?>" onclick="return confirm('Are you sure you want to delete this playlist?');" ><i class="fa fa-times text-danger text"></i></a>
						  
					<!--  
						  <a href="#" class="active" data-toggle="class"><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
                        -->
						
						</td>
                      </tr>
					<?php
					}
					
					}
					else
					{	
					?>	
                  <tr>
				  <td colspan="5" align="center"  ><strong>There is not playlist</strong></td>
				  </tr>
				  
					<?php
					}
					?>
                    </tbody>
                  </table>
                </div>
                
				</section>
				
				<!-- end of table -->
			  
			  </div>
			</div>
		  </div>
        </section>
      </section>
      <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
    </section>
    <!-- /.vbox -->
  </section>
	







