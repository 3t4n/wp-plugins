<?php

/**
 * The template for displaying listing content in the shortcode template
 *
 * This template can be overridden by copying it to yourtheme/adirectory/content-taxonomy.php
 *
 * @package     QS Directories\Templates
 * @version     1.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

global $wp;

// template part $args
extract($args);

do_action('adqs_before_main_content');

$pagination_type = $pagination_type ?? '';
$isSlick = ($pagination_type === 'carousel') ? true : false;
$all_listing_type = $all_listing_type ?? [];
$get_category_terms = $get_category_terms ?? [];
$tax_name = $tax_name ?? '';
$active_type = $active_type ?? '';
$per_page = $per_page ?? '';
$pagination_args = $pagination_args ?? false;

$carousel_settings = $carousel_settings ?? '';
$top_bar_show = $top_bar_show ?? false;
$uniqId = $uniqId ?? '';
$ajax_filter = $ajax_filter ?? false;

$active_type_terms = array_map(function ($single_term) use ($tax_name) {
	$term_obj = get_term($single_term->term_id, $tax_name);
	return [
		'id'    => $single_term->term_id,
		'name'  => $single_term->name,
		'slug'  => $single_term->slug,
		'icon'  => get_term_meta($single_term->term_id, 'adqs_category_icon_id', true),
		'image' => get_term_meta($single_term->term_id, 'adqs_category_image_id', true),
		'count' => $term_obj->count,
	];
}, $get_category_terms);


?>

<div class="qsd-select-category adqs-category-area">
	<div class="adqs-admin-container">
		<?php if (!empty($top_bar_show) && $all_listing_type && count($all_listing_type) > 1) : ?>
			<ul class="qsd-catagory-list-btn">
				<li><a href="<?php echo esc_url(adqs_get_base_page_url(home_url($wp->request))); ?>"
						class="<?php echo empty($active_type) ? esc_attr('active') : '' ?>"><?php echo esc_html__('All', 'adirectory'); ?></a>
				</li>
				<?php
				$item_count = 1;
				foreach ($all_listing_type as $listing_type) :
					if ($item_count == apply_filters('adqs_cat_dirlist_dropdown', 4)) {
						echo '<li class="has-next-all"><span>+</span><ul>';
					}
				?>
					<li><a href="<?php echo esc_url(add_query_arg('directory_type', $listing_type->slug,  adqs_get_base_page_url(home_url($wp->request)))); ?>"
							class="<?php echo ($listing_type->slug === $active_type) ? esc_attr('active') : '' ?>">
							<?php
							$dir_type_icon = get_term_meta($listing_type->term_id, 'adqs_term_icon', true);
							$dir_type_img = get_term_meta($listing_type->term_id, 'adqs_term_img', true);
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

							<?php echo esc_html($listing_type->name); ?></a>
					</li>
				<?php
					// Close the inner <ul> tag at the end of the loop if it was opened
					if ($item_count == count($all_listing_type)) {
						echo '</ul></li>';
					}
					$item_count++;
				endforeach; ?>
			</ul>
		<?php endif;
		$carousel_settings = $carousel_settings ?? '';
		?>
		<div class="qsd-taxt-content-area">
			<div class="<?php echo $isSlick ? 'qsd-has-slick' : ''; ?> qsd-select-category-grid">
				<div class="<?php echo $isSlick ? 'qsd-slick-wrapper' : ''; ?> qsd-select-category-grid-item select-tax-<?php echo esc_attr($uniqId); ?>"
					<?php if ($isSlick && !$ajax_filter) : ?>
					data-settings='<?php echo esc_attr($carousel_settings); ?>' ; <?php endif; ?>>
					<?php
					foreach ($active_type_terms as $active_type_term) :
					?>
						<div class="qsd-tax-grid-single">

							<div class="qsd-select-category-grid-thumb">
								<img src="<?php echo esc_url(wp_get_attachment_image_url($active_type_term['image'] ?? 0, apply_filters('adqs_categoris_image_size', 'post-thumbnails'))); ?>"
									alt="#" />
								<div class="qsd-select-category-grid-thumb-over">
									<a href="<?php echo esc_url(get_category_link($active_type_term['id'] ?? 0)); ?>">
										<div class="qsd-select-category-grid-thumb-over-txt">
											<p>
												<?php echo esc_html($active_type_term['count'] ?? ''); ?>
												<?php echo (absint($active_type_term['count'] ?? '') > 1) ? esc_html__('Listings', 'adirectory') : esc_html__('Listing', 'adirectory'); ?>
											</p>
											<h2><?php echo esc_html($active_type_term['name'] ?? ''); ?></h2>
											<span class="qsd-select-category-grid-thumb-over-icon">
												<svg width="7" height="13" viewBox="0 0 7 13" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path d="M1.35553 1.3335L5.88886 6.62238L1.35553 11.9113"
														stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
												</svg>
											</span>
										</div>
									</a>
								</div>
							</div>

						</div>
					<?php
					endforeach;

					if (empty($active_type_terms)) {
						adqs_get_template_part('content', 'none');
					}

					?>

				</div>
			</div>
			<?php if ($isSlick) : ?>
				<div class="adqs-buttons">
					<button class="adqs-global-slick-button-prev adqs-slick-prev-<?php echo esc_attr($uniqId); ?>"
						type="button">
						<span>
							<svg width="13" height="10" viewBox="0 0 13 10" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.25 9L1.5 5.25M1.5 5.25L5.25 1.5M1.5 5.25L11.5 5.25" stroke="currentColor"
									stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>
					</button>
					<div class="adqs-global-slick-pagination adqs-slick-pagination-<?php echo esc_attr($uniqId); ?>"></div>
					<button class="adqs-global-slick-button-next adqs-slick-next-<?php echo esc_attr($uniqId); ?>"
						type="button">
						<span>
							<svg width="13" height="10" viewBox="0 0 13 10" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M7.75 9L11.5 5.25M11.5 5.25L7.75 1.5M11.5 5.25L1.5 5.25" stroke="currentColor"
									stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
							</svg>

						</span>
					</button>
				</div>
			<?php endif; ?>

			<?php if (!empty($pagination_args)) : ?>
				<div class='adqs_pagination'>
					<?php echo wp_kses_post(paginate_links($pagination_args) ?? ''); ?>
				</div>
			<?php endif; ?>


			<?php if ($ajax_filter): ?>
				<div class="qsd-loader-overly"></div>
				<div class="qsd-loader-spinner"></div>
			<?php endif; ?>

		</div>
	</div>
</div>
<?php
do_action('adqs_after_main_content');
