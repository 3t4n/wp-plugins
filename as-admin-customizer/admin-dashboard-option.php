<?php

    if ( ! defined( 'ABSPATH' ) ) die( 'Error!' );

    //Enqueue the style
    add_action( 'admin_init','andola_script_style');

    function andola_script_style()
    {
        wp_register_style('andola_script-style', plugins_url('assets/css/andola_style.css',__FILE__ ));
        wp_enqueue_style('andola_script-style');

        wp_register_script('andola_script-style', plugins_url('assets/js/andola_admin.js',__FILE__ ));
        wp_enqueue_script('andola_script-style');
    }

    function andola_settings_page() { ?>
        <?php $plugin_url = plugins_url('assets/andolasoft.png', __FILE__); ?>
        <div class="andola_content_wrap">
            <span class="admin_main_header_txt"><?php _e( 'AS Admin Customizer', 'as-admin-customizer' ); ?></span>
            <span class="andola_logo"><a href="https://www.andolasoft.com/" target="_blank"><img src="<?php echo $plugin_url ?>"></a></span>
            <ul class="tabs-nav" id="myTab">
                <li class="tab-active"><a class="andola_tab" href="#tab-1" data-toggle="tab" rel="nofollow">Login Section</a></li>
                <li class=""><a class="andola_tab" data-toggle="tab" href="#tab-2" rel="nofollow">Dashboard Section</a></li>
                <li class=""><a href="#tab-3" data-toggle="tab" class="andola_tab" rel="nofollow">Dashboard Widgets</a></li>
                <li class=""><a href="#tab-4" data-toggle="tab" class="andola_tab" rel="nofollow">Custom CSS</a></li>
                <li class=""><a href="#tab-5" data-toggle="tab" class="andola_tab" rel="nofollow">Custom JS</a></li>
            </ul>


            <div class="tabs-stage">

                <form method="post" action="options.php">
                    <?php settings_fields( 'customize-andolasoft-settings-group' ); ?>
                    <div class="andola_tab_sec" id="tab-1" style="display: block;">
                        <table class="form-table">
                            <tr valign="top">
                                <th class="table_andola_head_sec"><?php _e( 'Customize the Login Section', 'as-admin-customizer' ); ?></th>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php _e( 'Update Your Logo :', 'as-admin-customizer' ); ?></th>
                                <td>
                                    <label for="upload_image">
                                        <input id="andola_image" type="text" size="36" name="andola_logo_file" value="<?php echo esc_url ( get_option( 'andola_logo_file' ) ); ?>" />
                                        <input id="andola_image_button" type="button" value="<?php _e( 'Choose Image', 'as-admin-customizer' ); ?>" class="button" />
                                        <p class="description"><?php _e( 'Enter a URL or upload logo image.', 'as-admin-customizer' ); ?>
                                        </p>
                                    </label>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php _e( 'Update Your Logo Height :', 'as-admin-customizer' ); ?></th>
                                <td>
                                    <label for="upload_image_height">
                                        <input id="upload_image_height" type="text" size="36" name="andola_image_height" value="<?php echo esc_html ( get_option( 'andola_image_height' ) ); ?>" />px
                                        <p class="description"><?php _e( 'Maximum height: 70px', 'as-admin-customizer' ); ?></p>
                                    </label>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php _e( 'Update Your Logo Width :', 'as-admin-customizer' ); ?></th>
                                <td>
                                    <label for="upload_image_width">
                                        <input id="upload_image_width" type="text" size="36" name="andola_image_width" value="<?php echo esc_html ( get_option( 'andola_image_width' ) ); ?>" />px
                                        <p class="description"><?php _e( ' Maximum Width: 310px.', 'as-admin-customizer' ); ?></p>
                                    </label>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php _e( 'Update Your Logo Link :', 'as-admin-customizer' ); ?></th>
                                <td>
                                    <label for="andola_logo_url">
                                        <input type="text" id="andola_logo_url" size="36" name="andola_logo_url" value="<?php echo esc_url ( get_option( 'andola_logo_url' ) ); ?>" />
                                    </label>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php _e( 'Update Your Logo Title :', 'as-admin-customizer' ); ?></th>
                                <td>
                                    <label for="andola_logo_title">
                                        <input type="text" id="andola_logo_title" size="36" name="andola_logo_title" value="<?php echo esc_html ( get_option( 'andola_logo_title' ) ); ?>" />
                                    </label>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php _e( 'Update Your Admin Background Image :', 'as-admin-customizer' ); ?></th>
                                <td>
                                    <label for="upload_image_bck">
                                        <input id="andola_image_bck" type="text" size="36" name="andola_background_file" value="<?php echo esc_url ( get_option( 'andola_background_file' ) ); ?>" />
                                        <input id="andola_image_button_bck" type="button" value="<?php _e( 'Choose Image', 'as-admin-customizer' ); ?>" class="button" />
                                        <p class="description"><?php _e( 'Enter a URL or upload background image. Preferred Size:1400 x 700 pixels', 'as-admin-customizer' ); ?></p>
                                        <p class="description" style="color:red;"><?php _e( 'NOTE * : You can either select a background image or background color, once at a time.', 'as-admin-customizer' ); ?></p>
                                    </label>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php _e( 'Update Your Admin Background Color :', 'as-admin-customizer' ); ?></th>
                                <td>
                                    <label for="andola_login_background_color">
                                        <input type="text" id="andola_login_background_color" class="andola-color-picker" name="andola_login_background_color" value="<?php echo esc_html( get_option( 'andola_login_background_color' ) ); ?>" />
                                        <p class="description"><?php _e( 'Enter the background color hex code.', 'as-admin-customizer' ); ?>
                                        </p>
                                    </label>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php _e( 'Update Your Lost Password Text :', 'as-admin-customizer' ); ?></th>
                                <td>
                                    <label for="andola_lost_password">
                                        <input type="text" id="andola_lost_password" size="36" name="andola_lost_password" value="<?php echo esc_html ( get_option( 'andola_lost_password' ) ); ?>" />
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="andola_tab_sec" id="tab-2" style="display: none;">
                        <table class="form-table">
                            <tr valign="top">
                                <th class="table_andola_head_sec"><?php _e( 'Customize the Dashboard Section', 'as-admin-customizer' ); ?></th>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php _e( 'Update Your Logo :', 'as-admin-customizer' ); ?></th>
                                <td>
                                    <label for="upload_dash_image">
                                        <input id="andola_dash_image" type="text" size="36" name="andola_dashboard_logo_file" value="<?php echo esc_url ( get_option( 'andola_dashboard_logo_file' ) ); ?>" />
                                        <input id="andola_dash_image_button" type="button" value="<?php _e( 'Choose Image', 'as-admin-customizer' ); ?>" class="button" />
                                        <p class="description"><?php _e( 'Enter a URL or upload logo image. Preferred size 16 x 16 pixels', 'as-admin-customizer' ); ?>
                                        </p>
                                    </label>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php _e( 'Update the Howdy Text :', 'as-admin-customizer' ); ?></th>
                                <td>
                                    <label for="andola_dashboard_howdy_text">
                                        <input type="text" id="andola_dashboard_howdy_text" size="36" name="andola_dashboard_howdy_text" value="<?php echo esc_html ( get_option( 'andola_dashboard_howdy_text' ) ); ?>" />
                                    </label>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php _e( 'Update Your Admin Top Bar Color :', 'as-admin-customizer' ); ?></th>
                                <td>
                                    <label for="andola_login_top_color">
                                        <input type="text" id="andola_login_top_color" class="andola-color-picker-top" name="andola_login_top_color" value="<?php echo esc_html( get_option( 'andola_login_top_color' ) ); ?>" />
                                        <p class="description"><?php _e( 'Enter the background color hex code.', 'as-admin-customizer' ); ?>
                                        </p>
                                    </label>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php _e( 'Update Your Admin Sidebar Color :', 'as-admin-customizer' ); ?></th>
                                <td>
                                    <label for="andola_login_side_color">
                                        <input type="text" id="andola_login_side_color" class="andola-color-picker-side" name="andola_login_side_color" value="<?php echo esc_html( get_option( 'andola_login_side_color' ) ); ?>" />
                                        <p class="description"><?php _e( 'Enter the background color hex code.', 'as-admin-customizer' ); ?>
                                        </p>
                                    </label>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php _e( 'Update Your Admin Sidebar Submenu Color :', 'as-admin-customizer' ); ?></th>
                                <td>
                                    <label for="andola_login_side_sub_menu_color">
                                        <input type="text" id="andola_login_side_sub_menu_color" class="andola-color-picker-side-sub-menu" name="andola_login_side_sub_menu_color" value="<?php echo esc_html( get_option( 'andola_login_side_sub_menu_color' ) ); ?>" />
                                        <p class="description"><?php _e( 'Enter the background color hex code.', 'as-admin-customizer' ); ?>
                                        </p>
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="andola_tab_sec" id="tab-3" style="display: none;">
                        <table class="form-table">
                            <tr valign="top">
                                <th class="table_andola_head_sec"><?php _e( 'Remove Widgets from Wordpress Dashboard', 'as-admin-customizer' ); ?></th>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php _e( 'Remove Quick Draft Widget from Wordpress Dashboard', 'as-admin-customizer' ); ?></th>
                                <td>
                                    <label for="andola_remove_dashboard_quick_draft">
                                        <input id="andola_remove_dashboard_quick_draft" type="checkbox" name="andola_remove_dashboard_quick_draft" value="1" <?php checked( '1', get_option( 'andola_remove_dashboard_quick_draft' ) ); ?> /> <?php _e( 'Quick Draft', 'as-admin-customizer' ); ?>
                                        <p class="description"><?php _e( 'Selecting this option removes the Quick Draft dashboard widget.', 'as-admin-customizer' ); ?></p>
                                    </label>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php _e( 'Remove Activity Widget from Wordpress Dashboard', 'as-admin-customizer' ); ?></th>
                                <td>
                                    <label for="andola_remove_dashboard_activity">
                                        <input id="andola_remove_dashboard_activity" type="checkbox" name="andola_remove_dashboard_activity" value="1" <?php checked( '1', get_option( 'andola_remove_dashboard_activity' ) ); ?> /> <?php _e( 'Activity', 'as-admin-customizer' ); ?>
                                        <p class="description"><?php _e( 'Selecting this option removes the Activity dashboard widget.', 'as-admin-customizer' ); ?></p>
                                    </label>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php _e( 'Remove News Widget from Wordpress Dashboard', 'as-admin-customizer' ); ?></th>
                                <td>
                                    <label for="andola_remove_dashboard_news">
                                        <input id="andola_remove_dashboard_news" type="checkbox" name="andola_remove_dashboard_news" value="1" <?php checked( '1', get_option( 'andola_remove_dashboard_news' ) ); ?> /> <?php _e( 'News', 'as-admin-customizer' ); ?>
                                        <p class="description"><?php _e( 'Selecting this option removes the News dashboard widget.', 'as-admin-customizer' ); ?></p>
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="andola_tab_sec" id="tab-4" style="display: none;">
                        <table class="form-table">
                            <tr valign="top">
                                <th class="table_andola_head_sec"><?php _e( 'Custom CSS', 'as-admin-customizer' ); ?></th>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php _e( 'Add Your Custom CSS', 'as-admin-customizer' ); ?></th>
                                <td>
                                    <textarea id="andola_custom_css_field" name="andola_custom_css_field" cols="70" rows="5"><?php echo esc_html( get_option( 'andola_custom_css_field' ) ); ?></textarea>
                                    <p class="description"><?php _e( 'Add your custom CSS here.', 'as-admin-customizer' ); ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="andola_tab_sec" id="tab-5" style="display: none;">
                        <table class="form-table">
                            <tr valign="top">
                                <th class="table_andola_head_sec"><?php _e( 'Custom JS', 'as-admin-customizer' ); ?></th>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php _e( 'Add Your Custom JS', 'as-admin-customizer' ); ?></th>
                                <td>
                                    <textarea id="andola_custom_js_field" name="andola_custom_js_field" cols="70" rows="5"><?php echo esc_html( get_option( 'andola_custom_js_field' ) ); ?></textarea>
                                    <p class="description"><?php _e( 'Add your custom JS here.', 'as-admin-customizer' ); ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'as-admin-customizer' ); ?>" />
                    </p>
                </form>
            </div>
        </div>

    <?php };


// Create custom plugin settings menu and register the settings
    function andola_create_menu() {
        add_submenu_page( 'options-general.php', 'AS Admin Customizer', 'AS Admin Customizer', 'manage_options', 'as-admin-customizer/admin-dashboard-option.php', 'andola_settings_page' );
        add_action( 'admin_init', 'andola_register_settings' );
    }
    add_action( 'admin_menu', 'andola_create_menu' );


// Register the settings
    function andola_register_settings() {
        register_setting( 'customize-andolasoft-settings-group', 'andola_logo_file', 'esc_url_raw' );
        register_setting( 'customize-andolasoft-settings-group', 'andola_image_height', 'andola_sanitisation' );
        register_setting( 'customize-andolasoft-settings-group', 'andola_image_width', 'andola_sanitisation' );
        register_setting( 'customize-andolasoft-settings-group', 'andola_logo_url', 'esc_url_raw' );
        register_setting( 'customize-andolasoft-settings-group', 'andola_logo_title', 'andola_sanitisation' );
        register_setting( 'customize-andolasoft-settings-group', 'andola_background_file', 'esc_url_raw' );
        register_setting( 'customize-andolasoft-settings-group', 'andola_login_background_color', 'andola_sanitize_hex_color' );
        register_setting( 'customize-andolasoft-settings-group', 'andola_lost_password', 'andola_sanitisation' );
        register_setting( 'customize-andolasoft-settings-group', 'andola_dashboard_logo_file', 'esc_url_raw' );
        register_setting( 'customize-andolasoft-settings-group', 'andola_dashboard_howdy_text', 'andola_sanitisation' );
        register_setting( 'customize-andolasoft-settings-group', 'andola_remove_dashboard_quick_draft', 'andola_sanitisation' );
        register_setting( 'customize-andolasoft-settings-group', 'andola_remove_dashboard_activity', 'andola_sanitisation' );
        register_setting( 'customize-andolasoft-settings-group', 'andola_remove_dashboard_news', 'andola_sanitisation' );
        register_setting( 'customize-andolasoft-settings-group', 'andola_custom_css_field', 'andola_css_sanitisation' );
        register_setting( 'customize-andolasoft-settings-group', 'andola_login_top_color', 'andola_sanitize_hex_color' );
        register_setting( 'customize-andolasoft-settings-group', 'andola_login_side_color', 'andola_sanitize_hex_color' );
        register_setting( 'customize-andolasoft-settings-group', 'andola_login_side_sub_menu_color', 'andola_sanitize_hex_color' );
        register_setting( 'customize-andolasoft-settings-group', 'andola_custom_js_field', 'andola_js_sanitisation' );
    }

    function andola_sanitisation ( $input ) {
        $input = sanitize_text_field( $input );
        return $input;
    }

// Only include scripts on specific page
    if ( isset( $_GET['page'] ) && $_GET['page'] == 'as-admin-customizer/admin-dashboard-option.php' ) {
        add_action( 'admin_print_scripts', 'andola_admin_scripts' );
        add_action( 'admin_print_styles', 'andola_admin_styles' );
    }

    function andola_sanitize_hex_color( $color )
    {
        if ( '' === $color )
            return '';

        // 3 or 6 hex digits, or the empty string.
        if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
            return $color;

        return null;
    }

    function andola_css_sanitisation ( $input ) {
        $andola_sanitisation_allowed_html = array();
        $input = wp_kses( $input, $andola_sanitisation_allowed_html );
        return $input;
    }
    function andola_js_sanitisation ( $input ) {
        $andola_sanitisation_allowed_html_new = array();
        $input_js = wp_kses( $input, $andola_sanitisation_allowed_html_new );
        return $input_js;
    }



    function andola_admin_scripts() {

            wp_register_script('andola-color-picker', plugins_url('assets/js/media_upload_background.js',__FILE__ ));
            wp_enqueue_script('andola-color-picker');

            wp_enqueue_script( 'wp-color-picker' );

            wp_enqueue_media();

            wp_register_script('andola-media-upload', plugins_url('assets/js/media_upload.js',__FILE__ ));
            wp_enqueue_script('andola-media-upload');


            wp_register_script('andola-color-picker-top', plugins_url('assets/js/media_upload_top.js',__FILE__ ));
            wp_enqueue_script('andola-color-picker-top');
            wp_enqueue_script( 'wp-color-picker' );


            wp_register_script('andola-color-picker-side', plugins_url('assets/js/media_upload_top.js',__FILE__ ));
            wp_enqueue_script('andola-color-picker-side');
            wp_enqueue_script( 'wp-color-picker' );

            wp_register_script('andola-color-picker-side-sub-menu', plugins_url('assets/js/media_upload_top.js',__FILE__ ));
            wp_enqueue_script('andola-color-picker-side-sub-menu');
            wp_enqueue_script( 'wp-color-picker' );

    }

    function andola_admin_styles() {
        wp_enqueue_style( 'wp-color-picker' );
    }

?>