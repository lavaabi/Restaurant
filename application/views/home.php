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
                                    <div class="col-md-4 bs-container">
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
                                    <div class="col-md-4 bs-container">
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
                                    <div class="col-md-4 bs-container">
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
                                    <div class="col-md-4 bs-container">
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
                                    <div class="col-md-4 bs-container">
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
                                    <div class="col-md-4 bs-container">
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
                                    <div class="col-md-4 bs-container">
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
                                    <div class="col-md-4 bs-container">
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
                                    <div class="col-md-4 bs-container">
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
<?php $this->load->view('footer'); ?>