<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('AltVision_Loader')):

class AltVision_Loader {
    public function run() {
        // Load dependencies
        require_once ALTVISION_PLUGIN_DIR . 'includes/class-altvision-api.php';
        require_once ALTVISION_PLUGIN_DIR . 'includes/class-altvision-gutenberg.php';
        require_once ALTVISION_PLUGIN_DIR . 'includes/class-altvision-media.php';
        require_once ALTVISION_PLUGIN_DIR . 'admin/class-altvision-admin.php';
        require_once ALTVISION_PLUGIN_DIR . 'includes/class-altvision-subscription-handler.php';

        // Initialize components
        new AltVision_API();
        new AltVision_Gutenberg();
        new AltVision_Media();
        new AltVision_Admin();
        new AltVision_Subscription_Handler();
    }
}

endif;