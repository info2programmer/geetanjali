<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->uri->segment('3')=='login')
		{ }
	}
	
	public function ExpenseDetails()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/expense-add',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function SaleReport()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/sale-day-report',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function SearchSaleDay()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		} else{
		$fdate = $this->input->post('fdate');
		$ldate = $this->input->post('tdate');
		$data['rows'] = $this->db->query('SELECT * FROM td_sales_bill WHERE p_bill_date BETWEEN "'.$fdate.'" AND "'.$ldate.'" AND stat=0')->result_array();
		$data['sumrows'] = $this->db->query('SELECT SUM(p_bill_total) as tsbill FROM td_sales_bill WHERE p_bill_date BETWEEN "'.$fdate.'" AND "'.$ldate.'"')->result_array();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/pageview/search-salesdetails',$data,true);
		$this->session->set_flashdata('success_message', 'Showing details From '.$fdate.' To '.$ldate);
		$this->load->view('layout-after-login',$data);
		}
	}
	
public function PurchaseReport()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/purchase-day-report',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function SearchPurchaseDay()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		} else{
		$fdate = $this->input->post('fdate');
		$ldate = $this->input->post('tdate');
		$data['rows'] = $this->db->query('SELECT * FROM td_purchase_bill WHERE p_bill_date BETWEEN "'.$fdate.'" AND "'.$ldate.'"')->result_array();
		$data['sumrows'] = $this->db->query('SELECT SUM(p_bill_total) as tsbill FROM td_purchase_bill WHERE p_bill_date BETWEEN "'.$fdate.'" AND "'.$ldate.'"')->result_array();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/pageview/search-purchasedetails',$data,true);
		$this->session->set_flashdata('success_message', 'Showing details From '.$fdate.' To '.$ldate);
		$this->load->view('layout-after-login',$data);
		}
	}
	public function SupplierPurchaseReport()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		$data['slperson'] = $this->db->query('SELECT * FROM td_supplier ORDER BY clname ASC')->result_array();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/purchase-supplier-report',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function SearchPurchaseSupplier()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		} else{
		$emp = $this->input->post('empname');
		$expEmp = explode('-',$emp);
		$fdate = $this->input->post('fdate');
		$ldate = $this->input->post('tdate');
		$data['rows'] = $this->db->query('SELECT * FROM td_purchase_bill WHERE supplier_name='.$expEmp[1].' AND p_bill_date BETWEEN "'.$fdate.'" AND "'.$ldate.'"')->result_array();
		$data['sumrows'] = $this->db->query('SELECT SUM(p_bill_total) as tsbill FROM td_purchase_bill WHERE supplier_name='.$expEmp[1].' AND p_bill_date BETWEEN "'.$fdate.'" AND "'.$ldate.'"')->result_array();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/pageview/search-purchasedetails',$data,true);
		$this->session->set_flashdata('success_message', 'Showing details of ' .$expEmp[0]. ' From '.$fdate.' To '.$ldate);
		$this->load->view('layout-after-login',$data);
		}
	}
	
public function PersonSaleReport()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		$data['slperson'] = $this->db->query('SELECT * FROM td_employee WHERE emptype="Sales" ORDER BY name ASC')->result_array();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/person-sale-report',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function SearchpersonReport()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		} else{
		$emp = $this->input->post('empname');
		$expEmp = explode('-',$emp);
		$fdate = $this->input->post('fdate');
		$ldate = $this->input->post('tdate');
		$data['rows'] = $this->db->query('SELECT * FROM td_sales_bill WHERE emp_name='.$expEmp[1].' AND p_bill_date BETWEEN "'.$fdate.'" AND "'.$ldate.'"')->result_array();
		$data['sumrows'] = $this->db->query('SELECT SUM(p_bill_total) as tsbill FROM td_sales_bill WHERE emp_name='.$expEmp[1].' AND p_bill_date BETWEEN "'.$fdate.'" AND "'.$ldate.'"')->result_array();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/pageview/search-salesdetails',$data,true);
		$this->session->set_flashdata('success_message', 'Showing details Of '.$expEmp[0].' From '.$fdate.' To '.$ldate);
		$this->load->view('layout-after-login',$data);
		}
	}
	
public function RouteSaleReport()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		$data['slperson'] = $this->db->query('SELECT * FROM td_route ORDER BY rid ASC')->result_array();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/route-sale-report',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function SearchrouteReport()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		} else{
		$route = $this->input->post('routename');
		$routeDtl = $this->db->query('SELECT * FROM td_route WHERE rname="'.$route.'"')->result_array();
		$rtId = $routeDtl[0]['rid'];
		$empname = $this->db->query('SELECT * FROM td_assign_route WHERE rname='.$rtId)->result_array();
		$data['rows'] = $this->db->query('SELECT * FROM td_sales_bill WHERE emp_name='.$empname[0]['empname'].' AND stat=0')->result_array();
		$data['sumrows'] = $this->db->query('SELECT SUM(p_bill_total) as tsbill FROM td_sales_bill WHERE emp_name='.$empname[0]['empname'].' AND stat=0')->result_array();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/pageview/search-salesdetails',$data,true);
		$this->session->set_flashdata('success_message', 'Showing details Of '.$route);
		$this->load->view('layout-after-login',$data);
		}
	}
	public function ChartReport()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/chart_search',$data,true);
		$this->load->view('layout-after-login',$data);
	}
public function ChartReportDetails()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$fdat = $this->input->post('fdate');
		$tdat = $this->input->post('tdate');
		$data['sales'] = $this->db->query('SELECT * FROM td_sales_bill WHERE p_bill_date BETWEEN "'.$fdat.'" AND "'.$tdat.'"')->result_array();
		$data['Purchase'] = $this->db->query('SELECT * FROM td_purchase_bill WHERE p_bill_date BETWEEN "'.$fdat.'" AND "'.$tdat.'"')->result_array();
		$data['sales1'] = $this->db->query('SELECT td_sales_bill.p_bill_date,td_sales_bill.p_bill_total,td_route.rname FROM td_sales_bill JOIN td_assign_route ON td_sales_bill.emp_name=td_assign_route.empname JOIN td_route ON td_assign_route.rname = td_route.rid WHERE td_sales_bill.p_bill_date BETWEEN "'.$fdat.'" AND "'.$tdat.'"')->result_array();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/charts',$data,true);
		$this->load->view('layout-after-login',$data);
	}
}	
	public function RoiDetails()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		$data['slperson'] = $this->db->query('SELECT * FROM td_client')->result_array();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/roi-search',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	
	public function SearchROIReport()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		} else{
		$emp = $this->input->post('empname');
		$expEmp = explode('-',$emp);
		$data['rows'] = $this->db->query('SELECT * FROM td_sales_bill WHERE customer_name='.$expEmp[1].' AND stat=0')->result_array();
		$data['customer'] = $this->db->query('SELECT * FROM td_client WHERE cl_id='.$expEmp[1])->result_array();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/pageview/Roi-chart',$data,true);
		$this->session->set_flashdata('success_message', 'Showing details Of '.$expEmp[0]);
		$this->load->view('layout-after-login',$data);
		}
	}
	public function DailyCollectionSheet()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/daily_collection_sheet',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function GST_report()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/gst_search_sheet',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	
	public function SearchDailyCollectionSheet()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$fdat = $this->input->post('fdate');
		$tdat = $this->input->post('tdate');
		$data['sales'] = $this->db->query('SELECT * FROM td_sales_bill WHERE p_bill_date BETWEEN "'.$fdat.'" AND "'.$tdat.'" AND stat=0')->result_array();
		$data['maincontent']=$this->load->view('pages/pageview/d_collection_sheet',$data);
	}
}	
public function SearchGST()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$fdat = $this->input->post('fdate');
		$tdat = $this->input->post('tdate');
		$data['fsdat'] = $fdat;
		$data['lsdat'] = $tdat;
		$data['sales'] = $this->db->query('SELECT * FROM td_sales_bill WHERE p_bill_date BETWEEN "'.$fdat.'" AND "'.$tdat.'" AND stat=0')->result_array();
		$data['maincontent']=$this->load->view('pages/pageview/gst_sheet',$data);
	}
}	

}



