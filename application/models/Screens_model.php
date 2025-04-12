<?php

Class Screens_model extends CI_Model {

	/**
	*
	* get get all Screens data 
	*
	* @param    no param
	* @return   arrray data
	*
	*/
	public function getAll(){
       
		$result = $this->db->get('screens');
		if($result->num_rows())
		return $result->result_array();
		else
			return [];
	}

	/**
		*
		* save Screens data
		*
		* @param    object Data 
		* @return      Numbar value
		*
	*/
	public function save($request)
	{
		
        $result = $this->db->insert('screens', $request);
        if($result)
            return true;
        else
            return false;		
		       	
	}
	
	/**
		*
		* get single Screens data
		*
		* @param    Screen id 
		* @return   object data
		*
	*/
	public function single($id)
	{        
        $result = $this->db->where(['id'=>$id])->get('screens');
		if($result->num_rows())
			return $result->row();
		else
			return (object)[];
	}

	/**
		*
		* Update Screens
		*
		* @param    object Data 
		* @return      Numbar value
		*
	*/
	public function update($request)
	{
		$playerId = $request['screenId'];
		unset($request['screenId']);
		$this->db->where('id', $playerId);
		$result = $this->db->update('screens', $request);
		if($result)
			return true;
		else
			return false;      	
	}
	/**
		*
		* Delete player
		*
		* @param    Screen id
		* @return      Boolean value
		*
	*/
	public function delete($id)
	{        
		$result = $this->db->delete('screens', array('id' => $id)); 
		if($result)
			return true;
		else
			return false;			
	}
	
	
	public function count_playlist_gallery($playlist_id=0)
	{
		$sql="select * from playlist_gallery where playlist_id='".$playlist_id."'";
		$query = $this->db->query($sql);
		return $query->num_rows();
		
		
		
	}
	
	
}

?>