<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'AxialNest_Woo_Settings_Integration' ) ) {
	class AxialNest_Woo_Settings_Integration extends WC_Integration {
		public function __construct() {
			$this->id = 'axialnest_for_woocommerce_settings';
			$this->method_title       = __( 'AxialNest Settings', 'axialnest-for-woocommerce' );
            $this->method_description = __( 'Settings for the AxialNest 3D customizer.', 'axialnest-for-woocommerce' );

            // Load the settings.
            $this->init_form_fields();
            $this->init_settings();

            // Define user set variables.
            //$this->JSONlanguage = $this->get_option( 'JSONlanguage' );

            // Actions.
            add_action( 'woocommerce_update_options_integration_' .  $this->id, array( $this, 'process_admin_options' ) );
		}

		// Initialise gateway settings form fields.
		public function init_form_fields() {
			$this->form_fields = array(
				'addToCartCSSClass' => array(
					'title'       => __( 'Add to cart button CSS class', 'axialnest-for-woocommerce' ),
					'type'        => 'text',
					'description' => __( 'Specify a class by which to retrieve the add to cart button. This is used to both hide it and submit it upon clicking the customizer own "Add to Cart".', 'axialnest-for-woocommerce' ),
					'default'     => __( 'single_add_to_cart_button', 'axialnest-for-woocommerce' )
				),
				'JSONlanguage' => array(
					'title'       => __( 'Order page customization language', 'axialnest-for-woocommerce' ),
					'type'        => 'select',
					'options'     => array(
										'ES' => 'ES',
										'EN' => 'EN',
										'FR' => 'FR',
										'DE' => 'DE'
									),
					'description' => __( 'This controls what language the materials, parts etc. appear in on the admin order page.', 'axialnest-for-woocommerce' ),
					'default'     => __( 'EN', 'axialnest-for-woocommerce' )
				),
				'customizeButtonText' => array(
					'title'       => __( 'Customize button text', 'axialnest-for-woocommerce' ),
					'type'        => 'textarea',
					'description' => __( 'Text to display on the "Customize" button.', 'axialnest-for-woocommerce' ),
					'default'     => __( 'Customize🎨', 'axialnest-for-woocommerce' )
				),
				'liteModeButtonText' => array(
					'title'       => __( 'Lite-mode Customize button text', 'axialnest-for-woocommerce' ),
					'type'        => 'textarea',
					'description' => __( 'Text to display on the "Customize" button when on Lite-mode.', 'axialnest-for-woocommerce' ),
					'default'     => __( '3D View🎦', 'axialnest-for-woocommerce' )
				),
				'customizeButtonCSS' => array(
					'title'       => __( 'Customizer button CSS style', 'axialnest-for-woocommerce' ),
					'type'        => 'textarea',
					'description' => __( 'Contents will be put inside the "Customize" button "style" attribute.', 'axialnest-for-woocommerce' ),
					'default'     => 'background-color: aquamarine;
border-radius: 25px;
border: none;
padding: 1rem;
font-weight: bold;
cursor: pointer;'
				)
			);
		}

		function admin_options() {
			?>
			<h2><?php esc_html_e( 'AxialNest for Woocommerce', 'axialnest-for-woocommerce' ); ?></h2>
			<table class="form-table">
				<?php $this->generate_settings_html(); ?>
			</table>
			<?php
		}
	}
}

function axialnest_woo_add_integration( $integrations ) {
	$integrations[] = 'AxialNest_Woo_Settings_Integration';
	return $integrations;
}
add_filter( 'woocommerce_integrations', 'axialnest_woo_add_integration' );

$AxialNest_Woo_Settings = new AxialNest_Woo_Settings_Integration( );

?>
