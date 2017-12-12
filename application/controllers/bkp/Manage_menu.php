<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Manage_menu extends CI_Controller {

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

	/*function index()

	{

		$conditions=array('thi_cities.published'=>1);

		$data['rows'] = $this->city_model->find_data('thi_cities.*,thi_states.state_name',$conditions);

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/manage-city-list-view',$data,true);

		$this->load->view('admin/layout_after_login',$data);

	}*/

	######################################################################################

	

	function main_page()

	{

		$table['name']='td_category';

		$conditions = array('parent_id'=>0);

		$data['rows'] = $this->Common_model->find_data($table,'array','',$conditions);

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/manage-main-page-list-view',$data,true);

		

		$this->load->view('admin/layout-after-login',$data);

	}

	#######################################################################################

	function main_page_add()

	{

		$data['action'] = 'Add';

		

		

		if($this->input->post('mode')=='main_category')

		{		

		

					/*$imge = $_FILES["slider_image"]["name"];

		

					if($imge == '')

					{

						$this->session->set_flashdata('message', 'Please upload an image');

						redirect(current_url());

					}

					else

					{

						$exp = explode('.',$imge);

						$imageFileType = $exp[1];

						

						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )

						{

							$this->session->set_flashdata('message', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed');

							redirect(current_url());

						}

						

						$imagedetails = getimagesize($_FILES['slider_image']['tmp_name']);

						$width = $imagedetails[0];

						$height = $imagedetails[1];

						

						

						if($width > 640 && $height > 480)

						{  

							$this->session->set_flashdata('message', 'Sorry file is small');

							redirect(current_url());

						}

				

				

						$image = $exp[0].time().'.'.$exp[1];

						$temp = $_FILES["slider_image"]["tmp_name"];

						$image_path = 'uploads/maincategory/';

						move_uploaded_file($temp,$image_path.$image);

					}*/

					

			

					if($this->main_page_form_validate() == FALSE)

					{

						

						$data['error_message']=validation_errors();

						

					}

					else

					{

						$table['name']='td_category';

						$postdata = array(

											'parent_id'=>0,

											'sub_parent_id'=>0,

											'cat_type'=>'',

											'cat_name'=>$this->input->post('cat_name'),

											'cat_seo_name'=>$this->input->post('cat_seo_name'),

											'meta_title'=>$this->input->post('meta_title'),

											'meta_desc'=>$this->input->post('meta_desc'),

											'created'=>date('Y-m-d h:i:s'),

											'published'=> 1

											);

						//echo '<pre>';print_r($postdata);die;

						$success = $this->Common_model->save_data($table,$postdata,'','cat_id');					

						if($success)

						{	

							$this->session->set_flashdata('success_message','Main Category successfully inserted');	

							redirect('admin/manage_menu/main_page');

						}

						else

						{	

							redirect('admin/manage_menu/main_page');					

						}	

					}

		}	

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-main-page-view',$data,true);

		

		

		

		$this->load->view('admin/layout-after-login',$data);

	}

	######################################################################################

	

	function main_page_edit($id)

	{

		$data['action'] = 'Edit';

		$conditions = array('cat_id'=>$id);

		$table['name']='td_category';

		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);

		

		if($this->input->post('mode')=='main_category')

		{		

				/*$imge = $_FILES["slider_image"]["name"];

		

					if($imge == '')

					{

						if($data['row']->main_category_logo=='')

						{

							$image = '';

						}

						else

						{

							$image = $data['row']->main_category_logo;

						}

					}

					else

					{

						$exp = explode('.',$imge);

						$imageFileType = $exp[1];

						

						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )

						{

							$this->session->set_flashdata('message', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed');

							redirect(current_url());

						}

						

						$imagedetails = getimagesize($_FILES['slider_image']['tmp_name']);

						$width = $imagedetails[0];

						$height = $imagedetails[1];

						

						

						if($width > 640 && $height > 480)

						{  

							$this->session->set_flashdata('message', 'Sorry file is small');

							redirect(current_url());

						}

						

						

						$image = $exp[0].time().'.'.$exp[1];

						$temp = $_FILES["slider_image"]["tmp_name"];

						$image_path = 'uploads/maincategory/';

						move_uploaded_file($temp,$image_path.$image);

					}*/

			

			

					if($this->main_page_form_validate() == FALSE)

					{

						$data['error_message']=validation_errors();

					}

					else

					{

						$table['name']='td_category';

						$postdata = array(

											'parent_id'=>0,

											'sub_parent_id'=>0,

											'cat_type'=>'',

											'cat_name'=>$this->input->post('cat_name'),

											'cat_seo_name'=>$this->input->post('cat_seo_name'),

											'meta_title'=>$this->input->post('meta_title'),

											'meta_desc'=>$this->input->post('meta_desc'),

											'modified'=>date('Y-m-d h:i:s'),

											'published'=> 1

											);

									

						$success = $this->Common_model->save_data($table,$postdata,$id,'cat_id');					

						if($success)

						{	

							$this->session->set_flashdata('success_message','Main Category successfully updated');	

							redirect('admin/manage_menu/main_page');

						}

						else

						{	

							redirect('admin/manage_menu/main_page');					

						}	

					}

		}			

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-main-page-view',$data,true);

		

		

		

		$this->load->view('admin/layout-after-login',$data);

	}

	######################################################################################

	

	function main_page_confirmDelete($id)

	{

		if($this->session->flashdata('success_message'))

		{

			$data['success_message'] =  $this->session->flashdata('success_message');

		}

		if($this->session->flashdata('error_message'))

		{

			$data['error_message'] =  $this->session->flashdata('error_message');

		}

		

		$table['name']='td_category';

		if($this->Common_model->delete_data($table,$id,'cat_id'))

		{

			$this->session->set_flashdata('success_message','Record has been Deleted successfully.');

			redirect('admin/manage_menu/main_page');

		}

		else

		{

			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');

			redirect('admin/manage_menu/main_page');

		}

	}

	

	##############################################################################################

	

	function deactive($id)

	{	

		

		$postdata = array(

							'published' => 0

						);

		$table['name'] = 'td_category';				

		$deactive = $this->Common_model->save_data($table,$postdata,$id,'cat_id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','Main Category successfully deactivated');	

				redirect('admin/manage_menu/main_page');

			}

		else

			{	

				redirect('admin/manage_menu/main_page');					

			}

	}

	

	function active($id)

	{		

		

		$postdata = array(

							'published' => 1

						);

		$table['name'] = 'td_category';	

		$deactive = $this->Common_model->save_data($table,$postdata,$id,'cat_id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','Main Category successfully activated');	

				redirect('admin/manage_menu/main_page');

			}

		else

			{	

				redirect('admin/manage_menu/main_page');				

			}

	}

	

	##############################################################################################

	

	

	function main_page_form_validate()

	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('cat_name', 'Main Category Name', 'required');

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

	

	#################################  SUB PAGE START #####################################

	

	function sub_page()

	{			

		$table['name']='td_category';

		$conditions = array('parent_id!='=>0);

		$data['rows']=$this->Common_model->find_data($table,'array','',$conditions);

		

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/manage-sub-page-list-view',$data,true);

		

		$this->load->view('admin/layout-after-login',$data);

	}

	#######################################################################################

	function sub_page_add()

	{

	

		$data['action'] = 'Add';

	

		

		$select = 'cat_id,cat_name';	

		$conditions = array('parent_id'=>0);

		$order_by[0] = array('field'=>'cat_id','type'=>'ASC');

		$table['name']='td_category';

		$list = array('empty_name'=>' Main Topic','key'=>'cat_id','value'=>'cat_name');

		$data['categories']=$this->Common_model->find_data($table,'list',$list,$conditions,$select,'','',$order_by);

	

		if($this->input->post('mode')=='sub_category')

		{

					/*$imge = $_FILES["slider_image"]["name"];

		

					if($imge == '')

					{

						$this->session->set_flashdata('message', 'Please upload an image');

						redirect(current_url());

					}

					else

					{

						$exp = explode('.',$imge);

						$imageFileType = $exp[1];

						

						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" )

						{

							$this->session->set_flashdata('message', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed');

							redirect(current_url());

						}

						

						$imagedetails = getimagesize($_FILES['slider_image']['tmp_name']);

						$width = $imagedetails[0];

						$height = $imagedetails[1];

						

						

						if($width > 640 && $height > 480)

						{  

							$this->session->set_flashdata('message', 'Sorry file is small');

							redirect(current_url());

						}

						

						

						$image = $exp[0].time().'.'.$exp[1];

						$temp = $_FILES["slider_image"]["tmp_name"];

						$image_path = 'uploads/subcategory/';

						move_uploaded_file($temp,$image_path.$image);

					}*/

					

							

					if($this->sub_page_form_validate() == FALSE)

					{

						$data['error_message']=validation_errors();

					}

					else

					{

						$table['name']='td_category';

						$postdata = array(

											'parent_id'=>$this->input->post('parent_id'),

											'sub_parent_id'=>0,

											'cat_type'=>'',

											'cat_name'=>$this->input->post('cat_name'),

											'cat_seo_name'=>$this->input->post('cat_seo_name'),

											'meta_title'=>$this->input->post('meta_title'),

											'meta_desc'=>$this->input->post('meta_desc'),

											'modified'=>date('Y-m-d h:i:s'),

											'published'=> 1

											);

														

						$success = $this->Common_model->save_data($table,$postdata,'','cat_id');						

						if($success)

						{	

							$this->session->set_flashdata('success_message','Sub Category successfully inserted');	

							redirect('admin/manage_menu/sub_page');

						}

						else

						{	

							redirect('admin/manage_menu/sub_page');				

						}	

					}

		}			

	

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-sub-page-view',$data,true);

		

		

		

		$this->load->view('admin/layout-after-login',$data);

		

	}

	######################################################################################

	

	function sub_page_edit($id)

	{

		

		$data['action'] = 'Edit';



		

		$select = 'cat_id,cat_name';	

		$conditions = array('parent_id'=>0);

		$order_by[0] = array('field'=>'cat_id','type'=>'ASC');

		$table['name']='td_category';

		$list = array('empty_name'=>' Main Topic','key'=>'cat_id','value'=>'cat_name');

		$data['categories']=$this->Common_model->find_data($table,'list',$list,$conditions,$select,'','',$order_by);

		

		

		

		$data['row'] = $this->db->query("select * from td_category where cat_id=$id")->row();

		

		if($this->input->post('mode')=='sub_category')

		{	

		

					/*$imge = $_FILES["slider_image"]["name"];

		

					if($imge == '')

					{

						if($data['row']->subpage_image=='')

						{

							$image = '';

						}

						else

						{

							$image = $data['row']->subpage_image;

						}

					}

					else

					{

						$exp = explode('.',$imge);

						$imageFileType = $exp[1];

						

						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" )

						{

							$this->session->set_flashdata('message', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed');

							redirect(current_url());

						}

						

						$imagedetails = getimagesize($_FILES['slider_image']['tmp_name']);

						$width = $imagedetails[0];

						$height = $imagedetails[1];

				

				

						if($width > 640 && $height > 480)

						{  

							$this->session->set_flashdata('message', 'Sorry file is small');

							redirect(current_url());

						}

						

						

						$image = $exp[0].time().'.'.$exp[1];

						$temp = $_FILES["slider_image"]["tmp_name"];

						$image_path = 'uploads/subcategory/';

						move_uploaded_file($temp,$image_path.$image);

					}*/

					

					

					if($this->sub_page_form_validate() == FALSE)

					{

						$data['error_message']=validation_errors();

					}

					else

					{

						$table['name']='td_category';

						$postdata = array(

											'parent_id'=>$this->input->post('parent_id'),

											'sub_parent_id'=>0,

											'cat_type'=>'',

											'cat_name'=>$this->input->post('cat_name'),

											'cat_seo_name'=>$this->input->post('cat_seo_name'),

											'meta_title'=>$this->input->post('meta_title'),

											'meta_desc'=>$this->input->post('meta_desc'),

											'modified'=>date('Y-m-d h:i:s'),

											'published'=> 1

											);

											

													

						$success = $this->Common_model->save_data($table,$postdata,$id,'cat_id');						

						if($success)

						{	

							$this->session->set_flashdata('success_message','Sub Category successfully updated');	

							redirect('admin/manage_menu/sub_page');

						}

						else

						{	

							

							redirect('admin/manage_menu/sub_page');				

						}	

					}

		}			

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-sub-page-view',$data,true);

		

		

		

		$this->load->view('admin/layout-after-login',$data);

	}

	######################################################################################

	

	function sub_page_confirmDelete($id)

	{

		if($this->session->flashdata('success_message'))

		{

			$data['success_message'] =  $this->session->flashdata('success_message');

		}

		if($this->session->flashdata('error_message'))

		{

			$data['error_message'] =  $this->session->flashdata('error_message');

		}

		

		$table['name']='td_category';

		if($this->Common_model->delete_data($table,$id,'cat_id'))

		{

			$this->session->set_flashdata('success_message','Record has been Deleted successfully.');

			redirect('admin/manage_menu/sub_page');

		}

		else

		{

			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');

			redirect('admin/manage_menu/sub_page');

		}

	}

	

	##############################################################################################

	

	

	function sub_page_form_validate()

	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('parent_id', 'Main Category Name', 'required');

		$this->form_validation->set_rules('cat_name', 'Sub Page Name', 'required');

		if ($this->form_validation->run() == FALSE)

		{

			return FALSE;

		}

		else

		{

			return true;

		}

	}

	

	##############################################################################################

	

	function deactive_sub($id)

	{	

		

		$postdata = array(

							'published' => 0

						);

		$table['name'] = 'td_category';				

		$deactive = $this->Common_model->save_data($table,$postdata,$id,'cat_id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','Sub Category successfully deactivated');	

				redirect('admin/manage_menu/sub_page');

			}

		else

			{	

				redirect('admin/manage_menu/sub_page');					

			}

	}

	

	function active_sub($id)

	{		

		

		$postdata = array(

							'published' => 1

						);

		$table['name'] = 'td_category';	

		$deactive = $this->Common_model->save_data($table,$postdata,$id,'cat_id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','Sub Category successfully activated');	

				redirect('admin/manage_menu/sub_page');

			}

		else

			{	

				redirect('admin/manage_menu/sub_page');				

			}

	}

	

	##############################################################################################

	

	#################################  SUB PAGE END ##############################################

	

}



