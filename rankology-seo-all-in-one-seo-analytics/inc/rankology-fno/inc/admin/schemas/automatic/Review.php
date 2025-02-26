<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

?>

<div class="wrap-rich-snippets-review">
    <div class="rankology-notice">
        <p>
            <?php /* translators: %s: link documentation */
                printf(__('Learn more about the <strong>Review schema</strong> from the <a href="%s" target="_blank">Google official documentation website</a><span class="dashicons dashicons-redo"></span>', 'wp-rankology'), 'https://developers.google.com/search/docs/data-types/review-snippet');
            ?>
        </p>
    </div>
    <p>
        <label for="rankology_fno_rich_snippets_review_item_meta">
            <?php esc_html_e('Review item name', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_review_item', 'default'); ?>
        <span class="description"><?php esc_html_e('The item name reviewed', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_review_item_type_meta">
            <?php esc_html_e('Review item type', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_review_item_type', 'default'); ?>
        <span class="description"><?php esc_html_e('<strong>Authorized values:</strong> "CreativeWorkSeason", "CreativeWorkSeries", "Episode", "Game", "MediaObject", "MusicPlaylist", "MusicRecording", "Organization"', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_review_img_meta"><?php esc_html_e('Review item image', 'wp-rankology'); ?></label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_review_img', 'image'); ?>
        <span class="description"><?php esc_html_e('Review item image URL', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_review_rating_meta">
            <?php esc_html_e('Your rating', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_review_rating', 'rating'); ?>
        <span class="description"><?php esc_html_e('Your rating: scale from 1 to 5', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_review_max_rating_meta">
            <?php esc_html_e('Max best rating', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_review_max_rating', 'rating'); ?>
        <span class="description"><?php esc_html_e('Only required if your scale is different from 1 to 5.', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_review_body_meta">
            <?php esc_html_e('Review body', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_review_body', 'default'); ?>
        <span class="description"><?php esc_html_e('Your review body', 'wp-rankology'); ?></span>
    </p>
</div>
