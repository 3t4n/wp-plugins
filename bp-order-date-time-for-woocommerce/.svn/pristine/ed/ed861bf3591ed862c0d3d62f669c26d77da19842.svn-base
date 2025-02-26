<?php
/**
 * @package BP Delivery For Woocommerce
 */

namespace Bright_Delivery_for_Woocommerce\Base;

use Bright_Delivery_for_Woocommerce\Bootstrap;

class SettingsLink extends BaseController {

    const SUPPORT_LINK = 'https://brightplugins.com/support/';

    /**
     * Registers the plugin links of options
     *
     * @access public
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function register() {

      add_filter( "plugin_action_links_" . self::$PLUGIN_FULL_NAME, [$this, 'add_settings_links'] );
      add_filter( 'plugin_row_meta', [$this, 'plugin_row_meta'], 10, 2 );
    }

    /**
     * Show row meta on the plugin screen.
     *
     * @access public
     *
     * @since 1.0.0
     *
     * @param  mixed   $links Plugin Row Meta.
     * @param  mixed   $file  Plugin Base file.
     * @return array
     */
    public static function plugin_row_meta( $links, $file ) {

        if ( BaseController::$PLUGIN_FULL_NAME === $file ) {

            $links[] = '<a style="color:red;" target="_blank" href="' . self::SUPPORT_LINK . '">' . esc_html__( 'Support', 'wc-wdda-delivery-timeslots' ) . '</a>';
        }

        return (array) $links;
    }

    /**
     * Added the links established in the function
     *
     * @access public
     *
     * @since 1.0.0
     *
     * @param  array $links links already established by the core wordpress
     * @return array $links new setting the links established
     */
    public function add_settings_links( $links ) {

        $settings_link = '<a href="' . admin_url() . 'admin.php?page=wc-wdda-delivery-timeslots' . '">' . __( 'Settings', 'wc-wdda-delivery-timeslots' ) . "</a>";
        array_push( $links, $settings_link );

        return $links;
    }

}
