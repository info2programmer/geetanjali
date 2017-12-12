<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_department extends CI_Controller {
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
		$user_id = $this->session->userdata('user_id1');
		$table['name'] = 'td_department';
		$conditions = array('college_id'=>$user_id);
		$data['rows'] = $this->Common_model->find_data($table,'array','',$conditions);

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-department-list-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}

	######################################################################################	

	function add()
	{	

		$data['action'] = 'Add';
		
		$username = $this->session->userdata('username1');
		$user_details = $this->db->query("select * from td_users where username='$username'")->row();
		$college_cat = $user_details->college_cat;
		$college_id = $user_details->id;
		
		$select = 'discipline_id,discipline_name';
		$conditions=array('published'=>1,'college_category'=>$college_cat);
		$order_by[0] = array('field'=>'discipline_id','type'=>'ASC');
		$table['name']='discipline';
		$list = array('empty_name'=>' department Name','key'=>'discipline_id','value'=>'discipline_name');
		$data['departments']=$this->Common_model->find_data($table,'list',$list,$conditions,$select,'','',$order_by);

		if($this->input->post('mode')=='tab')
		{
			if($this->form_validate() == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{
				$fields = array(
				'discipline_id' => $this->input->post('discipline_id'),
				'college_id' => $college_id,
				'intake' => $this->input->post('intake'),
				'published'		=> 1
				);
				$table['name'] = 'td_department';
				$data = $this->Common_model->save_data($table,$fields,'','department_id');
				if($data)
				{
				$this->session->set_flashdata('success_message','Department successfully inserted');	
				redirect('admin/manage_department');
				}
			}
		}

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-department-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}

	######################################################################################

	

	function edit($id)
	{
		$data['action'] = 'Edit';
		
		$username = $this->session->userdata('username1');
		$user_details = $this->db->query("select * from td_users where username='$username'")->row();
		$college_cat = $user_details->college_cat;
		$college_id = $user_details->id;
		
		$select = 'discipline_id,discipline_name';
		$conditions=array('published'=>1,'college_category'=>$college_cat);
		$order_by[0] = array('field'=>'discipline_id','type'=>'ASC');
		$table['name']='discipline';
		$list = array('empty_name'=>' department Name','key'=>'discipline_id','value'=>'discipline_name');
		$data['departments']=$this->Common_model->find_data($table,'list',$list,$conditions,$select,'','',$order_by);		

		$conditions=array('department_id'=>$id);
		$table['name'] = 'td_department';
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
				'discipline_id' => $this->input->post('discipline_id'),
				'college_id' => $college_id,
				'intake' => $this->input->post('intake'),
				'published'		=> 1
				);
				//echo '<pre>';print_r($fields);die;
				$table['name'] = 'td_department';
				$data = $this->Common_model->save_data($table,$fields,$id,'department_id');
				$this->session->set_flashdata('success_message','Department successfully updated');	
				redirect('admin/manage_department');
			}
		}

		

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-department-view',$data,true);
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
		$table['name'] = 'td_department';
		if($this->Common_model->delete_data($table,$id,'department_id'))
		{
			$this->session->set_flashdata('success_message','Department has been Deleted successfully.');
			redirect('admin/manage_department');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('admin/manage_department');
		}
	}	

	##############################################################################################	

	function deactive($id)
	{
		$postdata = array(
							'published' => 0
						);
		$table['name'] = 'td_department';
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'department_id');	

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Department successfully deactivated');
				redirect('admin/manage_department');
			}
		else
			{
				redirect('admin/manage_department');			
		}
	}


	function active($id)
	{
		$postdata = array(
							'published' => 1
						);
		$table['name'] = 'td_department';	
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'department_id');
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Department successfully activated');
				redirect('admin/manage_department');
			}
		else
			{
				redirect('admin/manage_department');
			}
	}

	##############################################################################################

	

	function form_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('discipline_id', 'Department Name', 'required');
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



