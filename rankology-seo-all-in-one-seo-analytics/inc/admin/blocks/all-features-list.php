<?php

add_filter('rankology_all_features_list_callback', 'rankology_all_features_list');
function rankology_all_features_list($features)
{
    // $features['option'] = [
    //     'title' => __('Header Metas', 'wp-rankology'),
    //     'desc' => __('Manage your post titles & metas for post types, taxonomies and archives.', 'wp-rankology'),
    //     'btn_primary' => admin_url('admin.php?page=rankology-option'),
    //     'filter' => 'rankology_remove_feature_option',
    //     'toggle' => true,
    // ];
    $features['titles'] = [
        'title' => __('Header Metas', 'wp-rankology'),
        'desc' => __('Manage your post titles & metas for post types, taxonomies and archives.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-titles'),
        'filter' => 'rankology_remove_feature_titles',
        'toggle' => true,
    ];
    $features['social'] = [
        'title' => __('Social Platforms', 'wp-rankology'),
        'desc' => __('Facebook, Twitter Card, Google Knowledge Graph and more.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-social'),
        'filter' => 'rankology_remove_feature_social',
        'toggle' => true,
    ];
    $features['xml-sitemap'] = [
        'title' => __('XML Sitemaps', 'wp-rankology'),
        'desc' => __('Manage your XML - Image - Video - HTML Sitemap.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-xml-sitemap'),
        'filter' => 'rankology_remove_feature_xml_sitemap',
        'toggle' => true,
    ];
    $features['google-analytics'] = [
        'title' => __('Google Analytics', 'wp-rankology'),
        'desc' => __('Track everything about website visitors with Google Analytics.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-google-analytics'),
        'filter' => 'rankology_remove_feature_google_analytics',
        'toggle' => true,
    ];
    $features['instant-indexing'] = [
        'title' => __('Search Engines Indexing', 'wp-rankology'),
        'desc' => __('Get CTR, clicks, positions and impressions</strong>. Inspect URL for details about mobile compatibility, crawling, indexing and schemas.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_instant_indexing'),
        'filter' => 'rankology_remove_feature_instant_indexing',
        'toggle' => true,

    ];
    $features['metaboxes'] = [
        'title' => __('Metaboxes/Columns', 'wp-rankology'),
        'desc' => __('Get CTR, clicks, positions and impressions</strong>. Inspect URL for details about mobile compatibility, crawling, indexing and schemas.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_metaboxes'),
        'filter' => 'rankology_remove_feature_metaboxes',
        'toggle' => true,

    ];
    $features['advanced'] = [
        'title' => __('Images Optimization / SEO', 'wp-rankology'),
        'desc' => __('Get CTR, clicks, positions and impressions</strong>. Inspect URL for details about mobile compatibility, crawling, indexing and schemas.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_advanced'),
        'filter' => 'rankology_remove_feature_advanced',
        'toggle' => true,

    ];
    $features['import-export'] = [
        'title' => __('Import/Export', 'wp-rankology'),
        'desc' => __('Get CTR, clicks, positions and impressions</strong>. Inspect URL for details about mobile compatibility, crawling, indexing and schemas.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_import-export'),
        'filter' => 'rankology_remove_feature_import-export',
        'toggle' => true,

    ];
    $features['rich-snippets'] = [
        'title' => __('Structured Data Types', 'wp-rankology'),
        'desc' => __('Add data types to your content i.e. articles, courses, recipes, videos, events, products and more.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rich-snippets'),
        'filter' => 'rankology_remove_feature_rich-snippets',
        'toggle' => true,
    ];
    $features['404'] = [
        'title' => __('Redirections', 'wp-rankology'),
        'desc' => __('Monitor 404, create 301, 302 and 307 redirections.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=#tab=tab_rankology_404'),
        'filter' => 'rankology_remove_feature_redirects',
        'toggle' => true,
    ];
    $features['stats-settings'] = [
        'title' => __('Stats Settings', 'wp-rankology'),
        'desc' => __('Stats Settings.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=#stats-settings'),
        'filter' => 'rankology_remove_feature_stats-settings',
        'toggle' => true,
    ];

    $features['breadcrumbs'] = [
        'title' => __('Breadcrumbs', 'wp-rankology'),
        'desc' => __('Enable Breadcrumbs for your theme and improve your SEO.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_breadcrumbs'),
        'filter' => 'rankology_remove_feature_breadcrumbs',
        'toggle' => true,
    ];
    $features['inspect-url'] = [
        'title' => __('Google Search Console', 'wp-rankology'),
        'desc' => __('Get CTR, clicks, positions and impressions</strong>. Inspect URL for details about mobile compatibility, crawling, indexing and schemas.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_inspect_url'),
        'filter' => 'rankology_remove_feature_inspect_url',
        'toggle' => true,

    ];
    $features['news'] = [
        'title' => __('Google News', 'wp-rankology'),
        'desc' => __('Optimize your site for Google News.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_news'),
        'filter' => 'rankology_remove_feature_news',
        'toggle' => true,
    ];
    $features['woocommerce'] = [
        'title' => __('WooCommerce', 'wp-rankology'),
        'desc' => __('Improve WooCommerce SEO.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_woocommerce'),
        'filter' => 'rankology_remove_feature_woocommerce',
        'toggle' => true,
    ];
    $features['ai'] = [
        'title' => __('AI Content', 'wp-rankology'),
        'desc' => __('Use the power of artificial intelligence to increase your productivity.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_ai'),
        'filter' => 'rankology_remove_feature_ai',
        'toggle' => true,
    ];
    $features['rss'] = [
        'title' => __('RSS', 'wp-rankology'),
        'desc' => __('Configure default WordPress RSS.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_rss'),
        'filter' => 'rankology_remove_feature_rss',
        'toggle' => false,
    ];
    if (!is_multisite() || (is_multisite() && defined('SUBDOMAIN_INSTALL') && true === constant('SUBDOMAIN_INSTALL'))) {//subdomains or single site
        $features['robots'] = [
            'title' => __('robots.txt', 'wp-rankology'),
            'desc' => __('Edit your robots.txt file.', 'wp-rankology'),
            'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_robots'),
            'filter' => 'rankology_remove_feature_robots',
            'toggle' => true,
        ];
    }
    if (!is_multisite()) {
        $features['htaccess'] = [
            'title' => __('.htaccess', 'wp-rankology'),
            'desc' => __('Edit your htaccess file.', 'wp-rankology'),
            'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_htaccess'),
            'filter' => 'rankology_remove_feature_htaccess',
            'toggle' => false,
        ];
    }
    $features['bot'] = [
        'title' => __('Broken links', 'wp-rankology'),
        'desc' => __('Scan your site to find SEO problems.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-bot-batch'),
        'filter' => 'rankology_remove_feature_bot',
        'toggle' => true,
    ];


    $features['tools'] = [
        'title' => __('Tools', 'wp-rankology'),
        'desc' => __('Import/Export plugin settings from one site to other site.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-import-export'),
        'filter' => 'rankology_remove_feature_tools',
        'toggle' => false,
    ];
    $features['page-speed'] = [
        'title' => __('PageSpeed Insights', 'wp-rankology'),
        'desc' => __('Track your website performance to improve SEO with Google Page Speed.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_page_speed'),
        'filter' => 'rankology_remove_feature_page_speed',
        'toggle' => false,
    ];
    return $features;
}

/* when plguin activate this hook will work for enable all the features
*/
function rankology_all_features_activated()
{

    $rankology_toggle_options = array(
        // 'toggle-option' => '1',
        'toggle-titles' => '1',
        'toggle-social' => '1',
        'toggle-xml-sitemap' => '1',
        'toggle-google-analytics' => '0',
        'toggle-instant-indexing' => '0',
        'toggle-metaboxes' => '1',
        'toggle-advanced' => '1',
        'toggle-import-export' => '1',
        'toggle-rich-snippets' => '1',
        'toggle-404' => '1',
        'stats-settings' => '1',
        'toggle-breadcrumbs' => '1',
        'toggle-inspect-url' => '0',
        'toggle-news' => '1',
        'toggle-woocommerce' => '1',
        'toggle-ai' => '1',
        //'toggle-rss' => '1',
        'toggle-robots' => '1',
        //'toggle-htaccess' => '1',
        'toggle-bot' => '1',
        //'toggle-tools' => '1',
        //'toggle-page-speed' => '1',
    );

    if (!get_option('rankology_toggle')) {
        update_option('rankology_toggle', $rankology_toggle_options);
    }


}

add_action('init', 'rankology_all_features_activated');

function rankology_prefix_activate()
{

    rankology_all_features_activated();

}

register_activation_hook(__FILE__, 'rankology_prefix_activate');