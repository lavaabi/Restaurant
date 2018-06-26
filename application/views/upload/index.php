
<script src="<?php echo base_url() ?>assets/js/upload_js/jquery.imgareaselect.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/upload_js/jquery.form.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/upload_js/imgareaselect.css">
<script src="<?php echo base_url() ?>assets/js/functions.js"></script>
<script type="text/javascript">var base_url = '<?php echo base_url();?>';</script>

<div>
    <?php   $image = base_url().'assets/img/profile_default.jpg';
            if(!empty($profile->profile_picture))
            {
                $image = base_url().'uploads/profiles/'.$profile->profile_picture;
            }
     ?>
	<img class="img-circle" id="profile_picture" height="128" data-src="<?php echo $image; ?>"  data-holder-rendered="true" style="width: 140px; height: 140px;" src="<?php echo $image; ?> "/>
	<br><br>
	<a type="button" class="btn btn-primary" id="change-profile-pic">Change Profile Picture</a>
</div>

