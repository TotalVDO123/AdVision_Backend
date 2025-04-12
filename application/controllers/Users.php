<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Comman.php');
class Users extends Comman {

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
		$this->listUrl = "users";
		//error_reporting(-1);
		//ini_set('display_errors', 1);
	} 
	
	public function index(){
		
		if($this->session->userdata('user_type')==1)
		{	
		$usersData['result']=$this->users_model->allUsers();
		}
		else
		{
		$usersData['result']=$this->users_model->GetUsersOnly();	
		}	
		
		//load_view('Users/lists', $usersData);
		load_digitalview('Users/lists',$usersData);

		
	}
	public function add(){
		$reqData = $this->input->post();
		
		
		
		//echo "==============".$location;
		
		//exit;
		
		if($reqData)
		{
		
		//$arr_location=$reqData['location_id'];
		
		//$location= implode(",",$arr_location);
		
		
		$data=array(
		'username'=>$reqData['username'],
		'first_name'=>$reqData['first_name'],
		'last_name'=>$reqData['last_name'],
		'email'=>$reqData['email'],
		'password'=>md5($reqData['password']),
		'is_active'=>'1',
		'created_at'=>date('Y-m-d H:i:s'),
		'user_type'=>$reqData['user_type'],
		'parent_id'=>$this->session->userdata('user_id'),
		'company_name'=>$reqData['company_name'],
		'phone'=>$reqData['phone']
		);
			//echo "=================";
			
		//	print_r($data);
			//exit;
			//unset($reqData['save']);
			$result = $this->users_model->save($data);
		$new_user_id=$this->db->insert_id();
			
			$filename=$_FILES['company_logo']['name'];
			if(!empty($filename))
            {
			move_uploaded_file($_FILES['company_logo']['tmp_name'], 'assets/company_logo/' .$new_user_id . '.jpg');
			
			$data1=array('company_logo'=>$new_user_id . '.jpg');
			$this->db->where('id', $new_user_id);
			$this->db->update('users', $data1);
            }
			
			if($result ==1)
			{
				$message = "User add successfully!.";
				$addClass = "alert-success";
				
			}else if($result == 2){
				$message = "User name already exits!.";
				$addClass = "alert-danger";
			}else{
				$message = "User addition failed!.";
				$addClass = "alert-danger";			
			}
			flash_message($addClass, $message);			
			redirect($this->listUrl);

		}
		else
		{
			
		$sql = "SELECT * FROM  location  order by location ";
		$res = $this->db->query($sql);
		$data['locations']= $res->result_array();
			
			//load_view('Users/add',$data);
			
			load_digitalview('Users/add',$data);
		}
	}
	public function single()
	{   
		$id = $this->uri->segment(3); 
		$datas['result']=$this->users_model->single($id);
		
		//print_r($datas['result']);
		if($datas){
			$sql = "SELECT * FROM  location  order by location ";
			$res = $this->db->query($sql);
			$datas['locations']= $res->result_array();
			//ratnesh
			//load_view('Users/update', $datas);
			load_digitalview('Users/update', $datas);
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
		
	//print_r($reqData);
	//	exit;
		//$arr_location=$reqData['location_id'];
		unset($reqData['location_id']);
		unset($reqData['update']);
		
			$user_id =$this->input->post('userId');	
		
		//$location= implode(",",$arr_location);
		//$reqData['location_id']=$location;
		
			$reqData['company_logo']=$user_id . '.jpg';
			
		
		//print_r($reqData);
		//exit;
		
		
		$result = $this->users_model->update($reqData);
	
	//print_r($_FILES);
		move_uploaded_file($_FILES['company_logo']['tmp_name'], 'assets/company_logo/' . $user_id . '.jpg');
		
		
		if($result ==1){
			$message = "User update successfully!.";
			$addClass = "alert-success";
			
		}else if($result == 2){
			$message = "User name already exits!.";
			$addClass = "alert-danger";
		}else{
			$message = "User updation failed!.";
			$addClass = "alert-danger";			
		}
		flash_message($addClass, $message);
		redirect($this->listUrl);
    }
    public function delete(){
		$id = $this->uri->segment(3); 
		$result = $this->users_model->delete($id);
		if($result){
			$message = "User delete successfully!.";
			$addClass = "alert-success";
		}else{ 
			$message = "User deletion failed!";
			$addClass = "alert-danger";			
		}
		flash_message($addClass, $message);
		redirect($this->listUrl);
    }  

	
	
	public function change_password()
  {
	 $user_id=$this->session->userdata('user_id');
	 $task	=	$this->input->post('task');
		if($task == 'update_password')
		{
			$old_password_encrypted				=	$this->users_model->get_current_user_detail()->password;
			$old_password_submitted_encrypted	=	md5($this->input->post('current_password'));
			$new_password						=	$this->input->post('new_password');
			$new_password_encrypted				=	md5($this->input->post('new_password'));
			
			// CORRECT OLD PASSWORD NEEDED TO CHANGE PASSWORD
			
			
			if ($old_password_encrypted ==	$old_password_submitted_encrypted)
			{
				$this->db->update('users', array('password'=>$new_password_encrypted), array('id'=>$user_id));
				//$this->session->set_flashdata('status', 'password_changed');
				
				$message = "Password changed successfully!.";
				$addClass = "alert-success";
			}
			else
			{
				$message = "The current password you have entered is incorrect ";
				$addClass = "alert-danger";
			}	
			flash_message($addClass, $message);
			redirect(base_url().'users/change_password' , 'refresh');
		}
 	 
	 
	  ////load_view('Users/change_password');
	  load_digitalview('Users/change_password');
		
	
	
	
  
  }  
  
  
	
	
	public function profile()
	{
		$user_id = $this->session->userdata('user_id');
		$data['result']=$this->users_model->single($user_id);
		$data['user_id']=$user_id;
		load_view('Users/profile', $data);
	}

	public function update_profile()
	{
		
	if(!empty($_FILES["profile_image"]["name"]))
	{		
		
		$user_id=$this->input->post('user_id');
		$temp = explode(".", $_FILES["profile_image"]["name"]);
		$newfilename = round(microtime(true)) . '.' . end($temp);
		
		move_uploaded_file($_FILES['profile_image']['tmp_name'], 'images/profile_image/'.$newfilename);
		
		$data=array(
		'profile_image'=>$newfilename
		);
		
		$this->db->where('id', $user_id);
		$result = $this->db->update('users',$data );
		//redirect($this->listUrl.'/profile/');
	}	
			redirect($this->listUrl.'/profile/');
	}
	
	
	public function location($location_id=0,$user_id=0)
	{
		
		
		if(!empty($user_id))
		{	
		$result['result']=$this->players_model->getAll($user_id);
		}
		else
		{
		$result['result']=array();	
		}	
		
		
		
		//echo $this->db->last_query();
		//$result['user']=$this->users_model->GetAllUsersOnly();
		
		//$sql = "SELECT users.* FROM  users inner join location on users.location_id= location.id   where 1 and users.location_id='".$location_id."'";
		
		if($this->session->userdata('user_type')!=1 )
		{	
		$where_as=" and users.id='". $this->session->userdata('user_id')."'";
		}
		$sql = "SELECT users.* FROM users where 1 ". $where_as ." and FIND_IN_SET( ".$location_id.",users.location_id )";
		
		$res = $this->db->query($sql);
		$result['user']= $res->result_array();
		
		$result['user_id']=$user_id;
		
		$result['location_id']=$location_id;
		
		
		//load_view('Players/lists', $result);
		//load_view('Players/lists_old', $result);
		//load_view('Players/lists', $result);
		
		load_digitalview('Players/lists', $result);
		
		//load_digitalview('Users/lists', $result);
	}
	
	///public function companies($location_id=0,$user_id=0)
	public function companies()
	{
	 $this->load->library('pagination');
	//ini_set('display_startup_errors', 1);
    //ini_set('display_errors', 1);
	
		$result['result']=array();
		if(!empty($user_id))
		{
		  //$user_id=  $this->session->userdata('user_id');
		$result['result']=$this->players_model->getAll($user_id);
		
		//echo $this->db->last_query();
		}
		else
		{
		    if($this->session->userdata('user_type')!=1 )
		    {
		        //$user_id=  $this->session->userdata('user_id');
		    //$result['result']=$this->players_model->getAll($user_id);
		    
		        $result['result']=array();
		    }
		    else
		    {
		    $result['result']=array();
		    }
		}	
		
		
		////////////////////////////////pagination////////////////////////////////////////////////////
		 
		 
		 $str_search=trim($this->input->post('str_search'));
		 $where_a1s="";
		 
	
	    if(!empty( $str_search))
	    {
	    
	    $where_a1s=" and company_name LIKE  '%". $str_search."%'";
	    }
		 
		 
	 	$sql1 = "SELECT users.* FROM users where 1 ". $where_a1s ;
		
	
		
        $no_of_row=0;
		$res = $this->db->query($sql1);
		
		 if ($res->num_rows() > 0) {
           $no_of_row= $res->num_rows();
        }
		
	$config["base_url"]        = base_url('users/companies');
    $config["total_rows"]      = $no_of_row;
	$config["per_page"]        = 3;
    $config["uri_segment"]     = 3;
    $config["last_link"]       = "Last"; 
    $config["first_link"]      = "First"; 
    $config['next_link']       = 'Next';
    $config['prev_link']       = 'Prev';  
    $config['full_tag_open']   = "<ul class='pagination col-xs pull-right'>";
    $config['full_tag_close']  = "</ul>";
    $config['num_tag_open']    = '<li>';
    $config['num_tag_close']   = '</li>';
    $config['cur_tag_open']    = "<li class='disabled'><li class='active'><a href='#'>";
    $config['cur_tag_close']   = "<span class='sr-only'></span></a></li>";
    $config['next_tag_open']   = "<li>";
    $config['next_tag_close']  = "</li>";
    $config['prev_tag_open']   = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open']  = "<li>";
    $config['first_tagl_close']= "</li>";
    $config['last_tag_open']   = "<li>";
    $config['last_tagl_close'] = "</li>";
	$this->pagination->initialize($config);
    $page                      = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    
    
    $result["links"]             = $this->pagination->create_links();
    
    //$result["result"]           = $this->players_model->getAll_pagination($user_id,$config["per_page"], $page);
		
		
		
		
		
		
		
		////////////////////////////////////////////////////////////////////////////////////////////
		
		 $result['user']=array();
		if($this->session->userdata('user_type')==1 )
		{	

	//
	    
	   
	    $where_as="";
	    if(!empty($str_search))
	    {
	    
	    $where_as=" and company_name LIKE  '%". $str_search."%'";
	    }
	 	 $sql = "SELECT users.* FROM users where 1 ". $where_as." LIMIT ".$page." ,".$config["per_page"] ;
		

		$res = $this->db->query($sql);
		$result['user']= $res->result_array();
		
	    $result['str_search']=$str_search;
		
		}
		else
		{
		    
		$where_as="";
	 	$sql = "SELECT users.* FROM users where 1 and id='".$this->session->userdata('user_id')."'"  ;
		$res = $this->db->query($sql);
		$result['user']= $res->result_array();
		
		    
		    
		}
		
	//print_r($result['user']);
		
		$result['user_id']=$user_id;
		
		$result['location_id']=$location_id;
		
		load_digitalview('Players/lists', $result);
	}


	public function companies_player($location_id=0,$user_id=0)
	{
	    
	    //echo "====================";
	    //exit;
	    
	
		$this->session->set_userdata('tmp_user_id',$user_id);
		if(!empty($user_id))
		{
		  //$user_id=  $this->session->userdata('user_id');
		$result['result']=$this->players_model->getAll($user_id);
		
		//echo $this->db->last_query();
		}
		else
		{
		    if($this->session->userdata('user_type')!=1 )
		    {
		        $user_id=  $this->session->userdata('user_id');
		    $result['result']=$this->players_model->getAll($user_id);
		    }
		    else
		    {
		    $result['result']=array();
		    }
		}	
		
		
		
		
		//echo $this->db->last_query();
		//$result['user']=$this->users_model->GetAllUsersOnly();
		
		//$sql = "SELECT users.* FROM  users inner join location on users.location_id= location.id   where 1 and users.location_id='".$location_id."'";
		
		
		 $result['user']=array();
		if($this->session->userdata('user_type')==1 )
		{	
	//	$where_as=" and users.parent_id='". $this->session->userdata('user_id')."'";
		
		$where_as=" and users.user_type=2";
	
	 	$sql = "SELECT users.* FROM users where 1 ". $where_as ;
		
		
	//0$sql = "SELECT users.* FROM users where 1 ". $where_as ." and FIND_IN_SET( ".$location_id.",users.location_id )";
		
		$res = $this->db->query($sql);
		$result['user']= $res->result_array();
		
		//echo $this->db->last_query();
		
		}
		
	//print_r($result['user']);
		
		$result['user_id']=$user_id;
		
		$result['location_id']=$location_id;
		
		load_digitalview('Players/company_player', $result);
	}



	
	public function location2($location_id=0,$user_id=0)
	{
		
		
		if(!empty($user_id))
		{	
		$result['result']=$this->players_model->getAll($user_id);
		}
		else
		{
		$result['result']=array();	
		}	
		
		
		
		//echo $this->db->last_query();
		//$result['user']=$this->users_model->GetAllUsersOnly();
		
		//$sql = "SELECT users.* FROM  users inner join location on users.location_id= location.id   where 1 and users.location_id='".$location_id."'";
		
		if($this->session->userdata('user_type')!=1 )
		{	
		$where_as=" and users.id='". $this->session->userdata('user_id')."'";
		}
		$sql = "SELECT users.* FROM users where 1 ". $where_as ." and FIND_IN_SET( ".$location_id.",users.location_id )";
		
		$res = $this->db->query($sql);
		$result['user']= $res->result_array();
		
		$result['user_id']=$user_id;
		
		$result['location_id']=$location_id;
		
		
		load_view('Players/lists', $result);
		//load_view('Players/lists_old', $result);
		
		//load_digitalview('Users/lists', $result);
	}
	
	
	
	
	function send_notification($players_id='')
    {
       
      
       ///ini_set('display_errors', 'On');
     
        if(!empty($players_id))
        {
             
			
			$sql = "SELECT *  FROM players where id ='".$players_id."'";
				$res = $this->db->query($sql);
				
				$name_email="";
				if ($res->num_rows() > 0) 
				{
					$row_user = $res->result_array();
			        
			        
			        if(!empty($row_user[0]['device_token']))
			        {
			           $device_token=$row_user[0]['device_token'];
			        }
			        
				}
				else
				{
				    
				  $JSON_ARR[] = array(
					'response'=>"Device token doesn't exist",
					);
					print json_encode($JSON_ARR);  
				    
				    exit;
				}
			
			
			$title="Live";
			require_once APPPATH."libraries/FCMPushNotification.php";
			$FCMPushNotification = new \BD\FCMPushNotification('AAAA6taNbw4:APA91bFqeAlrPgNUsVKgsJ8hiwOkry7WcDtjINQMOYhzspDVnnvKJpnHCtoy-bls5T8QUCc1gaAV4HYOqJJRyWKD0vViG5zMF-DJrwn4BAOhEcF2CRIA6FwccXkafsqZsGHAZQqK2h1-');
			

			
			$this->db->where('device_token!=', '');
			//$this->db->where('is_notification',0);
			$query 		=	 $this->db->get('user');
			$result=  $query->result_array();
			foreach($result as $row)
			{
				
				
				
    			$body=$name_email." is live click to join";
    			$aPayload = array(
    			'notification' => array(
    			'title' => $title,
    			'body'=> $body,
    			'data'=>array(
    			    'broadcast_id'=>$broadcast_id
    			    
    			    ),
    			'sound'=> 'default'
    				)
    			);
    			
    			

				$sDeviceToken =$row['device_token'];
				
				
				
				 $aResult = $FCMPushNotification->sendToDevice(
				$sDeviceToken,		
				$aPayload,
				$aOptions // optional
				);
				
				
			
				
				//echo "============".$aResult;
				//print_r($aPayload);
    			//exit;
			}	

                $JSON_ARR[] = array(
					'response'=>"notification sent successfully",
					);
					print json_encode($JSON_ARR);
        
        }
        else
        {
            $JSON_ARR[] = array(
					'response'=>"user id is required",
					);
					print json_encode($JSON_ARR);
            
        }
        
    }
    
    
     function update_player_access_flag()
    {
        
        //echo "=======================";
        
        $player_id=$this->input->post('player_id');
        
         $data=array(
                'reaccess_flag'=>0
                );
            
            $this->db->update('players', $data,  array('id' =>  $player_id));
            
            echo $this->db->last_query();
            //echo $this->db->affected_rows();
           
    }

    
    
	
	
}