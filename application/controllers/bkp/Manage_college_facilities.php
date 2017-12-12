<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_college_facilities extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		if(($this->session->userdata('is_admin_logged_in')!=1)&&($this->session->userdata('is_user_logged_in1')!=1))

		{

			redirect(base_url());	

		}
		
		$this->load->model('common_model');
	}
	################################################################
	function index()
	{
		$data['action'] = 'Update';
		
		$username = $this->session->userdata('username1');
		$user_details = $this->db->query("select * from td_users where username='$username'")->row();
		$college_cat = $user_details->college_cat;
		$college_id = $user_details->id;
		
		$table['name'] = 'td_college_facility';
		$conditions = array('college_id'=>$college_id);
		$data['facilities'] = $this->common_model->find_data($table,'array','',$conditions);

		$table['name'] = 'td_facilities';
		$data['rows'] = $this->common_model->find_data($table,'array');
		//echo '<pre>';print_r($data['facilities']);die;
		
		

		if($this->input->post('mode')=='site_setting')
		{	
			$concat_facility = implode(',', $this->input->post('facility'));
			$facility = explode(",", $concat_facility);			
			$str = 1;			
			foreach($facility as $facility)			
			{
				$post_array = array(
								'college_id'=>$college_id,
								'facility_id'=>$facility
								);
				//echo '<pre>';print_r($post_array);die;				
				$table['name'] = 'td_college_facility';
				$sucess = $this->common_model->save_data($table,$post_array,' ','id');		
							
			}
			
			

				
			if($sucess)
			{
				$this->session->set_flashdata('success_message','College facility successfully updated');
				redirect('admin/manage_college_facilities');
			}
			else
			{	
				redirect('admin/manage_college_facilities');
			}
		}		

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/facilities-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}	
}



