<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->uri->segment('3')=='login')
		{ }
		$this->load->model('base_model');
	}
	
	public function CompanyDetails()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/company-add',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function SetIncentives()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/incentives_add',$data,true);
		$this->load->view('layout-after-login',$data);
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
		$data['employee'] = $this->db->query('SELECT * FROM td_employee WHERE emptype="Sales" ORDER BY name ASC')->result_array();
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

	public function Incentives($id,$amt)
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		$data['employee'] = $this->db->query('SELECT * FROM td_employee WHERE emp_id='.$id)->result_array();
		$data['amnt'] = $amt;
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/emp-incentives',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	
	public function Salary($id)
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		$employee = $this->db->query('SELECT * FROM td_employee WHERE emp_id='.$id)->row();
		
		$d = date("d");$m = date("m");
		$cbno = "CB/SL/".$id.$d.$m;
		$lfno = "LF/SL/".$id.$d.$m;
			
		$fields_finance = array(
				'bill_id' => $id,
				'bill_no' => 'NA',
				'cb_no' => $cbno,
				'lf_no' => $lfno,
				'finance_type' => 'Salary',
				'transaction_type' => 'Debit',
				'amount' => $employee->emp_sal,
				'entry_date' => date('Y-m-d')				
		);
		$service3 = $this->base_model->form_post('td_finance',$fields_finance);
		if($service3)	
		{
			$fields_finance = array(
					'emp_id' => $employee->emp_id,
					'salary_date' => date('Y-m-d'),
					'salary_amt' => $employee->emp_sal,
					'status' => 1				
			);
			$service4 = $this->base_model->form_post('salary_detail',$fields_finance);
		
			$this->session->set_flashdata('succ_msg', 'Salary successfully paid');
			redirect('View/Employee');	
		}
			
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/employee-add',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	

}



