<?php $header_check = $this->router->fetch_class();?>
<!-- End signup modal box-->
</body>
<!-- Js -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css?<?php echo time();?>"/>
<script type="text/javascript">var baseurl = "<?php echo base_url(); ?>";</script>
<script type="text/javascript">var logintype = "<?php echo ($this->session->userdata('oauth_id')!='')?"fblogin":"normallogin" ?>";</script>
<script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>
<script type="text/javascript">var fb_app_id = "<?php echo $this->config->item('facebook_app_id'); ?>";</script>
<!-- bootstrap js -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js?<?php echo time();?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/app.js?<?php echo time();?>"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$('.t-under').click(function () {
		$( "#gulp-sign-up" ).find(".close").trigger( "click" );
	});
	$('.sign-up').click(function () {
		$( "#gulp-login" ).find(".close").trigger( "click" );
	});
});	
   
$(document).ready(function () {
	$('.carousel-control.left').click(function () {
		$('#listing-slider').carousel('prev');
	});

	$('.carousel-control.right').click(function () {
		$('#listing-slider').carousel('next');
	});
});
</script>
</html>