<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_facilities extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if(($this->session->userdata('is_admin_logged_in')!=1)&&($this->session->userdata('is_user_logged_in1')!=1))

		{

			redirect(base_url());	

		}		
		$this->load->model(array('Common_model'));
	}

	################################################################

	function index()
	{
		$table['name'] = 'td_facilities';
		$data['rows'] = $this->Common_model->find_data($table,'array');

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-facilities-list-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}

	######################################################################################	

	function add()
	{	

		$data['action'] = 'Add';

		if($this->input->post('mode')=='tab')
		{
			if($this->form_validate() == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{
				$fields = array(
				'facilities_name' => $this->input->post('facilities_name'),
				'published'		=> 1
				);
				$table['name'] = 'td_facilities';
				$data = $this->Common_model->save_data($table,$fields,'','facilities_id');
				if($data)
				{
				$this->session->set_flashdata('success_message','Facilities successfully inserted');	
				redirect('admin/manage_facilities');
				}
			}
		}

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-facilities-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}

	######################################################################################

	

	function edit($id)
	{
		$data['action'] = 'Edit';		

		$conditions=array('facilities_id'=>$id);
		$table['name'] = 'td_facilities';
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		if($this->input->post('mode')=='tab')
		{
			if($this->form_validate() == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{
				$fields = array(
				'facilities_name' => $this->input->post('facilities_name'),
				'published'		=> 1
				);	

				$table['name'] = 'td_facilities';
				$data = $this->Common_model->save_data($table,$fields,$id,'facilities_id');
				$this->session->set_flashdata('success_message','Facilities successfully updated');	
				redirect('admin/manage_facilities');
			}
		}

		

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-facilities-view',$data,true);
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
		$table['name'] = 'td_facilities';
		if($this->Common_model->delete_data($table,$id,'facilities_id'))
		{
			$this->session->set_flashdata('success_message','Facilities has been Deleted successfully.');
			redirect('admin/manage_facilities');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('admin/manage_facilities');
		}
	}	

	##############################################################################################	

	function deactive($id)
	{
		$postdata = array(
							'published' => 0
						);
		$table['name'] = 'td_facilities';
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'facilities_id');	

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Facilities successfully deactivated');
				redirect('admin/manage_facilities');
			}
		else
			{
				redirect('admin/manage_facilities');			
		}
	}


	function active($id)
	{
		$postdata = array(
							'published' => 1
						);
		$table['name'] = 'td_facilities';	
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'facilities_id');
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Facilities successfully activated');
				redirect('admin/manage_facilities');
			}
		else
			{
				redirect('admin/manage_facilities');
			}
	}

	##############################################################################################

	

	function form_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('facilities_name', 'Facilities Name', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			return FALSE;
		}
		else
		{
			return true;
		}
	}

	

	##################################################################################################

	

	

	

}



