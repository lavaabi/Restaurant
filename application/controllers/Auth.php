<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Auth extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        // Load library and url helper
        
        $this->load->library( 'facebook' );
        $this->load->library( 'Rest' );
        $this->load->helper( 'url' );
        $this->load->model( 'Auth_model' );
        
        
    }
    
    // ------------------------------------------------------------------------
    public function fb_authenticate()
    {
        $fblogin_response       = '';
        $_POST['usertoken']     = $this->input->post( 'usertoken' );
        $_POST['merge_chk']     = ( $this->input->post( 'mergefb' ) != '' ) ? $this->input->post( 'mergefb' ) : 'NO';
        $_POST['fbUserProfile'] = json_decode( $this->input->post( 'userData' ) );
        $fblogin_response       = $this->rest->post( 'users/fblogin', $_POST );
        if(!empty($fblogin_response)){
        if ( $fblogin_response->message == 'acccount_exist' ) {
            $this->session->set_userdata( 'checkfbexixts', '1' );
            echo json_encode( "exists" );
            exit;
        }else if ( $fblogin_response->message == 'email_not_exists' ) {
            echo json_encode( "emailnotexists" );
            exit;
        } //$fblogin_response->message == 'acccount_exist'
        else {
            if ( $fblogin_response->user_details->is_admin_deactive == 'Y' ) {
                 echo json_encode('not_activated');
                 exit;
            }   
            $this->session->set_userdata( 'oauth_id', $fblogin_response->user_details->oauth_uid);
            $this->session->set_userdata( 'user_id', $fblogin_response->user_details->user_id );
            $this->session->set_userdata( 'role_id', (int) $fblogin_response->user_details->role_id );
            $this->session->set_userdata( 'logged_in', (bool) true );
            // Profile image set userdata
            $this->get_profile_image($fblogin_response);

            $this->session->set_userdata( 'name', $fblogin_response->user_details->first_name );
            $this->session->set_userdata( 'email', $fblogin_response->user_details->email );
            $this->session->set_userdata( 'timezone', $fblogin_response->user_details->time_zone );
            $this->session->set_userdata( 'pages_session_id', $fblogin_response->user_details->helppagesviewed );
            $return_data['msg']      = LOGIN_SUCCESS;
            $return_data['response'] = "login_success";
            echo json_encode( "fbloginsuccess" );
            exit;
        }
    }else{
        $return_data['msg']      = CONNECTION_ERROR;
        $return_data['response'] = "network_error";
        echo json_encode( "network_error" );
    }
        
    }
}