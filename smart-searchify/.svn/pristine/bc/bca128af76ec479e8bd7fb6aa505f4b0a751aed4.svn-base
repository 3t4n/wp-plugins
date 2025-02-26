<?php
/**
 * Defines all custom field required for generating post filters.
 *
 * @package Jbi
 */
?>
<div class="ss-settings-wrap">
	<input type="hidden" name="cur_post_id" id= "cur_post_id" value="<?php echo esc_attr( $post->ID ); ?>" />
	<div class="global-settings-wrap">
		<div class="fieldset-sec-label"><?php esc_html_e( 'Global Settings', 'smart-searchify' ); ?></div>
		<div class="global-settings" id="global-settings" >
			<div class="form-table" >
				<div class="form-row">
					<div class="coloum-label"><label for="post_filter_type">Post Type</label></div>
					<div class="coloum-info">
						<select name="post_filter_type" id="post_filter_type" >
							<?php foreach ( $all_posts_types as $key => $val ) : ?>
								<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $form_data['post_type'], $key ); ?>><?php echo esc_html( $val ); ?></option>
							<?php endforeach; ?>
						</select>
						<p class="description"><?php esc_html_e( 'Choose a post type from the dropdown to generate a shortcode.', 'smart-searchify' ); ?></p>
					</div>
				</div>
				<div class="form-row">
					<div class="coloum-label"><label for="post_ordering">Post Sorting</label></div>
					<div class="coloum-info">
						<input type="checkbox" name="post_ordering" id="post_ordering" value="1" <?php checked( $form_data['post_ordering'], '1', true ); ?> />Enable Sorting?
						<p class="description"><?php esc_html_e( 'Check this box to enable the sorting dropdown on the landing page. The dropdown will allow users to sort data by publication date in ascending or descending order.', 'smart-searchify' ); ?></p>
					</div>
				</div>
				<div class="form-row">
					<div class="coloum-label"><label for="ajax_filtering">Ajax Filter</label></div>
					<div class="coloum-info">
						<input type="checkbox" name="ajax_filtering" id="ajax_filtering" value="1" <?php checked( $form_data['ajax_filtering'], '1', true ); ?> />Enable Ajax Filter?
						<p class="description"><?php esc_html_e( 'Enable this option to dynamically update the listing data and pagination without refreshing the page.', 'smart-searchify' ); ?></p>
					</div>
				</div>
				<div class="form-row">
					<div class="coloum-label"><label for="submit_btn">Submit Button</label></div>
					<div class="coloum-info">
						<input type="checkbox" name="submit_btn" id="submit_btn" value="1" <?php checked( $form_data['submit_btn'], '1', true ); ?> /> Enable Submit Button?
						<p class="description"><?php esc_html_e( 'Check this box to display a submit button for filters. Filtered data will update only after clicking the submit button.', 'smart-searchify' ); ?></p>
					</div>
				</div>
				<div class="form-row">
					<div class="coloum-label"><label for="layout_rendering">Layout</label></div>
					<div class="coloum-info">
						<select name="layout_rendering" id="layout_rendering" >
							<option value="grid" <?php selected( $form_data['layout_rendering'], 'grid' ); ?>>Grid View</option>
							<option value="list" <?php selected( $form_data['layout_rendering'], 'list' ); ?>>List View</option>
						</select>
						<p class="description"><?php esc_html_e( "Select the layout for the landing page: choose 'Grid View' to display items in a grid format or 'List View' to display them in a vertical list.", 'smart-searchify' ); ?></p>
					</div>
				</div>
				<div class="form-row">
					<div class="coloum-label"><label for="filters_position">Filter Position</label></div>
					<div class="coloum-info">
						<select name="filters_position" id="filters_position" >
							<option value="top" <?php selected( $form_data['filters_position'], 'top' ); ?>>Top</option>
							<option value="left" <?php selected( $form_data['filters_position'], 'left' ); ?>>Left</option>
						</select>
						<p class="description"><?php esc_html_e( "Choose the position of the filter on the landing page: select 'Top' to display the filter at the top, or 'Left' to position it on the left side of the page.", 'smart-searchify' ); ?></p>
					</div>
				</div>
				<div class="form-row">
					<div class="coloum-label"><label for="post_per_page">Item Count</label></div>
					<div class="coloum-info">
						<input type="text" name="post_per_page" id="post_per_page" value="<?php echo esc_attr( $form_data['post_per_page'] ); ?>" />
						<p class="description"><?php esc_html_e( 'Enter the number of items you want to display on the listing page. This will control how many items are shown per page before pagination is applied.', 'smart-searchify' ); ?></p>
					</div>
				</div>
				<div class="form-row">
					<div class="coloum-label"><label for="display_author">Author</label></div>
					<div class="coloum-info">
						<input type="checkbox" name="display_author" id="display_author" value="1" <?php checked( $form_data['display_author'], '1', true ); ?> /> Display author?
						<p class="description"><?php esc_html_e( "Check this box to display the author's name on the landing page alongside the content.", 'smart-searchify' ); ?></p>
					</div>
				</div>
				<div class="form-row">
					<div class="coloum-label"><label for="display_excerpt">Excerpts</label></div>
					<div class="coloum-info">
						<input type="checkbox" name="display_excerpt" id="display_excerpt" value="1" <?php checked( $form_data['display_excerpt'], '1', true ); ?> /> Display Excerpts?
						<p class="description"><?php esc_html_e( 'Check this box to display a short description on the landing page for each listed item.', 'smart-searchify' ); ?></p>
					</div>
				</div>
				<div class="form-row">
					<div class="coloum-label"><label for="display_readmore">Read More</label></div>
					<div class="coloum-info">
						<input type="checkbox" name="display_readmore" id="display_readmore" value="1" <?php checked( $form_data['display_readmore'], '1', true ); ?> /> Display Read More?
						<p class="description"><?php esc_html_e( "Check this box to display a 'Read More' button on the landing page, linking to the detailed page for each item.", 'smart-searchify' ); ?> </p>
					</div>
				</div>
				<div class="form-row">
					<div class="coloum-label"><label for="display_publish_date">Disable Publish Date</label></div>
					<div class="coloum-info">
						<input type="checkbox" name="display_publish_date" id="display_publish_date" value="1" <?php checked( $form_data['display_publish_date'], '1', true ); ?> /> Disable Publish Date?
						<p class="description"><?php esc_html_e( 'Check this box to hide publish date on a landing page.', 'smart-searchify' ); ?> </p>
					</div>
				</div>
			</div> <!-- global settings -->
		</div>
		<div class="post-taxonomies-wrap" id="post-taxonomies-wrap">
			<div class="coloum-label"><label for="post_taxonomies"><?php esc_html_e( 'Taxonomy Settings', 'smart-searchify' ); ?> </label></div>
			<div class="coloum-info"><div id="post_taxonomies"></div></div>
		</div>
		<?php wp_nonce_field( 'smart_searchify_sc_filter', '_jbid_ss_nonce' ); ?>
	</div>
</div>