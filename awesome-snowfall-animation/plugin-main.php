<?php
/**
 * Plugin Name: Awesome Snowfall Animation
 * Plugin URI: http://www.a1lrsrealtyservices.com/plugindemo/
 * Description: Awesome Snowfall Animation is a Nice looking Snowfall animation plugin and fully customizable plugin. you can easily add Snowfall animation in your website.
 * Author: Asiancoders
 * Author URI: http://asiancoders.com
 * Version: 1.0.0
 * Text Domain: asiancodersasa_text
 *
 * Copyright 2015  Jillur Rahman  (email : perfectjillur@gmail.com)
 */

// Prevent direct file access
if( ! defined( 'ABSPATH' ) ) {
	die();
}

/**
 * Register text domain
 */
function asiancodersasa_textdomain_register() {
	load_plugin_textdomain( 'asiancodersasa_text', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'init', 'asiancodersasa_textdomain_register' );


/**
 * Print direct link to Custom Styles admin page
 * and inserts a link to the Custom Styles admin page
 */
function asiancodersasa_plugin_settings_link( $links ) {
	$settings_page = '<a href="' . admin_url( 'options-general.php?page=snow-settings' ) .'">' . __( 'Settings', 'asiancodersasa_text' ) . '</a>';
	array_unshift( $links, $settings_page );
	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'asiancodersasa_plugin_settings_link' );


/**
 * Delete options on uninstall
 */
function asiancodersasa_unistall_function() {
    delete_option( 'asiancodersasa_options' );
}
register_uninstall_hook( __FILE__, 'asiancodersasa_unistall_function' );


// enqueue_scripts
	function asinacodersasa_enqueu_seripts() {
		wp_enqueue_script('letItSnow-js', plugin_dir_url(__FILE__) . 'inc/js/letItSnow.min.js', array('jquery'), NULL, true);
		wp_enqueue_script( 'jquery-effects-core');
	}

add_action('wp_enqueue_scripts', 'asinacodersasa_enqueu_seripts');


// admin_enqueue_scripts
function asinacodersasa_admin_enqueu_seripts() {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugin_dir_url(__FILE__) . 'inc/js/color-pickr.js', array( 'wp-color-picker' ), false, true );
}
add_action( 'admin_enqueue_scripts', 'asinacodersasa_admin_enqueu_seripts' );


// add option in wp menu
function add_asiancodersasa_options_framwrork()  
{  
	add_options_page( __( ' Awesome SnowSnowfall Animation', 'asiancodersasa_text' ), __( 'Snowfall Options', 'asiancodersasa_text' ), 'manage_options', 'snow-settings','asiancodersasa_options_framwrork');
}  
add_action('admin_menu', 'add_asiancodersasa_options_framwrork');


// Default options values
$asiancodersasa_options = array(
	'asa_snow_color' => '#27ae60',
	'asa_snow_width' => '300',
	'asa_max_snow_content' => '200',	
	'asa_start_min_size' => '1',	
	'asa_start_max_size' => '5',
	'asa_show_fall_time' => '10000',
	'asa_easing_xone' => 'easeOutElastic',
	'asa_easing_ytwo' => 'easeInCubic',
);

if ( is_admin() ) : // Load only if we are viewing an admin page

function asiancodersasa_register_settings() {
	// Register settings and call sanitation functions
	register_setting( 'asiancodersasa_p_options', 'asiancodersasa_options', 'asiancodersasa_validate_options' );
}

add_action( 'admin_init', 'asiancodersasa_register_settings' );




// Function to generate options page
function asiancodersasa_options_framwrork() {
	global $asiancodersasa_options;

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false; // This checks whether the form has just been submitted. ?>

	<div class="wrap">
	
		<h2><?php _e( 'Awesome Snowfall Animation Options', 'asiancodersasa_text' ) ?></h2>

		<?php if ( false !== $_REQUEST['updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'asiancodersasa_text' ); ?></strong></p></div>
		<?php endif; // If the form has just been submitted, this shows the notification ?>

		<form method="post" action="options.php">

			<?php $settings = get_option( 'asiancodersasa_options', $asiancodersasa_options ); ?>
			
			<?php settings_fields( 'asiancodersasa_p_options' );
			/* This function outputs some hidden fields required by the form,
			including a nonce, a unique number used to ensure the form has been submitted from the admin page
			and not somewhere else, very important for security */ ?>

			
			<table class="form-table">

				<tr valign="top">
					<th scope="row"><label for="asa_snow_color"> <?php _e( 'Snowfall color', 'asiancodersasa_text' ) ?> </label></th>
					<td>
						<input id="asa_snow_color" type="text" name="asiancodersasa_options[asa_snow_color]" value="<?php echo stripslashes($settings['asa_snow_color']); ?>" class="my-color-field" /><p class="description"> <?php _e( 'Select Snowfall color here. You get nice flat color for your website: <a href="https://flatuicolors.com/" target="_blink">click here</a>.', 'asiancodersasa_text' ) ?></p>
					</td>
				</tr>
				
				<tr valign="top">
					<th scope="row"><label for="asa_snow_width"> <?php _e( 'Snowfall wind', 'asiancodersasa_text' ) ?></label></th>
					<td>
						<input id="asa_snow_width" type="text" name="asiancodersasa_options[asa_snow_width]" value="<?php echo stripslashes($settings['asa_snow_width']); ?>" /><p class="description"> <?php _e( 'Horizontal movement of Snowfalls, This will be count pixel. Only number allowed for Example: 500', 'asiancodersasa_text' ) ?></p>
					</td>
				</tr>
				
				<tr valign="top">
					<th scope="row"><label for="asa_max_snow_content"> <?php _e( 'Total Snowfall content', 'asiancodersasa_text' ) ?></label></th>
					<td>
						<input id="asa_max_snow_content" type="text" name="asiancodersasa_options[asa_max_snow_content]" value="<?php echo stripslashes($settings['asa_max_snow_content']); ?>" /><p class="description"> <?php _e( 'max amount of Snowfalls. Only number allowed for Example: 100', 'asiancodersasa_text' ) ?></p>
					</td>
				</tr>
				
				<tr valign="top">
					<th scope="row"><label for="asa_start_min_size"> <?php _e( 'Minimax Snowfall size', 'asiancodersasa_text' ) ?></label></th>
					<td>
						<input id="asa_start_min_size" type="text" name="asiancodersasa_options[asa_start_min_size]" value="<?php echo stripslashes($settings['asa_start_min_size']); ?>" /><p class="description"> <?php _e( 'Minimax Snowfall size, Snowfall size Only number allowed for Example: 1', 'asiancodersasa_text' ) ?></p>
					</td>
				</tr>
				
				<tr valign="top">
					<th scope="row"><label for="asa_start_max_size"> <?php _e( 'Maximum Snowfall size', 'asiancodersasa_text' ) ?></label></th>
					<td>
						<input id="asa_start_max_size" type="text" name="asiancodersasa_options[asa_start_max_size]" value="<?php echo stripslashes($settings['asa_start_max_size']); ?>" /><p class="description"> <?php _e( 'Maximum Snowfalls size, Snowfall size Only number allowed for Example: 5', 'asiancodersasa_text' ) ?></p>
					</td>
				</tr>
				
				<tr valign="top">
					<th scope="row"><label for="asa_show_fall_time"> <?php _e( 'Snowfall speed', 'asiancodersasa_text' ) ?></label></th>
					<td>
						<input id="asa_show_fall_time" type="text" name="asiancodersasa_options[asa_show_fall_time]" value="<?php echo stripslashes($settings['asa_show_fall_time']); ?>" /><p class="description"> <?php _e( 'Type time in milliseconds. 1 seconds=10000 milliseconds, for Example 10000, ', 'asiancodersasa_text' ) ?></p>
					</td>
				</tr>	
				
				<tr valign="top">
					<th scope="row"><label for="asa_easing_xone"> <?php _e( 'Horizontal effect', 'asiancodersasa_text' ) ?></label></th>
					<td>
						<input id="asa_easing_xone" type="text" name="asiancodersasa_options[asa_easing_xone]" value="<?php echo stripslashes($settings['asa_easing_xone']); ?>" /><p class="description"> <?php _e( 'Horizontal easing effect, Your get easing effect here: <a href="http://easings.net/" target="_blink">Click Here</a> For Example: easeInQuart', 'asiancodersasa_text' ) ?>. </p>
					</td>
				</tr>		
				
				<tr valign="top">
					<th scope="row"><label for="asa_easing_ytwo"> <?php _e( 'Vertical effect', 'asiancodersasa_text' ) ?></label></th>
					<td>
						<input id="asa_easing_ytwo" type="text" name="asiancodersasa_options[asa_easing_ytwo]" value="<?php echo stripslashes($settings['asa_easing_ytwo']); ?>" /><p class="description"> <?php _e( 'Vertical easing effect, Your get easing effect here: <a href="http://easings.net/" target="_blink">Click Here</a> For Example: easeInOutBounce', 'asiancodersasa_text' ) ?>. </p>
					</td>
				</tr>	

					
			</table>
			<p class="submit"><input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'asiancodersasa_text' ) ?>" /></p>
		</form>
	</div>  <!-- end wrap -->

	<?php
}

function asiancodersasa_validate_options( $input ) {
	global $asiancodersasa_options;

	$settings = get_option( 'asiancodersasa_options', $asiancodersasa_options );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS

	$input['asa_snow_color'] = wp_filter_post_kses( $input['asa_snow_color'] );
	$input['asa_snow_width'] = wp_filter_post_kses( $input['asa_snow_width'] );
	$input['asa_max_snow_content'] = wp_filter_post_kses( $input['asa_max_snow_content'] );
	$input['asa_start_min_size'] = wp_filter_post_kses( $input['asa_start_min_size'] );
	$input['asa_start_max_size'] = wp_filter_post_kses( $input['asa_start_max_size'] );
	$input['asa_show_fall_time'] = wp_filter_post_kses( $input['asa_show_fall_time'] );
	$input['asa_easing_xone'] = wp_filter_post_kses( $input['asa_easing_xone'] );
	$input['asa_easing_ytwo'] = wp_filter_post_kses( $input['asa_easing_ytwo'] );

	return $input;
}

endif;  // EndIf is_admin()


function asiancodersasa_custom_scrollbar_active() {?>

<?php global $asiancodersasa_options; $asiancodersasa_settings = get_option( 'asiancodersasa_options', $asiancodersasa_options ); ?>

<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('body').letItSnow({
		 color: "<?php echo $asiancodersasa_settings['asa_snow_color']; ?>",
		 wind: <?php echo $asiancodersasa_settings['asa_snow_width']; ?>,
		 maxcount: <?php echo $asiancodersasa_settings['asa_max_snow_content']; ?>,
		 size_min: <?php echo $asiancodersasa_settings['asa_start_min_size']; ?>,
		 size_max: <?php echo $asiancodersasa_settings['asa_start_max_size']; ?>,
		 fall_time: <?php echo $asiancodersasa_settings['asa_show_fall_time']; ?>,
		 easing_x: "<?php echo $asiancodersasa_settings['asa_easing_xone']; ?>",
		 easing_y: "<?php echo $asiancodersasa_settings['asa_easing_ytwo']; ?>",
		 zindex: 99999999
		});
	});
</script>

<?php
}

add_action('wp_footer', 'asiancodersasa_custom_scrollbar_active', 100);

?>