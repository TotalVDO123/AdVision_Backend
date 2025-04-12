<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Section_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

		
	public function get_section($player_id=0)
    {
		///$sql="select S.*,P.player_id as player_code,P.name as player_name from section S inner join players P on S.player_id =P.id where P.user_id='".$this->session->userdata['user_id']."'";
		//$query = $this->db->query($sql);
		//return $query->result_array();
		
		$this->db->select('*');
		$this->db->from('section');
		$this->db->where('player_id', $player_id);
		$this->db->order_by('id', 'asc');
		////////////$this->db->order_by('schedule', 'asc');
		$query = $this->db->get();
		return $query->result_array(); 	
    }

	
	public function single($id)
	{        
        $result = $this->db->where(['id'=>$id])->get('section');
		if($result->num_rows())
			return $result->row();
		else
			return (object)[];
	}
	
	
	
	public function save($request)
	{
			$result = $this->db->insert('section', $request);
			if($result)
				return 1;
			else
			 return 0;		
		// }
       	
	}
	
	public function update($request,$section_id=0)
	{
		unset($request['playerId']);
		$this->db->where('id', $section_id);
		$result = $this->db->update('section', $request);
		if($result)
			return true;
		else
			return false;      	
	}
	
	
/*
public function get_section_app($user_id=0,$schedule="")
    {
		$this->db->select('*');
		$this->db->from('video_section');
		$this->db->where('user_id', $user_id);
		if($schedule!="")
		{
			$this->db->where('schedule', $schedule);
		}
		///$this->db->where('user_id', $user_id);
		$this->db->order_by('schedule', 'asc');
		$query = $this->db->get();
		return $query->result_array(); 	
    }
	public function chk_schedule($schedule="")
    {
		if($schedule!="")
		{
			$this->db->select('*');
			$this->db->from('video_section');
			$this->db->where('user_id',$this->session->userdata['logged_in']['users_id']);
			$this->db->where('schedule', $schedule);
			$query = $this->db->get();
			return $query->num_rows();    
			
		}	
	}
	
	public function get_sectiondetails($id=0)
	{
		
		$this->db->select('*');
		$this->db->from('video_section');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
	
	}
	
	 
    public function save_section($data,$id=0) {
		if($id>0)
		{
			$this->db->where('id', $id);
			$this->db->update('video_section', $data);
			$sql = "update reaccess set reaccess_flag=1 ";
			$this->db->query($sql);
		
		}
		else
		{	
			$this->db->insert('video_section', $data);
			$users_id = $this->db->insert_id();
			$sql = "update reaccess set reaccess_flag=1 ";
			$this->db->query($sql);
		
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

	
	
	public function get_selected_gallery($gallary_id="")
	{
		$query="select * from gallery where  id in($gallary_id)";
		$q = $this->db->query($query);
		$data = $q->result_array();
		return $data;
		//echo($data['age']);
	}
	
	function delete_section($id){
		$this->db->where('id', $id);
		$this->db->delete('video_section'); 
	}
*/	
	
}
