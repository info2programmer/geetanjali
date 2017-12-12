<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
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
		$data['action'] = 'Edit';
		
		
		
		$user_id = $this->session->userdata('user_id1');
		$conditions=array('published'=>1,'id'=>$user_id);
		$table['name'] = 'td_users';
		$data['row'] = $this->common_model->find_data($table,'row','',$conditions);
		
		$user_type = $data['row']->user_type;
		
		if($user_type=='C')
		{
			$clg_cat = $data['row']->college_cat;
			if($clg_cat=='Diploma')
			{			
				$select = 'id,college_name';
				$conditions=array('published'=>1,'college_category'=>'Diploma');
				$order_by[0] = array('field'=>'id','type'=>'ASC');
				$table['name']='td_colleges';
				$list = array('empty_name'=>' college Name','key'=>'id','value'=>'college_name');
				$data['colleges']=$this->Common_model->find_data($table,'list',$list,$conditions,$select,'','',$order_by);
			}
			else
			{
				$select = 'id,college_name';
				$conditions=array('published'=>1,'college_category'=>'BTech');
				$order_by[0] = array('field'=>'id','type'=>'ASC');
				$table['name']='td_colleges';
				$list = array('empty_name'=>' college Name','key'=>'id','value'=>'college_name');
				$data['colleges']=$this->Common_model->find_data($table,'list',$list,$conditions,$select,'','',$order_by);
	
			}
		}
		else if($user_type=='S')
		{
				$select = 'id,college_name';
				$conditions=array('published'=>1,'college_category'=>'Diploma');
				$order_by[0] = array('field'=>'id','type'=>'ASC');
				$table['name']='td_colleges';
				$list = array('empty_name'=>' diploma college Name','key'=>'id','value'=>'college_name');
				$data['diploma_colleges']=$this->Common_model->find_data($table,'list',$list,$conditions,$select,'','',$order_by);
				
				$select = 'id,college_name';
				$conditions=array('published'=>1,'college_category'=>'BTech');
				$order_by[0] = array('field'=>'id','type'=>'ASC');
				$table['name']='td_colleges';
				$list = array('empty_name'=>' degree college Name','key'=>'id','value'=>'college_name');
				$data['degree_colleges']=$this->Common_model->find_data($table,'list',$list,$conditions,$select,'','',$order_by);
		}

		if($this->input->post('mode')=='site_setting')
		{
			$imge = $_FILES["slider_image"]["name"];
			if($imge == '')
			{
				if($data['row']->logo_image=='')
				{
					$image = '';
				}
				else
				{
					$image = $data['row']->logo_image;
				}
			}
			else
			{			
				$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);			

				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF" )
				{					
					$this->session->set_flashdata('message', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed');
					redirect(current_url());
				}
				
				$image = time().$imge;
				
				$temp = $_FILES["slider_image"]["tmp_name"];
				
				if($user_type=='C')
				{
					$administrative_details = $this->db->query("select * from td_users where id='$user_id'")->row();
					$image_file = $administrative_details->logo_image;			
					$this->load->helper("url");			
					if($image_file!='') {			
						unlink(FCPATH . '/uploads/college/' . $image_file);			
					}		
					
					$image_path = 'uploads/college/';
					move_uploaded_file($temp,$image_path.$image);
				}
				else if($user_type=='S')
				{
					$administrative_details = $this->db->query("select * from td_users where id='$user_id'")->row();
					$image_file = $administrative_details->logo_image;			
					$this->load->helper("url");			
					if($image_file!='') {			
						unlink(FCPATH . '/uploads/student/' . $image_file);			
					}
					
					$image_path = 'uploads/student/';
					move_uploaded_file($temp,$image_path.$image);
				}
				
			}			

			$post_array = array(
								'address'=>$this->input->post('address'),
								'phone'=>$this->input->post('phone'),
								'email'=>$this->input->post('email'),
								'password'=>$this->input->post('password'),
								'logo_image'=>$image
								);
			if($user_type=='S') {					
			$post_array['student_name'] = $this->input->post('student_name');
			$post_array['student_diploma_college'] = $this->input->post('student_diploma_college');
			$post_array['student_degree_college'] = $this->input->post('student_degree_college');
			$post_array['student_pg_college_name'] = $this->input->post('student_pg_college_name');
			$post_array['other_qualification'] = $this->input->post('other_qualification');
			}
			else if($user_type=='C') {
			$post_array['college_website'] = $this->input->post('college_website');
			$post_array['college_city'] = $this->input->post('college_city');
			$post_array['college_description'] = $this->input->post('college_description');
			$post_array['college_establish'] = $this->input->post('college_establish');	
			}
			//echo '<pre>';print_r($post_array);die;								
			$table['name'] = 'td_users';
			$sucess = $this->common_model->save_data($table,$post_array,$user_id,'id');	
			if($sucess)
			{
				$this->session->set_flashdata('success_message','User successfully updated');
				redirect('admin/profile');
			}
			else
			{	
				redirect('admin/profile');
			}
		}
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/profile-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}

	

	function college_file_upload($img,$tmp)

	{

		   $image_path = base_url().'uploads/college/';

		   //echo $image_path;die;

		   if(move_uploaded_file($tmp,$image_path.$img))

		   return true;

	   }
	   
	######################################################################################
	
	function post()
	{
		
		
		
		$table['name'] = 'td_pg_post';
		if($this->session->userdata('username1')) { 
		$user_id = $this->session->userdata('user_id1');
		$conditions = array('user_id'=>$user_id);		
		$data['rows'] = $this->common_model->find_data($table,'array','',$conditions);
		//echo '<pre>';print_r($data['rows']);die;
		}
		else if($this->session->userdata('username')) {
		$data['rows'] = $this->common_model->find_data($table,'array');
		//echo '<pre>';print_r($data['rows']);die;
		}
		 
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-post-add-list-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}
	
	function post_add()
	{
		$data['action'] = 'Add';
		
		if($this->input->post('mode')=='pg')
		{
			if($this->form_validate() == FALSE)
			{
				$data['error_message']=validation_errors();				
			}
			else
			{
				/*$coupon_from = explode(" ", $this->input->post('rent_from'));
				$d = $coupon_from[0];
				$m = str_replace( ',', '', $coupon_from[1] );
				if($m=='January') { $m1 = "01"; }
				else if($m=='February') { $m1 = "02"; }
				else if($m=='March') { $m1 = "03"; }
				else if($m=='April') { $m1 = "04"; }
				else if($m=='May') { $m1 = "05"; }
				else if($m=='June') { $m1 = "06"; }
				else if($m=='July') { $m1 = "07"; }
				else if($m=='August') { $m1 = "08"; }
				else if($m=='September') { $m1 = "09"; }
				else if($m=='October') { $m1 = "10"; }
				else if($m=='November') { $m1 = "11"; }
				else if($m=='December') { $m1 = "12"; }
				$y = $coupon_from[2];
				$coupon_from1 = $y."-".$m1."-".$d;
				
				$coupon_to = explode(" ", $this->input->post('rent_to'));
				$d = $coupon_to[0];
				$n = str_replace( ',', '', $coupon_to[1] );
				if($n=='January') { $n1 = "01"; }
				else if($n=='February') { $n1 = "02"; }
				else if($n=='March') { $n1 = "03"; }
				else if($n=='April') { $n1 = "04"; }
				else if($n=='May') { $n1 = "05"; }
				else if($n=='June') { $n1 = "06"; }
				else if($n=='July') { $n1 = "07"; }
				else if($n=='August') { $n1 = "08"; }
				else if($n=='September') { $n1 = "09"; }
				else if($n=='October') { $n1 = "10"; }
				else if($n=='November') { $n1 = "11"; }
				else if($n=='December') { $n1 = "12"; }
				$y = $coupon_to[2];
				$coupon_to1 = $y."-".$n1."-".$d;*/			
			
				$imge = $_FILES["slider_image"]["name"];
				if($imge == '')
				{	
					$this->session->set_flashdata('err_message', 'Please upload an image');	
					redirect(current_url());	
				}							
				$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);	
				if(($imageFileType != "jpg")&&($imageFileType != "JPG")&&($imageFileType != "png")&&($imageFileType != "PNG")&&($imageFileType != "JPEG")&&($imageFileType != "jpeg"))	
				{	
					$this->session->set_flashdata('err_message', 'Sorry, only jpg,jpeg,png files are allowed');	
					redirect(current_url());	
				}	
				$image = time().$imge;	
				$temp = $_FILES["slider_image"]["tmp_name"];
				$image_path = 'uploads/post/';
				move_uploaded_file($temp,$image_path.$image);
			
				$fields = array(
				'title' => $this->input->post('title'),
				'name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'),
				'area' => $this->input->post('area'),
				'location' => $this->input->post('location'),
				'pin' => $this->input->post('pin'),
				'rent_from' => $this->input->post('rent_from'),
				'rent_to' => $this->input->post('rent_to'),
				'rent_from' => $this->input->post('rent_from'),
				'occupancy' => $this->input->post('occupancy'),
				'description' => $this->input->post('description'),
				'food_facility' => $this->input->post('food_facility'),
				'post_image' => $image,
				'post_type' => $this->input->post('post_type'),
				'published'		=> 0,
				'image_publish'		=> 0
				);
				//echo '<pre>';print_r($fields);die;
				$table['name'] = 'td_pg_post';
				$data = $this->Common_model->save_data($table,$fields,'','pg_id');
				if($data)
				{
					$this->session->set_flashdata('success_message','Post successfully posted');	
					redirect('admin/profile/post/');
				}
			}
		}
		
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-post-add-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}
	
	function post_view($id)
	{
		$data['action'] = 'View';
		
		$table['name'] = 'td_pg_post';
		$conditions = array('pg_id'=>$id);
		$data['row'] = $this->common_model->find_data($table,'row','',$conditions);
		//echo '<pre>';print_r($data['rows']);die;
		
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-post-add-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}
	
	##############################################################################################	

	function post_deactive($id)
	{
		$postdata = array(
							'published' => 0
						);
		$table['name'] = 'td_pg_post';
		$deactive = $this->common_model->save_data($table,$postdata,$id,'pg_id');	

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Post successfully deactivated');
				redirect('admin/profile/post/');
			}
		else
			{
				redirect('admin/profile/post/');			
		}
	}


	function post_active($id)
	{
		$postdata = array(
							'published' => 1
						);
		$table['name'] = 'td_pg_post';	
		$deactive = $this->common_model->save_data($table,$postdata,$id,'pg_id');
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Post successfully activated');
				redirect('admin/profile/post/');
			}
		else
			{
				redirect('admin/profile/post/');
			}
	}

	##############################################################################################
	
	##############################################################################################	

	function post_image_deactive($id)
	{
		$postdata = array(
							'image_publish' => 0
						);
		$table['name'] = 'td_pg_post';
		$deactive = $this->common_model->save_data($table,$postdata,$id,'pg_id');	

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Post Image successfully deactivated');
				redirect('admin/profile/post/');
			}
		else
			{
				redirect('admin/profile/post/');			
		}
	}


	function post_image_active($id)
	{
		$postdata = array(
							'image_publish' => 1
						);
		$table['name'] = 'td_pg_post';	
		$deactive = $this->common_model->save_data($table,$postdata,$id,'pg_id');
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Post Image successfully activated');
				redirect('admin/profile/post/');
			}
		else
			{
				redirect('admin/profile/post/');
			}
	}

	##############################################################################################
	
	function form_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'required');
		$this->form_validation->set_rules('area', 'Area', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');
		$this->form_validation->set_rules('pin', 'Pincode', 'required');
		$this->form_validation->set_rules('rent_to', 'Rent to', 'required');
		$this->form_validation->set_rules('rent_from', 'Renet From', 'required');
		$this->form_validation->set_rules('occupancy', 'Occupancy', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('food_facility', 'Food Facility', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			return FALSE;
		}
		else
		{
			return true;
		}
	}
	
	######################################################################################
	
	function social()
	{
		$data['action'] = 'Edit';
		
		$user_id = $this->session->userdata('user_id1');
		$conditions=array('published'=>1,'college_id'=>$user_id);
		$table['name'] = 'td_social';
		$data['row'] = $this->common_model->find_data($table,'row','',$conditions);
		
		if($this->input->post('mode')=='site_setting')
		{
			$post_array = array(
								'college_id'=>$user_id,
								'fb_link'=>$this->input->post('fb_link'),
								'twitter_link'=>$this->input->post('twitter_link'),
								'linkedin_link'=>$this->input->post('linkedin_link'),
								'google_plus_link'=>$this->input->post('google_plus_link'),
								'published'=>1
								);
			$table['name'] = 'td_social';
			
			$social_count = $this->db->query("select * from td_social where published=1 and college_id='$user_id'")->num_rows();
			if($social_count>0)
			{
				$sucess = $this->common_model->save_data($table,$post_array,$user_id,'college_id');		
			}
			else
			{
				$sucess = $this->common_model->save_data($table,$post_array,'','college_id');		
			}
			
			if($sucess)
			{
				$this->session->set_flashdata('success_message','Social link successfully updated');
				redirect('admin/profile/social');
			}
			else
			{	
				redirect('admin/profile/social');
			}					
		}
		
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/social-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}

	######################################################################################

	function ajax_call() 
	{
        if (isset($_POST) && isset($_POST['state'])) 
		{
            $state = $_POST['state'];
			//$college_name = $_POST['college_name'];				
			
			$select = 'id,college_name';
			$conditions=array('college_category'=>$state,'published'=>1,);
			$order_by[0] = array('field'=>'college_name','type'=>'ASC');
			$table['name']='td_colleges';
			$list = array('empty_name'=>' College','key'=>'id','value'=>'college_name');
			$arrCities =$this->Common_model->find_data($table,'list',$list,$conditions,$select,'','',$order_by);			
			
			$js = 'class="form-control" id="college_name"';			
            echo form_dropdown('college_name',$arrCities,'',$js);			 		 
        }		
    }

}



