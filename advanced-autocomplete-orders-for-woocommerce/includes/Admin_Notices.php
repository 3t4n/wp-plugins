<?php
/**
 * Admin_Notices Class
 *
 * @category Admin
 * @package  Optemiz\AWO
 * @author   Nazrul Islam Nayan <nazrulislamnayan7@gmail.com>
 * @license  GPL3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @since    1.0.0
 */

namespace Optemiz\AWO;

defined( 'ABSPATH' ) || exit;

/**
 * Admin_Notices class
 *
 * @class Admin_Notices The class that manages all about Admin Notices.
 *
 * @category Admin
 * @package  Optemiz\AWO
 * @author   Nazrul Islam Nayan <nazrulislamnayan7@gmail.com>
 * @license  GPL3 https://www.gnu.org/licenses/gpl-3.0.en.html
 */
class Admin_Notices {

    /**
     * Stores notices.
     *
     * @var array
     */
    private static $notices = array();

    /**
     * Class constructor
     *
     * Sets up all the appropriate hooks and functions
     * within our plugin.
     *
     * @return void
     */
    public function __construct() {
        add_action( 'admin_notices', [$this, 'review_notice'] );
        //add_action( 'admin_notices', [$this, 'discount_banner_notice'] );
        add_action( 'wp_ajax_awo_save_review_notice', [ $this, 'awo_save_review_notice' ] );
        add_action( 'wp_ajax_awo_hide_notice', [ $this, 'awo_hide_notice' ] );

        do_action( 'awo_admin_notices_loaded', $this );
    }

    /**
     * Instance.
     * 
     * The instance will be created if it does not exist yet.
     *
     * @return self The main instance.
     * @since 1.0.0
     */
    public static function instance(): self {
        static $instance = null;
        if ( is_null( $instance ) ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Display discount banner notice
     * 
     * @return void
     */
    public function discount_banner_notice() {

        if( awo_is_premium_active() ) {
            return;
        }

        if( 'yes' == get_option('awo_dismiss_discounted_notice') ) {
            return;
        }

        ?>
        <div class="ffw-notice ffw-discount-notice notice notice-info is-dismissible" style="line-height:1.5;font-size:14px;" data-which="discount">
            <a class="ffw-get-discount" href="<?php echo esc_url(AWO_PRO_URL); ?>">
                <span class="ffw-get-discount-button"><?php esc_html_e('Buy Now', 'advanced-autocomplete-woocommerce-orders'); ?></span>
            </a>
        </div>
        <?php
    }

    /**
     * Display review notice
     * @global string $plugin_page
     * @return void
     */
    public function review_notice() {
        global $plugin_page;
        $nonce         = wp_create_nonce( 'awo_admin' );
        $pluginName    = sprintf( '<b>%s</b>', esc_html__( 'Happy Autocomplete WooCommerce Orders', 'advanced-autocomplete-woocommerce-orders' ) );
        $has_notice    = false;
        $user_id       = get_current_user_id();

        $next_timestamp             = get_option('awo_review_notice_next_show_time');
        $review_notice_dismissed    = get_user_meta( $user_id, 'awo_review_notice_dismissed', true );

        $count_faqs = awo_get_faqs_post_list(true);
        if( count($count_faqs) > 5 ) {
            if ( ! empty($next_timestamp) ) {
                if ( ( time() > $next_timestamp ) ) {
                    $show_notice = true;
                }else {
                    $show_notice = false;
                }
            } else {
                if ( isset($review_notice_dismissed) && ! empty($review_notice_dismissed) ) {
                    $show_notice = false;
                }else {
                    $show_notice = true;
                }
            }
        } else {
            $show_notice = false;
        }



        // Review Notice.
        if ( $show_notice ) {
            $has_notice = true;
            ?>
            <div class="ffw-notice notice notice-info is-dismissible" style="line-height:1.5;font-size:14px;" data-which="rating" data-nonce="<?php echo esc_attr( $nonce ); ?>">
                <div class="ffw-notice-content">
                    <div class="ffw-review-notice-logo"></div>
                    <div class="ffw-review-notice-right">
                        <p>
                            <?php
                            $faq_posts_count = count($count_faqs) - 1;
                            printf(
                            /* translators: 1: plugin name,2: Slightly Smiling Face (Emoji), 3: line break 'br' tag */
                                esc_html__( 'Cool! This is great that you have made %3$s+ FAQs with %1$s. Can you please take 60 seconds to leave your feedback. This encourages us to continue providing the best features for you. %2$s', 'advanced-autocomplete-woocommerce-orders' ),
                                $pluginName, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                '<span style="font-size: 14px;">🙂</span>',
                                $faq_posts_count
                            );
                            ?>
                        </p>
                        <p>
                            <a class="button button-secondary" data-response="later" href="#"><?php esc_html_e( 'Remind me later', 'advanced-autocomplete-woocommerce-orders' ); ?></a>
                            <a class="button button-secondary" data-response="done" href="#" target="_blank"><?php esc_html_e( 'I already did!', 'advanced-autocomplete-woocommerce-orders' ); ?></a>
                            <a class="button button-primary" data-response="given" href="#" target="_blank"><?php esc_html_e( 'Review Here', 'advanced-autocomplete-woocommerce-orders' ); ?></a>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }

        if ( true === $has_notice ) {
            add_action( 'admin_print_footer_scripts', function() use ( $nonce ) {
                ?>
                <script>
                    (function($){
                        "use strict";
                        $(document)
                            .on('click', '.ffw-notice a.button', function (e) {
                                e.preventDefault();
                                // noinspection ES6ConvertVarToLetConst
                                var self = $(this), notice = self.attr('data-response');
                                if ( 'given' === notice ) {
                                    window.open('https://wordpress.org/support/plugin/faq-for-woocommerce/reviews/?rate=5#new-post', '_blank');
                                }
                                self.closest(".ffw-notice").slideUp( 200, 'linear' );
                                wp.ajax.post( 'awo_save_review_notice', { nonce: '<?php echo esc_attr( $nonce ); ?>', notice: notice } );
                            })
                            .on('click', '.ffw-notice .notice-dismiss', function (e) {
                                e.preventDefault();
                                // noinspection ES6ConvertVarToLetConst
                                var self = $(this), awo_notice = self.closest('.ffw-notice'), which = awo_notice.attr('data-which');
                                wp.ajax.post( 'awo_save_review_notice', { nonce: '<?php echo esc_attr( $nonce ); ?>', notice: 'later' } );
                            });

                    })(jQuery)
                </script><?php
            }, 99 );
        }
    }

    /**
     * Show Review request admin notice
     */
    public function awo_save_review_notice() {

        // check and validate nonce.
        if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['nonce'] ) ), 'awo_admin' ) ) {
            wp_send_json_error( esc_html__( 'Invalid nonce', 'stock-alert' ) );
        }

        //check user access or not.
        if(!awo_is_user_capable()) {
            wp_send_json_error(esc_html__('Current user is not capable to perform it.', 'advanced-autocomplete-woocommerce-orders'));
            wp_die();
        }

        $review_actions = [ 'later', 'done', 'given' ];
        if ( isset( $_POST['notice'] ) && in_array( $_POST['notice'], $review_actions ) ) {
            $value  = [
                'review_notice' => sanitize_text_field( $_POST['notice'] ), //phpcs:ignore
                'updated_at'    => time(),
            ];

            if ( 'done' === $_POST['notice'] ) {
                $user_id = get_current_user_id();
                add_user_meta( $user_id, 'awo_review_notice_dismissed', true, true );
            }else {
                update_option( 'awo_review_notice_next_show_time', time() + ( DAY_IN_SECONDS * 30 ) );
            }

            update_option( 'awo_review_notice', $value );
            wp_send_json_success( $value );
            wp_die();
        }

        wp_send_json_error( esc_html__( 'Invalid Request.', 'advanced-autocomplete-woocommerce-orders' ) );
        wp_die();
    }
}
