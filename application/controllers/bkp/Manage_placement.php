<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_placement extends CI_Controller {
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
		$table['name'] = 'td_placement';$conditions = array('college_id'=>$user_id);
		$data['rows'] = $this->Common_model->find_data($table,'array','',$conditions);
		
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-placement-list-view',$data,true);
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
		
		/* for insert slider */
		if($this->input->post('mode')=='placement')
		{
			if($this->form_validate() == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{
				
				/*$imge = $_FILES["slider_image"]["name"];			
			
				$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);	
				
				
				if($imageFileType != "jpg" && $imageFileType && "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
				{
					$this->session->set_flashdata('message', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed');
					redirect(current_url());
				}
				$image = time().$imge;
				$temp = $_FILES["slider_image"]["tmp_name"];
				
				
					$imagedetails = getimagesize($_FILES['slider_image']['tmp_name']);
					$width = $imagedetails[0];
					$height = $imagedetails[1];
				
					if($width > 640 && $height > 480)
					{  
						$this->session->set_flashdata('message', 'Sorry file is small');
						redirect(current_url());
					}*/
			
			
			
			$fields = array(
			'year' => $this->input->post('year'),
			'company_name' => $this->input->post('company_name'),
			/*'company_logo' => $image,*/
			'number_of_intake' => $this->input->post('number_of_intake'),
			'college_id' => $college_id,
			'published'	=> 1
			);
			
			
			$table['name'] = 'td_placement';
			$data = $this->Common_model->save_data($table,$fields,'','placement_id');
			if($data)
			{
			//$this->student_file_upload($image,$temp);
			
			$this->session->set_flashdata('success_message','Placement successfully inserted');	
			redirect('admin/manage_placement');
			}
				
			
		
			}
		}
		
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-placement-view',$data,true);
		
		
		
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
		
		$conditions=array('placement_id'=>$id);
		$table['name'] = 'td_placement';
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		
		//$data['company_logo'] = $data['row']->company_logo;
//		$company_logo = $data['row']->company_logo;
		
		if($this->input->post('mode')=='placement')
		{
			if($this->form_validate() == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{
							
				/*$imge = $_FILES["slider_image"]["name"];
				if($imge != '')
				{					
					$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);
					
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
					{
						$this->session->set_flashdata('message', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed');
						redirect(current_url());
					}
					$image = time().$imge;
					$temp = $_FILES["slider_image"]["tmp_name"];
					
					$imagedetails = getimagesize($_FILES['slider_image']['tmp_name']);
					$width = $imagedetails[0];
					$height = $imagedetails[1];
				
					if($width > 640 && $height > 480)
					{  
						$this->session->set_flashdata('message', 'Sorry file is small');
						redirect(current_url());
					}
					
					$administrative_details = $this->db->query("select * from td_placement where placement_id='$id'")->row();
					$image_file = $administrative_details->company_logo;		
					$this->load->helper("url");			
					if($image_file!='') {			
						unlink(FCPATH . '/uploads/placement/' . $image_file);			
					}
					
						
					$this->student_file_upload($image,$temp);
				}
				else
				{
					$image = $company_logo;	
				}*/
				
				$fields = array(
							'year' => $this->input->post('year'),
							'company_name' => $this->input->post('company_name'),
							/*'company_logo' => $image,*/
							'number_of_intake' => $this->input->post('number_of_intake'),
							'college_id' => $college_id,
							'published'	=> 1
							);
				
				$table['name'] = 'td_placement';
				$data = $this->Common_model->save_data($table,$fields,$id,'placement_id');
				
				$this->session->set_flashdata('success_message','Placement successfully updated');	
				redirect('admin/manage_placement');
				
			
			}
			
		}
		
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-placement-view',$data,true);
		
		
		
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
		
		$administrative_details = $this->db->query("select * from td_placement where placement_id='$id'")->row();

		$image_file = $administrative_details->company_logo;

			

		$this->load->helper("url");			

		if($image_file!='') {

			unlink(FCPATH . '/uploads/placement/' . $image_file);

		}
		
		
		$table['name'] = 'td_placement';
		if($this->Common_model->delete_data($table,$id,'placement_id'))
		{
			$this->session->set_flashdata('success_message','Placement details has been Deleted successfully.');
			redirect('admin/manage_placement');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('admin/manage_placement');
		}
	}
	
	##############################################################################################
	
	function deactive($id)
	{
		$postdata = array(
							'published' => 0
						);
		$table['name'] = 'td_placement';
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'placement_id');
		if($deactive)
		{	
				$this->session->set_flashdata('success_message','Placement details has been successfully deactivated');
				redirect('admin/manage_placement');
		}
		else
		{	
				redirect('admin/manage_placement');
		}

	}

	

	function active($id)
	{
		$postdata = array(
							'published' => 1
						);
		$table['name'] = 'td_placement';	
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'placement_id');
		if($deactive)
		{	
				$this->session->set_flashdata('success_message','Placement details successfully activated');	
				redirect('admin/manage_placement');
		}
		else
		{	
				redirect('admin/manage_placement');
		}
	}
	
	##############################################################################################
	
	function form_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('company_name', 'Company name', 'required');
		$this->form_validation->set_rules('number_of_intake', 'Number of intake', 'required');
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
		   $image_path = 'uploads/placement/';
		   //echo $image_path;die;
		   if(move_uploaded_file($tmp,$image_path.$img))
		   return true;
	   }
	
	
}

