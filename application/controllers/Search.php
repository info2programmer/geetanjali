<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->uri->segment('3')=='login')
		{ }
	}
	
	public function purchaseDetails()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$bno = $this->input->post('b_no');
		$purch = $this->db->query('SELECT * FROM td_purchase_bill WHERE p_bill_no="'.$bno.'"')->result_array();
		$data['pdetails'] = $this->db->query('SELECT * FROM td_purchase_item WHERE pid="'.$purch[0]['p_bill_id'].'"')->result_array();
		$data['bl_no']=$bno;
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/pageview/p_return',$data,true);
		$this->load->view('layout-after-login',$data);
		}
	}
	public function SaleDetails()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$bno = $this->input->post('b_no');
		$purch = $this->db->query('SELECT * FROM td_sales_bill WHERE p_bill_no="'.$bno.'"')->result_array();
		$data['pdetails'] = $this->db->query('SELECT * FROM td_sales_item WHERE pid="'.$purch[0]['p_bill_id'].'"')->result_array();
		$data['bl_no']=$bno;
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/pageview/s_return',$data,true);
		$this->load->view('layout-after-login',$data);
		}
	}
	public function ClientDetails()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/client-add',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function RouteDetails()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/route-add',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function BankDetails()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/bank-add',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function EmployeeDetails()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/employee-add',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function SupplierDetails()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/supplier-add',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function WeightUnit()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/unit-add',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	######################################################################################
public function RouteAssign()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		$data['route'] = $this->db->query('SELECT * FROM td_route ORDER BY rname ASC')->result_array();
		$data['employee'] = $this->db->query('SELECT * FROM td_employee ORDER BY name ASC')->result_array();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/route-assign',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function deactivateRoute($aid)
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		$data['route'] = $this->db->query('UPDATE td_assign_route SET active=0 WHERE asign_id='.$aid);
		redirect(base_url().'view/AssignedRoute');
	}
	######################################################################################

	

	

	

}



