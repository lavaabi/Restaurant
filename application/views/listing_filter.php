<!-- Filter & listing Block -->
<div class="filter-section">
   <h4 class="fs-title">Filters<span class="clear pull-right"><a href="#" class="text-red">CLEAR ALL</a></span></h4>
   <ul class="sorting-list">
       <li><span class="sorting">Adyar</span></li>
       <li><span class="sorting">Delivery</span></li>
       <li><span class="sorting">North India</span></li>
       <li><span class="sorting">Wifi</span></li>
       <li><span class="sorting">Besent nagar</span></li>
   </ul>
   <!-- sort-by-->
   <h5 class="fs-title text-gray">SORT BY</h5>
   <ul class="sort-by">
       <li><a href="#" class="sort-active">Popularity - low to high</a></li>
       <li><a href="#">Rating - high to low</a></li>
       <li><a href="#">Recently added - new to old</a></li>
   </ul>
   <!-- End sort-by-->
   <!-- Range -->
   <h5 class="fs-title text-gray">PRICE<span class="clear pull-right"><a href="#" class="text-red">CLEAR ALL</a></span></h5>
    <form class="range-form">
        <div class="form-group col-sm-4">
            <select class="form-control min-max">
                    <option>Min</option>
                    <option>Max</option>
                    <option>Min</option>
            </select>
        </div>
        <div class="col-sm-1 to">
            <p>to</p>
        </div>
        <div class="form-group col-sm-5">
            <select class="form-control s-value">
                <option><i class="inr">&#8377;</i>50000</option>
                <option><i class="inr">&#8377;</i>40000</option>
                <option><i class="inr">&#8377;</i>0000</option>
            </select>
        </div>
   </form>
   <h5 class="fs-title text-gray clearfix">COST FOR TWO</h5>
   <ul class="cf-two">
       <li><a href="#">Less than <i class="inr">&#8377;</i> 250 <span class="pull-right">300</span></a></li>
       <li><a href="#"><i class="inr">&#8377;</i> 200 to <i class="inr">&#8377;</i> 500 <span class="pull-right">340</span></a></li>
       <li><a href="#"><i class="inr">&#8377;</i> 500 to <i class="inr">&#8377;</i> 1000 <span class="pull-right">180</span></a></li>
       <li><a href="#"><i class="inr">&#8377;</i> 1000 to <i class="inr">&#8377;</i> 2000 <span class="pull-right">167</span></a></li>
       <li><a href="#"><i class="inr">&#8377;</i> 2000+ <span class="pull-right">16</span></a></li>
   </ul>
   <!-- End Range -->
   <!-- category -->
   <h5 class="fs-title text-gray">CATEGORY</h5>
   <ul class="category-list">   
       <li><a href="#" class="sort-active">Delivery <span class="pull-right">300</span></a></li>
       <li><a href="#">Dine out <span class="pull-right">340</span></a></li>
       <li><a href="#">Drinks &nbsp; Nightlife <span class="pull-right">180</span></a></li>
       <li><a href="#">Cafes <span class="pull-right">167</span></a></li>
       <li><a href="#">Sweet stalls <span class="pull-right">16</span></a></li>
   </ul>
   <!-- End category -->
   <!-- category -->
   <h5 class="fs-title text-gray">CUISINE </h5>
   <ul class="category-list">
   <?php 
   if(!empty($cuisine)){
		foreach($cuisine as $row){ ?>
			<li><a href="#" class="sort-active"><?php echo $row['cuisine_name']; ?> <span class="pull-right">300</span></a></li>
		<?php }
   }
   ?>
       <!--<li><a href="#" class="sort-active">North India <span class="pull-right">300</span></a></li>
       <li><a href="#">Chinese <span class="pull-right">340</span></a></li>
       <li><a href="#">South India <span class="pull-right">180</span></a></li>
       <li><a href="#">Fast food <span class="pull-right">167</span></a></li>
       <li><a href="#">Pizza <span class="pull-right">16</span></a></li> -->
       <li><a href="#" class="all-cus">see all cuisines</a></li>
   </ul>
   <!-- End category -->
   <!-- Restaurants -->
   <h5 class="fs-title text-gray">RESTAURANT OFFERS </h5>
   <ul class="ck-list">
       <li>
        <a href="#">
            <label class="label-container">HDFC Bank
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
            </label>
        </a>
       </li>
        <li>
            <a href="#">
                <label class="label-container">ICICI Bank
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </a>
        </li>
        <li>
            <a href="#">
                <label class="label-container">Promotions
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </a>
        </li>
        <li>
            <a href="#">
                <label class="label-container">Sodakso pass
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </a>
        </li>
   </ul>
   <!-- End Restaurants -->
<!-- More Filters -->
<h5 class="fs-title text-gray">MORE FILTERS </h5>
<ul class="more-filters-list">
    <li>
        <a href="#">
            <label class="label-container">Alcohol served
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
            </label>
        </a>
    </li>
    <li>
        <a href="#">
            <label class="label-container">Pure veg
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
        </a>
    </li>
    <li>
        <a href="#">
            <label class="label-container">Buffet
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
        </a>
    </li>
    <li>
        <a href="#">
            <label class="label-container">Wifi
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
        </a>
    </li>
</ul>
<!-- End More Filters -->
</div>
<div class="listing-section">
    <h4>Most popular <span class="pull-right g-view">categories</span></h4>
    <ul class="food-listing">
	<li>
            <div class="food-blk">
                <div class="fl-img">
                    <img src="<?php echo base_url() ?>assets/img/listing-slider/slider-1.png" alt="Food-image" class="img-responsive" />
                </div>
                <h4 class="food-title">Zaitoon
                    <span class="pull-right rating">4.5</span>
                </h4>
                <p class="fl-tags">North India, Pure Veg</p>
                <div class="fl-price-blk">
                    <h5>
                        <i class="inr">&#8377;</i>
                        <b>250</b> for two
                        <span class="pull-right fl-delivery">40 min</span>
                    </h5>
                </div>
            </div>
        </li>
	<?php
	if(!empty($result)){
		foreach($result as $row){ ?>
			<li>
          <div class="food-blk">
              <div class="fl-img">
                  <img src="<?php echo ($row['logo'] == '') ?  base_url('assets/img/listing-slider/slider-1.png') : 'http://sanghish.com/restaurant/upload/'.$row['logo'] ?>" alt="Food-image" class="img-responsive"/>
              </div>
              <h4 class="food-title"><?php echo $row['restaurant_name']; 
			  if($row['mt_ratings']>0){
			  ?> 
			  <span class="pull-right rating"><?php echo number_format($row['mt_ratings'],1); ?></span>
			  <?php } ?>
			  </h4>
              <p class="fl-tags"><?php echo $row['city'] ?></p>
              <div class="fl-price-blk">
                <h5><b>Minimum Order : </b><?php echo ($row['mt_ratings']>0) ? '<i class="inr">&#8377;</i>'.number_format($row['minimum_order'],2) : 'Not Mentioned'; ?><!--<span class="pull-right fl-delivery">40 min</span>--></h5>
              </div>
          </div>
        </li>
		<?php }
	}
	?> 
    </ul>
</div>
<!-- End Filter & Listing Block-->