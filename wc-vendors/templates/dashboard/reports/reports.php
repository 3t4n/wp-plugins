<?php
/**
 * The template for displaying the vendor store graphs, recent products and recent orders
 *
 * Override this template by copying it to yourtheme/wc-vendors/dashboard/report
 *
 * @package    WCVendors_Pro
 * @version    1.8.0
 */

?>
<?php
    // Single Vendor Total Gross Sales.
    $give_tax      = wc_string_to_bool( get_option( 'wcvendors_vendor_give_taxes', 'no' ) );
    $give_shipping = wc_string_to_bool( get_option( 'wcvendors_vendor_give_shipping', 'no' ) );

    $gross_sales_totals = $store_report->orders;
    $vendor_order_total = 0;
    foreach ( $gross_sales_totals as $gross_sales_total ) {
        $vendor_total_sales = $gross_sales_total->total;
        $vendor_order_total = $vendor_order_total + $vendor_total_sales;
    }

    // Single Vendor Total Commission.
    $product_commissions_totals = $store_report->orders;
    $commissionTotal            = 0;
    $net_revenue                = 0;
    $total_tax                  = 0;
    $total_shipping             = 0;

    foreach ( $product_commissions_totals as $product_commissions_total ) {
        $vendor_commission_data = $product_commissions_total->commission_total;
        $commissionTotal        = $vendor_commission_data + $commissionTotal;

        if ( $give_tax ) {
            $vendor_tax_data = $product_commissions_total->total_tax;
            $total_tax      += $vendor_tax_data;
        }

        if ( $give_shipping ) {
            $vendor_shipping_data = $product_commissions_total->total_shipping;
            $total_shipping      += $vendor_shipping_data;
        }
    }

    $net_revenue = $commissionTotal - $total_tax - $total_shipping;

?>

<?php do_action( 'wcvendors_before_dashboard_overview_graphs' ); ?>
<div class="wcv_reports wcv-cols-group wcv-horizontal-gutters">
    <div class="xlarge-50 large-50 medium-100 small-100 tiny-100">
        <h3><?php esc_html_e( 'Gross Sales Report', 'wc-vendors' ); ?></h3>
        <table role="grid" class="wcvendors-table wcvendors-table-recent_order wcv-table">
            <tbody>
            <tr>
                <td><?php esc_html_e( 'Total Order', 'wc-vendors' ); ?></td>
                <td><strong><?php echo esc_html( $store_report->total_orders ); ?> </td></strong>
            </tr>

            <tr>
                <td><?php esc_html_e( 'Total Product Sold', 'wc-vendors' ); ?></td>
                <td><strong><?php echo esc_html( $store_report->total_products_sold ); ?></strong></td>
            </tr>

            <tr>
                <td><?php esc_html_e( 'Total Gross Sales', 'wc-vendors' ); ?></td>
                <td><strong><?php echo wp_kses( wc_price( $vendor_order_total ), wcv_allowed_html_tags() ); ?></strong></td>
            </tr>

            <tr>
                <td><?php esc_html_e( 'Total Commission', 'wc-vendors' ); ?></td>
                <td><strong><?php echo wp_kses( wc_price( $commissionTotal ), wcv_allowed_html_tags() ); ?></strong></td>
            </tr>

            <tr>
                <td><?php esc_html_e( 'Net Revenue', 'wc-vendors' ); ?></td>
                <td><strong><?php echo wc_price( $net_revenue ); // phpcs:ignore ?></strong></td>
            </tr>
            </tbody>
        </table>
        </div>

    <div class="all-50 small-100 tiny-100">
        <h3><?php esc_html_e( 'Orders Totals', 'wc-vendors' ); ?> ( <?php echo esc_html( $store_report->total_orders ); ?> )</h3>
        <?php $order_chart_data = $store_report->get_order_chart_data(); ?>
        <?php if ( ! $order_chart_data ) : ?>
            <p><?php esc_html_e( 'No orders for this period. Adjust your dates above and click Update, or list new products for customers to buy.', 'wc-vendors' ); ?></p>
        <?php else : ?>
            <canvas id="orders_chart" width="350" height="200"></canvas>
            <script type="text/javascript">
                var orders_chart_label = <?php echo $order_chart_data['labels']; //phpcs:ignore?>;
                var orders_chart_data = <?php echo $order_chart_data['data']; //phpcs:ignore?>;
            </script>

        <?php endif; ?>
    </div>
    <?php do_action( 'wcvendors_dashboard_before_product_totals' ); ?>
    <?php do_action( 'wcvendors_dashboard_product_totals', $store_report ); ?>
    <?php do_action( 'wcvendors_dashboard_after_product_totals' ); ?>
</div>
<?php do_action( 'wcvendors_after_dashboard_overview_graphs' ); ?>

<?php do_action( 'wcvendors_before_dashboard_overview_recent' ); ?>
<?php do_action( 'wcvendors_dashboard_overview_recent', $store_report, $products_disabled, $orders_disabled ); ?>
<?php do_action( 'wcvendors_after_dashboard_overview_recent' ); ?>
