
<!-- login modal box-->
<div class="modal fade" id="login" tabindex="-1">
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
                        <button class="btn btn-gulp-bd sign-up">Sign Up</button>
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
<div class="modal fade" id="gulp-sign-up" tabindex="-1">
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
                        <div class="success_info success_info_signup clear_info"></div>
                        <form name="signup_form" method="post" onsubmit="return signup_submit()">
                            <div class="form-group">
                                <input type="text" class="form-control" id="signup_name" name="signup_name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="signup_email" id="signup_email" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="signup_password" id="signup_password" placeholder="Password">
                            </div>
                            <div class="error_info error_info_signup clear_info"></div>
                            <input type="hidden" name="signup" value="1">
                            <button type="submit" class="btn btn-gulp w-100">Sign up</button>
                            <p class="text-center already">Already a member? <span>
                                <a href="#" data-toggle="modal" data-target="#gulp-login" class="text-red t-under">Sign-in</a></span></p>
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
<!-- signIn modal box-->
<div class="modal fade" id="gulp-login" tabindex="-1">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center" id="myModalLabel">Log in to Gulpp</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    
                    <div class="col-xs-12">
                        <form name="login_form" method="post" onsubmit="return login_submit()">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" id="login_email" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="login_password" placeholder="Password">
                            </div>
                            <div class="error_info"></div>
                            <button type="submit" class="btn btn-gulp w-100">Sign In</button>
                            <p class="text-center already">
                            <span>
                                    <a href="#" data-toggle="modal" data-target="#gulp-forgot" class="text-red t-under">Forgot Password</a>
                            </span>
                            </p>
                            <p class="text-center already">Don't have account ?
                                <span>
                                    <a href="#" data-toggle="modal" data-target="#gulp-sign-up" class="text-red t-under">Sign-Up</a>
                                </span>
                            </p>
                        </form>
                    </div>
                    <div class="col-xs-12">
                        <p class="sign-footer">By logging in, you agree to Gulpp's
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

<!-- Forgot password modal box-->
<div class="modal fade" id="gulp-forgot" tabindex="-1">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center" id="myModalLabel">Forgot Password Gulpp</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <form>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" placeholder="Email Address">
                            </div>
                            <button type="submit" class="btn btn-gulp w-100">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End forgot password modal box-->