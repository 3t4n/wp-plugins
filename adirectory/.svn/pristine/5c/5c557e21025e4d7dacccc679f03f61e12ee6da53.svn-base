<?php
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

extract($args);

/**
 *  Author Archive Option
 */

$filter_layout = $filter_layout ?? 'top';
$wap_classes = ($filter_layout === 'sidebar') ? ['column-2'] : ['column-3'];
$wap_classes[] = "grid-list-{$uniqId}";



if ($view_type === 'list') {
	$wap_classes[] = "{$view_type}-view";
	$wap_classes[] = ($filter_layout === 'sidebar') ? 'column-1' : 'column-2';
}
$isSlick = ($pagination_type === 'carousel') ? true : false;
if ($isSlick) {
	$wap_classes[] = "qsd-slick-wrapper";
}

$base_url = $base_url ?? null;
$paged = $paged ?? null;

$wap_classes = join(' ', array_filter($wap_classes));
$ajax_filter = $ajax_filter ?? false;
if (!empty($base_url)) {
	$ajax_filter = true;
}
?>
<?php if ($listings_query->have_posts()): ?>

	<div class="<?php echo esc_attr($wap_classes); ?> qsd-prodcut-grid-list-main" <?php if ($isSlick && !$ajax_filter): ?>
		data-settings='<?php echo esc_attr($carousel_settings); ?>' ; <?php endif; ?>>
		<?php
		while ($listings_query->have_posts()) :
			$listings_query->the_post();
			do_action('adqs_listing_loop_start', get_the_ID());

			if ($isSlick):
		?>
				<div class="adqs-slick-item-col">
				<?php
			endif;
			adqs_get_template_part('content', 'listing');
			if ($isSlick):
				?>
				</div>
		<?php
			endif;
			do_action('adqs_listing_loop_end', get_the_ID());
		endwhile;
		?>
	</div>
	<?php if ($isSlick): ?>
		<div class="adqs-buttons">
			<button class="adqs-global-slick-button-prev adqs-slick-prev-<?php echo esc_attr($uniqId); ?>" type="button">
				<span>
					<svg width="13" height="10" viewBox="0 0 13 10" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5.25 9L1.5 5.25M1.5 5.25L5.25 1.5M1.5 5.25L11.5 5.25" stroke="currentColor" stroke-width="1.5"
							stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</span>
			</button>
			<div class="adqs-global-slick-pagination adqs-slick-pagination-<?php echo esc_attr($uniqId); ?>"></div>
			<button class="adqs-global-slick-button-next adqs-slick-next-<?php echo esc_attr($uniqId); ?>" type="button">
				<span>
					<svg width="13" height="10" viewBox="0 0 13 10" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.75 9L11.5 5.25M11.5 5.25L7.75 1.5M11.5 5.25L1.5 5.25" stroke="currentColor"
							stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
					</svg>

				</span>
			</button>
		</div>
	<?php endif; ?>
<?php
	if ($pagination_type === 'pagination') {
		if ($ajax_filter) {
			adqs_post_pagination($listings_query, $base_url, $paged);
		} else {
			adqs_post_pagination($listings_query);
		}
	}

	wp_reset_postdata();
else:
	adqs_get_template_part('content', 'none');

endif;
