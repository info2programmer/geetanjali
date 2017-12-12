<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {
function __construct(){
parent::__construct();
$this->load->model('base_model');
}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}
	

	public function Bank($id)
	{
	
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
		redirect(base_url());	
		}else{
	$service=  $this->db->query('delete from td_bank where bank_id = '.$id);
	redirect(base_url().'index.php/view/Bank');
	}
		
	}
	public function incentiveRange($id)
	{
	
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
		redirect(base_url());	
		}else{
	$service=  $this->db->query('delete from td_inc_settings where incset_id = '.$id);
	redirect(base_url().'index.php/view/incentiveSettings');
	}
		
	}
	public function StoreAllocate($id)
	{
	
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
		redirect(base_url());	
		}else{
	$service=  $this->db->query('delete from td_store_allocate where st_al_id = '.$id);
	redirect(base_url().'index.php/view/StoreAllocation');
	}
		
	}
	public function Company($id)
	{
	
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
		redirect(base_url());	
		}else{
	$service=  $this->db->query('delete from td_company where cid = '.$id);
	redirect(base_url().'index.php/view/Company');
	}
		
	}
	public function Route($id)
	{
	
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
		redirect(base_url());	
		}else{
	$service=  $this->db->query('delete from td_route where rid = '.$id);
	redirect(base_url().'index.php/view/Route');
	}
		
	}
	public function Client($id)
	{
	
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
		redirect(base_url());	
		}else{
	$service=  $this->db->query('delete from td_client where cl_id = '.$id);
	redirect(base_url().'index.php/view/Client');
	}
		
	}
	public function Supplier($id)
	{
	
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
		redirect(base_url());	
		}else{
	$service=  $this->db->query('delete from td_supplier where cl_id = '.$id);
	redirect(base_url().'index.php/view/Supplier');
	}
		
	}
	public function Employee($id)
	{
	
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
		redirect(base_url());	
		}else{
	$service=  $this->db->query('delete from td_employee where emp_id = '.$id);
	redirect(base_url().'index.php/view/Employee');
	}
		
	}
	public function store($id)
	{
	
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
		redirect(base_url());	
		}else{
	$service=  $this->db->query('delete from td_store where st_id = '.$id);
	redirect(base_url().'index.php/view/Store');
	}
		
	}
	public function Unit($id)
	{
	
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
		redirect(base_url());	
		}else{
	$service=  $this->db->query('delete from td_unit where uid = '.$id);
	redirect(base_url().'index.php/view/WeightUnit');
	}
		
	}
	public function Expense($id)
	{
	
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
		redirect(base_url());	
		}else{
	$service=  $this->db->query('delete from td_expense where exp_id = '.$id);
	redirect(base_url().'index.php/view/Expenses');
	}
		
	}
	public function Sale($id)
	{
	
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
		redirect(base_url());	
		}else{
		$billDtl = $this->db->query('SELECT * FROM td_sales_bill WHERE p_bill_id='.$id)->result_array();
		$bill_numb = $billDtl[0]['p_bill_no'];
		$bill_price = $billDtl[0]['real_amt'];
		$itmdtl = $this->db->query('SELECT * FROM td_sales_item WHERE pid='.$id)->result_array();
		foreach($itmdtl as $itmdtlres){
		$itemName = $itmdtlres['item_name'];
		$stk_dtl = $this->db->query('SELECT * FROM td_stock WHERE stock_item="'.$itemName.'"')->result_array();
		$item_totalStk = $stk_dtl[0]['stock_qty']+$itmdtlres['item_p_qty'];
		$stk_update = $this->db->query('UPDATE td_stock SET stock_qty="'.$item_totalStk.'" WHERE stock_item="'.$itemName.'"');
		}
		$d = date("d");$m = date("m");
		$cbno = "CB/CB/".$cid.$d.$m;
		$lfno = "LF/CB/".$cid.$d.$m;
		
		
		$fields_finance = array(
			'bill_id' => $id,
			'bill_no' => $bill_numb,
			'cb_no' => $cbno,
			'lf_no' => $lfno,
			'finance_type' => 'Bill Cancel',
			'transaction_type' => 'Debit',
			'amount' => $bill_price,
			'entry_date' => date('Y-m-d')
			
		);
		$service1 = $this->base_model->form_post('td_finance',$fields_finance);
	$service=  $this->db->query('UPDATE td_sales_bill SET stat=1 where p_bill_id = '.$id);
	redirect(base_url().'index.php/view/Sales');
	}
	}

	public function Purchase($id)
	{
	
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
		redirect(base_url());	
		}else{
	$service=  $this->db->query('delete from td_purchase_bill where p_bill_id = '.$id);
	$service2=  $this->db->query('delete from td_purchase_item where pid = '.$id);
	redirect(base_url().'index.php/view/Purchase');
	}
		
	}
	
	
}
