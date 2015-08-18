<?php



class Tasks extends CI_Controller
{
	
    public function __construct() 
    {
    	parent::__construct();
    	$this->load->model('Project_model');
    	$this->load->model('Task_model');
    	$this->load->model('User_model');
    	$this->load->model('Client_model');
    	$this->load->helper('url');
    	$this->load->library('form_validation');
    }
    
    private $modelTask;

    
    public function form($id=0)
    {
    
    	if($id==0)
    	{
    			
    	}
    	else
    	{	
    		$data['task'] = $this->Task_model->get_tasks($id);
    	}
    		
    
    	$data['user'] = $this->User_model->get_users();
    		
    	$data['client'] = $this->Client_model->get_clients();
    
    	$data['status'] = $this->Project_model->get_status();
    
    	// Render the requested view
    	$this->load->view('templates/header');
    	$this->load->view('task/form_view',$data);
    	$this->load->view('templates/footer');
    }
    
    
public function add() 
    {    	
    	$this->form_validation->set_rules('title', 'Titre', 'required');
    	$this->form_validation->set_rules('descr', 'description', 'required');
    	
    	if ($this->form_validation->run() === FALSE)
    	{    		
    		   	 
    		redirect(base_url("tasks/form/".$this->input->post('id')));
    		
    	}
    	else
    	{
    		$this->Task_model->set_task();
        
     		redirect(base_url());
    	}    	
    }

    public function update() 
    {
        $this->form_validation->set_rules('title', 'Titre', 'required');
    	$this->form_validation->set_rules('descr', 'description', 'required');
    	
    	if ($this->form_validation->run() === FALSE)
    	{    		
    		   	 
    		redirect(base_url("tasks/form/".$this->input->post('id')));
    		
    	}
    	else
    	{
    		$this->Task_model->set_task($this->input->post('id'));
        
    		$this->detail($this->input->post('id'));
    	}   
    }

    public function delete($id) 
    {
    	
    	$this->Task_model->del_task($id);
    	
     	redirect(base_url());
    }
/*
    public function AddManager() 
    {
        
    }

    public function DelManager() 
    {
       
    }

    public function Lists()
    {
       
    }
*/
    public function Detail($id) 
    {
    	$this->load->model('Task_model');
    	$this->load->model('Comment_model');
    	$this->load->model('User_model');
    	 
    	$type="task";
 	 
    	$data['task'] = $this->Task_model->get_tasks($id,$type);
    	 
    //	$data['comment']= $this->Comment_model->get_comments($id,$type);
    	 
    	$data['user'] = $this->User_model->get_users();
    	
    	$this->load->view('task/detail_view', $data);
    }
}