<?php
/**
 * The Template for initializing plugin with action, filter hook.
 *
 * @package Newsletter using Sendy
 */

defined( 'ABSPATH' ) || exit;


if ( ! class_exists( 'WP_Sendy_Newsletter' ) ) {

    /**
     * WP_Sendy_Newsletter class.
     */
    class WP_Sendy_Newsletter {
        /**
         * Hook in constructor
         */
        public function __construct() {

            add_shortcode( 'ajax_sendy_newsletter_form', array( $this, 'ajax_sendy_newsletter_form_view' ) );
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 15 );
            add_action( 'wp_ajax_swp_form_submit', array( $this, 'swp_ajax_form_submit' ) );
            add_action( 'wp_ajax_nopriv_swp_form_submit', array( $this, 'swp_ajax_form_submit' ) );
        }

        /**
         * Enqueue js and css
         */
        public function enqueue_scripts() {
            wp_enqueue_script( 'sendyajax', plugin_dir_url( __FILE__ ) . 'js/sendy.js', array( 'jquery' ), '1.1', true );
            wp_localize_script( 'sendyajax', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
        }

        /**
         * Add newsletter form
         */
        public function ajax_sendy_newsletter_form_view() {
            $cws_setting = get_option( 'ajax_sendy_setting' );
            if ( ( isset( $cws_setting['sendy_url'] ) && empty( $cws_setting['sendy_url'] ) ) || ( isset( $cws_setting['list_id'] ) && empty( $cws_setting['list_id'] ) ) || ( isset( $cws_setting['api_key'] ) && empty( $cws_setting['api_key'] ) ) ) {
                return;
            }
            ?>
            <form class="swp-form" action="" method="post">
                <input type="text" name="swp_name" id="swp_name" placeholder="NAME" class="field-name swp-field" >
                <input type="text" name="swp_email" id="swp_email" placeholder="EMAIL" class="field-email swp-field" >
                <input type="submit" value="SIGN UP" class="field-submit swp-field-3" >
                <div class="swp-error" style="display:none;"></div>
                <div class="swp-success" style="display:none;"></div>
            </form>
            <?php
        }

        /**
         * Send form data to sendy
         */
        public function swp_ajax_form_submit() {
            $cws_setting = get_option( 'ajax_sendy_setting' );
            $email       = ( isset( $_POST['swp_email'] ) && ! empty( $_POST['swp_email'] ) ) ? sanitize_text_field( wp_unslash( $_POST['swp_email'] ) ) : '';
            $name        = ( isset( $_POST['swp_name'] ) && ! empty( $_POST['swp_name'] ) ) ? sanitize_text_field( wp_unslash( $_POST['swp_name'] ) ) : '';
            $sendy_url   = ( isset( $cws_setting['sendy_url'] ) && ! empty( $cws_setting['sendy_url'] ) ) ? esc_url_raw( $cws_setting['sendy_url'] . '/subscribe' ) : '';
            $list        = ( isset( $cws_setting['list_id'] ) && ! empty( $cws_setting['list_id'] ) ) ? sanitize_text_field( $cws_setting['list_id'] ) : '';
            $api_key     = ( isset( $cws_setting['api_key'] ) && ! empty( $cws_setting['api_key'] ) ) ? sanitize_text_field( $cws_setting['api_key'] ) : '';

            $args = array(
                'headers' => array(
                    'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8',
                ),
                'body'    => 'name=' . $name . '&email=' . $email . '&list=' . $list . '&api_key=' . $api_key . '&boolean=true',
            );
            $response = wp_remote_post( $sendy_url, $args );
            if ( is_wp_error( $response ) ) {
                echo 'ERROR: ' . esc_attr( $response->get_error_message() );
            } else {
                if ( 1 === $response['body'] ) {
                    echo esc_html_e( 'Successfully subscribed!', 'ajax-sendy-newsletter' );
                } else {
                    echo esc_attr( $response['body'] );
                }
            }
            die;
        }
    }//end class
}//end if
