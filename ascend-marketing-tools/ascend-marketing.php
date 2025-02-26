<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://ascendmarketingnow.com/ascend-marketing-tools-plugin
 * @since             2.0
 * @package           Ascend_Marketing
 *
 * @wordpress-plugin
 * Plugin Name:       Ascend Marketing Tools
 * Plugin URI:        http://ascendmarketingnow.com/ascend-marketing-tools-plugin
 * Description:       20% Higher-conversion footer CTA links, header code injector, and more.
 * Version:           1.0.2
 * Author:            Ascend Marketing and Consulting
 * Author URI:        http://ascendmarketingnow.com/ascend-marketing-tools-plugin
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ascend-marketing
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'PLUGIN_VERSION', '2.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ascend-marketing-activator.php
 */
function activate_ascend_marketing() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ascend-marketing-activator.php';
	Ascend_Marketing_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ascend-marketing-deactivator.php
 */
function deactivate_ascend_marketing() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ascend-marketing-deactivator.php';
	Ascend_Marketing_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ascend_marketing' );
register_deactivation_hook( __FILE__, 'deactivate_ascend_marketing' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ascend-marketing.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.2
 */

//Add settings link to plugins page
add_filter( 'plugin_action_links', 'ttt_wpmdr_add_action_plugin', 10, 5 );
function ttt_wpmdr_add_action_plugin( $actions, $plugin_file ) 
{
	static $plugin;

	if (!isset($plugin))
		$plugin = plugin_basename(__FILE__);
	if ($plugin == $plugin_file) {

			$settings = array('settings' => '<a href="admin.php?page=ascend_marketing">' . __('Settings', 'General') . '</a>');
    			$actions = array_merge($settings, $actions);
			
		}
		
		return $actions;
}

function run_ascend_marketing() {

	$plugin = new Ascend_Marketing();
	$plugin->run();

}
run_ascend_marketing();

add_action( 'admin_menu', 'wpam_add_admin_menu' );
add_action( 'admin_init', 'wpam_settings_init' );


function wpam_add_admin_menu(  ) { 

	add_menu_page( 'Ascend Marketing', 'Ascend Marketing', 'manage_options', 'ascend_marketing', 'wpam_options_page' );

}


function wpam_settings_init(  ) { 
	//Register plugin settings page

	register_setting( 'pluginPage', 'wpam_settings' );

	add_settings_section(
		'wpam_pluginPage_section', 
		__( '', 'wordpress' ), 
		'wpam_settings_section_callback', 
		'pluginPage'
	);

	register_setting( 'pluginPage1', 'wpam_settings' );

	add_settings_section(
		'wpam_pluginPage_section', 
		__( '', 'wordpress' ), 
		'wpam_settings_section_callback', 
		'pluginPage1'
	);

	register_setting( 'pluginPage2', 'wpam_settings' );

	add_settings_section(
		'wpam_pluginPage_section', 
		__( '', 'wordpress' ), 
		'wpam_settings_section_callback', 
		'pluginPage2'
	);

	register_setting( 'pluginPage3', 'wpam_settings' );

	add_settings_section(
		'wpam_pluginPage_section', 
		__( '', 'wordpress' ), 
		'wpam_settings_section_callback', 
		'pluginPage3'
	);

	//styling options setting section label
	add_settings_field( 
		'wpam_label1', 
		__( 'Styling Options', 'wordpress' ), 
		'wpam_cta_fields_render', 
		'pluginPage', 
		'wpam_pluginPage_section',
		array ( 'context' => 'section_styling' )
	);

	//styling options setting field - breakpoint setting
	add_settings_field( 
		'wpam_breakpoint', 
		__( 'CTA Breakpoint:', 'wordpress' ), 
		'wpam_cta_fields_render', 
		'pluginPage', 
		'wpam_pluginPage_section',
		array ( 'context' => 'bp' )
	);

	//styling options setting field - background color
	add_settings_field( 
		'wpam_bg_color', 
		__( 'CTA Background Color:', 'wordpress' ), 
		'wpam_cta_fields_render', 
		'pluginPage', 
		'wpam_pluginPage_section',
		 array ( 'context' => 'bg' )
	);

	//styling options setting field - button text color
	add_settings_field( 
		'wpam_text_color', 
		__( 'CTA Text Color:', 'wordpress' ), 
		'wpam_cta_fields_render', 
		'pluginPage', 
		'wpam_pluginPage_section',
		 array ( 'context' => 'tc' )
	);

	//styling options setting field - Button options label
	add_settings_field( 
		'wpam_label2', 
		__( 'Button Options', 'wordpress' ), 
		'wpam_cta_fields_render', 
		'pluginPage1', 
		'wpam_pluginPage_section',
		array ( 'context' => 'section_buttons' )
	);

	//styling options setting field - button 1 label
	add_settings_field( 
		'wpam_b1_label', 
		__( 'Button #1 Label:', 'wordpress' ), 
		'wpam_cta_fields_render', 
		'pluginPage1', 
		'wpam_pluginPage_section',
		 array ( 'context' => 'b1l' )
	);

	//styling options setting field - button 1 link
	add_settings_field( 
		'wpam_b1_link', 
		__( 'Button #1 Link:', 'wordpress' ), 
		'wpam_cta_fields_render', 
		'pluginPage1', 
		'wpam_pluginPage_section',
		 array ( 'context' => 'b1p' )
	);

	//styling options setting field - button 1 icon
	add_settings_field( 
		'wpam_b1_icon', 
		__( 'Button #1 Icon:', 'wordpress' ), 
		'wpam_cta_fields_render', 
		'pluginPage1', 
		'wpam_pluginPage_section',
		 array ( 'context' => 'b1i' )
	);

	//styling options setting field - button 2 label
	add_settings_field( 
		'wpam_b2_label', 
		__( 'Button #2 Label:', 'wordpress' ), 
		'wpam_cta_fields_render', 
		'pluginPage1', 
		'wpam_pluginPage_section',
		 array ( 'context' => 'b2l' )
	);

	//styling options setting field - button 2 link
	add_settings_field( 
		'wpam_b2_link', 
		__( 'Button #2 Link:', 'wordpress' ), 
		'wpam_cta_fields_render', 
		'pluginPage1', 
		'wpam_pluginPage_section',
		 array ( 'context' => 'b2p' )
	);

	//styling options setting field - button 2 icon
	add_settings_field( 
		'wpam_b2_icon', 
		__( 'Button #2 Icon:', 'wordpress' ), 
		'wpam_cta_fields_render', 
		'pluginPage1', 
		'wpam_pluginPage_section',
		 array ( 'context' => 'b2i' )
	);

	//Enable font awesome support
	add_settings_field( 
		'wpam_enable_icon', 
		__( 'Enable Font-Awesome:', 'wordpress' ), 
		'wpam_cta_fields_render', 
		'pluginPage2', 
		'wpam_pluginPage_section',
		 array ( 'context' => 'fa' )
	);

	//Header code
	add_settings_field( 
		'wpam_textarea_field_0', 
		__( 'Header code', 'wordpress' ), 
		'wpam_cta_fields_render', 
		'pluginPage3', 
		'wpam_pluginPage_section',
		array ( 'context' => 'section_fb_px' )
	);

}

function wpam_cta_fields_render( $args ) { 

	$options = get_option( 'wpam_settings' );
	?>
	<?php if ( 'section_styling' === $args[ 'context' ] ): ?>
		<label>Use the settings below to customize the look and feel of the CTA section<br /></label>
		
	<?php elseif ( 'bp' === $args[ 'context' ] ): ?>
		<input placeholder="e.g. 768px" type='text' name='wpam_settings[wpam_breakpoint]' value='<?php echo $options['wpam_breakpoint'];?>' /> Determine the screen size where the plug-in takes effect
	<?php elseif ( 'bg' === $args[ 'context' ] ): ?>
		<input type='color' name='wpam_settings[wpam_bg_color]' value='<?php echo $options['wpam_bg_color'];?>' />
		Hex: <input placeholder="e.g. #000000" type='text' name='wpam_settings[wpam_bg_color]' value='<?php echo $options['wpam_bg_color'];?>' /> <a href="https://html-color-codes.info/colors-from-image/#" target="_blank">Get help picking the right colors.</a>
	<?php elseif ( 'tc' === $args[ 'context' ] ): ?>
		<input type='color' name='wpam_settings[wpam_text_color]' value='<?php echo $options['wpam_text_color'];?>' />
		Hex: <input placeholder="e.g. #ffffff" type='text' name='wpam_settings[wpam_text_color]' value='<?php echo $options['wpam_text_color'];?>' /> <a href="https://html-color-codes.info/colors-from-image/#" target="_blank">Get help picking the right colors.</a>
	<?php elseif ( 'section_buttons' === $args[ 'context' ] ): ?>
		<label>Use the settings below to customize text, links and button icons.</label>
	<?php elseif ( 'b1l' === $args[ 'context' ] ): ?>
		<input placeholder="e.g. Email Us" type='text' name='wpam_settings[wpam_b1_label]' value='<?php echo $options['wpam_b1_label'];?>' />
	<?php elseif ( 'b1p' === $args[ 'context' ] ): ?>
		<input placeholder="e.g. /contact/" type='text' name='wpam_settings[wpam_b1_link]' value='<?php echo $options['wpam_b1_link'];?>' /> | Example: mailto:email@domain.com, sms:phone, tel:phone
	<?php elseif ( 'b1i' === $args[ 'context' ] ): ?>
		<input placeholder="e.g. envelope" type='text' name='wpam_settings[wpam_b1_icon]' value='<?php echo $options['wpam_b1_icon'];?>' />&nbsp;|&nbsp;Example: phone, phone-square, envelope. Enter word in field for icon to show next to button (<a target="_blank" href="http://fontawesome.io/icons/">Click to see all icons</a>)
	<?php elseif ( 'b2l' === $args[ 'context' ] ): ?>
		<input placeholder="e.g. Call Us" type='text' name='wpam_settings[wpam_b2_label]' value='<?php echo $options['wpam_b2_label'];?>' />
	<?php elseif ( 'b2p' === $args[ 'context' ] ): ?>
		<input placeholder="e.g. tel:number" type='text' name='wpam_settings[wpam_b2_link]' value='<?php echo $options['wpam_b2_link'];?>' /> | Example: mailto:email@domain.com, sms:phone, tel:phone
	<?php elseif ( 'b2i' === $args[ 'context' ] ): ?>
		<input placeholder="e.g. phone" type='text' name='wpam_settings[wpam_b2_icon]' value='<?php echo $options['wpam_b2_icon'];?>' />&nbsp;|&nbsp;Example: phone, phone-square, envelope. Enter word in field for icon to show next to button (<a target="_blank" href="http://fontawesome.io/icons/">Click to see all icons</a>)
	<?php elseif ( 'fa' === $args[ 'context' ] ): ?>
		<?php
		    $a = $options;
		if (is_array($a) && array_key_exists("wpam_enable_icon",$a))
		  { } else { 
		    $options['wpam_enable_icon'] = false;
		  }
		    ?>
		<input type="checkbox" name="wpam_settings[wpam_enable_icon]" value="1"  <?php checked( $options['wpam_enable_icon'], 1 ); ?> />&nbsp;|&nbsp;If Font Awesome is not enabled on your site by default, check this box to enable. (Check if icons are not showing on the site).
	<?php elseif ( 'section_fb' === $args[ 'context' ] ): ?>
		<label>Any code that needs to be inserted before the head tag. (examples: Google Analytics, Facebook Pixel, Google Fonts, etc)..</label>
	<?php elseif ( 'section_fb_px' === $args[ 'context' ] ): ?>
		<textarea cols='80' rows='30' name='wpam_settings[wpam_textarea_field_0]'><?php echo $options['wpam_textarea_field_0']; ?></textarea>
	<?php endif; ?>
	<?php

}

function wpam_settings_section_callback(  ) { 

	//echo __( 'On this page, you can adjust mobile CTAs and Facebook pixel code.', 'wordpress' );

}


function wpam_options_page(  ) { 

	?>
	<form action='options.php' method='post'>
		<img style="margin: 20px 0;" src="<?php echo plugins_url( 'includes/AscendLogoSmall.png', __FILE__ ); ?>" />
		<!-- <h2>Marketing and conversion tools</h2> -->
		<hr />
		<h1>Mobile Call-to-action buttons</h1>
		<p>This call-to-action will increase your conversion rates on mobile devices</p>
		<hr />
		<h2>Design the look, feel, and color of your CTA</h2>
		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		?>
		<hr />
		<h2>CTA Button Settings</h2>
		<?php
		settings_fields( 'pluginPage1' );
		do_settings_sections( 'pluginPage1' );
		?>
		<hr />
		<h2>CTA Preview</h2>
		<?php 
		wp_enqueue_style('Font-Awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css',false,false);
		wp_enqueue_style('ascend-styles', '' . plugins_url( 'includes/stylesheet.css', __FILE__ ) . '');
		$options = get_option( 'wpam_settings' ); ?>
		<div class="floating-footer" style="width: 400px; height: 80px; background: <?php echo $options['wpam_bg_color']; ?>;">
			<div class="floating-inner">
				<a style="color: <?php echo $options['wpam_text_color']; ?>;" class="link" href="<?php echo $options['wpam_b1_link']; ?>"><i class="fa fa-<?php echo $options['wpam_b1_icon']; ?>"></i><?php echo $options['wpam_b1_label']; ?></a>
				<a style="color: <?php echo $options['wpam_text_color']; ?>;" class="link" href="<?php echo $options['wpam_b2_link']; ?>"><i class="fa fa-<?php echo $options['wpam_b2_icon']; ?>"></i><?php echo $options['wpam_b2_label']; ?></a>
			</div>
		</div>
		<hr />
		<h1>Font Awesome</h1>
		<p>Add the latest font-awesome library support to your theme.</p>
		<?php
		settings_fields( 'pluginPage2' );
		do_settings_sections( 'pluginPage2' );
		?>
		<hr />
		<h1>Additional header code</h1>
		<p>Insert any code that needs to be added into the header within the 'head' tag. This can be your Google Analytics code, Facebook Pixel, Font libraries, jQuery libraries, etc.<br /><br />
		Javascript and CSS loaded here is render-blocking by default.
		</p>
		<?php
		settings_fields( 'pluginPage3' );
		do_settings_sections( 'pluginPage3' );
		submit_button();
		?>

	</form>
	<?php

}
function hook_pixel() {
	$options = get_option( 'wpam_settings' );
    ?>
        <?php echo $options['wpam_textarea_field_0']; ?>
    <?php
}
add_action('wp_head', 'hook_pixel');
function hook_cta_html(){
	$options = get_option('wpam_settings');

	
	
	
	

	?>
		<div class="floating-footer">
			<div class="floating-inner">
				<a class="link" href="<?php echo $options['wpam_b1_link']; ?>"><i class="fa fa-<?php echo $options['wpam_b1_icon']; ?>"></i><?php echo $options['wpam_b1_label']; ?></a>
				<a class="link" href="<?php echo $options['wpam_b2_link']; ?>"><i class="fa fa-<?php echo $options['wpam_b2_icon']; ?>"></i><?php echo $options['wpam_b2_label']; ?></a>
			</div>
		</div>
	<?php
	
}
add_action('wp_footer', 'hook_cta_html');
    
function hook_cta_css(){
	wp_enqueue_style('ascend-styles', '' . plugins_url( 'includes/stylesheet.css', __FILE__ ) . '');
	$options = get_option('wpam_settings');
	$background = $options['wpam_bg_color'];
	$color = $options['wpam_text_color'];
	$breakpoint = $options['wpam_breakpoint'];
	$bpWidth = substr($breakpoint, 0, -2); 
	$bpWidth = (int)$bpWidth + 1;

	$bg_css = "
		.floating-footer{
			background-color: {$background};
			color: {$color};
		}
		.floating-inner a{
			color: {$color};
		}
		@media (min-width: {$bpWidth}px){
			.floating-footer{
				display: none;
			}
		}
		@media (max-width: {$breakpoint} ){
			body{
				padding-bottom: 80px;
			}
		} 
		";
	wp_add_inline_style('ascend-styles', $bg_css);

}
add_action( 'wp_enqueue_scripts', 'hook_cta_css' );
function hook_fontAwesome(){
	$options = get_option('wpam_settings');
		    $a = $options;
		if (array_key_exists("wpam_enable_icon",$a))
		  { } else { 
		    $options['wpam_enable_icon'] = false;
		  }
		    
	if ($options['wpam_enable_icon']){
		wp_enqueue_style('Font-Awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css',false,false);
	 }
}
add_action('wp_head', 'hook_fontAwesome');
