<?php
if ( ! function_exists( 'hawo_check_woocommerce' ) ) {
	function hawo_check_woocommerce() {
		return class_exists( 'WooCommerce', false );
	}
}

if ( ! function_exists( 'hawo_is_WC_supported' ) ) {
	function hawo_is_WC_supported() {
		// Ensure WC is loaded before checking version
		return ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, HAWO_MIN_WC_VERSION, '>=' ) );
	}
}


/**
 * Register Conditional Logic.
 *
 * @since 1.0.0
 */
if( ! function_exists('hawo_post_init') ) {
    function hawo_post_init() {
		$post_type = 'hawo-rules';
        $labels = array(
            'name'                  => _x( 'Conditional Rules', 'Conditional Rules', 'advanced-autocomplete-orders-for-woocommerce' ),
            'singular_name'         => _x( 'Conditional Rule', 'Conditional Rules', 'advanced-autocomplete-orders-for-woocommerce' ),
            'menu_name'             => _x( 'Conditional Rules', 'Conditional Rules', 'advanced-autocomplete-orders-for-woocommerce' ),
            'name_admin_bar'        => _x( 'Conditional Rules', 'Conditional Rules', 'advanced-autocomplete-orders-for-woocommerce' ),
            'add_new'               => esc_html__( 'Add New Rule', 'advanced-autocomplete-orders-for-woocommerce' ),
            'add_new_item'          => esc_html__( 'Add New Rule', 'advanced-autocomplete-orders-for-woocommerce' ),
            'new_item'              => esc_html__( 'New Rule', 'advanced-autocomplete-orders-for-woocommerce' ),
            'edit_item'             => esc_html__( 'Edit Rule', 'advanced-autocomplete-orders-for-woocommerce' ),
            'view_item'             => esc_html__( 'View Rule', 'advanced-autocomplete-orders-for-woocommerce' ),
            'all_items'             => esc_html__( 'All Rules', 'advanced-autocomplete-orders-for-woocommerce' ),
            'search_items'          => esc_html__( 'Search Rules', 'advanced-autocomplete-orders-for-woocommerce' ),
            'parent_item_colon'     => esc_html__( 'Parent Rules:', 'advanced-autocomplete-orders-for-woocommerce' ),
            'not_found'             => esc_html__( 'No rule found.', 'advanced-autocomplete-orders-for-woocommerce' ),
            'not_found_in_trash'    => esc_html__( 'No rules found in Trash.', 'advanced-autocomplete-orders-for-woocommerce' ),
            'insert_into_item'      => _x( 'Insert into rules', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'advanced-autocomplete-orders-for-woocommerce' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this rules', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'advanced-autocomplete-orders-for-woocommerce' ),
            'filter_items_list'     => _x( 'Filter rules list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'advanced-autocomplete-orders-for-woocommerce' ),
            'items_list_navigation' => _x( 'Rules list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'advanced-autocomplete-orders-for-woocommerce' ),
            'items_list'            => _x( 'Rules list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'advanced-autocomplete-orders-for-woocommerce' ),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => $post_type ),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => null,
            'show_in_rest'       => false,
            'supports'           => array( 'title' ),
            'taxonomies'         => array( ),
            'menu_icon'          => 'dashicons-editor-help'
        );

        register_post_type( $post_type, $args );
		remove_post_type_support($post_type, 'custom-fields');
    }
    // add_action( 'init', 'hawo_post_init' );
}

function hawo_get_condition_options() {
    $condition_options = array(
        'order' => array(
            'label' => __('Order', 'advanced-autocomplete-orders-for-woocommerce'),
            'options' => array(
                'order_products_types' => __('Order Products Types', 'advanced-autocomplete-orders-for-woocommerce'),
                'order_products' => __('Order Products', 'advanced-autocomplete-orders-for-woocommerce'),
                'order_status' => __('Order Status', 'advanced-autocomplete-orders-for-woocommerce'),
                'order_total_price' => __('Order Total Price', 'advanced-autocomplete-orders-for-woocommerce'),
                'order_total_quantity' => __('Order Total Quantity', 'advanced-autocomplete-orders-for-woocommerce'),
                'order_date' => __('Order Date', 'advanced-autocomplete-orders-for-woocommerce'),
                'days_after_order' => __('Days after Order', 'advanced-autocomplete-orders-for-woocommerce'),
                'order_product_attribute' => __('Order Products Attribute', 'advanced-autocomplete-orders-for-woocommerce'),
                'is_paid_order' => __('Is Paid Order', 'advanced-autocomplete-orders-for-woocommerce'),
                'is_subscription_order' => __('Is Subscription Order', 'advanced-autocomplete-orders-for-woocommerce'),
                'order_meta_key' => __('Order Meta Key', 'advanced-autocomplete-orders-for-woocommerce'),
                'order_meta_value' => __('Order Meta Value', 'advanced-autocomplete-orders-for-woocommerce'),
            )
        ),
        'coupon' => array(
            'label' => __('Coupon', 'advanced-autocomplete-orders-for-woocommerce'),
            'options' => array(
                'order_coupon_id' => __('Coupon ID', 'advanced-autocomplete-orders-for-woocommerce'),
            )
        ),
        'payment' => array(
            'label' => __('Payment', 'advanced-autocomplete-orders-for-woocommerce'),
            'options' => array(
                'order_payment_gateway' => __('Payment Gateway', 'advanced-autocomplete-orders-for-woocommerce'),
                'order_payment_class' => __('Payment Class', 'advanced-autocomplete-orders-for-woocommerce'),
                'order_payment_method' => __('Payment Method', 'advanced-autocomplete-orders-for-woocommerce'),
            )
        ),
        'shipping' => array(
            'label' => __('Shipping', 'advanced-autocomplete-orders-for-woocommerce'),
            'options' => array(
                'shipping_class' => __('Shipping Class', 'advanced-autocomplete-orders-for-woocommerce'),
                'shipping_method' => __('Shipping Method', 'advanced-autocomplete-orders-for-woocommerce'),
                'shipping_zone' => __('Shipping Zone', 'advanced-autocomplete-orders-for-woocommerce'),
                'shipping_email' => __('Shipping Email', 'advanced-autocomplete-orders-for-woocommerce'),
                'shipping_phone' => __('Shipping Phone', 'advanced-autocomplete-orders-for-woocommerce'),
                'shipping_country' => __('Shipping Country', 'advanced-autocomplete-orders-for-woocommerce'),
                'shipping_postcode' => __('Shipping Postcode', 'advanced-autocomplete-orders-for-woocommerce'),
            )
        ),
        'billing' => array(
            'label' => __('Billing', 'advanced-autocomplete-orders-for-woocommerce'),
            'options' => array(
                'billing_email' => __('Billing Email', 'advanced-autocomplete-orders-for-woocommerce'),
                'billing_phone' => __('Billing Phone', 'advanced-autocomplete-orders-for-woocommerce'),
                'billing_country' => __('Billing Country', 'advanced-autocomplete-orders-for-woocommerce'),
                'billing_postcode' => __('Billing Postcode', 'advanced-autocomplete-orders-for-woocommerce'),
            )
        ),
        'customer' => array(
            'label' => __('Customer', 'advanced-autocomplete-orders-for-woocommerce'),
            'options' => array(
                'customer_role' => __('Customer Role', 'advanced-autocomplete-orders-for-woocommerce'),
                'customer_email' => __('Customer Email', 'advanced-autocomplete-orders-for-woocommerce'),
                'has_customer_purchased_before' => __('Customer Purchased Before', 'advanced-autocomplete-orders-for-woocommerce'),
            )
        ),
        'server' => array(
            'label' => __('Server', 'advanced-autocomplete-orders-for-woocommerce'),
            'options' => array(
                'browser' => __('Browser (Chrome, Mozilla, Safari)', 'advanced-autocomplete-orders-for-woocommerce'),
                'protocol' => __('HTTP/HTTPS', 'advanced-autocomplete-orders-for-woocommerce'),
            )
        ),
    );

    return apply_filters('hawo_get_condition_options', $condition_options);
}