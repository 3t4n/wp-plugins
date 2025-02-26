<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

?>
<div class="wrap-rich-snippets-articles schema-steps">
    <div class="rankology-notice">
        <p class="rankology-help">
            <?php /* translators: %s: link documentation */
                printf(__('Learn more about the <strong>Article schema</strong> from the <a href="%s" target="_blank">Google official documentation website</a><span class="dashicons dashicons-redo"></span>', 'wp-rankology'), 'https://developers.google.com/search/docs/data-types/article'); ?>
        </p>
    </div>

    <?php if ('' !== rankology_fno_get_service('OptionPro')->getArticlesPublisherLogo()) { ?>
    <div class="rankology-notice is-success">
        <p>
            <?php esc_html_e('You have set a publisher logo. Good!', 'wp-rankology'); ?>
        </p>
    </div>
    <?php } else { ?>
    <div class="rankology-notice is-error">
        <p><span class="dashicons dashicons-no-alt"></span>
            <?php
            /* translators: %s: link to settings page */
            printf(__('You don\'t have set a <a href="%s">publisher logo</a>. It\'s required for Article content types.', 'wp-rankology'), admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_rich_snippets'));
        ?>
        </p>
    </div>

    <?php } ?>
    <p>
        <label for="rankology_fno_rich_snippets_article_type_meta"><?php esc_html_e('Select your article type', 'wp-rankology'); ?></label>
        <select name="rankology_fno_rich_snippets_article_type">
            <option <?php echo selected('Article', $rankology_fno_rich_snippets_article_type, false); ?>
                value="Article">
                <?php esc_html_e('Article (generic)', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('AdvertiserContentArticle', $rankology_fno_rich_snippets_article_type, false); ?>
                value="AdvertiserContentArticle">
                <?php esc_html_e('Advertiser Content Article', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('NewsArticle', $rankology_fno_rich_snippets_article_type, false); ?>
                value="NewsArticle">
                <?php esc_html_e('News Article', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('Report', $rankology_fno_rich_snippets_article_type, false); ?>
                value="Report">
                <?php esc_html_e('Report', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('SatiricalArticle', $rankology_fno_rich_snippets_article_type, false); ?>
                value="SatiricalArticle">
                <?php esc_html_e('Satirical Article', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('ScholarlyArticle', $rankology_fno_rich_snippets_article_type, false); ?>
                value="ScholarlyArticle">
                <?php esc_html_e('Scholarly Article', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('SocialMediaPosting', $rankology_fno_rich_snippets_article_type, false); ?>
                value="SocialMediaPosting">
                <?php esc_html_e('Social Media Posting', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('BlogPosting', $rankology_fno_rich_snippets_article_type, false); ?>
                value="BlogPosting">
                <?php esc_html_e('Blog Posting', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('TechArticle', $rankology_fno_rich_snippets_article_type, false); ?>
                value="TechArticle">
                <?php esc_html_e('Tech Article', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('AnalysisNewsArticle', $rankology_fno_rich_snippets_article_type, false); ?>
                value="AnalysisNewsArticle">
                <?php esc_html_e('Analysis News Article', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('AskPublicNewsArticle', $rankology_fno_rich_snippets_article_type, false); ?>
                value="AskPublicNewsArticle">
                <?php esc_html_e('Ask Public News Article', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('BackgroundNewsArticle', $rankology_fno_rich_snippets_article_type, false); ?>
                value="BackgroundNewsArticle">
                <?php esc_html_e('Background News Article', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('OpinionNewsArticle', $rankology_fno_rich_snippets_article_type, false); ?>
                value="OpinionNewsArticle">
                <?php esc_html_e('Opinion News Article', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('ReportageNewsArticle', $rankology_fno_rich_snippets_article_type, false); ?>
                value="ReportageNewsArticle">
                <?php esc_html_e('Reportage News Article', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('ReviewNewsArticle', $rankology_fno_rich_snippets_article_type, false); ?>
                value="ReviewNewsArticle">
                <?php esc_html_e('Review News Article', 'wp-rankology'); ?>
            </option>
            <option <?php echo selected('LiveBlogPosting', $rankology_fno_rich_snippets_article_type, false); ?>
                value="LiveBlogPosting">
                <?php esc_html_e('Live Blog Posting', 'wp-rankology'); ?>
            </option>
        </select>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_article_title_meta">
            <?php esc_html_e('Headline <em>(max limit: 110)</em>', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_article_title', 'default'); ?>
        <span class="description"><?php esc_html_e('The headline of the article', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_article_desc_meta">
            <?php esc_html_e('Description', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_article_desc', 'default'); ?>
        <span class="description"><?php esc_html_e('The description of the article', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_article_author_meta">
            <?php esc_html_e('Post author', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_article_author', 'default'); ?>
        <span class="description"><?php esc_html_e('The author of the article', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_article_img_meta"><?php esc_html_e('Image', 'wp-rankology'); ?></label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_article_img', 'image'); ?>
        <span class="description"><?php esc_html_e('The representative image of the article. Only a marked-up image that directly belongs to the article should be specified. ', 'wp-rankology'); ?><br>
            <?php esc_html_e('Default value if empty: Post thumbnail (featured image)', 'wp-rankology'); ?></span>
        <span class="field-required"><?php esc_html_e('Minimum size: 696px wide, JPG, PNG or GIF, crawlable and indexable (default: post thumbnail if available)', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_article_coverage_start_date_meta">
            <?php esc_html_e('Coverage Start Date', 'wp-rankology'); ?></label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_article_coverage_start_date', 'date'); ?>
        <span class="description"><?php esc_html_e('e.g. YYYY-MM-DD - To use with <strong>Live Blog Posting</strong> article type only', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_article_coverage_start_time_meta">
            <?php esc_html_e('Coverage Start Time', 'wp-rankology'); ?></label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_article_coverage_start_time', 'time'); ?>
        <span class="description"><?php esc_html_e('e.g. HH:MM - To use with <strong>Live Blog Posting</strong> article type only', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_article_coverage_end_date_meta">
            <?php esc_html_e('Coverage End Date', 'wp-rankology'); ?></label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_article_coverage_end_date', 'date'); ?>
        <span class="description"><?php esc_html_e('e.g. YYYY-MM-DD - To use with <strong>Live Blog Posting</strong> article type only', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_article_coverage_end_time_meta">
            <?php esc_html_e('Coverage End Time', 'wp-rankology'); ?></label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_article_coverage_end_time', 'time'); ?>
        <span class="description"><?php esc_html_e('e.g. HH:MM - To use with <strong>Live Blog Posting</strong> article type only', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_article_speakable_meta">
            <?php esc_html_e('Speakable CSS Selector', 'wp-rankology'); ?></label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_article_speakable', 'default'); ?>
        <span class="description"><?php esc_html_e('Addresses content in the annotated pages (such as class attribute)', 'wp-rankology'); ?></span>
    </p>
</div>
