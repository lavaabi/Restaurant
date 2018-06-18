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

    /**
    ** New customer register 
    **  
    ** Paramaters [first_name,email,password]
    **/
    public function register()
    {
        if(isset($_POST['signup'])){
            $insert_data = array();
            $insert_data['first_name']      = isset($_POST['name']) ? $_POST['name'] : Null;
            $insert_data['email']           = isset($_POST['email']) ? $_POST['email']: Null;
            $insert_data['password']        = isset($_POST['password']) ? md5($_POST['password']) : Null;
            $result = $this->db->select('*')->from('mt_customers')->where('email', $_POST['email'])->get()->row();
            if (empty($result)) {
                $this->Auth_model->add_customers($insert_data);
                $message_mail   = 'Dear '.$insert_data['first_name'].',';
                $email_sent     = _sendmail($insert_data['email'],$message_mail,'Gulp Registerd New User');
                if($email_sent)
                {
                    $data['register_confirm']   = true;
                    $data['success_msg']        = 'Successfully register with send mail your access link!';
                }else
                {
                    $data['error_msg']          = 'Email sent has Some Internal failure!';
                }
                
            }else{
                $data['error_msg']          = 'Already exist your email address.';
            }
        }else
        {
                $data['error_msg']              = 'Some Internal error!';
        }
        echo json_encode($data); die;
    }

    /**
    ** New customer Login 
    **  
    ** Paramaters [email,password]
    **/
    public function login()
    {
        if(isset($_POST['login'])){
            $insert_data = array();
            $insert_data['email']           = isset($_POST['email']) ? $_POST['email']: Null;
            $insert_data['password']        = isset($_POST['password']) ? md5($_POST['password']) : Null;
            $result = $this->db->select('*')->from('mt_customers')->where($insert_data)->get()->row();
            if (!empty($result)) {
                $data['login_confirm']   = true;
                $this->session->set_userdata('user_id', $result->user_id);
                $this->session->set_userdata('name', $result->first_name);
                $profile_img = $this->get_profile_image($result);
                //$this->session->set_userdata('user_id', $result->user_id);
            }else{
                $data['error_msg']          = 'Incorrect email addresss and Password.';
            }
        }else
        {
                $data['error_msg']              = 'Some Internal error!';
        }
        echo json_encode($data); die;
    }

    /**
    ** Logout 
    **  
    ** Paramaters []
    **/
    public function logout()
    {
        session_destroy();
        redirect('home', 'refresh');
    }

    /*
    ** Profile Image view for facebook and gmail users.
    ** [parameters] [profile_image]
    **
    */
    public function get_profile_image($signin_response)
    {
        //Default image path
        $profile_img_link = base_url() . "assets/img/user.png";
        //profile image check exist and set user data
        if (empty($signin_response->profile_picture)){
            if (!empty($signin_response->picture))
            {
                $profile_img_link = $signin_response->picture;  
            }
        }else {
        $profile_img_path = __DIR__ . "/../../uploads/profiles/" . $signin_response->profile_picture;
            if(file_exists($profile_img_path)) 
            { 
                $profile_img_link =  base_url(). "uploads/profiles/" . $signin_response->profile_picture.'?'.time();
            } 
        }
        $this->session->set_userdata('profileimage', $profile_img_link);
        return $profile_img_link;
    }
}