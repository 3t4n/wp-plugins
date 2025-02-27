<?php
/**
 * Plugin Name: Sitemap HTML Generator
 * Plugin URI: https://wordpress.org/plugins/html-sitemap-generator/
 * Description: Use a shortcode [sp_sitemap_html] to display anywhere HTML sitemap with all your WordPress posts and pages.
 * Version: 1.0
 * Author: Sirius Pro
 * Author URI: https://siriuspro.pl
 * License: GPL v3
 * License URI: https://www.gnu.org/licenses/gpl.html
 */

// Sitemap HTML Generator

function sp_wordpress_html_sitemap_generate() {
  ob_start();

  include plugin_dir_path( __FILE__ ) . 'sitemap-html.php';
  return ob_get_clean();
}
add_shortcode('sp_sitemap_html', 'sp_wordpress_html_sitemap_generate');


add_action( 'admin_menu', 'sp_wordpress_html_sitemap_generator_options_page' );

function sp_wordpress_html_sitemap_generator_options_page() {

	add_options_page(
		'Sitemap HTML', // page <title>Title</title>
		'Sitemap HTML', // menu link text
		'manage_options', // capability to access the page
		'sp_wordpress_html_sitemap_generator_slug', // page URL slug
		'sp_wordpress_html_sitemap_generator_page_content', // callback function with content
		2 // priority
	);

}


function sp_wordpress_html_sitemap_generator_page_content(){

	echo '<div class="wrap">
	<h1>Sitemap HTML Generator</h1>
	<form method="post" action="options.php">';
			
		settings_fields( 'sp_wordpress_html_sitemap_generator_settings' ); // settings group name
		do_settings_sections( 'sp_wordpress_html_sitemap_generator-slug' ); // just a page slug
		submit_button();

	echo '</form></div>';

}

add_action( 'admin_init',  'sp_wordpress_html_sitemap_generator_register_setting' );

function sp_wordpress_html_sitemap_generator_register_setting(){

	register_setting(
		'sp_wordpress_html_sitemap_generator_settings', // settings group name
		'pages_title', // option name
		'sanitize_text_field' // sanitization function
	);
	register_setting(
		'sp_wordpress_html_sitemap_generator_settings', // settings group name
		'posts_title', // option name
		'sanitize_text_field' // sanitization function
	);

	add_settings_section(
		'sp_wordpress_html_sitemap_generator_section_id', // section ID
		'', // title (if needed)
		'', // callback function (if needed)
		'sp_wordpress_html_sitemap_generator-slug' // page slug
	);

	add_settings_field(
		'pages_title',
		'Pages Title',
/**		'Enter authors ID\'s with comas', **/
		'sp_wordpress_html_sitemap_generator_text_field_first', // function which prints the field
		'sp_wordpress_html_sitemap_generator-slug', // page slug
		'sp_wordpress_html_sitemap_generator_section_id', // section ID
		array( 
			'label_for' => 'pages_title',
			'class' => 'sp_wordpress_html_sitemap_generator-class', // for <tr> element
		)
	);
	
	add_settings_field(
		'posts_title',
		'Posts Title',
/**		'Enter authors ID\'s with comas', **/
		'sp_wordpress_html_sitemap_generator_text_field_second', // function which prints the field
		'sp_wordpress_html_sitemap_generator-slug', // page slug
		'sp_wordpress_html_sitemap_generator_section_id', // section ID
		array( 
			'label_for' => 'posts_title',
			'class' => 'sp_wordpress_html_sitemap_generator-class', // for <tr> element
		)
	);

}

function sp_wordpress_html_sitemap_generator_text_field_first(){

	$text = get_option( 'pages_title' );

	printf(
		'<input type="text" id="pages_title" name="pages_title" value="%s" placeholder="Pages"/>',
		esc_attr( $text )
	);

}

function sp_wordpress_html_sitemap_generator_text_field_second(){

	$text2 = get_option( 'posts_title' );

	printf(
		'<input type="text" id="posts_title" name="posts_title" value="%s" placeholder="Posts"/>',
		esc_attr( $text2 )
	);

}




