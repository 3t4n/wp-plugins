<?php
/**
 * CLEAN AND STANDARDIZE YOUTUBE URLS.
 */
function apie_youtube_clean_url($url) {
    // CHECK IF THE URL IS ALREADY CLEAN
    if (strpos($url, 'youtube.com/embed/') !== false) {
        // EXTRACT VIDEO ID FROM EMBED URL
        preg_match('/youtube\.com\/embed\/([^?&"]+)/', $url, $matches);
        if (!empty($matches[1])) {
            return 'https://youtu.be/' . $matches[1];
        }
    }

    // REMOVE ANY UNWANTED QUERY PARAMETERS FROM THE URL
    $parsed_url = wp_parse_url($url);
    if (isset($parsed_url['query'])) {
        parse_str($parsed_url['query'], $query_params);
        unset($query_params['feature']);
        $clean_query = http_build_query($query_params);
        $clean_url = isset($parsed_url['scheme']) ? "{$parsed_url['scheme']}://" : '';
        $clean_url .= isset($parsed_url['host']) ? "{$parsed_url['host']}" : '';
        $clean_url .= isset($parsed_url['path']) ? "{$parsed_url['path']}" : '';
        $clean_url .= $clean_query ? "?{$clean_query}" : '';
        return $clean_url;
    }
    return $url;
}

/**
 * PROCESS ACF FIELD VALUES TO HANDLE GALLERY IMAGE UPLOADS AND NESTED FIELDS.
 */
function apie_process_acf_field_values($values) {
    $processed_values = [];

    foreach ($values as $key => $value) {
        if (is_array($value)) {
            if (isset($value[0]['url'])) {
                // HANDLE GALLERY FIELDS
                $image_ids = [];
                foreach ($value as $image) {
                    $attachment_id = image_upload_and_get_id($image['url']);
                    if ($attachment_id) {
                        $image_ids[] = $attachment_id;
                    }
                }
                $processed_values[$key] = $image_ids;
            }
            elseif (isset($value['url'])) {
                // HANDLE SINGLE IMAGE FIELDS
                $attachment_id = image_upload_and_get_id($value['url']);
                $processed_values[$key] = $attachment_id;
            }
            elseif (isset($value['url']) && $value['type'] == 'image') {
                // HANDLE NESTED SINGLE IMAGE FIELDS
                $attachment_id = image_upload_and_get_id($value['url']);
                $processed_values[$key] = $attachment_id;
            } 
            elseif (is_array($value)) {
                // RECURSIVELY PROCESS NESTED FIELDS
                $processed_values[$key] = apie_process_acf_field_values($value);
            }
            else {
                // RECURSIVELY PROCESS NESTED FIELDS
                $processed_values[$key] = apie_process_acf_field_values($value);
            }
        }
        else {
            // DIRECTLY ASSIGN OTHER VALUES
            $processed_values[$key] = $value;
        }
    }
    return $processed_values;
}

/**
 * Recursively removes 'ID' fields from a nested array.
 */
function apie_remove_IdFields(&$array) {
    foreach ($array as &$item) {
        if (is_array($item)) {
            // REMOVE 'ID' FIELD IF PRESENT
            if (isset($item['ID'])) {
                unset($item['ID']);
            }
            // RECURSIVELY PROCESS NESTED ARRAYS
            apie_remove_IdFields($item);
        }
    }
    return;
}