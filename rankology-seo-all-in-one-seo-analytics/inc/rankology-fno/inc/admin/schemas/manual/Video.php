<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_get_schema_metaboxe_video($rankology_fno_rich_snippets_data, $key_schema = 0) {
    $rankology_fno_rich_snippets_videos_name        = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_videos_name']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_videos_name'] : '';
    $rankology_fno_rich_snippets_videos_description = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_videos_description']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_videos_description'] : '';
    $rankology_fno_rich_snippets_videos_img         = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_videos_img']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_videos_img'] : '';
    $rankology_fno_rich_snippets_videos_date_posted         = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_videos_date_posted']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_videos_date_posted'] : '';
    $rankology_fno_rich_snippets_videos_img_width   = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_videos_img_width']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_videos_img_width'] : '';
    $rankology_fno_rich_snippets_videos_img_height  = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_videos_img_height']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_videos_img_height'] : '';
    $rankology_fno_rich_snippets_videos_duration    = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_videos_duration']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_videos_duration'] : '';
    $rankology_fno_rich_snippets_videos_url         = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_videos_url']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_videos_url'] : '';

    ?>
<div class="wrap-rich-snippets-item wrap-rich-snippets-videos">
    <div class="rankology-notice">
        <p>
            <?php esc_html_e('Mark up your video content with structured data to make Google Search an entry point for discovering and watching videos. ', 'wp-rankology'); ?>
        </p>
    </div>
    <p>
        <label for="rankology_fno_rich_snippets_videos_name_meta">
            <?php esc_html_e('Video name', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_videos_name_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_videos_name]"
            placeholder="<?php echo esc_html__('The title of your video', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Video name', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_videos_name; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_videos_description_meta"><?php esc_html_e('Video description', 'wp-rankology'); ?>
        </label>
        <textarea id="rankology_fno_rich_snippets_videos_description_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_videos_description]"
            placeholder="<?php echo esc_html__('The description of the video', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Video description', 'wp-rankology'); ?>"><?php echo $rankology_fno_rich_snippets_videos_description; ?></textarea>
    </p>
    <p>
        <label for="rankology-date-picker4">
            <?php esc_html_e('Uploaded date', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology-date-picker4" class="rankology-date-picker" autocomplete="off"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_videos_date_posted]"
            placeholder="<?php echo esc_html__('The uploaded date of your video in ISO 8601 format. For example, "2017-01-24" or "2017-01-24T19:33:17+00:00".', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Published date', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_videos_date_posted; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_videos_img_meta"><?php esc_html_e('Video thumbnail', 'wp-rankology'); ?>
        </label>
        <span class="description"><?php esc_html_e('Minimum size: 160px by 90px - Max size: 1920x1080px - crawlable and indexable', 'wp-rankology'); ?></span>
        <input id="rankology_fno_rich_snippets_videos_img_meta" type="text"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_videos_img]"
            placeholder="<?php echo esc_html__('Select your image', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Video thumbnail', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_videos_img; ?>" />
        <input id="rankology_fno_rich_snippets_videos_img_width" type="hidden"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_videos_img_width]"
            value="<?php echo $rankology_fno_rich_snippets_videos_img_width; ?>" />
        <input id="rankology_fno_rich_snippets_videos_img_height" type="hidden"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_videos_img_height]"
            value="<?php echo $rankology_fno_rich_snippets_videos_img_height; ?>" />
        <input id="rankology_fno_rich_snippets_videos_img" class="<?php echo rankology_btn_secondary_classes(); ?> rankology_media_upload"
            type="button"
            value="<?php esc_html_e('Upload an Image', 'wp-rankology'); ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_videos_duration_meta">
            <?php esc_html_e('Duration of your video (format: hh:mm:ss)', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_videos_duration_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_videos_duration]"
            placeholder="<?php echo esc_html__('e.g. 00:04:30 for 4 minutes and 30 seconds', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Duration of your video (format: hh:mm:ss)', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_videos_duration; ?>" />
        <span class="description"><?php esc_html_e('You must respect the format of this field: hh:mm:ss', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_videos_url_meta">
            <?php esc_html_e('Video URL', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_videos_url_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_videos_url]"
            placeholder="<?php echo esc_html__('e.g. https://example.com/video.mp4', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Video URL', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_videos_url; ?>" />
    </p>
</div>
<?php
}
