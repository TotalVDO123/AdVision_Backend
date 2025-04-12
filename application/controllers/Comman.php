<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Comman extends CI_Controller {
    public function __construct(){
        
        parent::__construct();
        if($this->session->userdata('user_id') == ''){ 
        //take them back to signin
          redirect('index.php'); 
        }
        // Load form helper library
        $this->load->helper('form');

        // Load form validation library
        $this->load->library('form_validation');

        // Load session library
        $this->load->library('session');

        // Load database
        $this->load->model(['users_model','players_model','playlists_model','screens_model']);

        //load directory helper
        $this->load->helper(['directory', 'comman_helper']); 
    } 

}