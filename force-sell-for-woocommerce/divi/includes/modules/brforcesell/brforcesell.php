<?php

class ET_Builder_Module_brforcesell extends ET_Builder_Module {

	public $slug       = 'et_pb_brforcesell';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => '',
		'author'     => '',
		'author_uri' => '',
	);
    function init() {
        $this->name       = __( 'BeRocket Force Sell', 'force-sell-for-woocommerce' );
		$this->folder_name = 'et_pb_berocket_modules';
		$this->main_css_element = '%%order_class%%';

        $this->fields_defaults = array(
            'product_id'                => array('current'),
            'display_force_sell'        => array( 'on', 'add_default_setting' ),
            'display_force_sell_linked' => array( 'on', 'add_default_setting' ),
            'display_as_link'           => array( 'off', 'add_default_setting' ),
        );
		$this->advanced_fields = array(
			'fonts'         => false,
			'link_options'  => false,
			'visibility'    => false,
			'text'          => false,
			'transform'     => false,
			'animation'     => false,
			'background'    => false,
			'borders'       => false,
			'box_shadow'    => false,
			'button'        => false,
			'filters'       => false,
			'margin_padding'=> false,
			'max_width'     => false,
		);
    }

    function get_fields() {
        $fields = array(
            'product_id' => array(
                'label'            => esc_html__( 'Product', 'et_builder' ),
                'type'             => 'select_product',
                'description'      => esc_html__( 'Here you can select the Product.', 'et_builder' ),
                'searchable'       => true,
                'displayRecent'    => false,
                'default'          => 'current',
                'post_type'        => 'product',
                'computed_affects' => array(
                    '__product',
                ),
            ),
            'display_force_sell' => array(
                "label"             => esc_html__( 'Linked Products, that can be removed', 'force-sell-for-woocommerce' ),
                'type'              => 'yes_no_button',
                'options'           => array(
                    'off' => esc_html__( "No", 'et_builder' ),
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                ),
            ),
            'display_force_sell_linked' => array(
                "label"             => esc_html__( 'Linked Products, that can be removed only with this product', 'force-sell-for-woocommerce' ),
                'type'              => 'yes_no_button',
                'options'           => array(
                    'off' => esc_html__( "No", 'et_builder' ),
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                ),
            ),
            'display_as_link' => array(
                "label"             => esc_html__( 'Link to products page', 'force-sell-for-woocommerce' ),
                'type'              => 'yes_no_button',
                'options'           => array(
                    'off' => esc_html__( "No", 'et_builder' ),
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                ),
            ),
        );

        return $fields;
    }

    function render( $atts, $content = null, $function_name = '' ) {
        $atts = BREX_ForcesellExtension::convert_on_off($atts);
        if( ! empty($atts['product_id']) ) {
            if( $atts['product_id'] == 'latest' ) {
                global $wpdb;
                $atts['product_id'] = $wpdb->get_var("SELECT ID FROM {$wpdb->posts} WHERE post_type = 'product' AND post_status = 'publish' ORDER BY ID DESC LIMIT 1");
            } elseif( $atts['product_id'] == 'current' ) {
                $atts['product_id'] = '';
            }
        }
        ob_start();
        do_action( 'berocket_force_sell_echo_linked_products', $atts );
        return ob_get_clean();
    }
}

new ET_Builder_Module_brforcesell;
