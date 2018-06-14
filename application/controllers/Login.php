<?php
 /*********************************************************************************************
     * Author     : Ashok Kumar
     * Module     : Login  
     * Description: user login Check.
     * Methods    : fb_login
     ***********************************************************************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// Load library and url helper
		 $this->load->library('facebook');
        $this->load->library('Rest');
        $this->load->helper('url');
        $this->load->model('Auth_model');
        $this->load->helper('header');
        $this->load->helper('custom');
        $method_name 	= $this->uri->segment(2);
        if($method_name	== 'changepassword' || $method_name	== 'confirmation'){
        	$this->session->set_userdata('logged_in',  (bool)false);
        }else {
        	
        	//echo $this->session->userdata('logged_in'); exit;
			if($this->session->userdata('logged_in')){
				redirect('bots', 'refresh');
			}
	    }

	}

	// ------------------------------------------------------------------------

	/**
	 * Index page
	 */
	public function index($id=null,$type=null)
	{
		$data=array();
		$now = DateTime::createfromformat('U.u',microtime(true));
		//write_file(__DIR__.'/../logs/excution_time_data.php',"\r\n\n".' login page load start : '.$now->format('Y-m-d H:i:s:u')."\r\n\n", 'a');
		//$id=$this->session->userdata('checkfbexixts');
		//$this->session->set_userdata('checkfbexixts', '');
		$data['packageid'] = ($id!=null)?$id:'';
		$data['packagetype'] = ($type!=null)?$type:'';
		$this->session->set_userdata('selected_plan_id', $data['packageid']);
       	$this->session->set_userdata('selected_plan_type', $data['packagetype']);
		$email   =($this->input->post('email')!='')?$this->input->post('email'):'';
		$data['email']=$email;
		$data['title_text']="TapRight ChatBot";
		$data['showmodal']=$id;
		$this->load->view('login',$data);
		$now = DateTime::createfromformat('U.u',microtime(true));
		//write_file(__DIR__.'/../logs/excution_time_data.php',"\r\n\n".'  login page load end : '.$now->format('Y-m-d H:i:s:u')."\r\n\n", 'a');

	}

	public function confirmation($id=null)
	{

		$post_data['activateuserid']=$id;
        $activate_response = $this->rest->post('users/activateuser', $post_data);
        if($activate_response->userdetails->msg == 'success'){
			$this->session->set_userdata('oauth_id',  '');
			$this->session->set_userdata('user_id',  $activate_response->userdetails->details->user_id);
			userActivity("New user Activated scuccessfully",'LOGIN','ACTIVATION',$activate_response->userdetails->details->user_id);
					$this->session->set_userdata('logged_in',  (bool)true);
					if($activate_response->userdetails->details->profile_picture==''){
						if ($activate_response->userdetails->details->picture != '') {
						$profile_img_link = $activate_response->userdetails->picture;
						} else {
						$profile_img_link = base_url() . "assets/images/profile.png";
						}
					}else{
						$profile_pic = $activate_response->userdetails->details->profile_picture;
						$profile_img_link = base_url() . "uploads/profiles/".$profile_pic;
					}
					$this->session->set_userdata('profileimage', $profile_img_link );
					$this->session->set_userdata('name',  $activate_response->userdetails->details->first_name);
					$this->session->set_userdata('email', $activate_response->userdetails->details->email);

					$this->session->set_userdata( 'timezone', $activate_response->userdetails->details->time_zone );
               		$this->session->set_userdata('pages_session_id', $activate_response->userdetails->details->helppagesviewed);
		    		//$this->get_facebook_pages();
		    		$monthamount=$activate_response->userdetails->details->month_amount;
		    		$yearamount=$activate_response->userdetails->details->year_amount;

		    		$payment_status=$activate_response->userdetails->details->payment_status;
		    		$payment_interval=$activate_response->userdetails->details->payment_interval;

		    		$package_id=($activate_response->userdetails->details->package_id!='')?$activate_response->userdetails->details->package_id:'';
					if($package_id!=''){
						if($payment_interval=="monthly"){
							$checkamount=$monthamount;

						}else{
							$checkamount=$yearamount;
						}

					if($checkamount==0 && ($payment_status=='' || $payment_status=='FREE')){
						$post_data['user_id'] = $activate_response->userdetails->details->user_id;
						$post_data['package_id'] = $activate_response->userdetails->details->package_id; //package id
					    $post_data['trial_period_days'] = 0; // if anything specified in the selected package
					    $post_data['stripe_package_id'] = ''; // package id - stripe
					    $subscription_detail = $this->rest->post('package/add_user_subscription', $post_data);
					     $subscription_data              = $subscription_detail->result;
                         $subscription_id                = $subscription_data->subscription_id;
					    $this->session->set_userdata('package_id', $package_id);
            			$this->session->set_userdata('package_name',  $activate_response->userdetails->details->package_name);
            			$this->session->set_userdata('subscription_status', "subscribed");
           				$this->session->set_userdata('subscription_id', $subscription_id);
           				$this->session->set_userdata('subscription_type', "TRAILING");
		       			redirect('bots', 'refresh');

		    		}elseif($checkamount > 0 && $payment_status==''){
		    			$this->session->set_userdata('package_id', $package_id);
		    			$this->session->set_userdata('new_package_id', $package_id);
		    			$this->session->set_userdata('new_payment_interval', $payment_interval);
            			$this->session->set_userdata('package_name',$activate_response->userdetails->details->package_name);
            			$this->session->set_userdata('subscription_status', "not_subscribed");
           				$this->session->set_userdata('subscription_id', '');
           				$this->session->set_userdata('subscription_type', "TRAILING");
						redirect('subscribe', 'refresh');
		    		}
		    	}else{
		    		$this->session->set_userdata('package_id', "");
            		$this->session->set_userdata('package_name',"");
            		$this->session->set_userdata('new_package_id',"" );
		    		$this->session->set_userdata('new_payment_interval', "");
            		$this->session->set_userdata('subscription_status', "");
           			$this->session->set_userdata('subscription_id', "");
					redirect('bots', 'refresh');
		    	}

			
		}else if($activate_response->userdetails->msg == 'activated'){
			redirect('login/index/2', 'refresh');
		}else if($activate_response->userdetails->msg == 'not_exists'){
			redirect('login/index/', 'refresh');
		}

	}

	public function changepassword($id=null)
	{
		 // Passaword confirmation code via email getting user id
		 $data=array();
		 $data['change_pwd_link']	='';
     $data['is_pwd_link']			='';

		 $post_data['pwd_confirm_code']=$id;
		 $userdata = $this->rest->post('users/getuserId_info', $post_data);
     $ispasswordstatus='N';
     $user_id='';
     if($userdata->userdetails->returnvalue!="empty"){
     $user_id 								= $userdata->userdetails->user_id;
     $ispasswordstatus 				= $userdata->userdetails->is_password;
     $data['change_pwd_link']	=	$userdata->userdetails->pwd_confirm_code;
     $data['is_pwd_link']			=	$ispasswordstatus;
     }
     
     $data['packageid'] 			= '';
	   $data['packagetype'] 		= '';
	   $data['email']						=	'';
     $data['showmodal']				=	null;
		 $data['showmodal']				=	"changepassword";      
	   $data['title_text']			=	"Welcome to Tapright Chatbot";
	   $data['userid']					=	$user_id;
	   $this->load->view('login',$data);
	}
	// ------------------------------------------------------------------------

}
