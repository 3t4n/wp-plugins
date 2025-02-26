<?php
/**
 * JetAPI Compatibility Functions
 *
 * @package JetAPI_Integration_For_WooCommerce
 */

defined( 'ABSPATH' ) || exit;

/**
 * Check if HPOS is active
 * 
 * @uses \Automattic\WooCommerce\Utilities\OrderUtil
 * @return bool
 */
function jeti_is_hpos_active() {
    /** @var \Automattic\WooCommerce\Utilities\OrderUtil $order_util */
    if ( class_exists( 'Automattic\WooCommerce\Utilities\OrderUtil' ) && method_exists( 'Automattic\WooCommerce\Utilities\OrderUtil', 'custom_orders_table_usage_is_enabled' ) ) {
        return \Automattic\WooCommerce\Utilities\OrderUtil::custom_orders_table_usage_is_enabled();
    }
    return false;
}

if ( ! class_exists( 'JETI_Order' ) ) {
    /**
     * Minimal JETI_Order replacement for compatibility
     */
    class JETI_Order {
        protected $id;
        protected $meta_data = array();

        public function __construct( $order = 0 ) {
            $this->id = absint($order);
        }

        public function get_id() {
            return $this->id;
        }

        public function get_billing_phone() {
            return get_post_meta( $this->id, '_billing_phone', true );
        }

        public function get_order_number() {
            return $this->id;
        }

        public function update_meta_data( $key, $value ) {
            $this->meta_data[$key] = $value;
            return $this;
        }

        public function get_meta( $key, $single = true ) {
            if ( isset( $this->meta_data[$key] ) ) {
                return $this->meta_data[$key];
            }
            return get_post_meta( $this->id, $key, $single );
        }

        public function delete_meta_data( $key ) {
            unset( $this->meta_data[$key] );
            return $this;
        }

        public function save() {
            foreach ( $this->meta_data as $key => $value ) {
                update_post_meta( $this->id, $key, $value );
            }
            $this->meta_data = array();
            return true;
        }
    }
}

if ( ! function_exists( 'jeti_get_order' ) ) {
    /**
     * Get order
     *
     * @param int $order_id Order ID.
     * @return JETI_Order|false
     */
    function jeti_get_order( $order_id ) {
        return new JETI_Order( absint($order_id) );
    }
}

if ( ! function_exists( 'jeti_get_orders' ) ) {
    /**
     * Get orders
     *
     * @param array $args Query arguments.
     * @return array
     */
    function jeti_get_orders( $args = array() ) {
        $query = new WP_Query( array_merge( array(
            'post_type'      => 'shop_order',
            'post_status'    => array_keys( jeti_get_order_statuses() ),
            'posts_per_page' => -1,
        ), wp_parse_args($args, array()) ) );

        return array_map( 'jeti_get_order', $query->posts );
    }
}

if ( ! function_exists( 'jeti_get_order_statuses' ) ) {
    /**
     * Get order statuses
     *
     * @return array
     */
    function jeti_get_order_statuses() {
        return array(
            'wc-pending'    => _x( 'Pending payment', 'Order status', 'jetapi-integration-for-woocommerce' ),
            'wc-processing' => _x( 'Processing', 'Order status', 'jetapi-integration-for-woocommerce' ),
            'wc-on-hold'    => _x( 'On hold', 'Order status', 'jetapi-integration-for-woocommerce' ),
            'wc-completed'  => _x( 'Completed', 'Order status', 'jetapi-integration-for-woocommerce' ),
            'wc-cancelled'  => _x( 'Cancelled', 'Order status', 'jetapi-integration-for-woocommerce' ),
            'wc-refunded'   => _x( 'Refunded', 'Order status', 'jetapi-integration-for-woocommerce' ),
            'wc-failed'     => _x( 'Failed', 'Order status', 'jetapi-integration-for-woocommerce' ),
        );
    }
}

if ( ! function_exists( 'jeti_help_tip' ) ) {
    /**
     * Get help tip HTML
     *
     * @param  string $tip        Help tip text.
     * @param  bool   $allow_html Allow sanitized HTML if true or escape.
     * @return string
     */
    function jeti_help_tip( $tip, $allow_html = false ) {
        if ( $allow_html ) {
            $tip = wp_kses_post( $tip );
        } else {
            $tip = esc_attr( $tip );
        }

        return '<span class="woocommerce-help-tip" data-tip="' . $tip . '"></span>';
    }
}

if ( ! function_exists( 'jeti_get_order_types' ) ) {
    /**
     * Get order types
     *
     * @return array
     */
    function jeti_get_order_types() {
        return array( 'shop_order' );
    }
}

/**
 * Check if given ID is an order
 *
 * @uses \Automattic\WooCommerce\Utilities\OrderUtil
 * @param int $order_id Order ID.
 * @return bool
 */
function jeti_is_order( $order_id ) {
    $order_id = absint($order_id);
    /** @var \Automattic\WooCommerce\Utilities\OrderUtil $order_util */
    if ( class_exists( 'Automattic\WooCommerce\Utilities\OrderUtil' ) && method_exists( 'Automattic\WooCommerce\Utilities\OrderUtil', 'is_order' ) ) {
        return \Automattic\WooCommerce\Utilities\OrderUtil::is_order( $order_id, jeti_get_order_types() );
    }
    return 'shop_order' === get_post_type( $order_id );
}

/**
 * Get order type
 *
 * @uses \Automattic\WooCommerce\Utilities\OrderUtil
 * @param int $order_id Order ID.
 * @return string
 */
function jeti_get_order_type( $order_id ) {
    $order_id = absint($order_id);
    /** @var \Automattic\WooCommerce\Utilities\OrderUtil $order_util */
    if ( class_exists( 'Automattic\WooCommerce\Utilities\OrderUtil' ) && method_exists( 'Automattic\WooCommerce\Utilities\OrderUtil', 'get_order_type' ) ) {
        return \Automattic\WooCommerce\Utilities\OrderUtil::get_order_type( $order_id );
    }
    return get_post_type( $order_id );
}

/**
 * Update order meta data
 *
 * @param int    $order_id Order ID.
 * @param string $meta_key Meta key.
 * @param mixed  $meta_value Meta value.
 */
function jeti_update_order_meta( $order_id, $meta_key, $meta_value ) {
    $order_id = absint($order_id);
    $meta_key = sanitize_key($meta_key);
    
    $order = jeti_get_order( $order_id );
    if ( $order ) {
        $order->update_meta_data( $meta_key, wp_kses_post($meta_value) );
        $order->save();
    }
}

/**
 * Get order meta data
 *
 * @param int    $order_id Order ID.
 * @param string $meta_key Meta key.
 * @param bool   $single Whether to return a single value.
 * @return mixed
 */
function jeti_get_order_meta( $order_id, $meta_key, $single = true ) {
    $order_id = absint($order_id);
    $meta_key = sanitize_key($meta_key);
    
    $order = jeti_get_order( $order_id );
    if ( $order ) {
        return $order->get_meta( $meta_key, $single );
    }
    return false;
}

/**
 * Delete order meta data
 *
 * @param int    $order_id Order ID.
 * @param string $meta_key Meta key.
 */
function jeti_delete_order_meta( $order_id, $meta_key ) {
    $order_id = absint($order_id);
    $meta_key = sanitize_key($meta_key);
    
    $order = jeti_get_order( $order_id );
    if ( $order ) {
        $order->delete_meta_data( $meta_key );
        $order->save();
    }
}
