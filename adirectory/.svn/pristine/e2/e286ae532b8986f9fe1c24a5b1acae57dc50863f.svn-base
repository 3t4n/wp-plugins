<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
// template part $args
extract($args);

global $wp;

/**
 *  Filter Listings
 */
$view_type = isset($_GET['view_type']) ? $_GET['view_type'] : '';
if ($view_type === 'map') {
	return '';
}

$ajax_filter = $ajax_filter ?? false;
$filter_layout = $filter_layout ?? 'top';
$per_page = $per_page ?? '';
$paged = $paged ?? '';
$adqs_cat_terms = adqs_get_terms('adqs_category');
$adqs_location_terms = adqs_get_terms('adqs_location');
$adqs_tags = adqs_get_terms('adqs_tags', array('hierarchical' => false));
$current_url = $wp->request;

// all request data
$search = isset($_GET['ls']) ? $_GET['ls'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$location = isset($_GET['location']) ? $_GET['location'] : '';
$directory_type = isset($_GET['directory_type']) ? $_GET['directory_type'] : '';
$tags = (isset($_GET['tags']) && !empty($_GET['tags'])) ? explode(",", $_GET['tags']) : [];
$minprice = isset($_GET['minPrice']) ? $_GET['minPrice'] : '';
$maxprice = isset($_GET['maxPrice']) ? $_GET['maxPrice'] : '';
$rangePrice = isset($_GET['rangePrice']) ? $_GET['rangePrice'] : '';
$rating = isset($_GET['rating']) ? $_GET['rating'] : '';
$display_listings = isset($_GET['display_listings']) ? $_GET['display_listings'] : '';

// exclude search field
$excludedFilterFields = !empty(adqs_get_setting_option('excludedFilterFields')) ? adqs_get_setting_option('excludedFilterFields') : [];


?>
<section class="qsd-prodcut">
	<form action="<?php echo esc_url(adqs_get_base_page_url(home_url($wp->request))); ?>" method="get">
		<?php
		if (isset($_GET['directory_type']) || $ajax_filter) : ?>
			<input type="hidden" name="directory_type" value="<?php echo esc_attr($_GET['directory_type'] ?? ''); ?>">
		<?php endif;
		?>
		<?php
		if ($ajax_filter) : ?>
			<input type="hidden" name="view_type" value="<?php echo esc_attr($_GET['view_type'] ?? ''); ?>">
			<input type="hidden" name="short_by" value="<?php echo esc_attr($_GET['short_by'] ?? ''); ?>">
		<?php endif; ?>

		<div class="adqs-admin-container">
			<div class="qsd-prodcut-main-box qsd-advancedTop_filter">

				<h3 class="qsd-prodcut-grid-with-side-bar-titel">
					<?php if (!empty(adqs_get_setting_option('searchHeadingText'))):
						echo esc_html(adqs_get_setting_option('searchHeadingText'));
					else:
					?>
						<?php echo esc_html__('Search', 'adirectory'); ?>
					<?php endif; ?>
				</h3>
				<div class="qsd-prodcut-main">
					<div class="qsd-prodcut-main-left">
						<div class="qsd-form-main">

							<?php if (!in_array('search', $excludedFilterFields)): ?>
								<div class="qsd-form-item adqs-ajax-search">
									<input type="text" class="qsd-form-input" name="ls"
										placeholder="<?php echo esc_attr__('Type your Keyword...', 'adirectory'); ?>"
										value="<?php echo esc_attr($search); ?>" />
									<?php do_action('adqs_ajax_search'); ?>
								</div>
							<?php endif; ?>

							<?php if (!empty($adqs_cat_terms) && !in_array('category', $excludedFilterFields)): ?>
								<!-- Category Filter -->
								<div class="qsd-form-item adqs-tax-multichebox">
									<input type="hidden" name="category" value="<?php echo esc_attr(sanitize_text_field($_REQUEST['category'] ?? '')); ?>" />
									<input type="text" class="qsd-form-input" placeholder="<?php echo esc_attr__('Search Category', 'adirectory'); ?>" value="<?php echo esc_attr(sanitize_text_field($_REQUEST['category'] ?? '')); ?>" />
									<?php do_action('adqs_tax_lists', 'adqs_category', explode(',', sanitize_text_field($_REQUEST['category'] ?? ''))); ?>

								</div>
							<?php endif; ?>

							<?php if (!empty($adqs_location_terms) && !in_array('location', $excludedFilterFields)):
							?>
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
						<?php if (empty(adqs_get_setting_option('excludeExpandSearch')) && ($filter_layout === 'top')): ?>
							<a href="<?php echo esc_url(home_url($wp->request)); ?>" class="qsd-prodcut-filter-btn"
								id="adqs_advtf_btn" data-page-id="<?php the_ID(); ?>">
								<img class="img-svg"
									src="<?php echo esc_url(ADQS_DIRECTORY_ASSETS_URL . '/frontend/img/filter.svg'); ?>"
									alt="#">


								<span id="adqs_advtf_text">
									<?php if (!empty(adqs_get_setting_option('filterBtnText'))):
										echo esc_html(adqs_get_setting_option('filterBtnText'));
									else:
									?>
										<?php echo esc_html__('Filter', 'adirectory'); ?>
									<?php endif; ?>

								</span>
							</a>
						<?php endif; ?>
						<?php if ($filter_layout !== 'sidebar'): ?>
							<button type="submit" class="qsd-main-btn">

								<img class="img-svg"
									src="<?php echo esc_url(ADQS_DIRECTORY_ASSETS_URL . '/frontend/img/Search.svg'); ?>"
									alt="#">

								<?php if (!empty(adqs_get_setting_option('findListingBtnText'))):
									echo esc_html(adqs_get_setting_option('findListingBtnText'));
								else:
								?>
									<?php echo esc_html__('Find Listing', 'adirectory'); ?>
								<?php endif; ?>
							</button>
						<?php endif; ?>
					</div>

				</div>
			</div>

			<?php


			if (empty(adqs_get_setting_option('excludeExpandSearch'))):
			?>
				<div class="qsd-prodcut-grid-with-side-bar-item hidden"
					id="adqs_advtFilter_more">
					<div class="qsd-prodcut-grid-with-side-bar">
						<!-- Pricing  -->
						<?php if (!in_array('min_max_price', $excludedFilterFields) || !in_array('range_price', $excludedFilterFields)): ?>
							<div class="qsd-prodcut-grid-with-side-bar-pricing">
								<h3 class="qsd-prodcut-grid-with-side-bar-titel">
									<?php echo esc_html__('By Pricing', 'adirectory'); ?>
								</h3>
								<div class="qsd-prodcut-grid-with-side-bar-pricing-item">
									<?php if (!in_array('min_max_price', $excludedFilterFields)): ?>
										<div class="qsd-pricing-filter-wrap">
											<div class="qsd-form-item">
												<input class="qsd-form-input" type="number"
													placeholder="<?php echo esc_html__('Min', 'adirectory'); ?>" name="minPrice"
													value="<?php echo esc_attr($minprice); ?>" id="min-price-field" min="0">
											</div>
											<div class="qsd-form-item">
												<input class="qsd-form-input" type="number" name="maxPrice"
													value="<?php echo esc_attr($maxprice); ?>"
													placeholder="<?php echo esc_html__('Max', 'adirectory'); ?>"
													id="max-price-field" min="1">
											</div>
										</div>
									<?php endif; ?>

									<?php if (!in_array('range_price', $excludedFilterFields)): ?>
										<div class="qsd-pricing-filter-wrap">
											<div class="qsd-form-item">
												<?php

												$price_range_options = apply_filters(
													'adqs_meta_price_range',
													array(
														'skimming'       => esc_html__('Ultra High ($$$$)', 'adirectory'),
														'moderate'       => esc_html__('Expensive ($$$)', 'adirectory'),
														'economy'        => esc_html__('Moderate ($$)', 'adirectory'),
														'bellow_economy' => esc_html__('Cheap ($)', 'adirectory'),
													)
												);
												?>
												<select class="qsd-form-select" name="rangePrice">
													<option value="">
														<?php echo esc_html__('Or Select Price Range', 'adirectory'); ?>
													</option>
													<?php
													if (!empty($price_range_options)) :
														foreach ($price_range_options as $pr_key => $pr_item) :
													?>
															<option value="<?php echo esc_attr($pr_key); ?>"
																<?php selected($rangePrice, $pr_key); ?>>
																<?php echo esc_html($pr_item); ?>
															</option>
													<?php
														endforeach;
													endif;
													?>
												</select>
											</div>
										</div>
									<?php endif; ?>
								</div>
							</div>
						<?php endif; ?>


						<!-- Reviews  -->
						<?php if (!in_array('rating', $excludedFilterFields)): ?>
							<div class="qsd-prodcut-grid-with-side-bar-reviews ">
								<h3 class="qsd-prodcut-grid-with-side-bar-titel">
									<?php esc_html_e('Ratings', 'adirectory'); ?>
								</h3>
								<div class="qsd-prodcut-grid-with-side-bar-reviews-item">
									<div class="qsd-prodcut-grid-reviews-inner">
										<input type="radio" name="rating" class="reviews-inner-check" value="5" id="rating_5"
											<?php checked($rating, 5); ?> />
										<label for="rating_5" class="reviews-inner-label">
											<span class="qsd-five-star">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
											</span>
										</label>
									</div>
									<div class="qsd-prodcut-grid-reviews-inner">
										<input type="radio" name="rating" class="reviews-inner-check" value="4" id="rating_4"
											<?php checked($rating, 4); ?> />
										<label for="rating_4" class="reviews-inner-label">
											<span class="qsd-four-star">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
											</span>
										</label>
									</div>

									<div class="qsd-prodcut-grid-reviews-inner">
										<input type="radio" name="rating" class="reviews-inner-check" value="3" id="rating_3"
											<?php checked($rating, 3); ?> />
										<label for="rating_3" class="reviews-inner-label">
											<span class="qsd-three-star">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
											</span>
										</label>
									</div>

									<div class="qsd-prodcut-grid-reviews-inner">
										<input type="radio" name="rating" class="reviews-inner-check" value="2" id="rating_2"
											<?php checked($rating, 2); ?> />
										<label for="rating_2" class="reviews-inner-label">
											<span class="qsd-two-star">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
											</span>
										</label>
									</div>

									<div class="qsd-prodcut-grid-reviews-inner">
										<input type="radio" name="rating" class="reviews-inner-check" value="1" id="rating_1"
											<?php checked($rating, 1); ?> />
										<label for="rating_1" class="reviews-inner-label">
											<span class="qsd-one-star">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
											</span>
										</label>
									</div>
									<div class="qsd-prodcut-grid-reviews-inner">
										<input type="radio" name="rating" class="reviews-inner-check" value="0" id="rating_0"
											<?php checked($rating, 0); ?> />
										<label for="rating_0" class="reviews-inner-label">
											<?php esc_html_e("N/A Rate", "adirectory"); ?>
										</label>
									</div>

								</div>
							</div>
						<?php endif; ?>

						<!-- Tags  -->

						<?php if (!empty($adqs_tags) && !in_array('tags', $excludedFilterFields)): ?>
							<div class="qsd-prodcut-grid-with-side-bar-Tags mt-36px">
								<h3 class="qsd-prodcut-grid-with-side-bar-titel">
									<?php esc_html_e("Tags", "adirectory"); ?>
								</h3>
								<div class="qsd-prodcut-grid-with-side-bar-reviews-item">

									<?php
									$key = 0;
									$display_number = 5;
									foreach ($adqs_tags as $key => $adqs_tag) :
									?>
										<div
											class="qsd-prodcut-grid-reviews-inner qsd-tags-wrapper <?php echo ($key + 1) > $display_number ? 'tags-hidden' : ''; ?>">
											<input type="checkbox" value="<?php echo esc_attr($adqs_tag->term_id); ?>"
												class="tags-inner-check" id="tags_<?php echo esc_attr($adqs_tag->term_id); ?>"
												<?php echo in_array($adqs_tag->term_id, $tags) ? 'checked' : ''; ?> />
											<label for="tags_<?php echo esc_attr($adqs_tag->term_id); ?>"
												class="reviews-inner-label-txt">
												<?php echo esc_html($adqs_tag->name); ?>
											</label>
										</div>
									<?php endforeach;
									if (!empty($key) && ($key > $display_number)):
									?>
										<div class="tag-btn seemore-tag">
											<?php esc_html_e("See More", "adirectory") ?>
											<span>
												<i class="fa-solid fa-angle-right"></i>
											</span>
										</div>
									<?php endif; ?>
								</div>
								<input type="hidden" value="<?php echo esc_attr(join(',', array_filter($tags))); ?>" name="tags"
									id="tags_field" />
							</div>
						<?php endif; ?>



						<!-- display featured  -->
						<?php if (!in_array('display_featured', $excludedFilterFields)): ?>
							<div class="qsd-prodcut-grid-with-side-bar-featured">
								<h3 class="qsd-prodcut-grid-with-side-bar-titel">
									<?php echo esc_html__('Featured Listings', 'adirectory'); ?>
								</h3>
								<div class="qsd-prodcut-grid-with-side-bar-featured-item">
									<div class="qsd-form-item">
										<input type="checkbox" name="display_listings" value="featured" id="featured_listing"
											<?php checked($display_listings, 'featured'); ?> />
										<label for="featured_listing"
											class="featured-inner-label"><?php echo esc_html__('Yes only', 'adirectory'); ?></label>
									</div>
								</div>
							</div>
						<?php endif; ?>

					</div>

					<!-- Add after More -->

					<?php do_action('adqs_after_advanced_top_filter'); ?>

					<div class="qsd-prodcut-grid-with-side-bar">
						<?php if ($filter_layout === 'sidebar'): ?>
							<div id="adqs_filterSubmit">
								<button type="submit" class="qsd-main-btn">

									<img class="img-svg"
										src="<?php echo esc_url(ADQS_DIRECTORY_ASSETS_URL . '/frontend/img/Search.svg'); ?>"
										alt="#">

									<?php if (!empty(adqs_get_setting_option('findListingBtnText'))):
										echo esc_html(adqs_get_setting_option('findListingBtnText'));
									else:
									?>
										<?php echo esc_html__('Find Listing', 'adirectory'); ?>
									<?php endif; ?>
								</button>
								<a href="<?php echo esc_url(adqs_get_base_page_url(home_url($wp->request))); ?>"
									class="qsd-grid-list-btn qsd-reset-btn">
									<span>
										<img class="img-svg"
											src="<?php echo esc_attr(ADQS_DIRECTORY_ASSETS_URL . '/frontend/img/reset-icon.svg'); ?>"
											alt="#">

									</span>
								</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</form>
</section>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		const allFilterWrap = document.querySelectorAll('#adqs_advtFilter_more .qsd-prodcut-grid-with-side-bar');

		allFilterWrap.forEach((filterWrap) => {
			if (!filterWrap.hasChildNodes() || filterWrap.children.length === 0) {
				filterWrap.style.display = 'none';
			}
		});

		setTimeout(function() {
			const cleanUrl = function(url) {
				// Parse the URL
				const [baseUrl, queryString] = url.split("?");
				if (!queryString) return url; // If no query string, return the original URL

				// Split the query string into key-value pairs
				const params = queryString.split("&").filter(param => {
					const [key, value] = param.split("=");
					return value !== undefined && value !== ""; // Keep only non-empty values
				});

				// Reconstruct the URL
				return params.length > 0 ? `${baseUrl}?${params.join("&")}` : baseUrl;
			}

			// Example usage
			const cleanedUrl = cleanUrl(window.location.href);
			window.history.replaceState(null, '', cleanedUrl);
		}, 200);
	});
</script>