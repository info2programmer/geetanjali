<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_student extends CI_Controller {
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

		$table['name']='td_users';
		$conditions = array('user_type'=>'S');
		$order_by[0] = array('field'=>'id','type'=>'desc');
		$data['rows'] = $this->Common_model->find_data($table,'array','',$conditions,'','','',$order_by);		

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-student-list-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}
	######################################################################################
	
/*
	function add()

	{

		$data['action'] = 'Add';

		

		$postdata = array();

		

		$role = array(

					'' => 'Select College Role',

					'Teaching-Staff' => 'Teaching Staff',

					'Non-teaching-Staff' => 'Non-teaching Staff'

					);

		$data['role_categories']=$role;

		

		$teacher_cat = array(

					'' => 'Select Teacher Category',

					'Full Time Faculty' => 'Full Time Faculty',

					'Part Time Teacher' => 'Part Time Teacher',

					'Whole Time Contractual Teacher' => 'Whole Time Contractual Teacher',

					'Guest Faculty' => 'Guest Faculty'

					);

		$data['teacher_categories']=$teacher_cat;	

		

		

		

		$stream = array(

					'' => 'Select Stream',

					'Arts' => 'Bachelor in Arts',

					'Science' => 'Bachelor in Science',

					'Commerce' => 'Bachelor in Commerce'

					);

		$data['stream_categories']=$stream;

		

	
		

		$select = 'id,subject_name';

		$conditions=array('published'=>1);

		$order_by[0] = array('field'=>'id','type'=>'ASC');

		$table['name']='td_subject';

		$list = array('empty_name'=>' subject Name','key'=>'id','value'=>'subject_name');

		$data['subjects']=$this->Common_model->find_data($table,'list',$list,$conditions,$select,'','',$order_by);

		
		

		$select1 = 'id,tab_name';

		$conditions1=array('published'=>1);

		$order_by1[0] = array('field'=>'id','type'=>'ASC');

		$table1['name']='td_tabs';

		$list1 = array('empty_name'=>' Staff Category','key'=>'id','value'=>'tab_name');

		$data['staff_categories']=$this->Common_model->find_data($table1,'list',$list1,$conditions1,$select1,'','',$order_by1);

	

		

		

		

		if($this->input->post('mode') == 'administration')

			{	

				

							

							$imge = $_FILES["slider_image"]["name"];						

							if($imge != '')

							{

								$exp = explode('.',$imge);

								$imageFileType = @$exp[1];							

								

								if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")

								{

									$this->session->set_flashdata('err_message', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed');

								}

								$image = @$exp[0].time().'.'.@$exp[1];

								$temp = $_FILES["slider_image"]["tmp_name"];

								

								$this->stuff_image_upload($image,$temp);

							}

							else

							{

								$image = '';

							}

							

							$rme = $_FILES["slider_image1"]["name"];

							if($rme != '')

							{	

								$exp1 = explode('.',$rme);

								$rmeFileType = @$exp1[1];

								

								if($rmeFileType != "pdf")

								{

									$this->session->set_flashdata('err_message1', 'Sorry, only PDF files are allowed');

								}

								

								

								$resume = @$exp1[0].time().'.'.@$exp1[1];

								$temp1 = $_FILES["slider_image1"]["tmp_name"];

								

								$this->stuff_resume_upload($resume,$temp1);

							}

							else

							{

								$resume = '';

							}

							

			 

							$postdata = array(

												'name' => $this->input->post('name'),

												'designation' => $this->input->post('designation'),

												'qualification' => $this->input->post('qualification'),

												'stream' => $this->input->post('stream'),

												'subject_id' => $this->input->post('subject_id'),

												'staff_category' => $this->input->post('staff_category'),

												'College_role' => $this->input->post('College_role'),

												'teacher_category' => $this->input->post('teacher_category'),

												'image' => $image,

												'resume' => $resume,

												'published' => 1

												);

							

												

							$table['name'] = 'td_users';		

							$success = $this->Common_model->save_data($table,$postdata,'','id');						

							if($success)

							{	

								$this->session->set_flashdata('success_message','College details successfully inserted');	

								redirect('admin/manage_student');

							}

							else

							{	

								$this->session->set_flashdata('error_message','Please try again.');		

								redirect(current_url());					

							}

				

			}		

		

		$data['head'] = $this->load->view('admin/elements/head','',true);

		$data['header'] = $this->load->view('admin/elements/header','',true);

		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);

		$data['footer'] = $this->load->view('admin/elements/footer','',true);

		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-college-view',$data,true);

		

		

		

		$this->load->view('admin/layout-after-login',$data);

	}*/

	######################################################################################

	function view($id)
	{
		$data['action'] = 'View';	

		$table['name'] = 'td_users';
		$conditions=array('td_users.id'=>$id);
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		//echo '<pre>';print_r($data['row']);die;	

		/*if($this->input->post('mode') == 'administration')

		{	

				

							

							$imge = $_FILES["slider_image"]["name"];						

							if($imge != '')

							{

								$exp = explode('.',$imge);

								$imageFileType = @$exp[1];							

								

								if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")

								{

									$this->session->set_flashdata('err_message', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed');

								}

								$image = @$exp[0].time().'.'.@$exp[1];

								$temp = $_FILES["slider_image"]["tmp_name"];

								

								$this->stuff_image_upload($image,$temp);

							}

							else

							{

								$image = $data['row']->image;

							}

							

							$rme = $_FILES["slider_image1"]["name"];

							if($rme != '')

							{	

								$exp1 = explode('.',$rme);

								$rmeFileType = @$exp1[1];

								

								if($rmeFileType != "pdf")

								{

									$this->session->set_flashdata('err_message1', 'Sorry, only PDF files are allowed');

								}

								

								

								$resume = @$exp1[0].time().'.'.@$exp1[1];

								$temp1 = $_FILES["slider_image1"]["tmp_name"];

								

								$this->stuff_resume_upload($resume,$temp1);

							}

							else

							{

								$resume = $data['row']->resume;

							}

							

			 

							$postdata = array(

												'name' => $this->input->post('name'),

												'designation' => $this->input->post('designation'),

												'qualification' => $this->input->post('qualification'),

												'stream' => $this->input->post('stream'),

												'subject_id' => $this->input->post('subject_id'),

												'staff_category' => $this->input->post('staff_category'),

												'College_role' => $this->input->post('College_role'),

												'teacher_category' => $this->input->post('teacher_category'),

												'image' => $image,

												'resume' => $resume,

												'published' => 1

												);

							//echo '<pre>';print_r($postdata);die;

												

							$table['name'] = 'td_users';		

							$success = $this->Common_model->save_data($table,$postdata,$id,'id');						

							if($success)

							{	

								$this->session->set_flashdata('success_message','College details successfully updated');	

								redirect('admin/manage_student');

							}

							else

							{		

								redirect(current_url());					

							}

				

			}*/	

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-student-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}

	######################################################################################

	########################### DELETE ################################

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

			$student_details = $this->db->query("select * from td_users where id='$id'")->row();
			$image_file = $student_details->logo_image;			

			$this->load->helper("url");

			if($image_file!='') {
			unlink(FCPATH . '/uploads/student/' . $image_file);
			}		

			if($resume_file!='') {
			unlink(FCPATH . '/uploads/student/' . $resume_file);
			}			

		$table['name'] = 'td_users';
		if($this->Common_model->delete_data($table,$id,'id'))
		{		
			$this->session->set_flashdata('success_message','Record has been Deleted successfully.');
			redirect('admin/manage_student');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('admin/manage_student');
		}
	}	

	##################################### DELETE ################################

	################################## AACTIVE/DEACTIVE ##############################################

	function deactive($id)
	{
		$postdata = array(
							'published' => 0
						);
		$table['name'] = 'td_users';
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'id');

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Student successfully deactivated');	
				redirect('admin/manage_student');
			}
		else
			{
				redirect('admin/manage_student');
			}
	}

	function active($id)
	{
		$postdata = array(
							'published' => 1
						);
		$table['name'] = 'td_users';
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'id');	

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Student successfully activated');	
				redirect('admin/manage_student');
			}
		else
			{	
				redirect('admin/manage_student');
			}
	}

	################################## AACTIVE/DEACTIVE ##############################################

	function newsletter()
	{
		$user_details = $this->db->query("select email from td_users where user_type='S'")->result();
		
		//echo '<pre>';print_r($user_details);die;
		if($user_details) {
			foreach($user_details as $users) {
		$to = $users->email;
		$subject = "Bongineers Institution Newsletter";
		$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<title>Bongineers-Newsletter-Student</title>
					<style type="text/css">
					<!--
					.style1 {
						font-family: Georgia, "Times New Roman", Times, serif;
						color: #FFFFFF;
						font-size: 65px;
					}
					.style2 {
						font-family: Georgia, "Times New Roman", Times, serif;
						font-weight: bold;
						color: #FFFFFF;
						font-size: 20px;
					}
					a:link {
						color: #FFFFFF;
						text-decoration: none;
					}
					a:visited {
						text-decoration: none;
						color: #FFFFFF;
					}
					a:hover {
						text-decoration: none;
						color: #FFFFFF;
					}
					a:active {
						text-decoration: none;
						color: #FFFFFF;
					}
					
					-->
					</style></head>
					
					<body>
					<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
					  <tr>
						<td width="600" height="727" align="right" valign="middle" background="'.base_url().'material/assets/img/newsletter_student.jpg" style="background-repeat:no-repeat;"><table width="300" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td width="68" height="260">&nbsp;</td>
							<td width="183" height="260">&nbsp;</td>
							<td width="49" height="260">&nbsp;</td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td align="center" valign="middle"><span class="style1"><a href="http://www.bongineers.net" target="_blank">FREE</a>
							</span></td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td align="center" valign="middle"><span class="style2"><a href="http://www.bongineers.net" target="_blank">REGISTRATION</a></span></td>
							<td>&nbsp;</td>
						  </tr>
						</table></td>
					  </tr>
					</table>
					</body>
					</html>
';
					
		$txt = $message;			
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From: Bongineers <subhomoy.projukti@gmail.com>" . "\r\n";
		mail($to,$subject,$txt,$headers);
		/*if(mail($to,$subject,$txt,$headers))
		{
			$this->session->set_flashdata('success_message','College newsletter successfully send');	
			redirect('admin/manage_college');	
		}
		else
		{
			$this->session->set_flashdata('error_message','Error occurs ! Please try again');	
			redirect('admin/manage_college');
		}*/
			}
		}
		
		$this->session->set_flashdata('success_message','Student newsletter successfully send');	
		redirect('admin/manage_student');
	}
	
}



