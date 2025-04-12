<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->library('email');
    }
	
	function reset_password() {
		// Checking email existence
		$email		=	$this->input->post('email');
        $query 		=	$this->db->get_where('users', array('email' => $email));
			
        if ($query->num_rows() > 0) {
			
			// Saving the new password's hashed value into database
			$new_password = substr(rand(100000000, 20000000000), 0, 7);
        	$new_hashed_password = md5($new_password);
			$this->db->update('users', array('password' => $new_hashed_password), array('email'=>$email));
			$this->session->set_flashdata('password_reset', 'success');
			
			// Sending user the notification email with new password
			$email_msg	=	"Your new password is : ".$new_password;
			$email_sub	=	"Password reset request";
			$email_to	=	$email;
			$this->do_email($email_msg , $email_sub , $email_to);
        }
		else {
			$this->session->set_flashdata('password_reset', 'failed');
		}
	}
	
	function do_email($msg=NULL, $sub=NULL, $to=NULL, $from=NULL)
	{
/*		
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'xxx@gmail.com', // change it to yours
  'smtp_pass' => 'xxx', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
*/		
		
		//$config = array();
        //$config['useragent']	= "CodeIgniter";
        //$config['mailpath']		= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        
		//$config['protocol']		= "smtp";
		//$config['smtp_host']	= 'ssl://smtp.gmail.com';
		//  $config['smtp_port']	= "465";
		//$config['smtp_user']	="ratneshk500@gmail";
		//$config['smtp_pass']	="rampur2019";
		//$config['mailtype']		= 'text';
		//$config['charset']		= 'utf-8';
		
		//	$config['charset'] 		= 'iso-8859-1';
		//$config['newline']		= "\r\n";
		//$config['wordwrap']		= TRUE;

		
		
		
		 $from_email = "info@softindigo.com"; 
         $to_email = $to;
		
		
		

         //Load email library 
         $this->load->library('email');
		$this->email->from($from_email, 'Forgot Password'); 
         $this->email->to($to_email);
         $this->email->subject($sub); 
         $this->email->message($msg); 

         //Send mail 
         $this->email->send(); 
		
		
		
			 //$this->load->library('email');
			 //$this->email->initialize($config);

		//$site_name	=	$this->db->get_where('settings' , array('type' => 'site_name'))->row()->description;
		//if($from == NULL)
		//	$from		=	$this->db->get_where('settings' , array('type' => 'site_email'))->row()->description;
		
			 /*	 
		$site_name='kimbl';
		$from='ratneshk500@gmail.com';
		$this->email->from($from, $site_name);
		$this->email->to($to);
		$this->email->subject($sub);
		$this->email->message($msg);
		echo "====". $this->email->send();
		
		echo $this->email->print_debugger();
		exit;
	*/
	
	}
}

