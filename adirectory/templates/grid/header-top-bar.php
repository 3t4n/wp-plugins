<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

// template part $args
extract($args);

global $wp;

$querystring = $_SERVER['QUERY_STRING'] ?? [];
parse_str($querystring, $output);

$is_active_sidebar = $is_active_sidebar ?? false;
$ajax_filter = $ajax_filter ?? false;
$filter_layout = $filter_layout ?? 'top';
$view_type = $view_type ?? '';


// exclude search field
$excludedSortByItem = !empty(adqs_get_setting_option('excludedSortByItem')) ? adqs_get_setting_option('excludedSortByItem') : [];

?>

<div class="qsd-prodcut-grid-right-top-ber">
	<div class="qsd-prodcut-grid-right-top-ber-left">

		<?php

		if (adqs_is_author_listing_archive()) :
		?>
			<form action="<?php echo esc_attr(home_url($wp->request)); ?>" methode="get">

				<div class="qsd-sarch-ber-item adqs-ajax-search">
					<input type="text" name="ls" class="sarch-input"
						placeholder="<?php echo esc_attr__('Type your Keyword...', 'adirectory'); ?>">

					<input type="hidden" name="listings" value="yes">
					<?php do_action('adqs_ajax_search'); ?>
					<button type="submit" class="qsd-main-btn">
						<span>
							<i class="fa-solid fa-magnifying-glass"></i>
						</span>
						<?php echo esc_html__('Search', 'adirectory'); ?>
					</button>
				</div>
			</form>
			<?php else :
			if ($view_type !== 'map') :

				$directory_types = adqs_get_directory_types();
				if (!empty($custom_directory)) {
					$directory_types = $custom_directory;
				}
				if (!empty($directory_types) && (count($directory_types) > 1) && empty(adqs_get_setting_option('excludeDirectoryFilter'))) :
			?>
					<ul class="qsd-catagory-list-btn <?php echo $ajax_filter ? esc_attr('has-ajax') : ''; ?>"
						id="qsd_directory_type">
						<?php
						$directory_type = $_GET['directory_type'] ?? '';
						?>
						<li>

							<a href="<?php
										if (!$ajax_filter) {
											echo esc_url(remove_query_arg('directory_type', add_query_arg($output, adqs_get_base_page_url(home_url($wp->request)))));
										}
										?>" class="<?php echo empty($directory_type) ? 'active' : '';

													?>

								"><?php echo esc_html__('All', 'adirectory');
									?>
							</a>

						</li>

						<?php
						if (!empty($directory_types)) :
							$item_count = 1;
							foreach ($directory_types as $type) :
								if (!empty($custom_directory)) {
									$type = get_term_by('slug', $type, 'adqs_listing_types');
								}

								$itemDropdown = (($filter_layout == 'sidebar') || $is_active_sidebar)  ? 2 : 5;

								if ($item_count == apply_filters('adqs_dirlist_dropdown', $itemDropdown)) {
									echo '<li class="has-next-all"><span>+</span><ul>';
								}


						?>
								<li><a href="<?php
												if ($ajax_filter) {
													echo esc_attr($type->slug);
												} else {
													echo esc_url(add_query_arg(array_merge($output, array('directory_type' => $type->slug)), adqs_get_base_page_url(home_url($wp->request))));
												}
												?>" class="<?php echo ($directory_type === $type->slug) ? 'active' : ''; ?>">

										<?php
										$dir_type_icon = get_term_meta($type->term_id, 'adqs_term_icon', true);
										$dir_type_img = get_term_meta($type->term_id, 'adqs_term_img', true);
										?>
										<?php
										if (!empty($dir_type_img)): ?>
											<img style="width: 15px;" class="adqs-dir-img" src="<?php echo esc_url($dir_type_img); ?>" alt="#">
											<?php else :
											if ($dir_type_icon):
											?>
												<i class="<?php echo esc_attr($dir_type_icon); ?>"></i>
										<?php
											endif;
										endif;
										?>
										<?php echo esc_html($type->name); ?></a>
								</li>
						<?php

								// Close the inner <ul> tag at the end of the loop if it was opened
								if ($item_count == count($directory_types)) {
									echo '</ul></li>';
								}

								$item_count++;
							endforeach;
						endif;
						?>
					</ul>
					<?php else :
					if ($listings_query->have_posts()) :
						$setting_per_page = !empty(AD()->Helper->get_setting('listing_per_page')) ? AD()->Helper->get_setting('listing_per_page') : 6;

						$per_page = $per_page ?? $setting_per_page;
						$total_posts = $listings_query->found_posts ?? '0';
						$start = (($paged - 1) * $per_page) + 1;
						$end = min($total_posts, $paged * $per_page);
					?>
						<div class="qsd-listing-summary">
							<p>
								<?php
								echo sprintf(
									esc_html__('Showing %1$s-%2$s of %3$s results', 'adirectory'),
									esc_html($start),
									esc_html($end),
									esc_html($total_posts)
								);
								?>
							</p>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
		<?php endif; ?>
	</div>

	<div class="qsd-prodcut-grid-right-top-ber-right">

		<?php if (($view_type !== 'map') && empty(adqs_get_setting_option('excludeSortBy'))) : ?>
			<div class="most-relevant-item">
				<p class="most-relevant-txt"><?php echo esc_html__('Sort By', 'adirectory'); ?>:</p>
				<?php
				$allSortBy = apply_filters('adqs_listings_sort_by', [
					'date-desc' => esc_html__('Latest listings', 'adirectory'),
					'date-asc' => esc_html__('Oldest listings', 'adirectory'),
					'views-desc' => esc_html__('Popular listings', 'adirectory'),
					'rating-desc' => esc_html__('5 to 1 (star rating)', 'adirectory'),
					'review-count' => esc_html__('Review Count', 'adirectory'),
					'title-asc' => esc_html__('A to Z (title)', 'adirectory'),
					'title-desc' => esc_html__('Z to A (title)', 'adirectory'),
					'price-asc' => esc_html__('Price (low to high)', 'adirectory'),
					'price-desc' => esc_html__('Price (high to low)', 'adirectory'),
					'rand' => esc_html__('Random listings', 'adirectory'),
				]);
				if (!empty($allSortBy)) :
				?>
					<div class="qsd-form-item">
						<select id="adqs_allSortBy" class='qsd-form-select' <?php if (!$ajax_filter): ?>
							onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);"
							<?php endif; ?>>
							<?php
							$sortBy = $_GET['sort_by'] ?? '';

							foreach ($allSortBy as $sortVal => $sortText) :
								if (!in_array($sortVal, $excludedSortByItem)):
							?>
									<option value="<?php
													if ($ajax_filter) {
														echo esc_attr($sortVal);
													} else {
														echo esc_url(add_query_arg(array_merge($output, array('sort_by' => $sortVal)), home_url($wp->request)));
													}


													?>" <?php selected($sortBy, $sortVal); ?>>
										<?php echo esc_html($sortText); ?>
									</option>
							<?php
								endif;
							endforeach; ?>
						</select>
					</div>
				<?php endif; ?>
			</div>

		<?php
		endif; // end sort by


		$view_type = $_GET['view_type'] ?? 'grid';
		$pattern = '/^(.*?\/)page\/\d+\/?(.*)$/';
		$replacement = '$1$2';

		?>
		<ul class="qsd-grid-list-btn-main" <?php if (!$ajax_filter && ($view_type !== 'map')):
												$listviewclass = ($is_active_sidebar || $filter_layout === 'sidebar') ? '1' : '2';
											?>
			data-listviewclass="list-view column-<?php echo esc_attr($listviewclass); ?>" <?php endif; ?>>
			<?php if ($reset_filter) : ?>
				<li>

					<a href="<?php echo esc_url(adqs_get_base_page_url(home_url($wp->request))); ?>"
						class="qsd-grid-list-btn qsd-reset-btn">
						<span>
							<img class="img-svg"
								src="<?php echo esc_attr(ADQS_DIRECTORY_ASSETS_URL . '/frontend/img/reset-icon.svg'); ?>"
								alt="#">

						</span>
					</a>
				</li>
			<?php endif; ?>
			<li>
				<?php
				$grid_url = add_query_arg(array_merge($output, array('view_type' => 'grid')), home_url($wp->request));
				$grid_url = ($view_type === 'map') ? preg_replace($pattern, $replacement, $grid_url) : $grid_url;
				?>
				<a href="<?php
							if ($ajax_filter && ($view_type !== 'map')) {
								echo esc_attr('grid');
							} else {
								echo esc_url($grid_url);
							}
							?>" class="qsd-grid-list-btn view-btn <?php echo ($view_type === 'grid') ? 'active' : ''; ?>">
					<span>
						<img class="img-svg"
							src="<?php echo esc_attr(ADQS_DIRECTORY_ASSETS_URL . '/frontend/img/gird-view-icon.svg'); ?>"
							alt="#">
					</span>
				</a>
			</li>
			<li>
				<?php
				$list_url = add_query_arg(array_merge($output, array('view_type' => 'list')), home_url($wp->request));
				$list_url = ($view_type === 'map') ? preg_replace($pattern, $replacement, $list_url) : $list_url;
				?>
				<a href="<?php
							if ($ajax_filter && ($view_type !== 'map')) {
								echo esc_attr('list');
							} else {
								echo esc_url($list_url);
							}
							?>" class="qsd-grid-list-btn view-btn has-list-view <?php echo ($view_type === 'list') ? 'active' : ''; ?>">
					<span>
						<img class="img-svg"
							src="<?php echo esc_attr(ADQS_DIRECTORY_ASSETS_URL . '/frontend/img/list-view-icon.svg'); ?>"
							alt="#">
					</span>
				</a>
			</li>
			<?php if ($has_map_view) : ?>
				<li>
					<a href="<?php echo esc_url(add_query_arg(array('view_type' => 'map'), home_url($wp->request))); ?>"
						class="qsd-grid-list-btn qsd-map-view <?php echo ($view_type === 'map') ? 'active' : ''; ?>">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" width="25" height="17" fill="currentColor"
								class="bi bi-geo-alt" viewBox="0 0 16 16">
								<path
									d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
								<path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
							</svg>
						</span>
					</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</div>