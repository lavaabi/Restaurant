<?php $this->load->view('header') ?>

<?php $this->load->view('upload/index') ?>
<div class="success_info success_info_update_pf clear_info"></div>
<form name="profile_update" id="profile_update" method="post" onsubmit="return profile_user_update();">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">First Name</label>
      <input type="text" class="form-control" name="first_name" value="<?php echo $profile->first_name; ?>" id="first_name" placeholder="Enter First Name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Last Name</label>
      <input type="text" class="form-control" name="last_name" value="<?php echo $profile->last_name; ?>" id="last_name" placeholder="Enter Last Name">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Mobile Number</label>
      <input type="text" maxlength="10" class="form-control" name="mobile" value="<?php echo $profile->mobile; ?>" id="mobile" placeholder="Enter Mobile Number">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email Address</label>
      <input type="email" class="form-control" name="email" readonly="readonly" value="<?php echo $profile->email; ?>" id="email" placeholder="Enter Email Address">
    </div>
    <input type="hidden" name="profile_update" value="1">
  </div>
  <div class="error_info error_info_update_pf clear_info"></div>
  <button type="submit" class="btn btn-primary">Save Changes</button>
</form>


<h2>Change Password</h2>
<div class="success_info success_info_update_pass clear_info"></div>
<form name="profile_update_pass" id="profile_update_pass" method="post" onsubmit="return profile_user_update_pass();">
  <div class="">
    <div class="form-group">
      <label for="old_pass">Old Password</label>
      <input type="password" class="form-control" name="old_pass"  id="old_pass" placeholder="Enter old password">
    </div>
  </div>
  <div class="">
    <div class="form-group">
      <label for="new_pass">New Password</label>
      <input type="password"  class="form-control" name="new_pass" id="new_pass" placeholder="Enter new password">
    </div>
    <input type="hidden" name="profile_update_pass" value="1">
  </div>
  <div class="">
    <div class="form-group">
      <label for="confirm_pass">Confirm Password</label>
      <input type="password" class="form-control" name="confirm_pass"  id="confirm_pass" placeholder="Enter confirm password">
    </div>
  </div>
  <div class="error_info error_info_update_pass clear_info"></div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


<h2>Delivery Address</h2>

<a href="#" data-toggle="modal" data-target="#profile_address_modal">+ Add adderss</a>
<?php $this->load->view('footer') ?>