<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Archive Title Template
function asp_archive_title_template() {
    global $post, $asp_speaker_label, $asp_topic_label, $asp_sermon_label;
    $asp_language_archive_title = get_option( 'asp_language_archive_title' );
    if ( !empty( $_GET['sermon_speaker'] ) ) { $selected_speaker = $_GET['sermon_speaker']; $selected_speaker_slug = get_term_by('slug', "$selected_speaker", 'sermon_speaker'); $selected_speaker_name = $selected_speaker_slug->name; }
    if ( !empty( $_GET['sermon_topics'] ) ) { $selected_topics = $_GET['sermon_topics']; $selected_topics_slug = get_term_by('slug', "$selected_topics", 'sermon_topics'); $selected_topics_name = $selected_topics_slug->name; }
    if ( !empty( $_GET['sermon_series'] ) ) { $selected_series = $_GET['sermon_series']; $selected_series_slug = get_term_by('slug', "$selected_series", 'sermon_series'); $selected_series_name = $selected_series_slug->name; }
    if ( !empty($_GET['sermon_book'] ) ) { $selected_book = $_GET['sermon_book']; $selected_book_slug = get_term_by('slug', "$selected_book", 'sermon_book'); $selected_book_name = $selected_book_slug->name; }

    ?>
        <div class="sermon-title-holder">
            <div class="sermon-featured-image">
                <?php if ( is_post_type_archive( 'sermons' ) && !is_tax( 'sermon_speaker' ) && !is_tax( 'sermon_topics' ) && !is_tax( 'sermon_series' ) && !is_tax( 'sermon_book' ) ) { ?>
                    <div class="sermon-title"><h1><?php if (empty($asp_language_archive_title)) { _e( asp_sermon_plural( $asp_sermon_label ), 'advanced-sermons' ); } else { _e( "$asp_language_archive_title", 'advanced-sermons' ); } ?></h1></div>
                <?php } ?>
                <?php if ( is_post_type_archive( 'sermons' ) && is_tax( 'sermon_speaker' ) ) { ?>
                    <div class="sermon-title"><h1><?php _e( "$asp_speaker_label", 'advanced-sermons' ); ?>: <?php if(!empty($selected_speaker)) { echo $selected_speaker_name; } ?></h1></div>
                <?php } ?>
                <?php if ( is_post_type_archive( 'sermons' ) && is_tax( 'sermon_series' ) ) { ?>
                    <div class="sermon-title"><h1><?php _e( 'Series', 'advanced-sermons' ) ?>: <?php if(!empty($selected_series)) { echo $selected_series_name;  } ?></h1></div>
                <?php } ?>
                <?php if ( is_post_type_archive( 'sermons' ) && is_tax( 'sermon_topics' ) ) { ?>
                    <div class="sermon-title"><h1><?php _e( "$asp_topic_label", 'advanced-sermons' ); ?>: <?php if(!empty($selected_topics)) { echo $selected_topics_name;  } ?></h1></div>
                <?php } ?>
                <?php if ( is_post_type_archive( 'sermons' ) && is_tax( 'sermon_book' ) ) { ?>
                    <div class="sermon-title"><h1><?php _e( "Book", 'advanced-sermons' ); ?>: <?php if(!empty($selected_book)) { echo $selected_book_name;  } ?></h1></div>
                <?php } ?>
            </div>
        </div>
    <?php
}
add_action( 'asp_hook_archive_title', 'asp_archive_title_template', 10 );
