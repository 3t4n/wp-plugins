<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class ERR_Emails {

    private static $_instance;
    public $errDefaultTemplate;

    public static function getInstance(){
        if(!self::$_instance instanceof self)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * Class constructor.
     *
     * @since 1.0.0
     */
    public function __construct(){

        $this->errDefaultTemplate = apply_filters( 'err_default_email_template', array(
                                                    'tags'  => array(
                                                                '{product_list}'            => __( 'A formatted table of products that were in the order', 'easy-review-reminders' ),
                                                                '{days_ago}'                => __( 'Number of days ago the order was placed', 'easy-review-reminders' ),
                                                                '{order_date}'              => __( 'The date and time of the order', 'easy-review-reminders' ),
                                                                '{order_date_completed}'    => __( 'The date the order was marked completed', 'easy-review-reminders' ),
                                                                '{order_id}'                => __( 'The order id', 'easy-review-reminders' ),
                                                                '{full_name}'               => __( 'Combination of the first & last name', 'easy-review-reminders' ),
                                                                '{first_name}'              => __( 'First name', 'easy-review-reminders' ),
                                                                '{last_name}'               => __( 'Last name', 'easy-review-reminders' ),
                                                                '{user_email}'              => __( 'Customer\'s email address', 'easy-review-reminders' ),
                                                                '{site_url}'                => __( 'The website\'s url', 'easy-review-reminders' ),
                                                                '{site_name}'               => __( 'The website\'s name', 'easy-review-reminders' ),
                                                                '{unsubscribe}'             => __( 'Unsubscribe Link', 'easy-review-reminders' ),
                                                            ),
                                                    'subject'   =>  __( 'Review recently purchased products', 'easy-review-reminders' ),
                                                    'body'      =>  __( '<p>Hi {first_name}</p>' .
                                                                        '<p>Thanks for your recent order {days_ago} days ago on {site_name}.</p>' .
                                                                        '<p>We would love if you could help us and other customers by reviewing the products you recently purchased.</p>' .
                                                                        '<p>It only takes a minute and it would really help others by giving them an idea of your experience.</p>' .
                                                                        '<p>{product_list}</p>' .
                                                                        '<p>Click the link for each product and review the product under the "Reviews" tab.</p>' .
                                                                        '<p>Thanks in advance!</p>' .
                                                                        '<p>Regards,<br/> {site_name} - {site_url}</p>' .
                                                                        '<p>To cancel your subscription, click {unsubscribe}</p>', 'easy-review-reminders' )

                                                    )
                                                );
	}

    /**
     * Perform email check if not blacklisted and if review reminder has pending email to send if so then proceed with email sending.
     *
     * @param int $reminderID
     * @param array $errStatus
     * @param string $email
     *
     * @since 1.0.0
     */
    public function errEmailSender( $reminderID, $errStatus, $email ){

        $errEmailSchedules = get_option( ERR_EMAIL_SCHEDULES_OPTION );

        foreach ( $errStatus as $key => $status ) {

            if( array_key_exists( $key, $errEmailSchedules ) && get_post_status( $reminderID ) !== false )
                ERR_AJAX::errSendEmail( $reminderID, $key, $errStatus, $email );

        }

        do_action( 'err_email_sender', $reminderID, $errStatus, $email, $errEmailSchedules );

    }

    /**
     * This will fetch the info about the order.
     *
     * @param integer $reminderID
     * @param string $getInfo
     *
     * @return string
     * @since 1.0.0
     */
    public function errGetReminderInfo( $reminderID, $getInfo ){

        $userID = (int) get_post_meta( $reminderID, '_err_reminder_customer_id', true );
        $orderID = get_post_meta( $reminderID, '_err_order_id', true );

        if ( WC()->cart instanceof WC_Cart ) {
            $wcCart = WC()->cart;
        } else {
            $wcCart = new WC_Cart();
        }

        $fullName   = '';
        $firstName  = '';
        $lastName   = '';
        $email      = '';

        // Get user info from order
        if( $orderID ){

            $user       = get_post_meta( $orderID );
            $userMeta   = array();

            foreach ( $user as $key => $value ) {
                $userMeta[ ltrim( $key, '_' ) ] = $value;
            }

            $fullName   = trim( $userMeta[ 'billing_first_name' ][ 0 ] . ' ' . $userMeta[ 'billing_last_name' ][ 0 ] );
            $firstName  = $userMeta[ 'billing_first_name' ][ 0 ];
            $lastName   = $userMeta[ 'billing_last_name' ][ 0 ];
            $email      = $userMeta[ 'billing_email' ][ 0 ];

        }

        switch ( $getInfo ) {
            case 'product_list':

                    $order = new WC_Order( $orderID );

                    $rows = '';
                    $rows .= '<style>';
                    $rows .= 'table.err_product_details td{padding:10px;}';
                    $rows .= '</style>';
                    $rows .= '<table cellpadding="5" cellspacing="5" class="err_product_details">';
                        $rows .= '<tbody id="product_line_items">';

                        $items = $order->get_items();

                            if( ! empty( $items ) ) {
                                foreach ( $items as $key => $item ){
                                    $productID = ! empty( $item[ 'variation_id' ] ) ? $item[ 'variation_id' ] : $item[ 'product_id' ];
                                    $product = wc_get_product( $productID );
                                    $variation = array();

                                    if ( ( $product->is_type( 'composite' ) && ERR_Composite_Products::errCheckIfCompositeParent( $item ) ) ||
                                        ( $product->is_type( 'bundle' ) && ERR_Bundled_Products::errCheckIfBundledParent( $item ) ) ||
                                        ( empty( $item[ 'item_meta' ][ '_bundled_by' ][ 0 ] ) && empty( $item[ 'item_meta' ][ '_composite_parent' ][ 0 ] ) ) ){

                                        $rows .= '<tr class="items" data-product-id="' . $item[ 'product_id' ] . '" data-product-variation-id="' . $item[ 'variation_id' ] . '">';
                                            $rows .= '<td class="thumb">';
                                                $product_image = $product->get_image( array( 40, 40 ) );
                                                $product_image = str_replace( '="//', '="' . ( is_ssl() ? 'https://' : 'http://' ), $product_image );
                                                $rows .= $product_image;
                                            $rows .= '</td>';
                                            $rows .= '<td class="name">';
                                                $rows .= $product->get_title();
                                            $rows .= '</td>';
                                            $rows .= '<td class="review">';

                                                if( ERR_Functions::errCheckIfProductIsAlreadyReviewed( $productID, $userID, $reminderID, $orderID , $email ) ){

                                                    $rows .= __( 'Reviewed', 'easy-review-reminders' );

                                                }else{

                                                    $productURL = trailingslashit( get_permalink( $item[ 'product_id' ] ) );
                                                    $productURL = esc_url( add_query_arg( 'errid', md5( $reminderID ), $productURL ) );

                                                    // Used to track email schedules used
                                                    if( isset( $_REQUEST[ 'err_email_schedule_id' ] ) )
                                                        $productURL = esc_url( add_query_arg( 'ref', $_REQUEST[ 'err_email_schedule_id' ], $productURL ) );

                                                    $rows .= '<a href="' . $productURL . '">' . __( 'Review Product', 'easy-review-reminders' ) .'</a>';

                                                }

                                            $rows .= '</td>';
                                        $rows .= '</tr>';

                                    }
                                }
                            }
                       $rows .= '</tbody>';
                    $rows .= '</table>';

                    return apply_filters( 'err_reminders_info_product_list', $rows, $reminderID, $userID, $orderID, $order );

                break;

            case 'full_name':

                return apply_filters( 'err_reminders_info_full_name', $fullName, $reminderID, $userID, $orderID );

                break;

            case 'first_name':

                return apply_filters( 'err_reminders_info_first_name', $firstName, $reminderID, $userID, $orderID );

                break;

            case 'last_name':

                return apply_filters( 'err_reminders_info_last_name', $lastName, $reminderID, $userID, $orderID );

                break;

            case 'recipient_email':

                return apply_filters( 'err_reminders_info_recipient_email', $email, $reminderID, $userID, $orderID );

                break;

            case 'days_ago':

                $dateTimeNow    = strtotime( current_time( 'Y-m-d' ) );
                $orderDate      = strtotime( get_the_date( 'Y-m-d', $reminderID ) );
                $dateDiff       = $dateTimeNow - $orderDate;
                $daysAgo        = floor( $dateDiff / ( 60 * 60 * 24 ) );

                return apply_filters( 'err_reminders_info_days_ago', $daysAgo, $reminderID, $userID, $orderID );

                break;

            case 'order_date':

                $orderDate = get_post_meta( $reminderID, '_err_reminder_date_created', true );

                return apply_filters( 'err_reminders_info_order_date', $orderDate, $reminderID, $userID, $orderID );

                break;

            case 'order_date_completed':

                $orderID        = get_post_meta( $reminderID, '_err_order_id', true );
                $completionDate = get_post_meta( $orderID, '_completed_date', true );

                return apply_filters( 'err_reminders_info_order_date_completed', $completionDate, $reminderID, $userID, $orderID );

                break;

            case 'order_id':

                $orderID = get_post_meta( $reminderID, '_err_order_id', true );

                return apply_filters( 'err_reminders_info_order_id', $orderID, $reminderID, $userID, $orderID );

                break;

            case 'site_url':

                $siteUrl = site_url();
                $siteUrl = '<a href="' . esc_url( $siteUrl ) . '">' . $siteUrl . '</a>';

                return apply_filters( 'err_reminders_info_site_url', $siteUrl, $reminderID, $userID, $orderID );

                break;

            case 'site_name':

                $siteName = get_bloginfo( 'name' );

                return apply_filters( 'err_reminders_info_site_name', $siteName, $reminderID, $userID, $orderID );

                break;

            case 'unsubscribe':

                $siteUrl = trailingslashit( site_url() );
                $unsubscribeEndpoint = apply_filters( 'err_unsubscribe_endpoint', 'err-unsubscribe' );
                $unsubscribeUrl = trailingslashit( $siteUrl . $unsubscribeEndpoint );
                $queryArgs = array( 'email' => $email, 'token' => md5( $reminderID ) );
                $unsubscribeLink = esc_url( add_query_arg( $queryArgs, $unsubscribeUrl ) );

                // Used to track email schedules used
                if( isset( $_REQUEST[ 'err_email_schedule_id' ] ) )
                    $unsubscribeLink = esc_url( $unsubscribeLink . '&ref=' . $_REQUEST[ 'err_email_schedule_id' ] );

                $unsubscribeLink = '<a href="' . $unsubscribeLink . '">' . __( 'Unsubscribe', 'easy-review-reminders' ) . '</a>';

                return apply_filters( 'err_reminders_info_unsubscribe', $unsubscribeLink, $reminderID, $userID, $orderID );

                break;
        }

        do_action( 'err_get_reminders_info', $reminderID, $getInfo, $userID, $orderID );

    }


    /**
     * Set filter wp_mail "From" Header
     *
     * @return string
     * @since 1.0.0
     */
    public function errWPMailFrom(){

        $fromEmail = trim( get_option( 'woocommerce_email_from_address' ) );

        return apply_filters( 'err_email_from_email' , $fromEmail );

    }

    /**
     * Set filter wp_mail 'From Name' Header
     *
     * @return string
     * @since 1.0.0
     */
    public function errWPMailFromName(){

        $wcFromName = trim( get_option( 'woocommerce_email_from_name' ) );

        return apply_filters( 'err_email_from_name' , $wcFromName );

    }

    /**
     * Construct email headers.
     *
     * @param string $fromName
     * @param string $fromEmail
     *
     * @return array
     * @since 1.0.0
     */
    public function errConstructEmailHeader( $fromName , $fromEmail ){

        $headers[] = 'From: ' . $fromName . ' < ' . $fromEmail . ' > ';

        $headers[] = apply_filters( 'err_email_content_type', 'Content-Type: text/html;' );

        $headers[] = apply_filters( 'err_email_charset', 'charset=UTF-8' );

        return apply_filters( 'err_email_header', $headers );

    }


    /**
     * Parse email contents, replace email template tags with appropriate values.
     *
     * @param string $content
     * @param array $tags
     * @param array $exclude
     *
     * @return string
     * @since 1.0.0
     */
    public function errParseEmailContent( $content, $tags, $exclude = array() ){

        foreach ( $tags as $tag => $val ) {
            if( ! in_array( $tag, $exclude ) ){
               $content = str_replace( '{' . $tag . '}', $val , $content );
            }
        }

        return apply_filters( 'err_parse_email_content', $content, $tags );

    }
}
