<?php $this->load->view('header'); 

?>
<!-- Listing Slider -->
    <div id="listing-slider" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="row">
                    <div class="col-md-3">
                        <a class="thumbnail" href="#">
                            <img alt="" src="<?php echo base_url();?>assets/img/listing-slider/slider-1.png" alt="slider-image">
                            <div class="food-desc">
                                <h3>
                                    Upto 50% off
                                </h3>
                                <p>From top Eateries Near You</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a class="thumbnail" href="#">
                            <img alt="" src="<?php echo base_url();?>assets/img/listing-slider/slider-2.png" alt="slider-image">
                            <div class="food-desc">
                                <h3>
                                    wallet friendly <br/> meal option
                                </h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a class="thumbnail" href="#">
                            <img alt="" src="<?php echo base_url();?>assets/img/listing-slider/slider-3.png" alt="slider-image">
                            <div class="food-desc">
                                <h3>
                                    Top Picks
                                </h3>
                                <p>Highest Rated Eateries Near You</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a class="thumbnail" href="#">
                            <img alt="" src="<?php echo base_url();?>assets/img/listing-slider/slider-4.png" alt="slider-image">
                            <div class="food-desc">
                                <h3>
                                    Upto 50% off
                                </h3>
                                <p>From top Eateries Near You</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="row">
                    <div class="col-md-3">
                        <a class="thumbnail" href="#">
                            <img alt="" src="<?php echo base_url();?>assets/img/listing-slider/slider-5.png" alt="slider-image">
                            <div class="food-desc">
                                <h3>
                                    wallet friendly
                                    <br/> meal option
                                </h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a class="thumbnail" href="#">
                            <img alt="" src="<?php echo base_url();?>assets/img/listing-slider/slider-6.png" alt="slider-image">
                            <div class="food-desc">
                                <h3>
                                    Upto 50% off
                                </h3>
                                <p>From top Eateries Near You</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a class="thumbnail" href="#">
                            <img alt="" src="<?php echo base_url();?>assets/img/listing-slider/slider-1.png" alt="slider-image">
                            <div class="food-desc">
                                <h3>
                                    wallet friendly
                                    <br/> meal option
                                </h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a class="thumbnail" href="#">
                            <img alt="" src="<?php echo base_url();?>assets/img/listing-slider/slider-2.png" alt="slider-image">
                            <div class="food-desc">
                                <h3>
                                    Upto 50% off
                                </h3>
                                <p>From top Eateries Near You</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- End Listing Slider -->
<?php 
if(!empty($result)){
	foreach($result as $row){
		//print_r($row);
		echo $row['restaurant_name']."<br />";
	}
}


$this->load->view('footer'); ?>