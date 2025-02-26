<?php

add_filter('theme_page_templates', 'add_dp_counter_template');
add_filter('wp_insert_post_data', 'register_dp_counter_templates');
add_filter('template_include', 'view_dp_counter_template');

function add_dp_counter_template($posts_templates) {
 
  $dv_templates = array(
    'dp-counter-template.php' => 'DP Number Counter',
  );

  $posts_templates = array_merge($posts_templates, $dv_templates);
  return $posts_templates;
}

function register_dp_counter_templates($atts) {

  $dv_templates = array(
    'dp-counter-template.php' => 'DP Number Counter',
  );

	// Create the key used for the themes cache
	$cache_key = 'page_templates-' . md5(get_theme_root() . '/' . get_stylesheet());

	// Retrieve the cache list. 
	// If it doesn't exist, or it's empty prepare an array
	$templates = wp_get_theme()->get_page_templates();
	if (empty($templates)) {
		$templates = array();
	} 

	// New cache, therefore remove the old one
	wp_cache_delete($cache_key , 'themes');

	// Now add our template to the list of templates by merging our templates
	// with the existing templates array from the cache.
	$templates = array_merge($templates, $dv_templates);

	// Add the modified cache to allow WordPress to pick it up for listing
	// available templates
	wp_cache_add($cache_key, $templates, 'themes', 1800);

	return $atts;
}

function view_dp_counter_template($template) {
	
	// Get global post
	global $post;

  $dv_templates = array(
    'dp-counter-template.php' => 'DP Number Counter',
  );

	// Return template if post is empty
	if ( ! $post) {
		return $template;
	}

	// Return default template if we don't have a custom one defined
	if ( ! isset($dv_templates[get_post_meta( 
		$post->ID, '_wp_page_template', true 
	)])) {
		return $template;
	} 

	$file = plugin_dir_path(__FILE__). get_post_meta( 
		$post->ID, '_wp_page_template', true
	);

	// Just to be safe, we check if the file exist first
	if (file_exists($file)) {
		return $file;
	} else {
		echo $file;
	}

	// Return template
	return $template;
}