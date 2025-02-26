<?php

namespace SeoThatMatters;
use function SeoThatMatters\plugin_instance;

function register_options() {
    // Translate labels
    $remove_sitemap_label = esc_html__('Remove  %s Sitemap', SEOTM_PREFIX);
    $remove_provider_label = esc_html__('Remove %s Sitemap ', SEOTM_PREFIX);

    // Initialize arrays for sitemap options
    $sitemap_providers = array();
    $sitemap_post_types = array();
    $sitemap_taxonomy_types = array();

    // Add sitemap providers options
    $sitemap_providers['remove_provider_users'] = esc_html__('Remove Users Sitemaps ', SEOTM_PREFIX);
	

    // Get registered post types
    $post_types = get_post_types(array('public' => true), 'objects');
	$filtered_post_types = array();

	// Filter post types based on whether they have associated posts
	foreach ($post_types as $post_type) {
		$post_count = wp_count_posts($post_type->name);
		if ($post_count->publish > 0) {
			$filtered_post_types[] = $post_type;
		}
	}

	// Add filtered post types to your sitemap options
	foreach ($filtered_post_types as $post_type) {
		if (post_type_exists($post_type->name) && $post_type->name !== 'ct_content_block') { // exclude blocksy cpt
			$option_name = 'remove_sitemap_posts_' . $post_type->name;
			$label = sprintf($remove_sitemap_label, ucwords($post_type->label));
			$sitemap_post_types[$option_name] = $label;
		}
	}

    // Get registered taxonomies
    $taxonomies = get_taxonomies( array( 'public' => true ), 'objects' );
	$filtered_taxonomies = array();

	// Filter taxonomies based on whether they have associated terms
	foreach ($taxonomies as $taxonomy) {
		$term_count = wp_count_terms( $taxonomy->name );
		if ($term_count > 0) {
			$filtered_taxonomies[] = $taxonomy;
		}
	}

	// Add filtered taxonomies to your sitemap options
	foreach ($filtered_taxonomies as $taxonomy) {
		$option_name = 'remove_sitemap_taxonomies_' . $taxonomy->name;
		$label = sprintf($remove_sitemap_label, ucwords($taxonomy->label));
		// Check if the taxonomy supports post formats (similar to core logic)
		if ('post_format' === $taxonomy->name && current_theme_supports('post-formats')) {
			$label .= ' ' . esc_html__('(if the current theme supports post formats)', SEOTM_PREFIX);
		}
		$sitemap_taxonomy_types[$option_name] = $label;
	}

    // Return the options as an array
    return array(
        'sitemap_providers' => $sitemap_providers,
        'sitemap_post_types' => $sitemap_post_types,
        'sitemap_taxonomy_types' => $sitemap_taxonomy_types,
    );
}

$options = register_options();

?>

<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-body-header">
	<h2><?php _e('Sitemap', SEOTM_PREFIX) ?></h2>
</div>

<!-- start general sitemap -->
<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group show-hide-group flex-full-width mt-10 pb-0 relative">
	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input pb-0">
		<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light main-toggle show-hide" data-show-hide="1" id="seotm_use_sitemap" name="seotm_use_sitemap" value="1" type="checkbox"
			<?php checked(plugin_field_setting( 'seotm_use_sitemap'), 1, true) ?>/>
		<label class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn" for="seotm_use_sitemap"></label>
		<label class="toggle-label pl-4" for="seotm_use_sitemap">
		<?php _e('WP Sitemap Control', SEOTM_PREFIX) ?>
		</label>
		<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-2">
			<?php _e('Use this plugin to configure/customize WordPress\' built-in sitemap', SEOTM_PREFIX) ?>
		</div>
	</div>
	<div id="" class="show-hide-content padding-left-0 pb-10 mb-0">
		<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help">
			<em><span class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help custom"><?php _e('*Re-save/flush your permalink settings to see immediate change', SEOTM_PREFIX) ?></span></em>
		</div>
		<div class="flex grid-col-2 pt-24 mt-10">
			<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-50">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help">
					<?php _e('If you enable this, the default sitemap index URL will be changed from wp_sitemap.xml to sitemap_index.xml. You can change it by entering a custom url in the field below.', SEOTM_PREFIX) ?>
				</div>
				<div class="custom-header pt-4 pl-1">
					<h2><?php _e('Custom Sitemap URL', SEOTM_PREFIX) ?></h2>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group">
					<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
						<input class="w-100" placeholder="<?php _e( 'your custom sitemap url without .xml extention' ); ?>" type="text" id="seotm_use_sitemap_custom_url" name="seotm_use_sitemap_custom_url" value="<?php echo esc_html(plugin_field_setting('seotm_use_sitemap_custom_url')) ?>">
					</div>
				</div>
				<?php $seotm_options = get_option(SEOTM_PREFIX . '_options'); ?>
                <?php if (isset($seotm_options['seotm_use_sitemap']) && $seotm_options['seotm_use_sitemap']): ?>
				<?php $sitemap_url = esc_html(plugin_field_setting('seotm_use_sitemap_custom_url')); ?>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pl-1"><a href="<?php echo bloginfo('url') . '/' . ($sitemap_url ? $sitemap_url : 'sitemap_index'); ?>.xml" target="_blank">Check your sitemap</a></div>
				<?php endif; ?>
			</div>
			<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-50">
				
				
			</div>
			<!-- start sitemap control -->
			
			<div class="flex grid-col-2 mt-24 flex-full-width">
				<div class="sitemap-control <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group">
					
					<?php
					// Echo sitemap post types options
					foreach ($options['sitemap_post_types'] as $option_name => $post_type_label) {
					$is_checked = plugin_field_setting($option_name) ? 'checked' : '';
						?>
						<div class="sitemap-control-item <?php echo esc_attr(SEOTM_PREFIX); ?>-input pb-0">
							<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light" type="checkbox"  id="<?php echo esc_attr($option_name); ?>" name="<?php echo esc_attr($option_name); ?>" value="1" <?php echo esc_attr($is_checked); ?>>
							<label  class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn"  for="<?php echo esc_attr($option_name); ?>"></label><label  class="toggle-label small"  for="<?php echo esc_attr($option_name); ?>"><?php echo esc_html($post_type_label); ?></label>
						</div>
					<?php } ?>
					
					<?php
					// Echo sitemap taxonomy types options
					foreach ($options['sitemap_taxonomy_types'] as $option_name => $taxonomy_label) {
       				$is_checked = plugin_field_setting($option_name) ? 'checked' : '';
						?>
						<div class="sitemap-control-item <?php echo esc_attr(SEOTM_PREFIX); ?>-input pb-0">
							<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light" type="checkbox"  id="<?php echo esc_attr($option_name); ?>" name="<?php echo esc_attr($option_name); ?>" value="1" <?php echo esc_attr($is_checked); ?>>
							<label  class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn"  for="<?php echo esc_attr($option_name); ?>"></label><label  class="toggle-label small"  for="<?php echo esc_attr($option_name); ?>"><?php echo esc_html($taxonomy_label); ?></label>
						</div>
					<?php } ?>
					
					<?php
					// Echo sitemap providers options
					foreach ($options['sitemap_providers'] as $option_name => $provider_label) {
						$is_checked = plugin_field_setting($option_name) ? 'checked' : '';
						?>
						<div class="sitemap-control-item <?php echo esc_attr(SEOTM_PREFIX); ?>-input pb-0">
							<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light" type="checkbox"  id="<?php echo esc_attr($option_name); ?>" name="<?php echo esc_attr($option_name); ?>" value="1" <?php echo esc_attr($is_checked); ?>>
							<label  class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn"  for="<?php echo esc_attr($option_name); ?>"></label><label  class="toggle-label small"  for="<?php echo esc_attr($option_name); ?>"><?php echo esc_html($provider_label); ?></label>
						</div>
					<?php } ?>
					
					<div class="sitemap-control-item <?php echo esc_attr(SEOTM_PREFIX); ?>-input pb-0">
							<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light" id="seotm_use_sitemap_add_last_mod" value="1" name="seotm_use_sitemap_add_last_mod" <?php checked(plugin_field_setting('seotm_use_sitemap_add_last_mod'), 1, true) ?> type="checkbox"/>
		<label class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn" for="seotm_use_sitemap_add_last_mod"></label><label class="toggle-label small" for="seotm_use_sitemap_add_last_mod"><?php _e('Add Last Modification Date'); ?></label> 
					</div>
					
					<div class="sitemap-control-item <?php echo esc_attr(SEOTM_PREFIX); ?>-input pb-0">
							<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light" id="seotm_use_sitemap_add_media" value="1" name="seotm_use_sitemap_add_media" <?php checked(plugin_field_setting('seotm_use_sitemap_add_media'), 1, true) ?> type="checkbox"/>
		<label class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn" for="seotm_use_sitemap_add_media"></label><label class="toggle-label small" for="seotm_use_sitemap_add_media"><?php _e('Add Image and Video to sitemap'); ?></label> 
					</div>
					
					
					<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-8" style="max-width:270px">
						<em><span class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help custom"><?php _e('Note: you will be able to remove each entries individually from each entries edit screen', SEOTM_PREFIX) ?></span></em>
					</div>
				</div>
			</div>
			
			<!-- end sitemap control -->
		</div>
		<!-- end flex grid container -->
	</div>
	<!-- end show-hide-content -->
</div>
<!-- end general sitemap -->