<?php
/**
 * Easy Populate Posts metadata.
 *
 * @package spp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$max_meta  = self::get_max_meta();
$max_limit = self::spp_max_fields();
?>
<div>
	<h3>
		<input type="number" name="spp[max_meta]" id="spp_max_meta" size="2" value="<?php echo (int) $max_meta; ?>" min="1" max="<?php echo (int) $max_limit; ?>">
		<?php esc_html_e( 'Custom Fields', 'spp' ); ?>
	</h3>
	<div id="spp-max-meta-listing"><?php self::spp_max_meta_listing( (int) $max_meta ); ?></div>
	<p><em><?php esc_html_e( 'Each of the specified custom fields is a pair of name and value', 'spp' ); ?></em></p>
	<?php echo self::get_post_meta_keys(); // phpcs:ignore ?>
</div>
