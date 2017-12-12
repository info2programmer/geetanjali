<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_contest extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url()."admin/user/login");
		}
		$this->load->model(array('Common_model'));
	}
	################################################################
	function index()
	{
		$table['name'] = 'contest_details';
		$data['rows'] = $this->Common_model->find_data($table,'array');	

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-contest-list-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}

	#######################################################################################

	function add()
	{
		$data['action'] = 'Add';		

		if($this->input->post('mode')=='contest')
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

						/*if($imageFileType != "png")
						{
							$this->session->set_flashdata('err_message', 'Sorry, only PNG files are allowed');
							redirect(current_url());
						}*/						

						/*$imagedetails = getimagesize($_FILES['slider_image']['tmp_name']);
						$width = $imagedetails[0];
						$height = $imagedetails[1];						

						if($width > 300 && $height > 300)
						{  
							$this->session->set_flashdata('err_message', 'Sorry file is small');
							redirect(current_url());
						}*/
						
						$image = time().$imge;
						$temp = $_FILES["slider_image"]["tmp_name"];
						$image_path = 'uploads/contest/';
						move_uploaded_file($temp,$image_path.$image);
					}
					if($this->form_validate() == FALSE)
					{
						$data['error_message']=validation_errors();
					}
					else
					{
						$expiry_date = date_format(date_create($this->input->post('expiry_date')), "Y-m-d");						
						$postdata = array(
											'contest_name'=>$this->input->post('contest_name'),
											'contest_detail'=>$this->input->post('contest_detail'),
											'contest_image'=>$image,
											'gallery_image'=>$this->input->post('file_names'),
											'prize_money'=>$this->input->post('prize_money'),
											'create_date'=>date('Y-m-d'),
											'expiry_date'=>$expiry_date,
											'rate_per_bid'=>$this->input->post('rate_per_bid'),
											'is_awarded'=> 0,
											'published'=> 1
											);
						//echo '<pre>';print_r($postdata);die;
						$table['name']='contest_details';
						$success = $this->Common_model->save_data($table,$postdata,'','contest_details_id');
						if($success)
						{	
							$this->session->set_flashdata('success_message','Contest successfully launched');
							redirect('admin/manage_contest');
						}
						else
						{	
							redirect('admin/manage_contest');
						}
					}
		}			

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-contest-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}
	
	function multiple_image()
	{
		$uploaddir = 'uploads/contest/';
		foreach ($_FILES['attachment']['name'] as $name => $value)
		{
			$filename1 = time().stripslashes($_FILES['attachment']['name'][$name]);
			//$file_name1=$course_name."_".$filename1;
			$file_list1[]=$filename1;
			$newname1=$uploaddir.$filename1;
			//Moving file to uploads folder
			if (move_uploaded_file($_FILES['attachment']['tmp_name'][$name], $newname1))
			{
			//$time=time();
			//Insert upload image files names into user_uploads table
			}
		}
		$attachment['name']= implode(',', $file_list1);
		header('Content-Type: application/json');
		echo json_encode($attachment);
	}
	######################################################################################
	function edit($id)
	{
		$data['action'] = 'Edit';
		$conditions = array('contest_details_id'=>$id);
		$table['name']='contest_details';
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);	
		//echo '<pre>';print_r($data['row']);die;

		if($this->input->post('mode')=='contest')
		{		
				$imge = $_FILES["slider_image"]["name"];
					if($imge == '')
					{
						if($data['row']->contest_image=='')
						{
							$image = '';
						}
						else
						{
							$image = $data['row']->contest_image;
						}
					}
					else
					{
						/*$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);	
						if($imageFileType != "png")
						{
							$this->session->set_flashdata('message', 'Sorry, only PNG files are allowed');
							redirect(current_url());
						}						

						$imagedetails = getimagesize($_FILES['slider_image']['tmp_name']);
						$width = $imagedetails[0];
						$height = $imagedetails[1];						

						if($width > 300 && $height > 300)
						{  
							$this->session->set_flashdata('message', 'Sorry file is small');
							redirect(current_url());
						}*/

						$image = time().$imge;
						$temp = $_FILES["slider_image"]["tmp_name"];
						$image_path = 'uploads/contest/';
						move_uploaded_file($temp,$image_path.$image);
					}

					if($this->form_validate() == FALSE)
					{
						$data['error_message']=validation_errors();
					}
					else
					{
						$expiry_date = date_format(date_create($this->input->post('expiry_date')), "Y-m-d");
						$postdata = array(
											'contest_name'=>$this->input->post('contest_name'),
											'contest_detail'=>$this->input->post('contest_detail'),
											'contest_image'=>$image,
											'gallery_image'=>$this->input->post('file_names'),
											'prize_money'=>$this->input->post('prize_money'),
											'create_date'=>date('Y-m-d'),
											'expiry_date'=>$expiry_date,
											'rate_per_bid'=>$this->input->post('rate_per_bid'),
											'is_awarded'=> 0,
											'published'=> 1
											);									
						//echo '<pre>';print_r($postdata);die;
						$table['name']='contest_details';
						$success = $this->Common_model->save_data($table,$postdata,$id,'contest_details_id');
						if($success)
						{	
							$this->session->set_flashdata('success_message','Contest successfully updated');
							redirect('admin/manage_contest');
						}
						else
						{	
							redirect('admin/manage_contest');	
						}	
					}
		}					

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-contest-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}
	
	function remove_thumnail()
	{
		$filename = $this->input->post('filename');
		$service_id = $this->input->post('id');	

		if($service_id!='')
		{
			$service_row = $this->db->query("select gallery_image from contest_details where contest_details_id='$service_id'")->row();
			$gallery_image = $service_row->gallery_image;
			$gallery_image1 = explode(",", $gallery_image);
			//print_r($gallery_image1);die;
			if(in_array($filename, $gallery_image1))
			{
				foreach($gallery_image1 as $index => $data)
				{
					if($filename==$data)
					{
						unset($gallery_image1[$index]);	
					}
				}			

				$this->load->helper("url");	
				unlink(FCPATH . '/uploads/contest/' . $filename);
				$post_data = implode(",",$gallery_image1);
				$update_service = $this->db->query("update contest_details set gallery_image='$post_data' where contest_details_id='$service_id'");
			}
			else
			{
				$this->load->helper("url");	
				unlink(FCPATH . '/uploads/contest/' . $filename);
			}
		}
		else
			{
				$this->load->helper("url");	
				unlink(FCPATH . '/uploads/contest/' . $filename);
			}
	}

	######################################################################################

	function view($id)
	{
		
		$data['action'] = 'View';
		
		$data['row1'] = $this->db->query("select * from contest_details where contest_details_id='$id'")->row();
		//echo '<pre>';print_r($data['row']);die;
		
		$table['name'] = 'contest_details';
		$conditions = array('contest_details.published'=>1,'contest_bids.contest_id'=>$id);
		$order_by[0] = array('field'=>'contest_bids.contest_bid_id','type'=>'ASC');
		$select = 'contest_details.*,contest_bids.*';
		$join[0] = array('table_master'=>'contest_details','field_table_master'=>'contest_details_id','table'=>'contest_bids','field'=>'contest_id','type'=>'Inner');
		$data['rows'] = $this->Common_model->find_data($table,'array','',$conditions,$select,$join,'',$order_by);
		//echo '<pre>';print_r($data['rows']);die;
		
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-contest-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}

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
		
		$administrative_details = $this->db->query("select * from contest_details where contest_details_id='$id'")->row();
		$image_file = $administrative_details->contest_image;			

		$this->load->helper("url");
		if($image_file!='') {
			unlink(FCPATH . '/uploads/contest/' . $image_file);
		}

		$table['name']='contest_details';
		if($this->Common_model->delete_data($table,$id,'contest_details_id'))
		{
			$this->session->set_flashdata('success_message','Record has been Deleted successfully.');
			redirect('admin/manage_contest');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('admin/manage_contest');
		}
	}

	##############################################################################################	

	function deactive($id)
	{	
		$postdata = array(
							'published' => 0
						);
		$table['name'] = 'contest_details';
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'contest_details_id');
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Contest successfully deactivated');	
				redirect('admin/manage_contest');
			}
		else
			{
				redirect('admin/manage_contest');	
			}
	}	

	function active($id)
	{		
		$postdata = array(
							'published' => 1
						);
		$table['name'] = 'contest_details';
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'contest_details_id');		

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Contest successfully activated');
				redirect('admin/manage_contest');
			}
		else
			{
				redirect('admin/manage_contest');
			}
	}
	
	function award($id)
	{
		$contest_details = $this->db->query("select * from contest_bids where contest_bid_id='$id'")->row();
		$contest_id = $contest_details->contest_id;
		$user_id = $contest_details->user_id;		
		$postdata = array(
							'is_awarded' => 1,
							'award_user_id' => $user_id
						);
		$table['name'] = 'contest_details';
		$deactive = $this->Common_model->save_data($table,$postdata,$contest_id,'contest_details_id');		

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Contest successfully awarded');
				redirect('admin/manage_contest/view/'.$contest_id);
			}
		else
			{
				redirect('admin/manage_contest/view/'.$contest_id);
			}
	}	

	##############################################################################################

	function form_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('contest_name', 'Main Topic Name', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}	

	#################################  MAIN PAGE END #####################################
}



