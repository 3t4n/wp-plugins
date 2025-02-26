<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class ERR_Custom_Meta_Boxes {

    private static $_instance;

    public static function getInstance(){
        if(!self::$_instance instanceof self)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * Add meta boxes to our CPT edit screen
     *
     * @since 1.0.0
     */
    public function errMetaBoxes(){

        // Removes meta boxes
        remove_meta_box( 'submitdiv', ERR_CPT_NAME, 'side' );

        // Adds meta boxes
        add_meta_box( 'err-review-reminders-user-details-box', __( 'User Details', 'easy-review-reminders' ), array( self::getInstance(), 'errUserDetails' ), ERR_CPT_NAME, 'normal', 'core' );
        add_meta_box( 'err-review-reminders-product-details-box', __( 'Ordered Items', 'easy-review-reminders' ), array( self::getInstance(), 'errProductDetails' ), ERR_CPT_NAME, 'normal', 'core' );
        add_meta_box( 'err-review-reminders-email-status-box', __( 'Email Status', 'easy-review-reminders' ), array( self::getInstance(), 'errEmailStatus' ), ERR_CPT_NAME, 'normal', 'core' );
        add_meta_box( 'err-review-reminders-order-reference', __( 'Order Reference', 'easy-review-reminders' ), array( self::getInstance(), 'errOrderReference' ), ERR_CPT_NAME, 'side', 'core' );
        add_meta_box( 'err-review-reminders-status', __( 'Reminder Status', 'easy-review-reminders' ), array( self::getInstance(), 'errReminderStatus' ), ERR_CPT_NAME, 'side', 'core' );
        add_meta_box( 'err-review-reminders-upsell', __( 'Premium Add-on', 'easy-review-reminders' ), array( self::getInstance(), 'errUpsells' ), ERR_CPT_NAME, 'side', 'core' );

        do_action( 'err_meta_boxes' );

    }

    /**
     * Display User information in the new meta box
     *
     * @param object $post
     *
     * @since 1.0.0
     */
    public function errUserDetails( $post ){

        $userID     = (int) get_post_meta( $post->ID, '_err_reminder_customer_id', true );
        $orderID    = get_post_meta( $post->ID, '_err_order_id', true );
        $order      = new WC_Order( $orderID );
        $userMeta   = '';

        // Registered users.
        if( $userID ){

            $user = get_userdata( $userID );
            $userMeta = array_filter( get_user_meta( $userID ) );

        // Non-registered users.
        }else{

            $user       = get_post_meta( $orderID );
            $userMeta   = array();
            foreach ( $user as $key => $value ) {
                $userMeta[ ltrim( $key, '_' ) ] = $value;
            }

        } ?>

        <div class='column'>

            <h4><?php _e( 'General Details',  'easy-review-reminders' ); ?></h4>

            <?php
                if( ! empty( $user->data->user_login ) ): ?>

                    <label><?php _e( 'Customer: ', 'easy-review-reminders' )?></label>

                    <a href="<?php echo get_edit_user_link( $userID ); ?>">
                        <?php echo $user->data->user_login; ?>
                    </a><?php

                elseif( isset( $userMeta[ 'billing_first_name' ][ 0 ] ) &&
                        isset( $userMeta[ 'billing_last_name' ][ 0 ] ) ): ?>

                    <label><?php _e( 'Customer: ', 'easy-review-reminders' ); ?></label>

                    <?php echo $userMeta[ 'billing_first_name' ][ 0 ] . ' ' . $userMeta[ 'billing_last_name' ][ 0 ];

                endif;

                if( ! empty( $user->data->user_email ) ): ?>

                    <label><?php _e( 'Email:', 'easy-review-reminders' ); ?></label>

                    <a href="mailto:<?php echo $user->data->user_email; ?>">
                        <?php echo $user->data->user_email; ?>
                    </a><?php

                elseif( isset( $userMeta[ 'billing_email' ][ 0 ] ) ): ?>

                    <label><?php _e( 'Email: ', 'easy-review-reminders' ); ?></label>

                    <a href="mailto:<?php echo $userMeta[ 'billing_email' ][ 0 ]; ?>">
                        <?php echo $userMeta[ 'billing_email' ][ 0 ]; ?>
                    </a><?php

                endif;

                if( $userID ): ?>
                    <label><?php _e( 'Role: ', 'easy-review-reminders' ); ?></label><?php
                        foreach ( $user->roles as $key => $value ) {
                            echo ucwords( str_replace( '_', ' ', $value ) ) . '<br>';
                        }
                    else: ?>
                        <label><?php _e( 'Role:', 'easy-review-reminders' ); ?></label>
                        <?php _e( 'Guest', 'easy-review-reminders' );
                    endif; ?>

            <?php do_action( 'err_general_details', $post, $user, $userMeta ); ?>

        </div>

        <div class='column'>

            <h4><?php _e( 'Billing Details', 'easy-review-reminders' ); ?></h4>

            <label><?php _e( 'Address: ', 'easy-review-reminders' ); ?></label>
            <?php echo isset( $userMeta['billing_first_name'][0] ) ? $userMeta['billing_first_name'][0]: ""; ?>
            <?php echo isset( $userMeta['billing_last_name'][0] ) ? $userMeta['billing_last_name'][0] : ""; ?>
            <?php echo isset( $userMeta['billing_company'][0] ) ? "<br>".$userMeta['billing_company'][0] : ""; ?>
            <?php echo isset( $userMeta['billing_address_1'][0] ) ? "<br>".$userMeta['billing_address_1'][0] : ""; ?>
            <?php echo isset( $userMeta['billing_address_2'][0] ) ? "<br>".$userMeta['billing_address_2'][0] : ""; ?>
            <?php echo isset( $userMeta['billing_city'][0] ) ? "<br>".$userMeta['billing_city'][0] : ""; ?>
            <?php echo isset( $userMeta['billing_postcode'][0] ) ? "<br>".$userMeta['billing_postcode'][0] : ""; ?>
            <?php echo isset( $userMeta['billing_country'][0] ) ? "<br>".$userMeta['billing_country'][0] : ""; ?>
            <?php echo isset( $userMeta['billing_state'][0] ) ? "<br>".$userMeta['billing_state'][0] : ""; ?>

            <label><?php _e( 'Email: ', 'easy-review-reminders' ); ?></label>
            <?php if( !empty( $userMeta['billing_email'][0] ) ): ?>
                <a href="mailto:<?php echo $userMeta['billing_email'][0]; ?>">
                    <?php echo $userMeta['billing_email'][0]; ?>
                </a>
            <?php endif; ?>

            <label><?php _e( 'Phone: ', 'easy-review-reminders' ); ?></label>
            <?php echo isset( $userMeta['billing_phone'][0] ) ? $userMeta['billing_phone'][0] : ""; ?>

            <?php do_action( 'err_billing_details', $post, $user, $userMeta ); ?>

        </div>

        <div class='column'>
            <h4><?php _e( 'Shipping Details', 'easy-review-reminders' ); ?></h4>

            <label><?php _e( 'Address: ', 'easy-review-reminders' ); ?></label>
            <?php echo isset( $userMeta['shipping_first_name'][0] ) ? $userMeta['shipping_first_name'][0] : ""; ?>
            <?php echo isset( $userMeta['shipping_last_name'][0] ) ? $userMeta['shipping_last_name'][0] : ""; ?>
            <?php echo isset( $userMeta['shipping_company'][0] ) ? "<br>".$userMeta['shipping_company'][0] : ""; ?>
            <?php echo isset( $userMeta['shipping_address_1'][0] ) ? "<br>".$userMeta['shipping_address_1'][0] : ""; ?>
            <?php echo isset( $userMeta['shipping_address_2'][0] ) ? "<br>".$userMeta['shipping_address_2'][0] : ""; ?>
            <?php echo isset( $userMeta['shipping_city'][0] ) ? "<br>".$userMeta['shipping_city'][0] : ""; ?>
            <?php echo isset( $userMeta['shipping_postcode'][0] ) ? "<br>".$userMeta['shipping_postcode'][0] : ""; ?>
            <?php echo isset( $userMeta['shipping_country'][0] ) ? "<br>".$userMeta['shipping_country'][0] : ""; ?>
            <?php echo isset( $userMeta['shippingstate'][0] ) ? "<br>".$userMeta['shippingstate'][0] : ""; ?>

            <?php do_action( 'err_shipping_details', $post, $user, $userMeta ); ?>

        </div><?php

        do_action( 'err_review_reminders_user_details_box', $post );

    }

    /**
     * Display ordered items in a table
     *
     * @param object $post
     *
     * @since 1.0.0
     */
    public function errProductDetails( $post ){

        $orderID    = get_post_meta( $post->ID, "_err_order_id", true );
        $order      = new WC_Order( $orderID );
        $lineItems  = $order->get_items( apply_filters( 'err_order_item_types', 'line_item' ) ); ?>

        <div class="err_product_details_wrapper">
            <table cellpadding="0" cellspacing="0" class="err_product_details" style="width:100%;">
                <thead>
                    <tr>
                        <th class="item" colspan="2"><?php _e( 'Item', 'easy-review-reminders' ); ?></th>
                        <th class="item_cost"><?php _e( 'Cost', 'easy-review-reminders' ); ?></th>
                        <th class="quantity"><?php _e( 'Qty', 'easy-review-reminders' ); ?></th>
                        <th class="line_cost"><?php _e( 'Total', 'easy-review-reminders' ); ?></th>
                    </tr>
                </thead>
                <tbody id="product_line_items"><?php

                    foreach ( $lineItems as $itemID => $item )
                        include( ERR_VIEWS_DIR . 'html-order-item.php' );

                    do_action( 'err_items_after_line_items', ERR_Functions::errGetOrderID( $order ) ); ?>

                </tbody>
            </table>
        </div>
        <div class="err-product-data-row err-reminder-totals">
            <table class="table totals">
                <tr>
                    <td colspan="2"><h2><?php _e( 'Totals', 'easy-review-reminders' ); ?></h2></td>
                </tr>
                <tr class="reminder-subtotal">
                    <th><?php _e( 'Subtotal', 'easy-review-reminders' ); ?></th>
                    <td><?php echo wc_price( $order->get_subtotal() ); ?>
                    </td>
                </tr>
                <?php $orderCoupons = $order->get_used_coupons(); ?>
                <?php foreach ( $orderCoupons as $coupon ) : ?>
                    <tr class="reminder-discount coupon-<?php echo esc_attr( sanitize_title( $coupon ) ); ?>">
                        <th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
                        <td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
                    </tr>
                <?php endforeach; ?>

                <tr class="order-total">
                    <th><?php _e( 'Order Total', 'easy-review-reminders' ); ?></th>
                    <td><?php
                        echo $order->get_formatted_order_total(); ?>
                    </td>
                </tr>
            </table>

            <?php do_action( 'err_product_totals', $post, $orderID, $order, $lineItems ); ?>

        </div><?php

        do_action( 'err_product_details', $post, $orderID, $order, $lineItems );

    }

    /**
     * Display email status
     *
     * @since 1.0.0
     */
    public function errEmailStatus( $post ){

        global $post;

        $reminderID = (int) $post->ID;
        $errEmailStatus = get_post_meta( $reminderID, '_err_email_status', true );
        $errEmailArgs   = get_post_meta( $reminderID, ERR_EMAIL_SENDER_CRON_ARGS, true ); ?>

        <div class="err-email-status">

            <?php do_action( 'err_before_email_status_table', $post ); ?>

            <table class="table">
                <thead>
                    <tr>
                        <th><?php _e( 'Title', 'easy-review-reminders' ); ?></th>
                        <th><?php _e( 'Days After Successful Order', 'easy-review-reminders' ); ?></th>
                        <th><?php _e( 'Time Sent or Failed', 'easy-review-reminders' ); ?></th>
                        <th><?php _e( 'Status', 'easy-review-reminders' ); ?></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th><?php _e( 'Title', 'easy-review-reminders' ); ?></th>
                        <th><?php _e( 'Days After Successful Order', 'easy-review-reminders' ); ?></th>
                        <th><?php _e( 'Time Sent or Failed', 'easy-review-reminders' ); ?></th>
                        <th><?php _e( 'Status', 'easy-review-reminders' ); ?></th>
                    </tr>
                </tfoot>
                <tbody><?php

                    do_action( 'err_before_email_status_list', $post );

                    if( ! empty( $errEmailStatus ) ) {
                        foreach ( $errEmailStatus as $key => $value ) {

                            $errOnlyInitial = apply_filters( 'err_only_initial_template', $key === 'initial' ? true : false );

                            if( $errOnlyInitial ){ ?>

                                <tr>
                                    <td>
                                        <?php echo $value[ 'subject' ]; ?>
                                    </td>
                                    <td><?php
                                            echo $value[ 'days_after_successful_order' ];
                                            echo $value[ 'days_after_successful_order' ] > 1 ?  ' Days' : ' Day'; ?>
                                    </td>
                                    <td><?php
                                        $dateTimeNow    = strtotime( current_time( 'Y-m-d H:i:s' ) );

                                        if( $value[ 'status' ] == 'sent' ){
                                            echo get_date_from_gmt( date( 'Y-m-d H:i:s', strtotime( $value[ 'time_sent' ] ) ), 'F j, Y @ g:i A' );
                                        }elseif( $value[ 'status' ] == 'failed' ){
                                            echo get_date_from_gmt( date( 'Y-m-d H:i:s', strtotime( $value[ 'time_failed' ] ) ), 'F j, Y @ g:i A' );
                                        }else{

                                            $emailArgs = array();
                                            if( ! empty( $errEmailArgs ) ){
                                                foreach ( $errEmailArgs as $index => $args ) {
                                                    foreach ( $args[ 1 ] as $emailKey => $email ) {
                                                        if( $key === $emailKey ){
                                                            $emailArgs = $args;
                                                            break 2;
                                                        }
                                                    }
                                                }
                                            }

                                            $errScheduledDate = wp_next_scheduled( ERR_EMAIL_SENDER_CRON, $emailArgs );

                                            if( $errScheduledDate > $dateTimeNow ){
                                                $scheduledDate = strtotime( get_date_from_gmt( date( 'Y-m-d H:i:s', $errScheduledDate ), 'Y-m-d H:i:s' ) );

                                                echo date( 'F j, Y @ g:i A ', $scheduledDate );
                                                printf( _x( '( %s remaining )', '%s = time remaining', 'easy-review-reminders' ), human_time_diff( $dateTimeNow, $scheduledDate ) );
                                            }else
                                                echo '( Queuing... )';
                                        } ?>
                                    </td>
                                    <td><?php
                                            if( $value[ 'status' ] == 'pending' ){
                                                echo '<label class="email-pending">';
                                                echo empty( $value[ 'status' ] ) ? 'Pending' : '';
                                            }elseif( $value[ 'status' ] == 'sent' ){
                                                echo '<label class="email-sent">';
                                            }elseif( $value[ 'status' ] == 'failed' ){
                                                echo '<label class="email-failed">';
                                            }
                                            echo ucwords( isset( $value[ 'status' ] ) ? $value[ 'status' ] : '' );
                                            echo '</label>'; ?>
                                    </td>
                                </tr><?php

                            }
                        }
                    }

                    do_action( 'err_after_email_status_list', $post ); ?>

                </tbody>
            </table>

            <?php do_action( 'err_after_email_status_table', $post ); ?>

        </div>
    <?php

    }

    /**
     * Display reminder status
     *
     * @since 1.0.0
     */
    public function errOrderReference( $post ){

        $orderID = get_post_meta( $post->ID, '_err_order_id', true );
        $orderLink = get_admin_url() . 'post.php?post=' . $orderID . '&action=edit';
        $ref = '';

        if( isset( $orderID ) )
            $ref = '<a href="' . $orderLink . '">#' . $orderID . '</a>';
        else
            $ref = __( 'Order not yet set.', 'easy-review-reminders' );

        echo apply_filters( 'err_order_reference_text', $ref, $post, $orderID, $orderLink );

        do_action( 'err_order_reference', $post, $orderID, $orderLink );

    }

    /**
     * Display reminder status
     *
     * @since 1.0.0
     */
    public function errReminderStatus( $post ){

        $status = get_post_status( $post->ID );
        $class = 'status cancelled';

        if( $status == 'err-pending-review' )
            $class = 'status pending';
        elseif( $status == 'err-reviewed' )
            $class = 'status reviewed';
        elseif( $status == 'err-not-reviewed' )
            $class = 'status not-reviewed';
        elseif( $status == 'err-cancelled' )
            $class = 'status cancelled';

        $status = str_replace( 'err-', '', $status );
        $status = str_replace( '-', ' ', $status );
        $status = ucwords( $status );
        $status = apply_filters( 'err_reminder_status_column', $status );

        echo apply_filters( 'err_reminder_status', '<p>Current Status: <span class="' . $class . '">' . $status . '</span></p>', $post );

    }

    /**
     * Display upsell graphic
     *
     * @since 1.0.0
     */
    public function errUpsells( $post ){ ?>

        <style type="text/css">
            div#err-review-reminders-upsell div.inside{
                padding: 0px;
                margin: 0px;
                overflow: hidden;
            }
            div#err-review-reminders-upsell div.inside a,
            div#err-review-reminders-upsell div.inside img{
                float: left;
            }
        </style>
        <a target="_blank" href="https://marketingsuiteplugin.com/product/easy-review-reminders/?utm_source=ERR&utm_medium=Settings%20Banner&utm_campaign=ERR">
            <img style="outline: none;" src="<?php echo ERR_IMAGES_URL . 'sidebar-upsells.png'; ?>" alt="<?php _e( 'Easy Review Reminders Premium' , 'easy-review-reminders' ); ?>"/>
        </a><?php

    }
}
