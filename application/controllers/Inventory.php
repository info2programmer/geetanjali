<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->uri->segment('3')=='login')
		{ }
	}
	
	public function StoreDetails()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		else {
		$data['employee'] = $this->db->query('SELECT * FROM td_employee ORDER BY name DESC')->result_array();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/store-add',$data,true);
		$this->load->view('layout-after-login',$data);
		}
	}
	public function PurchaseDetails()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		$data['supplier'] = $this->db->query('SELECT * FROM td_supplier ORDER BY clname ASC')->result_array();
		$data['unit'] = $this->db->query('SELECT * FROM td_unit ORDER BY stname ASC')->result_array();
		$data['items'] = $this->db->query('SELECT * FROM td_purchase_item WHERE company_id="'.$this->session->userdata('user_id').'" ORDER BY item_name ASC')->result_array();
		$data['project_list']=$this->db->query('SELECT * FROM tbl_project WHERE company_id='.$this->session->userdata('user_id'))->result();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/purchase-add',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function SaleManage()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		$data['customer'] = $this->db->query('SELECT * FROM td_client ORDER BY clname ASC')->result_array();
		$data['slperson'] = $this->db->query('SELECT * FROM td_employee WHERE emptype="Sales" ORDER BY name ASC')->result_array();
		$data['unit'] = $this->db->query('SELECT * FROM td_unit ORDER BY stname ASC')->result_array();
		$data['items'] = $this->db->query('SELECT * FROM td_purchase_item ORDER BY item_name ASC')->result_array();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/sale-add',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function PurchaseReturn()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/purchase-return',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function SaleReturn()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/sale-return',$data,true);
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
	######################################################################################

	public function StockDetails()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		else {
			$data['stocks'] = $this->db->query('SELECT * FROM td_stock')->result_array();
			$data['head'] = $this->load->view('elements/head','',true);
			$data['header'] = $this->load->view('elements/header','',true);
			$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
			$data['maincontent']=$this->load->view('pages/pageview/stock-details',$data,true);
			$this->load->view('layout-after-login',$data);
		}
	}
	public function PreturnDetails()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		else {
		$data['stocks'] = $this->db->query('SELECT * FROM td_return_details WHERE return_type="Purchase"')->result_array();
		$data['stockssls'] = $this->db->query('SELECT * FROM td_return_details WHERE return_type="Sales"')->result_array();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/pageview/return-items-details',$data,true);
		$this->load->view('layout-after-login',$data);
		}
	}

	public function StoreAllocate()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		else {
		$data['items'] = $this->db->query('SELECT DISTINCT(item_name) AS diitm FROM td_purchase_item ORDER BY item_name ASC')->result_array();
		$data['store'] = $this->db->query('SELECT * FROM td_store ORDER BY stname ASC')->result_array();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/store-allocate',$data,true);
		$this->load->view('layout-after-login',$data);
		}
	}

}



