<?php
/**
 * Files Loader for each module
 *
 * Package   AffiliateCoupon\Custom
 * @since   1.0.0
 * @author  Mission 14
 * @link    https://couponplugin.co
 * @license GNU General Public License 2.0+
 */

namespace AffiliateCoupon\Custom;

$files = array(
	'src/custom/admin/admin.php',
	'src/custom/admin/fields.php',
	'src/custom/helpers/functions.php',
	'src/custom/post-type/coupon.php',
	'src/custom/shortcode/shortcode.php',
	'src/custom/taxonomy/config.php',
	'src/custom/taxonomy/custom-taxonomy.php',
	'src/custom/meta/meta-box.php',
	'src/custom/meta/term-meta.php',

);

foreach ( $files as $file ) {

	include AFFILIATE_COUPON_LITE_PATH . $file;

}