<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_get_schema_metaboxe_review($rankology_fno_rich_snippets_data, $key_schema = 0) {
    $rankology_fno_rich_snippets_review_item                         = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_review_item']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_review_item'] : '';
    $rankology_fno_rich_snippets_review_item_type                    = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_review_item_type']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_review_item_type'] : '';
    $rankology_fno_rich_snippets_review_img                          = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_review_img']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_review_img'] : '';
    $rankology_fno_rich_snippets_review_rating                       = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_review_rating']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_review_rating'] : '';
    $rankology_fno_rich_snippets_review_max_rating                   = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_review_max_rating']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_review_max_rating'] : '';
    $rankology_fno_rich_snippets_review_body                         = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_review_body']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_review_body'] : ''; ?>
<div class="wrap-rich-snippets-item wrap-rich-snippets-review">
    <div class="rankology-notice">
        <p>
            <?php esc_html_e('A simple review about something. When Google finds valid reviews or ratings markup, they may show a rich snippet that includes stars and other summary info from reviews or ratings.', 'wp-rankology'); ?>
        </p>
    </div>
    <p>
        <label for="rankology_fno_rich_snippets_review_item_meta">
            <?php esc_html_e('Review item name', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_review_item_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_review_item]"
            placeholder="<?php echo esc_html__('The item name reviewed', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Review item name', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_review_item; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_review_item_type_meta">
            <?php esc_html_e('Review item type', 'wp-rankology'); ?>
        </label>
        <select id="rankology_fno_rich_snippets_review_item_type_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_review_item_type]">
            <option <?php selected('CreativeWorkSeason', $rankology_fno_rich_snippets_review_item_type); ?>
                value="CreativeWorkSeason"><?php esc_html_e('CreativeWorkSeason', 'wp-rankology'); ?>
            </option>
            <option <?php selected('CreativeWorkSeries', $rankology_fno_rich_snippets_review_item_type); ?>
                value="CreativeWorkSeries"><?php esc_html_e('CreativeWorkSeries', 'wp-rankology'); ?>
            </option>
            <option <?php selected('Episode', $rankology_fno_rich_snippets_review_item_type); ?>
                value="Episode"><?php esc_html_e('Episode', 'wp-rankology'); ?>
            </option>
            <option <?php selected('Game', $rankology_fno_rich_snippets_review_item_type); ?>
                value="Game"><?php esc_html_e('Game', 'wp-rankology'); ?>
            </option>
            <option <?php selected('MediaObject', $rankology_fno_rich_snippets_review_item_type); ?>
                value="MediaObject"><?php esc_html_e('MediaObject', 'wp-rankology'); ?>
            </option>
            <option <?php selected('MusicPlaylist', $rankology_fno_rich_snippets_review_item_type); ?>
                value="MusicPlaylist"><?php esc_html_e('MusicPlaylist', 'wp-rankology'); ?>
            </option>
            <option <?php selected('MusicRecording', $rankology_fno_rich_snippets_review_item_type); ?>
                value="MusicRecording"><?php esc_html_e('MusicRecording', 'wp-rankology'); ?>
            </option>
            <option <?php selected('Organization', $rankology_fno_rich_snippets_review_item_type); ?>
                value="Organization"><?php esc_html_e('Organization', 'wp-rankology'); ?>
            </option>
        </select>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_review_img_meta">
            <?php esc_html_e('Review item image', 'wp-rankology'); ?>
        </label>
        <input id="rankology_fno_rich_snippets_review_img_meta" type="text"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_review_img]"
            placeholder="<?php echo esc_html__('Select your image', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Review item name', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_review_img; ?>" />
        <input id="rankology_fno_rich_snippets_review_img" class="<?php echo rankology_btn_secondary_classes(); ?> rankology_media_upload"
            type="button"
            value="<?php esc_html_e('Upload an Image', 'wp-rankology'); ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_review_rating_meta">
            <?php esc_html_e('Your rating', 'wp-rankology'); ?>
        </label>
        <input type="number" id="rankology_fno_rich_snippets_review_rating_meta" min="1" step="0.1"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_review_rating]"
            placeholder="<?php echo esc_html__('The item rating', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Your rating', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_review_rating; ?>" />
        <span class="description"><?php esc_html_e('Your rating: scale from 1 to 5.','wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_review_max_rating_meta">
            <?php esc_html_e('Max best rating', 'wp-rankology'); ?>
        </label>
        <input type="number" id="rankology_fno_rich_snippets_review_max_rating_meta" min="1" step="0.1"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_review_max_rating]"
            placeholder="<?php echo esc_html__('Max best rating', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Max best rating', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_review_max_rating; ?>" />
        <span class="description"><?php esc_html_e('Only required if your scale is different from 1 to 5.','wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_review_body_meta">
            <?php esc_html_e('Review body', 'wp-rankology'); ?>
        </label>
        <textarea id="rankology_fno_rich_snippets_review_body_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_review_body]"
            placeholder="<?php echo esc_html__('Enter your review body', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Review body', 'wp-rankology'); ?>"><?php echo $rankology_fno_rich_snippets_review_body; ?></textarea>
    </p>
</div>
<?php
}
