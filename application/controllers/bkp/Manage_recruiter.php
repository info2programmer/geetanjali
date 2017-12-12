<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Manage_recruiter extends CI_Controller {

	function __construct()

	{

		parent::__construct();

		

		if(($this->session->userdata('is_admin_logged_in')!=1)&&($this->session->userdata('is_user_logged_in1')!=1))

		{

			redirect(base_url());	

		}
		
		

		

		$this->load->model('common_model');

	}

	################################################################

	function index()
	{
		$user_id = $this->session->userdata('user_id1');
		$table['name'] = 'td_recruiters';
		$conditions = array('college_id'=>$user_id);
		$data['rows'] = $this->common_model->find_data($table,'array','',$conditions);
		
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-recruiter-list-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}
	
	function add()
	{
		$data['action'] = 'Add';	
		
		$username = $this->session->userdata('username1');
		$user_details = $this->db->query("select * from td_users where username='$username'")->row();
		$college_cat = $user_details->college_cat;
		$college_id = $user_details->id;	

		if($this->input->post('mode')=='recruiter')
		{			

			$imge = $_FILES["slider_image"]["name"];
			if($imge == '')
			{
				$this->session->set_flashdata('err_message', 'Please upload an image');
				redirect(current_url());
			}						
			$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
			{
				$this->session->set_flashdata('err_message', 'Sorry, only images are allowed');
				redirect(current_url());
			}
			
			$imagedetails = getimagesize($_FILES['slider_image']['tmp_name']);
			$width = $imagedetails[0];
			$height = $imagedetails[1];
				
			if($width >= 161 && $height >= 161)
			{  
				$this->session->set_flashdata('err_message', 'Sorry file must be 160 x 160');
				redirect(current_url());
			}
					
					
			$image = time().$imge;			
			$temp = $_FILES["slider_image"]["tmp_name"];
			$image_path = 'uploads/recruiter/';
		   	move_uploaded_file($temp,$image_path.$image);

			$fields = array(
			'recruiter' => $image,
			'college_id' => $college_id,
			'published'		=> 1
			);		

			$table['name'] = 'td_recruiters';
			$data = $this->common_model->save_data($table,$fields,'','id');
			if($data)
			{
			$this->session->set_flashdata('success_message','Recruiter successfully inserted');
			redirect(base_url().'admin/manage_recruiter');
			}
		}

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-recruiter-view',$data,true);
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

		$conditions=array('recruiter_id'=>$id);
		$table['name'] = 'td_recruiters';
		$data['row'] = $this->common_model->find_data($table,'row','',$conditions);
		$data['slider_image'] = $data['row']->recruiter;
		$slider_image = $data['row']->recruiter;
		if($this->input->post('mode')=='recruiter')
		{
			$postdata['college_id'] = $college_id;	
			
			$imge = $_FILES["slider_image"]["name"];
				if($imge != '')
				{
					$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")	
					{		
						$this->session->set_flashdata('err_message', 'Sorry, only PDF files are allowed');	
						redirect(current_url());		
					}
					$imagedetails = getimagesize($_FILES['slider_image']['tmp_name']);
					$width = $imagedetails[0];
					$height = $imagedetails[1];
						
					if($width >= 161 && $height >= 161)
					{  
						$this->session->set_flashdata('err_message', 'Sorry file must be 160 x 160');
						redirect(current_url());
					}
			
					$image = time().$imge;
					$temp = $_FILES["slider_image"]["tmp_name"];
					
					$administrative_details = $this->db->query("select * from td_recruiters where recruiter_id='$id'")->row();
					$image_file = $administrative_details->recruiter;			
			
					$this->load->helper("url");	
					if($image_file!='') {
						unlink(FCPATH . '/uploads/recruiter/' . $image_file);
					}
					

					$postdata['recruiter'] = $image;	
					$image_path = 'uploads/recruiter/';
		   			move_uploaded_file($temp,$image_path.$image);
				}
				else
				{
					if($slider_image!='')
					{
						$postdata['recruiter'] = $slider_image;	
					}
					else
					{
						$postdata['recruiter'] = "";
					}

				}
				$table['name'] = 'td_recruiters';
				$data = $this->common_model->save_data($table,$postdata,$id,'recruiter_id');
				$this->session->set_flashdata('success_message','Recruiter successfully updated');
				redirect('admin/manage_recruiter');			
		}	

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-recruiter-view',$data,true);
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

		$administrative_details = $this->db->query("select * from td_recruiters where recruiter_id='$id'")->row();
		$image_file = $administrative_details->recruiter;			

		$this->load->helper("url");	
		if($image_file!='') {
			unlink(FCPATH . '/uploads/recruiter/' . $image_file);
		}

		$table['name'] = 'td_recruiters';
		if($this->common_model->delete_data($table,$id,'recruiter_id'))
		{
			$this->session->set_flashdata('success_message','Recruiter has been Deleted successfully.');
			redirect('admin/manage_recruiter');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('admin/manage_recruiter');
		}
	}

	

	##############################################################################################

	

	function deactive($id)
	{
		$postdata = array(
							'published' => 0
						);
		$table['name'] = 'td_recruiters';
		$deactive = $this->common_model->save_data($table,$postdata,$id,'recruiter_id');
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Recruiter successfully deactivated');
				redirect('admin/manage_recruiter');
			}
		else
			{	
				redirect('admin/manage_recruiter');
			}
	}	

	function active($id)
	{		
		$postdata = array(
							'published' => 1
						);
		$table['name'] = 'td_recruiters';
		$deactive = $this->common_model->save_data($table,$postdata,$id,'recruiter_id');	

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','File successfully activated');
				redirect('admin/manage_recruiter');
			}
		else
			{	
				redirect('admin/manage_recruiter');
			}
	}	

	function student_file_upload($img,$tmp)

	   {

		   $image_path = base_url().'uploads/recruiter';

		   //echo $image_path;die;

		   if(move_uploaded_file($tmp,$image_path.$img))

		   return true;

	   }

	######################################################################################

	

}



