<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_ads extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if(($this->session->userdata('is_admin_logged_in')!=1)&&($this->session->userdata('is_user_logged_in1')!=1))
		{
			redirect(base_url());	
		}
		$this->load->model(array('common_model'));
	}

	######################################### HEADER AD ######################################

	/*function index()
	{
		$table['name'] = 'td_notice_tender';
		$data['rows'] = $this->db->query("select * from td_notice_tender order by id desc")->result();
		//echo '<pre>';print_r($data['rows']);die;		

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-notice-list-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}*/
	
	public function header_ad()
	{
		$table['name'] = 'td_header_ad';
		$order_by[0] = array('field'=>'rank','type'=>'asc');
		$data['rows']=$this->Common_model->find_data($table,'array','','','','','', $order_by);
		
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-header-ad-list-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}
	

	function header_ad_add()
	{
		$data['action'] = 'Add';
		$data['pages'] = array(
									''=>'Select Slot',
									'Slot1'=>'Slot1',
									'Slot2'=>'Slot2'
									);
		/* for insert slider */

		if($this->input->post('mode')=='slider')
		{
			if($this->header_ad_form_validate() == FALSE)
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
	
				if(($imageFileType != "jpg")&&($imageFileType != "JPG")&&($imageFileType != "png")&&($imageFileType != "PNG")&&($imageFileType != "jpeg")&&($imageFileType != "JPEG")&&($imageFileType != "gif")&&($imageFileType != "GIF"))	
				{	
					$this->session->set_flashdata('err_message', 'Sorry, only jpg,png,jpeg files are allowed');	
					redirect(current_url());	
				}
				
				$imagedetails = getimagesize($_FILES['slider_image']['tmp_name']);
				$width = $imagedetails[0];
				$height = $imagedetails[1];
				if($width > 390 && $height > 80)
				{  
					$this->session->set_flashdata('err_message', 'Sorry please upload 390 x 80 dimension image');
					redirect(current_url());
				}
					
				$image = time().$imge;	
				$temp = $_FILES["slider_image"]["tmp_name"];
				$image_path = 'uploads/header_ad/';
		   		move_uploaded_file($temp,$image_path.$image);				
	
				
				
				$slot_name = $this->input->post('slot_name');
				$result = $this->db->query("SELECT MAX(rank) as rank FROM `td_header_ad` WHERE slot_name='$slot_name'")->row();
				$data['rank'] = $result->rank;
				$new_rank = $data['rank']+1; 	
				
				$fields = array(	
								'slot_name' => $this->input->post('slot_name'),
								'filename' => $image,
								'rank'=>$new_rank,
								'published'=>1	
				);
				
				
				//echo '<pre>';print_r($fields);die;
				$table['name'] = 'td_header_ad';	
				$data = $this->common_model->save_data($table,$fields,'','header_ad_id');	
				if($data)	
				{	
					$this->session->set_flashdata('success_message','Header Ad successfully inserted');	
					redirect(base_url().'admin/manage_ads/header_ad');	
				}
			}
		}

		/* for insert slider */
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-header-ad-view',$data,true);
		
		$this->load->view('admin/layout-after-login',$data);

	}
	
	function header_ad_edit($id)
	{	

		$data['action'] = 'Edit';
		$table['name'] = 'td_header_ad';
		$conditions = array('header_ad_id'=>$id);
		$data['row'] = $this->common_model->find_data($table,'row','',$conditions);
		//echo '<pre>';print_r($data['row']);die;

		$data['pages'] = array(
									''=>'Select Slot',
									'Slot1'=>'Slot1',
									'Slot2'=>'Slot2'
									);
		/* for insert slider */

		if($this->input->post('mode')=='slider')
		{
			if($this->header_ad_form_validate() == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{
				$administrative_details = $this->db->query("select * from td_header_ad where header_ad_id='$id'")->row();
				$image_file = $administrative_details->filename;			
		
				$this->load->helper("url");
				if($image_file!='') {
					unlink(FCPATH . '/uploads/header_ad/' . $image_file);
				}
		
		
				$imge = $_FILES["slider_image"]["name"];
				if($imge == '')	
				{	
					$image = $data['row']->filename;	
				}							
				else
				{
					$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);
		
					if(($imageFileType != "jpg")&&($imageFileType != "JPG")&&($imageFileType != "png")&&($imageFileType != "PNG")&&($imageFileType != "jpeg")&&($imageFileType != "JPEG")&&($imageFileType != "gif")&&($imageFileType != "GIF"))	
					{	
						$this->session->set_flashdata('err_message', 'Sorry, only jpg,png,jpeg files are allowed');	
						redirect(current_url());	
					}
					
					$imagedetails = getimagesize($_FILES['slider_image']['tmp_name']);
					$width = $imagedetails[0];
					$height = $imagedetails[1];
					if($width > 390 && $height > 80)
					{  
						$this->session->set_flashdata('err_message', 'Sorry please upload 390 x 80 dimension image');
						redirect(current_url());
					}
						
					$image = time().$imge;	
					$temp = $_FILES["slider_image"]["tmp_name"];
					$image_path = 'uploads/header_ad/';
					move_uploaded_file($temp,$image_path.$image);				
				}		
							
				
				$slot_name = $this->input->post('slot_name');
				$result = $this->db->query("SELECT MAX(rank) as rank FROM `td_header_ad` WHERE slot_name='$slot_name'")->row();
				$data['rank'] = $result->rank;
				$new_rank = $data['rank']+1; 	
				
				$fields = array(	
								'slot_name' => $this->input->post('slot_name'),
								'filename' => $image,
								'rank'=>$new_rank,
								'published'=>1	
				);		
				
				//echo '<pre>';print_r($fields);die;
				$table['name'] = 'td_header_ad';	
				$data = $this->common_model->save_data($table,$fields,$id,'header_ad_id');	
				if($data)	
				{	
					$this->session->set_flashdata('success_message','Header Ad successfully updated');	
					redirect(base_url().'admin/manage_ads/header_ad');	
				}
			}
		}
		

		/* for insert slider */

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-header-ad-view',$data,true);
		
		$this->load->view('admin/layout-after-login',$data);
	}
	
	function header_ad_confirmDelete($id)
	{
		if($this->session->flashdata('success_message'))
		{
			$data['success_message'] =  $this->session->flashdata('success_message');
		}
		if($this->session->flashdata('error_message'))
		{
			$data['error_message'] =  $this->session->flashdata('error_message');
		}
		$administrative_details = $this->db->query("select * from td_header_ad where header_ad_id='$id'")->row();
		$image_file = $administrative_details->filename;			

		$this->load->helper("url");
		if($image_file!='') {
			unlink(FCPATH . '/uploads/header_ad/' . $image_file);
		}

		$table['name'] = 'td_header_ad';
		if($this->common_model->delete_data($table,$id,'header_ad_id'))
		{
			$this->session->set_flashdata('success_message','Header ad has been Deleted successfully.');
			redirect('admin/manage_ads/header_ad');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('admin/manage_ads/header_ad');
		}
	}	

	function header_ad_deactive($id)
	{
		$postdata = array(
							'published' => 0
						);
		$table['name'] = 'td_header_ad';
		$deactive = $this->common_model->save_data($table,$postdata,$id,'header_ad_id');	

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Header ad successfully deactivated');
				redirect('admin/manage_ads/header_ad');
			}
		else
			{
				redirect('admin/manage_ads/header_ad');
			}
	}	

	function header_ad_active($id)
	{
		$postdata = array(
							'published' => 1
						);
		$table['name'] = 'td_header_ad';
		$deactive = $this->common_model->save_data($table,$postdata,$id,'header_ad_id');
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Header ad successfully activated');
				redirect('admin/manage_ads/header_ad');
			}
		else
			{	
				redirect('admin/manage_ads/header_ad');
			}
	}

	
	function header_ad_form_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('slot_name', 'Slot Name', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			return FALSE;
		}
		else
		{
			return true;
		}
	}
	
	function ajax_rank_header()
	{		
		$valu = explode("/",$this->input->post('valu'));
		$to_rank = $valu[0];  //3
		$id = $valu[1];
		$p_rank = $valu[2];  //5
		//$prev_rank = $prev_rank_result->prev_rank;	

		if($to_rank>$p_rank) {    

				$u1 = $this->db->query("UPDATE `td_header_ad` SET prev_rank=rank WHERE `rank`>$p_rank and `rank`<=$to_rank");
		        $u2 = $this->db->query("UPDATE `td_header_ad` SET `rank`=0 WHERE `rank`>$p_rank and `rank`<=$to_rank");
		        $count_zero = $this->db->query("select * from `td_header_ad` where `rank`=0")->num_rows();
		        $prev_rank_result =$this->db->query("select * from td_header_ad where rank=0")->result();
				$updt_rank = $this->db->query("UPDATE `td_header_ad` SET `rank`=$to_rank WHERE header_ad_id=$id");

				foreach($prev_rank_result as $prev_rank_result)
				{
					$prev_rank = $prev_rank_result->prev_rank;
					$new_rank = $prev_rank-1;
					$prev_id = $prev_rank_result->header_ad_id;
					$updt_rank1 = $this->db->query("UPDATE `td_header_ad` SET `rank`=$new_rank,prev_rank=0 WHERE header_ad_id=$prev_id");
				}
		}
		else if($to_rank<$p_rank) {
			     $u1 = $this->db->query("UPDATE `td_header_ad` SET prev_rank=rank WHERE `rank`>=$to_rank and `rank`<$p_rank");
		         $u2 = $this->db->query("UPDATE `td_header_ad` SET `rank`=0 WHERE `rank`>=$to_rank and `rank`<$p_rank");
		         $count_zero = $this->db->query("select * from `td_header_ad` where `rank`=0")->num_rows();
		         $prev_rank_result =$this->db->query("select * from td_header_ad where prev_rank!=0")->result();
				$updt_rank = $this->db->query("UPDATE `td_header_ad` SET `rank`=$to_rank WHERE header_ad_id=$id");
				//echo "UPDATE `td_inner_ad` SET `rank`=$to_rank WHERE id=$id";die;
				//die;
				foreach($prev_rank_result as $prev_rank_result1)
				{
					$prev_rank = $prev_rank_result1->prev_rank;					
					$new_rank = $prev_rank+1;					
					$prev_id = $prev_rank_result1->header_ad_id;					
					//echo "UPDATE `td_inner_ad` SET `rank`=$new_rank,prev_rank=0 WHERE id=$prev_id";die;
					$updt_rank1 = $this->db->query("UPDATE `td_header_ad` SET `rank`=$new_rank,prev_rank=0 WHERE header_ad_id=$prev_id");
				}
		}
	}	
	
	######################################### HEADER AD ######################################
	
	######################################### INNER PAGE AD ######################################
	
	public function inner_page_ad()
	{
		$table['name'] = 'td_inner_ad';
		$order_by[0] = array('field'=>'rank','type'=>'asc');
		$data['rows']=$this->Common_model->find_data($table,'array','','','','','', $order_by);
		
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-inner-ad-list-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}
	

	function inner_page_add()
	{
		$data['action'] = 'Add';
		$data['pages'] = array(
									''=>'Select Page',
									'Study_Material'=>'Study Material',
									'Coching'=>'Coching',
									'Previous_Year_Questions'=>'Previous Year Questions',
									'Placement_Paper'=>'Placement Paper',
									'PG_Accomodation'=>'PG Accomodation'
									);
		/* for insert slider */

		if($this->input->post('mode')=='slider')
		{
			if($this->inner_page_form_validate() == FALSE)
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
	
				if(($imageFileType != "jpg")&&($imageFileType != "JPG")&&($imageFileType != "png")&&($imageFileType != "PNG")&&($imageFileType != "jpeg")&&($imageFileType != "JPEG")&&($imageFileType != "gif")&&($imageFileType != "GIF"))
				{	
					$this->session->set_flashdata('err_message', 'Sorry, only jpg,png,jpeg files are allowed');	
					redirect(current_url());	
				}	
				$image = time().$imge;	
				$temp = $_FILES["slider_image"]["tmp_name"];
				$image_path = 'uploads/inner_ad/';
		   		move_uploaded_file($temp,$image_path.$image);				
	
				$notice_date = date_format(date_create($this->input->post('expiry_date')), "Y-m-d");
				$curr_date = date("Y-m-d");
				
				$page_name = $this->input->post('page_name');
				$result = $this->db->query("SELECT MAX(rank) as rank FROM `td_inner_ad` WHERE page_name='$page_name'")->row();
				$data['rank'] = $result->rank;
				$new_rank = $data['rank']+1; 	
				
				$fields = array(	
								'page_name' => $this->input->post('page_name'),		
								'expiry_date' => $notice_date,					
								'filename' => $image,
								'rank'=>$new_rank	
				);
				
				if($curr_date>$notice_date)
				{ $fields['published'] = 0; }
				else { $fields['published'] = 1; }
				//echo '<pre>';print_r($fields);die;
				$table['name'] = 'td_inner_ad';	
				$data = $this->common_model->save_data($table,$fields,'','inner_ad_id');	
				if($data)	
				{	
					$this->session->set_flashdata('success_message','Inner Page Ad successfully inserted');	
					redirect(base_url().'admin/manage_ads/inner_page_ad');	
				}
			}
		}

		/* for insert slider */
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-inner-ad-view',$data,true);
		
		$this->load->view('admin/layout-after-login',$data);

	}
	
	function inner_page_edit($id)
	{	

		$data['action'] = 'Edit';
		$table['name'] = 'td_inner_ad';
		$conditions = array('inner_ad_id'=>$id);
		$data['row'] = $this->common_model->find_data($table,'row','',$conditions);
		//echo '<pre>';print_r($data['row']);die;

		$data['pages'] = array(
									''=>'Select Page',
									'Study_Material'=>'Study Material',
									'Coching'=>'Coching',
									'Previous_Year_Questions'=>'Previous Year Questions',
									'Placement_Paper'=>'Placement Paper',
									'PG_Accomodation'=>'PG Accomodation'
									);
		/* for insert slider */

		if($this->input->post('mode')=='slider')
		{
			if($this->inner_page_form_validate() == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{
				$administrative_details = $this->db->query("select * from td_inner_ad where inner_ad_id='$id'")->row();
				$image_file = $administrative_details->filename;			
		
				$this->load->helper("url");
				if($image_file!='') {
					unlink(FCPATH . '/uploads/inner_ad/' . $image_file);
				}
		
		
				$imge = $_FILES["slider_image"]["name"];
				if($imge == '')	
				{	
					$image = $data['row']->filename;
				}							
				else
				{
					$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);
		
					if(($imageFileType != "jpg")&&($imageFileType != "JPG")&&($imageFileType != "png")&&($imageFileType != "PNG")&&($imageFileType != "jpeg")&&($imageFileType != "JPEG")&&($imageFileType != "gif")&&($imageFileType != "GIF"))	
					{	
						$this->session->set_flashdata('err_message', 'Sorry, only jpg,png,jpeg files are allowed');	
						redirect(current_url());	
					}	
					$image = time().$imge;	
					$temp = $_FILES["slider_image"]["tmp_name"];
					$image_path = 'uploads/inner_ad/';
					move_uploaded_file($temp,$image_path.$image);				
				}
				
				$notice_date = date_format(date_create($this->input->post('expiry_date')), "Y-m-d");
				$curr_date = date("Y-m-d");				
				
				$page_name = $this->input->post('page_name');
				$result = $this->db->query("SELECT MAX(rank) as rank FROM `td_inner_ad` WHERE page_name='$page_name'")->row();
				$data['rank'] = $result->rank;
				$new_rank = $data['rank']+1;	
				
				$fields = array(	
								'page_name' => $this->input->post('page_name'),		
								'expiry_date' => $notice_date,					
								'filename' => $image,
								'rank'=>$new_rank	
				);
				
				if($curr_date>$notice_date)
				{ $fields['published'] = 0; }
				else { $fields['published'] = 1; }
				
				
				//echo '<pre>';print_r($fields);die;
				$table['name'] = 'td_inner_ad';	
				$data = $this->common_model->save_data($table,$fields,$id,'inner_ad_id');	
				if($data)	
				{	
					$this->session->set_flashdata('success_message','Inner Page Ad successfully updated');	
					redirect(base_url().'admin/manage_ads/inner_page_ad');	
				}
			}
		}
		

		/* for insert slider */

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-inner-ad-view',$data,true);
		
		$this->load->view('admin/layout-after-login',$data);
	}
	
	function inner_page_confirmDelete($id)
	{
		if($this->session->flashdata('success_message'))
		{
			$data['success_message'] =  $this->session->flashdata('success_message');
		}
		if($this->session->flashdata('error_message'))
		{
			$data['error_message'] =  $this->session->flashdata('error_message');
		}
		$administrative_details = $this->db->query("select * from td_inner_ad where inner_ad_id='$id'")->row();
		$image_file = $administrative_details->filename;			

		$this->load->helper("url");
		if($image_file!='') {
			unlink(FCPATH . '/uploads/inner_ad/' . $image_file);
		}

		$table['name'] = 'td_inner_ad';
		if($this->common_model->delete_data($table,$id,'inner_ad_id'))
		{
			$this->session->set_flashdata('success_message','Inner page ad has been Deleted successfully.');
			redirect('admin/manage_ads/inner_page_ad');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('admin/manage_ads/inner_page_ad');
		}
	}	

	function inner_page_deactive($id)
	{
		$postdata = array(
							'published' => 0
						);
		$table['name'] = 'td_inner_ad';
		$deactive = $this->common_model->save_data($table,$postdata,$id,'inner_ad_id');	

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Inner Page ad successfully deactivated');
				redirect('admin/manage_ads/inner_page_ad');
			}
		else
			{
				redirect('admin/manage_ads/inner_page_ad');
			}
	}	

	function inner_page_active($id)
	{
		$postdata = array(
							'published' => 1
						);
		$table['name'] = 'td_inner_ad';
		$deactive = $this->common_model->save_data($table,$postdata,$id,'inner_ad_id');
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Inner Page ad successfully activated');
				redirect('admin/manage_ads/inner_page_ad');
			}
		else
			{	
				redirect('admin/manage_ads/inner_page_ad');
			}
	}

	
	function inner_page_form_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('page_name', 'Page Name', 'required');
		$this->form_validation->set_rules('expiry_date', 'Expiry Date', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			return FALSE;
		}
		else
		{
			return true;
		}
	}
		
	function ajax_rank()
	{		
		$valu = explode("/",$this->input->post('valu'));
		$to_rank = $valu[0];  //3
		$id = $valu[1];
		$p_rank = $valu[2];  //5
		//$prev_rank = $prev_rank_result->prev_rank;	

		if($to_rank>$p_rank) {    

				$u1 = $this->db->query("UPDATE `td_inner_ad` SET prev_rank=rank WHERE `rank`>$p_rank and `rank`<=$to_rank");
		        $u2 = $this->db->query("UPDATE `td_inner_ad` SET `rank`=0 WHERE `rank`>$p_rank and `rank`<=$to_rank");
		        $count_zero = $this->db->query("select * from `td_inner_ad` where `rank`=0")->num_rows();
		        $prev_rank_result =$this->db->query("select * from td_inner_ad where rank=0")->result();
				$updt_rank = $this->db->query("UPDATE `td_inner_ad` SET `rank`=$to_rank WHERE inner_ad_id=$id");

				foreach($prev_rank_result as $prev_rank_result)
				{
					$prev_rank = $prev_rank_result->prev_rank;
					$new_rank = $prev_rank-1;
					$prev_id = $prev_rank_result->inner_ad_id;
					$updt_rank1 = $this->db->query("UPDATE `td_inner_ad` SET `rank`=$new_rank,prev_rank=0 WHERE inner_ad_id=$prev_id");
				}
		}
		else if($to_rank<$p_rank) {
			     $u1 = $this->db->query("UPDATE `td_inner_ad` SET prev_rank=rank WHERE `rank`>=$to_rank and `rank`<$p_rank");
		         $u2 = $this->db->query("UPDATE `td_inner_ad` SET `rank`=0 WHERE `rank`>=$to_rank and `rank`<$p_rank");
		         $count_zero = $this->db->query("select * from `td_inner_ad` where `rank`=0")->num_rows();
		         $prev_rank_result =$this->db->query("select * from td_inner_ad where prev_rank!=0")->result();
				$updt_rank = $this->db->query("UPDATE `td_inner_ad` SET `rank`=$to_rank WHERE inner_ad_id=$id");
				//echo "UPDATE `td_inner_ad` SET `rank`=$to_rank WHERE id=$id";die;
				//die;
				foreach($prev_rank_result as $prev_rank_result1)
				{
					$prev_rank = $prev_rank_result1->prev_rank;					
					$new_rank = $prev_rank+1;					
					$prev_id = $prev_rank_result1->inner_ad_id;					
					//echo "UPDATE `td_inner_ad` SET `rank`=$new_rank,prev_rank=0 WHERE id=$prev_id";die;
					$updt_rank1 = $this->db->query("UPDATE `td_inner_ad` SET `rank`=$new_rank,prev_rank=0 WHERE inner_ad_id=$prev_id");
				}
		}
	}	
	
	
	######################################### INNER PAGE AD ######################################
	
	######################################### SECTION AD ######################################
	
	public function section_ad()
	{
		$table['name'] = 'td_section_ad';
		$data['rows']=$this->Common_model->find_data($table,'array');
		
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-section-ad-list-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}
	

	function section_ad_add()
	{
		$data['action'] = 'Add';
		$data['pages'] = array(
									''=>'Select Page',
									'Below_Search'=>'Below Search',
									'Below_Top_10'=>'Below Top 10',
									'Below_Students_Zone'=>'Below Students Zone',
									'Below_Forum'=>'Below Forum'
									);
		/* for insert slider */

		if($this->input->post('mode')=='slider')
		{
			if($this->section_ad_form_validate() == FALSE)
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
	
				if(($imageFileType != "jpg")&&($imageFileType != "JPG")&&($imageFileType != "png")&&($imageFileType != "PNG")&&($imageFileType != "jpeg")&&($imageFileType != "JPEG")&&($imageFileType != "gif")&&($imageFileType != "GIF"))
				{	
					$this->session->set_flashdata('err_message', 'Sorry, only jpg,png,jpeg files are allowed');	
					redirect(current_url());	
				}
				
				$imagedetails = getimagesize($_FILES['slider_image']['tmp_name']);
				$width = $imagedetails[0];
				$height = $imagedetails[1];
				if($width > 728 && $height > 90)
				{  
					$this->session->set_flashdata('err_message', 'Sorry please upload 728 x 90 dimension image');
					redirect(current_url());
				}
					
						
				$image = time().$imge;	
				$temp = $_FILES["slider_image"]["tmp_name"];
				$image_path = 'uploads/section_ad/';
		   		move_uploaded_file($temp,$image_path.$image);	
				
				$fields = array(	
								'section_name' => $this->input->post('section_name'),	
								'filename' => $image,
								'published'=>1
				);				
				
				$table['name'] = 'td_section_ad';	
				$data = $this->common_model->save_data($table,$fields,'','section_ad_id');	
				if($data)	
				{	
					$this->session->set_flashdata('success_message','Header Ad successfully inserted');	
					redirect(base_url().'admin/manage_ads/section_ad');	
				}
			}
		}

		/* for insert slider */
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-section-ad-view',$data,true);
		
		$this->load->view('admin/layout-after-login',$data);

	}
	
	function section_ad_edit($id)
	{	

		$data['action'] = 'Edit';
		$table['name'] = 'td_section_ad';
		$conditions = array('section_ad_id'=>$id);
		$data['row'] = $this->common_model->find_data($table,'row','',$conditions);
		//echo '<pre>';print_r($data['row']);die;

		$data['pages'] = array(
									''=>'Select Page',
									'Below_Search'=>'Below Search',
									'Below_Top_10'=>'Below Top 10',
									'Below_Students_Zone'=>'Below Students Zone',
									'Below_Forum'=>'Below Forum'
									);
		/* for insert slider */

		if($this->input->post('mode')=='slider')
		{
			if($this->section_ad_form_validate() == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{
				$imge = $_FILES["slider_image"]["name"];
				if($imge == '')	
				{	
					$image = $data['row']->filename;	
				}							
				else
				{
					$administrative_details = $this->db->query("select * from td_section_ad where section_ad_id='$id'")->row();
					$image_file = $administrative_details->filename;			
			
					$this->load->helper("url");
					if($image_file!='') {
						unlink(FCPATH . '/uploads/section_ad/' . $image_file);
					}
				
				
					$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);
		
					if(($imageFileType != "jpg")&&($imageFileType != "JPG")&&($imageFileType != "png")&&($imageFileType != "PNG")&&($imageFileType != "jpeg")&&($imageFileType != "JPEG")&&($imageFileType != "gif")&&($imageFileType != "GIF"))	
					{	
						$this->session->set_flashdata('err_message', 'Sorry, only jpg,png,jpeg files are allowed');	
						redirect(current_url());	
					}
					
					$imagedetails = getimagesize($_FILES['slider_image']['tmp_name']);
					$width = $imagedetails[0];
					$height = $imagedetails[1];
					if($width > 728 && $height > 90)
					{  
						$this->session->set_flashdata('err_message', 'Sorry please upload 728 x 90 dimension image');
						redirect(current_url());
					}
					
					$image = time().$imge;	
					$temp = $_FILES["slider_image"]["tmp_name"];
					$image_path = 'uploads/section_ad/';
					move_uploaded_file($temp,$image_path.$image);				
				}
				
					
				
				$fields = array(	
								'section_name' => $this->input->post('section_name'),	
								'filename' => $image,
								'published'=>1
				);
				
				//echo '<pre>';print_r($fields);die;
				$table['name'] = 'td_section_ad';	
				$data = $this->common_model->save_data($table,$fields,$id,'section_ad_id');	
				if($data)	
				{	
					$this->session->set_flashdata('success_message','Section Ad successfully updated');	
					redirect(base_url().'admin/manage_ads/section_ad');	
				}
			}
		}
		

		/* for insert slider */

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-section-ad-view',$data,true);
		
		$this->load->view('admin/layout-after-login',$data);
	}
	
	function section_ad_confirmDelete($id)
	{
		if($this->session->flashdata('success_message'))
		{
			$data['success_message'] =  $this->session->flashdata('success_message');
		}
		if($this->session->flashdata('error_message'))
		{
			$data['error_message'] =  $this->session->flashdata('error_message');
		}
		$administrative_details = $this->db->query("select * from td_section_ad where section_ad_id='$id'")->row();
		$image_file = $administrative_details->filename;			

		$this->load->helper("url");
		if($image_file!='') {
			unlink(FCPATH . '/uploads/section_ad/' . $image_file);
		}

		$table['name'] = 'td_section_ad';
		if($this->common_model->delete_data($table,$id,'section_ad_id'))
		{
			$this->session->set_flashdata('success_message','Header ad has been Deleted successfully.');
			redirect('admin/manage_ads/section_ad');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('admin/manage_ads/section_ad');
		}
	}	

	function section_ad_deactive($id)
	{
		$postdata = array(
							'published' => 0
						);
		$table['name'] = 'td_section_ad';
		$deactive = $this->common_model->save_data($table,$postdata,$id,'section_ad_id');	

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Section ad successfully deactivated');
				redirect('admin/manage_ads/section_ad');
			}
		else
			{
				redirect('admin/manage_ads/section_ad');
			}
	}	

	function section_ad_active($id)
	{
		$postdata = array(
							'published' => 1
						);
		$table['name'] = 'td_section_ad';
		$deactive = $this->common_model->save_data($table,$postdata,$id,'section_ad_id');
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Section ad successfully activated');
				redirect('admin/manage_ads/section_ad');
			}
		else
			{	
				redirect('admin/manage_ads/section_ad');
			}
	}

	
	function section_ad_form_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('section_name', 'Section Name', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			return FALSE;
		}
		else
		{
			return true;
		}
	}
	
	
	
	
	######################################### SECTION AD ######################################
}



