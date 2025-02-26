<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class DCPDUP_Custom_Field_Manager {

    public function duplicate_custom_fields($old_post_id, $new_post_id) {
        $custom_fields = get_post_custom($old_post_id);

        foreach ($custom_fields as $key => $value) {
            foreach ($value as $single_value) {
                update_post_meta($new_post_id, $key, $single_value);
            }
        }
    }
}

new DCPDUP_Custom_Field_Manager();
