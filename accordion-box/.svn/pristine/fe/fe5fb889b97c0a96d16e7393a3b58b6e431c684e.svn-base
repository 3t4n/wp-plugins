<?php

defined( 'ABSPATH' ) or die();

if( !class_exists('CDLZR_ACCBOX_Shortcode')){
	class CDLZR_ACCBOX_Shortcode{

		public static function show_accbox($atts){
			wp_enqueue_style( 'bootstrap_css', CDLZR_ACORD_URL . 'admin/assets/css/bootstrap.min.css'  );
			wp_enqueue_style( 'public_css', CDLZR_ACORD_URL . 'public/assets/css/public-css.css'  );
			wp_enqueue_style( 'hr_accordion_css', CDLZR_ACORD_URL . 'public/assets/css/hr.accordion.min.css'  );
			wp_enqueue_style( 'jquerysctipttop_css', CDLZR_ACORD_URL . 'public/assets/css/jquerysctipttop.css'  );	 	
			wp_enqueue_style('cdlzr-fontawesome', CDLZR_ACORD_URL . 'admin/assets/css/fontawesome/css/all.min.css', array(), true, 'all');

			wp_enqueue_script( 'jquery' );			
			wp_enqueue_script( 'bootstrap_js', CDLZR_ACORD_URL . 'admin/assets/js/bootstrap.min.js', array( 'jquery' ), true, true );					
			wp_enqueue_script( 'public-custom-js', CDLZR_ACORD_URL . 'public/assets/js/public-custom-js.js' );
			wp_enqueue_script( 'hr-accordion-min-js', CDLZR_ACORD_URL . 'public/assets/js/hr-accordion.min.js' );
			wp_enqueue_script( 'accordion-js', CDLZR_ACORD_URL . 'public/assets/js/jquery-accordion.js' );			
		  $post_id = $atts['id'];
		  $accbox_content = get_post_meta($post_id, 'accbox_metabox_'.$post_id, true);

			if(isset($accbox_content[0]['style_accbox'][0])){
				$selected_theme = $accbox_content[0]['style_accbox'][0];
			}else{
				$selected_theme = 1;	
			}


			if($selected_theme==1){
				function style_1($post_id){
					return $post_id;
				}
				include( CDLZR_ACORD_PLUGIN_DIR_PATH . 'public/templatebox/style/style-1.php' );

			}else if($selected_theme==2){
				function style_2($post_id){
					return $post_id;
				}
				include( CDLZR_ACORD_PLUGIN_DIR_PATH . 'public/templatebox/style/style-2.php' );
			}else if($selected_theme==3){
				function style_3($post_id){
					return $post_id;
				}
				include( CDLZR_ACORD_PLUGIN_DIR_PATH . 'public/templatebox/style/style-3.php' );
			}else if($selected_theme==4){
				function style_4($post_id){
					return $post_id;
				}
				include( CDLZR_ACORD_PLUGIN_DIR_PATH . 'public/templatebox/style/style-4.php' );
			}else if($selected_theme==5){
				function style_5($post_id){
					return $post_id;
				}				
				include( CDLZR_ACORD_PLUGIN_DIR_PATH . 'public/templatebox/style/style-5.php' );
			}else{
				/*If user forget to select theme setting and save then run theme template first*/
				function style_1($post_id){
					return $post_id;
				}
				include( CDLZR_ACORD_PLUGIN_DIR_PATH . 'public/templatebox/style/style-1.php' );
			}			
		}
	}
}	
?>