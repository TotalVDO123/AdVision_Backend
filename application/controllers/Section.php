<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Comman.php');

class Section extends Comman {
    private $listUrl;
    function __construct() {
        parent::__construct();
		 $this->load->model('Section_model');
		$this->listUrl = "index.php/section/";
    }

	public function index()
    {	
		$data['players']=$this->players_model->getAll($this->session->userdata('user_id'));
		$player_id=$this->uri->segment(3);
		
		if(!empty($player_id))
		{	
		$data['sections']= $this->Section_model->get_section($player_id);
		//echo "=====".$this->db->last_query();
		//print_r($data['sections']);
		
		}
		//print_r($data['section_data']);
		//$this->load->view('auth/includes/header', $data);
		//$this->load->view('auth/includes/navbar');
		//$this->load->view('admin/screen_section_list');
		//$this->load->view('auth/includes/footer');
		load_view('section/lists', $data);
	}	
	
	
	
	public function Add_All_Section(){
		$reqData = $this->input->post();
		
		//print_r($reqData);
		//exit;
		if($reqData){
			
			
			
	
				
			
			
		
		//$multi_playlist_id= implode(',', $reqData['playlist_id']);
		//$this->players_model->player_reaccess_flag($reqData['player_id']);
		
		for($ii=0;$ii<4;$ii++)
		{
			$tmpsts="status".($ii);
			$tmp_status= @intval( $reqData[$tmpsts]);	
		
			$data=array(
			'H_size'=>$reqData['H_size'][$ii],		
			'V_size'=>$reqData['V_size'][$ii],
			'status'=>$tmp_status,
			'sno'=>$reqData['sno'][$ii],
			'player_id'=>$reqData['player_id'],
			'scrolling_text'=>trim($reqData['scrolling_text']),
			'created_at'=>date('Y-m-d')
			);
			$result = $this->Section_model->save($data);
		}
		
			if($result ==1)
			{
				$message = "Section add successfully!.";
				$addClass = "alert-success";
				
			}else if($result == 2){
				$message = "Section name already exits!.";
				$addClass = "alert-danger";
			}else{
				$message = "Section addition failed!.";
				$addClass = "alert-danger";			
			}
			flash_message($addClass, $message);			
			//redirect($this->listUrl."/index/".$reqData['player_id']);
			redirect(base_url().'index.php/players/player/'.$reqData['player_id']);
			
			
		}else{
			$player_id=$this->uri->segment(3);
			$data['result'] = $this->playlists_model->getAll($player_id);
			$data['player_id']=$player_id;
			load_view('section/add',$data);
		}
	}
	
	
	public function single(){   
		$player_id = $this->uri->segment(3); 
		$data['result'] = $this->playlists_model->getAll($player_id);
		//$data['players']=$this->players_model->getAll($this->session->userdata('user_id'));
		$section_id = $this->uri->segment(4); 
		$data['section_detaile']=$this->Section_model->single($section_id);
		$data['section_id']=$section_id;
		//$data['user_id']=$this->session->userdata('user_id'); 
		if($data){
			load_view('section/update', $data);
		}else{ 
			$message = "Data not found!.";
			$addClass = 'alert-danger';
			flash_message($addClass, $message);
			redirect($this->listUrl);	
		}
    }
    public function update()
	{
		$reqData =$this->input->post();
			$status=0;
		if($reqData['status']=='true')
		{
			$status=1;	
			
		}	
		
		foreach($reqData['days'] as $day_row )
		{
			///print_r($day_row);
			//$this->db->delete('playlist_schedule',array('section_id'=>$reqData['section_id'],'schedule_day'=>$day_row,'	playlist_id'=>$reqData['playlist_id'],'player_id'=>$reqData['player_id'],'section_id'=>$reqData['section_id'] ));

		
		$data=array(
		'from_time'=>$reqData['from_date'],
		'to_time'=>$reqData['to_date'],
		'playlist_id'=>$reqData['playlist_id'],
		'section_id'=>0,
		'schedule_day'=>$day_row,
		'player_id'=>0,
		'schedule_id'=>$reqData['schedule_id']
		                                        
		);
		
		
		//print_r($data);
		
		 $this->db->insert('playlist_schedule',$data);

			
			
			
			
		
		}
		/*
		$data=array(
		'from_date'=>date("H:i", strtotime($reqData['from_date'])),
		'to_date'=>date("H:i", strtotime($reqData['to_date'])),
		'playlist_id'=>$reqData['playlist_id'],
		'status'=>$status
		);
		
		*/
		
		//$this->db->delete('playlist_schedule',array('section_id'=>$reqData['section_id'],'schedule_day'=>$reqData['day_name'],'	playlist_id'=>$reqData['playlist_id']));

		/*
		$data=array(
		'from_time'=>$reqData['from_date'],
		'to_time'=>$reqData['to_date'],
		'playlist_id'=>$reqData['playlist_id'],
		'section_id'=>$reqData['section_id'],
		'schedule_day'=>$reqData['day_name'],
		'player_id'=>$reqData['player_id'],
		                                        
		);
		
		 echo $this->db->insert('playlist_schedule',$data);
		*/
		
		
		//redirect ('players/player_schedules/'.$reqData['player_id']);
		
		redirect ('Playlists/playlistschedule/'.$reqData['schedule_id']);
		//Playlists/playlistschedule/'.$reqData['schedule_id']
		
		 //load_digitalview('players/player_schedules/'.$reqData['player_id'], $result);
		http://localhost/addvision//players/player_schedules/28
		
		//echo $this->db->last_query();
		
		//echo $result = $this->Section_model->update($data,$reqData['section_id']);
		//if($result){
		//	$message = "Section update successfully!.";
		//	$addClass = "alert-success";
		//}else{ 
		//	$message = "Section updation failed!";
		//	$addClass = "alert-danger";
		//}
		//flash_message($addClass, $message);
		//$playerId=$this->input->post('playerId');
		//redirect($this->listUrl);	
	}

	public function ajax_check_schedule()
	{
		$reqData =$this->input->post();
		
		//$reqData['dayname']
		//$reqData['from_time']
		//$reqData['to_time']
		//$reqData['playlist_id']
		//$reqData['schedule_id']
		
		
		
		
		
		
		//$sql_mon ="SELECT PS.*,PL.name as playlist_name  FROM  playlist_schedule PS left join playlists PL on PS.playlist_id= PL.id WHERE 	PS.schedule_id='".$schedule_id."' and PS.schedule_day='TUE'";
		

		//$sql_mon ="SELECT *  FROM  playlist_schedule  WHERE  date_field BETWEEN '2010-01-30 14:15:55' AND '2010-09-29 10:15:55' 	";
		
			$sql_mon ="SELECT *  FROM  playlist_schedule  WHERE  playlist_id='".$reqData['playlist_id'] ."' and  schedule_id='".$reqData['schedule_id']."' and  schedule_day='".$reqData['dayname']."'";
			$mon_data = $this->db->query($sql_mon);
			if ($mon_data->num_rows() > 0) 
			{
			 echo '2XXX'.$reqData['daydata_id'];  //playlist exist
			 exit;
			
			}
			
			$fromdate=date("H:i:s", strtotime($reqData['from_time']));
			
			$todate=date("H:i:s", strtotime($reqData['to_time']));
			
			//$sql_mon ="SELECT *  FROM  playlist_schedule  WHERE  ((from_time BETWEEN '".$fromdate."' AND '".$todate."' ) or (to_time BETWEEN '".$fromdate."' AND '".$todate."' )) and  schedule_id='".$reqData['schedule_id']."' and  schedule_day='".$reqData['dayname']."'";
			
			$sql_mon ="SELECT *  FROM  playlist_schedule  WHERE  ((from_time < '".$fromdate."' AND from_time >'".$todate."' ) or (to_time > '".$fromdate."' AND to_time<'".$todate."' )) and  schedule_id='".$reqData['schedule_id']."' and  schedule_day='".$reqData['dayname']."'";
			
				$mon_data = $this->db->query($sql_mon);
			if ($mon_data->num_rows() > 0) 
			{
			 echo '3XXX'.$reqData['daydata_id'];  //gg
			 exit;
			}
			
			//echo $sql_mon ="SELECT *  FROM  playlist_schedule  WHERE  ((from_time <='".$fromdate."' AND from_time >= '".$todate."' ) or (to_time >='".$fromdate."' AND to_time <= '".$todate."')) and  schedule_id='".$reqData['schedule_id']."' and  schedule_day='".$reqData['dayname']."'";

            //echo $sql_mon ="SELECT *  FROM  playlist_schedule  WHERE ((from_time >='".$fromdate."' OR from_time <= '".$todate."' ) OR (to_time >='".$fromdate."' OR  to_time <= '".$todate."'))  and  schedule_id='".$reqData['schedule_id']."' and  schedule_day='".$reqData['dayname']."'";
			
			
			//echo $sql_mon ="SELECT *  FROM  playlist_schedule  WHERE  from_time BETWEEN '".$fromdate."' AND '".$todate."' and  schedule_id='".$reqData['schedule_id']."' and  schedule_day='".$reqData['dayname']."'";
			
			
			$sql_mon ="SELECT *  FROM  playlist_schedule  WHERE ((from_time <= '".$fromdate."' AND to_time >= '".$todate."' ) )  and  schedule_id='".$reqData['schedule_id']."' and  schedule_day='".$reqData['dayname']."'";
			$mon_data = $this->db->query($sql_mon);
			if ($mon_data->num_rows() > 0) 
			{
			 echo '3XXX'.$reqData['daydata_id'];  //gg
			}

	}
	

	
    public function get_playlist_schedule()
	{	
	    $reqData =$this->input->post();
	    
	    $sql="Select * from playlist_schedule  where playlist_id='".$reqData['playlist_id']."' and section_id ='".$reqData['section_id']."'";    
        
        $query = $this->db->query($sql);
        $record= $query->result_array();
	    $str_table='';
	    foreach($record as $row)
	    {
	        $str_table.='<tr class="new_add">';
	        $str_table.='<td>' .$row['schedule_day']. '</td>';
	        $str_table.='<td>' .$row['from_time']. '</td>';
	        $str_table.='<td>&nbsp;</td>';
	        $str_table.='<td>' .$row['to_time']. '</td>';
	        $str_table.='</tr>';
	        
	    }
	    
	    echo $str_table;
	    
	    
	}
	public function update_section()
	{
		$reqData =$this->input->post();
		//print_r($reqData);
		//exit;
		
			if(empty($reqData['H_size'][0]) and empty($reqData['V_size'][0]) )
			{	
			if(empty($reqData['H_size'][1]) and empty($reqData['V_size'][1]) )
			{
			if(empty($reqData['H_size'][2]) and empty($reqData['V_size'][2]) )
			{
			if(empty($reqData['H_size'][3]) and empty($reqData['V_size'][3]) )
			{
			$message = "Please select at least one section dimension to upload";
			$addClass = "alert-danger";
		
			flash_message($addClass, $message);
			redirect(base_url().'players/player/'.$reqData['player_id']);	
			}}}}
		
		
		for($ii=0;$ii<4;$ii++)
		{
		$tmpsts="status".($ii);
			$tmp_status= @intval( $reqData[$tmpsts]);	
		
			$data=array(
			'H_size'=>$reqData['H_size'][$ii],		
			'V_size'=>$reqData['V_size'][$ii],
			'scrolling_text'=>trim($reqData['scrolling_text']),
			'show_scrolling'=>$reqData['showscrollingtext'],
			'show_rss'=>$reqData['showrssfeeds'],
			
			'rss_feeds'=>$reqData['rss_feeds'],
			'status'=>$tmp_status
			);
		
		$result = $this->Section_model->update($data,$reqData['section_id'][$ii]);
		$this->players_model->player_reaccess_flag($reqData['player_id']);	
		//echo $this->db->last_query();
		}
		//exit;
		if($result){
			$message = "Section update successfully!.";
			$addClass = "alert-success";
		}else{ 
			$message = "Section updation failed!";
			$addClass = "alert-danger";
		}
		flash_message($addClass, $message);
		//$playerId=$this->input->post('playerId');
		//redirect($this->listUrl);
		redirect(base_url().'players/player/'.$reqData['player_id']);

	}
	
	
	
  
	// DELETE A live
	function section_delete($player_id = '')
	{

	
		$sql="select player_id from section where id='".$player_id."'";
		$query = $this->db->query($sql);
		$result=$query->result_array();
		$id= $result[0]['player_id'];
		
		$this->db->delete('section',  array('id' => $player_id));
		redirect('index.php/section/index/'.$id);
	}
	
	
	public function model_get_Section_detaile()
	{   
		$section_id=$this->uri->segment(3);
		$sql="select id,from_date,to_date,playlist_id,status,sno from section where id='".$section_id."'";
		$query = $this->db->query($sql);
		$result=$query->result_array();
		$array_section=array();
		foreach($result as $row)
		{
		$player_id=$row['id'];	
		$from_date=$row['from_date'];		
		$to_date=$row['to_date'];		
		$playlist_id=$row['playlist_id'];
		$status=$row['status'];	
		$sno=$row['sno'];		
		}
		//print_r($array_section);
		echo $player_id."XXXX".date('g:i A', strtotime($from_date))."XXXX".date('g:i A', strtotime($to_date))."XXXX".$playlist_id."XXXX".$status."XXXX".$section_id."XXXX"."Section ".$sno;
	}
	
	
	
	
	
	
/*
	public function add()
	{
		//if ( empty($this->session->userdata('logged_in'))) {
         //   redirect(base_url('auth'));
         //   exit;
        //}
		$data['gallery_data'] = $this->Gallery_model->get_gallery();        
		//echo $this->db->last_query();
		//exit;
		$this->load->view('auth/includes/header',$data);
        $this->load->view('auth/includes/navbar');
        $this->load->view('admin/add_screen_section');
        $this->load->view('auth/includes/footer');	
	}

	public function save_section()
	{
	/////////////End of upload video/////////////////////////////////
		$schedule=$this->input->post('schedule');
		$schedule_count = $this->Section_model->chk_schedule($schedule);	
		if($schedule_count>=4)
		{
			$_SESSION['Error']=$schedule." Schedule already exists 4 times ";
			redirect('section');
			
		}	
		
		

		
			$tmp_gallery= implode(',',$this->input->post('gallery_id'));
			$data = array(
				'on_off'=> $this->input->post('on_off'),	
				'H_size'=>$this->input->post('h_size'),
				'V_size'=>$this->input->post('v_size'),
				'gallery_id'=>$tmp_gallery,
				'schedule'=>$this->input->post('schedule'),	
				'user_id'=>$this->session->userdata['logged_in']['users_id']
			);
		$data['notif'] = $this->Section_model->save_section($data);
		redirect('section');
	}
	
	public function edit()
	{
		//if ( empty($this->session->userdata('logged_in'))) {
         //   redirect(base_url('auth'));
         //   exit;
        //}
		$id= $page = $this->uri->segment(3);
		$data['section_details']=$this->Section_model->get_sectiondetails($id);
		$data['gallery_data'] = $this->Gallery_model->get_gallery(); 
		
		$this->load->view('auth/includes/header',$data);
        $this->load->view('auth/includes/navbar');
        $this->load->view('admin/add_screen_section');
        $this->load->view('auth/includes/footer');	
	}
	
	public function update_section()
    {
		$id=$this->input->post('section_id');
		$tmp_gallery= implode(',',$this->input->post('gallery_id'));
		$data = array(
		'on_off'=>$this->input->post('on_off'),
		'H_size'=>$this->input->post('h_size'),
		'V_size'=>$this->input->post('v_size'),
		'schedule'=>$this->input->post('schedule'),
		'gallery_id'=>$tmp_gallery
			);
		$data['notif'] = $this->Section_model->save_section($data,$id);
		redirect('section');
		
	}

	
	public function delete()
    {
		$id = $this->uri->segment(3);
		$this->Section_model->delete_section($id);
        redirect('section/');
    }
 
*/
 
}
