<?php
ini_set("memory_limit", "1000M");

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Authentication
 *
 *
 * @package     Authentication
 * @subpackage  Rest Server
 * @category    Authentication
 * @author      Ashok kumar
 * @link    
 */

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class Users extends REST_Controller
{
    public $userTbl = 'tbl_users';
    public $headercheck;
    
    function __construct()
    {
        
        // Construct our parent class
        parent::__construct();
        
        $this->methods['user_get']['limit']    = 500; //500 requests per hour per user/key
        $this->methods['user_post']['limit']   = 100; //100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; //50 requests per hour per user/key
        $this->load->library('facebook');
        $this->load->helper('url');
        $this->load->model('Auth_model');
        $this->load->helper('header');
        $this->load->helper('custom');
        $this->headercheck = check_valid_key();
    }
    
    
     public function fblogin_post()
    {
      $check_user   = '';
      $post_records     = $this->input->post();   
      if ($this->headercheck) {
        $check_user = $this->Auth_model->fbdataupdate($post_records);

        if ($check_user['returnvalue'] == 'success') {
            $this->response(array(
                'status' => '1',
                'message' => "login_success",
                'result' => true,
                'user_details' => $check_user
            ));
        } else if ($check_user['returnvalue'] == 'exists') {
            // login failed
            $this->response(array(
                'status' => '0',
                'message' => "acccount_exist",
                'result' => false
            ));
        }else if ($check_user['returnvalue'] == 'email_not_exists') {
            // login failed
            $this->response(array(
                'status' => '0',
                'message' => "email_not_exists",
                'result' => false
            ));
        }

      } else {
            $this->response(array(
                'error' => 'You are not Authorized',
                'status' => '0',
                'result' => false
            ), 404);
        }
    }
    
}