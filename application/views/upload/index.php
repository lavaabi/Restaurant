

<script type="text/javascript">var base_url = '<?php echo base_url();?>';</script>

<div>
    <?php   $image = base_url().'assets/img/user.png';
            if(!empty($profile->profile_picture))
            {
                $image = base_url().'uploads/profiles/'.$profile->profile_picture;
            }
     ?>
	<img class="img-circle" id="profile_picture"  data-src="<?php echo $image; ?>"  data-holder-rendered="true" src="<?php echo $image; ?>"/>
	<a id="change-profile-pic" style="float: right;"><i class="fa fa-pencil"></i></a>
</div>

