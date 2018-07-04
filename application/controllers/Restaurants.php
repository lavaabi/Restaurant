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
			
			if(!empty($_SESSION['session_id'])){
				$data['cart_view'] = $this->cart_details($_SESSION['session_id']);
			}else{
				$data['cart_view'] = '';
			}
			
		}else{
			redirect('restaurants');
		}
		
		$this->load->view('menu_detail',$data);
	}
	
	public function add_to_cart(){
		
		if(empty($_SESSION['session_id'])){
			$_SESSION['session_id'] = session_id();
		}
		if(isset($_POST)){
			
			$item_session_id = substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(6/strlen($x)) )),1,6);
			
			$insert_data = array('item_id' => $_POST['item_id'], 'quantity' => $_POST['quantity'], 'session_id' => $_SESSION['session_id'], 'item_session_id' => $item_session_id);
			$insert_id = $this->Home_Model->cart_insert($insert_data);
			$cart_view = $this->cart_details($_SESSION['session_id']);
			$result = array('status' => 'success', 'cart_details' => $cart_view);
			
		}else{
			$result = array('status' => 'failure', 'msg' => 'Post values are empty');
		}
		print_r($result);exit;
		
		echo json_encode($res);
	}
	
	public function cart_details($session_id){
		$cart_items = $this->db->query("SELECT c.item_id,c.session_id,c.quantity,c.item_session_id,i.item_name,i.price,g.gst_percentage as gst FROM `mt_shopping_cart` c LEFT JOIN mt_item i ON i.item_id = c.item_id LEFT JOIN mt_gst g ON g.merchant_id = i.merchant_id WHERE session_id = ?",array($session_id))->result_array();
			$cart_view = '';
			$total = 0;
			if(!empty($cart_items)){
				
				$cart_view .= '<ul class="order-list">';
				foreach($cart_items as $item){
					$cart_view .= '<li>';
						$cart_view .= '<div class="order-blk">';
							$cart_view .= '<h5 class="ord-tit">'.$item['item_name'].'</h5>';
							$cart_view .= '<div class="row">';
								$cart_view .= '<div class="col-xs-8 ord-count">';
									$cart_view .= '<div class="add-count">';
										 $cart_view .= '<button class="btn"><i class="fa fa-plus"></i></button>';
										 $cart_view .= '<span class="amb-count">4</span>';
										 $cart_view .= '<button class="btn"><i class="fa fa-minus"></i></button>';
									 $cart_view .= '</div>';
									 $price = json_decode($item['price'],true);
									 $total = $total + $price[0];
									 $cart_view .= '<span class="ord-multi">'.$item['quantity'].' x <i class="fa fa-inr"></i> '.$price[0].'</span>';
								$cart_view .= '</div>';
								$cart_view .= '<div class="col-xs-4 ord-price">';
									$cart_view .= '<h5><i class="fa fa-inr"></i> '.($item['quantity']*$price[0]).'</h5></h5>';
								$cart_view .= '</div>';
							$cart_view .= '</div>';
						$cart_view .= '</div>';
					$cart_view .= '</li>';
				}
					
					$cart_view .= '<li class="gst">';
						$cart_view .= '<div class="order-blk">';
							$cart_view .= '<div class="row">';
								$cart_view .= '<div class="col-xs-6 text-left">';
									$cart_view .= '<h5>GST';
									if(!empty($cart_items[0]['gst'])){
										$cart_view .= '('.$cart_items[0]['gst'].'%)';
										$total = (($cart_items[0]['gst']*$total)/100) + $total;
									}
									$cart_view .= '</h5>';
								$cart_view .= '</div>';
								$cart_view .= '<div class="col-xs-6 text-right">';
									$cart_view .= '<h5><i class="fa fa-inr"></i> '.(($cart_items[0]['gst']*$total/100)).'</h5></h5>';
								$cart_view .= '</div>';
							$cart_view .= '</div>';
						$cart_view .= '</div>';
					$cart_view .= '</li>';
					
					$cart_view .= '<li class="sub-total">';
						$cart_view .= '<div class="order-blk">';
							$cart_view .= '<div class="row">';
								$cart_view .= '<div class="col-xs-6 text-left">';
									$cart_view .= '<h5 class="sub-tot">Sub Total</h5>';
									$cart_view .= '<p class="ord-tax">(Plus Taxes)</p>';
								$cart_view .= '</div>';
								$cart_view .= '<div class="col-xs-6 text-right">';
									$cart_view .= '<h4><i class="fa fa-inr"></i> '.$total.'</h4>';
								$cart_view .= '</div>';
							$cart_view .= '</div>';
						$cart_view .= '</div>';
					$cart_view .= '</li>';
					$cart_view .= '</ul>';
					$cart_view .= '<button class="btn btn-gulp place-od w100">Place order</button>';
			
			}
			return $cart_view;
	}
	
}
