<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Public_init_elements

{

	var $CI;



    function  __construct()

    {

        $this->CI =& get_instance();

		

    }

	##############################################################################################################

	function init_head()

	{

		$data = array();

		$this->CI->data['head'] =  $this->CI->load->view('elements/head',$data,true);		

	}

	##############################################################################################################

	function init_header()

	{

		$data = array();

		$this->CI->data['header'] =  $this->CI->load->view('elements/header',$data,true);

	}

	##############################################################################################################

	function init_left_sidebar()

	{

		$data = array();

		$this->CI->data['left_sidebar'] =  $this->CI->load->view('elements/left-sidebar',$data,true);

	}

	##############################################################################################################

	function init_footer()

	{

		$data = array();

		$this->CI->data['footer'] =  $this->CI->load->view('elements/footer',$data,true);

	}

	##############################################################################################################

	function init_elements()

	{

		//is Admin logged in? (since needed in almost all the function calls)

		$this->is_user_logged_in();

		//index call to populate all the header / footer / side bar elements

        $this->init_head();

		$this->init_header();

		//$this->init_left_sidebar();

		$this->init_footer();

		

	}

	##############################################################################################################

	function is_user_logged_in()

	{

		$is_user_logged_in = $this->CI->session->userdata('is_user_logged_in');



        if(!isset($is_user_logged_in) || $is_user_logged_in != true)

        {

           redirect('front_home');

        }

	}

	##############################################################################################################

	

}?>