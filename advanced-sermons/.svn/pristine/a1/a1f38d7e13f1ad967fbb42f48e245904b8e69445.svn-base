<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Design page content

add_action( 'asp_settings_content', 'asp_render_single_sermon_page' );
function asp_render_single_sermon_page() {
global $asp_active_tab;
    if ( 'single-sermon' != $asp_active_tab )
    return;
?>

    <h3><?php _e( 'Single Sermon Settings', 'advanced-sermons' ); ?></h3>
    <p class="asp-settings-desc">Single sermon settings allows to customize which features and functionalities you would like to use for your website.</p>

    <form action="options.php" method="post">

        <?php
            settings_fields('asp-single-sermon-settings');
            do_settings_sections( 'asp-single-sermon-settings' );
        ?>

            <!-- Design option section -->

            <div class="asp-inner-wrapper">

            <div class="asp-form-message"><?php settings_errors('asp-notices'); ?></div>

            <table class="form-table">
            <tbody>

              <tr class="asp-title-holder">
              <td>
              <h2 class="asp-inner-title"><?php _e( 'Sermon Settings', 'advanced-sermons' ); ?></h2>
              </td>
              </tr>

              <tr>
                  <th><?php _e( 'Content Width', 'advanced-sermons' ); ?></th>
                  <td>
                      <select name="asp_single_sermon_content_width" id="asp_single_sermon_content_width">
                          <option value="1200px" <?php selected(get_option('asp_single_sermon_content_width'), "1200px"); ?>>Default Width</option>
                          <option value="1000px" <?php selected(get_option('asp_single_sermon_content_width'), "1000px"); ?>>1000px</option>
                          <option value="1100px" <?php selected(get_option('asp_single_sermon_content_width'), "1100px"); ?>>1100px</option>
                          <option value="1200px" <?php selected(get_option('asp_single_sermon_content_width'), "1200px"); ?>>1200px</option>
                          <option value="1300px" <?php selected(get_option('asp_single_sermon_content_width'), "1300px"); ?>>1300px</option>
                          <option value="1400px" <?php selected(get_option('asp_single_sermon_content_width'), "1400px"); ?>>1400px</option>
                          <option value="1500px" <?php selected(get_option('asp_single_sermon_content_width'), "1500px"); ?>>1500px</option>
                          <option value="auto" <?php selected(get_option('asp_single_sermon_content_width'), "auto"); ?>>Full Width</option>
                      </select>

                      <p>Adjust the content width for the single sermon template. Default 1200px.</p>
                  </td>
              </tr>

                  <tr>
                  <th><?php _e( 'Archive Button', 'advanced-sermons' ); ?></th>
                  <td>
                  <label class="asp-switch"><input type="checkbox" name="asp_single_sermon_all_sermons_button" value="disable-comments"<?php checked( 'disable-comments', get_option( 'asp_single_sermon_all_sermons_button' ) ); ?> /><span class="asp-slider round"></span></label>Remove
                  <p>
                  Remove the 'All Sermons' button from the single sermons page.
                  </p>
                  </td>
                  </tr>

                  <tr>
                  <th><?php _e( 'Archive Button URL', 'advanced-sermons' ); ?></th>
                  <td><input type="text" placeholder="custom-slug" name="asp_single_sermon_archive_button_url" value="<?php echo esc_attr( get_option('asp_single_sermon_archive_button_url') ); ?>" size="50" />
                  <p>Change the URL of the 'All Sermons' button for the single sermons page. Example: "browse-sermons". Default archive slug.</b></p>
                  </td>
                  </tr>

                  <tr class="asp-pro-version">
                  <th><?php _e( 'Default Series Image', 'advanced-sermons' ); ?></th>
                  <td>
                  <label class="asp-switch"><input type="checkbox" name="asp_single_sermon_default_series_image" value="none"<?php checked( 'none', get_option( 'asp_single_sermon_default_series_image' ) ); ?> /><span class="asp-slider round"></span></label>Enable
                  <p>If no sermon image is applied, default to series image. Applies to all layouts. Default unchecked.</p>
                  </td>
                  </tr>

                  <tr>
                  <th><?php _e( 'Disable Sermon Image', 'advanced-sermons' ); ?></th>
                  <td>
                  <label class="asp-switch"><input type="checkbox" name="asp_single_sermon_disable_featured_image" value="asp_single_sermon_disable_featured_image"<?php checked( 'asp_single_sermon_disable_featured_image', get_option( 'asp_single_sermon_disable_featured_image' ) ); ?> /><span class="asp-slider round"></span></label>Disable
                  <p>Disable the sermon & series image output on the single sermon view. (Only displays if video is not added to sermon) Default unchecked.</p>
                  </td>
                  </tr>

                  <tr class="asp-title-holder">
                  <td>
                  <h2 class="asp-inner-title"><?php _e( 'Scripture Options', 'advanced-sermons' ); ?></h2>
                  </td>
                  </tr>

                  <tr class="asp-pro-version">
                  <th><?php _e( 'Scripture Link', 'advanced-sermons' ); ?></th>
                  <td>
                  <label class="asp-switch"><input type="checkbox" name="asp_single_sermon_disable_passage_link" value="asp_single_sermon_disable_passage_link"<?php checked( 'asp_single_sermon_disable_passage_link', get_option( 'asp_single_sermon_disable_passage_link' ) ); ?> /><span class="asp-slider round"></span></label>Disable
                  <p>Remove the scripture hyperlink to <a href="https://www.biblegateway.com/" target="_blank">Bible Gateway</a>. (Also affects sermons displayed via shortcodes) Default unchecked.</p>
                  </td>
                  </tr>

                  <tr class="asp-pro-version">
                  <th><?php _e( 'Bible Version and Translation', 'advanced-sermons' ); ?></th>
                  <td><input type="text" placeholder="ESV" name="asp_single_sermon_passage_version" value="<?php echo esc_attr( get_option('asp_single_sermon_passage_version') ); ?>" size="50" />
                  <p>Customize the scripture <a href="https://www.biblegateway.com/" target="_blank">Bible Gateway</a> version. Default: ESV (English Standard Version). </b></p>
                  </td>
                  </tr>


                  <tr class="asp-title-holder">
                  <td>
                  <h2 class="asp-inner-title"><?php _e( 'Template Sections', 'advanced-sermons' ); ?></h2>
                  </td>
                  </tr>

                  <tr>
                  <th><?php _e( 'Comments', 'advanced-sermons' ); ?></th>
                  <td>
                  <label class="asp-switch"><input type="checkbox" name="asp_single_sermon_disable_comments" value="disable-comments"<?php checked( 'disable-comments', get_option( 'asp_single_sermon_disable_comments' ) ); ?> /><span class="asp-slider round"></span></label>Enable
                  <p>
                  Enable comments on the single sermons page.
                  </p>
                  </td>
                  </tr>

                  <tr class="asp-pro-version">
                  <th><?php _e( 'Social Share', 'advanced-sermons' ); ?></th>
                  <td>
                  <label class="asp-switch"><input type="checkbox" name="asp_single_sermon_disable_social_share" value="asp_single_sermon_disable_social_share"<?php checked( 'asp_single_sermon_disable_social_share', get_option( 'asp_single_sermon_disable_social_share' ) ); ?> /><span class="asp-slider round"></span></label>Enable
                  <p>Enable Social Share section from sermon single page. Default unchecked.</p>
                  </td>
                  </tr>

                  <tr class="asp-pro-version">
                  <th><?php _e( 'Navigation', 'advanced-sermons' ); ?></th>
                  <td>
                  <label class="asp-switch"><input type="checkbox" name="asp_single_sermon_enable_navigation" value="asp_single_sermon_enable_navigation"<?php checked( 'asp_single_sermon_enable_navigation', get_option( 'asp_single_sermon_enable_navigation' ) ); ?> /><span class="asp-slider round"></span></label>Enable
                  <p>Enable to add a navigation section with "previous" and "next" buttons, which users can use to navigate through sermons. Default unchecked.</p>
                  </td>
                  </tr>

                  <tr class="asp-pro-version">
                  <th><?php _e( 'Related Sermons', 'advanced-sermons' ); ?></th>
                  <td>
                  <label class="asp-switch"><input type="checkbox" name="asp_single_sermon_related_sermons" value="asp_single_sermon_related_sermons"<?php checked( 'asp_single_sermon_related_sermons', get_option( 'asp_single_sermon_related_sermons' ) ); ?> /><span class="asp-slider round"></span></label>Enable
                  <p>Enable related sermons on single sermon view. Default unchecked.</p>
                  </td>
                  </tr>

                  <tr class="asp-pro-version">
                  <th><?php _e( 'Related Sermons Count', 'advanced-sermons' ); ?></th>
                  <td><input class="input-short" type="number" placeholder="" name="asp_single_sermon_related_sermons_count" value="<?php echo esc_attr( get_option('asp_single_sermon_related_sermons_count') ?: '3' ); ?>" size="5" />
                  <p>
                  The number of related sermons you would like to display. Set '-1' to show all sermons in that series. Default '3'.
                  </p>
                  </td>
                  </tr>

                  <tr class="asp-pro-version">
                  <th><?php _e( 'Sermon Sidebar', 'advanced-sermons' ); ?></th>
                  <td>
                  <label class="asp-switch"><input type="checkbox" name="asp_single_sermon_enable_sidebar" value="enable-sidebar"<?php checked( 'enable-sidebar', get_option( 'asp_single_sermon_enable_sidebar' ) ); ?> /><span class="asp-slider round"></span></label>Enable
                  <p>
                  Enable this if you would like to display a sidebar on the sermon single page. (You can customize the 'Sermon Sidebar' under <a href="/wp-admin/widgets.php" target="_blank">Widgets</a>)
                  </p>
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
