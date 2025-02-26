<?php
/*
Plugin Name: Little LightBox
Plugin URI:  http://www.wpparse.com/
Description: Open your images with a style with this fast WordPress lightbox plugin.
Version:     0.1
Author:      WPPARSE
Author URI:  http://www.wpparse.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: little-lightbox
*/
defined( 'ABSPATH' ) or die( 'Where are you going?' );

//////////////////////////////////// Settings ////////////////////////////////////////////////////
add_action( 'admin_menu', 'lbll_add_admin_menu' );
add_action( 'admin_init', 'lbll_settings_init' );
function lbll_add_admin_menu(  ) { 
	add_menu_page( 'Little Lightbox', 'Little Lightbox', 'manage_options', 'little_lightbox', 'lbll_options_page' );
}
function lbll_settings_init(  ) { 
	register_setting( 'lbll_pluginPage', 'lbll_settings' );
	
	add_settings_section('lbll_pluginPage_section', __( 'Settings', 'little-lightbox' ), 'lbll_settings_section_callback', 'lbll_pluginPage');
	add_settings_field('lbll_enable', __( 'Enable Lightbox', 'little-lightbox' ), 'lbll_enable_render', 'lbll_pluginPage', 'lbll_pluginPage_section');
	add_settings_field('lbll_loop', __( 'Enable Loop', 'little-lightbox' ), 'lbll_loop_render', 'lbll_pluginPage', 'lbll_pluginPage_section');
	add_settings_field('lbll_openining_animation', __( 'Lightbox Animation For Opening', 'little-lightbox' ), 'lbll_openining_animation_render', 'lbll_pluginPage', 'lbll_pluginPage_section');
	add_settings_field('lbll_closing_animation', __( 'Lightbox Animation For Closing', 'little-lightbox' ), 'lbll_closing_animation_render', 'lbll_pluginPage', 'lbll_pluginPage_section');
	add_settings_field('lbll_open_speed', __( 'Lightbox Open Speed', 'little-lightbox' ), 'lbll_open_speed_render', 'lbll_pluginPage', 'lbll_pluginPage_section');
	add_settings_field('lbll_close_speed', __( 'Lightbox Close Speed', 'little-lightbox' ), 'lbll_close_speed_render', 'lbll_pluginPage', 'lbll_pluginPage_section' );
	add_settings_field('lbll_lightbox_gall_prev_anim', __( 'Lightbox Gallery Previous Animation', 'little-lightbox' ), 'lbll_lightbox_gall_prev_anim_render', 'lbll_pluginPage', 'lbll_pluginPage_section');
	add_settings_field('lbll_lightbox_gall_next_anim', __( 'Lightbox Gallery Next Animation', 'little-lightbox' ), 'lbll_lightbox_gall_next_anim_render', 'lbll_pluginPage', 'lbll_pluginPage_section');
	add_settings_field('lbll_title_type', __( 'Title Type', 'little-lightbox' ), 'lbll_title_type_render', 'lbll_pluginPage', 'lbll_pluginPage_section');
	add_settings_field('lbll_inside_pos', __( 'Title Position', 'little-lightbox' ), 'lbll_inside_pos_render', 'lbll_pluginPage', 'lbll_pluginPage_section');
}

//Getting options
$lbll_options = get_option( 'lbll_settings' );

function lbll_enable_render(  ) {
	global $lbll_options;
	?>
	<input type='checkbox' name='lbll_settings[lbll_enable]' <?php checked( $lbll_options['lbll_enable'], 1 ); ?> value='1'>
	<?php
}
function lbll_loop_render(  ) { 
	global $lbll_options;
	?>
	<input type='checkbox' name='lbll_settings[lbll_loop]' <?php checked( $lbll_options['lbll_loop'], 1 ); ?> value='1'> <i>Check to enable loop for gallery images</i>
	<?php
}
function lbll_openining_animation_render(  ) { 
	global $lbll_options;
	?>
	<select name='lbll_settings[lbll_openining_animation]'>
        <option value='default' <?php selected( $lbll_options['lbll_openining_animation'], 'default' ); ?>>Default</option>
		<option value='elasticIn' <?php selected( $lbll_options['lbll_openining_animation'], 'elasticIn' ); ?>>Elastic In</option>
        <option value='changeIn' <?php selected( $lbll_options['lbll_openining_animation'], 'changeIn' ); ?>>Change In</option>
        <option value='fadeIn' <?php selected( $lbll_options['lbll_openining_animation'], 'fadeIn'); ?>>Fade In</option>
	</select>
<?php
}
function lbll_closing_animation_render(  ) { 
	global $lbll_options;
	?>
	<select name='lbll_settings[lbll_closing_animation]'>
    	<option value='default' <?php selected( $lbll_options['lbll_closing_animation'], 'default' ); ?>>Default</option>
		<option value='elasticOut' <?php selected( $lbll_options['lbll_closing_animation'], 'elasticOut' ); ?>>Elastic Out</option>
		<option value='changeOut' <?php selected( $lbll_options['lbll_closing_animation'], 'changeOut' ); ?>>Change Out</option>
		<option value='fadeOut' <?php selected( $lbll_options['lbll_closing_animation'], 'fadeOut' ); ?>>Fade Out</option>
	</select>
<?php
}
function lbll_open_speed_render(  ) { 
	global $lbll_options;
	?>
	<input type='number' name='lbll_settings[lbll_open_speed]' value='<?php if($lbll_options['lbll_open_speed']) {echo $lbll_options['lbll_open_speed']; } else { echo '300'; } ?>'> <i>Add speed in milliseconds. Here 5000 ms = 5 secs.</i>
	<?php
}
function lbll_close_speed_render(  ) { 
	global $lbll_options;
	?>
	<input type='number' name='lbll_settings[lbll_close_speed]' value='<?php if($lbll_options['lbll_close_speed']) {echo $lbll_options['lbll_close_speed']; } else { echo '300'; } ?>'> <i>Add speed in milliseconds. Here 5000 ms = 5 secs.</i>
	<?php
}
function lbll_lightbox_gall_prev_anim_render(  ) { 
	global $lbll_options;
	?>
	<select name='lbll_settings[lbll_lightbox_gall_prev_anim]'>
        <option value='default' <?php selected( $lbll_options['lbll_lightbox_gall_prev_anim'], 'default' ); ?>>Default</option>
		<option value='elasticIn' <?php selected( $lbll_options['lbll_lightbox_gall_prev_anim'], 'elasticIn' ); ?>>Elastic In</option>
        <option value='changeIn' <?php selected( $lbll_options['lbll_lightbox_gall_prev_anim'], 'changeIn' ); ?>>Change In</option>
        <option value='fadeIn' <?php selected( $lbll_options['lbll_lightbox_gall_prev_anim'], 'fadeIn'); ?>>Fade In</option>
	</select>
<?php
}
function lbll_lightbox_gall_next_anim_render(  ) { 
	global $lbll_options;
	?>
	<select name='lbll_settings[lbll_lightbox_gall_next_anim]'>
        <option value='default' <?php selected( $lbll_options['lbll_lightbox_gall_next_anim'], 'default' ); ?>>Default</option>
		<option value='elasticOut' <?php selected( $lbll_options['lbll_lightbox_gall_next_anim'], 'elasticOut' ); ?>>Elastic Out</option>
		<option value='changeOut' <?php selected( $lbll_options['lbll_lightbox_gall_next_anim'], 'changeOut' ); ?>>Change Out</option>
		<option value='fadeOut' <?php selected( $lbll_options['lbll_lightbox_gall_next_anim'], 'fadeOut' ); ?>>Fade Out</option>
	</select>
<?php
}
function lbll_title_type_render(  ) { 
	global $lbll_options;
	?>
	<input type='radio' name='lbll_settings[lbll_title_type]' class="rad_over" <?php checked( $lbll_options['lbll_title_type'], 1 ); ?> value='1'> Over &nbsp;
    <input type='radio' name='lbll_settings[lbll_title_type]' class="rad_inside" <?php checked( $lbll_options['lbll_title_type'], 2 ); ?> value='2'> Inside
	<?php
}
function lbll_inside_pos_render(  ) { 
	global $lbll_options;
	?>
	<input type='radio' name='lbll_settings[lbll_inside_pos]' <?php checked( $lbll_options['lbll_inside_pos'], 1 ); ?> value='1' disabled="disabled"> Top &nbsp;
    <input type='radio' name='lbll_settings[lbll_inside_pos]' <?php checked( $lbll_options['lbll_inside_pos'], 2 ); ?> value='2' disabled="disabled"> Bottom
	<?php
}
function lbll_settings_section_callback(  ) { 
	echo __( '', 'little-lightbox' );
}
function lbll_options_page(  ) { 
	?>
	<form action='options.php' method='post'>
		<h1>Little Lightbox</h1>
		<?php
		settings_fields( 'lbll_pluginPage' );
		do_settings_sections( 'lbll_pluginPage' );
		submit_button();
		?>
	</form>
	<?php
}
//////////////////////////////////// End of Settings ////////////////////////////////////////////////////

// If LightBox enabled
if($lbll_options['lbll_enable'] == '1') {
	
	//Include HTML DOM
	if (!function_exists(('file_get_html'))) require_once('assets/dom/simple_html_dom.php');
	
	//Load admin scripts
	function lbll_admin_scripts(){
		wp_enqueue_script( 'lbll-custom', plugins_url( 'assets/js/custom.js', __FILE__ ), array( 'jquery' ), false, true ); 
	}
	add_action('admin_enqueue_scripts','lbll_admin_scripts');
	
	// Apply filter to content
	add_filter( 'the_content', 'lbll_filter_content' );
	function lbll_filter_content($content) {
		if (strlen($content)) {
			$lbll_newcontent = $content;
			// Add 'lsb-preview' class to the anchor tags which have img tags as child elements
			$lbll_newcontent = add_class_and_group_to_anchor_of_img($lbll_newcontent);
			return $lbll_newcontent;
		} else {
			return $content;
		}
	}
	function add_class_and_group_to_anchor_of_img($content) {
		$lbll_html = str_get_html($content, '', '', '', false);
		foreach ($lbll_html->find('a') as $anchor_element) {
			foreach($anchor_element->find('img') as $img_element) {
				if(preg_match("/^[^\?]+\.(jpg|jpeg|gif|png)(?:\?|$)/", $anchor_element->href) == 1) {
					$anchor_element->class = 'lbll-lightbox-class' . $element->class;
					$anchor_element->{'data-littlelightbox-group'} = 'lbll-gallery';
					if(!$anchor_element->{'title'}) {
						$anchor_element->{'title'} = $img_element->alt;
					}
				}
			}
		}
		return $lbll_html;
	}
	
	// Include LittleLightBox Scripts
	add_action('wp_enqueue_scripts','lbll_scripts');
	function lbll_scripts() {
		wp_enqueue_style('lbll-style', plugin_dir_url(__FILE__).'assets/css/jquery.littlelightbox.css');
		wp_enqueue_script( 'lbll-js',  plugin_dir_url(__FILE__).'assets/js/jquery.littlelightbox.js', array('jquery'), '1.0', true );
	}
	
	// Load LittleLightBox script
	add_action('wp_footer','lbll_script_activation');
	function lbll_script_activation() {
		global $lbll_options;
		?>
        <script type="text/javascript">
			jQuery(function($) {
				$('.lbll-lightbox-class').littleLightBox({
					loop: <?php if($lbll_options['lbll_loop'] == '1') { echo 'true'; } else { echo 'false'; } ?>,
					<?php 
						// Setting up 'openMethod' and 'openSpeed'
						if($lbll_options['lbll_openining_animation'] && $lbll_options['lbll_openining_animation'] != 'default') { 
							echo "openMethod: '".$lbll_options['lbll_openining_animation']."',"; 
							if($lbll_options['lbll_open_speed']) { 
								echo 'openSpeed: '.$lbll_options['lbll_open_speed'].','; 
							} else { 
								echo 'openSpeed: 300,'; 
							}
						} 
					 	// Setting up 'closeMethod' and 'closeSpeed'
						if($lbll_options['lbll_closing_animation'] && $lbll_options['lbll_closing_animation'] != 'default') { 
							echo "closeMethod: '".$lbll_options['lbll_closing_animation']."',"; 
							if($lbll_options['lbll_close_speed']) { 
								echo 'closeSpeed: '.$lbll_options['lbll_close_speed'].','; 
							} else { 
								echo 'closeSpeed: 300,'; 
							}
						}
						// Gallery Previous & Next Animation
						if(($lbll_options['lbll_lightbox_gall_prev_anim'] && $lbll_options['lbll_lightbox_gall_prev_anim'] != 'default') && ($lbll_options['lbll_lightbox_gall_next_anim'] && $lbll_options['lbll_lightbox_gall_next_anim'] != 'default') ) { 
							echo "prevMethod: '".$lbll_options['lbll_lightbox_gall_prev_anim']."',"; 
							echo "nextMethod: '".$lbll_options['lbll_lightbox_gall_next_anim']."',"; 
						}
						// Title types
						if($lbll_options['lbll_title_type']) {
							echo 'helpers: {
										title: {';
										if($lbll_options['lbll_title_type'] == '1') {
											echo "type: 'over',";
										} else {
											echo "type: 'inside',";
											if($lbll_options['lbll_inside_pos']) {
												if($lbll_options['lbll_inside_pos'] == '1') {
													echo "position: 'top',";
												} else {
													echo "position: 'bottom',";
												}
											}
										}
							echo '}}';
						}
					?>	
				});		
			});
		</script>
        <?php
	}
}
?>