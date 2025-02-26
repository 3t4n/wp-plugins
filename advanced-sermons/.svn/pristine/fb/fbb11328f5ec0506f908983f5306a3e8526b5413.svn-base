<?php

/*
Template Name: Sermons Single Template
*/


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

global $post;
$page_title = get_the_title();
$asp_all_sermons_button = get_option( 'asp_single_sermon_all_sermons_button' );
$asp_archive_button_url = get_option( 'asp_single_sermon_archive_button_url' );
$asp_disallow_comments = get_option( 'asp_single_sermon_disable_comments' );
$asp_related_sermons = get_option( 'asp_single_sermon_related_sermons' );
$asp_disable_title_image = get_option( 'asp_design_disable_sermon_title_image' );
$asp_design_hide_featured_image = get_option( 'asp_design_hide_featured_image' );
$asp_disable_social_share = get_option( 'asp_single_sermon_disable_social_share' );
$asp_language_archive_button = get_option( 'asp_language_archive_button' );
$asp_language_audio_player_heading = get_option( 'asp_language_audio_player_heading' );
$asp_language_sermon_details_download = get_option( 'asp_language_sermon_details_download' );
$asp_language_sermon_details_listen = get_option( 'asp_language_sermon_details_listen' );
$asp_language_sermon_details_bulletin = get_option( 'asp_language_sermon_details_bulletin' );
$asp_language_sermon_details_soundcloud = get_option( 'asp_language_sermon_details_soundcloud' );
$asp_language_listen_tooltip = get_option( 'asp_language_listen_tooltip' );
$asp_language_download_tooltip = get_option( 'asp_language_download_tooltip' );
$sermon_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
if( is_array( $sermon_featured_image ) ){
    $sermon_featured_image_url = $sermon_featured_image[0];
} else {
    $sermon_featured_image_url = ""; // False
}

global $asp_archive_slug, $asp_speaker_label, $asp_speaker_label_slug, $asp_topic_label, $asp_topic_label_slug, $asp_book_label, $asp_book_label_slug, $asp_sermon_label, $asp_sermon_label_slug, $asp_date_format;

// Handles sermon view count
setSermonsViews(get_the_ID());

?>

<!-- Get Theme Header -->

<?php get_header(); ?>

<!-- Single Sermon Wrapper -->

<div class="sermon-wrapper">

    <!-- Single Sermon Title -->

    <div class="sermon-title-holder">
          <div class="sermon-featured-image" style="background-image: url('<?php if ( empty( $asp_design_hide_featured_image ) ) { echo $sermon_featured_image_url; } ?>')!important;">
              <div class="sermon-title"><h1><?php _e( "$page_title", 'advanced-sermons' ); ?></h1></div>
          </div>
    </div>

    <?php do_action( 'asp_hook_sermon_single_top_holder' ); ?>

        <div class="sermon-container">
            <div class="sermon-container_inner">
                <div class="asp-column-inner">


                    <!-- Begin Sermon Content Section -->

                    <div class="asp-column1">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php $asp_sermon_soundcloud = get_post_meta($post->ID, 'asp_sermon_soundcloud', true); ?>
                    <?php $asp_sermon_audio_file = get_post_meta($post->ID, 'asp_sermon_mp4', true); ?>
                    <?php $sermon_audio_embed = get_post_meta($post->ID, 'asp_sermon_audio_embed', true); ?>
                    <?php $asp_sermon_pdf = get_post_meta($post->ID, 'asp_sermon_pdf', true); ?>
                    <?php $asp_sermon_bulletin = get_post_meta($post->ID, 'asp_sermon_bulletin', true); ?>
                    <?php $asp_sermon_series = wp_get_post_terms($post->ID, 'sermon_series', array("fields" => "names")); ?>
                    <?php $asp_sermon_series_slug = wp_get_post_terms($post->ID, 'sermon_series', array("fields" => "slugs")); ?>
                    <?php $asp_sermon_topic = wp_get_post_terms($post->ID, 'sermon_topics', array("fields" => "names")); ?>
                    <?php $asp_sermon_topic_slug = wp_get_post_terms($post->ID, 'sermon_topics', array("fields" => "slugs")); ?>
                    <?php $asp_sermon_speaker = wp_get_post_terms($post->ID, 'sermon_speaker', array("fields" => "names")); ?>
                    <?php $asp_sermon_speaker_slug = wp_get_post_terms($post->ID, 'sermon_speaker', array("fields" => "slugs")); ?>
                    <?php $asp_sermon_book = wp_get_post_terms($post->ID, 'sermon_book', array("fields" => "names")); ?>
                    <?php $asp_sermon_book_slug = wp_get_post_terms($post->ID, 'sermon_book', array("fields" => "slugs")); ?>
                    <?php $asp_home_url = get_home_url(); ?>
                    <?php $asp_sermon_content = get_the_content(); ?>

                    <?php
	                    // Get the drag-and-drop ordering setting for speakers
	                    $orderby = get_option('asp_archive_speaker_dropdown_orderby');

                        // Get speaker terms, with custom ordering if drag-and-drop is enabled
	                    if ($orderby === 'custom_order') {
		                    $terms = get_terms(array(
			                    'taxonomy' => 'sermon_speaker',
			                    'object_ids' => $post->ID,
			                    'orderby' => 'meta_value_num',
			                    'meta_key' => 'asp_term_order',
			                    'order' => 'ASC'
		                    ));
	                    } else {
		                    $terms = get_the_terms($post->ID, 'sermon_speaker');
	                    }

                        // Get speaker images
	                    $asp_speaker = array();

	                    if (!empty($terms) && !is_wp_error($terms)) {
		                    foreach ($terms as $term) {
			                    $image_id = get_term_meta($term->term_id, 'speaker-taxonomy-image-id', true);
			                    if ($image_id) {
				                    // Store images with the slug as the key for matching
				                    $asp_speaker[$term->slug] = wp_get_attachment_image($image_id, "medium", false, array("alt" => esc_attr($term->name)));
			                    }
		                    }
	                    }
	                    ?>

                        <?php do_action( 'asp_hook_sermon_single_top' ); ?>

                        <!-- Sermon Header Section -->

                        <div class='sermon-info'>

                            <?php if(empty($asp_all_sermons_button)) { ?>
                              <div class='sermon-archive-button-holder'>
                                  <a class="asp-sermon-archive-button" href="
                                  <?php
                                  if (empty($asp_archive_button_url)) {
                                      if (get_option('permalink_structure')) {
                                          // Pretty permalinks enabled
	                                      echo esc_url( get_home_url() . "/" . $asp_archive_slug . "/" );
                                      } else {
                                          // Non-pretty permalinks
	                                      echo esc_url( get_home_url() . "/?post_type=sermons" );
                                      }
                                  } else {
	                                  echo esc_url( get_home_url() . "/" . $asp_archive_button_url . "/" );
                                  }
                                  ?>" target="_self">
                                  <i class="fa fa-angle-left" aria-hidden="true"></i>
                                  <?php
                                  if (empty($asp_language_archive_button)) {
                                      _e( "All" . " " . asp_sermon_plural( $asp_sermon_label ), 'advanced-sermons' );
                                  } else {
                                      _e( "$asp_language_archive_button", "advanced-sermons" );
                                  } ?></a>
                              </div>
                            <?php } ?>

                            <div class="sermon-title"><h2><?php _e( "$page_title", 'advanced-sermons' ); ?></h2></div>

                            <div class='sermon-header-details'>

                                <div class='preached-date'><?php if ( !empty( $asp_date_format ) ) { echo the_time( $asp_date_format );  } else { echo the_time( 'F j, Y' ); } ?></div>

                                <?php if (isset($asp_sermon_series[0])) { ?>
                                    <div class='sermon-series'>
                                            <p><?php _e( 'Series', 'advanced-sermons' ); ?>:
                                                <?php
                                                        $count = count($asp_sermon_series);
                                                        $i = 0;
                                                        foreach ($asp_sermon_series as $index => $series) {
                                                            $i++;

                                                            // Check the permalink structure
                                                            if ( get_option( 'permalink_structure' ) ) { // pretty permalinks
                                                                echo "<a href='" . esc_url( get_home_url() . "/" . $asp_archive_slug . "/?sermon_series=" . $asp_sermon_series_slug[$index] ) . "'>" . esc_html( $series ) . "</a>";
                                                            } else { // non-pretty permalinks
                                                                echo "<a href='" . esc_url( get_home_url() . "/?post_type=sermons&sermon_series=" . $asp_sermon_series_slug[$index] ) . "'>" . esc_html( $series ) . "</a>";
                                                            }

                                                            if ($i < $count) {
                                                                echo ", ";
                                                            }
                                                        }
                                                ?>
                                            </p>
                                    </div>
                                  <?php } ?>

                                  <?php if (isset($asp_sermon_topic[0])) { ?>
                                        <div class='sermon-topic'>
                                            <p>
                                                    <?php
                                                        if (!empty($asp_topic_label)) { _e( "$asp_topic_label", "advanced-sermons" ); } else { _e( 'Topic', 'advanced-sermons' ); } ?>:
                                                        <?php $count = count($asp_sermon_topic);
                                                        $i = 0;
                                                        foreach ($asp_sermon_topic as $index => $topic) {
                                                                $i++;

                                                                if (get_option('permalink_structure')) {
                                                                    echo "<a href='" . esc_url( get_home_url() . "/" . $asp_archive_slug . "/?sermon_topics=" . $asp_sermon_topic_slug[$index] ) . "'>" . esc_html( $topic ) . "</a>";
                                                                } else {
                                                                    echo "<a href='" . esc_url( get_home_url() . "/?post_type=sermons&sermon_topics=" . $asp_sermon_topic_slug[$index] ) . "'>" . esc_html( $topic ) . "</a>";
                                                                }

                                                                if ($i < $count) {
                                                                    echo ", ";
                                                                }
                                                        }
                                                    ?>
                                            </p>
                                        </div>
                                  <?php } ?>

                                  <?php if (isset($asp_sermon_book[0])) { ?>
                                        <div class='sermon-book'>
                                            <p>
                                                <?php
                                                    if (!empty($asp_book_label)) { _e( "$asp_book_label", "advanced-sermons" ); } else { _e( 'Book', 'advanced-sermons' ); } ?>:
                                                    <?php $count = count($asp_sermon_book);
                                                    $i = 0;
                                                    foreach ($asp_sermon_book as $index => $book) {
                                                        $i++;

                                                        if (get_option('permalink_structure')) {
                                                            echo "<a href='" . esc_url( get_home_url() . "/" . $asp_archive_slug . "/?sermon_book=" . $asp_sermon_book_slug[$index] ) . "'>" . esc_html( $book ) . "</a>";
                                                        } else {
                                                            echo "<a href='" . esc_url( get_home_url() . "/?post_type=sermons&sermon_book=" . $asp_sermon_book_slug[$index] ) . "'>" . esc_html( $book ) . "</a>";
                                                        }

                                                        if ($i < $count) {
                                                            echo ", ";
                                                        }
                                                    }
                                                ?>
                                            </p>
                                        </div>
                                  <?php } ?>

                                  <!-- Action hook to add custom content in single sermon header details -->
                                  <?php do_action( 'asp_hook_sermon_single_header_details' ); ?>

                            </div>

                        </div>

                        <!-- Sermon Video Section -->

                        <?php do_action( 'asp_hook_sermon_single_before_video_player' ); ?>

                        <?php asp_sermon_video_template(); ?>

                        <!-- Sermon Details Section -->

                        <?php if (isset($asp_sermon_speaker[0]) || $asp_sermon_pdf !== '' || $asp_sermon_audio_file !== '' || $asp_sermon_soundcloud !== '' || $asp_sermon_bulletin !== '') { ?>

                        <div class='sermon-details'>

	                        <?php if (!empty($asp_sermon_speaker)) { ?>
                                <div class='sermon-speaker-holder'>
			                        <?php
			                        foreach ($asp_sermon_speaker as $index => $speaker) {
				                        $speaker_slug = isset($asp_sermon_speaker_slug[$index]) ? esc_attr($asp_sermon_speaker_slug[$index]) : ''; // Sanitize slug
				                        ?>
                                        <div class='details-sermon-speaker'>
                                            <div class='speaker-image'>
						                        <?php
						                        // Display the correct image based on the speaker slug
						                        if (!empty($asp_speaker[$speaker_slug])) {
							                        echo $asp_speaker[$speaker_slug]; // Echo image HTML
						                        }
						                        ?>
                                            </div>
                                            <p>
						                        <?php
						                        // Generate the link to the speaker's archive page
						                        $speaker_url = get_option('permalink_structure')
							                        ? get_home_url() . "/" . esc_attr($asp_archive_slug) . "/?sermon_speaker=" . $speaker_slug
							                        : get_home_url() . "/?post_type=sermons&sermon_speaker=" . $speaker_slug;
						                        echo "<a href='" . esc_url($speaker_url) . "'>" . esc_html($speaker) . "</a>";
						                        ?>
                                            </p>
                                        </div>
				                        <?php
			                        }
			                        ?>
                                </div>
	                        <?php } ?>

                            <div class='sermon-media-holder'>

                                <?php if (!empty($asp_sermon_soundcloud )) { ?>
                                    <div class="sermon-soundcloud asp-sermon-downloadable">
                                        <a href='<?php echo esc_url( $asp_sermon_soundcloud ); ?>' target='_blank'><i class="fab fa-soundcloud"></i><span><?php if (empty($asp_language_sermon_details_soundcloud)) { esc_html_e( 'Soundcloud', 'advanced-sermons' ); } else { esc_html_e( "$asp_language_sermon_details_soundcloud", "advanced-sermons" ); } ?></span></a>
                                        <span class="asp-download-tooltip"><?php if (empty($asp_language_listen_tooltip)) { esc_html_e( 'Listen', 'advanced-sermons' ); } else { esc_html_e( "$asp_language_listen_tooltip", "advanced-sermons" ); } ?></span>
                                    </div>
                                <?php } ?>
                                <?php if (!empty($asp_sermon_audio_file)) { ?>
                                    <div class="sermon-mp4-file asp-sermon-downloadable">
                                        <a href='<?php echo esc_url( $asp_sermon_audio_file ); ?>' target='_blank' download><i class="far fa-file-audio"></i><span><?php if (empty($asp_language_sermon_details_listen)) { esc_html_e( 'Audio', 'advanced-sermons' ); } else { esc_html_e( "$asp_language_sermon_details_listen", "advanced-sermons" ); } ?></span></a>
                                        <span class="asp-download-tooltip"><?php if (empty($asp_language_download_tooltip)) { esc_html_e( 'Download', 'advanced-sermons' ); } else { esc_html_e( "$asp_language_download_tooltip", "advanced-sermons" ); } ?></span>
                                    </div>
                                <?php } ?>
                                <?php if (!empty($asp_sermon_bulletin)) { ?>
                                    <div class="sermon-bulletin-file asp-sermon-downloadable">
                                        <a href='<?php echo esc_url( $asp_sermon_bulletin ); ?>' target='_blank' download><i class="far fa-sticky-note"></i><span><?php if (empty($asp_language_sermon_details_bulletin)) { esc_html_e( 'Bulletin', 'advanced-sermons' ); } else { esc_html_e( "$asp_language_sermon_details_bulletin", "advanced-sermons" ); } ?></span></a>
                                        <span class="asp-download-tooltip"><?php if (empty($asp_language_download_tooltip)) { esc_html_e( 'Download', 'advanced-sermons' ); } else { esc_html_e( "$asp_language_download_tooltip", "advanced-sermons" ); } ?></span>
                                    </div>
                                <?php } ?>
                                <?php if (!empty($asp_sermon_pdf)) { ?>
                                    <div class="sermon-pdf-file asp-sermon-downloadable">
                                        <a href='<?php echo esc_url( $asp_sermon_pdf ); ?>' target='_blank' download><i class="far fa-file-pdf"></i><span><?php if (empty($asp_language_sermon_details_download)) { esc_html_e( 'Notes', 'advanced-sermons' ); } else { esc_html_e( "$asp_language_sermon_details_download", "advanced-sermons" ); } ?></span></a>
                                        <span class="asp-download-tooltip"><?php if (empty($asp_language_download_tooltip)) { esc_html_e( 'Download', 'advanced-sermons' ); } else { esc_html_e( "$asp_language_download_tooltip", "advanced-sermons" ); } ?></span>
                                    </div>
                                <?php } ?>

                                </div>

                        </div>

                        <?php } ?>

                        <!-- Sermon Audio Player -->

                        <?php if ( !empty( $asp_sermon_audio_file ) ) {

                        $asp_mp3 = 'mp3'; // Adds support for mp3 file types
                        $asp_ogg = 'ogg'; // Adds support for ogg file types
                        $asp_wav = 'wav'; // Adds support for wave file types

                        if (strpos($asp_sermon_audio_file, $asp_mp3) == true || strpos($asp_sermon_audio_file, $asp_ogg) == true || strpos($asp_sermon_audio_file, $asp_wav) == true )  { ?>
                            <div class='sermon-audio-player-wrapper'>
                                <h4 class="sermon-audio-title">
                                    <?php
                                        if (empty($asp_language_audio_player_heading)) {
                                            _e( "Listen to" . " " . $asp_sermon_label, 'advanced-sermons' );
                                        } else {
                                            _e( "$asp_language_audio_player_heading", "advanced-sermons" );
                                        }
                                    ?>
                                </h4>
                                <div class='sermon-audio-player'>
		                            <?php echo do_shortcode( "[audio src='$asp_sermon_audio_file']" ); ?>
                                    <a class="sermon-audio-player-download" href="<?php echo esc_url($asp_sermon_audio_file); ?>" target="_blank" download><span class="asp-download-audio-icon"><?php echo file_get_contents(plugin_dir_path(dirname(__FILE__)) . 'assets/download-audio.svg'); ?></span></a>
                                </div>
                            </div>
                        <?php }
                        } ?>

                        <!-- Sermon Audio Embed -->

                        <?php do_action( 'asp_audio_embed' ); ?>

                        <!-- Sermon Bible Passage -->

                        <?php do_action( 'asp_bible_passage' ); ?>

                        <!-- Sermon Main Content -->

                        <div class='sermon-main-content <?php if(!empty($asp_sermon_content)) { ?>sermon-has-content<?php } ?>'>

                            <?php do_action( 'asp_hook_sermon_single_before_content' ); ?>

                            <?php the_content(); ?>

                            <?php do_action( 'asp_hook_sermon_single_after_content' ); ?>

                        </div>

                        <!-- Sermon Social Share -->

                        <?php do_action( 'asp_social_share' ); ?>

                        <!-- Sermon Single Navigation -->

                        <?php do_action( 'asp_single_navigation' ); ?>

                        <!-- Sermon Comments Section -->

                        <?php if (!empty($asp_disallow_comments)) {  ?>
                            <div class="sermon-comments"><?php comments_template('', true); ?></div>
                        <?php } else { /* Disable Comments */ } ?>

                        <!-- Related Sermons -->

                        <?php do_action( 'asp_related_sermons' ); ?>

                        <?php do_action( 'asp_hook_sermon_single_bottom' ); ?>

                        <?php endwhile; endif; ?>

                    </div>


                    <!-- Sermon Sidebar Section -->

                    <?php do_action( 'asp_sermon_sidebar' ); ?>


                </div>
            </div>
        </div>

    <?php do_action( 'asp_hook_sermon_single_bottom_holder' ); ?>

</div>

<!-- Get Theme Footer -->

<?php get_footer(); ?>
