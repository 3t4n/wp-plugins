<?php
/*
Plugin Name: SN Scroll To Up
Plugin URI: http://isolutionbd.com/plugins/my-plugins/
Description: This plugin will be able to add a Scroll To Up Button in your Webside easily and so quickly.
Author: Syed Numan Ahmed
Author URI: 
Version: 1.0
*/


/* Adding Latest jQuery from Wordpress */
function sn_scrollup_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'sn_scrollup_latest_jquery');

function sn_scrollup_files() {
/*Some Set-up*/

define('SN_SCROLLUP_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );

/* Adding Plugin javascript file */
wp_enqueue_script('SN-scrollup-plugin-script', SN_SCROLLUP_PLUGIN_PATH.'js/jquery.scrollUp.min.js', array('jquery'));
wp_enqueue_script('SN-easing-plugin-script', SN_SCROLLUP_PLUGIN_PATH.'js/jquery.easing.js', array('jquery'));


wp_enqueue_style('SN-fonts-css', SN_SCROLLUP_PLUGIN_PATH.'css/font-awesome.css');
wp_enqueue_style('SN-scroll-css', SN_SCROLLUP_PLUGIN_PATH.'css/style.css');


}
add_action('wp_enqueue_scripts', 'sn_scrollup_files');





// 1. Add Option menu or page by function..
//functions explanation ..
function snscrollup_options() {
	add_menu_page( 'Sn Scroll UP Option Page', 'Sn Scrollup Options', 'manage_options', 'sn-scrollup-option-page', 'sn_scrollup_options_page_function', plugins_url( 'sn-scroll-to-up/img/icon.png' ));
}
add_action('admin_menu', 'snscrollup_options');

// 3. Add default value array. 
$sn_scrollup_options_default = array(
	'scroll_speed' => '300',
	'scroll_distance' => '300',
	'animation_speed' => '200',
	'icon_color' => '#fff',
	'scroll_title' => 'test',
	'scroll_icon' => 'chevron-up',
	'scroll_icon_h_w' => '38px',
	'scroll_icon_right' => '20px',
	'scroll_icon_bottom' => '20px',
	'scroll_icon_border' => '10px',
	'scroll_icon_f_size' => '30px',
	'scroll_icon_f_size_p' => '0px',
	'scroll_icon_f_color' => 'red',
);


if ( is_admin() ) : // Load only if we are viewing an admin page

// 2. Add setting option by used function. 
function snscrollup_register_settings() {
	// Register settings and call sanitation functions
	// 4. Add register setting. 
	register_setting( 'sn_scrollup_options', 'sn_scrollup_options_default', 'sn_scrollup_validate_options' );
}

add_action( 'admin_init', 'snscrollup_register_settings' );

//its for add_menu_page a je function nici tar name function

function sn_scrollup_options_page_function() {?>
	<!-- Drank some coffe! you are working with 1960's table -->
	
	
	<?php // 5. Add settings API hook under form action.  ?>
	<?php global $sn_scrollup_options_default;

	//ar maddome submit korle upore update leka dekabe jar maddome user simply bujte parbe je update hoise...
	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false; // This checks whether the form has just been submitted. 

	?>
	
	<div class="warp">
		<h2>Sn Scroll To Up Options</h2>
		
		<?php if ( false !== $_REQUEST['updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
		<?php endif; // If the form has just been submitted, this shows the notification ?>		
		
		<form action="options.php" method="post">
		
		
		<?php // 5. Add settings API hook under form action.  ?>
		<?php $settings = get_option( 'sn_scrollup_options_default', $sn_scrollup_options_default ); ?>
		
		<?php settings_fields( 'sn_scrollup_options' ); ?>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">
						<label for="scroll_speed">Scroll Speed</label>
					</th>
					<td>
						<input id="scroll_speed" type="text" name="sn_scrollup_options_default[scroll_speed]"
						value="<?php echo stripslashes($settings['scroll_speed']); ?>" />
						<p class="description">Type your scroll Speed top to bottom (ms) just numerical number Ex:200</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="scroll_distance">Scroll Distance</label>
					</th>
					<td>
						<input id="scroll_distance" type="text" name="sn_scrollup_options_default[scroll_distance]"
						value="<?php echo stripslashes($settings['scroll_distance']); ?>" />
						<p class="description">Type your scroll distance from top (ms) just numerical number Ex:300</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="animation_speed">Scroll Animation Speed</label>
					</th>
					<td>
						<input id="animation_speed" type="text" name="sn_scrollup_options_default[animation_speed]"
						value="<?php echo stripslashes($settings['animation_speed']); ?>" />
						<p class="description">Type your scroll Animation Speed top to bottom (ms) just numerical number Ex:500</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="scroll_title">Scroll Title</label>
					</th>
					<td>
						<input id="scroll_title" type="text" name="sn_scrollup_options_default[scroll_title]"
						value="<?php echo stripslashes($settings['scroll_title']); ?>" />
						<p class="description">Type your scroll Title if you want. Default : Test</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="icon_color">Scroll Background Color</label>
					</th>
					<td>
						<input id="icon_color" class="color-field" type="text" name="sn_scrollup_options_default[icon_color]"
						value="<?php echo stripslashes($settings['icon_color']); ?>" />
						<p class="description">Select your scrollbar background color. Default color is #fff</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="scroll_icon">Scroll Icon</label>
					</th>
					<td>
						<input id="scroll_icon" type="text" name="sn_scrollup_options_default[scroll_icon]"
						value="<?php echo stripslashes($settings['scroll_icon']); ?>" />
						<p class="description">You can easily change font awesome. just <a href="http://fortawesome.github.io/Font-Awesome/icons/">Click here</a>
							just copy font-name and past here.
						</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="scroll_icon_h_w">Height and Width</label>
					</th>
					<td>
						<input id="scroll_icon_h_w" type="text" name="sn_scrollup_options_default[scroll_icon_h_w]"
						value="<?php echo stripslashes($settings['scroll_icon_h_w']); ?>" />
						<p class="description">You just type scroll up background height and width. Default: 38px</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="scroll_icon_right">Scroll up Right</label>
					</th>
					<td>
						<input id="scroll_icon_right" type="text" name="sn_scrollup_options_default[scroll_icon_right]"
						value="<?php echo stripslashes($settings['scroll_icon_right']); ?>" />
						<p class="description">You just type scroll up distance form Right. Default: 20px</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="scroll_icon_bottom">Scroll up Bottom</label>
					</th>
					<td>
						<input id="scroll_icon_bottom" type="text" name="sn_scrollup_options_default[scroll_icon_bottom]"
						value="<?php echo stripslashes($settings['scroll_icon_bottom']); ?>" />
						<p class="description">You just type scroll up distance form bottom. Default: 20px</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="scroll_icon_border">Scroll up Border Radius</label>
					</th>
					<td>
						<input id="scroll_icon_border" type="text" name="sn_scrollup_options_default[scroll_icon_border]"
						value="<?php echo stripslashes($settings['scroll_icon_border']); ?>" />
						<p class="description">You just type scroll up Border radius. Default: 10px</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="scroll_icon_f_size">Scroll up Font Size</label>
					</th>
					<td>
						<input id="scroll_icon_f_size" type="text" name="sn_scrollup_options_default[scroll_icon_f_size]"
						value="<?php echo stripslashes($settings['scroll_icon_f_size']); ?>" />
						<p class="description">You just type scroll up font size. Default: 30px</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="scroll_icon_f_size_p">Scroll up Font Size Padding</label>
					</th>
					<td>
						<input id="scroll_icon_f_size_p" type="text" name="sn_scrollup_options_default[scroll_icon_f_size_p]"
						value="<?php echo stripslashes($settings['scroll_icon_f_size_p']); ?>" />
						<p class="description">You just type scroll up font size Padding. Default: 0px</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="scroll_icon_f_color">Scroll up Font Color</label>
					</th>
					<td>
						<input id="scroll_icon_f_color" class="color-field" type="text" name="sn_scrollup_options_default[scroll_icon_f_color]"
						value="<?php echo stripslashes($settings['scroll_icon_f_color']); ?>" />
						<p class="description">You just type scroll up font size Padding. Default: 0px</p>
					</td>
				</tr>
				

				
					
			</tbody>
			
			<tr>
				<td align="center"><input type="submit" class="button-secondary" name="sn_scrollup_options_default[back_as_default]" value="Back as default" /></td>
				<td colspan="2"><input type="submit" class="button-primary" value="Save Settings" /></td>
			</tr>
			
		</table>
		
		
		</form>
	</div>
	
<?php
	
}


// 6. Add validate options. 
function sn_scrollup_validate_options( $input ) {
	global $sn_scrollup_options_default;

	$settings = get_option( 'sn_scrollup_options_default', $sn_scrollup_options_default );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS

	// 7. Add specific form name & id & add them in validate option.
	
	$input['scroll_speed'] = isset( $input['back_as_default'] ) ? '300' : wp_filter_post_kses( $input['scroll_speed'] );
	$input['scroll_distance'] = isset( $input['back_as_default'] ) ? '300' : wp_filter_post_kses( $input['scroll_distance'] );
	$input['animation_speed'] = isset( $input['back_as_default'] ) ? '200' : wp_filter_post_kses( $input['animation_speed'] );
	$input['icon_color'] = isset( $input['back_as_default'] ) ? '#fff' : wp_filter_post_kses( $input['icon_color'] );
	$input['scroll_title'] = isset( $input['back_as_default'] ) ? 'test' : wp_filter_post_kses( $input['scroll_title'] );
	$input['scroll_icon'] = isset( $input['back_as_default'] ) ? 'chevron-up' : wp_filter_post_kses( $input['scroll_icon'] );
	$input['scroll_icon_bottom'] = isset( $input['back_as_default'] ) ? '20px' : wp_filter_post_kses( $input['scroll_icon_bottom'] );
	$input['scroll_icon_right'] = isset( $input['back_as_default'] ) ? '20px' : wp_filter_post_kses( $input['scroll_icon_right'] );
	$input['scroll_icon_h_w'] = isset( $input['back_as_default'] ) ? '38px' : wp_filter_post_kses( $input['scroll_icon_h_w'] );
	$input['scroll_icon_border'] = isset( $input['back_as_default'] ) ? '10px' : wp_filter_post_kses( $input['scroll_icon_border'] );
	$input['scroll_icon_f_size'] = isset( $input['back_as_default'] ) ? '30px' : wp_filter_post_kses( $input['scroll_icon_f_size'] );
	$input['scroll_icon_f_size_p'] = isset( $input['back_as_default'] ) ? '0px' : wp_filter_post_kses( $input['scroll_icon_f_size_p'] );
	$input['scroll_icon_f_color'] = isset( $input['back_as_default'] ) ? 'red' : wp_filter_post_kses( $input['scroll_icon_f_color'] );


	return $input;
}




endif;  // EndIf is_admin()






function snscrollup_active() {?>

<?php global $sn_scrollup_options_default; $settings = get_option( 'sn_scrollup_options_default', $sn_scrollup_options_default ); ?>


<script type="text/javascript">
	jQuery(document).ready(function() {
		    jQuery.scrollUp({
        scrollName: 'snscrollUp',      // Element ID
        scrollDistance: <?php echo $settings['scroll_distance']; ?>,         // Distance from top/bottom before showing element (px)
        scrollFrom: 'top',           // 'top' or 'bottom'
        scrollSpeed: <?php echo $settings['scroll_speed']; ?>,            // Speed back to top (ms)
        easingType: 'linear',        // Scroll to top easing (see http://easings.net/)
        animation: 'fade',           // Fade, slide, none
        animationSpeed:<?php echo $settings['animation_speed']; ?>,         // Animation speed (ms)
        scrollTrigger: false,        // Set a custom triggering element. Can be an HTML string or jQuery object
        scrollTarget: false,         // Set a custom target element for scrolling to. Can be element or number
        scrollText: '<div class="sscroll_icon"><i class="fa fa-<?php echo $settings['scroll_icon']; ?>"></i></div>', // Text for element, can contain HTML
        scrollTitle: '<?php echo $settings['scroll_title']; ?>',          // Set a custom <a> title if required.
        scrollImg: false,            // Set true to use image
        activeOverlay: '#3498db',        // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        zIndex: 2147483647           // Z-Index for the overlay
    });
	
	
	
	});	
		</script>
<?php		
}
add_action('wp_head', 'snscrollup_active');	


function sn_get_plugin_css() {
?>
<?php global $sn_scrollup_options_default; $settings = get_option( 'sn_scrollup_options_default', $sn_scrollup_options_default ); ?>

<style type="text/css">
#snscrollUp{
background-color:<?php echo $settings['icon_color']; ?> !important; 
bottom: <?php echo $settings['scroll_icon_bottom']; ?>;
height: <?php echo $settings['scroll_icon_h_w']; ?>;
right: <?php echo $settings['scroll_icon_right']; ?>;
width: <?php echo $settings['scroll_icon_h_w']; ?>;
border-radius: <?php echo $settings['scroll_icon_border']; ?>;
}

.sscroll_icon i{
color: <?php echo $settings['scroll_icon_f_color']; ?>;
font-size: <?php echo $settings['scroll_icon_f_size']; ?>;
padding:<?php echo $settings['scroll_icon_f_size_p']; ?>;
}

</style>

<?php
}	

add_action('wp_head', 'sn_get_plugin_css');



//for enable colorpicker....

add_action( 'admin_enqueue_scripts', 'sn_add_color_picker' );
function sn_add_color_picker( $hook ) {
 
    if( is_admin() ) {
     
        // Add the color picker css file      
        wp_enqueue_style( 'wp-color-picker' );
         
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'custom-script-handle', plugins_url( 'js/custom-color.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
    }
}


?>