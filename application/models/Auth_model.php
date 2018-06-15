<?php
if ( !defined( 'BASEPATH' ) )
    exit( 'No direct script access allowed' );
/*********************************************************************************************
 * Module     : FB Authentication  
 * Methods    : fb_login
 ***********************************************************************************************/

class Auth_model extends CI_Model
{
    public $userTbl             = 'tbl_users';
    function __construct()
    {
        parent::__construct();
        
    }
    /**
     * fb details update
     */
    public function fbupdate( $fbUserProfile, $merge_chk = null )
    {
        
        $fbUserData = array(
            
             'oauth_uid' => $fbUserProfile['id'],
            'access_token' => $this->session->userdata( 'fb_access_token' ),
            'first_name' => $fbUserProfile['first_name'],
            'last_name' => $fbUserProfile['last_name'],
            'email' => $fbUserProfile['email'],
            'gender' => $fbUserProfile['gender'],
            'locale' => $fbUserProfile['locale'],
            'picture' => $fbUserProfile['picture']['data']['url'],
            'link' => $fbUserProfile['link'],
            'time_zone' => $fbUserProfile['timezone'],
            'confirm_code' => md5( uniqid( rand() ) ),
            'is_active' => 'Y' 
            
        );
        // echo "<pre>"; print_r($fbUserData);
        //exit;
        // Check whether user data already exists in database
        
        $select_user = $this->db->select( '*' )->from( $this->userTbl . ' AS us' )->where( 'us.email', $fbUserData['email'] );
        $query       = $select_user->get();
        $check_user  = $query->num_rows();
        $result      = $query->result();
        if ( $check_user > 0 ) {
            
            // Update user data if already exists
            if ( $merge_chk == 'NO' ) {
                if ( $result[0]->oauth_uid == '' || $result[0]->oauth_uid == 0 ) {
                    return "exists";
                } //$result[0]->oauth_uid == '' || $result[0]->oauth_uid == 0
                else {
                    
                    $fbUserData['modified_date'] = date( "Y-m-d H:i:s" );
                    $this->db->update( $this->userTbl, $fbUserData, array(
                         'email' => $fbUserData['email'] 
                    ) );
                    $select_user = $this->db->select( '*' )->from( $this->userTbl . ' AS us' )->where( 'us.oauth_uid', $fbUserData['oauth_uid'] );
                    $query       = $select_user->get();
                    $result      = $query->result();
                    return $result;
                    
                }
            } //$merge_chk == 'NO'
            else {
                $fbUserData['modified_date'] = date( "Y-m-d H:i:s" );
                $this->db->update( $this->userTbl, $fbUserData, array(
                     'email' => $fbUserData['email'] 
                ) );
                $select_user = $this->db->select( '*' )->from( $this->userTbl . ' AS us' )->where( 'us.oauth_uid', $fbUserData['oauth_uid'] );
                $query       = $select_user->get();
                $result      = $query->result();
                return $result;
                
            }
            
        } //$check_user > 0
        else {
            // Insert user data
            $fbUserData['created_date'] = date( "Y-m-d H:i:s" );
            $fbUserData['password']     = md5( rand( 0, 50 ) );
            $insert_fbnew_user          = $this->db->insert( $this->userTbl, $fbUserData );
            $insert_id                  = $this->db->insert_id();
            $select_user                = $this->db->select( '*' )->from( $this->userTbl . ' AS us' )->where( 'us.oauth_uid', $fbUserData['oauth_uid'] );
            $query                      = $select_user->get();
            $result                     = $query->result();
            
            $message = /*-----------email body starts-----------*/ 'Dear, ' . $fbUserData['first_name'] . '!';
            $subject = "";
            _sendmail( $fbUserData['email'], $message, $subject );
            return $result;
            
        }
        
    }
    
     /**
     * fb details update
     */
    public function fbdataupdate( $params )
    {
        
        $fbUserProfile = isset( $params['fbUserProfile'] ) ? $params['fbUserProfile'] : '';
        $usertoken     = isset( $params['usertoken'] ) ? $params['usertoken'] : '';
        $merge_chk     = isset( $params['merge_chk'] ) ? $params['merge_chk'] : '';
        $email         = isset( $params['email'] ) ? $params['email'] : '';
        
        $fbUserData = array(
            
             'oauth_uid' => $fbUserProfile['id'],
            'access_token' => $usertoken,
            'first_name' => $fbUserProfile['first_name'],
            'last_name' => $fbUserProfile['last_name'],
           // 'email' => isset( $fbUserProfile['email'] ) ? $fbUserProfile['email'] : 'no_email',
            'gender' => $fbUserProfile['gender'],
            'locale' => $fbUserProfile['locale'],
            'picture' => $fbUserProfile['picture']['data']['url'],
            'link' => $fbUserProfile['link'],
            'time_zone' => $fbUserProfile['timezone'],
            'confirm_code' => md5( uniqid( rand() ) )
            
            
        );
        
        $select_user = $this->db->select( '*' )->from( $this->userTbl . ' AS us' )->or_where( 'us.oauth_uid', $fbUserData['oauth_uid'] );
        $query       = $select_user->get();
        $check_user  = $query->num_rows();
        $result      = $query->result();

        if ( $check_user > 0 && $fbUserData['oauth_uid']!='') {
            
            // Update user data if already exists
            /* getting the help videos pages*/
            $get_user_pages = $this->db->query( "select page_name from tbl_pages where page_id NOT IN (select page_id from tbl_helpview_users where user_id = '" . $result[0]->user_id . "')" );
            $page_result    = $get_user_pages->result_array();
            $page_array     = array();
            foreach ( $page_result as $array_page ) {
                     $page_array[] = $array_page['page_name'];
                
            } //$page_result as $array_page
            /* end*/
            if (($result[0]->email == 'no_email' || $result[0]->email == '') && $email=='' ) {
                  $data['returnvalue'] = "email_not_exists";
                  return $data;
            }
           
                    if($email!=''){
                        $fbUserData['email'] = $email;
                        $email_subject="Signup Successful";
                        $user_email=$fbUserData['email'];
                         try {
                            $email_data['user_name']         =  $fbUserData['first_name'];
                            $email_data['event_type']        =  "fbsignup";
                            $data['email']  = $email_data;
                            $email_content  = $this->load->view('send_email_template', $data, true);
                            if(!empty($user_email)) {
                                _sendmail($user_email, $email_content, $email_subject);
                            }
                        } catch(Exception $ex) {}
                                }else{
                        //$fbUserData['email'] = $result[0]->email;
                    }
                    $fbUserData['modified_date'] = date( "Y-m-d H:i:s" );
                    $this->db->update($this->userTbl, $fbUserData, array('oauth_uid' => $fbUserData['oauth_uid']));
                    $select_user              = $this->db->select( '*' )->from( $this->userTbl . ' AS us' )->where( 'us.oauth_uid', $fbUserData['oauth_uid'] );
                    $query                    = $select_user->get();
                    $result                   = $query->result();
                    $data['user_id']          = $this->botcrypt->encode( $result[0]->user_id );
                    $data['oauth_uid']        = $result[0]->oauth_uid;
                    $data['access_token']     = $result[0]->access_token;
                    $data['role_id']          = $result[0]->role_id;
                    $data['first_name']       = $result[0]->first_name;
                    $data['last_name']        = $result[0]->last_name;
                    $data['email']            = $result[0]->email;
                    $data['picture']          = $result[0]->picture;
                    $data['profile_picture']  = $result[0]->profile_picture;
                    $data['link']             = $result[0]->link;
                    $data['time_zone']        = $result[0]->time_zone;
                    $data['package_id']       = $this->botcrypt->encode( $result[0]->package_id );
                    $data['payment_interval'] = $result[0]->payment_interval;
                    $data['payment_status']   = $result[0]->payment_status;
                    $data['subscription_id']  = $this->botcrypt->encode( $result[0]->subscription_id );
                    $data['is_active']        = $result[0]->is_active;
                    $data['is_admin_deactive']= $result[0]->is_admin_deactive;
                    $data['helppagesviewed']  = (array) $page_array;
                    $data['returnvalue']      = "success";
                    return $data;
                    
           
            
        } else {

            if($fbUserData['oauth_uid']!=''){
            // Insert user data
            if($email==''){
                $fbUserData['email']=isset( $fbUserProfile['email'] ) ? $fbUserProfile['email'] : 'no_email';
            }else{
                $fbUserData['email']=$email;
            }

            if($fbUserData['email'] == 'no_email' && $email=='' ) {
                  $data['returnvalue'] = "email_not_exists";
                  return $data;
            }
 
            $select_email = $this->db->select( '*' )->from( $this->userTbl . ' AS us' )->where( 'us.email', $fbUserData['email'] );
            $query_email  = $select_email->get();
            $check_email  = $query_email->num_rows();
            $result_email_check  = $query_email->result();

            if($check_email > 0){
                if (($result_email_check[0]->oauth_uid == '' || $result_email_check[0]->oauth_uid == 0) && $merge_chk == 'NO' ) {
                        $data['returnvalue'] = "exists";
                        return $data;
                }
            }
             $fbUserData['is_active']    =  'Y';

            if($merge_chk =='YES'){
                $fbUserData['modified_date'] = date( "Y-m-d H:i:s" );
                $this->db->update($this->userTbl, $fbUserData, array('email' => $fbUserData['email']));

            }else{
           
                $fbUserData['created_date'] = date( "Y-m-d H:i:s" );
                $fbUserData['password']     = md5( rand( 0, 50 ) );
                $insert_fbnew_user          = $this->db->insert( $this->userTbl, $fbUserData);
                $insert_id                  = $this->db->insert_id();
                                          
                $email_subject="Signup Successful";
                $user_email=$fbUserData['email'];
                 try {
                    $email_data['user_name']         =  $fbUserData['first_name'];
                    $email_data['event_type']        =  "fbsignup";
                    $data['email']  = $email_data;
                    $email_content  = $this->load->view('send_email_template', $data, true);
                    if(!empty($user_email)) {
                       _sendmail($user_email, $email_content, $email_subject);
                    }
                } catch(Exception $ex) {}
            }
            $select_user                = $this->db->select( '*' )->from( $this->userTbl . ' AS us' )->where( 'us.oauth_uid', $fbUserData['oauth_uid'] );
            $query                      = $select_user->get();
            $result                     = $query->result();
            /* getting the help videos pages*/
            $get_user_pages = $this->db->query( "select page_name from tbl_pages where page_id NOT IN (select page_id from tbl_helpview_users where user_id = '" . $result[0]->user_id . "')" );
            $page_result    = $get_user_pages->result_array();
            $page_array     = array();
            
            foreach ( $page_result as $array_page ) {
                
                $page_array[] = $array_page['page_name'];
                
            } //$page_result as $array_page
            /* end*/
            
            $data['user_id']         = $this->botcrypt->encode( $result[0]->user_id );
            $data['oauth_uid']       = $result[0]->oauth_uid;
            $data['access_token']    = $result[0]->access_token;
            $data['role_id']         = $result[0]->role_id;
            $data['first_name']      = $result[0]->first_name;
            $data['last_name']       = $result[0]->last_name;
            $data['email']           = $result[0]->email;
            $data['picture']         = $result[0]->picture;
            $data['profile_picture'] = $result[0]->profile_picture;
            $data['link']            = $result[0]->link;
            $data['time_zone']       = $result[0]->time_zone;
            $data['is_active']       = $result[0]->is_active;
            $data['is_admin_deactive']= $result[0]->is_admin_deactive;
            $data['helppagesviewed'] = (array) $page_array;
            $data['returnvalue']     = "success";
            //print_r($data);exit;
            return $data;
          }else{
             $data['returnvalue']     = "emptydata";
             return $data;
          }
            
        }
        
    }
    
    
}