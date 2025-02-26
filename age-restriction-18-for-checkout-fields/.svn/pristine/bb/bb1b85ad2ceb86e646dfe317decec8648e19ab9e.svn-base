<?php
/**
 * ValidateFieldsCheckout class
 *
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class ValidateFieldsCheckout extends Age_Restriction_18_for_checkout_fields
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        // Valid checkout fields.
        add_action( 'woocommerce_checkout_process', array( $this, 'valid_checkout_fields' ), 10 );
    }

    /**
     * Valid checkout fields.
     *
     * @return string Displays the error message.
     */
    public function valid_checkout_fields() {
        // Get plugin settings.
        $options = get_option('age_restriction_settings');
        if(isset($options) && !empty($options) && isset($options['validate_birthdate_adult']) && $options['validate_birthdate_adult']=='on' && isset($_POST['billing_birthdate']) && ! empty( $_POST['billing_birthdate'] ) && ! ValidateFieldsCheckout::is_of_legal_age( $_POST['billing_birthdate'] )){
            //registration is prohibited for children under 18
            wc_add_notice( sprintf( '<strong>%s</strong> %s.', __( 'Data de Nascimento', 'age-restriction-18-for-checkout-fields' ), __( 'é proibido para menores de 18 anos', 'age-restriction-18-for-checkout-fields' ) ), 'error' );
        }

    }

    /**
     * Checks if the Birthdate is of legal age.
     *
     * @param  string $billing_birthdate Birthdate to validate.
     *
     * @return bool
     */
    public static function is_of_legal_age($billing_birthdate,$age = 18){
        // $birthday can be UNIX_TIMESTAMP or just a string-date.
        if(is_string($billing_birthdate)) {
            $billing_birthdate = strtotime($billing_birthdate);
        }
        // check
        // 31536000 is the number of seconds in a 365 days year.
        if(time() - $billing_birthdate < $age * 31536000)  {
            return false;
        }
        return true;
    }



}
$ValidateFieldsCheckout = new ValidateFieldsCheckout();
