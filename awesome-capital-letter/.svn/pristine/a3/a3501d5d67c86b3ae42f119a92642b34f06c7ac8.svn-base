<?php 
/*
Plugin Name: Awesome Capital Letter
Plugin URI: http://facebond.com/plugins/rkp-capital-letter/
Description: This is awesome capital letter plugins. This plugins make nice capital letter before every paragraph. 
Author: Rejaul Karim Polin
Version: 1.0
Author URI: http://www.facebond.com
License: GPL2
*/
/*
    Copyright YEAR  Md. Rejaul Karim Polin  (email : rkpolin@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
 
/* Latest jQuery from Wordpress */
function rkp_awesome_capital_letter_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'rkp_awesome_capital_letter_latest_jquery');


/* Extra jQuery & CSS file include */
function my_capital_letter_scripts_method() {
	define('rkp_awesome_capital_letter_wp', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );

	wp_enqueue_script('rkp-awesome-capital-letter-js', rkp_awesome_capital_letter_wp . 'js/capital-0.1.min.js', array('jquery'));
	wp_enqueue_style('rkp-awesome-capital-letter-custom-css', rkp_awesome_capital_letter_wp . 'css/style.css');
}

add_action( 'wp_enqueue_scripts', 'my_capital_letter_scripts_method' );



function add_rkpcl_options()
{
	add_options_page('RKP Awesome Capital Letter Options', 'Capital Letter Settings', 'manage_options', 'rkpcl-settings', 'rkp_awesome_capitalletter_options');
}
add_action('admin_menu', 'add_rkpcl_options');

function rkp_capital_letter_color_picker_fucntion( $hook_suffix ) {
	// first check that $hook_suffix is appropriate for your admin page
	define('rkp_awesome_capital_letter_wp', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	
	wp_enqueue_script( 'wp-color-picker' );
	// load the minified version of custom script
	wp_enqueue_script( 'my-capital-letter-color-field', plugins_url( 'js/capital_color_picker_javascript.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), false, true );
	wp_enqueue_style( 'wp-color-picker' );
}
add_action( 'admin_enqueue_scripts', 'rkp_capital_letter_color_picker_fucntion' );

// Default values
$capitalletter_options = array(
	'capitalletter_color' => '#02AD08',
	'capital_letter_font_family' => ' ',
	'capitalletter_font_size' => '60px',
	'capitalletter_font_style' => 'normal',
	'capitalletter_font_weight' => 'normal',
	'capitalletter_margin_top' => '10px',
	'capitalletter_margin_bottom' => '10px',
	'capitalletter_margin_left' => '10px',
	'capitalletter_margin_right' => '10px',
);

if ( is_admin() ) : // Load only if we are viewing an admin page

function rkp_awesome_capitalletter_settings() {
	// Register settings and call sanitation function
	register_setting( 'rkp_awesome_capitalletter_options', 'capitalletter_options', 'capitalletter_validate_options' );
}

add_action( 'admin_init', 'rkp_awesome_capitalletter_settings' );

/* capital letter font radio button */
$capital_letter_font_family = array(
	'font_name' => array(
		'value' => ' ',
		'label' => 'Default'
	),
	'font_name1' => array(
		'value' => 'arial, cursive',
		'label' => 'Arial'
	),
	'font_name2' => array(
		'value' => 'Kaushan Script, cursive',
		'label' => 'Kaushan Script'
	),
	'font_name3' => array(
		'value' => 'Euphoria Script, cursive',
		'label' => 'Euphoria Script'
	),
	'font_name4' => array(
		'value' => 'Dancing Script, cursive',
		'label' => 'Dancing Script'
	),
	'font_name5' => array(
		'value' => 'Bad Script, cursive',
		'label' => 'Bad Script'
	),
	'font_name6' => array(
		'value' => 'Nova Script, cursive',
		'label' => 'Nova Script'
	)
);

$capitalletter_font_style = array(
	'font_style_normal' => array(
		'value' => 'normal',
		'label' => 'Normal'
	),
	'font_style_italic' => array(
		'value' => 'italic',
		'label' => 'Italic'
	)
);

$capitalletter_font_weight = array(
	'font_weight_normal' => array(
		'value' => 'normal',
		'label' => 'Normal'
	),
	'font_weight_bold' => array(
		'value' => 'bold',
		'label' => 'Bold'
	)
);


// Function to generate options page
function rkp_awesome_capitalletter_options() {
	global $capitalletter_options,$capital_letter_font_family,$capitalletter_font_style, $capitalletter_font_weight;
	
	if ( !isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false; // This checks whether the form has just been submitted. ?>


	<div class="wrap">
	
	<h2>Awesome Capital Letter</h2>
	<h4>Please set your options.</h4>
		
	<form method="post" action="options.php">
	
	<?php $settings = get_option( 'capitalletter_options', $capitalletter_options ); ?>
	
	<?php settings_fields( 'rkp_awesome_capitalletter_options' ); ?>

	
	<table class="form-table">
		<tr>
			<td align="center"><input type="submit" class="button-secondary" name="capitalletter_options[back_as_default]" value="Back as default" /></td>
			<td colspan="2"><input type="submit" class="button-primary" value="Save Settings" /></td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="capitalletter_color">Capital Letter Color</label></th>		
			<td>
				<input  id='capitalletter_color' type="text" name="capitalletter_options[capitalletter_color]" value="<?php echo stripslashes($settings['capitalletter_color']) ?>" class="my-color-field"  />
				<p class="description">You can choose your desire color from color picker. Default color is: #02AD08</p>
			</td>
		</tr>
		
		
		<tr valign="top">
			<th scope="row"><label for="capital_letter_font_family">Capital Letter Font Family</label></th>
			
			<td>
				<?php foreach( $capital_letter_font_family as $activate ) : ?>
				<input type="radio" id="<?php echo $activate['value']; ?>" name="capitalletter_options[capital_letter_font_family]" value="<?php esc_attr_e( $activate['value'] ); ?>" <?php checked( $settings['capital_letter_font_family'], $activate['value'] ); ?> />
				<label for="<?php echo $activate['value']; ?>"><?php echo $activate['label']; ?></label><br />
				<?php endforeach; ?>
			</td>
		</tr>		
		<tr valign="top">
			<th scope="row"><label for="capitalletter_font_size">Capital Letter Font Size</label></th>
			
			<td>
				<input  id='capitalletter_font_size' type="text" name="capitalletter_options[capitalletter_font_size]" value="<?php echo stripslashes($settings['capitalletter_font_size']) ?>" />
				<p class="description">Choose your capital letter font size. Default font size is '60px'.</p>
			</td>
		</tr>
	
		<tr valign="top">
			<th scope="row"><label for="capitalletter_font_style">Capital Letter Font Style</label></th>
			
			<td>
				<?php foreach( $capitalletter_font_style as $activate ) : ?>
				<input type="radio" id="<?php echo $activate['value']; ?>" name="capitalletter_options[capitalletter_font_style]" value="<?php esc_attr_e( $activate['value'] ); ?>" <?php checked( $settings['capitalletter_font_style'], $activate['value'] ); ?> />
				<label for="<?php echo $activate['value']; ?>"><?php echo $activate['label']; ?></label><br />
				<?php endforeach; ?>
			</td>
		</tr>
	
		<tr valign="top">
			<th scope="row"><label for="capitalletter_font_weight">Capital Letter Font Weight</label></th>	
			<td>
			<?php foreach( $capitalletter_font_weight as $activate ) : ?>
				<input type="radio" id="<?php echo $activate['value']; ?>" name="capitalletter_options[capitalletter_font_weight]" value="<?php esc_attr_e( $activate['value'] ); ?>" <?php checked( $settings['capitalletter_font_weight'], $activate['value'] ); ?> />
				<label for="<?php echo $activate['value']; ?>"><?php echo $activate['label']; ?></label><br />
				<?php endforeach; ?>
			</td>
		</tr>
	
		<tr valign="top">
			<th scope="row"><label for="capitalletter_margin_top">Capital Letter Margin Top</label></th>
			
			<td>
				<input id="capitalletter_margin_top" type="text" name="capitalletter_options[capitalletter_margin_top]" value="<?php echo stripslashes($settings['capitalletter_margin_top']) ?>" />
				<p class="description">Put your desire margin top in pixel . Default is 10px.</p>
			</td>
		</tr>		
		<tr valign="top">
			<th scope="row"><label for="capitalletter_margin_bottom">Capital Letter Margin Bottom</label></th>
			
			<td>
				<input id="capitalletter_margin_bottom" type="text" name="capitalletter_options[capitalletter_margin_bottom]" value="<?php echo stripslashes($settings['capitalletter_margin_bottom']) ?>" />
				<p class="description">Put your desire margin bottom in pixel . Default is 10px.</p>
			</td>
		</tr>		
		<tr valign="top">
			<th scope="row"><label for="capitalletter_margin_left">Capital Letter Margin Left</label></th>
			
			<td>
				<input id="capitalletter_margin_left" type="text" name="capitalletter_options[capitalletter_margin_left]" value="<?php echo stripslashes($settings['capitalletter_margin_left']) ?>" />
				<p class="description">Put your desire margin Left in pixel . Default is 10px.</p>
			</td>
		</tr>		
		<tr valign="top">
			<th scope="row"><label for="capitalletter_margin_right">Capital Letter Margin Right</label></th>
			
			<td>
				<input id="capitalletter_margin_right" type="text" name="capitalletter_options[capitalletter_margin_right]" value="<?php echo stripslashes($settings['capitalletter_margin_right']) ?>" />
				<p class="description">Put your desire margin right in pixel . Default is 10px.</p>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="submit" class="button-secondary" name="capitalletter_options[back_as_default]" value="Back as default" /></td>
			<td colspan="2"><input type="submit" class="button-primary" value="Save Settings" /></td>
		</tr>
	</table>
	
	</form>
	
	</div>
	
	<?php
}

// Inputs validation, if fails validations replace by default values.
function capitalletter_validate_options( $input ) {
	global $capitalletter_options,$capital_letter_font_family,$capitalletter_font_style, $capitalletter_font_weight;
	
	$settings = get_option( 'capitalletter_options', $capitalletter_options );
	
	// We strip all tags from the text field, to avoid Vulnerabilities like XSS
	
	$input['capitalletter_color'] = isset( $input['back_as_default'] ) ? '#02AD08' : wp_filter_post_kses( $input['capitalletter_color'] );
	$input['capital_letter_font_family'] = isset( $input['back_as_default'] ) ? ' ' : wp_filter_post_kses( $input['capital_letter_font_family'] );
	$input['capitalletter_font_size'] = isset( $input['back_as_default'] ) ? '60px' : wp_filter_post_kses( $input['capitalletter_font_size'] );
	$input['capitalletter_font_style'] = isset( $input['back_as_default'] ) ? 'normal' : wp_filter_post_kses( $input['capitalletter_font_style'] );
	$input['capitalletter_font_weight'] = isset( $input['back_as_default'] ) ? 'normal' : wp_filter_post_kses( $input['capitalletter_font_weight'] );
	$input['capitalletter_margin_top'] = isset( $input['back_as_default'] ) ? '10px' : wp_filter_post_kses( $input['capitalletter_margin_top'] );	
	$input['capitalletter_margin_bottom'] = isset( $input['back_as_default'] ) ? '10px' : wp_filter_post_kses( $input['capitalletter_margin_bottom'] );	
	$input['capitalletter_margin_left'] = isset( $input['back_as_default'] ) ? '10px' : wp_filter_post_kses( $input['capitalletter_margin_left'] );	
	$input['capitalletter_margin_right'] = isset( $input['back_as_default'] ) ? '10px' : wp_filter_post_kses( $input['capitalletter_margin_right'] );	
	return $input;
}

endif;		// Endif is_admin()


	function rkp_awesome_capital_letter_active($content) { 
	global $capitalletter_options,$capital_letter_font_family,$capitalletter_font_style, $capitalletter_font_weight; 
	$capitalletter_settings = get_option( 'capitalletter_options', $capitalletter_options );
	?>

	<script type="text/javascript">
	jQuery(document).ready(function($) {
	$('div .capitalletter >  p').CapitalLetter({
	'color': '<?php echo $capitalletter_settings['capitalletter_color']; ?>',
	'font-family': '<?php echo $capitalletter_settings['capital_letter_font_family']; ?>',
	'font-size':'<?php echo $capitalletter_settings['capitalletter_font_size']; ?>',
	'font-style':'<?php echo $capitalletter_settings['capitalletter_font_style']; ?>',
	'font-weight':'<?php echo $capitalletter_settings['capitalletter_font_weight']; ?>',
	'margin-top': '<?php echo $capitalletter_settings['capitalletter_margin_top']; ?>',
	'margin-bottom': '<?php echo $capitalletter_settings['capitalletter_margin_bottom']; ?>',
	'margin-left': '<?php echo $capitalletter_settings['capitalletter_margin_left']; ?>',
	'margin-right': '<?php echo $capitalletter_settings['capitalletter_margin_right']; ?>'

	});
	});
	</script>

	<?php
	return $content= "<div class='capitalletter'>" . $content . "</div>";
	}
	add_action('wp_head', 'rkp_awesome_capital_letter_active');
	add_filter( 'the_content', 'rkp_awesome_capital_letter_active' );
	
	/*Add setting link to plugins*/
	
	add_filter('plugin_action_links', 'rkp_capital_letter_settings_link', 10, 2);

function rkp_capital_letter_settings_link($links, $file) {
    static $this_plugin;

    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    if ($file == $this_plugin) {
        // The "page" query string value must be equal to the slug
        // of the Settings admin page we defined earlier, which in
        // this case equals "myplugin-settings".
        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=rkpcl-settings">Settings</a>';
        array_unshift($links, $settings_link);
    }

    return $links;
}
?>