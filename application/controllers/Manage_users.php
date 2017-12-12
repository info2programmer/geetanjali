<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_users extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('is_admin_logged_in')!=1)

		{

			redirect(base_url());	

		}		
		$this->load->model(array('Common_model'));
	}

	################################################################

	function index()
	{
		$table['name'] = 'user';
		$data['rows'] = $this->Common_model->find_data($table,'array');

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-user-list-view',$data,true);
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
				'name' => $this->input->post('name'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'published' => 1,
				);
				$table['name'] = 'user';
				$data = $this->Common_model->save_data($table,$fields,'','id');
				if($data)
				{
				$this->session->set_flashdata('success_message','User successfully inserted');	
				redirect('admin/manage_users');
				}
			}
		}

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-user-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}

	######################################################################################

	

	function edit($id)
	{
		$data['action'] = 'Edit';		

		$conditions=array('id'=>$id);
		$table['name'] = 'user';
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
				'name' => $this->input->post('name'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
				);	

				$table['name'] = 'user';
				$data = $this->Common_model->save_data($table,$fields,$id,'id');
				if($data) {
				$this->session->set_flashdata('success_message','User successfully updated');	
				redirect('admin/manage_users');
				}
				else {
				redirect('admin/manage_users');	
				}
			}
		}

		

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-user-view',$data,true);
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
		$table['name'] = 'user';
		if($this->Common_model->delete_data($table,$id,'id'))
		{
			$this->session->set_flashdata('success_message','Department has been Deleted successfully.');
			redirect('admin/manage_users');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('admin/manage_users');
		}
	}	

	##############################################################################################	

	function deactive($id)
	{
		$postdata = array(
							'published' => 0
						);
		$table['name'] = 'user';
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'id');	

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','User successfully deactivated');
				redirect(base_url().'index.php/admin/manage_users');
			}
		else
			{
				redirect(base_url().'index.php/admin/manage_users');
		}
	}


	function active($id)
	{
		$postdata = array(
							'published' => 1
						);
		$table['name'] = 'user';	
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'id');
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','User successfully activated');
				redirect(base_url().'index.php/admin/manage_users');
			}
		else
			{
				redirect(base_url().'index.php/admin/manage_users');
			}
	}

	##############################################################################################

	

	function form_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
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



