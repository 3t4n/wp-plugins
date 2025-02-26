<?php
/**
 * Shortcode to display the import slider form on any page.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

function mega_slider_import_shortcode() {
    ob_start();
    ?>
    <div class="mega-import-form">
        <h2><?php esc_html_e('Import Sliders', 'mega-blocks'); ?></h2>
        <form method="post" enctype="multipart/form-data">
            <?php wp_nonce_field('mega_slider_import_frontend', 'mega_slider_frontend_nonce'); ?>
            <p><?php esc_html_e('Upload a JSON file to import sliders.', 'mega-blocks'); ?></p>
            <input type="file" name="mega_slider_import_file" />
            <input type="submit" name="mega_import_sliders_frontend" class="button button-primary" value="<?php esc_html_e('Import Sliders', 'mega-blocks'); ?>" />
        </form>
    </div>
    <?php

    if (isset($_POST['mega_import_sliders_frontend']) && check_admin_referer('mega_slider_import_frontend', 'mega_slider_frontend_nonce')) {
        if (!empty($_FILES['mega_slider_import_file']['tmp_name'])) {
            $import_data = file_get_contents($_FILES['mega_slider_import_file']['tmp_name']);
            $slider_data = json_decode($import_data, true);

            if ($slider_data) {
                foreach ($slider_data as $slider) {
                    // Insert the slider as a block into post_content
                    $block_content = sprintf(
                        '<!-- wp:mega/slider-block {"heading":"%s","content":"%s","backgroundImage":"%s"} /-->',
                        esc_js($slider['title']),
                        esc_js($slider['content']),
                        esc_url($slider['meta']['background_image'][0])
                    );

                    $post_id = wp_insert_post(array(
                        'post_title' => sanitize_text_field($slider['title']),
                        'post_content' => $block_content,
                        'post_type' => 'mega_slider',
                        'post_status' => 'publish'
                    ));

                    foreach ($slider['meta'] as $key => $value) {
                        update_post_meta($post_id, sanitize_key($key), maybe_unserialize($value[0]));
                    }
                }

                echo '<div class="updated notice"><p>' . esc_html__('Sliders imported successfully!', 'mega-blocks') . '</p></div>';
            }
        } else {
            echo '<div class="error notice"><p>' . esc_html__('Please upload a valid JSON file.', 'mega-blocks') . '</p></div>';
        }
    }

    return ob_get_clean();
}
add_shortcode('mega_import_slider', 'mega_slider_import_shortcode');
