<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('AltVision_Gutenberg')):

class AltVision_Gutenberg {
    public function __construct() {
        add_action('enqueue_block_editor_assets', array($this, 'enqueue_editor_assets'));
    }

    public function enqueue_editor_assets() {
        if (!is_admin()) {
            return;
        }

        wp_enqueue_script(
            'gutenberg-image-processor',
            ALTVISION_PLUGIN_URL . 'assets/js/block-extension.js',
            array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-data', 'wp-compose'),
            ALTVISION_VERSION,
            true
        );

        $script_data = array(
            'adminUrl' => admin_url('options-general.php?page=altvision')
        );

        wp_localize_script('gutenberg-image-processor', 'altVisionMedia', $script_data);
    }
}

endif;