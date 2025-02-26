<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


// Sermon Archive Grid View
add_action('asp_archive_grid_view', 'asp_archive_grid_view_layout');
function asp_archive_grid_view_layout($args = []) {
    global $post, $asp_archive_slug, $asp_speaker_label, $asp_speaker_label_slug, $asp_topic_label, $asp_topic_label_slug, $asp_book_label, $asp_book_label_slug, $asp_sermon_label, $asp_sermon_label_slug, $asp_date_format, $asp_target_control;

    $asp_sermon_speaker = wp_get_post_terms($post->ID, 'sermon_speaker', array("fields" => "names"));
    $asp_sermon_series = wp_get_post_terms($post->ID, 'sermon_series', array("fields" => "names"));
    $asp_sermon_topic = wp_get_post_terms($post->ID, 'sermon_topics', array("fields" => "names"));
    $asp_sermon_book = wp_get_post_terms($post->ID, 'sermon_book', array("fields" => "names"));
    $asp_sermon_speaker_slug = wp_get_post_terms($post->ID, 'sermon_speaker', array("fields" => "slugs"));
    $asp_sermon_series_slug = wp_get_post_terms($post->ID, 'sermon_series', array("fields" => "slugs"));
    $asp_sermon_topic_slug = wp_get_post_terms($post->ID, 'sermon_topics', array("fields" => "slugs"));
    $asp_sermon_book_slug = wp_get_post_terms($post->ID, 'sermon_book', array("fields" => "slugs"));

    // Handles default Series image logic
    $asp_single_sermon_default_series_image = get_option( 'asp_single_sermon_default_series_image' );
    if ( !empty( $asp_single_sermon_default_series_image ) ) {
        $asp_sermon_series_terms = wp_get_post_terms($post->ID, 'sermon_series');
        if (!empty($asp_sermon_series_terms) && !is_wp_error($asp_sermon_series_terms)) {
            $asp_series_term = $asp_sermon_series_terms[0];
            $asp_series_image_id = get_term_meta($asp_series_term->term_id, 'series-taxonomy-image-id', true);
            $asp_series_image = wp_get_attachment_image(
                $asp_series_image_id,
                'large',
                false,
                array(
                    'alt' => $asp_series_term->name,
                    'loading' => 'lazy'
                )
            );
        } else {
            $asp_series_image = '';
        }
    }

    // Handles sermon excerpt functions for grid view layout
    do_action('asp_excerpt_functions');

    ?>
    <?php if (!empty($args['asp_slider'])): ?>
    <div class="asp-tiny-slider">
<?php endif; ?>
    <li class='sermon-archive-single' <?php echo !empty($args['hidden']) ? 'style="opacity: 0;"' : ''; ?>>

      <?php if ( has_post_thumbnail() ) { ?>
      <a class="semon-thumbnail-link" itemprop="url" href="<?php the_permalink(); ?>" target="<?php echo $asp_target_control ?>" title="">
          <div class='sermon-thumbnail'>
              <?php the_post_thumbnail('large', array('alt' => get_the_title(), 'loading' => 'lazy')); ?>
          </div>
      </a>
    <?php } elseif ( !empty($asp_series_image) ) { ?>
      <a class="semon-thumbnail-link" itemprop="url" href="<?php the_permalink(); ?>" target="<?php echo $asp_target_control ?>" title="">
          <div class='sermon-thumbnail'>
              <?php echo $asp_series_image; ?>
          </div>
      </a>
    <?php } ?>

        <div class='sermon-media'>

            <div class='preached-date'>
                <p><?php if ( !empty($asp_date_format) ) { echo the_time($asp_date_format);  } else { echo the_time('F j, Y'); } ?></p>
            </div>

            <?php if (isset($asp_sermon_series[0])) { ?>
                <div class='sermon-series'>
                    <p><?php _e('Series', 'advanced-sermons'); ?>:
                        <?php
                        $count = count($asp_sermon_series);
                        $i = 0;
                        foreach ($asp_sermon_series as $index => $series) {
                            $i++;

                            // Check the permalink structure
                            if ( get_option( 'permalink_structure' ) ) { // pretty permalinks
                              echo "<a href='" . get_home_url() . "/" . $asp_archive_slug . "/?sermon_series=" . $asp_sermon_series_slug[$index] . "'>" . $series . "</a>";
                            } else { // non-pretty permalinks
                              echo "<a href='" . get_home_url() . "/?post_type=sermons&sermon_series=" . $asp_sermon_series_slug[$index] . "'>" . $series . "</a>";
                            }

                            if ($i < $count) {
                                echo ", ";
                            }
                        }
                        ?>
                    </p>
                </div>
            <?php } ?>

        </div>

        <div class="sermon-title">
            <h2><a itemprop="url" href="<?php the_permalink(); ?>" target="<?php echo $asp_target_control ?>"
                   title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        </div>

        <div class="sermon-archive-details">

            <?php if (isset($asp_sermon_speaker[0])) { ?>
                <div class='sermon-speaker'><p>
                        <?php if (!empty($asp_speaker_label)) {
                            _e("$asp_speaker_label", "advanced-sermons");
                        } else {
                            _e('Speaker', 'advanced-sermons');
                        } ?>:
                        <?php
                        $count = count($asp_sermon_speaker);
                        $i = 0;
                        foreach ($asp_sermon_speaker as $index => $speaker) {
                            $i++;

                            if (get_option('permalink_structure')) {
      											  echo "<a href='" . get_home_url() . "/" . $asp_archive_slug . "/?sermon_speaker=" . $asp_sermon_speaker_slug[$index] . "'>" . $speaker . "</a>";
      										  } else {
      											  echo "<a href='" . get_home_url() . "/?post_type=sermons&sermon_speaker=" . $asp_sermon_speaker_slug[$index] . "'>" . $speaker . "</a>";
      										  }

                            if ($i < $count) {
                                echo ", ";
                            }
                        }
                        ?>
                    </p></div>
            <?php } ?>

            <?php if (isset($asp_sermon_topic[0])) { ?>
                <div class='sermon-topic'><p>
                        <?php if (!empty($asp_topic_label)) {
                            _e("$asp_topic_label", "advanced-sermons");
                        } else {
                            _e('Topic', 'advanced-sermons');
                        } ?>:
                        <?php
                        $count = count($asp_sermon_topic);
                        $i = 0;
                        foreach ($asp_sermon_topic as $index => $topic) {
                            $i++;

                            if (get_option('permalink_structure')) {
                              echo "<a href='" . get_home_url() . "/" . $asp_archive_slug . "/?sermon_topics=" . $asp_sermon_topic_slug[$index] . "'>" . $topic . "</a>";
                            } else {
                              echo "<a href='" . get_home_url() . "/?post_type=sermons&sermon_topics=" . $asp_sermon_topic_slug[$index] . "'>" . $topic . "</a>";
                            }

                            if ($i < $count) {
                                echo ", ";
                            }
                        }
                        ?>
                    </p></div>
            <?php } ?>

            <?php if (isset($asp_sermon_book[0])) { ?>
                <div class='sermon-book'><p>
                    <?php if (!empty($asp_book_label)) { _e( "$asp_book_label", "advanced-sermons" ); } else { _e( 'Book', 'advanced-sermons' ); } ?>:
                    <?php
                        $count = count($asp_sermon_book);
                        $i = 0;
                        foreach ($asp_sermon_book as $index => $book) {
                            $i++;

                            if (get_option('permalink_structure')) {
                              echo "<a href='" . get_home_url() . "/" . $asp_archive_slug . "/?sermon_book=" . $asp_sermon_book_slug[$index] . "'>" . $book . "</a>";
                            } else {
                              echo "<a href='" . get_home_url() . "/?post_type=sermons&sermon_book=" . $asp_sermon_book_slug[$index] . "'>" . $book . "</a>";
                            }

                            if ($i < $count) {
                                echo ", ";
                            }
                        }
                        ?>
                    </p></div>
            <?php } ?>

            <?php do_action('asp_hook_sermon_archive_header_details'); ?>

        </div>

        <?php do_action('asp_hook_sermon_archive_before_excerpt'); ?>

        <?php
        // Check if it's an AJAX request. Adds support for WordPress 6.3.
        $asp_expect_length = esc_attr(get_option('asp_archive_excerpt_length') ?: '10');
        $asp_disable_read_more = get_option('asp_archive_read_more');

        // Check if it's an AJAX request
        if (defined('DOING_AJAX') && DOING_AJAX) {

          // Check if the excerpt exists. If it does, use it, otherwise trim the content.
          if (has_excerpt()) {
              $excerpt = get_the_excerpt();
          } else {
			  $content = get_the_content();
        	  $content = preg_replace('/\[\/?vc_[^\]]*\]/', '', $content); // Remove VC shortcodes
			  $content = strip_shortcodes($content); // Then strip any remaining standard shortcodes
			  $excerpt = wp_trim_words($content, (int) $asp_expect_length, '...');
          }

          $asp_excerpt_word_count = str_word_count(strip_tags($excerpt));

          // Check if the read more link should be appended
          if (empty($asp_disable_read_more) && $post->post_type == 'sermons' && !empty($excerpt) && $asp_excerpt_word_count >= (int) $asp_expect_length) {
              $excerpt .= sprintf(' <a class="asp-read-more" href="%1$s" target="%2$s">%3$s</a>',
                  get_permalink(get_the_ID()), $asp_target_control, __('read more', 'advanced-sermons'));
          }

        } else {
			$excerpt = get_the_excerpt();
			$excerpt = apply_filters('the_excerpt', $excerpt);
        }

        if ( !empty($excerpt) || !empty($content)) { ?>
            <div class='sermon-master-content'><p><?php echo $excerpt; ?></p></div>
        <?php } ?>

        <?php do_action('asp_hook_sermon_archive_after_excerpt'); ?>

        <!-- Sermon Grid View Scripture -->

        <?php do_action( 'asp_grid_view_scripture' ); ?>

    </li>
    <?php if (!empty($args['asp_slider'])): ?>
    </div>
<?php endif; ?>
<?php }
