<?php

/**
 * The template for displaying listing content none template
 *
 * This template can be overridden by copying it to yourtheme/adirectory/content-none.php
 *
 * @package     QS Directories\Templates
 * @version     1.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
global $wp;

do_action('adqs_before_listing_taxonomy');
?>
<div class="qsd-content-none">
	<div class="qsd-contentNone-img">
		<?php if (!empty(adqs_get_setting_option('content_not_found_image'))): ?>

			<img src="<?php echo esc_url(adqs_get_setting_option('content_not_found_image')); ?>"
				alt="<?php echo esc_attr__('Not Found', 'adirectory'); ?>">
		<?php else: ?>
			<img src="<?php echo esc_url(ADQS_DIRECTORY_ASSETS_URL . "/frontend/img/not-found.svg"); ?>"
				alt="<?php echo esc_attr__('Not Found', 'adirectory'); ?>">
		<?php endif; ?>
	</div>
	<?php

	if (!empty(adqs_get_setting_option('content_not_found')) && (adqs_get_setting_option('content_not_found') != '')):
		echo wp_kses_post(adqs_get_setting_option('content_not_found'));
	else:
	?>
		<h2><?php echo esc_html__('Sorry!! Listing not Founded', 'adirectory'); ?></h2>
		<p><?php echo esc_html__('Whoops... this information is not available for a moment', 'adirectory'); ?></p>
		<a
			href="<?php echo esc_url(adqs_get_base_page_url(home_url($wp->request))); ?>"><?php echo esc_html__('Show All', 'adirectory'); ?></a>
	<?php endif; ?>
</div>
<?php
do_action('adqs_after_listing_taxonomy');
