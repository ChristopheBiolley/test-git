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
    		$query2 = $this->db->get_where('gestion.access_level',array('access_id' => $data->access_id));
    		$data2=$query2->row();
    		
    		$access=$data2->value;
    		
    		$this->session->set_userdata('access', $access);        			
    	}
    }
    
    public function set_user() 
    {
       
    }

    public function del_user() 
    {
        
    }
}