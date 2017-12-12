<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_review extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
		if(($this->session->userdata('is_admin_logged_in')!=1)&&($this->session->userdata('is_user_logged_in1')!=1))

		{

			redirect(base_url());	

		}
		
		$this->load->model(array('common_model'));
	}
	################################################################
	function index()
	{
		$table['name'] = 'td_review_ratings';
		$data['rows'] = $this->common_model->find_data($table,'array');
		
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-review-list-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}
	######################################################################################
	
	
	function edit($id)
	{
		$data['action'] = 'Edit';
		
		
		$conditions=array('id'=>$id);
		$table['name'] = 'td_review_ratings';
		$data['row'] = $this->common_model->find_data($table,'row','',$conditions);
		
		if($this->input->post('mode')=='coupon')
		{				
			$fields = array(
			'review_name' => $this->input->post('review_name'),
			'review_email' => $this->input->post('review_email'),
			'review_description' => $this->input->post('review_description'),
			'review_rate' => $this->input->post('review_rate'),
			'review_date' => date('Y-m-d')
			);
			//echo '<pre>';print_r($fields);die;
			
			$table['name'] = 'td_review_ratings';
			$data = $this->common_model->save_data($table,$fields,$id,'id');
			if($data)
			{			
				$this->session->set_flashdata('success_message','Review successfully updated');	
				redirect('admin/manage_review');
			}
			else
			{
				redirect('admin/manage_review');
			}
				
			
		}
		/* for insert city */
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-review-view',$data,true);
		
		
		
		$this->load->view('admin/layout-after-login',$data);
	}
	######################################################################################
	
	function confirmDelete($id)
	{
		if($this->session->flashdata('success_message'))
		{
			$data['success_message'] =  $this->session->flashdata('success_message');
		}
		if($this->session->flashdata('error_message'))
		{
			$data['error_message'] =  $this->session->flashdata('error_message');
		}
		
		
		
		$table['name'] = 'td_review_ratings';
		if($this->common_model->delete_data($table,$id,'id'))
		{
			$this->session->set_flashdata('success_message','Review has been Deleted successfully.');
			redirect('admin/manage_review');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('admin/manage_review');
		}
	}
	
	##############################################################################################
	
	
	function deactive($id)

	{

		$postdata = array(

							'published' => 0

						);

		$table['name'] = 'td_review_ratings';

		$deactive = $this->common_model->save_data($table,$postdata,$id,'id');

		if($deactive)

		{	

				$this->session->set_flashdata('success_message','Review rejected');

				redirect('admin/manage_review');

		}

		else

		{	

				redirect('admin/manage_review');

		}



	}




	function active($id)

	{

		$postdata = array(

							'published' => 1

						);

		$table['name'] = 'td_review_ratings';	

		$deactive = $this->common_model->save_data($table,$postdata,$id,'id');

		if($deactive)

		{	

				$this->session->set_flashdata('success_message','Review accepted');	

				redirect('admin/manage_review');

		}

		else

		{	

				redirect('admin/manage_review');

		}

	}

	

	##############################################################################################
	
	
	
	
}

