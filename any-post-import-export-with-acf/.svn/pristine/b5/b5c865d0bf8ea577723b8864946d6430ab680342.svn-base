<?php
/**
 * RECURSIVELY HANDLE ACF FIELD VALUES
 */
function apie_handle_acf_field($field_value) {
    if (is_array($field_value)) {
        if (isset($field_value['ID']) && wp_attachment_is_image($field_value['ID'])) {
            // HANDLE IMAGE FIELD
            $attachment = get_post($field_value['ID']);

            return [
                'ID' => $field_value['ID'],
                'url' => wp_get_attachment_url($field_value['ID']),
                'alt' => get_post_meta($field_value['ID'], '_wp_attachment_image_alt', true),
                'title' => $attachment->post_title,
                'caption' => $attachment->post_excerpt,
                'description' => $attachment->post_content,
            ];
        }
        elseif (isset($field_value['url']) && isset($field_value['ID']))
        {
            // HANDLE GALLERY FIELD (ARRAY OF IMAGES)
            return array_map('handle_acf_field', $field_value);
        }
        elseif (isset($field_value['ID']) && get_post_type($field_value['ID'])) 
        {
            // HANDLE POST_OBJECT FIELD
            $post = get_post($field_value['ID']);
            return [
                'ID' => $field_value['ID'],
                'title' => $post->post_title,
            ];
        }
        else 
        {
            // RECURSIVELY HANDLE NESTED ARRAYS (E.G., GROUPS, GALLERIES, REPEATERS)
            return array_map('handle_acf_field', $field_value);
        }
    }
    return $field_value;
}

/**
 * GET ALL ACF FIELDS FOR A POST
 */
function apie_get_acf_fields($post_id) {
    $fields = get_fields($post_id);
    if ($fields) {
        foreach ($fields as $field_name => $field_value) {
            $fields[$field_name] = handle_acf_field($field_value);
        }
    }
    return $fields;
}