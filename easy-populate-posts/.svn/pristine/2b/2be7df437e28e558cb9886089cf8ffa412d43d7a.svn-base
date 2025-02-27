<?php
/**
 * Easy Populate Posts terms.
 *
 * @package spp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$max_tax   = self::get_max_tax();
$max_limit = self::spp_max_fields();
?>
<div>
	<h3>
		<input type="number" name="spp[max_tax]" id="spp_max_tax" size="2" value="<?php echo (int) $max_tax; ?>" min="1" max="<?php echo (int) $max_limit; ?>">
		<?php esc_html_e( 'Terms', 'spp' ); ?>
	</h3>
	<div id="spp-max-tax-listing"><?php self::spp_max_tax_listing( (int) $max_tax ); ?></div>
	<p><em><?php esc_html_e( 'Separate terms names or IDs by comma (these will be created if not found).', 'spp' ); ?></em></p>
</div>
