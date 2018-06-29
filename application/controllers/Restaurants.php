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
			
			$data['menus'] = $this->db->query("SELECT m.* FROM `mt_item` m where m.merchant_id = ?", array($_GET['restaurant_id']))->result_array();
			
			$data['cuisine'] = $this->db->query("SELECT m.* FROM `mt_cuisine` m")->result_array();
			
			$data['restaurant_detail'] = $this->db->query("SELECT * FROM `mt_merchant` m left join (SELECT *, AVG(rating) as mt_ratings,count(rating) as rating_count FROM `mt_review` group by merchant_id) as r on r.merchant_id = m.merchant_id where m.merchant_id = ?", array($_GET['restaurant_id']))->row_array();
			
			$data['restaurant_options'] = $this->db->query("SELECT * FROM `mt_option` m where m.merchant_id = ?", array($_GET['restaurant_id']))->result_array();
			
			$data['restaurant_reviews'] = $this->db->query("SELECT m.*,c.* FROM `mt_review` m LEFT JOIN mt_customers c ON c.id=m.client_id where m.merchant_id = ?", array($_GET['restaurant_id']))->result_array();
			
			$data['offers'] = $this->db->query("SELECT * FROM `mt_offers` m where m.merchant_id = ?", array($_GET['restaurant_id']))->result_array();
			
			$data['per_rating_count'] = $this->db->query("SELECT r.*,count(rating) as rating_count FROM `mt_review` r where r.merchant_id = ? group by r.rating", array($_GET['restaurant_id']))->result_array();
			
			$data['category'] = $this->db->query("SELECT cat_id,category_name FROM `mt_category` m")->result_array();
			
			//print_r($data['restaurant_options']);exit;
			if(!empty($data['category'])){
				foreach($data['category'] as $cat){
					$c[$cat['cat_id']] = $cat['category_name'];
				}
			}
			$data['category'] = $c;
			
		}else{
			redirect('restaurants');
		}
		
		$this->load->view('menu_detail',$data);
	}
	
}
