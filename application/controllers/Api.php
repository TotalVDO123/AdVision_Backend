<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    var $session_user;
    function __construct() 
	{
        parent::__construct();
		$this->load->model('Api_model');
		$this->load->model('playlists_model');
		$this->load->model('login_model');
		$this->load->model('players_model');
		$this->load->helper('comman_helper');
		//ini_set('display_errors', 1);

        //error_reporting(E_ALL);
        //ini_set('display_errors', '1');


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
   
   public function players_access_flag($players_id=0)
   {
       
      if(empty($players_id))
      {
       $JSON_ARR= array(
    				'response'=>"Player ID is required",
    				'success'=>0
    				);
    			print json_encode($JSON_ARR);
                die();
      }
       
       if(!empty($players_id))
       {
           
           	$sql = "SELECT * FROM  players 
				WHERE id=$players_id ";
				
			$player_res = $this->db->query($sql);
			
			if ($player_res->num_rows() > 0) 
			{
			$playersdetails = $player_res->result_array();
           
           //print_r($playersdetails[0]['id']);
           
           
           	$JSON_ARR = array(
				'player_id'=>$playersdetails[0]['id'],
				'name'=>$playersdetails[0]['name'],
				'player_code'=>$playersdetails[0]['player_id'],
				'player_pin'=>$playersdetails[0]['pin'],
				'access_flag'=>$playersdetails[0]['reaccess_flag'],
				'success'=>1
				);
				print json_encode($JSON_ARR);
			}
       }
       
   }
   
   
   public function player_login()
	{
		//$data['player_code'] =  $this->input->post('player_code');
		//$data['pin'] = md5($this->input->post('pin'));
		
		$device_token=$this->input->post('device_token');
		$login = $this->players_model->player_login();
		
		
		$this->players_model->player_reaccess_flag($login->id);
		if($login)
		{
		
		$data=array(
                'device_token'=>$device_token
                );
            
            $this->db->update('players', $data,  array('id' =>  $login->id));
         
		
		
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
	
	////active API
	public function sectionByPlayer_old($player_id=0)
	{	 
	
	
	$player = $this->Api_model->GetPlayerDetails($player_id);
	//$playlist = $this->Api_model->GetPalylistOfPlayer($player_id);
	
	
	
	
	if(empty($player))
	{
	 $JSON_ARR = array(
			'response'=>"This id not valid player id"
			);
		print json_encode($JSON_ARR);	
		exit;
	}
	else
	{
		$sql = "SELECT * FROM   section 
		WHERE player_id = '".$player_id."' and 	status=1 order by id ";
        
      
        
        $res = $this->db->query($sql);
        if ($res->num_rows() <= 0) {
            $JSON_ARR = array(
				'response'=>"There is not section"
				);
		    print json_encode($JSON_ARR);	
			exit;
        }
			
			
			
			$sections = $res->result_array();
			//$playlist_content=[];
			$section_content=[];
			$text_section_content=[];
			$scrolling_text_content=[];
			
		//echo "================".$sections[0]['playlist_id'];	
			
		
		$section_playlist=$sections[0]['playlist_id'];
		if( empty( $sections[0]['playlist_id']))
		{
		$currentday= strtoupper(date('D'));    
	    $sql_playlist="select * from playlist_schedule where player_id='".$player_id."'  and schedule_day='".$currentday."'";
        $res_playlist = $this->db->query($sql_playlist);
        $playlistsections = $res_playlist->result_array();
        
         $section_playlist=$playlistsections[0]['playlist_id'];	    
		    
		}
	
			
			
			foreach($sections as  $section )
			{
				//echo "====". $player['playlist_id'];
					//print_r($player);
				
				 //$sql = "SELECT * FROM  playlists 
				//WHERE id in (".$section['playlist_id'].") ";
				
				$sql = "SELECT * FROM  playlists 
				WHERE id in (".$section_playlist.") ";
				

			
		//echo 	$sql = "SELECT playlists.* FROM  playlists inner join playlist_gallery on playlists.id=playlist_gallery.playlist_id
		//		WHERE playlists.id in (".$section['playlist_id'].") order by playlist_gallery.sno ";
				
				$playlist_res = $this->db->query($sql);
				$playlists = $playlist_res->result_array();
				$playlist_content=[];
				//$scrolling_text_content=[];
				
				foreach($playlists as $playlist)
				{
					$playlist_gallery=$this->Api_model->GetPlaylistGallery($playlist['id']);
					//echo $this->db->last_query();	
				//	print_r($playlist_gallery);
					
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
							
							/////////////////////////////////
							elseif($screen_row['file_type'] == 3)
							{
							
							   if(video_type($screen_row['file_upload']) == 'youtube')	
						        {
								      $file_type="YOUTUBE";	
						        }
						        elseif(video_type($screen_row['file_upload']) == 'vimeo')	
						    	{
						    	     $file_type="VIMEO";	
						    	    
						    	}
								elseif(video_type($screen_row['file_upload']) == 'zoho')	
							    {
							        $file_type="ZOHO";
							        
							    }
								elseif(exif_imagetype($screen_row['file_upload']))
								{
								    $file_type="IMAGE";			
								}
								else
								{
									
                                    $file_type="VIDEO";	
								}

							
							
							}	
							
							
							
							
							//////////////////////////////////////
							
							$file_ext = explode('/',$screen_row['file_upload']);
							$file_ext_count=count($file_ext);
							$cnt=$file_ext_count-1;
							$file_name= $file_ext[$cnt];
							$playlist_screen_content[]= array(
								"image_display_type"=>$screen_row['image_display_type'],
								"play_duration"=>$screen_row['duration'],
								"file_type"=>$file_type,
								'image_video_name'=>$file_name,
								"image_video_path"=>$screen_row['file_upload']
							);
						
						}
					
				$currentday= strtoupper(date('D'));
				$from_time='';
                $to_time='';
                $schedule_day=$currentday;	
					
				$sql = "SELECT * FROM   playlist_schedule WHERE playlist_id='".$playlist['id']."' and schedule_day='".$currentday."' and  section_id='".$section['id']."'" ;
				
				
				$res = $this->db->query($sql);
                if ($res->num_rows() > 0) {
                $row = $res->result_array();
                
                
                $from_time=$row[0]['from_time'];
                $to_time=$row[0]['to_time'];
                $schedule_day=$row[0]['schedule_day'];
                }
				
				
			
				/*		
					$playlist_content[]= array(
							"playlist_id"=>$playlist['id'],
							"name"=>$playlist['name'],
							"from_time"=>$section['from_date'],
							"to_time"=>$section['to_date'],
							"playlist_screen"=>$playlist_screen_content
						);
				*/		
				
				    	$playlist_content[]= array(
							"playlist_id"=>$playlist['id'],
							"name"=>$playlist['name'],
							"from_time"=>$from_time,
							"to_time"=>$to_time,
							"schedule_day"=>$schedule_day,
							"playlist_screen"=>$playlist_screen_content
						);
				
				
				
				
				
				}
			
				
			
			/*
				$text_section_content[]= array(
					"section_id"=>$section['id'],
					"name"=>$section['name'],
					"text"=>$scrolling_text_content
					
					"section_id"=>$section['id'],
					"horizontal"=>$section['H_size'],
				);
			*/
				$section_content[]= array(
					"section_id"=>$section['id'],
					"horizontal"=>$section['H_size'],
					"Vertical"=>$section['V_size'],
					"playlist_content"=>$playlist_content
				);
				$scrolling_rss_content=NULL;
				if($section['show_rss']==1)
				{
					$scrolling_rss_content=array(
					"rss_feeds"=> $section['rss_feeds']
					);
					
				}
				//echo "====".$section['show_scrolling'];
				$scrolling_text_content=NULL;
				if($section['show_scrolling']==1)			
				{
					
				//	echo "====".$section['scrolling_text'];
					$scrolling_text_content=array(
					"scrolling_text"=> (empty($section['scrolling_text'])) ? '' : $section['scrolling_text']
					);
				}
			
			
			}
		
	
	
		$JSON_ARR = array(
				'player_id'=>$player[0]['id'],
				'name'=>$player[0]['name'],
				'player_code'=>$player[0]['player_id'],
				'player_pin'=>$player[0]['pin'],
				'Section'=>$section_content,
				"scroll_text"=>$scrolling_text_content,
				"rss_feed"=>$scrolling_rss_content
				);
				print json_encode($JSON_ARR);
	
	
	
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
		$scrolling_text_content=[];
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
				
				
				 $file_ext = explode('/',$screen_row['file_upload']);
				$file_ext_count=count($file_ext);
				$cnt=$file_ext_count-1;
				$file_name= $file_ext[$cnt];
				
				
				
				$playlist_screen_content[]= array(
					"image_display_type"=>$screen_row['image_display_type'],
					"play_duration"=>$screen_row['duration'],
					"file_type"=>$file_type,
					'image_video_name'=>$file_name,
					"image_video_path"=>$screen_row['file_upload']
				);
			
			
			
			}
			
			//print_r($row);
				$playlist_content[]= array(
					"playlist_id"=>$row['id'],
					"name"=>$row['name'],
					"from_time"=>$row['from_time'],
					"to_time"=>$row['to_time'],
					"horizontal"=>$row['horizontal'],
					"Vertical"=>$row['vertical'],
					"scrolling_text"=> $row['scrolling_text'],
					"playlist_screen"=>$playlist_screen_content
				);
		
				$scrolling_text_content[]=array(
				"from_time"=>$row['from_time'],
				"to_time"=>$row['to_time'],
				"scroll_string"=>$row['scrolling_text']
				);
				
		}
		
		$JSON_ARR = array(
				'player_id'=>$player[0]['id'],
				'name'=>$player[0]['name'],
				'player_code'=>$player[0]['player_id'],
				'player_pin'=>$player[0]['pin'],
				'playlist'=>$playlist_content,
				"scroll_text"=>$scrolling_text_content,
				);
				print json_encode($JSON_ARR);
   }

	
	
	
	 public function chk_player_update($player_id=0)
	{
		
		$result=$this->players_model->single($player_id);
		
		
		
		if($result->reaccess_flag==1)
		{
			$JSON_ARR = array(
				'is_change'=>0
				);	
			$sql = "update players set reaccess_flag=0 where id='".$player_id."'";
			$this->db->query($sql);
		}	
		elseif($result->reaccess_flag==0)
		{
			$JSON_ARR = array(
				'is_change'=>0
				);	
			
		}
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
    
    
    public function sectionByPlayer($player_id=0)
	{	 

        $player = $this->Api_model->GetPlayerDetails($player_id);
	
	//echo $this->db->last_query();
	//exit;
	
	
	if(empty($player))
	{
	 $JSON_ARR = array(
			'response'=>"This id not valid player id"
			);
		print json_encode($JSON_ARR);	
		die(0);
	}
	else
	{
		$sql = "SELECT  SC.id as sid, SC.name as sname FROM players PL left join schedule SC on PL.schedule_id=SC.id
		WHERE PL.id = '".$player_id."'";
        

        $res_playlist = $this->db->query($sql);
        if ($res_playlist->num_rows()> 0) {
         
        $scheduledata= $res_playlist->result_array();
         
         
         $currentday= strtoupper(date('D')); 
         $sql_playlist = "SELECT  PL.*,PS.from_time, PS.to_time  FROM  playlist_schedule PS left join playlists PL  on PS.playlist_id=PL.id where PS.schedule_id='".$scheduledata[0]['sid']."' and PS.schedule_day='".$currentday."'";
		 $playlistcoll = $this->db->query($sql_playlist);
		 $playlistcoll= $playlistcoll->result_array();
            
        $playlist_content=[];    
        foreach($playlistcoll as $row_plys) 
        {
        $playlist_content[]=array(
            
            'scrolling_text'=>$row_plys['scrolling_text'],
            'scrolling_check'=>$row_plys['scrolling_check'],
            'rss_feed'=>$row_plys['rss_feed'],
            'rss_feed_check'=>$row_plys['rss_feed_check'],
            
            'playlist_id'=>$row_plys['id'],
            'playlist_name'=>$row_plys['name'],
            'from_time'=>$row_plys['from_time'],
            'to_time'=>$row_plys['to_time'],
            'playlist_screen_content'=>$this->playlist_details($row_plys['id'])
            );        
        
        
        //playlist details
        
            
        }
        
             $schedule_content=[];
            foreach( $scheduledata as $row_sch)
            {
                 $schedule_content[]=array(
                     'schedule_id'=>$row_sch['sid'],
                     'schedule_name'=>$row_sch['sname'],
                     
                     'playlist_data'=>$playlist_content
                     );
                 
            }
            

        }
		

		 $JSON_ARR = array(
				'player_id'=>$player[0]['id'],
				'name'=>$player[0]['name'],
				'player_code'=>$player[0]['player_id'],
				'player_pin'=>$player[0]['pin'],
				'schedule_day'=>$currentday,
				'schedule'=>$schedule_content
				
				);
				print json_encode($JSON_ARR);
		
		
			


	}  
	
	}
    
    
    public function playlist_details($playlist_id=0)
    {
       $sql = "SELECT * FROM  playlists 
				WHERE id ='".$playlist_id."'";
				
			//exit;	
				$playlist_res = $this->db->query($sql);
				$playlists = $playlist_res->result_array();
				$playlist_content=[];
				//$scrolling_text_content=[];
				
				foreach($playlists as $playlist)
				{
        
                    $playlist_gallery=$this->Api_model->GetPlaylistGallery($playlist['id']);
					
					
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
							
							/////////////////////////////////
							elseif($screen_row['file_type'] == 3)
							{
							
							   if(video_type($screen_row['file_upload']) == 'youtube')	
						        {
								      $file_type="YOUTUBE";	
						        }
						        elseif(video_type($screen_row['file_upload']) == 'vimeo')	
						    	{
						    	     $file_type="VIMEO";	
						    	    
						    	}
								elseif(video_type($screen_row['file_upload']) == 'zoho')	
							    {
							        $file_type="ZOHO";
							        
							    }
								elseif(exif_imagetype($screen_row['file_upload']))
								{
								    $file_type="IMAGE";			
								}
								else
								{
									
                                    $file_type="VIDEO";	
								}

							
							
							}	
							
							
							
							
							//////////////////////////////////////
							
							$file_ext = explode('/',$screen_row['file_upload']);
							$file_ext_count=count($file_ext);
							$cnt=$file_ext_count-1;
							$file_name= $file_ext[$cnt];
							$playlist_screen_content[]= array(
								"image_display_type"=>$screen_row['image_display_type'],
								"play_duration"=>$screen_row['duration'],
								"file_type"=>$file_type,
								'image_video_name'=>$file_name,
								"image_video_path"=>$screen_row['file_upload']
							);
						
						}
					
					
				    return $playlist_screen_content;
				    
				}			
				    
				    
	}
    
    
}
