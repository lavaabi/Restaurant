<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * @libraries       Encryption
 * @author          Indyzen
 * @added           2017.07.27
 * @updated author  none
 * @update date     none
 * @since           Version 1.0
 * @filesource      libraries/Encryption
 */
class Encryption {

	var $skey 	= ENCRYPTION_CLASS_KEY;
	
  /**
   * safe_b64encode
   * 
   * @param  [mixed] $string
   * @return [mixed]
   */
  public  function safe_b64encode($string)
  {
    $data = base64_encode($string);

    // echo $string.'='; die;
    $data = str_replace(array('+','/','='),array('-','_',''),$data);
    return $data;
  }

  /**
   * safe_b64decode
   * 
   * @param  [mixed] $string
   * @return [mixed]
   */
	public function safe_b64decode($string)
  {
    $data = str_replace(array('-','_'),array('+','/'),$string);
    $mod4 = strlen($data) % 4;
    if ($mod4) {
        $data .= substr('====', $mod4);
    }
    return base64_decode($data);
  }
	
  /**
   * encode
   * 
   * @param  [mixed] $value
   * @return [mixed]
   */
  public  function encode($value)
  {
    if(!$value){return false;}
      $text = $value;
      $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
      $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
      $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
      return trim($this->safe_b64encode($crypttext)); 
  }
  
  /**
   * decode
   * 
   * @param  [mixed] $value
   * @return [mixed]
   */
  public function decode($value)
  {
    if(!$value){return false;}
    $crypttext = $this->safe_b64decode($value); 
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
    return trim($decrypttext);
  }
}