<?php
class Projects extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Project_model');
		$this->load->model('Task_model');
		$this->load->model('User_model');
		$this->load->model('Client_model');
		$this->load->model('Comment_model');
		$this->load->helper('url');
		$this->load->library('form_validation');
	} 
	
	public function form($id=0)
	{
		if($id==0)
		{			
		}
		else
		{
			$data['project'] = $this->Project_model->get_projects($id);  
		}	 		
		$data['user'] = $this->User_model->get_users();		 
		$data['client'] = $this->Client_model->get_clients();		
		$data['status'] = $this->Project_model->get_status();		
		// Render the requested view
		$this->load->view('templates/header');
		$this->load->view('project/form_view',$data);
		$this->load->view('templates/footer');
	}
	
    public function add() 
    {    	
    	$this->form_validation->set_rules('title', 'Titre', 'required');
    	$this->form_validation->set_rules('descr', 'description', 'required');
    	
    	if ($this->form_validation->run() === FALSE)
    	{    		    		   	 
    		redirect(base_url("projects/form/".$this->input->post('id')));    		
    	}
    	else
    	{
    		$this->Project_model->set_project();        
     		redirect(base_url());
    	}    	
    }

    public function update() 
    {
        $this->form_validation->set_rules('title', 'Titre', 'required');
    	$this->form_validation->set_rules('descr', 'description', 'required');    	
    	if ($this->form_validation->run() === FALSE)
    	{    		    		   	 
    		redirect(base_url("projects/form/".$this->input->post('id')));    		
    	}
    	else
    	{
    		$this->Project_model->set_project($this->input->post('id'));        
    		redirect(base_url()."projects/detail/".$this->input->post('id'));
    	}   
    }
    
    public function delete($id) 
    {
    	$this->Project_model->del_project($id);    	
     	redirect(base_url());
    }
    
    public function AddManager($id)
    {
    	$data= $this->Project_model->get_manager($id);
    	if($data==NULL)
    	{
    		$this->Project_model->set_manager();
    	}
    	else
    	{
    		foreach($data as $row)
    		{
    			$this->Project_model->set_manager($row->project_manager_id);
    		}
    	}
    	redirect(base_url()."projects/detail/".$this->input->post('project'));
    }
    
 	public function DelManager($id,$from) 
    {
    	$this->Project_model->del_manager($id);
    	redirect(base_url()."projects/detail/".$from);
    }
    
    
    public function view() 
    {    	
    	$data['project'] = $this->Project_model->get_projects();
    	$data['task'] = $this->Task_model->get_tasks();
    	$data['client'] = $this->Client_model->get_clients();
    	$data['user'] = $this->User_model->get_users();
    	
    	$this->load->view('templates/header');
    	$this->load->view('project/list_view', $data);
    	$this->load->view('templates/footer');
    }
    
    public function detail($project_id) 
    {    	
    	$type="project";    	
    	$data['project'] = $this->Project_model->get_projects($project_id);      	
    	$data['task'] = $this->Task_model->get_tasks($project_id,$type);    	
    	$data['user'] = $this->User_model->get_users();    	
    	$data['client'] = $this->Client_model->get_clients();    	
    	$data['comment']= $this->Comment_model->get_comments($project_id,$type);     	
    	$data['manager']= $this->Project_model->get_manager($project_id); 
    	$this->load->view('templates/header');
    	$this->load->view('project/detail_view', $data);  
    	$this->load->view('templates/footer');
    }
}