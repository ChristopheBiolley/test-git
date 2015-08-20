<?php
class Comments extends CI_Controller
{
    public function __construct() 
    {
    	parent::__construct();
    	$this->load->helper('url');    	
    	$this->load->model('Comment_model');
    }

    private $modelComment;
    
    public function form($id=0,$type="")
    {    
    	if($id==0)
    	{
    		 
    	}
    	else
    	{    		
    		$data['comment'] = $this->Comment_model->get_comments($id,$type);
    	}
    
    
    	// Render the requested view
    	$this->load->view('templates/header');
    	$this->load->view('comment/form_view',$data);
    	$this->load->view('templates/footer');
    }
    
    public function News()
    {    	    	
    	$type=$_POST['type'];
    	$from=$_POST['from'];
    	
    	if($type=="project")
    	{
    		$this->Comment_model->set_project_comment();
    	}
    	else
    	{

    		$this->Comment_model->set_task_comment();
    		
    	}
    	
    	redirect(base_url().$type."s/detail/".$from);
    }

    public function Update() 
    {
        
    }
    
    public function delete($id) 
    {    	 
    	$this->Comment_model->del_comment($id);
    	
     	redirect(base_url());
    }

    public function Lists() 
    {
    	
    	$data['comment'] = $this->Comment_model->get_comments();
    	
    }
    
    public function Detail() 
    {
        
    }

}