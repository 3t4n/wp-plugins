<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => 'Woo Customizer',
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'woo-customizer',
  'ajax_save'       => true,
  'show_reset_all'  => false,
  'framework_title' => 'Easy Woocommerce Customizer',
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();

// ----------------------------------------
// a option section for options overview  -
// ----------------------------------------
$options[]      = array(
  'name'        => 'add_to_cart_text',
  'title'       => 'Add to Cart Text',
  'icon'        => 'fa fa-shopping-cart',

    // begin: fields
    'fields'      => array(


        array(
            'id'    => 'archive_cart_text',
            'type'  => 'text',
            'title' => __( 'Products Page', 'ewc' ),
            'value' => 'Add to cart',
        ),

        array(
            'id'    => 'single_cart_text',
            'type'  => 'text',
            'title' => __( 'Single Product Page', 'ewc' ),
            'value' => 'Add to cart',
        ),

        array(
            'id'    => 'simple_cart_text',
            'type'  => 'text',
            'title' => __( 'Simple Product Type', 'ewc' ),
            'desc' => __( 'this will override Products Page vale', 'ewc' ),
            //'value' => 'Add to cart',
        ),
        array(
            'id'    => 'variable_cart_text',
            'type'  => 'text',
            'title' => __( 'Variable Product Type', 'ewc' ),
            'desc' => __( 'this will override Products Page vale', 'ewc' ),
            //'value' => 'Add to cart',
        ),        
        array(
            'id'    => 'external_cart_text',
            'type'  => 'text',
            'title' => __( 'External Product Type', 'ewc' ),
            'desc' => __( 'this will override Products Page vale', 'ewc' ),
            //'value' => 'Add to cart',
        ),       
        array(
            'id'    => 'grouped_cart_text',
            'type'  => 'text',
            'title' => __( 'Grouped Product Type', 'ewc' ),
            'desc' => __( 'this will override Products Page vale', 'ewc' ),
            //'value' => 'Add to cart',
        ),        
        
        array(
            'id'    => 'cart_text_by_id',
            'type'  => 'text',
            'title' => __( 'Change by Product ID', 'ewc' ),
            'desc' => __( 'change sinle product cart text using product id ex: 8', 'ewc' ),
        ),
        array(
            'id'    => 'cart_text_by_id_text',
            'type'  => 'text',
            'title' => __( 'Change by Product ID Text', 'ewc' ),
            'desc' => __( 'change sinle product cart text using product id text. ex: I want this!', 'ewc' ),
        ),





    ), // end: fields
);


// ----------------------------------------
// Chekout settings  -
// ----------------------------------------
$options[]      = array(
    'name'        => 'checkout',
    'title'       => 'Checkout',
    'icon'        => 'fa fa-check',

    // begin: fields
    'fields'      => array(


        array(
            'id'      => 'billing_first_name',
            'type'    => 'checkbox',
            'title' => __( 'Remove Billing First Name', 'ewc' ),
        ),
        array(
            'id'      => 'billing_last_name',
            'type'    => 'checkbox',
            'title' => __( 'Remove Billing Last Name', 'ewc' ),
        ),
        array(
            'id'      => 'billing_company',
            'type'    => 'checkbox',
            'title' => __( 'Remove Billing Company', 'ewc' ),
        ), 
        array(
            'id'      => 'billing_address_1',
            'type'    => 'checkbox',
            'title' => __( 'Remove Billing Address 1', 'ewc' ),
        ), 
        array(
            'id'      => 'billing_address_2',
            'type'    => 'checkbox',
            'title' => __( 'Remove Billing Address 2', 'ewc' ),
        ),
        array(
            'id'      => 'billing_city',
            'type'    => 'checkbox',
            'title' => __( 'Remove Billing City', 'ewc' ),
        ),
        array(
            'id'      => 'billing_state',
            'type'    => 'checkbox',
            'title' => __( 'Remove Billing State', 'ewc' ),
        ),
        array(
            'id'      => 'billing_postcode',
            'type'    => 'checkbox',
            'title' => __( 'Remove Billing Post Code', 'ewc' ),
        ),
        array(
            'id'      => 'billing_country',
            'type'    => 'checkbox',
            'title' => __( 'Remove Billing Country', 'ewc' ),
        ),        
        array(
            'id'      => 'billing_phone',
            'type'    => 'checkbox',
            'title' => __( 'Remove Billing Phone', 'ewc' ),
        ),        
                        
        
        
        array(
            'id'      => 'remove_billing_for_0',
            'type'    => 'checkbox',
            'title' => __( 'Remove Billing Fields', 'ewc' ),
            'label'    => __( 'Remove Billing Fields if the product price is $0 or free', 'ewc' ),
        ),
        
        array(
            'id'      => 'remove_order_notes',
            'type'    => 'checkbox',
            'title' => __( 'Remove Order Note', 'ewc' ),
            //'label'    => __( 'Remove Billing Fields if the product price is $0 or free', 'ewc' ),
        ),
        
        array(
            'id'    => 'rename_order_comments',
            'type'  => 'text',
            'title' => __( 'Rename Order Comments', 'ewc' ),
            'desc' => __( 'rename label of for order comments', 'ewc' ),
            'value' => 'Order Notes',
        ),        
        
        array(
            'id'    => 'placeholder_text_order_comments',
            'type'  => 'text',
            'title' => __( 'Change Placeholder Text', 'ewc' ),
            'desc' => __( 'change placeholder text of order comments', 'ewc' ),
        ),
                
        array(
            'id'    => 'custom_checkout_msg',
            'type'  => 'text',
            'title' => __( 'Custom Checkout Message', 'ewc' ),
            'desc' => __( 'add a message before the checkout form. ex: This page is 100% secure.', 'ewc' ),
        ),        
        array(
            'id'    => 'checkout_login_message',
            'type'  => 'text',
            'title' => __( 'Guest Checkout Login Message', 'ewc' ),
            'desc' => __( 'add a message for guest. ex: You need to login first to purchase.', 'ewc' ),
        ),        
        

                
    ), // end: fields
);



// ----------------------------------------
// misc settings  -
// ----------------------------------------
$options[]      = array(
    'name'        => 'misc',
    'title'       => 'Misc',
    'icon'        => 'fa fa-star',

    // begin: fields
    'fields'      => array(
                
    
        array(
            'id'      => 'customer_contact',
            'type'    => 'checkbox',
            'title' => __( 'Enable Customer Contact', 'ewc' ),
            'label'    => __( 'Customers can contact to admin from their My Account page', 'ewc' ),
            'desc' => __( 'try to deactivate and reactivate your theme to flush rewrite if not work.', 'ewc' ),
        ),     
    
    
        array(
            'id'    => 'free_product_text',
            'type'  => 'text',
            'title' => __( 'Change Free Product Price Text', 'ewc' ),
            'value' => 'Free!',
        ),
        
        array(
            'id'    => 'sale_text',
            'type'  => 'text',
            'title' => __( 'Sale Text', 'ewc' ),
            'value' => 'Sale!',
        ),        
        
        array(
            'id'    => 'search_placeholder',
            'type'  => 'text',
            'title' => __( 'Search Placeholder Text Change', 'ewc' ),
            'value' => 'Search Products',
        ),
        
        
        
        
         
        array(
            'id'      => 'remove_popularity',
            'type'    => 'checkbox',
            'title' => __( 'Remove Sort by popularity', 'ewc' ),
            'label'    => __( 'remove popularity option from product sorting', 'ewc' ),
        ),          
        array(
            'id'      => 'remove_rating',
            'type'    => 'checkbox',
            'title' => __( 'Remove Sort by average rating', 'ewc' ),
            'label'    => __( 'remove rating option from product sorting', 'ewc' ),
        ),        
        array(
            'id'      => 'remove_date',
            'type'    => 'checkbox',
            'title' => __( 'Remove Sort by newness', 'ewc' ),
            'label'    => __( 'remove date option from product sorting', 'ewc' ),
        ),   
        array(
            'id'      => 'remove_price',
            'type'    => 'checkbox',
            'title' => __( 'Remove Sort by price', 'ewc' ),
            'label'    => __( 'remove price option from product sorting', 'ewc' ),
        ),      
        
        
        array(
            'id'      => 'remove_related_products',
            'type'    => 'checkbox',
            'title' => __( 'Remove Related Products', 'ewc' ),
        ), 
        
        array(
            'id'      => 'remove_shop_breadcrumb',
            'type'    => 'checkbox',
            'title' => __( 'Remove Shop Breadcrumb', 'ewc' ),
        ),        
        
              
                
    ), // end: fields
);



/*

// ----------------------------------------
// HTML settings  -
// ----------------------------------------
$options[]      = array(
    'name'        => 'html',
    'title'       => 'HTML',
    'icon'        => 'fa fa-star',

    // begin: fields
    'fields'      => array(
                
        array(
            'id'    => 'html',
            'type'  => 'html',
            'wrap_class'  => 'html_css',
            //'title' => __( 'Change Free Product Price Text', 'ewc' ),
        ),
           
                
    ), // end: fields
);

*/



CSFramework::instance( $settings, $options );