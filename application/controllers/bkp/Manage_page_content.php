<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Manage_page_content extends CI_Controller {

	function __construct()

	{

		parent::__construct();

		

		$this->load->model(array('Common_model'));

	}

	####################################################################################

	function index()

	{

		

		$select = 'td_pages.*,td_category.cat_name';

		$table['name'] = 'td_pages';

		$join[0] = array('table'=>'td_category','field'=>'cat_id','table_master'=>'td_pages','field_table_master'=>'main_page_id','type'=>'left');

		//$join[1] = array('table'=>'td_category','field'=>'id','table_master'=>'td_pages','field_table_master'=>'sub_page_id','type'=>'inner');

		$data['rows'] = $this->Common_model->find_data($table,'array','','',$select,$join);

		//echo '<pre>';print_r($data);die;	

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/manage-page-content-list-view',$data,true);

		$this->load->view('admin/layout-after-login',$data);

	}

	######################################################################################

	

	function add()

	{

		$data['action'] = 'Add';

		

		

		$select = 'cat_id,cat_name';

		$conditions=array('published'=>1,'parent_id'=>0);

		$order_by[0] = array('field'=>'cat_id','type'=>'ASC');

		$table['name']='td_category';

		$list = array('empty_name'=>' Main Category','key'=>'cat_id','value'=>'cat_name');

		$data['categories']=$this->Common_model->find_data($table,'list',$list,$conditions,$select,'','',$order_by);

		

		if($this->input->post('mode')=='page_content')

		{				

						

					if($this->form_validate() == FALSE)

					{

						$data['error_message']=validation_errors();

					}

					else

					{

						$postdata = array(

											'is_under_menu'=>$this->input->post('is_under_menu'),

											'main_page_id'=>$this->input->post('maincat_id'),

											'sub_page_id'=>$this->input->post('subcat_id'),

											'page_title'=>$this->input->post('page_title'),

											'page_url_name'=>$this->input->post('page_url_name'),

											'page_content'=>$this->input->post('page_content'),

											'published'=> 1

											);

						//echo '<pre>';print_r($postdata);die;	

						$table['name'] = 'td_pages';		

						$success = $this->Common_model->save_data($table,$postdata,'','id');						

							

						if($success)

						{						

							$this->session->set_flashdata('success_message','Page Content successfully inserted');	

							redirect('admin/manage_page_content');

						}

						else

						{		

							redirect(current_url());					

						}

							

					}

		}

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-page-content-view',$data,true);

		

		

		

		$this->load->view('admin/layout-after-login',$data);

	}

	

	

	######################################################################################

	

	function edit($id)

	{

		$data['action'] = 'Edit';

		

		$select = 'cat_id,cat_name';

		$conditions=array('published'=>1,'parent_id'=>0);

		$order_by[0] = array('field'=>'cat_id','type'=>'ASC');

		$table['name']='td_category';

		$list = array('empty_name'=>' Main Category','key'=>'cat_id','value'=>'cat_name');

		$data['categories']=$this->Common_model->find_data($table,'list',$list,$conditions,$select,'','',$order_by);

		

		

		

		$data['row'] = $this->db->query("select * from td_pages where id='$id'")->row();

		$data['state_id'] = $data['row']->main_page_id;

		$data['id'] = $id;

		

		if($this->input->post('mode')=='page_content')

		{				

						

					if($this->form_validate() == FALSE)

					{

						$data['error_message']=validation_errors();

					}

					else

					{

						$postdata = array(

											'is_under_menu'=>$this->input->post('is_under_menu'),

											'main_page_id'=>$this->input->post('maincat_id'),

											'sub_page_id'=>$this->input->post('subcat_id'),

											'page_title'=>$this->input->post('page_title'),

											'page_url_name'=>$this->input->post('page_url_name'),

											'page_content'=>$this->input->post('page_content'),

											'published'=> 1

											);

						//echo '<pre>';print_r($postdata);die;	

						$table['name'] = 'td_pages';		

						$success = $this->Common_model->save_data($table,$postdata,$id,'id');						

							

						if($success)

						{						

							$this->session->set_flashdata('success_message','Page Content successfully inserted');	

							redirect('admin/manage_page_content');

						}

						else

						{		

							redirect('admin/manage_page_content');				

						}

							

					}

		}

		

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-page-content-view',$data,true);

		

		

		

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

		$table['name'] = 'td_pages';

		if($this->Common_model->delete_data($table,$id,'id'))

		{

			$this->session->set_flashdata('success_message','Record has been Deleted successfully.');

			redirect('admin/manage_page_content');

		}

		else

		{

			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');

			redirect('admin/manage_page_content');

		}

	}
	
	##############################################################################################

	

	function deactive($id)

	{

		

		

		$postdata = array(

							'published' => 0

						);

		$table['name'] = 'td_pages';				

		$deactive = $this->Common_model->save_data($table,$postdata,$id,'id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','Page successfully deactivated');	

				redirect('admin/manage_page_content');

			}

		else

			{	

				redirect('admin/manage_page_content');					

			}

	}

	

	function active($id)

	{

		

		

		$postdata = array(

							'published' => 1

						);

		$table['name'] = 'td_pages';	

		$deactive = $this->Common_model->save_data($table,$postdata,$id,'id');

		

		if($deactive)

			{	

				$this->session->set_flashdata('success_message','Page successfully activated');	

				redirect('admin/manage_page_content');

			}

		else

			{	

				redirect('admin/manage_page_content');				

			}

	}

	

	##############################################################################################



	function form_validate()

	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('is_under_menu', 'Is under menu', 'required');		

		$this->form_validation->set_rules('page_title', 'Page Title', 'required');

		$this->form_validation->set_rules('page_url_name', 'PAge Url', 'required');

		//$this->form_validation->set_rules('page_content', 'Page Content', 'required');

		if ($this->form_validation->run() == FALSE)

		{

			return FALSE;

		}

		else

		{

			return true;

		}

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

			if($action == 'Edit') {

			$id = $_POST['id']; 

			

			}

			

				

			

			$select = 'cat_id,cat_name';

			$conditions=array('td_category.parent_id'=>$state);

			$order_by[0] = array('field'=>'cat_id','type'=>'ASC');

			$table['name']='td_category';

			$list = array('empty_name'=>' Sub Category','key'=>'cat_id','value'=>'cat_name');

			$arrCities =$this->Common_model->find_data($table,'list',$list,$conditions,$select,'','',$order_by);

			

			if($action == 'Edit')

			{

				

				//$conditions=array('thi_hotels.id'=>$id);

				//$data['row'] = $this->hotel_model->find_data('thi_hotels.id,thi_hotels.city_id,thi_hotels.hotel_name,thi_cities.id,thi_cities.city_name',$conditions,'row');

				

				//$city_name = $data['row']->city_id;

				

				$data['row'] = $this->db->query("select * from td_pages where id=$id")->row();

				

				$city_name = $data['row']->sub_page_id;

				

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



