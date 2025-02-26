<?php

namespace RANKOLOGY_STATS;

class Network
{
    /**
     * Network constructor.
     */
    public function __construct()
    {
        add_action('network_admin_menu', array($this, 'wp_admin_menu'));
    }

    /**
     * Load WordPress Network Admin Menu
     */
    public function wp_admin_menu()
    {

        // Get the read/write capabilities required to view/manage the plugin as set by the user.
        $read_cap   = User::ExistCapability(Option::get('read_capability', 'manage_options'));
        $manage_cap = User::ExistCapability(Option::get('manage_capability', 'manage_options'));

        // Add the top level menu.
        add_menu_page(__('Statistics', 'rankology-stats'), __('Statistics', 'rankology-stats'), $read_cap, RANKOLOGY_STATS_MAIN_FILE, array($this, 'overview'), 'dashicons-chart-bar');
 
        // Add the sub items.
        //add_submenu_page(RANKOLOGY_STATS_MAIN_FILE, __('Overview', 'rankology-stats'), __('Overview', 'rankology-stats'), $read_cap, RANKOLOGY_STATS_MAIN_FILE, array($this, 'overview'));

        // Add sub Menu for All Blog
        $sites = Helper::get_wp_sites_list();
        foreach ($sites as $blog_id) {
            $details = get_blog_details($blog_id);
            //add_submenu_page(RANKOLOGY_STATS_MAIN_FILE, $details->blogname, $details->blogname, $manage_cap, 'rankology_stats_blogid_' . $blog_id, array($this, 'goto_blog'));
        }
    }

    /**
     * Network Overview
     */
    public function overview()
    {
        ?>
        <div id="wrap rkns-wrap">
            <br/>
            <table class="widefat wp-list-table" style="width: auto;">
                <thead>
                <tr>
                    <th style='text-align: left'><?php esc_html_e('Site', 'rankology-stats'); ?></th>
                    <th style='text-align: left'><?php esc_html_e('Options', 'rankology-stats'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;

                $options = array(
                    __('Compare Report', 'rankology-stats')     => Menus::get_page_slug('overview'),
                    __('Traffic', 'rankology-stats')            => Menus::get_page_slug('hits'),
                    __('Online', 'rankology-stats')             => Menus::get_page_slug('online'),
                    __('Referrers', 'rankology-stats')          => Menus::get_page_slug('referrers'),
                    __('Search Words', 'rankology-stats')       => Menus::get_page_slug('words'),
                    __('Searches', 'rankology-stats')           => Menus::get_page_slug('searches'),
                    __('Pages', 'rankology-stats')              => Menus::get_page_slug('pages'),
                    __('Visitors', 'rankology-stats')           => Menus::get_page_slug('visitors'),
                    __('Countries', 'rankology-stats')          => Menus::get_page_slug('countries'),
                    __('Browsers', 'rankology-stats')           => Menus::get_page_slug('browser'),
                    __('Top Visitors Today', 'rankology-stats') => Menus::get_page_slug('top-visitors'),
                    __('Exclusions', 'rankology-stats')         => Menus::get_page_slug('exclusions'),
                    __('Settings', 'rankology-stats')           => Menus::get_page_slug('settings'),
                );

                $sites = Helper::get_wp_sites_list();
                foreach ($sites as $blog_id) {
                    $details   = get_blog_details($blog_id);
                    $url       = get_admin_url($blog_id, '/') . 'admin.php?page=';
                    $alternate = '';

                    if ($i % 2 == 0) {
                        $alternate = ' class="alternate"';
                    }
                    ?>

                    <tr<?php echo esc_attr($alternate); ?>>
                        <td style='text-align: left'>
                            <?php echo esc_attr($details->blogname); ?>
                        </td>
                        <td style='text-align: left'>
                            <?php
                            $options_len = count($options);
                            $j           = 0;

                            foreach ($options as $key => $value) {
                                echo '<a href="' . esc_url($url . $value) . '">' . esc_attr($key) . '</a>';
                                $j++;
                                if ($j < $options_len) {
                                    echo ' - ';
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php
    }

    /**
     * Goto Network Blog
     */
    public function goto_blog()
    {
        global $plugin_page;
        $blog_id = str_replace('rankology_stats_blogid_', '', $plugin_page);
        $url     = esc_url(get_admin_url($blog_id) . '/admin.php?page=' . Menus::get_page_slug('overview'));
        echo "<script>window.location.href = '$url';</script>";
    }
}

global $rankology_stats_adm_network;

$rankology_stats_adm_network = new Network;