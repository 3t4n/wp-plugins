<?php
add_action('save_post', 'tbtc_save_social_metabox');
function tbtc_save_social_metabox() {
    global $post;

    if(isset($_POST["tbtc_facebook_link"])) {
        update_post_meta($post->ID, "tbtc_facebook_link", esc_url_raw($_POST["tbtc_facebook_link"]) );
    }
    if(isset($_POST["tbtc_instagram_link"])) {
        update_post_meta($post->ID, "tbtc_instagram_link", esc_url_raw($_POST["tbtc_instagram_link"]) );
    }

    if(isset($_POST["tbtc_twitter_link"])) {
        update_post_meta($post->ID, "tbtc_twitter_link", esc_url_raw($_POST["tbtc_twitter_link"]) );
    }

    if(isset($_POST["tbtc_linkedIn_link"])) {
        update_post_meta($post->ID, "tbtc_linkedIn_link", esc_url_raw($_POST["tbtc_linkedIn_link"]) );
    }

    if(isset($_POST["tbtc_designation"])) {
        update_post_meta($post->ID, "tbtc_designation", sanitize_text_field($_POST["tbtc_designation"]) );
    }

    if(isset($_POST["tbtc_cta_button"])) {
        update_post_meta($post->ID, "tbtc_cta_button", sanitize_text_field($_POST["tbtc_cta_button"]) );
    }

    if(isset($_POST["tbtc_cta_link"])) {
        update_post_meta($post->ID, "tbtc_cta_link", esc_url_raw($_POST["tbtc_cta_link"]) );
    }

    if(isset($_POST["tbtc_actual_price"])) {
        update_post_meta($post->ID, "tbtc_actual_price", sanitize_text_field($_POST["tbtc_actual_price"]) );
    }

    if(isset($_POST["tbtc_sale_price"])) {
        update_post_meta($post->ID, "tbtc_sale_price", sanitize_text_field($_POST["tbtc_sale_price"]) );
    }
}