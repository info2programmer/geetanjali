<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Manage_slider extends CI_Controller {

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

		$table['name'] = 'td_sliders';

		

		$data['rows'] = $this->common_model->find_data($table,'array');

		//echo '<pre>';print_r($data['rows']);die;

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/manage-slider-list-view',$data,true);

		$this->load->view('admin/layout-after-login',$data);

	}

	######################################################################################

	

	function add()

	{

		

		$data['action'] = 'Add';

	

		

		/* for insert slider */

		if($this->input->post('mode')=='slider')

		{

			$imge = $_FILES["slider_image"]["name"];

			

			if($imge == '')

			{

				$this->session->set_flashdata('message', 'Please upload an image');

				redirect(current_url());

			}

			$exp = explode('.',$imge);

			$imageFileType = $exp[1];

			

			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )

			{

				$this->session->set_flashdata('message', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed');

				redirect(current_url());

			}

			$image = $exp[0].time().'.'.$exp[1];

			$temp = $_FILES["slider_image"]["tmp_name"];

			

			

				$imagedetails = getimagesize($_FILES['slider_image']['tmp_name']);

				$width = $imagedetails[0];

				$height = $imagedetails[1];

			

				if($width > 390 && $height > 80)

				{  

					$this->session->set_flashdata('message', 'Sorry please upload 390 x 80 dimension image');

					redirect(current_url());

				}

			

			$fields = array(

			'slider_image' => $image,

			'published'		=> 1,

			'date_created'	=>	date('d-m-Y')

			);

			$table['name'] = 'td_sliders';

			$data = $this->common_model->save_data($table,$fields,'','id');

			if($data)

			{

			$this->student_file_upload($image,$temp);

			

			$this->session->set_flashdata('success_message','Slider successfully inserted');	

			redirect('admin/manage_slider');

			}

				

			

		}

		/* for insert slider */

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-slider-view',$data,true);

		

		

		

		$this->load->view('admin/layout-after-login',$data);

	}

	######################################################################################

	

	function edit($id)

	{

		$data['action'] = 'Edit';

		

		$conditions=array('id'=>$id);

		$table['name'] = 'td_sliders';

		$data['row'] = $this->common_model->find_data($table,'row','',$conditions);

		$data['slider_image'] = $data['row']->slider_image;

		$slider_image = $data['row']->slider_image;

		if($this->input->post('mode')=='slider')

		{

				

			$published = $data['row']->published;

			$postdata['published'] = $published;

			$postdata['date_modified'] = date('d-m-Y');

			

			$imge = $_FILES["slider_image"]["name"];

				if($imge != '')

				{

					$exp = explode('.',$imge);

					$imageFileType = $exp[1];

					

					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )

					{

						$this->session->set_flashdata('message', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed');

						redirect(current_url());

					}

					$image = $exp[0].time().'.'.$exp[1];

					$temp = $_FILES["slider_image"]["tmp_name"];

					

					$imagedetails = getimagesize($_FILES['slider_image']['tmp_name']);

					$width = $imagedetails[0];

					$height = $imagedetails[1];

				

					if($width > 390 && $height > 80)

					{  

						$this->session->set_flashdata('message', 'Sorry please upload 390 x 80 dimension image');

						redirect(current_url());

					}

					

					$postdata['slider_image'] = $image;	

					$this->student_file_upload($image,$temp);

				}

				else

				{

					$postdata['slider_image'] = $slider_image;	

				}

				

				

				//echo '<pre>';print_r($postdata);die;

				$table['name'] = 'td_sliders';

				$data = $this->common_model->save_data($table,$postdata,$id,'id');

				

				$this->session->set_flashdata('success_message','Slider successfully updated');	

				redirect('admin/manage_slider');

				

			}

		/* for insert city */

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-slider-view',$data,true);

		

		

		

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

		

		$administrative_details = $this->db->query("select * from td_sliders where id='$id'")->row();

		$image_file = $administrative_details->slider_image;

			

		$this->load->helper("url");			

		if($image_file!='') {

			unlink(FCPATH . '/uploads/slider/' . $image_file);

		}

		

		

		$table['name'] = 'td_sliders';

		if($this->common_model->delete_data($table,$id,'id'))

		{

			$this->session->set_flashdata('success_message','Slider has been Deleted successfully.');

			redirect('admin/manage_slider');

		}

		else

		{

			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');

			redirect('admin/manage_slider');

		}

	}

	

	##############################################################################################

	

	function deactive($id)

	{		

		$postdata = array(

							'published' => 0

						);

		$table['name'] = 'td_sliders';				

		$deactive = $this->common_model->save_data($table,$postdata,$id,'id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','Slider successfully deactivated');	

				redirect('admin/manage_slider');

			}

		else

			{	

				redirect('admin/manage_slider');					

			}

	}

	

	function active($id)

	{	

		$postdata = array(

							'published' => 1

						);

		$table['name'] = 'td_sliders';	

		$deactive = $this->common_model->save_data($table,$postdata,$id,'id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','Slider successfully activated');	

				redirect('admin/manage_slider');

			}

		else

			{	

				redirect('admin/manage_slider');				

			}

	}

	

	##############################################################################################

	

	function form_validate()

	{

		$this->load->library('form_validation');

		//$this->form_validation->set_rules('slider_image', 'Slider Image', 'required');

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

		   $image_path = 'uploads/slider/';

		   //echo $image_path;die;

		   if(move_uploaded_file($tmp,$image_path.$img))

		   return true;

	   }

	

	

}



