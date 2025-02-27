<?php
/**
 * Easy Populate Posts tax.
 *
 * @package spp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$maybe_ajax = filter_input( INPUT_POST, 'action', FILTER_DEFAULT );
$maybe_ajax = ! empty( $maybe_ajax ) && 'spp_max_tax_listing' === $maybe_ajax ? true : false;

if ( $maybe_ajax ) {
	$spp_obj = filter_input( INPUT_POST, 'spp', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY );
	$max_tax = self::sanitize_max_value( (int) $spp_obj['max_tax'] ?? 1 );
}

for ( $k = 1; $k <= $max_tax; ++$k ) {
	$mk = $k > 1 ? $k : '';

	$val_tax  = ( isset( self::$settings[ 'taxonomy' . $mk ] ) ) ? self::$settings[ 'taxonomy' . $mk ] : '';
	$val_slug = ( isset( self::$settings[ 'term_slug' . $mk ] ) ) ? self::$settings[ 'term_slug' . $mk ] : '';
	$val_term = ( isset( self::$settings[ 'term_id' . $mk ] ) ) ? self::$settings[ 'term_id' . $mk ] : '';
	$val_rand = ( isset( self::$settings[ 'term_rand' . $mk ] ) ) ? (int) self::$settings[ 'term_rand' . $mk ] : 0;
	?>

	<h4><?php esc_html_e( 'Taxonomy', 'spp' ); ?> <?php echo esc_attr( $k ); ?></h4>
	<div class="row-span two-one">
		<select name="spp[taxonomy<?php echo esc_attr( $mk ); ?>]"
		id="spp_taxonomy<?php echo esc_attr( $mk ); ?>">
			<?php if ( ! empty( self::$allowed_taxonomies ) ) : ?>
				<?php foreach ( self::$allowed_taxonomies as $kk => $vv ) : ?>
					<option value="<?php echo esc_attr( $kk ); ?>"<?php selected( $kk, $val_tax ); ?>><?php echo esc_attr( $vv ); ?> (<?php echo esc_attr( $kk ); ?>)</option>
				<?php endforeach; ?>
			<?php endif; ?>
		</select>

		<select name="spp[term_rand<?php echo esc_attr( $mk ); ?>]" id="spp_term_rand<?php echo esc_attr( $mk ); ?>">
			<option value="0"<?php selected( 0, $val_rand ); ?>><?php esc_attr_e( 'all terms', 'spp' ); ?></option>
			<option value="1"<?php selected( 1, $val_rand ); ?>><?php esc_attr_e( 'random', 'spp' ); ?></option>
			<option value="2"<?php selected( 2, $val_rand ); ?>><?php esc_attr_e( 'one term', 'spp' ); ?></option>
		</select>

		<input type="text"
			name="spp[term_slug<?php echo esc_attr( $mk ); ?>]"
			id="spp_term_slug<?php echo esc_attr( $mk ); ?>"
			value="<?php echo esc_attr( $val_slug ); ?>"
			size="10" placeholder="<?php esc_attr_e( 'Ex: Red, Green, Blue', 'spp' ); ?>">

		<input type="text"
			name="spp[term_id<?php echo esc_attr( $mk ); ?>]"
			id="spp_term_id<?php echo esc_attr( $mk ); ?>"
			value="<?php echo esc_attr( $val_term ); ?>"
			size="10" placeholder="<?php esc_attr_e( 'Ex: 3, 5, 7', 'spp' ); ?>">
	</div>
	<?php
}

if ( $maybe_ajax ) {
	wp_die();
}
