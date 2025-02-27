<?php
/**
 * The template for displaying the order details
 *
 * Override this template by copying it to yourtheme/wc-vendors/dashboard/order
 *
 * @package    WCVendors_Pro
 * @version    1.7.6
 */

$total_colspan = wc_tax_enabled() ? count( $order->get_taxes() ) : 1;
$label_colspan = wc_tax_enabled() && $order->get_total_tax() > 0 ? 6 : 5;
$refund_class  = $is_order_refund ? 'has-refund' : '';
$order_id      = $order->get_id();
?>

<div class="wcv-shade wcv-fade">

    <div
        id="order-details-modal-<?php echo esc_attr( $order_id ); ?>"
        class="wcv-modal wcv-fade"
        data-trigger="#open-order-details-modal-<?php echo esc_attr( $order_id ); ?>"
        data-width="80%" data-height="85%"
        data-reveal aria-labelledby="modalTitle-<?php echo esc_attr( $order_id ); ?>"
        aria-hidden="true"
        role="dialog">

        <div class="modal-header">
            <button class="modal-close wcv-dismiss">
                <svg class="wcv-icon wcv-icon-sm">
                    <use xlink:href="<?php echo esc_url_raw( WCV_ASSETS_URL ); ?>svg/wcv-icons.svg#wcv-icon-times"></use>
                </svg>
            </button>
            <h3 id="modal-title">
                <?php
                echo esc_html(
                    sprintf(
                        // translators: %s: order number.
                        __( 'Order #%s Details', 'wc-vendors' ),
                        $order->get_order_number()
                    )
                );
                ?>
                - <?php echo esc_html( date_i18n( get_option( 'date_format', 'F j, Y' ), ( $order_date->getOffsetTimestamp() ) ) ); ?></h3>
        </div>

        <div class="modal-body wcv-order-details" id="modalContent">

            <?php do_action( 'wcvendors_order_before_customer_detail' ); ?>

            <div class="wcv-order-customer-details wcv-cols-group wcv-horizontal-gutters">

                <div class="all-50 small-100 billing-details">
                    <h4><?php esc_html_e( 'Billing details', 'wc-vendors' ); ?></h4>
                    <div class="wcv-order-address">
                        <?php if ( $order->get_formatted_billing_address() ) : ?>
                            <p>
                                <strong><?php esc_html_e( 'Address', 'wc-vendors' ); ?>:</strong>
                                <?php echo wp_kses( $order->get_formatted_billing_address(), array( 'br' => array() ) ); ?>
                            </p>
                        <?php else : ?>
                            <p class="none_set"><strong>
                                <?php esc_html_e( 'Address', 'wc-vendors' ); ?>:</strong>
                                <?php esc_html_e( 'No billing address set.', 'wc-vendors' ); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>  <!-- // billing details  -->

                <div class="all-50 small-100 shipping-details">
                    <h4><?php esc_attr_e( 'Shipping details', 'wc-vendors' ); ?></h4>
                    <div class="wcv-order-address">
                        <?php if ( $order->get_formatted_shipping_address() ) : ?>
                            <p>
                                <strong><?php esc_attr_e( 'Address', 'wc-vendors' ); ?>:</strong>
                                <?php echo wp_kses( $order->get_formatted_shipping_address(), array( 'br' => array() ) ); ?>
                            </p>
                        <?php else : ?>
                            <p class="none_set">
                                <strong><?php esc_html_e( 'Address', 'wc-vendors' ); ?>:</strong>
                                <?php esc_html_e( 'No shipping address set.', 'wc-vendors' ); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div> <!-- //shipping details  -->

            </div>

            <hr/>

            <?php do_action( 'wcvendors_order_before_items_detail' ); ?>

            <div class="wcv-order-items-details wcv-cols-group wcv-horizontal-gutters">

                <div class="all-100">

                    <h4><?php esc_html_e( 'Order items', 'wc-vendors' ); ?></h4>

                    <table cellpadding="0" cellspacing="0" class="wcv-table wcv-order-table">
                        <thead>
                        <tr>
                            <th class="order_item" colspan="2"><?php esc_html_e( 'Item', 'wc-vendors' ); ?></th>
                            <th class="commission"><?php esc_html_e( 'Commission', 'wc-vendors' ); ?></th>
                            <th class="cost"><?php esc_html_e( 'Cost', 'wc-vendors' ); ?></th>
                            <th class="qty"><?php esc_html_e( 'Qty', 'wc-vendors' ); ?></th>
                            <th class="total"><?php esc_html_e( 'Total', 'wc-vendors' ); ?></th>

                            <?php
                            if ( ! empty( $order_taxes ) ) :
                                foreach ( $order_taxes as $tax_id => $tax_item ) :
                                    $column_label = ! empty( $tax_item['label'] ) ? $tax_item['label'] : __( 'Tax', 'wc-vendors' );
                                    ?>
                                    <th class="line_tax tips"><?php echo esc_attr( $column_label ); ?></th>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </tr>
                        </thead>
                        <!-- Desktop line items -->
                        <tbody id="order_line_items" class="<?php echo esc_attr( $refund_class ); ?>">
                        <?php foreach ( $order_item_details as $item_id => $order_item_detail ) : ?>

                            <tr class="order-item item-id-<?php echo esc_attr( $item_id ); ?>">
                                <td class="wcv-order-thumb"><?php echo esc_url_raw( $order_item_detail['thumbnail'] ); ?></td>
                                <td class="name">
                                    <?php echo esc_html( $order_item_detail['product_name'] ); ?>
                                    <?php echo wp_kses( $order_item_detail['product_meta'], wcv_allowed_html_tags() ); ?></td>
                                <td class="item_cost" width="1%"><?php echo wp_kses_post( $order_item_detail['commission'] ); ?></td>
                                <td class="item_cost" width="1%"><?php echo wp_kses_post( $order_item_detail['cost'] ); ?></td>
                                <td class="quantity" width="1%">
                                    <?php echo esc_html( $order_item_detail['qty'] ); ?>
                                    <?php if ( isset( $order_item_detail['refund_qty'] ) ) : ?>
                                        <small class="refunded">
                                            <?php echo esc_html( $order_item_detail['refund_qty'] ); ?>
                                        </small>
                                    <?php endif; ?>
                                </td>
                                <td class="line_cost" width="1%">
                                    <?php echo wp_kses_post( $order_item_detail['total'] ); ?>
                                    <?php if ( isset( $order_item_detail['refund_total'] ) ) : ?>
                                        <small class="refunded">
                                            <?php echo wp_kses_post( wc_price( -1 * $order_item_detail['refund_total'], array( 'currency' => $order_currency ) ) ); ?>
                                        </small>
                                    <?php endif; ?>
                                </td>

                                <?php if ( wc_tax_enabled() ) : ?>

                                <?php foreach ( $order_item_detail['tax_items'] as $tax_item ) : ?>
                                        <td class="line_tax" width="1%">
                                            <div class="view">
                                                <?php echo wp_kses_post( $tax_item ); ?>
                                            </div>
                                            <?php if ( isset( $order_item_detail['refund_tax'] ) && $order_item_detail['refund_tax'] > 0 ) : ?>
                                                <small class="refunded">
                                                    <?php echo wp_kses_post( wc_price( -1 * $order_item_detail['refund_tax'], array( 'currency' => $order_currency ) ) ); ?>
                                                </small>
                                            <?php endif; ?>
                                        </td>
                                        <?php endforeach; ?>
                                <?php endif; ?>
                            </tr>

                        <?php endforeach; ?>
                        </tbody>

                        <!-- Desktop Totals -->
                        <tbody class="wcv-order-totals">
                        <tr class="shipping wcv-order-shipping">
                            <td class="wcv-order-totals-label" colspan="<?php echo esc_attr( $label_colspan ); ?>">
                                <?php esc_html_e( 'Shipping', 'wc-vendors' ); ?>:
                            </td>
                            <td class="total" colspan="<?php echo esc_attr( $total_colspan ); ?>">
                                <?php echo wp_kses_post( wc_price( $_order->total_shipping, array( 'currency' => $order_currency ) ) ); ?>
                            </td>
                        </tr>

                        <?php if ( wc_tax_enabled() ) : ?>
                            <?php foreach ( $_order->order->get_tax_totals() as $code => $tax_line ) : ?>
                                <tr class="wcv-order-tax">
                                    <td class="wcv-order-totals-label wcv-order-tax-total-label" colspan="<?php echo esc_attr( $label_colspan ); ?>">
                                        <?php echo esc_html( $tax_line->label ); ?>:</td>
                                    <td class="total wcv-order-tax-total" colspan="<?php echo esc_attr( $total_colspan ); ?>">
                                        <?php echo wp_kses_post( wc_price( $tax_line->amount, array( 'currency' => $order_currency ) ) ); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <?php if ( $shipping_tax > 0 ) : ?>
                                <tr class="wcv-order-shipping-tax">
                                    <td class="wcv-order-totals-label wcv-order-shipping-tax-total-label" colspan="<?php echo esc_attr( $label_colspan ); ?>">
                                        <?php esc_html_e( 'Shipping tax', 'wc-vendors' ); ?>:</td>
                                    <td class="total wcv-order-shipping-tax-total" colspan="<?php echo esc_attr( $total_colspan ); ?>">
                                        <?php echo wp_kses_post( wc_price( $shipping_tax, array( 'currency' => $order_currency ) ) ); ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endif; ?>

                        <tr class="wcv-order-commission">
                            <td class="wcv-order-totals-label wcv-order-commission-total-label" colspan="<?php echo esc_html( $label_colspan ); ?>">
                                <?php esc_html_e( 'Commission total', 'wc-vendors' ); ?>:
                            </td>
                            <td class="total wcv-order-commission-total" colspan="<?php echo esc_attr( $total_colspan ); ?>">
                                <div class="view">
                                    <?php echo wp_kses_post( wc_price( $_order->commission_total, array( 'currency' => $order_currency ) ) ); ?>
                                </div>
                            </td>
                        </tr>
                        <tr class="wcv-order-total">
                            <td class="wcv-order-totals-label wcv-order-total-label" colspan="<?php echo esc_attr( $label_colspan ); ?>">
                                <?php esc_html_e( 'Order total', 'wc-vendors' ); ?>:
                            </td>
                            <td class="total wcv-order-total" colspan="<?php echo esc_attr( $total_colspan ); ?>">
                                <div class="view"><?php echo wp_kses_post( wc_price( $_order->total, array( 'currency' => $order_currency ) ) ); ?></div>
                            </td>
                        </tr>

                        <?php if ( $is_order_refund ) : ?>
                            <tr class="wcv-order-refunded">
                                <td class="wcv-order-refund-label" colspan="<?php echo esc_attr( $label_colspan ); ?>">
                                    <?php esc_html_e( 'Refunded', 'wc-vendors' ); ?>:
                                </td>
                                <td class="refunded" colspan="<?php echo esc_attr( $total_colspan ); ?>">
                                    <div class="view">
                                        <?php echo wp_kses_post( wc_price( -1 * $total_refund, array( 'currency' => $order_currency ) ) ); ?>
                                    </div>
                                </td>
                            </tr>

                            <tr class="wcv-order-net-payment">
                                <td class="wcv-order-net-payment-label" colspan="<?php echo esc_attr( $label_colspan ); ?>">
                                    <?php esc_html_e( 'Net payment', 'wc-vendors' ); ?>:
                                </td>
                                <td class="net-payment" colspan="<?php echo esc_attr( $total_colspan ); ?>">
                                    <div class="view">
                                        <?php echo wp_kses_post( wc_price( $_order->total - $total_refund, array( 'currency' => $order_currency ) ) ); ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>

                        </tbody>
                    </table>

                </div>

            </div>

            <div class="wcv-cols-group wcv-horizontal-gutters wcv_mobile wcv-mobile-order-items">
                <div class="all-100">
                    <table>
                        <thead>
                            <tr>
                                <th width="65%"><?php esc_html_e( 'Product', 'wc-vendors' ); ?></th>
                                <th width="35%"><?php esc_html_e( 'QTY', 'wc-vendors' ); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ( $order_item_details as $item_id => $order_item_detail ) : ?>
                            <tr>
                                <td>
                                    <?php echo esc_html( $order_item_detail['product_name'] ); ?>
                                    <?php echo esc_html( $order_item_detail['product_meta'] ); ?>
                                </td>
                                <td>
                                    <?php echo esc_html( $order_item_detail['qty'] ); ?>x <?php echo esc_html( $order_item_detail['total'] ); ?>
                                    <?php if ( $is_order_refund && isset( $order_item_detail['refund_qty'] ) && isset( $order_item_detail['refund_total'] ) ) : ?>
                                        <br />
                                        <small class="refunded">
                                            <?php echo esc_html( $order_item_detail['refund_qty'] ); ?>x
                                            <?php echo wp_kses_post( wc_price( -1 * $order_item_detail['refund_total'], array( 'currency' => $order_currency ) ) ); ?>
                                        </small>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>

                        <tbody class="mobile-wcv-order-totals">
                        <tr>
                            <td colspan="2">
                                <h4><?php esc_html_e( 'Totals', 'wc-vendors' ); ?></h4>
                            </td>
                        </tr>
                        <tr class="shipping wcv-order-shipping">
                            <td class="wcv-order-totals-label">
                                <?php esc_html_e( 'Shipping', 'wc-vendors' ); ?>:
                            </td>
                            <td>
                                <?php echo wp_kses_post( wc_price( $_order->total_shipping, array( 'currency' => $order_currency ) ) ); ?>
                            </td>
                        </tr>

                        <?php if ( wc_tax_enabled() ) : ?>
                            <?php foreach ( $order->get_tax_totals() as $code => $tax_line ) : ?>
                                <tr class="wcv-order-tax">
                                    <td class="wcv-order-totals-label"><?php echo esc_html( $tax_line->label ); ?>:</td>
                                    <td><?php echo wp_kses_post( wc_price( $_order->total_tax, array( 'currency' => $order_currency ) ) ); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <tr class="wcv-order-commission">
                            <td class="wcv-order-totals-label"><?php esc_html_e( 'Commission total', 'wc-vendors' ); ?>:</td>
                            <td>
                                <div class="view">
                                    <?php echo wp_kses_post( wc_price( $_order->commission_total, array( 'currency' => $order_currency ) ) ); ?>
                                </div>
                            </td>
                        </tr>
                        <tr class="wcv-order-total">
                            <td class="wcv-order-totals-label">
                                <?php esc_html_e( 'Order total', 'wc-vendors' ); ?>:
                            </td>
                            <td>
                                <div class="view">
                                    <?php echo wp_kses_post( wc_price( $_order->total, array( 'currency' => $order_currency ) ) ); ?>
                                </div>
                            </td>
                        </tr>
                        <?php if ( $is_order_refund ) : ?>
                            <tr class="wcv-order-refunded">
                                <td class="wcv-order-refund-label">
                                    <?php esc_html_e( 'Refunded', 'wc-vendors' ); ?>:
                                </td>
                                <td class="refunded">
                                    <div class="view">
                                        <?php echo wp_kses_post( wc_price( -1 * $total_refund, array( 'currency' => $order_currency ) ) ); ?>
                                    </div>
                                </td>
                            </tr>

                            <tr class="wcv-order-net-payment">
                                <td class="wcv-order-refund-label">
                                    <?php esc_html_e( 'Net payment', 'wc-vendors' ); ?>:
                                </td>
                                <td class="net-payment">
                                    <div class="view">
                                        <?php echo wp_kses_post( wc_price( $_order->total - $total_refund, array( 'currency' => $order_currency ) ) ); ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <hr/>

            <?php do_action( 'wcvendors_order_after_items_detail' ); ?>

            <?php
            $allow_read_order_note = wc_string_to_bool( get_option( 'wcvendors_capability_order_read_notes', 'no' ) );
            ?>

            <?php if ( $allow_read_order_note ) : ?>
            <div class="wcv-cols-group wcv-horizontal-gutters">
                <div class="all-100">
                    <h4><?php esc_html_e( 'Customer note', 'wc-vendors' ); ?></h4>
                    <?php echo wp_kses_post( $customer_note ); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
