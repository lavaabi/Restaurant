<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurants extends CI_Controller {

	public function __construct()
  {
      parent::__construct();
      $this->load->model('Home_Model');   
  }
  /**
  ** Restaurant listing page 
  **[Get all lists]
  **/
	public function index()
	{
		$data = array();
		$data['result'] = $this->db->query("select * from `mt_merchant`")->result_array();
		$this->load->view('restaurant_listing',$data);
	}
	
}
