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
	} 
	
	public function index(){
		$usersData['result']=$this->users_model->allUsers();
		load_view('Users/lists', $usersData);	
	}
	public function add(){
		$reqData = $this->input->post();
		
		if($reqData){
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
		'notes'=>$reqData['notes'],
		'country'=>$reqData['country'],
		'phone'=>$reqData['phone']
		);
			
			//unset($reqData['save']);
			$result = $this->users_model->save($data);
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

		}else{
			load_view('Users/add');
		}
	}
	public function single()
	{   
		$id = $this->uri->segment(3); 
		$datas['result']=$this->users_model->single($id);
		if($datas){
			load_view('Users/update', $datas);
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
		unset($reqData['update']);
		$result = $this->users_model->update($reqData);
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
 	 
	 //$this->load->view('change_password');
	  load_view('Users/change_password');
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
	
	
}