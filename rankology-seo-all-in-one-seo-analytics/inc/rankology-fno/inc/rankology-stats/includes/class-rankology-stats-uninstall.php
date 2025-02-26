<?php

namespace RANKOLOGY_STATS;

class Uninstall
{

    public function __construct()
    {
        global $wpdb;

        if (is_multisite()) {

            $blog_ids = $wpdb->get_col("SELECT `blog_id` FROM $wpdb->blogs");
            foreach ($blog_ids as $blog_id) {
                switch_to_blog($blog_id);
                $this->rankology_stats_site_removal();
                restore_current_blog();
            }

        } else {
            $this->rankology_stats_site_removal();
        }
    }

    /**
     * Removes database options, user meta keys & tables
     */
    public function rankology_stats_site_removal()
    {
        global $wpdb;

        // Delete the options from the WordPress options table.
        delete_option('rankology_stats');
        delete_option('rankology_stats_plugin_version');
        delete_option('rankology_stats_referrals_detail');
        delete_option('rankology_stats_overview_page_ads');
        delete_option('rankology_stats_users_city');

        // Delete the transients.
        delete_transient('rkns_top_referring');
        delete_transient('rkns_excluded_hostname_to_ip_cache');

        // Remove All Scheduled
        if (function_exists('wp_clear_scheduled_hook')) {
            wp_clear_scheduled_hook('rankology_stats_geoip_hook');
            wp_clear_scheduled_hook('rankology_stats_report_hook');
            wp_clear_scheduled_hook('rankology_stats_referrerspam_hook');
            wp_clear_scheduled_hook('rankology_stats_dbmaint_hook');
            wp_clear_scheduled_hook('rankology_stats_dbmaint_visitor_hook');
            wp_clear_scheduled_hook('rankology_stats_add_visit_hook');
            wp_clear_scheduled_hook('rankology_stats_report_hook');
            wp_clear_scheduled_hook('rankology_stats_optimize_table');
        }

        // Delete the user options.
        $wpdb->query("DELETE FROM {$wpdb->usermeta} WHERE `meta_key` LIKE 'rankology_stats%'");

        // Drop the tables
        foreach (DB::table() as $tbl) {
            $wpdb->query("DROP TABLE IF EXISTS {$tbl}");
        }
    }
}
