<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://catchplugins.com/plugins/ajax-autosearch
 * @since      1.0.0
 *
 * @package    Ajax_AutoSearch
 * @subpackage Ajax_AutoSearch/admin/partials
 */

?>

<div id="ajax-autosearch">
	<div class="content-wrapper">
		<div class="header">
			<h2><?php esc_html_e( 'Settings', 'ajax-autosearch' ); ?></h2>
		</div> <!-- .Header -->
		<?php /** Main Option Section **/ ?>
		<div class="content">
			<div id="main">
				<div class="option-container">
					<form method="post" action="options.php">
						<?php settings_fields( 'ajax-autosearch-group' ); ?>
						<?php
							$defaults = ajax_autosearch_default_options();
							$settings = ajax_autosearch_get_options();
						?>
						<table class="form-table" bgcolor="white">
							<tbody>
								<tr>
									<th scope="row"><?php _e( 'Enable Post Filter', 'ajax-autosearch' ); ?>
									</th>
									<td>
										<?php
											$text = ( ! empty( $settings['enable_post_filter'] ) && $settings['enable_post_filter'] ) ? 'checked' : '';
											echo '<input type="checkbox" ' . $text . ' name="ajax_autosearch_options[enable_post_filter]" value="1"/>&nbsp;&nbsp;' . __( 'Check to enable', 'ajax-autosearch' );
										?>
											<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Add inbuilt post types the filter', 'ajax-autosearch' ); ?>"></span>
									</td>
								</tr>

								<tr>
									<th scope="row"><?php esc_html_e( 'Enable Category Filter', 'ajax-autosearch' ); ?></th>
									<td>
										<?php
											$text = ( ! empty( $settings['enable_category_filter'] ) && $settings['enable_category_filter'] ) ? 'checked' : '';
											echo '<input type="checkbox" ' . $text . ' name="ajax_autosearch_options[enable_category_filter]" value="1"/>' . esc_html__( 'Check to enable', 'ajax-autosearch' );
										?>
											<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Add category to the filter', 'ajax-autosearch' ); ?>"></span>
									</td>
								</tr>

								<tr>
									<th scope="row"><?php esc_html_e( 'Enable Tags Filter', 'ajax-autosearch' ); ?></th>
									<td>
										<?php
											$text = ( ! empty( $settings['enable_tags_filter'] ) && $settings['enable_tags_filter'] ) ? 'checked' : '';
												echo '<input type="checkbox" ' . $text . ' name="ajax_autosearch_options[enable_tags_filter]" value="1"/>' . esc_html__( 'Check to enable', 'ajax-autosearch' );
										?>
											<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Add tags to the filter', 'ajax-autosearch' ); ?>"></span>
									</td>
								</tr>

								<tr class="premium-features">
									<th>
										<label><?php esc_html_e( 'Enable Custom Post Type Filter', 'ajax-autosearch' ); ?></label>
									</th>
									<td>
										<?php
											echo '<input disabled="disabled" type="checkbox" name="custom_post_type" value="1"/><label>' . esc_html__( 'Check to enable', 'ajax-autosearch' ) . '</label>';
										?>
										<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Add custom post types to the filter', 'ajax-autosearch' ); ?>"></span>
										<span style="color: red;">
										<?php
											echo sprintf( '<span><a style="color: red;" href="%1$s" target="%2$s">%3$s</a></span>', 'https://catchplugins.com/plugins/ajax-autosearch-pro', '_blank', esc_html__( 'Upgrade to Pro', 'ajax-autosearch' ) );
										?>
									</td>
								</tr>

								<tr>
									<th>
										<label><?php esc_html_e( 'Show Featured Image', 'ajax-autosearch' ); ?></label>
									</th>
									<td>
										<?php
											$text = ( ! empty( $settings['show_featured_image'] ) && $settings['show_featured_image'] ) ? 'checked' : '';
											echo '<input type="checkbox" ' . $text . ' name="ajax_autosearch_options[show_featured_image]" value="1"/>' . esc_html__( 'Check to enable', 'ajax-autosearch' );
										?>
										<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Show featured images in filter results', 'ajax-autosearch' ); ?>"></span>
									</td>
								</tr>

								<tr>
									<th>
										<label><?php esc_html_e( 'Post Limit', 'ajax-autosearch' ); ?></label>
									</th>
									<td>
										<?php echo '<input type="number" ' . $text . ' name="ajax_autosearch_options[limit]" value="' . $settings['limit'] . '" min="1" max="20"/>'; ?>
											<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Set the limit of your filter results. Default is 10. Max is 20.', 'ajax-autosearch' ); ?>"></span>
									</td>
								</tr>

								<tr class="premium-features">
									<th>
										<label><?php esc_html_e( 'Layout Options', 'ajax-autosearch' ); ?></label>
									</th>
									<td>
										<?php
											echo '<input disabled="disabled" type="radio" name="layout" value="default"/><label>' . esc_html__( 'Default', 'ajax-autosearch' ) . '</label>&nbsp;';
											echo '<input checked="checked" disabled="disabled" type="radio" name="layout" value="grid-layout"/><label>' . esc_html__( 'Grid', 'ajax-autosearch' ) . '</label>&nbsp;';
											echo '<input disabled="disabled" type="radio" name="layout" value="horizontal-layout"/><label>' . esc_html__( 'Horizontal', 'ajax-autosearch' ) . '</label>&nbsp;';
										?>
											<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Change layout of how the search result displays', 'ajax-autosearch' ); ?>"></span>
										<?php
											echo sprintf( '<span><a style="color: red;" href="%1$s" target="%2$s">%3$s</a></span>', 'https://catchplugins.com/plugins/ajax-autosearch-pro', '_blank', esc_html__( 'Upgrade to Pro', 'ajax-autosearch' ) );
										?>
									</td>
								</tr>
								<tr class="premium-features">
									<th>
										<label><?php echo esc_html__( 'Select Columns', 'ajax-autosearch' ); ?></label>
									</th>
									<td>
										<select disabled="disabled" name="columns" id="ajax_autosearch_options[column]">
											<?php
												$column = array(
													'two-column'   => esc_html__( 'Two Column', 'ajax-autosearch' ),
													'three-column' => esc_html__( 'Three Column', 'ajax-autosearch' ),
													'four-column'  => esc_html__( 'Four Column', 'ajax-autosearch' ),
												);
												foreach ( $column as $k => $value ) {
													echo '<option value="' . $k . '">' . $value . '</option>';
												}
												?>
										</select>
										<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Change column layout for Grid layout', 'ajax-autosearch' ); ?>"></span>
										<?php
											echo sprintf( '<span><a style="color: red;" href="%1$s" target="%2$s">%3$s</a></span>', 'https://catchplugins.com/plugins/ajax-autosearch-pro', '_blank', esc_html__( 'Upgrade to Pro', 'ajax-autosearch' ) );
										?>
									</td>
								</tr>
							</tbody>
						</table>
						<?php submit_button( esc_html__( 'Save Changes', 'ajax-autosearch' ) ); ?>
					</form>
				</div><!-- .option-container -->
			</div><!-- main -->
		</div><!-- .content -->
	</div>
</div><!---ajax-autosearch-->
