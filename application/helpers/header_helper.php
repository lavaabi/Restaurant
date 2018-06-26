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
   // Method: POST, PUT, GET etc
// Data: array("param" => "value") ==> index.php?param=value

