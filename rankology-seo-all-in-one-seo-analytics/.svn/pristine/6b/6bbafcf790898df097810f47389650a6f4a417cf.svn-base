<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_rss_before_html_callback() {
    $options = get_option('rankology_instant_indexing_option_namerss');
    $check   = isset($options['rankology_rss_before_html']) ? $options['rankology_rss_before_html'] : null;

    printf(
    '<textarea id="rankology_rss_before_html" name="rankology_instant_indexing_option_namerss[rankology_rss_before_html]" rows="4" placeholder="' . esc_html__('Enter your HTML content', 'wp-rankology') . '" aria-label="' . __('Display content before each post', 'wp-rankology') . '">%s</textarea>',
    esc_html($check)); ?>

<p class="description">
    <?php esc_html_e('HTML tags allowed: strong, em, br, a href', 'wp-rankology'); ?>
</p>

<p class="description">
    <?php esc_html_e('Dynamic variables: %%sitetitle%%, %%tagline%%, %%post_author%%, %%post_permalink%%, %%post_title%%', 'wp-rankology'); ?>
</p>

<?php
}

function rankology_rss_after_html_callback() {
    $options = get_option('rankology_instant_indexing_option_namerss');
    $check   = isset($options['rankology_rss_after_html']) ? $options['rankology_rss_after_html'] : null;

    printf(
    '<textarea id="rankology_rss_after_html" name="rankology_instant_indexing_option_namerss[rankology_rss_after_html]" rows="4" aria-label="' . __('Display content after each post', 'wp-rankology') . '" placeholder="' . esc_html__('Enter your HTML content', 'wp-rankology') . '">%s</textarea>',
    esc_html($check)); ?>

<p class="description">
    <?php esc_html_e('HTML tags allowed: strong, em, br, a href', 'wp-rankology'); ?>
</p>

<p class="description">
    <?php esc_html_e('Dynamic variables: %%sitetitle%%, %%tagline%%, %%post_author%%, %%post_permalink%%, %%post_title%%', 'wp-rankology'); ?>
</p>

<?php
}

function rankology_rss_post_thumbnail_callback() {
    $options = get_option('rankology_instant_indexing_option_namerss');

    $check = isset($options['rankology_rss_post_thumbnail']); ?>

<label for="rankology_rss_post_thumbnail">
    <input id="rankology_rss_post_thumbnail" name="rankology_instant_indexing_option_namerss[rankology_rss_post_thumbnail]"
        type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>
    <?php esc_html_e('Display post thumbnail for each post if available', 'wp-rankology'); ?>
</label>

<pre><?php echo esc_html('<media:content medium="image" url="https://example.com/my-post-thumbnail.jpg" width="300" height="300" />'); ?></pre>

<?php if (isset($options['rankology_rss_post_thumbnail'])) {
        esc_attr($options['rankology_rss_post_thumbnail']);
    }
}

function rankology_rss_disable_comments_feed_callback() {
    $options = get_option('rankology_instant_indexing_option_namerss');

    $check = isset($options['rankology_rss_disable_comments_feed']); ?>

<label for="rankology_rss_disable_comments_feed">
    <input id="rankology_rss_disable_comments_feed" name="rankology_instant_indexing_option_namerss[rankology_rss_disable_comments_feed]"
        type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>
    <?php esc_html_e('Remove feed link in source code', 'wp-rankology'); ?>
</label>

<pre><?php echo esc_html('<link rel="alternate" type="application/rss+xml" title="Site title Comments Feed" href="https://example.com/comments/feed/" />'); ?></pre>

<?php if (isset($options['rankology_rss_disable_comments_feed'])) {
        esc_attr($options['rankology_rss_disable_comments_feed']);
    }
}

function rankology_rss_disable_posts_feed_callback() {
    $options = get_option('rankology_instant_indexing_option_namerss');

    $check = isset($options['rankology_rss_disable_posts_feed']); ?>

<label for="rankology_rss_disable_posts_feed">
    <input id="rankology_rss_disable_posts_feed" name="rankology_instant_indexing_option_namerss[rankology_rss_disable_posts_feed]"
        type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>
    <?php esc_html_e('Remove feed link in source code (default WordPress RSS feed)', 'wp-rankology'); ?>
</label>

<pre><?php echo esc_html('<link rel="alternate" type="application/rss+xml" title="Site title Feed" href="https://example.com/feed/" />'); ?></pre>

<?php if (isset($options['rankology_rss_disable_posts_feed'])) {
        esc_attr($options['rankology_rss_disable_posts_feed']);
    }
}

function rankology_rss_disable_extra_feed_callback() {
    $options = get_option('rankology_instant_indexing_option_namerss');

    $check = isset($options['rankology_rss_disable_extra_feed']); ?>

<label for="rankology_rss_disable_extra_feed">
    <input id="rankology_rss_disable_extra_feed" name="rankology_instant_indexing_option_namerss[rankology_rss_disable_extra_feed]"
        type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Remove feed link in source code (author, categories, custom taxonomies, custom post type, comments feed for a single post)', 'wp-rankology'); ?>
</label>

<pre><?php echo esc_html('<link rel="alternate" type="application/rss+xml" title="Site title - My post title - Comments Feed" href="https://example.com/my-post-slug/feed/" />'); ?></pre>

<?php if (isset($options['rankology_rss_disable_extra_feed'])) {
        esc_attr($options['rankology_rss_disable_extra_feed']);
    }
}

function rankology_rss_disable_all_feeds_callback() {
    $options = get_option('rankology_instant_indexing_option_namerss');

    $check = isset($options['rankology_rss_disable_all_feeds']); ?>

<label for="rankology_rss_disable_all_feeds">
    <input id="rankology_rss_disable_all_feeds" name="rankology_instant_indexing_option_namerss[rankology_rss_disable_all_feeds]"
        type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>
    <?php esc_html_e('Disable all WordPress RSS feeds', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_rss_disable_all_feeds'])) {
        esc_attr($options['rankology_rss_disable_all_feeds']);
    }
}
