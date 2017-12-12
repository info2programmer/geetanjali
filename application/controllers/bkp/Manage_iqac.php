<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Manage_iqac extends CI_Controller {

	function __construct()

	{

		parent::__construct();

		

		if($this->session->userdata('is_admin_logged_in')!=1)

		{

			redirect(base_url()."admin/user/login");	

		}

		$this->load->model(array('Common_model'));

	}

	################################################################

	function index()

	{

		$table['name']='td_iqac';

		$data['rows'] = $this->Common_model->find_data($table,'array');

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/manage-iqac-list-view',$data,true);

		$this->load->view('admin/layout-after-login',$data);

	}

	######################################################################################

	

	function add()

	{

		$data['action'] = 'Add';

	
		

		/* for insert sub-committee */

		if($this->input->post('mode')=='IQAC') { 		

					if($this->form_validate() == FALSE)

					{

						$data['error_message']=validation_errors();

					}

					else

					{

						$postdata = array(
											'member_name'=>$this->input->post('member_name'),

											'designation'=>$this->input->post('designation'),

											'published'=> 1

											);

						$table['name'] = 'td_iqac';		

						$success = $this->Common_model->save_data($table,$postdata,'','id');						

						if($success)

						{	

							$this->session->set_flashdata('success_message','IQAC successfully inserted');	

							redirect('admin/manage_iqac');

						}

						else

						{	

							$this->session->set_flashdata('error_message','Please try again.');		

							redirect(current_url());					

						}	

					}

		}

		/* for insert sub-committee */

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-iqac-view',$data,true);

		

		

		

		$this->load->view('admin/layout-after-login',$data);

	}

	######################################################################################

	

	function edit($id)

	{

		$data['action'] = 'Edit';
		
		

		$table['name'] = 'td_iqac';

		$conditions=array('td_iqac.id'=>$id);

		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions,'*');
		

		/* for update sub_committee */		

					if($this->form_validate() == FALSE)

					{

						$data['error_message']=validation_errors();

					}

					else

					{

						$postdata = array(
											'member_name'=>$this->input->post('member_name'),

											'designation'=>$this->input->post('designation'),

											'published'=> 1

											);

						$table['name'] = 'td_iqac';		

						$success = $this->Common_model->save_data($table,$postdata,$id,'id');		

						if($success)

						{	

							$this->session->set_flashdata('success_message','IQAC successfully updated');	

							redirect('admin/manage_iqac');

						}

						else

						{	

							//$this->session->set_flashdata('error_message','Invalid username or password! Please try again.');		

							//redirect(current_url());	

							redirect('admin/manage_iqac');				

						}	

					}

		/* for insert sub_committee */

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-iqac-view',$data,true);

		

		

		

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

		$table['name'] = 'td_iqac';

		if($this->Common_model->delete_data($table,$id,'id'))

		{

			$this->session->set_flashdata('success_message','Record has been Deleted successfully.');

			redirect('admin/manage_iqac');

		}

		else

		{

			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');

			redirect('admin/manage_iqac');

		}

	}

	

	##############################################################################################

	

	

	function deactive($id)

	{

		

		

		$postdata = array(

							'published' => 0

						);

		$table['name'] = 'td_iqac';				

		$deactive = $this->Common_model->save_data($table,$postdata,$id,'id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','IQAC successfully deactivated');	

				redirect('admin/manage_iqac');

			}

		else

			{	

				redirect('admin/manage_iqac');					

			}

	}

	

	function active($id)

	{

		

		

		$postdata = array(

							'published' => 1

						);

		$table['name'] = 'td_iqac';	

		$deactive = $this->Common_model->save_data($table,$postdata,$id,'id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','IQAC successfully activated');	

				redirect('admin/manage_iqac');

			}

		else

			{	

				redirect('admin/manage_iqac');				

			}

	}

	

	

	

	###############################################################################################

	

	

	function form_validate()

	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('member_name', 'Member Name', 'required');

		$this->form_validation->set_rules('designation', 'Designation', 'required');

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



