<?php
defined('ABSPATH') || die('Cheating\' uh?');
function highcompress_banners()
{
    $version=get_option("HIGHCOMPRESS_VERSION_TAG");
    $url="https://www.highcompress.com/banner.php?ver=$version";
    $response = wp_remote_get($url);
    $api_response = wp_remote_retrieve_body($response);
    echo esc_html($api_response);
}
highcompress_banners();
