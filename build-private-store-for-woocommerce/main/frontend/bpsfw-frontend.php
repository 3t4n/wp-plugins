<?php
   function bpsfw_get_user_role() {
    global $current_user; 
    $user_role = '';

    // Check if the user is logged in
    if (is_user_logged_in()) {
        // Get the role of the logged-in user
        $user_role = $current_user->roles[0];
    } else {
        // Assign 'guest' role for non-logged-in (guest) users
        $user_role = 'guest';
    }

    return $user_role;
}

      

function login_form_for_user() {
  global $bpsfw_comman, $post;
  $user_role = bpsfw_get_user_role(); // Get the user role (either 'guest' or logged-in user's role)

  // Get the redirect URL from the options or fallback to My Account page
  $my_account_url = get_permalink(get_option('woocommerce_myaccount_page_id'));
  $private_prod_redirect = !empty($bpsfw_comman['bpsfw_prod_redirect_url']) 
      ? esc_url($bpsfw_comman['bpsfw_prod_redirect_url']) 
      : $my_account_url;

  if (is_page() || is_shop() || is_home()) {
      if (is_shop()) {
          $page_id = wc_get_page_id('shop');
      }else{
          $page_id = get_queried_object_id();
      }

      // Check if this page is restricted for the current user role
      $appended_pages = get_option('wg_pags_select2_' . $user_role);
      if (!empty($appended_pages) && in_array($page_id, $appended_pages)) {
          wp_redirect($private_prod_redirect);
          exit();
      }
  }

  // Product-specific logic
  if (is_product()) {
      $products_get = get_option('wg_combo_' . $user_role);
      if (!empty($products_get) && in_array(get_the_ID(), $products_get)) {
          wp_redirect($private_prod_redirect);
          exit();
      }

      // Category-based redirection
      $categories_get = get_option('wg_cats_select2_' . $user_role);
      if (!empty($categories_get)) {
          $product_categories = wp_get_post_terms(get_the_ID(), 'product_cat', ['fields' => 'ids']);
          if (array_intersect($categories_get, $product_categories)) {
              wp_redirect($private_prod_redirect);
              exit();
          }
      }

      // Tag-based redirection
      $tags_get = get_option('bpsfw_tags_select2_' . $user_role);
      if (!empty($tags_get)) {
          $product_tags = wp_get_post_terms(get_the_ID(), 'product_tag', ['fields' => 'ids']);
          if (array_intersect($tags_get, $product_tags)) {
              wp_redirect($private_prod_redirect);
              exit();
          }
      }
  }

  // Product category page logic
  if (is_product_category()) {
      $categories_get = get_option('wg_cats_select2_' . $user_role);
      if (!empty($categories_get)) {
          $product_category = get_queried_object()->term_id;
          if (in_array($product_category, $categories_get)) {
              wp_redirect($private_prod_redirect);
              exit();
          }
      }
  }

  // Product tag page logic
  if (is_product_tag()) {
      $tags_get = get_option('bpsfw_tags_select2_' . $user_role);
      if (!empty($tags_get)) {
          $product_tag = get_queried_object()->term_id;
          if (in_array($product_tag, $tags_get)) {
              wp_redirect($private_prod_redirect);
              exit();
          }
      }
  }
}
      


function custom_pre_get_posts_query($q) {
  global $bpsfw_comman;
  $user_role = bpsfw_get_user_role(); // Get user role (either 'guest' or logged-in user's role)

  if ($bpsfw_comman['bpsfw_disble_price_addtocartbutton'] == "yes") {
      return $q;
  } else {
      $productsa = get_option('wg_combo_' . $user_role);
      $q->set('post__not_in', $productsa);

      if (!empty($productsa) || empty($productsa)) {
          $appended_terms = get_option('wg_cats_select2_' . $user_role);
          if (!empty($appended_terms)) {
              foreach ($appended_terms as $term) {
                  $tax_query = (array) $q->get('tax_query');
                  $tax_query[] = [
                      'taxonomy' => 'product_cat',
                      'field' => 'term_id',
                      'terms' => [$term],
                      'operator' => 'NOT IN'
                  ];
                  $q->set('tax_query', $tax_query);
              }
          }
      }

      if (!empty($productsa) || empty($productsa) && !empty($appended_terms) || empty($appended_terms)) {
          $appended_tags = get_option('bpsfw_tags_select2_' . $user_role);
          if (!empty($appended_tags)) {
              foreach ($appended_tags as $tags) {
                  $tax_query = (array) $q->get('tax_query');
                  $tax_query[] = [
                      'taxonomy' => 'product_tag',
                      'field' => 'term_id',
                      'terms' => [$tags],
                      'operator' => 'NOT IN'
                  ];
                  $q->set('tax_query', $tax_query);
              }
          }
      }
  }
}


      

      
      

function bpsfw_hide_addcart_link_not_logged_in($btnHtml, $product) {
  global $bpsfw_comman;
  $user_role = bpsfw_get_user_role(); // Get the user role

  if ($bpsfw_comman['bpsfw_disble_price_addtocartbutton'] == "yes" || !empty(get_option('wg_combo_' . $user_role))) {
      $is_restricted = false;

      // Check for restricted products
      if (!empty(get_option('wg_combo_' . $user_role)) && in_array($product->get_id(), get_option('wg_combo_' . $user_role))) {
          $is_restricted = true;
      }

      // Check for restricted categories
      if (!$is_restricted) {
          $categories_get = get_option('wg_cats_select2_' . $user_role);
          if (!empty($categories_get)) {
              $product_categories = wp_get_post_terms($product->get_id(), 'product_cat', ['fields' => 'ids']);
              if (array_intersect($categories_get, $product_categories)) {
                  $is_restricted = true;
              }
          }
      }

      // Check for restricted tags
      if (!$is_restricted) {
          $tags_get = get_option('bpsfw_tags_select2_' . $user_role);
          if (!empty($tags_get)) {
              $product_tags = wp_get_post_terms($product->get_id(), 'product_tag', ['fields' => 'ids']);
              if (array_intersect($tags_get, $product_tags)) {
                  $is_restricted = true;
              }
          }
      }

      // If restricted, hide the Add to Cart button
      if ($is_restricted) {
          $btnHtml = ''; // Clear the button HTML to hide it
      }
  }

  return $btnHtml;
}





function bpsfw_hide_price_addcart_not_logged_in($price, $product) {
  global $bpsfw_comman;
  $user_role = bpsfw_get_user_role(); // Get the user role

  if ($bpsfw_comman['bpsfw_disble_price_addtocartbutton'] == "yes" || !empty(get_option('wg_combo_' . $user_role))) {
      if (!is_user_logged_in()) {
          // Check for specific products
          if (!empty(get_option('wg_combo_' . $user_role)) && in_array($product->get_id(), get_option('wg_combo_' . $user_role))) {
              $price = '<div><a href="' . get_permalink(wc_get_page_id('myaccount')) . '">' . __($bpsfw_comman['bpsfw_login_to_see_price'], 'bbloomer') . '</a></div>';
              remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
          } else {
              // Check for restricted categories
              $categories_get = get_option('wg_cats_select2_' . $user_role);
              if (!empty($categories_get)) {
                  $product_categories = wp_get_post_terms($product->get_id(), 'product_cat', ['fields' => 'ids']);
                  if (array_intersect($categories_get, $product_categories)) {
                      $price = '<div><a href="' . get_permalink(wc_get_page_id('myaccount')) . '">' . __($bpsfw_comman['bpsfw_login_to_see_price'], 'bbloomer') . '</a></div>';
                      remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
                  }
              }

              // Check for restricted tags
              $tags_get = get_option('bpsfw_tags_select2_' . $user_role);
              if (!empty($tags_get)) {
                  $product_tags = wp_get_post_terms($product->get_id(), 'product_tag', ['fields' => 'ids']);
                  if (array_intersect($tags_get, $product_tags)) {
                      $price = '<div><a href="' . get_permalink(wc_get_page_id('myaccount')) . '">' . __($bpsfw_comman['bpsfw_login_to_see_price'], 'bbloomer') . '</a></div>';
                      remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
                  }
              }
          }
      } else {
          // Logic for logged-in users
          if (!empty(get_option('wg_combo_' . $user_role)) && in_array($product->get_id(), get_option('wg_combo_' . $user_role))) {
              $price = '<div><a href="' . get_permalink(wc_get_page_id('myaccount')) . '">' . __($bpsfw_comman['bpsfw_login_to_see_price'], 'bbloomer') . '</a></div>';
              remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
          } else {
              // Check for restricted categories
              $categories_get = get_option('wg_cats_select2_' . $user_role);
              if (!empty($categories_get)) {
                  $product_categories = wp_get_post_terms($product->get_id(), 'product_cat', ['fields' => 'ids']);
                  if (array_intersect($categories_get, $product_categories)) {
                      $price = '<div><a href="' . get_permalink(wc_get_page_id('myaccount')) . '">' . __($bpsfw_comman['bpsfw_login_to_see_price'], 'bbloomer') . '</a></div>';
                      remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
                  }
              }

              // Check for restricted tags
              $tags_get = get_option('bpsfw_tags_select2_' . $user_role);
              if (!empty($tags_get)) {
                  $product_tags = wp_get_post_terms($product->get_id(), 'product_tag', ['fields' => 'ids']);
                  if (array_intersect($tags_get, $product_tags)) {
                      $price = '<div><a href="' . get_permalink(wc_get_page_id('myaccount')) . '">' . __($bpsfw_comman['bpsfw_login_to_see_price'], 'bbloomer') . '</a></div>';
                      remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
                  }
              }
          }
      }
  }

  return $price;
}



               
global $bpsfw_comman; 
add_filter( 'woocommerce_get_price_html','bpsfw_hide_price_addcart_not_logged_in', 9999, 2 );  
add_filter( 'woocommerce_loop_add_to_cart_link', 'bpsfw_hide_addcart_link_not_logged_in', 10, 2 );

add_action( 'wp' ,'login_form_for_user' );
add_action( 'woocommerce_product_query','custom_pre_get_posts_query');

