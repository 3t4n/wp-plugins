<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


// Create the sermon custom post type required by Advanced Sermons
function asp_register_cpts_sermons() {
// Get Advanced Sermons global variables
	global $asp_sermon_label, $asp_sermon_label_slug;

	// Get or set the archive slug
	$asp_archive_slug = get_option('asp_general_archive_slug');
	if (!empty($asp_archive_slug)) {
		$asp_archive_slug = strtolower($asp_archive_slug);
	} else {
		$asp_archive_slug = 'sermons'; // Fallback slug
	}

    /**
     * Post Type: Sermons.
     **/

    $labels = array(
        "name" => __(asp_sermon_plural($asp_sermon_label), "advanced-sermons"),
        "singular_name" => __("$asp_sermon_label", "advanced-sermons"),
        'menu_name' => __(asp_sermon_plural($asp_sermon_label), "advanced-sermons"),
        "not_found" => __("No" . " " . asp_sermon_plural($asp_sermon_label) . " " . "Found", "advanced-sermons"),
        "featured_image" => __("Featured Image", "advanced-sermons"),
        "remove_featured_image" => __("Remove Featured image", "advanced-sermons"),
        "add_new" => __("Add New $asp_sermon_label", "advanced-sermons"),
        "all_items" => __("All" . " " . asp_sermon_plural($asp_sermon_label), "advanced-sermons"),
        'add_new_item' => __("Add New $asp_sermon_label", "advanced-sermons"),
        'new_item' => __("New $asp_sermon_label", "advanced-sermons"),
        'edit_item' => __("Edit $asp_sermon_label", "advanced-sermons"),
        'filter_items_list' => __("Filter" . " " . asp_sermon_plural($asp_sermon_label), "advanced-sermons"),
        "search_items" => __("Search" . " " . asp_sermon_plural($asp_sermon_label), "advanced-sermons"),
        "item_updated" => __("$asp_sermon_label updated.", "advanced-sermons"),
        "view_item" => __("View $asp_sermon_label", "advanced-sermons"),
    );
    $args = array(
        "label" => __("Sermons", "advanced-sermons"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => true,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => array("slug" => "$asp_archive_slug", "with_front" => false),
        "query_var" => true,
        "menu_position" => 49,
        "menu_icon" => 'dashicons-book-alt',
        "supports" => array("title", "editor", "thumbnail", "excerpt", "comments"),
    );
    register_post_type("sermons", $args);
}
add_action('init', 'asp_register_cpts_sermons');