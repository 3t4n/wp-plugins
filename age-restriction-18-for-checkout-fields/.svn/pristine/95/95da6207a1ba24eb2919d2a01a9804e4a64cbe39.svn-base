<?php
/**
 * RegisterAdminPages class
 * Funções que criam o menu CONFIGURAÇÕES ÁREA RESTRITA
 *
 *
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class RegisterAdminPages extends Age_Restriction_18_for_checkout_fields
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
        add_action( 'admin_menu', array( $this, 'age_restriction_18_for_checkout_fields_add_admin_menu' ) );
        add_action( 'admin_init', array( $this, 'age_restriction_18_for_checkout_fields_settings_init' ) );
    }


    /**
     * Register and add settings
     */
    public function age_restriction_18_for_checkout_fields_add_admin_menu()
    {
        add_submenu_page(
            'woocommerce',
            __('Age +18 Restriction', 'age-restriction-18-for-checkout-fields'),
            __('Age +18 Restriction', 'age-restriction-18-for-checkout-fields'),
            'manage_options',
            'age-restriction-18-for-checkout-fields',
            array($this, 'create_admin_page')
        );
    }

    public function age_restriction_18_for_checkout_fields_settings_init(  ) {

        $option = 'age_restriction_settings';

        // Set Custom Fields section.
        add_settings_section(
            'age_restriction_section_config',
            __( 'Validation:', 'age-restriction-18-for-checkout-fields' ),
            array($this,'age_restriction_18_for_checkout_fields_settings_section_callback'),
            $option
        );

        // Validate Birthdate option.
        add_settings_field(
            'validate_birthdate_adult',
            __( 'Ativar a validação:', 'age-restriction-18-for-checkout-fields' ),
            array($this,'validate_birthdate_adult_field_render'),
            $option,
            'age_restriction_section_config',
            array(
                'menu'  => $option,
                'id'    => 'validate_birthdate_adult',
                'label' => __( 'Check if your store only allows over 18s.', 'age-restriction-18-for-checkout-fields' ),
            )
        );

        register_setting( $option, $option, array( $this, 'validate_options' ) );



    }

    public function validate_birthdate_adult_field_render()
    {

        $options = get_option('age_restriction_settings');
        if(isset($options) && !empty($options) && isset($options['validate_birthdate_adult']) && $options['validate_birthdate_adult']=='on'):
            echo '<input type="checkbox" name="age_restriction_settings[validate_birthdate_adult]" checked>';
            echo '<p class="description">Esse plugin é um complemento do plugin <a href="https://wordpress.org/plugins/woocommerce-extra-checkout-fields-for-brazil/" rel="noopener noreferrer nofollow" target="_blank">WooCommerce Extra Checkout Fields for Brazil</a> e só funcionará com ele instalado.</p>';
        else:
            echo '<input type="checkbox" name="age_restriction_settings[validate_birthdate_adult]">';
        endif;
    }

    public function age_restriction_18_for_checkout_fields_settings_section_callback(  ) {

        // echo __( 'This section description', 'wp-my-account' );

    }
    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        include plugin_dir_path(__FILE__) .'../views/html-admin-page.php';
    }

    /**
     * Valid options.
     *
     * @param  array $input options to valid.
     *
     * @return array        validated options.
     */
    public function validate_options( $input ) {
        $output = array();

        // Loop through each of the incoming options.
        foreach ( $input as $key => $value ) {
            // Check to see if the current option has a value. If so, process it.
            if ( isset( $input[ $key ] ) ) {
                $output[ $key ] = sanitize_text_field( $input[ $key ] );
            }
        }

        return $output;
    }




}
if( is_admin() )
    $RegisterAdminPages = new RegisterAdminPages();
