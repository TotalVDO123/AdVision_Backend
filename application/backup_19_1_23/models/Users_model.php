<?php

Class Users_model extends CI_Model {

   	/**
		*
		* get get all users data 
		*
		* @param    no param
		* @return   arrray data
		*
	*/
	public function allUsers()
	{
        $result = $this->db->get('users');
		if($result->num_rows())
		return $result->result_array();
		else
			return [];
	}
	
	
	public function GetAllUsersOnly()
	{
        $this->db->where('user_type', 3);
		$this->db->where('parent_id', $this->session->userdata('user_id'));
		$result = $this->db->get('users');
		
		if( !empty($result->num_rows()))
		return $result->result_array();
		else
			return [];
	}
	
	
	
	/**
		*
		* save user data
		*
		* @param    object Data 
		* @return      Numbar value
		*
	*/
	public function save($request)
	{
		$checkUser = $this->db->where(['username'=>$request['username']])->get('users')->row();
		if($checkUser){
			return 2;
		}else{
			$result = $this->db->insert('users', $request);
			if($result)
				return 1;
			else
			 return 0;		
		}
       	
	}
	/**
		*
		* get single user data
		*
		* @param    user id 
		* @return   object data
		*
	*/
	public function single($id)
	{        
        $result = $this->db->where(['id'=>$id])->get('users');
		if($result->num_rows())
			return $result->row();
		else
			return (object)[];
	}

	/**
		*
		* update user data
		*
		* @param    object Data 
		* @return      Numbar value
		*
	*/
	public function update($request)
	{
		$userId = $request['userId'];
		unset($request['userId']);
		$checkUser = $this->db->where(['username'=>$request['username'],'id !='=>$userId])->get('users')->row();
		if($checkUser){
			return 2;
		}else{
			$this->db->where('id', $userId);
			$result = $this->db->update('users', $request);
			if($result)
				return 1;
			else
			 return 0;		
		}
       	
	}
	/**
		*
		* Delete user
		*
		* @param    user id
		* @return      Boolean value
		*
	*/
	public function delete($id)
	{        
		$result = $this->db->delete('users', array('id' => $id)); 
		if($result)
			return true;
		else
			return false;			
	}
	
	
	function get_current_user_detail()
	{
		$user_id	=	$this->session->userdata('user_id');
		$user_detail=	$this->db->get_where('users', array('id'=>$user_id))->row();
		return $user_detail;
	}
	
	
}

?>