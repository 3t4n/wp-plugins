<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_get_schema_metaboxe_article($rankology_fno_rich_snippets_data, $key_schema = 0) {
    $rankology_options_pro_rich_snippets_article_type = [
        [
            'value' => 'Article',
            'label' => __('Article (generic)', 'wp-rankology'),
        ],
        [
            'value' => 'AdvertiserContentArticle',
            'label' => __('Advertiser Content Article', 'wp-rankology'),
        ],
        [
            'value' => 'NewsArticle',
            'label' => __('News Article', 'wp-rankology'),
        ],
        [
            'value' => 'Report',
            'label' => __('Report', 'wp-rankology'),
        ],
        [
            'value' => 'SatiricalArticle',
            'label' => __('Satirical Article', 'wp-rankology'),
        ],
        [
            'value' => 'ScholarlyArticle',
            'label' => __('Scholarly Article', 'wp-rankology'),
        ],
        [
            'value' => 'SocialMediaPosting',
            'label' => __('Social Media Posting', 'wp-rankology'),
        ],
        [
            'value' => 'BlogPosting',
            'label' => __('Blog Posting', 'wp-rankology'),
        ],
        [
            'value' => 'TechArticle',
            'label' => __('Tech Article', 'wp-rankology'),
        ],
        [
            'value' => 'AnalysisNewsArticle',
            'label' => __('Analysis News Article', 'wp-rankology'),
        ],
        [
            'value' => 'AskPublicNewsArticle',
            'label' => __('Ask Public News Article', 'wp-rankology'),
        ],
        [
            'value' => 'BackgroundNewsArticle',
            'label' => __('Background News Article', 'wp-rankology'),
        ],
        [
            'value' => 'OpinionNewsArticle',
            'label' => __('Opinion News Article', 'wp-rankology'),
        ],
        [
            'value' => 'ReportageNewsArticle',
            'label' => __('Reportage News Article', 'wp-rankology'),
        ],
        [
            'value' => 'ReviewNewsArticle',
            'label' => __('Review News Article', 'wp-rankology'),
        ],
        [
            'value' => 'LiveBlogPosting',
            'label' => __('Live Blog Posting', 'wp-rankology'),
        ],
    ];

    $rankology_fno_rich_snippets_article_type                        = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_type']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_type'] : '';
    $rankology_fno_rich_snippets_article_title                       = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_title']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_title'] : '';
    $rankology_fno_rich_snippets_article_desc                        = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_desc']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_desc'] : '';
    $rankology_fno_rich_snippets_article_author                      = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_author']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_author'] : '';
    $rankology_fno_rich_snippets_article_img                         = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_img']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_img'] : '';
    $rankology_fno_rich_snippets_article_img_width                   = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_img_width']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_img_width'] : '';
    $rankology_fno_rich_snippets_article_img_height                  = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_img_height']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_img_height'] : '';
    $rankology_fno_rich_snippets_article_coverage_start_date         = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_coverage_start_date']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_coverage_start_date'] : '';
    $rankology_fno_rich_snippets_article_coverage_start_time         = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_coverage_start_time']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_coverage_start_time'] : '';
    $rankology_fno_rich_snippets_article_coverage_end_date           = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_coverage_end_date']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_coverage_end_date'] : '';
    $rankology_fno_rich_snippets_article_coverage_end_time           = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_coverage_end_time']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_coverage_end_time'] : '';
    $rankology_fno_rich_snippets_article_speakable_css_selector      = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_speakable_css_selector']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_article_speakable_css_selector'] : ''; ?>
<div class="wrap-rich-snippets-item wrap-rich-snippets-articles">
    <div class="rankology-notice">
        <p>
            <?php esc_html_e('Proper structured data in your news, blog, and sports article page can enhance your appearance in Google Search results.', 'wp-rankology'); ?>
        </p>
    </div>
    <?php if ('' !== rankology_fno_get_service('OptionPro')->getArticlesPublisherLogo()) { ?>
    <div class="rankology-notice">
        <p><span class="dashicons dashicons-yes"></span><?php esc_html_e('You have set a publisher logo. Good!', 'wp-rankology'); ?>
        </p>
    </div>
    <?php } else { ?>
    <div class="rankology-notice is-error">
        <p><span class="dashicons dashicons-no-alt"></span>
            <?php /* translators: %s: link to plugin settings page */ printf(__('You don\'t have set a <a href="%s">publisher logo</a>. It\'s required for Article content types.', 'wp-rankology'), admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_rich_snippets')); ?>
        </p>
    </div>
    <?php } ?>

    <p>
        <label for="rankology_fno_rich_snippets_article_type_meta"><?php esc_html_e('Select your article type', 'wp-rankology'); ?></label>
        <select id="rankology_fno_rich_snippets_article_type_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_article_type]">
            <?php foreach ($rankology_options_pro_rich_snippets_article_type as $key => $item) { ?>
            <option <?php selected($rankology_fno_rich_snippets_article_type, $item['value']); ?>
                value="<?php echo $item['value']; ?>"><?php echo $item['label']; ?>
            </option>
            <?php } ?>
        </select>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_article_title_meta">
            <?php esc_html_e('Headline <em>(max limit: 110)</em>', 'wp-rankology'); ?></label>

        <span class="description">
            <?php esc_html_e('Default value if empty: Post title', 'wp-rankology'); ?>
        </span>

        <input type="text" id="rankology_fno_rich_snippets_article_title_meta"
            class="rankology_fno_rich_snippets_article_title_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_article_title]"
            placeholder="<?php echo esc_html__('The headline of the article', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Headline <em>(max limit: 110)</em>', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_article_title; ?>" />
    <div class="wrap-rankology-counters">
        <div class="rankology_rich_snippets_articles_counters"></div>
        <?php esc_html_e(' (maximum limit)', 'wp-rankology'); ?>
    </div>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_article_desc_meta">
            <?php esc_html_e('Description', 'wp-rankology'); ?></label>

        <span class="description">
            <?php esc_html_e('Default value if empty: Post excerpt', 'wp-rankology'); ?>
        </span>

        <input type="text" id="rankology_fno_rich_snippets_article_desc_meta"
            class="rankology_fno_rich_snippets_article_desc_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_article_desc]"
            placeholder="<?php echo esc_html__('The description of the article', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Description', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_article_desc; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_article_author_meta">
            <?php esc_html_e('Post author', 'wp-rankology'); ?></label>
        <span class="description">
            <?php esc_html_e('Default value if empty: Post author', 'wp-rankology'); ?>
        </span>
        <input type="text" id="rankology_fno_rich_snippets_article_author_meta"
            class="rankology_fno_rich_snippets_article_author_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_article_author]"
            placeholder="<?php echo esc_html__('The author of the article', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('The author of the article', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_article_author; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_article_img_meta"><?php esc_html_e('Image', 'wp-rankology'); ?></label>
        <span class="description">
            <?php esc_html_e('The representative image of the article. Only a marked-up image that directly belongs to the article should be specified. ', 'wp-rankology'); ?>
            <?php esc_html_e('Default value if empty: Post thumbnail (featured image)', 'wp-rankology'); ?>
        </span>
    </p>
    <p>
        <input id="rankology_fno_rich_snippets_article_img_meta" type="text"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_article_img]"
            placeholder="<?php echo esc_html__('Select your image', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Image', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_article_img; ?>" />
        <input id="rankology_fno_rich_snippets_article_img_width" type="hidden"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_article_img_width]"
            value="<?php echo $rankology_fno_rich_snippets_article_img_width; ?>" />
        <input id="rankology_fno_rich_snippets_article_img_height" type="hidden"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_article_img_height]"
            value="<?php echo $rankology_fno_rich_snippets_article_img_height; ?>" />
        <span class="description"><?php esc_html_e('Minimum size: 696px wide, JPG, PNG or GIF, crawlable and indexable (default: post thumbnail if available)', 'wp-rankology'); ?></span>
        <input id="rankology_fno_rich_snippets_article_img" class="<?php echo rankology_btn_secondary_classes(); ?> rankology_media_upload"
            type="button"
            value="<?php esc_html_e('Upload an Image', 'wp-rankology'); ?>" />
    </p>
    <p>
        <label for="rankology-date-picker8">
            <?php esc_html_e('Coverage Start Date', 'wp-rankology'); ?>
        </label>
        <span class="description"><?php esc_html_e('To use with <strong>Live Blog Posting</strong> article type', 'wp-rankology'); ?></span>
        <input type="text" id="rankology-date-picker8" class="rankology-date-picker" autocomplete="off"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_article_coverage_start_date]"
            placeholder="<?php echo esc_html__('The beginning of live coverage. For example, "2017-01-24T19:33:17+00:00".', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Coverage Start Date', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_article_coverage_start_date; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_article_coverage_start_time_meta">
            <?php esc_html_e('Coverage Start Time', 'wp-rankology'); ?>
        </label>
        <span class="description"><?php esc_html_e('To use with <strong>Live Blog Posting</strong> article type', 'wp-rankology'); ?></span>
        <input type="text" id="rankology_fno_rich_snippets_article_coverage_start_time_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_article_coverage_start_time]"
            placeholder="<?php echo esc_html__('e.g. HH:MM', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Coverage Start Time', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_article_coverage_start_time; ?>" />
    </p>
    <p>
        <label for="rankology-date-picker9">
            <?php esc_html_e('Coverage End Date', 'wp-rankology'); ?>
        </label>
        <span class="description"><?php esc_html_e('To use with <strong>Live Blog Posting</strong> article type', 'wp-rankology'); ?></span>
        <input type="text" id="rankology-date-picker9" class="rankology-date-picker" autocomplete="off"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_article_coverage_end_date]"
            placeholder="<?php echo esc_html__('The end of live coverage. For example, "2017-01-24T19:33:17+00:00".', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Coverage End Date', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_article_coverage_end_date; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_article_coverage_end_time_meta">
            <?php esc_html_e('Coverage End Time', 'wp-rankology'); ?>
        </label>
        <span class="description"><?php esc_html_e('To use with <strong>Live Blog Posting</strong> article type', 'wp-rankology'); ?></span>
        <input type="text" id="rankology_fno_rich_snippets_article_coverage_end_time_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_article_coverage_end_time]"
            placeholder="<?php echo esc_html__('e.g. HH:MM', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Coverage End Time', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_article_coverage_end_time; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_article_speakable_css_selector_meta">
            <?php esc_html_e('Speakable CSS Selector', 'wp-rankology'); ?>
        </label>
        <span class="description"><?php esc_html_e('Addresses content in the annotated pages (such as class attribute)', 'wp-rankology'); ?></span>
        <input type="text" id="rankology_fno_rich_snippets_article_speakable_css_selector_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_article_speakable_css_selector]"
            placeholder="<?php echo esc_html__('e.g. post', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Speakable CSS Selector', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_article_speakable_css_selector; ?>" />
    </p>
</div>
<?php
}
