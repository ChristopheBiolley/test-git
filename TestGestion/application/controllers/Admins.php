<?php
class Admins extends CI_Controller
{
    public function __construct()
    {
    	parent::__construct();
    	$this->load->model('User_model');
    	$this->load->helper('url');
    	$this->load->library('form_validation');
    }

    private $modelClient;

    private $modelUser;

    public function log()
    {
    	$this->form_validation->set_rules('user', 'User', 'required');
    	$this->form_validation->set_rules('pwd', 'Password', 'required');
    	
    	if ($this->form_validation->run() === FALSE)
    	{
    		redirect(base_url());
    	}
    	else
    	{
    		$this->User_model->check_user($this->input->post('user'),$this->input->post('pwd'));
    		
    		redirect(base_url());
    	}
    }
    
    public function unlog()
    {
    		$this->session->set_userdata('access', '0');     
    		redirect(base_url());   	
    }
    
    public function NewClient() 
    {
       
    }
    
    public function UpClient() 
    {
       
    }

    public function DelClient() 
    {
        
    }

    public function ListClient() 
    {
        
    }
    
    public function DetailClient() 
    {
        
    }

    public function NewUser() 
    {
        
    }

    public function UpUser() 
    {
        
    }

    public function DelUser() 
    {
        
    }

    public function ListUser() 
    {
        
    }
    
    public function DetailUser() 
    {
       
    }
}