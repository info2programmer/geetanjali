<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Manage_subject extends CI_Controller {

	function __construct()

	{

		parent::__construct();

		

		$this->load->model(array('Common_model'));

	}

	################################################################

	function index()

	{		

		$table['name'] = 'td_subject';		

		$data['rows'] = $this->Common_model->find_data($table,'array');

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/manage-subject-list-view',$data,true);

		$this->load->view('admin/layout-after-login',$data);

	}

	######################################################################################

	

	function add()

	{

		$data['action'] = 'Add';

		

		$stream = array(

					'' => 'Select Department',

					'Arts' => 'Bachelor in Arts',

					'Science' => 'Bachelor in Science',

					'Commerce' => 'Bachelor in Commerce'

					);

		$data['stream_categories']=$stream;

		

		/* for insert service */

		if($this->input->post('mode')=='subject')

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
						else
						{	
							$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);
							
							if(($imageFileType != "pdf")&&($imageFileType != "PDF"))				
							{				
								$this->session->set_flashdata('err_message', 'Sorry, only PDF files are allowed');				
								redirect(current_url());				
							}					
							$image = $imge;
							$temp = $_FILES["slider_image"]["tmp_name"];
						}

						$postdata = array(
											'stream'=>$this->input->post('stream'),
											'subject_name'=>$this->input->post('subject_name'),
											'subject_content'=>$image,
											'published'=> 1
											);

						//echo '<pre>';print_r($postdata);die;	

						$table['name'] = 'td_subject';		

						$success = $this->Common_model->save_data($table,$postdata,'','id');						

						

							if($success)

							{						

								$this->session->set_flashdata('success_message','Subject successfully inserted');	

								redirect(base_url().'admin/manage_subject');

							}

							else

							{	

								$this->session->set_flashdata('error_message','Error! Please try again.');		

								redirect(current_url());					

							}

							

					}

		}

		/* for insert service */

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-subject-view',$data,true);

		

		

		

		$this->load->view('admin/layout-after-login',$data);

	}

	

	

	######################################################################################

	

	function edit($id)

	{

		$data['action'] = 'Edit';

		

		$stream = array(

					'' => 'Select Department',

					'Arts' => 'Bachelor in Arts',

					'Science' => 'Bachelor in Science',

					'Commerce' => 'Bachelor in Commerce'

					);

		$data['stream_categories']=$stream;

		

		

		$data['row'] = $this->db->query("select * from td_subject where id=$id")->row();

		

		

		$data['id'] = $data['row']->id;

		

		

		

		/* for update city */

		if($this->input->post('mode')=='subject')

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
							$image = $data['row']->subject_content;			
						}
						else
						{	
						
							//$exp = explode('.',$imge);
							$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);
							
							if(($imageFileType != "pdf")&&($imageFileType != "PDF"))				
							{				
								$this->session->set_flashdata('err_message', 'Sorry, only PDF files are allowed');				
								redirect(current_url());				
							}							
							$image = time().$imge;
							$temp = $_FILES["slider_image"]["tmp_name"];
						}
						
						$postdata = array(

											'stream'=>$this->input->post('stream'),

											'subject_name'=>$this->input->post('subject_name'),

											'subject_content'=>$image,

											'published'=> 1

											);

						//echo '<pre>';print_r($postdata);die;	

						$table['name'] = 'td_subject';		

						$success = $this->Common_model->save_data($table,$postdata,$id,'id');						

						

							if($success)

							{	
								if($imge != '')	{						
								$this->student_file_upload($image,$temp);
								}
								$this->session->set_flashdata('success_message','Subject successfully updated');	

								redirect(base_url().'admin/manage_subject');

							}

							else

							{	
								redirect(base_url().'admin/manage_subject');				

							}	

					}

		}			

		/* for insert city */

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-subject-view',$data,true);

		

		

		

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

		$table['name'] = 'td_subject';

		if($this->Common_model->delete_data($table,$id,'id'))

		{

			$this->session->set_flashdata('success_message','Record has been Deleted successfully.');

			redirect('admin/manage_subject');

		}

		else

		{

			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');

			redirect('admin/manage_subject');

		}

	}

	

	##############################################################################################

	

	function deactive($id)

	{

		

		

		$postdata = array(

							'published' => 0

						);

		$table['name'] = 'td_subject';				

		$deactive = $this->Common_model->save_data($table,$postdata,$id,'id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','Subject successfully deactivated');	

				redirect('admin/manage_subject');

			}

		else

			{	

				redirect('admin/manage_subject');					

			}

	}

	

	function active($id)

	{

		

		

		$postdata = array(

							'published' => 1

						);

		$table['name'] = 'td_subject';	

		$deactive = $this->Common_model->save_data($table,$postdata,$id,'id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','Subject successfully activated');	

				redirect('admin/manage_subject');

			}

		else

			{	

				redirect('admin/manage_subject');				

			}

	}

	

	

	#############################################################################################################

	

	

	function form_validate()

	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('subject_name', 'Subject Name', 'required');

		if ($this->form_validation->run() == FALSE)

		{

			return FALSE;

		}

		else

		{

			return true;

		}

	}
	
	
	function student_file_upload($img,$tmp)

	   {

		   $image_path = 'uploads/subject_content/';

		   //echo $image_path;die;

		   if(move_uploaded_file($tmp,$image_path.$img))

		   return true;

	   }

	

	

	

}



