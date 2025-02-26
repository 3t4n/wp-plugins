<?php

/*
Template Name: Sermon Archive
*/


// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

if (!defined('ASP_TERMS_CUSTOM_ORDER')) {
    define('ASP_TERMS_CUSTOM_ORDER', true);
}

global $post, $asp_archive_slug, $asp_speaker_label, $asp_speaker_label_slug, $asp_topic_label, $asp_topic_label_slug, $asp_sermon_label, $asp_sermon_label_slug, $asp_date_format, $shortcode_options;

$asp_hide_filtering = get_option('asp_archive_hide_filtering');
$asp_hide_criteria_box = get_option('asp_archive_hide_criteria_box');
$asp_disable_title_image = get_option('asp_design_disable_sermon_title_image');
$asp_general_sermon_layout = get_option('asp_general_sermon_layout');
$asp_language_filter_button = get_option('asp_language_filter_button');
$asp_archive_pagination_type = get_option('asp_archive_pagination_type');

$paged = isset($_GET['paged']) ? $_GET['paged'] : 1;

?>

<!-- Get Theme Header -->
<?php if (empty($shortcode_options['used_in_shortcode'])): ?>
    <?php get_header(); ?>
<?php endif; ?>

    <!-- Archive Sermon Wrapper -->
    <div class="sermon-wrapper <?php if (!empty($shortcode_options['used_in_shortcode'])) { echo 'asp-archive-shortcode'; } ?>">

        <!-- Archive Title Section -->
        <?php if (empty($shortcode_options['used_in_shortcode'])): ?>
            <?php do_action('asp_hook_archive_title'); ?>
            <?php do_action('asp_hook_archive_top_holder'); ?>
        <?php endif; ?>

        <!-- Archive Sermon Container -->
        <div class="sermon-container">

            <div class="sermon-container_inner">

                <div class="asp-archive-container" data-state="idle" data-asp-pagination="<?php echo $asp_archive_pagination_type === 'infinity' ? 'infinity' : 'default'; ?>">

                    <?php do_action('asp_hook_archive_top_container');

                    list($criteria_terms, $query) = asp_prepare_query();
                    $results = new WP_Query($query);

                    if (isset($shortcode_options['filter']) && $shortcode_options['filter'] == 'false') {
                        $asp_hide_filtering = 'none';
                    }

                    if (isset($shortcode_options['filter']) && $shortcode_options['filter'] == 'true') {
                        $asp_hide_filtering = '';
                    }

                    ?>

                    <!-- AJAX ScrollTO Position -->
                    <div class="asp-archive-ajax-scrollto">

                        <!-- Filter bar -->
                        <div class='sermon-filter-holder <?php if (empty($asp_hide_filtering)) { echo "show-filter-bar"; } else { echo "hide-filter-bar"; } ?>'>
                            <form class='asp-archive-filter'>
                                <?php do_action('asp_hook_filter_bar_fields'); ?>
                            </form>
                        </div>

                        <!-- Criteria box -->
                        <div class="asp-criteria-box-wrapper">
                            <?php do_action('asp_hook_filter_criteria_box'); ?>
                        </div>

                        <!-- Filter Details -->
                        <div class="asp-details-top-holder">
                            <?php do_action('asp_filter_details'); ?>
                        </div>

                        <?php do_action('asp_hook_archive_after_filter_bar'); ?>

                    </div>

                    <!-- Archive Content Section -->
                    <ul class="sermon-archive-holder sermon-archive-wrapper" data-asp-archive-layout="<?php echo $asp_general_sermon_layout; ?>">

                        <?php if ($results->have_posts()) : while ($results->have_posts()) : $results->the_post(); ?>

                            <?php do_action('asp_hook_archive_have_posts_top'); ?>

                            <!-- Archive Layout Injection -->

                            <?php
                            if ($asp_general_sermon_layout === 'list-view' && asp_pro_activated()) {
                                do_action('asp_archive_list_view');
                            } else {
                                do_action('asp_archive_grid_view', [
                                    'hidden' => false,
                                    'asp_slider' => false
                                ]);
                            } ?>

                            <?php do_action('asp_hook_archive_have_posts_bottom'); ?>

                        <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>

                        <?php else : ?>
                            <!-- Archive filter error message -->
                            <li class="sermon-filter-error">
                                <p><?php _e("No results for your criteria. Please select a different filter combination.",
                                        "advanced-sermons"); ?></p>
                            </li>
                        <?php endif; ?>

                    </ul>

                    <?php do_action('asp_hook_archive_bottom_container'); ?>

                    <!-- AJAX Loading Indicator -->
                    <div class="asp-loading-indicator"><div class="asp-lds-dual-ring-load"></div></div>

                    <!-- Archive Pagination -->
                    <div class="asp-pagination-wrapper">
                        <?php
                        if( $asp_archive_pagination_type === 'infinity' ) {
                            asp_archive_load_more($results, true);
                        } else if( $asp_archive_pagination_type === 'load-more' ) {
                            asp_archive_load_more($results);
                        } else {
                            asp_numeric_sermon_archive_nav($results);
                        }
                        ?>
                    </div>

                    <?php do_action('asp_hook_archive_bottom_container'); ?>

                </div>
            </div>
        </div>

        <?php if (empty($shortcode_options['used_in_shortcode'])): ?>
            <?php do_action('asp_hook_archive_bottom_holder'); ?>
        <?php endif; ?>

    </div>

<!-- Get Theme Footer -->
<?php if (empty($shortcode_options['used_in_shortcode'])): ?>
    <?php get_footer(); ?>
<?php endif; ?>
