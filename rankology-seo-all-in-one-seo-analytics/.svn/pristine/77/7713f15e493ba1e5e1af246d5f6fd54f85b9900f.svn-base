<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//RSS
//=================================================================================================
if ('' != rankology_fno_get_service('OptionPro')->getRSSDisableCommentsFeed()) {
    add_filter('feed_links_show_comments_feed', '__return_false');
}
if ('' != rankology_fno_get_service('OptionPro')->getRSSDisablePostsFeed()) {
    remove_action('wp_head', 'feed_links', 2);
}
if ('' != rankology_fno_get_service('OptionPro')->getRSSDisableExtraFeed()) {
    remove_action('wp_head', 'feed_links_extra', 3);
}
if ('' != rankology_fno_get_service('OptionPro')->getRSSDisableAllFeeds()) {
    function rankology_rss_disable_feed() {
        wp_safe_redirect( esc_url(get_home_url()), 301 );
        exit();
    }

    add_action('do_feed', 'rankology_rss_disable_feed', 1);
    add_action('do_feed_rdf', 'rankology_rss_disable_feed', 1);
    add_action('do_feed_rss', 'rankology_rss_disable_feed', 1);
    add_action('do_feed_rss2', 'rankology_rss_disable_feed', 1);
    add_action('do_feed_atom', 'rankology_rss_disable_feed', 1);
    add_action('do_feed_rss2_comments', 'rankology_rss_disable_feed', 1);
    add_action('do_feed_atom_comments', 'rankology_rss_disable_feed', 1);
}

function rankology_rss_html_display($content) {
    $content_before = null;
    $content_after = null;

    if (is_feed()) {
        global $post;
        $rankology_rss_template_variables_array = [
            '%%sitetitle%%',
            '%%tagline%%',
            '%%post_author%%',
            '%%post_permalink%%',
            '%%post_title%%',
        ];

        $rankology_rss_template_variables_array = apply_filters( 'rankology_rss_dyn_vars', $rankology_rss_template_variables_array );

        $rankology_rss_template_replace_array = [
            get_bloginfo('name'),
            get_bloginfo('description'),
            get_the_author_meta('display_name', $post->post_author),
            get_the_permalink(),
            get_the_title(),
        ];

        $rankology_rss_template_replace_array = apply_filters( 'rankology_rss_dyn_vars_value', $rankology_rss_template_replace_array );

        if ('' != rankology_fno_get_service('OptionPro')->getRSSBeforeHTML()) {
            $rankology_rss_before_html_option = str_replace($rankology_rss_template_variables_array, $rankology_rss_template_replace_array, rankology_fno_get_service('OptionPro')->getRSSBeforeHTML());
            $content_before = $rankology_rss_before_html_option;
        }
        if ('' != rankology_fno_get_service('OptionPro')->getRSSAfterHTML()) {
            $rankology_rss_after_html_option = str_replace($rankology_rss_template_variables_array, $rankology_rss_template_replace_array, rankology_fno_get_service('OptionPro')->getRSSAfterHTML());
            $content_after = $rankology_rss_after_html_option;
        }
    }

    return $content_before . $content . $content_after;
}

//RSS <description></description>
add_filter('the_excerpt_rss', 'rankology_rss_html_display');
//RSS <content:encoded></content:encoded>
add_filter('the_content_feed', 'rankology_rss_html_display');

//Add post thumbnail to RSS feeds
if (rankology_fno_get_service('OptionPro')->getRSSPostThumbnail() === '1') {
    function rankology_rss_post_thumbnail() {
        if (has_post_thumbnail(get_the_ID())){
            $thumb_id = get_post_thumbnail_id(get_the_ID());
            $size = apply_filters('rankology_rss_post_thumb_size', 'thumbnail');
            $thumb = wp_get_attachment_image_src($thumb_id, $size);

            if (is_array($thumb)) {
                echo '<media:content url="' . $thumb[0] . '" width="' . $thumb[1] . '" height="' . $thumb[2] . '" medium="image"/>';
                echo "\n";
            }
        }
    }
    add_action('rss2_item', 'rankology_rss_post_thumbnail');

    //Requires to validate the RSS feed with media:content tag
    add_filter( 'rss2_ns', 'rankology_rss_post_thumbnail_namespace' );
    function rankology_rss_post_thumbnail_namespace() {
        echo 'xmlns:media="http://search.yahoo.com/mrss/"';
    }
}
