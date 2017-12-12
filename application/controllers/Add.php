<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {
function __construct(){
parent::__construct();
$this->load->model('base_model');
$this->load->helper('date');
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
	

	public function Bank()
	{
	if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$bname = $this->input->post('b_name');
		$bbranch = $this->input->post('b_branch');
		$baccno = $this->input->post('b_acc_no');
		$bifsc = $this->input->post('b_ifsc');
		$bmicr = $this->input->post('b_micr');
		
		$fields = array(
			'bank_name' => $bname,
			'branch_name' => $bbranch,
			'acc_no' => $baccno,
			'ifsc_no' => $bifsc,
			'micr_no' => $bmicr,
			'addate' => date('Y-m-d'),
			'adby' => $this->session->userdata('username')
		);
		$service = $this->base_model->form_post('td_bank',$fields);
		if($service)
		{
		$this->session->set_flashdata('success_message', 'Details Saved Successfully');
		redirect(base_url().'settings/BankDetails');
		}
		}
		
	}
	public function IncentivesRange()
	{
	if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$prange = $this->input->post('price_range');
		$expRange = explode('-',$prange);
		$min = $expRange[0];
		$max = $expRange[1];
		$incper = $this->input->post('inc_amt');
		
		$fields = array(
			'p_range' => $prange,
			'inc_per' => $incper,
			'min_range' => $min,
			'max_range' => $max,
			'addate' => date('Y-m-d'),
			'adby' => $this->session->userdata('username')
		);
		$service = $this->base_model->form_post('td_inc_settings',$fields);
		if($service)
		{
		$this->session->set_flashdata('success_message', 'Details Saved Successfully');
		redirect(base_url().'settings/SetIncentives');
		}
		}
		
	}
	public function Company()
	{
	if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$name = $this->input->post('cname');
		$phn = $this->input->post('cphn');
		$email = $this->input->post('cemail');
		$pan = $this->input->post('cpan');
		$gst = $this->input->post('cgst');
		
		$add = $this->input->post('cadd');
		$imges = $_FILES["cimg"]["name"];
		$temp = $_FILES["cimg"]["tmp_name"];
		
		$fields = array(
			'cname' => $name,
			'cphn' => $phn,
			'cemail' => $email,
			'cpan' => $pan,
			'cgst' => $gst,
			'cadd' => $add,
			'pic' => $imges,
			'addate' => date('Y-m-d'),
			'adby' => $this->session->userdata('username')
		);
		$service = $this->base_model->form_post('td_company',$fields);
		if($service)
		{
		$this->base_model->file_upload2($imges,$temp);
		$this->session->set_flashdata('success_message', 'Details Saved Successfully');
		redirect(base_url().'Settings/CompanyDetails');
		}
	}
	
	
}
public function Route()
	{
	if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$rname = $this->input->post('rname');
		$rno = $this->input->post('rno');
		$rdtl = $this->input->post('rdtl');
		
		$fields = array(
			'rname' => $rname,
			'rno' => $rno,
			'rdtl' => $rdtl,
			'addate' => date('Y-m-d'),
			'adby' => $this->session->userdata('username')
		);
		$service = $this->base_model->form_post('td_route',$fields);
		if($service)
		{
		$this->session->set_flashdata('success_message', 'Details Saved Successfully');
		redirect(base_url().'settings/RouteDetails');
		}
		}
		
	}
	public function Store()
	{
	if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$stname = $this->input->post('stname');
		$stno = $this->input->post('stno');
		$stkeep = $this->input->post('stkeep');
		
		$fields = array(
			'stname' => $stname,
			'stno' => $stno,
			'stkeep' => $stkeep,
			'addate' => date('Y-m-d'),
			'adby' => $this->session->userdata('username')
		);
		$service = $this->base_model->form_post('td_store',$fields);
		if($service)
		{
		$this->session->set_flashdata('success_message', 'Details Saved Successfully');
		redirect(base_url().'Inventory/StoreDetails');
		}
		}
		
	}
	public function StoreAllocation()
	{
	if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$stname = $this->input->post('store_name');
		$exp = explode('-',$stname);
		$itname = $this->input->post('item_name');
		$fields = array(
			'stname' => $exp[1],
			'item_name' => $itname,
			'addate' => date('Y-m-d'),
			'adby' => $this->session->userdata('username')
		);
		$service = $this->base_model->form_post('td_store_allocate',$fields);
		if($service)
		{
		$this->session->set_flashdata('success_message', 'Details Saved Successfully');
		redirect(base_url().'Inventory/StoreAllocate');
		}
		}
		
	}
	public function Client()
	{
	if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$clname = $this->input->post('clname');
		$clemail = $this->input->post('clemail');
		$clphn = $this->input->post('clphn');
		$clpan = $this->input->post('clpan');
		$clgst = $this->input->post('clgst');
		$cladd = $this->input->post('cladd');
		
		$fields = array(
			'clname' => $clname,
			'clemail' => $clemail,
			'clphn' => $clphn,
			'clpan' => $clpan,
			'cgst' => $clgst,
			'cladd' => $cladd,
			'addate' => date('Y-m-d'),
			'adby' => $this->session->userdata('username')
		);
		$service = $this->base_model->form_post('td_client',$fields);
		if($service)
		{
		$this->session->set_flashdata('success_message', 'Details Saved Successfully');
		redirect(base_url().'settings/ClientDetails');
		}
		}
		
	}
	public function Supplier()
	{
	if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$clname = $this->input->post('sname');
		$clemail = $this->input->post('semail');
		$clphn = $this->input->post('sphn');
		$clpan = $this->input->post('span');
		$clgst = $this->input->post('sgst');
		$cladd = $this->input->post('sadd');
		
		$fields = array(
			'clname' => $clname,
			'clemail' => $clemail,
			'clphn' => $clphn,
			'clpan' => $clpan,
			'cgst' => $clgst,
			'cladd' => $cladd,
			'addate' => date('Y-m-d'),
			'adby' => $this->session->userdata('username')
		);
		$service = $this->base_model->form_post('td_supplier',$fields);
		if($service)
		{
		$this->session->set_flashdata('success_message', 'Details Saved Successfully');
		redirect(base_url().'settings/SupplierDetails');
		}
		}
		
	}
public function Employee()
	{
	if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$emptype = $this->input->post('emptype');
		$name = $this->input->post('empname');
		$phn = $this->input->post('empphn');
		$email = $this->input->post('empmail');
		$empdesig = $this->input->post('empdesig');
		$add = $this->input->post('empadd');
		$salary = $this->input->post('empsal');
		$imges = $_FILES["cimg"]["name"];
		$temp = $_FILES["cimg"]["tmp_name"];
		
		$fields = array(
			'emptype' => $emptype,
			'name' => $name,
			'phn' => $phn,
			'email' => $email,
			'empdesig' => $empdesig,
			'addrs' => $add,
			'emp_sal' => $salary,
			'pic' => $imges,
			'addate' => date('Y-m-d'),
			'adby' => $this->session->userdata('username')
		);
		$service = $this->base_model->form_post('td_employee',$fields);
		if($service)
		{
			// $last_id = $this->db->insert_id();
			// $fields1 = array(
			// 				'emp_id' => $last_id,
			// 				'present_sal' => $salary,
			// 				'prev_sal' => 0
			// 				);	
			
			// $table['name'] = 'employee_salary';
			// $data = $this->Common_model->save_data($table,$fields1,'','emp_sal_id');
						
		$this->base_model->file_upload2($imges,$temp);
		$this->session->set_flashdata('success_message', 'Details Saved Successfully');
		redirect(base_url().'Settings/EmployeeDetails');
		}
	}
	}
	public function Unit()
	{
	if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$stname = $this->input->post('uname');
		
		$fields = array(
			'stname' => $stname,
			'addate' => date('Y-m-d'),
			'adby' => $this->session->userdata('username')
		);
		$service = $this->base_model->form_post('td_unit',$fields);
		if($service)
		{
		$this->session->set_flashdata('success_message', 'Details Saved Successfully');
		redirect(base_url().'settings/WeightUnit');
		}
		}
		
	}
	public function Expenses()
	{
	if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$expname = $this->input->post('rname');
		$expdate = $this->input->post('edate');
		$expamnt = $this->input->post('eprice');
		$expamntAdv = $this->input->post('Adeprice');
		
		$fields = array(
			'expname' => $expname,
			'expdate' => $expdate,
			'expamnt' => $expamnt,
			'advance' => $expamntAdv,
			'addate' => date('Y-m-d'),
			'adby' => $this->session->userdata('username')
		);
		$service = $this->base_model->form_post('td_expense',$fields);
		if($service)
		{
			$cid = $this->db->insert_id();
			$d = date("d");$m = date("m");
			$cbno = "CB/E/".$cid.$d.$m;
			$lfno = "LF/E/".$cid.$d.$m;
			
			$fields_finance = array(
				'bill_id' => $cid,
				'bill_no' => 'NA',
				'cb_no' => $cbno,
				'lf_no' => $lfno,
				'finance_type' => 'Expense',
				'transaction_type' => 'Debit',
				'amount' => $expamnt,
				'entry_date' => $expdate				
			);
			$service3 = $this->base_model->form_post('td_finance',$fields_finance);
			if($expamntAdv > 0){
				$cid = $this->db->insert_id();
			$d = date("d");$m = date("m");
			$cbno = "CB/E/ADV".$d.$m;
			$lfno = "CB/E/ADV".$d.$m;
			
			$fields_financead = array(
				'bill_id' => 'NA',
				'bill_no' => 'NA',
				'cb_no' => $cbno,
				'lf_no' => $lfno,
				'finance_type' => 'Advance Expense',
				'transaction_type' => 'Credit',
				'amount' => $expamntAdv,
				'entry_date' => $expdate				
			);
			$service4 = $this->base_model->form_post('td_finance',$fields_financead);
			}
		$this->session->set_flashdata('success_message', 'Details Saved Successfully');
		redirect(base_url().'expense/ExpenseDetails');
		}
		}
		
	}
	public function RouteAssign()
	{
	if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$empname = $this->input->post('empname');
		$rname = $this->input->post('rname');
		$rdate = $this->input->post('adate');
		
		$fields = array(
			'empname' => $empname,
			'rname' => $rname,
			'rdate' => $rdate,
			'addate' => date('Y-m-d'),
			'adby' => $this->session->userdata('username'),
			'active' => '1',
			'active_date' => date('Y-m-d'),
			'inactive_date' => '0'
		);
		$service = $this->base_model->form_post('td_assign_route',$fields);
		if($service)
		{
		$this->session->set_flashdata('success_message', 'Details Saved Successfully');
		redirect(base_url().'settings/RouteAssign');
		}
		}
		
	}
	
		public function purchase()
	{
	if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$lastBill = $this->db->query('SELECT * FROM td_purchase_bill ORDER BY p_bill_id DESC LIMIT 1')->result_array();
		$lastBillnn = $this->db->query('SELECT * FROM td_purchase_bill ORDER BY p_bill_id DESC LIMIT 1')->num_rows();
//echo $lastBill['bill_num'];
if($lastBillnn == 0) {
$csl_no=1;
} else {
$csl_no = $lastBill[0]['sl_no']+1;
}
if($lastBillnn == 0)	{
$number =00000000;
} else {
$number =$lastBill[0]['p_bill_id'];
}
$number++;
//$bill_numb = str_pad($number, 8, "0", STR_PAD_LEFT);
$bill_numb = $this->input->post('purchase-bno');
		$supply_name = $this->input->post('sup_name');
		$expSup = explode('-',$supply_name);
		$dateb = $this->input->post('purchase-date');
		$time = date('H:i:s');
		$total = $this->input->post('all-total');
		$create_date = date('Y-m-d');
		$creator = $this->session->userdata('username');
		//print_r($this->input->post('txt_media_area'));
		$item_name = $this->input->post('item-name');
		$item_p_price = $this->input->post('item-price');
		$item_p_qty = $this->input->post('item-quantity');
		$item_p_unit = $this->input->post('item_qunit');
		$item_p_total = $this->input->post('item-total');
		$item_s_price_wogst = $this->input->post('item-sale');
		$item_s_gst = $this->input->post('item-gst');
		$item_s_sgst = $this->input->post('item-ost');
		$item_s_price_wgst = $this->input->post('item-totsal');
		$imges = $_FILES["invice-copy"]["name"];
		$exp = explode('.',$imges);
		$image = $exp[0].time().'.'.$exp[1];
		$temp = $_FILES["invice-copy"]["tmp_name"];
		// Image Upload Here
		$this->base_model->news_file_upload($image,$temp);
		
		//$expItem = explode(',',$item_name);
		$cntExp = count($item_name)-1;
		$fields = array(
			'p_bill_no' => $bill_numb,
			'purchase_total' => array_sum($item_p_total),
			'sl_no' => $csl_no,
			'supplier_name' => $expSup[1],
			'p_bill_creator' => $creator,
			'p_bill_date' => $dateb,
			'p_bill_creation_date' => $create_date.' '.$time,
			'p_bill_total' => array_sum($item_p_total),
			'p_bill_total_sale' => $total,
			'invoice_img' => $image
			
		);
		
		$service1 = $this->base_model->form_post('td_purchase_bill',$fields);
		$cid = $this->db->insert_id();
		
		$d = date("d");$m = date("m");
		$cbno = "CB/P/".$cid.$d.$m;
		$lfno = "LF/P/".$cid.$d.$m;
		
		
		$fields_finance = array(
			'bill_id' => $cid,
			'bill_no' => $bill_numb,
			'cb_no' => $cbno,
			'lf_no' => $lfno,
			'finance_type' => 'Purchase',
			'transaction_type' => 'Debit',
			'amount' => array_sum($item_p_total),
			'entry_date' => $create_date
			
		);
		$service1 = $this->base_model->form_post('td_finance',$fields_finance);
		//$cid = $this->db->insert_id();
		
		if($service1)
		{
		for($i=0;$i<=$cntExp;$i++){
		$stk_item = $this->db->query('SELECT *FROM td_stock WHERE stock_item="'.$item_name[$i].'"')->result_array();
		$stk_item_cunt = $this->db->query('SELECT *FROM td_stock WHERE stock_item="'.$item_name[$i].'"')->num_rows();
		
		if($stk_item_cunt > 0){
		$cur_stk = $stk_item[0]['stock_qty'];
		$new_stk = $cur_stk+$item_p_qty[$i];
		$stk_update = $this->db->query('UPDATE td_stock SET stock_qty="'.$new_stk.'" WHERE stock_item="'.$item_name[$i].'"');
		}
		else {
		$fieldsupd = array(
			'stock_item' => $item_name[$i],
			'stock_qty' => $item_p_qty[$i],
			'stock_unit' => $item_p_unit[$i]
		);
		$serviceUp = $this->base_model->form_post('td_stock',$fieldsupd);
		}
		$item_s_sing_price_wogst = ($item_s_price_wogst[$i]/$item_p_qty[$i]);
		$item_s_sing_price_wgst = ($item_s_price_wgst[$i]/$item_p_qty[$i]);
		$fields1 = array(
			'item_name' => $item_name[$i],
			'item_unit_p_price' => $item_p_price[$i],
			'item_p_qty' => $item_p_qty[$i],
			'itempqtyorig' => $item_p_qty[$i],
			'item_p_unit' => $item_p_unit[$i],
			'item_p_total_amt' => $item_p_total[$i],
			'itempamtorig' => $item_p_total[$i],
			'item_s_price' => $item_s_price_wogst[$i],
			'item_s_gst' => $item_s_gst[$i],
			'item_s_sgst' => $item_s_sgst[$i],
			'item_s_total' => $item_s_price_wgst[$i],
			'item_single_sale_wgst' => $item_s_sing_price_wgst,
			'item_single_sale_wogst' => $item_s_sing_price_wogst,
			'pid' => $cid,
			
		);
		$service2 = $this->base_model->form_post('td_purchase_item',$fields1);
		}
		if($service2)
		{
		redirect(base_url().'view/Purchase/'.$cid);
		//redirect(base_url().'view/PurchasePreview/'.$cid);
		}
		
		}
		}
		
	}
	
	public function sales()
	{
	if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$lastBill = $this->db->query('SELECT * FROM td_sales_bill ORDER BY p_bill_id DESC LIMIT 1')->result_array();
		$lastBillnn = $this->db->query('SELECT * FROM td_sales_bill ORDER BY p_bill_id DESC LIMIT 1')->num_rows();
//echo $lastBill['bill_num'];
if($lastBillnn == 0) {
$csl_no=1;
} else {
$csl_no = $lastBill[0]['sl_no']+1;
}
if($lastBillnn == 0)	{
$number =00000000;
} else {
$number =$lastBill[0]['p_bill_id'];
}
$number++;
$bill_numb = str_pad($number, 8, "0", STR_PAD_LEFT);
		$customer_name = $this->input->post('cname');
		$expSup = explode('-',$customer_name);
		$emp_name = $this->input->post('empname');
		$expEmp = explode('-',$emp_name);
		$dateb = $this->input->post('sl_date');
		$time = date('H:i:s');
		$total = $this->input->post('all-total');
		$create_date = date('Y-m-d');
		$creator = $this->session->userdata('username');
		//print_r($this->input->post('txt_media_area'));
		$item_name = $this->input->post('item-name');
		$item_p_price = $this->input->post('item-price');
		$item_p_qty = $this->input->post('item-quantity');
		$item_p_unit = $this->input->post('item_qunit');
		$item_p_total = $this->input->post('item-total');
		$item_s_price_wogst = 0;
		$item_s_gst = $this->input->post('item-gst');
		$item_s_gst_amt = $this->input->post('item-gst-amt');
		$item_s_cgst = $this->input->post('item-cgst');
		$item_s_cgst_amt = $this->input->post('item-cgst_amt');
		$item_s_price_wgst = $item_p_total;
		$discount = $this->input->post('discount');
		$main_sale_price = $this->input->post('hid_sourav_distinguish');
		
		//$expItem = explode(',',$item_name);
		$cntExp = count($item_name)-1;
		$fields = array(
			'p_bill_no' => $bill_numb,
			'discount_amt' => $discount,
			'real_amt' => array_sum($item_p_total),
			'sl_no' => $csl_no,
			'customer_name' => $expSup[1],
			'emp_name' => $expEmp[1],
			'p_bill_creator' => $creator,
			'p_bill_date' => $dateb,
			'p_bill_creation_date' => $create_date.' '.$time,
			'p_bill_total' => $total,
			'stat' => 0
			
		);
		$service1 = $this->base_model->form_post('td_sales_bill',$fields);
		$cid = $this->db->insert_id();
		
		$d = date("d");$m = date("m");
		$cbno = "CB/S/".$cid.$d.$m;
		$lfno = "LF/S/".$cid.$d.$m;
		
		$fields_finance = array(
			'bill_id' => $cid,
			'bill_no' => $bill_numb,
			'cb_no' => $cbno,
			'lf_no' => $lfno,
			'finance_type' => 'Sale',
			'transaction_type' => 'Credit',
			'amount' => $total,
			'entry_date' => $create_date
			
		);
		$service3 = $this->base_model->form_post('td_finance',$fields_finance);
		
		if($service3)
		{
		for($i=0;$i<=$cntExp;$i++){
		$stk_item = $this->db->query('SELECT *FROM td_stock WHERE stock_item="'.$item_name[$i].'"')->result_array();
		$stk_item_cunt = $this->db->query('SELECT *FROM td_stock WHERE stock_item="'.$item_name[$i].'"')->num_rows();
		
		$cur_stk = $stk_item[0]['stock_qty'];
		$new_stk = $cur_stk-$item_p_qty[$i];
		$stk_update = $this->db->query('UPDATE td_stock SET stock_qty="'.$new_stk.'" WHERE stock_item="'.$item_name[$i].'"');
		
		$item_s_sing_price_wogst = ($item_s_price_wogst[$i]/$item_p_qty[$i]);
		$item_s_sing_price_wgst = ($item_s_price_wgst[$i]/$item_p_qty[$i]);
		$fields1 = array(
			'item_name' => $item_name[$i],
			'item_unit_p_price' => $item_p_price[$i],
			'item_p_qty' => $item_p_qty[$i],
			'itempqtyorig' => $item_p_qty[$i],
			'item_p_unit' => $item_p_unit[$i],
			'item_p_total_amt' => $item_p_total[$i],
			'itempamtorig' => $item_p_total[$i],
			'item_s_price' => 0,
			'item_s_gst' => $item_s_gst[$i],
			'item_s_gst_amt' => $item_s_gst_amt[$i],
			'item_s_cgst' => $item_s_cgst[$i],
			'item_s_cgst_amt' => $item_s_cgst_amt[$i],
			'item_s_total' => $item_s_price_wgst[$i],
			'item_single_sale_wgst' => $item_s_sing_price_wgst,
			'item_single_sale_wogst' => $item_s_sing_price_wogst,
			'pid' => $cid,
			
		);
		$service2 = $this->base_model->form_post('td_sales_item',$fields1);
		$diff = $item_p_total[$i]/$item_p_qty[$i];
		//echo $main_sale_price[$i];
		
		if($diff > $main_sale_price[$i]){
		$extr = $diff-$main_sale_price[$i];
		$inc_range = $this->db->query('SELECT * FROM `td_inc_settings` WHERE min_range<'.$diff.' AND max_range>'.$diff.' LIMIT 1
')->result_array();
$incntive = (($inc_range[0]['inc_per']*$diff)/100)*$item_p_qty[$i];
$fields_inc = array(
			'emp_id' => $expEmp[1],
			'inc_range' => $inc_range[0]['inc_per'],
			'extra_price_unit' => $extr,
			'incentives_unit' => $inc_range[0]['inc_per'],
			'incentive_item_total' => $incntive,
			'item_name' => $item_name[$i],
			'bill_no' => $cid,
			'earn_date' => $create_date
		);
		//print_r($fields_inc);die;exit;
		$service33 = $this->base_model->form_post('td_incentives',$fields_inc);
}
		
		}
		if($service2)
		{
		redirect(base_url().'view/SalesPreview/'.$cid);
		}
		
		}
		}
		
	}
	
	public function Incentives()
	{
	if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}else{
		$emp_name = $this->input->post('emp_id');
		$incentive = $this->input->post('inc_amt');
		$cid = $emp_name;
			$d = date("d");$m = date("m");
			$cbno = "CB/I/".$cid.$d.$m;
			$lfno = "LF/I/".$cid.$d.$m;
			
			$fields_finance = array(
				'bill_id' => $cid,
				'bill_no' => 'NA',
				'cb_no' => $cbno,
				'lf_no' => $lfno,
				'finance_type' => 'Incentive',
				'transaction_type' => 'Debit',
				'amount' => $incentive,
				'entry_date' => date('Y-m-d')				
			);
			$service3 = $this->base_model->form_post('td_finance',$fields_finance);
		if($service3)
		$updt = $this->db->query('UPDATE td_incentives SET status=1 WHERE emp_id='.$emp_name);
		{$this->session->set_flashdata('success_message', 'Incentive Details Saved Successfully');
			redirect(base_url().'View/Employee/');
		}
		}
		
	}

	// This Function For Insert Employee Wages
	public function EmployeeWage()
	{
		if($this->input->post('btnSubmit')=="Submit")
		{
			// If Post Request Then This Block Will Be Execute
			$object=array(
				'emp_id' => $this->input->post('ddlEmployee'),
				'wage' => $this->input->post('empdesig'),
				'work' => $this->input->post('txtWork'),
				'type' => $this->input->post('ddlPaymentMode')
			);
			$this->base_model->form_post('tbl_daily_wage',$object);
			$this->session->set_flashdata('success_log', 'Wage Submit Successfully');
			redirect('add/EmployeeWage','refresh');
		}
		// $data=array(
		// 	'employee_list' => $this->db->query("SELECT * FROM td_employee")->result(),
		// 	'head' => $this->load->view('elements/head','',true),
		// 	'header' => $this->load->view('elements/header','',true),
		// 	'left_sidebar' => $this->load->view('elements/left-sidebar','',true),
		// 	'maincontent' => $this->load->view('pageview/employee_wage_view',$data,true)
		// );;
		$data['employee_list'] = $this->db->query("SELECT * FROM td_employee")->result();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/pageview/employee_wage_view',$data,true);
		$this->load->view('layout-after-login',$data);   
	}
}
