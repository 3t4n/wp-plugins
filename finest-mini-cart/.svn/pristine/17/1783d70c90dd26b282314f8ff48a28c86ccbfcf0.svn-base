<?php
$scsb = get_theme_mod('fmc_shopping_button', true);
$stotal = get_theme_mod('fmc_shipping_total', true);
$taxtotal = get_theme_mod('fmc_tax_total', true);
$spcount = get_theme_mod('fmc_product_ount', true);
$sqbox = get_theme_mod('fmc_qty_box', true);
$spimg = get_theme_mod('fmc_product_image', true);
$spprice = get_theme_mod('fmc_product_price', true);
$sdelete = get_theme_mod('fmc_show_delete', true);
$scfiled = get_theme_mod('fmc_coupon_filed', true);
$scbutton = get_theme_mod('fmc_close_button', true);
$ssubtotal = get_theme_mod('fmc_subtotal', true);
$headtitle = get_theme_mod('quick_cart_text', 'Quick Cart');
?>

<div class="finest-area-top">
    <div class="finest-cart-ttile">
        <h1>
            <?php echo esc_html($headtitle); ?>
        </h1>
    </div>
    <?php if (true == $scbutton): ?>
        <div class="finest-close">
            <i class="icon icon-simple-remove"></i>
        </div>
    <?php endif; ?>
</div>
<?php
$items = WC()->cart->get_cart();
if (sizeof($items) > 0) { ?>
    <div class="finest-area-middle finest-items">
        <?php
        $items = array_reverse($items);
        foreach ($items as $cart_item_key => $cart_item) {
            $_product = $cart_item['data'];
            $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
            if ($_product->is_visible()) {
                $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                $cart_title = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key); ?>
                <div data-key="<?php echo esc_attr($cart_item_key) ?>" class="finest-item">
                    <div class="finest-item-inner">
                        <div class="thumbnail-title-area">
                            <?php if (true == $spimg): ?>
                                <div class="finest-item-thumb">
                                    <?php
                                    if ($product_permalink) {
                                        printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail);
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                            <div class="finest-titel-qty">
                                <div class="finest-item-title">
                                    <?php
                                    if ($product_permalink) {
                                        printf('<a href="%s">%s</a>', esc_url($product_permalink), $cart_title);
                                    }
                                    ?>
                                </div>
                                <?php if (true == $sqbox): ?>
                                    <div class="finest-item-qty">
                                        <div class="finest-item-qty-inner">
                                            <span class="finest-item-qty-minus">-</span>
                                            <input class="finest-item-qty-input" type="number"
                                                value="<?php echo $cart_item['quantity'] ?>" step="1" min="1"
                                                max="<?php echo $_product->get_stock_quantity(); ?>"
                                                data-key="<?php echo esc_attr($cart_item_key) ?>" />
                                            <span class="finest-item-qty-plus">+</span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="price-qty">
                            <?php if (true == $sdelete): ?>
                                <div class="remove-icon">
                                    <span class="finest-item-remove finest-icon-remove"
                                        data-key="<?php echo esc_attr($cart_item_key) ?>"><i class="icon icon-Trash-2"></i></span>
                                </div>
                            <?php endif; ?>
                            <?php if (true == $spprice): ?>
                                <div class="finest-item-price">
                                    <span>
                                        <?php echo $_product->get_price_html(); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
    <div class="finest-area-bot">
        <?php
        $cptext = get_theme_mod('coupon_placeholder_text', 'Enter your Coupon code');
        $applybtn = get_theme_mod('apply_btn_text', 'Apply');
        if ($scfiled): ?>
            <div class="finest-coupon">
                <div class="finiest_coupon_response"></div>
                <div class="finest_coupon_field">
                    <input type="text" id="finiest_coupon_code" placeholder="<?php echo esc_html($cptext); ?>">
                    <span class="finiest_coupon_submit">
                        <?php echo esc_html($applybtn); ?>
                    </span>
                </div>
            </div>
        <?php endif; ?>
        <?php
        $pqantity = get_theme_mod('product_quantity_text', 'Products');
        if ($spcount): ?>
            <div class="product-content-area">
                <div class="product-total-left">
                    <span class="product-quenty">
                        <?php echo esc_html($pqantity); ?>
                    </span>
                </div>
                <div class="product-total-right">
                    <span id="product-show-total">
                        <?php echo WC()->cart->cart_contents_count; ?>
                    </span>
                </div>
            </div>
        <?php endif; ?>

        <?php
        $psubtotal = get_theme_mod('product_subtotal', 'Subtotal');
        if ($ssubtotal): ?>
            <div class="product-content-area">
                <div class="finest-subtotal-left">
                    <span class="product-subtotal">
                        <?php echo esc_html($psubtotal); ?>
                    </span>
                </div>
                <div id="finest-subtotal" class="finest-subtotal-right">
                    <span class="subtotal-count">
                        <?php echo WC()->cart->get_cart_subtotal() ?>
                    </span>
                </div>
            </div>
        <?php endif; ?>

        <?php
        $ptax = get_theme_mod('product_tax', 'Taxes');
        if (true == $taxtotal): ?>
            <div class="product-content-area">
                <div class="finest-tax-left">
                    <span class="product-tax-left">
                        <?php echo esc_html($ptax); ?>
                    </span>
                </div>
                <div id="finest-tax" class="finest-tax-right">
                    <span class="tax-count">
                        <?php echo wc_price(wc_round_tax_total(WC()->cart->get_cart_contents_tax() + WC()->cart->get_shipping_tax() + WC()->cart->get_fee_tax())); ?>
                    </span>
                </div>
            </div>
        <?php endif; ?>
        <?php
        $pshipping = get_theme_mod('product_shipping_text', 'Shipping');
        if (true == $stotal): ?>
            <div class="product-content-area">
                <div class="finest-shipping-left">
                    <span class="product-shipping">
                        <?php echo esc_html($pshipping); ?>
                    </span>
                </div>
                <div id="finest-shipping" class="finest-shipping-right">
                    <span class="product-shipping-count">
                        <?php echo WC()->cart->get_cart_shipping_total(); ?>
                    </span>
                </div>
            </div>
        <?php endif; ?>
        <?php
        $ptotal = get_theme_mod('product_total_text', 'Total');
        ?>
        <div class="product-content-area">
            <div class="finest-total-left">
                <span class="finest-total-text">
                    <?php echo esc_html($ptotal) ?>
                </span>
            </div>
            <div id="finest-total" class="finest-total-right">
                <span class="total-price">
                    <?php
                    $total = true == $stotal ? WC()->cart->total : WC()->cart->subtotal;
                    echo wc_price($total); ?>
                </span>
            </div>
        </div>
        <?php $pcheckout = get_theme_mod('check_out_text', 'Checkout'); ?>
        <div class="finest-action-right">
            <a href="<?php echo esc_url(wc_get_checkout_url()) ?>">
                <?php echo esc_html($pcheckout); ?>
            </a>
        </div>
        <?php
        $ptotal = get_theme_mod('product_continue_text', 'Continue Shopping');
        if (true == $scsb): ?>
            <div class="finest-continue">
                <span id="finest-continue">
                    <?php echo esc_html($ptotal) ?>
                </span>
            </div>
        <?php endif; ?>
    </div>
<?php } else { ?>
    <div class="finest-no-item">
        <?php echo esc_html__('Add a product in cart to see here!', 'finest-mini-cart') ?>
    </div>
<?php } ?>