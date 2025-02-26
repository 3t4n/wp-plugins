<?php
namespace Admintosh\Classes;
 /**
  * 
  * @package    Admintosh
  * @version    1.0.0
  * @author     wpmobo
  * @Websites: http://wpmobo.com
  *
  */
 
 class Recaptcha_Generator{

    public static function get_random_number_captcha() {
      self::random_captcha_generator();
    }

    public static function get_addition_captcha() {

      return self::addition_captcha_generator();
    }

    public static function get_google_recaptcha() {
      return self::google_recaptcha();
    }

    private static function random_captcha_generator() {

        // Generate a random number from 1000-9999
        $captcha = rand(1000, 9999);
          
        // The captcha will be stored for the session
        self::storeAnswer($captcha);
          
        // Generate a 50x24 standard captcha image
        $im = imagecreatetruecolor(100, 40); 
         
        // Blue color
        $bg = imagecolorallocate($im, 22, 86, 165);
         
        // White color
        $fg = imagecolorallocate($im, 255, 255, 255);
          
        // Give the image a blue background
        imagefill($im, 0, 0, $bg);
          
        // Print the captcha text in the image with random position & size
        imagestring( $im, 5, 32, 12, $captcha, $fg );
                    
        // Finally output the captcha as PNG image the browser

        ob_start();

        imagepng($im);
         
      // Get the contents of the output buffer and encode it to base64
      $imageData = ob_get_clean();
      $base64Data = 'data:image/jpg;base64,'.base64_encode($imageData);

      // Display the base64 encoded image data
      echo wp_kses_post( $base64Data );

      // Clean up resources
      imagedestroy($im);
        
    }

    private static function addition_captcha_generator() {

      $randNumber = rand( 10, 99 );
      $n = str_split($randNumber);
      $ans = array_sum( $n );
      self::storeAnswer($ans);
      return $context = "$n[0] + $n[1] =";

    }

    private static function storeAnswer( $ans ) {
      $_SESSION['admintosh_security_captcha_'.ADMINTOSH_UNIQID] = $ans;
    }
	
    private static function google_recaptcha() {
      $opt = get_option(ADMINTOSH_OPTION_NAME);
      $siteKey = !empty( $opt['grc_site_key'] ) ? $opt['grc_site_key'] : '';
      echo '<div class="admintosh-login-recaptcha-wrap g-recaptcha" data-sitekey="'.esc_attr( $siteKey ).'"></div';
    }

}

