<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


// Create sermon series taxonomy
function asp_register_taxes_series() {

	// Get or set the archive slug
	$asp_archive_slug = get_option('asp_general_archive_slug');
	if (!empty($asp_archive_slug)) {
		$asp_archive_slug = strtolower($asp_archive_slug);
	} else {
		$asp_archive_slug = 'sermons'; // Fallback slug
	}

    /**
    * Taxonomy: Sermon Series.
    **/

    $labels = array(
        "name" => __("Series", "advanced-sermons"),
        "singular_name" => __("Series", "advanced-sermons"),
        "menu_name" => __("Series", "advanced-sermons"),
        "search_items" => __("Search Series", "advanced-sermons"),
        "popular_items" => __("Most popular series", "advanced-sermons"),
        "all_items" => __("All Series", "advanced-sermons"),
        "edit_item" => __("Edit Series", "advanced-sermons"),
        "update_item" => __("Update Series", "advanced-sermons"),
        "add_new" => __("Add New Series", "advanced-sermons"),
        "add_new_item" => __("Add New Series", "advanced-sermons"),
        'view_item' => __("View Series", "advanced-sermons"),
        "not_found" => __("No Series found.", "advanced-sermons"),
        "back_to_items" => __("Back to Series", "advanced-sermons"),
        'parent_item' => null,
        'parent_item_colon' => null,
    );
    $args = array(
        "label" => __("Series", "advanced-sermons"),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => false,
        "query_var" => true,
        "has_archive" => true,
        "rewrite" => array(
        "slug" => "/$asp_archive_slug/?sermon_series=", "with_front" => false),
        "show_admin_column" => true,
        "show_in_rest" => false,
        "show_in_quick_edit" => true,
    );
    register_taxonomy("sermon_series", array("sermons"), $args);
}

add_action('init', 'asp_register_taxes_series');


// Create sermon speaker taxonomy
function asp_register_taxes_sermon_speaker() {
    // Get Advanced Sermons global variables
    global $asp_speaker_label;

	// Get or set the archive slug
	$asp_archive_slug = get_option('asp_general_archive_slug');
	if (!empty($asp_archive_slug)) {
		$asp_archive_slug = strtolower($asp_archive_slug);
	} else {
		$asp_archive_slug = 'sermons'; // Fallback slug
	}

    /**
    * Taxonomy: Sermon Speakers.
    **/

    $labels = array(
        "name" => __(asp_speaker_plural($asp_speaker_label), "advanced-sermons"),
        "singular_name" => __("$asp_speaker_label", "advanced-sermons"),
        "menu_name" => __(asp_speaker_plural($asp_speaker_label), "advanced-sermons"),
        "search_items" => __("Search" . " " . asp_speaker_plural($asp_speaker_label), "advanced-sermons"),
        "popular_items" => __("Most popular" . " " . asp_speaker_plural($asp_speaker_label), "advanced-sermons"),
        "all_items" => __("All" . " " . asp_speaker_plural($asp_speaker_label), "advanced-sermons"),
        "edit_item" => __("Edit $asp_speaker_label", "advanced-sermons"),
        "update_item" => __("Update $asp_speaker_label", "advanced-sermons"),
        "add_new" => __("Add New $asp_speaker_label", "advanced-sermons"),
        "add_new_item" => __("Add New $asp_speaker_label", "advanced-sermons"),
        'view_item' => __("View $asp_speaker_label", "advanced-sermons"),
        "not_found" => __("No " . asp_speaker_plural($asp_speaker_label) . " found.", "advanced-sermons"),
        "back_to_items" => __("Back to" . " " . asp_speaker_plural($asp_speaker_label), "advanced-sermons"),
        'parent_item' => null,
        'parent_item_colon' => null,
    );
    $args = array(
        "label" => __(asp_speaker_plural($asp_speaker_label), "advanced-sermons"),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => false,
        "query_var" => true,
        "has_archive" => true,
        "rewrite" => array("slug" => "/$asp_archive_slug/?sermon_speaker=", "with_front" => false),
        "show_admin_column" => true,
        "show_in_rest" => false,
        "show_in_quick_edit" => true,
    );
    register_taxonomy("sermon_speaker", array("sermons"), $args);
}

add_action('init', 'asp_register_taxes_sermon_speaker');


// Create sermon topics taxonomy
function asp_register_taxes_topics() {
    // Get Advanced Sermons global variables
    global $asp_topic_label;

	// Get or set the archive slug
	$asp_archive_slug = get_option('asp_general_archive_slug');
	if (!empty($asp_archive_slug)) {
		$asp_archive_slug = strtolower($asp_archive_slug);
	} else {
		$asp_archive_slug = 'sermons'; // Fallback slug
	}

    /**
    * Taxonomy: Sermon Topics.
    **/

    $labels = array(
        "name" => __(asp_topic_plural($asp_topic_label), "advanced-sermons"),
        "singular_name" => __("$asp_topic_label", "advanced-sermons"),
        "menu_name" => __(asp_topic_plural($asp_topic_label), "advanced-sermons"),
        "search_items" => __("Search" . " " . asp_topic_plural($asp_topic_label), "advanced-sermons"),
        "popular_items" => __("Most popular" . " " . asp_topic_plural($asp_topic_label), "advanced-sermons"),
        "all_items" => __("All" . " " . asp_topic_plural($asp_topic_label), "advanced-sermons"),
        "edit_item" => __("Edit $asp_topic_label", "advanced-sermons"),
        "update_item" => __("Update $asp_topic_label", "advanced-sermons"),
        "add_new" => __("Add New $asp_topic_label", "advanced-sermons"),
        "add_new_item" => __("Add New $asp_topic_label", "advanced-sermons"),
        'view_item' => __("View $asp_topic_label", "advanced-sermons"),
        "not_found" => __("No " . asp_topic_plural($asp_topic_label) . " found.", "advanced-sermons"),
        "back_to_items" => __("Back to" . " " . asp_topic_plural($asp_topic_label), "advanced-sermons"),
        "separate_items_with_commas" => __("Seperate multiple" . " " . asp_topic_plural($asp_topic_label) . " " . "with a comma", "advanced-sermons"),
        "choose_from_most_used" => __("Choose from the most used" . " " . asp_topic_plural($asp_topic_label), "advanced-sermons"),
        'parent_item' => null,
        'parent_item_colon' => null,
    );
    $args = array(
        "label" => __(asp_topic_plural($asp_topic_label), "advanced-sermons"),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => false,
        "query_var" => true,
        "has_archive" => true,
        "rewrite" => array("slug" => "/$asp_archive_slug/?sermon_topics=", "with_front" => false),
        "show_admin_column" => true,
        "show_in_rest" => false,
        "show_in_quick_edit" => true,
    );
    register_taxonomy("sermon_topics", array("sermons"), $args);
}
add_action('init', 'asp_register_taxes_topics');


// Create sermon book taxonomy
function asp_register_taxes_book() {
    // Get Advanced Sermons global variables
    global $asp_book_label;

	// Get or set the archive slug
	$asp_archive_slug = get_option('asp_general_archive_slug');
	if (!empty($asp_archive_slug)) {
		$asp_archive_slug = strtolower($asp_archive_slug);
	} else {
		$asp_archive_slug = 'sermons'; // Fallback slug
	}

    /**
    * Taxonomy: Sermon Book.
    **/

    $labels = array(
        "name" => __(asp_book_plural($asp_book_label), "advanced-sermons"),
        "singular_name" => __("$asp_book_label", "advanced-sermons"),
        "menu_name" => __(asp_book_plural($asp_book_label), "advanced-sermons"),
        "search_items" => __("Search" . " " . asp_book_plural($asp_book_label), "advanced-sermons"),
        "popular_items" => __("Most popular" . " " . asp_book_plural($asp_book_label), "advanced-sermons"),
        "all_items" => __("All" . " " . asp_book_plural($asp_book_label), "advanced-sermons"),
        "edit_item" => __("Edit $asp_book_label", "advanced-sermons"),
        "update_item" => __("Update $asp_book_label", "advanced-sermons"),
        "add_new" => __("Add New $asp_book_label", "advanced-sermons"),
        "add_new_item" => __("Add New $asp_book_label", "advanced-sermons"),
        'view_item' => __("View $asp_book_label", "advanced-sermons"),
        "not_found" => __("No " . asp_book_plural($asp_book_label) . " found.", "advanced-sermons"),
        "back_to_items" => __("Back to" . " " . asp_book_plural($asp_book_label), "advanced-sermons"),
        "separate_items_with_commas" => __("Seperate" . " " . asp_book_plural($asp_book_label) . " " . "with commas. Limited five" . " " . asp_book_plural($asp_book_label),
        "advanced-sermons"),
        "choose_from_most_used" => __("Choose from the most used" . " " . asp_book_plural($asp_book_label),
        "advanced-sermons"),
        'parent_item' => null,
        'parent_item_colon' => null,
    );
    $args = array(
        "label" => __(asp_book_plural($asp_book_label), "advanced-sermons"),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => false,
        "query_var" => true,
        "has_archive" => true,
        "rewrite" => array("slug" => "/$asp_archive_slug/?sermon_book=", "with_front" => false),
        "show_admin_column" => true,
        "show_in_rest" => false,
        "show_in_quick_edit" => true,
    );
    register_taxonomy("sermon_book", array("sermons"), $args);
}
add_action('init', 'asp_register_taxes_book');