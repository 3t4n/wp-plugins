<?php

/**
 * Widget that will be displayed in the frontend
 *
 * @since 1.2.7
 */

namespace Bundler\Views;

use Bundler\Controllers\OfferController;
use Bundler\Controllers\SettingsController;
use Bundler\Includes\Traits\Instance;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Widget
{
    use Instance;

    public function __construct()
    {
        add_action('woocommerce_before_add_to_cart_button', array(__CLASS__, 'display_widget'));

        add_shortcode('bundler_widget', function ($atts) {
            $default = array(
                'product'           => '#',
                'template'          => 'classic',
                'hide_default_form' => 'yes',
                'cart_redirect'     => 'off',
                'checkout_redirect' => 'off'
            );
            $params = shortcode_atts($default, $atts);

            return self::display_widget($params);
        });

        add_action('woocommerce_after_add_to_cart_form', array(__CLASS__, 'display_bundle_widget'));

        add_shortcode('bundler_bundle_widget', function ($atts) {
            $default = array(
                'product'           => '#',
                'cart_redirect'     => 'off',
                'checkout_redirect' => 'off'
            );
            $params = shortcode_atts($default, $atts);

            return self::display_bundle_widget($params);
        });
    }

    /**
     * Display bundler widget in the frontend
     * 
     * @param array $params
     * 
     * @return void
     */
    public static function display_widget($params = [])
    {
        $settings = SettingsController::get_instance()->get_quantity_breaks_settings();
        if (!$settings || empty($settings)) $settings = SettingsController::get_instance()->get_default_quantity_breaks_settings();

        $shortcode = false;
        $hide_default_form = true;

        if ($params && is_array($params) && !empty($params)) {
            $shortcode         = true;
            $product_id        = $params['product'];
            $cart_redirect     = $params['cart_redirect'];
            $checkout_redirect = $params['checkout_redirect'];
        } else {
            global $post;
            if (get_post_type($post) === 'product' && !is_a($post, 'WC_Product')) {
                $product_id        = get_the_ID();
                $cart_redirect     = $settings->cart_redirect;
                $checkout_redirect = $settings->checkout_redirect;
            }
        }

        $product = wc_get_product($product_id);
        if (!$product) return;

        if ($product->is_type('simple') || $product->is_type('subscription')) {

            $offer_controller = OfferController::get_instance();
            $offer_data       = $offer_controller->get_the_offer($product_id);

            if (isset($offer_data)) {
                if ($offer_data['status']) {
                    $offer            = $offer_data['offer']['offerDetails'];
                    $discount_options = $offer_data['offer']['discountOptions'];

                    if ($discount_options && is_array($discount_options)) {

                        if ($shortcode) {
                            ob_start();
                        }
?>

                        <div class="wbdl_widget" data-product_id="<?php esc_attr_e($product_id); ?>">
                            <style>
                                table.variations {
                                    display: none !important;
                                }

                                <?php
                                if ($settings->qty_selector == 'off') {
                                ?>.woocommerce .product button.single_add_to_cart_button {
                                    height: 70px !important;
                                    width: 100% !important;
                                    margin-left: 0 !important;
                                }

                                @media (max-width: 1024px) {
                                    .summary-inner .single_add_to_cart_button.button.alt {
                                        height: 70px !important;
                                        width: 100% !important;
                                        margin-left: 0 !important;
                                    }
                                }

                                .woocommerce .product .quantity {
                                    display: none !important;
                                }

                                <?php
                                }
                                ?><?php if ($settings->radio_show === 'off') { ?>.quantity-break .quantity-break__radio input[type=radio] {
                                    display: none;
                                }

                                .quantity-break .quantity-break__radio {
                                    min-width: 25px;
                                }

                                <?php } ?>
                            </style>

                            <tbody>
                                <input type="hidden" name="wbdl_nonce" value="<?php echo wp_create_nonce('bundler'); ?>">
                                <input type="hidden" class="productType" name="wbdl_product_type" value="<?php esc_attr_e($product->get_type()); ?>">
                                <input type="hidden" class="productId" name="product_id" value="<?php esc_attr_e($product_id); ?>">

                                <div class="offer-header">
                                    <?php if ($offer->header && $offer->header !== '') {
                                        esc_html_e($offer->header);
                                    } else {
                                        if ($settings->header_show === 'on') {
                                            esc_html_e($settings->header_text);
                                        }
                                    } ?>
                                </div>

                                <?php
                                if (wc_tax_enabled()) {
                                    $initial_price = wc_get_price_to_display($product);
                                } else {
                                    $initial_price = $product->get_price();
                                }
                                include BDLR_PLUGIN_DIR . 'app/views/templates/classic.php'; ?>
                            </tbody>
                        </div>
                    <?php
                        if ($shortcode) {
                            $output = ob_get_clean();
                            return $output;
                        }
                    }
                }
            }
        }
    }

    /**
     * Display bundler widget in the frontend
     * 
     * @param array $params
     * 
     * @return void
     */
    public static function display_bundle_widget($params = [])
    {
        $bundle_settings = SettingsController::get_instance()->get_bundle_settings();
        if (!$bundle_settings || empty($bundle_settings)) $bundle_settings = SettingsController::get_instance()->get_default_bundle_settings();

        $shortcode = false;

        if ($params && is_array($params) && !empty($params)) {
            $shortcode = true;
            $product_id        = $params['product'];
            $cart_redirect     = $params['cart_redirect'];
            $checkout_redirect = $params['checkout_redirect'];
        } else {
            global $post;
            if (get_post_type($post) === 'product' && !is_a($post, 'WC_Product')) {
                $product_id        = get_the_ID();
                $cart_redirect     = $bundle_settings->cart_redirect;
                $checkout_redirect = $bundle_settings->checkout_redirect;
            }
        }

        $offer_controller = OfferController::get_instance();
        $result = $offer_controller->get_the_bundle($product_id);

        if (isset($result)) {
            if ($result['status']) {
                $offer_data = $result['offer']['offerDetails'];
                $bundle = $result['offer']['bundle'];

                if (isset($offer_data) && isset($bundle)) {

                    $product_id1 = $offer_data->product_ids[0];
                    $product_id2 = $offer_data->product_ids[1];

                    $product1 = wc_get_product($product_id1);
                    $product2 = wc_get_product($product_id2);

                    if ($product1->get_type() === 'variable' || $product2->get_type() === 'variable') {
                        return;
                    }

                    $offer_header = $offer_data->header && $offer_data->header !== ''
                        ? $offer_data->header
                        : (
                            $bundle_settings->title_show == 'on'
                            ? $bundle_settings->bundle_widget_title
                            : false
                        );

                    $discount_type  = $bundle->discount_type;
                    $saving_text    = $bundle_settings->saving_text ? esc_html($bundle_settings->saving_text) : esc_html__("SAVE ", 'bundler');
                    $total_text     = $bundle_settings->total_text ? esc_html($bundle_settings->total_text) : esc_html__("Total", 'bundler');
                    $free_gift_text = $bundle_settings->free_gift_text ? esc_html($bundle_settings->free_gift_text) : esc_html__("FREE", 'bundler');
                    $button_text    = $bundle_settings->button_text ? esc_html($bundle_settings->button_text) : esc_html__("GRAB THIS DEAL", 'bundler');

                    if (wc_tax_enabled()) {
                        $sale_price1 = wc_get_price_to_display($product1);
                        $sale_price2 = wc_get_price_to_display($product2);

                        $regular_price1 = wc_get_price_to_display($product1);
                        $regular_price2 = wc_get_price_to_display($product2);
                    } else {
                        $sale_price1 = $product1->get_price();
                        $sale_price2 = $product2->get_price();

                        $regular_price1 = $product1->get_price();
                        $regular_price2 = $product2->get_price();
                    }

                    $total_sale_price = $total_regular_price = $regular_price1 + $regular_price2;

                    if ($discount_type == "add_discount") {
                        $discount_method = $bundle->discount_method;
                        $discount_value = $bundle->discount_value;

                        if ($discount_method == "percent_off") {
                            $saving_text .= " " . $discount_value . '%';
                            $discount_factor = 1 - ($discount_value / 100);

                            // Apply percentage discount to each product
                            $sale_price1 *= $discount_factor;
                            $sale_price2 *= $discount_factor;
                            $total_sale_price = $sale_price1 + $sale_price2;
                        } else if ($discount_method == "value_off") {
                            $saving_text .= " " . Strip_tags(wc_price($discount_value));

                            // Calculate each product's proportional share of the total price
                            $total_regular_price = $sale_price1 + $sale_price2;
                            $product1_share = $sale_price1 / $total_regular_price;
                            $product2_share = $sale_price2 / $total_regular_price;

                            // Apply the proportional discount to each product
                            $sale_price1 -= $product1_share * $discount_value;
                            $sale_price2 -= $product2_share * $discount_value;
                            $total_sale_price = $sale_price1 + $sale_price2;
                        }
                    } else if ($discount_type == "free_gift") {
                        $saving_text = $bundle_settings->free_gift_total_text ? $bundle_settings->free_gift_total_text : "FREE GIFT INCLUDED";
                        $free_gift_id = $bundle->free_gift_id;
                        if ($free_gift_id == $product_id1) $sale_price1 = 0;
                        else if ($free_gift_id == $product_id2) $sale_price2 = 0;
                        $total_sale_price = $sale_price1 + $sale_price2;
                    }

                    if ($shortcode) {
                        ob_start();
                    }
                    ?>

                    <style>
                        div.bdlr_bundle_widget .bdlr-bundle-container {
                            background: <?php esc_html_e($bundle_settings->background_color); ?> !important;
                            border-color: <?php esc_html_e($bundle_settings->border_color); ?> !important;
                        }

                        div.bdlr_bundle_widget .bdlr-product-title {
                            color: <?php esc_html_e($bundle_settings->product_name_color); ?> !important;
                        }

                        div.bdlr_bundle_widget .product-price-free,
                        div.bdlr_bundle_widget div.bdlr-total-price-and-savings .bdlr-saving-text {
                            color: <?php esc_html_e($bundle_settings->saving_color); ?> !important;
                        }

                        div.bdlr_bundle_widget .product-price {
                            color: <?php esc_html_e($bundle_settings->sale_price_color); ?> !important;
                        }

                        div.bdlr_bundle_widget .product-cprice {
                            color: <?php esc_html_e($bundle_settings->regular_price_color); ?> !important;
                        }

                        div.bdlr_bundle_widget div.bdlr-button-container div.bdlr-button {
                            background: <?php esc_html_e($bundle_settings->button_color); ?> !important;
                        }
                    </style>

                    <div class="bdlr_bundle_widget" data-product_id1="<?php esc_attr_e($product_id1); ?>" data-product_id2="<?php esc_attr_e($product_id2); ?>" data-discount_type=<?php esc_attr_e($bundle->discount_type); ?> data-discount_value="<?php esc_attr_e($bundle->discount_value); ?>" data-discount_method="<?php esc_attr_e($bundle->discount_method); ?>" data-free_gift="<?php esc_attr_e($bundle->free_gift_id); ?>" cellspacing="0">
                        <tbody>
                            <input type="hidden" name="bdlr_nonce" value="<?php echo wp_create_nonce('bundler'); ?>">
                            <input type="hidden" class="product_id1" name="product_id1" value="<?php echo esc_attr($product_id1); ?>">
                            <input type="hidden" class="product_id2" name="product_id2" value="<?php echo esc_attr($product_id2); ?>">
                            <input type="hidden" class="productType" name="bdlr_product_type1" value="<?php echo esc_attr($product1->get_type()); ?>">
                            <input type="hidden" class="productType" name="bdlr_product_type2" value="<?php echo esc_attr($product2->get_type()); ?>">

                            <div class="offer-header">
                                <?php if ($offer_header) {
                                ?>
                                    <span></span>
                                    <span>
                                        <?php esc_html_e($offer_header); ?>
                                    </span>
                                    <span></span>
                                <?php } ?>
                            </div>
                            <?php include BDLR_PLUGIN_DIR . 'app/views/templates/bundle.php'; ?>
                        </tbody>
                    </div>
<?php
                    if ($shortcode) {
                        $output = ob_get_clean();
                        return $output;
                    }
                } // endif
            }
        }
    }
}

return Widget::get_instance();
