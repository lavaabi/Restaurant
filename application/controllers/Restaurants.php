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
		if(!empty($_POST['city'])){
			$data['result'] = $this->db->query("SELECT m.*,r.rating_count,r.mt_ratings FROM `mt_merchant` m left join (SELECT *, AVG(ratings) as mt_ratings,count(ratings) as rating_count FROM `mt_rating` group by merchant_id) as r on r.merchant_id = m.merchant_id where city like ? or restaurant_name like ? or street like ?", array('%'.$_POST['city'].'%','%'.$_POST['city'].'%','%'.$_POST['city'].'%'))->result_array();
			$data['city'] = $_POST['city'];
		}else{
			$data['result'] = $this->db->query("SELECT m.*,r.rating_count,r.mt_ratings FROM `mt_merchant` m left join (SELECT *, AVG(ratings) as mt_ratings,count(ratings) as rating_count FROM `mt_rating` group by merchant_id) as r on r.merchant_id = m.merchant_id")->result_array();
			$data['city'] = '';
		}
		//echo $this->db->last_query();print_r($data['result']);exit;
		$data['category'] = $this->db->query("SELECT * FROM `mt_category` GROUP BY category_name ")->result_array();
		$data['cuisine'] = $this->db->query("SELECT * FROM `mt_cuisine` GROUP BY cuisine_name")->result_array();
		$this->load->view('restaurant_listing',$data);
	}
	
	public function menus(){
		$data = array();
		if(!empty($_GET['restaurant_id'])){
			$data['menus'] = $this->db->query("SELECT * FROM `mt_item` m where m.merchant_id = ?", array($_GET['restaurant_id']))->result_array();
			$data['restaurant_detail'] = $this->db->query("SELECT * FROM `mt_merchant` m left join (SELECT *, AVG(ratings) as mt_ratings,count(ratings) as rating_count FROM `mt_rating` group by merchant_id) as r on r.merchant_id = m.merchant_id where m.merchant_id = ?", array($_GET['restaurant_id']))->row_array();
			$data['restaurant_options'] = $this->db->query("SELECT * FROM `mt_option` m where m.merchant_id = ?", array($_GET['restaurant_id']))->result_array();
			$data['restaurant_reviews'] = $this->db->query("SELECT * FROM `mt_review` m where m.merchant_id = ?", array($_GET['restaurant_id']))->result_array();
			$data['restaurant_images'] = $this->db->query("SELECT * FROM `mt_review` m where m.merchant_id = ?", array($_GET['restaurant_id']))->result_array();
			//print_r($data['restaurant_options']);exit;
		}else{
			redirect('restaurants');
		}
		
		$this->load->view('menu_detail',$data);
	}
	
}
