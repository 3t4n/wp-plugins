<?php
/**
 * The template for displaying the vendor store information including total sales, orders, products and commission
 *
 * Override this template by copying it to yourtheme/wc-vendors/dashboard/report
 *
 * @package    WCVendors_Pro
 * @version    1.8.0
 */
$give_tax      = 'yes' === get_option( 'wcvendors_vendor_give_taxes', 'no' ) ? true : false;
$give_shipping = 'yes' === get_option( 'wcvendors_vendor_give_shipping', 'no' ) ? true : false;

$commission_due_total  = ( $give_tax ) ? $store_report->commission_due + $store_report->commission_shipping_due + $store_report->commission_tax_due : $store_report->commission_due + $store_report->commission_shipping_due;
$commission_paid_total = ( $give_tax ) ? $store_report->commission_paid + $store_report->commission_shipping_paid + $store_report->commission_tax_paid : $store_report->commission_paid + $store_report->commission_shipping_paid;

?>

<?php do_action( 'wcvendors_before_dashboard_overview_datepicker' ); ?> 
<div class="wcv_dashboard_datepicker wcv-cols-group">

    <div class="all-100">
        <hr/>
        <form method="post" action="" class="wcv-form  wcv-form-exclude">
            <?php $store_report->date_range_form(); ?>
        </form>
    </div>
</div>
<?php do_action( 'wcvendors_after_dashboard_overview_datepicker' ); ?> 

<?php do_action( 'wcvendors_before_dashboard_overview_table' ); ?> 
<div class="wcv_dashboard_overview wcv-cols-group wcv-horizontal-gutters">

    <div class="xlarge-50 large-50 medium-100 small-100 tiny-100">
        <h3><?php esc_html_e( 'Commission Due', 'wc-vendors' ); ?></h3>
        <table role="grid" class="wcvendors-table wcvendors-table-recent_order wcv-table">

            <tbody>
            <tr>
                <td><?php esc_html_e( 'Products', 'wc-vendors' ); ?></td>
                <td><?php echo wp_kses( wc_price( $store_report->commission_due ), wcv_allowed_html_tags() ); ?></td>
            </tr>
            <?php if ( $give_shipping ) : ?>
                <tr>
                    <td><?php esc_html_e( 'Shipping', 'wc-vendors' ); ?></td>
                    <td><?php echo wp_kses( wc_price( $store_report->commission_shipping_due ), wcv_allowed_html_tags() ); ?></td>
                </tr>
            <?php endif; ?>
            <?php if ( $give_tax ) : ?>
                <tr>
                    <td><?php esc_html_e( 'Tax', 'wc-vendors' ); ?></td>
                    <td><?php echo wp_kses( wc_price( $store_report->commission_tax_due ), wcv_allowed_html_tags() ); ?></td>
                </tr>
            <?php endif; ?>
            <tr>
                <td><strong><?php esc_html_e( 'Totals', 'wc-vendors' ); ?></strong></td>
                <td><?php echo wp_kses( wc_price( $commission_due_total ), wcv_allowed_html_tags() ); ?></td>
            </tr>
            </tbody>

        </table>
    </div>

    <div class="xlarge-50 large-50 medium-100 small-100 tiny-100">
        <h3><?php esc_html_e( 'Commission Paid', 'wc-vendors' ); ?></h3>
        <table role="grid" class="wcvendors-table wcvendors-table-recent_order wcv-table">
            <tbody>
            <tr>
                <td><?php esc_html_e( 'Products', 'wc-vendors' ); ?></td>
                <td><?php echo wp_kses( wc_price( $store_report->commission_paid ), wcv_allowed_html_tags() ); ?></td>
            </tr>
            <?php if ( $give_shipping ) : ?>
                <tr>
                    <td><?php esc_html_e( 'Shipping', 'wc-vendors' ); ?></td>
                    <td><?php echo wp_kses( wc_price( $store_report->commission_shipping_paid ), wcv_allowed_html_tags() ); ?></td>
                </tr>
            <?php endif; ?>
            <?php if ( $give_tax ) : ?>
                <tr>
                    <td><?php esc_html_e( 'Tax', 'wc-vendors' ); ?></td>
                    <td><?php echo wp_kses( wc_price( $store_report->commission_tax_paid ), wcv_allowed_html_tags() ); ?></td>
                </tr>
            <?php endif; ?>
            <tr>
                <td><strong><?php esc_html_e( 'Totals', 'wc-vendors' ); ?></strong></td>
                <td><?php echo wp_kses( wc_price( $commission_paid_total ), wcv_allowed_html_tags() ); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<?php do_action( 'wcvendors_after_dashboard_overview_table' ); ?>
