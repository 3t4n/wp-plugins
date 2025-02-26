<?php
add_action('create_term', 'rankology_append_term_name_desc_in_metafields', 10, 3);

function rankology_append_term_name_desc_in_metafields($term_id, $tt_id, $taxonomy)
{
    // List of taxonomies to target
    $target_taxonomies = ['category', 'product_cat'];

    // Only proceed if the taxonomy is in the target list
    if (in_array($taxonomy, $target_taxonomies, true)) {
        // Get the term object
        $term = get_term($term_id, $taxonomy);

        if (!is_wp_error($term)) {
            // Optionally modify the term's name (e.g., append "Test" to the name)
            $new_name = $term->name;

            // Update the term with the modified name
            wp_update_term($term_id, $taxonomy, [
                'name' => $new_name,
            ]);

            // Update custom term meta
            $meta_key = '_rankology_titles_title_ct';
            $meta_keyt = 'title';
            $meta_keyft = '_rankology_titles_title';
            $meta_value = $new_name; // Use the modified name for the meta value

            // Update or add the meta key with the modified name
            if (get_term_meta($term_id, $meta_key, true)) {
                update_term_meta($term_id, $meta_key, $meta_value);
            } else {
                add_term_meta($term_id, $meta_key, $meta_value, true);
            }

            if (get_term_meta($term_id, $meta_keyt, true)) {
                update_term_meta($term_id, $meta_keyt, $meta_value);
            } else {
                add_term_meta($term_id, $meta_keyt, $meta_value, true);
            }
            if (get_term_meta($term_id, $meta_keyft, true)) {
                update_term_meta($term_id, $meta_keyft, $meta_value);
            } else {
                add_term_meta($term_id, $meta_keyft, $meta_value, true);
            }


            $user_description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

            if (!empty($user_description)) {
                // Update the term meta with the user-provided description
                $meta_key = '_rankology_titles_desc_ct';
                $meta_keydd = 'rankology_titles_desc';

               $meta_keyd ='analyzed_content';
               

                if (get_term_meta($term_id, $meta_key, true)) {
                    update_term_meta($term_id, $meta_key, $user_description);
                } else {
                    add_term_meta($term_id, $meta_key, $user_description, true);
                }
                if (get_term_meta($term_id, $meta_keyd, true)) {
                    update_term_meta($term_id, $meta_keyd, $user_description);
                } else {
                    add_term_meta($term_id, $meta_keyd, $user_description, true);
                }
                if (get_term_meta($term_id, $meta_keydd, true)) {
                    update_term_meta($term_id, $meta_keydd, $user_description);
                } else {
                    add_term_meta($term_id, $meta_keydd, $user_description, true);
                }
            }


        }
    }
}


add_action('create_term', 'rankology_add_title_description_for_metatags', 10, 3);

function rankology_add_title_description_for_metatags($term_id, $tt_id, $taxonomy)
{
    // List of target taxonomies (default tags and WooCommerce tags)
    $target_taxonomies = ['post_tag', 'product_tag'];

    // Proceed only for the target taxonomies
    if (in_array($taxonomy, $target_taxonomies, true)) {
        // Get the term object
        $term = get_term($term_id, $taxonomy);

        if (!is_wp_error($term)) {

            $tag_name = $term->name;

            // Add or update the term meta with the tag name
            $meta_key = '_rankology_titles_title_ct';

            if (get_term_meta($term_id, $meta_key, true)) {
                update_term_meta($term_id, $meta_key, $tag_name);
            } else {
                add_term_meta($term_id, $meta_key, $tag_name, true);
            }

            // Get the term description
            $term_description = $term->description;

            if (!empty($term_description)) {
                // Add or update the term meta with the description
                $meta_key = '_rankology_titles_desc_ct';

                if (get_term_meta($term_id, $meta_key, true)) {
                    update_term_meta($term_id, $meta_key, $term_description);
                } else {
                    add_term_meta($term_id, $meta_key, $term_description, true);
                }
            }
        }
    }
}



// function add_description_to_meta_for_tags($term_id, $tt_id, $taxonomy) {

//     $target_taxonomies = ['post_tag', 'product_tag'];

//     if (in_array($taxonomy, $target_taxonomies, true)) {

//     // Get the term object for the newly created tag
//     $term = get_term($term_id, $taxonomy);

//     if (!is_wp_error($term)) {
//         // Get the tag name
//      $tag_name = $term->name;

// Add or update the term meta with the tag name
// $meta_key = '_rankology_titles_title_ct';

// if (get_term_meta($term_id, $meta_key, true)) {
//     update_term_meta($term_id, $meta_key, $tag_name);
// } else {
//     add_term_meta($term_id, $meta_key, $tag_name, true);
// }

//         $tag_description = $term->description;

//         if (!empty($tag_description)) {
//             // Add or update the term meta with the tag description
//             $meta_key = '_rankology_titles_desc_ct';

//             if (get_term_meta($term_id, $meta_key, true)) {
//                 update_term_meta($term_id, $meta_key, $tag_description);
//             } else {
//                 add_term_meta($term_id, $meta_key, $tag_description, true);
//             }
//         }
//         }
//     }
// }
