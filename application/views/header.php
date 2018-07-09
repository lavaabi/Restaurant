<!DOCTYPE html>
<html> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Gulp | Restaurants</title>
	<!-- Main css -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/gulp.css?<?php echo time();?>" type="text/css" />
	<!-- bootstrap css -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css?<?php echo time();?>" type="text/css" />
	<!--Roboto google font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<!-- Font awesome link -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/sweetalert.css"/>
	<!-- Fancy Box -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.fancybox.css" type="text/css" />
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript">var fb_app_id = "<?php echo $this->config->item('facebook_app_id'); ?>";</script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js?<?php echo time();?>" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/app.js?<?php echo time();?>"></script>
</head>
<body>
<?php $this->load->view('menu'); check_valid_user_session(); ?>