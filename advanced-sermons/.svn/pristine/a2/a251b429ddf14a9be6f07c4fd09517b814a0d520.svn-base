<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Design page content
add_action( 'asp_settings_content', 'asp_render_design_page' );
function asp_render_design_page() {
global $asp_active_tab;
    if ( 'design' != $asp_active_tab )
    return;
?>

    <h3><?php _e( 'Design Settings', 'advanced-sermons' ); ?></h3>
    <p class="asp-settings-desc">Design settings allows you to customize the branding of Advanced Sermons to match your current theme.</p>

    <form action="options.php" method="post">

        <?php
            settings_fields('asp-design-settings');
            do_settings_sections( 'asp-design-settings' );
        ?>

            <!-- Design option section -->

            <div class="asp-inner-wrapper">

            <div class="asp-form-message"><?php settings_errors('asp-notices'); ?></div>

            <table class="form-table">
            <tbody>

                  <tr class="asp-title-holder">
                  <td>
                  <h2 class="asp-inner-title"><?php _e( 'Color', 'advanced-sermons' ); ?></h2>
                  </td>
                  </tr>

                      <tr class="asp-pro-version">
                      <th><?php _e( 'Accent Color', 'advanced-sermons' ); ?></th>
                      <td><input type="text" placeholder="" class="color-field" name="asp_design_accent" value="<?php echo esc_attr( get_option('asp_design_accent') ?: '#17242a'); ?>" size="50" />
                      <p>
                      Choose a personalized accent color to match your church's branding.
                      </p>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Page Background Color', 'advanced-sermons' ); ?></th>
                      <td><input type="text" placeholder="" class="color-field" name="asp_design_body_color" value="<?php echo esc_attr( get_option('asp_design_body_color') ?: '#ffffff'); ?>" size="50" />
                      <p>
                      Choose a custom page background color for sermon archive and single sermon templates.
                      </p>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Element Background Color', 'advanced-sermons' ); ?></th>
                      <td><input type="text" placeholder="" class="color-field" name="asp_design_element_background" value="<?php echo esc_attr( get_option('asp_design_element_background') ?: '#f8f8f8'); ?>" size="50" />
                      <p>
                      Choose a custom background color for elements like the filter criteria box, series details, and bible passage. Default: #f8f8f8.
                      </p>
                      </td>
                      </tr>

                  <tr class="asp-title-holder">
                  <td>
                  <h2 class="asp-inner-title"><?php _e( 'Title', 'advanced-sermons' ); ?></h2>
                  </td>
                  </tr>

                      <tr>
                      <th><?php _e( 'Hide Title Area', 'advanced-sermons' ); ?></th>
                      <td>
                      <label class="asp-switch"><input type="checkbox" name="asp_design_disable_sermon_title" value="none"<?php checked( 'none', get_option( 'asp_design_disable_sermon_title' ) ); ?> /><span class="asp-slider round"></span></label>Hide
                      <p>Master Switch to remove the Advanced Sermons title area from all ASP page layouts. Default unchecked.</p>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Title Text', 'advanced-sermons' ); ?>
                      <p>Define style for title text</p>
                      </th>
                      <td>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_heading_h1_color" value="<?php echo esc_attr( get_option('asp_design_heading_h1_color') ); ?>" size="50" />
                      <p>Text Color</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_heading_h1_size" value="<?php echo esc_attr( get_option('asp_design_heading_h1_size') ); ?>" size="9" />
                      <p>Font Size (px)</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_heading_h1_height" value="<?php echo esc_attr( get_option('asp_design_heading_h1_height') ); ?>" size="9" />
                      <p>Line Height (px)</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_heading_h1_weight" value="<?php echo esc_attr( get_option('asp_design_heading_h1_weight') ); ?>" size="9" />
                      <p>Font Weight</p>
                      </div>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Title Padding', 'advanced-sermons' ); ?></th>
                      <td><input class="input-short" type="text" placeholder="" name="asp_design_title_padding" value="<?php echo esc_attr( get_option('asp_design_title_padding') ?: '10px' ); ?>" size="5" />
                      <p>
                      Change the title text padding top and bottom px or %. Default 10px.
                      </p>
                      </td>
                      </tr>

				              <tr>
                			<th><?php _e( 'Title Overlay Opacity', 'advanced-sermons' ); ?><p>
                      Color defined by accent color
                      </p></th>
                			<td><input class="input-short" type="text" placeholder="" name="asp_design_title_overlay_opacity" value="<?php echo esc_attr( get_option('asp_design_title_overlay_opacity') ?: '0.6' ); ?>" size="5" />
                			<p>
                			Change the title image overlay opacity. The title overlay color is controlled by the accent color. Default 0.6.
                			</p>
                			</td>
                			</tr>

                      <tr>
                      <th><?php _e( 'Disable Background Image', 'advanced-sermons' ); ?><p>
                      Display accent color instead of title background image
                      </p></th>
                			<td>
                			<label class="asp-switch"><input type="checkbox" name="asp_design_disable_sermon_title_image" value="asp_design_disable_sermon_title_image"<?php checked( 'asp_design_disable_sermon_title_image', get_option( 'asp_design_disable_sermon_title_image' ) ); ?> /><span class="asp-slider round"></span></label>Enable
                      <p>Enable to disable the title background image and display the accent color instead. Default unchecked.</p>
                			</td>
                			</tr>

                			<tr>
                			<th><?php _e( 'Default Background Image', 'advanced-sermons' ); ?></th>
                			<td>
                			<div>
                			<label for="image_url">Image URL</label>
                			<input type="text" name="asp_design_sermon_image" id="image_url" value="<?php echo esc_attr( get_option('asp_design_sermon_image') ); ?>" class="regular-text">
                			<input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
                			</div>
                			<p>
                			Set default title background image.
                			</p>
                			</td>
                			</tr>

                      <tr class="asp-pro-version">
                      <th><?php _e( 'Always Default Background Image', 'advanced-sermons' ); ?>
                      <p>Show default background image instead of sermon images</p></th>
                      <td>
                      <label class="asp-switch"><input type="checkbox" name="asp_design_hide_featured_image" value="asp_design_hide_featured_image"<?php checked( 'asp_design_hide_featured_image', get_option( 'asp_design_hide_featured_image' ) ); ?> /><span class="asp-slider round"></span></label>Enable
                      <p>Enable to display the default title background image on the single sermon page instead of the sermon image. Default unchecked.</p>
                      </td>
                      </tr>

                      <tr class="asp-title-holder">
                      <td>
                      <h2 class="asp-inner-title"><?php _e( 'Archive Fonts', 'advanced-sermons' ); ?></h2>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Title', 'advanced-sermons' ); ?>
                      <p>Define style for archive sermon title text</p>
                      </th>
                      <td>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_archive_title_color" value="<?php echo esc_attr( get_option('asp_design_archive_title_color') ); ?>" size="50" />
                      <p>Text Color</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_archive_title_size" value="<?php echo esc_attr( get_option('asp_design_archive_title_size') ); ?>" size="9" />
                      <p>Font Size (px)</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_archive_title_height" value="<?php echo esc_attr( get_option('asp_design_archive_title_height') ); ?>" size="9" />
                      <p>Line Height (px)</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_archive_title_weight" value="<?php echo esc_attr( get_option('asp_design_archive_title_weight') ); ?>" size="9" />
                      <p>Font Weight</p>
                      </div>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Details', 'advanced-sermons' ); ?>
                      <p>Define style for archive sermon details</p>
                      </th>
                      <td>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_archive_details_color" value="<?php echo esc_attr( get_option('asp_design_archive_details_color') ); ?>" size="50" />
                      <p>Text Color</p>
                      </div>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_archive_details_link_color" value="<?php echo esc_attr( get_option('asp_design_archive_details_link_color') ); ?>" size="50" />
                      <p>Link Color</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_archive_details_size" value="<?php echo esc_attr( get_option('asp_design_archive_details_size') ); ?>" size="9" />
                      <p>Font Size (px)</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_archive_details_height" value="<?php echo esc_attr( get_option('asp_design_archive_details_height') ); ?>" size="9" />
                      <p>Line Height (px)</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_archive_details_weight" value="<?php echo esc_attr( get_option('asp_design_archive_details_weight') ); ?>" size="9" />
                      <p>Font Weight</p>
                      </div>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Excerpt Text', 'advanced-sermons' ); ?>
                      <p>Define style for sermon excerpt text</p>
                      </th>
                      <td>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_excerpt_color" value="<?php echo esc_attr( get_option('asp_design_excerpt_color') ); ?>" size="50" />
                      <p>Text Color</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_excerpt_size" value="<?php echo esc_attr( get_option('asp_design_excerpt_size') ); ?>" size="9" />
                      <p>Font Size (px)</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_excerpt_height" value="<?php echo esc_attr( get_option('asp_design_excerpt_height') ); ?>" size="9" />
                      <p>Line Height (px)</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_excerpt_weight" value="<?php echo esc_attr( get_option('asp_design_excerpt_weight') ); ?>" size="9" />
                      <p>Font Weight</p>
                      </div>
                      </td>
                      </tr>

                  <tr class="asp-title-holder">
                  <td>
                  <h2 class="asp-inner-title"><?php _e( 'Single Sermon Fonts', 'advanced-sermons' ); ?></h2>
                  </td>
                  </tr>

                      <tr>
                      <th><?php _e( 'Title', 'advanced-sermons' ); ?>
                      <p>Define style for sermon title text</p>
                      </th>
                      <td>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_sermon_title_color" value="<?php echo esc_attr( get_option('asp_design_sermon_title_color') ); ?>" size="50" />
                      <p>Text Color</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_sermon_title_size" value="<?php echo esc_attr( get_option('asp_design_sermon_title_size') ); ?>" size="9" />
                      <p>Font Size (px)</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_sermon_title_height" value="<?php echo esc_attr( get_option('asp_design_sermon_title_height') ); ?>" size="9" />
                      <p>Line Height (px)</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_sermon_title_weight" value="<?php echo esc_attr( get_option('asp_design_sermon_title_weight') ); ?>" size="9" />
                      <p>Font Weight</p>
                      </div>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Details', 'advanced-sermons' ); ?>
                      <p>Define style for sermon details</p>
                      </th>
                      <td>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_sermon_details_text_color" value="<?php echo esc_attr( get_option('asp_design_sermon_details_text_color') ); ?>" size="50" />
                      <p>Text Color</p>
                      </div>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_sermon_details_link_color" value="<?php echo esc_attr( get_option('asp_design_sermon_details_link_color') ); ?>" size="50" />
                      <p>Link Color</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_sermon_details_size" value="<?php echo esc_attr( get_option('asp_design_sermon_details_size') ); ?>" size="9" />
                      <p>Font Size (px)</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_sermon_details_height" value="<?php echo esc_attr( get_option('asp_design_sermon_details_height') ); ?>" size="9" />
                      <p>Line Height (px)</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_sermon_details_weight" value="<?php echo esc_attr( get_option('asp_design_sermon_details_weight') ); ?>" size="9" />
                      <p>Font Weight</p>
                      </div>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Paragraph', 'advanced-sermons' ); ?>
                      <p>Define style for sermon paragraph text</p>
                      </th>
                      <td>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_sermon_paragraph_color" value="<?php echo esc_attr( get_option('asp_design_sermon_paragraph_color') ); ?>" size="50" />
                      <p>Text Color</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_sermon_paragraph_size" value="<?php echo esc_attr( get_option('asp_design_sermon_paragraph_size') ); ?>" size="9" />
                      <p>Font Size (px)</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_sermon_paragraph_height" value="<?php echo esc_attr( get_option('asp_design_sermon_paragraph_height') ); ?>" size="9" />
                      <p>Line Height (px)</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_sermon_paragraph_weight" value="<?php echo esc_attr( get_option('asp_design_sermon_paragraph_weight') ); ?>" size="9" />
                      <p>Font Weight</p>
                      </div>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Media Box Holder', 'advanced-sermons' ); ?>
                      <p>Define style for media box holder text</p>
                      </th>
                      <td>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_sermon_details_color" value="<?php echo esc_attr( get_option('asp_design_sermon_details_color') ); ?>" size="50" />
                      <p>Text Color</p>
                      </div>

                  <tr class="asp-title-holder">
                  <td>
                  <h2 class="asp-inner-title"><?php _e( 'Filter Bar', 'advanced-sermons' ); ?></h2>
                  </td>
                  </tr>

                      <tr class="asp-inline-option-multiple">
                      <th><?php _e( 'Dropdown', 'advanced-sermons' ); ?>
                      <p>Define style for the filter dropdown displayed on the archive page</p>
                      </th>
                      <td>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_filter_dropdown_text_color" value="<?php echo esc_attr( get_option('asp_design_filter_dropdown_text_color') ); ?>" size="50" />
                      <p>Text Color</p>
                      </div>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_filter_dropdown_text_color_hover" value="<?php echo esc_attr( get_option('asp_design_filter_dropdown_text_color_hover') ); ?>" size="50" />
                      <p>Hover Color</p>
                      </div>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_filter_dropdown_border" value="<?php echo esc_attr( get_option('asp_design_filter_dropdown_border') ); ?>" size="50" />
                      <p>Border Color</p>
                      </div>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_filter_dropdown_border_hover" value="<?php echo esc_attr( get_option('asp_design_filter_dropdown_border_hover') ); ?>" size="50" />
                      <p>Hover Border Color</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_filter_dropdown_border_width" value="<?php echo esc_attr( get_option('asp_design_filter_dropdown_border_width') ); ?>" size="9" />
                      <p>Border Width (px)</p>
                      </div>
                      </td>
                      </tr>

                  <tr class="asp-title-holder">
                  <td>
                  <h2 class="asp-inner-title"><?php _e( 'Pagination & Load More Button', 'advanced-sermons' ); ?></h2>
                  </td>
                  </tr>

                      <tr>
                      <th><?php _e( 'Text', 'advanced-sermons' ); ?>
                      <p>Define style for the pagination button text displayed on the archive page</p>
                      </th>
                      <td>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_pagination_text_color" value="<?php echo esc_attr( get_option('asp_design_pagination_text_color') ); ?>" size="50" />
                      <p>Text Color</p>
                      </div>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_pagination_text_color_hover" value="<?php echo esc_attr( get_option('asp_design_pagination_text_color_hover') ); ?>" size="50" />
                      <p>Hover Color</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_pagination_text_size" value="<?php echo esc_attr( get_option('asp_design_pagination_text_size') ); ?>" size="9" />
                      <p>Font Size (px)</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_pagination_text_height" value="<?php echo esc_attr( get_option('asp_design_pagination_text_height') ); ?>" size="9" />
                      <p>Line Height (px)</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_pagination_text_weight" value="<?php echo esc_attr( get_option('asp_design_pagination_text_weight') ); ?>" size="9" />
                      <p>Font Weight</p>
                      </div>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_pagination_text_padding" value="<?php echo esc_attr( get_option('asp_design_pagination_text_padding') ); ?>" size="9" />
                      <p>Padding Left/Right (px)</p>
                      </div>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Button', 'advanced-sermons' ); ?>
                      <p>Define style for the pagination button color displayed on the archive page</p>
                      </th>
                      <td>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_pagination_background" value="<?php echo esc_attr( get_option('asp_design_pagination_background') ); ?>" size="50" />
                      <p>Background Color</p>
                      </div>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_pagination_background_hover" value="<?php echo esc_attr( get_option('asp_design_pagination_background_hover') ); ?>" size="50" />
                      <p>Hover Background Color</p>
                      </div>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_pagination_border" value="<?php echo esc_attr( get_option('asp_design_pagination_border') ); ?>" size="50" />
                      <p>Border Color</p>
                      </div>
                      <div class="asp-inline-option">
                      <input type="text" placeholder="" class="color-field" name="asp_design_pagination_border_hover" value="<?php echo esc_attr( get_option('asp_design_pagination_border_hover') ); ?>" size="50" />
                      <p>Hover Border Color</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_pagination_border_width" value="<?php echo esc_attr( get_option('asp_design_pagination_border_width') ); ?>" size="9" />
                      <p>Border Width (px)</p>
                      </div>
                      <div class="asp-inline-option input-short">
                      <input type="number" placeholder="" name="asp_design_pagination_border_radius" value="<?php echo esc_attr( get_option('asp_design_pagination_border_radius') ); ?>" size="9" />
                      <p>Border Radius (px)</p>
                      </div>
                      </td>
                      </tr>

                  <tr class="asp-title-holder">
                  <td>
                  <h2 class="asp-inner-title"><?php _e( 'Thumbnails & Images', 'advanced-sermons' ); ?></h2>
                  </td>
                  </tr>

                      <tr class="asp-pro-version">
                      <th><?php _e( 'Sermon Aspect Ratio', 'advanced-sermons' ); ?></th>
                      <td><select name="asp_design_sermon_image_aspect_ratio">
                      <option value="default" <?php selected(get_option('asp_design_sermon_image_aspect_ratio'), "default"); ?>>16:9</option>
                      <option value="75%" <?php selected(get_option('asp_design_sermon_image_aspect_ratio'), "75%"); ?>>4:3</option>
                      <option value="66.66%" <?php selected(get_option('asp_design_sermon_image_aspect_ratio'), "66.66%"); ?>>3:2</option>
                      <option value="62.5%" <?php selected(get_option('asp_design_sermon_image_aspect_ratio'), "62.5%"); ?>>16:10</option>
                      <option value="100%" <?php selected(get_option('asp_design_sermon_image_aspect_ratio'), "100%"); ?>>1:1</option>
                      </select>
                      <p>
                      Change the aspect ratio for the sermon featured image. <strong>Does not apply to list view layout</strong>. Default 16:9.
                      </p>
                      </td>
                      </tr>

                      <tr class="asp-pro-version">
                      <th><?php _e( 'Series Aspect Ratio', 'advanced-sermons' ); ?></th>
                      <td><select name="asp_design_series_image_aspect_ratio">
                      <option value="default" <?php selected(get_option('asp_design_series_image_aspect_ratio'), "default"); ?>>16:9</option>
                      <option value="75%" <?php selected(get_option('asp_design_series_image_aspect_ratio'), "75%"); ?>>4:3</option>
                      <option value="66.66%" <?php selected(get_option('asp_design_series_image_aspect_ratio'), "66.66%"); ?>>3:2</option>
                      <option value="62.5%" <?php selected(get_option('asp_design_series_image_aspect_ratio'), "62.5%"); ?>>16:10</option>
                      <option value="100%" <?php selected(get_option('asp_design_series_image_aspect_ratio'), "100%"); ?>>1:1</option>
                      </select>
                      <p>
                      Change the aspect ratio for the series featured image. Default 16:9.
                      </p>
                      </td>
                      </tr>

                  <tr class="asp-title-holder">
                  <td>
                  <h2 class="asp-inner-title"><?php _e( 'Advanced Settings', 'advanced-sermons' ); ?></h2>
                  </td>
                  </tr>

                      <tr>
                      <th><?php _e( 'Custom CSS', 'advanced-sermons' ); ?>
                      <p>Enter your custom frontend CSS here.</p>
                      </th>
                      <td><textarea rows="14" cols="100" type="textarea" placeholder="" name="asp_design_custom_css" value="<?php echo esc_attr( get_option('asp_design_custom_css') ); ?>" /><?php echo esc_attr( get_option('asp_design_custom_css') ); ?></textarea>
                      <p>In case if you need to overwrite any CSS, you can add !important at the end of the CSS property. eg: color: #da2234!important;</p>
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
