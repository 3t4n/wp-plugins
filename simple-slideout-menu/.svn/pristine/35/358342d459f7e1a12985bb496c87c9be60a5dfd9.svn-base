<?php 
namespace simsm;

if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('simsm\Action')){

	class Action {


		function __construct(){

			add_action( 'plugins_loaded', array( $this, 'plugin_i18n' ) );

			register_activation_hook( SIMSM_PLUGIN, array( $this, 'activation_hook' ) );

			register_deactivation_hook( SIMSM_PLUGIN, array( $this, 'deactivation_hook' ) );

			add_action( 'wp_footer', array( $this, 'add_slideout_markup' ) );

			add_action( 'wp_head', array( $this, 'add_setting_styles' ) );
            
            add_filter('nav_menu_css_class', array( $this, 'filter_menu_class' ),20,3 );

		}
        
        
        function filter_menu_class( $classes, $item, $args ){
            
            if ( in_array( 'simple-slideout-menu-item', $classes ) ) {

                if( get_option( 'simsm_hide_desktop' ) ){
                    $classes[] = 'simsm-hide-desktop';
                 }
                 if( get_option( 'simsm_hide_tablet' ) ){
                    $classes[] = 'simsm-hide-tablet';
                 }
                 if( get_option( 'simsm_hide_mobile' ) ){
                    $classes[] = 'simsm-hide-mobile';
                 }
            }
            
            return $classes;
        }

	


		function add_slideout_markup(){

			SIMSM()->get_template_part( 'slideout' );
		}




		function plugin_i18n(){

			load_plugin_textdomain('simple-slideout-menu', false, dirname( plugin_basename( SIMSM_PLUGIN ) ).'/languages/');

		}


		function activation_hook(){
			/* Add default options */
		}



		function deactivation_hook(){


		}



		function add_setting_styles(){
			$panel_bg = get_option( 'simsm_panel_bg', '#eeeeee');
			$shadow_color = get_option( 'simsm_panel_shadow_color','rgba(0,0,0,0.5)');

			$close_icon_size = get_option( 'simsm_close_icon_font_size', '30');
			$close_hover_color = get_option( 'simsm_close_icon_hover_color','#bc0909' );
			$close_color = get_option( 'simsm_close_icon_color','#000000' );
			$max_width = get_option( 'simsm_panel_width', '311px');

			$hamburger_icon_size = get_option( 'simsm_hamburger_icon_font_size', '24');
			$hamburger_hover_color = get_option( 'simsm_hamburger_icon_hover_color', '#111111' );
			$hamburger_color = get_option( 'simsm_hamburger_icon_color','#000000' );

			$menu_color = get_option( 'simsm_menu_link_color', '#868080');
			$menu_hover_color = get_option( 'simsm_menu_link_hover_color', '#000000');

			$menu_link_size = get_option( 'simsm_menu_link_font_size', '20' );

			$menu_text_decoration = get_option( 'simsm_menu_link_text_decoration', 'none' );

			$menu_text_transformation = get_option( 'simsm_menu_link_text_transformation', 'uppercase' );
			$menu_text_font_weight = get_option( 'simsm_menu_link_font_weight', '800' );
			?>
				<style>
					.simple-slideout-menu-panel {
						background: <?php echo esc_html( $panel_bg ); ?>;
						max-width: <?php echo esc_html( $max_width ); ?>;
						color: <?php echo esc_html( $menu_color ); ?> !important;
					}

					.simple-slideout-menu-panel.shadow {
						-webkit-box-shadow: 0 0 15px 0 <?php echo esc_html( $shadow_color ); ?>;
    					box-shadow: 0 0 15px 0 <?php echo esc_html( $shadow_color ); ?>;
					}

					.simple-slideout-menu-panel .simple-slideout-menu-close .dashicons:before {
						width:<?php echo esc_html( $close_icon_size ); ?>px;
						height:<?php echo esc_html( $close_icon_size ); ?>px;
						font-size: <?php echo esc_html( $close_icon_size ); ?>px;
					}

					.simple-slideout-menu-panel .simple-slideout-menu-close {
						color:<?php echo esc_html( $close_color ); ?>;
					}

					.simple-slideout-menu-panel .simple-slideout-menu-close:hover {
						color:<?php echo esc_html( $close_hover_color ); ?>;
					}

					a[data-trigger="simple-slideout"]:not(.simple-slideout-menu-close ) {
						color:<?php echo esc_html( $hamburger_color) ; ?> !important;
						text-decoration:none;
					}

					a[data-trigger="simple-slideout"]:hover:not(.simple-slideout-menu-close ) {
						color:<?php echo esc_html( $hamburger_hover_color ); ?> !important;
					}

					a[data-trigger="simple-slideout"]:not(.simple-slideout-menu-close ) .dashicons:before {
						width:<?php echo esc_html( $hamburger_icon_size ); ?>px;
						height:<?php echo esc_html( $hamburger_icon_size ); ?>px;
						font-size: <?php echo esc_html( $hamburger_icon_size ); ?>px;
					}

					.simple-slideout-menu-panel  ul.slideout-menu  a {
				    	color: <?php echo esc_html( $menu_color ); ?>;
				    	font-size: <?php echo esc_html( $menu_link_size ); ?>px;
				    	text-decoration: <?php echo esc_html( $menu_text_decoration ); ?>;
				    	text-transform: <?php echo esc_html( $menu_text_transformation ); ?>;
				    	font-weight: <?php echo esc_html( $menu_text_font_weight ); ?>;
					}

					.simple-slideout-menu-panel  ul.slideout-menu a:hover {
				    	color: <?php echo esc_html( $menu_hover_color ); ?>;
					}
				</style>
			<?php
		}



	}

}