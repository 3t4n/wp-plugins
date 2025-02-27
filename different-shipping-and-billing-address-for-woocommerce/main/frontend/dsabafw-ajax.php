<?php
// Load All Actions
add_action( 'init', 'DSABAFW_add_action_and_filters_load');
function DSABAFW_add_action_and_filters_load() {
  global $wpdb,$dsabafw_comman;
  if($dsabafw_comman['dsabafw_user_role_enable_disable'] == 'yes'){
    $user = wp_get_current_user();
    $user_roles = get_option('different_roles_select'); 
    if(!empty($user->roles) && !empty($user_roles)) {
      $current_user = $user->roles[0];
      if (in_array($current_user, $user_roles)) {
        $charset_collate = $wpdb->get_charset_collate();
        $tablename = $wpdb->prefix.'dsabafw_billingadress'; 
        $sql = "CREATE TABLE $tablename (
          id mediumint(9) NOT NULL AUTO_INCREMENT,
          userid TEXT NOT NULL,
          userdata TEXT NOT NULL,
          type TEXT NOT NULL,
          Defalut int  DEFAULT '0',
          PRIMARY KEY (id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );

        add_filter( 'woocommerce_account_menu_items', 'dsabafw_wc_address_book_add_to_menu' ,10);
        add_action( 'woocommerce_account_edit-address_endpoint','dsabafw_my_account_endpoint_content');
        add_action('wp_footer', 'dsabafw_popup_div_footer' );
        add_action('wp_ajax_productscommentsbilling', 'dsabafw_billing_popup_open' );
        add_action('wp_ajax_nopriv_productscommentsbilling', 'dsabafw_billing_popup_open');
        add_action('wp_ajax_productscommentsshipping', 'dsabafw_shipping_popup_open' );
        add_action('wp_ajax_nopriv_productscommentsshipping', 'dsabafw_shipping_popup_open');
        
        
          add_action('woocommerce_before_checkout_billing_form', 'DSABAFW_all_billing_address');

    
          add_action('woocommerce_before_checkout_shipping_form', 'DSABAFW_all_shipping_address');

        add_action('wp_ajax_productscommentsbilling_select', 'dsabafw_billing_data_select' );
        add_action('wp_ajax_nopriv_productscommentsbilling_select', 'dsabafw_billing_data_select');
        add_action('wp_ajax_productscommentsshipping_select', 'dsabafw_shipping_data_select' );
        add_action('wp_ajax_nopriv_productscommentsshipping_select', 'dsabafw_shipping_data_select');
        add_action('wp_ajax_dsabafw_validate_billing_form_fields', 'dsabafw_validate_billing_form_fields_func' );
        add_action('wp_ajax_nopriv_dsabafw_validate_billing_form_fields', 'dsabafw_validate_billing_form_fields_func');
        add_action('wp_ajax_dsabafw_validate_shipping_form_fields', 'dsabafw_validate_shipping_form_fields_func' );
        add_action('wp_ajax_nopriv_dsabafw_validate_shipping_form_fields', 'dsabafw_validate_shipping_form_fields_func');
        add_action('wp_ajax_dsabafw_validate_edit_billing_form_fields', 'dsabafw_validate_edit_billing_form_fields_funccc' );
        add_action('wp_ajax_nopriv_dsabafw_validate_edit_billing_form_fields', 'dsabafw_validate_edit_billing_form_fields_funccc');
        add_action('wp_ajax_dsabafw_validate_edit_shipping_form_fields', 'dsabafw_validate_edit_shipping_form_fields_funcssss' );
        add_action('wp_ajax_nopriv_dsabafw_validate_edit_shipping_form_fields', 'dsabafw_validate_edit_shipping_form_fields_funcssss');
        add_action('wp_ajax_dsabafw_default_address', 'dsabafw_default_address' );
        add_action('wp_ajax_nopriv_dsabafw_default_address', 'dsabafw_default_address');
        add_action('wp_ajax_dsabafw_default_address_shipping', 'dsabafw_default_address_shipping');
        add_action('wp_ajax_nopriv_dsabafw_default_address_shipping', 'dsabafw_default_address_shipping');

        add_action( 'wp', 'DSABAFW_save_optionsss');
      }                                  
    }
  }else{
    $charset_collate = $wpdb->get_charset_collate();
    $tablename = $wpdb->prefix.'dsabafw_billingadress'; 
    $sql = "CREATE TABLE $tablename (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      userid TEXT NOT NULL,
      userdata TEXT NOT NULL,
      type TEXT NOT NULL,
      Defalut int  DEFAULT '0',
      PRIMARY KEY (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_filter( 'woocommerce_account_menu_items', 'dsabafw_wc_address_book_add_to_menu' ,10);
    add_action( 'woocommerce_account_edit-address_endpoint','dsabafw_my_account_endpoint_content');
    add_action('wp_footer', 'dsabafw_popup_div_footer' );
    add_action('wp_ajax_productscommentsbilling', 'dsabafw_billing_popup_open' );
    add_action('wp_ajax_nopriv_productscommentsbilling', 'dsabafw_billing_popup_open');
    add_action('wp_ajax_productscommentsshipping', 'dsabafw_shipping_popup_open' );
    add_action('wp_ajax_nopriv_productscommentsshipping', 'dsabafw_shipping_popup_open');
    
    if ($dsabafw_comman['dsabafw_select_address_position'] == 'billing_before_form_data') {
      add_action('woocommerce_before_checkout_billing_form', 'DSABAFW_all_billing_address');
    }elseif ($dsabafw_comman['dsabafw_select_address_position'] == 'billing_after_form_data'){
      add_action('woocommerce_after_checkout_billing_form', 'DSABAFW_all_billing_address');
    }

    if ($dsabafw_comman['dsabafw_select_shipping_address_position'] == 'shipping_before_form_data') {
      add_action('woocommerce_before_checkout_shipping_form', 'DSABAFW_all_shipping_address');
    }elseif ($dsabafw_comman['dsabafw_select_shipping_address_position'] == 'shipping_after_form_data'){
      add_action('woocommerce_after_checkout_shipping_form', 'DSABAFW_all_shipping_address');
    }

    add_action('wp_ajax_productscommentsbilling_select', 'dsabafw_billing_data_select' );
    add_action('wp_ajax_nopriv_productscommentsbilling_select', 'dsabafw_billing_data_select');
    add_action('wp_ajax_productscommentsshipping_select', 'dsabafw_shipping_data_select' );
    add_action('wp_ajax_nopriv_productscommentsshipping_select', 'dsabafw_shipping_data_select');
    add_action('wp_ajax_dsabafw_validate_billing_form_fields', 'dsabafw_validate_billing_form_fields_func' );
    add_action('wp_ajax_nopriv_dsabafw_validate_billing_form_fields', 'dsabafw_validate_billing_form_fields_func');
    add_action('wp_ajax_dsabafw_validate_shipping_form_fields', 'dsabafw_validate_shipping_form_fields_func' );
    add_action('wp_ajax_nopriv_dsabafw_validate_shipping_form_fields', 'dsabafw_validate_shipping_form_fields_func');
    add_action('wp_ajax_dsabafw_validate_edit_billing_form_fields', 'dsabafw_validate_edit_billing_form_fields_funccc' );
    add_action('wp_ajax_nopriv_dsabafw_validate_edit_billing_form_fields', 'dsabafw_validate_edit_billing_form_fields_funccc');
    add_action('wp_ajax_dsabafw_validate_edit_shipping_form_fields', 'dsabafw_validate_edit_shipping_form_fields_funcssss' );
    add_action('wp_ajax_nopriv_dsabafw_validate_edit_shipping_form_fields', 'dsabafw_validate_edit_shipping_form_fields_funcssss');
    add_action('wp_ajax_dsabafw_default_address', 'dsabafw_default_address' );
    add_action('wp_ajax_nopriv_dsabafw_default_address', 'dsabafw_default_address');
    add_action('wp_ajax_dsabafw_default_address_shipping', 'dsabafw_default_address_shipping' );
    add_action('wp_ajax_nopriv_dsabafw_default_address_shipping', 'dsabafw_default_address_shipping');

    add_action( 'wp', 'DSABAFW_save_optionsss');
  }
}