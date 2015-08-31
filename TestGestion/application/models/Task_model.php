<?php
class Task_model extends CI_Model
{
    public function __construct() 
    {
    	parent::__construct();
    	$this->load->database();
    }

    public function get_tasks($id=0,$type="") 
    {    	
    	if($id==0)
    	{
    		$query = $this->db->get('gestion.task');
    		$data=$query->result();    	
    		foreach ($data as $row)
    		{
    			//avoir le status
    			$statusId=$row->status_id;
    			$query = $this->db->get_where('gestion.task_status',array('status_id'=>$statusId));
    			$status=$query->row();
    			$row->status_id=$status->status;
    			//////////////////////////////////    			 
    			//avoir auteur
    			$userId=$row->author_user_id;
    			$query = $this->db->get_where('gestion.user',array('user_id'=>$userId));
    			$author=$query->row();
    			$row->author_user_id=$author->prename." ".$author->name;
    			//////////////////
    		}
    	}
    		else
    		{    			
    			if($type=="project")
    			{
    				$query = $this->db->get_where('gestion.task',array('project_id' => $id));
    				$data=$query->result();    				
    				foreach ($data as $row)
    				{
    					//avoir le status
    					$statusId=$row->status_id;
    					$query = $this->db->get_where('gestion.task_status',array('status_id'=>$statusId));
    					$status=$query->row();
    					$row->status_id=$status->status;
    					//////////////////////////////////    				
    					//avoir auteur
    					$userId=$row->author_user_id;
    					$query = $this->db->get_where('gestion.user',array('user_id'=>$userId));
    					$author=$query->row();
    					$row->author_user_id=$author->prename." ".$author->name;
    					//////////////////
    				}
    			}
    			else 
    			{
	    			$query = $this->db->get_where('gestion.task',array('task_id' => $id));
	    			$data=$query->result();	    		
	    			foreach ($data as $row)
	    			{
	    				//avoir le status
	    				$statusId=$row->status_id;
	    				$query = $this->db->get_where('gestion.task_status',array('status_id'=>$statusId));
	    				$status=$query->row();
	    				$row->status_id=$status->status;
	    				//////////////////////////////////	    		
	    				//avoir auteur
	    				$userId=$row->author_user_id;
	    				$query = $this->db->get_where('gestion.user',array('user_id'=>$userId));
	    				$author=$query->row();
	    				$row->author_user_id=$author->prename." ".$author->name;
	    				//////////////////
	    			}
    			}    			
    		}   		 
    		return $data;
    }

    public function set_task($id=0)
    {    	
    	if($id==0)
    	{
    		$data = array(    				
    				'title'=>$this->input->post('title'),
    				'description'=>$this->input->post('descr'),
    				'create_date'=>$this->input->post('create'),
    				'status_id'=>$this->input->post('status'),
    				'author_user_id'=>$this->input->post('author'),
    				'project_id'=>$this->input->post('project')
    		);
    		$this->db->insert('gestion.task', $data);
    	}
    	else
    	{
    		$data = array(
    			'title'=>$this->input->post('title'),
    			'description'=>$this->input->post('descr'),		
    			'author_user_id'=>$this->input->post('author'),
    			'start_date'=>$this->input->post('start'),	
    			'status_id'=>$this->input->post('status'),
    			'time_allowed'=>$this->input->post('allowed'),
    			'end_date'=>$this->input->post('end'),
    			'validation_date'=>$this->input->post('validation'),    				
    			'time_estimate'=>$this->input->post('estimated'),
    			'time_real'=>$this->input->post('real')
    		);
    		$this->db->where('task_id', $id);
    		$this->db->update('gestion.task', $data);
    	}  	 	
    }
    
    public function del_task($id) 
    {    	
	   	if($id==0)
	    {	    		
	    }
	    else 
	    {
	    	$this->db->delete('gestion.task', array('task_id' => $id));
	    }    	  
    }
    
    public function get_manager($id)
    {   
	    	$query = $this->db->get_where('gestion.task_manager',array('task_id' => $id));
	    	$data=$query->result();
	    	
	    	foreach ($data as $row)
	    	{
	    		//avoir auteur
	    		$userId=$row->user_id;
	    		$query = $this->db->get_where('gestion.user',array('user_id'=>$userId));
	    		$user=$query->row();
	    		$row->user_id=$user->prename." ".$user->name;
	    		//////////////////
	    	}
    	
    	return $data;
    }
     
    public function set_manager($id=0) 
    {
    	if($id==0)
    	{
    		$data = array(
    				'task_id'=>$this->input->post('task'),
    				'user_id'=>$this->input->post('user')
    		);
    		$this->db->insert('gestion.task_manager', $data);
    	}
    	else
    	{
    		$data = array(
    			'user_id'=>$this->input->post('user')
    		);
    		$this->db->where('task_user_id', $id);
    		$this->db->update('gestion.task_manager', $data);
    	}    	
    }

    public function del_manager($id) 
    {
    	if($id==0)
    	{
    	}
    	else
    	{
    		$this->db->delete('gestion.task_manager', array('task_user_id' => $id));
    	}
    }
}