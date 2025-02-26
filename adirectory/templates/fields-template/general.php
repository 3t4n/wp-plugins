<?php

/**
 * This template is for add listing gernal information
 * @since 1.00
 */

extract($args);


$cats = !empty(get_the_terms($post_id, 'adqs_category')) ? wp_list_pluck(get_the_terms($post_id, 'adqs_category'), 'term_id') : array();
$locations_terms = !empty(get_the_terms($post_id, 'adqs_location')) ? wp_list_pluck(get_the_terms($post_id, 'adqs_location'), 'term_id') : [];


if ($ispricing) {

	if ($pricing_active === "self") {
		$order_id = $_GET['adqs_order'] ?? 0;
		$pricing = adp_get_query_order((int)$order_id, 'pricing_id');
		$exist_cat = adp_get_query_pricing_meta($pricing->pricing_id, "lm_categories", true);
		$exist_location = adp_get_query_pricing_meta($pricing->pricing_id, "lm_locations", true);
	} else {
		$order_id = $_GET['adqs_order'] ?? 0;
		$pricing = adp_wc_get_query_order((int)$order_id);

		$exist_cat = adp_wc_get_query_pricing_meta($pricing, "lm_categories", true);
		$exist_location = adp_wc_get_query_pricing_meta($pricing, "lm_locations", true);
	}
}

?>

<div class="adqs-section-wrapper">
	<div class="adqs-section-head-title">
		<h3><?php echo __('General Section', 'adirectory'); ?></h3>
	</div>
	<div class="adqs-section-body">
		<div class="single-field-wrapper">
			<h4 class="qsd-form-label">
				<?php echo __('Title', 'adirectory'); ?> </h4>
			<input type="text" value="<?php echo $post_id ? esc_attr__(get_the_title($post_id), 'adirectory') : ''; ?>"
				name="post_title" class="adqs-title-input" />
		</div>
		<div class="single-field-wrapper">
			<div class="adqs-form-inner">
				<h4 class="qsd-form-label">
					<?php echo __('Description', 'adirectory'); ?> </h4>
				<?php

				$content = $post_id ? get_the_content('', '', $post_id) : '';
				$editor_id = 'post_content';
				$settings = array(
					'media_buttons' => true,
					'textarea_rows' => 10,
					'teeny' => false,
					'quicktags' => true,
				);
				wp_editor($content, $editor_id, $settings);

				?>
			</div>
		</div>

		<?php
		if ($ispricing && $exist_cat) : ?>
			<div class="single-field-wrapper">
				<div class="adqs-form-inner">
					<h4 class="qsd-form-label">
						<?php echo __('Category', 'adirectory'); ?>
					</h4>
					<div class="qsd-ad-search-tax">
						<?php do_action('adqs_ad_search_tax'); ?>
					</div>
					<?php

					$defaultOptions = array(
						'has_input'     => true,
						'has_directory' => true,
						'directory_id'  => $directory_type ? absint($directory_type) : 0,
						'has_children'  => true,
					);

					?>
					<div class="adqs-checkbox-item">
						<ul>
							<?php
							adqs_render_tax_lists(
								array('taxonomy' => 'adqs_category'),
								array_merge($defaultOptions, array('saved_data' => AD()->Helper->get_pluck_terms($post_id, 'adqs_category', 'term_id')))
							);
							?>
						</ul>
					</div>




				</div>
			</div>
		<?php endif;
		?>

		<?php
		if ($ispricing && $exist_location) : ?>
			<div class="single-field-wrapper">
				<div class="adqs-form-inner">
					<h4 class="qsd-form-label">
						<?php echo __('Location', 'adirectory'); ?>
					</h4>
					<div class="qsd-ad-search-tax">
						<?php do_action('adqs_ad_search_tax'); ?>
					</div>

					<?php

					$defaultOptions = array(
						'has_input'     => true,
						'has_directory' => true,
						'directory_id'  => $directory_type ? absint($directory_type) : 0,
						'has_children'  => true,
					);

					?>
					<div class="adqs-checkbox-item">
						<ul>
							<?php
							adqs_render_tax_lists(
								array('taxonomy' => 'adqs_location'),
								array_merge($defaultOptions, array('saved_data' => AD()->Helper->get_pluck_terms($post_id, 'adqs_location', 'term_id')))
							);
							?>
						</ul>
					</div>

				</div>
			</div>
		<?php endif;
		?>


		<?php
		if (!$ispricing) : ?>
			<div class="single-field-wrapper">
				<div class="adqs-form-inner">
					<h4 class="qsd-form-label">
						<?php echo __('Category', 'adirectory'); ?>
					</h4>
					<div class="qsd-ad-search-tax">
						<?php do_action('adqs_ad_search_tax'); ?>
					</div>
					<?php

					$defaultOptions = array(
						'has_input'     => true,
						'has_directory' => true,
						'directory_id'  => $directory_type ? absint($directory_type) : 0,
						'has_children'  => true,
					);

					?>
					<div class="adqs-checkbox-item">
						<ul>
							<?php
							adqs_render_tax_lists(
								array('taxonomy' => 'adqs_category'),
								array_merge($defaultOptions, array('saved_data' => AD()->Helper->get_pluck_terms($post_id, 'adqs_category', 'term_id')))
							);
							?>
						</ul>
					</div>
				</div>
			</div>

			<div class="single-field-wrapper">
				<div class="adqs-form-inner">
					<h4 class="qsd-form-label">
						<?php echo __('Location', 'adirectory'); ?>
					</h4>
					<div class="qsd-ad-search-tax">
						<?php do_action('adqs_ad_search_tax'); ?>
					</div>
					<?php
					$defaultOptions = array(
						'has_input'     => true,
						'has_directory' => true,
						'directory_id'  => $directory_type ? absint($directory_type) : 0,
						'has_children'  => true,
					);

					?>
					<div class="adqs-checkbox-item">
						<ul>
							<?php
							adqs_render_tax_lists(
								array('taxonomy' => 'adqs_location'),
								array_merge($defaultOptions, array('saved_data' => AD()->Helper->get_pluck_terms($post_id, 'adqs_location', 'term_id')))
							);
							?>
						</ul>
					</div>


				</div>
			</div>
		<?php endif;

		?>


	</div>
</div>