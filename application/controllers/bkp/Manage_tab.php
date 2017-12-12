<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Manage_tab extends CI_Controller {

	function __construct()

	{

		parent::__construct();

		if($this->session->userdata('is_admin_logged_in')!=1)

		{

			redirect(base_url()."admin/user/login");	

		}		

		

		$this->load->model(array('common_model'));

	}

	################################################################

	function index()

	{

		$table['name'] = 'td_tabs';		

		$data['rows'] = $this->common_model->find_data($table,'array');

		

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/manage-tab-list-view',$data,true);

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

				'tab_name' => $this->input->post('tab_name'),

				'published'		=> 1

				);

				$table['name'] = 'td_tabs';

				$data = $this->common_model->save_data($table,$fields,'','id');

				if($data)

				{			

				$this->session->set_flashdata('success_message','Non-Teaching Staff Category successfully inserted');	

				redirect('admin/manage_tab');

				}

			}

			

		}

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-tab-view',$data,true);

		

		

		

		$this->load->view('admin/layout-after-login',$data);

	}

	######################################################################################

	

	function edit($id)

	{

		$data['action'] = 'Edit';

		

		$conditions=array('id'=>$id);

		$table['name'] = 'td_tabs';

		$data['row'] = $this->common_model->find_data($table,'row','',$conditions);

		if($this->input->post('mode')=='tab')

		{

			if($this->form_validate() == FALSE)

			{

				$data['error_message']=validation_errors();

			}

			else

			{

				$fields = array(

				'tab_name' => $this->input->post('tab_name'),

				'published'		=> 1

				);		

				

				

				$table['name'] = 'td_tabs';

				$data = $this->common_model->save_data($table,$fields,$id,'id');

				

				$this->session->set_flashdata('success_message','Non-Teaching Staff Category successfully updated');	

				redirect('admin/manage_tab');				

			}

		}

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-tab-view',$data,true);

		

		

		

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

		$table['name'] = 'td_tabs';

		if($this->common_model->delete_data($table,$id,'id'))

		{

			$this->session->set_flashdata('success_message','Non-Teaching Staff Category has been Deleted successfully.');

			redirect('admin/manage_tab');

		}

		else

		{

			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');

			redirect('admin/manage_tab');

		}

	}

	

	##############################################################################################

	

	function deactive($id)

	{

		

		

		$postdata = array(

							'published' => 0

						);

		$table['name'] = 'td_tabs';				

		$deactive = $this->common_model->save_data($table,$postdata,$id,'id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','Non-Teaching Staff Category successfully deactivated');	

				redirect('admin/manage_tab');

			}

		else

			{	

				redirect('admin/manage_tab');					

			}

	}

	

	function active($id)

	{

		

		

		$postdata = array(

							'published' => 1

						);

		$table['name'] = 'td_tabs';	

		$deactive = $this->common_model->save_data($table,$postdata,$id,'id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','Non-Teaching Staff Category successfully activated');	

				redirect('admin/manage_tab');

			}

		else

			{	

				redirect('admin/manage_tab');				

			}

	}

	

	##############################################################################################

	

	function form_validate()

	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('tab_name', 'Tab Name', 'required');

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



