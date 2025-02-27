<?php
/*
Plugin Name: Contact Form 7 Shortcode Enabler 
Plugin URI: https://wordpress.org/plugins/contact-form-7-shortcode-enabler/
Description: This plugin enables the usage of external shortcodes inside Contact Form 7 forms.
Version: 2.0
Author: Tobias Zimpel (TZ Media)
Author URI: http://www.tobias-zimpel.de/
License: GPLv2 or later.
*/

namespace TZMedia\WPCFf7ShortcodeEnabler;

class ShortcodeEnabler {
    const CF7_PLUGIN_BASENAME = 'contact-form-7/wp-contact-form-7.php';

    public function init()
    {
        register_activation_hook(__FILE__, [$this, 'activationCheck']);
        add_filter('wpcf7_form_elements', [$this, 'doShortcode']);
    }

    public function activationCheck()
    {
        if (! $this->isActivationPossible()) {
            wp_die(
                'Sorry, but this plugin requires the '
                . '<a href="https://wordpress.org/plugins/contact-form-7/">Contact Form 7</a> '
                . 'Plugin to be installed and active. <br><a href="'
                . admin_url( 'plugins.php' ) . '">&laquo; Return to Plugins</a>'

            );
        }
    }

    private function isActivationPossible() {
        return is_plugin_active( self::CF7_PLUGIN_BASENAME )
            && current_user_can( 'activate_plugins' );
    }

    public function doShortcode($content)
    {
        return do_shortcode($content);
    }
}

(new ShortcodeEnabler())->init();
