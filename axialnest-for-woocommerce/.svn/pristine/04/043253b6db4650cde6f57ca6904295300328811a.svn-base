<?php

function axialnest_woo_add_product_customizer() {
	add_action( 'woocommerce_single_product_summary', 'axialnest_woo_create_customizer_html', 10 );
}

function axialnest_woo_create_customizer_html() {
	global $product;
	$axialNestId = get_post_meta( $product->get_id(), 'axial-nest-id', true );
	if (!$axialNestId)
		return;

	$customizerLang = strtoupper(explode('_', get_locale())[0]);
	$customizerCurrency = get_woocommerce_currency();
	$axialSettings = get_option('woocommerce_axialnest_for_woocommerce_settings_settings');
	$buttonCSS = $axialSettings['customizeButtonCSS'];
	$addToCartCSSClass = $axialSettings['addToCartCSSClass'];

	wp_enqueue_script('axialnest', 'https://resources.axialnest.com/plugin/axialnest.js', array(), 'woocommerce', array('strategy'  => 'defer'));
	wp_enqueue_style('axialnestBaseStyle', plugins_url('css/axialnestBaseStyle.css', __FILE__ ), array(), '1');
	wp_add_inline_style('axialnestBaseStyle', '#axial-customize { ' . esc_html($buttonCSS) . '}');

	wp_enqueue_script('axialnestCustomizerBase', plugins_url('js/axialnestCustomizerBase.js', __FILE__ ), array(), '1.0.0', array('in_footer' => true));
	axialnest_woo_declare_js_variable('axialNestId', $axialNestId);
	axialnest_woo_declare_js_variable('customizerLang', $customizerLang);
	axialnest_woo_declare_js_variable('customizerCurrency', $customizerCurrency);
	axialnest_woo_declare_js_variable('addToCartCSSClass', $addToCartCSSClass);

	$productionJsonLang = $axialSettings['JSONlanguage'];
	$liteModeButtonText = $axialSettings['liteModeButtonText'];
	axialnest_woo_declare_js_variable('productionJsonLang', $productionJsonLang);
	axialnest_woo_declare_js_variable('liteModeButtonText', $liteModeButtonText);

	axialnest_woo_create_customize_button();
}

function axialnest_woo_create_customize_button() {
	$axialSettings = get_option('woocommerce_axialnest_for_woocommerce_settings_settings');
	$buttonText = $axialSettings['customizeButtonText'];
	?>
		<button id="axial-customize"><?php echo wp_kses_post($buttonText)?></button>
	<?php
}

add_action( 'woocommerce_before_add_to_cart_button', 'axialnest_woo_wk_add_customization_text_field' );
function axialnest_woo_wk_add_customization_text_field() { ?>
	<?php
		global $product;
		$axialNestId = get_post_meta( $product->get_id(), 'axial-nest-id', true );
	?>
	<div class="custom-field-wrap" style="margin: 10px; display: none;">
		<label for="axial-id"><?php esc_html_e( 'AxialNest ID', 'axialnest-for-woocommerce' ); ?></label>
		<input type="text" name='axial-id' id='axial-id' value='<?php echo esc_attr($axialNestId) ?>'>
	</div>

	<div class="custom-field-wrap" style="margin: 10px; display: none;">
		<label for="customization-text"><?php echo esc_html_e( 'Customization text', 'axialnest-for-woocommerce' ); ?></label>
		<input type="text" name='customization-text' id='customization-text' value=''>
	</div>
	<div class="custom-field-wrap" style="margin: 10px; display: none;">
		<label for="customization-json"><?php esc_html_e( 'Customization json', 'axialnest-for-woocommerce' ); ?></label>
		<input type="text" name='customization-json' id='customization-json' value=''>
	</div>
	<div class="custom-field-wrap" style="margin: 10px; display: none;">
		<label for="customization-screenshots"><?php esc_html_e( 'Customization screenshots', 'axialnest-for-woocommerce' ); ?></label>
		<input type="text" name='customization-screenshots' id='customization-screenshots' value=''>
	</div>
	<div class="custom-field-wrap" style="margin: 10px; display: none;">
		<label for="customization-thumbnail"><?php esc_html_e( 'Customization thumbnail', 'axialnest-for-woocommerce' ); ?></label>
		<input type="text" name='customization-thumbnail' id='customization-thumbnail' value=''>
	</div>
	<?php echo wp_nonce_field(plugin_dir_path( __FILE__ ).'/src', '_axialnonce', true, false) ?>
	<?php
}

function axialnest_woo_declare_js_variable($variableName, $value) {
	wp_add_inline_script('axialnestCustomizerBase', 'window.'.esc_attr($variableName).' = "'.esc_attr($value).'";', 'before');
}
