<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Comman.php');
class Players extends Comman {

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
		$this->listUrl = "index.php/players";			
	} 
	
	public function index(){
		$user_id=$this->uri->segment(3);
		$result['result']=$this->players_model->getAll($user_id);
		//echo $this->db->last_query();
		$result['user']=$this->users_model->GetAllUsersOnly();
		$result['user_id']=$user_id;
		load_view('Players/lists', $result);
	}
	public function add(){
		$user_id = $this->uri->segment(3);
	
		$reqData = $this->input->post();
		if($reqData){
			unset($reqData['save']);
			$result = $this->players_model->save($reqData);
			if($result ==1)
			{
				$message = "Player add successfully!.";
				$addClass = "alert-success";
				
			}else if($result == 2){
				$message = "Player id already exits!.";
				$addClass = "alert-danger";
			}else{
				$message = "Player addition failed!.";
				$addClass = "alert-danger";			
			}
			flash_message($addClass, $message);			
			$user_id=$this->input->post('user_id');
			redirect($this->listUrl."/index/".$user_id);

		}else{
			$data['user_id']=$user_id;
			load_view('Players/add',$data);
		}
	}
	public function single(){   
		$id = $this->uri->segment(3); 
		$data['result']=$this->players_model->single($id);
		$data['user_id']=$this->session->userdata('user_id'); 
		if($data){
			load_view('Players/update', $data);
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
		$result = $this->players_model->update($reqData);
		if($result){
			$message = "Player update successfully!.";
			$addClass = "alert-success";
		}else{ 
			$message = "Player updation failed!";
			$addClass = "alert-danger";
		}
		flash_message($addClass, $message);
		$playerId=$this->input->post('playerId');
		redirect($this->listUrl);	
	}
	
    public function delete(){
		$id = $this->uri->segment(3); 
		$result = $this->players_model->delete($id);
		if($result){
			$message = "Player delete successfully!.";
			$addClass = "alert-success";
		}else{ 
			$message = "Player deletion failed!";
			$addClass = "alert-danger";
		}
		flash_message($addClass, $message);
		redirect($this->listUrl);	
    }

	
	
	public function player(){
	   $this->load->model('section_model');
	   $this->load->model('Players_model');
	   $this->load->model('Playlists_model');
	   
	   $player_id = $this->uri->segment(3);
	   $user_id=$this->session->userdata('user_id');
       $result['result'] = $this->players_model->getAll($user_id);
	   
	   if(!empty($player_id))
	   {	   
	   
	   //print_r($_REQUEST);
	   ///exit;
	   
	   $result['playlists']=$this->Playlists_model->get_playlist_by_player($player_id);
	   $result['sections']=$this->section_model->get_section($player_id);
	   //print_r($result['sections']);
	   
	   $result['player_id']=$player_id;
	   }
	   load_view('user_player/lists', $result);
	}
	
	
	
	
	
	
	}  //end of class