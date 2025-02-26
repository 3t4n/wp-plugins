<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/* =========== Filter Agent =========== */
if (!function_exists('adgqs_agents_filter')) {
    function adgqs_agents_filter($args = []) {
        global $wpdb;

        // Extract meta_key, meta_value, and post_type from the $args array
        $meta_key = isset($args['meta_key']) ? $args['meta_key'] : '';
        $meta_value = isset($args['meta_value']) ? $args['meta_value'] : '';
        $post_type = isset($args['post_type']) ? $args['post_type'] : ''; // Default to 'post'

        // Return an empty array if required parameters are missing
        if (empty($meta_key) || empty($meta_value)) {
            return [];
        }

        // Prepare and execute the query
        $query = $wpdb->prepare(
            "
            SELECT DISTINCT p.post_author
            FROM {$wpdb->postmeta} pm
            INNER JOIN {$wpdb->posts} p ON pm.post_id = p.ID
            WHERE pm.meta_key = %s
            AND pm.meta_value = %s
            AND p.post_type = %s
            AND p.post_status = 'publish'
            GROUP BY p.post_author
            ",
            $meta_key,
            $meta_value,
            $post_type
        );

        // Fetch results as an array of objects
        $results = $wpdb->get_results($query);

        // Use wp_list_pluck to extract only the 'post_author' field
        $author_ids = map_deep(wp_list_pluck($results ?? [], 'post_author'), 'absint');

        // Return the array of IDs
        return $author_ids ?? [];
    }
}
