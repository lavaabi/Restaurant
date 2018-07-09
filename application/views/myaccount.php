<?php $this->load->view('header') ?>
<!-- My profile -->
    <div class="my-profile-section">
        <div class="container-fluid">
            <div class="my-profile-inner">
                <h3 class="pro-title"><i class="fa fa-arrow-left"></i> My Profile</h3>
                <div class="mypro-tab">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">Personal Information</a>
                        </li>
                        <li role="presentation">
                            <a href="#history" aria-controls="history" role="tab" data-toggle="tab">Order History</a>
                        </li>
                        <li role="presentation">
                            <a href="#c-password" aria-controls="c-password" role="tab" data-toggle="tab">Change Password</a>
                        </li>
                        <li role="presentation">
                            <a href="#d-address" aria-controls="d-address" role="tab" data-toggle="tab">Delivery Address</a>
                        </li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="personal">
                            <div class="per-info">
                                <div class="row mt-20">
                                    <div class="col-md-1">
                                        <div class="pi-img">
                                          <?php $this->load->view('upload/index') ?>  
                                        </div>
                                    </div>
                                    <div class="col-md-11">
                                        <h4 class="pi-name">
                                            <?php echo $profile->first_name; ?> <?php echo $profile->last_name; ?>
                                        </h4>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="success_info success_info_update_pf clear_info"></div>
                                        <form name="profile_update" id="profile_update" method="post" onsubmit="return profile_user_update();">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="f-name">First Name</label>
                                                        <input type="text" class="form-control" name="first_name" value="<?php echo $profile->first_name; ?>" id="first_name" placeholder="Enter First Name">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="l-name">Last Name</label>
                                                        <input type="text" class="form-control" name="last_name" value="<?php echo $profile->last_name; ?>" id="last_name" placeholder="Enter Last Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="m-numbr">Mobile Number</label>
                                                        <input type="text" maxlength="10" class="form-control" name="mobile" value="<?php echo $profile->mobile; ?>" id="mobile" placeholder="Enter Mobile Number">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="e-mail">Email Address</label>
                                                        <input type="email" class="form-control" name="email" readonly="readonly" value="<?php echo $profile->email; ?>" id="email" placeholder="Enter Email Address">
                                                    </div>
                                                    <input type="hidden" name="profile_update" value="1">
                                                </div>
                                            </div>
                                            <div class="text-right mt-10">
                                                <div class="error_info error_info_update_pf clear_info"></div>
                                                <button class="btn btn-gulp">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="history">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <p class="t-sm">restaurant</p>
                                                        <p class="t-lg">The Reb Box</p>
                                                    </th>
                                                    <th>
                                                        <p class="t-sm">Order placed</p>
                                                        <p class="t-lg">18 march 2018</p>
                                                    </th>
                                                    <th>
                                                        <p class="t-sm">ship to</p>
                                                        <p class="t-lg">Flat No.100, Trivini Apartments Titan pura..</p>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Chicken thandoori 1/2 </td>
                                                    <td><i class="fa fa-inr"></i> 250 </td>
                                                    <td rowspan="5" class="table-btns">
                                                        <div class="text-center track-ord mt-10">
                                                            <button class="btn btn-gulp"> Track Order</button>
                                                        </div>
                                                        <div class="text-center cancel-ord mt-10">
                                                            <button class="btn btn-gulp-bd"> Cancel Order</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Chicken biriyani</td>
                                                    <td><i class="fa fa-inr"></i> 250 </td>
                                                </tr>
                                                <tr>
                                                    <td>Parota x 4 </td>
                                                    <td><i class="fa fa-inr"></i> 250 </td>
                                                </tr>
                                                <tr>
                                                    <td>GST </td>
                                                    <td><i class="fa fa-inr"></i> 250 </td>
                                                </tr>
                                                <tr>
                                                    <td class="bd-dashed">Total </td>
                                                    <td class="bd-dashed"><i class="fa fa-inr"></i> 250 </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <p class="t-sm">restaurant</p>
                                                        <p class="t-lg">The Reb Box</p>
                                                    </th>
                                                    <th>
                                                        <p class="t-sm">Order placed</p>
                                                        <p class="t-lg">18 march 2018</p>
                                                    </th>
                                                    <th>
                                                        <p class="t-sm">ship to</p>
                                                        <p class="t-lg">Flat No.100, Trivini Apartments Titan pura..</p>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Chicken thandoori 1/2 </td>
                                                    <td><i class="fa fa-inr"></i> 250 </td>
                                                    <td rowspan="5" class="table-btns">
                                                        <div class="text-center track-ord mt-10">
                                                            <button class="btn btn-gulp"> Rate for Review</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Chicken biriyani</td>
                                                    <td><i class="fa fa-inr"></i> 250 </td>
                                                </tr>
                                                <tr>
                                                    <td>Parota x 4 </td>
                                                    <td><i class="fa fa-inr"></i> 250 </td>
                                                </tr>
                                                <tr>
                                                    <td>GST </td>
                                                    <td><i class="fa fa-inr"></i> 250 </td>
                                                </tr>
                                                <tr>
                                                    <td class="bd-dashed">Total </td>
                                                    <td class="bd-dashed"><i class="fa fa-inr"></i> 250 </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="c-password">
                            <div class="success_info success_info_update_pass clear_info"></div>
                            <form name="profile_update_pass" id="profile_update_pass" method="post" onsubmit="return profile_user_update_pass();">
                            <div class="pass-recover">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="o-password">Old Password</label>
                                                    <input type="password" class="form-control" name="old_pass"  id="old_pass" placeholder="Enter old password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="n-password">New Password</label>
                                                     <input type="password"  class="form-control" name="new_pass" id="new_pass" placeholder="Enter new password">
                                                     <input type="hidden" name="profile_update_pass" value="1">
                                                    <div id="myThirdPassword"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="re-password">Confirm Password</label>
                                                    <input type="password" class="form-control" name="confirm_pass"  id="confirm_pass" placeholder="Enter confirm password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-10">
                                            <div class="text-right col-md-12">
                                                <div class="error_info_pass error_info_update_pass clear_info"></div>
                                                <button class="btn btn-gulp">Update Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="d-address">
                            <div class="add-address">
                                <div class="row">
                                     <div class="col-md-8">
                                        <ul class="add-address-list">
                                            <li class="add-ad-modal">
                                                <div class="text-center">
                                                    <img src="<?php echo base_url(); ?>assets/img/add_address.png" alt="add-address" title="Add Address" data-toggle="modal" data-target="#profile_address_modal">
                                                    <h5>Add Address</h5>
                                                </div>
                                            </li>
                                            <li class="insert-address">
                                                <h5>Surendar Kumar,</h5>
                                                <p>Floor, 3rd wing, Nelson Towers, Nelson
                                                    Manickam Road, Amjaikarai<br/>
                                                    Chennai 600092.
                                                </p>
                                                <p class="landmark"><span class="text-bold">Landmark: </span> Near Coffee Shop</p>
                                                <p class="ad-phone"><span class="text-bold">Phone: </span> 8939322322</p>
                                                <div class="ed-blk">
                                                   <span class="add-edit text-red" data-toggle="modal" data-target="#add-address">Edit</span>
                                                   <span class="add-delete text-red">Delete</span>
                                                </div>
                                            </li>
                                            <li class="insert-address">
                                                <h5>Surendar Kumar,</h5>
                                                <p>Floor, 3rd wing, Nelson Towers, Nelson
                                                    Manickam Road, Amjaikarai<br/>
                                                    Chennai 600092.
                                                </p>
                                                <p class="landmark"><span class="text-bold">Landmark: </span> Near Coffee Shop</p>
                                                <p class="ad-phone"><span class="text-bold">Phone: </span> 8939322322</p>
                                                <div class="ed-blk">
                                                   <span class="add-edit text-red" data-toggle="modal" data-target="#add-address">Edit</span>
                                                   <span class="add-delete text-red">Delete</span>
                                                </div>
                                            </li>
                                        </ul>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End My profile -->
<?php $this->load->view('footer') ?>