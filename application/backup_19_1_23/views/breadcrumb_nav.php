<div class="col-lg-12">
  <!-- .breadcrumb -->
  <ul class="breadcrumb">
	<?php
	
		 $controler= $this->uri->segment(1);  
		 $page= $this->uri->segment(2);		  
		
		$page_name1='';
		$page_name2='';
		if($controler=='players' and  $page=='player')
		{
			//$page_name1='My player';	
		    //echo '<li><a href="#"><i class="fa fa-list-ul"></i>'. $page_name1.'</a></li>';
			$page_name2='My player';	
			echo '<li class="active">'.$page_name2.'</li>';	
		}	
		elseif($controler=='screens' and  $page=='' )
		{
			
			$page_name1='View screen';	
		    echo '<li class="active"><a href="#"><i class="fa fa-list-ul"></i>'.$page_name1.'</a></li>';		
			
		}
		elseif($controler=='screens' and  $page=='add')
		{
			
			$page_name1='Screen';
			$page_name2='New screen';	
		    echo '<li><a href="#"><i class="fa fa-list-ul"></i>'.$page_name1.'</a></li>';
			echo '<li class="active">'.$page_name2.'</li>';
		}
		elseif($controler=='Playlists' and  $page=='')
		{
			$page_name1='Playlists';
			echo '<li class="active">'.$page_name1.'</li>';
		}
		elseif($controler=='playlists' and  $page=='single')
		{
			
			$page_name1='Playlists';
			$page_name2='Edit Playlist';	
		    echo '<li><a href="#"><i class="fa fa-list-ul"></i>'.$page_name1.'</a></li>';
			echo '<li class="active">'.$page_name2.'</li>';
		}
		elseif($controler=='users' and  $page=='change_password')
		{
			
			//$page_name1='Change password';
			$page_name2='Change password';	
		    //echo '<li><a href="#"><i class="fa fa-list-ul"></i>'.$page_name1.'</a></li>';
			echo '<li class="active">'.$page_name2.'</li>';
		}
		
		
		
		
		
		
		
	?>
	<!--
	<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
	-->
	<!--<li class="active">Components</li> -->
  </ul>
  <!-- / .breadcrumb -->
</div>