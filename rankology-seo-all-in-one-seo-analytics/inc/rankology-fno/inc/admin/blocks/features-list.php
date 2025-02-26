<?php
// To prevent calling the plugin directly
if (! function_exists('add_action')) {
    echo 'Please don&rsquo;t call the plugin directly. Thanks :)';
    exit;
}

add_filter('rankology_features_list_before_tools', 'rankology_fno_features_list_before_tools');
function rankology_fno_features_list_before_tools($features) {

    $features['inspect-url'] = [
        'title'         => __('Google Search Console', 'wp-rankology'),
        'desc'          => __('Get CTR, clicks, positions and impressions</strong>. Inspect URL for details about mobile compatibility, crawling, indexing and schemas.', 'wp-rankology'),
        'btn_primary'   => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_inspect_url'),
        'filter'        => 'rankology_remove_feature_inspect_url',
        'toggle'        => true,
    ];
    $features['rich-snippets'] = [
        'title'         => __('Structured Data Types', 'wp-rankology'),
        'desc'          => __('Add data types to your content i.e. articles, courses, recipes, videos, events, products and more.', 'wp-rankology'),
        'btn_primary'   => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_rich_snippets'),
        'filter'        => 'rankology_remove_feature_schemas',
    ];
    $features['woocommerce'] = [
        'title'         => __('WooCommerce', 'wp-rankology'),
        'desc'          => __('Improve WooCommerce SEO.', 'wp-rankology'),
        'btn_primary'   => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_woocommerce'),
        'filter'        => 'rankology_remove_feature_woocommerce',
    ];
    $features['breadcrumbs'] = [
        'title'         => __('Breadcrumbs', 'wp-rankology'),
        'desc'          => __('Enable Breadcrumbs for your theme and improve your SEO.', 'wp-rankology'),
        'btn_primary'   => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_breadcrumbs'),
        'filter'        => 'rankology_remove_feature_breadcrumbs',
    ];
    $features['page-speed'] = [
        'title'         => __('Google Page Speed', 'wp-rankology'),
        'desc'          => __('Track your website performance to improve SEO with Google Page Speed.', 'wp-rankology'),
        'btn_primary'   => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_page_speed'),
        'filter'        => 'rankology_remove_feature_page_speed',
        'toggle'        => false,
    ];
    if (! is_multisite() || (is_multisite() && defined('SUBDOMAIN_INSTALL') && true === constant('SUBDOMAIN_INSTALL'))) {//subdomains or single site
        $features['robots'] = [
            'title'       => __('robots.txt', 'wp-rankology'),
            'desc'        => __('Edit your robots.txt file.', 'wp-rankology'),
            'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_robots'),
            'filter'      => 'rankology_remove_feature_robots',
        ];
    }
    if (! is_multisite()) {
        $features['htaccess'] = [
            'title'         => __('.htaccess', 'wp-rankology'),
            'desc'          => __('Edit your htaccess file.', 'wp-rankology'),
            'btn_primary'   => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_htaccess'),
            'filter'        => 'rankology_remove_feature_htaccess',
            'toggle'        => false,
        ];
    }
    $features['rss'] = [
        'title'         => __('RSS', 'wp-rankology'),
        'desc'          => __('Configure default WordPress RSS.', 'wp-rankology'),
        'btn_primary'   => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_rss'),
        'filter'        => 'rankology_remove_feature_rss',
        'toggle'        => false,
    ];
    $features['404'] = [
        'title'       => __('Redirections', 'wp-rankology'),
        'desc'        => __('Monitor 404, create 301, 302 and 307 redirections.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_404'),
        'filter'      => 'rankology_remove_feature_redirects',
    ];
    $features['bot'] = [
        'title'       => __('Broken links', 'wp-rankology'),
        'desc'        => __('Scan your site to find SEO problems.', 'wp-rankology'),
        'btn_primary' => admin_url('admin.php?page=rankology-bot-batch'),
        'filter'      => 'rankology_remove_feature_bot',
    ];
    $features['ai'] = [
        'title'         => __('AI Content', 'wp-rankology'),
        'desc'          => __('Use the power of artificial intelligence to increase your productivity.', 'wp-rankology'),
        'btn_primary'   => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_ai'),
        'filter'        => 'rankology_remove_feature_ai',
    ];
    $features['news'] = [
        'title'         => __('Google News Sitemap', 'wp-rankology'),
        'desc'          => __('Optimize your site for Google News.', 'wp-rankology'),
        'btn_primary'   => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_news'),
        'filter'        => 'rankology_remove_feature_news',
    ];

    return $features;
}
