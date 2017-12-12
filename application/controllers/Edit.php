<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {
function __construct(){
parent::__construct();
$this->load->model('base_model','Common_model');
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
	
	
	public function User($id)
	{
	
		if ( isset($_SESSION['user'])) {
	$service['data'] =  $this->db->query('select * from td_service where service_id = '.$id)->result_array();
	$query='select sa.*,c.*,s.* from td_service_assign sa JOIN td_client c JOIN td_service s where sa.notification_date<="'.date('Y-m-d').'" and sa.expiry_date>="'.date('Y-m-d').'" and sa.payment_status=0 and sa.type="many" and sa.status=1 AND c.client_id=sa.client_id and s.service_id=sa.service_id order by notification_date asc limit 5';
		$service['notify'] = $this->db->query($query)->result_array();	
		$service['total_notify'] = $this->db->query($query)->num_rows();
		$service['Users'] = $this->db->query('SELECT * FROM td_admin WHERE user!="admin" AND id='.$id)->result_array();	
	$this->load->view('edit_user',$service);
	}
	else {
	redirect(base_url().'index.php');
	}	
	}

	public function bank($id)
	{
		$conditions=array('bank_id'=>$id);
		$table['name'] = 'td_bank';
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		
		if($this->input->post('mode')=='tab')
		{
				$fields = array(
				'bank_name' => $this->input->post('bank_name'),
				'branch_name' => $this->input->post('branch_name'),
				'acc_no' => $this->input->post('acc_no'),
				'ifsc_no' => $this->input->post('ifsc_no'),
				'micr_no' => $this->input->post('micr_no')
				);	

				$table['name'] = 'td_bank';
				$data = $this->Common_model->save_data($table,$fields,$id,'bank_id');
				if($data) {
				$this->session->set_flashdata('success_message','Bank Details successfully updated');	
				redirect('view/Bank');
				}
				else {
				redirect('view/Bank');	
				}
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/bank-edit',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	public function Landlord($id)
	{
	
		if ( isset($_SESSION['user'])) {
	$service['data'] =  $this->db->query('select * from td_landlord where land_id = '.$id)->result_array();
		
	$this->load->view('edit_landlord',$service);
	}
	else {
	redirect(base_url().'index.php');
	}	
	}
	public function Trading($id)
	{
	
		if ( isset($_SESSION['user'])) {
	$service['data'] =  $this->db->query('select * from td_trading where trad_id = '.$id)->result_array();
		
	$this->load->view('edit_trading',$service);
	}
	else {
	redirect(base_url().'index.php');
	}	
	}
	

	public function Client($id)
	{
		$conditions=array('cl_id'=>$id);
		$table['name'] = 'td_client';
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		
		if($this->input->post('mode')=='tab')
		{
				$fields = array(
				'clname' => $this->input->post('clname'),
				'clemail' => $this->input->post('clemail'),
				'clphn' => $this->input->post('clphn'),
				'clpan' => $this->input->post('clpan'),
				'cgst' => $this->input->post('clgst'),
				'cladd' => $this->input->post('cladd')
				);	

				$table['name'] = 'td_client';
				$data = $this->Common_model->save_data($table,$fields,$id,'cl_id');
				if($data) {
				$this->session->set_flashdata('success_message','Client details successfully updated');	
				redirect('view/Client');
				}
				else {
				redirect('view/Client');	
				}
		}
		
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/client-edit',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	
	public function Company($id)
	{
		$conditions=array('cid'=>$id);
		$table['name'] = 'td_company';
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		
		if($this->input->post('mode')=='tab')
		{
			$administrative_details = $this->db->query("select * from td_company where cid='$id'")->row();
			$image_file = $administrative_details->pic;			
		
				
		
		
				$imge = $_FILES["cimg"]["name"];
				if($imge == '')	
				{	
					$image = $data['row']->pic;	
				}							
				else
				{
					$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);
		
					if(($imageFileType != "jpg")&&($imageFileType != "JPG")&&($imageFileType != "png")&&($imageFileType != "PNG")&&($imageFileType != "jpeg")&&($imageFileType != "JPEG")&&($imageFileType != "gif")&&($imageFileType != "GIF"))	
					{	
						$this->session->set_flashdata('err_message', 'Sorry, only jpg,png,jpeg files are allowed');	
						redirect(current_url());	
					}
						
					$image = time().$imge;	
					$temp = $_FILES["cimg"]["tmp_name"];
					$image_path = 'uploads/company/';
					move_uploaded_file($temp,$image_path.$image);				
				}
					
				$fields = array(
				'cname' => $this->input->post('cname'),
				'cemail' => $this->input->post('cemail'),
				'cphn' => $this->input->post('cphn'),
				'cpan' => $this->input->post('cpan'),
				'cgst' => $this->input->post('cgst'),
				'cadd' => $this->input->post('cadd'),
				'pic' => $image
				);	

				$table['name'] = 'td_company';
				$data = $this->Common_model->save_data($table,$fields,$id,'cid');
				if($data) {
				$this->session->set_flashdata('success_message','Company details successfully updated');	
				redirect('view/Company');
				}
				else {
				redirect('view/Company');	
				}
		}
		
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/company-edit',$data,true);
		$this->load->view('layout-after-login',$data); 
	}

	
	public function Editprofile()
     {
     if ( isset($_SESSION['user'])) {
     $service['data'] = $this->db->query('select * from td_admin')->result_array();
	 $query='select sa.*,c.*,s.* from td_service_assign sa JOIN td_client c JOIN td_service s where sa.notification_date<="'.date('Y-m-d').'" and sa.expiry_date>="'.date('Y-m-d').'" and sa.payment_status=0 and sa.type="many" and sa.status=1 AND c.client_id=sa.client_id and s.service_id=sa.service_id order by notification_date asc limit 5';	
		$service['notify'] = $this->db->query($query)->result_array();	
		$service['total_notify'] = $this->db->query($query)->num_rows();
		$service['pass'] = $this->db->query('SELECT * FROM td_pass_key')->result_array();
     $this->load->view('edit_profile',$service);
     }
    else {
    redirect(base_url().'index.php');
      }	
     }
	 
	public function unit($id)
    {
		$conditions=array('uid'=>$id);
		$table['name'] = 'td_unit';
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		
		if($this->input->post('mode')=='tab')
		{
				$fields = array(
				'stname' => $this->input->post('stname')
				);	

				$table['name'] = 'td_unit';
				$data = $this->Common_model->save_data($table,$fields,$id,'uid');
				if($data) {
				$this->session->set_flashdata('success_message','Unit successfully updated');	
				redirect('view/WeightUnit');
				}
				else {
				redirect('view/WeightUnit');	
				}
		}
		
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/unit-edit',$data,true);
		$this->load->view('layout-after-login',$data);     
	}
	
	public function Route($id)
    {
		$conditions=array('rid'=>$id);
		$table['name'] = 'td_route';
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		
		if($this->input->post('mode')=='tab')
		{
				$fields = array(
				'rname' => $this->input->post('rname'),
				'rno' => $this->input->post('rno'),
				'rdtl' => $this->input->post('rdtl')
				);	

				$table['name'] = 'td_route';
				$data = $this->Common_model->save_data($table,$fields,$id,'rid');
				if($data) {
				$this->session->set_flashdata('success_message','Route details successfully updated');	
				redirect('view/Route');
				}
				else {
				redirect('view/Route');	
				}
		}
		
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/route-edit',$data,true);
		$this->load->view('layout-after-login',$data);     
	}
	
	public function Supplier($id)
    {
		$conditions=array('cl_id'=>$id);
		$table['name'] = 'td_supplier';
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		
		if($this->input->post('mode')=='tab')
		{
				$fields = array(
				'clname' => $this->input->post('clname'),
				'clemail' => $this->input->post('clemail'),
				'clphn' => $this->input->post('clphn'),
				'clpan' => $this->input->post('clpan'),
				'cgst' => $this->input->post('clgst'),
				'cladd' => $this->input->post('cladd')
				);	

				$table['name'] = 'td_supplier';
				$data = $this->Common_model->save_data($table,$fields,$id,'cl_id');
				if($data) {
				$this->session->set_flashdata('success_message','Supplier details successfully updated');	
				redirect('view/Supplier');
				}
				else {
				redirect('view/Supplier');	
				}
		}
		
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/supplier-edit',$data,true);
		$this->load->view('layout-after-login',$data);     
	}
	
	public function Employee($id)
    {
		$conditions=array('emp_id'=>$id);
		$table['name'] = 'td_employee';
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		$empsal = $data['row']->emp_sal;
		if($this->input->post('mode')=='tab')
		{
				$fields = array(
				'emptype' => $this->input->post('emptype'),
				'name' => $this->input->post('name'),
				'phn' => $this->input->post('phn'),
				'email' => $this->input->post('email'),
				'empdesig' => $this->input->post('empdesig'),
				'addrs' => $this->input->post('addrs'),
				'emp_sal' => $this->input->post('emp_sal')
				);	
				
				$table['name'] = 'td_employee';
				$data = $this->Common_model->save_data($table,$fields,$id,'emp_id');
			
					if($this->input->post('emp_sal')!=$empsal)
					{
						$fields1 = array(
							'emp_id' => $id,
							'present_sal' => $this->input->post('emp_sal'),
							'prev_sal' => $empsal
							);	
			
						$table['name'] = 'employee_salary';
						$data = $this->Common_model->save_data($table,$fields1,'','emp_sal_id');	
					}
				$this->session->set_flashdata('success_message','Employee details successfully updated');	
				redirect('view/Employee');
		}
		
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/employee-edit',$data,true);
		$this->load->view('layout-after-login',$data);     
	}
	
	public function Store($id)
    {
		$conditions=array('st_id'=>$id);
		$table['name'] = 'td_store';
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		
		if($this->input->post('mode')=='tab')
		{
				$fields = array(
				'stname' => $this->input->post('stname'),
				'stno' => $this->input->post('stno'),
				'stkeep' => $this->input->post('stkeep')
				);	

				$table['name'] = 'td_store';
				$data = $this->Common_model->save_data($table,$fields,$id,'st_id');
				if($data) {
				$this->session->set_flashdata('success_message','Store details successfully updated');	
				redirect('view/Store');
				}
				else {
				redirect('view/Store');	
				}
		}
		
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/store-edit',$data,true);
		$this->load->view('layout-after-login',$data);     
	}
	
	public function Store_allocation($id)
    {
		$conditions=array('st_al_id'=>$id);
		$table['name'] = 'td_store_allocate';
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		
		if($this->input->post('mode')=='tab')
		{
			$stname = explode("-",$this->input->post('stname'));
			
				$fields = array(
				'stname' => $stname[1],
				'item_name' => $this->input->post('item_name')
				);	
				
				$table['name'] = 'td_store_allocate';
				$data = $this->Common_model->save_data($table,$fields,$id,'st_al_id');
				if($data) {
				$this->session->set_flashdata('success_message','Store allocation successfully updated');	
				redirect('view/StoreAllocation');
				}
				else {
				redirect('view/StoreAllocation');	
				}
		}
		
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/store-allocate-edit',$data,true);
		$this->load->view('layout-after-login',$data);     
	}
	
	public function incentiveRange($id)
	{
		$conditions=array('incset_id'=>$id);
		$table['name'] = 'td_inc_settings';
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		
		if($this->input->post('mode')=='tab')
		{
		
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
				$table['name'] = 'td_inc_settings';
				$data = $this->Common_model->save_data($table,$fields,$id,'incset_id');
				if($data) {
				$this->session->set_flashdata('success_message','Bank Details successfully updated');	
				redirect('view/incentiveSettings');
				}
				else {
				redirect('view/incentiveSettings');	
				}
		}
		
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('pages/inc-settings-edit',$data,true);
		$this->load->view('layout-after-login',$data);
	}
}
