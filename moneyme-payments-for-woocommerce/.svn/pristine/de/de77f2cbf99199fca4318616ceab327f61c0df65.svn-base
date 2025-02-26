<?php
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
  global $woocommerce;
  function mme_checkout_enqueue_styles() {
    $plugin_url = plugin_dir_url( __DIR__ );
    wp_enqueue_style( 'g-font-lexa', 'https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap' );
    wp_enqueue_style( 'g-font-lato', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap' );
    wp_enqueue_style( 'font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
    
    wp_enqueue_style( 'animate', $plugin_url . 'views/assets/css/animate.css');
    wp_enqueue_style( 'global', $plugin_url . 'views/assets/css/global.css');
    wp_enqueue_style( 'custom', $plugin_url . 'views/assets/css/custom.css' );
    wp_enqueue_style( 'main-style', $plugin_url . 'views/assets/css/styles.css' );
    
  }

  function mme_checkout_enqueue_script() {
    $plugin_url = plugin_dir_url( __DIR__ );
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'proper', $plugin_url . 'views/assets/js/proper.js' );
    wp_enqueue_script( 'init-rs-js', $plugin_url . 'views/assets/js/rs-analytics.js', [], '', true );
    wp_enqueue_script( 'rs-tp', 'https://cdn.rudderlabs.com/v1/rudder-analytics.min.js', [], '', true );
    wp_enqueue_script( 'mme-analytics', $plugin_url . 'views/assets/js/mmeAnalytics.js', [], '', true );
    wp_enqueue_script( 'mme-analytics-custom', $plugin_url . 'views/assets/js/mmeAnalyticsCustomDestination.js', [], '', true );
    wp_enqueue_script( 'mme-custom', plugin_dir_url( __FILE__ ). '../views/assets/js/mme.js', '', '', true);
  }
  function mme_checkout_handler(){
    //63009 = declined
    //63008 = approved
    global $woocommerce;
    $woocommerce->session->set('chosen_payment_method', 'mme_gateway');
    $checkout_url = sanitize_text_field($_GET['checkout_url']);
    $order_id = sanitize_text_field($_GET['order_id']);
    if(!$order_id){
        wp_safe_redirect( wc_get_page_permalink( 'checkout' ) );
    }
    $order = wc_get_order($order_id );
    $obj = new MMEGateway();
    $encoded_orderid = base64_encode(get_site_url()).':'.$order_id;
    $response = $obj->MME->checkPaymentStatus(["order_id" => $encoded_orderid, "order_total" => $order->total]);
    if(!$response){
        wc_add_notice( __( 'MoneyMe+ is currently under maintenance. Please contact us on 1300 329 037 for urgent issues.', 'gateway' ), 'error' );
        wp_safe_redirect( wc_get_page_permalink( 'checkout' ) );
        exit;
    }
    if($response->Message){
      if($response->Message == "Authorization has been denied for this request."){
          wc_add_notice( __( 'Oops! This merchant’s MME+ details are incorrect. If you are the owner or admin of this website, please update your MoneyMe+ Woocommerce plugin to fix this issue.', 'gateway' ), 'error' );
          wp_safe_redirect( wc_get_page_permalink( 'checkout' ) );
          exit;
      }else{
          wc_add_notice( __($response->Message, 'gateway' ), 'error' );
          wp_safe_redirect( wc_get_page_permalink( 'checkout' ) );
          exit;
      }
    }
    if ($order->get_status() == "processing") {
      wp_redirect($checkout_url);
      exit;
    }

    /* start checking of stocks vs items ordered */
    $items = $order->get_items();
    $item_err = [];
    foreach ($items as $items_key => $items_value) { 
        $id = $items_value['variation_id'] ? $items_value['variation_id'] : $items_value['product_id'];
        $_product =  wc_get_product($id); 
        if($_product->stock_status == "outofstock"){
          $item_err[] = $items_value['name'];
        }else{
          if($_product->managing_stock()){
            if($items_value['qty'] > $_product->stock_quantity){
                $item_err[] = $items_value['name'];
            }
          }
        }
    }
    /* end checking of stocks vs items ordered */
    if($response->IsRedrawApproved){
        if(count($item_err)){
            wc_add_notice( __( "Unfortunately, one or more of the items in your cart is no longer available. Please contact the merchant to discuss the availability of this item/s.  If your credit limit in MoneyMe+ was deducted, kindly contact MoneyMe on 1300 844 349 to fix this issue.<br/>".'Item/s unavailable: ['.implode(',', $item_err).']', 'gateway' ), 'error' );
            wp_safe_redirect( wc_get_page_permalink( 'checkout' ) );
            exit;
        }
        $woocommerce->cart->empty_cart();
        $order->update_status('processing');
        $obj->MME->logOrderAsComplete($order_id);
        // Reduce stock levels
        $order->reduce_order_stock();
        wp_redirect($checkout_url);
        exit;
    }else{
       if($response->StatusId == 63006){
          $order->update_status('cancelled');
          wc_add_notice( __( 'Your Payment is Declined.', 'gateway' ), 'error' );
          wp_safe_redirect( wc_get_page_permalink( 'checkout' ) );
          exit;
       }elseif($response->StatusId == 63011){
            $woocommerce->cart->empty_cart();
            $data = $order->data;
            $billing = $order->data['billing'];
            $firstname = $billing['first_name'];
            $lastname = $billing['last_name'];
            $company = $billing['company'];
            $address_1 = $billing['address_1'];
            $address_2 = $billing['address_2'];
            $city = $billing['city'];
            $state = $billing['state'];
            $postcode = $billing['postcode'];
            $country = $billing['country'];
            $email = $billing['email'];
            $phone = $billing['phone'];
            
            $woocommerce->customer->set_billing_first_name($firstname);
            $woocommerce->customer->set_billing_last_name($lastname);
            $woocommerce->customer->set_billing_company($company);
            $woocommerce->customer->set_billing_address_1($address_1);
            $woocommerce->customer->set_billing_address_2($address_2);
            $woocommerce->customer->set_billing_city($city);
            $woocommerce->customer->set_billing_state($state);
            $woocommerce->customer->set_billing_postcode($postcode);
            $woocommerce->customer->set_billing_country($country);
            $woocommerce->customer->set_billing_email($email);
            $woocommerce->customer->set_billing_phone($phone);
            wc_add_notice( __( 'Awesome! Your MoneyMe Plus account has been approved. Please reselect MoneyMe Plus as the payment option and login to complete your purchase.', 'gateway' ), 'notice' );
            if(count($item_err)){
                wc_add_notice( __( "Unfortunately, one or more of the items in your cart is no longer available. Please contact the merchant to discuss the availability of this item/s.  If your credit limit in MoneyMe+ was deducted, kindly contact MoneyMe on 1300 844 349 to fix this issue.<br/>".'Item/s unavailable: ['.implode(',', $item_err).']', 'gateway' ), 'error' );
            }else{
              foreach ( $order->get_items() as $item_id => $item ) {
                  $product_id = $item->get_product_id();
                  $variation_id = $item->get_variation_id();
                  $quantity = $item->get_quantity();
                  if ($variation_id){
                    $product_id = $variation_id;
                  }
                  $woocommerce->cart->add_to_cart( $product_id, $quantity);
              }
            }
          $order->update_status('cancelled');
          $order->add_order_note( 'Customer has successfully signed for an MME+ account and was redirected back to your website to complete a new order.');
          wp_safe_redirect( wc_get_page_permalink( 'checkout' ) );
          exit;
       }else{
          wc_add_notice( __( 'MoneyMe+ is currently under maintenance. Please contact us on 1300 329 037 for urgent issues.', 'gateway' ), 'error' );
          wp_safe_redirect( wc_get_page_permalink( 'checkout' ) );
          exit;
       }
    }
    die();
  }

  add_action('wp_ajax_mme_checkout', 'mme_checkout_handler'); // wp_ajax_{action}
  add_action('wp_ajax_nopriv_mme_checkout', 'mme_checkout_handler');

  add_action( 'wp_enqueue_scripts', 'mme_checkout_enqueue_styles' );
  add_action( 'wp_enqueue_scripts', 'mme_checkout_enqueue_script' );
}
