<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User Logged In
 *
 * Returns true if user logged in otherwise redirect to login
 *
 * @access	public
 * @param	null
 * @return	true | false
 */

	if (!function_exists('check_valid_key'))
	{
		function check_valid_key()
		{
			$ci_instance 		= & get_instance();
			$headers_array 	= getallheaders();
      //echo "<pre>"; print_r($headers_array); echo "</pre>";exit;
		  	$key_name 			=	config_item('rest_key_name');
		 	if(isset($headers_array[$key_name]) && $headers_array[$key_name] == 'guilp_BQokikJOvBiI2HlWgH4olfQ2') {
				return TRUE;
			} else {
				return FALSE;				
			}
		}
	}

	/**
 * User Logged In
 *
 * Returns true if user logged in otherwise redirect to login
 *
 * @access	public
 * @param	null
 * @return	true | false
 */

	if (!function_exists('check_valid_user_session'))
	{
		function check_valid_user_session()
		{
			$ci_instance 			= & get_instance();
			$session_user_id 	= $ci_instance->session->userdata('user_id');
			if(!empty($session_user_id)){
				$ci_instance->load->model('Auth_model');
				$result = $ci_instance->db->select('*')->from('mt_customers')->where(array('user_id'=>$session_user_id))->get()->row();
				$ci_instance->session->set_userdata('user_id', $result->user_id);
	      $ci_instance->session->set_userdata('name', $result->first_name);
	      $profile_img = $ci_instance->Auth_model->get_profile_image($result);
			}
			
		}
	}

   // Method: POST, PUT, GET etc
// Data: array("param" => "value") ==> index.php?param=value

