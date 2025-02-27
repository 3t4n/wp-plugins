<?php
// Add custom validation before adding product to cart
add_filter('woocommerce_add_to_cart_validation', 'bpsfw_add_to_cart_validation', 10, 5);
function bpsfw_add_to_cart_validation($passed, $product_id, $quantity, $variation_id = null, $variations = null) {
    global $bpsfw_comman;       
    $user_role = bpsfw_get_user_role(); 

    if($bpsfw_comman['bpsfw_disble_price_addtocartbutton'] == "yes"  || !empty(get_option('wg_combo_'.$user_role))){
      if ( ! is_user_logged_in() ) { 
        if(!empty(get_option('wg_combo_'.$user_role)) && in_array($product_id , get_option('wg_combo_'.$user_role))  ){
          $passed = false;
        }else if(!empty(get_option('wg_cats_select2_'.$user_role))){
          $terms = get_the_terms ( $product_id, 'product_cat');
          if(!empty($terms)){
            foreach ($terms as $key => $value) {
              if(!empty(get_option('wg_cats_select2_'.$user_role))){
                if (in_array($value->term_id, get_option('wg_cats_select2_'.$user_role))) {
                  $passed = false;
                }
              }
            }
          }
        }else if(!empty(get_option('bpsfw_tags_select2_'.$user_role))){
            $terms = get_the_terms( $product_id, 'product_tag' );
            if(!empty($terms)){
              foreach ($terms as $key => $value) {
                  if(!empty(get_option('bpsfw_tags_select2_'.$user_role))){
                      if (in_array($value->term_id, get_option('bpsfw_tags_select2_'.$user_role))) {
                        $passed = false;
                      }
                  }
              }
            }
        }else{
          return $passed;
        }
      }
    }

    if($passed == false){
      wc_add_notice('Please login to add to cart "'.get_the_title($product_id).'".', 'error');
    }

    return $passed;
}
 add_action('init','bpsfw_init_panding',8);
function bpsfw_init_panding(){
  global $bpsfw_comman;
  if($bpsfw_comman['bpsfw_approve_registration'] == 'yes'){
      add_filter( 'authenticate', 'my_custom_function_name', 30, 3);
      add_action( 'woocommerce_registration_redirect','BPSFW_new_user_approve_autologout', 2 );  
  }
}

function my_custom_function_name($user, $password){
global $bpsfw_comman;
if (isset($user->user_pass)) {            
  if ($user->roles['0'] == 'administrator') {
    return $user;
  }else{
    if (get_user_meta($user->ID, 'approval_confirmation', true) == 'confirm_approve') {
        return $user;
    }
    return new WP_Error('pending_approval', $bpsfw_comman['bpsfw_pending_account_approval'] );
  }          
}
}


function BPSFW_new_user_approve_autologout(){
if ( is_user_logged_in() ) {
  $current_user = wp_get_current_user();
  $user_id = $current_user->ID;
  if ( get_user_meta($user_id, 'approval_confirmation', true )  === 'confirm_approve' ){ 
    $approved = true;
  }else{
    $approved = false;
  }     

  if ( $approved ){ 
      return $redirect_url;
  }else{
    wp_logout();
    wp_clear_auth_cookie();
    return add_query_arg( 'confirm_approve', 'false', get_permalink( get_option('woocommerce_myaccount_page_id') ) );
  }
}
}
add_filter( 'woocommerce_is_purchasable', 'bpsfw_hide_addcart_button_single_product', 10, 2);


      function bpsfw_hide_addcart_button_single_product($purchasable, $product) {
          // Check if it's a single product page
          if (is_product()) {
              // Return false to make the product not purchasable
              // return false;

              global $bpsfw_comman;       
              $user_role = bpsfw_get_user_role(); 

              if($bpsfw_comman['bpsfw_disble_price_addtocartbutton'] == "yes"  || !empty(get_option('wg_combo_'.$user_role))){
                if ( ! is_user_logged_in() ) { 
                  if(!empty(get_option('wg_combo_'.$user_role)) && in_array(get_the_id() , get_option('wg_combo_'.$user_role))  ){
                    $purchasable = false;
                  }else if(!empty(get_option('wg_cats_select2_'.$user_role))){
                    $terms = get_the_terms ( get_the_id(), 'product_cat');
                    if(!empty($terms)){
                      foreach ($terms as $key => $value) {
                        if(!empty(get_option('wg_cats_select2_'.$user_role))){
                          if (in_array($value->term_id, get_option('wg_cats_select2_'.$user_role))) {
                            $purchasable = false;
                          }
                        }
                      }
                    }
                  }else if(!empty(get_option('bpsfw_tags_select2_'.$user_role))){
                      $terms = get_the_terms( get_the_id(), 'product_tag' );
                      if(!empty($terms)){
                        foreach ($terms as $key => $value) {
                            if(!empty(get_option('bpsfw_tags_select2_'.$user_role))){
                                if (in_array($value->term_id, get_option('bpsfw_tags_select2_'.$user_role))) {
                                  $purchasable = false;
                                }
                            }
                        }
                      }
                  }else{
                    return $purchasable;
                  }
                }
              }
          }

          return $purchasable;
      }