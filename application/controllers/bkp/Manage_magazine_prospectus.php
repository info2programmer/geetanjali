<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Manage_magazine_prospectus extends CI_Controller {

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

		$table['name'] = 'td_magazine_prospectus';

		

		$data['rows'] = $this->common_model->find_data($table,'array');

		//echo '<pre>';print_r($data['rows']);die;

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/manage-magazine-prospectus-list-view',$data,true);

		$this->load->view('admin/layout-after-login',$data);

	}

	######################################################################################

	

	function add()

	{

		

		$data['action'] = 'Add';

	

		

		/* for insert slider */

		if($this->input->post('mode')=='principal')

		{

			$imge = $_FILES["slider_image"]["name"];

			

			if($imge == '')

			{

				$this->session->set_flashdata('err_message', 'Please upload an image');

				redirect(current_url());

			}

			

			$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);

			

			if($imageFileType != "pdf" && $imageFileType != "PDF" )

			{

				$this->session->set_flashdata('message', 'Sorry, only PDF files are allowed');

				redirect(current_url());

			}

			$image = time().$imge;

			$temp = $_FILES["slider_image"]["tmp_name"];

			

			

			$fields = array(

			'slider_image' => $image,

			'published'		=> 1,

			'year'	=>	$this->input->post('year'),
			
			'nature'	=>	$this->input->post('nature')

			);

			$table['name'] = 'td_magazine_prospectus';

			$data = $this->common_model->save_data($table,$fields,'','id');

			if($data)

			{

			$this->student_file_upload($image,$temp);

			

			$this->session->set_flashdata('success_message','Magazine & Prospectus successfully inserted');	

			redirect('admin/manage_magazine_prospectus');

			}

				

			

		}

		/* for insert slider */

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-magazine-prospectus-view',$data,true);

		

		

		

		$this->load->view('admin/layout-after-login',$data);

	}

	######################################################################################

	

	function edit($id)

	{

		$data['action'] = 'Edit';

		

		$conditions=array('id'=>$id);

		$table['name'] = 'td_magazine_prospectus';

		$data['row'] = $this->common_model->find_data($table,'row','',$conditions);

		$data['slider_image'] = $data['row']->slider_image;

		$slider_image = $data['row']->slider_image;

		if($this->input->post('mode')=='principal')

		{

				

			$published = $data['row']->published;

			$postdata['published'] = $published;

			$postdata['year'] = $this->input->post('year');

			$postdata['nature'] = $this->input->post('nature');

			$imge = $_FILES["slider_image"]["name"];

				if($imge != '')

				{

					$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);

					

					if($imageFileType != "pdf" && $imageFileType != "PDF" )

					{

						$this->session->set_flashdata('err_message', 'Sorry, only PDF files are allowed');

						redirect(current_url());

					}

					$image = time().$imge;

					$temp = $_FILES["slider_image"]["tmp_name"];

					

					

					$postdata['slider_image'] = $image;	

					$this->student_file_upload($image,$temp);

				}

				else

				{

					$postdata['slider_image'] = $slider_image;	

				}

				

				

				//echo '<pre>';print_r($postdata);die;

				$table['name'] = 'td_magazine_prospectus';

				$data = $this->common_model->save_data($table,$postdata,$id,'id');

				

				$this->session->set_flashdata('success_message','Magazine & Prospectus successfully updated');	

				redirect('admin/manage_magazine_prospectus');

				

			}

		/* for insert city */

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-magazine-prospectus-view',$data,true);

		

		

		

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

		

		$administrative_details = $this->db->query("select * from td_magazine_prospectus where id='$id'")->row();

		$image_file = $administrative_details->slider_image;

			

		$this->load->helper("url");			

		if($image_file!='') {

			unlink(FCPATH . '/uploads/maga_pros/' . $image_file);

		}

		

		

		$table['name'] = 'td_magazine_prospectus';

		if($this->common_model->delete_data($table,$id,'id'))

		{

			$this->session->set_flashdata('success_message','Magazine & Prospectus has been Deleted successfully.');

			redirect('admin/manage_magazine_prospectus');

		}

		else

		{

			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');

			redirect('admin/manage_magazine_prospectus');

		}

	}

	

	##############################################################################################

	

	function deactive($id)

	{		

		$postdata = array(

							'published' => 0

						);

		$table['name'] = 'td_magazine_prospectus';				

		$deactive = $this->common_model->save_data($table,$postdata,$id,'id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','Magazine & Prospectus successfully deactivated');	

				redirect('admin/manage_magazine_prospectus');

			}

		else

			{	

				redirect('admin/manage_magazine_prospectus');					

			}

	}

	

	function active($id)

	{	

		$postdata = array(

							'published' => 1

						);

		$table['name'] = 'td_magazine_prospectus';	

		$deactive = $this->common_model->save_data($table,$postdata,$id,'id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','Magazine & Prospectus successfully activated');	

				redirect('admin/manage_magazine_prospectus');

			}

		else

			{	

				redirect('admin/manage_magazine_prospectus');				

			}

	}

	

	##############################################################################################

	

	function form_validate()

	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('nature', 'Nature', 'required');
		$this->form_validation->set_rules('year', 'Year', 'required');

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

		   $image_path = 'uploads/maga_pros/';

		   //echo $image_path;die;

		   if(move_uploaded_file($tmp,$image_path.$img))

		   return true;

	   }

	

	

}



