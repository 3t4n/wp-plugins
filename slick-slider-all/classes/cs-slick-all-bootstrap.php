<?php

/**
 * Class cs_slick_bootstrap
 */
class cs_slick_all_bootstrap {
	
	public function init() {
		// Call admin menu
		add_action( 'admin_menu', array($this, 'admin_menu'), 99 );
		
		// Include public scripts
		add_action( 'wp_enqueue_scripts', array($this, 'include_public_scripts'), 999 );
		
		// add shortcode
		add_shortcode('cs_slick_slider_all', array($this, 'slick_slider_all_shortcode'));
	}
	
	/**
	 * Include public scripts
	 */
	public function include_public_scripts() {
		wp_enqueue_script('cs-slick-slider-js', CS_SSA_PLUGIN_PATH . 'assets/public/slick/slick.js',array('jquery'), '1.1');
		wp_enqueue_style('cs-slick-slider-css', CS_SSA_PLUGIN_PATH . 'assets/public/slick/slick.css');
		
		wp_enqueue_style('cs-slick-slider-cusom-css', CS_SSA_PLUGIN_PATH . 'assets/public/css/cs-slick-slider-all-custom.css');
		
		//wp_enqueue_script('cs-slick-all', CS_SSA_PLUGIN_PATH . 'assets/public/js/cs-slick-all.js',array('jquery'), '1.1');
		
		wp_register_style('cs-slick-all-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');
		wp_enqueue_style('cs-slick-all-fontawesome');
	}
	
	/**
	 * Admin menu
	 */
	public function admin_menu() {
		add_submenu_page( 'options-general.php', __('Slick slider all'), __('Slick slider all'), 'manage_options', 'cs-slick-slider-all', array($this, 'cs_slick_slider_all') );
	}
	
	/**
	 * Dashboard options
	 */
	public function cs_slick_slider_all() {
		include __DIR__ . '/../views/admin/dashboard.php';
	}
	
	public function in_array_r($needle, $haystack, $strict = false) {
		foreach ($haystack as $item) {
			if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
				return true;
			}
		}
		
		return false;
	}
	
	public function array_push_assoc($array, $key, $value){
		$array[$key] = $value;
		return $array;
	}
	
	function slick_slider_all_shortcode($atts) {
		$a = shortcode_atts([
			'post_type' => 'post',
			'post_number' => '10',
			'taxonomy' => 'category',
			'terms' => 'false',
			'orderby' => 'date',
			'order' => 'DESC',
			'show_description' => 'false',
			'swipe' => 'true',
			'responsive' => 'large=4,medium=3,small=2,exsmall=1'
		], $atts);
		
		
		ob_start();
		
		$responsive = $a['responsive'];
		$responsive_final = array();
		
		$responsive = explode(',',$responsive);
		
		foreach ( $responsive as $key_val ) {
			$new_key_val = explode('=', $key_val);
			array_push($responsive_final, $responsive_final[$new_key_val[0]] = $new_key_val[1] ) ;
		}
		
		unset($responsive_final['0']);
		unset($responsive_final['1']);
		unset($responsive_final['2']);
		unset($responsive_final['3']);
		
		if ( !isset($responsive_final['large']) ) $responsive_final['large'] = 4;
		if ( !isset($responsive_final['medium']) ) $responsive_final['medium'] = 3;
		if ( !isset($responsive_final['small']) ) $responsive_final['small'] = 2;
		if ( !isset($responsive_final['exsmall']) ) $responsive_final['exsmall'] = 1;
		
		if ( $a['taxonomy'] === 'category' && $a['terms'] === 'false' ) {
			$args = array(
				'post_type' => $a['post_type'],
				'orderby' => $a['orderby'],
				'order' => $a['order'],
				'posts_per_page' => $a['post_number'],
			);
		} else if ( $a['taxonomy'] === 'category' && $a['terms'] !== 'false' ) {
			$args = array(
				'post_type' => $a['post_type'],
				'orderby' => $a['orderby'],
				'order' => $a['order'],
				'posts_per_page' => $a['post_number'],
				'cat' => $a['terms']
			);
		} else if ( $a['taxonomy'] !== 'category' && $a['terms'] !== 'false' ) {
			$args = array(
				'post_type' => $a['post_type'],
				'orderby' => $a['orderby'],
				'order' => $a['order'],
				'posts_per_page' => $a['post_number'],
				'tax_query' => array(
					array(
						'taxonomy' => $a['taxonomy'],
						'terms' => explode(',', $a['terms']),
						'field' => 'term_id'
					)
				)
			);
		} else {
			$args = array(
				'post_type' => $a['post_type'],
				'orderby' => $a['orderby'],
				'order' => $a['order'],
				'posts_per_page' => $a['post_number'],
			);
		}
		
		$the_query = new WP_Query($args);
		
		/** FEATURES IN PRO VERSION */
			// Please buy the full version of this plugin and support me :)
		/** FEATURES IN PRO VERSION END */
		$slider_id = '1';
		
		include __DIR__ . '/../views/public/displaying-all.php';
		
		$return = ob_get_clean();
		return $return;
	}
	
	public static function plugin_delete() {
		delete_option('cs_slick_slider_opt');
	}
	
}