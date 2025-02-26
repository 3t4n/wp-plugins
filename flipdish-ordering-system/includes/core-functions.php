<?php // Flipdish Ordering - Core functionality

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {

	die;

}

/*
 * Remove conflict
 */
function remove_exactmetrics_conflict()
{
    return;
}

/**
 * Create shortcode content
 * @since 1.3.0 Display store banner, fix 1 being displayed and add initial screen and header and footer display on mobile support
 * @since 1.4.0 Fix warning messages on store banner and portal id and fix init screen and mobile setting not working
 * @since 1.4.2 Display version number
 * @since 1.4.3 Fix headers already sent issue
 */

add_shortcode( 'flipdish_ordering', 'flipdish_ordering_system' );

function flipdish_ordering_system() {

	$output  = '';
	$options = get_option( 'flipdish_ordering_options', flipdish_ordering_options_default() );

	if ( ! isset( $options['fd_portal_id'] ) || '' === $options['fd_portal_id'] ) {

		return $output .= '<div>
					<h2>You must enter a Flipdish AppID</h2>
					<p><a href="https://help.flipdish.com/en/articles/4175488-how-to-find-your-appid" rel="noopener noreferrer" target="_blank">Learn how to get your Flipdish AppID here.</a></p>
					<hr />
					<p>Thank you for choosing <strong>Flipdish</strong>.</p>
					</div>';
	} else {

		// Main ordering system div
		$output .=  '<div 
					data-plugin-version="' . FLIPDISH_ORDERING_VERSION . '"
					data-offset="' . esc_attr( $options['fd_data_offset_value'] ) . '" 
					' . ( 'menu' === $options['fd_initial_screen'] ? 'data-initial-screen="menu"' : '' ) . '
					' . ( 1 === $options['fd_mobile_full_screen'] ? 'data-full-screen-on-mobile="false"' : '' ) . '
					id="flipdish-menu"
					data-restaurant="' . esc_attr( $options['fd_portal_id'] ) . '">
					</div>';

		// Production Web Ordering Script
		wp_enqueue_script( 'flipdish_production_web_ordering' );

		// Transparent background
		if ( isset( $options['fd_new_web_ordering'] ) && 1 === $options['fd_new_web_ordering'] ) {
			wp_enqueue_style( 'flipdish_production_web_ordering_transparent_background' );
		}
		return $output;
	}

}


$url = $_SERVER['REQUEST_URI'];
$tag = array("order","order-online","pedidos-online","bestellen","pedido-online","pide-online","store","delivery","commander","pedido","online-bestellen","commander-en-lign",
			"ordina-online","bestel-online","commander-en-ligne","delivery");
			
foreach($tag as $t){
	if (strpos($url, $t) == false){
		//
	}else{
	add_filter('exactmetrics_get_v4_id', 'remove_exactmetrics_conflict', 1);  
	add_filter('monsterinsights_get_v4_id', 'remove_exactmetrics_conflict', 1);
	add_filter('monsterinsights_get_ua', 'remove_exactmetrics_conflict', 1);
	add_filter('exactmetrics_get_ua', 'remove_exactmetrics_conflict', 1);
	}
}

/**
 * Front-end web ordering scripts
 * @since 1.4.3 Register production web ordering scripts & styles
 * @since 1.4.4 Fix register style issue
 * @since 1.4.5 Include common fixes css
 */
function front_end_web_ordering_scripts() {
	wp_register_script( 'flipdish_production_web_ordering', 'https://web-order.flipdish.co/client/productionwlbuild/latest/static/js/main.js', true );
	wp_register_style( 'flipdish_production_web_ordering_transparent_background', plugin_dir_url( __FILE__ ) . 'flipdish-ordering-transparent-styles.css', false, '1.0.0', 'all' );

	// Common fixes css
	wp_enqueue_style( 'flipdish_production_web_ordering_common_fixes', plugin_dir_url( __FILE__ ) . 'common-fixes.css', false, '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'front_end_web_ordering_scripts' );

/**
 * Additional CSS 
 */
function fd_add_css(){
	$options = get_option( 'flipdish_ordering_options', flipdish_ordering_options_default() );
	$additionalcss = $options['fd_add_css'];;
	
	?>
		<style id="fd_add_css"><?php echo $additionalcss ?></style>
	<?php
}
add_action('wp_head', 'fd_add_css');

/**
 * New Ordering System cH
 */
function fd_add_new_ordering_stylesheet(){
	$options = get_option( 'flipdish_ordering_options', flipdish_ordering_options_default() );

	if ( isset( $options['fd_new_web_ordering'] ) ){
		?>
		<!-- FD NEW STYLESHEET ENABLED -->
		 <link rel="stylesheet" href="https://d2bzmcrmv4mdka.cloudfront.net/production/ordering-system/chromeExtension/production-v1.min.css">
	<?php
	}else{
		?>
		<!-- FD NEW STYLESHEET DISABLED -->
	<?php
	}
}
add_action('wp_head', 'fd_add_new_ordering_stylesheet');
