<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Comman.php');
class Screens extends Comman {

	
	private $listUrl;
	public function __construct(){
		parent::__construct();	
		$this->listUrl = "index.php/screens/";	
	} 
	
	public function index()
	{
		$data['result']=$this->playlists_model->getGallery();
		load_view('screens/view_screen', $data);
    }
    public function add(){
		$reqData = $this->input->post();
		
       
		
		if($reqData){
			
			
			
			if(!empty($_FILES['file_upload']['name'])){
				
				$field_name = 'file_upload';
				$upload_location = 'uploads/';
				$fileName = upload_image($upload_location,$field_name, $_FILES,$this->listUrl);
				$reqData['file_upload'] = $fileName;
				unset($reqData['file_url']);
				
			}
			else
			{
				$reqData['file_upload'] = $reqData['file_url'];
				unset($reqData['file_url']);
			}
			
			
			// print_r($reqData);
			//exit;
			unset($reqData['save']);
			$result = $this->screens_model->save($reqData);
			if($result === true)
			{
				$message = "Screen add successfully!.";
				$addClass = "alert-success";
				
			}else{
				$message = "Screen addition failed!.";
				$addClass = "alert-danger";			
			}
			flash_message($addClass, $message);			
			redirect($this->listUrl.'add');

		}else{
			load_view('Screens/add');
		}
    }
	
	
	function delete_screen_image()
	{
		$screen_id = $this->input->post('screen_id');
		$this->db->delete('screens',  array('id' => $screen_id));
		echo $screen_id ;
		
		//echo $playlist_id;
		//$sql="select playerId from playlists where id='".$playlist_id."'";
		//$query = $this->db->query($sql);
		//$result=$query->result_array();
		//$id= $result[0]['playerId'];
		//echo $id;
		
		//redirect(base_url().'index.php?Playlists/index/' , 'refresh');
		//redirect('index.php/Playlists/index/'.$id);
	}
	
	
	
	
}