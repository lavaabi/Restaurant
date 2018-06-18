<?php $this->load->view('header'); ?>
<?php
if(!empty($this->session->flashdata('success_message'))){
	//print_r($_SESSION['user_details']);
	?>
	<script>
	alert('<?php echo $this->session->flashdata('success_message'); ?>');
</script><?php	
}
?>
<?php $this->load->view('banner'); ?>
<!-- how to order-->
<div class="how-to-order text-center">
    <div class="container">
        <h2>How To Order?</h2>
        <p>Follow the steps</p>
        <div class="steps">
            <div class="row">
                <div class="col-sm-3 o-step-blk">
                    <img src="<?php echo base_url();?>assets/img/how/location.png" alt="order-step-1">
                    <h4>Choose your <br/> location</h4>
                </div>
                <div class="col-sm-3 o-step-blk">
                    <img src="<?php echo base_url();?>assets/img/how/restuarant.png" alt="order-step-2">
                    <h4>Choose
                        <br/> restaurant</h4>
                </div>
                <div class="col-sm-3 o-step-blk">
                    <img src="<?php echo base_url();?>assets/img/how/order.png" alt="order-step-3">
                    <h4>Make your
                        <br/> Order</h4>
                </div>
                <div class="col-sm-3 o-step-blk">
                    <img src="<?php echo base_url();?>assets/img/how/food.png" alt="order-step-4">
                    <h4>Food is on
                        <br/> the way</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End how to order -->
<!-- testimonial -->
<div class="gulp-testimonial">
    <div class="container">
        <h2 class="text-center">Our Client Says</h2>
            <div id="carousel">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="quote">
                            <i class="fa fa-quote-left fa-4x"></i>
                        </div>
                        <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="4000">
                            <!-- Carousel indicators
                            <ol class="carousel-indicators">
                                <li data-target="#fade-quote-carousel" data-slide-to="0"></li>
                                <li data-target="#fade-quote-carousel" data-slide-to="1"></li>
                                <li data-target="#fade-quote-carousel" data-slide-to="2" class="active"></li>
                                <li data-target="#fade-quote-carousel" data-slide-to="3"></li>
                                <li data-target="#fade-quote-carousel" data-slide-to="4"></li>
                                <li data-target="#fade-quote-carousel" data-slide-to="5"></li>
                            </ol> -->
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="item">
                                    <blockquote>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium
                                            totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi.
                                            Impedit temporibus nisi accusamus.</p>
                                    </blockquote>
                                    <div class="profile-circle">
                                        <img src="<?php echo base_url();?>assets/img/user.png" alt="testimonial-image">
                                    </div>
                                    <h5 class="profile-name">John Peter</h5>
                                    <p class="profile-desc">Visitor</p>
                                </div>
                                <div class="item">
                                    <blockquote>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio
                                            doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                                    </blockquote>
                                    <div class="profile-circle">
                                        <img src="<?php echo base_url();?>assets/img/user.png" alt="testimonial-image">
                                    </div>
                                    <h5 class="profile-name">John Peter</h5>
                                    <p class="profile-desc">Visitor</p>
                                </div>
                                <div class="active item">
                                    <blockquote>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio
                                            doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                                    </blockquote>
                                    <div class="profile-circle">
                                        <img src="<?php echo base_url();?>assets/img/user.png" alt="testimonial-image">
                                    </div>
                                    <h5 class="profile-name">John Peter</h5>
                                    <p class="profile-desc">Visitor</p>
                                </div>
                                <div class="item">
                                    <blockquote>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio
                                            doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                                    </blockquote>
                                    <div class="profile-circle">
                                        <img src="<?php echo base_url();?>assets/img/user.png" alt="testimonial-image">
                                    </div>
                                    <h5 class="profile-name">John Peter</h5>
                                    <p class="profile-desc">Visitor</p>
                                </div>
                                <div class="item">
                                    <blockquote>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio
                                            doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                                    </blockquote>
                                    <div class="profile-circle">
                                        <img src="<?php echo base_url();?>assets/img/user.png" alt="testimonial-image">
                                    </div>
                                    <h5 class="profile-name">John Peter</h5>
                                    <p class="profile-desc">Visitor</p>
                                </div>
                                <div class="item">
                                    <blockquote>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio
                                            doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                                    </blockquote>
                                    <div class="profile-circle">
                                        <img src="<?php echo base_url();?>assets/img/user.png" alt="testimonial-image">
                                    </div>
                                    <h5 class="profile-name">John Peter</h5>
                                    <p class="profile-desc">Visitor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- End Testimonial-->
<!-- featured restaurant-->
<div class="feature-rest">
    <div class="container-fluid">
        <h2 class="text-center">Featured Restaurant</h2>
        <p class="text-center">Get Latest News from our Blog</p>
        <div class="row">
            <div class='col-md-12'>
                <div class="carousel slide media-carousel" id="media">
                    <div class="carousel-inner">
                        <div class="item  active">
                            <div class="row">
                                <div class="col-sm-4 bs-container">
                                    <div class="bs-img">
                                        <img alt="blog-slider-img" src="<?php echo base_url();?>assets/img/listing-slider/slider-1.png">
                                    </div>
                                    <div class="bs-desc-blk">
                                        <h4>Blog Title</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It
                                        has survived not only five centuries,</p>
                                        <a href="#" class="bs-rd-more">Read more..</a>
                                    </div>
                                </div>
                                <div class="col-sm-4 bs-container">
                                    <div class="bs-img">
                                        <img alt="blog-slider-img" src="<?php echo base_url();?>assets/img/listing-slider/slider-2.png">
                                    </div>
                                    <div class="bs-desc-blk">
                                        <h4>Blog Title</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It
                                        has survived not only five centuries,</p>
                                        <a href="#" class="bs-rd-more">Read more..</a>
                                    </div>
                                </div>
                                <div class="col-sm-4 bs-container">
                                    <div class="bs-img">
                                        <img alt="blog-slider-img" src="<?php echo base_url();?>assets/img/listing-slider/slider-3.png">
                                    </div>
                                    <div class="bs-desc-blk">
                                        <h4>Blog Title</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It
                                        has survived not only five centuries,</p>
                                        <a href="#" class="bs-rd-more">Read more..</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-4 bs-container">
                                    <div class="bs-img">
                                        <img alt="blog-slider-img" src="<?php echo base_url();?>assets/img/listing-slider/slider-4.png">
                                    </div>
                                    <div class="bs-desc-blk">
                                        <h4>Blog Title</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It
                                        has survived not only five centuries,</p>
                                        <a href="#" class="bs-rd-more">Read more..</a>
                                    </div>
                                </div>
                                <div class="col-sm-4 bs-container">
                                    <div class="bs-img">
                                        <img alt="blog-slider-img" src="<?php echo base_url();?>assets/img/listing-slider/slider-5.png">
                                    </div>
                                    <div class="bs-desc-blk">
                                        <h4>Blog Title</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It
                                        has survived not only five centuries,</p>
                                        <a href="#" class="bs-rd-more">Read more..</a>
                                    </div>
                                </div>
                                <div class="col-sm-4 bs-container">
                                    <div class="bs-img">
                                        <img alt="blog-slider-img" src="<?php echo base_url();?>assets/img/listing-slider/slider-6.png">
                                    </div>
                                    <div class="bs-desc-blk">
                                        <h4>Blog Title</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It
                                        has survived not only five centuries,</p>
                                        <a href="#" class="bs-rd-more">Read more..</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-4 bs-container">
                                    <div class="bs-img">
                                        <img alt="blog-slider-img" src="<?php echo base_url();?>assets/img/listing-slider/slider-1.png">
                                    </div>
                                    <div class="bs-desc-blk">
                                        <h4>Blog Title</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It
                                        has survived not only five centuries,</p>
                                        <a href="#" class="bs-rd-more">Read more..</a>
                                    </div>
                                </div>
                                <div class="col-sm-4 bs-container">
                                    <div class="bs-img">
                                        <img alt="blog-slider-img" src="<?php echo base_url();?>assets/img/listing-slider/slider-2.png">
                                    </div>
                                    <div class="bs-desc-blk">
                                        <h4>Blog Title</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It
                                        has survived not only five centuries,</p>
                                        <a href="#" class="bs-rd-more">Read more..</a>
                                    </div>
                                </div>
                                <div class="col-sm-4 bs-container">
                                    <div class="bs-img">
                                        <img alt="blog-slider-img" src="<?php echo base_url();?>assets/img/listing-slider/slider-3.png">
                                    </div>
                                    <div class="bs-desc-blk">
                                        <h4>Blog Title</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It
                                        has survived not only five centuries,</p>
                                        <a href="#" class="bs-rd-more">Read more..</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a data-slide="prev" href="#media" class="left carousel-control">&nbsp;</a>
                    <a data-slide="next" href="#media" class="right carousel-control">&nbsp;</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End featured restaurant-->
<!-- Counter -->
<div class="container">
    <div id="counter">
        <div class="col-sm-3 text-center">
            <div class="counter-value" data-count="754">
                <h2>18</h2>
            </div>
            <div class="count-title">
                <h4>Restaurants</h4>
            </div>
        </div>
        <div class="col-sm-3 text-center">
            <div class="counter-value" data-count="2934">
                <h2>1000</h2>
            </div>
            <div class="count-title">
                <h4>Food Lovers</h4>
            </div>
        </div>
        <div class="col-sm-3 text-center">
            <div class="counter-value" data-count="98">
                <h2>50</h2>
            </div>
            <div class="count-title">
                <h4>Daily orders</h4>
            </div>
        </div>
        <div class="col-sm-3 text-center">
            <div class="counter-value" data-count="128">
            <h2> 100 </h2>
            </div>
            <div class="count-title">
                <h4>Daily Delivery</h4>
            </div>
        </div>
    </div>
</div>
<!-- end Counter -->
<!-- upcoming Events -->
<div class="container up-events">
    <div class="row">
        <div class="col-sm-6">
            <h2>Upcoming Events</h2>
            <ul class="up-event-list">
                <li>
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <img src="<?php echo base_url();?>assets/img/events/events-1.png" alt="event-images" class="img-responsive">
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <h4 class="up-date">01 Jun '18</h4>
                            <p class="up-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio
                                doloremque..
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <img src="<?php echo base_url();?>assets/img/events/events-2.png" alt="event-images" class="img-responsive">
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <h4 class="up-date">01 Aug '18</h4>
                            <p class="up-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore
                                optio doloremque..
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <img src="<?php echo base_url();?>assets/img/events/events-3.png" alt="event-images" class="img-responsive">
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <h4 class="up-date">01 Sep '18</h4>
                            <p class="up-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore
                                optio doloremque..
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
            
        </div>

        <div class="col-sm-6 newsletters">
            <h2>Our Newsletter</h2>
            <h5>Type your email address in form below to be updated we promise not a spam.</h5>
            <form class="news-form">
                <div class="form-group newsletter-input">
                    <input type="email" id="newsletter" class="form-control" placeholder="Email Address" />
                </div>
            </form>
            <h5 class="q-news">How often you want to get the newsletter?</h5>
            <ul class="md-check-blk">
                <li>
                    <input type="radio" id="f-daily" name="selector">
                    <label for="f-daily">Daily</label>
                    <div class="check"></div>
                </li>
                <li>
                    <input type="radio" id="f-weekly" name="selector">
                    <label for="f-weekly">Weekly</label>
                    <div class="check"></div>
                </li>
                <li>
                    <input type="radio" id="f-monthly" name="selector">
                    <label for="f-monthly">Monthly</label>
                    <div class="check"></div>
                </li>
            </ul>
            <button class="btn btn-gulp">Subscribe</button>
        </div>
    </div>
</div>
<!-- end upcoming Events -->
<!-- App section -->
<div class="app-section">
    <div class="container-fluid">
        <h1 class="app-sec-tit">Get your Favorite Food <br/> Fast with the App</h1>
        <ul>
            <li>
                <a href="#" class="play-s">
                    <img src="<?php echo base_url();?>assets/img/Playstore.png" alt="Playstore" />
                </a>
            </li>
            <li>
                <a href="#" class="app-s">
                    <img src="<?php echo base_url();?>assets/img/appstore.png" alt="appstore" />
                </a>
            </li>
        </ul>
    </div>
</div>
<!--End App section -->
<?php if(empty($this->session->userdata('user_id'))){ ?>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/home.js?<?php echo time();?>"></script>
<?php } ?>
    <!-- End featured restaurant-->
<?php $this->load->view('footer'); ?>