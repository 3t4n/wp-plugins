<?php 
add_action('wp_enqueue_scripts', 'jquery_ajax_read_more_wp_enqueue_scripts');

function jquery_ajax_read_more_wp_enqueue_scripts() {
	wp_register_script(
		'jquery.ajax.readmore', 
		WP_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__)) . '/jquery.ajax.readmore.js',
		array('jquery'),
		'2.0.3',
		get_option('options-script-position') == 'footer'
	);
	wp_enqueue_script('jquery.ajax.readmore');
};
?>