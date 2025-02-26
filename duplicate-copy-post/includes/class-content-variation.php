<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class DCPDUP_Content_Variation {

    public function __construct() {
        add_action('DCPDUP_after_post_duplicate', array($this, 'apply_content_variation'), 10, 2);
    }

    // Apply content variation after post duplication
    public function apply_content_variation($old_post_id, $new_post_id) {
        $new_post = get_post($new_post_id);

        if (!$new_post || $new_post->post_status != 'draft') {
            return;
        }

        // Modify the post content to apply a variation
        $new_content = $this->generate_content_variation($new_post->post_content);
        wp_update_post(array(
            'ID' => $new_post_id,
            'post_content' => $new_content
        ));
    }

    // Generate content variations (dummy implementation for now, could be replaced by AI)
    private function generate_content_variation($content) {
        // In the real implementation, this could use AI or NLP tools to vary the content.
        // For now, we will just append a string to simulate the variation.
        //$variation_text = "\n\n[This is a content variation applied to the duplicated post.]";
        $variation_text = "";
        return $content . $variation_text;
    }
}

new DCPDUP_Content_Variation();
