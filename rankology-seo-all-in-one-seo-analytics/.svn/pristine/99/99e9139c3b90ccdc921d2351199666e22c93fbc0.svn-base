<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//White Label
//=================================================================================================
//Remove Rankology admin header
if ('1' === rankology_fno_get_service('OptionPro')->getWhiteLabelAdminHeader()) {
    if ( ! defined('RANKOLOGY_WL_ADMIN_HEADER')) {
        define('RANKOLOGY_WL_ADMIN_HEADER', false);
    }
}

//Filter SEO admin menu dashicons
if (!empty(rankology_fno_get_service('OptionPro')->getWhiteLabelAdminMenu())) {
    function rkseo_seo_admin_menu_hook($html) {
        return rankology_fno_get_service('OptionPro')->getWhiteLabelAdminMenu();
    }
    add_filter('rankology_seo_admin_menu', 'rkseo_seo_admin_menu_hook');
}

//Change / remove Rankology icon in admin bar
if (!empty(rankology_fno_get_service('OptionPro')->getWhiteLabelAdminBarIcon())) {
    function rkseo_adminbar_icon_hook($html) {
        $html = rankology_fno_get_service('OptionPro')->getWhiteLabelAdminBarIcon();

        return $html;
    }
    add_filter('rankology_adminbar_icon', 'rkseo_adminbar_icon_hook');
}

//Change / remove Rankology title from main menu
if (!empty(rankology_fno_get_service('OptionPro')->getWhiteLabelAdminTitle())) {
    function rkseo_white_label_admin_title_hook($html) {
        $html = rankology_fno_get_service('OptionPro')->getWhiteLabelAdminTitle();

        return $html;
    }
    add_filter('rankology_seo_admin_menu_title', 'rkseo_white_label_admin_title_hook');
}

//Remove Rankology help links
if ('1' === rankology_fno_get_service('OptionPro')->getWhiteLabelHelpLinks()) {
    function rankology_white_label_css() {
        $get_current_screen = get_current_screen();
        $get_current_screen = $get_current_screen->id;
        if (true === is_rankology_page() || 'rankology_404' === $get_current_screen || 'rankology_bot' === $get_current_screen || 'rankology_backlinks' === $get_current_screen || 'rankology_schemas' === $get_current_screen) {
            echo '<style>.rankology-help, .rankology-doc, .rankology-your-schema .notice-info{display:none !important;}</style>';
        }
    }
    add_action('admin_head', 'rankology_white_label_css');
}

//Remove Rankology menu/submenu pages (multisite only)
if (is_multisite()) {
    if ( ! empty(rankology_fno_get_service('OptionPro')->getWhiteLabelMenuPages())) {
        if ( ! is_super_admin()) {
            add_action('admin_menu', 'rankology_remove_menu_page_hook');
            function rankology_remove_menu_page_hook() {
                $rankology_menu_pages_array = rankology_fno_get_service('OptionPro')->getWhiteLabelMenuPages();

                if (array_key_exists('rankology-option', $rankology_menu_pages_array)) {
                    remove_menu_page('rankology-option'); //SEO
                }
            }

            add_action('admin_menu', 'rankology_remove_submenu_page_hook', 999);
            function rankology_remove_submenu_page_hook() {
                $rankology_menu_pages_array = rankology_fno_get_service('OptionPro')->getWhiteLabelMenuPages();

                foreach ($rankology_menu_pages_array as $key => $value) {
                    remove_submenu_page('rankology-option', $key);

                    //Remove feature from Dashboard
                    $map = [
                        'rankology-titles'           => 'titles',
                        'rankology-xml-sitemap'      => 'xml_sitemap',
                        'rankology-social'           => 'social',
                        'rankology-google-analytics' => 'google_analytics',
                        'rankology-advanced'         => 'advanced',
                        'rankology-import-export'    => 'tools',
                        'rankology-fno-page'         => [
                            'woocommerce',
                            'edd',
                            'local_business',
                            'dublin_core',
                            'breadcrumbs',
                            'schemas',
                            'page_speed',
                            'robots',
                            'news',
                            'rewrite',
                            'htaccess',
                            'rss',
                            'redirects',
                        ],
                        'edit.php?post_type=rankology_404'     => 'redirects',
                        'edit.php?post_type=rankology_bot'     => 'bot',
                        'edit.php?post_type=rankology_schemas' => 'schemas',
                        'rankology-bot-batch'                  => 'bot',
                        'rankology-license'                    => 'license',
                    ];

                    if (array_key_exists($key, $map)) {
                        add_filter('rankology_remove_feature_' . $map[$key], '__return_false');
                        if ('rankology-fno-page' == $key) {
                            foreach ($map['rankology-fno-page'] as $_value) {
                                add_filter('rankology_remove_feature_' . $_value, '__return_false');
                            }
                        }
                    }
                }
            }
        }
    }
}

if (!empty(rankology_fno_get_service('OptionPro')->getWhiteLabelListTitle())
|| !empty(rankology_fno_get_service('OptionPro')->getWhiteLabelListTitlePro())
|| !empty(rankology_fno_get_service('OptionPro')->getWhiteLabelListDesc())
|| !empty(rankology_fno_get_service('OptionPro')->getWhiteLabelListDesc())
|| !empty(rankology_fno_get_service('OptionPro')->getWhiteLabelListAuthor())
|| !empty(rankology_fno_get_service('OptionPro')->getWhiteLabelListWebsite())
) {
    add_filter('all_plugins', 'rankology_filter_plugins_list', 10, 1);
    function rankology_filter_plugins_list($data) {
        //Rankology
        if (array_key_exists('wp-rankology/rankology.php', $data)) {
            //Title
            if (!empty(rankology_fno_get_service('OptionPro')->getWhiteLabelListTitle())) {
                $data['wp-rankology/rankology.php']['Name']  = rankology_fno_get_service('OptionPro')->getWhiteLabelListTitle();
                $data['wp-rankology/rankology.php']['Title'] = rankology_fno_get_service('OptionPro')->getWhiteLabelListTitle();
            }

            //Description
            if (!empty(rankology_fno_get_service('OptionPro')->getWhiteLabelListDesc())) {
                $data['wp-rankology/rankology.php']['Description'] = rankology_fno_get_service('OptionPro')->getWhiteLabelListDesc();
            }

            //Author
            if (!empty(rankology_fno_get_service('OptionPro')->getWhiteLabelListAuthor())) {
                $data['wp-rankology/rankology.php']['Author']     = rankology_fno_get_service('OptionPro')->getWhiteLabelListAuthor();
                $data['wp-rankology/rankology.php']['AuthorName'] = rankology_fno_get_service('OptionPro')->getWhiteLabelListAuthor();
            }

            //Website
            if (!empty(rankology_fno_get_service('OptionPro')->getWhiteLabelListWebsite())) {
                $data['wp-rankology/rankology.php']['AuthorURI'] = rankology_fno_get_service('OptionPro')->getWhiteLabelListWebsite();
            }
        }

        //Rankology FNO
        if (array_key_exists('wp-rankology-fno/rankology-fno.php', $data)) {
            //Title
            if (!empty(rankology_fno_get_service('OptionPro')->getWhiteLabelListTitlePro())) {
                $data['wp-rankology-fno/rankology-fno.php']['Name']  = rankology_fno_get_service('OptionPro')->getWhiteLabelListTitlePro();
                $data['wp-rankology-fno/rankology-fno.php']['Title'] = rankology_fno_get_service('OptionPro')->getWhiteLabelListTitlePro();
            }

            //Description
            if (!empty(rankology_fno_get_service('OptionPro')->getWhiteLabelListDescPro())) {
                $data['wp-rankology-fno/rankology-fno.php']['Description'] = rankology_fno_get_service('OptionPro')->getWhiteLabelListDescPro();
            }

            //Author
            if (!empty(rankology_fno_get_service('OptionPro')->getWhiteLabelListAuthor())) {
                $data['wp-rankology-fno/rankology-fno.php']['Author']     = rankology_fno_get_service('OptionPro')->getWhiteLabelListAuthor();
                $data['wp-rankology-fno/rankology-fno.php']['AuthorName'] = rankology_fno_get_service('OptionPro')->getWhiteLabelListAuthor();
            }

            //Website
            if (!empty(rankology_fno_get_service('OptionPro')->getWhiteLabelListWebsite())) {
                $data['wp-rankology-fno/rankology-fno.php']['AuthorURI'] = rankology_fno_get_service('OptionPro')->getWhiteLabelListWebsite();
            }
        }

        return $data;
    }
}

if (!empty(rankology_fno_get_service('OptionPro')->getWhiteLabelListViewDetails())) {
    add_filter('plugin_row_meta', 'rankology_filter_plugins_list_meta', 10, 2);
    function rankology_filter_plugins_list_meta($links, $file) {
        if (false !== strpos($file, 'wp-rankology/rankology.php') || false !== strpos($file, 'wp-rankology-fno/rankology-fno.php')) {
            unset($links[2]);
        }

        return $links;
    }
}
