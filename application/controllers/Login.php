<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

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
	public function __construct()
		{
			parent::__construct();
			// Load form helper library
			$this->load->helper('form');

			// Load form validation library
			$this->load->library('form_validation');

			// Load session library
			$this->load->library('session');

			// Load database
			$this->load->model('login_model');

            //load directory helper
		    $this->load->helper('directory'); 
        } 
	
	public function index()
	{
		if(!empty($this->session->userdata('user_id'))){ 
			//take them back to signin
				redirect('index.php/Users'); 
		}

	   $this->load->view('login');
       
	}
	public function process()
	{
		$data = new stdClass();
		$data->username =  $this->input->post('email');
		$data->user_password = md5($this->input->post('password'));
		$login = $this->login_model->login_valid($data);
		if($login)
		{
			$user_id = $login->id;
			$user_name = $login->username;
			$user_type=$login->user_type;
			$profile_image=$login->profile_image;
			$this->load->library('session');
			$this->session->set_userdata('user_id',$user_id);
			$this->session->set_userdata('user_name',$user_name);
			$this->session->set_userdata('user_type',$user_type);
			$this->session->set_userdata('profile_image',$profile_image);
			
			
			
			
			if($user_type==3)
			{
			//redirect('/index.php/players/player/');	
			//redirect('/users/companies/');	
			
			redirect('index.php/users/companies_player/0/'.$user_id);	
			}	
			
			
			elseif($user_type==2)
			{
			//redirect('/index.php/players/player/');	
			//redirect('/users/companies/');	
			
			redirect('index.php/users/companies_player/0/'.$user_id);	
			}	
			
			
			else
			{
			$this->session->set_userdata('usertype','admin');		
			//redirect('/index.php/users/index');
			redirect('/users/companies/');	
			}
		}
		else
		{ 
			$this->session->set_flashdata('feedback',"Your Username or Password Does not match any account. Please Try another Account.");
			$this->session->set_flashdata('feedback_class','alert-danger');
			redirect('/index.php');
		}		
	}
	
	public function sign_out(){
		 $this->session->sess_destroy();
        redirect('index.php');
	} 

	
	
	function forget()
	{
		$this->load->model('email_model');
		$this->login_check();
		
		//print_r($_REQUEST);
		
		
		if (isset($_POST) && !empty($_POST))
		{
			$signup_result = $this->email_model->reset_password();
			redirect(base_url().'index.php/login/forget' , 'refresh');
		}
		//$page_data['page_name']		=	'forget';
		//$page_data['page_title']	=	'Forget Password';
		//$this->load->view('frontend/index', $page_data);
		$this->load->view('forget');
	}
	
	
	function login_check()
	{
		
		if(!empty($this->session->userdata('user_id')))
		{ 
			redirect(base_url().'kimbl' , 'refresh');
		}
		
		//if ($this->session->userdata('user_login_status') == 1)
		///	redirect(base_url().'index.php?browse/home' , 'refresh');
	}
	
	
	
	
	
}
