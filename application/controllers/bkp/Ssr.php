<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Ssr extends CI_Controller {

	function __construct()

	{

		parent::__construct();

		

		if($this->session->userdata('is_admin_logged_in')!=1)

		{

			redirect(base_url()."index.php/admin/user/login");	

		}

		

		$this->load->model('common_model');

	}

	################################################################

	function index()

	{

		$data['action'] = 'Edit';

		

		$table['name'] = 'td_ssr';

		$data['row'] = $this->common_model->find_data($table,'row');

		//echo '<pre>';print_r($data['row']);die;

		

		if($this->input->post('mode')=='site_setting')

		{
			

			$imge = $_FILES["slider_image"]["name"];

			

			if($imge == '')

			{

				if($data['row']->ssr=='')

				{

					$image = '';

				}

				else

				{

					$image = $data['row']->ssr;

				}

			}

			else

			{

				$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);

				if($imageFileType != "pdf" && $imageFileType != "PDF" )

				{
					
					$this->session->set_flashdata('message', 'Sorry, only PDF files are allowed');

					redirect(current_url());

				}

				$image = time().$imge;

				$temp = $_FILES["slider_image"]["tmp_name"];

				$image_path = 'uploads/';

				move_uploaded_file($temp,$image_path.$image);

			}

			

			$post_array = array(

								'ssr'=>$image,
								
								'published'=>1

								);
			

			$table['name'] = 'td_ssr';

			$sucess = $this->common_model->save_data($table,$post_array,'','id');

			
			if($sucess)

			{

				$this->session->set_flashdata('success_message','Site Setting successfully updated');	

				redirect('admin/ssr');

			}

			else

			{	

				$this->session->set_flashdata('error_message','Error ! Please try again');
				redirect('admin/ssr');

			}

			

		}

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/ssr-view',$data,true);

		$this->load->view('admin/layout-after-login',$data);

	}

	

	function student_file_upload($img,$tmp)

	   {

		   echo $image_path = base_url().'uploads/';

		   //echo $image_path;die;

		   if(move_uploaded_file($tmp,$image_path.$img))

		   return true;

	   }

	######################################################################################

	

}



