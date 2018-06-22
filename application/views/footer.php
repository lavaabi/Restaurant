<!-- footer section-->
<div class="footer-section">
    <div class="container-fluid">
        <div class="row">
           <div class="col-sm-3 ft-logo-section">
               <img src="<?php echo base_url();?>assets/img/footer/footer-logo.png" alt="footer-logo" class="img-responsive"/>
               <ul class="addr">
                <li class="map">
                    <p>102580 santa Monica BLVD Los Angeles  </p>
                </li>
                <li class="tel">
                    <a href="tel:+1-877-967-5362">+1-877-967-5362</a>
                </li>
                <li class="mail">
                    <a href="mailto:info@cmsmart.net">info@cmsmart.net</a>
                </li>
               </ul>
           </div>
           <div class="col-sm-2">
                <h5 class="ft-tit">About gulpp</h5>
                <ul class="ft-list">
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
           </div>
           <div class="col-sm-2">
                <h5 class="ft-tit">How it works</h5>
                <ul class="ft-list">
                    <li><a href="#">Enter your location</a></li>
                    <li><a href="#">Choose restaurant</a></li>
                    <li><a href="#">Choose meal</a></li>
                    <li><a href="#">Pay via credit card</a></li>
                    <li><a href="#">Wait for delivery</a></li>
                </ul>
           </div>
           <div class="col-sm-3">
                <h5 class="ft-tit">Cities Covered</h5>
                <ul class="ft-list">
                    <div class="row">
                        <div class="col-xs-6">
                            <li><a href="#">Ahmedabad</a></li>
                            <li><a href="#">Bangalore</a></li>
                            <li><a href="#">Chandigarh</a></li>
                            <li><a href="#">Chennai</a></li>
                            <li><a href="#">Coimbatore</a></li>
                            <li><a href="#">Dellhi</a></li>
                        </div>
                        <div class="col-xs-6">
                            <li><a href="#">Gurgaon</a></li>
                            <li><a href="#">Hyderabad</a></li>
                            <li><a href="#">Jaipur</a></li>
                            <li><a href="#">Kochi</a></li>
                            <li><a href="#">Kolkatta</a></li>
                            <li><a href="#">Mumbai</a></li>
                        </div>
                    </div>
                </ul>
           </div>
           <div class="col-sm-2">
                <h5 class="ft-tit">Legal</h5>
                <ul class="ft-list">
                    <li><a href="#">Tearms & conditions</a></li>
                    <li><a href="#">Refund & cancellation</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Offer Terms</a></li>
                </ul>
           </div>
        </div>
        <div class="copy-section">
            <div class="row">
                <div class="col-sm-6">
                    <p>&copy; 2018 GULPP. All Rights Reserved</p>
                </div>
                <div class="col-sm-6">
                    <ul class="ft-social">
                        <li class="fb"><a href="#"><img src="<?php echo base_url();?>assets/img/footer/fb.png" alt="facebook" /></a></li>
                        <li class="tw"><a href="#"><img src="<?php echo base_url();?>assets/img/footer/tw.png" alt="Twitter" /></a></li>
                        <li class="in"><a href="#"><img src="<?php echo base_url();?>assets/img/footer/in.png" alt="Insta" /></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End footer section-->
<?php $header_check = $this->router->fetch_class();?>
<!-- End signup modal box-->
</body>
<div class="overlay"></div>
<?php $this->load->view('modal'); ?>
<!-- Js -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css?<?php echo time();?>"/>
<script type="text/javascript">var baseurl = "<?php echo base_url(); ?>";</script>
<script type="text/javascript">var logintype = "<?php echo ($this->session->userdata('oauth_id')!='')?"fblogin":"normallogin" ?>";</script>
<script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>
<script src="<?php echo base_url();?>assets/js/footer.js"></script>
<script>
function locate_me(){
	var myloc = $("#my_location").val();
	$("#search-food").val(myloc);
}
</script>
</html>