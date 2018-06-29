<!-- Banner section -->
<?php
function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
 $PublicIP = get_client_ip(); 
 //$json  = file_get_contents("https://freegeoip.net/json/$PublicIP");
 $json  =  '';//json_decode($json ,true);
 $country =  '';//$json['country_name'];
 $region= '';//$json['region_name'];
 $city = '';//$json['city'];
 
?>

<div class="banner-section">
	<img src="<?php echo base_url();?>assets/img/home-banner.jpg" alt="home-banner" class="img-responsive">
	<div class="home-banner-desc">
		<h2>Find the best restaurants, cafes, and sweet stalls</h2>
		<form class="home-banner-form" method="POST" action="<?php echo base_url('restaurants'); ?>">
		<input type="hidden" value="<?php echo $city; ?>" id="my_location" />
			<div class="col-sm-9 search-food-in">
				<div class="form-group">
					<input type="text" class="form-control" id="search-food" name="city" placeholder="Search for restaurants or cusines">
					<span class="locate-me"><a href="javascript:void(0)" onclick="locate_me()">Locate me</a></span>
				</div>
			</div>
			<div class="col-sm-3 search-food">
				<button type="submit" class="btn btn-default search-food-btn">Search Food</button>
			</div>
		</form>
	</div>
</div>
<!-- End Banner section -->