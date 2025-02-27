<?php

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Get the plugin instance.
 *
 * @since 2.0.0
 * @return WooCommerceVariationSwatches\Plugin
 */
function WCVS() { // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.FunctionNameInvalid
	return \WooCommerceVariationSwatches\Plugin::instance();
}

/**
 * Get the plugin version.
 *
 * @since 2.0.0
 * @return array
 */
function wcvs_get_attribute_types() {
	$types = array(
		'color' => esc_html__( 'Color', 'wc-variation-swatches' ),
		'image' => esc_html__( 'Image', 'wc-variation-swatches' ),
		'label' => esc_html__( 'Label', 'wc-variation-swatches' ),
	);

	return apply_filters( 'wcvs_attribute_types', $types );
}

/**
 * Get attribute field depending on attribute name
 *
 * @param string $attribute_name Attribute Name.
 *
 * @since 2.0.0
 * @return object Attribute taxonomy
 */
function wcvs_get_attr_tax_by_name( $attribute_name ) {
	// Remove "pa_" prefix if it exists.
	$attribute_name = preg_replace( '/^pa_/i', '', $attribute_name );

	if ( is_callable( 'wc_get_attribute_taxonomies' ) ) {
		// Get all WooCommerce attribute taxonomies and return the one that matches the attribute name.
		foreach ( wc_get_attribute_taxonomies() as $attribute ) {
			if ( $attribute->attribute_name === $attribute_name ) {
				return $attribute;
			}
		}

		return null;
	}

	// Fallback if wc_get_attribute_taxonomies() is not available.
	global $wpdb;

	$cache_key          = 'wcvs_attr_tax_' . $attribute_name;
	$attribute_taxonomy = wp_cache_get( $cache_key, 'woocommerce' );

	// If not cached, fetch from the database.
	if ( false === $attribute_taxonomy ) {
		$attribute_taxonomy = $wpdb->get_row( // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
			$wpdb->prepare(
				"SELECT * FROM {$wpdb->prefix}woocommerce_attribute_taxonomies WHERE attribute_name = %s",
				$attribute_name
			)
		);

		// Store the result in cache.
		if ( $attribute_taxonomy ) {
			wp_cache_set( $cache_key, $attribute_taxonomy, 'woocommerce' );
		}
	}

	return $attribute_taxonomy;
}

/**
 * Get attribute field depending on attribute type
 *
 * @param string $type Field Type.
 * @param null   $value Field Value.
 *
 * @since 2.0.0
 * @return void
 */
function wcvs_get_attribute_fields( $type, $value = null ) {
	switch ( $type ) {
		case 'image':
			$image = $value ? wp_get_attachment_image_src( $value ) : '';
			$image = $image ? $image[0] : WC()->plugin_url() . '/assets/images/placeholder.png';
			?>
			<div class="wc-variation-swatches-preview" style="float:left;margin-right:10px;">
				<img src="<?php echo esc_url( $image ); ?>" width="60px" height="60px"/> <?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
			</div>
			<div class="wc-variation-swatches-button-container">
				<input type="hidden" class="wc-variation-swatches-term-image" name="image" value="<?php echo esc_attr( $value ); ?>"/>
				<button type="button" class="wc-variation-swatches-upload-image button" style="margin-right: 10px;"><?php esc_html_e( 'Select image', 'wc-variation-swatches' ); ?></button>
				<button type="button" class="wc-variation-swatches-remove-image button button-link-delete <?php echo $value ? '' : 'hidden'; ?>"><?php esc_html_e( 'Remove image', 'wc-variation-swatches' ); ?></button>
			</div>
			<?php
			break;
		default:
			echo '<input type="text" id="term-' . esc_attr( $type ) . '" name="' . esc_attr( $type ) . '" value="' . esc_attr( $value ) . '" />';
	}
}

/**
 * Get attribute field label.
 *
 * @param string $type Attribute Type.
 *
 * @since 2.0.0
 * @return string
 */
function wcvs_get_attribute_field_label( $type ) {
	switch ( $type ) {
		case 'color':
			return __( 'Color', 'wc-variation-swatches' );
		case 'image':
			return __( 'Image', 'wc-variation-swatches' );
		case 'label':
			return __( 'Label', 'wc-variation-swatches' );
	}

	return __( 'Term', 'wc-variation-swatches' );
}

/**
 * Return saved setting options
 *
 * @param string $key Key name.
 * @param string $default_value Default Value.
 * @param string $section Section name.
 *
 * @since 2.0.0
 * @return string
 */
function wcvs_get_settings( $key, $default_value = '', $section = '' ) {
	$option = get_option( $section, array() );
	return ! empty( $option[ $key ] ) ? $option[ $key ] : $default_value;
}

/**
 * Get allowed html tags for wp_kses()
 *
 * @since 1.0.0
 * @return array
 */
function wcvs_allowed_html_tags() {
	return apply_filters(
		'wcvs_allowed_html_tags',
		array(
			'fieldset' => array(),
			'label'    => array(
				'for'   => array(),
				'style' => array(),
			),
			'input'    => array(
				'type'               => array(),
				'class'              => array(),
				'id'                 => array(),
				'name'               => array(),
				'value'              => array(),
				'data-default-color' => array(),
				'disabled'           => array(),
				'checked'            => array(),
				'placeholder'        => array(),
				'min'                => array(),
				'max'                => array(),
				'step'               => array(),
			),
			'textarea' => array(
				'class'    => array(),
				'id'       => array(),
				'name'     => array(),
				'rows'     => array(),
				'cols'     => array(),
				'disabled' => array(),
			),
			'select'   => array(
				'class'    => array(),
				'name'     => array(),
				'id'       => array(),
				'disabled' => array(),
			),
			'option'   => array(
				'value'    => array(),
				'selected' => array(),
			),
			'p'        => array(
				'class' => array(),
			),
			'span'     => array(
				'class' => array(),
			),
			'strong'   => array(),
			'br'       => array(),
		)
	);
}
