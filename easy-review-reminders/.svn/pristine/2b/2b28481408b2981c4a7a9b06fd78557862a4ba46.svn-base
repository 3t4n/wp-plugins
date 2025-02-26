<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class ERR_Functions {

    /**
     * Sort by array key.
     *
     * @param array $arr1
     * @param array $arr2
     *
     * @return array
     * @since 1.0.0
     */
    public static function errSortByArrayKey( $arr1, $arr2 ) {

        return $arr1[ 'days_after_successful_order' ] - $arr2[ 'days_after_successful_order' ];

    }

    /**
     * Content excerpt.
     *
     * @param string $text
     * @param int $limit
     *
     * @return string
     * @since 1.0.0
     */
    public static function errContentExcerpt( $text, $limit ) {

        if ( str_word_count( $text, 0 ) > $limit ) {
            $words = str_word_count( $text, 2 );
            $pos = array_keys( $words );
            $text = substr( $text, 0, $pos[ $limit ] ) . '...';
        }

        return $text;
    }

    /**
     * Check if user email is in the blacklist.
     *
     * @param string $email
     *
     * @return bool
     * @since 1.0.0
     */
    public static function errEmailAddressIsBlacklisted( $email ){

        // Get blacklisted emails
        $errBlacklistedEmails = get_option( ERR_BLACKLIST_EMAILS_OPTION );

        if ( ! is_array( $errBlacklistedEmails ) )
            $errBlacklistedEmails = array();

        // Don't create new entry if the email is in the blacklist
        if ( array_key_exists( $email, $errBlacklistedEmails ) )
            return true;

        return apply_filters( 'err_email_address_is_blacklisted', false );

    }

    /**
     * Check if the the product is already reviewed before.
     *
     * @param int $productID
     * @param int $userID
     * @param int $reminderID
     * @param int $orderID
     *
     * @return bool
     * @since 1.2.0
     */
    public static function errCheckIfProductIsAlreadyReviewed( $productID, $userID, $reminderID, $orderID, $email ){

        $userReviews = get_post_meta( $productID, '_err_user_reviews', true );

        if( ! empty( $userReviews ) ){
            foreach ( $userReviews as $review ) {

                // Check if the user already reviewed the product before on the previous review reminders that was sent.
                if ( $email === comment_author_email( $review[ 'commentID' ] ) )
                    return true;

            }
        }

        return false;

    }

    /**
     * Get data about the current woocommerce installation.
     *
     * @since 1.2.2
     * @access public
     * @return array Array of data about the current woocommerce installation.
     */
    public static function errGetWooCommerceData() {

        if ( ! function_exists( 'get_plugin_data' ) )
            require_once( ABSPATH . '/wp-admin/includes/plugin.php' );

        return get_plugin_data( WP_PLUGIN_DIR . '/woocommerce/woocommerce.php' );

    }

    /**
     * Get product id. WC 2.7.
     *
     * @since 1.2.2
     * @access public
     *
     * @param WC_Product $product Product object.
     * @return int Product id.
     */
    public static function errGetProductID( $product ) {

        if ( is_a( $product , 'WC_Product' ) ) {

            $woocommerce_data = self::errGetWooCommerceData();

            if ( version_compare( $woocommerce_data[ 'Version' ] , '3.0.0' , '>=' ) )
            switch ( $product->get_type() ) {
                case 'variation':
                    return $product->get_parent_id();
                case 'simple':
                case 'variable':
                case 'external':
                default:
                    return $product->get_id();

            }

            else {

                switch ( $product->product_type ) {

                    case 'simple':
                    case 'variable':
                    case 'external':
                        return $product->id;
                    case 'variation':
                        return $product->variation_id;
                    default:
                        return apply_filters( 'wwp_third_party_product_id' , 0 , $product );

                }

            }

        } else {

            error_log( 'ERR Error : errGetProductID helper functions expect parameter $product of type WC_Product.' );
            return 0;

        }

    }

    /**
     * Get order id. WC 2.7.
     *
     * @since 1.3.2
     * @access public
     *
     * @param WC_Order $order Order object.
     * @return int Product id.
     */
    public static function errGetOrderID( $order ) {

        if ( is_a( $order , 'WC_Order' ) ) {

            $woocommerce_data = self::errGetWooCommerceData();

            if ( version_compare( $woocommerce_data[ 'Version' ] , '2.7.0' , '>=' ) || $woocommerce_data[ 'Version' ] === '2.7.0-RC1' )
                return $order->get_id();
            else
                return $order->id;

        } else {

            error_log( 'ERR Error : errGetOrderID helper functions expect parameter $product of type WC_Order.' );
            return 0;

        }

    }

    /**
     * Get line item meta. WC 2.7.
     *
     * @since 1.2.2
     * @access public
     *
     * @param $itemID line_item id.
     * @param WC_Order $order order object
     * @return array line_item meta data
     */
    public static function errGetLineItemMeta( $itemID , $order ) {

        if ( is_a( $order , 'WC_Order' ) ) {

            $woocommerce_data = self::errGetWooCommerceData();

            if ( version_compare( $woocommerce_data[ 'Version' ] , '2.7.0' , '>=' ) || $woocommerce_data[ 'Version' ] === '2.7.0-RC1' ) {

                $order_item = new WC_Order_Item_Product( $itemID );
                return $order_item->get_meta_data();

            } else {

                return $order->has_meta( $itemID );
            }

        } else {

            error_log( 'ERR Error : errGetLineItemMeta helper functions expect parameter $order of type WC_Order.' );
            return 0;

        }
    }

    /**
     * Get order currency. WC 2.7.
     *
     * @since 1.2.2
     * @access public
     *
     * @param WC_Order $order Product object.
     * @return string order currency
     */
    public static function errGetOrderCurrency( $order ) {

        if ( is_a( $order , 'WC_Order' ) ) {

            $woocommerce_data = self::errGetWooCommerceData();

            if ( version_compare( $woocommerce_data[ 'Version' ] , '2.7.0' , '>=' ) || $woocommerce_data[ 'Version' ] === '2.7.0-RC1' )
                return $order->get_currency();
            else
                return $order->get_order_currency();

        } else {

            error_log( 'ERR Error : errGetOrderCurrency helper functions expect parameter $order of type WC_Order.' );
            return 0;

        }
    }
}
