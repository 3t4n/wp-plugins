<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<table class="form-table">
    <tbody>

        <tr valign="top" class="<?php echo 'yes' !== $settings['enable_restriction'] ? 'rpa_setting_hidden_item' : ''; ?>">
            <th scope="row">
                <label for="all_page_restrict"><?php esc_html_e( 'All Page Restriction', 'advanced-user-access-manager' ); ?></label>
            </th>
            <td>
                <input type="checkbox" id="all_page_restrict" name="auam_setting_field_[all_page_restrict]" value="1" <?php checked( $settings['all_page_restrict'], '1' ); ?> />
                <span><?php esc_html_e( 'All Page', 'advanced-user-access-manager'); ?></span>
            </td>
        </tr>

        <tr valign="top" class="<?php echo 'yes' !== $settings['enable_restriction'] ? 'rpa_setting_hidden_item' : ''; ?>">
            <th scope="row">
                <?php esc_html_e( 'Show Login Form', 'advanced-user-access-manager' ); ?>
            </th>
            <td class="login_form_radio_field">
                <label>
                    <input type="radio" name="auam_setting_field_[show_login_form]" value="yes" <?php echo ( 'yes' === $settings['show_login_form'] ? 'checked' : '' ); ?>>
                    <span><?php esc_html_e( 'Yes', 'advanced-user-access-manager' ); ?></span>
                </label><br>
                <label>
                    <input type="radio" name="auam_setting_field_[show_login_form]" value="no" <?php echo ( 'no' === $settings['show_login_form'] ? 'checked' : '' ); ?>>
                    <span><?php esc_html_e( 'No', 'advanced-user-access-manager' ); ?></span>
                </label>
            </td>
        </tr>

        <tr valign="top" class="<?php echo ( ! empty( $settings['all_page_restrict'] ) ? 'rpa_setting_hidden_item' : '' ); ?>">
            <th scope="row">
                <strong><?php esc_html_e( 'Login Redirect Type', 'advanced-user-access-manager' ); ?></strong>
            </th>
            <td class="rpa-redirect-type-choices">
                <label>
                    <input type="radio" name="auam_setting_field_[redirect_type]" value="page" <?php echo ( 'page' === $settings['redirect_type'] ? 'checked' : '' ); ?>>
                    <span><?php esc_html_e( 'Page', 'advanced-user-access-manager' ); ?></span>
                </label><br>
                <label>
                    <input type="radio" name="auam_setting_field_[redirect_type]" value="url" <?php echo ( 'url' === $settings['redirect_type'] ? 'checked' : '' ); ?>>
                    <span><?php esc_html_e( 'URL', 'advanced-user-access-manager' ); ?></span>
                </label>
            </td>
        </tr>

        <tr valign="top" class="<?php echo ( ! empty( $settings['all_page_restrict'] ) ? 'rpa_setting_hidden_item' : '' ); ?>">
            <th scope="row">
                <label for="selectbox">
                    <?php esc_html_e( 'For Logged-In Users Only', 'advanced-user-access-manager' ); ?>
                </label>
            </th>
            <td>
                <select id="selectbox" name="auam_setting_field_[login_user_page]" class="regular-text">
                    <option value=""><?php esc_html_e( 'Select Page', 'advanced-user-access-manager' ); ?></option>
                    <?php foreach ( $pages as $page ): ?>
                        <option value="<?php echo esc_attr( $page->ID ); ?>" <?php selected( $settings['login_user_page'], $page->ID ); ?>><?php echo esc_html( $page->post_title ); ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="description"><?php
                    esc_html_e( 'This page is restricted for logged-in user only.', 'advanced-user-access-manager' );
                    
                ?></p>
            </td>
        </tr>
        
        <?php 
            if ( 'yes' !== $settings['show_login_form'] ) {
                ?>
                    <tr valign="top" data-rpa-redirect-type="page" class="<?php echo ( 'page' !== $settings['redirect_type'] || ! empty(  $settings['all_page_restrict'] ) ? 'rpa_setting_hidden_item' : ''); ?>">
                        <th scope="row">
                            <label for="login_redirect"><?php esc_html_e( 'Login Redirect Page', 'advanced-user-access-manager' ); ?></label>
                        </th>
                        <td>
                            <select id="login_redirect" name="auam_setting_field_[login_page]" class="regular-text">
                                <option value=""><?php esc_html_e( 'Select Page', 'advanced-user-access-manager' ); ?></option>
                                <?php foreach ( $pages as $page ): ?>
                                    <option value="<?php echo esc_attr( $page->ID ); ?>" <?php selected( $settings['login_page'], $page->ID ); ?>><?php echo esc_html( $page->post_title ); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p class="description">
                                <?php esc_html_e( 'This page where guest users will be redirected to. for logged-in users only.', 'advanced-user-access-manager' );?>
                            </p>
                        </td>
                    </tr>
                <?php
            }
        ?>

        <tr valign="top" data-rpa-redirect-type="url" class="<?php echo ( 'page' === $settings['redirect_type'] ? 'rpa_setting_hidden_item' : '' ); ?>">
            <th scope="row">
                <label for="login-redirect-url-field"><?php esc_html_e( 'Login Redirect URL', 'advanced-user-access-manager' ); ?></label>
            </th>
            <td>
                <input type="text" id="login-redirect-url-field" name="auam_setting_field_[redirect_url]" value="<?php echo esc_attr( $settings['redirect_url'] ); ?>" />
                <p class="description"><?php esc_html_e( 'This is the URL where guest users will be redirected to.', 'advanced-user-access-manager' ); ?></p>
            </td>
        </tr>
    </tbody>
</table>