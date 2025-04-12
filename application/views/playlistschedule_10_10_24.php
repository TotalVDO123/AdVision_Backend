

<?php

$this->load->view('./header_digital');
?>

<script>
.modal { 
   background-color: red !important; 
}

</script>

 <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/schedule/assets/css/schedule_style.css">
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

  <header class="cd-main-header text-center flex flex-column flex-center">
   

    <h1 class="text-xl" style="color:#FFF;" > <?php echo $schedule[0]['name'] ?>  Schedule</h1>
	
  </header>

	<?php /* ?>
		<div style="float:right; margin-right: 150px;" >
				<span style="float:right"><a href="<?php echo base_url()?>players/player/<?php echo $playerId ?>" target="_blank">
                <input class="btn btn-block btn-info btn-flat " type="button" name="Add New Time Slot" value="Add New Time Slot">
				</a></span>
				
		</div>
	<?php */ ?>	
		
			<div style="float:right; margin-right: 150px;" >
				<span style="float:right"><a href="javascript:void(0);">
                <input class="btn btn-block btn-info btn-flat openPopup " type="button" name="Add New Time Slot" value="Add New Time Slot">
				</a></span>
				
		</div>
&nbsp;
  <div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
    <div class="cd-schedule__timeline">
      <ul>
        
		
		<li><span>00:00</span></li>
        <li><span>02:00</span></li>
		<li><span>04:00</span></li>
		<li><span>06:30</span></li>
		
		<li><span>08:00</span></li>
		<li><span>10:00</span></li>
		<li><span>12:00</span></li>
		<li><span>14:00</span></li>
		<li><span>16:00</span></li>
		
		<li><span>18:00</span></li>
        
        <li><span>20:00</span></li>
        
        <li><span>22:00</span></li>
        
        <li><span>24:00</span></li>
		
      </ul>
    </div> <!-- .cd-schedule__timeline -->
  
    <div class="cd-schedule__events">
      <ul>
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Monday</span></div>
  
          <ul>
            <?php
			
			//$sql_mon = "SELECT * FROM  playlist_schedule WHERE 	playlist_id='".$playlists_id."' and schedule_day='MON'";
			$sql_mon = "SELECT PS.*,PL.name as playlist_name  FROM  playlist_schedule PS left join playlists PL on PS.playlist_id= PL.id WHERE 	PS.schedule_id='".$schedule_id."' and PS.schedule_day='MON'";
			$mon_data = $this->db->query($sql_mon);
			
			if ($mon_data->num_rows() > 0) 
			{
			$playlist_mon = $mon_data->result_array();
			//print_r($playlist_mon);
			
			foreach($playlist_mon as $row_mon)
			{
			
			//print_r($row_mon);
			
			
			
			?>
			
			<li class="cd-schedule__event">
              <a data-start="<?php echo $row_mon['from_time'] ?>" data-end="<?php echo $row_mon['to_time'] ?>" data-content="event-abs-circuit" data-event="event-1" href="#0">
                <em class="cd-schedule__name"><?php echo $row_mon['playlist_name'] ?> Playlist</em>
              </a>
            </li>
			
			<?php
			}
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
			
			//$sql_mon = "SELECT * FROM  playlist_schedule WHERE 	playlist_id='".$playlists_id."' and schedule_day='TUE'";
			
			
			$sql_mon ="SELECT PS.*,PL.name as playlist_name  FROM  playlist_schedule PS left join playlists PL on PS.playlist_id= PL.id WHERE 	PS.schedule_id='".$schedule_id."' and PS.schedule_day='TUE'";
			
			$mon_data = $this->db->query($sql_mon);
			
			if ($mon_data->num_rows() > 0) 
			{
			$playlist_tue = $mon_data->result_array();
			//print_r($playlist_mon);
			
			foreach($playlist_tue as $row_tue)
			{
			?>
			
			<li class="cd-schedule__event">
              <a data-start="<?php echo $row_tue['from_time'] ?>" data-end="<?php echo $row_tue['to_time'] ?>" data-content="event-abs-circuit" data-event="event-2" href="#0">
                <em class="cd-schedule__name"><?php echo $row_tue['playlist_name'] ?> Playlist</em>
              </a>
            </li>
			
			<?php
			}
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
			
			//$sql_mon = "SELECT * FROM  playlist_schedule WHERE 	playlist_id='".$playlists_id."' and schedule_day='WED'";
			
			$sql_mon="SELECT PS.*,PL.name as playlist_name  FROM  playlist_schedule PS left join playlists PL on PS.playlist_id= PL.id WHERE PS.schedule_id='".$schedule_id."' and PS.schedule_day='WED'";
			
			$mon_data = $this->db->query($sql_mon);
			
			if ($mon_data->num_rows() > 0) 
			{
			$playlist_wed = $mon_data->result_array();
			
			foreach($playlist_wed as $row_wed)
			{
			
			?>
			
			<li class="cd-schedule__event">
              <a data-start="<?php echo $row_wed['from_time'] ?>" data-end="<?php echo $row_wed['to_time'] ?>" data-content="event-abs-circuit" data-event="event-1" href="#0">
                <em class="cd-schedule__name"><?php echo $row_wed['playlist_name'] ?> Playlist</em>
              </a>
            </li>
			
			<?php
			}
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
			
			//$sql_mon = "SELECT * FROM  playlist_schedule WHERE 	playlist_id='".$playlists_id."' and schedule_day='THU'";
			
			
			$sql_mon ="SELECT PS.*,PL.name as playlist_name  FROM  playlist_schedule PS left join playlists PL on PS.playlist_id= PL.id WHERE PS.schedule_id='".$schedule_id."' and PS.schedule_day='THU'";
			
			$mon_data = $this->db->query($sql_mon);
			
			if ($mon_data->num_rows() > 0) 
			{
			$playlist_thu = $mon_data->result_array();
			foreach($playlist_thu as $row_thu)
			{
			?>
			
			<li class="cd-schedule__event">
              <a data-start="<?php echo $row_thu['from_time'] ?>" data-end="<?php echo $row_thu['to_time'] ?>" data-content="event-abs-circuit" data-event="event-1" href="#0">
                <em class="cd-schedule__name"><?php echo $row_thu['playlist_name'] ?> Playlist</em>
              </a>
            </li>
			
			<?php
			}
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
			
			//$sql_mon = "SELECT * FROM  playlist_schedule WHERE 	playlist_id='".$playlists_id."' and schedule_day='FRI'";
			
			$sql_mon ="SELECT PS.*,PL.name as playlist_name  FROM  playlist_schedule PS left join playlists PL on PS.playlist_id= PL.id WHERE 	PS.schedule_id='".$schedule_id."'  and PS.schedule_day='FRI'";
			
			$mon_data = $this->db->query($sql_mon);
			
			if ($mon_data->num_rows() > 0) 
			{
			$playlist_fri = $mon_data->result_array();
			foreach($playlist_fri as $row_fri)
			{
			?>
			
			<li class="cd-schedule__event">
              <a data-start="<?php echo $row_fri['from_time'] ?>" data-end="<?php echo $row_fri['to_time'] ?>" data-content="event-abs-circuit" data-event="event-1" href="#0">
                <em class="cd-schedule__name"><?php echo $row_fri['playlist_name'] ?> Playlist</em>
              </a>
            </li>
			
			<?php
			}
			}
			?>
			
			
			
			
			
		
		  
		  </ul>
        </li>
		
		
		<li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Saturday</span></div>
  
          <ul>
            
			 <?php
			
			//$sql_mon = "SELECT * FROM  playlist_schedule WHERE 	playlist_id='".$playlists_id."' and schedule_day='SAT'";
			
			$sql_mon ="SELECT PS.*,PL.name as playlist_name  FROM  playlist_schedule PS left join playlists PL on PS.playlist_id= PL.id WHERE 	PS.schedule_id='".$schedule_id."' and PS.schedule_day='SAT'";
			$mon_data = $this->db->query($sql_mon);
			
			if ($mon_data->num_rows() > 0) 
			{
			$playlist_sat = $mon_data->result_array();
			foreach($playlist_sat as $row_sat)
			{
			?>
			
			<li class="cd-schedule__event">
              <a data-start="<?php echo $row_sat['from_time'] ?>" data-end="<?php echo $row_sat['to_time'] ?>" data-content="event-abs-circuit" data-event="event-1" href="#0">
                <em class="cd-schedule__name"><?php echo $row_sat['playlist_name'] ?> Playlist</em>
              </a>
            </li>
			
			<?php
			}
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





		<!-- modal modal-lg -->
	
	<div class="modal fade" id="myModal" role="dialog" style="background-color:#b5acac75 !important;">
    <div class="modal-dialog modal-lg" role="document" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
        <!-- Modal content-->
        <section class="panel">
		<form method="post" action="<?php echo base_url();?>section/update" onsubmit="return validate()"  >
		<div class="modal-content"  style="background:#212529 !important;"  >
				<div class="row">
                <div class="col-sm-12" >
                  
                    <header class="panel-heading" style="background:#212529 !important;">
                      <div class="col-sm-10 text-center" id="section_txt" style="color:#FFF;" >
					<strong>  Add New Time Slot </strong>
					  </div>	
					<div class="w-75" >&nbsp;</div>		
                    </header>
                    
					
					
					
					<div class="modal-body" style="background:#212529 !important;" >
					
					
					<table class="table table-dark" id="add_tr" style="height:100%;" >
                      <thead>
                        <tr>
						<th colspan="7">
						Select the time and days you wish your content to display on
						</th>	
						</tr>
						</thead>
						
					<tbody >
						<tr>
						<th colspan="3">
						
						<input type="hidden" name="schedule_id" value="<?php echo $schedule_id ?>">
						
						
						<div class="form-group">
						<label for="exampleFormControlSelect1">Choose the content </label>
						<select class="form-control" id="exampleFormControlSelect1" name="playlist_id" >
						  
						  <?php
						  foreach($playlist as $row)
						  {
						  ?>
						  
						  <option value="<?php echo $row['id'] ?>" ><?php echo $row['name'] ?></option>
						  
						  <?php
						  }
						  ?>
						</select>
					  </div>
						
					</th>
					<th colspan="4"></th>	
					
					</tr>	
					
					<tr>
					<th colspan="2" >	From</th>	
					<th colspan="2" >	To</th>	
					<th colspan="5">
					</tr>
					
					<tr>
					<th colspan="2" >
					  <?php
                              $start=strtotime('00:00');
                              $end=strtotime('23:00');
                              ?>
                              
                              <select class="form-control" name="from_date"  id="from_time" >
                                 
                               <?php
                              for ($i=$start;$i<=$end;$i = $i + 60*60)
                                {
                                
                                ?>
                                
                                 
                                 <option value="<?php echo date('H:i',$i) ?>"> <?php echo date('H:i',$i) ?></option> 
                            <?php        
                                }
                               
                               ?>   
                                
                              </select>
		
					</th>	
					<th colspan="2" >
					  <?php
                              $start=strtotime('00:00');
                              $end=strtotime('23:00');
                              ?>
                              <select class="form-control" name="to_date" id="to_time">
                              
                               <?php
                          
                               for ($i=$start;$i<=$end;$i = $i + 60*60)
                                {
                              
                                ?>
                                    
                              
                                 <option value="<?php echo date('H:i',$i) ?>"> <?php echo date('H:i',$i) ?></option> 
                            <?php        
                                }
                               
                               ?>   
                                
                              </select>
					

					</th>	
					<th colspan="3">
					
					</tr>	
						
						
						
						
				
						
						
						
						
						<tr>
                          <th>All Day</th>
                        <th colspan="6">
						</tr>
						
                       <tr class="w-75">
                          <th >Days</th>
                        <th colspan="6">
						</tr>

						 <tr >
                          
						<th>
						<div>
							<input type="checkbox" id="scales" name="days[]" value="MON" />
							<label for="scales">MON</label>
						</div>
						</th>
                        
						<th>
						<div>
							<input type="checkbox" id="scales" name="days[]" value="TUE" />
							<label for="scales">TUE</label>
						</div>
						</th>
						
						<th>
						<div>
							<input type="checkbox" id="scales" name="days[]" value="WED" />
							<label for="scales">WED</label>
						</div>
						</th>

						<th>
						<div>
							<input type="checkbox" id="scales" name="days[]" value="THU" />
							<label for="scales">THU</label>
						</div>
						</th>


						<th>
						<div>
							<input type="checkbox" id="scales" name="days[]" value="FRI" />
							<label for="scales">FRI</label>
						</div>
						</th>
						
						<th>
						<div>
							<input type="checkbox" id="scales" name="days[]" value="SAT" />
							<label for="scales">SAT</label>
						</div>
						</th>
						
						<th>
						<div>
							<input type="checkbox" id="scales" name="days[]" value="SUN" />
							<label for="scales">SUN</label>
						</div>
						</th>

						
						
						</tr>
                     
                      </tbody>

                    </table>
					
					</div>
					
                  
                </div>
                
              </div>
			<!--
			<div class="row">
				<div class="col-sm-12"  style="margin: 10px 100px;" >
					<div class="form-group"  style="align-items: center" >
					  <textarea  class="form-control rounded-0" id="scroll_text" rows="3"></textarea>
					</div>
				</div>
			</div>
			<input type="hidden" id="playlist_id" value="">
			-->
			<div class="w-75" >&nbsp;</div>	
			<div class="modal-footer">
                <button type="submit" class="btn btn-default" url-data="<?php echo base_url();?>section/update" id="section_update11"  >Update</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
	</form>	
	</section>
    </div>
	
	
	<!-- modal -->
	
	


  <script src="<?php echo base_url() ?>assets/schedule/assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="<?php echo base_url() ?>assets/schedule/assets/js/main.js"></script>
  
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



<script>

function validate(){
    if ($('input[name^=days]:checked').length <= 0) {
        alert("Please select at least one day");
		return false;
    }
}


</script>

<script>
$(document).ready(function(){
    $('.openPopup').on('click',function(){
        	
			
			//alert('--------------');
			//$('#scroll_text').val(aa);	
            $('#myModal').modal({show:true});
            
            //$(".new_add").remove();
            
            
           
		});
            
            
   });   
   
</script>