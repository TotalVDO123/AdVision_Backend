<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Comman.php');
class Playlists extends Comman {
	
	private $listUrl;
	public function __construct(){
		parent::__construct();
		$this->listUrl = "playlists/";			
	} 
	
	public function index(){
       $result['playlists'] = $this->playlists_model->getAll();
	   
	 	   
       //load_view('Playlists/lists', $result);
	   //load_view_userpart('Playlists/lists', $result);
	   
	   load_digitalview('Playlists/lists', $result);
	   
	   
	}
	public function add(){
		$reqData = $this->input->post();
		if($reqData){
			//unset($reqData['save']);
			$reqData['created_at']=date('Y-m-d');
			
			$result = $this->playlists_model->save($reqData);
			
			if($result >0)
			{
				echo $message = $result."XXXXPlaylist add successfully!.";
			}
			else
			{
				echo $message = $result."XXXXPlaylist addition failed!.";
			}

		}else{
			//load_view('Playlists/add');
			
		}
	}
	public function single(){   
		$id = $this->uri->segment(3); 
		
		$data['playlist_id']=$id;
		
	$data['row_playlist']='';
	$sql = "SELECT PL.name as playlist_name,U.company_name FROM  playlists PL left join players P on PL.playerId=P.id 
		left join users U on P.user_id=U.id
		WHERE PL.id = '".$id."' group by PL.id  ";
        $res = $this->db->query($sql);
        if ($res->num_rows() > 0) 
		{
           $data['row_playlist'] = $res->result_array();
        }
		
		
		$data['result']=$this->playlists_model->getGallery($id);
		
	
		
		$data['playlist_gallery']=$this->playlists_model->GetPlaylistGallery($id);
		
		if($data){
			//load_view('Playlists/update_5_12_23', $data);
			
			//load_view_userpart('Playlists/update', $data);
			
			load_digitalview('Playlists/update', $data);
			
		}else{ 
			$message = "Data not found!.";
			$addClass = 'alert-danger';
			flash_message($addClass, $message);
			redirect($this->listUrl);	
		}
    }
    
	
	public function update(){
		$reqData =$this->input->post();
		unset($reqData['update']);	
		$playerId=$reqData['playerId'];
		unset($reqData['playerId']);	
		$this->players_model->player_reaccess_flag($playerId);
		$result = $this->playlists_model->update($reqData);
		if($result){
			$message = "Playlist update successfully!.";
			$addClass = "alert-success";
		}else{ 
			$message = "Playlist updation failed!";
			$addClass = "alert-danger";
		}
		flash_message($addClass, $message);
		//redirect($this->listUrl);	
		redirect('playlists/index/'.$playerId);	
	}
	
    public function delete(){
		$id = $this->uri->segment(3); 
		$result = $this->players_model->delete($id);
		if($result){
			$message = "Playlist delete successfully!.";
			$addClass = "alert-success";
		}else{ 
			$message = "Playlist deletion failed!";
			$addClass = "alert-danger";
		}
		flash_message($addClass, $message);
		redirect($this->listUrl);	
    }

	
	public function	add_image()
	{
		$screen_id=$this->input->post('screen_id');
		$playlist_id=$this->input->post('playlist_id');
		
		$player_id=$this->players_model->GetPlayerID($playlist_id);
		$this->players_model->player_reaccess_flag($player_id);
		
		$data=array(
		"screen_id"=>$screen_id,
		"playlist_id"=>$playlist_id
		);
		$result = $this->playlists_model->add_playlist_gallery($data);
		echo $result;
	}
	
	
	public function del_playlist_image()
	{
		$screen_id=$this->input->post('screen_id');
		$playlist_id=$this->input->post('playlist_id');
		//$player_id=$this->players_model->GetPlayerID($playlist_id);
		//$this->players_model->player_reaccess_flag($player_id);
		echo $this->playlists_model->DeletePlaylistImage($screen_id,$playlist_id);
		
		//echo $this->db->last_query();
		
		 
		/*
		if($result){
			$message = "Playlist delete successfully!.";
			$addClass = "alert-success";
		}else{ 
			$message = "Playlist deletion failed!";
			$addClass = "alert-danger";
		}
		*/
		
	}
	
	
	public function save_playlist()
	{
		$screen_id=$this->input->post('screen_id');
		$duration=$this->input->post('duration');
		$image_display_type=$this->input->post('image_display_type');
		$playlist_id=$this->input->post('playlist_id');
		
		$player_id=$this->players_model->GetPlayerID($playlist_id);
		$this->players_model->player_reaccess_flag($player_id);
				
		$this->db->where('playlist_id', $playlist_id);
        $run=$this->db->delete('playlist_gallery');
		$ii=0;
		foreach($screen_id as $row)
		{
			$data=array(
			"screen_id"=>$row,
			"playlist_id"=>$playlist_id,
			"duration"=>$duration[$ii],
			"image_display_type"=>$image_display_type[$ii]	
			);
		$result = $this->playlists_model->add_playlist_gallery($data);	
		
		$ii++;
		}
		
		redirect('playlists/single/'.$playlist_id);
		/*
		$data=array(
		"screen_id"=>$screen_id,
		"playlist_id"=>$playlist_id
		);
		$result = $this->playlists_model->add_playlist_gallery($data);
		*/
		
	
	}
	
	
	
	public function add_scrolltext()
	{   
		$playlist_id=$this->uri->segment(3);
		$sql="select scrolling_text from playlists where id='".$playlist_id."'";
		$query = $this->db->query($sql);
		$result=$query->result_array();
		echo $result[0]['scrolling_text'];
	}
	
	public function update_scrollText()
	{   
		$playlist_id=$this->input->post('playlist_id');
		$scroll_text=$this->input->post('scroll_text');
		
		$player_id=$this->players_model->GetPlayerID($playlist_id);
		$this->players_model->player_reaccess_flag($player_id);
		$data=array(
		"scrolling_text"=>$scroll_text
		);
		$this->db->where('id', $playlist_id);
		echo $this->db->update('playlists', $data);
		
		//$playlist_id=$this->uri->segment(3);
		//$sql="select scrolling_text from playlists where id='".$playlist_id."'";
		//$query = $this->db->query($sql);
		//$result=$query->result_array();
		//echo $result[0]['scrolling_text'];
	}
	
	
	
	public function edit_playlist()
	{   
		$playlist_id=$this->uri->segment(3);
		$sql="select * from playlists where id='".$playlist_id."'";
		$query = $this->db->query($sql);
		$data['playlist']=$query->result_array();
		//load_view('Playlists/edit_playlist',$data);
		
		
		load_view_userpart('Playlists/edit_playlist',$data);
		
		//echo $result[0]['scrolling_text'];
	}
	
/*
	public function view_screen()
	{   
		$data['result']=$this->playlists_model->getGallery();
		load_view('Playlists/view_screen', $data);
    }
*/	
	
	// DELETE A live
	
	
	function playlist_delete($playlist_id = '')
	{
		//echo $playlist_id;
		//$sql="select playerId from playlists where id='".$playlist_id."'";
		//$query = $this->db->query($sql);
		//$result=$query->result_array();
		//$id= $result[0]['playerId'];
		//echo $id;
		$this->db->delete('playlists',  array('id' => $playlist_id));
		//redirect(base_url().'index.php?Playlists/index/' , 'refresh');
		redirect('Playlists');
	}
	
	// DELETE A live
	
	function playlistEdit_delete($id = '',$playlist_id = '' )
	{
		//echo $id;
		//echo $playlist_id;
		
		//$sql="select playerId from playlists where id='".$playlist_id."'";
		//$query = $this->db->query($sql);
		//$result=$query->result_array();
		//$id= $result[0]['playerId'];
		//echo $id;
		$this->db->delete('screens',  array('id' => $id));
		//redirect(base_url().'index.php?Playlists/index/' , 'refresh');
		redirect('Playlists/single/'.$playlist_id);
	}
	
	// DELETE A live
	function viewscreen_delete($playlist_id = '')
	{
		echo $playlist_id;
		//$sql="select playerId from playlists where id='".$playlist_id."'";
		//$query = $this->db->query($sql);
		//$result=$query->result_array();
		//$id= $result[0]['playerId'];
		//echo $id;
		$this->db->delete('screens',  array('id' => $playlist_id));
		//redirect(base_url().'index.php?Playlists/index/' , 'refresh');
		redirect('Playlists/view_screen/');
	}
	
	function ajax_gallery_image_update_sno()
    {
       $position=$this->input->post('position');
       
       //print_r($position);
        
        
        $i=1;

        foreach($position as $k=>$v){
            $data=array(
                'sno'=>$i
                );
            
            $this->db->update('playlist_gallery', $data,  array('id' => $v));
           
           
            //$this->db->where('id', 'some_id');
           // $this->db->update('login_table', $data);
            
            echo $this->db->last_query();
            $i++;
        }



        
        
        //print_r($position);
        
        //$this->db->update('user', array('password'=>$new_password_encrypted), array('user_id'=>$user_id));
    }
    
    function update_duration()
    {
        
        //echo "=======================";
        
        $nvalue=$this->input->post('nvalue');
        $screen_id=$this->input->post('screen_id');
        $playlist_id=$this->input->post('playlist_id');
        
         $data=array(
                'duration'=>$nvalue
                );
            
            $this->db->update('playlist_gallery', $data,  array('screen_id' =>  $screen_id,'playlist_id'=>$playlist_id));
            
            echo $this->db->last_query();
            //echo $this->db->affected_rows();
           
    }
	
	
	function playlistschedule_old($playlists_id)
	{
		
		$sql = "SELECT * FROM  playlists WHERE 	id='".$playlists_id."'";
			$resdata = $this->db->query($sql);
			$data['Playlist_title']="";
			$data['playerId']="";	
			if ($resdata->num_rows() > 0) 
			{
			$playlist = $resdata->result_array();
			$data['Playlist_title']=$playlist[0]['name'];
			$data['playerId']=$playlist[0]['playerId'];	
							
			}
			
		
		$data['title']="Playlist Schedule";
		$data['playlists_id']=$playlists_id;
		//$this->load->view('playlistschedule',$data);
		
		load_digitalview('playlistschedule', $data);
	}
	
	
	function playlistschedule($schedule_id=0)
	{
		
		error_reporting(E_ALL);
ini_set('display_errors', '1');
		$sql = "SELECT * FROM  playlists WHERE 1 order by name ";
			$resdata = $this->db->query($sql);
			//$data['Playlist_title']="";
			//$data['playerId']="";	
			$data['playlist']="";
			if ($resdata->num_rows() > 0) 
			{
			$data['playlist'] = $resdata->result_array();
			
							
			}
			
	$sqls = "SELECT * FROM  schedule WHERE 1 and id='".$schedule_id."'";
			$res = $this->db->query($sqls);
			//$data['Playlist_title']="";
			//$data['playerId']="";	
			$data['schedule']="";
			if ($res->num_rows() > 0) 
			{
			$data['schedule'] = $res->result_array();
							
			}
		$data['schedule_id']=$schedule_id;
		//$this->load->view('playlistschedule',$data);
		
		load_digitalview('playlistschedule', $data);
	}
	
	
	
	
	function playlistgallery()
	{	
		
		
			if($this->session->userdata('user_type')==1)
			{	
			$sql = "SELECT * FROM  screens WHERE 1	";
			$resdata = $this->db->query($sql);
			}
			else
			{
				$sql = "SELECT * FROM  screens WHERE 1	and user_id='".$this->session->userdata('user_id')."'";
			$resdata = $this->db->query($sql);
				
			}
			
			if ($resdata->num_rows() > 0) 
			{
				$playlist = $resdata->result_array();
			}
			$data['gallery']=$playlist;
		
		//print_r($data['gallery']);
		//echo "==================";
		
		//exit;
		
		load_digitalview('Playlists/gallery', $data);
		//load_digitalview('playlistschedule', $data);
	}
	
	function schedules_old()
	{
		
		 $result['playlists'] = $this->playlists_model->getAll();
	   
	 	   
       //load_view('Playlists/lists', $result);
	   //load_view_userpart('Playlists/lists', $result);
	   
	   load_digitalview('Playlists/lists_schedules', $result);
		
		
		
	}
	
	
	
	function schedules()
	{
		
		 //$result['playlists'] = $this->playlists_model->getAll();
	   
	   
			$sql = "SELECT * FROM  schedule WHERE 1 order by id desc	";
			$resdata = $this->db->query($sql);
			$result['schedule']="";
			if ($resdata->num_rows() > 0) 
			{
				$result['schedules'] = $resdata->result_array();
			}
	   
	   
	   
	   
	 	    ///$result['playlists']=$this->Playlists_model->get_playlist_by_player($player_id);
	   ////$result['sections']=$this->section_model->get_section($player_id);
       //load_view('Playlists/lists', $result);
	   //load_view_userpart('Playlists/lists', $result);
	   
	   load_digitalview('Playlists/lists_schedules', $result);
		
		
		
	}
	
	function addschedule()
	{
		
		$reqData =$this->input->post();
		//print_r($reqData);
		//exit;
		if($reqData)
		{
			$data=array(
				'user_id'=>$this->session->userdata('user_id'),
				'name'=>$reqData['schedules_name'],
				'created_date'=>date('Y-m-d')
			);
			 
		
			 
			 $this->db->insert('schedule', $data);
			redirect('Playlists/schedules');
			
		}	
		
		
		load_digitalview('Playlists/add_schedules', $result);
	}
	
	function editschedule($schedule_id=0)
	{
		
			$sql = "SELECT * FROM  schedule WHERE 1 and  id='".$schedule_id."'";
			$resdata = $this->db->query($sql);
			$result['schedule']="";
			if ($resdata->num_rows() > 0) 
			{
				$result['schedules'] = $resdata->result_array();
			}
	   
		
		
		$reqData =$this->input->post();
		if($reqData)
		{
			$data=array(
				'name'=>$reqData['schedules_name'],
			);
			 
			  $this->db->update('schedule', $data,  array('id' =>  $reqData['schedules_id']));
			 
			 //$this->db->insert('schedule', $data);
			redirect('Playlists/editschedule/'.$reqData['schedules_id']);
			
		}	
		
		
		load_digitalview('Playlists/edit_schedules', $result);
	}
	
	function deleteschedule($id=0)
	{
		$this->db->delete('schedule',  array('id' => $id));
		
		redirect('Playlists/schedules');
	
	}
	
	function deleteschedule_calender($id=0,$schedule_id=0)
	{
		 $this->db->delete('playlist_schedule',  array('id' => $id));
		 echo $schedule_id;
		///redirect('Playlists/schedules');
	
	}
	
	
	
	
}