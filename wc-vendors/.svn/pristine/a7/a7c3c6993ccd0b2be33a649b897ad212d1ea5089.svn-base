<?php
/**
 * The template for displaying the order note form this is displayed in the modal pop up.
 *
 * Override this template by copying it to yourtheme/wc-vendors/dashboard/order
 *
 * @package    WCVendors_Pro
 * @version    1.7.8
 * @since      1.2.3
 *
 *
 * The following variables are available in this template
 *
 * $order_id
 * $order_number
 * $notes
 */
?>

<div class="wcv-shade wcv-fade">
    <div id="order-note-modal-<?php echo esc_attr( $order_number ); ?>" class="wcv-modal wcv-fade"
        data-trigger="#open-order-note-modal-<?php echo esc_attr( $order_number ); ?>" data-width="80%" data-height="80%" data-reveal
        aria-labelledby="modalTitle-<?php echo esc_attr( $order_number ); ?>" aria-hidden="true" role="dialog">

        <div class="modal-header">
            <button class="modal-close wcv-dismiss">
                <svg class="wcv-icon wcv-icon-sm">
                    <use xlink:href="<?php echo WCV_ASSETS_URL; //phpcs:ignore ?>svg/wcv-icons.svg#wcv-icon-times"></use>
                </svg>
            </button>
            <h3 id="modal-title"><?php esc_html_e( 'Order notes', 'wc-vendors' ); ?></h3>
            <p class="subtitle"><?php echo esc_html__( 'This information will be emailed to the customer.', 'wc-vendors' ); ?></p>
        </div>

        <div class="modal-body" id="modalContent">

            <div class="order_note_details">
                <?php if ( '' !== $notes ) : ?>
                    <?php echo wp_kses( $notes, wcv_allowed_html_tags() ); ?>
                <?php endif; ?>

                <form method="post" name="add_note_<?php echo esc_attr( $order_number ); ?>" id="add-comment_<?php echo esc_attr( $order_number ); ?>"
                        class="order_note_form wcv-form">

                    <?php wp_nonce_field( 'wcv-add-note', 'wcv_add_note' ); ?>

                    <textarea name="wcv_comment_text" class="wcv_order_note"></textarea>

                    <input type="hidden" name="wcv_order_id" value="<?php echo esc_attr( $order_id ); ?>">

                    <br/><br/>

                    <input class="btn btn-large btn-block" type="submit" name="add_order_note"
                            value="<?php echo esc_attr__( 'Add order note', 'wc-vendors' ); ?>">

                </form>
            </div>

        </div>
    </div>
</div>
