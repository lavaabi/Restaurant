<!DOCTYPE html>
<html> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title><?php echo isset($title_text) ? $title_text : '';?></title>
<!-- Main css -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/gulp.css?<?php echo time();?>" type="text/css" />
<!-- bootstrap css -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css?<?php echo time();?>" type="text/css" />
<!--Roboto google font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<!-- Font awesome link -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/sweetalert.css"/>
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
</head>
<body>
<?php $this->load->view('menu'); ?>
<?php $this->load->view('banner'); ?>

