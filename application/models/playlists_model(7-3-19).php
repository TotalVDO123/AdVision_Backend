<?php

Class Playlists_model extends CI_Model {

	/**
	*
	* get get all playlist data 
	*
	* @param    no param
	* @return   arrray data
	*
	*/
	public function getAll(){
       
        $players = $this->db->where(['user_id'=>$this->session->userdata('user_id')])->get('players')->result_array();
		
        $playlists = $this->db->where(['playerId'=>$this->uri->segment(3)])->get('playlists')->result_array();
		
		$playersDetails = $this->db->where(['id'=>$this->uri->segment(3)])->get('players')->row();
		
		$allData = new stdClass();
        $allData->playlists = $playlists;
        $allData->players = $players;
	    $allData->details = $playersDetails;
		if($allData){            
            return $allData;
        }else{
            return [];
        }			
	}
	public function getGallery(){
		$gallery = $this->db->get('screens')->result_array();
		//$allScrens = $this->db->where(['id'=>$this->uri->segment(3)])->get('screens')->row();
		$allData = new stdClass();
        $allData->gallery = $gallery;
       // $allData->allScrens = $allScrens;
		if($allData){            
            return $allData;
        }else{
            return [];
        }			
	}

	/**
		*
		* save playlist data
		*
		* @param    object Data 
		* @return      Numbar value
		*
	*/
	public function save($request)
	{
		// print_r($request);die;
		// $checkUser = $this->db->where(['playerId'=>$request['playerId']])->get('playlists')->row();
		// if($checkUser){
		// 	return 2;
		// }else{
			$result = $this->db->insert('playlists', $request);
			if($result)
				return 1;
			else
			 return 0;		
		// }
       	
	}
	
	/**
		*
		* get single playlist data
		*
		* @param    playlist id 
		* @return   object data
		*
	*/
	public function single($id)
	{        
        $result = $this->db->where(['id'=>$id])->get('playlists');
		if($result->num_rows())
			return $result->row();
		else
			return (object)[];
	}

	/**
		*
		* Update playlist
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
		$result = $this->db->update('playlists', $request);
		if($result)
			return true;
		else
			return false;      	
	}
	/**
		*
		* Delete playlist
		*
		* @param    playlist id
		* @return      Boolean value
		*
	*/
	public function delete($id)
	{        
		$result = $this->db->delete('playlists', array('id' => $id)); 
		if($result)
			return true;
		else
			return false;			
	}

	public function add_playlist_gallery($data)
	{
			$result = $this->db->insert('playlist_gallery', $data);
			if($result)
				return 1;
			else
			 return 0;
	}	
	
	public function GetPlaylistGallery($playlist_id=0)
	{
		$sql="select PG.*,S.file_upload,S.file_type from playlist_gallery PG inner join screens S on PG.screen_id=S.id where PG.playlist_id='".$playlist_id."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function DeletePlaylistImage($screen_id=0,$playlist_id=0)
	{
		$result = $this->db->delete('playlist_gallery', array(
		'screen_id' => $screen_id,
		'playlist_id'=>$playlist_id)
		); 
		if($result)
			return true;
		else
			return false;	
	}
	
	
	
	
	
}

?>