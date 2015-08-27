<?php
class User_model extends CI_Model
{
    public function __construct() 
    {
    	parent::__construct();
    	$this->load->database();
    }
    
    public function get_users($id=0) 
    {        	
    	if($id==0)
    	{
    		$query = $this->db->get('gestion.user');    	
    		$data=$query->result();   
    	} 
    	else
    	{
    		$query = $this->db->get_where('gestion.user',array('user_id' => $id));
    		$data=$query->result();    	
    	}	     	

    	foreach ($data as $row)
    	{
	    	//avoir le niveau d'access
	    	$accessId=$row->access_id;
	    	$query = $this->db->get_where('gestion.access_level',array('access_id'=>$accessId));
	    	$access=$query->row();
	    	$row->access_id=$access->name;
	    	//////////////////////////////////
    	}
    	return $data;
    }
    
    public function get_access()
    {
    	$query = $this->db->get('gestion.access_level');
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
    
    public function set_user($id) 
    {
    	if($id==0)
    	{
    		$pw=sha1($this->input->post('pw'));
    		$pw=crypt($pw,'$6$');
    		
    		$data = array(
    				'prename'=>$this->input->post('prename'),
    				'name'=>$this->input->post('name'),
    				'login'=>$this->input->post('login'),
    				'pw'=>$pw,
    				'access_id'=>$this->input->post('access'),
    				'mail'=>$this->input->post('mail')
    		);
    		$this->db->insert('gestion.user', $data);
    	}
    	else
    	{
    		$pw=sha1($this->input->post('pw'));
    		$pw=crypt($pw,'$6$');
    		
    		$data = array(
    				'prename'=>$this->input->post('prename'),
    				'name'=>$this->input->post('name'),
    				'access_id'=>$this->input->post('access'),
    				'mail'=>$this->input->post('mail')
    		);
    		$this->db->where('user_id', $id);
    		$this->db->update('gestion.user', $data);
    	}
    }

    public function del_user($id) 
    {
    	if($id==0)
    	{
    		 
    	}
    	else
    	{
    		$this->db->delete('gestion.user', array('user_id' => $id));
    	}
    }
}