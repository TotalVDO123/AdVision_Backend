<?php

Class Players_model extends CI_Model {

	/**
	*
	* get get all players data 
	*
	* @param    no param
	* @return   arrray data
	*
	*/
	public function getAll($user_id=0){
		$this->db->where('user_id', $user_id);
		$result = $this->db->get('players');
		if($result->num_rows())
		return $result->result_array();
		else
			return [];
	}

	/**
		*
		* save player data
		*
		* @param    object Data 
		* @return      Numbar value
		*
	*/
	public function save($request)
	{
		$checkUser = $this->db->where(['player_id'=>$request['player_id']])->get('players')->row();
		if($checkUser){
			return 2;
		}else{
			$result = $this->db->insert('players', $request);
			if($result)
				return 1;
			else
			 return 0;		
		}
	}
	
	/**
		*
		* get single player data
		*
		* @param    player id 
		* @return   object data
		*
	*/
	public function single($id)
	{        
        $result = $this->db->where(['id'=>$id])->get('players');
		if($result->num_rows())
			return $result->row();
		else
			return (object)[];
	}

	/**
		*
		* Update player
		*
		* @param    object Data 
		* @return      Numbar value
		*
	*/
	public function update($request)
	{
		$playerId = $request['playerId'];
		unset($request['playerId']);
		$this->db->where('id', $playerId);
		$result = $this->db->update('players', $request);
		if($result)
			return true;
		else
			return false;      	
	}
	/**
		*
		* Delete player
		*
		* @param    player id
		* @return      Boolean value
		*
	*/
	public function delete($id)
	{        
		$result = $this->db->delete('players', array('id' => $id)); 
		if($result)
			return true;
		else
			return false;			
	}

	public function player_login()
	{
        //$data = new stdClass();
		//$user_email = $data->player_code;
		//$user_password = $data->pin;
		
		
		#$player_code=$this->input->post();
		#$this->load->model(()
		
		 $player_code =  $this->input->post('player_code');
		$pin = $this->input->post('pin');
		
		$result =$this->db->where(['player_id'=>$player_code,'pin'=>$pin])->get('players');		
		if($result->num_rows()){			
			$res= $result->row();
			 //unset($res->pin);
			 return $res;			 
		}else{
			return false;
		}
	}
	
	
	public function player_reaccess_flag($player_id=0)
    {
		$data=array(
		"reaccess_flag"=>1
		);
		$this->db->where('id', $player_id);
		$this->db->update('players', $data);
	}
	
	
	public function GetPlayerID($playlist_id=0)
	{
		$sql="select  playerId from playlists where id='".$playlist_id."'";
		$query = $this->db->query($sql);
		$result= $query->result_array();
		return $result[0]['playerId'];
	}
	
	
	
}

?>