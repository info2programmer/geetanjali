<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forum_post_sticky extends CI_Controller {
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

	function sticky()
	{
		$table['name'] = 'td_forum_thread';
		$data['rows'] = $this->Common_model->find_data($table,'array');

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-forum-sticky-list-view',$data,true);
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
		$table['name'] = 'td_forum_thread';
		if($this->Common_model->delete_data($table,$id,'thread_id'))
		{
			$this->session->set_flashdata('success_message','Thread Post has been Deleted successfully.');
			redirect('admin/forum_post_sticky/sticky');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('admin/forum_post_sticky/sticky');
		}
	}	

	##############################################################################################	

	function deactive($id)
	{
		$postdata = array(
							'published' => 0
						);
		$table['name'] = 'td_forum_thread';
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'thread_id');	

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Thread Post successfully deactivated');
				redirect('admin/forum_post_sticky/sticky');
			}
		else
			{
				redirect('admin/forum_post_sticky/sticky');			
		}
	}


	function active($id)
	{
		$postdata = array(
							'published' => 1
						);
		$table['name'] = 'td_forum_thread';	
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'thread_id');
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Thread Post successfully activated');
				redirect('admin/forum_post_sticky/sticky');
			}
		else
			{
				redirect('admin/forum_post_sticky/sticky');
			}
	}

	##############################################################################################

	function non_important($id)
	{
		$postdata = array(
							'thread_is_important' => 0
						);
		$table['name'] = 'td_forum_thread';
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'thread_id');	

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Thread Post successfully changed to general topics');
				redirect('admin/forum_post_sticky/sticky');
			}
		else
			{
				redirect('admin/forum_post_sticky/sticky');			
		}
	}


	function important($id)
	{
		$postdata = array(
							'thread_is_important' => 1
						);
		$table['name'] = 'td_forum_thread';	
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'thread_id');
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Thread Post successfully changed to sticky topics');
				redirect('admin/forum_post_sticky/sticky');
			}
		else
			{
				redirect('admin/forum_post_sticky/sticky');
			}
	}

	

}



