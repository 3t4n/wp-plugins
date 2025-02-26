<?php
    /** Get the plugin settings */
    $settings = $s = get_option( 'cyberslider_settings' );
?>
<div class="wrap">
    <div id="icon-edit" class="icon32 icon32-posts-post"><br></div>
    <h2><?php _e( 'Edit Settings', 'cyberslider' ); ?></h2>
    <form name="post" action="admin.php?page=cyberslider_edit_settings" method="post">
        <?php

            /** Security nonce fields */
            wp_nonce_field( "cyberslider-save_{$_GET['page']}", "cyberslider-save_{$_GET['page']}", false );
            wp_nonce_field( "cyberslider-reset_{$_GET['page']}", "cyberslider-reset_{$_GET['page']}", false );

            /** Before actions */
            do_action( 'cyberslider_settings_before', $s, $_GET['page'] );

        ?>
        <div class="main-panel">
            <h3><?php _e( 'General Settings', 'cyberslider' ); ?></h3>
            <table class="form-table main-settings">
                <tbody>
                    <tr valign="top">
                        <th scope="row"><label for="resizing"><?php _e( 'Image Resizing', 'cyberslider' ); ?></label></th>
                        <td>
                            <label for="resizing_true">
                                <input type="radio" name="settings[resizing]" id="resizing_true" value="true" <?php checked( $s['resizing'], true ); ?>><span><?php _e( 'Enable', 'cyberslider' ); ?></span>
                            </label>
                            <label for="resizing_false">
                                <input type="radio" name="settings[resizing]" id="resizing_false" value="false" <?php checked( $s['resizing'], false ); ?>><span><?php _e( 'Disable', 'cyberslider' ); ?></span>
                            </label>
                            <p class="description"><?php _e( 'Enable or disable the plugins image resizing functionality. Disable this if you do not want the slide images to be resized.', 'cyberslider' ); ?></p>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="load_scripts"><?php _e( 'Output JS', 'cyberslider' ); ?></label></th>
                        <td>
                            <label for="load_scripts_header">
                                <input type="radio" name="settings[load_scripts]" id="load_scripts_header" value="header" <?php checked( $s['load_scripts'], 'header' ); ?>><span><?php _e( 'Header', 'cyberslider' ); ?></span>
                            </label>
                            <label for="load_scripts_footer">
                                <input type="radio" name="settings[load_scripts]" id="load_scripts_footer" value="footer" <?php checked( $s['load_scripts'], 'footer' ); ?>><span><?php _e( 'Footer', 'cyberslider' ); ?></span>
                            </label>
                            <label for="load_scripts_off">
                                <input type="radio" name="settings[load_scripts]" id="load_scripts_off" value="false" <?php checked( $s['load_scripts'], false ); ?>><span><?php _e( 'Off', 'cyberslider' ); ?></span>
                            </label>
                            <p class="description"><?php _e( 'Settings for Javascript output. Scripts loaded in the "Footer" are only when they are needed. This decreases page loading times but is prone to errors.', 'cyberslider' ); ?></p>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="load_styles"><?php _e( 'Output CSS', 'cyberslider' ); ?></label></th>
                        <td>
                            <label for="load_styles_header">
                                <input type="radio" name="settings[load_styles]" id="load_styles_header" value="header" <?php checked( $s['load_styles'], 'header' ); ?>><span><?php _e( 'Header', 'cyberslider' ); ?></span>
                            </label>
                            <label for="load_styles_footer">
                                <input type="radio" name="settings[load_styles]" id="load_styles_footer" value="footer" <?php checked( $s['load_styles'], 'footer' ); ?>><span><?php _e( 'Footer', 'cyberslider' ); ?></span>
                            </label>
                            <label for="load_styles_off">
                                <input type="radio" name="settings[load_styles]" id="load_styles_off" value="false" <?php checked( $s['load_styles'], false ); ?>><span><?php _e( 'Off', 'cyberslider' ); ?></span>
                            </label>
                            <p class="description"><?php _e( 'Settings for CSS output. Styles loaded in the "Footer" will invalidate the HTML, but will prevent them from loading when not needed.', 'cyberslider' ); ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="divider"></div>

            <h3><?php _e( 'Reset Plugin', 'cyberslider' ); ?></h3>
            <table class="form-table main-settings">
                <tbody>
                    <tr valign="top">
                        <th scope="row"><label for="reset"><?php _e( 'Plugin Settings', 'cyberslider' ); ?></label></th>
                        <td>
                            <input type="submit" name="reset" class="button button-secondary warn" value="<?php _e( 'Reset Plugin', 'cyberslider' ); ?>">
                            <p class="description"><?php _e( 'Click this button to reset the plugin to its default settings. This cannot be reversed, so be sure before you do this!', 'cyberslider' ); ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="divider"></div>

            <h3><?php _e( 'Installation Settings', 'cyberslider' ); ?></h3>
            <table class="form-table main-settings">
                <tbody>
                    <tr valign="top">
                        <th scope="row"><?php _e( 'PHP Version', 'cyberslider' ); ?></th>
                        <td><?php echo phpversion(); ?></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><?php _e( 'MySQL Version', 'cyberslider' ); ?></th>
                        <td><?php echo mysql_get_server_info(); ?></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><?php _e( 'WordPress Version', 'cyberslider' ); ?></th>
                        <td><?php global $wp_version; echo $wp_version; ?></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><?php _e( 'Plugin Version', 'cyberslider' ); ?></th>
                        <td><?php echo cyberslider::$version; ?></td>
                    </tr>
                </tbody>
            </table>

            <div class="divider"></div>

            <?php
                /** After actions */
                do_action( 'cyberslider_settings_after', $s, $_GET['page'] );
            ?>

            <p class="submit">
                <input type="submit" name="save" class="button button-primary button-large" id="save" accesskey="p" value="<?php _e( 'Save Settings', 'cyberslider' ); ?>">
            </p>
        </div>
    </form>
</div>