<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->uri->segment('3')=='login')
		{ }
		$this->load->model('base_model');
	}
	
	public function purchasePayment()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/purchase-payment',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function salePayment()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/sale-payment',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function SalepaymentCollection()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$bno = $this->input->post('b_no');
		$data['rows'] = $this->db->query('SELECT * FROM td_sales_bill WHERE p_bill_no="'.$bno.'"')->result_array();
		
		$data['bl_no']=$bno;
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/pageview/s_payment',$data,true);
		$this->load->view('layout-after-login',$data);
		}
	}
	
	public function saleCollect()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$bno = $this->input->post('bill_no');
		$amt = $this->input->post('amount');
		$pay_date = $this->input->post('cdate');
		$next_pay_date = $this->input->post('ncdate');
		$pay_through = $this->input->post('pay_through');
		$trans_no = $this->input->post('trans_no');
		$brows = $this->db->query('SELECT * FROM td_sales_bill WHERE p_bill_no="'.$bno.'"')->result_array();
		$paidtlcnt = $this->db->query('SELECT * FROM td_sales_payment WHERE bill_no="'.$bno.'"')->num_rows();
		if($paidtlcnt > 0) {
		$paidtls = $this->db->query('SELECT SUM(paid_amt) as totpamt FROM td_sales_payment WHERE bill_no="'.$bno.'"')->result_array();
		$payable_amt = $brows[0]['p_bill_total'];
		$paid_amt = $amt;
		$pay_date = $pay_date;
		$amt_due = $payable_amt-$paidtls[0]['totpamt']-$paid_amt;
		if($amt_due > 0){
		$notify = 1;
		$particular = 'Payment Collection Day of #'.$bno;
		} else {
		$notify = 0;
		$particular = 'Payment All Clear of #'.$bno;
		}
		$paidtls = $this->db->query('UPDATE td_sales_payment SET notify=0 WHERE bill_no="'.$bno.'" AND notify=1');
		$fields = array(
			'bill_no' => $bno,
			'payable_amt' => $payable_amt,
			'paid_amt' => $paid_amt,
			'pay_date' => $pay_date,
			'next_pay_date' => $next_pay_date,
			'notify' => $notify,
			'pay_through' => $pay_through,
			'trans_no' => $trans_no,
			'amt_due' => $amt_due,
			'particular' => $particular
		);
		$service = $this->base_model->form_post('td_sales_payment',$fields);
		$updata = $this->db->query('UPDATE td_sales_bill SET due_amt="'.$amt_due.'",notify="'.$notify.'" WHERE p_bill_no="'.$bno.'"');
		} else {
		$payable_amt = $brows[0]['p_bill_total'];
		$paid_amt = $amt;
		$pay_date = $pay_date;
		$amt_due = $payable_amt-$paid_amt;
		if($amt_due > 0){
		$notify = 1;
		$particular = 'Payment Collection Day of #'.$bno;
		} else {
		$notify = 0;
		$particular = 'Payment All Clear of #'.$bno;
		}
		$fields = array(
			'bill_no' => $bno,
			'payable_amt' => $payable_amt,
			'paid_amt' => $paid_amt,
			'pay_date' => $pay_date,
			'next_pay_date' => $next_pay_date,
			'notify' => $notify,
			'amt_due' => $amt_due,
			'particular' => $particular
		);
		$service = $this->base_model->form_post('td_sales_payment',$fields);
		$updata = $this->db->query('UPDATE td_sales_bill SET due_amt="'.$amt_due.'",notify="'.$notify.'" WHERE p_bill_no="'.$bno.'"');
		}
		redirect(base_url().'accounts/salePayment');
		}
	}
	public function PurchasepaymentCollection()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$bno = $this->input->post('b_no');
		$data['rows'] = $this->db->query('SELECT * FROM td_purchase_bill WHERE p_bill_no="'.$bno.'"')->result_array();
		
		$data['bl_no']=$bno;
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/pageview/p_payment',$data,true);
		$this->load->view('layout-after-login',$data);
		}
	}
	public function PurchaseCollect()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$bno = $this->input->post('bill_no');
		$amt = $this->input->post('amount');
		$pay_through = $this->input->post('pay_through');
		$trans_no = $this->input->post('trans_no');
		$pay_date = $this->input->post('cdate');
		$next_pay_date = $this->input->post('ncdate');
		$brows = $this->db->query('SELECT * FROM td_purchase_bill WHERE p_bill_no="'.$bno.'"')->result_array();
		$paidtlcnt = $this->db->query('SELECT * FROM td_purchase_payment WHERE bill_no="'.$bno.'"')->num_rows();
		if($paidtlcnt > 0) {
		$paidtls = $this->db->query('SELECT SUM(paid_amt) as totpamt FROM td_purchase_payment WHERE bill_no="'.$bno.'"')->result_array();
		$payable_amt = $brows[0]['p_bill_total'];
		$paid_amt = $amt;
		$pay_date = $pay_date;
		$amt_due = $payable_amt-$paidtls[0]['totpamt']-$paid_amt;
		if($amt_due > 0){
		$notify = 1;
		$particular = 'Payment Day of #'.$bno;
		} else {
		$notify = 0;
		$particular = 'Payment All Clear of #'.$bno;
		}
		$paidtls = $this->db->query('UPDATE td_purchase_payment SET notify=0 WHERE bill_no="'.$bno.'" AND notify=1');
		$fields = array(
			'bill_no' => $bno,
			'payable_amt' => $payable_amt,
			'paid_amt' => $paid_amt,
			'pay_date' => $pay_date,
			'next_pay_date' => $next_pay_date,
			'notify' => $notify,
			'pay_through' => $pay_through,
			'trans_no' => $trans_no,
			'amt_due' => $amt_due,
			'particular' => $particular
		);
		$service = $this->base_model->form_post('td_purchase_payment',$fields);
		$updata = $this->db->query('UPDATE td_purchase_bill SET due_amt="'.$amt_due.'",notify="'.$notify.'" WHERE p_bill_no="'.$bno.'"');
		} else {
		$payable_amt = $brows[0]['p_bill_total'];
		$paid_amt = $amt;
		$pay_date = $pay_date;
		$amt_due = $payable_amt-$paid_amt;
		if($amt_due > 0){
		$notify = 1;
		$particular = 'Payment Day of #'.$bno;
		} else {
		$notify = 0;
		$particular = 'Payment All Clear of #'.$bno;
		}
		$fields = array(
			'bill_no' => $bno,
			'payable_amt' => $payable_amt,
			'paid_amt' => $paid_amt,
			'pay_date' => $pay_date,
			'next_pay_date' => $next_pay_date,
			'notify' => $notify,
			'amt_due' => $amt_due,
			'particular' => $particular
		);
		$service = $this->base_model->form_post('td_purchase_payment',$fields);
		$updata = $this->db->query('UPDATE td_purchase_bill SET due_amt="'.$amt_due.'",notify="'.$notify.'" WHERE p_bill_no="'.$bno.'"');
		}
		redirect(base_url().'accounts/purchasePayment');
		}
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

	
	
	public function cashbook()
	{		
		if($this->input->post('mode')=='cashbook')
		{
			$fdate = $this->input->post('fdate');
			$tdate = $this->input->post('tdate');
			redirect('accounts/cashbook_report/'.$fdate.'/'.$tdate);
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/report/cashbook-report',$data,true);
		$this->load->view('layout-after-login',$data);	
	}
	
	public function cashbook_report($fdate,$tdate)
	{
		$data['fdate'] = $fdate;
		$data['tdate'] = $tdate;
		
		$data['rows'] = $this->db->query("SELECT * FROM `td_finance` WHERE transaction_type='Credit' and entry_date>='$fdate' and entry_date<='$tdate' order by finance_id asc")->result();
		$data['rows1'] = $this->db->query("SELECT * FROM `td_finance` WHERE transaction_type='Debit' and entry_date>='$fdate' and entry_date<='$tdate' order by finance_id asc")->result();
		//echo '<pre>';print_r($data['rows']);die;
		$this->load->view('pages/report/cashbook-view',$data);
	}
	
	public function ledger()
	{		
		if($this->input->post('mode')=='cashbook')
		{
			$fdate = $this->input->post('fdate');
			$tdate = $this->input->post('tdate');
			$fund = urldecode($this->input->post('fund'));
			redirect('accounts/ledger_report/'.$fdate.'/'.$tdate.'/'.$fund);
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/report/ledger-report',$data,true);
		$this->load->view('layout-after-login',$data);	
	}
	
	public function ledger_report($fdate,$tdate,$fund)
	{
		$data['fdate'] = $fdate;
		$data['tdate'] = $tdate;
		$data['fund'] = urldecode($fund);
		$fund1 = urldecode($fund);
		
		
		$data['rows'] = $this->db->query("SELECT * FROM `td_finance` WHERE transaction_type='Debit'and finance_type='$fund1' and entry_date>='$fdate' and entry_date<='$tdate' group by entry_date,`finance_id`")->result();
		
		$data['rows1'] = $this->db->query("SELECT * FROM `td_finance` WHERE transaction_type='Credit'and finance_type='$fund1' and entry_date>='$fdate' and entry_date<='$tdate' group by entry_date,`finance_id`")->result();
		//echo '<pre>';print_r($data['rows']);die;
		$this->load->view('pages/report/ledger-view',$data);
	}
	
	public function dailycollection()
	{
		if($this->input->post('mode')=='cashbook')
		{
			$fdate = $this->input->post('fdate');
			$tdate = $this->input->post('tdate');
			redirect('accounts/dailycollection_report/'.$fdate.'/'.$tdate);
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/report/dailycollection-report',$data,true);
		$this->load->view('layout-after-login',$data);	
	}
	
	public function dailycollection_report($fdate,$tdate)
	{
		$data['fdate'] = $fdate;
		$data['tdate'] = $tdate;
		$data['rows'] = $this->db->query("SELECT * FROM `td_finance` WHERE entry_date>='$fdate' AND entry_date<='$tdate' ORDER BY entry_date ASC")->result();
		//echo '<pre>';print_r($data['rows']);die;
		$this->load->view('pages/report/dailycollection-view',$data);
	}
	
	public function ProfitLoss()
	{
		if($this->input->post('mode')=='cashbook')
		{
			$fdate = $this->input->post('fdate');
			$tdate = $this->input->post('tdate');
			redirect('accounts/ProfitLoss_report/'.$fdate.'/'.$tdate);
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/report/profitLoss-report',$data,true);
		$this->load->view('layout-after-login',$data);	
	}
	
	public function ProfitLoss_report($fdate,$tdate)
	{
		$data['fdate'] = $fdate;
		$data['tdate'] = $tdate;
		$data['rows'] = $this->db->query("SELECT * FROM `td_finance` WHERE transaction_type='Credit' and entry_date>='$fdate' and entry_date<='$tdate' order by finance_id asc")->result();
		$data['rows1'] = $this->db->query("SELECT * FROM `td_finance` WHERE transaction_type='Debit' and entry_date>='$fdate' and entry_date<='$tdate' order by finance_id asc")->result();
		//echo '<pre>';print_r($data['rows']);die;
		
		$this->load->view('pages/report/profitloss-view',$data);
	}
	
	public function incentiveDetails()
	{
		
		$data['rows'] = $this->db->query("SELECT * FROM td_incentives ORDER BY inc_id ASC")->result_array();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/pageview/incentives-view',$data,true);
		$this->load->view('layout-after-login',$data);
	}
}



