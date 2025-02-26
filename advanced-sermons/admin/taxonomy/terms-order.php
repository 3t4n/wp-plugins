<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


function asp_taxonomies_keys() {
	return [
		'sermon_speaker' => 'speaker',
		'sermon_series' => 'series',
		'sermon_topics' => 'topic',
		'sermon_book' => 'book',
	];
}


// Enable JS for archive drag & drop ordering for taxonomies
add_action('admin_enqueue_scripts', 'asp_archive_drag_drop');
function asp_archive_drag_drop()
{
	global $asp_plugin_version;

	$screen = get_current_screen();
	if($screen->post_type !== 'sermons' || strpos($screen->id, 'edit-sermon_') !== 0) {
		return false;
	}

	wp_enqueue_script('asp-drag-drop', ASPURL . '/styling/js/asp-drag-drop.js', ['jquery-ui-sortable'], $asp_plugin_version);

	wp_localize_script('asp-drag-drop', 'asp_ajax', [
		'url' => admin_url( 'admin-ajax.php' ),
		'_nonce' => wp_create_nonce( 'asp_archive_sort_nonce'),
		'taxonomy' => $screen->taxonomy,
		'post_type' => $screen->post_type,
	]);
}


// Handle ordering save request
add_action('wp_ajax_asp_archive_order', 'asp_save_archive_order');
function asp_save_archive_order() {
	global $wpdb;

	// Security check: verify nonce
	if (!isset($_POST['_nonce']) || !wp_verify_nonce($_POST['_nonce'], 'asp_archive_sort_nonce')) {
		wp_send_json_error('Nonce verification failed.');
		return;
	}

	// Get the current page number and terms per page from the AJAX request
	$currentPage = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$termsPerPage = isset($_POST['per_page']) ? intval($_POST['per_page']) : 20; // Default to 20 or fetch from WordPress settings

	// Parse the order array
	$order = [];
	wp_parse_str($_POST['order'], $order);
	$order = isset($order['tag']) ? $order['tag'] : [];

	if (empty($order)) {
		wp_send_json_success();
		return;
	}

	// Calculate the number of terms on the current page
	$numTermsOnPage = count($order);

	// Update each term's order
	foreach ($order as $position => $term_id) {
		// Calculate the global position
		$globalPosition = ($currentPage - 1) * $termsPerPage + $position + 1;
		update_term_meta($term_id, 'asp_term_order', $globalPosition);
	}

	wp_send_json_success();
}


add_action('create_term', 'asp_set_default_order_for_new_term', 10, 3);
function asp_set_default_order_for_new_term($term_id, $tt_id, $taxonomy) {
	$taxonomies = asp_taxonomies_keys();
	if (array_key_exists($taxonomy, $taxonomies)) {
		update_term_meta($term_id, 'asp_term_order', 0); // Set default order to 0
	}
}


// Order terms in query
function asp_term_orderby($query) {
	$orderby = null;
    $taxonomies = asp_taxonomies_keys();

if (is_array($query->query_vars['taxonomy']) && isset($query->query_vars['taxonomy'][0]) && in_array($query->query_vars['taxonomy'][0], array_keys($taxonomies))) {
        $taxonomy_key = $query->query_vars['taxonomy'][0];
        $orderby = get_option('asp_archive_' . $taxonomies[$taxonomy_key] . '_dropdown_orderby');

        if ($orderby !== 'custom_order') {
            return;
        }

        $query->query_vars['orderby'] = 'meta_value_num';
        $query->query_vars['meta_query'] = [
            'relation' => 'OR',
            array(
                'key' => 'asp_term_order',
                'compare' => 'EXISTS',
            ),
            array(
                'key' => 'asp_term_order',
                'compare' => 'NOT EXISTS',
            )
        ];
    }
}
add_action('parse_term_query', 'asp_term_orderby', 999);


// Add drag icon to taxonomy columns if enabled in settings
add_action('admin_init', 'asp_taxonomy_order_init');
function asp_taxonomy_order_init() {
	$taxonomies = asp_taxonomies_keys();

	foreach($taxonomies as $taxonomy => $key) {
		add_filter( "manage_edit-{$taxonomy}_columns", 'asp_taxonomy_column_order', 1);
		add_filter( "manage_{$taxonomy}_custom_column", 'asp_taxonomy_column_order_content', 1, 3);
	}
}

function asp_taxonomy_column_order($columns) {
	$columns['asp_order'] = '';
	return $columns;
}

function asp_taxonomy_column_order_content($output, $column_name, $term_id) {
	if($column_name !== 'asp_order') {
		return '';
	}

	// Get current taxonomy
	$current_screen = get_current_screen();
	if (!$current_screen || empty($current_screen->taxonomy)) {
		return '';
	}

	// Define settings for each taxonomy
	$taxonomy_settings = array(
		'sermon_series'  => 'asp_archive_series_dropdown_orderby',
		'sermon_speaker' => 'asp_archive_speaker_dropdown_orderby',
		'sermon_topics'  => 'asp_archive_topic_dropdown_orderby',
		'sermon_book'   => 'asp_archive_book_dropdown_orderby'
	);

	// Check if the current taxonomy's setting key exists and get the setting
	$taxonomy_setting = '';
	if (isset($taxonomy_settings[$current_screen->taxonomy])) {
		$taxonomy_setting = $taxonomy_settings[$current_screen->taxonomy];
	}

	// Check if drag and drop is enabled for the current taxonomy
	if (get_option($taxonomy_setting) === 'custom_order') {
		return '<div class="asp-draggable"><span class="dashicons dashicons-menu"></span></div>';
	}

	return '';
}