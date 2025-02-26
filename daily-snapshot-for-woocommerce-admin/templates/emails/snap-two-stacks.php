<?php
/**
 * Email Center Stack
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<tr>
    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 0 10px;">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <!-- Column : BEGIN -->
                <td class="mwb-stack-column-center" style="padding: 10px; background: #ffffff;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td style="padding: 10px; border: 1px solid #eaeaea;">
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; padding: 0 10px 10px; text-align: left;" class="mwb-center-on-narrow">
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <td style="font-size: 14px; font-family: Arial; line-height: 140%; color: #7d7d7d; text-align: center;">
                                                        <?php esc_html_e( 'Gross Revenue', 'mwb-dailyss' ) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 35px; font-family: Arial; line-height: 140%; color: #424242; text-align: center; font-weight: bold;">
                                                        <?php $grossRevenue = !empty( $revenue_data['totals']['gross_revenue'] ) ? $revenue_data['totals']['gross_revenue'] : 0 ?>
                                                        <?php echo wc_price( $grossRevenue, array( 'currency' => get_woocommerce_currency() ) ); ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <!-- Column : END -->
            </tr>
        </table>
    </td>
</tr>

<tr>
    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 0 10px;">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <!-- Column : BEGIN -->
                <td class="mwb-stack-column-center" style="padding: 10px; background: #ffffff;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td style="padding: 10px; border: 1px solid #eaeaea;">
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; padding: 0 10px 10px; text-align: left;" class="mwb-center-on-narrow">
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <td style="font-size: 14px; font-family: Arial; line-height: 140%; color: #7d7d7d; text-align: center;">
                                                        <?php esc_html_e( 'Net Revenue', 'mwb-dailyss' ) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 35px; font-family: Arial; line-height: 140%; color: #424242; text-align: center; font-weight: bold;">
                                                        <?php $netRevenue = !empty( $revenue_data['totals']['net_revenue'] ) ? $revenue_data['totals']['net_revenue'] : 0 ?>
                                                        <?php echo wc_price( $netRevenue, array( 'currency' => get_woocommerce_currency() ) ); ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <!-- Column : END -->
                <!-- Column : BEGIN -->
                <td class="mwb-stack-column-center" style="padding: 10px; background: #ffffff;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td style="padding: 10px; border: 1px solid #eaeaea;">
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; padding: 0 10px 10px; text-align: left;" class="mwb-center-on-narrow">
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <td style="font-size: 14px; font-family: Arial; line-height: 140%; color: #7d7d7d; text-align: center;">
                                                        <?php esc_html_e( 'Taxes|Shipping', 'mwb-dailyss' ) ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <!-- Column : BEGIN -->
                                                    <td class="">
                                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                                            <tr>
                                                                <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; padding: 0 10px 10px; text-align: left;" class="mwb-center-on-narrow">
                                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                        <tr>
                                                                            <td style="font-size: 14px; font-family: Arial; line-height: 140%; color: #7d7d7d; text-align: left;">
                                                                                <?php esc_html_e( 'Taxes', 'mwb-dailyss' ) ?>
                                                                            </td>
                                                                            <td style="font-size: 13px; font-family: Arial; line-height: 140%; text-align: right; font-weight: bold;">
                                                                                <?php $taxes = !empty( $revenue_data['totals']['taxes'] ) ? $revenue_data['totals']['taxes'] : 0 ?>
                                                                                <?php echo wc_price( $taxes, array( 'currency' => get_woocommerce_currency() ) ); ?>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <!-- Column : BEGIN -->
                                                    <td class="">
                                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                                            <tr>
                                                                <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; padding: 0 10px 10px; text-align: left;" class="mwb-center-on-narrow">
                                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                        <tr>
                                                                            <td style="font-size: 14px; font-family: Arial; line-height: 140%; color: #7d7d7d; text-align: left;">
                                                                                <?php esc_html_e( 'Shipping', 'mwb-dailyss' ) ?>
                                                                            </td>
                                                                            <td style="font-size: 13px; font-family: Arial; line-height: 140%; text-align: right; font-weight: bold;">
                                                                                <?php $shipping = !empty( $revenue_data['totals']['shipping'] ) ? $revenue_data['totals']['shipping'] : 0 ?>
                                                                                <?php echo wc_price( $shipping, array( 'currency' => get_woocommerce_currency() ) ); ?>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <!-- Column : END -->
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <!-- Column : END -->
            </tr>
        </table>
    </td>
</tr>

<tr>
    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 0 10px;">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <!-- Column : BEGIN -->
                <td class="mwb-stack-column-center" style="padding: 10px; background: #ffffff;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td style="padding: 10px; border: 1px solid #eaeaea;">
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; padding: 0 10px 10px; text-align: left;" class="mwb-center-on-narrow">
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <td style="font-size: 14px; font-family: Arial; line-height: 140%; color: #7d7d7d; text-align: center;">
                                                        <?php esc_html_e( 'Order', 'mwb-dailyss' ) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 35px; font-family: Arial; line-height: 140%; color: #424242; text-align: center; font-weight: bold;">
                                                        <?php $orderCount = !empty( $revenue_data['totals']['orders_count'] ) ? $revenue_data['totals']['orders_count'] : 0 ?>
                                                        <?php echo $orderCount ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <!-- Column : BEGIN -->
                                                    <td class="">
                                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                                            <tr>
                                                                <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; padding: 0 10px 10px; text-align: left;" class="mwb-center-on-narrow">
                                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                        <tr>
                                                                            <td style="font-size: 14px; font-family: Arial; line-height: 140%; color: #7d7d7d; text-align: left;">
                                                                                <?php esc_html_e( 'Avg Orders Value', 'mwb-dailyss' ) ?>
                                                                            </td>
                                                                            <td style="font-size: 13px; font-family: Arial; line-height: 140%; text-align: right; font-weight: bold;">
                                                                                <?php $avgValue = !empty( $order_data->totals->avg_order_value ) ? $order_data->totals->avg_order_value : 0 ?>
                                                                                <?php echo wc_price( round( $avgValue, 2 ), array( 'currency' => get_woocommerce_currency() ) ); ?>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <!-- Column : END -->
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <!-- Column : BEGIN -->
                                                    <td class="">
                                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                                            <tr>
                                                                <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; padding: 0 10px 10px; text-align: left;" class="mwb-center-on-narrow">
                                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                        <tr>
                                                                            <td style="font-size: 14px; font-family: Arial; line-height: 140%; color: #7d7d7d; text-align: left;">
                                                                                <?php esc_html_e( 'Product Sold', 'mwb-dailyss' ) ?>
                                                                            </td>
                                                                            <td style="font-size: 13px; font-family: Arial; line-height: 140%; text-align: right; font-weight: bold;">
                                                                                <?php $productSold = !empty( $order_data->totals->products ) ? $order_data->totals->products : 0 ?>
                                                                                <?php echo $productSold ?>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <!-- Column : END -->
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <!-- Column : END -->
                <!-- Column : BEGIN -->
                <td class="mwb-stack-column-center" style="padding: 10px; background: #ffffff;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td style="padding: 10px; border: 1px solid #eaeaea;">
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; padding: 0 10px 10px; text-align: left;" class="mwb-center-on-narrow">
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <td style="font-size: 14px; font-family: Arial; line-height: 140%; color: #7d7d7d; text-align: center;">
                                                        <?php esc_html_e( 'Items', 'mwb-dailyss' ) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 35px; font-family: Arial; line-height: 140%; color: #424242; text-align: center; font-weight: bold;">
                                                        <?php $items = !empty( $order_data->totals->num_items_sold ) ? $order_data->totals->num_items_sold : 0 ?>
                                                        <?php echo $items ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <!-- Column : BEGIN -->
                                                    <td class="">
                                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                                            <tr>
                                                                <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; padding: 0 10px 10px; text-align: left;" class="mwb-center-on-narrow">
                                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                        <tr>
                                                                            <td style="font-size: 14px; font-family: Arial; line-height: 140%; color: #7d7d7d; text-align: left;">
                                                                                <?php esc_html_e( 'Avg items/order', 'mwb-dailyss' ) ?>
                                                                            </td>
                                                                            <td style="font-size: 13px; font-family: Arial; line-height: 140%; text-align: right; font-weight: bold;">
                                                                                <?php 

                                                                                    if ( $order_data->totals->orders_count ) {
                                                                                        echo round( $order_data->totals->num_items_sold / $order_data->totals->orders_count, 1 );
                                                                                    }
                                                                                    else {
                                                                                        echo __( "N/A", "mwb-dailyss" );
                                                                                    }
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <!-- Column : END -->
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <!-- Column : BEGIN -->
                                                    <td class="">
                                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                                            <tr>
                                                                <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; padding: 0 10px 10px; text-align: left;" class="mwb-center-on-narrow">
                                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                        <tr>
                                                                            <td style="font-size: 14px; font-family: Arial; line-height: 140%; color: #7d7d7d; text-align: left;">
                                                                                <?php esc_html_e( 'Best Product', 'mwb-dailyss' ) ?>
                                                                            </td>
                                                                            <td style="font-size: 13px; font-family: Arial; line-height: 140%; text-align: right; font-weight: bold;">
                                                                                <?php echo $best_seller_count.' x ' ;?>
                                                                                <a href="<?php echo get_permalink( $best_seller ); ?>"><?php echo get_the_title( $best_seller ); ?>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <!-- Column : END -->
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <!-- Column : END -->
            </tr>
            <tr>
                <!-- Column : BEGIN -->
                <td class="mwb-stack-column-center" style="padding: 10px; background: #ffffff;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td style="padding: 10px; border: 1px solid #eaeaea;">
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; padding: 0 10px 10px; text-align: left;" class="mwb-center-on-narrow">
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <td style="font-size: 14px; font-family: Arial; line-height: 140%; color: #7d7d7d; text-align: center;">
                                                        <?php esc_html_e( 'Coupons', 'mwb-dailyss' ) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 35px; font-family: Arial; line-height: 140%; color: #424242; text-align: center; font-weight: bold;">
                                                        <?php $coupons = !empty( $revenue_data['totals']['coupons_count'] ) ? $revenue_data['totals']['coupons_count'] : 0 ?>
                                                        <?php echo $coupons ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <!-- Column : BEGIN -->
                                                    <td class="">
                                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                                            <tr>
                                                                <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; padding: 0 10px 10px; text-align: left;" class="mwb-center-on-narrow">
                                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                        <tr>
                                                                            <td style="font-size: 14px; font-family: Arial; line-height: 140%; color: #7d7d7d; text-align: left;">
                                                                                <?php esc_html_e( 'Coupons Value', 'mwb-dailyss' ) ?>
                                                                            </td>
                                                                            <td style="font-size: 13px; font-family: Arial; line-height: 140%; text-align: right; font-weight: bold;">
                                                                                <?php $couponVal = !empty( $revenue_data['totals']['coupons'] ) ? $revenue_data['totals']['coupons'] : 0 ?>
                                                                                <?php echo wc_price( $couponVal, array( 'currency' => get_woocommerce_currency() ) ); ?>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <!-- Column : END -->
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <!-- Column : END -->
                <!-- Column : BEGIN -->
                <td class="mwb-stack-column-center" style="padding: 10px; background: #ffffff;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td style="padding: 10px; border: 1px solid #eaeaea;">
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; padding: 0 10px 10px; text-align: left;" class="mwb-center-on-narrow">
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <td style="font-size: 14px; font-family: Arial; line-height: 140%; color: #7d7d7d; text-align: center;">
                                                        <?php esc_html_e( 'Refunds', 'mwb-dailyss' ) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 35px; font-family: Arial; line-height: 140%; color: #424242; text-align: center; font-weight: bold;">
                                                        <?php echo $refunded_orders; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <!-- Column : BEGIN -->
                                                    <td class="">
                                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                                            <tr>
                                                                <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; padding: 0 10px 10px; text-align: left;" class="mwb-center-on-narrow">
                                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                        <tr>
                                                                            <td style="font-size: 14px; font-family: Arial; line-height: 140%; color: #7d7d7d; text-align: left;">
                                                                                <?php esc_html_e( 'Refunded Value', 'mwb-dailyss' ) ?>
                                                                            </td>
                                                                            <td style="font-size: 13px; font-family: Arial; line-height: 140%; text-align: right; font-weight: bold;">
                                                                                <?php echo wc_price( $total_refunded_amt, array( 'currency' => get_woocommerce_currency() ) ); ?>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <!-- Column : END -->
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <!-- Column : END -->
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 0 10px;">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <!-- Column : BEGIN -->
                <td class="mwb-stack-column-center" style="padding: 10px; background: #ffffff;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td style="padding: 10px; border: 1px solid #eaeaea;">
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; padding: 0 10px 10px; text-align: left;" class="mwb-center-on-narrow">
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <td style="font-size: 14px; font-family: Arial; line-height: 140%; color: #7d7d7d; text-align: center;">
                                                        <?php esc_html_e( 'New/Returning Customer', 'mwb-dailyss' ) ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; padding: 0 10px 10px; text-align: left;" class="mwb-center-on-narrow">
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <td style="font-size: 14px; font-family: Arial; line-height: 140%; color: #7d7d7d; text-align: left;">
                                                        <?php esc_html_e( 'Number of returning customer', 'mwb-dailyss' ) ?>
                                                    </td>
                                                    <td style="font-size: 35px; font-family: Arial; line-height: 140%; color: #424242; text-align: right; font-weight: bold;">
                                                        <?php $returnCustomer = !empty( $order_data->totals->num_returning_customers ) ? $order_data->totals->num_returning_customers : 0 ?>
                                                        <?php echo $returnCustomer ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; padding: 0 10px 10px; text-align: left;" class="mwb-center-on-narrow">
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <td style="font-size: 14px; font-family: Arial; line-height: 140%; color: #7d7d7d; text-align: left;">
                                                        <?php esc_html_e( 'Number of new customer', 'mwb-dailyss' ) ?>
                                                    </td>
                                                    <td style="font-size: 35px; font-family: Arial; line-height: 140%; color: #424242; text-align: right; font-weight: bold;">
                                                        <?php $newCustomer = !empty( $order_data->totals->num_new_customers ) ? $order_data->totals->num_new_customers : 0 ?>
                                                        <?php echo $newCustomer ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <!-- Column : END -->
            </tr>
        </table>
    </td>
</tr>