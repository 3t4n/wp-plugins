<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Archive Filter Search
function asp_archive_filter_search() {
		$asp_language_search_keyword_placeholder = get_option( 'asp_language_search_keyword_placeholder' );
        $asp_archive_hide_search = get_option( 'asp_archive_hide_search' );

        if ( empty( $asp_archive_hide_search ) ) { ?>
            <div class="sermon-search-container">
                <input id="asp-search-field" type="text" class="asp-filter-search" placeholder="<?php if (empty($asp_language_search_keyword_placeholder)) { _e( 'Keyword', 'advanced-sermons' ); } else { _e( "$asp_language_search_keyword_placeholder", "advanced-sermons" ); } ?>" value="<?php echo esc_html( get_search_query() ); ?>" name="s" />
		    </div>
        <?php }
}
add_action( 'asp_hook_filter_bar_fields', 'asp_archive_filter_search', 10 );


// Archive Filter Order
function asp_archive_filter_order() {
		$asp_hide_filter_order = get_option( 'asp_archive_hide_filter_order' );
		$asp_language_order_newest_placeholder = get_option( 'asp_language_order_newest_placeholder' );
		$asp_language_order_oldest_placeholder = get_option( 'asp_language_order_oldest_placeholder' );

		// Handles newest placeholder translation
		if (empty($asp_language_order_newest_placeholder)) {
		    $newest_text = __('Newest', 'advanced-sermons');
		} else {
		    $newest_text = __($asp_language_order_newest_placeholder, 'advanced-sermons');
		}

		// Handles oldest placeholder translation
		if (empty($asp_language_order_oldest_placeholder)) {
		    $oldest_text = __('Oldest', 'advanced-sermons');
		} else {
		    $oldest_text = __($asp_language_order_oldest_placeholder, 'advanced-sermons');
		}

		?>
		<?php if (empty($asp_hide_filter_order)) { ?><div class="sermon-field-container order-container">
            <select name="order" class="asp-filter-order">
                <?php
                $order_options = array(
                    'DESC' => $newest_text,
                    'ASC' => $oldest_text,
                );
                foreach( $order_options as $value => $label ) {
                     if ( !empty( $_REQUEST['order'] ) ) {
                        echo "<option ".selected( $_REQUEST['order'], $value )." value='$value'>$label</option>";
                     } else {
                        echo "<option value='$value'>$label</option>";
                     }
                }
                ?>
            </select>
        </div><?php }
}
add_action( 'asp_hook_filter_bar_fields', 'asp_archive_filter_order', 20 );


// Archive Filter Dropdown Series
function asp_archive_filter_series() {
		$asp_series_orderby = get_option( 'asp_archive_series_dropdown_orderby' );
		if ( !empty( $asp_series_orderby ) ) { $asp_series_orderby = $asp_series_orderby; } else { $asp_series_orderby = 'name'; }
		$asp_series_order = get_option( 'asp_archive_series_dropdown_order' );
		if ( !empty( $asp_series_order ) ) { $asp_series_order = $asp_series_order; } else { $asp_series_order = 'ASC'; }

        $taxonomies = array( 'sermon_series' );
        $args = array( "orderby" => "$asp_series_orderby", "hide_empty" => true, "order" => "$asp_series_order" );
        asp_filter_terms_dropdown_series($taxonomies, $args);
}
add_action( 'asp_hook_filter_bar_fields', 'asp_archive_filter_series', 30 );


// Archive Filter Dropdown Speaker
function asp_archive_filter_speaker() {
		$asp_speaker_orderby = get_option( 'asp_archive_speaker_dropdown_orderby' );
		if ( !empty( $asp_speaker_orderby ) ) { $asp_speaker_orderby = $asp_speaker_orderby; } else { $asp_speaker_orderby = 'name'; }
		$asp_speaker_order = get_option( 'asp_archive_speaker_dropdown_order' );
		if ( !empty( $asp_speaker_order ) ) { $asp_speaker_order = $asp_speaker_order; } else { $asp_speaker_order = 'ASC'; }

        $taxonomies = array( 'sermon_speaker' );
        $args = array( "orderby" => "$asp_speaker_orderby", "hide_empty" => true, "order" => "$asp_speaker_order" );
        asp_filter_terms_dropdown_speaker($taxonomies, $args);

}
add_action( 'asp_hook_filter_bar_fields', 'asp_archive_filter_speaker', 40 );


// Archive Filter Dropdown Topic
function asp_archive_filter_topic() {
		$asp_topic_orderby = get_option( 'asp_archive_topic_dropdown_orderby' );
		if ( !empty( $asp_topic_orderby ) ) { $asp_topic_orderby = $asp_topic_orderby; } else { $asp_topic_orderby = 'name'; }
		$asp_topic_order = get_option( 'asp_archive_topic_dropdown_order' );
		if ( !empty( $asp_topic_order ) ) { $asp_topic_order = $asp_topic_order; } else { $asp_topic_order = 'ASC'; }

        $taxonomies = array( 'sermon_topics' );
        $args = array( "orderby" => "$asp_topic_orderby", "hide_empty" => true, "order" => "$asp_topic_order" );
        asp_filter_terms_dropdown_topic($taxonomies, $args);

}
add_action( 'asp_hook_filter_bar_fields', 'asp_archive_filter_topic', 50 );


// Archive Filter Dropdown Book
function asp_archive_filter_book() {
		$asp_book_orderby = get_option( 'asp_archive_book_dropdown_orderby' );
		if ( !empty( $asp_book_orderby ) ) { $asp_book_orderby = $asp_book_orderby; } else { $asp_book_orderby = 'name'; }
		$asp_book_order = get_option( 'asp_archive_book_dropdown_order' );
		if ( !empty( $asp_book_order ) ) { $asp_book_order = $asp_book_order; } else { $asp_book_order = 'ASC'; }

        $taxonomies = array( 'sermon_book' );
        $args = array( "orderby" => "$asp_book_orderby", "hide_empty" => true, "order" => "$asp_book_order" );
        asp_filter_terms_dropdown_book($taxonomies, $args);

}
add_action( 'asp_hook_filter_bar_fields', 'asp_archive_filter_book', 60 );


// Archive Filter Data Range
function asp_archive_filter_date_range() {
    $asp_hide_date_range = get_option( 'asp_archive_hide_date_range' );
    if($asp_hide_date_range) {
        return;
    }

    asp_filter_data_range();
}
add_action( 'asp_hook_filter_bar_fields', 'asp_archive_filter_date_range', 15 );
