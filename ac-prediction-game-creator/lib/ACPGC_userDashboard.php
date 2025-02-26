<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ACPGC_userDashboard
{
    function __construct()
    {
        //Register the shortcode
        add_shortcode('acpgc_user_dash', array($this, 'acpgc_user_dash_sc'));
    }



    public function acpgc_user_dash_sc($atts = [], $content = null, $tag = '')
    {

        $current_user = wp_get_current_user();
        $site_title = get_bloginfo('name');
        $user_score = get_user_meta($current_user->ID, 'acpgc_user_score', true);



        // Query to get the user's rank in the overall league table.
        $all_scores = get_users([
            'fields' => ['ID', 'meta_value'],
            'meta_key' => 'acpgc_user_score',
            'orderby' => 'meta_value_num',  // Sort by number, not string
            'order' => 'DESC'
        ]);

// Extract just the IDs into a new array
        $all_score_ids = wp_list_pluck($all_scores, 'ID');

// Find the current user's rank
        $rank = array_search($current_user->ID, $all_score_ids) + 1;

        // Add your new query here to get the next round
        $current_time = current_time('mysql');
        $args = array(
            'post_type' => 'acpgc_round',
            'posts_per_page' => 1,
            'meta_query' => array(
                array(
                    'key' => 'round_start_time',
                    'value' => $current_time,
                    'compare' => '>',
                    'type' => 'DATETIME'
                )
            ),
            'orderby' => 'meta_value',
            'order' => 'ASC'
        );

        $next_round_query = new WP_Query($args);
        $next_round = null;
        if ($next_round_query->have_posts()) {
            while ($next_round_query->have_posts()) {
                $next_round_query->the_post();
                $next_round = get_the_ID();
            }
            wp_reset_postdata();
        }

        $template = ACPGC_PLUGIN_TEMPLATE_DIR . '/user-dashboard-template.php';

        $template_vars = [
            'current_user' => $current_user,
            'site_title' => $site_title,
            'user_score' => $user_score,
            'rank' => $rank,
            'next_round' => $next_round // Pass the next round to the template
        ];

        // Include table footer template
        $output = acpgc_template_with_vars("$template", $template_vars);

        return $output;
    }
}



