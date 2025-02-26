<?php
/**
 * @package Short Link
 * @author Rob Allen (rob@akrabat.com), Sam Johnston <samj@samj.net>
 * @license Apache 2.0: http://www.apache.org/licenses/LICENSE-2.0
 * @version 1.1
 */
/*
Plugin Name: Short Link
Plugin URI: http://code.google.com/p/shortlink/
Description: Provide HTML rel="shortlink" links and associated HTTP headers
Author: Rob Allen, Sam Johnston
Version: 1.0
Author URI: http://code.google.com/p/shortlink/wiki/Acknowledgements
*/

define ('SHORTLINK_FIELD_NAME', 'Short Link');
$shortlink_url = '';

function shortlink_create(&$wp) {
    global $post, $shortlink_url;
    if (is_single() || (is_page() && !is_front_page())) {
        $url = get_bloginfo('url');
        if($post && $post->ID > 0) {
            $shortlink = get_post_meta($post->ID, SHORTLINK_FIELD_NAME, true);
            $slug = $post->ID;
            if(!empty($shortlink)) {
                $slug = $shortlink;
            }
            $url .= "/$slug";
            $shortlink_url = $url;
            if (!headers_sent()) {
                header('Link: <'.$url.'>; rel=shortlink');
            }
        }
    }
}

function shortlink_wp_head() {
    global $shortlink_url;
    if (!empty($shortlink_url)) {
        echo '<link rel="shortlink" href="'.$shortlink_url.'" />';
    }
}

function shortlink_save_post($post_id, $post) {
    $realPostId = wp_is_post_revision($post);
    $value = get_post_meta($realPostId, SHORTLINK_FIELD_NAME);
    if(empty($value)) {
        add_post_meta($realPostId, SHORTLINK_FIELD_NAME, $realPostId, true);
    }
}

function shortlink_redirect($query_vars)
{
    // check if pagename matches a short url
    if(!array_key_exists('pagename', $query_vars)) {
        return $query_vars;
    }

    $shortUrl = $query_vars['pagename'];
    if((int)$shortUrl > 0) {
        wp_redirect(get_permalink($shortUrl));
        exit;
    }

    $query = array('meta_key' => SHORTLINK_FIELD_NAME,
		'meta_value' => $shortUrl);
    $posts = get_posts($query);
    if (count($posts) > 0) {
        wp_redirect(get_permalink($posts[0]), 301);
        exit;
    } else {
        $pages = get_pages($query);
        if (count($pages) > 0) {
            wp_redirect(get_permalink($pages[0]), 301);
            exit;
        }
    }
    return $query_vars;
}

add_action('wp', 'shortlink_create');
add_action('wp_head', 'shortlink_wp_head');
add_action('save_post', 'shortlink_save_post', 10, 2);
add_filter('request', 'shortlink_redirect');
