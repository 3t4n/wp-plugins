<?php
/**
 * Activate class
 *
 * @since 2.5.2
 */
class WCV_Activate {
    /**
     * Constructor
     *
     * @since 2.5.2
     */
    public static function activate() {
        /**
        *  Requires WooCommerce to be installed and active
        */
        if ( ! class_exists( 'WooCommerce' ) ) {
            add_action( 'admin_notices', array( self::class, 'wc_vendors_wc_missing_notice' ) );
            return;
        }
        wcvendors_add_vendor_status_meta_key();

        // Flush rewrite rules when activating plugin.
        flush_rewrite_rules();
    }

    /**
     * WooCommerce fallback notice.
     *
     * @since 2.2.2
     */
    public function wc_vendors_wc_missing_notice() {
        ?>
        <div class="error">
            <p>
                <strong>
                    <?php esc_html_e( 'WC Vendors Marketplace requires WooCommerce to run. You can download', 'wc-vendors' ); ?>
                    &nbsp;<a href="https://wordpress.org/plugins/woocommerce/" target="_blank"><?php esc_html_e( 'WooCommerce here', 'wc-vendors' ); ?></a>
                </strong>
            </p>
        </div>
        <?php
    }
}
