<?php if(empty($this->session->userdata('user_id'))){ ?>
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
            <a class="navbar-brand" href="<?php echo base_url();?>">
                <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="site-logo">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php if($this->router->fetch_class() == "Restaurants" && $this->router->fetch_method() == "menus" ) ?>
			<div class="search-location">
				<form>
					<div class="col-sm-4 gulp-select-box">
						<div class="form-group">
							<select class="form-control">
								<option>search restaurants</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							</select>
						</div>
					</div>
					<div class="col-sm-5 gulp-search-box">
						<div class="form-group">
							<input type="text" class="form-control" id="search-box" placeholder="Search for restaurants or cusines">
						</div>
					</div>
					<div class="col-sm-3 gulp-search-btn">
						<div class="form-group">
							<button type="submit" class="btn btn-gulp">Search</button>
						</div>
					</div>
				</form>
			</div>
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
<?php }else { ?>
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
            <a class="navbar-brand" href="<?php echo base_url();?>">
                <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="site-logo">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="search-location">
                <form>
                    <div class="col-sm-4 gulp-select-box">
                        <div class="form-group">
                            <select class="form-control">
                                <option>search restaurants</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-5 gulp-search-box">
                        <div class="form-group">
                            <input type="text" class="form-control" id="search-box" placeholder="Search for restaurants or cusines">
                        </div>
                    </div>
                    <div class="col-sm-3 gulp-search-btn">
                        <div class="form-group">
                            <button type="submit" class="btn btn-gulp">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <ul class="nav navbar-nav navbar-right head-account-block">
                <li class="gulp-account">
                    <a href="#"><span><img src="<?php echo $this->session->userdata('profileimage'); ?>" alt="user-image"></span><?php echo $this->session->userdata('name'); ?></a>
                </li>
                <li class="cart-bag">
                    <a href="#">&nbsp;<span class="count">3</span></a>

                </li>
                <li class="gulp-account">
                    <a href="<?php echo base_url(); ?>auth/logout">Logout</a>

                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- End navigation -->
<?php } ?>