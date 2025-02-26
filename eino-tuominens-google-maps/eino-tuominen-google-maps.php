<?php
/*
Plugin Name: Eino Tuominen's Google Maps
Plugin URI:
Description: Simple maps plugin with editable polygons and markers
Author: Eino Tuominen
Author URI:
Version: 0.0 Alpha
*/


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_public_scripts() {
	//wp_enqueue_style( 'style-name', get_stylesheet_uri() );
	//wp_register_script( 'etgm_google_maps_script', 'https://maps.googleapis.com/maps/api/js?libraries=drawing&sensor=false' );
	//wp_register_script( 'etgm_google_maps_software_script', plugins_url( 'include/js/gmaps.js', __FILE__ ) );

	wp_enqueue_script( 'etgm_google_maps_api_v3', 'https://maps.googleapis.com/maps/api/js?sensor=false');
	wp_enqueue_script( 'script-name', plugins_url( 'include/js/gmaps_public.js', __FILE__ ) );
}

add_action( 'wp_enqueue_scripts', 'etgm_public_scripts' );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_shortcode( $atts ) {

	extract( shortcode_atts( array(
		'map_id' => '',
	), $atts ) );

	if ( $map_id ) {

		$options = etgm_get_options(); 
		$all_map_data = json_decode( $options['map_json'], true );

		$selected_map_data = array();

		for ( $i = 0; $i < count ( $all_map_data ); $i++ ) {
			if ( $all_map_data[$i]['map_uniqid'] == $map_id ) {
				$selected_map_data = $all_map_data[$i];
				break;
			}
		}

		$selected_map_data_json = addslashes( json_encode( $selected_map_data ) );
		
		ob_start(); ?>
			
			<div id="map-canvas-<?php echo $map_id ?>" class="etgm-map-container"></div>
			<div id="map-shape-description-<?php echo $map_id ?>" class="etgm-map-shape-description-container"></div>

			<script type="text/javascript">
				var map_json = JSON.parse ( "<?php print $selected_map_data_json; ?>" );
				etgm_init_public_map("<?php echo $map_id ?>");
				/*console.log (map_json);*/
			</script>

		<?php
		return ob_get_clean();
	}

	return '';

}
add_shortcode( 'etgm', 'etgm_shortcode' );

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_get_options () {

	static $s_options;

	if ( !$s_options )
		$s_options = get_option('etgm_settings');

	return $s_options;

}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
function etgm_add_map($content) {
 
	if(is_singular()) {
		$extra_content = '<div class="etgm-map-container"> This is where a map should be</div>';
		$content .= $extra_content;
	}
	return $content;
}
add_filter('the_content', 'etgm_add_map');
*/


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_load_scripts() {
	if(is_singular()) {
		wp_enqueue_style('etgm-styles', plugin_dir_url( __FILE__ ) . 'css/plugin_styles.css');
	}
}
add_action('wp_enqueue_scripts', 'etgm_load_scripts');



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_options_page() {

	$options = etgm_get_options();


	
	ob_start(); ?>

	    <script type="text/javascript">
      
    </script>

	<div class="wrap">
		<h2><?php _e('Eino Tuominen\'s Google Maps', 'etgm_domain'); ?></h2>
 		
 		<div id="etgm-map-software-container">

 		</div>

 		

		<form method="post" action="options.php">
 
			<?php settings_fields('etgm_settings_group'); ?>
 
			<h4 style="display: none;"><?php _e('Map data', 'etgm_domain'); ?></h4>
			<p>
				<label class="description" for="etgm_settings[map_json]" style="display: none;"><?php _e('Generated map data', 'etgm_domain'); ?></label>
				<textarea id="etgm_settings[map_json]" rel="map_json" name="etgm_settings[map_json]" style="display: none;"><?php echo $options['map_json']; ?></textarea>
			</p>
 
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save maps', 'etgm_domain'); ?>" />
			</p>
 
		</form>

		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="margin-top: 30px;">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="7K7YF69FBRC22">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

 
	</div>
	<?php
	echo ob_get_clean();
}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_add_options_link() {
	$page_hook_suffix = add_options_page('Eino Tuominen\'s Google Maps plugin', 'ET\'s Google Maps', 'edit_pages', 'etgm-options', 'etgm_options_page');

	add_action('admin_print_scripts-' . $page_hook_suffix, 'etgm_admin_scripts');
}
add_action('admin_menu', 'etgm_add_options_link');



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_register_settings() {
	// creates our settings in the options table
	register_setting('etgm_settings_group', 'etgm_settings');
		
	wp_register_script( 'etgm_google_maps_script', 'https://maps.googleapis.com/maps/api/js?libraries=drawing&sensor=false' );
	wp_register_script( 'etgm_google_maps_software_script', plugins_url( 'include/js/gmaps.js', __FILE__ ) );

	wp_register_style( 'etgm_google_maps_style', plugins_url( 'css/plugin_styles.css', __FILE__ ) ); 

}
add_action('admin_init', 'etgm_register_settings');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function etgm_admin_scripts() {
	/* Link our already registered script to a page */
	wp_enqueue_script( 'etgm_google_maps_script' );
	wp_enqueue_script( 'etgm_google_maps_software_script' );
	wp_enqueue_style( 'etgm_google_maps_style' );

}