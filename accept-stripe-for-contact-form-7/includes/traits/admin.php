<?php

namespace CF7PA_Pay_Addons\Traits;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
// Exit if accessed directly
trait Admin
{
    /**
     * Create an admin menu.
     *
     * @since 1.0.0
     */
    public function admin_menu() {
        $svg_img = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGcgY2xpcC1wYXRoPSJ1cmwoI2NsaXAwXzE4NzRfNzA1KSI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMTkuMzMzMyAySDQuNjY2NjdDMy4xOTM5MSAyIDIgMy4xOTM5MSAyIDQuNjY2NjdWMTkuMzMzM0MyIDIwLjgwNjEgMy4xOTM5MSAyMiA0LjY2NjY3IDIySDE5LjMzMzNDMjAuODA2MSAyMiAyMiAyMC44MDYxIDIyIDE5LjMzMzNWNC42NjY2N0MyMiAzLjE5MzkxIDIwLjgwNjEgMiAxOS4zMzMzIDJaTTkuNjUxMDggMTguNDQ0NFYxMy40OTQySDEyLjM5OTZDMTMuMjcwMyAxMy40OTQyIDE0LjA1IDEzLjMyMzYgMTQuNzM4OCAxMi45ODIxQzE1LjQ0MDYgMTIuNjQwNyAxNS45OTI5IDEyLjE2MDMgMTYuMzk1NyAxMS41NDA3QzE2Ljc5ODYgMTAuOTA4NSAxNyAxMC4xNjI1IDE3IDkuMzAyNjdDMTcgOC40NDI4NyAxNi43OTg2IDcuNzAzMTggMTYuMzk1NyA3LjA4MzYxQzE1Ljk5MjkgNi40NTE0IDE1LjQ0MDYgNS45NjQ2IDE0LjczODggNS42MjMyQzE0LjA1IDUuMjgxODEgMTMuMjcwMyA1LjExMTExIDEyLjM5OTYgNS4xMTExMUg5LjY1MTA4SDguOTQ5MzJIN1YxOC40NDQ0SDkuNjUxMDhaTTEyLjEyNjcgMTEuMzg5SDkuNjUxMDhWNy4yMTYzOEgxMi4xMjY3QzEyLjU0MjYgNy4yMTYzOCAxMi45MTk0IDcuMjk4NTcgMTMuMjU3MyA3LjQ2Mjk0QzEzLjU5NTIgNy42MjczMSAxMy44NjE2IDcuODY3NTYgMTQuMDU2NiA4LjE4MzY2QzE0LjI1MTQgOC40OTk3NyAxNC4zNDg5IDguODcyNzcgMTQuMzQ4OSA5LjMwMjY3QzE0LjM0ODkgOS43NDUyMyAxNC4yNTE0IDEwLjEyNDUgMTQuMDU2NiAxMC40NDA3QzEzLjg2MTYgMTAuNzQ0MSAxMy41OTUyIDEwLjk3OCAxMy4yNTczIDExLjE0MjRDMTIuOTE5NCAxMS4zMDY4IDEyLjU0MjYgMTEuMzg5IDEyLjEyNjcgMTEuMzg5Wk0xNC4yMzI0IDE4LjMxMTlDMTQuNTM1NSAxOC42MjI0IDE0LjkyNDMgMTguNzc3OCAxNS4zOTg4IDE4Ljc3NzhDMTUuODYgMTguNzc3OCAxNi4yNDIyIDE4LjYyMjQgMTYuNTQ1MyAxOC4zMTE5QzE2Ljg0ODQgMTguMDAxMyAxNyAxNy42MTk1IDE3IDE3LjE2NjdDMTcgMTYuNzEzOCAxNi44NDg0IDE2LjMzMiAxNi41NDUzIDE2LjAyMTRDMTYuMjQyMiAxNS43MTA5IDE1Ljg2IDE1LjU1NTUgMTUuMzk4OCAxNS41NTU1QzE0LjkyNDMgMTUuNTU1NSAxNC41MzU1IDE1LjcxMDkgMTQuMjMyNCAxNi4wMjE0QzEzLjkyOTMgMTYuMzMyIDEzLjc3NzggMTYuNzEzOCAxMy43Nzc4IDE3LjE2NjdDMTMuNzc3OCAxNy42MTk1IDEzLjkyOTMgMTguMDAxMyAxNC4yMzI0IDE4LjMxMTlaIiBmaWxsPSJibGFjayIvPgo8L2c+CjxkZWZzPgo8Y2xpcFBhdGggaWQ9ImNsaXAwXzE4NzRfNzA1Ij4KPHJlY3Qgd2lkdGg9IjIwIiBoZWlnaHQ9IjIwIiBmaWxsPSJ3aGl0ZSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMiAyKSIvPgo8L2NsaXBQYXRoPgo8L2RlZnM+Cjwvc3ZnPgo=';
        add_menu_page(
            __( 'Contact Pay', 'contact-form-7-stripe-addon' ),
            __( 'Contact Pay', 'contact-form-7-stripe-addon' ),
            'manage_options',
            'contact-form-7-pay-addons',
            array($this, 'admin_settings_page'),
            $svg_img,
            30
        );
    }

    /**
     * Loading all scripts
     *
     * @since 1.0.0
     */
    public function admin_enqueue_scripts( $hook ) {
        $support_pages = ['contact-form-7-pay-addons', 'wpcf7-new', 'wpcf7'];
        if ( isset( $_GET['page'] ) && in_array( $_GET['page'], $support_pages ) ) {
            wp_enqueue_script(
                'epa-tiptip',
                CF7PA_ADDONS_ASSET_URL . 'lib/js/jquery-tiptip/jquery.tipTip.js',
                array('jquery'),
                CF7PA_PLUGIN_VERSION
            );
            wp_enqueue_style( 'select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css' );
            wp_enqueue_script(
                'select2',
                'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js',
                array('jquery'),
                '4.0.13',
                true
            );
            // wp_enqueue_style('flowbite-css', 'https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css', false, null, false );
            wp_enqueue_script(
                'flowbite-js',
                'https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js',
                false,
                null,
                true
            );
            wp_enqueue_style(
                'cf7-pay-addons-admin-css',
                CF7PA_ADDONS_ASSET_URL . 'admin/css/admin.css',
                false,
                CF7PA_PLUGIN_VERSION
            );
            wp_enqueue_script(
                'cf7-pay-addons-admin-js',
                CF7PA_ADDONS_ASSET_URL . 'admin/js/admin.js',
                false,
                CF7PA_PLUGIN_VERSION
            );
            wp_localize_script( 'cf7-pay-addons-admin-js', 'cf7paSettings', array(
                'root'   => esc_url_raw( rest_url() . CF7PA_ADDONS_REST_API ),
                'nonce'  => wp_create_nonce( 'wp_rest' ),
                'locale' => get_locale(),
            ) );
        }
    }

    public function init_contact_form_checkout_setting() {
        new \CF7PA_Pay_Addons\Admin\CF7\Checkout_Redirect_Setting();
    }

    /**
     * Create settings page.
     *
     * @since 1.0.0
     */
    public function admin_settings_page() {
        require_once CF7PA_ADDONS_PATH . '/includes/admin/templates/index.php';
    }

}