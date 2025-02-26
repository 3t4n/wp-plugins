<?php

namespace RANKOLOGY_STATS;

class Frontend
{
    public function __construct()
    {

        # Enable ShortCode in Widget
        add_filter('widget_text', 'do_shortcode');

        # Add the honey trap code in the footer.
        add_action('wp_footer', array($this, 'add_honeypot'));

        # Enqueue scripts & styles
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));

        # Print out the Rankology Stats HTML comment
        add_action('wp_head', array($this, 'print_out_plugin_html'));

        # Check to show hits in posts/pages
        if (Option::get('show_hits')) {
            add_filter('the_content', array($this, 'show_hits'));
        }
    }

    /**
     * Footer Action
     */
    public function add_honeypot()
    {
        if (Option::get('use_honeypot') && Option::get('honeypot_postid') > 0) {
            $post_url = get_permalink(Option::get('honeypot_postid'));
            echo '<a href="' . esc_html($post_url) . '" style="display: none;">&nbsp;</a>';
        }
    }


    /**
     * Enqueue Scripts
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script('rankology-stats-tracker', RANKOLOGY_STATS_URL . 'assets/js/tracker.js');

        $params = array(
            Hits::$rest_hits_key => 'yes',
        );

        /**
         * Merge parameters
         */
        $params = array_merge($params, Helper::getHitsDefaultParams());

        /**
         * Build request URL
         */
        $hitRequestUrl        = add_query_arg($params, get_rest_url(null, RestAPI::$namespace . '/' . Api\v2\Hit::$endpoint));
        $keepOnlineRequestUrl = add_query_arg($params, get_rest_url(null, RestAPI::$namespace . '/' . Api\v2\CheckUserOnline::$endpoint));

        $jsArgs = array(
            'hitRequestUrl'        => $hitRequestUrl,
            'keepOnlineRequestUrl' => $keepOnlineRequestUrl,
            'option'               => [
                'dntEnabled'         => Option::get('do_not_track'),
                'cacheCompatibility' => Option::get('use_cache_plugin')
            ],
        );

        wp_localize_script('rankology-stats-tracker', 'RANKOLOGY_Stats_Tracker_Object', $jsArgs);
    }

    /*
     * Print out the Rankology Stats HTML comment
     */
    public function print_out_plugin_html()
    {
        if (apply_filters('rankology_stats_html_comment', true)) {
            echo '<!-- Analytics by Rankology Stats v' . RANKOLOGY_STATS_VERSION . ' - ' . RANKOLOGY_STATS_SITE . ' -->' . "\n";
        }
    }

    /**
     * Show Hits in After WordPress the_content
     *
     * @param $content
     * @return string
     */
    public function show_hits($content)
    {

        // Get post ID
        $post_id = get_the_ID();

        // Check post ID
        if (!$post_id) {
            return $content;
        }

        // Get post hits
        $hits      = rankology_stats_pages('total', "", $post_id);
        $hits_html = '<p>' . sprintf(__('Traffic: %s', 'rankology-stats'), $hits) . '</p>';

        // Check hits position
        if (Option::get('display_hits_position') == 'before_content') {
            return $hits_html . $content;
        } elseif (Option::get('display_hits_position') == 'after_content') {
            return $content . $hits_html;
        } else {
            return $content;
        }
    }
}

new Frontend;
