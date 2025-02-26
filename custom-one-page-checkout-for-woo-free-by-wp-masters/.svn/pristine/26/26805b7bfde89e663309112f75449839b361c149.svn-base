<table class="total-line-table total-checkout-data">
    <caption class="visually-hidden">Cost summary</caption>
    <thead>
    <tr>
        <th scope="col"><span class="visually-hidden">Description</span></th>
        <th scope="col"><span class="visually-hidden">Price</span></th>
    </tr>
    </thead>
    <tbody class="total-line-table__tbody">
    <tr class="cart-subtotal total-line">
        <th><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
        <td><?php wc_cart_totals_subtotal_html(); ?></td>
    </tr>

    <tr class="fee total-line">
        <th>Shipping</th>
        <td><?php echo esc_html(get_woocommerce_currency_symbol().WC()->cart->shipping_total); ?></td>
    </tr>

    <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
        <tr class="total-line cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
            <th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
            <td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
        </tr>
    <?php endforeach; ?>

    <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
        <tr class="fee total-line">
            <th><?php echo esc_html( $fee->name ); ?></th>
            <td><?php wc_cart_totals_fee_html( $fee ); ?></td>
        </tr>
    <?php endforeach; ?>

    <?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
        <?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
            <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
                <tr class="total-line tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                <th><?php echo esc_html( $tax->label ); ?></th>
                <td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr class="tax-total total-line">
                <th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
                <td><?php wc_cart_totals_taxes_total_html(); ?></td>
            </tr>
        <?php endif; ?>
    <?php endif; ?>
    </tbody>
    <tfoot class="total-line-table__footer">
    <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>
    <tr class="total-line order-total">
        <th class="total-line__name payment-due-label" scope="row">
            <span class="payment-due-label__total"><?php _e( 'Total', 'woocommerce' ); ?></span>
        </th>
        <td class="total-line__price payment-due">
            <span class="payment-due__price skeleton-while-loading--lg"><?php wc_cart_totals_order_total_html(); ?></span>
        </td>
    </tr>
    <?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
    </tfoot>
</table>