<?php
/**
 * @link https://www.invoice123.com
 * @package Saskaita123Plugin
 *
 * Class Description: S123Enqueue plugin scripts, css
 */

namespace S123\Includes\Base;

if (!defined('ABSPATH')) exit;

class S123_Enqueue extends S123_BaseController
{
    public function s123_register()
    {
        add_action('admin_enqueue_scripts', array($this, 's123_enqueue'));
        add_action('wp_enqueue_scripts', array($this, 'i123_enqueue_checkout_script'));
    }

    function s123_enqueue() {
        foreach(glob( $this->plugin_path. '/admin/css/*.css' ) as $file ) {
            $filename = substr($file, strrpos($file, '/') + 1);
            wp_enqueue_style( $filename, $this->plugin_url. 'admin/css/' . $filename);
        }

        wp_register_script(S123_BaseController::PLUGIN_NAME . '-js', $this->plugin_url . 'admin/js/s123-invoices-admin.js', array('jquery'));

        $custom = array(
            'security' => wp_create_nonce('s123_security'),
            'base_url' => admin_url('admin-ajax.php')
        );

        wp_localize_script(S123_BaseController::PLUGIN_NAME . '-js', 's123', $custom);

        wp_enqueue_script(S123_BaseController::PLUGIN_NAME . '-js');
    }

    public function i123_enqueue_checkout_script(): void
    {
        if ($this->s123_get_option('use_custom_inputs', false) === false) {
            return;
        }

        // Only enqueue script on the checkout page
        if (is_checkout() && !is_wc_endpoint_url()) {
            wp_enqueue_script(
                'i123-checkout-inputs',
                $this->plugin_url . 'admin/js/i123-checkout-inputs.js',
                array('jquery')
            );
        }
    }
}