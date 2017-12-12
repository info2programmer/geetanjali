<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Manage_link extends CI_Controller {

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

		$table['name'] = 'td_links';		

		$data['rows'] = $this->common_model->find_data($table,'array');

		

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/manage-link-list-view',$data,true);

		$this->load->view('admin/layout-after-login',$data);

	}

	######################################################################################

	

	function add()

	{

		

		$data['action'] = 'Add';

	

		if($this->input->post('mode')=='link')

		{

			if($this->form_validate() == FALSE)

			{

				$data['error_message']=validation_errors();

			}

			else

			{

				$imge = $_FILES["slider_image"]["name"];			

				if($imge == '')
	
				{
	
					$this->session->set_flashdata('err_message', 'Please upload an image');
	
					redirect(current_url());
	
				}

			

				$image = $imge;

				$temp = $_FILES["slider_image"]["tmp_name"];

				$fields = array(

				'link_name' => $this->input->post('link_name'),
				'link_url' => $this->input->post('link_url'),
				'link_logo' => $image,
				'published'		=> 1

				);

				$table['name'] = 'td_links';

				$data = $this->common_model->save_data($table,$fields,'','id');

				if($data)

				{	
				
				$this->student_file_upload($image,$temp);		

				$this->session->set_flashdata('success_message','Userfull Link successfully inserted');	

				redirect('admin/manage_link');

				}

			}

			

		}

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-link-view',$data,true);

		

		

		

		$this->load->view('admin/layout-after-login',$data);

	}

	######################################################################################

	

	function edit($id)

	{

		$data['action'] = 'Edit';

		

		$conditions=array('id'=>$id);

		$table['name'] = 'td_links';

		$data['row'] = $this->common_model->find_data($table,'row','',$conditions);

		if($this->input->post('mode')=='link')

		{

			if($this->form_validate() == FALSE)

			{

				$data['error_message']=validation_errors();

			}

			else

			{
				
				$imge = $_FILES["slider_image"]["name"];			

				if($imge == '')
	
				{
	
					$image = $data['row']->link_logo;
	
				}
				else
				{
					$image = $imge;

					$temp = $_FILES["slider_image"]["tmp_name"];
					
					$this->student_file_upload($image,$temp);
				}
			

				

				$fields = array(

				'link_name' => $this->input->post('link_name'),
				'link_url' => $this->input->post('link_url'),
				'link_logo' => $image,
				'published'		=> 1

				);

				

				$table['name'] = 'td_links';

				$data = $this->common_model->save_data($table,$fields,$id,'id');

				
				if($data) 
				{ 
					$this->session->set_flashdata('success_message','Userfull Link successfully updated');
					redirect('admin/manage_link');	
				}
				else
				{
					redirect('admin/manage_link');	
				}

			}

		}

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-link-view',$data,true);		

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

		$table['name'] = 'td_links';

		if($this->common_model->delete_data($table,$id,'id'))

		{

			$this->session->set_flashdata('success_message','Userfull Link has been Deleted successfully.');

			redirect('admin/manage_link');

		}

		else

		{

			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');

			redirect('admin/manage_link');

		}

	}

	

	##############################################################################################

	

	function deactive($id)

	{

		$postdata = array(

							'published' => 0

						);

		$table['name'] = 'td_links';				

		$deactive = $this->common_model->save_data($table,$postdata,$id,'id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','Userfull Link successfully deactivated');	

				redirect('admin/manage_link');

			}

		else

			{	

				redirect('admin/manage_link');					

			}

	}

	

	function active($id)

	{

		

		

		$postdata = array(

							'published' => 1

						);

		$table['name'] = 'td_links';	

		$deactive = $this->common_model->save_data($table,$postdata,$id,'id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','Userfull Link successfully activated');	

				redirect('admin/manage_link');

			}

		else

			{	

				redirect('admin/manage_link');				

			}

	}

	

	##############################################################################################

	

	function form_validate()

	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('link_name', 'Link Name', 'required');
		$this->form_validation->set_rules('link_url', 'Link Url', 'required');

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
	
	function student_file_upload($img,$tmp)

	   {

		   $image_path = 'uploads/links/';

		   //echo $image_path;die;

		   if(move_uploaded_file($tmp,$image_path.$img))

		   return true;

	   }

	

	

	

}



