<?php
class Admins extends CI_Controller
{
    public function __construct()
    {
    	parent::__construct();
    	$this->load->model('Client_model');
    	$this->load->model('User_model');
    	$this->load->helper('url');
    	$this->load->library('form_validation');
    }

    private $modelClient;
    private $modelUser;
        
    ////////////Loging
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
   ////////////////////
   
    /////////////Client
    public function clientform($id=0)
    {
    	if($id==0)
    	{
    		// Render the requested view
    		$this->load->view('templates/header');
    		$this->load->view('client/form_view');
    		$this->load->view('templates/footer');
    	}
    	else
    	{
    		$data['client'] = $this->Client_model->get_clients($id);
    		// Render the requested view
    		$this->load->view('templates/header');
    		$this->load->view('client/form_view',$data);
    		$this->load->view('templates/footer');
    	}
    }
    
    public function NewClient() 
    {
    	$this->form_validation->set_rules('company', 'Company', 'required');
    	$this->form_validation->set_rules('name', 'Name', 'required');
    	$this->form_validation->set_rules('surname', 'Surname', 'required');
    	 
    	if ($this->form_validation->run() === FALSE)
    	{
    		redirect(base_url("admins/clientform/".$this->input->post('id')));
    	}
    	else
    	{
    		$this->Client_model->set_client();
    		redirect(base_url());
    	}
    }
    
    public function UpClient() 
    {
    	$this->form_validation->set_rules('company', 'Company', 'required');
    	$this->form_validation->set_rules('name', 'Name', 'required');
    	$this->form_validation->set_rules('surname', 'Surname', 'required');
    	
    	if ($this->form_validation->run() === FALSE)
    	{
    		redirect(base_url("admins/clientform/".$this->input->post('id')));
    	}
    	else
    	{
    		$this->Client_model->set_client($this->input->post('id'));
    		redirect(base_url()."admins/detailclient/".$this->input->post('id'));
    	}
    }

    public function DelClient($id) 
    {
    	$this->Client_model->del_client($id);
    	redirect(base_url());
    }
    
    public function DetailClient($id) 
    {    	
    	$data['client'] = $this->Client_model->get_clients($id);
    	$this->load->view('client/detail_view', $data);
    }
	////////////////

    ///////////User    
    public function clientform($id=0)
    {
    	if($id==0)
    	{
    		// Render the requested view
    		$this->load->view('templates/header');
    		$this->load->view('user/form_view');
    		$this->load->view('templates/footer');
    	}
    	else
    	{
    		$data['user'] = $this->User_model->get_users($id);
    		// Render the requested view
    		$this->load->view('templates/header');
    		$this->load->view('user/form_view',$data);
    		$this->load->view('templates/footer');
    	}
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

    public function DetailUser() 
    {
       
    }
    ////////////////////////////
}