<?php $this->load->view('header'); ?>
    <!-- food-detail-blk -->
    <div class="food-detail-blk">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Restarant</a></li>
                <li class="active">Menu</li>
            </ol>
            <div class="row">
                <!-- First section -->
                <div class="col-sm-7">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="food-img">
                                <img src="<?php echo ($restaurant_detail['logo'] == '') ?  base_url('assets/img/detail-view/food-deatils.png') : 'http://sanghish.com/restaurant/upload/'.$restaurant_detail['logo'] ?>" alt="food-image" class="img-responsive"/>
                            </div>
                        </div>
                        <div class="col-sm-8 food-details">
                            <h3 class="fd-title"><?php echo $restaurant_detail['restaurant_name']; ?></h3>
                            <p><?php echo $restaurant_detail['street']; ?></p>
                            <h6 class="fd-ingrediants"><?php
							$cuisine_arr = array();							
							if(!empty($cuisine)){
								foreach($cuisine as $cui){
									$cuisine_arr[$cui['cuisine_id']] = $cui['cuisine_name'];
								}
							}
							$res = json_decode($restaurant_detail['cuisine'],true);
							if(!empty($res)){
								foreach($res as $e => $r){
								echo ($e>=1)?', '.$cuisine_arr[$r]:$cuisine_arr[$r];
							} } ?> </h6>
                            <ul>
                                <li class="fd-rating">
                                    <h5>
                                        <i class="fa fa-star"></i> <?php echo number_format($restaurant_detail['mt_ratings'],1); ?></h5>
                                    <p><?php echo $restaurant_detail['rating_count']; ?> Ratings</p>
                                </li>
                                <li class="fd-delivery">
                                    <h5><?php echo ($restaurant_detail['minimum_order']>0) ? '<i class="inr">&#8377;</i>'.number_format($restaurant_detail['minimum_order'],2) : 'Not Mentioned'; ?></h5>
                                    <p>Minimum Order</p>
                                </li>
                                <!--<li class="fd-delivery">
                                    <h5>
                                        <i class="fa fa-inr"></i> 250</h5>
                                    <p>Cost for two</p>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- first section -->
                <!-- second-section -->
                <div class="col-sm-offset-1 col-sm-4 fd-menus-blk">
				<?php if(!empty($menus)){ ?>
                    <div class="text-center">
                        <h5 class="fd-menu-title">MENU</h5>
                    </div>
                    <ul class="fd-menu-list">
					<?php foreach($menus as $m => $row){
if($m < 9){
					?>
                        <li><a href="#"><?php echo $row['item_name']; ?></a></li>
<?php } } ?>
                        <!--<li><a href="#">Starters</a></li>
                        <li><a href="#">Main Course</a></li>
                        <li><a href="#">My Box combo</a></li>
                        <li><a href="#">Mega Meals</a></li>
                        <li><a href="#">Spicy Rice Box</a></li>
                        <li><a href="#">Deserts</a></li>
                        <li><a href="#">Beverages</a></li>-->
                    </ul>
				<?php } ?>
                </div>
                <!-- End second-section -->
            </div>
        </div>
    </div>
    <!-- End food-detail-blk -->
    <!-- Extra details section -->
    <div class="food-tab-details">
        <div class="container-fluid">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">Overview</a>
                        </li>
                        <li role="presentation">
                            <a href="#menu" aria-controls="menu" role="tab" data-toggle="tab">Menu</a>
                        </li>
                        <li role="presentation">
                            <a href="#review" aria-controls="review" role="tab" data-toggle="tab">Review <span>(<?php echo count($restaurant_reviews); ?>)</span></a>
                        </li>
                        <li role="presentation">
                            <a href="#photos" aria-controls="photos" role="tab" data-toggle="tab">Photos <span>(<?php echo count($restaurant_detail['logo']); ?>)</span></a>
                        </li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="overview">
                            <div class="row">
                                <!-- First section -->
                                <div class="col-sm-7 col-md-5">
                                    <div class="ft-inner">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="ft-blocks">
                                                    <h5>Address</h5>
                                                    <p><?php echo $restaurant_detail['street']; ?></p>
                                                </div>
                                                <div class="ft-blocks">
                                                    <h5>Opening hours</h5>
                                                    <p>Today:<br />
                                                        <span>
														<?php if(!empty($restaurant_options)){
															
															$today = strtolower(date("l"));
															foreach($restaurant_options as $r => $option){
																if($option['option_name'] == "stores_open_starts"){
																	$find_today = json_decode($option['option_value'],true);
																	//print_r($find_today);
																	echo $start_time_am = $find_today[0][$today]." - ";
																}
																if($option['option_name'] == "stores_open_ends"){
																	$find_today = json_decode($option['option_value'],true);
																	//print_r($find_today);
																	echo $start_time_am = $find_today[0][$today];
																}
																if($option['option_name'] == "stores_open_pm_start"){
																	$find_today = json_decode($option['option_value'],true);
																	//print_r($find_today);
																	echo "<br />".$start_time_am = $find_today[0][$today]." - ";
																}
																if($option['option_name'] == "stores_open_pm_ends"){
																	$find_today = json_decode($option['option_value'],true);
																	//print_r($find_today);
																	echo $start_time_am = $find_today[0][$today];
																}if($option['option_name'] == "free_delivery_above_price"){
																	$free_delivery_above_price = $option['option_value'];
																}
															}
														}  ?></span>
                                                    </p>
                                                    <!--<span class="ft-more">
                                                        <a href="#">More</a>
                                                    </span>-->
                                                </div>
                                                <div class="ft-blocks">
                                                    <h5>Cusines</h5>
                                                    <p><?php if(!empty($res)){
															foreach($res as $e => $r){
															echo ($e>=1)?', '.$cuisine_arr[$r]:$cuisine_arr[$r];
														} } ?></p>
                                                </div>
                                                <div class="ft-blocks ft-more-info">
                                                    <h5>More info</h5>
                                                    <ul>
                                                        <!--<li>No Alcohol Available</li>
                                                        <li>Free Wifi</li>
                                                        <li>Wifi</li>-->
                                                        <li>Outdoor Seating</li>
                                                        <li>Free Parking</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="ft-blocks">
                                                    <h5>Phone number</h5>
                                                    <h3 class="ph"><?php echo $restaurant_detail['restaurant_phone']; ?></h3>
                                                </div>
                                                <div class="ft-blocks">
                                                    <h5>Minimum Order</h5>
                                                    <p>
                                                       <?php echo ($restaurant_detail['minimum_order']>0) ? '<i class="inr">&#8377;</i>'.number_format($restaurant_detail['minimum_order'],2) : 'Not Mentioned'; ?></p>                       
                                                </div>
												<div class="ft-blocks">
                                                    <h5>Free Delivery above</h5>
                                                    <p>
                                                       <?php echo '<i class="inr">&#8377;</i>'.number_format($free_delivery_above_price,2); ?></p>                       
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End First section -->
                                <!-- Second section -->
                                <div class="col-sm-5 col-md-offset-4 col-md-3 top-offers-section">
								<?php if(!empty($offers)){ ?>
                                    <h5>TOP OFFERS</h5>
                                    <ul class="top-offers">
									<?php foreach($offers as $offer){ ?>
                                        <li>
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-4 off-img">
                                                    <img src="<?php echo base_url();?>assets/img/events/events-1.png" alt="offer-image" class="img-responsive">
                                                </div>
                                                <div class="col-xs-9 col-sm-8 off-details">
                                                    <h4>Up to <?php echo number_format($offer['offer_percentage'],0); ?>% off</h4>
                                                    <p>Order above <?php echo '<i class="inr">&#8377;</i>'.number_format($offer['offer_price'],2); ?></p>
                                                    <span class="off-yellow">
                                                        <a href="#">Explore</a>
                                                    </span>
                                                </div>
                                            </div>
										</li>
									<?php } ?>
                                    </ul>									
								<?php } ?>
                                </div>
                                <!-- End Second section -->
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="menu">
                            <div class="row">
                              <!--first section -->
                                 <div class="col-md-8">
                                     <div class="ft-inner">
                                        <h3 class="amb-menu-title">Items</h3>
                                         <div class="row">
										 <?php if(!empty($menus)){
												foreach($menus as $menu){
										 ?>
                                             <div class="col-sm-4 add-menu-blk">
                                                 <div class="add-menu-img">
                                                     <img src="<?php echo ($menu['photo'] == '') ?  base_url('assets/img/listing-slider/slider-1.png') : 'http://sanghish.com/restaurant/upload/'.$menu['photo']; ?>" alt="foot-image">
                                                 </div>
                                                 <h5><?php echo $menu['item_name']; ?></h5>
                                                 <p class="amb-tag">
												 <?php 
												 $cat = json_decode($menu['category'],true); 
												 if(!empty($cat)){
													 foreach($cat as $v => $c){
														 echo ($v>=1)?', '.$category[$c]:$category[$c];
													 }
												 }
												 ?>
												 </p>
                                                 <div class="row">
                                                     <div class="col-xs-6 amb-price">
													 <?php 
													 $price = json_decode($menu['price'],true); 
													 if(!empty($menu['discount'])){ ?>
                                                         <span class="amb-wrong"><i class="fa fa-inr"></i> <?php echo $menu['discount']+$price[0];  ?></span>
													 <?php } ?>
                                                         <span class="amb-right"><i class="fa fa-inr"></i> 
														 <?php 
														 echo $price[0]; ?>
														 </span>
                                                     </div>
                                                     <div class="col-xs-6 add-remove-blk">
                                                         <div class="add-count" style="display: none;">
                                                            <i class="fa fa-plus"></i><span class="count">4</span><i class="fa fa-minus"></i>
                                                         </div>
                                                         <div class="amb-add">
                                                            <span>Add</span>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
										 <?php } } ?> 
                                         </div>
                                     </div>
                                 </div>
                              <!--End first section -->
                              <!--second section -->
                                <div class="col-md-offset-1 col-md-3">
                                    <h4>Your Order</h4>
                                    <?php 
									//$_SESSION['cart'] = 'test';
									if(!empty($_SESSION['cart'])){ ?>
										<ul class="order-list">
                                        <li>
                                            <div class="order-blk">
                                                <h5 class="ord-tit">cicken Momos <span>(3nos)</span></h5>
                                                <div class="row">
                                                    <div class="col-xs-8 ord-count">
                                                        <div class="add-count">
                                                             <button class="btn"><i class="fa fa-plus"></i></button>
                                                             <span class="amb-count">4</span>
                                                             <button class="btn"><i class="fa fa-minus"></i></button>
                                                         </div>
                                                         <span class="ord-multi">1 x <i class="fa fa-inr"></i> 250</span>
                                                    </div>
                                                    <div class="col-xs-4 ord-price">
                                                        <h5><i class="fa fa-inr"></i> 250</h5></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
										<li class="gst">
                                            <div class="order-blk">
                                                <div class="row">
                                                    <div class="col-xs-6 text-left">
                                                        <h5>GST</h5>
                                                    </div>
                                                    <div class="col-xs-6 text-right">
                                                        <h5><i class="fa fa-inr"></i> 250</h5></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="sub-total">
                                            <div class="order-blk">
                                                <div class="row">
                                                    <div class="col-xs-6 text-left">
                                                        <h5 class="sub-tot">Sub Total</h5>
                                                        <p class="ord-tax">(Plus Taxes)</p>
                                                    </div>
                                                    <div class="col-xs-6 text-right">
                                                        <h4><i class="fa fa-inr"></i> 250</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
										</ul>
										<button class="btn btn-gulp place-od w100">Place order</button>
									<?php }else{ ?>
									<!-- No order -->									
                                    <div class="text-center no-order">
                                        <img src="<?php echo base_url();?>assets/img/no-order.png" alt="no-order">
                                        <p class="empty-txt">Your cart is empty</p>
                                    </div>
                                    <!-- No order -->
									<?php } ?>
                                </div>
                              <!--End second section -->
                            </div>
                        </div>
                        
                        <div role="tabpanel" class="tab-pane" id="review">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="ft-inner">
                                        <h3>Write a Review</h3>
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="review-box" placeholder="Help other foodies by sharing your review about redbox">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-gulp btn-lg ad-rei">Add your Review</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="review-box">
                                            <div class="row">
                                                <div class="col-sm-2 col-md-1">
                                                    <h3 class="ov-rating"><i class="fa fa-star text-red"></i><?php echo  number_format($restaurant_detail['mt_ratings'],1); ?> </h3>
                                                    <p><?php echo  $restaurant_detail['rating_count']; ?> Ratings</p>
                                                </div>
                                                <div class="col-sm-5 col-md-3">
                                                    <ul class="r-v-blk">
													<?php 
													$per_count = array();
													if(!empty($per_rating_count)){
														foreach($per_rating_count as $per){
															$per_count[round(number_format($per['rating'],0))] = $per['rating_count'];
														}
													} 
													//print_r($per_count);exit;
													?>
                                                        <li>
                                                            <div class="rv-star"><i class="fa fa-star mr-5"></i>5</div>
                                                            <div class="rv-progress">
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-d-red" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rv-value">
                                                                <span><?php echo !empty($per_count[5]) ? $per_count[5] : 0 ?></span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="rv-star">
                                                                <i class="fa fa-star mr-5"></i>4</div>
                                                            <div class="rv-progress">
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-d-red" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rv-value">
                                                                <span><?php echo !empty($per_count[4]) ? $per_count[4] : 0 ?></span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="rv-star">
                                                                <i class="fa fa-star mr-5"></i>3</div>
                                                            <div class="rv-progress">
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width:45%">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rv-value">
                                                                <span><?php echo !empty($per_count[3]) ? $per_count[3] : 0 ?></span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="rv-star">
                                                                <i class="fa fa-star mr-5"></i>2</div>
                                                            <div class="rv-progress">
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rv-value">
                                                                <span><?php echo !empty($per_count[2]) ? $per_count[2] : 0 ?></span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="rv-star">
                                                                <i class="fa fa-star mr-5"></i>1</div>
                                                            <div class="rv-progress">
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-red" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:30%">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rv-value">
                                                                <span><?php echo !empty($per_count[1]) ? $per_count[1] : 0 ?></span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="rv-description">
										<?php 
										if(!empty($restaurant_reviews)){
										foreach($restaurant_reviews as $restaurant_review){ ?>
                                            <div class="row">
                                                <div class="col-md-1">
                                                   <div class="rv-user-img">
                                                       <img src="<?php echo base_url(); ?>assets/img/user.png" alt="review-user-image">
                                                   </div>
                                                </div>
                                                <div class="col-md-11">												
                                                   <div class="rv-des-blk">
                                                       <h5><?php echo ($restaurant_review['name']) ? $restaurant_review['name'] : 'Guest'; ?></h5>
                                                       <div class="rv-d-star">
                                                           <span class="rating-bg bg-d-red text-white"><i class="fa fa-star mr-5"></i><?php echo $restaurant_review['rating']; ?></span>
                                                           <span class="rv-days"><?php echo date("Y-F-d",strtotime($restaurant_review['date_created'])); ?></span>
                                                        </div>
                                                        <p><?php echo $restaurant_review['review']; ?>
                                                        </p>
                                                        <!--<ul class="rv-d-img">
                                                            <li>
                                                                <img src="<?php echo base_url(); ?>assets/img/listing-slider/slider-1.png" alt="rv-d-images">
                                                            </li>
                                                            <li>
                                                                <img src="<?php echo base_url(); ?>assets/img/listing-slider/slider-1.png" alt="rv-d-images">
                                                            </li>
                                                            <li>
                                                                <img src="<?php echo base_url(); ?>assets/img/listing-slider/slider-1.png" alt="rv-d-images">
                                                            </li>
                                                        </ul>-->
                                                   </div>												
                                                </div>
                                            </div>
											<?php } } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="photos"><div class="ft-inner">
                               <h3>Photos of the Restaurant</h3>
                               <div class="row food-photos-blk">
                                   <div class="col-md-7">
                                       <div class="row">
									   <?php if(!empty($restaurant_detail['logo'])){ ?>
                                           <div class="col-sm-3">
                                              <div class="f-p-modal">
                                                <a data-fancybox="images" href="<?php echo ($restaurant_detail['logo'] == '') ?  base_url('assets/img/listing-slider/slider-1.png') : 'http://sanghish.com/restaurant/upload/'.$restaurant_detail['logo'] ?>">
                                                    <img src="<?php echo ($restaurant_detail['logo'] == '') ?  base_url('assets/img/listing-slider/slider-1.png') : 'http://sanghish.com/restaurant/upload/'.$restaurant_detail['logo'] ?>" alt="gallery-image" />
                                                </a>
                                              </div>
                                           </div>
									   <?php } ?>
                                       </div>
                                   </div>
                               </div>
                            </div></div>
                    </div>            
        </div>
    </div>
    <!-- End Extra details section -->    
<?php $this->load->view('footer'); ?>    