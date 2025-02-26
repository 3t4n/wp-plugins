<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Design page content
add_action( 'asp_settings_content', 'asp_render_language_page' );
function asp_render_language_page() {
global $asp_active_tab;
    if ( 'language' != $asp_active_tab )
    return;
?>

    <h3><?php _e( 'Language Settings', 'advanced-sermons' ); ?></h3>
    <p class="asp-settings-desc">Language settings allows you to customize Advanced Sermons default text for the following options below.</p>

    <form action="options.php" method="post">

        <?php
            settings_fields('asp-language-settings');
            do_settings_sections( 'asp-language-settings' );
        ?>

            <!-- Design option section -->

            <div class="asp-inner-wrapper">

            <div class="asp-form-message"><?php settings_errors('asp-notices'); ?></div>

            <table class="form-table">
            <tbody>

                <tr class="asp-title-holder">
                <td>
                <h2 class="asp-inner-title"><?php _e( 'Archive', 'advanced-sermons' ); ?></h2>
                </td>
                </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Archive Page Title', 'advanced-sermons' ); ?><p>Customize the main archive title</p></th>
                    <td><input type="text" placeholder="" name="asp_language_archive_title" value="<?php echo esc_attr( get_option('asp_language_archive_title') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Keyword', 'advanced-sermons' ); ?><p>Customize the search bar keyword placeholder text</p></th>
                    <td><input type="text" placeholder="" name="asp_language_search_keyword_placeholder" value="<?php echo esc_attr( get_option('asp_language_search_keyword_placeholder') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Newest', 'advanced-sermons' ); ?><p>Customize the order newest dropdown placeholder text</p></th>
                    <td><input type="text" placeholder="" name="asp_language_order_newest_placeholder" value="<?php echo esc_attr( get_option('asp_language_order_newest_placeholder') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Oldest', 'advanced-sermons' ); ?><p>Customize the order oldest dropdown placeholder text</p></th>
                    <td><input type="text" placeholder="" name="asp_language_order_oldest_placeholder" value="<?php echo esc_attr( get_option('asp_language_order_oldest_placeholder') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Date Range', 'advanced-sermons' ); ?><p>Customize the date range filter text</p></th>
                    <td><input type="text" placeholder="" name="asp_language_date_range_placeholder" value="<?php echo esc_attr( get_option('asp_language_date_range_placeholder') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Clear', 'advanced-sermons' ); ?><p>Customize the criteria box clear button</p></th>
                    <td><input type="text" placeholder="" name="asp_language_filter_clear_all" value="<?php echo esc_attr( get_option('asp_language_filter_clear_all') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'View Sermon', 'advanced-sermons' ); ?><p>Customize the list view button. Must have sermon layout list view enabled.</p></th>
                    <td><input type="text" placeholder="" name="asp_language_list_button" value="<?php echo esc_attr( get_option('asp_language_list_button') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Load More', 'advanced-sermons' ); ?><p>Customize the pagination load more button</p></th>
                    <td><input type="text" placeholder="" name="asp_language_load_more_button" value="<?php echo esc_attr( get_option('asp_language_load_more_button') ); ?>" size="50" />
                    </td>
                    </tr>

                <tr class="asp-title-holder">
                <td>
                <h2 class="asp-inner-title"><?php _e( 'Single Sermon', 'advanced-sermons' ); ?></h2>
                </td>
                </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'All Sermons', 'advanced-sermons' ); ?><p>Customize the archive button</p></th>
                    <td><input type="text" placeholder="" name="asp_language_archive_button" value="<?php echo esc_attr( get_option('asp_language_archive_button') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Listen to Sermon', 'advanced-sermons' ); ?><p>Customize the audio player heading</p></th>
                    <td><input type="text" placeholder="" name="asp_language_audio_player_heading" value="<?php echo esc_attr( get_option('asp_language_audio_player_heading') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Scripture', 'advanced-sermons' ); ?><p>Customize scripture label</p></th>
                    <td><input type="text" placeholder="" name="asp_language_bible_passage" value="<?php echo esc_attr( get_option('asp_language_bible_passage') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Notes', 'advanced-sermons' ); ?><p>Customize sermon details notes</p></th>
                    <td><input type="text" placeholder="" name="asp_language_sermon_details_download" value="<?php echo esc_attr( get_option('asp_language_sermon_details_download') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Bulletin', 'advanced-sermons' ); ?><p>Customize sermon details bulletin</p></th>
                    <td><input type="text" placeholder="" name="asp_language_sermon_details_bulletin" value="<?php echo esc_attr( get_option('asp_language_sermon_details_bulletin') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Audio', 'advanced-sermons' ); ?><p>Customize sermon details audio</p></th>
                    <td><input type="text" placeholder="" name="asp_language_sermon_details_listen" value="<?php echo esc_attr( get_option('asp_language_sermon_details_listen') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Soundcloud', 'advanced-sermons' ); ?><p>Customize sermon details Soundcloud</p></th>
                    <td><input type="text" placeholder="" name="asp_language_sermon_details_soundcloud" value="<?php echo esc_attr( get_option('asp_language_sermon_details_soundcloud') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Listen', 'advanced-sermons' ); ?><p>Customize the listen tooltip text</p></th>
                    <td><input type="text" placeholder="" name="asp_language_listen_tooltip" value="<?php echo esc_attr( get_option('asp_language_listen_tooltip') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Download', 'advanced-sermons' ); ?><p>Customize the download tooltip text</p></th>
                    <td><input type="text" placeholder="" name="asp_language_download_tooltip" value="<?php echo esc_attr( get_option('asp_language_download_tooltip') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Share this Sermon', 'advanced-sermons' ); ?><p>Customize the share sermon heading</p></th>
                    <td><input type="text" placeholder="" name="asp_language_share_sermon" value="<?php echo esc_attr( get_option('asp_language_share_sermon') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Previous', 'advanced-sermons' ); ?><p>Customize the navigation previous label</p></th>
                    <td><input type="text" placeholder="" name="asp_language_navigation_previous" value="<?php echo esc_attr( get_option('asp_language_navigation_previous') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Next', 'advanced-sermons' ); ?><p>Customize the navigation next label</p></th>
                    <td><input type="text" placeholder="" name="asp_language_navigation_next" value="<?php echo esc_attr( get_option('asp_language_navigation_next') ); ?>" size="50" />
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'More from Series', 'advanced-sermons' ); ?><p>Customize the related sermons heading</p></th>
                    <td><input type="text" placeholder="" name="asp_language_related_sermons" value="<?php echo esc_attr( get_option('asp_language_related_sermons') ); ?>" size="50" />
                    </td>
                    </tr>

                <!-- Only allow saving if Advanced Sermons Pro is active -->
                <?php if ( is_plugin_active('advanced-sermons-pro/advanced-sermons-pro.php') ) { ?>
              			<tr class="asp-float-option">
              			<th class="asp-save-section dashboard">
              			<?php submit_button(); ?>
              			</th>
              			</tr>
                <?php } ?>

    			  </tbody>
            </table>
            </div>
      </form>
<?php }
