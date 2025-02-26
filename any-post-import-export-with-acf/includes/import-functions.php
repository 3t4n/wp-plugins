<?php
/**
 * Import post data.
 */
function apie_import_post_action() {

    // CHECK NONCE AND PERMISSIONS
    $nonce = isset($_POST['_wpnonce']) ? sanitize_key($_POST['_wpnonce']) : '';
    if (!current_user_can('edit_posts') || !wp_verify_nonce($nonce, 'apie_import_post')) {
        wp_die('Unauthorized request');
    }

    // CHECK IF A FILE IS UPLOADED
    if (!empty($_FILES['import_file']['tmp_name'])) {
        $file_tmp_name = wp_unslash($_FILES['import_file']['tmp_name']);
        $json_data = file_get_contents($file_tmp_name);

        // SANITIZE THE JSON DATA
        $post_data = json_decode($json_data, true);

        if (!isset($post_data['post_type'])) {
            // DEFAULT FALLBACK
            $post_data['post_type'] = 'post';
        }

        apie_import_post($json_data);

        $redirect_url = ($post_data['post_type'] === 'page') ? admin_url('edit.php?post_type=page') : admin_url('edit.php');
        wp_redirect($redirect_url);
        exit;
    }

    wp_redirect(admin_url('edit.php'));
    exit;
}

/**
 * IMPORT POST DATA FROM A JSON STRING AND HANDLE ACF FIELDS AND OTHER POST DATA.
 */
function apie_import_post($json_data) {
    $post_data = json_decode($json_data, true);

    // EXIT IF JSON DATA IS INVALID
    if (!$post_data) {
        return;
    }

    // CHECK FOR ACF FIELD GROUPS AND DEFINITIONS
    if (isset($post_data['acf_field_groups']) && isset($post_data['acf_fields_definitions'])) {
        // EXCLUDE 'ID' FROM FIELDS ARRAY
        apie_remove_IdFields($post_data['acf_fields_definitions']);
        
        $post_type = isset($post_data['post_type']) ? $post_data['post_type'] : 'post';
        $post_title = $post_data['post_title'];
        
        // CREATE A NEW POST
        $new_post_id = wp_insert_post([
            'post_title' => wp_strip_all_tags( $post_title ),
            'post_content' => $post_data['post_content'],
            'post_excerpt' => $post_data['post_excerpt'],
            'post_status' => $post_data['post_status'],
            'post_type' => $post_type, // SET POST TYPE DYNAMICALLY
            'post_author' => get_current_user_id(),
        ]);

        // CHECK IF NEW_POST_ID IS VALID
        if (is_wp_error($new_post_id)) {
            return;
        }

        // STORE OLD-TO-NEW POST ID MAPPING
        $post_id_map = [
            $post_data['ID'] => $new_post_id
        ];

        // IMPORT ACF FIELD GROUPS
        foreach ($post_data['acf_field_groups'] as $group) {
            // CHECK IF ACF FIELD GROUP ALREADY EXISTS
            $existing_group = acf_get_field_group($group['key']);

            if ($existing_group) {
                acf_delete_field_group($group['key']);
            }    

            // CREATE NEW ACF FIELD GROUP WITH LOCATION ASSIGNED TO THE NEW POST
            $group_id = acf_import_field_group([
                'key' => $group['key'],
                'title' => $group['title'],
                'fields' => $post_data['acf_fields_definitions'],
                'location' => [
                    [
                        [
                            'param' => $post_type, // SET LOCATION PARAMETER TO POST
                            'operator' => '==',
                            'value' => $new_post_id, // ASSIGN LOCATION TO THE NEW POST ID
                        ],
                    ],
                ],
                'menu_order' => $group['menu_order'],
                'position' => $group['position'],
                'style' => $group['style'],
                'label_placement' => $group['label_placement'],
                'instruction_placement' => $group['instruction_placement'],
                'hide_on_screen' => $group['hide_on_screen'],
                'active' => $group['active'],
                'description' => $group['description'],
            ]);
        }
    }

    // UPDATE POST META
    if (isset($post_data['meta'])) {
        foreach ($post_data['meta'] as $key => $value) 
        {
            update_post_meta($new_post_id, $key, maybe_unserialize($value[0]));
        }
    }
    
    // UPDATE ELEMENTOR DATA
    if (isset($post_data['elementor_data'])) {
        update_post_meta($new_post_id, '_elementor_data', maybe_unserialize($post_data['elementor_data']));
    }

    // UPDATE ACF FIELDS
    if (isset($post_data['acf_fields'])) {
        foreach ($post_data['acf_fields'] as $key => $value) {
            // RETRIEVE FIELD OBJECT TO DETERMINE ITS TYPE
            $field = get_field_object($key, $new_post_id);
            if ($field) {
                $field_type = $field['type'];
                
                switch ($field_type) {
                    case 'taxonomy':
                        $taxonomy = $field['taxonomy'];
                        $terms = [];

                        foreach ($value as $term_data) {
                            $term_id = null;
                            $term_name = isset($term_data['name']) ? $term_data['name'] : '';
                            $term_slug = isset($term_data['slug']) ? $term_data['slug'] : '';

                            if ($term_slug) {
                                $term = get_term_by('slug', $term_slug, $taxonomy);
                            }

                            if (!$term && $term_name) {
                                $term = get_term_by('name', $term_name, $taxonomy);
                            }

                            if ($term) {
                                $term_id = $term->term_id;
                            } else {
                                $new_term = wp_insert_term($term_name, $taxonomy, ['slug' => $term_slug]);
                                if (!is_wp_error($new_term)) {
                                    $term_id = $new_term['term_id'];
                                }
                            }
                            if ($term_id) {
                                $terms[] = $term_id;
                            }
                        }

                        update_field($key, $terms, $new_post_id);
                        break;

                    case 'link':
                        $link_data = is_array($value) ? $value : ['url' => $value, 'title' => '', 'target' => '_self'];
                        update_field($key, $link_data, $new_post_id);
                        break;

                    case 'oembed':
                        $value = apie_youtube_clean_url($value);
                        if (preg_match('/<iframe[^>]+src="([^"]+)"/', $value, $match)) {
                            $url = apie_youtube_clean_url($match[1]);
                            update_field($key, $url, $new_post_id);
                        } else {
                            update_field($key, $value, $new_post_id);
                        }
                        break;

                    case 'gallery':
                        $image_ids = [];
                        
                        // If the value is an array (multiple images)
                        if (is_array($value)) {
                            foreach ($value as $image) {
                                // Get the image URL from the array
                                $url = isset($image['url']) ? $image['url'] : null;
                                
                                // If the URL is valid, upload the image and get the attachment ID
                                if ($url) {
                                    $attachment_id = apie_image_upload_and_get_id($url);
                                    if ($attachment_id) {
                                        $image_ids[] = $attachment_id; // Add the attachment ID to the image_ids array
                                    }
                                }
                            }
                        } else {
                            // If it's a single image URL
                            $attachment_id = apie_image_upload_and_get_id($value);
                            if ($attachment_id) {
                                $image_ids[] = $attachment_id; // Add the attachment ID to the image_ids array
                            }
                        }

                        // Update the ACF field with the array of image IDs
                        if (!empty($image_ids)) {
                            update_field($key, $image_ids, $new_post_id);
                        } 
                        break;


                    case 'image':
                        // Check if the value is an array and contains a 'url' key
                        $image_url = isset($value['url']) ? $value['url'] : (is_string($value) ? $value : null);

                        if ($image_url) {
                            // Check if the image already exists in the media library
                            $attachment_id = attachment_url_to_postid($image_url);
                            
                            if ($attachment_id) {
                                // If the image already exists, use the existing attachment ID
                                update_field($key, $attachment_id, $new_post_id);
                            } else {
                                // If the image does not exist, download and upload the image
                                $attachment_id = apie_image_upload_and_get_id($image_url);
                                
                                if ($attachment_id) {
                                    // Update the post with the new attachment ID
                                    update_field($key, $attachment_id, $new_post_id);
                                } 
                            }
                        } 
                        break;

                    case 'post_object':
                        $post_title = isset($value['post_title']) ? $value['post_title'] : '';
                        $field_post_type = isset($value['post_type']) ? $value['post_type'] : 'post';

                        if ($post_title) {
                            $query = new WP_Query([
                                'post_type' => $field_post_type,
                                'title' => $post_title,
                                'posts_per_page' => 1,
                            ]);

                            if ($query->have_posts()) {
                                $imported_post = $query->post;
                                update_field($key, $imported_post->ID, $new_post_id);
                            }
                        }
                        break;

                    case 'relationship':
                        $post_ids = [];
                        foreach ($value as $item) {
                            $post_type = isset($item['post_type']) ? $item['post_type'] : 'post';
                            $title = isset($item['post_title']) ? $item['post_title'] : '';
                            $slug = isset($item['post_name']) ? $item['post_name'] : '';

                            if ($title) {
                                $query = new WP_Query([
                                    'post_type' => $post_type,
                                    'title' => $title,
                                    'posts_per_page' => 1,
                                    'fields' => 'ids',
                                ]);

                                if ($query->have_posts()) {
                                    $post_ids[] = $query->posts[0];
                                }
                            } elseif ($slug) {
                                $post = get_page_by_path($slug, OBJECT, $post_type);
                                if ($post) {
                                    $post_ids[] = $post->ID;
                                }
                            }
                        }
                        if (!empty($post_ids)) {
                            update_field($key, $post_ids, $new_post_id);
                        } else {
                            update_field($key, [], $new_post_id);
                        }
                        break;

                    case 'file':
                        $attachment_id = null;

                        if (is_array($value)) {
                            if (isset($value['url'])) {
                                $attachment_id = apie_file_upload_and_get_id($value['url']);
                            }
                        } else {
                            $attachment_id = apie_file_upload_and_get_id($value);
                        }

                        if ($attachment_id) {
                            update_field($key, $attachment_id, $new_post_id);
                        } 
                        break;

                    case 'group':
                    case 'repeater':
                        update_field($key, apie_process_acf_field_values($value), $new_post_id);
                        break;

                    default:
                        update_field($key, $value, $new_post_id);
                        break;
                }
               // die();
            }
        }
    }

    // UPDATE FEATURED IMAGE
    if (isset($post_data['featured_image'])) {
        $image_url = $post_data['featured_image'];

        if (!empty($image_url)) {
            // Get the image ID from the media library if it exists
            $image_id = attachment_url_to_postid($image_url);

            if (!$image_id) {
                // Image doesn't exist in the media library, so download and upload it
                // Prepare the image for upload (download the image from the URL)
                $tmp_image = download_url($image_url); // Downloads the image to a temp location

                // Check if the download was successful
                if (is_wp_error($tmp_image)) {
                    return;
                }

                // Prepare the image data for media_handle_sideload()
                $file_array = [
                    'name'     => basename($image_url), // Extract the image name from the URL
                    'tmp_name' => $tmp_image,           // Temporary file path of the downloaded image
                ];

                // Use media_handle_sideload to upload the image to the media library
                $image_id = media_handle_sideload($file_array, $new_post_id);

                // Check for errors in the sideloading process
                if (is_wp_error($image_id)) {
                    wp_delete_file($tmp_image); // Delete the temp file on failure
                    return;
                }
            }

            // Set the featured image for the new post
            set_post_thumbnail($new_post_id, $image_id);
        }
    }
    
    // UPDATE TAXONOMIES
    if (isset($post_data['terms'])) {
        foreach ($post_data['terms'] as $taxonomy_slug => $terms) {
            foreach ($terms as $term) {
                $existing_term = get_term_by('slug', $term['slug'], $taxonomy_slug);
                if (!$existing_term) {
                    $new_term = wp_insert_term($term['name'], $taxonomy_slug, [
                        'slug' => $term['slug'],
                        'description' => $term['description'],
                    ]);
                    if (!is_wp_error($new_term)) {
                        wp_set_object_terms($new_post_id, $term['slug'], $taxonomy_slug, true);
                    }
                }
                else {
                    wp_set_object_terms($new_post_id, $term['slug'], $taxonomy_slug, true);
                }
            }
        }
    }
}