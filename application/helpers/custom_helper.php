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
		$mail->Host       = "email-smtp.us-east-1.amazonaws.com";
		$mail->Username   = "AKIAIYULWW25RS3MNJTQ";
		$mail->Password   = "AvFepljvxEnIV8TD7xfjZO8ZOdSfLnceUcQ4zX5RYNEP";
		//

		$mail->SetFrom('no-reply@tapright.com', 'TapRight ChatBot'); //from (verified email address)
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
		}

		//Error
		if(!$mail->Send()) { 
			echo "Mailer Error: " . $mail->ErrorInfo; 
			return false;
		} 



	      } 
      }
  /*  if (!function_exists('_sendmail'))
	{
	   function _sendmail($to, $message, $subject ) {
   $site = base_url();
    $header = "From: admin@$site\r\n";
    $header .= "Reply-To: admin@$site\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type:text/html; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $CI 		= & get_instance();
    $CI->load->library('email');
     $CI->email->initialize(array(
    'protocol' => 'smtp',
    'smtp_host' => 'email-smtp.us-east-1.amazonaws.com',
    'smtp_user' => 'AKIAIYULWW25RS3MNJTQ',
    'smtp_pass' => 'AvFepljvxEnIV8TD7xfjZO8ZOdSfLnceUcQ4zX5RYNEP'
   
    ));
     
   // $CI->load->library('email', $config);
    $CI->email->from('info@ibot.com', 'Chatbot');
    $CI->email->to($to);
    $CI->email->subject($subject);
    $CI->email->message($message);

    //$this->email->send();
    if ( ! $CI->email->send()) {
        return false;
    }
    echo "sent";
    return true;
}
}
*/


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
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Chatbot-Auth-Key: ' . API_KEY	));

	    $result = curl_exec($curl);

	    curl_close($curl);

	    return $result;
	}
}

if ( ! function_exists('userActivity'))
{
	function userActivity($message=NULL, $section, $action, $actionid)
	{
		$CI =& get_instance();
		if($message != NULL){
			$session_data=$CI->session->all_userdata();
			$data['ip_address']= isset($_SERVER['ip_address']) ? $_SERVER['ip_address'] : '';
			$data['session_id']='';
			$data['user_agent']=isset($_SERVER['user_agent']) ? $_SERVER['user_agent'] : '';

		    $data['section']=$section;
		    $data['action']=$action;
		    $data['actionid']=$actionid;
            $actionid=($actionid!='')?$actionid:'0';
			//$time='';
			//$data['date']=date('Y-m-d H:i:s',$time);
			$data['date']= date('Y-m-d H:i:s');
			$data['user_id']= isset($session_data['userid']) ? $session_data['userid'] : $actionid;
			$data['message']=$message;
			
			return $CI->db->insert('tbl_users_activity', $data);
			
			return '';
		}
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

if ( ! function_exists('updatePageview'))
{
	function updatePageview($page_name=null)
	{
		$CI =& get_instance();
		$pages_viewed = $CI->session->userdata('pages_session_id');

 
		if($page_name ==null){
	     $header_check=$CI->router->fetch_class(); 
	    $header_check = strtolower($header_check);
	   }else{$header_check =$page_name;}

      if(in_array($header_check, $pages_viewed)){

	      	$query = $CI->db->query("SELECT page_id FROM tbl_pages WHERE page_name ='" . $header_check . "'");
	        $row   = $query->row_array();
	        $page_id = $row['page_id'];
			$data['page_id']= $page_id;
			$data['user_id']= $CI->session->userdata('user_id');
	        $result    = $CI->rest->post('Createbot/updatePageview', $data);  
	        $resultarr = (array)$result->result;
	        $page_array = array();

	        foreach($resultarr as $array_page){ (array)$array_page;
	            $page_array[] = $array_page->page_name;
	        }

	        $CI->session->set_userdata('pages_session_id', (array)$page_array);
	 	} 
	 	    $xml_content ='';

		  	 $getHelp_content = base_url()."helpvideos.xml"; 
	 	 	$file_content = file_get_contents($getHelp_content);	 	 	
	 	 	$xml_content = new SimpleXMLElement($file_content);
	 	 	$var_popup_html = '';

	 	 	$array_page = (array)$xml_content->$header_check; 
	 	 	$PAGE_VISUAL = isset($array_page['PAGE_VISUAL'])?$array_page['PAGE_VISUAL']:'';
	 	 	if($PAGE_VISUAL!=''){
	 	 	$page_visual = (array)$PAGE_VISUAL;
	 	 	$videourl = '';
	 	 	$display  ='display:block';


           if($array_page['PAGE_VIDEOURL']!=''){
	 	 	$videourl = '<li class="tab"><a href="#video">Watch a video</a></li>';
	 	 	$display  ='display:none';
	 	 }

 
	$var_popup_html .= '<div class="modal-header pos_relative"><h6>'.trim($array_page['PAGE_DESCRIPTION']).'</h6> <a href="#" class="modal-action modal-close waves-effect icon_close closemodal"></a><ul class="tabs video_popup_tabs">'.$videourl.'<li class="tab"><a href="#visual">Visual steps</a></li></ul><div class="prog_btns_top"><div class="progress_btns"><a href="#" class="modal-action modal-close skip_btn outline_button_grey popup_btns">Skip</a><button class="modal-action modal-close solid_button_orange popup_btns continue_button">Continue</button></div></div></div><div class="modal-content popupcontent int_video_pop_ctnt"><div class="ptab"><div id="video" class="popuptabs"><iframe class="myvideo" id="player" style="border:none !important;" width="100%" src="'.$array_page['PAGE_VIDEOURL'].'" frameborder="0" allowfullscreen></iframe></div><div id="visual" class="popuptabs" style="'.$display.'"><div class="visual_steps">';


          $step_num = 1;
          $total = 0;
          //echo count($page_visual['STEP']);exit;
          if(count($page_visual['STEP'])>2){
 	 	  foreach($page_visual['STEP'] as $obj_visual){

 	 	  	$array_visual = (array)$obj_visual;

 	 	  	$image_visual = base_url().'assets/images/help_images/'.$array_visual['IMAGE'];
	 		$var_popup_html .= '<div class="Vsteps" data-step="'.$step_num.'"><div class="step_title">'.trim($array_visual['DESCRIPTION']).'</div><div class="stepimg"><img src="'.trim($image_visual).'"></div></div>';
	 	 	$step_num++;
	 	 	$total++;

	 	  } 
	 	}else{
          
          $array_visual = (array)$page_visual['STEP']; 
          $image_visual = base_url().'assets/images/help_images/'.trim($array_visual['IMAGE']);
	 	 	$var_popup_html .= '<div class="Vsteps" data-step="1"><div class="step_title">'.trim($array_visual['DESCRIPTION']).'</div><div class="stepimg"><img src="'.trim($image_visual).'"></div></div>';
	 	 	$total = 1;

	 	}

	 	 $width =  round(100/$total).'%';

	 	  if(count($page_visual['STEP'])>2){

	 	$var_popup_html .='<div class="steps_progress"><div class="progress_bar"><p class="step_detail">Step <span class="step_num">1</span> / <span class="step_total">'.$total.'</span> Completed</p><div class="progress"><div class="determinate" style="width:'.$width.'"></div></div></div><div class="progress_btns"><button class="outline_button_grey popup_btns step_prev"><span class="icon_previous_arrow prev_arr"></span>Prev</button><button class="solid_button_orange popup_btns step_next">Next</button><button class="modal-action modal-close solid_button_orange popup_btns step_finish">Finish</button></div></div>';
	 	 }


	 	 $var_popup_html .='</div></div></div></div>';

	 	 }
 
       return $var_popup_html;
   
	 }

	}

if ( ! function_exists('random_password'))
{
	function random_password($length,$count, $characters) {
	$symbols = array();
    $passwords = array();
    $used_symbols = '';
    $pass = '';
 
// an array of different character types    
    $symbols["lower_case"] = 'abcdefghijklmnopqrstuvwxyz';
    $symbols["upper_case"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $symbols["numbers"] = '1234567890';
    $symbols["special_symbols"] = '!?~@#-_+<>[]{}';
 
    $characters = explode(",",$characters); // get characters types to be used for the passsword
    foreach ($characters as $key=>$value) {
        $used_symbols .= $symbols[$value]; // build a string with all characters
    }
    $symbols_length = strlen($used_symbols) - 1; //strlen starts from 0 so to get number of characters deduct 1
     
    for ($p = 0; $p < $count; $p++) {
        $pass = '';
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $symbols_length); // get a random character from the string with all characters
            $pass .= $used_symbols[$n]; // add the character to the password string
        }
        $passwords[] = $pass;
    }
     
    return $passwords; // return the generated password
	}
}

/**
 * check_user_permission
 *
 * check user's permission for the feature
 * 
 * @param  [mixed] $user_data
 * 
 * user_data['user_id']
 * user_data['package_id']
 * user_data['permission']
 * 
 * @return [bool]
 */
function check_user_permission($user_data)
{
	$permission_flag = false;
	$ci =& get_instance();
	//+-- get user's feature volume and package volume
  $permission_detail = $ci->rest->get('package/check_user_permission', $user_data);  
  $check_permission = isset($user_data['check_permission']) ? $user_data['check_permission'] : false;
  if($check_permission == false) {
  	return isset($permission_detail->result) ? (array) $permission_detail->result : '';
  }
  if(!empty($permission_detail)) {
	  if(isset($permission_detail->status) && $permission_detail->status  && !empty($permission_detail->result)) {
	    if(!empty($permission_detail)) {
	    	$permission_list 	= (array) $permission_detail->result;
				$user_permission 	= $permission_list['user_permission'];
				$is_volume 				= $permission_list['is_volume'];
				$allowed_volume 	= $permission_list['allowed_volume'];
				$used_volume 			= $permission_list['used_volume'];
				$brand_settings 	= $permission_list['brand_settings'];
				if(!empty($user_permission) && $user_permission == 1) {
					if($is_volume == 'Y') {
						if($allowed_volume >= $used_volume) {
							$permission_flag = true;
						} else {
							$permission_flag = false;
						}
					} else {
						$permission_flag 	= true;
					}
				}
	    }
	  }
	}
  return $permission_flag;
}

/**
 * generate_uuid
 * 
 * @return [mixed] [UUID]
 */
function generate_uuid() {
	return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
	  mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
	  mt_rand( 0, 0xffff ),
	  mt_rand( 0, 0x0fff ) | 0x4000,
	  mt_rand( 0, 0x3fff ) | 0x8000,
	  mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
	);
}
