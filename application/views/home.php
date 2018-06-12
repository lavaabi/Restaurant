<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gulp | Index</title>
    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/gulp.css" type="text/css" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/bootstrap.css" type="text/css" />
    <!--Roboto google font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
</head>
<body>
<?php
if(!empty($this->session->flashdata('success_message'))){
	//print_r($_SESSION['user_details']);
	?>
	<script>
	alert('<?php echo $this->session->flashdata('success_message'); ?>');
</script><?php	
}
?>
    <!-- navigation -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                    aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="<?php echo BASE_URL; ?>/img/logo.png" alt="site-logo">
                </a>
            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right sign-block">
                    <li class="gulp-login">
                        <a href="#" data-toggle="modal" data-target="#gulp-login">Login</a>
                    </li>
                    <li class="gulp-create-acc">
                        <a href="#" data-toggle="modal" data-target="#gulp-sign-up">Create an Account</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- End navigation -->
    <!-- Banner section -->
    <div class="banner-section">
        <img src="<?php echo BASE_URL; ?>/img/home-banner.jpg" alt="home-banner" class="img-responsive">
    </div>
    <!-- End Banner section -->
    
    <!-- login modal box-->
    <div class="modal fade" id="gulp-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center" id="myModalLabel"> Sign up or Log in to Gulpp</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 facebook">
                             <button class="btn btn-fb"><i class="fa fa-facebook"></i> Sign in with Facebook</button>
                        </div>
                        <div class="or col-xs-12 text-center">
                             <p>OR</p>
                        </div>
                        <div class="col-xs-12 text-center">
                            <p>Or use your email address</p>
                        </div>
                        <div class="col-xs-12 sign-blk">
                            <button class="btn btn-gulp-bd sign-in">Sign In</button>
                            <button class="btn btn-gulp-bd sign-up" data-toggle="modal" data-target="#gulp-sign-up">Sign Up</button>
                        </div>
                        <div class="col-xs-12">
                            <p class="sign-footer">By logging in, you agree to Gulpp's <span><a href="#">terms of services</a></span>, Cookie policy, <span></a>
                            <a href="#">privacy policy</a></span> and <span><a href="#">Content policies.</a></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End login modal box-->
    <!-- signup modal box-->
    <div class="modal fade" id="gulp-sign-up" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center" id="myModalLabel"> Sign up or Log in to Gulpp</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <form action="<?php echo BASE_URL; ?>" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                </div>
                                <button type="submit" name="signup" class="btn btn-gulp w-100">Sign up</button>
                                <p class="text-center already">Already a member? <span><a href="#" data-toggle="modal" data-target="#gulp-login" class="text-red t-under">Sign-in</a></span></p>
                            </form>
                        </div>
                        <div class="col-xs-12">
                            <p class="sign-footer">By Signing up, you agree to Gulpp's
                                <span>
                                    <a href="#">terms of services</a>
                                </span>, Cookie policy,
                                <span>
                                    </a>
                                    <a href="#">privacy policy</a>
                                </span> and
                                <span>
                                    <a href="#">Content policies.</a>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End signup modal box-->
    <!-- Js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
    <!-- bootstrap js -->
    <script src="<?php echo BASE_URL; ?>/js/bootstrap.js" type="text/javascript"></script>
</body>

<script>

$(document).ready(function(){
	$('.t-under').click(function () {
		$( "#gulp-sign-up" ).find(".close").trigger( "click" );
	});
	$('.sign-up').click(function () {
		$( "#gulp-login" ).find(".close").trigger( "click" );
	});
});	
</script>	
</html>