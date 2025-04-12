<?php

Class Login_Model extends CI_Model {

   // Read data using username and password
	
	public function login_valid($data)
	{
		$user_email = $data->username;
		$user_password = $data->user_password;
        $result =$this->db->where(['email'=>$user_email,'password'=>$user_password, 'is_active'=>'1'])->get('users');		
		if($result->num_rows()){			
			 $res= $result->row();
			 unset($res->password);
			 return $res;			 
		}else{
			return false;
		}
	}
}

?>