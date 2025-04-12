<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    var $session_user;
    function __construct() 
	{
        parent::__construct();
		$this->load->model('Api_model');
		$this->load->model('playlists_model');
		$this->load->model('Login_Model');
		$this->load->model('players_model');
    }

   
	public function index()
    {
      
    }
	/*
	public function login( $player_id="",$pin_id=""  )
	{
		$data = new stdClass();
		$data->username =  $this->input->post('username');
		$data->user_password = md5($this->input->post('password'));
		$login = $this->Login_Model->login_valid($data);
		if($login)
		{
			$content=array('error'=>'Success','login'=>'1','user_id'=>$login->id);	
				}
		else
		{
			$error="Your Username or Password Does not match any account. Please Try another Account.";
			$content=array('error'=>$error,'login'=>'0');
		}	
		$JSON_ARR = array(
				'valid_login'=>$content
				);

				print json_encode($JSON_ARR);
	}
   */
   
   
   public function player_login()
	{
		//$data['player_code'] =  $this->input->post('player_code');
		//$data['pin'] = md5($this->input->post('pin'));
		$login = $this->players_model->player_login();
		if($login)
		{
			
		$JSON_ARR = array(
				'player_id'=>$login->id,
				'name'=>$login->name,
				'player_code'=>$login->player_id,
				'player_pin'=>$login->pin
				);
				print json_encode($JSON_ARR);
			
		}
		else
		{ 
			//$this->session->set_flashdata('feedback',"Your Username or Password Does not match any account. Please Try another Account.");
		
			$JSON_ARR = array(
				'response'=>"Your Player code or Pin Does not match . Please Try another Account"
				);
		    print json_encode($JSON_ARR);	
			exit;



		
		}		
	}
	
   
   
   
   
   public function PlaylistByPlayer($player_id=0)
   {	 
		$player = $this->Api_model->GetPlayerDetails($player_id);
		$playlist = $this->Api_model->GetPalylistOfPlayer($player_id);
		if(empty($playlist))
		{
		 $JSON_ARR = array(
				'response'=>"This id not valid player id"
				);
		    print json_encode($JSON_ARR);	
			exit;
		}	
		$playlist_content=[];
		foreach($playlist as $row)
		{
			$playlist_gallery=$this->playlists_model->GetPlaylistGallery($row['id']);
			$playlist_screen_content=[];
			foreach($playlist_gallery as $screen_row)
			{
				
				$file_type="";
				if($screen_row['file_type']==1)
				{
				 $file_type="IMAGE";	
				}
				elseif($screen_row['file_type']==2)
				{
				$file_type="VIDEO";		
				}
				$playlist_screen_content[]= array(
					"image_display_type"=>$screen_row['image_display_type'],
					"play_duration"=>$screen_row['duration'],
					"file_type"=>$file_type,
					"image_video_path"=>$screen_row['file_upload']
				);
			
			
			
			}
			
			//print_r($row);
				$playlist_content[]= array(
					"playlist_id"=>$row['id'],
					"name"=>$row['name'],
					"from_time"=>$row['from_time'],
					"to_time"=>$row['to_time'],
					"playlist_screen"=>$playlist_screen_content
				);
		
			
		}
		
		
		$JSON_ARR = array(
				'player_id'=>$player[0]['id'],
				'name'=>$player[0]['name'],
				'player_code'=>$player[0]['player_id'],
				'player_pin'=>$player[0]['pin'],
				'playlist'=>$playlist_content
				);
				print json_encode($JSON_ARR);
   }

	
	/*
	public function GetPlayer($user_id=0)
    {
		$result=$this->players_model->getAll($user_id);
		if(empty($result))
		{
		 $JSON_ARR = array(
				'response'=>"There is not player in this username"
				);
		    print json_encode($JSON_ARR);	
			exit;
		}	
		
		$playlist_content=[];
		foreach($result as $row)
		{
			$playlist_content[]= array(
					"Player_id"=>$row['id'],
					"player_code"=>$row['player_id'],
					"name"=>$row['name'],
					"pin"=>$row['pin']
				);
		}
		
		$JSON_ARR = array(
			'uiser_id'=>$user_id,
			'playlist'=>$playlist_content
			);
			print json_encode($JSON_ARR);
	} 
*/	


/////////////////////////////////////////////////////////////////////////////	 
   

/*
   public function index_old() {
        redirect(base_url('account/change_password'));
    }
    
	
	
	public function get_gallery()
	{
			$username=$this->input->post('username');
			//$username='ratnesh@yahoo.com';
			if(!empty($username))
			{	
			$user_details=$this->Api_model->get_userID($username);
			//echo "=====".$user_details->users_id;
			$user_id=$user_details->users_id;
			$user_details=$this->Api_model->get_gallery($user_id);
			foreach( $user_details as $row)
			{
			//print_r($row);
			
			if(!empty($row['image']))
			{	
					$content[]= array(
					 "id" => $row['id'],
					 "type" => 'Image',
					 "title" =>$row['image'],
					 "path"=>base_url().'uploads/gallery_image/'.$row['image'],
					 "duration"=>$row['video_duration']
				   );
			}		
			if(!empty($row['video']))
			{	
					$content[]= array(
					 "id" => $row['id'],
					 "type" => 'Video',
					 "title" => $row['video'],
					 "path"=> base_url().'uploads/gallery_video/'. $row['video'],
					 "duration"=>$row['video_duration']
					 
				   );
					
			}
			}
			
			$JSON_ARR = array(
				'media_details'=>$content

				);

				print json_encode($JSON_ARR);

			
			}
		
	}
	
	
	
	
	public function login()
	{
		$data['notif'] = $this->auth_model->Authentification();
		if(empty($data['notif']))
		{
			$content=array('error'=>'Success','login'=>'1','user_id'=>$this->session->userdata['logged_in']['users_id']);	
		}
		else
		{
			
			//$notif['message'] = 'Username or password incorrect !';
            //$notif['type'] = 'danger';
			
			$content=array('error'=>$data['notif']['message'],'login'=>'0');
		}	
		$JSON_ARR = array(
				'valid_login'=>$content
				);

				print json_encode($JSON_ARR);
	}
   
   public function get_section($user_id=0,$schedule="")
   {
	   if ( $user_id<=0) 
	   {
           $JSON_ARR = array(
				'response'=>"Please login first"
				);

		    print json_encode($JSON_ARR);
       }
	   else
	   {
		  $content=array();
		  $section_data= $this->Section_model->get_section_app($user_id,$schedule); 
		  
		  //echo $this->db->last_query();
		  
		  foreach($section_data as $row)
		  {
			  $input = array("Video", "Image");
			  $arr_gallery_id= explode(',',$row['gallery_id']);
			  for($ii=0;$ii<count($arr_gallery_id);$ii++)
			  {
				  $gallery_details=$this->Gallery_model->get_gallerydetails($arr_gallery_id[$ii]);
	
				

			
				
				if($gallery_details[0]['display_type']=='Video')
				{
					$content[]= array(
					 "id" => $gallery_details[0]['id'],
					 "title"=>$gallery_details[0]['title'],
					 "type" => 'Video',
					 "path"=> base_url().'uploads/gallery_video/'. $gallery_details[0]['video'],
					 "duration"=>$gallery_details[0]['video_duration']
					 
				   );
					
				}	
				elseif($gallery_details[0]['display_type']=='Image')
				{
					$content[]= array(
					 "id" => $gallery_details[0]['id'],
					 "title"=>$gallery_details[0]['title'],
					 "type" => 'Image',
					 "path"=>base_url().'uploads/gallery_image/'.$gallery_details[0]['image'],
					 "duration"=>$gallery_details[0]['video_duration']
				   );
				
			    }
			
			  
			  }
			  
			  	  $section_content[]= array(
					 "sectionid"=>$row['id'],
					 "schedule"=>$row['schedule'],
					 "horizontal" => $row['H_size'],
					 
					 "vertical" => $row['V_size'],
					 "actions" => $row['on_off'],
					 "gallery"=>$content
				   );
			  
			  
			  //$this->Gallery_model->get_gallerydetails();
			  
			  //print_r($row);
			  
		  }	
		  print json_encode($section_content); 
	   }	   
	   
	   
   }
   
   public function login_old()
	{
		$data['notif'] = $this->auth_model->Authentification();
		if(empty($data['notif']))
		{
			$content=array('login'=>'1');	
		}
		else
		{
			$content=array('login'=>'0');
		}	
		$JSON_ARR = array(
				'valid_login'=>$content
				);

				print json_encode($JSON_ARR);

		
		//print_r($data['notif']);
	
	}
   
   
    public function chk_update()
	{
		$update_data = $this->Api_model->get_data_update();
		$JSON_ARR = array(
				'is_change'=>$update_data[0]['reaccess_flag']
				);
		$sql = "update reaccess set reaccess_flag=0 ";
		$this->db->query($sql);
		print json_encode($JSON_ARR);		
	}
   

  */  
    
}
