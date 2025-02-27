<?php
/**
 * Mrshop Settings
 *
 */



function enqueue_add_plugin_to_cart_ajax_script() {
    wp_enqueue_script(
        'ajax-add-to-cart',
        plugins_url('assets/js/ajax-add-to-cart.js', __FILE__), // Use plugins_url() for plugin directory
        array('jquery'),
        null,
        true
    );

    // Localize the script with the necessary data
    $ajax_params = array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('add-to-cart-nonce'),
        'site_url' => site_url(),
    );
    wp_localize_script('ajax-add-to-cart', 'ajax_add_to_cart_params', $ajax_params);
}
add_action('wp_enqueue_scripts', 'enqueue_add_plugin_to_cart_ajax_script');





// AJAX callback function to add item to cart
function add_to_cart_plugin_ajax_callback() {
    check_ajax_referer('add-to-cart-nonce', 'security');

    $product_id = isset($_POST['product_id']) ? absint($_POST['product_id']) : 0;
    $product    = wc_get_product($product_id);

    if (!$product) {
        wp_send_json_error('Invalid product');
    }

    // Get the quantity from the AJAX request
    //$quantity = isset($_POST['quantity']) ? wc_stock_amount($_POST['quantity']) : 1;
    //// Unslash and sanitize the quantity input
// Check if 'quantity' is set, unslash it, and sanitize it
$quantity = isset($_POST['quantity']) ? wc_stock_amount(absint(wp_unslash($_POST['quantity']))) : 1;



    // Add the product to the cart with the correct quantity
    $cart_item_key = WC()->cart->add_to_cart($product_id, $quantity);

    if ($cart_item_key) {
        // Get information about the added product
        $thumbnail = get_the_post_thumbnail($product_id, 'thumbnail');
        $title     = $product->get_title();

        // Calculate the count of the items for the specific product just added
        $itemCount = 0;
        foreach (WC()->cart->get_cart() as $cart_item) {
            if ($cart_item['product_id'] === $product_id) {
                $itemCount += $cart_item['quantity'];
            }
        }
        
        $response = array(
            'success'    => true,
            'thumbnail'  => $thumbnail,
            'title'      => $title,
            'itemCount'  => $itemCount,
        );
    } else {
        $response = array(
            'success' => false,
            'message' => __('Failed to add item to the cart', 'wpsection'),
        );
    }

    wp_send_json($response);
}
add_action('wp_ajax_add_to_cart', 'add_to_cart_plugin_ajax_callback');
add_action('wp_ajax_nopriv_add_to_cart', 'add_to_cart_plugin_ajax_callback');



//Recently Viewd
function nest_track_product_view() {
    if ( ! is_singular( 'product' ) ) {
        return;
    }

    global $post;

    if ( empty( $_COOKIE['woocommerce_recently_viewed'] ) ) {
        $viewed_products = array();
    } else {
        //$viewed_products = (array) explode( '|', wp_unslash( $_COOKIE['woocommerce_recently_viewed'] ) );
        // Check if the cookie is set and unslash and sanitize the input
$viewed_products = isset($_COOKIE['woocommerce_recently_viewed']) ? (array) explode('|', sanitize_text_field(wp_unslash($_COOKIE['woocommerce_recently_viewed']))) : array();

// Further sanitize the product IDs
$viewed_products = array_map('absint', $viewed_products);

    }

    if ( ! in_array( $post->ID, $viewed_products ) ) {
        $viewed_products[] = $post->ID;
    }

    if ( sizeof( $viewed_products ) > 15 ) {
        array_shift( $viewed_products );
    }

    // Store for session only.
    wc_setcookie( 'woocommerce_recently_viewed', implode( '|', $viewed_products ) );
}
add_action( 'template_redirect', 'nest_track_product_view', 20 );






// Handle AJAX request to remove cart item
function woocommerce_remove_cart_item() {
    check_ajax_referer('woocommerce-cart', '_wpnonce');

    if (!isset($_POST['cart_item_key'])) {
        wp_send_json_error(array('error' => 'Invalid request'));
    }

    //$cart_item_key = sanitize_text_field($_POST['cart_item_key']);
	// Unslash and sanitize the cart_item_key
$cart_item_key = isset($_POST['cart_item_key']) ? sanitize_text_field(wp_unslash($_POST['cart_item_key'])) : '';

	
    WC()->cart->remove_cart_item($cart_item_key);

    // Calculate updated cart total
    WC()->cart->calculate_totals();
    $cart_total = WC()->cart->get_cart_total();

    wp_send_json_success(array('cart_total' => $cart_total));
}
add_action('wp_ajax_woocommerce_remove_cart_item', 'woocommerce_remove_cart_item');
add_action('wp_ajax_nopriv_woocommerce_remove_cart_item', 'woocommerce_remove_cart_item');


// Handle AJAX request to update cart item quantity
function woocommerce_update_cart_item_quantity() {
    check_ajax_referer('woocommerce-cart', '_wpnonce');

    if (!isset($_POST['cart_item_key']) || !isset($_POST['quantity'])) {
        wp_send_json_error(array('error' => 'Invalid request'));
    }

   // $cart_item_key = sanitize_text_field($_POST['cart_item_key']);
// Unslash and sanitize the cart_item_key
$cart_item_key = isset($_POST['cart_item_key']) ? sanitize_text_field(wp_unslash($_POST['cart_item_key'])) : '';

    $quantity = intval($_POST['quantity']);

    if ($quantity > 0) {
        WC()->cart->set_quantity($cart_item_key, $quantity);

        // Recalculate totals to account for coupon
        WC()->cart->calculate_totals();
        $cart_total = WC()->cart->get_cart_total();

        wp_send_json_success(array('cart_total' => $cart_total));
    } else {
        wp_send_json_error(array('error' => 'Invalid quantity'));
    }
}
add_action('wp_ajax_woocommerce_update_cart_item_quantity', 'woocommerce_update_cart_item_quantity');
add_action('wp_ajax_nopriv_woocommerce_update_cart_item_quantity', 'woocommerce_update_cart_item_quantity');





// shop_functions.php

function nest_get_product_x_categories() {
    $options = array();
    $taxonomy = 'product_cat';

    if (!empty($taxonomy)) {
        $terms = get_terms(array(
            'taxonomy'   => $taxonomy,
            'hide_empty' => false,
        ));

        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name; // Store slug as key and name as value
            }
        }
    }

    return $options;
}


function  wpsection_the_pagination($args = array(), $echo = 1)
{
	
	global $wp_query;
	
	$default =  array('base' => str_replace( 99999, '%#%', esc_url( get_pagenum_link( 99999 ) ) ), 'format' => '?paged=%#%', 'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages, 'next_text' => '&raquo;', 'prev_text' => '&laquo;', 'type'=>'list','add_args' => false);
						
	$args = wp_parse_args($args, $default);			
	
	
	$pagination = str_replace("<ul class='page-numbers'", '<ul class="pagination"', paginate_links($args) );
	
	if(paginate_links(array_merge(array('type'=>'array'),$args)))
	{
		if($echo) echo wp_kses_post($pagination);
		return $pagination;
	}
}

function wpsection_trim($text, $len, $more = null) {
    $text = strip_shortcodes($text);
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $excerpt_length = apply_filters('excerpt_length', $len, 10);
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[&hellip;]', 10);
    $excerpt_more = ($more) ? $more : ' ...';
    $text = wp_trim_words($text, $excerpt_length, $excerpt_more);
    return $text;
}

// Modify get_wps_blog_categories to add 'Select2' and set it as selected by default
function get_wps_blog_categories() {
    $options = array();
    $taxonomy = 'category';

    if (!empty($taxonomy)) {
        $terms = get_terms(
            array(
                'taxonomy' => $taxonomy,
                'hide_empty' => false,
            )
        );

        if (!empty($terms)) {
            $options[''] = 'All Categories';

            foreach ($terms as $term) {
                if (isset($term->slug) && isset($term->name)) {
                    $options[$term->slug] = $term->name;
                }
            }
        }
    }

    return $options;
}

/**
 * Display the total review count for a product in a WooCommerce template.
 */
function display_review_count() {
    global $product;

    // Check if the product has an average rating (meaning there are reviews).
    if ( $product->get_average_rating() ) {
        $product_id = $product->get_id(); // Get the product ID
        $review_count_var = get_wc_total_review_count($product_id); // Call the function to get the review count

        // Output the review count in a span element.
        echo '<span class="mr_review_number">' . esc_html($review_count_var) . '</span>';
    }
}






// Function to retrieve WooCommerce category list
function mr_all_cat_list() {
    $elements = get_terms( 'product_cat' );
    $product_cat_array = array();

    if ( !empty($elements) && !is_wp_error($elements) ) {
        foreach ( $elements as $element ) {
            $product_cat_array[ $element->term_id ] = $element->name;
        }
    }

    return $product_cat_array;
}


// Function to get the ID of the first category
function mr_get_first_cat_id() {
    $categories = mr_all_cat_list();
    if (!empty($categories)) {
        return key($categories);
    } else {
        return '';
    }
}



if ( ! function_exists( 'mr_shop_product_cat_list' ) ) {
    function mr_shop_product_cat_list() {
        $elements = get_terms( 'product_cat' );
        $product_cat_array = array();

        if ( !empty($elements) && !is_wp_error($elements) ) {
            foreach ( $elements as $element ) {
                $product_cat_array[ $element->term_id ] = $element->name;
            }
        }

        return $product_cat_array;
    }
}



if ( ! function_exists( 'mr_shop_product_tag_list' ) ) {
    function mr_shop_product_tag_list() {
        $elements = get_terms( 'product_tag' );
        $product_tag_array = array();

        if ( !empty($elements) && !is_wp_error($elements) ) {
            foreach ( $elements as $element ) {
                $product_tag_array[ $element->term_id ] = $element->name;
            }
        }

        return $product_tag_array;
    }
}

if ( ! function_exists( 'mr_product_rating' ) ) {

    function mr_product_rating() {
        global $product;
        $rating = intval( $product->get_average_rating() );

        // If there's a rating, display the full stars and the remaining empty stars.
        // If no rating, display all 5 empty stars.
        $full_stars = $rating > 0 ? $rating : 0;
        $empty_stars = 5 - $full_stars;

        ?>
        <ul class="mr_star_rating">
            <?php
            for ( $rs = 1; $rs <= $full_stars; $rs++ ) {
                echo '<li class="mr_star_full"><i class="eicon-star"></i></li>';
            }
            for ( $rns = 1; $rns <= $empty_stars; $rns++ ) {
                echo '<li class="mr_star_empty"><i class="eicon-star-o"></i></li>';
            }
            ?>
        </ul>
        <?php
    }
}


//function for Hot Sale

if ( ! function_exists( 'mr_product_cat_list' ) ) {
function mr_product_cat_list( ) {
 
    $term_id = 'product_cat';
    $categories = get_terms( $term_id );
 
    $cat_array['all'] = "Categories";

    if ( !empty($categories) ) {
        foreach ( $categories as $cat ) {
            $cat_info = get_term($cat, $term_id);
            $cat_array[ $cat_info->slug ] = $cat_info->name;
        }
    }
 
    return $cat_array;
}

}

if ( ! function_exists( 'mr_product_tag_list' ) ) {
function mr_product_tag_list( ) {
 
    $term_id = 'product_tag';
    $tag = get_terms( $term_id );
 
    $tag_array['all'] = "Tags";

    if ( !empty($tag) ) {
        foreach ( $tag as $tag ) {
            $tag_info = get_term($tag, $term_id);
            $tag_array[ $tag_info->slug ] = $tag_info->name;
        }
    }
 
    return $tag_array;
}
}
if ( ! function_exists( 'mr_get_product_prices' ) ) {
function mr_get_product_prices( $product ) {

    $saleargs = array(
        'qty'   => '1',
        'price' => $product->get_sale_price(),
    );
    $args     = array(
        'qty'   => '1',
        'price' => $product->get_regular_price(),
    );

    $tax_display_mode      = get_option( 'woocommerce_tax_display_shop' );
    $display_price         = $tax_display_mode == 'incl' ? wc_get_price_including_tax( $product ) : wc_get_price_excluding_tax( $product );
    $display_regular_price = $tax_display_mode == 'incl' ? wc_get_price_including_tax( $product, $args ) : wc_get_price_excluding_tax( $product, $args );
    $display_sale_price    = $tax_display_mode == 'incl' ? wc_get_price_including_tax( $product, $saleargs ) : wc_get_price_excluding_tax( $product, $saleargs );
    switch ( $product->get_type() ) {
        case 'variable':
            $price = $product->get_variation_regular_price( 'min', true );
            $sale  = $display_price;
            break;
        case 'simple':
            $price = $display_regular_price;
            $sale  = $display_sale_price;
            break;
    }
    if ( isset( $sale ) && ! empty( $sale ) && isset( $price ) && ! empty( $price ) ) {
        return array(
            'sale'  => $sale,
            'price' => $price,
        );
    }
    return false;
}
}


if ( ! function_exists( 'mr_product_special_price_calc' ) ) {
function mr_product_special_price_calc( $data ) {
    // sale and price
    if ( ! empty( $data ) ) {
        extract( $data );
    }
    $prefix = '';
    if ( isset( $sale ) && ! empty( $sale ) && isset( $price ) && ! empty( $price ) ) {
        if ( $price > $sale ) {
            $prefix  = '-';
            $dval    = $price - $sale;
            $percent = ( $dval / $price ) * 100;
        }
    }

    if ( isset( $percent ) && ! empty( $percent ) ) {
        return array(
            'prefix'  => $prefix,
            'percent' => round( $percent ),
        );
    }
    return false;
}

}