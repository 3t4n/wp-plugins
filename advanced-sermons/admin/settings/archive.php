<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Archive page content

add_action( 'asp_settings_content', 'asp_render_archive_page' );
function asp_render_archive_page() {
global $asp_active_tab;
    if ( 'archive' != $asp_active_tab )
    return;

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
?>

    <h3><?php _e( 'Archive Settings', 'advanced-sermons' ); ?></h3>
    <p class="asp-settings-desc"><?php _e('Archive settings allows you to customize the archive page and archive shortcode of Advanced Sermons.', 'advanced-sermons'); ?></p>
    <div class="asp-active-archive-url">
								<p class="asp-active-title">
									  <?php _e('Archive page URL:', 'advanced-sermons'); ?>
                    <a href="<?php echo $asp_archive_slug; ?>" target="_blank">
									    	<?php echo $asp_archive_slug; ?>
									  </a>
								</p>
						</div>

    <form action="options.php" method="post">

        <?php
            settings_fields('asp-archive-settings');
            do_settings_sections( 'asp-archive-settings' );
            $speaker_label = get_option( 'asp_general_speaker_label' );
            $topic_label = get_option( 'asp_general_topic_label' );
            if (!empty($speaker_label)) {
            		$speaker_label = $speaker_label;
            		$speaker_label_lowercase = strtolower($speaker_label);
            } else {
            		$speaker_label = 'Speaker';
            		$speaker_label_lowercase = strtolower("Speaker");
            }
            if (!empty($topic_label)) {
            		$topic_label = $topic_label;
            		$topic_label_lowercase = strtolower("$topic_label");
            } else {
            		$topic_label = 'Topic';
            		$topic_label_lowercase = strtolower("Topic");
            }
        ?>

            <!-- Design option section -->

            <div class="asp-inner-wrapper">

            <div class="asp-form-message"><?php settings_errors('asp-notices'); ?></div>

            <table class="form-table">
            <tbody>

                <tr class="asp-title-holder">
                <td>
                <h2 class="asp-inner-title"><?php _e( 'General Settings', 'advanced-sermons' ); ?></h2>
                </td>
                </tr>

                <tr>
                    <th><?php _e( 'Content Width', 'advanced-sermons' ); ?></th>
                    <td>
                        <select name="asp_archive_sermon_content_width">
                            <?php
                            $archive_width = get_option('asp_archive_sermon_content_width');
                            $single_width = get_option('asp_single_sermon_content_width');

                            // If archive width is empty, use single sermon width as default
                            if(empty($archive_width)) {
                                $archive_width = $single_width;
                            }
                            ?>
                            <option value="1200px" <?php selected($archive_width, "1200px"); ?>>Default Width</option>
                            <option value="1000px" <?php selected($archive_width, "1000px"); ?>>1000px</option>
                            <option value="1100px" <?php selected($archive_width, "1100px"); ?>>1100px</option>
                            <option value="1200px" <?php selected($archive_width, "1200px"); ?>>1200px</option>
                            <option value="1300px" <?php selected($archive_width, "1300px"); ?>>1300px</option>
                            <option value="1400px" <?php selected($archive_width, "1400px"); ?>>1400px</option>
                            <option value="1500px" <?php selected($archive_width, "1500px"); ?>>1500px</option>
                            <option value="auto" <?php selected($archive_width, "auto"); ?>>Full Width</option>
                        </select>
                        <p>
                            Adjust the content width for the sermon archive template. Default 1200px.
                        </p>
                    </td>
                </tr>


                <tr class="asp-pro-version">
                    <th><?php _e( 'Series Details', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_archive_series_details" value="none"<?php checked( 'none', get_option( 'asp_archive_series_details' ) ); ?> /><span class="asp-slider round"></span></label>Enable
                    <p><?php _e('Enable to display series image, title, and description above sermons on the single series page. Default unchecked.', 'advanced-sermons'); ?></p>
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( "$speaker_label Details", "advanced-sermons" ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_archive_speaker_details" value="none"<?php checked( 'none', get_option( 'asp_archive_speaker_details' ) ); ?> /><span class="asp-slider round"></span></label>Enable
                    <p>Enable to display <?php echo $speaker_label_lowercase ?> image, position, name, and description above sermons on the single <?php echo $speaker_label_lowercase ?> page. Default unchecked.</p>
                    </td>
                    </tr>

					          <tr class="asp-pro-version">
                    <th><?php _e( 'Pagination Type', 'advanced-sermons' ); ?></th>
                    <td>
                    <select name="asp_archive_pagination_type">
                        <option value="default" <?php selected(get_option('asp_archive_pagination_type'), "default"); ?>><?php _e('Numeric (Default)', 'advanced-sermons'); ?></option>
                        <option value="load-more" <?php selected(get_option('asp_archive_pagination_type'), "load-more"); ?>><?php _e('Load More Button', 'advanced-sermons'); ?></option>
                        <option value="infinity" <?php selected(get_option('asp_archive_pagination_type'), "infinity"); ?>><?php _e('Infinity Scroll', 'advanced-sermons'); ?></option>
                    </select>
                    <p>
                        <?php _e('Select pagination type for the archive template and archive shortcode. Default Numeric.', 'advanced-sermons'); ?>
                    </p>
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Link Target Control', 'advanced-sermons' ); ?></th>
                    <td><select name="asp_archive_target_control">
                        <option value="_self" <?php selected(get_option('asp_archive_target_control'), "_self"); ?>><?php _e('Same Window', 'advanced-sermons'); ?></option>
                        <option value="_blank" <?php selected(get_option('asp_archive_target_control'), "_blank"); ?>><?php _e('New Tab', 'advanced-sermons'); ?></option>
                    </select>
                    <p>
                        <?php _e('Select for sermons to open in a new tab or same window on the sermon archive page. Default "Same Window".', 'advanced-sermons'); ?>
                    </p>
                    </td>
                    </tr>

                    <tr class="asp-title-holder">
                    <td>
                    <h2 class="asp-inner-title"><?php _e( 'Taxonomy Settings', 'advanced-sermons' ); ?></h2>
                    </td>
                    </tr>

                    <tr>
                    <th><?php _e( 'Taxonomy Orderby', 'advanced-sermons' ); ?>
                    <p><?php _e('Orderby preference for Series, Speakers, Topics, and Books.', 'advanced-sermons'); ?></p>
                    </th>
                    <td>
                    <div class="asp-inline-option">
                    <p style="padding-bottom: 14px;">Series</p>
                      <select name="asp_archive_series_dropdown_orderby" data-taxonomy="series" onchange="aspDisableSortType(event)">
                          <option value="name" <?php selected(get_option('asp_archive_series_dropdown_orderby'), "name"); ?>><?php _e('Title', 'advanced-sermons'); ?></option>
                          <option value="term_id" <?php selected(get_option('asp_archive_series_dropdown_orderby'), "term_id"); ?>>Term ID</option>
                          <option value="custom_order" <?php selected(get_option('asp_archive_series_dropdown_orderby'), "custom_order"); ?>><?php _e('Drag & Drop', 'advanced-sermons'); ?></option>
                      </select>
                    </div>
                    <div class="asp-inline-option">
                    <p style="padding-bottom: 14px;">Speaker</p>
                      <select name="asp_archive_speaker_dropdown_orderby" data-taxonomy="speaker" onchange="aspDisableSortType(event)">
                          <option value="name" <?php selected(get_option('asp_archive_speaker_dropdown_orderby'), "name"); ?>><?php _e('Title', 'advanced-sermons'); ?></option>
                          <option value="term_id" <?php selected(get_option('asp_archive_speaker_dropdown_orderby'), "term_id"); ?>>Term ID</option>
                          <option value="custom_order" <?php selected(get_option('asp_archive_speaker_dropdown_orderby'), "custom_order"); ?>><?php _e('Drag & Drop', 'advanced-sermons'); ?></option>
                      </select>
                    </div>
                    <div class="asp-inline-option">
                    <p style="padding-bottom: 14px;">Topic</p>
                      <select name="asp_archive_topic_dropdown_orderby" data-taxonomy="topic" onchange="aspDisableSortType(event)">
                          <option value="name" <?php selected(get_option('asp_archive_topic_dropdown_orderby'), "name"); ?>><?php _e('Title', 'advanced-sermons'); ?></option>
                          <option value="term_id" <?php selected(get_option('asp_archive_topic_dropdown_orderby'), "term_id"); ?>>Term ID</option>
                          <option value="custom_order" <?php selected(get_option('asp_archive_topic_dropdown_orderby'), "custom_order"); ?>><?php _e('Drag & Drop', 'advanced-sermons'); ?></option>
                      </select>
                    </div>
                    <div class="asp-inline-option">
                    <p style="padding-bottom: 14px;">Book</p>
                      <select name="asp_archive_book_dropdown_orderby" data-taxonomy="book" onchange="aspDisableSortType(event)">
                          <option value="name" <?php selected(get_option('asp_archive_book_dropdown_orderby'), "name"); ?>><?php _e('Title', 'advanced-sermons'); ?></option>
                          <option value="term_id" <?php selected(get_option('asp_archive_book_dropdown_orderby'), "term_id"); ?>>Term ID</option>
                          <option value="custom_order" <?php selected(get_option('asp_archive_book_dropdown_orderby'), "custom_order"); ?>><?php _e('Drag & Drop', 'advanced-sermons'); ?></option>
                      </select>
                    </div>
                    </td>
                    </tr>

                    <tr>
                    <th><?php _e( 'Taxonomy Order', 'advanced-sermons' ); ?>
                    <p><?php _e('Order preference for Series, Speakers, Topics, and Books.', 'advanced-sermons'); ?></p>
                    </th>
                    <td>
                    <div class="asp-inline-option">
                    <p style="padding-bottom: 14px;">Series</p>
                      <select name="asp_archive_series_dropdown_order" <?php echo get_option('asp_archive_series_dropdown_orderby') === 'custom_order' ? 'disabled' : ''; ?>>
                          <option value="ASC" <?php selected(get_option('asp_archive_series_dropdown_order'), "ASC"); ?>><?php _e('Ascend', 'advanced-sermons'); ?></option>
                          <option value="DESC" <?php selected(get_option('asp_archive_series_dropdown_order'), "DESC"); ?>><?php _e('Descend', 'advanced-sermons'); ?></option>
                      </select>
                    </div>
                    <div class="asp-inline-option">
                    <p style="padding-bottom: 14px;">Speaker</p>
                      <select name="asp_archive_speaker_dropdown_order" <?php echo get_option('asp_archive_speaker_dropdown_orderby') === 'custom_order' ? 'disabled' : ''; ?>>
                          <option value="ASC" <?php selected(get_option('asp_archive_speaker_dropdown_order'), "ASC"); ?>><?php _e('Ascend', 'advanced-sermons'); ?></option>
                          <option value="DESC" <?php selected(get_option('asp_archive_speaker_dropdown_order'), "DESC"); ?>><?php _e('Descend', 'advanced-sermons'); ?></option>
                      </select>
                    </div>
                    <div class="asp-inline-option">
                    <p style="padding-bottom: 14px;">Topic</p>
                      <select name="asp_archive_topic_dropdown_order" <?php echo get_option('asp_archive_topic_dropdown_orderby') === 'custom_order' ? 'disabled' : ''; ?>>
                          <option value="ASC" <?php selected(get_option('asp_archive_topic_dropdown_order'), "ASC"); ?>><?php _e('Ascend', 'advanced-sermons'); ?></option>
                          <option value="DESC" <?php selected(get_option('asp_archive_topic_dropdown_order'), "DESC"); ?>><?php _e('Descend', 'advanced-sermons'); ?></option>
                      </select>
                    </div>
                    <div class="asp-inline-option">
                    <p style="padding-bottom: 14px;">Book</p>
                      <select name="asp_archive_book_dropdown_order" <?php echo get_option('asp_archive_book_dropdown_orderby') === 'custom_order' ? 'disabled' : ''; ?>>
                          <option value="ASC" <?php selected(get_option('asp_archive_book_dropdown_order'), "ASC"); ?>><?php _e('Ascend', 'advanced-sermons'); ?></option>
                          <option value="DESC" <?php selected(get_option('asp_archive_book_dropdown_order'), "DESC"); ?>><?php _e('Descend', 'advanced-sermons'); ?></option>
                      </select>
                    </div>
                    </td>
                    </tr>

                    <tr class="asp-title-holder">
                    <td>
                    <h2 class="asp-inner-title"><?php _e( 'Display Options', 'advanced-sermons' ); ?></h2>
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Per Page Count', 'advanced-sermons' ); ?></th>
                    <td><input class="input-short" type="number" placeholder="" name="asp_archive_sermon_count" value="<?php echo esc_attr( get_option('asp_archive_sermon_count') ?: '9' ); ?>" size="5" />
                    <p>
                        <?php _e('The number of sermons you would like to display before pagination is enabled. Default "9".', 'advanced-sermons'); ?>
                    </p>
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Excerpt Length', 'advanced-sermons' ); ?></th>
                    <td><input class="input-short" type="number" placeholder="" name="asp_archive_excerpt_length" value="<?php echo esc_attr( get_option('asp_archive_excerpt_length') ?: '10' ); ?>" size="5" />
                    <p>
                        <?php _e('Enter the number of words to be displayed per sermon in archive and shortcode list.  Default "10".', 'advanced-sermons'); ?>
                    </p>
                        <p>
		                    <?php _e('<strong>Note:</strong> Manual excerpts will override this and display the full excerpt.', 'advanced-sermons'); ?>
                        </p>
                    </td>
                    </tr>

                    <tr>
                    <th><?php _e( 'Read More', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_archive_read_more" value="none"<?php checked( 'none', get_option( 'asp_archive_read_more' ) ); ?> /><span class="asp-slider round"></span></label><?php _e('Disable', 'advanced-sermons'); ?>
                    <p><?php _e('Do not show read more at the end of the short description. Default unchecked.', 'advanced-sermons'); ?></p>
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Scripture', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_archive_scripture" value="none"<?php checked( 'none', get_option( 'asp_archive_scripture' ) ); ?> /><span class="asp-slider round"></span></label>Disable
                    <p>Do not display the sermon scripture on the grid view and list view layouts. Default unchecked.</p>
                    </td>
                    </tr>

                    <tr class="asp-title-holder">
                    <td>
                    <h2 class="asp-inner-title"><?php _e( 'Filter', 'advanced-sermons' ); ?></h2>
                    </td>
                    </tr>

                    <tr>
                    <th><?php _e( 'Filter', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_archive_hide_filtering" value="asp_archive_hide_filtering"<?php checked( 'asp_archive_hide_filtering', get_option( 'asp_archive_hide_filtering' ) ); ?> /><span class="asp-slider round"></span></label>Hide
                    <p><?php _e('Master switch to remove the filter on the archive page. Default unchecked.', 'advanced-sermons'); ?></p>
                    </td>
                    </tr>

                    <tr>
                    <th><?php _e( 'Sermon Count', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_archive_filter_sermon_count" value="none"<?php checked( 'none', get_option( 'asp_archive_filter_sermon_count' ) ); ?> /><span class="asp-slider round"></span></label><?php _e('Disable', 'advanced-sermons'); ?>
                    <p><?php _e('Disable the sermon count from displaying in the filter dropdowns. Default unchecked.', 'advanced-sermons'); ?></p>
                    </td>
                    </tr>

                    <tr>
                    <th><?php _e( 'Criteria Box', 'advanced-sermons' ); ?><p>
                    <?php _e('Section that shows filter criteria after the filter bar', 'advanced-sermons'); ?>
                    </p></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_archive_hide_criteria_box" value="asp_archive_hide_criteria_box"<?php checked( 'asp_archive_hide_criteria_box', get_option( 'asp_archive_hide_criteria_box' ) ); ?> /><span class="asp-slider round"></span></label><?php _e('Hide', 'advanced-sermons'); ?>
                    <p><?php _e('Master switch to remove the criteria box on the archive page. Default unchecked.', 'advanced-sermons'); ?></p>
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                        <th><?php _e( 'Search Field', 'advanced-sermons' ); ?></th>
                        <td>
                            <label class="asp-switch"><input type="checkbox" name="asp_archive_hide_search" value="asp_archive_hide_search"<?php checked( 'asp_archive_hide_search', get_option( 'asp_archive_hide_search' ) ); ?> /><span class="asp-slider round"></span></label><?php _e('Hide', 'advanced-sermons'); ?>
                            <p><?php _e('Remove the search field from the filter bar.', 'advanced-sermons'); ?></p>
                        </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Date Range Picker', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_archive_hide_date_range" value="asp_archive_hide_date_range"<?php checked( 'asp_archive_hide_date_range', get_option( 'asp_archive_hide_date_range' ) ); ?> /><span class="asp-slider round"></span></label><?php _e('Hide', 'advanced-sermons'); ?>
                    <p><?php _e('Remove the date range filter from the filter bar.', 'advanced-sermons'); ?></p>
                    </td>
                    </tr>

				            <tr class="asp-pro-version">
                    <th><?php _e( 'Order Dropdown', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_archive_hide_filter_order" value="asp_archive_hide_filter_order"<?php checked( 'asp_archive_hide_filter_order', get_option( 'asp_archive_hide_filter_order' ) ); ?> /><span class="asp-slider round"></span></label><?php _e('Hide', 'advanced-sermons'); ?>
                    <p><?php _e('Remove the order filter dropdown from the filter bar.', 'advanced-sermons'); ?></p>
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Series Dropdown', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_archive_hide_filter_series" value="asp_archive_hide_filter_series"<?php checked( 'asp_archive_hide_filter_series', get_option( 'asp_archive_hide_filter_series' ) ); ?> /><span class="asp-slider round"></span></label><?php _e('Hide', 'advanced-sermons'); ?>
                    <p><?php _e('Remove the series filter dropdown from the filter bar.', 'advanced-sermons'); ?></p>
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( "{$speaker_label} Dropdown", "advanced-sermons" ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_archive_hide_filter_speaker" value="asp_archive_hide_filter_speaker"<?php checked( 'asp_archive_hide_filter_speaker', get_option( 'asp_archive_hide_filter_speaker' ) ); ?> /><span class="asp-slider round"></span></label><?php _e('Hide', 'advanced-sermons'); ?>
                    <p>Remove the <?php echo "{$speaker_label_lowercase}" ?> filter dropdown from the filter bar.</p>
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( "{$topic_label} Dropdown", "advanced-sermons" ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_archive_hide_filter_topic" value="asp_archive_hide_filter_topic"<?php checked( 'asp_archive_hide_filter_topic', get_option( 'asp_archive_hide_filter_topic' ) ); ?> /><span class="asp-slider round"></span></label><?php _e('Hide', 'advanced-sermons'); ?>
                    <p>Remove the <?php echo "{$topic_label_lowercase}" ?> filter dropdown from the filter bar.</p>
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Book Dropdown', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_archive_hide_filter_book" value="asp_archive_hide_filter_book"<?php checked( 'asp_archive_hide_filter_book', get_option( 'asp_archive_hide_filter_book' ) ); ?> /><span class="asp-slider round"></span></label><?php _e('Hide', 'advanced-sermons'); ?>
                    <p><?php _e('Remove the book filter dropdown from the filter bar.', 'advanced-sermons'); ?></p>
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
