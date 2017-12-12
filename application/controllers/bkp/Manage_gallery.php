<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Manage_gallery extends CI_Controller {

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

		$data['action'] = 'Manage';

		$username = $this->session->userdata('username1');
		$user_details = $this->db->query("select * from td_users where username='$username'")->row();
		$college_cat = $user_details->college_cat;
		$college_id = $user_details->id;

		$data['row'] = $this->db->query("select * from td_gallery where college_id='$college_id'")->row();

		//echo '<pre>';print_r($data['row']);die;

		$data['user_id'] = $this->session->userdata('user_id1');

		if($this->input->post('mode')=='gallery')

		{

			$postdata = array(
								'gallery_image'=>$this->input->post('file_names'),
								'college_id'=>$college_id,
								'published'=> 1
							);

			//echo '<pre>';print_r($postdata);die;	

			$table['name'] = 'td_gallery';
			
			$gallery_count = $this->db->query("select * from td_gallery where college_id='$college_id'")->num_rows();
			
			if($gallery_count>0)
			{
				$success = $this->Common_model->save_data($table,$postdata,$college_id,'college_id');
			}
			else
			{
				$success = $this->Common_model->save_data($table,$postdata,'','id');
			}

			

			if($success)

				{						

					$this->session->set_flashdata('success_message','Gallery Image successfully inserted');	

					redirect(base_url().'admin/manage_gallery');

				}

				else

				{	

					//$this->session->set_flashdata('error_message','Error! Please try again.');		

					redirect(base_url().'admin/manage_gallery');					

				}

		}

		

		//$table['name'] = 'td_gallery';		

		//$data['rows'] = $this->Common_model->find_data($table,'array');

		//echo '<pre>';print_r($data);die;	

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-gallery-view',$data,true);

		$this->load->view('admin/layout-after-login',$data);

	}

	######################################################################################

	

	function add()

	{

		$data['action'] = 'Add';

		

		

		

		/* for main page list */

		

		

		

		$select = 'id,main_page_name';

		$conditions=array('published'=>1);

		$order_by[0] = array('field'=>'id','type'=>'ASC');

		$table['name']='wl_main_page';

		$list = array('empty_name'=>' Main Category','key'=>'id','value'=>'main_page_name');

		$data['categories']=$this->Common_model->find_data($table,'list',$list,$conditions,$select,'','',$order_by);

		/* for main page list */

		/* for insert service */

		if($this->input->post('mode')=='service')

		{	

		

					$imge = $_FILES["slider_image"]["name"];

		

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

						

						/*$imagedetails = getimagesize($_FILES['slider_image']['tmp_name']);

						$width = $imagedetails[0];

						$height = $imagedetails[1];

				

				

						if($width > 640 && $height > 480)

						{  

							$this->session->set_flashdata('message', 'Sorry file is small');

							redirect(current_url());

						}*/

						

						

						$image = $exp[0].time().'.'.$exp[1];

						$temp = $_FILES["slider_image"]["tmp_name"];

						$image_path = 'uploads/package/';

						move_uploaded_file($temp,$image_path.$image);

					}

					

						

					if($this->form_validate() == FALSE)

					{

						$data['error_message']=validation_errors();

					}

					else

					{

						$postdata = array(

											'maincat_id'=>$this->input->post('maincat_id'),

											'subcat_id'=>$this->input->post('subcat_id'),

											'service_name'=>$this->input->post('service_name'),

											'service_rate'=>$this->input->post('service_rate'),

											'service_image'=>$image,

											'service_duration'=>$this->input->post('service_duration'),

											'gallery_image'=>$this->input->post('file_names'),

											'published'=> 1

											);

						//echo '<pre>';print_r($postdata);die;	

						$table['name'] = 'wl_services';		

						$success = $this->Common_model->save_data($table,$postdata,'','id');						

						if($success)

						{	

							$last_ins_id = $this->db->insert_id();

							

							for($u=1;$u<=4;$u++) {

							$postdata1 = array(

											'pkg_id'=>$last_ins_id,

											'tab_id'=>$u,

											'tab_content'=>$this->input->post("editor$u")

											);							

							$table1['name'] = 'page_content';

							$success1 = $this->Common_model->save_data($table1,$postdata1,'','id');

							}

							

							$query1 = $this->db->query("select * from wl_tabs where published=1 order by id desc limit 1")->row();

							$max_id = $query1->id;

							

							for($p=5;$p<=$max_id;$p++)

							{

								if(isset($_POST["tab_content$p"]))

								{

								$postdata2 = array(

											'pkg_id'=>$last_ins_id,

											'tab_id'=>$p,

											'tab_content'=>$this->input->post("tab_content$p")

											);

								

							$table2['name'] = 'page_content';

							$success2 = $this->Common_model->save_data($table2,$postdata2,'','id');

							}

							}

							

							

							

							

							

							if($success1)

							{						

								$this->session->set_flashdata('success_message','Service successfully inserted');	

								redirect(base_url().'admin/manage_service');

							}

							else

							{	

								$this->session->set_flashdata('error_message','Error! Please try again.');		

								redirect(current_url());					

							}

						}

							

					}

		}

		/* for insert service */

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-service-view',$data,true);

		

		

		

		$this->load->view('admin/layout-after-login',$data);

	}

	

	function multiple_image()

	{

		

		$uploaddir = 'uploads/gallery/';

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

		

		/* for main page list */

		

		$select = 'id,main_page_name';

		//$conditions=array('published'=>1);

		$order_by[0] = array('field'=>'id','type'=>'ASC');

		$table['name']='wl_main_page';

		$list = array('empty_name'=>' Main Category','key'=>'id','value'=>'main_page_name');

		$data['categories']=$this->Common_model->find_data($table,'list',$list,'',$select,'','',$order_by);

		/* for main page list */

		

		

		$data['row'] = $this->db->query("select * from wl_services where id=$id")->row();

		$data['state_id'] = $data['row']->maincat_id;

		$data['id'] = $data['row']->id;

		

		

		$data['contents'] = $this->db->query("select page_content.*,wl_tabs.tab_name from page_content inner join wl_tabs on wl_tabs.id=page_content.tab_id where page_content.pkg_id=$id")->result();

		

		

		$data['extra_content'] = $this->db->query("select * from page_content where pkg_id=$id and tab_id!=1 and tab_id!=2 and tab_id!=3 and tab_id!=4")->result();

		//echo '<pre>';print_r($data['contents']);die;

		

		/* for update city */

		if($this->input->post('mode')=='service')

		{		

		

					$imge = $_FILES["slider_image"]["name"];

		

					if($imge == '')

					{

						if($data['row']->service_image=='')

						{

							$image = '';

						}

						else

						{

							$image = $data['row']->service_image;

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

						

						/*if($width > 640 && $height > 480)

						{  

							$this->session->set_flashdata('message', 'Sorry file is small');

							redirect(current_url());

						}*/

						

						

						$image = $exp[0].time().'.'.$exp[1];

						$temp = $_FILES["slider_image"]["tmp_name"];

						$image_path = 'uploads/package/';

						move_uploaded_file($temp,$image_path.$image);

					}

					

					

					if($this->form_validate() == FALSE)

					{

						$data['error_message']=validation_errors();

					}

					else

					{

						$postdata = array(

											'maincat_id'=>$this->input->post('maincat_id'),

											'subcat_id'=>$this->input->post('subcat_id'),

											'service_name'=>$this->input->post('service_name'),

											'service_rate'=>$this->input->post('service_rate'),

											'service_image'=>$image,

											'service_duration'=>$this->input->post('service_duration'),

											'gallery_image'=>$this->input->post('file_names'),

											'published'=> 1

											);

						//echo '<pre>';print_r($postdata);die;	

						$table['name'] = 'wl_services';		

						$success = $this->Common_model->save_data($table,$postdata,$id,'id');						

						if($success)

						{	

							

							$this->session->set_flashdata('success_message','Service successfully updated');	

							redirect('admin/manage_service');

						}

						else

						{	

							//$this->session->set_flashdata('error_message','Error! Please try again.');		

							redirect('admin/manage_service');				

						}	

					}

		}			

		/* for insert city */

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-service-view',$data,true);

		

		

		

		$this->load->view('admin/layout-after-login',$data);

	}

	

	function remove_thumnail()

	{

		$filename = $this->input->post('filename');		
		$service_id = $this->input->post('id');
		
		if($service_id!='')

		{

			$service_row = $this->db->query("select gallery_image from td_gallery where id='$service_id'")->row();			

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

				unlink(FCPATH . '/uploads/gallery/' . $filename);

				

				$post_data = implode(",",$gallery_image1);

				

				$update_service = $this->db->query("update td_gallery set gallery_image='$post_data' where id='$service_id'");		

				

				

				

			}

			else

			{

				$this->load->helper("url");			

				unlink(FCPATH . '/uploads/gallery/' . $filename);			

				

			}

		}

		else

			{

				$this->load->helper("url");			

				unlink(FCPATH . '/uploads/gallery/' . $filename);			

				

			}

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

		$table['name'] = 'wl_services';

		if($this->Common_model->delete_data($table,$id))

		{

			$this->session->set_flashdata('success_message','Record has been Deleted successfully.');

			redirect('admin/manage_service');

		}

		else

		{

			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');

			redirect('admin/manage_service');

		}

	}

	

	##############################################################################################

	

	

	function form_validate()

	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('maincat_id', 'Main Category Name', 'required');		

		//$this->form_validation->set_rules('subcat_id', 'Sub Category Name', 'required');

		$this->form_validation->set_rules('service_name', 'Service Name', 'required');

		$this->form_validation->set_rules('service_rate', 'Service Rate', 'required');

		if ($this->form_validation->run() == FALSE)

		{

			return FALSE;

		}

		else

		{

			return true;

		}

	}

	

	############################################ AJAX FUNCTION ################################

	

	function tabname()

	{

		$tab_id = $this->input->post("id");	

		$tab_details = $this->db->query("select * from wl_tabs where id=$tab_id")->row();

		$tname = $tab_details->tab_name;

		

		header('Content-Type: application/json');

		echo json_encode(array('name' => $tname));

		

	}

	

	######################################### AJAX FUNCTION ####################################

	

	

	function ajax_call() 

	{

        //Checking so that people cannot go to the page directly.

        if (isset($_POST) && isset($_POST['state'])) 

		{

            $state = $_POST['state'];

			$action = $_POST['action'];

			if($action == 'Edit') {

			$sayantan = $_POST['sayantan']; 

			}

			if($action == 'Edit' && $sayantan == 'ready') {

			$id = $_POST['id']; }

			

				

			

			$select = 'id,sub_page_name';

			$conditions=array('wl_sub_pages.main_page_id'=>$state);

			$order_by[0] = array('field'=>'id','type'=>'ASC');

			$table['name']='wl_sub_pages';

			$list = array('empty_name'=>' Sub Category','key'=>'id','value'=>'sub_page_name','empty_name'=>' Sub Category');

			$arrCities =$this->Common_model->find_data($table,'list',$list,$conditions,$select,'','',$order_by);

			

			if($action == 'Edit' && $sayantan == 'ready')

			{

				

				//$conditions=array('thi_hotels.id'=>$id);

				//$data['row'] = $this->hotel_model->find_data('thi_hotels.id,thi_hotels.city_id,thi_hotels.hotel_name,thi_cities.id,thi_cities.city_name',$conditions,'row');

				

				//$city_name = $data['row']->city_id;

				

				$data['row'] = $this->db->query("select * from wl_services where id=$id")->row();

				$city_name = $data['row']->subcat_id;

			}

          

             

           

            //Using the form_dropdown helper function to get the new dropdown.

			$js = 'class="form-control" id="subcat_id"';

			if($action == 'Add')

			 {

				 //echo 'add city drop';

            	echo form_dropdown('subcat_id',$arrCities,'',$js);

			 }

			 else if($action == 'Edit' && $sayantan == 'ready')

			 {

				 //echo 'edit city drop';

				 echo form_dropdown('subcat_id',$arrCities,$city_name,$js);

			 }

			 else if($action == 'Edit' && $sayantan == 'change')

			 {

				 //echo 'edit city drop';

				 echo form_dropdown('subcat_id',$arrCities,'',$js);

			 }

			//echo "succ";

        } 

		else

		{

            redirect('site'); //Else redire to the site home page.

        }

    }

	

}



