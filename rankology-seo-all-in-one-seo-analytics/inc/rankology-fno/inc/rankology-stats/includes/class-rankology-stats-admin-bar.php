<?php

namespace RANKOLOGY_STATS;

class AdminBar
{
    /**
     * AdminBar constructor.
     */
    public function __construct()
    {

        # Show WordPress Admin Bar
        add_action('admin_bar_menu', array($this, 'admin_bar'), 69);
    }

    /**
     * Check Show Rankology Stats Admin Bar
     */
    public static function show_admin_bar()
    {
        /**
         * Show/Hide Rankology-Stats Admin Bar
         *
         * @example add_filter('rankology_stats_show_admin_bar', function(){ return false; });
         */
        return (has_filter('rankology_stats_show_admin_bar')) ? apply_filters('rankology_stats_show_admin_bar', true) : Option::get('menu_bar');
    }

    /**
     * Show WordPress Admin Bar
     * @param \WP_Admin_Bar $wp_admin_bar
     */
    public function admin_bar($wp_admin_bar)
    {
        // Check Show WordPress Admin Bar
        if (self::show_admin_bar() and is_admin_bar_showing() and User::Access()) {

            $menu_title = '<span class="ab-icon"></span>';
            $object_id  = get_queried_object_ID();

            $view_type  = false;
            $view_title = false;

            if ((is_single() or is_page()) and !is_front_page()) {

                $view_type  = Pages::get_post_type($object_id);
                $view_title = __('Page Views', 'rankology-stats');

            } elseif (is_category()) {

                $view_type  = 'category';
                $view_title = __('Category Views', 'rankology-stats');

            } elseif (is_tag()) {

                $view_type  = 'post_tag';
                $view_title = __('Tag Views', 'rankology-stats');

            } elseif (is_author()) {

                $view_type  = 'author';
                $view_title = __('Author Views', 'rankology-stats');

            }

            if ($view_type && $view_title) {
                $hit_number = rankology_stats_pages('total', '', $object_id, null, null, $view_type);

                $menu_title .= sprintf('%s: %s', $view_title, number_format($hit_number));
                $menu_title .= ' - ';
            }

            $menu_title .= sprintf('Online: %s', number_format(rankology_stats_useronline()));

            /**
             * List Of Admin Bar WordPress
             *
             * --- Array Arg ---
             * Key : ID of Admin bar
             */
            $admin_bar_list = array(
                'wp-statistic-menu'                   => array(
                    'title' => $menu_title,
                    'href'  => Menus::admin_url('overview')
                ),
                'rankology-stats-menu-todayvisitor'     => array(
                    'parent' => 'wp-statistic-menu',
                    'title'  => __('Today\'s Visitors', 'rankology-stats') . ": " . rankology_stats_visitor('today'),
                ),
                'rankology-stats-menu-todayvisit'       => array(
                    'parent' => 'wp-statistic-menu',
                    'title'  => __('Today\'s Visits', 'rankology-stats') . ": " . rankology_stats_visit('today')
                ),
                'rankology-stats-menu-yesterdayvisitor' => array(
                    'parent' => 'wp-statistic-menu',
                    'title'  => __('Yesterday\'s Visitors', 'rankology-stats') . ": " . rankology_stats_visitor('yesterday'),
                ),
                'rankology-stats-menu-yesterdayvisit'   => array(
                    'parent' => 'wp-statistic-menu',
                    'title'  => __('Yesterday\'s Visits', 'rankology-stats') . ": " . rankology_stats_visit('yesterday')
                )
            );

            /**
             * Rankology Stats Admin Bar List
             */
            $admin_bar_list = apply_filters('rankology_stats_admin_bar', $admin_bar_list, $object_id, $view_type);

            # Show Admin Bar
            foreach ($admin_bar_list as $id => $v_admin_bar) {
                $wp_admin_bar->add_menu(array_merge(array('id' => $id), $v_admin_bar));
            }
        }
    }
}

new AdminBar;