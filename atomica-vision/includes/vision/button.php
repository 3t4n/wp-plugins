<?php defined( 'ABSPATH' ) || exit; 

  function atomica_vision_get_button(){

    wp_register_script('atomica_vision_button_js', plugins_url( 'atomicavisionjs.js', __FILE__ ) , [], '1.0.0', true) ;
    wp_enqueue_script('atomica_vision_button_js') ;

    wp_register_style( 'atomica_vision_button_css', plugins_url( 'atomicavisonstyles.css', __FILE__  ) , [], '1.0.0');
	  wp_enqueue_style( 'atomica_vision_button_css' );

    $productColor = get_post_meta( get_the_id(), atomica_vision_product_color_key() , true ); 

    if(!$productColor){
      return; 
    }
  
    $tryOnButtonText = get_option( 'atomica_vision_try_on_button_text' ) ; 
    $tryOnCloseButtonText = get_option( 'atomica_vision_try_on_close_button_text' ) ; 
    $tryOnAutoStart = get_option( 'atomica_vision_try_on_auto_start' ) ; 
    
    if(empty($tryOnButtonText)){
      $tryOnButtonText = "Live try on";
    }
  
    if(empty($tryOnCloseButtonText)){
      $tryOnCloseButtonText = "Close";
    }
  
    if(empty($tryOnAutoStart)){
      $tryOnAutoStart = "true";
    }
  
    $colorParts = explode(",", $productColor);
  
    $color = "rgba(".trim($colorParts[0]).",".trim($colorParts[1]).",".trim($colorParts[2]).",".trim($colorParts[3]).")"; 
    $glossy = trim($colorParts[4]); 

?>

<button onclick="showAtomicaVisionTryOn()" id="atomica-vision-tryon-button" class="atomica-vision-tryon-button button wp-element-button"><?php echo esc_html($tryOnButtonText); ?></button>

<div id="atomica-vision-popup-overlay" class="atomica-vision-popup-overlay">
	<div class="atomica-vision-popup">
		<a onclick="hideAomicaVisionTryOn()" class="atomica-vision-popup-close button wp-element-button" href="javascript:void(0)"><?php echo esc_html($tryOnCloseButtonText); ?></a>
		<div class="atomica-vision-popup-content">
         <iframe id="atomica-vision-popup-frame" width="100%" height="100%" style="border:none;" allow="camera" src="" preloadsrc="https://vision.atomicagroup.com/iframe?lipstickColor=<?php echo esc_attr($color); ?>&glossy=<?php echo esc_attr($glossy); ?>&autoStart=<?php echo esc_attr($tryOnAutoStart); ?>&auth_token=<?php echo esc_attr(get_option( 'atomica_vision_auth_token' )); ?>"></iframe>
		</div>
	</div>
</div>

<?php } ?>