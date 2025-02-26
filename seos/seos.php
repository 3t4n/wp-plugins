<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Plugin Name: SEOS
 * Plugin URI: https://seosthemes.com/seos-wordpress-plugin/
 * Contributors: seosbg
 * Author: seosbg
 * Description: SEOS — WordPress SEO Plugin. Simply amazing and easy to use.
 * Version: 1.2.1
 * License: GPL2
 */

/*********************** Add Menu Page **************************/	
 
 
add_action('admin_menu', 'seo_s_menu');
function seo_s_menu() {
    add_menu_page('SEOS', 'SEOS', 'administrator', 'seos', 'seo_s_settings_page', plugins_url('images/icon.png', __FILE__)
    );

    add_action('admin_init', 'seo_s_register_settings');
}

/*********************** Include **************************/

include_once(plugin_dir_path(__FILE__) . 'inc/homepage-meta.php');
include_once(plugin_dir_path(__FILE__) . 'inc/sticky-shortcode.php');

		
		function seos_sticky_color_sheme () { ?>
			<style type="text/css">
			<?php for($i=1;$i<=8; $i++) { ?>
				<?php if(get_option('seos_sticky_color_sheme'.$i) == "1") { ?>.front-sticky<?php echo $i; ?> .front-con, #sticky-plugin .seos-sticky<?php echo $i; ?> { background-image: url(<?php echo plugin_dir_url(__FILE__); ?>images/sticky-blue.jpg); } <?php }  ?>
				<?php if(get_option('seos_sticky_color_sheme'.$i) == "2") { ?>.front-sticky<?php echo $i; ?> .front-con, #sticky-plugin .seos-sticky<?php echo $i; ?> { background-image: url(<?php echo plugin_dir_url(__FILE__); ?>images/sticky-apple-greeen.jpg); } <?php }  ?>
				<?php if(get_option('seos_sticky_color_sheme'.$i) == "3") { ?>.front-sticky<?php echo $i; ?> .front-con, #sticky-plugin .seos-sticky<?php echo $i; ?> { background-image: url(<?php echo plugin_dir_url(__FILE__); ?>images/sticky-black.jpg); } <?php }  ?>
				<?php if(get_option('seos_sticky_color_sheme'.$i) == "4") { ?>.front-sticky<?php echo $i; ?> .front-con, #sticky-plugin .seos-sticky<?php echo $i; ?> { background-image: url(<?php echo plugin_dir_url(__FILE__); ?>images/sticky-green.jpg); } <?php }  ?>
				<?php if(get_option('seos_sticky_color_sheme'.$i) == "5") { ?>.front-sticky<?php echo $i; ?> .front-con, #sticky-plugin .seos-sticky<?php echo $i; ?> { background-image: url(<?php echo plugin_dir_url(__FILE__); ?>images/sticky-orange.jpg); } <?php }  ?>
				<?php if(get_option('seos_sticky_color_sheme'.$i) == "6") { ?>.front-sticky<?php echo $i; ?> .front-con, #sticky-plugin .seos-sticky<?php echo $i; ?> { background-image: url(<?php echo plugin_dir_url(__FILE__); ?>images/sticky-purple.jpg); } <?php }  ?>
				<?php if(get_option('seos_sticky_color_sheme'.$i) == "7") { ?>.front-sticky<?php echo $i; ?> .front-con, #sticky-plugin .seos-sticky<?php echo $i; ?> { background-image: url(<?php echo plugin_dir_url(__FILE__); ?>images/sticky-white.jpg); } <?php }  ?>
				<?php if(get_option('seos_sticky_color_sheme'.$i) == "8") { ?>.front-sticky<?php echo $i; ?> .front-con, #sticky-plugin .seos-sticky<?php echo $i; ?> { background-image: url(<?php echo plugin_dir_url(__FILE__); ?>images/sticky-red.jpg); } <?php }  ?>
				<?php if(get_option('seos_sticky_color_sheme'.$i) == "9") { ?>.front-sticky<?php echo $i; ?> .front-con, #sticky-plugin .seos-sticky<?php echo $i; ?> { background-image: url(<?php echo plugin_dir_url(__FILE__); ?>images/sticky-yellow.jpg); } <?php }  ?>
				<?php if(get_option('seos_sticky_color_text'.$i)) { ?>.front-sticky<?php echo $i; ?> .front-con, #sticky-plugin .seos-sticky<?php echo $i; ?> { color: <?php echo esc_html(get_option('seos_sticky_color_text'.$i)); ?>; } <?php }  ?>
			<?php } ?>
			
			</style>
			<?php }
			
			add_action('wp_head','seos_sticky_color_sheme');
			add_action('admin_head','seos_sticky_color_sheme');
	
/*********************** Register Settings **************************/	

function seo_s_register_settings() {
    register_setting('seos', 'seos_canonical');
    register_setting('seos', 'seos_keywords');
    register_setting('seos', 'seos_description');
    register_setting('seos', 'seos_google_verification');	
    register_setting('seos', 'google_analytics');
    register_setting('seos', 'seos_publisher');
    register_setting('seos', 'seos_alexa_verification');
    register_setting('seos', 'seos_pinterest_verification');
    register_setting('seos', 'seos_yandex_verification');
    register_setting('seos', 'seos_bing_verification');
    register_setting('seos', 'seos_site_name');	
    register_setting('seos', 'seos_facebook_image');
    register_setting('seos', 'seos_facebook_title');
    register_setting('seos', 'seos_facebook_description');
    register_setting('seos', 'seos_facebook_id');
    register_setting('seos', 'seos_locale');
    register_setting('seos', 'seos_locale_alternate');
    register_setting('seos', 'seos_locale_alternate1');
    register_setting('seos', 'seos_graph_url');
    register_setting('seos', 'seos_geo_region');
    register_setting('seos', 'seos_geo_placename');
    register_setting('seos', 'seos_geo_position');
    register_setting('seos', 'seos_icbm');
    register_setting('seos', 'seos_twitter_card');
    register_setting('seos', 'seos_twitter_site');
    register_setting('seos', 'seos_twitter_title');
    register_setting('seos', 'seos_twitter_description');
    register_setting('seos', 'seos_twitter_image');

	
	for($i=1;$i<=8; $i++) {
	    register_setting( 'seos', 'seos_note_name_'.$i );	
	    register_setting( 'seos', 'seos_note_datepicker_'.$i );
	}
	
	for($i=1;$i<=3; $i++) {
		register_setting('seos', 'seos_sticky_color_sheme'.$i);
		register_setting('seos', 'seos_sticky_color_text'.$i);	
		register_setting('seos', 'seos_sticky_'.$i );	
		register_setting('seos', 'seos_sticky_url_'.$i);
	}
	
}


/*********************** Admin Scripts and Styles **************************/


function seo_s_admin_enqueue_scripts() {
	wp_enqueue_style( 'seo_s-admin-css', plugin_dir_url(__FILE__) . '/css/admin.css' );
    wp_enqueue_script( 'jquery-ui-datepicker' );
    wp_enqueue_script( 'seos-note-datepicker', plugin_dir_url(__FILE__) . '/js/datepicker.js');
    wp_enqueue_style( 'seos-note-jquery-ui', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );		
	wp_enqueue_style( 'seos-note-admin-css', plugin_dir_url(__FILE__) . '/css/note.css');	
	wp_enqueue_style( 'seos-sticky-admin-css', plugin_dir_url(__FILE__) . '/css/sticky.css');
	wp_enqueue_style( 'seos-sticky-admin-font-css', '//fonts.googleapis.com/css?family=Caveat&display=swap');
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'seos-note-script-picker', plugins_url('my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );	
	
	
}
 
add_action( 'admin_enqueue_scripts', 'seo_s_admin_enqueue_scripts' );	


/*********************** Scripts and Styles **************************/

			
function seo_s_enqueue_scripts() {
	wp_enqueue_style( 'sticky-front-css', plugin_dir_url(__FILE__) . '/css/sticky-front.css');
	wp_enqueue_style( 'sticky-admin-font-css', '//fonts.googleapis.com/css?family=Caveat&display=swap');	
}
 
add_action( 'wp_enqueue_scripts', 'seo_s_enqueue_scripts' );

/*********************** Slider Settings **************************/	
		
function seo_s_settings_page() {
?>

    <div class="wrap seos-s">
			<div>
				<a target="_blank" href="https://seosthemes.com/">
					<div class="btn s-red">
						 <?php _e('SEOS', 'seos'); echo ' <img class="ss-logo" src="' . plugins_url( 'images/logo.png' , __FILE__ ) . '" alt="logo" />';  _e(' THEMES', 'seos'); ?>
					</div>
				</a>
			</div>	
	
		<h1><img class="ss-logo" src="<?php echo plugins_url( 'images/logo.png' , __FILE__ ); ?>" alt="logo" /> <?php _e('SEOS', 'seos'); ?></h1>
	<?php include_once(plugin_dir_path(__FILE__) . 'inc/form.php'); ?>
	</div>
	
	<?php } 
	
	function seo_s_language_load() {
		load_plugin_textdomain('seo_s_language_load', FALSE, basename(dirname(__FILE__)) . '/languages');
	}
	add_action('init', 'seo_s_language_load');
	
	/* Add dashboard position. */
					function seos_notes_dashboard_setup_function() {
						add_meta_box( 'my_dashboard_widget', 'Notes Dashboard Widget', 'seos_notes_dashboard_widget_function', 'dashboard', 'side', 'high' );
					}
					add_action( 'wp_dashboard_setup', 'seos_notes_dashboard_setup_function' );
				 
				/**
				 * Output the contents of the dashboard widget
				 */
					function seos_notes_dashboard_widget_function() {
						for($i=1;$i<=8; $i++) {
							if(get_option('seos_note_name_'.$i)) { ?>
								<p class="new-custom-note" <?php if((get_option('seos_note_datepicker_'.$i) <= date_i18n( 'Y-m-d' ) and get_option('seos_note_datepicker_'.$i) !="") or get_option('seos_note_datepicker_'.$i) == "This date has already passed") { echo "style='background: red;'"; } ?>>
								<?php _e('Note: '.$i.' ', 'seos'); ?>
								<?php echo esc_html(get_option('seos_note_name_'.$i)); ?>
								</p>
							<?php
							}
						}
					}
