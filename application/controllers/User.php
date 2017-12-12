<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->uri->segment('3')=='login')
		{ }
	}
	
	public function index()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		$data['purchase']=$this->db->query('SELECT SUM(purchase_total) as totalPurchase FROM td_purchase_bill')->result_array();
		$data['sales']=$this->db->query('SELECT SUM(p_bill_total) as totalSales FROM td_sales_bill')->result_array();
		$data['customer']=$this->db->query('SELECT * FROM td_client')->num_rows();
		$data['supplier']=$this->db->query('SELECT * FROM td_supplier')->num_rows();
		$data['product']=$this->db->query('SELECT DISTINCT(stock_item) AS stkCount FROM td_stock')->num_rows();
		$data['emplye']=$this->db->query('SELECT * FROM td_employee')->result_array();
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('maincontents/home',$data,true);
		$this->load->view('layout-after-login',$data);
	}
	######################################################################################

	public function login()
	{
		if($this->input->post('mode')=='login')
		{
			if($this->form_validate() == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{
				$conditions = array(
									'username'=>$this->input->post('username'),
									'password'=>md5($this->input->post('password'))
									);

						$table['name'] = 'td_users';

						$record = $this->Common_model->find_data($table,'row','',$conditions);					
						
						if($record)
						{
							$sessiondata = array(
												'user_id' => $record->id,
												'username' => $record->username,
												'is_admin_logged_in' => true
												);												
							
							$this->session->set_userdata($sessiondata);
							if($this->session->userdata('is_admin_logged_in') == 1)
							{	
															
								$this->session->set_flashdata('success_message','Redirecting! Please wait...');
								//header("Refresh:3;url=".base_url()."user");
								redirect(base_url().'user');
							}
						}
						else
						{	
							$this->session->set_flashdata('error_message','Invalid username or password');
							redirect(current_url());
						}
			}
		}
		$this->load->view('layout-before-login');
	}
	#####################################################################################
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
	#####################################################################################
	function form_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			return FALSE;
		}
		else
		{
			return true;
		}
	}
	#####################################################################################

	function change_password()
	{
		if($this->input->post('mode')=='change_pass')
		{
				
			if($this->password_validate() == FALSE)
				{
					$data['error_message']=validation_errors();
				}
				else
				{
							$postdata_ch_pass = array(
												'password'=>md5($this->input->post('new_password')),
												'password_original'=>$this->input->post('new_password')
												);							

							if($this->session->userdata('user_id'))
							{
							$user_id = $this->session->userdata('user_id');
							}	

							$table['name'] = 'td_users';
							$success = $this->Common_model->save_data($table,$postdata_ch_pass,$user_id,'id');							

							if($success)
							{	
								$this->session->set_flashdata('success_message','Password changed successfully');
								redirect(base_url()."user/logout");
							}
							else
							{	
								$this->session->set_flashdata('error_message','Invalid username or password! Please try again.');
								redirect(current_url());
							}
				}

		}
		$data['head'] = $this->load->view('elements/head','',true);
		$data['header'] = $this->load->view('elements/header','',true);
		$data['left_sidebar'] = $this->load->view('elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('maincontents/add-edit-password-view',$data,true);
		$this->load->view('layout-after-login',$data);
	}

	function password_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_existing_password');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|callback_old_password_same');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
		if ($this->form_validation->run() == FALSE)
		{
			return FALSE;
		}
		else
		{
			return true;
		}
	}

	function existing_password($str)
	{
		$old_password =  md5($str);		
		if($this->session->userdata('user_id'))
		{
		$user_id1 = $this->session->userdata('user_id');
		}
		
		$table['name'] = 'td_users';
		$conditions = array('id'=>$user_id1);
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		//echo '<pre>';print_r($data['row']);die;
		$existing_password = $data['row']->password;		

		if ($existing_password != $old_password)
		{
			$this->form_validation->set_message('existing_password', 'Old Password is incorrect');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function old_password_same($str)
	{
		$new_password =  md5($str);		
		if($this->session->userdata('user_id'))
		{
		$user_id1 = $this->session->userdata('user_id');
		}
		
		$table['name'] = 'td_users';
		$conditions = array('id'=>$user_id1);
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		//echo '<pre>';print_r($data['row']);die;
		$existing_password = $data['row']->password;		

		if ($existing_password == $new_password)
		{
			$this->form_validation->set_message('old_password_same', 'Please choose other from existing password');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}	

	######################################################################################

	

	

	

}



