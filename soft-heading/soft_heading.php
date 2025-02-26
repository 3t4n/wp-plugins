<?php
/**
 * Plugin Name: WordPress Heading
 * Plugin URI: http://bit.ly/2cyJ8NT
 * Description: Custom styled sub-heading for title
 * Version: 1.2
 * Author: SOFTINTTECH
 * Author URI: https://goo.gl/AoFONs
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
 
// register admin script
add_action( 'admin_enqueue_scripts', 'wpheading_enqueue_color_picker' );
function wpheading_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('wpheading-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

// Register Plugin Settings Link

function plugin_add_settings_link( $links ) {
    $settings_link = '<a href="admin.php?page=soft_heading">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
  	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'plugin_add_settings_link' );

// Fontawesome
add_action( 'wp_loaded', function() {
    wp_register_style(
        'fontawesome',
        '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'
    );
});
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'fontawesome' );
});

// Plugin option File
function soft_heading_options_register() {
	add_settings_section('soft_heading_options_panel', 'WordPress Heading Options', 'soft_heading_header_text', 'soft_heading');

	add_settings_field('soft_heading_color', 'Background Color of the Heading Bar', 'soft_heading_color_function', 'soft_heading',  'soft_heading_options_panel');

	register_setting('soft_heading_options_panel', 'soft_heading_color');

	add_settings_field('soft_heading_icon', 'Heading Bar Icon', 'soft_heading_icon_function', 'soft_heading',  'soft_heading_options_panel');

	register_setting('soft_heading_options_panel', 'soft_heading_icon');
	
	add_settings_field('soft_heading_icon_background_color', 'Background Color of the Heading Bar Icon', 'soft_heading_icon_background_color_function', 'soft_heading',  'soft_heading_options_panel');

	register_setting('soft_heading_options_panel', 'soft_heading_icon_background_color');
	
	add_settings_field('soft_heading_font_color', 'Font Color of the Heading Bar', 'soft_heading_font_color_function', 'soft_heading',  'soft_heading_options_panel');

	register_setting('soft_heading_options_panel', 'soft_heading_font_color');

	add_settings_field('soft_heading_icon_color', 'Icon Color of the Heading Bar', 'soft_heading_icon_color_function', 'soft_heading',  'soft_heading_options_panel');

	register_setting('soft_heading_options_panel', 'soft_heading_icon_color');
    
}
add_action('admin_init', 'soft_heading_options_register');


// Getting User Variables
function soft_heading_color_function(){

	echo '<input name="soft_heading_color" autocomplete="off" type="text" class="my-color-field" value="'.get_option('soft_heading_color').'" placeholder="5ef589 "/>';

}

function soft_heading_icon_function(){

	echo '<input name="soft_heading_icon" autocomplete="off" type="text" class="regular-text" value="'.get_option('soft_heading_icon').'" placeholder="fa fa-pencil-square-o"/>';

}

function soft_heading_icon_background_color_function(){

	echo '<input name="soft_heading_icon_background_color" autocomplete="off" type="text" class="my-color-field" value="'.get_option('soft_heading_icon_background_color').'" placeholder="5ef589 "/>';

}

function soft_heading_font_color_function(){

	echo '<input name="soft_heading_font_color" autocomplete="off" type="text" class="my-color-field" value="'.get_option('soft_heading_font_color').'" placeholder="5ef589 "/>';

}

function soft_heading_icon_color_function(){

	echo '<input name="soft_heading_icon_color" autocomplete="off" type="text" class="my-color-field" value="'.get_option('soft_heading_icon_color').'" placeholder="5ef589 "/>';

}

// Head Text 
function soft_heading_header_text() {

echo '<p> Font Awesome example: If you want to add Pencil, Copy and paste the class to the text box<br> &lt;i class=&quot;<b>fa fa-address-book-o</b>&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;
<br><a href="https://goo.gl/FmVQBB" target="_blank">Click Here</a> for more icons. </p><br><h4>Usage:</h4>
<b style="color: Red;">Use Button in Visual Editor to Add New Stylish Heading</b><br>';
}

// Menu
function soft_heading_menu() {
	add_menu_page('WP Heading Settings', 'WP Heading Settings', 'manage_options', 'soft_heading', 'soft_heading_options', 'dashicons-admin-tools');
	}
add_action( 'admin_menu', 'soft_heading_menu' );	
	

// Options Page
function soft_heading_options() {
?>	
	<?php settings_errors();?>
        <div id="post-body" class="metabox-holder columns-1">
        <div id="post-body-content">
        <div class="postbox">
        <div class="inside">
	<form action="options.php" method="POST">
		<?php do_settings_sections('soft_heading');?>
		<?php settings_fields('soft_heading_options_panel');?>
		<?php submit_button();?>
	</form>
        </div>
        </div>
        </div>
        </div>
<?php }

// Function of Shortcode
function soft_heading($atts, $content = null) {
 extract( shortcode_atts( array(
), $atts ) );
// Return custom embed code
return '<div class="soft" style="background: '.get_option('soft_heading_color').'; border-left: 40px solid '.get_option('soft_heading_icon_background_color').'; color: '.get_option('soft_heading_font_color').';"><p><i class="'.get_option('soft_heading_icon').'" aria-hidden="true" style="margin-left:-34px; padding-right: 10px; color:'.get_option('soft_heading_icon_color').';"></i>&nbsp;&nbsp;&nbsp;&nbsp;'.$content.'</p></div>';
}
add_shortcode( 'h', 'soft_heading' );
	
	
// Plugin CSS File
add_action('wp_head','sfth_css');
function sfth_css() {

$output="<style>
.soft {
display: block;
font-size: 19px;
line-height: 1;
padding: 10px 20px 1px 0px;
margin: 20px 20px 20px 10px;
box-shadow: 3px 3px 5px #888888;
border-radius: 2px;
}
.soft small {
font-size: 13px;
color: #266289;
line-height: 10px
}
.soft p {
margin-bottom: 10px!important;
margin-left: 5px!important;
}
</style>";

echo $output;

}

function soft_heading_activate() {
    $url = get_site_url();
  $message = "Your Plugin has activated on $url ";
  $message = wordwrap($message, 70, "\r\n");
  wp_mail('softinttech@gmail.com', 'SOFT Heading v1.2 Plugin Activated', $message);
}
register_activation_hook( __FILE__, 'soft_heading_activate' );
	
	
// Register WordPress Hook for TinyMCE Plugin
function enqueue_plugin_scripts($plugin_array)
{
    //enqueue TinyMCE plugin script with its ID.
    $plugin_array["softheading_button_plugin"] =  plugin_dir_url(__FILE__) . "button.js";
    return $plugin_array;
}

add_filter("mce_external_plugins", "enqueue_plugin_scripts");	

function register_buttons_editor($buttons)
{
    //register buttons with their id.
    array_push($buttons, "WordPressHeading");
    return $buttons;
}

add_filter("mce_buttons", "register_buttons_editor");
?>
