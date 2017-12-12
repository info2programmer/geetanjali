<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_forum extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if(($this->session->userdata('is_admin_logged_in')!=1)&&($this->session->userdata('is_user_logged_in1')!=1))

		{

			redirect(base_url());	

		}		
		$this->load->model(array('Common_model'));
		date_default_timezone_set("Asia/Kolkata");
	}

	################################################################

	function index()
	{
		$user_id = $this->session->userdata('user_id');
		$table['name'] = 'td_forum_thread';
		$conditions = array('thread_user_id'=>$user_id);
		$data['rows'] = $this->Common_model->find_data($table,'array','',$conditions);
				
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-forum-list-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}

	######################################################################################	
	
	
	
	function view($id)
	{
		$data['action'] = 'View';
		
		$username = $this->session->userdata('username1');
		$user_details = $this->db->query("select * from td_users where username='$username'")->row();
		$college_cat = $user_details->college_cat;
		$college_id = $user_details->id;
		$data['clg_id'] = $user_details->id;
		
		$table['name'] = 'td_message_details';
		$update_array = array('is_read'=>1);
		$succ = $this->Common_model->save_data($table,$update_array,$id,'message_id');
		
		$data['row'] = $this->db->query("select * from td_message_details where message_id='$id'")->row();
		$data['rows'] = $this->db->query("select a.*,b.* from td_messages as a inner join td_message_details as b on b.message_id=a.message_id where b.message_id='$id'")->result();
		//echo '<pre>';print_r($data['rows']);die;
		
		if($this->input->post('mode')=='message')
		{
			$post_message_details = array(
								'college_id'=>$this->input->post('college_id'),
								'message_id'=>$this->input->post('message_id'),								
								'subject'=>$this->input->post('subject'),
								'description'=>$this->input->post('txt_desc'),
								'from_msg'=>$this->input->post('from_msg'),
								'to_msg'=>$this->input->post('to_msg'),
								'date'=>date('Y-m-d'),
								'is_read'=>0
								);
			//echo '<pre>';print_r($post_message_details);die;
			$table2['name'] = 'td_message_details';
			$succ2 = $this->Common_model->save_data($table2,$post_message_details,'','id');
			if($succ2)
			{
				$this->session->set_flashdata('success_message','Message successfully send');	
				redirect('admin/manage_message/view/'.$id);
			}
			else			
			{
				$this->session->set_flashdata('error_message','Message not send');	
				redirect('admin/manage_message/view/'.$id);
			}
		}
		
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-message-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}
	
	######################################################################################

	function add()
	{	
		/* for main category list*/
		$select = 'cat_id,cat_name';
		$conditions = array('parent_id'=>0,'published'=>1);
		$order_by[0] = array('field'=>'cat_id','type'=>'ASC');
		$table['name']='td_category';
		$list = array('empty_name'=>' Main Category','key'=>'cat_id','value'=>'cat_name');
		$data['main_cats']=$this->Common_model->find_data($table,'list',$list,$conditions,$select,'','',$order_by);
		/* for main category list*/

		$data['action'] = 'Add';

		if($this->input->post('mode')=='forum')
		{
			if($this->form_validate() == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{
				$row_id = rand();
				
				$post_array = array(
									'row_id'=>$row_id,
									'maincat_id'=>$this->input->post('main_cat'),									
									'subcat_id'=>$this->input->post('sub_cat'),
									'thread_title'=>$this->input->post('thread_title'),
									'thread_desc'=>$this->input->post('thread_desc'),
									'thread_user_id'=>$this->input->post('thread_user_id'),
									'thread_date'=>date("Y-m-d h:i:s"),
									'thread_is_important'=>0,
									'published'=>1									
									);
				//echo '<pre>';print_r($post_array);die;
				$table['name'] = 'td_forum_thread';	
				$data = $this->Common_model->save_data($table,$post_array,'','thread_id');
				
				if($data)
				{
				$this->session->set_flashdata('success_message','Forum Topic successfully inserted');	
				redirect('admin/manage_forum');
				}
			}
		}

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-forum-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}

	######################################################################################
	function edit($id)
	{
		$data['action'] = 'Edit';
		
		/* for main category list*/
		$select = 'cat_id,cat_name';
		$conditions = array('parent_id'=>0,'published'=>1);
		$order_by[0] = array('field'=>'cat_id','type'=>'ASC');
		$table['name']='td_category';
		$list = array('empty_name'=>' Main Category','key'=>'cat_id','value'=>'cat_name');
		$data['main_cats']=$this->Common_model->find_data($table,'list',$list,$conditions,$select,'','',$order_by);
		/* for main category list*/		

		$conditions=array('thread_id'=>$id);
		$table['name'] = 'td_forum_thread';
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		if($this->input->post('mode')=='forum')
		{
			if($this->form_validate() == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{				
				$post_array = array(
									'maincat_id'=>$this->input->post('main_cat'),									
									'subcat_id'=>$this->input->post('sub_cat'),
									'thread_title'=>$this->input->post('thread_title'),
									'thread_desc'=>$this->input->post('thread_desc')
									);
				echo '<pre>';print_r($post_array);die;
				$table['name'] = 'td_forum_thread';	
				$data = $this->Common_model->save_data($table,$post_array,'','thread_id');
				
				if($data) {
				$this->session->set_flashdata('success_message','Department successfully updated');	
				redirect('admin/manage_message');
				}
			}
		}

		

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-forum-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}

	######################################################################################

	/*function confirmDelete($id)
	{

		if($this->session->flashdata('success_message'))
		{
			$data['success_message'] =  $this->session->flashdata('success_message');
		}
		if($this->session->flashdata('error_message'))
		{
			$data['error_message'] =  $this->session->flashdata('error_message');
		}
		$table['name'] = 'discipline';
		if($this->Common_model->delete_data($table,$id,'discipline_id'))
		{
			$this->session->set_flashdata('success_message','Department has been Deleted successfully.');
			redirect('admin/manage_message');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('admin/manage_message');
		}
	}	*/

	##############################################################################################	

	function form_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('main_cat', 'Main Category', 'required');
		$this->form_validation->set_rules('thread_title', 'Topic Title', 'required|min_length[5]|max_length[43]');
		$this->form_validation->set_rules('thread_desc', 'Topic Description', 'required');
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
			
				
			
			$select = 'cat_id,cat_name';
			$conditions=array('td_category.parent_id'=>$state,'td_category.sub_parent_id'=>0,);
			$order_by[0] = array('field'=>'cat_name','type'=>'ASC');
			$table['name']='td_category';
			$list = array('empty_name'=>' Sub Category','key'=>'cat_id','value'=>'cat_name');
			$arrCities =$this->Common_model->find_data($table,'list',$list,$conditions,$select,'','',$order_by);
			
			if($action == 'Edit' && $sayantan == 'ready')
			{				
				$data['row'] = $this->db->query("select * from td_products where product_id=$id")->row();
				$city_name = $data['row']->sub_cat;
			}
          
           
			$js = 'class="form-control" id="subcat_id"';
			if($action == 'Add')
			 {
            	echo form_dropdown('sub_cat',$arrCities,'',$js);
			 }
			 else if($action == 'Edit' && $sayantan == 'ready')
			 {
				 echo form_dropdown('sub_cat',$arrCities,$city_name,$js);
			 }
			 else if($action == 'Edit' && $sayantan == 'change')
			 {
				 echo form_dropdown('sub_cat',$arrCities,'',$js);
			 }
			//echo "succ";
        } 
		else
		{
            redirect('site'); //Else redire to the site home page.
        }
    }
	

	

}



