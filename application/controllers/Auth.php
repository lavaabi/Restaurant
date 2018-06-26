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
            $this->Auth_model->get_profile_image($fblogin_response);

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
            $confirm_code                   = get_rand_code();
            $confirmation_link              = base_url().'auth/confirmation/'.$confirm_code;
            $insert_data['first_name']      = isset($_POST['name']) ? $_POST['name'] : Null;
            $insert_data['email']           = isset($_POST['email']) ? $_POST['email']: Null;
            $insert_data['password']        = isset($_POST['password']) ? md5($_POST['password']) : Null;
            $insert_data['confirm_code']    = $confirm_code;
            $result = $this->db->select('*')->from('mt_customers')->where('email', $_POST['email'])->get()->row();
            if (empty($result)) {
                $message_mail   = 'Dear '.$insert_data['first_name'].', Your account created successfully click the link to continue new order'.$confirmation_link;
                $email_sent     = _sendmail($insert_data['email'],$message_mail,'Gulp Registerd New User');
                $this->Auth_model->add_customers($insert_data);
                if($email_sent)
                {
                    $this->Auth_model->add_customers($insert_data);
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
                if($result->is_active=='N')
                {
                    $data['error_msg']          = 'Your accout is not activated, Please check your mail accees link to continue login.';
                }else
                {
                    $data['login_confirm']   = true;
                    $this->session->set_userdata('user_id', $result->user_id);
                    $this->session->set_userdata('name', $result->first_name);
                    $profile_img = $this->Auth_model->get_profile_image($result);
                }
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
    ** Confirmation to login .
    ** [parameters] [confirmation code]
    **
    */
    public function confirmation($confirm_code)
    {
        $data =array();
        if(!empty($confirm_code)){
            $result = $this->db->select('*')->from('mt_customers')->where(array('confirm_code'=>$confirm_code))->get()->row();
            if (!empty($result)) {
                $this->db->update('mt_customers',array('is_active'=>'Y'),array('confirm_code'=>$confirm_code));
                $data['login_confirm']   = true;
                $this->session->set_userdata('user_id', $result->user_id);
                $this->session->set_userdata('name', $result->first_name);
                $profile_img = $this->Auth_model->get_profile_image($result);
                //$this->session->set_userdata('user_id', $result->user_id);
                redirect('home', 'refresh');
            }else
            {
                $data['confirm_code_status'] = 'confirmation_link_not_match';
            }

        }else
        {
            $data['confirm_code_status'] = 'confirmation_link_empty_key';
        }
        $this->load->view('home',$data);
    }

    /*
    ** Forgot password.
    ** [parameters] [email address]
    **
    */
    public function forgot_password()
    {
        if(isset($_POST['forgot'])){
            $insert_data = array();
            $confirm_code                   = get_rand_code();
            $confirmation_link              = base_url().'auth/changepass/'.$confirm_code;
            $insert_data['email']           = isset($_POST['email']) ? $_POST['email']: Null;
            $result = $this->db->select('*')->from('mt_customers')->where($insert_data)->get()->row();
            if (!empty($result)) {
                if($result->is_active=='N'){
                    $data['error_msg']          = "Your accout is not activated.";
                }else
                {
                    $message_mail   = 'Dear '.$result->first_name.',  click the link to continue your password change '.$confirmation_link;
                    $email_sent     = _sendmail($insert_data['email'],$message_mail,'Gulp Forgot Password');
                    if($email_sent)
                    {
                    $this->db->update('mt_customers',array('pwd_confirm_code'=>$confirm_code),$insert_data);
                    $data['forgot']   = true;
                    $data['success_msg']        = 'Successfully your change password link is sent to your email address.';
                    }else
                    {
                        $data['error_msg']          = "Some internal mail server issues will update link shortly.";
                    }   
                }
                
            }else{
                $data['error_msg']          = "Mismatch your email address.";
            }
        }else
        {
                $data['error_msg']              = 'Some Internal error!';
        }
        echo json_encode($data); die;
    }

    /*
    ** Change password.
    ** [parameters] [confirmation code]
    **
    */
    public function changepass($confirm_code)
    {
        $data =array();
        if(!empty($confirm_code)){
            $result_N = $this->db->select('*')->from('mt_customers')->where(array('pwd_confirm_code'=>$confirm_code,'is_password'=>'N'))->get()->row();
            $result_Y = $this->db->select('*')->from('mt_customers')->where(array('pwd_confirm_code'=>$confirm_code,'is_password'=>'Y'))->get()->row();
            if (!empty($result_N)) {
                $data['forgot_code_status'] = 'change_pass_access';
            }
            if(!empty($result_N))
            {
                $data['forgot_code_error'] = 'exist_link';
            }

        }else
        {
            $data['forgot_code_error'] = 'link_empty_key';
        }
        $this->load->view('home',$data);
    }

    /*
    ** Change password.
    ** [parameters] [confirmation code]
    **
    */
    public function change_password()
    {
        $confirm_code = (isset($_POST['confirm_code'])) ? $_POST['confirm_code'] : '';
        if(!empty($confirm_code)){
            $result = $this->db->select('*')->from('mt_customers')->where(array('pwd_confirm_code'=>$confirm_code,'is_password'=>'N'))->get()->row();
            if (!empty($result)) {
                $this->db->update('mt_customers',array('password'=>md5($_POST['password']),'is_password'=>'Y'),array('pwd_confirm_code'=>$confirm_code));
                $data['changepass']     = true;
                $data['success_msg']    = 'Successfully changed your password!';
            }else
            {
                $data['error_msg']      = 'Your forgot password link is invalid.';
            }

        }else
        {
            $data['error_msg']      = 'Your forgot password link is invalid.';
        }
        echo json_encode($data); die;
    }

    /*
    ** Myaccount page updated.
    ** [parameters] [confirmation code]
    **
    */
    public function myaccount()
    {
        valid_session_user();
        $data = array();
        $data['profile'] = $this->Auth_model->get_profile();
        $this->load->view('myaccount',$data);
    }
    /*
    ** Update profile page updated.
    ** [parameters] [confirmation code]
    **
    */
    function update_user_profile()
    {   valid_session_user();
        if(!empty($_POST['profile_update']))
        {
           $this->db->update('mt_customers',array(
            'first_name'=> $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'mobile'    => $_POST['mobile']
            ),array('user_id'=>$this->session->userdata('user_id')));
            $data['update_pf']     = true;
            $data['success_msg']    = 'Successfully updated your details.'; 
        }else
        {
            $data['error_msg']    = 'Update some invalid values.'; 
        }
        echo json_encode($data); die;

    }

    /*
    ** Update profile passwod page updated.
    ** [parameters] [confirmation code]
    **
    */
    function update_user_profile_pass()
    {   valid_session_user();
        if(!empty($_POST['profile_update_pass']))
        {
            $profile = $this->Auth_model->get_profile();
            if($profile->password != md5($_POST['old_pass']))
            {
                $data['error_msg']    = 'Your old password is not match.';

            }else
            {
                $this->db->update('mt_customers',array(
                'password'=> md5($_POST['confirm_pass'])
                ),array('user_id'=>$this->session->userdata('user_id')));
                $data['update_pass']     = true;
                $data['success_msg']    = 'Successfully updated your password.';

            } 
        }else
        {
            $data['error_msg']    = 'Some invalid values.'; 
        }
        echo json_encode($data); die;

    }
}