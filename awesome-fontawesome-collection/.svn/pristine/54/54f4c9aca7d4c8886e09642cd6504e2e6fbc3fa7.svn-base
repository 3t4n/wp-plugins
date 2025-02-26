<?php if ( ! defined( 'ABSPATH' ) ) exit;
 
  function displayFonticon($atts) {
   
		$picon  = $atts['name'];
	   
		$thehtml = '<i class="fa '.esc_html($picon).'"></i>';
		  
		return $thehtml;
	}
	
  if(isset($gen_settings) && $gen_settings == '1'){
		
		add_shortcode('phoe-icon', 'displayFonticon');
	}
	?>