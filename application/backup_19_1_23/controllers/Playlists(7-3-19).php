<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Comman.php');
class Playlists extends Comman {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	private $listUrl;
	public function __construct(){
		parent::__construct();
		$this->listUrl = "index.php/playlists/";			
	} 
	
	public function index(){
        $result['result'] = $this->playlists_model->getAll();
       load_view('Playlists/lists', $result);
	}
	public function add(){
		$reqData = $this->input->post();
		if($reqData){
			unset($reqData['save']);
			$result = $this->playlists_model->save($reqData);
			if($result ==1)
			{
				$message = "Playlist add successfully!.";
				$addClass = "alert-success";
				
			}else if($result == 2){
				$message = "Playlist id already exits!.";
				$addClass = "alert-danger";
			}else{
				$message = "Playlist addition failed!.";
				$addClass = "alert-danger";			
			}
			flash_message($addClass, $message);			
			redirect($this->listUrl.'index/'.$reqData['playerId']);

		}else{
			load_view('Playlists/add');
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
		$result = $this->playlists_model->update($reqData);
		if($result){
			$message = "Playlist update successfully!.";
			$addClass = "alert-success";
		}else{ 
			$message = "Playlist updation failed!";
			$addClass = "alert-danger";
		}
		flash_message($addClass, $message);
		redirect($this->listUrl);	
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
	  //print_r($_REQUEST);	
		
		$screen_id=$this->input->post('screen_id');
		$duration=$this->input->post('duration');
		$image_display_type=$this->input->post('image_display_type');
		$playlist_id=$this->input->post('playlist_id');
		
		
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
		
		redirect('index.php/playlists/single/'.$playlist_id);
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
	
	
	
	
}