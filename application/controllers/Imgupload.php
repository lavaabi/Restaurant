<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Imgupload extends CI_Controller
{
  public function __construct()
    {
        parent::__construct();
        
        // Load library and url helper
        
        $this->load->library( 'facebook' );
        $this->load->library( 'Rest' );
        $this->load->model( 'Auth_model' );
        valid_session_user(); 
    }
  // Initially files uploads
  public function index()
  {
  	$this->load->view('upload/index');
  }

	/* Function to change profile picture */
	public function changeProfilePic() {
			valid_session_user();
			$post = isset($_POST) ? $_POST: array();
			$max_width = "500"; 
			$userId = isset($post['hdn-profile-id']) ? intval($post['hdn-profile-id']) : 0;
			$path = 'uploads/profiles';
			$valid_formats = array("jpg", "png", "gif", "jpeg");
			$name = $_FILES['profile-pic']['name'];
			$size = $_FILES['profile-pic']['size'];
			if(strlen($name)) {
				list($txt, $ext) = explode(".", $name);
				if(in_array($ext,$valid_formats)) {
					if($size<(1024*1024)) {
						$actual_image_name = 'avatar' .'_'.$userId.time().'.'.$ext;
						$filePath = $path .'/'.$actual_image_name;
						$tmp = $_FILES['profile-pic']['tmp_name'];
						if(move_uploaded_file($tmp, $filePath)) {
							$width = $this->getWidth($filePath);
							$height = $this->getHeight($filePath);
							//Scale the image if it is greater than the width set above
							if ($width > $max_width){
								$scale = $max_width/$width;
								$uploaded = $this->resizeImage($filePath,$width,$height,$scale, $ext);
							} else {
								$scale = 1;
								$uploaded = $this->resizeImage($filePath,$width,$height,$scale, $ext);
							}					
							echo "<img id='photo' file-name='".$actual_image_name."' class='' src='".base_url().$filePath.'?'.time()."' class='preview'/>";
						}
						else
						echo "failed";
					}
					else
					echo "Image file size max 1 MB"; 
				}
				else
				echo "Invalid file format.."; 
			}
			else
			echo "Please select image..!";
			exit;
		}

	/* Function to handle save profile pic */
	public	function saveProfilePic(){
			if(!empty($_POST['image_name']))
			{
					$this->db->update('mt_customers',array('profile_picture'=>$_POST['image_name']),array('user_id'=>$this->session->userdata('user_id')));
					$response = $this->Auth_model->get_profile();
					$this->Auth_model->get_profile_image($response);
					echo base_url().'uploads/profiles/'.$_POST['image_name'] ;
			}
	}
		
	/* Function to update image */
	public function saveProfilePicTmp() {
		$post = isset($_POST) ? $_POST: array();
		$userId = isset($post['id']) ? intval($post['id']) : 0;
		$path ='uploads/profiles';
		$t_width = 300; // Maximum thumbnail width
		$t_height = 300;    // Maximum thumbnail height	
		if(isset($_POST['t']) and $_POST['t'] == "ajax") {
			extract($_POST);		
			$imagePath = 'uploads/profiles/'.$_POST['image_name'];
			$ratio = ($t_width/$w1); 
			$nw = ceil($w1 * $ratio);
			$nh = ceil($h1 * $ratio);
			$nimg = imagecreatetruecolor($nw,$nh);
			$im_src = imagecreatefromjpeg($imagePath);
			imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w1,$h1);
			imagejpeg($nimg,$imagePath,90);		
		}
		echo $imagePath.'?'.time();;
		exit(0);    
	} 

	/* Function  to resize image */
	public function resizeImage($image,$width,$height,$scale, $ext) {
		$newImageWidth = ceil($width * $scale);
		$newImageHeight = ceil($height * $scale);
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		switch ($ext) {
	        case 'jpg':
	        case 'jpeg':
	            $source = imagecreatefromjpeg($image);
	            break;
	        case 'gif':
	            $source = imagecreatefromgif($image);
	            break;
	        case 'png':
	            $source = imagecreatefrompng($image);
	            break;
	        default:
	            $source = false;
	            break;
	    }	
		imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
		imagejpeg($newImage,$image,90);
		chmod($image, 0777);
		return $image;
	}

	/*  Function to get image height. */
	public function getHeight($image) {
	    $sizes = getimagesize($image);
	    $height = $sizes[1];
	    return $height;
	}

	/* Function to get image width */
	public function getWidth($image) {
	    $sizes = getimagesize($image);
	    $width = $sizes[0];
	    return $width;
	}

}
?>
