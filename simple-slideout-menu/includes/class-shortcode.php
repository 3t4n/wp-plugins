<?php 
namespace simsm;

if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('simsm\Shortcode')){

	class Shortcode {


		function __construct(){

			add_shortcode( 'simple_slideout_menu', array( $this, 'simple_slideout_menu' ) );

		}


		function simple_slideout_menu( $atts = [] ){
            $classes = [];
            $visibility_class = '';
            if( get_option( 'simsm_hide_desktop' ) ){
                $classes[] = 'simsm-hide-desktop';
            }
            if( get_option( 'simsm_hide_tablet' ) ){
                $classes[] = 'simsm-hide-tablet';
            }
            if( get_option( 'simsm_hide_mobile' ) ){
                $classes[] = 'simsm-hide-mobile';
            }
            
            if( ! empty($classes)){
                $visibility_class = implode(' ',$classes );
            }
			ob_start();
			?>
				<a href="#" data-trigger="simple-slideout" class="<?php echo esc_html( $visibility_class ); ?> simsm-shortcode-ui"><span class="dashicons dashicons-menu"></span></a>
			<?php
			$contents = ob_get_contents();
			ob_end_clean();
			return $contents;

		}



	}

}