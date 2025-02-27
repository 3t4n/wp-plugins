<?php

/**
 * Admin options page with global calculator settings.
 *
 * @return void
 */
function emc_admin_options_page() {
    include apply_filters(
	    'emc_admin_options_template_path', EMC_PLUGIN_DIR_PATH . '/includes/admin/templates/options.php' );
}

/**
 * Enqueue admin scripts.
 *
 * @return void
 */
function emc_admin_assets() {
	wp_enqueue_script( 'emc-admin-script', EMC_PLUGIN_DIR_URL . '/admin/js/admin.min.js', array( 'jquery', 'wp-color-picker' ), EMC_VER, array( 'in_footer' => true ) );
	wp_enqueue_style( 'emc-admin-style', EMC_PLUGIN_DIR_URL . '/admin/css/admin.css', array( 'wp-color-picker' ), EMC_VER );
}
add_action( 'admin_enqueue_scripts', 'emc_admin_assets' );

/**
 * Return default settings for mortgage calculator.
 *
 * @return array
 */
function emc_get_default_settings() {
	return apply_filters( 'emc_default_settings', array(
		'currency_position'   => EMC_CURRENCY_POSITION_BEFORE,
		'amortization_period' => EMC_AMORTIZATION_PERIOD_ANNUALLY,
		'popup_type'          => EMC_POPUP_TYPE_GRAPH,

		'default_purchase_price'  => 300000,
		'max_purchase_price'      => 1000000,
		'purchase_price_step'     => 1,
		'default_down_payment'    => 30000,
		'down_payment_step'       => 1,
		'default_property_tax'    => 3000,
		'max_property_tax'   	  => 10000,
		'property_tax_step'       => 1,
		'default_home_insurance'  => 1000,
		'max_home_insurance' 	  => 3000,
		'home_insurance_step'     => 1,
		'default_pmi' 	 	      => 1000,
		'max_pmi' 	 	          => 300000,
		'pmi_step'                => 1,
		'default_interest_rate'   => 3,
		'max_interest_rate'       => 10,
		'interest_rate_step'      => 1,

		// Term Period in years.
		'default_term'    => 5,
		'max_term'        => 20,
		'term_step'       => 1,

		'currency'        => '$',
		'number_format'   => ',.',
		'layout'          => 'vertical',
		'template'        => 'v1',
		'slider_icon'     => 'triangle',
		'container_width' => '',
		'title'           => '',

		'color'                => '#60d401',
		'interest_color'       => '#60d401',
		'home_insurance_color' => '#ff9600',
		'property_tax_color'   => '#ffde00',
		'pmi_color'            => '#25f55b',
		'digits_color'         => '#000',

		'down_payment'        => false,
		'property_tax'        => false,
		'estatik_integration' => true,
		'pmi'                 => false,
		'home_insurance'      => false,
	) );
}

/**
 * @return array
 */
function emc_get_settings_list() {
    return apply_filters( 'emc_settings_list', array(

	    'currency' => array(
		    'tab' => 'general-tab',
            'label' => __( 'Currency', 'estatik-mortgage-calculator' ),
	    ),

	    'currency_position' => array(
            'values' => array(
                EMC_CURRENCY_POSITION_BEFORE => __( 'Before', 'estatik-mortgage-calculator' ),
                EMC_CURRENCY_POSITION_AFTER => __( 'After', 'estatik-mortgage-calculator' ),
            ),
            'tab' => 'general-tab',
            'type' => 'list',
            'label' => __( 'Currency Position', 'estatik-mortgage-calculator' ),
        ),

	    'amortization_period' => array(
            'values' => array(
                EMC_AMORTIZATION_PERIOD_MONTHLY => __( 'Monthly', 'estatik-mortgage-calculator' ),
                EMC_AMORTIZATION_PERIOD_ANNUALLY => __( 'Annually', 'estatik-mortgage-calculator' ),
            ),
            'tab' => 'general-tab',
            'type' => 'list',
            'label' => __( 'Amortization Period', 'estatik-mortgage-calculator' ),
        ),

	    'popup_type' => array(
            'values' => array(
                EMC_POPUP_TYPE_GRAPH => __( 'Graph & Text', 'estatik-mortgage-calculator' ),
                EMC_POPUP_TYPE_TEXT => __( 'Text', 'estatik-mortgage-calculator' ),
            ),
            'tab' => 'general-tab',
            'type' => 'list',
            'label' => __( 'Popup Type', 'estatik-mortgage-calculator' ),
        ),

	    'number_format' => array(
		    'tab' => 'general-tab',
		    'label' => __( 'Number Format', 'estatik-mortgage-calculator' ),
		    'type' => 'list',
		    'values' => emc_get_number_formats(),
	    ),

	    'estatik_integration' => array(
		    'tab' => 'general-tab',
            'type' => 'checkbox',
            'label' => __( 'Estatik Integration', 'estatik-mortgage-calculator' ),
            'data-tooltip' => __( 'Purchase price field will pick up property price if placed as<br> widget on single property page - for <a href="https://wordpress.org/plugins/estatik/" target="_blank">Estatik plugin</a> users only)', 'estatik-mortgage-calculator' ),
        ),

	    'default_purchase_price' => array(
            'tab' => 'display-tab',
            'label' => __( 'Default purchase price', 'estatik-mortgage-calculator' ),
            'type' => 'text',
        ),

	    'max_purchase_price' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Max purchase price', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
	    ),

	    'purchase_price_step' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Purchase price step', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
            'placeholder' => 1
	    ),

	    'default_interest_rate' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Default interest rate', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
	    ),

	    'max_interest_rate' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Max interest rate', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
	    ),

	    'interest_rate_step' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Interest rate step', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
		    'placeholder' => 1
	    ),

	    'default_term'  => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Default term (years)', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
	    ),

	    'max_term' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Max term (years)', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
	    ),

	    'term_step' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Term step', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
		    'placeholder' => 1
	    ),

	    'color' => array(
		    'tab' => 'style-tab',
		    'label' => __( 'Color', 'estatik-mortgage-calculator' ),
		    'type' => 'color',
	    ),

	    'interest_color' => array(
		    'tab' => 'style-tab',
		    'label' => __( 'Total Result Color', 'estatik-mortgage-calculator' ),
            'type' => 'color',
	    ),

	    'home_insurance_color' => array(
		    'tab' => 'style-tab',
		    'label' => __( 'Home Insurance Color', 'estatik-mortgage-calculator' ),
		    'type' => 'color',
	    ),

	    'property_tax_color' => array(
		    'tab' => 'style-tab',
		    'label' => __( 'Property Tax Color', 'estatik-mortgage-calculator' ),
		    'type' => 'color',
	    ),

	    'pmi_color' => array(
		    'tab' => 'style-tab',
		    'label' => __( 'PMI Color', 'estatik-mortgage-calculator' ),
		    'type' => 'color',
	    ),

        'digits_color' => array(
		    'tab' => 'style-tab',
		    'label' => __( 'Digits Color', 'estatik-mortgage-calculator' ),
		    'type' => 'color',
	    ),

	    'slider_icon' => array(
		    'tab' => 'style-tab',
		    'label' => __( 'Slider Icon', 'estatik-mortgage-calculator' ),
		    'type' => 'radio',
		    'values' => array(
			    'triangle' => '<span class="emc-triangle"></span>',
			    'circle' => '<span class="emc-circle"></span>',
		    ),
	    ),

	    'layout' => array(
		    'tab' => 'style-tab',
		    'label' => __( 'Layout', 'estatik-mortgage-calculator' ),
            'type' => 'list',
            'values' => emc_get_layouts(),
	    ),

	    'container_width' => array(
		    'tab' => 'style-tab',
		    'label' => __( 'Calculator Width', 'estatik-mortgage-calculator' ),
            'placeholder' => __( '500px or 50%', 'estatik-mortgage-calculator' )
	    ),

	    'down_payment' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Down Payment', 'estatik-mortgage-calculator' ),
            'type' => 'checkbox',
            'class' => 'js-show-fields',
            'data-class-field' => 'js-down-payment-show',
	    ),

	    'default_down_payment' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Default down payment', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-down-payment-show',
	    ),

	    'down_payment_step' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Down payment step', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-down-payment-show',
            'placeholder' => 1,
	    ),

	    'property_tax' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Property tax', 'estatik-mortgage-calculator' ),
		    'type' => 'checkbox',
		    'class' => 'js-show-fields',
		    'data-class-field' => 'js-property-tax-show',
	    ),

	    'default_property_tax' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Default property tax', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-property-tax-show',
	    ),

	    'max_property_tax' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Max property tax', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-property-tax-show',
	    ),

	    'property_tax_step' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Property tax step', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-property-tax-show',
            'placeholder' => 1
	    ),

	    'pmi' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'PMI', 'estatik-mortgage-calculator' ),
		    'type' => 'checkbox',
		    'class' => 'js-show-fields',
		    'data-class-field' => 'js-pmi-show',
	    ),

	    'default_pmi' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Default PMI', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-pmi-show',
	    ),

	    'max_pmi' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Max PMI', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-pmi-show',
	    ),

	    'pmi_step' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'PMI step', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-property-tax-show',
		    'placeholder' => 1
	    ),

	    'home_insurance' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Home insurance', 'estatik-mortgage-calculator' ),
		    'type' => 'checkbox',
		    'class' => 'js-show-fields',
		    'data-class-field' => 'js-home-insurance-show',
	    ),

	    'default_home_insurance' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Default home insurance', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-home-insurance-show',
	    ),

	    'max_home_insurance' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Max home insurance', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-home-insurance-show',
	    ),

	    'home_insurance_step' => array(
		    'tab' => 'display-tab',
		    'label' => __( 'Home insurance step', 'estatik-mortgage-calculator' ),
		    'type' => 'text',
		    'wrapper_class' => 'js-property-tax-show',
		    'placeholder' => 1
	    ),
    ) );
}

/**
 * Return global settings.
 *
 * @return array
 */
function emc_get_global_settings() {
	return apply_filters( 'emc_global_settings', wp_parse_args(
		get_option( 'emc_options', emc_get_default_settings() ),
		emc_get_default_settings()
	) );
}

/**
 * Return calc layouts.
 *
 * @return array
 */
function emc_get_layouts() {
    return apply_filters( 'emc_get_layouts', array(
        'vertical' => __( 'Vertical', 'estatik-mortgage-calculator' ),
        'horizontal' => __( 'Horizontal', 'estatik-mortgage-calculator' ),
    ) );
}

/**
 * Return list of number formats.
 *
 * @return array
 */
function emc_get_number_formats() {
	if ( class_exists( 'Es_Settings_Container' ) && method_exists( 'Es_Settings_Container', 'get_setting_values' ) ) {
		$values = Es_Settings_Container::get_setting_values( 'price_format' );
	} else {
		$values = array( ',.' => '19,999.00', '.,' => '19.999,00', ' ' => '19 999', ',' => '19,999', '.' => '19.999' );
	}

	return apply_filters( 'emc_number_formats', $values );
}

/**
 * Return admin options page tabs.
 *
 * @return array
 */
function emc_get_admin_options_tabs() {
	return apply_filters( 'emc_admin_options_tabs', array(
		'general-tab' => array(
			'label' => __( 'General Settings', 'estatik-mortgage-calculator' ),
		),
		'display-tab' => array(
			'label' => __( 'Display Settings', 'estatik-mortgage-calculator' ),
		),
        'style-tab' => array(
			'label' => __( 'Styles Settings', 'estatik-mortgage-calculator' ),
		),
	) );
}

if ( ! function_exists( 'emc_display_calculator_field' ) ) {

	/**
	 * Display calculator field.
	 *
	 * @param $args
	 *
	 * @return void
	 */
	function emc_display_calculator_field( $args ) {
		$args = apply_filters( 'emc_calculator_field_args', wp_parse_args( $args, array(
			'label' => '',
			'uid' => '',
			'field' => '',
			'info' => '',
			'default_value' => '',
			'max_value' => '',
			'range_class' => 'js-emc-range-slider',
			'field_class' => '',
			'hide' => false,
			'units' => '',
            'step' => 1,
		) ) );

		$uid = $args['uid'];

		if ( $args['hide'] ) return; ?>

        <div class="emc-field emc-field__<?php echo esc_attr( $args['field'] ); ?>">
            <label class="emc-field__label" for="<?php echo esc_attr( $args['field'] . '-' . $uid ); ?>">
				<?php echo esc_html( $args['label'] ); ?>
				<?php if ( ! empty( $args['info'] ) ) : ?>
                    <div class="emc-info">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 65 65" style="fill:#c8c8c8; enable-background:new 0 0 65 65;" xml:space="preserve">
                            <g style="fill:gray">
                                <path d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
                                    S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/>
                                <circle cx="33.018" cy="19.541" r="3.345"/>
                                <path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z"/>
                            </g>
                        </svg>
                        <div class="emc-info__overlay"><?php echo esc_html( $args['info'] ); ?></div>
                    </div>
				<?php endif; ?>
            </label>
            <div class="emc-field--content">
                <input type="text" data-slider-target="#<?php echo esc_attr( $args['field'] . '-slider-' . $uid ); ?>" class="<?php echo esc_attr( $args['field_class'] ); ?>" id="<?php echo esc_attr( $args['field'] . '-' . $uid ); ?>" value="<?php echo esc_attr( $args['default_value'] ); ?>">
				<?php echo $args['units']; ?>
            </div>
            <label><input type="range"
                          class="<?php echo esc_attr( $args['range_class'] ); ?>"
                          min="0"
                          step="<?php echo esc_attr( $args['step'] ); ?>"
                          name="<?php echo esc_attr( $args['field'] ); ?>"
                          id="<?php echo esc_attr( $args['field'] . '-slider-' . $uid ); ?>"
                          data-field-target="#<?php echo esc_attr( $args['field'] . '-' . $uid ); ?>"
                          max="<?php echo esc_attr( $args['max_value'] ); ?>"
                          value="<?php echo esc_attr( $args['default_value'] ); ?>"/>
            </label>
        </div>
		<?php
	}
}
add_action( 'emc_display_calculator_field', 'emc_display_calculator_field', 10, 1 );

/**
 * Display calculate button.
 *
 * @return void
 */
function emc_display_calculator_button() {
    echo sprintf( "<div class='emc-field emc-field__submit'><a href='#' class='emc-btn js-emc-submit'>%s</a></div>", __( 'Calculate', 'estatik-mortgage-calculator' ) );
}
add_action( 'emc_display_calculator_button', 'emc_display_calculator_button' );

/**
 * @return void
 */
function emc_save_options() {
    $nonce = 'emc_save_options';

    if ( is_admin() && ! empty( $_POST[ $nonce ] ) && wp_verify_nonce( emc_clean( $_POST[ $nonce ] ), $nonce ) ) {
        $options = ! empty( $_POST['emc_options'] ) ? emc_clean( $_POST['emc_options'] ) : array();
        $defined_options = emc_get_global_settings();

        if ( ! empty( $options ) ) {
            foreach ( $options as $option => $value ) {
                $defined_options[ $option ] = $value;
            }

            update_option( 'emc_options', emc_clean( $defined_options ) );
        }
    }
}
add_action( 'init', 'emc_save_options' );

/**
 * @param $args
 */
function emc_get_popup_content( $args ) {
    include emc_locate_template( 'partials/popup-' . $args['popup_type'] . '.php' );
}

/**
 * @param $template_path
 *
 * @return string
 */
function emc_locate_template( $template_path ) {
	$find = array();
	$context = EMC_PLUGIN_DIR_PATH . 'includes/templates/';
	$base = $template_path;

	$find[] = 'estatik/' . $template_path;
	$find[] = $context . $template_path;

	$template_path = locate_template( array_unique( $find ) );

	if ( ! $template_path ) {
		$template_path = $context . $base;
	}

	return apply_filters( 'es_locate_template', $template_path );
}

/**
 * Return calculator markup.
 *
 * @param array $args
 *
 * @return string
 */
function emc_get_calculator_markup( $args = array() ) {
	$args = wp_parse_args( $args, emc_get_global_settings() );

	if ( is_singular( 'properties' ) && function_exists( 'es_get_property' ) && ! empty( $args['estatik_integration'] ) ) {
	    global $post;
		$property = es_get_property( $post->ID );
		$args['default_purchase_price'] = $property->price ? $property->price : $args['default_purchase_price'];

		if ( $args['max_purchase_price'] < $args['default_purchase_price'] ) {
			$args['max_purchase_price'] = $args['default_purchase_price'];
        }
	}

	$args['uid'] = uniqid();
	$path = emc_locate_template( 'calculator.php' );

	if ( file_exists( $path ) ) {

		$script_path = EMC_PLUGIN_DIR_URL . 'public/js/';
		$css_path    = EMC_PLUGIN_DIR_URL . 'public/css/';

		if ( ! wp_script_is( 'emc-script', 'enqueued' ) ) {
			wp_register_script( 'emc-range-slider', $script_path . 'rangeslider.min.js', array( 'jquery' ), EMC_VER, array( 'in_footer' => false ) );
			wp_register_script( 'magnific-popup', $script_path . 'jquery.magnific-popup.min.js', array( 'jquery' ), EMC_VER, array( 'in_footer' => false ) );
			wp_register_script( 'chartist', $script_path . 'chartist.min.js', array(), EMC_VER, array( 'in_footer' => false ) );
			wp_enqueue_script( 'emc-script', $script_path . 'script.min.js', array( 'magnific-popup', 'jquery', 'emc-range-slider', 'chartist' ), EMC_VER, array( 'in_footer' => false ) );
			wp_enqueue_style( 'emc-style', $css_path . 'style.min.css', array(), EMC_VER );
			wp_enqueue_style( 'chartist', $css_path . 'chartist.min.css', array(), EMC_VER );
			wp_enqueue_style( 'magnific-popup', $css_path . 'magnific-popup.min.css', array(), EMC_VER );
		}

		ob_start();
		include $path;
		return ob_get_clean();
	}
}

/**
 * Sanitize provided value.
 *
 * @param $var
 *
 * @return array|string
 */
function emc_clean( $var ) {
	if ( is_array( $var ) ) {
		return array_map( 'emc_clean', $var );
	} else {
		if ( is_scalar( $var ) ) {
			if ( emc_is_html( $var ) ) {
				return wp_kses_post( $var );
			}
		} else {
			return sanitize_text_field( $var );
		}

		return is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
	}
}

/**
 * @param $string
 *
 * @return bool
 */
function emc_is_html( $string ) {
	return $string != wp_strip_all_tags( $string );
}