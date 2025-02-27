<?php
/**
 * Easy Populate Posts meta.
 *
 * @package spp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$maybe_ajax = filter_input( INPUT_POST, 'action', FILTER_DEFAULT );
$maybe_ajax = ! empty( $maybe_ajax ) && 'spp_max_meta_listing' === $maybe_ajax ? true : false;

if ( $maybe_ajax ) {
	$spp_obj  = filter_input( INPUT_POST, 'spp', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY );
	$max_meta = self::sanitize_max_value( (int) $spp_obj['max_meta'] ?? 1 );
}

for ( $k = 1; $k <= $max_meta; ++$k ) {
	$mk = $k > 1 ? $k : '';

	$key_val   = ( isset( self::$settings[ 'meta_key' . $mk ] ) ) ? self::$settings[ 'meta_key' . $mk ] : '';
	$value_val = ( isset( self::$settings[ 'meta_key' . $mk ] ) ) ? maybe_serialize( self::$settings[ 'meta_value' . $mk ] ) : '';
	?>
	<h4><?php esc_html_e( 'Custom Field', 'spp' ); ?> <?php echo (int) $k; ?></h4>
	<div class="row-span one-two">
		<input type="text" size="15"
			name="spp[meta_key<?php echo esc_attr( $mk ); ?>]"
			id="spp_meta_key<?php echo esc_attr( $mk ); ?>"
			value="<?php echo esc_attr( $key_val ); ?>"
			placeholder="<?php esc_attr_e( 'name', 'spp' ); ?>">
		<input type="text" size="10"
			name="spp[meta_value<?php echo esc_attr( $mk ); ?>]"
			id="spp_meta_value<?php echo esc_attr( $mk ); ?>"
			value="<?php echo esc_attr( $value_val ); ?>"
			placeholder="<?php esc_attr_e( 'value', 'spp' ); ?>">
	</div>
	<?php
}

if ( $maybe_ajax ) {
	wp_die();
}
