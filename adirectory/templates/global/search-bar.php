<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
extract($args);
/**
 *  Filter Listings
 */

$adqs_cat_terms = adqs_get_terms('adqs_category');
$adqs_location_terms = adqs_get_terms('adqs_location');
$get_alllistingspage_id = absint(get_option('adqs_all_listings_page', 0));
if (empty($search_page_url)) {
	$search_page_url = get_permalink($get_alllistingspage_id);
}
?>
<div class="qsd-searchBar-wrap">
	<form action="<?php echo esc_url($search_page_url); ?>" method="get" <?php if ($new_tab) : ?> target="_blank" <?php endif; ?>>
		<div class="qsd-prodcut-main-box qsd-search-bar">
			<div class="qsd-prodcut-main">
				<div class="qsd-prodcut-main-left">
					<div class="qsd-form-main">
						<div class="qsd-form-item adqs-ajax-search">
							<input type="text" class="qsd-form-input" name="ls" placeholder="<?php echo esc_attr__('Type your Keyword...', 'adirectory'); ?>" value="" />
							<?php do_action('adqs_ajax_search'); ?>
						</div>
						<?php if (!empty($adqs_cat_terms)) : ?>
							<!-- Category Filter -->
							<div class="qsd-form-item adqs-tax-multichebox">
								<input type="hidden" name="category" value="<?php echo esc_attr(sanitize_text_field($_REQUEST['category'] ?? '')); ?>" />
								<input type="text" class="qsd-form-input" placeholder="<?php echo esc_attr__('Search Category', 'adirectory'); ?>" value="<?php echo esc_attr(sanitize_text_field($_REQUEST['category'] ?? '')); ?>" />
								<?php do_action('adqs_tax_lists', 'adqs_category', explode(',', sanitize_text_field($_REQUEST['category'] ?? ''))); ?>

							</div>
						<?php endif; ?>

						<?php if (!empty($adqs_location_terms)) : ?>
							<!-- Location Filter -->
							<div class="qsd-form-item adqs-tax-multichebox">
								<input type="hidden" name="location" value="<?php echo esc_attr(sanitize_text_field($_REQUEST['location'] ?? '')); ?>" />
								<input type="text" class="qsd-form-input" placeholder="<?php echo esc_attr__('Search Location', 'adirectory'); ?>" value="<?php echo esc_attr(sanitize_text_field($_REQUEST['location'] ?? '')); ?>" />
								<?php do_action('adqs_tax_lists', 'adqs_location', explode(',', sanitize_text_field($_REQUEST['location'] ?? ''))); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="qsd-prodcut-main-right">
					<button type="submit" class="qsd-main-btn">
						<img class="img-svg" src="<?php echo esc_url(ADQS_DIRECTORY_ASSETS_URL . '/frontend/img/Search.svg'); ?>" alt="#">
						<?php if (!empty(adqs_get_setting_option('findListingBtnText'))):
							echo esc_html(adqs_get_setting_option('findListingBtnText'));
						else:
						?>
							<?php echo esc_html__('Find Listing', 'adirectory'); ?>
						<?php endif; ?>
					</button>

				</div>

			</div>
		</div>
	</form>
</div>