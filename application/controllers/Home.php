<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_Model');
               
    }
	public function index()
	{
		if(isset($_POST['signup'])){
			$insert_data = array();
			$insert_data['name'] = $_POST['name'];
			$insert_data['email'] = $_POST['email'];
			$insert_data['password'] = md5($_POST['password']);
			$result = $this->db->select('*')->from('mt_customers')->where('email', $_POST['email'])->get()->row();
			if (empty($result)) {
				$this->Home_Model->add_customers($insert_data);
				$_SESSION['user_details'] = $this->db->select('*')->from('mt_customers')->where('email', $_POST['email'])->get()->row();
				$this->session->set_flashdata('success_message', 'Successfully Registered!!');
				
			}else{
				$this->session->set_flashdata('success_message', 'Email Already Registered!!');
			}
		}
		
		$this->load->view('home');
	}
	public function login()
	{
		if(isset($_POST['signin'])){			
			$result = $this->db->select('*')->from('mt_customers')->where('email', $_POST['email'])->where('password', md5($_POST['password']))->get()->row();
			if (empty($result)) {
				
				$this->session->set_flashdata('success_message', 'Invalid Credentials!!');
				
			}else{
				$_SESSION['user_details'] = $result;
				$this->session->set_flashdata('success_message', 'Logged in Successfully!!');
			}
		}
		
		$this->load->view('home');
	}
}
