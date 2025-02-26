<?php
if ( ! defined( 'ABSPATH' ) ) exit;
//CSS
//Enqueue You Css Here
wp_enqueue_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX.'custom-css', ITLS_LOGO_SHOWCASE_CSS_URL . 'custom_css.css', array() , null);
wp_enqueue_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX.'public-css', ITLS_LOGO_SHOWCASE_CSS_URL. 'public.css', array() , null);

/////tooltip//////
wp_enqueue_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'tooltip-css', ITLS_LOGO_SHOWCASE_JS_PLUGIN_URL . 'tooltip/src/stylesheets/tipsy.css');

//FONTAWESOME STYLE //font-awesome-css
wp_register_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'font-awesome-ccc', ITLS_LOGO_SHOWCASE_CSS_URL . 'font-awesome.css', true);
wp_enqueue_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'font-awesome-ccc');

///////// grid responsive ///////////
wp_register_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'responsive-grid', ITLS_LOGO_SHOWCASE_CSS_URL . 'responsive-grid.css', true);
wp_enqueue_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'responsive-grid');

/////COLOR PICKKER//////
wp_enqueue_style('wp-color-picker');





	
//JS
/////JS ENQUEUE////////////
wp_enqueue_script('jquery');

/////tooltip//////
wp_enqueue_script(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'tooltip', ITLS_LOGO_SHOWCASE_JS_PLUGIN_URL . 'tooltip/src/javascripts/jquery.tipsy.js');
 
//////////////////CUSTOM JS//////////////////////////
wp_register_script( ITLS_LOGO_SHOWCASE_FIELDS_PERFIX.'ajaxHandle', ITLS_LOGO_SHOWCASE_JS_URL.'front-end/custom-js.js', array('jquery'), false, true );
wp_enqueue_script( ITLS_LOGO_SHOWCASE_FIELDS_PERFIX.'ajaxHandle' );
wp_localize_script( ITLS_LOGO_SHOWCASE_FIELDS_PERFIX.'ajaxHandle', 'ajax_object',
	array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'itls_logoshowcase_nonce' ) ) );

/////COLOR PICKKER////////////
wp_enqueue_script('wp-color-picker');


?>