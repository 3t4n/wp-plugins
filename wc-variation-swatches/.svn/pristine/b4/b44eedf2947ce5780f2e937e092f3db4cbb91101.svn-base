<?php

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Return saved setting options
 *
 * @param string $key Key name.
 * @param string $default_value Default Value.
 * @param string $section Section name.
 *
 * @deprecated 2.0.0 Use wcvs_get_settings() instead.
 * @return string
 */
function wc_variation_swatches_get_settings( $key, $default_value = '', $section = '' ) {
	// Trigger a deprecation notice.
	_deprecated_function( __FUNCTION__, '2.0.0', 'wcvs_get_settings()' );

	return wcvs_get_settings( $key, $default_value = '', $section = '' );
}

/**
 * Get attribute field depending on attribute name
 *
 * @param string $attribute_name Attribute Name.
 *
 * @since 2.0.0
 * @return object Attribute taxonomy
 */
function wc_variation_swatches_get_tax_attribute( $attribute_name ) {
	// Trigger a deprecation notice.
	_deprecated_function( __FUNCTION__, '2.0.0', 'wcvs_get_attr_tax_by_name()' );

	return wcvs_get_attr_tax_by_name( $attribute_name );
}
