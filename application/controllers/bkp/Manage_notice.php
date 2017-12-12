<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Manage_notice extends CI_Controller {

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
		$user_id1 = $this->session->userdata('user_id1');
		$table['name'] = 'td_notice_tender';
		if($user_id1) {
		$data['rows'] = $this->db->query("select * from td_notice_tender where user_id='$user_id1' and published=1 order by id desc")->result();	
		}
		
		$user_id = $this->session->userdata('user_id');
		if($user_id) {
		$data['rows'] = $this->db->query("select * from td_notice_tender order by id desc")->result();	
		}
		//echo '<pre>';print_r($data['rows']);die;

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-notice-list-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}

	######################################################################################

	

	function add()

	{

		$user_id1 = $this->session->userdata('user_id1');
		if($user_id1) { $id = $user_id1; }
		$user_id = $this->session->userdata('user_id');
		if($user_id) { $id = $user_id; }
		
		$data['action'] = 'Add';

	

		
		if($user_id) {
		$data['categories'] = array(
									''=>'Select Notice Type',
									'Study_Material'=>'Study Material',
									'Coching'=>'Coching',
									'Previous_Year_Questions'=>'Previous Year Questions',
									'Placement_Paper'=>'Placement Paper'
									);
		}
		if($user_id1) {
		$data['categories'] = array(
									''=>'Select Notice Type',
									'Study_Material'=>'Study Material',
									'Previous_Year_Questions'=>'Previous Year Questions',
									'Placement_Paper'=>'Placement Paper'
									);							
		}
		/* for insert slider */

		if($this->input->post('mode')=='slider')

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
						
			$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);

			

			if(($imageFileType != "pdf")&&($imageFileType != "PDF"))

			{

				$this->session->set_flashdata('err_message', 'Sorry, only PDF files are allowed');

				redirect(current_url());

			}

			$image = time().$imge;

			$temp = $_FILES["slider_image"]["tmp_name"];

			

			$fields = array(			
				'user_id' => $id,
				'title' => $this->input->post('title'),
				'role' => $this->input->post('role'),
				'notice_tag' => $this->input->post('notice_tag'),
				'filename' => $image
			);
			//echo '<pre>';print_r($fields);die;
			if($user_id1) { 
			$fields['published'] = 0;
			}
			
			if($user_id) {
			$fields['published'] = 1;	
			}
			
			
			$table['name'] = 'td_notice_tender';

			$data = $this->common_model->save_data($table,$fields,'','id');

			if($data)

			{

			$this->student_file_upload($image,$temp);

			

			$this->session->set_flashdata('success_message','File successfully inserted');	

			redirect(base_url().'admin/manage_notice');

			}

			}

			

		}

		/* for insert slider */

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-notice-view',$data,true);

		

		

		

		$this->load->view('admin/layout-after-login',$data);

	}

	######################################################################################

	

	function edit($notice_id)
	{
		$user_id1 = $this->session->userdata('user_id1');
		if($user_id1) { $id = $user_id1; }
		$user_id = $this->session->userdata('user_id');
		if($user_id) { $id = $user_id; }

		$data['action'] = 'Edit';

		

		if($user_id) {
		$data['categories'] = array(
									''=>'Select Notice Type',
									'Study_Material'=>'Study Material',
									'Coching'=>'Coching',
									'Previous_Year_Questions'=>'Previous Year Questions',
									'Placement_Paper'=>'Placement Paper'
									);
		}
		if($user_id1) {
		$data['categories'] = array(
									''=>'Select Notice Type',
									'Study_Material'=>'Study Material',
									'Previous_Year_Questions'=>'Previous Year Questions',
									'Placement_Paper'=>'Placement Paper'
									);							
		}

		

		$conditions=array('id'=>$notice_id);

		$table['name'] = 'td_notice_tender';

		$data['row'] = $this->common_model->find_data($table,'row','',$conditions);
		

		$data['slider_image'] = $data['row']->filename;

		$slider_image = $data['row']->filename;

		if($this->input->post('mode')=='slider')

		{

			if($this->form_validate() == FALSE)

			{

				$data['error_message']=validation_errors();

			}

			else

			{	

			$published = $data['row']->published;

			$postdata['published'] = $published;

			
			$postdata['user_id'] = $id;
			$postdata['title'] = $this->input->post('title');

			$postdata['role'] = $this->input->post('role');

			$postdata['notice_tag'] = $this->input->post('notice_tag');

			$imge = $_FILES["slider_image"]["name"];

				if($imge != '')

				{

					$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);			

					if(($imageFileType != "pdf")&&($imageFileType != "PDF"))		
					{		
						$this->session->set_flashdata('err_message', 'Sorry, only PDF files are allowed');		
						redirect(current_url());		
					}

					$image = time().$imge;

					$temp = $_FILES["slider_image"]["tmp_name"];

					

					

					$postdata['filename'] = $image;	

					$this->student_file_upload($image,$temp);

				}

				else

				{
					if($slider_image!='')
					{
						$postdata['filename'] = $slider_image;	
					}
					else
					{
						$postdata['filename'] = "";
					}

				}

				
				//echo '<pre>';print_r($postdata);die;

				$table['name'] = 'td_notice_tender';

				$data = $this->common_model->save_data($table,$postdata,$notice_id,'id');

				

				$this->session->set_flashdata('success_message','File successfully updated');	

				redirect('admin/manage_notice');

			}

		}

		/* for insert city */

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-notice-view',$data,true);

		

		

		

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

		

		$administrative_details = $this->db->query("select * from td_notice_tender where id='$id'")->row();

		$image_file = $administrative_details->filename;

			

		$this->load->helper("url");			

		if($image_file!='') {

			unlink(FCPATH . '/uploads/notice/' . $image_file);

		}

			

			

			

			

		$table['name'] = 'td_notice_tender';

		if($this->common_model->delete_data($table,$id,'id'))

		{

			$this->session->set_flashdata('success_message','File has been Deleted successfully.');

			redirect('admin/manage_notice');

		}

		else

		{

			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');

			redirect('admin/manage_notice');

		}

	}

	

	##############################################################################################

	

	function deactive($id)

	{

		

		

		$postdata = array(

							'published' => 0

						);

		$table['name'] = 'td_notice_tender';				

		$deactive = $this->common_model->save_data($table,$postdata,$id,'id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','File successfully deactivated');	

				redirect('admin/manage_notice');

			}

		else

			{	

				redirect('admin/manage_notice');					

			}

	}

	

	function active($id)

	{

		

		

		$postdata = array(

							'published' => 1

						);

		$table['name'] = 'td_notice_tender';	

		$deactive = $this->common_model->save_data($table,$postdata,$id,'id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','File successfully activated');	

				redirect('admin/manage_notice');

			}

		else

			{	

				redirect('admin/manage_notice');				

			}

	}

	

	##############################################################################################

	

	function form_validate()

	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'File Title', 'required');

		$this->form_validation->set_rules('role', 'File Type', 'required');

		$this->form_validation->set_rules('notice_tag', 'File Tag', 'required');

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

		   $image_path = 'uploads/notice/';

		   //echo $image_path;die;

		   if(move_uploaded_file($tmp,$image_path.$img))

		   return true;

	   }

	

	

}



