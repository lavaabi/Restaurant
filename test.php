<html>
    <head>
        <title>Php code compress the image</title>
    </head>
    <body>
	<?php $img = imagecreatefromstring('//thesportsjournalist.com/wp-content/uploads/wp_photo_seller/13/jnmsgrw9au/Claire-Lindsay-2.jpg');
//header('Content-Type: image/jpeg');
imagejpeg($img, NULL, 50); ?>
<img src = "//thesportsjournalist.com/wp-content/uploads/wp_photo_seller/13/jnmsgrw9au/Claire-Lindsay-2.jpg" >
<img src = "<?php echo $img; ?>" >



<?php 
function imageResize($width, $height, $target) {

if ($width > $height) {
$percentage = ($target / $width);
} else {
$percentage = ($target / $height);
}

//gets the new value and applies the percentage, then rounds the value
$width = round($width * $percentage);
$height = round($height * $percentage);

return "width='".$width."' height='".$height."'";

}
list($width, $height) = getimagesize("//thesportsjournalist.com/wp-content/uploads/wp_photo_seller/13/jnmsgrw9au/Claire-Lindsay-2.jpg"); 
$arr = array('h' => $height, 'w' => $width );
print_r($arr);

//get the image size of the picture and load it into an array
$mysock = getimagesize("thesportsjournalist.com/wp-content/uploads/wp_photo_seller/13/jnmsgrw9au/Claire-Lindsay-2.jpg");

?>
<img src="//thesportsjournalist.com/wp-content/uploads/wp_photo_seller/13/jnmsgrw9au/Claire-Lindsay-2.jpg" <?php imageResize($mysock[0],
$mysock[1], 150); ?>>


</body>
</html>
