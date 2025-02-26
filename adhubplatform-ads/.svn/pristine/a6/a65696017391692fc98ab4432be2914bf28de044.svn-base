<?php
/**
 * Class AdhubPlatform_Loader
 * 
 * Classe principale per il caricamento del plugin
 * 
 * @package AdhubPlatform
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class AdhubPlatform_Loader {
    private $admin;
    private $frontend;
    private $options;
    private $shortcodes;

    public function __construct() {
        $this->options = new AdhubPlatform_Options();
        
        if (is_admin()) {
            $this->admin = new AdhubPlatform_Admin($this->options);
        }
        
        if (!is_admin()) {
            $this->frontend = new AdhubPlatform_Frontend($this->options);
        }
    }

    public function run() {
        add_action('init', array($this, 'load_textdomain'));
        
        if (is_admin()) {
            $this->admin->init();
        } else {
            $this->frontend->init();
        }

        $this->shortcodes = new AdhubPlatform_Shortcodes($this->options);
        
        global $adhub_platform_shortcodes;
        $adhub_platform_shortcodes = $this->shortcodes;
    }

    public function load_textdomain() {
        load_plugin_textdomain(
            'adhubplatform-ads',
            false,
            dirname(ADHUB_PLATFORM_BASENAME) . '/languages/'
        );
    }
}