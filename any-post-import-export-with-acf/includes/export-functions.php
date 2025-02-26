<?php
/**
 * Export post data.
 */
function apie_export_post_action() {
    // CHECK IF POST_ID AND NONCE ARE SET AND VALID
    if (!isset($_GET['post_id'], $_GET['_wpnonce']) ||
        !wp_verify_nonce(wp_unslash(sanitize_key($_GET['_wpnonce'])), 'apie_export_post') ||
        !current_user_can('edit_post', intval(wp_unslash($_GET['post_id'])))
    ) {
        wp_die('Unauthorized request');
    }

    // SANITIZE AND UNSLASH POST_ID
    $post_id = intval(wp_unslash($_GET['post_id']));
    apie_export_post($post_id);
}

/**
 * EXPORT A SPECIFIC POST'S DATA INCLUDING ACF FIELDS AND FEATURED IMAGE AS JSON.
 */
function apie_export_post($post_id) {
    // ENSURE POST EXISTS
    $post = get_post($post_id);
    if (!$post) {
        wp_die('Post not found.');
    }

    // GET ACF FIELD GROUPS FOR THE POST TYPE
    $acf_field_groups = acf_get_field_groups(['post_id' => $post->ID]);
    
    // GET ACF FIELDS DEFINITIONS
    $acf_fields = [];
    foreach ($acf_field_groups as $field_group) {
        $fields = acf_get_fields($field_group['ID']);
        foreach ($fields as $field) {
            $acf_fields[] = $field;
        }
    }

    // GET ALL TAXONOMIES
    $taxonomies = get_object_taxonomies($post->post_type, 'objects');
    $terms = [];
    foreach ($taxonomies as $taxonomy_slug => $taxonomy) {
        $terms[$taxonomy_slug] = wp_get_object_terms($post_id, $taxonomy_slug);
        // CHECK IF TERMS EXIST AND FORMAT THEM PROPERLY
        $formatted_terms = [];
        foreach ($terms[$taxonomy_slug] as $term) {
            $term_data = [
                'name' => $term->name,
                'slug' => $term->slug,
                'description' => $term->description,
            ];
            $formatted_terms[] = $term_data;
        }
        $terms[$taxonomy_slug] = $formatted_terms;
    }

    // PREPARE POST DATA
    $site_url = get_site_url();
    $post_data = [
        'ID' => $post->ID,
        'post_title' => $post->post_title,
        'post_content' => str_replace(wp_get_attachment_url(), $site_url . '/wp-content/uploads', $post->post_content),
        'post_excerpt' => str_replace(wp_get_attachment_url(), $site_url . '/wp-content/uploads', $post->post_excerpt),
        'post_status' => $post->post_status,
        'post_type' => $post->post_type,
        'meta' => get_post_meta($post->ID),
        'elementor_data' => get_post_meta($post->ID, '_elementor_data', true),
        'acf_fields' => apie_get_acf_fields($post->ID),
        'acf_field_groups' => $acf_field_groups,
        'acf_fields_definitions' => $acf_fields,
        'featured_image' => get_the_post_thumbnail_url($post->ID, 'full'),
        'terms' => $terms,
    ];

    // REPLACE URL IN CONTENT AND EXCERPT
    $post_data['post_content'] = str_replace(site_url(), $site_url, $post_data['post_content']);
    $post_data['post_excerpt'] = str_replace(site_url(), $site_url, $post_data['post_excerpt']);
    $post_data['featured_image'] = str_replace(site_url(), $site_url, $post_data['featured_image']);

    // FORMAT TERMS FOR CONSISTENCY
    foreach ($post_data['terms'] as $taxonomy_slug => &$term_list) {
        $formatted_terms = [];
        foreach ($term_list as $term) {
            $formatted_terms[] = [
                'name' => $term['name'],
                'slug' => $term['slug'],
                'description' => $term['description'],
            ];
        }
        $term_list = $formatted_terms;
    }

    // OUTPUT JSON DATA
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="exported-' . $post_id . '.json"');
    $json_data = wp_json_encode($post_data , JSON_PRETTY_PRINT);
    echo esc_html($json_data);
    exit;
}