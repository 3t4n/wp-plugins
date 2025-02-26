<?php
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    function addonp_custom_settings_load_js(){
        wp_enqueue_script( 'addonp-switchery', ADDONP_PLUGIN_URL . '/assets/js/switchery.min.js',  array(), ADDONP_VERSION );
        wp_enqueue_script( 'addonp-select2', ADDONP_PLUGIN_URL . '/assets/js/jquery.select2.js', array( 'jquery' ), ADDONP_VERSION );
        wp_enqueue_script( 'addonp-select2-custom', ADDONP_PLUGIN_URL . '/assets/js/addonp.custom.js', array( 'addonp-select2' ), ADDONP_VERSION );
    }

    function addonp_custom_settings_load_css( $hook ){
        global $addon_settings;

        if( $addon_settings != $hook ) {
            return;
            } else {
                wp_register_style( 'addonp-select2-css', ADDONP_PLUGIN_URL . '/assets/css/select2.css', array(), ADDONP_VERSION );
                wp_enqueue_style( 'addonp-select2-css' );
           }
    }
    add_action( 'admin_enqueue_scripts', 'addonp_custom_settings_load_css' );

    function addonp_custom_settings_load_js_front() {
        global $post;

        if ( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'addonpayments' ) ) {
            wp_enqueue_script( 'addonp-select2-front', ADDONP_PLUGIN_URL . '/assets/js/jquery.select2.js', array( 'jquery' ), ADDONP_VERSION );
            wp_enqueue_script( 'addonp-select2-custom-front', ADDONP_PLUGIN_URL . '/assets/js/addonp.front.custom.js', array( 'addonp-select2-front' ), ADDONP_VERSION );
            wp_enqueue_script( 'jquery-ui-accordion' );
            wp_register_style( 'addonp-select2-css-front', ADDONP_PLUGIN_URL . '/assets/css/select2.css', array(), ADDONP_VERSION );
            wp_register_style( 'addonp-pure-css', ADDONP_PLUGIN_URL . '/assets/css/pure-min.css', array(), ADDONP_VERSION );
            wp_register_style( 'addonp-custom-css-front', ADDONP_PLUGIN_URL . '/assets/css/custom-css-front.css', array(), ADDONP_VERSION );
            wp_enqueue_style(  'addonp-select2-css-front' );
            wp_enqueue_style(  'addonp-pure-css'          );
            wp_enqueue_style(  'addonp-custom-css-front'  );
        }
    }
    add_action( 'wp_enqueue_scripts', 'addonp_custom_settings_load_js_front');

    function addonp_admin_notice_retention_error() {
        $retention_set     = get_option('addonp_apply_retention_field');
        $retention_percent = get_option('addonp_percent_retention_field');
        $class             = 'notice notice-error';
        $message           = __( 'AddonPayments Error: Retention is active, but you dont set Retention %. Please set it', 'addonpayments' );

        if ( $retention_set == '1' && empty( $retention_percent ) ) {

            printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );

            }
    }

    function addonp_admin_notice_tax_error() {
        $tax_set     = get_option('addonp_price_with_tax_field');
        $tax_percent = get_option('addonp_percent_tax_field');
        $class       = 'notice notice-error';
        $message     = __( 'AddonPayments Error: Tax is active, but you dont set Tax %. Please set it', 'addonpayments' );

        if ( $tax_set == '1' && empty( $tax_percent ) ) {

            printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );

            }
    }
    add_action( 'admin_notices', 'addonp_admin_notice_retention_error' );
    add_action( 'admin_notices', 'addonp_admin_notice_tax_error' );

    // Errors

    function addonp_get_error( $result ) {

        if ( ( $result >= 100 ) &&  ( $result <= 199 ) ) {
             if ( $result == '101' ) {
                 $text_result = __( 'Declined by Bank – generally insufficient funds or incorrect card details (e.g. expiry date, card security code)', 'addonpayments' );
             } elseif ( $result == '102' ) {
                 $text_result = __( 'Referral to Bank (usually treated as a standard decline for ecommerce systems)', 'addonpayments' );
             } elseif ( $result == '103' ) {
                 $text_result = __( 'Card reported lost or stolen.', 'addonpayments' );
             } elseif ( $result == '107' ) {
                 $text_result = __( 'The transaction has been blocked as potentially fraudulent by our fraud management configuration', 'addonpayments' );
             } else {
                 $text_result = __( 'Declined by Bank', 'addonpayments' );
             }
        } elseif ( ( $result >= 200 ) &&  ( $result <= 299 ) ) {
            $text_result = __( 'Error with bank systems – Please, try again later.', 'addonpayments' );
        } elseif ( ( $result >= 300 ) &&  ( $result <= 399 ) ) {
            $text_result = __( 'Error with AddonPayments systems – Please, try again later.', 'addonpayments' );
        } elseif ( $result == 666 ) {
            $text_result = __( 'Account deactivated – The AddonPayments account has been suspended. Please contact AddPayments.', 'addonpayments' );
        }
        return $text_result;
    }

    function addonp_get_secret(){

	    $test = get_option( 'addonp_test_mode_field' );

	    if ( $test == '1' ) {
		    $secret = get_option( 'addonp_shared_secret_test_field' );
		    } else {
			    $secret = get_option( 'addonp_shared_secret_field' );
				}
        return $secret;
    }

    function addonp_get_merchand_id(){

	    $test = get_option( 'addonp_test_mode_field' );

	    if ( $test == '1' ) {
		    $merchand_id = get_option( 'addonp_merchant_id_test_field' );
		    } else {
			    $merchand_id = get_option( 'addonp_merchant_id_field' );
				}
        return $merchand_id;
	}

	function addonp_get_account(){

	    $test = get_option( 'addonp_test_mode_field' );

	    if ( $test == '1' ) {
		    $account = get_option( 'addonp_account_test_field' );
		    } else {
			    $account = get_option( 'addonp_account_field' );
				}
        return $account;
	}

    // Add Shortcode
    function addonp_price_shortcode( $atts ) {
        global $wp;

        $user_type           = get_option( 'addonp_user_type_label_field'                                            );
        $tax_active          = get_option( 'addonp_price_with_tax_field'                                             );
        $currency_sign       = get_option( 'addonp_currency_sign_field'                                              );
        $currency_place      = get_option( 'addonp_place_currency_sign_field'                                        );
        $price_with_tax      = get_option( 'addonp_price_with_or_without_tax_field'                                  );
        $show_price_with_tax = get_option( 'addonp_show_price_with_tax_field'                                        );
        $percent_tax         = get_option( 'addonp_percent_tax_field'                                                );
        $text_excluded_tax   = get_option( 'addonp_post_price_excluded_tax_field'                                    );
        $text_included_tax   = get_option( 'addonp_post_price_included_tax_field'                                    );
        $retention           = get_option( 'addonp_apply_retention_field'                                            );
        $show_text_retention = get_option( 'addonp_show_text_retention_field'                                        );
        $text_retention      = get_option( 'addonp_text_active_retention_field'                                      );
        $text_buy_now        = get_option( 'addonp_text_buy_now_field'                                               );
        $text_pay_now        = get_option( 'addonp_text_pay_now'                                                     );
        $post_permanlink     = home_url( add_query_arg( array(), $wp->request )                                      );
        $nonce_field         = wp_nonce_field( 'addonpayments_action', 'addonpayments_nonce_field'                   );
        $shipping_fields     = maybe_unserialize( get_option( 'addonp_shipping_fields_to_screen_front_label_field' ) );
        $billing_fields      = maybe_unserialize( get_option( 'addonp_billing_fields_to_screen_front_label_field'  ) );
        $show_comments       = get_option( 'addonp_coment1_fields_to_screen_front_label_field'                       );

        // Attributes
        $atts = shortcode_atts(
            array(
                'id'      => '',
                'product' => '',
                'price'   => '',
            ),
            $atts
        );

        if ( $test == '1' ) {
            $url = 'https://hpp.sandbox.addonpayments.com/pay';
        } else {
            $url = 'https://hpp.addonpayments.com/pay';
        }

        //Base Price

        $price            = $atts['price'];
        $id_product_block = $atts['id'];

        //Tax

        if ( $tax_active == '1' && $price_with_tax == 'withouttax' && $show_price_with_tax == '1' ) {
            $tax = ( $price * ( $percent_tax / 100 ) );
            if ( $text_included_tax ) {
                $post_price = $text_included_tax;
                } else {
                    $post_price = __( 'Included Tax', 'addonpayments' );
                }
        } elseif ( $tax_active == '1' && $price_with_tax == 'withouttax' && ( empty( $show_price_with_tax ) ||  $show_price_with_tax == '0' ) ) {
            $tax = '0';
            if ( $text_excluded_tax ) {
                $post_price = $text_excluded_tax;
                } else {
                    $post_price = __( 'Included Tax', 'addonpayments' );
                }
        } elseif ( $tax_active == '1' && $price_with_tax == 'withtax' && $show_price_with_tax == '1' ) {
            $tax = '0';
            if ( $text_included_tax ) {
                $post_price = $text_included_tax;
                } else {
                    $post_price = __( 'Included Tax', 'addonpayments' );
                }
        } elseif ( $tax_active == '1' && $price_with_tax == 'withtax' && ( empty( $show_price_with_tax ) ||  $show_price_with_tax == '0' ) ) {
            $tax = '0';
            if ( $text_excluded_tax ) {
                $post_price = $text_excluded_tax;
                } else {
                    $post_price = __( 'Included Tax', 'addonpayments' );
                }
        } elseif ( $tax_active == '0' ||  empty( $tax_active ) ) {
            $tax = '0';
            $post_price = '';
        }

        // Retention

        if ( $retention == '1' && $show_text_retention == '1' ) {
            if ( empty( $text_retention ) ) {
            $reten_field = "<span id='sub-text-price'>" . __('(A Retention will be applied if is needed)', 'addonpayments' ) . "</span><br />";
            } else {
                $reten_field = "<span id='sub-text-price'>" . $text_retention . "</span><br />";
            }
        } else {
            $reten_field = '';
        }

        // Currency

        if ( $currency_place == 'front_space' ){
            $currency_front = $currency_sign  . ' ';
            $currency_back = '';
        } elseif ( $currency_place == 'front_no_space' ) {
            $currency_front = $currency_sign;
            $currency_back = '';
        } elseif ( $currency_place == 'back_no_space' ) {
            $currency_front = '';
            $currency_back = $currency_sign;
        } elseif ( $currency_place == 'back_space' ){
            $currency_front = '';
            $currency_back = ' ' . $currency_sign;
        }

        $final_price_before_point = $price + $tax;
        $price_front   = number_format( $final_price_before_point, 2, ',', '.');

        if ( isset( $_POST['PROD_ID'] ) && ( $_POST['PROD_ID'] == $atts['product'] ) && isset( $_POST['addonpayments_nonce_field'] ) && wp_verify_nonce( $_POST['addonpayments_nonce_field'], 'addonpayments_action' ) ) {

            $test                             = '';
            $merchand_id                      = '';
            $secret                           = '';
            $tax_active                       = '';
            $price_with_tax                   = '';
            $percent_tax                      = '';
            $retention                        = '';
            $percent_retention                = '';
            $currency                         = '';
            $account                          = '';
            $auto_set_flag                    = '';
            $timestamp                        = '';
            $str                              = '';
            $orderid                          = '';
            $post_permanlink                  = '';
            $countries_to_appply_tax          = '';
            $countries_to_appply_retention    = '';
            $apply_retention_to_private       = '';
            $apply_retention_to_business      = '';
            $apply_retention_to_self_employed = '';


            // $_POST

            if ( $_POST['user_type']                ) $user_type                = sanitize_text_field( $_POST['user_type']                );
            if ( $_POST['Full_Name']                ) $Full_Name                = sanitize_text_field( $_POST['Full_Name']                );
            if ( $_POST['shipping_country']         ) $shipping_country         = sanitize_text_field( $_POST['shipping_country']         );
            if ( $_POST['shipping_state']           ) $shipping_state           = sanitize_text_field( $_POST['shipping_state']           );
            if ( $_POST['shipping_postcode']        ) $shipping_postcode        = sanitize_text_field( $_POST['shipping_postcode']        );
            if ( $_POST['shipping_address']         ) $shipping_address         = sanitize_text_field( $_POST['shipping_address']         );
            if ( $_POST['shipping_email']           ) $shipping_email           = sanitize_text_field( $_POST['shipping_email']           );
            if ( $_POST['full_name_billing']        ) $full_name_billing        = sanitize_text_field( $_POST['full_name_billing']        );
            if ( $_POST['nic_tic_vat_name_billing'] ) $nic_tic_vat_name_billing = sanitize_text_field( $_POST['nic_tic_vat_name_billing'] );
            if ( $_POST['billing_country']          ) $billing_country          = sanitize_text_field( $_POST['billing_country']          );
            if ( $_POST['billing_state']            ) $billing_state            = sanitize_text_field( $_POST['billing_state']            );
            if ( $_POST['billing_postcode']         ) $billing_postcode         = sanitize_text_field( $_POST['billing_postcode']         );
            if ( $_POST['billing_address']          ) $billing_address          = sanitize_text_field( $_POST['billing_address']          );
            if ( $_POST['billing_email']            ) $billing_email            = sanitize_text_field( $_POST['billing_email']            );
            if ( $_POST['PROD_ID']                  ) $PROD_ID                  = sanitize_text_field( $_POST['PROD_ID']                  );
            if ( $_POST['COMMENT1']                 ) $COMMENT1                 = sanitize_text_field( $_POST['COMMENT1']                 );
            if ( $_POST['base_price']               ) $base_price               = sanitize_text_field( $_POST['base_price']               );
            if ( $_POST['post_permanlink']          ) $post_permanlink          = sanitize_text_field( $_POST['post_permanlink']          );
            if ( $_POST['billing_phone']            ) $billing_phone            = sanitize_text_field( $_POST['billing_phone']            );
            if ( $_POST['shipping_phone']           ) $shipping_phone           = sanitize_text_field( $_POST['shipping_phone']           );
            if ( $_POST['billing_city']             ) $billing_city             = sanitize_text_field( $_POST['billing_city']             );
            if ( $_POST['shipping_city']            ) $shipping_city            = sanitize_text_field( $_POST['shipping_city']            );


            // Saved Options

            $test                             = get_option( 'addonp_test_mode_field'                 );
            $merchand_id                      = addonp_get_merchand_id();
            $secret                           = addonp_get_secret();
            $tax_active                       = get_option( 'addonp_price_with_tax_field'            );
            $price_with_tax                   = get_option( 'addonp_price_with_or_without_tax_field' );
            $percent_tax                      = get_option( 'addonp_percent_tax_field'               );
            $retention                        = get_option( 'addonp_apply_retention_field'           );
            $percent_retention                = get_option( 'addonp_percent_retention_field'         );
            $currency                         = get_option( 'addonp_currency_field'                  );
            $account                          = addonp_get_account();
            $auto_set_flag                    = get_option( 'addonp_auto_set_flag_field'             );
            $timestamp                        = date("YmdHis");
            $str                              = 'abcdefghijklmnABCEDEFGHIJKLMNO1234567890';
            $orderid                          = str_shuffle( $str );
            $countries_to_appply_tax          = maybe_unserialize( get_option( 'addonp_country_tax_label_field' )       );
            $countries_to_appply_retention    = maybe_unserialize( get_option( 'addonp_country_retention_label_field' ) );
            $apply_retention_to_private       = get_option( 'addonp_apply_retention_to_private_field'                   );
            $apply_retention_to_business      = get_option( 'addonp_apply_retention_to_business_field'                  );
            $apply_retention_to_self_employed = get_option( 'addonp_apply_retention_to_self_employed_field'             );
            $text_pay_now_addonP              = get_option( 'addonp_text_pay_addonpayments'                             );
            $text_continue_to_pay             = get_option( 'addonp_text_continue_to_pay_button_field'                  );
            $addonpayment_language            = get_option( 'addonp_addonpayments_language_field'                       );


            if ( ! empty( $text_pay_now_addonP ) ) {
                $text_pay_now_addonP_buttom = $text_pay_now_addonP;
            } else {
                $text_pay_now_addonP_buttom = __( 'Pay Now', 'adonpayments' );
            }

            if ( ! empty( $text_continue_to_pay ) ) {
                $text_continue_to_pay_buttom = $text_continue_to_pay;
            } else {
                $text_continue_to_pay_buttom = __( 'Continue to AddonPayments to Pay', 'adonpayments' );
            }

            if ( $billing_country ) {
                $country = $billing_country;
            } else {
                $country = $shipping_country;
            }

            if ( $apply_retention_to_private == '1' && $user_type == 'private_user' ) {
                $apply_user_type = true;
            } elseif ( $apply_retention_to_business == '1' &&  $user_type == 'business' ) {
                $apply_user_type = true;
            } elseif ( $apply_retention_to_self_employed == '1' &&  $user_type == 'self_employed' ) {
                $apply_user_type = true;
            } else {
                $apply_user_type = false;
            }

            if ( ! empty( $countries_to_appply_tax ) && in_array( $country, $countries_to_appply_tax ) && $tax_active == '1' && $price_with_tax == 'withouttax' ) {
                $tax = ( $base_price * ( $percent_tax / 100 ) );
            } else {
                $tax = '0';
            }

            if ( ! empty( $countries_to_appply_retention ) && in_array( $country, $countries_to_appply_retention ) && $retention == '1' && $apply_user_type ) {
                $retention = ( $base_price * ( $percent_retention / 100 ) );
            } else {
                $retention = '0';
            }

            $final_price_before_point = $base_price + $tax - $retention;
            $final_price   = number_format( $final_price_before_point, 2, '', '');

            // Create Order

            $Order = wp_insert_post(
                                array(
                                    'post_title'     => 'Ordered:' . ' ' . $PROD_ID . ' ' . 'by' . ' ' . $Full_Name,
                                    'post_type'      => 'addonp_orders',
                                    'post_status'    => 'addonp-pending-paid',
                                    'ping_status'    => 'closed',
                                    'comment_status' => 'closed',
                                    )
                            );

            $update_post = array(
                                   'ID'           => $Order,
                                   'post_title'   => 'Order: #' . $Order . ' ' . 'ordered:' . ' ' . $PROD_ID . ' ' . 'by' . ' ' . $Full_Name,
                                );

            wp_update_post( $update_post );

            // Add meta to Order

            add_post_meta( $Order, '_addonp_order_id',                  $Order,                     true );
            add_post_meta( $Order, '_addonp_user_type',                 $user_type,                 true );
            add_post_meta( $Order, '_addonp_Full_Name',                 $Full_Name,                 true );
            add_post_meta( $Order, '_addonp_shipping_country',          $shipping_country,          true );
            add_post_meta( $Order, '_addonp_shipping_state',            $shipping_state,            true );
            add_post_meta( $Order, '_addonp_shipping_postcode',         $shipping_postcode,         true );
            add_post_meta( $Order, '_addonp_shipping_address',          $shipping_address,          true );
            add_post_meta( $Order, '_addonp_shipping_email',            $shipping_email,            true );
            add_post_meta( $Order, '_addonp_full_name_billing',         $full_name_billing,         true );
            add_post_meta( $Order, '_addonp_nic_tic_vat_name_billing',  $nic_tic_vat_name_billing,  true );
            add_post_meta( $Order, '_addonp_billing_country',           $billing_country,           true );
            add_post_meta( $Order, '_addonp_billing_state',             $billing_state,             true );
            add_post_meta( $Order, '_addonp_billing_postcode',          $billing_postcode,          true );
            add_post_meta( $Order, '_addonp_billing_address',           $billing_address,           true );
            add_post_meta( $Order, '_addonp_billing_email',             $billing_email,             true );
            add_post_meta( $Order, '_addonp_PROD_ID',                   $PROD_ID,                   true );
            add_post_meta( $Order, '_addonp_COMMENT1',                  $COMMENT1,                  true );
            add_post_meta( $Order, '_addonp_base_price',                $base_price,                true );
            add_post_meta( $Order, '_addonp_tax_price',                 $tax,                       true );
            add_post_meta( $Order, '_addonp_tax_apply',                 $percent_tax,               true );
            add_post_meta( $Order, '_addonp_retention_apply',           $percent_retention,         true );
            add_post_meta( $Order, '_addonp_retention_price',           $retention,                 true );
            add_post_meta( $Order, '_addonp_link_where_bought',         $post_permanlink,           true );
            add_post_meta( $Order, '_addonp_final_price_addon',         $final_price,               true );
            add_post_meta( $Order, '_addonp_billing_phone_order',       $billing_phone,             true );
            add_post_meta( $Order, '_addonp_shipping_phone_order',      $shipping_phone,            true );
            add_post_meta( $Order, '_addonp_shipping_city_order',       $shipping_city,             true );
            add_post_meta( $Order, '_addonp_billing_city_order',        $billing_city,              true );


            $string_sha1_1 = sha1( $timestamp . '.' . $merchand_id . '.' . $Order . '.' . $final_price . '.' . $currency );
            $string_sha1_2 = sha1( $string_sha1_1 . '.' . $secret );
            if ( $id_product_block == '' ) {
                $div_form_id = 'addonpayments';
            } else {
                $div_form_id = 'addonpayments' . $id_product_block;
            }

            if ( $test == '1' ) {
                $url = 'https://hpp.sandbox.addonpayments.com/pay';
            } else {
                $url = 'https://hpp.addonpayments.com/pay';
            }

            $post = '<form method="POST" action="' . $url . '" name= "addonpayments" id="' . $div_form_id . '">
                    <input type="hidden" name="TIMESTAMP" value="' . $timestamp . '">
                    <input type="hidden" name="MERCHANT_ID" value="' . $merchand_id . '">
                    <input type="hidden" name="ACCOUNT" value="' . $account . '">
                    <input type="hidden" name="ORDER_ID" value="' . $Order . '">
                    <input type="hidden" name="AMOUNT" value="' . $final_price . '">
                    <input type="hidden" name="CURRENCY" value="' . $currency . '">
                    <input type="hidden" name="SHA1HASH" value="' . $string_sha1_2 . '">
                    <input type="hidden" name="AUTO_SETTLE_FLAG" value="' . $auto_set_flag . '">
                    <input type="hidden" name="COMMENT1" value="' . $COMMENT1 . '">
                    <input type="hidden" name="COMMENT2" value="' . $atts['product'] . '">
                    <input type="hidden" name="SHIPPING_CODE" value="' . $shipping_postcode . '">
                    <input type="hidden" name="SHIPPING_CO" value="' . $shipping_country . '">
                    <input type="hidden" name="BILLING_CODE" value="' . $shipping_postcode . '">
                    <input type="hidden" name="BILLING_CO" value="' . $billing_country . '">
                    <input type="hidden" name="CUST_NUM" value="' . $shipping_email . '">
                    <input type="hidden" name="PROD_ID" value="' . $atts['product'] . '">
                    <input type="hidden" name="HPP_LANG" value="' . $addonpayment_language . '">
                    <input type="hidden" name="HPP_VERSION" value="2">
                    <input type="hidden" name="MERCHANT_RESPONSE_URL" value="' . $post_permanlink . '/#' . $PROD_ID . '">
                    <input type="hidden" name="CARD_PAYMENT_BUTTON" value="' . $text_pay_now_addonP_buttom . '">
                    <button type="submit" class="pure-button pure-input-1-2 pure-button-primary">' . $text_continue_to_pay_buttom . '</button>
                </fieldset>
                    </form>
                <script type="text/javascript">
                    jQuery(document).ready(function($){
                         $("#' . $div_form_id . '").submit();
                    });
                </script>';
            } else {
                $post = '';
            }

        if ( isset( $_POST['RESULT'] ) && ( isset( $_POST['COMMENT2'] ) &&  $_POST['COMMENT2'] == $atts['product'] ) ) {

            if ( isset( $_POST['RESULT'] ) )                $result                 = sanitize_text_field( $_POST['RESULT']                 );
            if ( isset( $_POST['AUTHCODE'] ) )              $authcode               = sanitize_text_field( $_POST['AUTHCODE']               );
            if ( isset( $_POST['MESSAGE'] ) )               $message                = sanitize_text_field( $_POST['MESSAGE']                );
            if ( isset( $_POST['PASREF'] ) )                $pasref                 = sanitize_text_field( $_POST['PASREF']                 );
            if ( isset( $_POST['AVSPOSTCODERESPONSE'] ) )   $avspostcoderesponse    = sanitize_text_field( $_POST['AVSPOSTCODERESPONSE']    );
            if ( isset( $_POST['AVSADDRESSRESPONSE'] ) )    $avsaddressresponse     = sanitize_text_field( $_POST['AVSADDRESSRESPONSE']     );
            if ( isset( $_POST['CVNRESULT'] ) )             $cvnresult              = sanitize_text_field( $_POST['CVNRESULT']              );
            if ( isset( $_POST['ACCOUNT'] ) )               $account                = sanitize_text_field( $_POST['ACCOUNT']                );
            if ( isset( $_POST['ORDER_ID'] ) )              $order_id               = sanitize_text_field( $_POST['ORDER_ID']               );
            if ( isset( $_POST['TIMESTAMP'] ) )             $timestamp              = sanitize_text_field( $_POST['TIMESTAMP']              );
            if ( isset( $_POST['AMOUNT'] ) )                $amount                 = sanitize_text_field( $_POST['AMOUNT']                 );
            if ( isset( $_POST['BATCHID'] ) )               $batchid                = sanitize_text_field( $_POST['BATCHID']                );
            if ( isset( $_POST['SHA1HASH'] ) )              $sha1hash               = sanitize_text_field( $_POST['SHA1HASH']               );
            if ( isset( $_POST['MERCHANT_RESPONSE_URL'] ) ) $merchand_response_url  = sanitize_text_field( $_POST['MERCHANT_RESPONSE_URL']  );
            if ( isset( $_POST['COMMENT2'] ) )              $product                = sanitize_text_field( $_POST['COMMENT2']               );

            $merchand_id = addonp_get_merchand_id();
            $secret      = addonp_get_secret();
            $final_price = get_post_meta( $order_id, '_addonp_final_price_addon', true );

            $strkey      = 'abcdefghijklmnopqrstuvwxyzABCEDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $randomkey   = str_shuffle( $str );
            $timekey     = date("YmdHis");
            $post_permanlink_return = $merchand_response_url;

            $key_product = $randomkey . $timekey;

            $string_sha1_1 = sha1( $timestamp . '.' . $merchand_id . '.' . $order_id . '.' . $result . '.' . $message . '.' . $pasref . '.' . $authcode );
            $string_sha1_2 = sha1( $string_sha1_1 . '.' . $secret );

            if ( $string_sha1_2 == $sha1hash ) {
                // hash OK
                if (  $result == '00' ) {
                    // Transaction OK
                    if ( $final_price ) {
                        //Price Ok
                        $update_order = array (
                            'ID'            => $order_id,
                            'post_status'   => 'addonp-paid',
                        );

                        wp_update_post( $update_order );

                        add_post_meta( $order_id, '_addonp_order_result',               $result,                true );
                        add_post_meta( $order_id, '_addonp_order_authcode',             $authcode,              true );
                        add_post_meta( $order_id, '_addonp_order_passref',              $pasref,                true );
                        add_post_meta( $order_id, '_addonp_order_passref',              $avspostcoderesponse,   true );
                        add_post_meta( $order_id, '_addonp_order_avsaddressresponse',   $avsaddressresponse,    true );
                        add_post_meta( $order_id, '_addonp_order_cvnresult',            $cvnresult,             true );
                        add_post_meta( $order_id, '_addonp_order_account',              $account,               true );
                        add_post_meta( $order_id, '_addonp_order_batchid',              $batchid,               true );
                        add_post_meta( $order_id, '_addonp_order_key_product',          $key_product,           true );

                        $process = '<div class="addonp-thanks"><a name="' . $product . '"></a>' .
                                            __( 'Thank you for your purchase', 'addonpayments' ) . '<br />' .
                                            __( 'Your Order number is #', 'addonpayments' ) . $order_id . '<br />' .
                                            '<a href="' . $post_permanlink_return . '" class="addonp-button" target="_top">' . __( 'Return to the website', 'addonpayments' ) . '</a>

                                    </div>';

                    } else {
                        // Different price
                        $update_order = array (
                            'ID'            => $order_id,
                            'post_status'   => 'addonp-check',
                        );
                        wp_update_post( $update_order );

                        add_post_meta( $order_id, '_addonp_order_result',               $result,                true );
                        add_post_meta( $order_id, '_addonp_order_authcode',             $authcode,              true );
                        add_post_meta( $order_id, '_addonp_order_passref',              $pasref,                true );
                        add_post_meta( $order_id, '_addonp_order_passref',              $avspostcoderesponse,   true );
                        add_post_meta( $order_id, '_addonp_order_avsaddressresponse',   $avsaddressresponse,    true );
                        add_post_meta( $order_id, '_addonp_order_cvnresult',            $cvnresult,             true );
                        add_post_meta( $order_id, '_addonp_order_account',              $account,               true );
                        add_post_meta( $order_id, '_addonp_order_batchid',              $batchid,               true );
                        add_post_meta( $order_id, '_addonp_order_key_product',          $key_product,           true );

                        $process = '<div class="addonp-check"><a name="' . $product . '"></a>' .
                                            __( 'We need to check your purchase', 'addonpayments' ) . '<br />' .
                                            __( 'We will contact with you once we check the transaction #', 'addonpayments' ) . $order_id . '<br />' .
                                            __( 'We appreciate your patience', 'addonpayments' ) . '<br />' .
                                            '<a href="' . $post_permanlink_return . '" class="addonp-button" target="_top">' . __( 'Return to the website', 'addonpayments' ) . '</a>

                                    </div>';
                    }

                } else {
                    //ko Transaction
                    $update_order = array (
                            'ID'            => $order_id,
                            'post_status'   => 'addonp-error',
                        );

                        $error_text = addonp_get_error( $result );

                        wp_update_post( $update_order );

                        add_post_meta( $order_id, '_addonp_order_result',               $result,                true );
                        add_post_meta( $order_id, '_addonp_order_authcode',             $authcode,              true );
                        add_post_meta( $order_id, '_addonp_order_passref',              $pasref,                true );
                        add_post_meta( $order_id, '_addonp_order_passref',              $avspostcoderesponse,   true );
                        add_post_meta( $order_id, '_addonp_order_avsaddressresponse',   $avsaddressresponse,    true );
                        add_post_meta( $order_id, '_addonp_order_cvnresult',            $cvnresult,             true );
                        add_post_meta( $order_id, '_addonp_order_account',              $account,               true );
                        add_post_meta( $order_id, '_addonp_order_batchid',              $batchid,               true );
                        add_post_meta( $order_id, '_addonp_order_key_product',          $key_product,           true );

                        $process = '<div class="addonp-error"><a name="' . $product . '"></a>' .
                                            __( 'There was an error', 'addonpayments' ) . '<br />' .
                                            __( 'The error was', 'addonpayments' ) . ' ' . $result . '<br />' .
                                            $error_text . '<br />' .
                                            '<a href="' . $post_permanlink_return . '" class="addonp-button" target="_top">' . __( 'Return to the website', 'addonpayments' ) . '</a>

                                    </div>';

                }

            } else {
                // KO hash
                $update_order = array (
                            'ID'            => $order_id,
                            'post_status'   => 'addonp-suspended',
                        );
                        wp_update_post( $update_order );

                        add_post_meta( $order_id, '_addonp_order_result',               $result,                true );
                        add_post_meta( $order_id, '_addonp_order_authcode',             $authcode,              true );
                        add_post_meta( $order_id, '_addonp_order_passref',              $pasref,                true );
                        add_post_meta( $order_id, '_addonp_order_passref',              $avspostcoderesponse,   true );
                        add_post_meta( $order_id, '_addonp_order_avsaddressresponse',   $avsaddressresponse,    true );
                        add_post_meta( $order_id, '_addonp_order_cvnresult',            $cvnresult,             true );
                        add_post_meta( $order_id, '_addonp_order_account',              $account,               true );
                        add_post_meta( $order_id, '_addonp_order_batchid',              $batchid,               true );
                        add_post_meta( $order_id, '_addonp_order_key_product',          $key_product,           true );

                        $process = '<div class="addonp-error"><a name="' . $product . '"></a>' .
                                            __( 'Wrong hash, the order has been suspended', 'addonpayments' ) . '<br />' .
                                            __( 'Please contact with us if you think that this is and error', 'addonpayments' ) . '<br />' .
                                            __( 'The order number is', 'addonpayments' ) . '  ' . $order_id . '<br />' .
                                            '<a href="' . $post_permanlink_return . '" class="addonp-button" target="_top">' . __( 'Return to the website', 'addonpayments' ) . '</a>

                                    </div>';
            }
        } else {
            $process = '';
        }

        // Shipping fields

        if ( ! empty( $shipping_fields ) && in_array( 'user_type', $shipping_fields ) ) {
            $user_type = '<select id="user_type" name="user_type" class="pure-input-1-2 js-user-type-list">
                                <option value="private_user">' . __('Private User', 'addonpayments' ) . '</option>
                                <option value="business">' . __('Business', 'addonpayments' ) . '</option>
                                <option value="self_employed">' . __('Self-employed', 'addonpayments' ) . '</option>
                            </select>';
        } else {
            $user_type = '';
        }

        if ( ! empty( $shipping_fields ) && in_array( 'Full_Name', $shipping_fields ) ) {
            $Full_Name = '<input type="text" name="Full_Name" class="pure-input-1-2" placeholder="' . __('Full Name', 'addonpayments' ) . '" required>';
        } else {
            $Full_Name = '';
        }

        if ( ! empty( $shipping_fields ) && in_array( 'shipping_city', $shipping_fields ) ) {
            $shipping_city = '<input type="text" name="shipping_city" class="pure-input-1-2" placeholder="' . __('Shipping City', 'addonpayments' ) . '" required>';
        } else {
            $shipping_city = '';
        }

        if ( ! empty( $shipping_fields ) && in_array( 'shipping_country', $shipping_fields ) ) {
            $shipping_country = '<select id="shipping_country" name="shipping_country" class="pure-input-1-2 js-country-list">
                                    <option value="AF">' . __('Afghanistan', 'addonpayments' ) . '</option>
                                    <option value="AX">' . __('Aland Islands', 'addonpayments' ) . '</option>
                                    <option value="AL">' . __('Albania', 'addonpayments' ) . '</option>
                                    <option value="DZ">' . __('Algeria', 'addonpayments' ) . '</option>
                                    <option value="AS">' . __('American Samoa', 'addonpayments' ) . '</option>
                                    <option value="AD">' . __('Andorra', 'addonpayments' ) . '</option>
                                    <option value="AO">' . __('Angola', 'addonpayments' ) . '</option>
                                    <option value="AI">' . __('Anguilla', 'addonpayments' ) . '</option>
                                    <option value="AQ">' . __('Antarctica', 'addonpayments' ) . '</option>
                                    <option value="AG">' . __('Antigua And Barbuda', 'addonpayments' ) . '</option>
                                    <option value="AR">' . __('Argentina', 'addonpayments' ) . '</option>
                                    <option value="AM">' . __('Armenia', 'addonpayments' ) . '</option>
                                    <option value="AW">' . __('Aruba', 'addonpayments' ) . '</option>
                                    <option value="AU">' . __('Australia', 'addonpayments' ) . '</option>
                                    <option value="AT">' . __('Austria', 'addonpayments' ) . '</option>
                                    <option value="AZ">' . __('Azerbaijan', 'addonpayments' ) . '</option>
                                    <option value="BS">' . __('Bahamas', 'addonpayments' ) . '</option>
                                    <option value="BH">' . __('Bahrain', 'addonpayments' ) . '</option>
                                    <option value="BD">' . __('Bangladesh', 'addonpayments' ) . '</option>
                                    <option value="BB">' . __('Barbados', 'addonpayments' ) . '</option>
                                    <option value="BY">' . __('Belarus', 'addonpayments' ) . '</option>
                                    <option value="BE">' . __('Belgium', 'addonpayments' ) . '</option>
                                    <option value="BZ">' . __('Belize', 'addonpayments' ) . '</option>
                                    <option value="BJ">' . __('Benin', 'addonpayments' ) . '</option>
                                    <option value="BM">' . __('Bermuda', 'addonpayments' ) . '</option>
                                    <option value="BT">' . __('Bhutan', 'addonpayments' ) . '</option>
                                    <option value="BO">' . __('Bolivia', 'addonpayments' ) . '</option>
                                    <option value="BA">' . __('Bosnia And Herzegovina', 'addonpayments' ) . '</option>
                                    <option value="BW">' . __('Botswana', 'addonpayments' ) . '</option>
                                    <option value="BV">' . __('Bouvet Island', 'addonpayments' ) . '</option>
                                    <option value="BR">' . __('Brazil', 'addonpayments' ) . '</option>
                                    <option value="IO">' . __('British Indian Ocean Territory', 'addonpayments' ) . '</option>
                                    <option value="BN">' . __('Brunei Darussalam', 'addonpayments' ) . '</option>
                                    <option value="BG">' . __('Bulgaria', 'addonpayments' ) . '</option>
                                    <option value="BF">' . __('Burkina Faso', 'addonpayments' ) . '</option>
                                    <option value="BI">' . __('Burundi', 'addonpayments' ) . '</option>
                                    <option value="KH">' . __('Cambodia', 'addonpayments' ) . '</option>
                                    <option value="CM">' . __('Cameroon', 'addonpayments' ) . '</option>
                                    <option value="CA">' . __('Canada', 'addonpayments' ) . '</option>
                                    <option value="CV">' . __('Cape Verde', 'addonpayments' ) . '</option>
                                    <option value="KY">' . __('Cayman Islands', 'addonpayments' ) . '</option>
                                    <option value="CF">' . __('Central African Republic', 'addonpayments' ) . '</option>
                                    <option value="TD">' . __('Chad', 'addonpayments' ) . '</option>
                                    <option value="CL">' . __('Chile', 'addonpayments' ) . '</option>
                                    <option value="CN">' . __('China', 'addonpayments' ) . '</option>
                                    <option value="CX">' . __('Christmas Island', 'addonpayments' ) . '</option>
                                    <option value="CC">' . __('Cocos (Keeling) Islands', 'addonpayments' ) . '</option>
                                    <option value="CO">' . __('Colombia', 'addonpayments' ) . '</option>
                                    <option value="KM">' . __('Comoros', 'addonpayments' ) . '</option>
                                    <option value="CG">' . __('Congo', 'addonpayments' ) . '</option>
                                    <option value="CD">' . __('Congo, Democratic Republic', 'addonpayments' ) . '</option>
                                    <option value="CK">' . __('Cook Islands', 'addonpayments' ) . '</option>
                                    <option value="CR">' . __('Costa Rica', 'addonpayments' ) . '</option>
                                    <option value="CI">' . __('Cote D\'Ivoire', 'addonpayments' ) . '</option>
                                    <option value="HR">' . __('Croatia', 'addonpayments' ) . '</option>
                                    <option value="CU">' . __('Cuba', 'addonpayments' ) . '</option>
                                    <option value="CY">' . __('Cyprus', 'addonpayments' ) . '</option>
                                    <option value="CZ">' . __('Czech Republic', 'addonpayments' ) . '</option>
                                    <option value="DK">' . __('Denmark', 'addonpayments' ) . '</option>
                                    <option value="DJ">' . __('Djibouti', 'addonpayments' ) . '</option>
                                    <option value="DM">' . __('Dominica', 'addonpayments' ) . '</option>
                                    <option value="DO">' . __('Dominican Republic', 'addonpayments' ) . '</option>
                                    <option value="EC">' . __('Ecuador', 'addonpayments' ) . '</option>
                                    <option value="EG">' . __('Egypt', 'addonpayments' ) . '</option>
                                    <option value="SV">' . __('El Salvador', 'addonpayments' ) . '</option>
                                    <option value="GQ">' . __('Equatorial Guinea', 'addonpayments' ) . '</option>
                                    <option value="ER">' . __('Eritrea', 'addonpayments' ) . '</option>
                                    <option value="EE">' . __('Estonia', 'addonpayments' ) . '</option>
                                    <option value="ET">' . __('Ethiopia', 'addonpayments' ) . '</option>
                                    <option value="FK">' . __('Falkland Islands (Malvinas)', 'addonpayments' ) . '</option>
                                    <option value="FO">' . __('Faroe Islands', 'addonpayments' ) . '</option>
                                    <option value="FJ">' . __('Fiji', 'addonpayments' ) . '</option>
                                    <option value="FI">' . __('Finland', 'addonpayments' ) . '</option>
                                    <option value="FR">' . __('France', 'addonpayments' ) . '</option>
                                    <option value="GF">' . __('French Guiana', 'addonpayments' ) . '</option>
                                    <option value="PF">' . __('French Polynesia', 'addonpayments' ) . '</option>
                                    <option value="TF">' . __('French Southern Territories', 'addonpayments' ) . '</option>
                                    <option value="GA">' . __('Gabon', 'addonpayments' ) . '</option>
                                    <option value="GM">' . __('Gambia', 'addonpayments' ) . '</option>
                                    <option value="GE">' . __('Georgia', 'addonpayments' ) . '</option>
                                    <option value="DE">' . __('Germany', 'addonpayments' ) . '</option>
                                    <option value="GH">' . __('Ghana', 'addonpayments' ) . '</option>
                                    <option value="GI">' . __('Gibraltar', 'addonpayments' ) . '</option>
                                    <option value="GR">' . __('Greece', 'addonpayments' ) . '</option>
                                    <option value="GL">' . __('Greenland', 'addonpayments' ) . '</option>
                                    <option value="GD">' . __('Grenada', 'addonpayments' ) . '</option>
                                    <option value="GP">' . __('Guadeloupe', 'addonpayments' ) . '</option>
                                    <option value="GU">' . __('Guam', 'addonpayments' ) . '</option>
                                    <option value="GT">' . __('Guatemala', 'addonpayments' ) . '</option>
                                    <option value="GG">' . __('Guernsey', 'addonpayments' ) . '</option>
                                    <option value="GN">' . __('Guinea', 'addonpayments' ) . '</option>
                                    <option value="GW">' . __('Guinea-Bissau', 'addonpayments' ) . '</option>
                                    <option value="GY">' . __('Guyana', 'addonpayments' ) . '</option>
                                    <option value="HT">' . __('Haiti', 'addonpayments' ) . '</option>
                                    <option value="HM">' . __('Heard Island & Mcdonald Islands', 'addonpayments' ) . '</option>
                                    <option value="VA">' . __('Holy See (Vatican City State)', 'addonpayments' ) . '</option>
                                    <option value="HN">' . __('Honduras', 'addonpayments' ) . '</option>
                                    <option value="HK">' . __('Hong Kong', 'addonpayments' ) . '</option>
                                    <option value="HU">' . __('Hungary', 'addonpayments' ) . '</option>
                                    <option value="IS">' . __('Iceland', 'addonpayments' ) . '</option>
                                    <option value="IN">' . __('India', 'addonpayments' ) . '</option>
                                    <option value="ID">' . __('Indonesia', 'addonpayments' ) . '</option>
                                    <option value="IR">' . __('Iran, Islamic Republic Of', 'addonpayments' ) . '</option>
                                    <option value="IQ">' . __('Iraq', 'addonpayments' ) . '</option>
                                    <option value="IE">' . __('Ireland', 'addonpayments' ) . '</option>
                                    <option value="IM">' . __('Isle Of Man', 'addonpayments' ) . '</option>
                                    <option value="IL">' . __('Israel', 'addonpayments' ) . '</option>
                                    <option value="IT">' . __('Italy', 'addonpayments' ) . '</option>
                                    <option value="JM">' . __('Jamaica', 'addonpayments' ) . '</option>
                                    <option value="JP">' . __('Japan', 'addonpayments' ) . '</option>
                                    <option value="JE">' . __('Jersey', 'addonpayments' ) . '</option>
                                    <option value="JO">' . __('Jordan', 'addonpayments' ) . '</option>
                                    <option value="KZ">' . __('Kazakhstan', 'addonpayments' ) . '</option>
                                    <option value="KE">' . __('Kenya', 'addonpayments' ) . '</option>
                                    <option value="KI">' . __('Kiribati', 'addonpayments' ) . '</option>
                                    <option value="KR">' . __('Korea', 'addonpayments' ) . '</option>
                                    <option value="KW">' . __('Kuwait', 'addonpayments' ) . '</option>
                                    <option value="KG">' . __('Kyrgyzstan', 'addonpayments' ) . '</option>
                                    <option value="LA">' . __('Lao People\'s Democratic Republic', 'addonpayments' ) . '</option>
                                    <option value="LV">' . __('Latvia', 'addonpayments' ) . '</option>
                                    <option value="LB">' . __('Lebanon', 'addonpayments' ) . '</option>
                                    <option value="LS">' . __('Lesotho', 'addonpayments' ) . '</option>
                                    <option value="LR">' . __('Liberia', 'addonpayments' ) . '</option>
                                    <option value="LY">' . __('Libyan Arab Jamahiriya', 'addonpayments' ) . '</option>
                                    <option value="LI">' . __('Liechtenstein', 'addonpayments' ) . '</option>
                                    <option value="LT">' . __('Lithuania', 'addonpayments' ) . '</option>
                                    <option value="LU">' . __('Luxembourg', 'addonpayments' ) . '</option>
                                    <option value="MO">' . __('Macao', 'addonpayments' ) . '</option>
                                    <option value="MK">' . __('Macedonia', 'addonpayments' ) . '</option>
                                    <option value="MG">' . __('Madagascar', 'addonpayments' ) . '</option>
                                    <option value="MW">' . __('Malawi', 'addonpayments' ) . '</option>
                                    <option value="MY">' . __('Malaysia', 'addonpayments' ) . '</option>
                                    <option value="MV">' . __('Maldives', 'addonpayments' ) . '</option>
                                    <option value="ML">' . __('Mali', 'addonpayments' ) . '</option>
                                    <option value="MT">' . __('Malta', 'addonpayments' ) . '</option>
                                    <option value="MH">' . __('Marshall Islands', 'addonpayments' ) . '</option>
                                    <option value="MQ">' . __('Martinique', 'addonpayments' ) . '</option>
                                    <option value="MR">' . __('Mauritania', 'addonpayments' ) . '</option>
                                    <option value="MU">' . __('Mauritius', 'addonpayments' ) . '</option>
                                    <option value="YT">' . __('Mayotte', 'addonpayments' ) . '</option>
                                    <option value="MX">' . __('Mexico', 'addonpayments' ) . '</option>
                                    <option value="FM">' . __('Micronesia, Federated States Of', 'addonpayments' ) . '</option>
                                    <option value="MD">' . __('Moldova', 'addonpayments' ) . '</option>
                                    <option value="MC">' . __('Monaco', 'addonpayments' ) . '</option>
                                    <option value="MN">' . __('Mongolia', 'addonpayments' ) . '</option>
                                    <option value="ME">' . __('Montenegro', 'addonpayments' ) . '</option>
                                    <option value="MS">' . __('Montserrat', 'addonpayments' ) . '</option>
                                    <option value="MA">' . __('Morocco', 'addonpayments' ) . '</option>
                                    <option value="MZ">' . __('Mozambique', 'addonpayments' ) . '</option>
                                    <option value="MM">' . __('Myanmar', 'addonpayments' ) . '</option>
                                    <option value="NA">' . __('Namibia', 'addonpayments' ) . '</option>
                                    <option value="NR">' . __('Nauru', 'addonpayments' ) . '</option>
                                    <option value="NP">' . __('Nepal', 'addonpayments' ) . '</option>
                                    <option value="NL">' . __('Netherlands', 'addonpayments' ) . '</option>
                                    <option value="AN">' . __('Netherlands Antilles', 'addonpayments' ) . '</option>
                                    <option value="NC">' . __('New Caledonia', 'addonpayments' ) . '</option>
                                    <option value="NZ">' . __('New Zealand', 'addonpayments' ) . '</option>
                                    <option value="NI">' . __('Nicaragua', 'addonpayments' ) . '</option>
                                    <option value="NE">' . __('Niger', 'addonpayments' ) . '</option>
                                    <option value="NG">' . __('Nigeria', 'addonpayments' ) . '</option>
                                    <option value="NU">' . __('Niue', 'addonpayments' ) . '</option>
                                    <option value="NF">' . __('Norfolk Island', 'addonpayments' ) . '</option>
                                    <option value="MP">' . __('Northern Mariana Islands', 'addonpayments' ) . '</option>
                                    <option value="NO">' . __('Norway', 'addonpayments' ) . '</option>
                                    <option value="OM">' . __('Oman', 'addonpayments' ) . '</option>
                                    <option value="PK">' . __('Pakistan', 'addonpayments' ) . '</option>
                                    <option value="PW">' . __('Palau', 'addonpayments' ) . '</option>
                                    <option value="PS">' . __('Palestinian Territory, Occupied', 'addonpayments' ) . '</option>
                                    <option value="PA">' . __('Panama', 'addonpayments' ) . '</option>
                                    <option value="PG">' . __('Papua New Guinea', 'addonpayments' ) . '</option>
                                    <option value="PY">' . __('Paraguay', 'addonpayments' ) . '</option>
                                    <option value="PE">' . __('Peru', 'addonpayments' ) . '</option>
                                    <option value="PH">' . __('Philippines', 'addonpayments' ) . '</option>
                                    <option value="PN">' . __('Pitcairn', 'addonpayments' ) . '</option>
                                    <option value="PL">' . __('Poland', 'addonpayments' ) . '</option>
                                    <option value="PT">' . __('Portugal', 'addonpayments' ) . '</option>
                                    <option value="PR">' . __('Puerto Rico', 'addonpayments' ) . '</option>
                                    <option value="QA">' . __('Qatar', 'addonpayments' ) . '</option>
                                    <option value="RE">' . __('Reunion', 'addonpayments' ) . '</option>
                                    <option value="RO">' . __('Romania', 'addonpayments' ) . '</option>
                                    <option value="RU">' . __('Russian Federation', 'addonpayments' ) . '</option>
                                    <option value="RW">' . __('Rwanda', 'addonpayments' ) . '</option>
                                    <option value="BL">' . __('Saint Barthelemy', 'addonpayments' ) . '</option>
                                    <option value="SH">' . __('Saint Helena', 'addonpayments' ) . '</option>
                                    <option value="KN">' . __('Saint Kitts And Nevis', 'addonpayments' ) . '</option>
                                    <option value="LC">' . __('Saint Lucia', 'addonpayments' ) . '</option>
                                    <option value="MF">' . __('Saint Martin', 'addonpayments' ) . '</option>
                                    <option value="PM">' . __('Saint Pierre And Miquelon', 'addonpayments' ) . '</option>
                                    <option value="VC">' . __('Saint Vincent And Grenadines', 'addonpayments' ) . '</option>
                                    <option value="WS">' . __('Samoa', 'addonpayments' ) . '</option>
                                    <option value="SM">' . __('San Marino', 'addonpayments' ) . '</option>
                                    <option value="ST">' . __('Sao Tome And Principe', 'addonpayments' ) . '</option>
                                    <option value="SA">' . __('Saudi Arabia', 'addonpayments' ) . '</option>
                                    <option value="SN">' . __('Senegal', 'addonpayments' ) . '</option>
                                    <option value="RS">' . __('Serbia', 'addonpayments' ) . '</option>
                                    <option value="SC">' . __('Seychelles', 'addonpayments' ) . '</option>
                                    <option value="SL">' . __('Sierra Leone', 'addonpayments' ) . '</option>
                                    <option value="SG">' . __('Singapore', 'addonpayments' ) . '</option>
                                    <option value="SK">' . __('Slovakia', 'addonpayments' ) . '</option>
                                    <option value="SI">' . __('Slovenia', 'addonpayments' ) . '</option>
                                    <option value="SB">' . __('Solomon Islands', 'addonpayments' ) . '</option>
                                    <option value="SO">' . __('Somalia', 'addonpayments' ) . '</option>
                                    <option value="ZA">' . __('South Africa', 'addonpayments' ) . '</option>
                                    <option value="GS">' . __('South Georgia And Sandwich Isl.', 'addonpayments' ) . '</option>
                                    <option value="ES">' . __('Spain', 'addonpayments' ) . '</option>
                                    <option value="LK">' . __('Sri Lanka', 'addonpayments' ) . '</option>
                                    <option value="SD">' . __('Sudan', 'addonpayments' ) . '</option>
                                    <option value="SR">' . __('Suriname', 'addonpayments' ) . '</option>
                                    <option value="SJ">' . __('Svalbard And Jan Mayen', 'addonpayments' ) . '</option>
                                    <option value="SZ">' . __('Swaziland', 'addonpayments' ) . '</option>
                                    <option value="SE">' . __('Sweden', 'addonpayments' ) . '</option>
                                    <option value="CH">' . __('Switzerland', 'addonpayments' ) . '</option>
                                    <option value="SY">' . __('Syrian Arab Republic', 'addonpayments' ) . '</option>
                                    <option value="TW">' . __('Taiwan', 'addonpayments' ) . '</option>
                                    <option value="TJ">' . __('Tajikistan', 'addonpayments' ) . '</option>
                                    <option value="TZ">' . __('Tanzania', 'addonpayments' ) . '</option>
                                    <option value="TH">' . __('Thailand', 'addonpayments' ) . '</option>
                                    <option value="TL">' . __('Timor-Leste', 'addonpayments' ) . '</option>
                                    <option value="TG">' . __('Togo', 'addonpayments' ) . '</option>
                                    <option value="TK">' . __('Tokelau', 'addonpayments' ) . '</option>
                                    <option value="TO">' . __('Tonga', 'addonpayments' ) . '</option>
                                    <option value="TT">' . __('Trinidad And Tobago', 'addonpayments' ) . '</option>
                                    <option value="TN">' . __('Tunisia', 'addonpayments' ) . '</option>
                                    <option value="TR">' . __('Turkey', 'addonpayments' ) . '</option>
                                    <option value="TM">' . __('Turkmenistan', 'addonpayments' ) . '</option>
                                    <option value="TC">' . __('Turks And Caicos Islands', 'addonpayments' ) . '</option>
                                    <option value="TV">' . __('Tuvalu', 'addonpayments' ) . '</option>
                                    <option value="UG">' . __('Uganda', 'addonpayments' ) . '</option>
                                    <option value="UA">' . __('Ukraine', 'addonpayments' ) . '</option>
                                    <option value="AE">' . __('United Arab Emirates', 'addonpayments' ) . '</option>
                                    <option value="GB">' . __('United Kingdom', 'addonpayments' ) . '</option>
                                    <option value="US">' . __('United States', 'addonpayments' ) . '</option>
                                    <option value="UM">' . __('United States Outlying Islands', 'addonpayments' ) . '</option>
                                    <option value="UY">' . __('Uruguay', 'addonpayments' ) . '</option>
                                    <option value="UZ">' . __('Uzbekistan', 'addonpayments' ) . '</option>
                                    <option value="VU">' . __('Vanuatu', 'addonpayments' ) . '</option>
                                    <option value="VE">' . __('Venezuela', 'addonpayments' ) . '</option>
                                    <option value="VN">' . __('Viet Nam', 'addonpayments' ) . '</option>
                                    <option value="VG">' . __('Virgin Islands, British', 'addonpayments' ) . '</option>
                                    <option value="VI">' . __('Virgin Islands, U.S.', 'addonpayments' ) . '</option>
                                    <option value="WF">' . __('Wallis And Futuna', 'addonpayments' ) . '</option>
                                    <option value="EH">' . __('Western Sahara', 'addonpayments' ) . '</option>
                                    <option value="YE">' . __('Yemen', 'addonpayments' ) . '</option>
                                    <option value="ZM">' . __('Zambia', 'addonpayments' ) . '</option>
                                    <option value="ZW">' . __('Zimbabwe', 'addonpayments' ) . '</option>
                                </select>';
            } else {
                $shipping_country = '';
            }

        if ( ! empty( $shipping_fields ) && in_array( 'shipping_state', $shipping_fields ) ) {
            $shipping_state = '<input type="text" name="shipping_state" class="pure-input-1-2" placeholder="' . __('Shipping State', 'addonpayments' ) . '" required>';
        } else {
            $shipping_state = '';
        }

        if ( ! empty( $shipping_fields ) && in_array( 'shipping_postcode', $shipping_fields ) ) {
            $shipping_postcode = '<input type="text" name="shipping_postcode" class="pure-input-1-2" placeholder="' . __('Shipping Postcode', 'addonpayments' ) . '" required>';
        } else {
            $shipping_postcode = '';
        }

        if ( ! empty( $shipping_fields ) && in_array( 'shipping_address', $shipping_fields ) ) {
            $shipping_address = '<input type="text" name="shipping_address" class="pure-input-1-2" placeholder="' . __('Shipping Address', 'addonpayments' ) . '" required>';
        } else {
            $shipping_address = '';
        }

        if ( ! empty( $shipping_fields ) && in_array( 'shipping_email', $shipping_fields ) ) {
            $shipping_email = '<input type="text" name="shipping_email" class="pure-input-1-2" placeholder="' . __('Shipping Email', 'addonpayments' ) . '" required>';
        } else {
            $shipping_email = '';
        }

        if ( ! empty( $shipping_fields ) && in_array( 'shipping_phone', $shipping_fields ) ) {
            $shipping_phone = '<input type="text" name="shipping_phone" class="pure-input-1-2" placeholder="' . __('Shipping Phone', 'addonpayments' ) . '" required>';
        } else {
            $shipping_phone = '';
        }

        // Billing fields

        if ( ! empty( $billing_fields ) && in_array( 'full_name_billing', $billing_fields ) ) {
            $full_name_billing = '<input type="text" name="full_name_billing" class="pure-input-1-2" placeholder="' . __('Billing Full Name', 'addonpayments' ) . '">';
        } else {
            $full_name_billing = '';
        }

        if ( ! empty( $billing_fields ) && in_array( 'nic_tic_vat_name_billing', $billing_fields ) ) {
            $nic_tic_vat_name_billing = '<input type="text" name="nic_tic_vat_name_billing" class="pure-input-1-2" placeholder="' . __('NIC, TIC, VAT Number', 'addonpayments' ) . '">';
        } else {
            $nic_tic_vat_name_billing = '';
        }

        if ( ! empty( $billing_fields ) && in_array( 'billing_city', $billing_fields ) ) {
            $billing_city = '<input type="text" name="billing_city" class="pure-input-1-2" placeholder="' . __('Billing City', 'addonpayments' ) . '">';
        } else {
            $billing_city = '';
        }

        if ( ! empty( $billing_fields ) && in_array( 'billing_country', $billing_fields ) ) {
            $billing_country = '<select id="billing_country" name="billing_country" class="pure-input-1-2 js-country-list">
                                    <option value="AF">' . __('Afghanistan', 'addonpayments' ) . '</option>
                                    <option value="AX">' . __('Aland Islands', 'addonpayments' ) . '</option>
                                    <option value="AL">' . __('Albania', 'addonpayments' ) . '</option>
                                    <option value="DZ">' . __('Algeria', 'addonpayments' ) . '</option>
                                    <option value="AS">' . __('American Samoa', 'addonpayments' ) . '</option>
                                    <option value="AD">' . __('Andorra', 'addonpayments' ) . '</option>
                                    <option value="AO">' . __('Angola', 'addonpayments' ) . '</option>
                                    <option value="AI">' . __('Anguilla', 'addonpayments' ) . '</option>
                                    <option value="AQ">' . __('Antarctica', 'addonpayments' ) . '</option>
                                    <option value="AG">' . __('Antigua And Barbuda', 'addonpayments' ) . '</option>
                                    <option value="AR">' . __('Argentina', 'addonpayments' ) . '</option>
                                    <option value="AM">' . __('Armenia', 'addonpayments' ) . '</option>
                                    <option value="AW">' . __('Aruba', 'addonpayments' ) . '</option>
                                    <option value="AU">' . __('Australia', 'addonpayments' ) . '</option>
                                    <option value="AT">' . __('Austria', 'addonpayments' ) . '</option>
                                    <option value="AZ">' . __('Azerbaijan', 'addonpayments' ) . '</option>
                                    <option value="BS">' . __('Bahamas', 'addonpayments' ) . '</option>
                                    <option value="BH">' . __('Bahrain', 'addonpayments' ) . '</option>
                                    <option value="BD">' . __('Bangladesh', 'addonpayments' ) . '</option>
                                    <option value="BB">' . __('Barbados', 'addonpayments' ) . '</option>
                                    <option value="BY">' . __('Belarus', 'addonpayments' ) . '</option>
                                    <option value="BE">' . __('Belgium', 'addonpayments' ) . '</option>
                                    <option value="BZ">' . __('Belize', 'addonpayments' ) . '</option>
                                    <option value="BJ">' . __('Benin', 'addonpayments' ) . '</option>
                                    <option value="BM">' . __('Bermuda', 'addonpayments' ) . '</option>
                                    <option value="BT">' . __('Bhutan', 'addonpayments' ) . '</option>
                                    <option value="BO">' . __('Bolivia', 'addonpayments' ) . '</option>
                                    <option value="BA">' . __('Bosnia And Herzegovina', 'addonpayments' ) . '</option>
                                    <option value="BW">' . __('Botswana', 'addonpayments' ) . '</option>
                                    <option value="BV">' . __('Bouvet Island', 'addonpayments' ) . '</option>
                                    <option value="BR">' . __('Brazil', 'addonpayments' ) . '</option>
                                    <option value="IO">' . __('British Indian Ocean Territory', 'addonpayments' ) . '</option>
                                    <option value="BN">' . __('Brunei Darussalam', 'addonpayments' ) . '</option>
                                    <option value="BG">' . __('Bulgaria', 'addonpayments' ) . '</option>
                                    <option value="BF">' . __('Burkina Faso', 'addonpayments' ) . '</option>
                                    <option value="BI">' . __('Burundi', 'addonpayments' ) . '</option>
                                    <option value="KH">' . __('Cambodia', 'addonpayments' ) . '</option>
                                    <option value="CM">' . __('Cameroon', 'addonpayments' ) . '</option>
                                    <option value="CA">' . __('Canada', 'addonpayments' ) . '</option>
                                    <option value="CV">' . __('Cape Verde', 'addonpayments' ) . '</option>
                                    <option value="KY">' . __('Cayman Islands', 'addonpayments' ) . '</option>
                                    <option value="CF">' . __('Central African Republic', 'addonpayments' ) . '</option>
                                    <option value="TD">' . __('Chad', 'addonpayments' ) . '</option>
                                    <option value="CL">' . __('Chile', 'addonpayments' ) . '</option>
                                    <option value="CN">' . __('China', 'addonpayments' ) . '</option>
                                    <option value="CX">' . __('Christmas Island', 'addonpayments' ) . '</option>
                                    <option value="CC">' . __('Cocos (Keeling) Islands', 'addonpayments' ) . '</option>
                                    <option value="CO">' . __('Colombia', 'addonpayments' ) . '</option>
                                    <option value="KM">' . __('Comoros', 'addonpayments' ) . '</option>
                                    <option value="CG">' . __('Congo', 'addonpayments' ) . '</option>
                                    <option value="CD">' . __('Congo, Democratic Republic', 'addonpayments' ) . '</option>
                                    <option value="CK">' . __('Cook Islands', 'addonpayments' ) . '</option>
                                    <option value="CR">' . __('Costa Rica', 'addonpayments' ) . '</option>
                                    <option value="CI">' . __('Cote D\'Ivoire', 'addonpayments' ) . '</option>
                                    <option value="HR">' . __('Croatia', 'addonpayments' ) . '</option>
                                    <option value="CU">' . __('Cuba', 'addonpayments' ) . '</option>
                                    <option value="CY">' . __('Cyprus', 'addonpayments' ) . '</option>
                                    <option value="CZ">' . __('Czech Republic', 'addonpayments' ) . '</option>
                                    <option value="DK">' . __('Denmark', 'addonpayments' ) . '</option>
                                    <option value="DJ">' . __('Djibouti', 'addonpayments' ) . '</option>
                                    <option value="DM">' . __('Dominica', 'addonpayments' ) . '</option>
                                    <option value="DO">' . __('Dominican Republic', 'addonpayments' ) . '</option>
                                    <option value="EC">' . __('Ecuador', 'addonpayments' ) . '</option>
                                    <option value="EG">' . __('Egypt', 'addonpayments' ) . '</option>
                                    <option value="SV">' . __('El Salvador', 'addonpayments' ) . '</option>
                                    <option value="GQ">' . __('Equatorial Guinea', 'addonpayments' ) . '</option>
                                    <option value="ER">' . __('Eritrea', 'addonpayments' ) . '</option>
                                    <option value="EE">' . __('Estonia', 'addonpayments' ) . '</option>
                                    <option value="ET">' . __('Ethiopia', 'addonpayments' ) . '</option>
                                    <option value="FK">' . __('Falkland Islands (Malvinas)', 'addonpayments' ) . '</option>
                                    <option value="FO">' . __('Faroe Islands', 'addonpayments' ) . '</option>
                                    <option value="FJ">' . __('Fiji', 'addonpayments' ) . '</option>
                                    <option value="FI">' . __('Finland', 'addonpayments' ) . '</option>
                                    <option value="FR">' . __('France', 'addonpayments' ) . '</option>
                                    <option value="GF">' . __('French Guiana', 'addonpayments' ) . '</option>
                                    <option value="PF">' . __('French Polynesia', 'addonpayments' ) . '</option>
                                    <option value="TF">' . __('French Southern Territories', 'addonpayments' ) . '</option>
                                    <option value="GA">' . __('Gabon', 'addonpayments' ) . '</option>
                                    <option value="GM">' . __('Gambia', 'addonpayments' ) . '</option>
                                    <option value="GE">' . __('Georgia', 'addonpayments' ) . '</option>
                                    <option value="DE">' . __('Germany', 'addonpayments' ) . '</option>
                                    <option value="GH">' . __('Ghana', 'addonpayments' ) . '</option>
                                    <option value="GI">' . __('Gibraltar', 'addonpayments' ) . '</option>
                                    <option value="GR">' . __('Greece', 'addonpayments' ) . '</option>
                                    <option value="GL">' . __('Greenland', 'addonpayments' ) . '</option>
                                    <option value="GD">' . __('Grenada', 'addonpayments' ) . '</option>
                                    <option value="GP">' . __('Guadeloupe', 'addonpayments' ) . '</option>
                                    <option value="GU">' . __('Guam', 'addonpayments' ) . '</option>
                                    <option value="GT">' . __('Guatemala', 'addonpayments' ) . '</option>
                                    <option value="GG">' . __('Guernsey', 'addonpayments' ) . '</option>
                                    <option value="GN">' . __('Guinea', 'addonpayments' ) . '</option>
                                    <option value="GW">' . __('Guinea-Bissau', 'addonpayments' ) . '</option>
                                    <option value="GY">' . __('Guyana', 'addonpayments' ) . '</option>
                                    <option value="HT">' . __('Haiti', 'addonpayments' ) . '</option>
                                    <option value="HM">' . __('Heard Island & Mcdonald Islands', 'addonpayments' ) . '</option>
                                    <option value="VA">' . __('Holy See (Vatican City State)', 'addonpayments' ) . '</option>
                                    <option value="HN">' . __('Honduras', 'addonpayments' ) . '</option>
                                    <option value="HK">' . __('Hong Kong', 'addonpayments' ) . '</option>
                                    <option value="HU">' . __('Hungary', 'addonpayments' ) . '</option>
                                    <option value="IS">' . __('Iceland', 'addonpayments' ) . '</option>
                                    <option value="IN">' . __('India', 'addonpayments' ) . '</option>
                                    <option value="ID">' . __('Indonesia', 'addonpayments' ) . '</option>
                                    <option value="IR">' . __('Iran, Islamic Republic Of', 'addonpayments' ) . '</option>
                                    <option value="IQ">' . __('Iraq', 'addonpayments' ) . '</option>
                                    <option value="IE">' . __('Ireland', 'addonpayments' ) . '</option>
                                    <option value="IM">' . __('Isle Of Man', 'addonpayments' ) . '</option>
                                    <option value="IL">' . __('Israel', 'addonpayments' ) . '</option>
                                    <option value="IT">' . __('Italy', 'addonpayments' ) . '</option>
                                    <option value="JM">' . __('Jamaica', 'addonpayments' ) . '</option>
                                    <option value="JP">' . __('Japan', 'addonpayments' ) . '</option>
                                    <option value="JE">' . __('Jersey', 'addonpayments' ) . '</option>
                                    <option value="JO">' . __('Jordan', 'addonpayments' ) . '</option>
                                    <option value="KZ">' . __('Kazakhstan', 'addonpayments' ) . '</option>
                                    <option value="KE">' . __('Kenya', 'addonpayments' ) . '</option>
                                    <option value="KI">' . __('Kiribati', 'addonpayments' ) . '</option>
                                    <option value="KR">' . __('Korea', 'addonpayments' ) . '</option>
                                    <option value="KW">' . __('Kuwait', 'addonpayments' ) . '</option>
                                    <option value="KG">' . __('Kyrgyzstan', 'addonpayments' ) . '</option>
                                    <option value="LA">' . __('Lao People\'s Democratic Republic', 'addonpayments' ) . '</option>
                                    <option value="LV">' . __('Latvia', 'addonpayments' ) . '</option>
                                    <option value="LB">' . __('Lebanon', 'addonpayments' ) . '</option>
                                    <option value="LS">' . __('Lesotho', 'addonpayments' ) . '</option>
                                    <option value="LR">' . __('Liberia', 'addonpayments' ) . '</option>
                                    <option value="LY">' . __('Libyan Arab Jamahiriya', 'addonpayments' ) . '</option>
                                    <option value="LI">' . __('Liechtenstein', 'addonpayments' ) . '</option>
                                    <option value="LT">' . __('Lithuania', 'addonpayments' ) . '</option>
                                    <option value="LU">' . __('Luxembourg', 'addonpayments' ) . '</option>
                                    <option value="MO">' . __('Macao', 'addonpayments' ) . '</option>
                                    <option value="MK">' . __('Macedonia', 'addonpayments' ) . '</option>
                                    <option value="MG">' . __('Madagascar', 'addonpayments' ) . '</option>
                                    <option value="MW">' . __('Malawi', 'addonpayments' ) . '</option>
                                    <option value="MY">' . __('Malaysia', 'addonpayments' ) . '</option>
                                    <option value="MV">' . __('Maldives', 'addonpayments' ) . '</option>
                                    <option value="ML">' . __('Mali', 'addonpayments' ) . '</option>
                                    <option value="MT">' . __('Malta', 'addonpayments' ) . '</option>
                                    <option value="MH">' . __('Marshall Islands', 'addonpayments' ) . '</option>
                                    <option value="MQ">' . __('Martinique', 'addonpayments' ) . '</option>
                                    <option value="MR">' . __('Mauritania', 'addonpayments' ) . '</option>
                                    <option value="MU">' . __('Mauritius', 'addonpayments' ) . '</option>
                                    <option value="YT">' . __('Mayotte', 'addonpayments' ) . '</option>
                                    <option value="MX">' . __('Mexico', 'addonpayments' ) . '</option>
                                    <option value="FM">' . __('Micronesia, Federated States Of', 'addonpayments' ) . '</option>
                                    <option value="MD">' . __('Moldova', 'addonpayments' ) . '</option>
                                    <option value="MC">' . __('Monaco', 'addonpayments' ) . '</option>
                                    <option value="MN">' . __('Mongolia', 'addonpayments' ) . '</option>
                                    <option value="ME">' . __('Montenegro', 'addonpayments' ) . '</option>
                                    <option value="MS">' . __('Montserrat', 'addonpayments' ) . '</option>
                                    <option value="MA">' . __('Morocco', 'addonpayments' ) . '</option>
                                    <option value="MZ">' . __('Mozambique', 'addonpayments' ) . '</option>
                                    <option value="MM">' . __('Myanmar', 'addonpayments' ) . '</option>
                                    <option value="NA">' . __('Namibia', 'addonpayments' ) . '</option>
                                    <option value="NR">' . __('Nauru', 'addonpayments' ) . '</option>
                                    <option value="NP">' . __('Nepal', 'addonpayments' ) . '</option>
                                    <option value="NL">' . __('Netherlands', 'addonpayments' ) . '</option>
                                    <option value="AN">' . __('Netherlands Antilles', 'addonpayments' ) . '</option>
                                    <option value="NC">' . __('New Caledonia', 'addonpayments' ) . '</option>
                                    <option value="NZ">' . __('New Zealand', 'addonpayments' ) . '</option>
                                    <option value="NI">' . __('Nicaragua', 'addonpayments' ) . '</option>
                                    <option value="NE">' . __('Niger', 'addonpayments' ) . '</option>
                                    <option value="NG">' . __('Nigeria', 'addonpayments' ) . '</option>
                                    <option value="NU">' . __('Niue', 'addonpayments' ) . '</option>
                                    <option value="NF">' . __('Norfolk Island', 'addonpayments' ) . '</option>
                                    <option value="MP">' . __('Northern Mariana Islands', 'addonpayments' ) . '</option>
                                    <option value="NO">' . __('Norway', 'addonpayments' ) . '</option>
                                    <option value="OM">' . __('Oman', 'addonpayments' ) . '</option>
                                    <option value="PK">' . __('Pakistan', 'addonpayments' ) . '</option>
                                    <option value="PW">' . __('Palau', 'addonpayments' ) . '</option>
                                    <option value="PS">' . __('Palestinian Territory, Occupied', 'addonpayments' ) . '</option>
                                    <option value="PA">' . __('Panama', 'addonpayments' ) . '</option>
                                    <option value="PG">' . __('Papua New Guinea', 'addonpayments' ) . '</option>
                                    <option value="PY">' . __('Paraguay', 'addonpayments' ) . '</option>
                                    <option value="PE">' . __('Peru', 'addonpayments' ) . '</option>
                                    <option value="PH">' . __('Philippines', 'addonpayments' ) . '</option>
                                    <option value="PN">' . __('Pitcairn', 'addonpayments' ) . '</option>
                                    <option value="PL">' . __('Poland', 'addonpayments' ) . '</option>
                                    <option value="PT">' . __('Portugal', 'addonpayments' ) . '</option>
                                    <option value="PR">' . __('Puerto Rico', 'addonpayments' ) . '</option>
                                    <option value="QA">' . __('Qatar', 'addonpayments' ) . '</option>
                                    <option value="RE">' . __('Reunion', 'addonpayments' ) . '</option>
                                    <option value="RO">' . __('Romania', 'addonpayments' ) . '</option>
                                    <option value="RU">' . __('Russian Federation', 'addonpayments' ) . '</option>
                                    <option value="RW">' . __('Rwanda', 'addonpayments' ) . '</option>
                                    <option value="BL">' . __('Saint Barthelemy', 'addonpayments' ) . '</option>
                                    <option value="SH">' . __('Saint Helena', 'addonpayments' ) . '</option>
                                    <option value="KN">' . __('Saint Kitts And Nevis', 'addonpayments' ) . '</option>
                                    <option value="LC">' . __('Saint Lucia', 'addonpayments' ) . '</option>
                                    <option value="MF">' . __('Saint Martin', 'addonpayments' ) . '</option>
                                    <option value="PM">' . __('Saint Pierre And Miquelon', 'addonpayments' ) . '</option>
                                    <option value="VC">' . __('Saint Vincent And Grenadines', 'addonpayments' ) . '</option>
                                    <option value="WS">' . __('Samoa', 'addonpayments' ) . '</option>
                                    <option value="SM">' . __('San Marino', 'addonpayments' ) . '</option>
                                    <option value="ST">' . __('Sao Tome And Principe', 'addonpayments' ) . '</option>
                                    <option value="SA">' . __('Saudi Arabia', 'addonpayments' ) . '</option>
                                    <option value="SN">' . __('Senegal', 'addonpayments' ) . '</option>
                                    <option value="RS">' . __('Serbia', 'addonpayments' ) . '</option>
                                    <option value="SC">' . __('Seychelles', 'addonpayments' ) . '</option>
                                    <option value="SL">' . __('Sierra Leone', 'addonpayments' ) . '</option>
                                    <option value="SG">' . __('Singapore', 'addonpayments' ) . '</option>
                                    <option value="SK">' . __('Slovakia', 'addonpayments' ) . '</option>
                                    <option value="SI">' . __('Slovenia', 'addonpayments' ) . '</option>
                                    <option value="SB">' . __('Solomon Islands', 'addonpayments' ) . '</option>
                                    <option value="SO">' . __('Somalia', 'addonpayments' ) . '</option>
                                    <option value="ZA">' . __('South Africa', 'addonpayments' ) . '</option>
                                    <option value="GS">' . __('South Georgia And Sandwich Isl.', 'addonpayments' ) . '</option>
                                    <option value="ES">' . __('Spain', 'addonpayments' ) . '</option>
                                    <option value="LK">' . __('Sri Lanka', 'addonpayments' ) . '</option>
                                    <option value="SD">' . __('Sudan', 'addonpayments' ) . '</option>
                                    <option value="SR">' . __('Suriname', 'addonpayments' ) . '</option>
                                    <option value="SJ">' . __('Svalbard And Jan Mayen', 'addonpayments' ) . '</option>
                                    <option value="SZ">' . __('Swaziland', 'addonpayments' ) . '</option>
                                    <option value="SE">' . __('Sweden', 'addonpayments' ) . '</option>
                                    <option value="CH">' . __('Switzerland', 'addonpayments' ) . '</option>
                                    <option value="SY">' . __('Syrian Arab Republic', 'addonpayments' ) . '</option>
                                    <option value="TW">' . __('Taiwan', 'addonpayments' ) . '</option>
                                    <option value="TJ">' . __('Tajikistan', 'addonpayments' ) . '</option>
                                    <option value="TZ">' . __('Tanzania', 'addonpayments' ) . '</option>
                                    <option value="TH">' . __('Thailand', 'addonpayments' ) . '</option>
                                    <option value="TL">' . __('Timor-Leste', 'addonpayments' ) . '</option>
                                    <option value="TG">' . __('Togo', 'addonpayments' ) . '</option>
                                    <option value="TK">' . __('Tokelau', 'addonpayments' ) . '</option>
                                    <option value="TO">' . __('Tonga', 'addonpayments' ) . '</option>
                                    <option value="TT">' . __('Trinidad And Tobago', 'addonpayments' ) . '</option>
                                    <option value="TN">' . __('Tunisia', 'addonpayments' ) . '</option>
                                    <option value="TR">' . __('Turkey', 'addonpayments' ) . '</option>
                                    <option value="TM">' . __('Turkmenistan', 'addonpayments' ) . '</option>
                                    <option value="TC">' . __('Turks And Caicos Islands', 'addonpayments' ) . '</option>
                                    <option value="TV">' . __('Tuvalu', 'addonpayments' ) . '</option>
                                    <option value="UG">' . __('Uganda', 'addonpayments' ) . '</option>
                                    <option value="UA">' . __('Ukraine', 'addonpayments' ) . '</option>
                                    <option value="AE">' . __('United Arab Emirates', 'addonpayments' ) . '</option>
                                    <option value="GB">' . __('United Kingdom', 'addonpayments' ) . '</option>
                                    <option value="US">' . __('United States', 'addonpayments' ) . '</option>
                                    <option value="UM">' . __('United States Outlying Islands', 'addonpayments' ) . '</option>
                                    <option value="UY">' . __('Uruguay', 'addonpayments' ) . '</option>
                                    <option value="UZ">' . __('Uzbekistan', 'addonpayments' ) . '</option>
                                    <option value="VU">' . __('Vanuatu', 'addonpayments' ) . '</option>
                                    <option value="VE">' . __('Venezuela', 'addonpayments' ) . '</option>
                                    <option value="VN">' . __('Viet Nam', 'addonpayments' ) . '</option>
                                    <option value="VG">' . __('Virgin Islands, British', 'addonpayments' ) . '</option>
                                    <option value="VI">' . __('Virgin Islands, U.S.', 'addonpayments' ) . '</option>
                                    <option value="WF">' . __('Wallis And Futuna', 'addonpayments' ) . '</option>
                                    <option value="EH">' . __('Western Sahara', 'addonpayments' ) . '</option>
                                    <option value="YE">' . __('Yemen', 'addonpayments' ) . '</option>
                                    <option value="ZM">' . __('Zambia', 'addonpayments' ) . '</option>
                                    <option value="ZW">' . __('Zimbabwe', 'addonpayments' ) . '</option>
                                </select>';
        } else {
            $billing_country = '';
        }

        if ( ! empty( $billing_fields ) && in_array( 'billing_state', $billing_fields ) ) {
            $billing_state = '<input type="text" name="billing_state" class="pure-input-1-2" placeholder="' . __('Billing State', 'addonpayments' ) . '">';
        } else {
            $billing_state = '';
        }

        if ( ! empty( $billing_fields ) && in_array( 'billing_postcode', $billing_fields ) ) {
            $billing_postcode = '<input type="text" name="billing_postcode" class="pure-input-1-2" placeholder="' . __('Billing Postcode', 'addonpayments' ) . '">';
        } else {
            $billing_postcode = '';
        }

        if ( ! empty( $billing_fields ) && in_array( 'billing_address', $billing_fields ) ) {
            $billing_address = '<input type="text" name="billing_address" class="pure-input-1-2" placeholder="' . __('Billing Address', 'addonpayments' ) . '">';
        } else {
            $billing_address = '';
        }

        if ( ! empty( $billing_fields ) && in_array( 'billing_email', $billing_fields ) ) {
            $billing_email = '<input type="text" name="billing_email" class="pure-input-1-2" placeholder="' . __('Billing Email', 'addonpayments' ) . '">';
        } else {
            $billing_email = '';
        }

         if ( ! empty( $billing_fields ) && in_array( 'billing_phone', $billing_fields ) ) {
            $billing_phone = '<input type="text" name="billing_phone" class="pure-input-1-2" placeholder="' . __('Billing Phone', 'addonpayments' ) . '">';
        } else {
            $billing_phone = '';
        }

        if ( ! empty( $shipping_fields ) ) {
            if ( empty( $billing_fields ) ) {
                $full = '-full';
            } else {
                $full = '';
            }
            $shipping_content = '<div class="column' . $full . '">
                                    <span id="colum_title">' . __( 'Shipping Data', 'addonpayments' ) . '</span>' .
                                    $user_type .
                                    $Full_Name .
                                    $shipping_country .
                                    $shipping_state .
                                    $shipping_city .
                                    $shipping_address .
                                    $shipping_postcode .
                                    $shipping_email .
                                    $shipping_phone .
                                '</div>';
        } else {
            $shipping_content = '';
        }

        if ( ! empty( $billing_fields ) ) {
            if ( empty( $shipping_fields ) ) {
                $full = '-full';
            } else {
                $full = '';
            }
            $billing_content = '<div class="column' . $full . '">
                                    <span id="colum_title">' . __( 'Billing Data', 'addonpayments' ) . '</span>' .
                                    $full_name_billing .
                                    $nic_tic_vat_name_billing .
                                    $billing_country .
                                    $billing_state .
                                    $billing_city .
                                    $billing_address .
                                    $billing_postcode .
                                    $billing_email .
                                    $billing_phone .
                                '</div>';
        } else {
            $billing_fields = '';
        }

        if ( ! empty( $text_buy_now ) ) {
            $text_buy_now_button = $text_buy_now;
        } else {
            $text_buy_now_button = __( 'Buy Now', 'addonpayments' );
        }

        if ( ! empty( $text_pay_now ) ) {
            $text_pay_now_button = $text_pay_now;
        } else {
            $text_pay_now_button = __( 'Pay Now with AddonPayments', 'addonpayments' );
        }

        if ( $show_comments == '1' ) {
            $COMMENT1 = '<div class="column-1">
                            <span id="colum_title_comment">' . __( 'Comment for your Order', 'addonpayments' ) . '</span>
                            <textarea class="pure-input-1-2" name="COMMENT1" placeholder="' . __('Add a comment for your order', 'addonpayments') . '"></textarea>
                        </div>';
        } else {
            $COMMENT1 = '';
        }

        if ( $id_product_block == '' ) {
            $div_acordeon_id = 'addond_accordion';
        } else {
            $div_acordeon_id = 'addond_accordion' . $id_product_block;
        }

        $form = '<div id="addonpayments">
        			<a name="' . $atts['product'] . '"></a>
                    <span id="addon_price">' . __( 'Price: ', 'addonpayments' ) . $currency_front . $price_front . $currency_back . '</span>' . ' ' . '<span id="price-postfix">' . $post_price . '</span><br />'
                    . $reten_field .
                    '<div id="' . $div_acordeon_id . '">
                        <h3>' . $text_buy_now_button . '</h3>
                        <form method="POST" action="' . $post_permanlink . '" class="pure-form">' .
                        $shipping_content .
                        $billing_content .
                        '<div class="clear"></div>' .
                            $COMMENT1 .
                            '<input type="hidden" name="base_price" value="' . $price . '">
                            <input type="hidden" name="post_permanlink" value="' . $post_permanlink . '">
                            <input type="hidden" name="PROD_ID" value="' . $atts['product'] . '">' .
                            $nonce_field .
                            '<button type="submit" class="pure-button pure-input-1-2 pure-button-primary">' . $text_pay_now_button . '</button>

                    </form>
                    </div>
                </div>';

        if ( ! empty( $post ) ) {
            return $post;
        } elseif ( ! empty( $process ) ) {
            return $process;
        } else {
            return $form;
        }

    }
    add_shortcode( 'addonpayments', 'addonp_price_shortcode' );