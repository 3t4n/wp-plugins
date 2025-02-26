<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


// Get required section and layout files
require(plugin_dir_path(__FILE__) . 'layouts/grid-view.php');
require(plugin_dir_path(__FILE__) . 'sections/sermon-filter.php');
require(plugin_dir_path(__FILE__) . 'sections/archive-title.php');
require(plugin_dir_path(__FILE__) . 'sections/video-template.php');
require(plugin_dir_path(__FILE__) . 'sections/criteria-box.php');


/**
 * Assign the single sermon template
 */
add_filter('single_template', 'asp_sermon_single_template');
function asp_sermon_single_template($single_template) {
    global $post;
    if ($post->post_type === 'sermons') {
        $single_template = get_stylesheet_directory() . '/advanced-sermons/sermon-single.php';

        if (!file_exists($single_template)) {
            // If the override template does NOT exist, fallback to the default single sermon template.
            $single_template = dirname(__FILE__) . '/sermon-single.php';
        }
    }
    return $single_template;
}


// Assign the sermon archive template
add_filter('archive_template', 'asp_sermon_archive_template');
function asp_sermon_archive_template($archive_template) {
    if (is_post_type_archive('sermons')) {
        $archive_template = get_stylesheet_directory() . '/advanced-sermons/archive-sermons.php';

        if (!file_exists($archive_template)) {
            // If the override template does NOT exist, fallback to the default archive sermon template.
            $archive_template = dirname(__FILE__) . '/archive-sermons.php';
        }
    }
    return $archive_template;
}


// Assign the sermon archive to display search results for sermons
add_filter('template_include', 'asp_search_template_chooser');
function asp_search_template_chooser($search_template) {
    global $wp_query;
    $post_type = get_query_var('post_type');

    if ($wp_query->is_search && $post_type == 'sermons') {
        $search_template = get_stylesheet_directory() . '/advanced-sermons/archive-sermons.php';

        if (!file_exists($search_template)) {
            // If the override template does NOT exist, fallback to the default archive sermon template.
            $search_template = dirname(__FILE__) . '/archive-sermons.php';
        }
    }
    return $search_template;
}


//add_action('parse_query', 'asp_sermon_archive_slug', 0);
//function asp_sermon_archive_slug($query) {
//    global $asp_archive_slug;
//    if ($query->is_main_query() &&
//        (
//            get_query_var('sermon_book') ||
//            get_query_var('sermon_series') ||
//            get_query_var('sermon_speaker') ||
//            get_query_var('sermon_topics')
//        )
//    ) {
//        if (is_page($asp_archive_slug)) {
//            $query->set('post_type', 'sermons');
//            $query->is_archive = true;
//            $query->is_post_type_archive = true;
//        }
//    }
//}


// Sermon archive function linked on archive-sermons.php. Handles archive excerpt read more and length
add_filter('asp_excerpt_functions', 'asp_sermon_excerpt_functions');
function asp_sermon_excerpt_functions() {
    add_filter('excerpt_length', function ($length) {
        global $post;
        $asp_expect_length = esc_attr(get_option('asp_archive_excerpt_length') ?: '10');
        if ($post->post_type == 'sermons') {
            if (!asp_pro_activated()) {
                return 10;
            } else {
                return "$asp_expect_length";
            }
        }
        return $length;
    }, 999);

    add_filter('excerpt_more', function ($more) {
        $asp_disable_read_more = get_option('asp_archive_read_more');
        global $post, $asp_target_control;
        if (empty($asp_disable_read_more)) {
            if ($post->post_type == 'sermons') {
                return sprintf('... <a class="asp-read-more" href="%1$s" target="' . $asp_target_control . '"> %2$s</a>',
                    get_permalink(get_the_ID()), __('read more', 'advanced-sermons'));
            }
        }
    });
}


// Dynamically populate speaker data into sermon archive filter
function asp_filter_terms_dropdown_speaker($taxonomies, $args) {
    global $asp_speaker_label;
    $asp_archive_filter_sermon_count = get_option('asp_archive_filter_sermon_count');
    $asp_speaker_terms = get_terms($taxonomies, $args);
	$asp_hide_filter_speaker = get_option( 'asp_archive_hide_filter_speaker' );
	$div_class = 'sermon-field-container speaker-container';

	if (!empty($asp_hide_filter_speaker)) {
		$div_class .= ' asp-field-hidden';
	}

    if (!empty($asp_speaker_terms)) {
	    echo "<div class='$div_class'>";
        echo "<select name='sermon_speaker' class='asp-filter-speaker'>";
        echo '<option value="">' . __("All", "advanced-sermons") . " " . __(asp_speaker_plural($asp_speaker_label),
                "advanced-sermons") . '</option>';
        foreach ($asp_speaker_terms as $term) {
            $term_slug = $term->slug;
            $term_name = $term->name;
            if (empty($asp_archive_filter_sermon_count)) {
                $term_count = "($term->count)";
            } else {
                $term_count = null;
            }
            $link = $term_slug;
            if (!empty($_REQUEST['sermon_speaker'])) {
                echo "<option " . selected($_REQUEST['sermon_speaker'],
                        $link) . " value='$link'>$term_name $term_count</option>";
            } else {
                echo "<option value='$link'>$term_name $term_count</option>";
            }
        }
        echo "</select>";
        echo "</div>";
    }
}


// Dynamically populate topic data into sermon archive filter
function asp_filter_terms_dropdown_topic($taxonomies, $args) {
    global $asp_topic_label;
    $asp_archive_filter_sermon_count = get_option('asp_archive_filter_sermon_count');
    $asp_topic_terms = get_terms($taxonomies, $args);
	$asp_hide_filter_topic = get_option( 'asp_archive_hide_filter_topic' );
	$div_class = 'sermon-field-container topic-container';

	if (!empty($asp_hide_filter_topic)) {
		$div_class .= ' asp-field-hidden';
	}

    if (!empty($asp_topic_terms)) {
	    echo "<div class='$div_class'>";
        echo "<select name='sermon_topics' class='asp-filter-topic'>";
        echo '<option value="">' . __("All", "advanced-sermons") . " " . __(asp_topic_plural($asp_topic_label),
                "advanced-sermons") . '</option>';
        foreach ($asp_topic_terms as $term) {
            $term_slug = $term->slug;
            $term_name = $term->name;
            if (empty($asp_archive_filter_sermon_count)) {
                $term_count = "($term->count)";
            } else {
                $term_count = null;
            }
            $link = $term_slug;
            if (!empty($_REQUEST['sermon_topics'])) {
                echo "<option " . selected($_REQUEST['sermon_topics'],
                        $link) . " value='$link'>$term_name $term_count</option>";
            } else {
                echo "<option value='$link'>$term_name $term_count</option>";
            }
        }
        echo "</select>";
        echo "</div>";
    }
}


// Dynamically populate series data into sermon archive filter
function asp_filter_terms_dropdown_series($taxonomies, $args) {
    $asp_archive_filter_sermon_count = get_option('asp_archive_filter_sermon_count');
    $asp_series_terms = get_terms($taxonomies, $args);
	$asp_hide_filter_series = get_option( 'asp_archive_hide_filter_series' );
	$div_class = 'sermon-field-container series-container';

	if (!empty($asp_hide_filter_series)) {
		$div_class .= ' asp-field-hidden';
	}

    if (!empty($asp_series_terms)) {
	    echo "<div class='$div_class'>";
        echo "<select name='sermon_series' class='asp-filter-series'>";
        echo '<option value="">' . __("All Series", "advanced-sermons") . '</option>';
        foreach ($asp_series_terms as $term) {
            $term_slug = $term->slug;
            $term_name = $term->name;
            if (empty($asp_archive_filter_sermon_count)) {
                $term_count = "($term->count)";
            } else {
                $term_count = null;
            }
            $link = $term_slug;
            if (!empty($_REQUEST['sermon_series'])) {
                echo "<option " . selected($_REQUEST['sermon_series'],
                        $link) . " value='$link'>$term_name $term_count</option>";
            } else {
                echo "<option value='$link'>$term_name $term_count</option>";
            }
        }
        echo "</select>";
        echo "</div>";
    }
}


// Dynamically populate book data into sermon archive filter
function asp_filter_terms_dropdown_book($taxonomies, $args) {
    global $asp_book_label;

    $asp_archive_filter_sermon_count = get_option('asp_archive_filter_sermon_count');
    $asp_book_terms = get_terms($taxonomies, $args);
	$asp_hide_filter_book = get_option( 'asp_archive_hide_filter_book' );
	$div_class = 'sermon-field-container book-container';

	if (!empty($asp_hide_filter_book)) {
		$div_class .= ' asp-field-hidden';
	}

    if (!empty($asp_book_terms)) {
	    echo "<div class='$div_class'>";
        echo "<select name='sermon_book' class='asp-filter-book'>";
        echo '<option value="">' . __("All", "advanced-sermons") . " " . __(asp_book_plural($asp_book_label), "advanced-sermons") . '</option>';

        // Grouping books by Testament
        $old_testament_options = '';
        $new_testament_options = '';
        $other_books_options = ''; // Additional string for books not in Old/New Testament

        foreach ($asp_book_terms as $term) {
            $testament = asp_book_testament_dropdown_label($term->name);
            $term_slug = $term->slug;
            $term_name = $term->name;
            if (empty($asp_archive_filter_sermon_count)) {
                $term_count = "($term->count)";
            } else {
                $term_count = null;
            }

	        // Check if book should be selected to support <optgroup>
	        $selected = '';
	        if (!empty($_REQUEST['sermon_book']) && $_REQUEST['sermon_book'] === $term_slug) {
		        $selected = ' selected';
	        }

	        $option_html = "<option value='$term_slug'{$selected}>$term_name $term_count</option>";

            if (strpos($testament, 'old-testament') !== false) {
                $old_testament_options .= $option_html;
            } elseif (strpos($testament, 'new-testament') !== false) {
                $new_testament_options .= $option_html;
            } else {
                // Add to other books options if it does not belong to Old/New Testament
                $other_books_options .= $option_html;
            }
        }

        // Add options to dropdown under group labels
        if (!empty($old_testament_options)) {
            echo '<optgroup label="' . __("Old Testament", "advanced-sermons") . '" class="old-testament-group">';
            echo $old_testament_options;
            echo '</optgroup>';
        }

        if (!empty($new_testament_options)) {
            echo '<optgroup label="' . __("New Testament", "advanced-sermons") . '" class="new-testament-group">';
            echo $new_testament_options;
            echo '</optgroup>';
        }

        // Displaying other books options, if any
        echo $other_books_options;

        echo "</select>";
        echo "</div>";
    }
}


// Generates label for testament categorization
function asp_book_testament_dropdown_label($book_name) {
    $bible_books = asp_generate_bible_book_list();
    $old_testament_books = $bible_books['Old Testament'];
    $new_testament_books = $bible_books['New Testament'];

    if (in_array($book_name, $old_testament_books)) {
        return '<span class="testament-label old-testament">' . __('Old Testament', 'advanced-sermons') . '</span>';
    } elseif (in_array($book_name, $new_testament_books)) {
        return '<span class="testament-label new-testament">' . __('New Testament', 'advanced-sermons') . '</span>';
    } else {
        // Return an empty string if the book is not found
        return '';
    }
}


// Archive Filter Date Range Select. Added Advanced Sermons 3.0
function asp_filter_data_range() { // @ToDo: rewrite with the support for language modifiers
	$dates = isset($_REQUEST['sermon_dates']) ? sanitize_text_field($_REQUEST['sermon_dates']) : '';
	$value = $dates ? 'value="' . esc_attr($dates) . '"' : '';


	// Handes date range placeholder text languge settings
    $asp_language_date_range_placeholder = get_option( 'asp_language_date_range_placeholder' );
    if (empty($asp_language_date_range_placeholder)) {
        $asp_date_range_placeholder_text = __('Date Range', 'advanced-sermons');
    } else {
        $asp_date_range_placeholder_text = __($asp_language_date_range_placeholder, 'advanced-sermons');
    }

    echo '<div class="sermon-field-container sermon-date-container">';
    echo '<input class="asp-filter-date" type="text" name="sermon_dates" placeholder="' . $asp_date_range_placeholder_text . '" ' . $value . ' autocomplete="off">';
    echo '</div>';
}


// New sermon archive numbered pagination. Added version 2.6.
function asp_inject_page_number($link, $paged) {
    return str_replace('<a', '<a data-asp-page="'. $paged .'"', $link);
}
function asp_numeric_sermon_archive_nav($custom_wp_query = null) {
    if (is_singular('sermons')) {
        return;
    }

    if (!empty($custom_wp_query)) {
        $wp_query = $custom_wp_query;
    } else {
        global $wp_query;
    }

    /* Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1) {
        return;
    }
    $paged = $wp_query->get('paged') ? absint($wp_query->get('paged')) : 1;
    $max = intval($wp_query->max_num_pages);

    if( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
        $_SERVER['REQUEST_URI'] = isset($_REQUEST['path']) ? $_REQUEST['path'] : '';
    }

    /* Add current page to the array */
    $links = [];
    if ($paged >= 1) {
        $links[] = $paged;
    }
    /* Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="asp-sermon-pagination"><ul>' . "\n";
    /* Previous Sermon Link */
    if ($paged - 1 > 0 ) {
        echo asp_inject_page_number(
            sprintf(
                '<li><a href="%s">%s</a></li>' . "\n", get_pagenum_link($paged - 1),
                "<i class='fas fa-chevron-left asp-prev-icon'></i>" . __('Previous', 'advanced-sermons')
            ),
            $paged - 1
        );
    }
    /* Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';
        echo asp_inject_page_number(
            sprintf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($paged)), 1)
        , 1);
        if (!in_array(2, $links)) {
            echo '<li class="asp-pagination-spacing first">...</li>';
        }
    }
    /* Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ($links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        echo asp_inject_page_number(
            sprintf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link),
            $link
        );
    }
    /* Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links)) {
            echo '<li class="asp-pagination-spacing second">...</li>' . "\n";
        }
        $class = $paged === $max ? ' class="active"' : '';
        echo asp_inject_page_number(
            sprintf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max),
            $max
        );
    }
    /* Next Sermon Link */
    if ($paged < $max ) {
        echo asp_inject_page_number(
            sprintf(
                '<li><a href="%s">%s</a></li>' . "\n", get_pagenum_link($paged + 1),
                __('Next', 'advanced-sermons') . "<i class='fas fa-chevron-right asp-next-icon'></i>"
            ),
            $paged + 1
        );
    }

    echo '</ul></div>' . "\n";
}


// Handles sermon archive load more function
/**
 * @param \WP_Query|null $custom_wp_query
 * @return void
 */
function asp_archive_load_more($custom_wp_query = null, $with_infinity = false) {
    global $wp_query;

    $asp_language_load_more_button = get_option('asp_language_load_more_button');
    $label = $asp_language_load_more_button ? $asp_language_load_more_button : __('Load More', 'advanced-sermons');

    $query = $custom_wp_query ? $custom_wp_query : $wp_query;

    if ($query->max_num_pages <= 1 || $query->get( 'paged' ) + 1 > $query->max_num_pages) {
        return;
    }

    echo '<a class="asp-load-more-button" data-asp-type="'.($with_infinity ? 'infinity' : 'default').'"
        data-asp-page="'.($query->get( 'paged' ) + 1).'">'.$label.'</a>';
}


// Prepare query from POST/GET request
function asp_prepare_query() {
	$asp_sermon_count = asp_pro_activated() ? get_option('asp_archive_sermon_count') : 9;
	if (empty($asp_sermon_count)) {
		$asp_sermon_count = 9; // default 9
	}
	$paged = get_query_var('paged');

	$query = [
		'post_type' => 'sermons',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => isset($_REQUEST['order']) ? $_REQUEST['order'] : 'DESC',
		'posts_per_page' => $asp_sermon_count,
		'paged' => $paged ? $paged : (isset($_REQUEST['paged']) ? $_REQUEST['paged'] : 1),
	];

	$criteria_terms = [];

	// Search by date range
	if (!empty($_REQUEST['sermon_dates'])) {
		$criteria_terms['sermon_dates'] = $_REQUEST['sermon_dates'];
		list($from, $to) = explode(' - ', $_REQUEST['sermon_dates']);
		$query['date_query'][] = [
			'after' => $from,
			'before' => $to,
			'inclusive' => true,
		];
	}

	// Initialize tax queries
	$tax_queries = [];

	// Define the taxonomies array outside of any conditional scope
    $taxonomies = array_unique(apply_filters('asp_allowed_taxonomies_filter', [
        'sermon_book',
        'sermon_speaker',
        'sermon_series',
        'sermon_topics'
    ]));

	$search_term = '';

	// Check if a search term is present
	if (!empty($_REQUEST['s'])) {
		$search_term = sanitize_text_field($_REQUEST['s']);
		$criteria_terms['s'] = $search_term;

		// Check if the search term matches any taxonomy term
		$isTaxonomyMatch = false;
		foreach ($taxonomies as $taxonomy) {
			$terms = get_terms(['taxonomy' => $taxonomy, 'name' => $search_term, 'fields' => 'names']);
			if (!empty($terms)) {
				$isTaxonomyMatch = true;
				$tax_queries[] = [
					'taxonomy' => $taxonomy,
					'field' => 'name',
					'terms' => $terms,
					'operator' => 'IN'
				];
			}
		}

		if ($isTaxonomyMatch) {
			$query['tax_query'] = ['relation' => 'OR'] + $tax_queries;
		} else {
			$query['s'] = $search_term;
		}
	}

	// Search by taxonomies, including custom filters
	foreach ($taxonomies as $taxonomy) {
		if (!empty($_REQUEST[$taxonomy])) {
			$criteria_terms[$taxonomy] = $_REQUEST[$taxonomy];
			// Handle both array and string inputs
			$terms = is_array($_REQUEST[$taxonomy]) ? $_REQUEST[$taxonomy] : explode(',', $_REQUEST[$taxonomy]);
			$tax_queries[] = [
				'taxonomy' => $taxonomy,
				'field' => 'slug',
				'terms' => $terms,
			];
		}
	}

	// Apply tax queries if any
	if (!empty($tax_queries)) {
		$query['tax_query'] = $tax_queries;
	}

	return [$criteria_terms, $query];
}


// Function that handles the new AJAX functionality. Added Advanced Sermons 3.0
add_action('wp_ajax_nopriv_asp_generate_sermons', 'asp_ajax_generate_sermons');
add_action('wp_ajax_asp_generate_sermons', 'asp_ajax_generate_sermons');
function asp_ajax_generate_sermons()
{
    $asp_general_sermon_layout = get_option('asp_general_sermon_layout');

    list($criteria_terms, $query) = asp_prepare_query();
    $results = new WP_Query($query);

    // Get filter criteria box
    ob_start();
    do_action('asp_hook_filter_criteria_box', $criteria_terms);
    $active_filters = ob_get_clean();

    ob_start();
    do_action('asp_filter_details', $criteria_terms);
    $featured = ob_get_clean();

    ob_start();

    if ($results->have_posts()) {
        while ($results->have_posts()) {
            $results->the_post();
            do_action('asp_hook_archive_have_posts_top');

            if ($asp_general_sermon_layout === 'list-view' && asp_pro_activated()) {
                do_action('asp_archive_list_view');
            } else {
                do_action('asp_archive_grid_view', [
                    'hidden' => true,
                    'asp_slider' => false
                ]);
            }

            do_action('asp_hook_archive_have_posts_bottom', [
                'hidden' => true,
                'asp_slider' => false
            ]);

        }
    } else {
         echo '<div class="sermon-filter-error"><p>No results for your criteria. Please select a different filter combination.</p></div>';
    }

    wp_reset_postdata();
    $sermons = ob_get_clean();

    ob_start();
    $asp_archive_pagination_type = get_option('asp_archive_pagination_type');
    if( $asp_archive_pagination_type === 'infinity' ) {
        asp_archive_load_more($results);
    } else if( $asp_archive_pagination_type === 'load-more' ) {
        asp_archive_load_more($results);
    } else {
        asp_numeric_sermon_archive_nav($results);
    }
    $pagination = ob_get_clean();

    wp_send_json_success( [
        'sermons' => $sermons,
        'pagination' => $pagination,
        'active_filters' => $active_filters,
        'featured' => $featured,
        'query' => $query,
    ] );
}