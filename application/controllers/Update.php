<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {
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
	
public function Bank()
	{
	if ( isset($_SESSION['user'])) {
		$cid = $this->input->post('cid');
		$service = $this->input->post('txt_area');
		$client = $this->input->post('txt_landmark');
		$agg_per = $this->input->post('txt_address');
		$rent_amt = $this->input->post('txt_client');
		$rmarks = $this->input->post('txt_ag_per');
		$num = $this->db->query("SELECT * FROM td_bank WHERE area_id=".$cid)->result_array();
		$uni = explode('/',$num[0]['uni_code']);
		$nw_uni =  substr($service,0,4).'/'.substr($client,0,4).'/BELL/'.$uni[3];
		
		$fields = array(
			'area_name' => $service,
			'uni_code' => $nw_uni,
			'c_name' => $client,
			'ag_p' => $agg_per,
			'rent_amt' => $rent_amt,
			'rmrks' => $rmarks
		);
		$service = $this->base_model->area_update('td_bank',$fields,$cid);
		if($service)
		{
		redirect(base_url().'index.php/view/Bank');
		}
		}
		else {
		redirect(base_url().'index.php');
		}
	}

	public function Client()
	{
	if ( isset($_SESSION['user'])) {
		$cid = $this->input->post('cid');
		$name = $this->input->post('txt_client');
		$phn1 = $this->input->post('txt_phn');
		$email1 = $this->input->post('txt_email');
		$add1 = $this->input->post('txt_address');
		$cl_nick = $this->input->post('txt_nick_name');
		$cl_vat = $this->input->post('txt_vat_no');
		$cl_pan = $this->input->post('txt_pan_no');
		$cl_st = $this->input->post('txt_st_no');
		if($phn1 == '') {
			$phn = 'N/A';
		} else {
			$phn = $this->input->post('txt_phn');
		}
		if($email1 == '') {
			$email = 'N/A';
		} else {
			$email = $this->input->post('txt_email');
		}
		if($add1 == '') {
			$add = 'N/A';
		} else {
			$add = $this->input->post('txt_address');
		}
		$fields = array(
			'client_name' => $name,
			'client_ph' => $phn,
			'client_email' => $email,
			'client_address' => $add,
			'client_nick' => $cl_nick,
			'client_vat' => $cl_vat,
			'client_pan' => $cl_pan,
			'client_st' => $cl_st
		);
		$service = $this->base_model->client_update('td_client',$fields,$cid);
		if($service)
		{
		redirect(base_url().'index.php/view/Client');
		}
		}
		else {
		redirect(base_url().'index.php');
		}
	}
	public function Company()
	{
	if ( isset($_SESSION['user'])) {
		$cid = $this->input->post('cid');
		$name = $this->input->post('txt_client');
		$phn1 = $this->input->post('txt_phn');
		$email1 = $this->input->post('txt_email');
		$pan = $this->input->post('txt_pan');
		$sa = $this->input->post('txt_sa');
		$vat = $this->input->post('txt_vat');
		
		$fields = array(
			'com_name' => $name,
			'com_ph' => $phn1,
			'com_email' => $email1,
			'pan' => $pan,
			'sa' => $sa,
			'vat' => $vat
		);
		$service = $this->base_model->company_update('td_company',$fields,$cid);
		if($service)
		{
		redirect(base_url().'index.php/view/Company');
		}
		}
		else {
		redirect(base_url().'index.php');
		}
	}
	public function returnPurchase() {
	$cid = $this->input->post('hidbill');
		$item_id = $this->input->post('itemval');
		
		$ret_unit = array_values(array_filter($this->input->post('r_unit')));
		$ret_rmrk = array_values(array_filter($this->input->post('remark')));
		$itemCount = count($item_id);
		for($i=0;$i<$itemCount;$i++){
		$billDtl = $this->db->query('SELECT * FROM td_purchase_bill WHERE p_bill_id='.$cid)->result_array();
		$bill_numb = $billDtl[0]['p_bill_no'];
		$itmdtl = $this->db->query('SELECT * FROM td_purchase_item WHERE item_id='.$item_id[$i])->result_array();
		$itemName = $itmdtl[0]['item_name'];
		$stk_dtl = $this->db->query('SELECT * FROM td_stock WHERE stock_item="'.$itemName.'"')->result_array();
		$item_totalStk = $stk_dtl[0]['stock_qty'];
		$pamount = $itmdtl[0]['item_p_total_amt'];
		$pqty = $itmdtl[0]['item_p_qty'];
		$Ppriceunit = $itmdtl[0]['item_unit_p_price'];
		$priceDeduct = $ret_unit[$i]*$Ppriceunit;
		$priceNew = $pamount-$priceDeduct;
		$pqtyDeduct = $pqty-$ret_unit[$i];
		$fields = array(
			'item_p_total_amt' => $priceNew,
			'item_p_qty' => $pqtyDeduct,
			'ret_date' => date('Y-m-d'),
			'remark' => $ret_rmrk[$i],
			'return_unit' => $ret_unit[$i],
			'return_price' => $priceDeduct,
			'return_type' => 'Purchase'
		);
		//print_r($fields);die;exit;
		$service = $this->base_model->item_update('td_purchase_item',$fields,$item_id[$i]);
		$fieldsins = array(
			'item_id' => $item_id[$i],
			'ret_date' => date('Y-m-d'),
			'remark' => $ret_rmrk[$i],
			'return_unit' => $ret_unit[$i],
			'return_price' => $priceDeduct,
			'return_type' => 'Purchase'
		);
		$serviceUp = $this->base_model->form_post('td_return_details',$fieldsins);
		$newBillAmt = $billDtl[0]['p_bill_total']-$priceDeduct;
		$upBill = $this->db->query('UPDATE td_purchase_bill SET p_bill_total="'.$newBillAmt.'",returnstat=1,returnAmt="'.$priceDeduct.'" WHERE p_bill_id="'.$cid.'"');
		$newItem_stock = $item_totalStk-$ret_unit[$i];
		$stk_update = $this->db->query('UPDATE td_stock SET stock_qty="'.$newItem_stock.'" WHERE stock_item="'.$itemName.'"');
		
		$d = date("d");$m = date("m");
		$cbno = "CB/PR/".$cid.$d.$m;
		$lfno = "LF/PR/".$cid.$d.$m;
		
		
		$fields_finance = array(
			'bill_id' => $cid,
			'bill_no' => $bill_numb,
			'cb_no' => $cbno,
			'lf_no' => $lfno,
			'finance_type' => 'Purchase Return',
			'transaction_type' => 'Credit',
			'amount' => $priceDeduct,
			'entry_date' => date('Y-m-d')
			
		);
		$service1 = $this->base_model->form_post('td_finance',$fields_finance);
		
		}
		if($stk_update)
			{
			redirect(base_url().'index.php/view/Purchase');
			}
	
	}
	
	public function returnSale() {
	$cid = $this->input->post('hidbill');
		$item_id = $this->input->post('itemval');
		
		$ret_unit = array_values(array_filter($this->input->post('r_unit')));
		$ret_rmrk = array_values(array_filter($this->input->post('remark')));
		$itemCount = count($item_id);
		for($i=0;$i<$itemCount;$i++){
		$billDtl = $this->db->query('SELECT * FROM td_sales_bill WHERE p_bill_id='.$cid)->result_array();
		$bill_numb = $billDtl[0]['p_bill_no'];
		$itmdtl = $this->db->query('SELECT * FROM td_sales_item WHERE item_id='.$item_id[$i])->result_array();
		$itemName = $itmdtl[0]['item_name'];
		$stk_dtl = $this->db->query('SELECT * FROM td_stock WHERE stock_item="'.$itemName.'"')->result_array();
		$item_totalStk = $stk_dtl[0]['stock_qty'];
		$pamount = $itmdtl[0]['item_p_total_amt'];
		$pqty = $itmdtl[0]['item_p_qty'];
		$Ppriceunit = $itmdtl[0]['item_unit_p_price'];
		$priceDeduct = $ret_unit[$i]*$Ppriceunit;
		$priceNew = $pamount-$priceDeduct;
		$pqtyDeduct = $pqty-$ret_unit[$i];
		$fields = array(
			'item_p_total_amt' => $priceNew,
			'item_s_total' => $priceNew,
			'item_p_qty' => $pqtyDeduct,
			'ret_date' => date('Y-m-d'),
			'remark' => $ret_rmrk[$i],
			'return_unit' => $ret_unit[$i],
			'return_price' => $priceDeduct
		);
		//print_r($fields);die;exit;
		$service = $this->base_model->item_update('td_sales_item',$fields,$item_id[$i]);
		$fieldsins = array(
			'item_id' => $item_id[$i],
			'ret_date' => date('Y-m-d'),
			'remark' => $ret_rmrk[$i],
			'return_unit' => $ret_unit[$i],
			'return_price' => $priceDeduct,
			'return_type' => 'Sales'
		);
		$serviceUp = $this->base_model->form_post('td_return_details',$fieldsins);
		$newBillAmt = $billDtl[0]['p_bill_total']-$priceDeduct;
		$upBill = $this->db->query('UPDATE td_sales_bill SET p_bill_total="'.$newBillAmt.'",returnstat=1,returnAmt="'.$priceDeduct.'" WHERE p_bill_id="'.$cid.'"');
		$newItem_stock = $item_totalStk+$ret_unit[$i];
		$stk_update = $this->db->query('UPDATE td_stock SET stock_qty="'.$newItem_stock.'" WHERE stock_item="'.$itemName.'"');
		
		$d = date("d");$m = date("m");
		$cbno = "CB/SR/".$cid.$d.$m;
		$lfno = "LF/SR/".$cid.$d.$m;
		
		
		$fields_finance = array(
			'bill_id' => $cid,
			'bill_no' => $bill_numb,
			'cb_no' => $cbno,
			'lf_no' => $lfno,
			'finance_type' => 'Sale Return',
			'transaction_type' => 'Debit',
			'amount' => $priceDeduct,
			'entry_date' => date('Y-m-d')
			
		);
		$service3 = $this->base_model->form_post('td_finance',$fields_finance);
		
		}
		if($service3)
			{
			redirect(base_url().'index.php/view/Sales');
			}
	
	}

	// This Function To Update Deu Amount
	public function PayDeuAmount($id,$amount,$project_id,$emp_id,$due_amount)
	{
		$object=array(
			'paid_amount' => $amount,
			'due_amount' => 0
		);
		$this->db->where('id', $id);
		$this->db->update('tbl_payment_data', $object);

		$particulars="Pay Employee With Id- ".$emp_id." and deduct amount ".$due_amount;
			$decuttion=array(
				'project_id' => $project_id,
				'company_id' => $this->session->userdata('user_id'),
				'amount' => $due_amount,
				'particulars' => $particulars,
				'date' => date('Y-m-d'),
				'time' => date('h:i:sa')
			);
		$this->base_model->insert_deduction_history($decuttion);

		// Update Amount To Project Table
		$this->update_project_amount($project_id,$due_amount);
		
		$this->session->set_flashdata('success_log', 'Pay Update Successfully');
		
		redirect('view/WageReport');
		
	}

		// this function for update project_current amount
	private function update_project_amount($project_id,$amount){
		$project_current_amount=$this->db->query('SELECT * FROM tbl_project WHERE project_id='.$project_id)->result_array();
		// echo $project_current_amount ;
		// die;
		$amt=(float)$project_current_amount[0]['current_amount']-(float)$amount;

		$object=array(
			'current_amount' =>$amt
		);
		$this->db->where('project_id', $project_id);
		$this->db->update('tbl_project', $object);

	}



	// This function for deny request
	public function Denyrequest($pid)
	{
		$this->base_model->DeletePurchase($pid);
		redirect('view/Purchase','refresh');
		
	}

	// This Function For Confirm Order Request
	public function UpdatePurchaseRequest()
	{
		$txtTotalOrderAmount=$this->input->post('txtTotalOrderAmount');
		$txtPurchaseId=$this->input->post('txtPurchaseId');
		$txtAmount=$this->input->post('txtAmount');
		$txtProjectID=$this->input->post('txtProjectID');
		$txtInvoiceNumber=$this->input->post('txtInvoiceNumber');
		$txtDueAmount=$this->input->post('txtDueAmount');

		// this function for update project current amount
		$project_current_amount=$this->db->query('SELECT * FROM tbl_project WHERE project_id='.$txtProjectID)->result_array();
		// echo $project_current_amount ;
		// die;
		$amt=(float)$project_current_amount[0]['current_amount']-(float)$txtAmount;

		$object=array(
			'current_amount' =>$amt
		);
		$this->db->where('project_id', $txtProjectID);
		$this->db->update('tbl_project', $object);

		// This Function For Indser Deduct Amount History
		$particulars="Purchase Invoice- ".$txtInvoiceNumber." and deduct amount ".$txtAmount." Payment Mode :".$this->input->post('ddlPaymentMode')." Cheque-Number : ".$this->input->post('txtChequeNumber')." Bank Name : ".$this->input->post('txtBankName')." Branch-Name : ".$this->input->post('txtBranch')." IFSC Code : ".$this->input->post('txtIFSC');
		$decuttion=array(
			'project_id' => $txtProjectID,
			'company_id' => $this->session->userdata('user_id'),
			'amount' => $txtAmount,
			'particulars' => $particulars,
			'date' => date('Y-m-d'),
			'time' => date('h:i:sa')
		);

		$this->base_model->insert_deduction_history($decuttion);


		// This For Update In Parchase Table
		if($txtDueAmount!="")
		{
			$txtTotalOrderAmount=$txtDueAmount;
		}
		$updatePbillData=array(
			'due_amt' => (float)$txtTotalOrderAmount-(float)$txtAmount,
			'request_status' => 1
		);
		
		$this->db->where('p_bill_id', $txtPurchaseId);
		$this->db->update('td_purchase_bill',$updatePbillData);

		
		redirect('View/PurchaseItems/'.$txtPurchaseId,'refresh');
		
		
	}

	// This Function for Deny Workr Order request
	public function DenyWorkrequest($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_work_order');	
		$this->session->set_flashdata('success_log','Request Delete Successfully');
		redirect('View/Labourworkorder','refresh');
			
	}

	// this function update workorder amount
	public function updateWorkorderAmount()
	{
		$txtAmount=$this->input->post('txtAmount');
		$txtOrderId=$this->input->post('txtOrderId');
		$txtBaseAmount=$this->input->post('txtBaseAmount');
		$txtDueAmount=$this->input->post('txtDueAmount');
		$txtProjectId=$this->input->post('txtProjectId');
		$txtBill=$this->input->post('txtBill');
		
		$current_amt=0;

		if((float)$txtDueAmount<=0){
			$current_amt=(float)$txtBaseAmount-(float)$txtAmount;
		}
		else{
			$current_amt=(float)$txtDueAmount-(float)$txtAmount;
		}

		$this->db->where('id',$txtOrderId);
		$obj=array(
			'request_status' => 1,
			'deu_amount' => $current_amt
		);
		$this->db->update('tbl_work_order', $obj);
		
		// This Function For Indser Deduct Amount History
		$particulars="Workorder Confirmed With Invoice No - ".$txtBill." and deduct amount ".$current_amt;
		$decuttion=array(
			'project_id' => $txtProjectId,
			'company_id' => $this->session->userdata('user_id'),
			'amount' => $current_amt,
			'particulars' => $particulars,
			'date' => date('Y-m-d'),
			'time' => date('h:i:sa')
		);

		$this->base_model->insert_deduction_history($decuttion);
		
		$this->session->set_flashdata('success_log', 'Amount Update');
		
		redirect('View/LabourworkorderId/'.$txtOrderId);
	}

	
	
}