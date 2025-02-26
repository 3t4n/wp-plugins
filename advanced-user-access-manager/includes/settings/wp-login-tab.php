<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="login_page_tab">
    <div id="tabs">
        <ul>
            <li><a href="#general_settings"><?php esc_html_e( 'Basic Settings', 'advanced-user-access-manager' ); ?></a></li>
            <li><a href="#form_logo"><?php esc_html_e( 'Logo', 'advanced-user-access-manager' ); ?></a></li>
            <li><a href="#form_settings"><?php esc_html_e( 'Form Style', 'advanced-user-access-manager' ); ?></a></li>
            <li><a href="#background_settings"><?php esc_html_e( 'Body Background', 'advanced-user-access-manager' ); ?></a></li>
        </ul>
        <div class="tab-contents">
            <div id="general_settings">
                <table class="form-table">
                    <tbody>
                        <tr valign="top">
                                <th scope="row">
                                    <?php esc_html_e( 'Enable redirect', 'advanced-user-access-manager' ); ?>
                                </th>
                                <td class="login_form_radio_field">
                                    <label>
                                        <input type="radio" name="auam_setting_field_[advance_rd_lform]" value="yes" <?php echo ( 'yes' === $settings['advance_rd_lform'] ? 'checked' : '' ); ?>>
                                        <span><?php esc_html_e( 'Yes', 'advanced-user-access-manager' ); ?></span>
                                    </label><br>
                                    <label>
                                        <input type="radio" name="auam_setting_field_[advance_rd_lform]" value="no" <?php echo ( 'no' === $settings['advance_rd_lform'] ? 'checked' : '' ); ?>>
                                        <span><?php esc_html_e( 'No', 'advanced-user-access-manager' ); ?></span>
                                    </label>
                                </td>
                            </tr>
                            
                            <tr data-rpa-redirect-type="no" valign="top" class="<?php echo ( 'no' === $settings['advance_rd_lform'] ? 'rpa_setting_hidden_item' : '' ); ?>">
                                <th scope="row">
                                    <?php esc_html_e( 'Redirect Login Page', 'advanced-user-access-manager' ); ?>
                                </th>
                                <td>
                                    <select id="selectbox" name="auam_setting_field_[advance_login_form]" class="regular-text">
                                        <option value=""><?php esc_html_e( 'All Page', 'advanced-user-access-manager' ); ?></option>
                                        <?php foreach ( $pages as $page ): ?>
                                            <option value="<?php echo esc_attr( $page->ID ); ?>" <?php selected( $settings['advance_login_form'], $page->ID ); ?>><?php echo esc_html( $page->post_title ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>

                            <tr valign="top" class="">
                                <th scope="row">
                                    <?php esc_html_e( 'Redirect Type', 'advanced-user-access-manager' ); ?>
                                </th>
                                <td class="rpa-redirect-type-choices-login">
                                    <label>
                                        <input type="radio" name="auam_setting_field_[login_redirect_type]" value="page" <?php echo ( 'page' === $settings['login_redirect_type'] ? 'checked' : '' ); ?>>
                                        <span><?php esc_html_e( 'Page', 'advanced-user-access-manager' ); ?></span>
                                    </label><br>
                                    <label>
                                        <input type="radio" name="auam_setting_field_[login_redirect_type]" value="url" <?php echo ( 'url' === $settings['login_redirect_type'] ? 'checked' : '' ); ?>>
                                        <span><?php esc_html_e( 'URL', 'advanced-user-access-manager' ); ?></span>
                                    </label>
                                </td>
                            </tr>
                            <tr valign="top" data-rpa-redirect-type="page" class="<?php echo ( 'page' !== $settings['login_redirect_type'] ? 'rpa_setting_hidden_item' : ''); ?>">
                                <th scope="row">
                                    <label for="all_page_restrict"><?php esc_html_e( 'After Login Redirect Page', 'advanced-user-access-manager' ); ?></label>
                                </th>
                                <td>
                                    <select id="selectbox" name="auam_setting_field_[after_login_redirect]" class="regular-text">
                                        <option value=""><?php esc_html_e( 'Select Page', 'advanced-user-access-manager' ); ?></option>
                                        <?php foreach ( $pages as $page ): ?>
                                            <option value="<?php echo esc_attr( $page->ID ); ?>" <?php selected( $settings['after_login_redirect'], $page->ID ); ?>><?php echo esc_html( $page->post_title ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    
                                </td>
                            </tr>
                            <tr valign="top" data-rpa-redirect-type="url" class="<?php echo ( 'page' === $settings['login_redirect_type'] ? 'rpa_setting_hidden_item' : '' ); ?>">
                                <th scope="row">
                                    <label for="all_page_restrict"><?php esc_html_e( 'After Login Redirect URL', 'advanced-user-access-manager' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="after-login-redirect-url-field" name="auam_setting_field_[after_login_redirect_url]" value="<?php echo esc_attr( $settings['after_login_redirect_url'] ); ?>" />
                                </td>
                            </tr>

                            <tr valign="top" data-rpa-redirect-type="page" class="<?php echo ( 'page' !== $settings['login_redirect_type'] ? 'rpa_setting_hidden_item' : ''); ?>">
                                <th scope="row">
                                    <label for="all_page_restrict"><?php esc_html_e( 'After Logout Redirect Page', 'advanced-user-access-manager' ); ?></label>
                                </th>
                                <td>
                                    <select id="selectbox" name="auam_setting_field_[after_logout_redirect]" class="regular-text">
                                        <option value=""><?php esc_html_e( 'Select Page', 'advanced-user-access-manager' ); ?></option>
                                        <?php foreach ( $pages as $page ): ?>
                                            <option value="<?php echo esc_attr( $page->ID ); ?>" <?php selected( $settings['after_logout_redirect'], $page->ID ); ?>><?php echo esc_html( $page->post_title ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top" data-rpa-redirect-type="url" class="<?php echo ( 'page' === $settings['login_redirect_type'] ? 'rpa_setting_hidden_item' : '' ); ?>">
                                <th scope="row">
                                    <label for="all_page_restrict"><?php esc_html_e( 'After Logout Redirect URL', 'advanced-user-access-manager' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="after-login-redirect-url-field" name="auam_setting_field_[after_logout_redirect_url]" value="<?php echo esc_attr( $settings['after_logout_redirect_url'] ); ?>" />
                                </td>
                            </tr>
                        </tbody>
                </table>
            </div>



            <div id="form_logo">
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row" ><?php esc_html_e('Logo', 'advanced-user-access-manager')?></th>
                            <td>
                                <?php
                                    wp_enqueue_media();
                                    $login_form_logo = get_option( 'auam_login_form_logo', 0 );
                                    
                                ?>
                                <input type="text" class="pro_text" id="logo-image" placeholder="<?php esc_attr_e( 'No media selected!', 'advanced-user-access-manager' )?>" name="upload_image" disabled="disabled"  value="<?php echo esc_url( wp_get_attachment_url( get_option( 'auam_login_form_logo' ) ) ); ?>"/>
                                <input id="logo_image_upload_button" type="button" class="upload_button button" value="<?php esc_html_e( 'Upload image', 'advanced-user-access-manager' ); ?>" />
                                <input type='hidden' name='login_form_logo' id='login_form_logo' value='<?php echo esc_attr( get_option( 'auam_login_form_logo' ) ); ?>'>
                                
                            </td>
                            
                        </tr>
                        <tr>
                            <th scope="row" ></th>
                            <td>
                                <img id='logo_image_preview' src='<?php echo esc_url( wp_get_attachment_url( get_option( 'auam_login_form_logo' ) ) ); ?>' width='200'>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row" ><?php esc_html_e('Login Form Title', 'advanced-user-access-manager' )?></th>
                            <td>
                                <?php
                                    $login_form_title = get_option( 'auam_login_form_title' );
                                    
                                ?>
                                <input type="text" id="login_form_title" placeholder="Login form title" name="login_form_title"  value="<?php echo esc_attr( $login_form_title['login_form_title'] ); ?>"/>
                                
                            </td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>




            <div id="form_settings">
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th><?php esc_html_e( 'Background', 'advanced-user-access-manager' ); ?></th>
                            <td>
                                <?php
                                    $login_form_bg_color = get_option( 'auam_login_form_bg_color' );
                                    
                                ?>
                                <input type="color" id="login_form_bg_color" name="login_form_bg_color" value="<?php echo esc_attr( $login_form_bg_color['login_form_bg_color'] ); ?>">
                            </td>
                        </tr>

                        <tr>
                            <th><?php esc_html_e( 'Text Color', 'advanced-user-access-manager' ); ?></th>
                            <td>
                                <?php
                                    $login_form_text_color = get_option( 'auam_login_form_text_color' );
                                    
                                ?>
                                <input type="color" id="login_form_text_color" name="login_form_text_color" value="<?php echo esc_attr( $login_form_text_color['login_form_text_color'] ); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e( 'Button BgColor', 'advanced-user-access-manager' ); ?></th>
                            <td>
                                <?php
                                    $login_form_btn_bg_color = get_option( 'auam_login_form_btn_bg_color' );
                                    
                                ?>
                                <input type="color" id="login_form_btn_bg_color" name="login_form_btn_bg_color" value="<?php echo esc_attr( $login_form_btn_bg_color['login_form_btn_bg_color'] ); ?>">
                            </td>
                        </tr>

                        <tr>
                            <th><?php esc_html_e( 'Button TextColor', 'advanced-user-access-manager' ); ?></th>
                            <td>
                                <?php
                                    $login_form_btn_text_color = get_option( 'auam_login_form_btn_text_color' );
                                    
                                ?>
                                <input type="color" id="login_form_btn_text_color" name="login_form_btn_text_color" value="<?php echo esc_attr( $login_form_btn_text_color['login_form_btn_text_color'] ); ?>">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="background_settings">
                <table class="form-table">
                    <tbody>
                        <tr valign="top">
                            <th scope="row">
                                <?php esc_html_e( 'Enable BG Image', 'advanced-user-access-manager' ); ?>
                            </th>
                            <td class="enable_choice_bg_image">
                                <label>
                                    <input type="radio" name="auam_setting_field_[enable_bg_image]" value="yes" <?php echo ( 'yes' === $settings['enable_bg_image'] ? 'checked' : '' ); ?>>
                                    <span><?php esc_html_e( 'Yes', 'advanced-user-access-manager' ); ?></span>
                                </label><br>
                                <label>
                                    <input type="radio" name="auam_setting_field_[enable_bg_image]" value="no" <?php echo ( 'no' === $settings['enable_bg_image'] ? 'checked' : '' ); ?>>
                                    <span><?php esc_html_e( 'No', 'advanced-user-access-manager' ); ?></span>
                                </label>
                            </td>
                        </tr>

                        <tr data-rpa-redirect-type="no" class="bg-color <?php echo 'yes' === $settings['enable_bg_image'] ? 'rpa_setting_hidden_item' : ''; ?>">
                            <th><?php esc_html_e( 'Body Background', 'advanced-user-access-manager' ); ?></th>
                            <td>
                                <?php
                                    $login_bg_color = get_option( 'auam_login_bg_color' );
                                    
                                ?>
                                <input type="color" id="login_bg_color" name="login_bg_color" value="<?php echo esc_attr( $login_bg_color['login_bg_color'] ); ?>">
                            </td>
                        </tr>

                        <tr data-rpa-redirect-type="yes" class="bg-image <?php echo 'no' === $settings['enable_bg_image'] ? 'rpa_setting_hidden_item' : ''; ?>">
                            <th scope="row" ><?php esc_html_e('Body Background Image', 'advanced-user-access-manager')?></th>
                            <td>
                                <?php
                                    wp_enqueue_media();
                                    $login_bg_image = get_option( 'auam_login_bg_image', 0 );
                                    
                                ?>
                                <input type="text" class="pro_text" id="bg-image" placeholder="<?php esc_attr_e( 'No media selected!', 'advanced-user-access-manager' )?>" name="upload_image" disabled value="<?php echo esc_url( wp_get_attachment_url( get_option( 'auam_login_bg_image' ) ) ); ?>"/>
                                <input id="bg_image_upload_button" type="button" class="upload_button button" value="<?php esc_html_e( 'Upload image', 'advanced-user-access-manager' ); ?>" />
                                <input type='hidden' name='login_bg_image' id='login_bg_image' value='<?php echo esc_attr( get_option( 'auam_login_bg_image' ) ); ?>'>
                            </td>
                            
                        </tr>

                        <tr data-rpa-redirect-type="yes" class="bg-image <?php echo 'no' === $settings['enable_bg_image'] ? 'rpa_setting_hidden_item' : ''; ?>">
                            <th scope="row" ></th>
                            <td>
                                <img id='bg_image_preview' src='<?php echo esc_url( wp_get_attachment_url( get_option( 'auam_login_bg_image' ) ) ); ?>' width='200'>
                        
                            </td>
                        </tr>
                    </tbody>
                </table>

                <script>
                    jQuery( document ).ready( function( $ ) {
                        // Uploading files
                        var login_logo_file_frame;
                        var body_bg_file_frame;

                        var wp_login_logo_media_post_id = wp.media.model.settings.post.id; // Store the old id
                        var set_login_logo_post_id = <?php echo esc_html( $login_form_logo ); ?>; // Set this

                        var wp_login_bg_image_post_id = wp.media.model.settings.post.id; // Store the old id
                        var set_login_bg_image = <?php echo esc_html( $login_bg_image ); ?>; // Set this

                        
                        jQuery('#logo_image_upload_button').on('click', function(event) {
                            event.preventDefault();

                            if ( login_logo_file_frame ) {
                                // Set the post ID to what we want
                                login_logo_file_frame.uploader.uploader.param( 'post_id', set_login_logo_post_id );
                                // Open frame
                                login_logo_file_frame.open();
                                return;
                            } else {
                                // Set the wp.media post id so the uploader grabs the ID we want when initialised
                                wp.media.model.settings.post.id = set_login_logo_post_id;
                            }

                            // Create the media frame.
                            login_logo_file_frame = wp.media.frames.login_logo_file_frame = wp.media({
                                title: 'Select a image to upload',
                                button: {
                                    text: 'Use this image',
                                },
                                multiple: false
                            });

                            // When an image is selected, run a callback.
                            login_logo_file_frame.on( 'select', function() {
                                attachment = login_logo_file_frame.state().get('selection').first().toJSON();
                                $( '#logo_image_preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
                                $( '#login_form_logo' ).val( attachment.id );
                                wp.media.model.settings.post.id = wp_login_logo_media_post_id;
                            });

                            // Finally, open the modal
                            login_logo_file_frame.open();
                        })
                        

                        jQuery('#bg_image_upload_button').on('click', function(event) {
                            event.preventDefault();

                            if ( body_bg_file_frame ) {
                                // Set the post ID to what we want
                                body_bg_file_frame.uploader.uploader.param( 'post_id', set_login_bg_image );
                                // Open frame
                                body_bg_file_frame.open();
                                return;
                            } else {
                                // Set the wp.media post id so the uploader grabs the ID we want when initialised
                                wp.media.model.settings.post.id = set_login_bg_image;
                            }

                            // Create the media frame.
                            body_bg_file_frame = wp.media.frames.body_bg_file_frame = wp.media({
                                title: 'Select a image to upload',
                                button: {
                                    text: 'Use this image',
                                },
                                multiple: false
                            });

                            // When an image is selected, run a callback.
                            body_bg_file_frame.on( 'select', function() {
                                attachment = body_bg_file_frame.state().get('selection').first().toJSON();
                                $( '#bg_image_preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
                                $( '#login_bg_image' ).val( attachment.id );
                                wp.media.model.settings.post.id = wp_login_bg_image_post_id;
                            });

                            // Finally, open the modal
                            body_bg_file_frame.open();
                        })

                        // Restore the main ID when the add media button is pressed
                        jQuery( 'a.add_media' ).on( 'click', function() {
                            wp.media.model.settings.post.id = wp_login_logo_media_post_id;
                        });

                        // Restore the main ID when the add media button is pressed
                        jQuery( 'a.add_media' ).on( 'click', function() {
                            wp.media.model.settings.post.id = wp_login_bg_image_post_id;
                        });
                        
                    });
                    
                </script>

            </div>
        </div>
    </div>
    
</div>