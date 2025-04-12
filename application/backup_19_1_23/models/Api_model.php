<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

	 public function GetPlayerDetails($player_id=0)
	 {
		$sql = "SELECT * FROM players WHERE id = " . $player_id;
        $res = $this->db->query($sql);
        if ($res->num_rows() > 0) {
            $row = $res->result_array();
            return $row;
        }
        return null;
	 }
	 
	 public function GetPalylistOfPlayer($player_id=0)
	 {
		$sql = "SELECT * FROM  playlists WHERE playerId = '".$player_id."' order by id ";
        $res = $this->db->query($sql);
        if ($res->num_rows() > 0) {
            $row = $res->result_array();
            return $row;
        }
        return null;
		 
	 }
	 
	 
	 
	 
	/*
	public function get_userID($username="")
    {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $username);
		$query = $this->db->get();
		return $query->row();

    }	
	
	public function get_gallery($user_id=0)
    {
	
		$this->db->select('*');
		$this->db->from('gallery');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		return $query->result_array();
    }

	public function get_data_update()
	{
		$this->db->select('reaccess_flag');
		$this->db->from('reaccess');
		$query = $this->db->get();
		return $query->result_array();
	}
	*/
	
    /**
    * Count the number of rows
    * @param int $manufacture_id
    * @param int $search_string
    * @param int $order
    * @return int
    */
    /*
	function count_gallery($manufacture_id=null, $search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('gallery');
		$this->db->where('user_id', $this->session->userdata['logged_in']['users_id']);
		//if($manufacture_id != null && $manufacture_id != 0){
		//	$this->db->where('manufacture_id', $manufacture_id);
		//}
		//if($search_string){
		//	$this->db->like('description', $search_string);
		//}
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('id', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }

	
	
	
	 
    public function save_gallery($data,$id=0) {
        
		if($id>0)
		{
			$this->db->where('id', $id);
			$this->db->update('gallery', $data);
  
		  
		}
		else
		{	
			$this->db->insert('gallery', $data);
			$users_id = $this->db->insert_id();
		}
		
        if ($this->db->affected_rows() > 0) {
            $notif['message'] = 'Saved successfully';
            $notif['type'] = 'success';
            unset($_POST);
        } else {
            $notif['message'] = 'Something wrong !';
            $notif['type'] = 'danger';
        }
        return $notif;
    }
*/
    /*
     * 
     */

	/* 
	 public function get_gallerydetails($id=0)
	{
		
		$this->db->select('*');
		$this->db->from('gallery');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
	
	}
	
	 
	 
    public function check_email($email) {
        $sql = "SELECT * FROM users WHERE email = " . $this->db->escape($email);
        $res = $this->db->query($sql);
        if ($res->num_rows() > 0) {
            $row = $res->row();
            return $row;
        }
        return null;
    }

	function delete_gallery($id){
		$this->db->where('id', $id);
		$this->db->delete('gallery'); 
	}
	*/
	
}
