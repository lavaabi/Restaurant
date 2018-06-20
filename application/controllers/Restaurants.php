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
		$data['result'] = $this->db->query("SELECT * FROM `mt_merchant` m left join (SELECT *, AVG(ratings) as mt_ratings FROM `mt_rating` group by merchant_id) as r on r.merchant_id = m.merchant_id")->result_array();
		$data['category'] = $this->db->query("SELECT * FROM `mt_category` GROUP BY category_name ")->result_array();
		$data['cuisine'] = $this->db->query("SELECT * FROM `mt_cuisine` GROUP BY cuisine_name")->result_array();
		$this->load->view('restaurant_listing',$data);
	}
	
}
