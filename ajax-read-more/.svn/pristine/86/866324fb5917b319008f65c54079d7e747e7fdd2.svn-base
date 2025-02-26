<?php 
add_action('wp_print_styles', 'ajax_read_more_wp_print_styles');

function ajax_read_more_wp_print_styles() {
	foreach ( array('all', 'screen', 'handheld', 'print') as $media ) {
		if ( file_exists( WP_PLUGIN_DIR . '/' . dirname(plugin_basename(__FILE__)) . "/$media.css" ) ) {
			wp_register_style(
				"ajax_read_more_$media",
				WP_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__)) . "/$media.css",
				array(),
				'2.0.5',
				$media
			);
			wp_enqueue_style("ajax_read_more_$media");
		};
	};
};
?>