<?php
    // To prevent calling the plugin directly
    if (! function_exists('add_action')) {
        echo 'Please don&rsquo;t call the plugin directly. Thanks :)';
        exit;
    }

    /**
     * Check if Schemas feature is correctly enabled by the user
     *
     * 
     * 
     *
     */
    function rankology_tasks_schemas() {
        $options = get_option('rankology_fno_option_name');
        if (isset($options['rankology_rich_snippets_enable']) && '1' === rankology_get_toggle_option('rich-snippets')) {
            return 'done';
        }

        return;
    }

    /* Filter Tasks from SEO dashboard */
    add_filter('rankology_dashboard_tasks', 'rankology_fno_dashboard_tasks');
    function rankology_fno_dashboard_tasks($tasks) {
        $tasks = [
            [
                'done' => rankology_tasks_sitemaps(),
                'link' => admin_url('admin.php?page=rankology-xml-sitemap'),
                'label' => __('Generate XML sitemaps', 'wp-rankology'),
            ],
            [
                'done' => rankology_tasks_social_networks(),
                'link' => admin_url('admin.php?page=rankology-social'),
                'label' => __('Be social', 'wp-rankology'),
            ],
            [
                'done' => (rankology_get_toggle_option('local-business') === '1') ? 'done' : '',
                'link' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_local_business'),
                'label' => __('Improve Local SEO', 'wp-rankology'),
            ],
            [
                'done' => rankology_tasks_schemas(),
                'link' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_rich_snippets'),
                'label' => __('Add Structured Data Types to increase visibility in SERPs', 'wp-rankology'),
            ]
        ];

        return $tasks;
    }
