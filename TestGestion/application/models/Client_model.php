<?php
class Client_model extends CI_Model
{
    public function __construct() 
    {
    	parent::__construct();
    	$this->load->database();
    }

    public function get_clients($id=0) 
    {
    	if($id==0)
    	{
    		$query = $this->db->get('gestion.client');
    		$data=$query->result();	
    	}    	
    	else
    	{
    		$query = $this->db->get_where('gestion.client',array('client_id' => $id));
    		$data=$query->result();    	
    	}
    	return $data; 
    }

    public function set_client($id) 
    {
    	if($id==0)
    	{
    		$data = array(
    				'company'=>$this->input->post('company'),
    				'name'=>$this->input->post('name'),
    				'surname'=>$this->input->post('surname'),
    				'address1'=>$this->input->post('address1'),
    				'address2'=>$this->input->post('address2'),
    				'postal_code'=>$this->input->post('postal'),
    				'locality'=>$this->input->post('locality'),
    				'fixe_phone'=>$this->input->post('fixe'),
    				'mobile_phone'=>$this->input->post('mobile'),
    				'mail'=>$this->input->post('mail'),    				
    				'url'=>$this->input->post('site')    	
    		);
    		$this->db->insert('gestion.client', $data);
    	}
    	else
    	{
    		$data = array(
    				'company'=>$this->input->post('company'),
    				'name'=>$this->input->post('name'),
    				'surname'=>$this->input->post('surname'),
    				'address1'=>$this->input->post('address1'),
    				'address2'=>$this->input->post('address2'),
    				'postal_code'=>$this->input->post('postal'),
    				'locality'=>$this->input->post('locality'),
    				'fixe_phone'=>$this->input->post('fixe'),
    				'mobile_phone'=>$this->input->post('mobile'),
    				'mail'=>$this->input->post('mail'),    				
    				'url'=>$this->input->post('site')    
    		);
    		$this->db->where('client_id', $id);
    		$this->db->update('gestion.client', $data);
    	}
    }

    public function del_client($id) 
    {
    	if($id==0)
    	{
    	
    	}
    	else
    	{
    		$this->db->delete('gestion.client', array('client_id' => $id));
    	}
    }
}