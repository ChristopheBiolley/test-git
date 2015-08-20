<?php

class Comment_model extends CI_Model
{

    public function __construct() 
    {
    	parent::__construct();
    	$this->load->database();
    }

    public function get_comments($id=0,$type="") 
    {
    	if($id==0)
    	{
    		$query = $this->db->get('gestion.comment');
    		$data=$query->result();    	
    	}
    	else
    	{
    		if($type=="project")
    		{
	    		$query = $this->db->get_where('gestion.comment',array('project_id' => $id));
	    		$data=$query->result();    	   		
    		}
    		else 
    		{
    			$query = $this->db->get_where('gestion.comment',array('task_id' => $id));
    			$data=$query->result();
    		}
    	}
    	 
    	return $data;
    }

    public function set_project_comment() 
    {
		$data = array(    		    			 
    		'text'=>$this->input->post('text'),
    		'date'=>$this->input->post('date'),
    		'project_id'=>$this->input->post('from'),
    		'author'=>$this->input->post('author')
    	);
		    	
    	$this->db->insert('gestion.comment', $data);
    }

    public function set_task_comment() 
    {    	
    		$data = array(
    	
    				'text'=>$this->input->post('text'),
    				'date'=>$this->input->post('date'),
    				'task_id'=>$this->input->post('from'),
    				'author'=>$this->input->post('author')
    		);
    		$this->db->insert('gestion.comment', $data);    	
    }
    
    public function del_comment($id)
    {
    	if($id==0)
    	{
    		 
    	}
    	else
    	{
    		$this->db->delete('gestion.comment', array('comment_id' => $id));
    	}    	 
    }
}