<?php
defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

///////////////////////////////////////////////////////////////////////////////////////////////////
//Do redirect
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_301_do_redirect() {
    if (is_admin()) {
        return;
    }

    global $wp;
    global $post;

    $home_url = home_url($wp->request);

    //WPML
    if (defined('ICL_SITEPRESS_VERSION')) {
        $home_url = untrailingslashit(home_url($wp->request));
    }

    if ( ! isset($_SERVER['QUERY_STRING'])) {
        $_SERVER['QUERY_STRING'] = '';
    }

    $get_init_current_url = htmlspecialchars(rawurldecode(add_query_arg($_SERVER['QUERY_STRING'], '', $home_url)));
    $get_current_url = wp_parse_url($get_init_current_url);

    if (defined('ICL_SITEPRESS_VERSION')) {
        add_filter('wpml_get_home_url', 'rankology_remove_wpml_home_url_filter', 20, 5);
        $home_url2 = home_url($wp->request);
        $get_init_current_url2 = htmlspecialchars(rawurldecode(add_query_arg($_SERVER['QUERY_STRING'], '', $home_url2)));
        $get_current_url2 = wp_parse_url($get_init_current_url2);
        remove_filter('wpml_get_home_url', 'rankology_remove_wpml_home_url_filter', 20);
    }

    $uri = '';
    $uri2 = '';
    $uri3 = '';
    $rankology_get_page = '';
    $if_exact_match = true;

    //Path and Query
    if (isset($get_current_url['path']) && ! empty($get_current_url['path']) && isset($get_current_url['query']) && ! empty($get_current_url['query'])) {
        $uri = trailingslashit($get_current_url['path']) . '?' . $get_current_url['query'];
        $uri2 = $get_current_url['path'] . '?' . $get_current_url['query'];

        $uri = ltrim($uri, '/');
        $uri2 = ltrim($uri2, '/');

        if (defined('ICL_SITEPRESS_VERSION')) {
            if (isset($get_current_url2['path']) && ! empty($get_current_url2['path']) && isset($get_current_url2['query']) && ! empty($get_current_url2['query'])) {
                $uri3 = $get_current_url2['path'] . '?' . $get_current_url2['query'];
                $uri3 = ltrim($uri3, '/');
            }
        }
    }
    //Path only
    elseif (isset($get_current_url['path']) && ! empty($get_current_url['path']) && ! isset($get_current_url['query'])) {
        $uri = $get_current_url['path'];
        $uri = ltrim($uri, '/');

        if (defined('ICL_SITEPRESS_VERSION')) {
            if (isset($get_current_url2['path']) && ! empty($get_current_url2['path']) && ! isset($get_current_url2['query'])) {
                $uri3 = $get_current_url2['path'];
                $uri3 = ltrim($uri3, '/');
            }
        }
    }

    //Query only
    elseif (isset($get_current_url['query']) && ! empty($get_current_url['query']) && ! isset($get_current_url['path'])) {
        $uri = '?' . $get_current_url['query'];
        $uri = ltrim($uri, '/');

        if (defined('ICL_SITEPRESS_VERSION')) {
            if (isset($get_current_url2['query']) && ! empty($get_current_url2['query']) && ! isset($get_current_url2['path'])) {
                $uri3 = '?' . $get_current_url2['query'];
                $uri3 = ltrim($uri3, '/');
            }
        }
    }
    //default - home
    else {
        $uri = $get_current_url['host'];
    }

    //Necessary to allowed "&" in query
    $uri = htmlspecialchars_decode($uri);
    $uri2 = htmlspecialchars_decode($uri2);
    $uri3 = htmlspecialchars_decode($uri3);

    $page_uri = rankology_fno_get_service('Redirection')->getPageByTitle(trailingslashit($uri), '', 'rankology_404');

    $page_uri2 = rankology_fno_get_service('Redirection')->getPageByTitle($uri2, '', 'rankology_404');

    if (defined('ICL_SITEPRESS_VERSION')) {
        $page_uri4 = rankology_fno_get_service('Redirection')->getPageByTitle($uri3, '', 'rankology_404');
    }

    $page_uri3 = rankology_fno_get_service('Redirection')->getPageByTitle($uri, '', 'rankology_404');

    //Find URL in Redirections post type --- EXACT MATCH
    /**With trailing slash**/
    if (isset($uri) && '' != $uri && $page_uri) {
        $rankology_get_page = $page_uri;
    }
    /**Without trailing slash**/
    elseif (isset($uri2) && '' != $uri2 && $page_uri2) {
        $rankology_get_page = $page_uri2;
    }
    /**Without language prefix**/
    elseif (defined('ICL_SITEPRESS_VERSION') && isset($uri3) && '' != $uri3 && $page_uri4) {
        $rankology_get_page = $page_uri4;
    }
    /**Default**/
    else {
        $rankology_get_page = $page_uri3;
    }

    //Find URL in Redirections post type --- IGNORE ALL PARAMETERS
    if (empty($rankology_get_page)) {
        $if_exact_match = false;

        $uri = wp_parse_url($uri, PHP_URL_PATH);
        $uri2 = wp_parse_url($uri2, PHP_URL_PATH);
        $uri3 = wp_parse_url($uri3, PHP_URL_PATH);

        $uri = is_string($uri) ? ltrim($uri, '/') : '';
        $uri2 = is_string($uri2) ? ltrim($uri2, '/') : '';
        $uri3 = is_string($uri3) ? ltrim($uri3, '/') : '';

        $page_uri = rankology_fno_get_service('Redirection')->getPageByTitle(trailingslashit($uri), '', 'rankology_404');
        $page_uri2 = rankology_fno_get_service('Redirection')->getPageByTitle($uri2, '', 'rankology_404');

        if (defined('ICL_SITEPRESS_VERSION')) {
            $page_uri4 = rankology_fno_get_service('Redirection')->getPageByTitle($uri3, '', 'rankology_404');
        }

        $page_uri3 = rankology_fno_get_service('Redirection')->getPageByTitle($uri, '', 'rankology_404');

        $page_uri = rankology_fno_get_service('Redirection')->getPageByTitle(trailingslashit($uri), '', 'rankology_404');
        $page_uri2 = rankology_fno_get_service('Redirection')->getPageByTitle($uri2, '', 'rankology_404');
        $page_uri3 = rankology_fno_get_service('Redirection')->getPageByTitle($uri, '', 'rankology_404');

        /**With trailing slash**/
        if (isset($uri) && '' != $uri && $page_uri) {
            $rankology_get_page = $page_uri;
        }
        /**Without trailing slash**/
        elseif (isset($uri2) && '' != $uri2 && $page_uri2) {
            $rankology_get_page = $page_uri2;
        }
        /**Without language prefix**/
        elseif (defined('ICL_SITEPRESS_VERSION') && isset($uri3) && '' != $uri3 && $page_uri4) {
            $rankology_get_page = $page_uri4;
        }
        /**Default**/
        else {
            $rankology_get_page = $page_uri3;
        }
    }

    do_action('rankology_before_redirect', $rankology_get_page);

    if ( ! isset($rankology_get_page->ID)) {
        rankology_fno_get_service('Redirection')->checkRegexRedirect();
        return;
    }

    if ('publish' !== get_post_status($rankology_get_page->ID)) {
        rankology_fno_get_service('Redirection')->checkRegexRedirect();
        return;
    }


    rankology_fno_get_service('Redirection')->handleRedirectionWithId($rankology_get_page->ID, [
        'init_url' => $get_init_current_url,
        'if_exact_match' => $if_exact_match
    ]);
}
add_action('template_redirect', 'rankology_301_do_redirect', 1);

///////////////////////////////////////////////////////////////////////////////////////////////////
//Disable guess redirect url for 404
///////////////////////////////////////////////////////////////////////////////////////////////////
if (rankology_fno_get_service('OptionPro')->get404DisableGuessAutomaticRedirects() ==='1') {
    add_filter('do_redirect_guess_404_permalink', '__return_false');
}

//Create Redirection in Post Type
function rankology_404_create_redirect() {
    global $wp;
    global $post;

    $get_current_url = htmlspecialchars(rawurldecode(add_query_arg([], $wp->request)));

    //Exclude URLs from cache
    $match = false;
    $rankology_404_exclude = ['wp-content/cache'];
    $rankology_404_exclude = apply_filters('rankology_404_exclude', $rankology_404_exclude);

    foreach ($rankology_404_exclude as $kw) {
        if (0 === strpos($get_current_url, $kw)) {
            $match = true;
            break;
        }
    }

    //Get Current Time
    $rankology_get_current_time = time();

    //Creating 404 error in rankology_404
    if (false === $match) {
        $rankology_get_page = rankology_fno_get_service('Redirection')->getPageByTitle($get_current_url, '', 'rankology_404');

        //Get Title
        if ('' != $rankology_get_page) {
            $rankology_get_post_title = $rankology_get_page->post_title;
        } else {
            $rankology_get_post_title = '';
        }

        //Get User Agent
        $rankology_get_ua = '';
        if ( ! empty($_SERVER['HTTP_USER_AGENT'])) {
            $rankology_get_ua = $_SERVER['HTTP_USER_AGENT'];
        }

        //Get Referer
        $rankology_get_referer = '';
        if (wp_get_referer()) {
            $rankology_get_referer = wp_get_referer();
        }

        //Get IP Address
        $rankology_get_ip = '';
        $ip_logging = 'full';
        if (rankology_fno_get_service('OptionPro')->get404RedirectIpLogging()) {
            $ip_logging = rankology_fno_get_service('OptionPro')->get404RedirectIpLogging();
        }
        if ($ip_logging === 'full' || $ip_logging === 'anon') {
            if (function_exists('rankology_get_ip_address') && '' != rankology_get_ip_address()) {
                $rankology_get_ip = rankology_get_ip_address();

                if ($ip_logging === 'anon' && function_exists('wp_privacy_anonymize_ip')) {
                    $rankology_get_ip = wp_privacy_anonymize_ip(rankology_get_ip_address());
                }
            }
        }

        if ($get_current_url && $rankology_get_post_title != $get_current_url) {
            wp_insert_post(
                [
                    'post_title' => $get_current_url,
                    'meta_input' => [
                        'rankology_redirections_ua' => $rankology_get_ua,
                        'rankology_redirections_referer' => $rankology_get_referer,
                        '_rankology_404_redirect_date_request' => $rankology_get_current_time,
                        '_rankology_redirections_ip' => $rankology_get_ip,
                    ],
                    'post_type' => 'rankology_404',
                    'post_status' => 'publish',
                ]
            );
        } elseif ($get_current_url && $rankology_get_page->post_title == $get_current_url) {
            $rankology_404_count = get_post_meta($rankology_get_page->ID, 'rankology_404_count', true);
            update_post_meta($rankology_get_page->ID, 'rankology_404_count', ++$rankology_404_count);
            update_post_meta($rankology_get_page->ID, '_rankology_404_redirect_date_request', $rankology_get_current_time);
            update_post_meta($rankology_get_page->ID, 'rankology_redirections_ua', $rankology_get_ua);
            update_post_meta($rankology_get_page->ID, 'rankology_redirections_referer', $rankology_get_referer);
            update_post_meta($rankology_get_page->ID, '_rankology_redirections_ip', $rankology_get_ip);
        }
    }
}
function rankology_is_bot() {
    $bot_regex = '/BotLink|bingbot|AhrefsBot|ahoy|AlkalineBOT|anthill|appie|arale|araneo|AraybOt|ariadne|arks|ATN_Worldwide|Atomz|bbot|Bjaaland|Ukonline|borg\-bot\/0\.9|boxseabot|bspider|calif|christcrawler|CMC\/0\.01|combine|confuzzledbot|CoolBot|cosmos|Internet Cruiser Robot|cusco|cyberspyder|cydralspider|desertrealm, desert realm|digger|DIIbot|grabber|downloadexpress|DragonBot|dwcp|ecollector|ebiness|elfinbot|esculapio|esther|fastcrawler|FDSE|FELIX IDE|ESI|fido|H�m�h�kki|KIT\-Fireball|fouineur|Freecrawl|gammaSpider|gazz|gcreep|golem|googlebot|griffon|Gromit|gulliver|gulper|hambot|havIndex|hotwired|htdig|iajabot|INGRID\/0\.1|Informant|InfoSpiders|inspectorwww|irobot|Iron33|JBot|jcrawler|Teoma|Jeeves|jobo|image\.kapsi\.net|KDD\-Explorer|ko_yappo_robot|label\-grabber|larbin|legs|Linkidator|linkwalker|Lockon|logo_gif_crawler|marvin|mattie|mediafox|MerzScope|NEC\-MeshExplorer|MindCrawler|udmsearch|moget|Motor|msnbot|muncher|muninn|MuscatFerret|MwdSearch|sharp\-info\-agent|WebMechanic|NetScoop|newscan\-online|ObjectsSearch|Occam|Orbsearch\/1\.0|packrat|pageboy|ParaSite|patric|pegasus|perlcrawler|phpdig|piltdownman|Pimptrain|pjspider|PlumtreeWebAccessor|PortalBSpider|psbot|Getterrobo\-Plus|Raven|RHCS|RixBot|roadrunner|Robbie|robi|RoboCrawl|robofox|Scooter|Search\-AU|searchprocess|Senrigan|Shagseeker|sift|SimBot|Site Valet|skymob|SLCrawler\/2\.0|slurp|ESI|snooper|solbot|speedy|spider_monkey|SpiderBot\/1\.0|spiderline|nil|suke|http:\/\/www\.sygol\.com|tach_bw|TechBOT|templeton|titin|topiclink|UdmSearch|urlck|Valkyrie libwww\-perl|verticrawl|Victoria|void\-bot|Voyager|VWbot_K|crawlpaper|wapspider|WebBandit\/1\.0|webcatcher|T\-H\-U\-N\-D\-E\-R\-S\-T\-O\-N\-E|WebMoose|webquest|webreaper|webs|webspider|WebWalker|wget|winona|whowhere|wlm|WOLP|WWWC|none|XGET|Nederland\.zoek|AISearchBot|woriobot|NetSeer|Nutch|YandexBot|YandexMobileBot|SemrushBot|FatBot|MJ12bot|DotBot|AddThis|baiduspider|SeznamBot|mod_pagespeed|CCBot|openstat.ru\/Bot|m2e/i';

    $bot_regex = apply_filters('rankology_404_bots', $bot_regex);

    $userAgent = empty($_SERVER['HTTP_USER_AGENT']) ? false : $_SERVER['HTTP_USER_AGENT'];
    if ('' != $bot_regex && '' != $userAgent) {
        $isBot = ! $userAgent || preg_match($bot_regex, $userAgent);

        return $isBot;
    }
}

function rankology_404_log() {
    if (is_404() && ! is_admin() && '' != rankology_fno_get_service('OptionPro')->get404RedirectHome()) {
        if ('home' === rankology_fno_get_service('OptionPro')->get404RedirectHome()) {
            if ('' != rankology_fno_get_service('OptionPro')->get404RedirectStatusCode()) {
                if ('1' != rankology_is_bot() && rankology_fno_get_service('OptionPro')->get404Enable()) {
                    rankology_404_create_redirect();
                }
                wp_redirect(get_home_url(), rankology_fno_get_service('OptionPro')->get404RedirectStatusCode());
                exit;
            } else {
                if ('1' != rankology_is_bot() && rankology_fno_get_service('OptionPro')->get404Enable()) {
                    rankology_404_create_redirect();
                }
                wp_redirect(get_home_url(), '301');
                exit;
            }
        } elseif ('custom' === rankology_fno_get_service('OptionPro')->get404RedirectHome() && '' !== rankology_fno_get_service('OptionPro')->get404RedirectUrl()) {
            if ('' != rankology_fno_get_service('OptionPro')->get404RedirectStatusCode()) {
                if ('1' != rankology_is_bot() && rankology_fno_get_service('OptionPro')->get404Enable()) {
                    rankology_404_create_redirect();
                }
                wp_redirect(rankology_fno_get_service('OptionPro')->get404RedirectUrl(), rankology_fno_get_service('OptionPro')->get404RedirectStatusCode());
                exit;
            } else {
                if ('1' != rankology_is_bot() && rankology_fno_get_service('OptionPro')->get404Enable()) {
                    rankology_404_create_redirect();
                }
                wp_redirect(rankology_fno_get_service('OptionPro')->get404RedirectUrl(), '301');
                exit;
            }
        } else {
            if ('1' != rankology_is_bot() && rankology_fno_get_service('OptionPro')->get404Enable()) {
                rankology_404_create_redirect();
            }
        }
    } elseif (is_404() && ! is_admin() && rankology_fno_get_service('OptionPro')->get404Enable()) {
        if ('1' != rankology_is_bot() && rankology_fno_get_service('OptionPro')->get404Enable()) {
            rankology_404_create_redirect();
        }
    }
}
add_action('template_redirect', 'rankology_404_log');

add_filter('auto-draft_to_publish', 'rankology_prevent_title_redirection_already_exist');
add_filter('draft_to_publish', 'rankology_prevent_title_redirection_already_exist');
function rankology_prevent_title_redirection_already_exist($post) {
    if ('rankology_404' !== $post->post_type) {
        return;
    }

    if (wp_is_post_revision($post)) {
        return;
    }

    global $wpdb;

    $sql = $wpdb->prepare(
        "SELECT *
        FROM $wpdb->posts
        WHERE 1=1
        AND post_title = %s
        AND post_type = %s
        AND post_status = 'publish'",
        $post->post_title,
        'rankology_404'
    );

    $wpdb->get_results($sql);

    $count_post_title_exist = $wpdb->num_rows;

    if ($count_post_title_exist > 1) { // already exist
        wp_delete_post($post->ID);
        $exist_redirect_post = rankology_fno_get_service('Redirection')->getPageByTitle($post->post_title, '', 'rankology_404');

        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : admin_url('edit.php?post_type=rankology_404');
        $url = remove_query_arg('wp-post-new-reload', $referer);
        set_transient('rankology_prevent_title_redirection_already_exist', [
            'insert_post' => $post,
            'post_exist' => $exist_redirect_post,
            'rankology_redirections_value' => isset($_POST['rankology_redirections_value']) ? $_POST['rankology_redirections_value'] : null,
        ], 3600);

        wp_safe_redirect($url);
        exit;
    }

    // Remove notice watcher if needed
    $notices = rankology_get_option_post_need_redirects();

    if ($notices) {
        foreach ($notices as $key => $notice) {
            if (false !== strpos($notice['before_url'], $post->post_title)) {
                rankology_remove_notification_for_redirect($notice['id']);
            }
        }
    }
}

add_action('rankology_admin_notices', 'rankology_notice_prevent_create_title_redirection');
function rankology_notice_prevent_create_title_redirection() {
    $transient = get_transient('rankology_prevent_title_redirection_already_exist');
    if ( ! $transient) {
        return;
    }

    // Remove notice watcher if needed
    $notices = rankology_get_option_post_need_redirects();
    if ($notices) {
        foreach ($notices as $key => $notice) {
            if (false !== strpos($notice['before_url'], $transient['insert_post']->post_name)) {
                rankology_remove_notification_for_redirect($notice['id']);
            }
        }
    }

    delete_transient('rankology_prevent_title_redirection_already_exist');

    $edit_post_link = get_edit_post_link($transient['post_exist']->ID);

    $message = sprintf(
        /* translators: %s: post name (slug) %s: url redirect */
        __('<p>We were unable to create the redirection you requested (<code>%s</code> to <code>%s</code>).</p>', 'wp-rankology'),
        $transient['insert_post']->post_name,
        $transient['rankology_redirections_value']
    );

    $message .= sprintf(
        /* translators: %s: get_edit_post_link() %s: post name (slug) */
        __('<p>This URL has already a redirection: <a href="%s">%s</a> </p>', 'wp-rankology'),
        $edit_post_link,
        $transient['post_exist']->post_name
    ); ?>
<div class="error notice is-dismissable">
<?php echo $message; ?>
</div>
<?php
}

add_action('save_post_rankology_404', 'rankology_need_add_term_auto_redirect', 10, 2);
function rankology_need_add_term_auto_redirect($post_id, $post) {
    if ('POST' !== $_SERVER['REQUEST_METHOD']) {
        return;
    }

    $referer = wp_get_referer();
    if ( ! $referer) {
        return;
    }

    $parse_referer = wp_parse_url($referer);
    if (array_key_exists('query', $parse_referer) && false === strpos($parse_referer['query'], 'prepare_redirect=1')) {
        return;
    }

    $name_term = 'Auto Redirect';
    $slug_term = 'autoredirect_by_rankology';
    $term_autoredirect = get_term_by('slug', $slug_term, 'rankology_404_cat', ARRAY_A);
    if ( ! $term_autoredirect) {
        $term_autoredirect = wp_insert_term($name_term, 'rankology_404_cat', [
            'slug' => $slug_term,
        ]);
    }

    if ($term_autoredirect && ! is_wp_error($term_autoredirect)) {
        $term_id = $term_autoredirect['term_id'];

        $terms = get_the_terms($post_id, 'rankology_404_cat');
        $terms_id = [$term_id];
        if ($terms && ! is_wp_error($terms)) {
            foreach ($terms as $term) {
                $terms_id[] = $term->term_id;
            }
        }
    }

    wp_set_post_terms($post_id, $terms_id, 'rankology_404_cat');
}
