<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if (!function_exists('_curlget'))
	{
	    function _curlget($url)
		{
			$ch = curl_init($url);

			// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                                               
			$result = curl_exec($ch);
			curl_close($ch);

			return $result;

		}
	}
	/**
	 * Make a POST request to the end point
	 * 
	 * @param  String $url  Url End point
	 * @param  array  $data Data to be send
	 * 
	 * @return Mixed
	 */
	if (!function_exists('_curlpost'))
	{

		 function _curlpost($url, $data = array())
		{
		
			$ch = curl_init();
			
			if ( ! empty( $data ) )
				$data = http_build_query($data);

			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  //to suppress the curl output 
			
			$result = curl_exec($ch);

			curl_close ($ch);
			
			if ( false !== $result )
				$result = json_decode( $result );
			
			return $result;
		}
	}
    /**
	 * Make a POST request to the end point
	 * 
	 * @param  String $to_email  email End point
	 * @param  String $message  message End point
	 * @param  String $subject  subject End point
	 * @return Mixed
	 */
	if (!function_exists('_sendmail'))
	{
		 function _sendmail($to_email=null, $message=null,$subject=null) { 
		 require_once('class.phpmailer.php');	
		 	//SMTP Settings
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth   = true; 
		$mail->SMTPSecure = "tls"; 
		$mail->Host       = "ssl://smtp.googlemail.com";
		$mail->Username   = "rajeshflr2018@gmail.com";
		$mail->Password   = "paul@123";
		//

		$mail->SetFrom('gulp@info.com', 'Gulp Restaurant'); //from (verified email address)
		$mail->Subject = $subject; //subject

		//message
		//$body = "This is a test message.";
		//$body = eregi_replace("[\]",'',$message);
		$mail->MsgHTML($message);
		//


		//recipient
		$mail->AddAddress($to_email, ""); 

		//Success
		if ($mail->Send()) { 
			return true;
		}else
		{
			return false;
		}

		//Error
		if(!$mail->Send()) { 
			//echo "Mailer Error: " . $mail->ErrorInfo; 
			return false;
		} 	      
		} 
      }
    /**
	 * Make a POST request to the end point
	 * 
	 * @param  String $method  method End point
	 * @param  String $url  url End point
	 * @param  array $data  Array End point
	 * @return Mixed
	 */
	if (!function_exists('_callAPI'))
	{
   function _callAPI($method, $url, $data = false, $type = '')
	{
		$curl = curl_init();

	    switch ($method)
	    {
	        case "POST":
	            curl_setopt($curl, CURLOPT_POST, 1);

	            if ($data)
	                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	            break;
	        case "PUT":
	            curl_setopt($curl, CURLOPT_PUT, 1);
	            break;
	        default:
	            if ($data)
	                $url = sprintf("%s?%s", $url, http_build_query($data));
	    }

	    // Optional Authentication:
	   
	    curl_setopt($curl, CURLOPT_URL, $url);
	    if($type == 'JSON') {
	    	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	    }
	    curl_setopt($curl, CURLOPT_POST, true);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	   // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
	///	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Guilp-Auth-Key: ' . API_KEY	));

	    $result = curl_exec($curl);

	    curl_close($curl);

	    return $result;
	}
}



if ( ! function_exists('sanitizeXML'))
{
function sanitizeXML($xml_content, $xml_followdepth=true){

    if (preg_match_all('%<((\w+)\s?.*?)>(.+?)</\2>%si', $xml_content, $xmlElements, PREG_SET_ORDER)) {

        $xmlSafeContent = '';

        foreach($xmlElements as $xmlElem){
            $xmlSafeContent .= '<'.$xmlElem['1'].'>';
            if (preg_match('%<((\w+)\s?.*?)>(.+?)</\2>%si', $xmlElem['3'])) {
                $xmlSafeContent .= sanitizeXML($xmlElem['3'], false);
            }else{
                $xmlSafeContent .= htmlspecialchars($xmlElem['3'],ENT_NOQUOTES);
            }
            $xmlSafeContent .= '</'.$xmlElem['2'].'>';
        }

        if(!$xml_followdepth)
            return $xmlSafeContent;
        else
            return "<?xml version='1.0' encoding='UTF-8'?>".$xmlSafeContent;

    } else {
        return htmlspecialchars($xml_content,ENT_NOQUOTES);
    }

}
}

if ( ! function_exists('get_rand_code'))
{
	function get_rand_code() {
    $alph = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $code='';
        $i=0;
        while($i<15){
            $position=rand(0,35);
            $code=$code.substr($alph,$position,1);
            $i++;
    }
    return $code;
	}
}

/**
 * Session Logged
 *
 * Returns true if user logged in otherwise redirect to login
 *
 * @access	public
 * @param	null
 * @return	true | false
 */

	if (!function_exists('valid_session_user'))
	{
		function valid_session_user()
		{
			$CI = & get_instance();
			$session_user = $CI->session->userdata('user_id');
			if(empty($session_user))
			{
				redirect('home', 'refresh');
			}
		}
	}



