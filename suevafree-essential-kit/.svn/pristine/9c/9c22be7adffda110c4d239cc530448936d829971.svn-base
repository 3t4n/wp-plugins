<?php

if (!function_exists('suevafree_counter_function')) {

	function suevafree_counter_function($atts,  $content = null) {
		
		extract(shortcode_atts(array(
			'title'  => 'Happy Users',
			'count'  => '5000',
			'layout' => '',
	
		), $atts));

		$counterLayout = '';

		if ( $layout == 'circle' )
			$counterLayout = 'suevafree-circle-counter';
	
		$content  =  '<div class="suevafree-counter ' . esc_attr($counterLayout) . '"><div class="suevafree-counter-element"><span data-count="' . esc_attr($count) . '" class="count">0</span>' . esc_attr($title) . '</div></div>' ;

		return $content;
		
	}
	
	add_shortcode('counter','suevafree_counter_function');

}

?>
