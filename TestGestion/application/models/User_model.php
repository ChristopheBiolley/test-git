<?php

class User_model extends CI_Model
{
    public function __construct() 
    {
    	parent::__construct();
    	$this->load->database();
    }
    
    public function get_users() 
    {    	 
    	$query = $this->db->get('gestion.user');    	
    	$data=$query->result();    	
    	return $data;
    }
    
    public function check_user($user="",$pwd="")
    {
    	$pwd=sha1($pwd);
    	$pwd=crypt($pwd,'$6$');
    	$query = $this->db->get_where('gestion.user',array('login' => $user));
    	$data=$query->row();
    	
    	if($data->pw==$pwd)
    	{
    		$this->session->set_userdata('access', $data->access_id);    
    			
    	}
    }
    
    public function set_user() 
    {
       
    }

    public function del_user() 
    {
        
    }

}