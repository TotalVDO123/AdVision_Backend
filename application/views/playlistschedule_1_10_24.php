

<?php

$this->load->view('./header_digital');
?>

 <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/schedule/assets/css/schedule_style.css">

  <header class="cd-main-header text-center flex flex-column flex-center">
   

    <h1 class="text-xl" style="color:#FFF;" > <?php echo $Playlist_title ?> Playlist Schedule</h1>
	
  </header>

	
		<div style="float:right; margin-right: 150px;" >
				<span style="float:right"><a href="<?php echo base_url()?>players/player/<?php echo $playerId ?>" target="_blank">
                <input class="btn btn-block btn-info btn-flat " type="button" name="Add New Time Slot" value="Add New Time Slot">
				</a></span>
				
		</div>
&nbsp;
  <div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
    <div class="cd-schedule__timeline">
      <ul>
        
		
		<li><span>00:00</span></li>
        <li><span>01:00</span></li>
		<li><span>02:00</span></li>
		<li><span>03:00</span></li>
		
		<li><span>04:00</span></li>
		<li><span>05:00</span></li>
		<li><span>06:00</span></li>
		<li><span>07:00</span></li>
		<li><span>08:00</span></li>
		
		<li><span>09:00</span></li>
        
        <li><span>10:00</span></li>
        
        <li><span>11:00</span></li>
        
        <li><span>12:00</span></li>
		
		<li><span>13:00</span></li>
		
		<li><span>14:00</span></li>
		
		<li><span>15:00</span></li>
		
		<li><span>16:00</span></li>
		<li><span>17:00</span></li>
		<li><span>18:00</span></li>
		<li><span>19:00</span></li>
		<li><span>20:00</span></li>
		<li><span>21:00</span></li>
		<li><span>22:00</span></li>
		<li><span>23:00</span></li>
		<li><span>00:00</span></li>
        
        
		
      </ul>
    </div> <!-- .cd-schedule__timeline -->
  
    <div class="cd-schedule__events">
      <ul>
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Monday</span></div>
  
          <ul>
            <?php
			
			$sql_mon = "SELECT * FROM  playlist_schedule WHERE 	playlist_id='".$playlists_id."' and schedule_day='MON'";
			$mon_data = $this->db->query($sql_mon);
			
			if ($mon_data->num_rows() > 0) 
			{
			$playlist_mon = $mon_data->result_array();
			//print_r($playlist_mon);
			?>
			
			<li class="cd-schedule__event">
              <a data-start="<?php echo $playlist_mon[0]['from_time'] ?>" data-end="<?php echo $playlist_mon[0]['to_time'] ?>" data-content="event-abs-circuit" data-event="event-1" href="#0">
                <em class="cd-schedule__name"><?php echo $Playlist_title ?> Playlist</em>
              </a>
            </li>
			
			<?php
			}
			?>
			
			
			
			
			<!--	
            <li class="cd-schedule__event">
              <a data-start="11:00" data-end="12:30" data-content="event-rowing-workout" data-event="event-2" href="#0">
                <em class="cd-schedule__name">Rowing Workout</em>
              </a>
            </li>
  
            <li class="cd-schedule__event">
              <a data-start="14:00" data-end="15:15"  data-content="event-yoga-1" data-event="event-3" href="#0">
                <em class="cd-schedule__name">Yoga Level 1</em>
              </a>
            </li>
          -->
		  
		  
		  </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Tuesday</span></div>
  
          <ul>
           
			
			 <?php
			
			$sql_mon = "SELECT * FROM  playlist_schedule WHERE 	playlist_id='".$playlists_id."' and schedule_day='TUE'";
			$mon_data = $this->db->query($sql_mon);
			
			if ($mon_data->num_rows() > 0) 
			{
			$playlist_mon = $mon_data->result_array();
			//print_r($playlist_mon);
			?>
			
			<li class="cd-schedule__event">
              <a data-start="<?php echo $playlist_mon[0]['from_time'] ?>" data-end="<?php echo $playlist_mon[0]['to_time'] ?>" data-content="event-abs-circuit" data-event="event-2" href="#0">
                <em class="cd-schedule__name"><?php echo $Playlist_title ?> Playlist</em>
              </a>
            </li>
			
			<?php
			}
			?>
			
			
			
  
			<!--
			
			 <li class="cd-schedule__event">
              <a data-start="10:00" data-end="11:00"  data-content="event-rowing-workout" data-event="event-2" href="#0">
                <em class="cd-schedule__name">Rowing Workout</em>
              </a>
            </li>
			
            <li class="cd-schedule__event">
              <a data-start="11:30" data-end="13:00"  data-content="event-restorative-yoga" data-event="event-4" href="#0">
                <em class="cd-schedule__name">Restorative Yoga</em>
              </a>
            </li>
  
            <li class="cd-schedule__event">
              <a data-start="13:30" data-end="15:00" data-content="event-abs-circuit" data-event="event-1" href="#0">
                <em class="cd-schedule__name">Abs Circuit</em>
              </a>
            </li>
  
            <li class="cd-schedule__event">
              <a data-start="15:45" data-end="16:45"  data-content="event-yoga-1" data-event="event-3" href="#0">
                <em class="cd-schedule__name">Yoga Level 1</em>
              </a>
            </li>
			-->
			
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Wednesday</span></div>
  
          <ul>
            <?php
			
			$sql_mon = "SELECT * FROM  playlist_schedule WHERE 	playlist_id='".$playlists_id."' and schedule_day='WED'";
			$mon_data = $this->db->query($sql_mon);
			
			if ($mon_data->num_rows() > 0) 
			{
			$playlist_mon = $mon_data->result_array();
			//print_r($playlist_mon);
			?>
			
			<li class="cd-schedule__event">
              <a data-start="<?php echo $playlist_mon[0]['from_time'] ?>" data-end="<?php echo $playlist_mon[0]['to_time'] ?>" data-content="event-abs-circuit" data-event="event-3" href="#0">
                <em class="cd-schedule__name"><?php echo $Playlist_title ?> Playlist</em>
              </a>
            </li>
			
			<?php
			}
			?>

			<!--	
		   <li class="cd-schedule__event">
              <a data-start="09:00" data-end="10:15" data-content="event-restorative-yoga" data-event="event-4" href="#0">
                <em class="cd-schedule__name">Restorative Yoga</em>
              </a>
            </li>
  
            <li class="cd-schedule__event">
              <a data-start="10:45" data-end="11:45" data-content="event-yoga-1" data-event="event-3" href="#0">
                <em class="cd-schedule__name">Yoga Level 1</em>
              </a>
            </li>
  
            <li class="cd-schedule__event">
              <a data-start="12:00" data-end="13:45"  data-content="event-rowing-workout" data-event="event-2" href="#0">
                <em class="cd-schedule__name">Rowing Workout</em>
              </a>
            </li>
  
            <li class="cd-schedule__event">
              <a data-start="13:45" data-end="15:00" data-content="event-yoga-1" data-event="event-3" href="#0">
                <em class="cd-schedule__name">Yoga Level 1</em>
              </a>
            </li>
          -->
		  
		  
		  </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Thursday</span></div>
  
          <ul>
            
			 <?php
			
			$sql_mon = "SELECT * FROM  playlist_schedule WHERE 	playlist_id='".$playlists_id."' and schedule_day='THU'";
			$mon_data = $this->db->query($sql_mon);
			
			if ($mon_data->num_rows() > 0) 
			{
			$playlist_mon = $mon_data->result_array();
			//print_r($playlist_mon);
			?>
			
			<li class="cd-schedule__event">
              <a data-start="<?php echo $playlist_mon[0]['from_time'] ?>" data-end="<?php echo $playlist_mon[0]['to_time'] ?>" data-content="event-abs-circuit" data-event="event-4" href="#0">
                <em class="cd-schedule__name"><?php echo $Playlist_title ?> Playlist</em>
              </a>
            </li>
			
			<?php
			}
			?>
			
			
			<!--
			<li class="cd-schedule__event">
              <a data-start="09:30" data-end="10:30" data-content="event-abs-circuit" data-event="event-1" href="#0">
                <em class="cd-schedule__name">Abs Circuit</em>
              </a>
            </li>
  
            <li class="cd-schedule__event">
              <a data-start="12:00" data-end="13:45" data-content="event-restorative-yoga" data-event="event-4" href="#0">
                <em class="cd-schedule__name">Restorative Yoga</em>
              </a>
            </li>
  
            <li class="cd-schedule__event">
              <a data-start="15:30" data-end="16:30" data-content="event-abs-circuit" data-event="event-1" href="#0">
                <em class="cd-schedule__name">Abs Circuit</em>
              </a>
            </li>
  
            <li class="cd-schedule__event">
              <a data-start="17:00" data-end="18:30"  data-content="event-rowing-workout" data-event="event-2" href="#0">
                <em class="cd-schedule__name">Rowing Workout</em>
              </a>
            </li>
			-->
			
			
			
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Friday</span></div>
  
          <ul>
            
			 <?php
			
			$sql_mon = "SELECT * FROM  playlist_schedule WHERE 	playlist_id='".$playlists_id."' and schedule_day='FRI'";
			$mon_data = $this->db->query($sql_mon);
			
			if ($mon_data->num_rows() > 0) 
			{
			$playlist_mon = $mon_data->result_array();
			//print_r($playlist_mon);
			?>
			
			<li class="cd-schedule__event">
              <a data-start="<?php echo $playlist_mon[0]['from_time'] ?>" data-end="<?php echo $playlist_mon[0]['to_time'] ?>" data-content="event-abs-circuit" data-event="event-5" href="#0">
                <em class="cd-schedule__name"><?php echo $Playlist_title ?> Playlist</em>
              </a>
            </li>
			
			<?php
			}
			?>
			
			
			
			
			
			
			<!--
			<li class="cd-schedule__event">
              <a data-start="10:00" data-end="11:00"  data-content="event-rowing-workout" data-event="event-2" href="#0">
                <em class="cd-schedule__name">Rowing Workout</em>
              </a>
            </li>
  
            <li class="cd-schedule__event">
              <a data-start="12:30" data-end="14:00" data-content="event-abs-circuit" data-event="event-1" href="#0">
                <em class="cd-schedule__name">Abs Circuit</em>
              </a>
            </li>
  
            <li class="cd-schedule__event">
              <a data-start="15:45" data-end="16:45"  data-content="event-yoga-1" data-event="event-3" href="#0">
                <em class="cd-schedule__name">Yoga Level 1</em>
              </a>
            </li>
          -->
		  
		  
		  
		  </ul>
        </li>
		
		
		<li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Saturday</span></div>
  
          <ul>
            
			 <?php
			
			$sql_mon = "SELECT * FROM  playlist_schedule WHERE 	playlist_id='".$playlists_id."' and schedule_day='SAT'";
			$mon_data = $this->db->query($sql_mon);
			
			if ($mon_data->num_rows() > 0) 
			{
			$playlist_mon = $mon_data->result_array();
			//print_r($playlist_mon);
			?>
			
			<li class="cd-schedule__event">
              <a data-start="<?php echo $playlist_mon[0]['from_time'] ?>" data-end="<?php echo $playlist_mon[0]['to_time'] ?>" data-content="event-abs-circuit" data-event="event-5" href="#0">
                <em class="cd-schedule__name"><?php echo $Playlist_title ?> Playlist</em>
              </a>
            </li>
			
			<?php
			}
			?>
			
			
			
			
			
			
			<!--
			<li class="cd-schedule__event">
              <a data-start="10:00" data-end="11:00"  data-content="event-rowing-workout" data-event="event-2" href="#0">
                <em class="cd-schedule__name">Rowing Workout</em>
              </a>
            </li>
  
            <li class="cd-schedule__event">
              <a data-start="12:30" data-end="14:00" data-content="event-abs-circuit" data-event="event-1" href="#0">
                <em class="cd-schedule__name">Abs Circuit</em>
              </a>
            </li>
  
            <li class="cd-schedule__event">
              <a data-start="15:45" data-end="16:45"  data-content="event-yoga-1" data-event="event-3" href="#0">
                <em class="cd-schedule__name">Yoga Level 1</em>
              </a>
            </li>
          -->
		  
		  
		  
		  </ul>
        </li>
		
		
		
		
		
      </ul>
    </div>
  
    <div class="cd-schedule-modal">
      <header class="cd-schedule-modal__header">
        <div class="cd-schedule-modal__content">
          <span class="cd-schedule-modal__date"></span>
          <h3 class="cd-schedule-modal__name"></h3>
        </div>
  
        <div class="cd-schedule-modal__header-bg"></div>
      </header>
  
      <div class="cd-schedule-modal__body">
        <div class="cd-schedule-modal__event-info"></div>
        <div class="cd-schedule-modal__body-bg"></div>
      </div>
  
      <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
    </div>
  
    <div class="cd-schedule__cover-layer"></div>
  </div> <!-- .cd-schedule -->

  <script src="<?php echo base_url() ?>assets/schedule/assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="<?php echo base_url() ?>assets/schedule/assets/js/main.js"></script>
