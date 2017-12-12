<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Manage_subscribe extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if(($this->session->userdata('is_admin_logged_in')!=1)&&($this->session->userdata('is_user_logged_in1')!=1))
		{
			redirect(base_url());
		}		
		$this->load->model(array('Common_model'));	}

	#####################################################################################

	function index()
	{
		$table['name'] = 'discipline';
		$data['rows'] = $this->Common_model->find_data($table,'array');

		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('admin/elements/footer','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-subscribe-list-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}

	######################################################################################
	
	function add()
	{
		$user_details = $this->db->query("select * from td_subscribe")->result();
		
		//echo '<pre>';print_r($user_details);die;
		if($user_details) {
			foreach($user_details as $users) {
		$to = $users->subscribe_email;
		$subject = "Bongineers Subscription";
		$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<title>Bongineers-Newsletter-Institute</title>
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
						<td width="600" height="727" align="right" valign="middle" background="'.base_url().'material/assets/img/newsletter_institute.jpg" style="background-repeat:no-repeat;"><table width="300" border="0" cellspacing="0" cellpadding="0">
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
					</html><br>
					<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
					</html>';
					
		$txt = $message;			
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From: Bongineers <subhomoy.projukti@gmail.com>" . "\r\n";
		mail($to,$subject,$txt,$headers);
		
			}
		}
		
		$this->session->set_flashdata('success_message','Newsletter successfully send');	
		redirect('admin/manage_subscribe');
	}
	
}



