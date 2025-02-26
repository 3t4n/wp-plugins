<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class DCPDUP_SEO_Metadata_Duplicate {

    public function duplicate_seo_metadata($old_post_id, $new_post_id) {
        $seo_meta_keys = array('_yoast_wpseo_title', '_yoast_wpseo_metadesc');

        foreach ($seo_meta_keys as $key) {
            $value = get_post_meta($old_post_id, $key, true);
            if ($value) {
                update_post_meta($new_post_id, $key, $value);
            }
        }
    }
}

new DCPDUP_SEO_Metadata_Duplicate();
