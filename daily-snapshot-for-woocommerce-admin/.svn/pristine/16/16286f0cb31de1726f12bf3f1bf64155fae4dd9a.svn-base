<?php
/**
 * Plugin bootstrap.
 *
 */

defined( 'ABSPATH' ) || exit;

/**
 * MWB_DSS_WC_Admin class.
 */
class MWB_DSS_WC_Admin {

	/**
	 * init the working of the plugin
	 */
	public function __construct() {
        
        add_filter( 'woocommerce_settings_tabs_array', array( &$this, 'mwb_dss_settings_tab' ), 50 );
        add_action( 'woocommerce_settings_tabs_mwb_dss_wc_admin', array( &$this, 'mwb_dss_settings_tab_options' ) );
        add_action( 'woocommerce_update_options_mwb_dss_wc_admin', array( &$this, 'mwb_dss_settings_update_options' ) );
        add_action( 'mwb_dss_wc_admin_schedule', array( &$this, 'send_report_daily_cron' ) );
        add_action( 'mwb_dss_wc_admin_report_status_schedule', array( &$this, 'update_daily_report_status' ) );
    }	

    /**
        * add daily snapshot tab under woocommerce settings
        * @param array $settings_tabs array of the existing tabs
        * @return array settings_tabs
    */
    public function mwb_dss_settings_tab( $settings_tabs ) {

        $settings_tabs['mwb_dss_wc_admin'] = __( 'Daily Snapshot', 'mwb-dailyss' );
        return $settings_tabs;
    }

    /**
     * render the settings/html for the plugin page
     */
    public function mwb_dss_settings_tab_options() { 

        $this->send_test_email();

        //$this->mwb_dss_show_get_report_data( 'show' );
        woocommerce_admin_fields( $this->mwb_dss_get_admin_settings() );

        ?>

        <!-- Send test Report html -->
        <table class="form-table">
            <tbody>

                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label><?php esc_html_e( 'Last Report status', 'mwb-dailyss' ) ?></label>

                        <?php 

                        $attribute_description = esc_html__( 'Today\'s Report Mail status that whether it was sent or not.', 'mwb-dailyss' );
                        echo wc_help_tip( $attribute_description ); 

                        ?>
                    </th>
                    <td class="forminp forminp-text">

                        <?php 

                        $last_report_status = get_option( 'mwb_dailyss_daily_report_status' );

                        ?>

                        <?php if( true == $last_report_status ): ?>

                            <p class="description"><?php esc_html_e( 'Sent Successfully', 'mwb-dailyss' ) ?></p>

                        <?php else: ?>

                            <p class="description"><?php esc_html_e( 'Pending', 'mwb-dailyss' ) ?></p>

                        <?php endif; ?>                                      
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="mwb_dss_wc_admin_test_email"><?php esc_html_e( 'Test Email', 'mwb-dailyss' ) ?></label>

                        <?php 

                        $attribute_description = esc_html__( 'Send Report instantly to the above Recipients.', 'mwb-dailyss' );
                        echo wc_help_tip( $attribute_description ); 

                        ?>
                    </th>
                    <td class="forminp forminp-text">

                        <?php 

                        $send_to = get_option( 'mwb_dss_wc_admin_email_addresses' );

                        ?>

                        <?php if( ! empty( $send_to ) ): ?>

                            <button type="submit" name="mwb_dss_wc_admin_test_email" class="button" id="mwb_dss_wc_admin_test_email"><?php esc_html_e( 'Send Report Now', 'mwb-dailyss' ) ?></button>

                        <?php else: ?>

                            <p class="description"><?php esc_html_e( 'Please Enter Recipient\'s email address above and Save.', 'mwb-dailyss' ) ?></p>

                        <?php endif; ?>                                      
                    </td>
                </tr>
            </tbody>
        </table>

        <?php              
    }

    /**
     * Send Test Email.
     */
    public function send_test_email() {

        if( isset( $_POST['mwb_dss_wc_admin_test_email'] ) ) {

            $sent_status = $this->mwb_dss_wc_admin_send_report();

            if( true === $sent_status ) {

                ?>

                <!-- Success notice. -->
                <div class="notice notice-success is-dismissible"> 
                    <p><?php _e( 'Report was sent successfully.', 'mwb-dailyss' ); ?></p>
                </div>

                <?php
            }

            else {

                ?>

                <!-- Report could not be sent notice. -->
                <div class="notice notice-error is-dismissible"> 
                    <p><?php printf( '%s <a target="_blank" href="https://wordpress.org/support/plugin/daily-snapshot-for-woocommerce-admin/">%s</a>%s', esc_html__( 'Sorry, the Report could not be sent. Please contact plugin', 'mwb-dailyss' ), esc_html__( 'support', 'mwb-dailyss' ), esc_html__( '.', 'mwb-dailyss' ) );
                    ?></p>
                </div>

                <?php
            }
        }
    }

    /**
     * settings array for the plugin page
     * @return array settings
     */
    public function mwb_dss_get_admin_settings() {

        $settings = array(
            'section_title' => array(
                'name'     => __( 'Automated Reports', 'mwb-dailyss' ),
                'type'     => 'title',
                'id'       => 'mwb_dss_wc_admin_section_title'
            ),
            'enable' => array(
                'name'     => __( 'Enable/Disable', 'mwb-dailyss' ),
                'id'       => 'mwb_dss_wc_admin_enabled',
                'type'     => 'checkbox',
                'css'      => 'min-width:300px;',
                'desc'     => __( 'Enable Daily Snapshot', 'mwb-dailyss' ),
            ),
            'recipients' => array(
                'name'      => __( 'Recipients', 'mwb-dailyss' ),
                'type'      => 'text',
                'desc'      => sprintf( '<p class=description >%s</p>', __( 'Comma seperated email addresses, reports are sent to.', 'mwb-dailyss' ) ),
                'desc_tip'  => __( 'Comma seperated emails to send reports to.', 'mwb-dailyss' ),
                'id'        => 'mwb_dss_wc_admin_email_addresses'
            ),          
            'section_end' => array(
                'type'     => 'sectionend',
                'id'       => 'mwb_dss_wc_admin_section_end'
            )
        );

        return apply_filters( 'mwb_dss_wc_settings_tab_settings', $settings );
    }

    /**
        * save the plugin settings and schedule the email sending
    */
    public function mwb_dss_settings_update_options() {

        woocommerce_update_options( $this->mwb_dss_get_admin_settings() );

        $is_enabled = get_option( 'mwb_dss_wc_admin_enabled', false );

        if ( "yes" == $is_enabled ) {

            if ( !wp_next_scheduled( 'mwb_dss_wc_admin_schedule' ) ) {

                wp_schedule_event( strtotime( '7:00:00' ), 'daily', 'mwb_dss_wc_admin_schedule' );
            }

            if ( !wp_next_scheduled( 'mwb_dss_wc_admin_report_status_schedule' ) ) {

                wp_schedule_event( strtotime( '00:00:00' ), 'daily', 'mwb_dss_wc_admin_report_status_schedule' );
            }

        } else {

            wp_clear_scheduled_hook( 'mwb_dss_wc_admin_schedule' );
            wp_clear_scheduled_hook( 'mwb_dss_wc_admin_report_status_schedule' );
        }
    }

    /**
        * callback to get/show the report data from woocommerce admin plugin
        * @param string $action array of the existing tabs
        * @return string $email_message
    */
    public function mwb_dss_show_get_report_data( $action = 'return' ) {

        if ( defined( 'WC_ADMIN_ABSPATH' ) ) {

            require_once WC_ADMIN_ABSPATH . 'includes/class-wc-admin-reports-revenue-query.php';
            require_once WC_ADMIN_ABSPATH . 'includes/class-wc-admin-reports-orders-stats-query.php';
            require_once WC_ADMIN_ABSPATH . 'includes/class-wc-admin-reports-products-stats-query.php';

            $args = array(
                'after'     => date('Y-m-d 00:00:00', strtotime( '-1 days' ) ),
                'before'    => date('Y-m-d 23:59:59', strtotime( '-1 days' ) ),
                'interval'  => 'day',
            );

            $report = new WC_Admin_Reports_Revenue_Query( $args );
            $revenue_data = $report->get_data();

            $revenue_data = json_decode( json_encode( $revenue_data ), true );
                         
            $order_report = new WC_Admin_Reports_Orders_Stats_Query( $args );
            $order_data = $order_report->get_data(); 
            
            $products_report = new WC_Admin_Reports_Products_Stats_Query( $args );
            $products_data = $products_report->get_data();
            
            $best_products_report = new WC_Admin_Reports_Products_Query( $args );
            $best_products_data = $best_products_report->get_data();

            $best_seller = "";
            $best_seller_counts = 0;
            $best_seller_count = 0;

            if ( !empty( $best_products_data->data ) ) {

                foreach ( $best_products_data->data as $key => $value ) {

                    if ( $best_seller_counts < $value['items_sold'] ) {

                        $best_seller = $value['product_id'];
                        $best_seller_count = $value['items_sold'];
                    }
                    
                    $best_seller_counts = $value['items_sold'];
                }
            }

           $query_args = array(
                'post_type'   => array( 'shop_order' ),
                'post_status' => array( 'wc-refunded' ),
                'posts_per_page' => -1,
                'date_query' => array(
                    'after'  => date( 'Y-m-d 00:00:00', strtotime( '-1 days' ) ),
                    'before' => date( 'Y-m-d 23:59:59', strtotime( '-1 days' ) )
                )
            );

            $all_orders = get_posts( $query_args );
            $refunded_orders = 0;
            $total_refunded_amt = 0;

            if ( !empty( $all_orders ) ) {

                foreach ( $all_orders as $refund_order ) {

                    $refund_order = wc_get_order( $refund_order->ID );

                    if ( ! is_object( $refund_order ) ) {
                        continue;
                    }

                    $refunds = $refund_order->get_total_refunded();
                    if ( ! empty( $refunds ) ) {
                        $refunded_orders++;
                        $total_refunded_amt += $refunds;
                    }
                }
            }

            ob_start();
            
            $email_heading = date('l, F jS, Y', strtotime( '-1 days' ) );
            
            //include the header
            include_once MWB_DSS_WC_ADMIN_ABSPATH.'templates/emails/snap-header.php';

            //add top order summary center stack.

            include_once MWB_DSS_WC_ADMIN_ABSPATH.'templates/emails/snap-two-stacks.php';

            include_once MWB_DSS_WC_ADMIN_ABSPATH.'templates/emails/snap-footer.php';

            $email_message = ob_get_clean();

            if ( "show" == $action ) {
                print_r($email_message);
            }
            else {
                return $email_message;
            }
        }   
    }

    /**
     * send daily email report
     */
    public function send_report_daily_cron() {

        $sent_status = $this->mwb_dss_wc_admin_send_report();

        update_option( 'mwb_dailyss_daily_report_status', $sent_status );
    }

    /**
     * Update report status daily.
     */
    public function update_daily_report_status() {

        update_option( 'mwb_dailyss_daily_report_status', false );
    }

    /**
     * Send Report Email.
     */
    public function mwb_dss_wc_admin_send_report() {

        $sent_status = false;

        $send_to = get_option( 'mwb_dss_wc_admin_email_addresses', "" );

        if( !empty( $send_to ) ) {

            $email_message = $this->mwb_dss_show_get_report_data();
            $email_subject = __( 'Daily summary of %s', 'mwb-dailyss' );
            $email_subject = sprintf( $email_subject, get_bloginfo( "name" ) );
            // $headers[] = 'From: ' . get_option( 'woocommerce_email_from_name', __( 'Store Admin', 'mwb-dailyss' ) ) . " ( " . get_option( 'woocommerce_email_from_address', '' ); . " )";

            $admin_name = get_option( 'woocommerce_email_from_name', __( 'Store Admin', 'mwb-dailyss' ) );
            $admin_email = get_option( 'woocommerce_email_from_address', '' );
            $headers = array( 'Content-Type: text/html; charset=UTF-8', "From: $admin_name <$admin_email>" );

            $sent_status = wp_mail( $send_to, $email_subject, $email_message, $headers );
        }

        return $sent_status;
    }
}

new MWB_DSS_WC_Admin();