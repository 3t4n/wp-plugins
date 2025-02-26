<?php
/**
 * Oneto Companion Customizer Class
 *
 * @package oneto-companion
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'OnetoCompanion_Oneto_Customizer' ) ) :

	// Oneto Companion Customizer class
	
	class OnetoCompanion_Oneto_Customizer {
		
	
		public function onetocompanion_oneto_customizer_settings() {
			
			
			require oneto_companion_plugin_dir . 'inc/oneto/customizer/sections/extra-oneto-top-header-customizer-settings.php';
           	require oneto_companion_plugin_dir . 'inc/oneto/customizer/sections/extra-oneto-slider-customizer-settings.php';
			require oneto_companion_plugin_dir . 'inc/oneto/customizer/sections/extra-oneto-client-customizer-settings.php';
			require oneto_companion_plugin_dir . 'inc/oneto/customizer/sections/extra-oneto-feature-customizer-settings.php';
			require oneto_companion_plugin_dir . 'inc/oneto/customizer/sections/extra-oneto-testimonial-customizer-settings.php';
			require oneto_companion_plugin_dir . '/inc/oneto/customizer/sections/extra-oneto-blog-customizer-settings.php';
		    require oneto_companion_plugin_dir . 'inc/oneto/customizer/sections/extra-oneto-cta-customizer-settings.php';
			

		}
	

	}
endif;

$customizer_settings = new OnetoCompanion_Oneto_Customizer();

$customizer_settings->onetocompanion_oneto_customizer_settings();