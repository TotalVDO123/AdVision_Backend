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
       load_view('Playlists/lists', $result);
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
		$data['result']=$this->playlists_model->getGallery($id);
		$data['playlist_gallery']=$this->playlists_model->GetPlaylistGallery($id);
		
		if($data){
			load_view('Playlists/update', $data);
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
		$player_id=$this->players_model->GetPlayerID($playlist_id);
		//$this->players_model->player_reaccess_flag($player_id);
		echo $this->playlists_model->DeletePlaylistImage($screen_id,$playlist_id);
		 
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
		load_view('Playlists/edit_playlist',$data);
		
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
	
	
}