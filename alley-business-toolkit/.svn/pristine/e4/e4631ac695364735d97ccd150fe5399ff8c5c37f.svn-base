<?php   

add_action('save_post', 'abt_save_image_custom_fields');
function abt_save_image_custom_fields() {
    global $post;
    if(isset($_POST["abt_disclaimer"])) {
        update_post_meta($post->ID, "abt_disclaimer", sanitize_text_field($_POST["abt_disclaimer"]) );
    }
    if(isset($_POST["abt_source"])) {
        update_post_meta($post->ID, "abt_source", sanitize_text_field($_POST["abt_source"]) );
    }
    if(isset($_POST["abt_source_link"])) {
        update_post_meta($post->ID, "abt_source_link", esc_url_raw($_POST["abt_source_link"]) );
    }   
    if(isset($_POST["abt_position"])) {
        update_post_meta($post->ID, "abt_position", sanitize_text_field($_POST["abt_position"]) );
    }  

}
