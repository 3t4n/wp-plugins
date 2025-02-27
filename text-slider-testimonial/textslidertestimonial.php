<?php
/*
 Plugin Name: Text Sliders
 Plugin URI:  https://github.com/bravenest/text-sliders
 Description: Easy to add Text Slider via shortcode [textsliders], also support rss text slider, post text slider, woocommerce text slider, easy to add / edit / delete text sliders via text slider editor
 Version: 4.0.9
 Author: bravenest
 Author URI: https://github.com/bravenest/
 Text Domain: text-sliders
 License: GPLv3
 */
/*  Copyright 2018 - 2024 bravenest https://github.com/bravenest/
 This program comes with ABSOLUTELY NO WARRANTY;
 https://www.gnu.org/licenses/gpl-3.0.html
 https://www.gnu.org/licenses/quick-guide-gplv3.html
 */

if (!defined('ABSPATH'))
{
	exit;
}

define('TEXT_SLIDERS_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('TEXT_SLIDERS_PLUGIN_URL', plugin_dir_url( __FILE__ ));


require_once("libs/adminfunctions.php");
require_once("includes/globaltextsliderscript.php");
require_once("shortcodes.php");
require_once("rsssliders.php");
require_once("woocommerce-text-slider.php");
require_once("widget.php");


define('TEXT_SLIDER_ADMIN_PATH', plugin_dir_path(__FILE__).'admin'.'/');
require_once(TEXT_SLIDER_ADMIN_PATH.'globalsettings.php');


function ecpt_text_slider_testimonial_frontend_panel($text_slider_testimonial_how_to_bar_id, $text_slider_testimonial_how_to_bar_title = '',$text_slider_testimonial_how_to_bar_content = '')
{
	global $wpdb, $wp_roles;
	$text_slider_content = '';

	$text_slider_content .= "<div class='text_slider_testimonial'>";
	//$text_slider_content .= $text_slider_testimonial_how_to_bar_title;
	// @version 4.7.2
	$text_slider_content .= '<div class="text_slider_title">';
	// #version 4.7.2
	$text_slider_content .= $text_slider_testimonial_how_to_bar_title;
	// @version 4.7.2
	$text_slider_content .= '</div>';
	// #version 4.7.2
	
	$text_slider_content .= '</div>';
	$text_slider_content .= "<div class='text_slider_content'>" ;
	$text_slider_content .= $text_slider_testimonial_how_to_bar_content;
	$text_slider_content .= '</div>';
	
	
	return $text_slider_content;	
}

function ecpt_text_slider_add_text_slider_post_type() {
	global $wp_rewrite;
	$catlabels = array(
			'name'                          => 'Categories',
			'singular_name'                 => 'Text Sliders Categories',
			'all_items'                     => 'All Text Sliders',
			'parent_item'                   => 'Parent Text Sliders',
			'edit_item'                     => 'Edit Text Sliders',
			'update_item'                   => 'Update Text Sliders',
			'add_new_item'                  => 'Add New Text Sliders',
			'new_item_name'                 => 'New Text Sliders',
	);


	$args = array(
			'label'                         => 'Categories',
			'labels'                        => $catlabels,
			'public'                        => true,
			'hierarchical'                  => true,
			'show_ui'                       => true,
			'show_in_nav_menus'             => true,
			'args'                          => array( 'orderby' => 'term_order' ),
			'rewrite'                       => array( 'slug' => 'text_slider', 'with_front' => false ),
			'query_var'                     => true
	);

	register_taxonomy( 'text_slider_categories', 'text_slider', $args );

	$labels = array(
			'name' => __('Text Sliders', 'text-sliders'),
			'singular_name' => __('text_slider', 'text-sliders'),
			'add_new' => __('Add New', 'text-sliders'),
			'add_new_item' => __('Add New Text Sliders', 'text-sliders'),
			'edit_item' => __('Text Sliders', 'text-sliders'),
			'new_item' => __('Text Sliders', 'text-sliders'),
			'all_items' => __('All Text Sliders', 'text-sliders'),
			'view_item' => __('View Text Sliders', 'text-sliders'),
			'search_items' => __('Search Text Sliders', 'text-sliders'),
			'not_found' =>  __('No Text Sliders found', 'text-sliders'),
			'not_found_in_trash' => __('No Text Sliders found in Trash', 'text-sliders'),
			'menu_name' => __('Text Sliders', 'text-sliders')
	);

	
	$textSliderIndexRewrite =  array('slug' => 'textslider', 'with_front' => true, 'feeds' => true, 'pages' => true);
	
	$args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'_builtin' =>  false,
			'query_var' => "textslider",
			'rewrite'	=>  $textSliderIndexRewrite,
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => null,
			'exclude_from_search' => false,
			'supports' => array( 'title', 'editor','author','custom-fields','thumbnail','excerpt')
	);
	register_post_type('text_slider', $args);
	$wp_rewrite->flush_rules();
}
add_action( 'init', 'ecpt_text_slider_add_text_slider_post_type' );



function ecpt_text_slider_testimonial_shortcode($atts = '')
{
	global $table_prefix,$wpdb,$post;

	$return_content = '';
	$return_content .= '<div class="text_slider_testimonial_panel">';

	$post_type = 'text_slider';
	$sql = $wpdb->prepare( "SELECT ID, post_title, post_content FROM $wpdb->posts WHERE post_type=%s AND post_status='publish' order by post_title ASC",$post_type);

	if ((isset($atts)) && (is_array($atts)) && (count($atts) > 0))
	{
		if (isset($atts['catid']))
		{
			$user_args_catid = sanitize_text_field($atts['catid']);
			$user_args_catid_array = explode(",", trim($user_args_catid));
	
			if ((is_array($user_args_catid_array)) && (count($user_args_catid_array) > 0))
			{
					
				$user_args_catid_query = implode(',', $user_args_catid_array);
	
				/*
				$sql = "
				SELECT ID, post_title, post_content
				FROM $wpdb->posts wposts
				LEFT JOIN $wpdb->term_relationships ON (wposts.ID = $wpdb->term_relationships.object_id)
				LEFT JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
				WHERE wposts.post_type = '$post_type'
				AND post_status='publish'
				AND $wpdb->term_taxonomy.taxonomy = '$post_type_cat'
				AND $wpdb->term_taxonomy.term_id IN($user_args_catid_query)
				ORDER BY wposts.post_title ASC
				";
				*/
//3.9.5
				$sql = $wpdb->prepare( 
					"
					SELECT ID, post_title, post_content
					FROM $wpdb->posts wposts
					LEFT JOIN $wpdb->term_relationships ON (wposts.ID = $wpdb->term_relationships.object_id)
					LEFT JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
					WHERE wposts.post_type = '$post_type'
					AND post_status='publish'
					AND $wpdb->term_taxonomy.taxonomy = 'text_slider_categories'
					AND $wpdb->term_taxonomy.term_id IN(%s)
					ORDER BY wposts.post_title ASC
					",$user_args_catid_query);


			}
		}
	}
	
	$results = $wpdb->get_results( $sql );

	if ((!(empty($results))) && (is_array($results)) && (count($results) >0))
	{
		$return_content .= '<ul class="textslidercontent">';
		foreach ($results as $single)
		{
			$text_slider_testimonial_default_how_to_bar_id = 'text_slider_testimonial_video_'. $single->ID;
			$text_slider_testimonial_how_to_bar_title = $single->post_title;
			/*
			$text_slider_testimonial_how_to_bar_content = $single->post_content;
			*/
			$nativeExcerptSelect = '';
			$nativeExcerptSelect = get_option("nativeExcerptSelect");
			//by default, we use excerpt
			if (empty($nativeExcerptSelect))
			{
				$nativeExcerptSelect = 'nativeexcerpt';
			}
			//$text_slider_testimonial_how_to_bar_content = get_the_excerpt($single->ID);
				
			if ($nativeExcerptSelect == 'nativeexcerpt')
			{
				$original_post = $post;
				$post = get_post($single->ID);
				//$text_slider_testimonial_how_to_bar_content = get_the_excerpt($single->ID);
				// 3.8.7 if a theme do not support wordpress post excerpt, we will generate excerpt for the post automatically
				$text_slider_testimonial_how_to_bar_content = wp_trim_excerpt($single->post_content);
				$post = $original_post;
			}
				
			if ($nativeExcerptSelect == 'nativecontent')
			{
				$text_slider_testimonial_how_to_bar_content = $single->post_content;
			}
			
			$return_content .= '<li>';
			$return_content .= ecpt_text_slider_testimonial_frontend_panel ( $text_slider_testimonial_default_how_to_bar_id,$text_slider_testimonial_how_to_bar_title,$text_slider_testimonial_how_to_bar_content );
			$return_content .= '</li>';
		}
		$return_content .= '</ul>';

		$return_content .= '<ul class="controls" id="customize-controls">';
		$return_content .= '<li class="prev">';
		$return_content .= '<img src="'.plugin_dir_url( __FILE__ ).'asset/images/angle-left.png" alt="">';
		$return_content .= '</li>';
		$return_content .= '<li class="next">';
		$return_content .= '<img src="'.plugin_dir_url( __FILE__ ).'asset/images/angle-right.png" alt="">';
		$return_content .= '</li>';
		$return_content .= '</ul>';
		$return_content .= '<div class="playbutton-wrapper">';
		$return_content .= '<button id="customize-toggle">Pause</button>';
		$return_content .= '</div>';		

	}


	$return_content .= '</div>';


	return $return_content;

}
add_shortcode( 'testimonials', 'ecpt_text_slider_testimonial_shortcode' );
add_shortcode( 'textsliders', 'ecpt_text_slider_testimonial_shortcode' );

add_action( 'wp_enqueue_scripts', 'ecpt_text_slider_testimonial_loader_scripts' );
function ecpt_text_slider_testimonial_loader_scripts()
{
	//wp_register_style('text_slider_testimonial_jquery_css',plugin_dir_url( __FILE__ ).'asset/css/unslider.css');
	//wp_enqueue_style('text_slider_testimonial_jquery_css');

	//wp_register_style('text_slider_testimonial_dot_css',plugin_dir_url( __FILE__ ).'asset/css/unslider-dots.css');
	//wp_enqueue_style('text_slider_testimonial_dot_css');	
	
	wp_register_style('text_slider_testimonial_jquery_css',plugin_dir_url( __FILE__ ).'asset/css/tiny-slider.css');
	wp_enqueue_style('text_slider_testimonial_jquery_css');
	
	wp_register_style('text_slider_testimonial_css',plugin_dir_url( __FILE__ ).'asset/css/textslidertestimonial.css');
	wp_enqueue_style('text_slider_testimonial_css');	
	
	//wp_register_script( 'text_slider_testimonial_jquery_js', plugin_dir_url( __FILE__ ).'asset/js/unslider-min.js', array('jquery'));
	//wp_enqueue_script( 'text_slider_testimonial_jquery_js' );

	wp_register_script( 'text_slider_testimonial_call_tiny_slider_js', plugin_dir_url( __FILE__ ).'asset/js/tiny-slider.js', array('jquery'));
	wp_enqueue_script( 'text_slider_testimonial_call_tiny_slider_js' );
	
	//wp_register_script( 'text_slider_testimonial_call_js', plugin_dir_url( __FILE__ ).'asset/js/textslidertestimonial.js', array('jquery'));
	//wp_enqueue_script( 'text_slider_testimonial_call_js' );	
	
}

function ecpt_textslider_free_admin_css_js()
{
	//1.5.1
	wp_enqueue_style('textslider_admin_css', plugin_dir_url( __FILE__ ) .'asset/css/admin.css');
	wp_register_script( 'textslider_knowledgebase_js', plugin_dir_url( __FILE__ ).'asset/js/knowledgebase.js', array('jquery'));
	wp_enqueue_script( 'textslider_knowledgebase_js' );
}

add_action('admin_head', 'ecpt_textslider_free_admin_css_js');


add_action('admin_menu', 'ecpt_text_slider_menu_free');

function ecpt_text_slider_menu_free() {
	add_submenu_page('edit.php?post_type=text_slider',__('Global Settings','text-silders'), __('Global Settings','text-silders'),'manage_options', 'textsliderglobalsettings','ecpt_textSliderGlobalSettingsFree');
	add_submenu_page('edit.php?post_type=text_slider',__('Knowledge Base','text-silders'), __('Knowledge Base','text-silders'),"manage_options", 'ecpt_textsliderFAQ','ecpt_textsliderFAQ');
	//1.5.1
}

//1.5.1
function ecpt_textsliderFAQ()
{
	require_once(TEXT_SLIDER_ADMIN_PATH."knowledgebase.php");
}

/*
//2.5.1
function textSliderHead()
{
	?>
	<script type="text/javascript">
	jQuery(function($)
	{
		$(document).ready(function()
		{
			$( ".text_slider_testimonial_panel" ).unslider({
				autoplay: true,
				keys: true,
				dots: true
			});
		});
	});
	</script>
	<?php 
}
add_action('wp_head', 'textSliderHead');

*/
	
// 3.6.5
function ecpt_textSliderHeadCss()
{
	$textsliderstitlefontfamily = get_option("tiptextsliderstitlefontfamily");

	if ((!(empty($textsliderstitlefontfamily))) && ($textsliderstitlefontfamily <> 'Default'))
	{
		$textsliderstitlefontfamilyCSS = '';
		if ($textsliderstitlefontfamily == 'Andale Mono')
		{
			$textsliderstitlefontfamilyCSS = 'andale mono, monospace';
		}
			
		if ($textsliderstitlefontfamily == 'Arial')
		{
			$textsliderstitlefontfamilyCSS = 'arial, helvetica, sans-serif';
		}

		if ($textsliderstitlefontfamily == 'Arial Black')
		{
			$textsliderstitlefontfamilyCSS = 'arial black, sans-serif';
		}

		if ($textsliderstitlefontfamily == 'Book Antiqua')
		{
			$textsliderstitlefontfamilyCSS = 'book antiqua, palatino, serif';
		}

		if ($textsliderstitlefontfamily == 'Comic Sans MS')
		{
			$textsliderstitlefontfamilyCSS = 'comic sans ms, sans-serif';
		}
			
		if ($textsliderstitlefontfamily == 'Courier New')
		{
			$textsliderstitlefontfamilyCSS = 'courier new, courier, monospace';
		}
			
		if ($textsliderstitlefontfamily == 'Georgia')
		{
			$textsliderstitlefontfamilyCSS = 'georgia, palatino, serif';
		}

		if ($textsliderstitlefontfamily == 'Helvetica')
		{
			$textsliderstitlefontfamilyCSS = 'helvetica, arial, sans-serif';
		}
			
		if ($textsliderstitlefontfamily == 'Impact')
		{
			$textsliderstitlefontfamilyCSS = 'impact, sans-serif';
		}
			
		if ($textsliderstitlefontfamily == 'Symbol')
		{
			$textsliderstitlefontfamilyCSS = 'symbol';
		}
			
		if ($textsliderstitlefontfamily == 'Tahoma')
		{
			$textsliderstitlefontfamilyCSS = 'tahoma, arial, helvetica, sans-serif';
		}
			
		if ($textsliderstitlefontfamily == 'Terminal')
		{
			$textsliderstitlefontfamilyCSS = 'terminal, monaco, monospace';
		}

		if ($textsliderstitlefontfamily == 'Times New Roman')
		{
			$textsliderstitlefontfamilyCSS = 'times new roman, times, serif';
		}

		if ($textsliderstitlefontfamily == 'Trebuchet MS')
		{
			$textsliderstitlefontfamilyCSS = 'trebuchet ms, geneva, sans-serif';
		}
			
		if ($textsliderstitlefontfamily == 'Verdana')
		{
			$textsliderstitlefontfamilyCSS = 'verdana, geneva, sans-serif';
		}

		if ($textsliderstitlefontfamily == 'Webdings')
		{
			$textsliderstitlefontfamilyCSS = 'webdings';
		}

		if ($textsliderstitlefontfamily == 'Wingdings')
		{
			$textsliderstitlefontfamilyCSS = 'wingdings, zapf dingbats';
		}
			
		?>
		<style type="text/css">
						.text_slider_title
						{
							font-family: <?php echo $textsliderstitlefontfamilyCSS; ?>;
						}
		</style>
						<?php
			}
			
}
add_action('wp_head', 'ecpt_textSliderHeadCss');



// 3.8.5
function ecpt_text_slider_testimonial_newusers_navigation_bar_free()
{
	$ecpt_text_slider_testimonial_newusers_navigation_bar_free = get_option('ecpt_text_slider_testimonial_newusers_navigation_bar_free');
	if (empty($ecpt_text_slider_testimonial_newusers_navigation_bar_free))
	{
		echo "<div class='notice notice-info'><p>Thank you for using <strong>Text Sliders</strong>! Please learn our <a href='" . admin_url() . "edit.php?post_type=text_slider&page=ecpt_textsliderFAQ' target='_blank'>Knowledge Base</a> and <a href='" . admin_url() . "post-new.php?post_type=text_slider' target='_blank'>Create New Text Slider</a>, Here is <a href='" . admin_url() . "edit.php?post_type=text_slider&page=textsliderglobalsettings' target='_blank'>Global Setting Panel</a>, Question or feature request is super welcome, submite ticket at <a href='https://textsliders.com/forums/'  target='_blank'>Support Forum</a> :)</p></div>";
		update_option('ecpt_text_slider_testimonial_newusers_navigation_bar_free','yes');
	}
}

add_action( 'admin_notices', 'ecpt_text_slider_testimonial_newusers_navigation_bar_free' );



