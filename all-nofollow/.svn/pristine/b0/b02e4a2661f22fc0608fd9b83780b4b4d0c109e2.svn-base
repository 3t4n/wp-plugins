<?php
/*
Plugin Name: All Nofollow
Description: Adds `nofollow` to external and specified internal links based on admin settings.
Version: 1.0
Author: ssik
Text Domain: all-nofollow
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'admin_menu', 'alno_add_admin_menu' );
add_action( 'admin_init', 'alno_settings_init' );
add_filter( 'the_content', 'alno_modify_links' );

function alno_add_admin_menu() {
    add_options_page(
        __( 'All Nofollow Settings', 'all-nofollow' ),
        __( 'All Nofollow', 'all-nofollow' ),
        'manage_options',
        'all-nofollow',
        'alno_options_page'
    );
}

function alno_settings_init() {
    register_setting(
        'alno_settings_group',
        'alno_settings',
        array(
            'type'              => 'array',
            'sanitize_callback' => 'alno_sanitize_settings',
            'default'           => array(),
        )
    );

    add_settings_section(
        'alno_section_external',
        esc_html__( 'External Links', 'all-nofollow' ),
        'alno_section_external_callback',
        'all-nofollow'
    );

    add_settings_field(
        'alno_external_nofollow',
        __( 'Add `nofollow` to External Links', 'all-nofollow' ),
        'alno_external_nofollow_render',
        'all-nofollow',
        'alno_section_external'
    );

    add_settings_field(
        'alno_external_newtab',
        __( 'Open External Links in New Tab', 'all-nofollow' ),
        'alno_external_newtab_render',
        'all-nofollow',
        'alno_section_external'
    );

    add_settings_section(
        'alno_section_internal',
        esc_html__( 'Internal Links', 'all-nofollow' ),
        'alno_section_internal_callback',
        'all-nofollow'
    );

    add_settings_field(
        'alno_internal_author_nofollow',
        __( 'Add `nofollow` to Author Links', 'all-nofollow' ),
        'alno_internal_author_nofollow_render',
        'all-nofollow',
        'alno_section_internal'
    );
}

function alno_section_external_callback() {
    echo '<p>' . esc_html__( 'Configure how external links are handled in your content.', 'all-nofollow' ) . '</p>';
}

function alno_section_internal_callback() {
    echo '<p>' . esc_html__( 'Configure how internal links are handled in your content.', 'all-nofollow' ) . '</p>';
}

function alno_external_nofollow_render() {
    $options = get_option( 'alno_settings' );
    ?>
    <input type='checkbox' name='alno_settings[external_nofollow]' <?php checked( isset( $options['external_nofollow'] ) ); ?> />
    <label for='external_nofollow'><?php esc_html_e( 'Add `nofollow` attribute to all external links.', 'all-nofollow' ); ?></label>
    <?php
}

function alno_external_newtab_render() {
    $options = get_option( 'alno_settings' );
    ?>
    <input type='checkbox' name='alno_settings[external_newtab]' <?php checked( isset( $options['external_newtab'] ) ); ?> />
    <label for='external_newtab'><?php esc_html_e( 'Open all external links in a new browser tab.', 'all-nofollow' ); ?></label>
    <?php
}

function alno_internal_author_nofollow_render() {
    $options = get_option( 'alno_settings' );
    ?>
    <input type='checkbox' name='alno_settings[internal_author_nofollow]' <?php checked( isset( $options['internal_author_nofollow'] ) ); ?> />
    <label for='internal_author_nofollow'><?php esc_html_e( 'Add `nofollow` to links pointing to the author\'s archive page.', 'all-nofollow' ); ?></label>
    <?php
}

function alno_options_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'All Nofollow Settings', 'all-nofollow' ); ?></h1>
        <form action='options.php' method='post'>
            <?php
            settings_fields( 'alno_settings_group' );
            do_settings_sections( 'all-nofollow' );
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function alno_sanitize_settings( $settings ) {
    $sanitized = array();

    if ( isset( $settings['external_nofollow'] ) ) {
        $sanitized['external_nofollow'] = boolval( $settings['external_nofollow'] );
    }

    if ( isset( $settings['external_newtab'] ) ) {
        $sanitized['external_newtab'] = boolval( $settings['external_newtab'] );
    }

    if ( isset( $settings['internal_author_nofollow'] ) ) {
        $sanitized['internal_author_nofollow'] = boolval( $settings['internal_author_nofollow'] );
    }

    return $sanitized;
}

function alno_modify_links( $content ) {
    $options = get_option( 'alno_settings' );

    if ( isset( $options['external_nofollow'] ) || isset( $options['external_newtab'] ) ) {
        $content = preg_replace_callback( '/<a\s+[^>]*href=["\']([^"\']+)["\'][^>]*>/i', function( $matches ) use ( $options ) {
            $url = $matches[1];
            $parsed_url = wp_parse_url( $url );
            $current_host = wp_parse_url( home_url(), PHP_URL_HOST );

            if ( isset( $parsed_url['host'] ) && strtolower( $parsed_url['host'] ) !== strtolower( $current_host ) ) {
                $attributes = '';

                if ( isset( $options['external_nofollow'] ) ) {
                    if ( strpos( $matches[0], 'rel="' ) !== false ) {
                        $matches[0] = preg_replace( '/rel=["\']([^"\']*)["\']/', 'rel="$1 nofollow"', $matches[0] );
                    } else {
                        $attributes .= ' rel="nofollow"';
                    }
                }

                if ( isset( $options['external_newtab'] ) ) {
                    if ( strpos( $matches[0], 'target="' ) === false ) {
                        $attributes .= ' target="_blank"';
                    }
                }

                if ( $attributes ) {
                    $matches[0] = rtrim( $matches[0], '>' ) . $attributes . '>';
                }

                return $matches[0];
            }

            return $matches[0];
        }, $content );
    }

    if ( isset( $options['internal_author_nofollow'] ) ) {
        $content = preg_replace_callback( '/<a\s+[^>]*href=["\']([^"\']+)["\'][^>]*>/i', function( $matches ) {
            $url = $matches[1];
            $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );

            $normalized_url = untrailingslashit( $url );
            $normalized_author_url = untrailingslashit( $author_url );

            if ( strtolower( $normalized_url ) === strtolower( $normalized_author_url ) ) {
                if ( strpos( $matches[0], 'rel="' ) !== false ) {
                    $link = preg_replace( '/rel=["\']([^"\']*)["\']/', 'rel="$1 nofollow"', $matches[0] );
                } else {
                    $link = rtrim( $matches[0], '>' ) . ' rel="nofollow">';
                }
                return $link;
            }

            return $matches[0];
        }, $content );
    }

    return $content;
}