<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

/**
 * Admin bar customization.
 */
function rankology_admin_bar_links() {
    if ( ! current_user_can( rankology_capability( 'manage_options', 'admin_bar' ) ) ) {
        return;
    }

    if ('1' === rankology_get_service('AdvancedOption')->getAppearanceAdminBar()) {
        return;
    }

    global $wp_admin_bar;

    $title = '<div id="rankology-ab-icon" class="ab-item svg rankology-logo" style="background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIGlkPSJ1dWlkLTRmNmE4YTQxLTE4ZTMtNGY3Ny1iNWE5LTRiMWIzOGFhMmRjOSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgODk5LjY1NSA0OTQuMzA5NCI+PHBhdGggaWQ9InV1aWQtYTE1NWMxY2EtZDg2OC00NjUzLTg0NzctOGRkODcyNDBhNzY1IiBkPSJNMzI3LjM4NDksNDM1LjEyOGwtMjk5Ljk5OTktLjI0OTdjLTE2LjI3MzUsMS4xOTM3LTI4LjQ5ODEsMTUuMzUzOC0yNy4zMDQ0LDMxLjYyNzMsMS4wNzE5LDE0LjYxMjgsMTIuNjkxNiwyNi4yMzI1LDI3LjMwNDQsMjcuMzA0NGwyOTkuOTk5OSwuMjQ5N2MxNi4yNzM1LTEuMTkzNywyOC40OTgxLTE1LjM1MzgsMjcuMzA0NC0zMS42MjczLTEuMDcxOC0xNC42MTI4LTEyLjY5MTYtMjYuMjMyNS0yNy4zMDQ0LTI3LjMwNDRaIiBzdHlsZT0iZmlsbDojYTdhYWFkIi8+PHBhdGggaWQ9InV1aWQtZTMwYmE0YzYtNDc2OS00NjZiLWEwM2EtZTY0NGM1MTk4ZTU2IiBkPSJNMjcuMzg0OSw1OC45MzE3bDI5OS45OTk5LC4yNDk3YzE2LjI3MzUtMS4xOTM3LDI4LjQ5ODEtMTUuMzUzNywyNy4zMDQ0LTMxLjYyNzMtMS4wNzE4LTE0LjYxMjgtMTIuNjkxNi0yNi4yMzI1LTI3LjMwNDQtMjcuMzA0NEwyNy4zODQ5LDBDMTEuMTExNCwxLjE5MzctMS4xMTMyLDE1LjM1MzcsLjA4MDUsMzEuNjI3M2MxLjA3MTksMTQuNjEyOCwxMi42OTE2LDI2LjIzMjUsMjcuMzA0NCwyNy4zMDQ0WiIgc3R5bGU9ImZpbGw6I2E3YWFhZCIvPjxwYXRoIGlkPSJ1dWlkLTJiYmQ1MmQ2LWFlYzEtNDY4OS05ZDRjLTIzYzM1ZDRmMjJiOCIgZD0iTTY1Mi40ODUsLjI4NDljLTEyNC45Mzg4LC4wNjQtMjMwLjE1NTQsOTMuNDEzMi0yNDUuMTAwMSwyMTcuNDU1SDI3LjM4NDljLTE2LjI3MzUsMS4xOTM3LTI4LjQ5ODEsMTUuMzUzNy0yNy4zMDQ0LDMxLjYyNzIsMS4wNzE5LDE0LjYxMjgsMTIuNjkxNiwyNi4yMzI1LDI3LjMwNDQsMjcuMzA0NEg0MDcuMzg0OWMxNi4yMjk4LDEzNS40NDU0LDEzOS4xODcsMjMyLjA4ODgsMjc0LjYzMjMsMjE1Ljg1ODksMTM1LjQ0NTUtMTYuMjI5OCwyMzIuMDg4OC0xMzkuMTg2OSwyMTUuODU4OS0yNzQuNjMyNEM4ODIuOTkyMSw5My42ODM0LDc3Ny41ODg0LC4yMTEyLDY1Mi40ODUsLjI4NDlabTAsNDMzLjQyMTdjLTEwMi45NzU0LDAtMTg2LjQ1MzMtODMuNDc4LTE4Ni40NTMzLTE4Ni40NTMzLDAtMTAyLjk3NTMsODMuNDc4MS0xODYuNDUzMywxODYuNDUzMy0xODYuNDUzMywxMDIuOTc1NCwwLDE4Ni40NTMzLDgzLjQ3OCwxODYuNDUzMywxODYuNDUzMywuMDUyNCwxMDIuOTc1My04My4zODMsMTg2LjQ5NTktMTg2LjM1ODMsMTg2LjU0ODMtLjAzMTYsMC0uMDYzNCwwLS4wOTUxLDB2LS4wOTVaIiBzdHlsZT0iZmlsbDojYTdhYWFkIi8+PC9zdmc+) !important"></div> ' . __('SEO', 'wp-rankology');
    $title = apply_filters('rankology_adminbar_icon', $title);

    $noindex = '';
    if ('1' !== rankology_get_service('AdvancedOption')->getAppearanceAdminBarNoIndex()) {
        if ('1' === rankology_get_service('TitleOption')->getTitleNoIndex() || '1' != get_option('blog_public')) {
            $noindex .= '<a class="wrap-rankology-noindex" href="' . admin_url('admin.php?page=rankology-titles#tab=tab_rankology_titles_advanced') . '">';
            $noindex .= '<span class="ab-icon dashicons dashicons-hidden"></span>';
            $noindex .= __('noindex is on!', 'wp-rankology');
            $noindex .= '</a>';
        }
        $noindex = apply_filters('rankology_adminbar_noindex', $noindex);
    }

    // Adds a new top level admin bar link and a submenu to it
    // $wp_admin_bar->add_menu([
    //     'parent'	=> false,
    //     'id'		   => 'rankology',
    //     'title'		=> $title . $noindex,
    //     'href'		 => admin_url('admin.php?page=rankology-option'),
    // ]);

    //noindex/nofollow per CPT
    if (function_exists('get_current_screen') && null != get_current_screen()) {
        if (get_current_screen()->post_type || get_current_screen()->taxonomy) {
            $robots = '';

            $options = get_option('rankology_titles_option_name');

            if (get_current_screen()->taxonomy) {
                $noindex  = isset($options['rankology_titles_single_titles'][get_current_screen()->taxonomy]['noindex']);
                $nofollow = isset($options['rankology_titles_single_titles'][get_current_screen()->taxonomy]['nofollow']);
            } else {
                $noindex  = isset($options['rankology_titles_single_titles'][get_current_screen()->post_type]['noindex']);
                $nofollow = isset($options['rankology_titles_single_titles'][get_current_screen()->post_type]['nofollow']);
            }

            if (get_current_screen()->taxonomy) {
                /* translators: %s taxonomy name */
                $robots .= '<span class="wrap-rankology-cpt-seo">' . sprintf(__('SEO for "%s"', 'wp-rankology'), get_current_screen()->taxonomy) . '</span>';
            } else {
                /* translators: %s custom post type name */
                $robots .= '<span class="wrap-rankology-cpt-seo">' . sprintf(__('SEO for "%s"', 'wp-rankology'), get_current_screen()->post_type) . '</span>';
            }
            $robots .= '<span class="wrap-rankology-cpt-noindex">';

            if (true === $noindex) {
                $robots .= '<span class="ab-icon dashicons dashicons-marker on"></span>';
                $robots .= __('noindex is on!', 'wp-rankology');
            } else {
                $robots .= '<span class="ab-icon dashicons dashicons-marker off"></span>';
                $robots .= __('noindex is off.', 'wp-rankology');
            }

            $robots .= '</span>';

            $robots .= '<span class="wrap-rankology-cpt-nofollow">';

            if (true === $nofollow) {
                $robots .= '<span class="ab-icon dashicons dashicons-marker on"></span>';
                $robots .= __('nofollow is on!', 'wp-rankology');
            } else {
                $robots .= '<span class="ab-icon dashicons dashicons-marker off"></span>';
                $robots .= __('nofollow is off.', 'wp-rankology');
            }

            $robots .= '</span>';

            $wp_admin_bar->add_menu([
                'parent'	=> 'rankology',
                'id'		   => 'rankology_custom_sub_menu_meta_robots',
                'title'		=> $robots,
                'href'		 => admin_url('admin.php?page=rankology-titles'),
            ]);
        }
    }

    $wp_admin_bar->add_menu([
        'parent'	=> 'rankology',
        'id'		   => 'rankology_custom_sub_menu_titles',
        'title'		=> __('Titles & Metas', 'wp-rankology'),
        'href'		 => admin_url('admin.php?page=rankology-titles'),
    ]);
    $wp_admin_bar->add_menu([
        'parent'	=> 'rankology',
        'id'		   => 'rankology_custom_sub_menu_xml_sitemap',
        'title'		=> __('XML - HTML Sitemap', 'wp-rankology'),
        'href'		 => admin_url('admin.php?page=rankology-xml-sitemap'),
    ]);
    $wp_admin_bar->add_menu([
        'parent'	=> 'rankology',
        'id'		   => 'rankology_custom_sub_menu_social',
        'title'		=> __('Social Networks', 'wp-rankology'),
        'href'		 => admin_url('admin.php?page=rankology-social'),
    ]);
    $wp_admin_bar->add_menu([
        'parent'	=> 'rankology',
        'id'		   => 'rankology_custom_sub_menu_google_analytics',
        'title'		=> __('Analytics', 'wp-rankology'),
        'href'		 => admin_url('admin.php?page=rankology-google-analytics'),
    ]);
    $wp_admin_bar->add_menu([
        'parent'	=> 'rankology',
        'id'		   => 'rankology_custom_sub_menu_instant_indexing',
        'title'		=> __('Instant Indexing', 'wp-rankology'),
        'href'		 => admin_url('admin.php?page=rankology-instant-indexing'),
    ]);
    $wp_admin_bar->add_menu([
        'parent'	=> 'rankology',
        'id'		   => 'rankology_custom_sub_menu_advanced',
        'title'		=> __('Advanced', 'wp-rankology'),
        'href'		 => admin_url('admin.php?page=rankology-advanced'),
    ]);
    $wp_admin_bar->add_menu([
        'parent'	=> 'rankology',
        'id'		   => 'rankology_custom_sub_menu_import_export',
        'title'		=> __('Tools', 'wp-rankology'),
        'href'		 => admin_url('admin.php?page=rankology-import-export'),
    ]);

    do_action('rankology_admin_bar_items');

    $wp_admin_bar->add_menu([
        'parent'	=> 'rankology',
        'id'		   => 'rankology_custom_sub_menu_wizard',
        'title'		=> __('Configuration wizard', 'wp-rankology'),
        'href'		 => admin_url('admin.php?page=rankology-setup'),
    ]);
}
add_action('admin_bar_menu', 'rankology_admin_bar_links', 99);
