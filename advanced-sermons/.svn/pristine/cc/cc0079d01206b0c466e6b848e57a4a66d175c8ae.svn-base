<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// General page content
add_action( 'asp_settings_content', 'asp_render_general_page' );
function asp_render_general_page() {
global $asp_active_tab;
		if ( '' || 'general' != $asp_active_tab )
		return;
?>

		<h3><?php _e( 'General Settings', 'advanced-sermons' ); ?></h3>

		<form action="options.php" method="post">

				<?php
						settings_fields('asp-general-settings');
						do_settings_sections( 'asp-general-settings' );

						// Get the archive link URL
				    $asp_archive_slug = get_option( 'asp_general_archive_slug' );
					  if ( !empty( $asp_archive_slug ) ) {
						    $asp_archive_slug = $asp_archive_slug;
						    $asp_archive_slug = strtolower("$asp_archive_slug");
					  } else {
						    $asp_archive_slug = 'sermons';
					  }
				    if (get_option('permalink_structure')) {
						    $asp_archive_slug = get_home_url() . "/" . $asp_archive_slug . "/";
					  } else {
						    $asp_archive_slug = get_home_url() . "/?post_type=sermons";
					  }

            $is_pro_active = is_plugin_active('advanced-sermons-pro/advanced-sermons-pro.php');
            if(!$is_pro_active) {
                update_option('asp_general_archive_option','slug');
            }

            $permalink_structure = get_option('permalink_structure');

            ?>

	 					<!-- General option section -->

						<div class="asp-inner-wrapper">
						<p class="asp-settings-desc"><?php _e( 'General settings allows you to customize the Advanced Sermons plugins to match your preferences and needs. If you need assistance you can submit a support ticket', 'advanced-sermons' ) ?> <a href="https://wpcodeus.com/support/" target="_blank"><?php _e('here', 'advanced-sermons'); ?></a></p>
						<div class="asp-active-archive-url">
								<p class="asp-active-title">
									  <?php _e('Archive page URL:', 'advanced-sermons'); ?>
										<a href="<?php echo $asp_archive_slug; ?>" target="_blank">
									    	<?php echo $asp_archive_slug; ?>
									  </a>
								</p>
						</div>

						<div class="asp-form-message"><?php settings_errors('asp-notices'); ?></div>

								<table class="form-table">
								<tbody>

								<tr class="asp-title-holder">
								<td>
								<h2 class="asp-inner-title"><?php _e( 'Customize', 'advanced-sermons' ); ?></h2>
								</td>
								</tr>

										<tr class="asp-archive-permalink-slug">
										<th><?php _e( 'Sermon Archive Slug', 'advanced-sermons' ); ?></th>
										<td><input type="text" placeholder="" name="asp_general_archive_slug" value="<?php echo esc_attr( get_option('asp_general_archive_slug') ?: 'sermons' ); ?>" size="50" <?php echo $permalink_structure !== '/%postname%/' ? 'disabled' : ''; ?> />
										<?php if ($permalink_structure !== '/%postname%/'): ?>
												<p><?php _e('To use slug, pretty permalinks option must be enabled!', 'advanced-sermons'); ?></p>
										<?php endif; ?>
										<p><?php _e('Change the slug of the sermon archive page. For example, by default, all sermons would be located under /sermons/, and a single sermon with slug "god" would be under /sermons/god/.', 'advanced-sermons') ?><br><b>If you change this, please flush your permalinks <a href="/wp-admin/options-permalink.php" target="_blank">here.</a></b></p>
										</td>
										</tr>

										<tr class="asp-pro-version">
										<th><?php _e( 'Sermon Layout', 'advanced-sermons' ); ?></th>
										<td><select name="asp_general_sermon_layout">
												<option value="grid-view" <?php selected(get_option('asp_general_sermon_layout'), "grid-view"); ?>><?php _e('Grid View', 'advanced-sermons'); ?></option>
												<option value="list-view" <?php selected(get_option('asp_general_sermon_layout'), "list-view"); ?>><?php _e('List View', 'advanced-sermons'); ?></option>
										</select>
										<p><?php _e('Customize the sermon layout in which you would like to display your sermons. Default "Grid View".', 'advanced-sermons' ) ?></p>
										</td>
										</tr>

										<tr>
										<th><?php _e( 'Sermon Date Format', 'advanced-sermons' ); ?></th>
										<td><select name="asp_general_date_format">
												<option value="F j, Y" <?php selected(get_option('asp_general_date_format'), "F j, Y"); ?>><?php _e('Month Day, Year', 'advanced-sermons'); ?></option>
												<option value="j F, Y" <?php selected(get_option('asp_general_date_format'), "j F, Y"); ?>><?php _e('Day, Month Year', 'advanced-sermons'); ?></option>
												<option value="F/j/Y" <?php selected(get_option('asp_general_date_format'), "F/j/Y"); ?>><?php _e('Month/Day/Year', 'advanced-sermons'); ?></option>
												<option value="j/F/Y" <?php selected(get_option('asp_general_date_format'), "j/F/Y"); ?>><?php _e('Day/Month/Year', 'advanced-sermons'); ?></option>
												<option value="F-j-Y" <?php selected(get_option('asp_general_date_format'), "F-j-Y"); ?>><?php _e('Month-Day-Year', 'advanced-sermons'); ?></option>
												<option value="j-F-Y" <?php selected(get_option('asp_general_date_format'), "j-F-Y"); ?>><?php _e('Day-Month-Year', 'advanced-sermons'); ?></option>
												<option value="F j" <?php selected(get_option('asp_general_date_format'), "F j"); ?>><?php _e('Month Day', 'advanced-sermons'); ?></option>
										</select>

										<p><?php _e('Customize the preached date format for sermons. Default "Month Day, Year".', 'advanced-sermons') ?></p>
										</td>
										</tr>
										</td>
										</tr>

										<tr class="asp-pro-version">
										<th><?php _e( 'Sermon Label', 'advanced-sermons' ); ?><p><?php _e('Enter capitalized <strong>nonplural</strong> label', 'advanced-sermons'); ?></p></th>
										<td><input type="text" placeholder="" name="asp_general_sermon_label" value="<?php echo esc_attr( get_option('asp_general_sermon_label') ); ?>" size="50" />
										<p><?php _e('Change the default Sermon label. Example: "Message".', 'advanced-sermons'); ?></p>
										</td>
										</tr>

										<tr class="asp-pro-version">
										<th><?php _e( 'Speaker Label', 'advanced-sermons' ); ?><p>Enter capitalized <strong>nonplural</strong> label</p></th>
										<td><input type="text" placeholder="" name="asp_general_speaker_label" value="<?php echo esc_attr( get_option('asp_general_speaker_label') ); ?>" size="50" />
										<p><?php _e('Change the default Speaker label. Example: "Preacher".', 'advanced-sermons'); ?></p>
										</td>
										</tr>

										<tr class="asp-pro-version">
										<th><?php _e( 'Topic Label', 'advanced-sermons' ); ?><p><?php _e('Enter capitalized <strong>nonplural</strong> label', 'advanced-sermons'); ?></p></th>
										<td><input type="text" placeholder="" name="asp_general_topic_label" value="<?php echo esc_attr( get_option('asp_general_topic_label') ); ?>" size="50" />

										<p><?php _e('Change the default Topic label. Example: "Passage".', 'advanced-sermons'); ?></p>
										</td>
										</tr>

										<tr class="asp-pro-version">
										<th><?php _e( 'Book Label', 'advanced-sermons' ); ?><p><?php _e('Enter capitalized <strong>nonplural</strong> label', 'advanced-sermons'); ?></p></th>
										<td><input type="text" placeholder="" name="asp_general_book_label" value="<?php echo esc_attr( get_option('asp_general_book_label') ); ?>" size="50" />
										<p><?php _e('Change the default Book label. Example: "Service Type".', 'advanced-sermons'); ?></p>
										</td>
										</tr>

										<tr>
										<th><?php _e( 'Auto Pluralization', 'advanced-sermons' ); ?><p><?php _e('Disable pluralization for Sermon, Topic, Speaker, and Book labels.', 'advanced-sermons'); ?></p></th>
										<td>
										<label class="asp-switch"><input type="checkbox" name="asp_general_disable_plural" value="asp_general_disable_plural"<?php checked( 'asp_general_disable_plural', get_option( 'asp_general_disable_plural' ) ); ?> /><span class="asp-slider round"></span></label><?php _e('Disable', 'advanced-sermons'); ?>
										<p><?php _e("Toggle this option on if you're using a foreign language that does not use plural markings. Default unchecked.", "advanced-sermons"); ?></p>
										</td>
										</tr>

                                <tr class="asp-title-holder">
                                    <td>
                                        <h2 class="asp-inner-title"><?php _e( 'WordPress Editor', 'advanced-sermons' ); ?></h2>
                                    </td>
                                </tr>

                                <tr>
                                    <th><?php _e( 'Block Editor', 'advanced-sermons' ); ?></th>
                                    <td>
                                        <label class="asp-switch"><input type="checkbox" name="asp_general_block_editor" value="asp_general_block_editor"<?php checked( 'asp_general_block_editor', get_option( 'asp_general_block_editor' ) ); ?> /><span class="asp-slider round"></span></label><?php _e('Enable', 'advanced-sermons'); ?>
                                        <p><?php _e('Activates the WordPress block editor for sermon content. Classic by default. Note: Third-party plugins may influence this feature.', 'advanced-sermons'); ?></p>
                                    </td>
                                </tr>

								<tr class="asp-title-holder">
								<td>
								<h2 class="asp-inner-title"><?php _e( 'Features', 'advanced-sermons' ); ?></h2>
								</td>
								</tr>

										<tr>
										<th><?php _e( 'Remove Toolbar Menu', 'advanced-sermons' ); ?></th>
										<td>
										<label class="asp-switch"><input type="checkbox" name="asp_general_toolbar_menu" value="asp_general_toolbar_menu"<?php checked( 'asp_general_toolbar_menu', get_option( 'asp_general_toolbar_menu' ) ); ?> /><span class="asp-slider round"></span></label><?php _e('Remove', 'advanced-sermons'); ?>
										<p><?php _e('Remove "Manage Sermons" quick links from the WordPress top toolbar. Default unchecked.', 'advanced-sermons'); ?></p>
										</td>
										</tr>

										<tr>
										<th><?php _e( 'View Count', 'advanced-sermons' ); ?></th>
										<td>
										<label class="asp-switch"><input type="checkbox" name="asp_general_disable_view_count" value="display-view-count"<?php checked( 'display-view-count', get_option( 'asp_general_disable_view_count' ) ); ?> /><span class="asp-slider round"></span></label><?php _e('Enable', 'advanced-sermons'); ?>
										<p><?php _e('Track view counts of sermons to get a better understanding of what your congregation is interested in.', 'advanced-sermons'); ?></p>
										</td>
										</tr>

										<tr class="asp-pro-version">
										<th><?php _e( 'Duplicate Sermons', 'advanced-sermons' ); ?></th>
										<td>
										<label class="asp-switch"><input type="checkbox" name="asp_general_sermon_duplicator" value="enable-duplicator"<?php checked( 'enable-duplicator', get_option( 'asp_general_sermon_duplicator' ) ); ?> /><span class="asp-slider round"></span></label><?php _e('Enable', 'advanced-sermons'); ?>
										<p><?php _e('Duplicate Sermons allows you to duplicate existing sermons to save you time and energy.', 'advanced-sermons'); ?></p>
										</td>
										</tr>

										<tr class="asp-pro-version">
										<th><?php _e( 'Search Results', 'advanced-sermons' ); ?></th>
										<td>
										<label class="asp-switch"><input type="checkbox" name="asp_general_sermon_search" value="enable-search"<?php checked( 'enable-search', get_option( 'asp_general_sermon_search' ) ); ?> /><span class="asp-slider round"></span></label><?php _e('Include', 'advanced-sermons'); ?>
										<p><?php _e('Enable to show sermons in the default WordPress search results.', 'advanced-sermons'); ?></p>
										</td>
										</tr>

										<tr>
										<th><?php _e( 'Page Builders', 'advanced-sermons' ); ?></th>
										<td>
										<p><?php _e('To use Page Builders on sermons you can enabled this feature through the settings of your page builder by enabled it for the custom post type "sermons". Please review your page builders online documentation for instructions.', 'advanced-sermons'); ?></p>
										<p><?php _e('Note: If you use this feature please make sure you fill out the Excerpt for each sermon.', 'advanced-sermons'); ?></p>
										</td>
										</tr>


								<tr class="asp-float-option">
								<th class="asp-save-section dashboard">
								<?php submit_button(); ?>
								</th>
								</tr>

                                </tbody>
								</table>
					 </div>
			</form>
<?php }
