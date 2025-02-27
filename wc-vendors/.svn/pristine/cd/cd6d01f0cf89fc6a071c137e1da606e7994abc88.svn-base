<?php
/**
 * The template for displaying the store settings form
 *
 * Override this template by copying it to yourtheme/wc-vendors/dashboard/
 */
use WC_Vendors\Classes\Front\Forms\WCV_Store_Form;

$settings_social = (array) get_option( 'wcvendors_hide_settings_social' );
$social_total    = count( $settings_social );
$social_count    = 0;
foreach ( $settings_social as $value ) {
    if ( 1 === (int) $value ) {
        ++$social_count;
    }
}

?>

    <h3><?php esc_html_e( 'Settings', 'wc-vendors' ); ?></h3>

<?php do_action( 'wcvendors_settings_before_form' ); ?>

    <form method="post" id="wcv-store-settings" action="#" class="wcv-form">

        <?php WCV_Store_Form::form_data(); ?>

        <div class="wcv-tabs top" data-prevent-url-change="true">

            <?php WCV_Store_Form::store_form_tabs(); ?>

            <!-- Store Settings Form -->

            <div class="tabs-content" id="store">
                <?php
                $hide_vendor_name = wc_string_to_bool( get_option( 'wcvendors_hide_settings_vendor_name', 'no' ) );

                if ( ! $hide_vendor_name ) :
                    echo esc_html(
                        sprintf( '%s %s', wcv_get_vendor_name(), __( 'name', 'wc-vendors' ) )
                    );
                endif;
                ?>
                </h3>
                
                <!-- Vendor Name -->
                <?php WCV_Store_Form::vendor_name(); ?>
                <?php do_action( 'wcvendors_signup_after_vendor_name' ); ?>

                <!-- Store Name -->
                <?php WCV_Store_Form::store_name( $store_name ); ?>

                <?php do_action( 'wcvendors_settings_after_shop_name' ); ?>

                <!-- Store Description -->
                <?php WCV_Store_Form::store_description( $store_description ); ?>

                <?php do_action( 'wcvendors_settings_after_shop_description' ); ?>

                <!-- Seller Info -->
                <?php WCV_Store_Form::seller_info(); ?>


                <?php do_action( 'wcvendors_settings_after_seller_info' ); ?>

                <!-- Company URL -->
                <?php do_action( 'wcvendors_settings_before_company_url' ); ?>
                <?php WCV_Store_Form::company_url(); ?>
                <?php do_action( 'wcvendors_settings_after_company_url' ); ?>

                <!-- Store Phone -->
                <?php do_action( 'wcvendors_settings_before_store_phone' ); ?>
                <?php WCV_Store_Form::store_phone(); ?>
                <?php do_action( 'wcvendors_settings_after_store_phone' ); ?>

                <!-- Store Address -->
                <?php do_action( 'wcvendors_settings_before_address' ); ?>

                <?php WCV_Store_Form::store_address_country(); ?>
                <?php WCV_Store_Form::store_address1(); ?>
                <?php WCV_Store_Form::store_address2(); ?>
                <?php WCV_Store_Form::store_address_city(); ?>
                <?php WCV_Store_Form::store_address_state(); ?>
                <?php WCV_Store_Form::store_address_postcode(); ?>

                <?php do_action( 'wcvendors_settings_after_address' ); ?>

            </div>
            <?php do_action( 'wcvendors_settings_after_store_tab' ); ?>

            <?php do_action( 'wcvendors_settings_before_payment_tab' ); ?>
            <div class="tabs-content" id="payment">
                <!-- Paypal address -->
                <?php do_action( 'wcvendors_settings_before_paypal' ); ?>

                <?php WCV_Store_Form::preferred_payout_method(); ?>

                <?php $commission_payout_method = get_user_meta( get_current_user_id(), 'wcv_commission_payout_method', true ); ?>

                <div id="wcv-paypal-payout-fields" class="wcv-payout-method" style="display:<?php echo esc_attr( ( 'paypal' === $commission_payout_method ? 'block' : 'none' ) ); ?>;">
                    <?php WCV_Store_Form::paypal_payout(); ?>
                    <?php WCV_Store_Form::paypal_address(); ?>
                    <?php WCV_Store_Form::paypal_venmo(); ?>
                </div>

                <div id="wcv-bank-payout-fields" class="wcv-payout-method" style="display:<?php echo esc_attr( ( 'bank' === $commission_payout_method ? 'block' : 'none' ) ); ?>;">
                    <?php WCV_Store_Form::bank_account_name(); ?>
                    <?php WCV_Store_Form::bank_account_number(); ?>
                    <?php WCV_Store_Form::bank_name(); ?>
                    <?php WCV_Store_Form::bank_routing_number(); ?>
                    <?php WCV_Store_Form::bank_iban(); ?>
                    <?php WCV_Store_Form::bank_bic_swift(); ?>
                </div>

                <?php do_action( 'wcvendors_settings_after_paypal' ); ?>
            </div>
            <?php do_action( 'wcvendors_settings_after_payment_tab' ); ?>

            <!-- Submit Button -->
            <!-- DO NOT REMOVE THE FOLLOWING TWO LINES -->
            <?php WCV_Store_Form::save_button( __( 'Save Changes', 'wc-vendors' ) ); ?>
        </div>
    </form>
<?php
do_action( 'wcvendors_settings_after_form' );
