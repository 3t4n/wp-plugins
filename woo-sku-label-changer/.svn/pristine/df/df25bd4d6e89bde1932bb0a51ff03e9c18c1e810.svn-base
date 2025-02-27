<?php

/**
 *
 * @link              https://nervythemes.com/
 * @since             3.0.5
 * @package           SKU Label Changer For WooCommerce
 *
 * @wordpress-plugin
 * Plugin Name:       SKU Label Changer For WooCommerce
 * Plugin URI:        https://nervythemes.com/
 * Description:       A Simple Plugin to change WooCommerce SKU Label to ISBN or any other custom text. Compatible with Latest WooCommerce and Popular Page Builders also.
 * Version:           3.0.5
 * Author:            NervyThemes
 * Author URI:        https://nervythemes.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wcsku-label
 * Tested up to:      6.5.4
 */

        require __DIR__ . '/library/vendor/autoload.php';
        require_once __DIR__ . '/admin.php';

    // Here is the main function to change the SKU Label

        function wcsku_label_change ($sku_label, $text, $doamin) {
            $wcsku_options = json_decode(stripslashes(get_option('wcsku_options')));
            $wcsku_value = get_option('wcsku_text');

            if ( isset($wcsku_options->isEnabled) && 'Disable' === $wcsku_options->isEnabled){
                return $sku_label;
            }
            else{
                if($domain = 'woocommerce') {
                    switch ($sku_label) {
                        case 'SKU':
                            $sku_label = $wcsku_value;
                        break;
                        case 'SKU:':
                            $sku_label = $wcsku_value.":";
                        break;
                    }
                    return $sku_label;
                }
            }

        }

    add_filter('gettext', 'wcsku_label_change', 20, 3);


?>
