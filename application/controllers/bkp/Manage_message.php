<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_message extends CI_Controller {
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
		$username = $this->session->userdata('username1');
		$user_details = $this->db->query("select * from td_users where username='$username'")->row();
		$college_cat = $user_details->college_cat;
		$college_id = $user_details->id;
		$data['clg_id'] = $user_details->id;
		
		
		$data['unread'] = $this->db->query("select * from td_message_details where college_id='$college_id' and is_read=0")->num_rows();	
		
		$data['rows'] = $this->db->query("select a.*,b.*,a.message_id as main_id from td_messages as a inner join td_message_details as b on b.message_id=a.message_id where a.college_id='$college_id' group by b.message_id")->result();

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-message-list-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}

	######################################################################################	
	
	function view($id)
	{
		$data['action'] = 'View';
		
		$username = $this->session->userdata('username1');
		$user_details = $this->db->query("select * from td_users where username='$username'")->row();
		$college_cat = $user_details->college_cat;
		$college_id = $user_details->id;
		$data['clg_id'] = $user_details->id;
		
		$table['name'] = 'td_message_details';
		$update_array = array('is_read'=>1);
		$succ = $this->Common_model->save_data($table,$update_array,$id,'message_id');
		
		$data['row'] = $this->db->query("select * from td_message_details where message_id='$id'")->row();
		$data['rows'] = $this->db->query("select a.*,b.* from td_messages as a inner join td_message_details as b on b.message_id=a.message_id where b.message_id='$id'")->result();
		//echo '<pre>';print_r($data['rows']);die;
		
		if($this->input->post('mode')=='message')
		{
			$post_message_details = array(
								'college_id'=>$this->input->post('college_id'),
								'message_id'=>$this->input->post('message_id'),								
								'subject'=>$this->input->post('subject'),
								'description'=>$this->input->post('txt_desc'),
								'from_msg'=>$this->input->post('from_msg'),
								'to_msg'=>$this->input->post('to_msg'),
								'date'=>date('Y-m-d'),
								'is_read'=>0
								);
			//echo '<pre>';print_r($post_message_details);die;
			$table2['name'] = 'td_message_details';
			$succ2 = $this->Common_model->save_data($table2,$post_message_details,'','id');
			if($succ2)
			{
				$this->session->set_flashdata('success_message','Message successfully send');	
				redirect('admin/manage_message/view/'.$id);
			}
			else			
			{
				$this->session->set_flashdata('error_message','Message not send');	
				redirect('admin/manage_message/view/'.$id);
			}
		}
		
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-message-view',$data,true);
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
				'college_category' => $this->input->post('college_category'),
				'discipline_name' => $this->input->post('discipline_name'),
				'published'		=> 1
				);
				$table['name'] = 'discipline';
				$data = $this->Common_model->save_data($table,$fields,'','id');
				if($data)
				{
				$this->session->set_flashdata('success_message','Department successfully inserted');	
				redirect('admin/manage_message');
				}
			}
		}

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-discipline-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}

	######################################################################################
	function edit($id)
	{
		$data['action'] = 'Edit';		

		$conditions=array('discipline_id'=>$id);
		$table['name'] = 'discipline';
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
				'college_category' => $this->input->post('college_category'),
				'discipline_name' => $this->input->post('discipline_name'),
				'published'		=> 1
				);	

				$table['name'] = 'discipline';
				$data = $this->Common_model->save_data($table,$fields,$id,'discipline_id');
				$this->session->set_flashdata('success_message','Department successfully updated');	
				redirect('admin/manage_message');
			}
		}

		

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-discipline-view',$data,true);
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
		$table['name'] = 'discipline';
		if($this->Common_model->delete_data($table,$id,'discipline_id'))
		{
			$this->session->set_flashdata('success_message','Department has been Deleted successfully.');
			redirect('admin/manage_message');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('admin/manage_message');
		}
	}	

	##############################################################################################	

	function deactive($id)
	{
		$postdata = array(
							'is_important' => 0
						);
		$table['name'] = 'td_messages';
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'message_id');	

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Message marked as non important');
				redirect('admin/manage_message');
			}
		else
			{
				redirect('admin/manage_message');			
		}
	}


	function active($id)
	{
		$postdata = array(
							'is_important' => 1
						);
		$table['name'] = 'td_messages';	
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'message_id');
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Message marked as important');
				redirect('admin/manage_message');
			}
		else
			{
				redirect('admin/manage_message');
			}
	}

	##############################################################################################

	

	function form_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('college_category', 'College Category', 'required');
		$this->form_validation->set_rules('discipline_name', 'Discipline Name', 'required');
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



