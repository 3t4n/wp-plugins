<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Design page content
add_action( 'asp_settings_content', 'asp_render_misc_page' );
function asp_render_misc_page() {
global $asp_active_tab;
    if ( 'misc' != $asp_active_tab )
    return;
?>

    <h3><?php _e( 'Misc Settings', 'advanced-sermons' ); ?></h3>
    <p class="asp-settings-desc">Misc settings allows you to customize Advanced Sermons further to your needs. You can also add your own settings using the built in hooks.</p>

    <form action="options.php" method="post">

        <?php
            settings_fields('asp-misc-settings');
            do_settings_sections( 'asp-misc-settings' );
        ?>

            <!-- Design option section -->

            <div class="asp-inner-wrapper">

            <div class="asp-form-message"><?php settings_errors('asp-notices'); ?></div>

            <table class="form-table">
            <tbody>

                <tr class="asp-title-holder">
                <td>
                <h2 class="asp-inner-title"><?php _e( 'Performance', 'advanced-sermons' ); ?></h2>
                </td>
                </tr>

                    <tr>
                    <th><?php _e( 'Font Awesome Icons', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_misc_font_awesome" value="asp_misc_font_awesome"<?php checked( 'asp_misc_font_awesome', get_option( 'asp_misc_font_awesome' ) ); ?> /><span class="asp-slider round"></span></label>Disable
                    <p>If your theme already supports Font Awesome, you can enable this to prevent the Font Awesome assets from being loaded twice. Default unchecked.</p>
                    </td>
                    </tr>

                    <tr>
                    <th><?php _e( 'Facebook Videos', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_misc_facebook_assets" value="asp_misc_facebook_assets"<?php checked( 'asp_misc_facebook_assets', get_option( 'asp_misc_facebook_assets' ) ); ?> /><span class="asp-slider round"></span></label>Disable
                    <p>If you're not utilizing Facebook videos, you can enable this to prevent the required JavaScript assets from being loaded. Default unchecked.</p>
                    </td>
                    </tr>

                    <tr>
                    <th><?php _e( 'Media Player Theme', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_misc_media_player_style_kit" value="asp_misc_media_player_style_kit"<?php checked( 'asp_misc_media_player_style_kit', get_option( 'asp_misc_media_player_style_kit' ) ); ?> /><span class="asp-slider round"></span></label>Disable
                    <p>If you're having issues with your theme and the Advanced Sermons media player style kit, you can enable this to prevent the assests from being loaded. Default unchecked.</p>
                    </td>
                    </tr>

                <tr class="asp-title-holder">
                <td>
                <h2 class="asp-inner-title"><?php _e( 'Hide Meta Fields', 'advanced-sermons' ); ?></h2>
                </td>
                </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'YouTube Video Field', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_misc_youtube_meta" value="asp_misc_youtube_meta"<?php checked( 'asp_misc_youtube_meta', get_option( 'asp_misc_youtube_meta' ) ); ?> /><span class="asp-slider round"></span></label>Hide
                    <p>Switch to hide the YouTube video meta field on the edit sermons page. Default unchecked.</p>
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Vimeo Video Field', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_misc_vimeo_meta" value="asp_misc_vimeo_meta"<?php checked( 'asp_misc_vimeo_meta', get_option( 'asp_misc_vimeo_meta' ) ); ?> /><span class="asp-slider round"></span></label>Hide
                    <p>Switch to hide the Vimeo video meta field on the edit sermons page. Default unchecked.</p>
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Facebook Video Field', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_misc_facebook_meta" value="asp_misc_facebook_meta"<?php checked( 'asp_misc_facebook_meta', get_option( 'asp_misc_facebook_meta' ) ); ?> /><span class="asp-slider round"></span></label>Hide
                    <p>Switch to hide the Facebook video meta field on the edit sermons page. Default unchecked.</p>
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Video Embed Field', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_misc_video_embed_meta" value="asp_misc_video_embed_meta"<?php checked( 'asp_misc_video_embed_meta', get_option( 'asp_misc_video_embed_meta' ) ); ?> /><span class="asp-slider round"></span></label>Hide
                    <p>Switch to hide the Video Embed meta field on the edit sermons page. Default unchecked.</p>
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Audio File Field', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_misc_audio_meta" value="asp_misc_audio_meta"<?php checked( 'asp_misc_audio_meta', get_option( 'asp_misc_audio_meta' ) ); ?> /><span class="asp-slider round"></span></label>Hide
                    <p>Switch to hide the audio meta field on the edit sermons page. Default unchecked.</p>
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Audio Embed Field', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_misc_audio_embed_meta" value="asp_misc_audio_embed_meta"<?php checked( 'asp_misc_audio_embed_meta', get_option( 'asp_misc_audio_embed_meta' ) ); ?> /><span class="asp-slider round"></span></label>Hide
                    <p>Switch to hide the audio embed meta field on the edit sermons page. Default unchecked.</p>
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'SoundCloud Field', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_misc_soundcloud_meta" value="asp_misc_soundcloud_meta"<?php checked( 'asp_misc_soundcloud_meta', get_option( 'asp_misc_soundcloud_meta' ) ); ?> /><span class="asp-slider round"></span></label>Hide
                    <p>Switch to hide the soundcloude meta field on the edit sermons page. Default unchecked.</p>
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                        <th><?php _e( 'Scripture Field', 'advanced-sermons' ); ?></th>
                        <td>
                            <label class="asp-switch"><input type="checkbox" name="asp_misc_passage_meta" value="asp_misc_passage_meta"<?php checked( 'asp_misc_passage_meta', get_option( 'asp_misc_passage_meta' ) ); ?> /><span class="asp-slider round"></span></label>Hide
                            <p>Switch to hide the Scripture meta field on the edit sermons page. Default unchecked.</p>
                        </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Sermon Notes Field', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_misc_pdf_meta" value="asp_misc_pdf_meta"<?php checked( 'asp_misc_pdf_meta', get_option( 'asp_misc_pdf_meta' ) ); ?> /><span class="asp-slider round"></span></label>Hide
                    <p>Switch to hide the sermon notes meta field on the edit sermons page. Default unchecked.</p>
                    </td>
                    </tr>

                    <tr class="asp-pro-version">
                    <th><?php _e( 'Bulletin Field', 'advanced-sermons' ); ?></th>
                    <td>
                    <label class="asp-switch"><input type="checkbox" name="asp_misc_bulletin_meta" value="asp_misc_bulletin_meta"<?php checked( 'asp_misc_bulletin_meta', get_option( 'asp_misc_bulletin_meta' ) ); ?> /><span class="asp-slider round"></span></label>Hide
                    <p>Switch to hide the bulletin meta field on the edit sermons page. Default unchecked.</p>
                    </td>
                    </tr>

                <tr class="asp-title-holder">
                <td>
                <h2 class="asp-inner-title"><?php _e( 'Customization', 'advanced-sermons' ); ?></h2>
                </td>
                </tr>

                    <tr style="padding-top: 0px!important; margin-top: -10px!important; padding-bottom: 13px!important;">
                    <th style="width: 100%!important;"><p>Developers can add their own customization options here. Click here to view our online <a href="https://advancedsermons.com/hooks/" target="_blank" >documentions</a>.</p></th>
                    <td>
                    </td>
                    </tr>

              <?php do_action( 'asp_hook_customization_options_page' ); ?>

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
