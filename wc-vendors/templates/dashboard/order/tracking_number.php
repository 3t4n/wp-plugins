<?php
/**
 * The template for displaying the tracking number form this is displayed in the modal pop up.
 *
 * Override this template by copying it to yourtheme/wc-vendors/dashboard/order
 */
use WC_Vendors\Classes\Front\Forms\WCV_Tracking_Number_Form;
// Change text to make UI a little cleaner.
$button_text = '';

if ( isset( $tracking_details['_wcv_tracking_number'] ) && '' !== $tracking_details['_wcv_tracking_number'] ) {
    $button_text = __( 'Update Tracking Details', 'wc-vendors' );
} else {
    $button_text = __( 'Add Tracking Details', 'wc-vendors' );
}

?>
<div class="wcv-shade wcv-fade">
    <div id="tracking-modal-<?php echo esc_attr( $order_number ); ?>" class="wcv-modal wcv-fade"
        data-trigger="#open-tracking-modal-<?php echo esc_attr( $order_number ); ?>" data-width="80%" data-height="80%"
        aria-labelledby="modalTitle-<?php echo esc_attr( $order_number ); ?>" aria-hidden="true" role="dialog">

        <div class="modal-header">
            <button class="modal-close wcv-dismiss">
                <svg class="wcv-icon wcv-icon-sm">
                    <use xlink:href="<?php echo esc_url_raw( WCV_ASSETS_URL ); ?>svg/wcv-icons.svg#wcv-icon-times"></use>
                </svg>
            </button>
            <h3 id="modal-title"><?php esc_html_e( 'Shipment tracking', 'wc-vendors' ); ?></h3>
        </div>

        <div class="modal-body" id="tracking-modal-<?php echo esc_attr( $order_number ); ?>-content">

            <form method="post" class="wcv-form wcv-form-exclude" action="">

                <?php WCV_Tracking_Number_Form::shipping_provider( $tracking_details['_wcv_shipping_provider'], $order_id ); ?>

                <?php WCV_Tracking_Number_Form::tracking_number( $tracking_details['_wcv_tracking_number'], $order_id ); ?>

                <?php WCV_Tracking_Number_Form::date_shipped( $tracking_details['_wcv_date_shipped'], $order_id ); ?>

                <?php do_action( 'wcvendors_tracking_modal_before_submit_button', $order_id, $tracking_details, $order_number ); ?>

                <?php WCV_Tracking_Number_Form::form_data( $order_id, $button_text ); ?>

            </form>
        </div>
    </div>
</div>
