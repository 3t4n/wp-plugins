<?php
/*
Plugin Name: Simple Responsive Slider
Plugin URI: http://www.responsivesliderplugin.com
Donate URI: http://www.responsivesliderplugin.com
Description: Implementation of responsiveSlides jQuery "http://responsiveslides.com v1.54 by @viljamis"
and use of CodeMirror "http://codemirror.net/" for the file editor of the slider. Codemirror is not supplied 
with the full range of options, syntax highlight languages, but only with css mode.
Author: AdDi
Author URI: http://www.responsivesliderplugin.com
Version: 2.0
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/


/*Hook activation and deactivation. We can create a basic plug in without these hooks but they are needed for different tasks, such as Create custom options for plugins and activation and reset in deactivation */
function ssd_slider_activation() {} //activation
register_activation_hook(__FILE__, 'ssd_slider_activation');

function ssd_slider_deactivation() {} //deactivation
register_deactivation_hook(__FILE__, 'ssd_slider_deactivation');
/*End of activation - deactivation hook */


add_action('wp_enqueue_scripts', 'ssd_scripts');
function ssd_scripts() {
	global $post;
	
	if ((window.jQuery) || wp_script_is('jquery')) {
		// do nothing
		wp_register_script('responsive_script', plugins_url('js/responsiveslides.min.js', __FILE__), array('jquery'));
		wp_enqueue_script('responsive_script');
	} 
	else {
		// insert jQuery
		wp_enqueue_script('jquery');
		//register and enque scripts
		wp_register_script('responsive_script', plugins_url('js/responsiveslides.min.js', __FILE__), array('jquery'));
		wp_enqueue_script('responsive_script');
	}
	
	//register and enque styles
    wp_register_style('responsive_styles', plugins_url('css/responsiveslides.css', __FILE__));
	wp_register_style('responsive_themes', plugins_url('css/themes.css', __FILE__));
    wp_enqueue_style('responsive_styles');
	wp_enqueue_style('responsive_themes');
      
}

add_action('admin_enqueue_scripts', 'addi_admin_scripts');
function addi_admin_scripts() {
	
        wp_enqueue_media();
		
		//register and enque admin scripts
        wp_register_script('addi-admin-js', plugins_url('js/addi-admin.js', __FILE__), array( 'jquery' ));
		wp_register_script('codemirror-js', plugins_url('codemirror-3.22/lib/codemirror.js', __FILE__), array( 'jquery' ));
		wp_register_script('codemirror-css-js', plugins_url('codemirror-3.22/mode/css/css.js', __FILE__), array( 'jquery' ));
		
        wp_enqueue_script('addi-admin-js');
        wp_enqueue_script('codemirror-js');
        wp_enqueue_script('codemirror-css-js');
		
		//register and enque general style for codemirror editor
		wp_register_style('codemirror_styles', plugins_url('codemirror-3.22/lib/codemirror.css', __FILE__));
		wp_enqueue_style('codemirror_styles');
		
		
		//register and enque themes for codemirror editor
		wp_register_style('codemirror_themes', plugins_url('codemirror-3.22/theme/3024-day.css', __FILE__));
		wp_register_style('codemirror_themes1', plugins_url('codemirror-3.22/theme/3024-night.css', __FILE__));
		wp_register_style('codemirror_themes2', plugins_url('codemirror-3.22/theme/ambiance.css', __FILE__));
		wp_register_style('codemirror_themes3', plugins_url('codemirror-3.22/theme/base16-dark.css', __FILE__));
		wp_register_style('codemirror_themes4', plugins_url('codemirror-3.22/theme/base16-light.css', __FILE__));
		wp_register_style('codemirror_themes5', plugins_url('codemirror-3.22/theme/blackboard.css', __FILE__));
		wp_register_style('codemirror_themes6', plugins_url('codemirror-3.22/theme/cobalt.css', __FILE__));
		wp_register_style('codemirror_themes7', plugins_url('codemirror-3.22/theme/eclipse.css', __FILE__));
		wp_register_style('codemirror_themes8', plugins_url('codemirror-3.22/theme/blackboard.css', __FILE__));
		wp_register_style('codemirror_themes9', plugins_url('codemirror-3.22/theme/elegant.css', __FILE__));
		wp_register_style('codemirror_themes10', plugins_url('codemirror-3.22/theme/erlang-dark.css', __FILE__));
		wp_register_style('codemirror_themes11', plugins_url('codemirror-3.22/theme/lesser-dark.css', __FILE__));
		wp_register_style('codemirror_themes12', plugins_url('codemirror-3.22/theme/mbo.css', __FILE__));
		wp_register_style('codemirror_themes13', plugins_url('codemirror-3.22/theme/mdn-like.css', __FILE__));
		wp_register_style('codemirror_themes14', plugins_url('codemirror-3.22/theme/midnight.css', __FILE__));
		wp_register_style('codemirror_themes15', plugins_url('codemirror-3.22/theme/monokai.css', __FILE__));
		wp_register_style('codemirror_themes16', plugins_url('codemirror-3.22/theme/neat.css', __FILE__));
		wp_register_style('codemirror_themes17', plugins_url('codemirror-3.22/theme/night.css', __FILE__));
		wp_register_style('codemirror_themes18', plugins_url('codemirror-3.22/theme/paraiso-dark.css', __FILE__));
		wp_register_style('codemirror_themes19', plugins_url('codemirror-3.22/theme/paraiso-light.css', __FILE__));
		wp_register_style('codemirror_themes20', plugins_url('codemirror-3.22/theme/pastel-on-dark.css', __FILE__));
		wp_register_style('codemirror_themes21', plugins_url('codemirror-3.22/theme/rubyblue.css', __FILE__));
		wp_register_style('codemirror_themes22', plugins_url('codemirror-3.22/theme/solarized.css', __FILE__));
		wp_register_style('codemirror_themes23', plugins_url('codemirror-3.22/theme/the-matrix.css', __FILE__));
		wp_register_style('codemirror_themes24', plugins_url('codemirror-3.22/theme/tomorrow-night-eighties.css', __FILE__));
		wp_register_style('codemirror_themes25', plugins_url('codemirror-3.22/theme/twilight.css', __FILE__));
		wp_register_style('codemirror_themes26', plugins_url('codemirror-3.22/theme/vibrant-ink.css', __FILE__));
		wp_register_style('codemirror_themes27', plugins_url('codemirror-3.22/theme/xg-dark.css', __FILE__));
		wp_register_style('codemirror_themes28', plugins_url('codemirror-3.22/theme/xg-light.css', __FILE__));
		wp_register_style('codemirror_themes29', plugins_url('codemirror-3.22/theme/light-table.css', __FILE__));
		
		
		
		wp_enqueue_style('codemirror_themes');
		wp_enqueue_style('codemirror_themes1');
		wp_enqueue_style('codemirror_themes2');
		wp_enqueue_style('codemirror_themes3');
		wp_enqueue_style('codemirror_themes4');
		wp_enqueue_style('codemirror_themes5');
		wp_enqueue_style('codemirror_themes6');
		wp_enqueue_style('codemirror_themes7');
		wp_enqueue_style('codemirror_themes8');
		wp_enqueue_style('codemirror_themes9');
		wp_enqueue_style('codemirror_themes10');
		wp_enqueue_style('codemirror_themes11');
		wp_enqueue_style('codemirror_themes12');
		wp_enqueue_style('codemirror_themes13');
		wp_enqueue_style('codemirror_themes14');
		wp_enqueue_style('codemirror_themes15');
		wp_enqueue_style('codemirror_themes16');
		wp_enqueue_style('codemirror_themes17');
		wp_enqueue_style('codemirror_themes18');
		wp_enqueue_style('codemirror_themes19');
		wp_enqueue_style('codemirror_themes20');
		wp_enqueue_style('codemirror_themes21');
		wp_enqueue_style('codemirror_themes22');
		wp_enqueue_style('codemirror_themes23');
		wp_enqueue_style('codemirror_themes24');
		wp_enqueue_style('codemirror_themes25');
		wp_enqueue_style('codemirror_themes26');
		wp_enqueue_style('codemirror_themes27');
		wp_enqueue_style('codemirror_themes28');
		wp_enqueue_style('codemirror_themes29');	
}

/*Shortcode for plugin. We can call it anywhere with the following syntax: [responsive_slider id='id'/]*/
/*Shortcodes can be used inside theme or plugin files with do_shortcode function as shown below.*/
/*echo do_shortcode('[responsive_slider id='id'/]') */
add_shortcode("responsive_slider", "ssd_display_slider");
function ssd_display_slider($attr, $content) {
	
	   
		
	    extract(shortcode_atts(array(
                'id' => ''
                    ), $attr));

		$gallery_images = get_post_meta($id, "_ssd_gallery_images", true);
		$gallery_images = ($gallery_images != '') ? json_decode($gallery_images) : array();
		
		$caption_text = get_post_meta($id, "_ssd_caption_text", true);
		$caption_text = ($caption_text != '') ? json_decode($caption_text) : array();
	
		$opt = slider_options_array($id);
	
		$html = '<script type="text/javascript">jQuery(document).ready(function() {
							jQuery("#'.$opt[10].'").responsiveSlides({
								auto: '.$opt[0].',
								timeout: '.$opt[1].',
								speed: '.$opt[2].',
								pager: '.$opt[3].',
								nav: '.$opt[4].',
								random: '.$opt[5].',
								pause: '.$opt[6].',
								pauseControls: '.$opt[7].',
								prevText: "'.$opt[8].'",
								nextText: "'.$opt[9].'",
								namespace: "'.$opt[11].'",
								pagination: '.$opt[12].'
							});
						   });
				  </script>
				  <div class="rslides_container">
				  <ul class="rslides" id="'.$opt[10].'">';
				  $i = 0;
			foreach ($gallery_images as $gal_img) {
				if($gal_img != ""){
					if($opt[12] == 'false'){
					$html .= "<li><img src='" . $gal_img . "' /></li>";
					}
					else{
						$html .= "<li>
									<img src='" . $gal_img . "' />
									<p class='caption'>".$caption_text[$i]."</p>
								</li>";
								$i = $i+1;
					}
				}
			}
		$html .=  '</ul></div>';
		return $html;	
}


/*Register a new post type for sliders*/
add_action('init', 'ssd_register_slider');
function ssd_register_slider() {

    $labels = array(
    'menu_name' => _x('Responsive Sliders', 'resp_slider'),
	'name' => _x('Slides', 'resp_slider')
	);

    $args = array(
       'labels' => $labels,
       'hierarchical' => true,
       'description' => 'Slideshows',
       /*'supports' => array('title', 'editor'),*/
	   'supports' => 'title',
       'public' => true,
       'show_ui' => true,
       'show_in_menu' => true,
       'show_in_nav_menus' => true,
       'publicly_queryable' => true,
       'exclude_from_search' => false,
       'has_archive' => true,
       'query_var' => true,
       'can_export' => true,
       'rewrite' => true,
       'capability_type' => 'post'
    );

    register_post_type('resp_slider', $args);

}
/*End of new post type for sliders*/


/* Define shortcode column in  Slider List View */
add_filter('manage_edit-resp_slider_columns', 'ssd_set_custom_edit_resp_slider_columns');
add_action('manage_resp_slider_posts_custom_column', 'ssd_custom_resp_slider_column', 10, 2);

function ssd_set_custom_edit_resp_slider_columns($columns) {
    return $columns
            + array('slider_shortcode' => __('Shortcode'));
}

function ssd_custom_resp_slider_column($column, $post_id) {

    $slider_meta = get_post_meta($post_id, "_ssd_slider_meta", true);
    $slider_meta = ($slider_meta != '') ? json_decode($slider_meta) : array();

    switch ($column) {
        case 'slider_shortcode':
            echo "[responsive_slider id='$post_id' /]";
            break;

    }
}
/* End of Define shortcode column in  Slider List View */


/*Add images url into slider post administration panel*/
add_action('add_meta_boxes', 'ssd_slider_meta_box');

function ssd_slider_meta_box() {
 add_meta_box("ssd-slider-images", "Slider Images", 'ssd_view_slider_images_box', "resp_slider", "normal");

}

function ssd_view_slider_images_box() {
 	global $post;

    $gallery_images = get_post_meta($post->ID, "_ssd_gallery_images", true);
	$gallery_images = ($gallery_images != '') ? json_decode($gallery_images) : array();
	
	$caption_text = get_post_meta($post->ID, "_ssd_caption_text", true);
	$caption_text = ($caption_text != '') ? json_decode($caption_text) : array();

    // Use nonce for verification
    $html =  '<input type="hidden" name="ssd_slider_box_nonce" value="'. wp_create_nonce(basename(__FILE__)). '" />';
	
	// Call method create_url_image_text() to create the text and buttons to upload the images	
	$sliders_text_url = create_url_image_text($html, $gallery_images, $caption_text);
	echo $sliders_text_url;
}
/*End of Add images url into slider post administration panel*/


/*Add options for slider*/
add_action('add_meta_boxes', 'ssd_slider_options_meta_box');

function ssd_slider_options_meta_box() {
 add_meta_box("ssd-options-images", "Slider Options", 'ssd_view_slider_options_box', "resp_slider", "normal");

}

function ssd_view_slider_options_box() {
 	global $post;
	
	//create array of registered slider options
	$admin_options = admin_slider_options_array($post);
	
	//create options panel and echo it
	$options_panel = create_slider_options_panel($admin_options);
	echo $options_panel;
	
}
/*End of options for slider*/


/*Edit CSS file of slider*/
add_action('add_meta_boxes','ssd_slider_edit_meta_box');
/*add_action('save_post', 'ssd_view_slider_edit_box');*/
add_action('save_post', 'save_slider_style');

function ssd_slider_edit_meta_box() {
 add_meta_box("ssd-edit-images", "Slider Style Editor", 'ssd_view_slider_edit_box', "resp_slider", "normal");
}

function ssd_view_slider_edit_box() {
	global $post;
	
	//get css file of slider
	$rf = return_real_file();
	
	//get content of css file of slider and set it to the textarea
	$content = file_get_contents($rf);
	$content = esc_textarea($content);
	
	//save content of text area to the css file of slider(update file)
	save_slider_style($rf);
	
	//create the editor of the css file
	$textarea_theme = get_post_meta($post->ID, "_ssd_select", true);
	if ($textarea_theme == ''){
		$textarea_theme = 'default';
	}
	else{
		$textarea_theme;
	}
	$select_options = style_array();
	$style_editor = create_slider_editor($content, $textarea_theme, $select_options);
	echo $style_editor;
	
	
}

/*End of Edit CSS file of slider*/



/* Save Slider Options to database */
add_action('save_post', 'ssd_save_slider_info');

function ssd_save_slider_info($post_id) {
    // verify nonce
    if (!wp_verify_nonce($_POST['ssd_slider_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if ('resp_slider' == $_POST['post_type'] && current_user_can('edit_post', $post_id)) {
		//call save method
		 save_new_slider($post_id);
    } else {
        return $post_id;
    }
}
/*End of Save Slider Options to database */

/*Include General Functions*/
include('methods.php');
include('file_operations.php');
/*End of General Functions*/
?>