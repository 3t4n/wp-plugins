<?php

// footer cart icon loaded

if (!function_exists('finest_mini_cart_wp_footer')) {

    function finest_mini_cart_wp_footer()
    {
        $cartcheck = get_theme_mod('fmc_count_hide_checkout', true);
        $hidden_page = get_theme_mod('fmc_page_hide_cart', []);
        $cartpage = get_theme_mod('fmc_count_hide_cart', true);
        $cartpos = get_theme_mod('on_cart_position', 'bottom-right');
        $cartview = get_theme_mod('on_cart_view', true);
        $mini_cat_style = get_theme_mod('mini_cat_style', 'default');
        $effect = '';
        if ('bottom-left' == $cartpos || 'top-left' == $cartpos || 'center-left' == $cartpos) {
            $effect = 'finest-effect-right';
        }
        ?>
        <div id="finest-area"
            class="finest-area finest-effect <?php echo esc_attr($mini_cat_style); ?>  <?php echo $effect; ?>">
            <?php include plugin_dir_path(dirname(__FILE__)) . 'templates/layout.php'; ?>
        </div>
        <?php
        $fmc_count_hide = '';
        if (false == $cartview) {
            $fmc_count_hide = 'fmc-count-hide';
        }
        if (($cartcheck == false && is_checkout()) || ($cartpage == false && is_cart()) || in_array(get_the_ID(), $hidden_page)) {
            $fmc_count_hide = 'fmc-count-hide';
        }

        ?>
        <div id="finest-count"
            class="finest-count <?php echo esc_attr('finest-count-' . $cartpos); ?><?php echo (($fmc_count_hide != '') ? ' ' . esc_attr($fmc_count_hide) : ''); ?>">
            <div class="finest-cart-icon">
                <!-- <span class="dashicons dashicons-cart"></span> -->
                <i class="icon icon-shopping-bag-2"></i>
            </div>
            <div class="finest-count-number">
                <span id="cart-count-number">
                    <?php echo WC()->cart->cart_contents_count; ?>
                </span>
            </div>
        </div>
        <input type="hidden" id="finest-nonce" value="<?php echo wp_create_nonce('finest-security'); ?>" />
        <div class="finest-overlay"></div>
        <?php
        if (('finest_auto_show_normal' == 'yes') && (isset($_POST['add-to-cart']) || (isset($_GET['add-to-cart'])))) {
            ?>

            <script type="text/javascript">
                jQuery(document).ready(function () {
                    setTimeout(function () {
                        include(plugin_dir_path(dirname(__FILE__)). 'templates/layout.php');
                    }, 100);
                });
            </script>
            <?php
        }
    }
}

add_action('wp_footer', 'finest_mini_cart_wp_footer');

// finest_get_cart_items

if (!function_exists('finest_get_cart')) {

    function finest_get_cart()
    {
        if (!isset($_POST['security']) || (!wp_verify_nonce($_POST['security'], 'finest-security') && ($_POST['security'] != $_POST['nonce']))) {
            die('<div class="finest-error">' . esc_html__('Permissions check failed!', 'finest-mini-cart') . '</div>');
        }
        $cart = array();
        ob_start();
        include plugin_dir_path(dirname(__FILE__)) . 'templates/layout.php';
        $output = ob_get_contents();
        ob_end_clean();
        $cart['count'] = WC()->cart->get_cart_contents_count();
        $cart['html'] = $output;
        echo json_encode($cart);
        die();
    }
}

add_action('wp_ajax_finest_get_cart', 'finest_get_cart');
add_action('wp_ajax_nopriv_finest_get_cart', 'finest_get_cart');

// finest_update_qty

if (!function_exists('finest_update_qty')) {

    function finest_update_qty()
    {

        if (!isset($_POST['security']) || (!wp_verify_nonce($_POST['security'], 'finest-security') && ($_POST['security'] != $_POST['nonce']))) {
            die('<div class="finest-error">' . esc_html__('Permissions check failed!', 'finest-mini-cart') . '</div>');
        }

        if (isset($_POST['cart_item_key']) && isset($_POST['cart_item_qty'])) {
            WC()->cart->set_quantity($_POST['cart_item_key'], intval($_POST['cart_item_qty']));
            $cart = array();
            $cart['count'] = WC()->cart->get_cart_contents_count();
            $cart['subtotal'] = WC()->cart->get_cart_subtotal();
            $cart['total_price'] = WC()->cart->total;
            $cart['tax_price'] = wc_round_tax_total(WC()->cart->get_cart_contents_tax() + WC()->cart->get_shipping_tax() + WC()->cart->get_fee_tax());
            echo json_encode($cart);
            die();
        }
    }
}
add_action('wp_ajax_finest_update_qty', 'finest_update_qty');
add_action('wp_ajax_nopriv_finest_update_qty', 'finest_update_qty');

// fmc_remove item

if (!function_exists('finest_remove_item')) {

    function finest_remove_item()
    {

        if (!isset($_POST['security']) || (!wp_verify_nonce($_POST['security'], 'finest-security') && ($_POST['security'] != $_POST['nonce']))) {
            die('<div class="finest-error">' . esc_html__('Permissions check failed!', 'finest-mini-cart') . '</div>');
        }

        if (isset($_POST['cart_item_key'])) {
            WC()->cart->remove_cart_item($_POST['cart_item_key']);
            $cart = array();
            $cart['count'] = WC()->cart->get_cart_contents_count();
            $cart['subtotal'] = WC()->cart->get_cart_subtotal();
            $cart['total_price'] = WC()->cart->total;
            $cart['tax_price'] = wc_round_tax_total(WC()->cart->get_cart_contents_tax() + WC()->cart->get_shipping_tax() + WC()->cart->get_fee_tax());
            if (0 == $cart['count']) {
                $cart['html'] = ' <div class="finest-no-item">' . esc_html__('Add a product in cart to see here!', 'finest-mini-cart') . ' </div>';
            }
            echo json_encode($cart);
            die();
        }
    }
}

add_action('wp_ajax_finest_remove_item', 'finest_remove_item');
add_action('wp_ajax_nopriv_finest_remove_item', 'finest_remove_item');

//coupon code

function finest_coupon_ajax_call()
{
    $fempty = get_theme_mod('coupn_field_empty', 'Coupon Code Field is Empty');
    $csuccesfully = get_theme_mod('coupn_field_empty', 'Coupon Applied Successfully');
    $invaild = get_theme_mod('coupn_field_imvaild', 'Invaild Coupon Code');
    $applied = get_theme_mod('coupn_code_applied', 'Coupon Code Already Applied!');

    if (!isset($_POST['security']) || (!wp_verify_nonce($_POST['security'], 'finest-security') && ($_POST['security'] != $_POST['nonce']))) {
        die('<div class="finest-error">' . esc_html__('Permissions check failed!', 'finest-mini-cart') . '</div>');
    }

    $code = wc_sanitize_coupon_code($_REQUEST['coupon_code']);
    $code = strtolower($code);

    // Check coupon code to make sure is not empty
    if (empty($code) || !isset($code)) {
        $wfc_cpnfield_empty_txt = esc_html($fempty);
        $wfc_cpnfield_empty = esc_html__('empty', 'finest-mini-cart');
        // Build our response
        $response = array(
            'result' => $wfc_cpnfield_empty,
            'message' => $wfc_cpnfield_empty_txt,
        );

        header('Content-Type: application/json');
        echo json_encode($response);

        // Always exit when doing ajax
        WC()->cart->total;
        WC()->cart->set_session();
        die();
    }

    // Create an instance of WC_Coupon with our code
    $coupon = new WC_Coupon($code);

    if (in_array($code, WC()->cart->get_applied_coupons())) {

        $wfc_cpn_alapplied_txt = esc_html($applied);
        $wfc_cpn_already = esc_html__('already applied', 'finest-mini-cart');

        $response = array(
            'result' => $wfc_cpn_already,
            'message' => $wfc_cpn_alapplied_txt,
        );

        header('Content-Type: application/json');
        echo json_encode($response);
        die();

    } elseif (!$coupon->is_valid()) {

        $wfc_invalid_coupon_txt = esc_html($invaild);
        $wfc_invalid_result = esc_html__('not valid', 'finest-mini-cart');
        // Build our response
        $response = array(
            'result' => $wfc_invalid_result,
            'message' => $wfc_invalid_coupon_txt,
        );

        header('Content-Type: application/json');
        echo json_encode($response);

        die();

    } else {

        WC()->cart->apply_coupon($code);

        $wfc_coupon_applied_suc_txt = esc_html($csuccesfully);
        $wfc_coupon_success = esc_html__('Success', 'finest-mini-cart');
        // Build our response
        $response = array(
            'result' => $wfc_coupon_success,
            'message' => $wfc_coupon_applied_suc_txt,
        );

        header('Content-Type: application/json');
        echo json_encode($response);
        die();

    }
}

add_action('wp_ajax_finest_coupon_ajax_call', 'finest_coupon_ajax_call');
add_action('wp_ajax_nopriv_finest_coupon_ajax_call', 'finest_coupon_ajax_call');

// ajax add to cart

function finest_add_variation_to_cart()
{
    ob_start();

    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $product = wc_get_product($product_id);
    $quantity = isset($_POST['quantity']) && empty($_POST['quantity']) ? 1 : wc_stock_amount(wp_unslash($_POST['quantity']));
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $variation_id = isset($_POST['variation_id']) ? absint($_POST['variation_id']) : '';
    $product_status = get_post_status($product_id);

    if ($passed_validation && false !== WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

        do_action('woocommerce_ajax_added_to_cart', $product_id);

        if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }

        // Return fragments
        WC_AJAX::get_refreshed_fragments();

    } else {

        // If there was an error adding to the cart, redirect to the product page to show any errors
        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id),
        );

        wp_send_json($data);

    }

    wp_die();
}

add_action('wp_ajax_finest_add_variation_to_cart', 'finest_add_variation_to_cart');
add_action('wp_ajax_nopriv_finest_add_variation_to_cart', 'finest_add_variation_to_cart');

/**
 * Get minified css and removed space
 */
function fmc_css_strip_whitespace($css)
{
    $replace = array(
        '#/\*.*?\*/#s' => '',
        // Strip C style comments.
        '#\s\s+#' => ' ', // Strip excess whitespace.
    );
    $search = array_keys($replace);
    $css = preg_replace($search, $replace, $css);

    $replace = array(
        ': ' => ':',
        '; ' => ';',
        ' {' => '{',
        ' }' => '}',
        ', ' => ',',
        '{ ' => '{',
        ';}' => '}',
        // Strip optional semicolons.
        ",\n" => ',',
        // Don't wrap multiple selectors.
        "\n}" => '}',
        // Don't wrap closing braces.
        '} ' => "}\n", // Put each rule on it's own line.
    );
    $search = array_keys($replace);
    $css = str_replace($search, $replace, $css);

    return trim($css);
}