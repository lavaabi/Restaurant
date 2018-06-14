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
                    <div class="fbbtn col-xs-12 facebook">
                        <!--<a href="javascript:void(0);"  id="fbLink" class="waves-effect waves-light"><i class="icon_facebook iconFB"></i>Sign In With Facebook<i class="iconLoad circle-loader"><span class="checkmark draw"></span></i></a>-->
                        <button class="btn btn-fb" id="fbLink"><i class="fa fa-facebook"></i> Sign in with Facebook</button>
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
<?php $this->load->view('footer'); ?>