<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Archive Filter Criteria Box
function asp_filter_criteria_box($args) {
    global $asp_speaker_label, $asp_topic_label, $asp_book_label, $asp_archive_slug, $asp_date_format;
    $asp_hide_criteria_box = get_option( 'asp_archive_hide_criteria_box' );
    $asp_language_filter_clear_all = get_option( 'asp_language_filter_clear_all' );

	$sermon_topic = isset($args['sermon_topics']) ? $args['sermon_topics'] : (isset($_REQUEST['sermon_topics']) ? $_REQUEST['sermon_topics'] : '');
	$sermon_book = isset($args['sermon_book']) ? $args['sermon_book'] : (isset($_REQUEST['sermon_book']) ? $_REQUEST['sermon_book'] : '');
	$sermon_speaker = isset($args['sermon_speaker']) ? $args['sermon_speaker'] : (isset($_REQUEST['sermon_speaker']) ? $_REQUEST['sermon_speaker'] : '');
	$sermon_series = isset($args['sermon_series']) ? $args['sermon_series'] : (isset($_REQUEST['sermon_series']) ? $_REQUEST['sermon_series'] : '');
	$sermon_search = isset($args['s']) ? sanitize_text_field($args['s']) : (isset($_REQUEST['s']) ? sanitize_text_field($_REQUEST['s']) : '');
	$dates = isset($args['sermon_dates']) ? $args['sermon_dates'] : (isset($_REQUEST['sermon_dates']) ? $_REQUEST['sermon_dates'] : '');

	if (!empty($dates)) {
        $dates = explode(' - ', $dates);

        $date_start = $dates[0];
        $date_end = $dates[1];
    }

    // Default to 'F j, Y' if $asp_date_format is not changed in setings
    if (empty($asp_date_format)) {
        $asp_date_format = 'F j, Y';
    }

    if ( !empty( $sermon_search ) ) { $selected_keyword = $sermon_search; }
    if ( !empty( $sermon_speaker ) ) { $selected_speaker = $sermon_speaker; $selected_speaker_slug = get_term_by('slug', "$selected_speaker", 'sermon_speaker'); $selected_speaker_name = $selected_speaker_slug->name; }
    if ( !empty( $sermon_topic ) ) { $selected_topics = $sermon_topic; $selected_topics_slug = get_term_by('slug', "$selected_topics", 'sermon_topics'); $selected_topics_name = $selected_topics_slug->name; }
    if ( !empty( $sermon_series ) ) { $selected_series = $sermon_series; $selected_series_slug = get_term_by('slug', "$selected_series", 'sermon_series'); $selected_series_name = $selected_series_slug->name; }
    if ( !empty( $sermon_book ) ) { $selected_book = $sermon_book; $selected_book_slug = get_term_by('slug', "$selected_book", 'sermon_book'); $selected_book_name = $selected_book_slug->name; }

    // We apply a filter to modify the if statement's condition.
    $asp_filter_selected_taxonomy = apply_filters('asp_filter_selected_taxonomy', isset( $selected_keyword ) || isset( $selected_speaker_name ) || isset( $selected_topics_name ) || isset( $selected_series_name ) || isset( $selected_book_name ) || isset($date_start) || isset($date_end) );

    if ( empty( $asp_hide_criteria_box ) ) {
        if ( $asp_filter_selected_taxonomy ) { ?>
            <div class="asp-criteria-box">
                <p class="asp-selected-title"><?php _e( 'Filtered by', 'advanced-sermons' ); ?>:</p>
                <?php if(isset($selected_keyword)) { ?>
                    <p class='asp-selected-keyword'>
                        <?php _e( "Keyword", "advanced-sermons" ); ?>:
                        <?php _e( "$selected_keyword", "advanced-sermons" ); ?>
                    </p>
                <?php } ?>
                <?php if(isset($selected_series_name)) { ?>
                    <p class='asp-selected-series'>
                        <?php _e( "Series", "advanced-sermons" ); ?>:
                        <?php _e( "$selected_series_name", "advanced-sermons" ); ?>
                    </p>
                <?php } ?>
                <?php if(isset($selected_speaker_name)) { ?>
                    <p class='asp-selected-speaker'>
                        <?php _e( "$asp_speaker_label", "advanced-sermons" ); ?>:
                        <?php _e( "$selected_speaker_name", "advanced-sermons" ); ?>
                    </p>
                <?php } ?>
                <?php if(isset($selected_topics_name)) { ?>
                    <p class='asp-selected-topic'>
                        <?php _e( "$asp_topic_label", "advanced-sermons" ); ?>:
                        <?php _e( "$selected_topics_name", "advanced-sermons" ); ?>
                    </p>
                <?php } ?>
                <?php if(isset($selected_book_name)) { ?>
                    <p class='asp-selected-book'>
                        <?php _e( "$asp_book_label", "advanced-sermons" ); ?>:
                        <?php _e( "$selected_book_name", "advanced-sermons" ); ?>
                    </p>
                <?php } ?>
                <?php if(!empty($date_start)) { ?>
                    <p class='asp-selected-date'>
                        <?php _e( "From", "advanced-sermons" ); ?>:
                        <?php _e( date($asp_date_format, strtotime($date_start)), "advanced-sermons" ); ?>
                    </p>
                <?php } ?>
                <?php if(!empty($date_end)) { ?>
                    <p class='asp-selected-date'>
                        <?php _e( "To", "advanced-sermons" ); ?>:
                        <?php _e( date($asp_date_format, strtotime($date_end)), "advanced-sermons" ); ?>
                    </p>
                <?php } ?>
                <?php echo apply_filters('asp_custom_filter_criteria', ''); ?>
                <a class="asp-clear-filter-criteria" href="<?php echo get_home_url(); ?>/<?php echo $asp_archive_slug ?>/" target="_self"><?php if (empty($asp_language_filter_clear_all)) { _e( 'Clear', 'advanced-sermons' ); } else { _e( "$asp_language_filter_clear_all", "advanced-sermons" ); } ?></a>
            </div>
        <?php }
    }
}
add_action( 'asp_hook_filter_criteria_box', 'asp_filter_criteria_box', 10 );