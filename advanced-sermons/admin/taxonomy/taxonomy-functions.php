<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Files that are required for sermon taxamony modifications
require( plugin_dir_path( __FILE__ ) . 'speaker-image.php');
require( plugin_dir_path( __FILE__ ) . 'speaker-meta.php');
require( plugin_dir_path( __FILE__ ) . 'series-meta.php');
require( plugin_dir_path( __FILE__ ) . 'series-image.php');
require( plugin_dir_path( __FILE__ ) . 'terms-order.php');


// Add necessary scripts to handle taxonomy upload image functionality
add_action('plugins_loaded', function(){
    if($GLOBALS['pagenow']=='post.php'){
        add_action('admin_print_scripts', 'asp_sermon_admin_scripts');
        add_action('admin_print_styles',  'asp_sermon_admin_styles');
    }
});


function asp_sermon_admin_scripts(){
    wp_enqueue_script('jquery');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
}


function asp_sermon_admin_styles(){
    wp_enqueue_style('thickbox');
}


// Display taxonomy drag and drop hint when deactivated
function asp_admin_notice_taxonomy_drag_drop_hint() {
	// Get the current screen details
	$current_screen = get_current_screen();

	// Check if we are on a taxonomy screen
	if (isset($current_screen->taxonomy)) {
		// Define an associative array for the taxonomy settings
		$taxonomy_settings = array(
			'sermon_series'  => 'asp_archive_series_dropdown_orderby',
			'sermon_speaker' => 'asp_archive_speaker_dropdown_orderby',
			'sermon_topics'  => 'asp_archive_topic_dropdown_orderby',
			'sermon_book'   => 'asp_archive_book_dropdown_orderby'
		);

		// Check if the current taxonomy is in our array
		if (array_key_exists($current_screen->taxonomy, $taxonomy_settings)) {
			$current_option = get_option($taxonomy_settings[$current_screen->taxonomy]);
			// Check if Drag & Drop is not selected
			if ($current_option !== 'custom_order') {
				echo '<div class="asp-admin-notice asp-taxonomy-hint asp-disabled"><strong>Hint:</strong> Enable drag-and-drop ordering in Advanced Sermons by adjusting the Archive Settings. You can learn more <a href="https://advancedsermons.com/docs/taxonomy-drag-drop-ordering/" target="_blank">here</a>.</div>';
			} else {
				// Display a different notice when Drag & Drop is selected
				echo '<div class="asp-admin-notice asp-taxonomy-hint asp-enabled"><strong>Hint:</strong> "Screen Options" in the top right corner of the WordPress dashboard, allows you to increase items per page to order large libraries.</div>';
			}
		}
	}
}
// Hook the function to the relevant actions
add_action('after-sermon_series-table', 'asp_admin_notice_taxonomy_drag_drop_hint');
add_action('after-sermon_speaker-table', 'asp_admin_notice_taxonomy_drag_drop_hint');
add_action('after-sermon_topics-table', 'asp_admin_notice_taxonomy_drag_drop_hint');
add_action('after-sermon_book-table', 'asp_admin_notice_taxonomy_drag_drop_hint');
