<?php $this->load->view('header'); ?>
    <!-- food-detail-blk -->
    <div class="food-detail-blk">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Library</a></li>
                <li class="active">Data</li>
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
                            <h6 class="fd-ingrediants"><?php echo $restaurant_detail['cuisine']; ?> </h6>
                            <ul>
                                <li class="fd-rating">
                                    <h5>
                                        <i class="fa fa-star"></i> <?php echo number_format($restaurant_detail['mt_ratings'],1); ?></h5>
                                    <p><?php echo $restaurant_detail['rating_count']; ?> Ratings</p>
                                </li>
                                <li class="fd-delivery">
                                    <h5><?php echo ($restaurant_detail['mt_ratings']>0) ? '<i class="inr">&#8377;</i>'.number_format($restaurant_detail['minimum_order'],2) : 'Not Mentioned'; ?></h5>
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
                    <div class="text-center">
                        <h5 class="fd-menu-title">MENU</h5>
                    </div>
                    <ul class="fd-menu-list">
                        <li><a href="#">Soups</a></li>
                        <li><a href="#">Starters</a></li>
                        <li><a href="#">Main Course</a></li>
                        <li><a href="#">My Box combo</a></li>
                        <li><a href="#">Mega Meals</a></li>
                        <li><a href="#">Spicy Rice Box</a></li>
                        <li><a href="#">Deserts</a></li>
                        <li><a href="#">Beverages</a></li>
                    </ul>
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
                            <a href="#menu1" aria-controls="menu1" role="tab" data-toggle="tab">Menu1</a>
                        </li>
                        <li role="presentation">
                            <a href="#review" aria-controls="review" role="tab" data-toggle="tab">Review <span>(530)</span></a>
                        </li>
                        <li role="presentation">
                            <a href="#photos" aria-controls="photos" role="tab" data-toggle="tab">Photos <span>(30)</span></a>
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
                                                    <p>4th Ave, Shanthi colony, Anna Nagar,
                                                        <br/> chennai</p>
                                                </div>
                                                <div class="ft-blocks">
                                                    <h5>Opening hours</h5>
                                                    <p>Today:
                                                        <span>12PM to 11PM</span>
                                                    </p>
                                                    <span class="ft-more">
                                                        <a href="#">More</a>
                                                    </span>
                                                </div>
                                                <div class="ft-blocks">
                                                    <h5>Cusines</h5>
                                                    <p>Continental, Burger, America,
                                                        <br/> Beverages, Fast Food, Salad</p>
                                                </div>
                                                <div class="ft-blocks ft-more-info">
                                                    <h5>More info</h5>
                                                    <ul>
                                                        <li>No Alcohol Available</li>
                                                        <li>Free Wifi</li>
                                                        <li>Wifi</li>
                                                        <li>Outdoor Seating</li>
                                                        <li>Free Parking</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="ft-blocks">
                                                    <h5>Phone number</h5>
                                                    <h3 class="ph">044 - 48587777</h3>
                                                </div>
                                                <div class="ft-blocks">
                                                    <h5>Average cost</h5>
                                                    <p>
                                                        <span class="ft-price">
                                                            <i class="fa fa-inr"></i> 250</span> for two people (approx.)</p>
                                                    <span class="tax">Exclusive of applicable taxes &amp; charges if any</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End First section -->
                                <!-- Second section -->
                                <div class="col-sm-5 col-md-offset-4 col-md-3 top-offers-section">
                                    <h5>TOP OFFERS</h5>
                                    <ul class="top-offers">
                                        <li>
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-4 off-img">
                                                    <img src="<?php echo base_url();?>assets/img/events/events-1.png" alt="offer-image" class="img-responsive">
                                                </div>
                                                <div class="col-xs-9 col-sm-8 off-details">
                                                    <h4>Up to 50% off</h4>
                                                    <p>From top eateries from you</p>
                                                    <span class="off-yellow">
                                                        <a href="#">Explore</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-4 off-img">
                                                    <img src="<?php echo base_url();?>assets/img/events/events-2.png" alt="offer-image" class="img-responsive">
                                                </div>
                                                <div class="col-xs-9 col-sm-8 off-details">
                                                    <h4>Festival 20% off</h4>
                                                    <p>From top eateries from you</p>
                                                    <span class="off-yellow">
                                                        <a href="#">Explore</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="off-img col-xs-3 col-sm-4">
                                                    <img src="<?php echo base_url();?>assets/img/events/events-3.png" alt="offer-image" class="img-responsive">
                                                </div>
                                                <div class="col-xs-9 col-sm-8 off-details">
                                                    <h4>New Starters</h4>
                                                    <p>From top eateries from you</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Second section -->
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="menu">
                            <div class="row">
                              <!--first section -->
                                 <div class="col-md-8">
                                     <div class="ft-inner">
                                        <h3 class="amb-menu-title">Starters</h3>
                                         <div class="row">
                                             <div class="col-sm-4 add-menu-blk">
                                                 <div class="add-menu-img">
                                                     <img src="<?php echo base_url();?>assets/img/listing-slider/slider-1.png" alt="foot-image">
                                                 </div>
                                                 <h5>chicken momo (3 nos)</h5>
                                                 <p class="amb-tag">Breakfast</p>
                                                 <div class="row">
                                                     <div class="col-xs-6 amb-price">
                                                         <span class="amb-wrong"><i class="fa fa-inr"></i> 60</span>
                                                         <span class="amb-right"><i class="fa fa-inr"></i> 45</span>
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
                                             <div class="col-sm-4 add-menu-blk">
                                                 <div class="add-menu-img">
                                                     <img src="<?php echo base_url();?>assets/img/listing-slider/slider-3.png" alt="foot-image">
                                                 </div>
                                                 <h5>chicken momo (3 nos)</h5>
                                                 <p class="amb-tag">Breakfast</p>
                                                 <div class="row">
                                                     <div class="col-xs-6 amb-price">
                                                         <span class="amb-wrong"><i class="fa fa-inr"></i> 60</span>
                                                         <span class="amb-right"><i class="fa fa-inr"></i> 45</span>
                                                     </div>
                                                     <div class="col-xs-6 add-remove-blk">
                                                         <div class="add-count">
                                                             <button class="btn"><i class="fa fa-plus"></i></button>
                                                             <span class="amb-count">4</span>
                                                             <button class="btn"><i class="fa fa-minus"></i></button>
                                                         </div>
                                                        <div class="amb-add" style="display: none;">
                                                            <span>Add</span>
                                                        </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-sm-4 add-menu-blk">
                                                 <div class="add-menu-img">
                                                     <img src="<?php echo base_url();?>assets/img/listing-slider/slider-2.png" alt="foot-image">
                                                 </div>
                                                 <h5>chicken momo (3 nos)</h5>
                                                 <p class="amb-tag">Breakfast</p>
                                                 <div class="row">
                                                     <div class="col-xs-6 amb-price">
                                                         <span class="amb-wrong"><i class="fa fa-inr"></i> 60</span>
                                                         <span class="amb-right"><i class="fa fa-inr"></i> 45</span>
                                                     </div>
                                                     <div class="col-xs-6 add-remove-blk">
                                                         <div class="add-count">
                                                             <button class="btn"><i class="fa fa-plus"></i></button>
                                                             <span class="amb-count">4</span>
                                                             <button class="btn"><i class="fa fa-minus"></i></button>
                                                         </div>
                                                        <div class="amb-add" style="display: none;">
                                                            <span>Add</span>
                                                        </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-sm-4 add-menu-blk">
                                                 <div class="add-menu-img">
                                                     <img src="<?php echo base_url();?>assets/img/listing-slider/slider-4.png" alt="foot-image">
                                                 </div>
                                                 <h5>chicken momo (3 nos)</h5>
                                                 <p class="amb-tag">Breakfast</p>
                                                 <div class="row">
                                                     <div class="col-xs-6 amb-price">
                                                         <span class="amb-wrong"><i class="fa fa-inr"></i> 60</span>
                                                         <span class="amb-right"><i class="fa fa-inr"></i> 45</span>
                                                     </div>
                                                     <div class="col-xs-6 add-remove-blk">
                                                         <div class="add-count">
                                                             <button class="btn"><i class="fa fa-plus"></i></button>
                                                             <span class="amb-count">4</span>
                                                             <button class="btn"><i class="fa fa-minus"></i></button>
                                                         </div>
                                                        <div class="amb-add" style="display: none;">
                                                            <span>Add</span>
                                                        </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-sm-4 add-menu-blk">
                                                 <div class="add-menu-img">
                                                     <img src="<?php echo base_url();?>assets/img/listing-slider/slider-5.png" alt="foot-image">
                                                 </div>
                                                 <h5>chicken momo (3 nos)</h5>
                                                 <p class="amb-tag">Breakfast</p>
                                                 <div class="row">
                                                     <div class="col-xs-6 amb-price">
                                                         <span class="amb-wrong"><i class="fa fa-inr"></i> 60</span>
                                                         <span class="amb-right"><i class="fa fa-inr"></i> 45</span>
                                                     </div>
                                                     <div class="col-xs-6 add-remove-blk">
                                                         <div class="add-count">
                                                             <button class="btn"><i class="fa fa-plus"></i></button>
                                                             <span class="amb-count">4</span>
                                                             <button class="btn"><i class="fa fa-minus"></i></button>
                                                         </div>
                                                        <div class="amb-add" style="display: none;">
                                                            <span>Add</span>
                                                        </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-sm-4 add-menu-blk">
                                                 <div class="add-menu-img">
                                                     <img src="<?php echo base_url();?>assets/img/listing-slider/slider-6.png" alt="foot-image">
                                                 </div>
                                                 <h5>chicken momo (3 nos)</h5>
                                                 <p class="amb-tag">Breakfast</p>
                                                 <div class="row">
                                                     <div class="col-xs-6 amb-price">
                                                         <span class="amb-wrong"><i class="fa fa-inr"></i> 60</span>
                                                         <span class="amb-right"><i class="fa fa-inr"></i> 45</span>
                                                     </div>
                                                     <div class="col-xs-6 add-remove-blk">
                                                         <div class="add-count">
                                                             <button class="btn"><i class="fa fa-plus"></i></button>
                                                             <span class="amb-count">4</span>
                                                             <button class="btn"><i class="fa fa-minus"></i></button>
                                                         </div>
                                                        <div class="amb-add" style="display: none;">
                                                            <span>Add</span>
                                                        </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                              <!--End first section -->
                              <!--second section -->
                                <div class="col-md-offset-1 col-md-3">
                                    <h4>Your Order</h4>
                                    <!-- No order -->
                                    <div class="text-center no-order">
                                        <img src="<?php echo base_url();?>assets/img/no-order.png" alt="no-order">
                                        <p class="empty-txt">Your cart is empty</p>
                                    </div>
                                    <!-- No order -->
                                </div>
                              <!--End second section -->
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="menu1">
                            <div class="row">
                              <!--first section -->
                                 <div class="col-md-8">
                                     <div class="ft-inner">
                                        <h3 class="amb-menu-title">Starters</h3>
                                         <div class="row">
                                             <div class="col-sm-4 add-menu-blk">
                                                 <div class="add-menu-img">
                                                     <img src="<?php echo base_url();?>assets/img/listing-slider/slider-1.png" alt="foot-image">
                                                 </div>
                                                 <h5>chicken momo (3 nos)</h5>
                                                 <p class="amb-tag">Breakfast</p>
                                                 <div class="row">
                                                     <div class="col-xs-6 amb-price">
                                                         <span class="amb-wrong"><i class="fa fa-inr"></i> 60</span>
                                                         <span class="amb-right"><i class="fa fa-inr"></i> 45</span>
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
                                             <div class="col-sm-4 add-menu-blk">
                                                 <div class="add-menu-img">
                                                     <img src="<?php echo base_url();?>assets/img/listing-slider/slider-3.png" alt="foot-image">
                                                 </div>
                                                 <h5>chicken momo (3 nos)</h5>
                                                 <p class="amb-tag">Breakfast</p>
                                                 <div class="row">
                                                     <div class="col-xs-6 amb-price">
                                                         <span class="amb-wrong"><i class="fa fa-inr"></i> 60</span>
                                                         <span class="amb-right"><i class="fa fa-inr"></i> 45</span>
                                                     </div>
                                                     <div class="col-xs-6 add-remove-blk">
                                                         <div class="add-count">
                                                             <button class="btn"><i class="fa fa-plus"></i></button>
                                                             <span class="amb-count">4</span>
                                                             <button class="btn"><i class="fa fa-minus"></i></button>
                                                         </div>
                                                        <div class="amb-add" style="display: none;">
                                                            <span>Add</span>
                                                        </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-sm-4 add-menu-blk">
                                                 <div class="add-menu-img">
                                                     <img src="<?php echo base_url();?>assets/img/listing-slider/slider-2.png" alt="foot-image">
                                                 </div>
                                                 <h5>chicken momo (3 nos)</h5>
                                                 <p class="amb-tag">Breakfast</p>
                                                 <div class="row">
                                                     <div class="col-xs-6 amb-price">
                                                         <span class="amb-wrong"><i class="fa fa-inr"></i> 60</span>
                                                         <span class="amb-right"><i class="fa fa-inr"></i> 45</span>
                                                     </div>
                                                     <div class="col-xs-6 add-remove-blk">
                                                         <div class="add-count">
                                                             <button class="btn"><i class="fa fa-plus"></i></button>
                                                             <span class="amb-count">4</span>
                                                             <button class="btn"><i class="fa fa-minus"></i></button>
                                                         </div>
                                                        <div class="amb-add" style="display: none;">
                                                            <span>Add</span>
                                                        </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-sm-4 add-menu-blk">
                                                 <div class="add-menu-img">
                                                     <img src="<?php echo base_url();?>assets/img/listing-slider/slider-4.png" alt="foot-image">
                                                 </div>
                                                 <h5>chicken momo (3 nos)</h5>
                                                 <p class="amb-tag">Breakfast</p>
                                                 <div class="row">
                                                     <div class="col-xs-6 amb-price">
                                                         <span class="amb-wrong"><i class="fa fa-inr"></i> 60</span>
                                                         <span class="amb-right"><i class="fa fa-inr"></i> 45</span>
                                                     </div>
                                                     <div class="col-xs-6 add-remove-blk">
                                                         <div class="add-count">
                                                             <button class="btn"><i class="fa fa-plus"></i></button>
                                                             <span class="amb-count">4</span>
                                                             <button class="btn"><i class="fa fa-minus"></i></button>
                                                         </div>
                                                        <div class="amb-add" style="display: none;">
                                                            <span>Add</span>
                                                        </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-sm-4 add-menu-blk">
                                                 <div class="add-menu-img">
                                                     <img src="<?php echo base_url();?>assets/img/listing-slider/slider-5.png" alt="foot-image">
                                                 </div>
                                                 <h5>chicken momo (3 nos)</h5>
                                                 <p class="amb-tag">Breakfast</p>
                                                 <div class="row">
                                                     <div class="col-xs-6 amb-price">
                                                         <span class="amb-wrong"><i class="fa fa-inr"></i> 60</span>
                                                         <span class="amb-right"><i class="fa fa-inr"></i> 45</span>
                                                     </div>
                                                     <div class="col-xs-6 add-remove-blk">
                                                         <div class="add-count">
                                                             <button class="btn"><i class="fa fa-plus"></i></button>
                                                             <span class="amb-count">4</span>
                                                             <button class="btn"><i class="fa fa-minus"></i></button>
                                                         </div>
                                                        <div class="amb-add" style="display: none;">
                                                            <span>Add</span>
                                                        </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-sm-4 add-menu-blk">
                                                 <div class="add-menu-img">
                                                     <img src="<?php echo base_url();?>assets/img/listing-slider/slider-6.png" alt="foot-image">
                                                 </div>
                                                 <h5>chicken momo (3 nos)</h5>
                                                 <p class="amb-tag">Breakfast</p>
                                                 <div class="row">
                                                     <div class="col-xs-6 amb-price">
                                                         <span class="amb-wrong"><i class="fa fa-inr"></i> 60</span>
                                                         <span class="amb-right"><i class="fa fa-inr"></i> 45</span>
                                                     </div>
                                                     <div class="col-xs-6 add-remove-blk">
                                                         <div class="add-count">
                                                             <button class="btn"><i class="fa fa-plus"></i></button>
                                                             <span class="amb-count">4</span>
                                                             <button class="btn"><i class="fa fa-minus"></i></button>
                                                         </div>
                                                        <div class="amb-add" style="display: none;">
                                                            <span>Add</span>
                                                        </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                              <!--End first section -->
                              <!--second section -->
                                <div class="col-md-offset-1 col-md-3">
                                    <h4>Your Order</h4>
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
                                </div>
                              <!--End second section -->
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="review">review</div>
                        <div role="tabpanel" class="tab-pane" id="photos">photos</div>
                    </div>
                
                
            
        </div>
    </div>
    <!-- End Extra details section -->    
<?php $this->load->view('footer'); ?>    