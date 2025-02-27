<?php
/**
 * Supported themes.
 *
 * @package cyberpress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class CyberPress_Supported_Themes
 */
class CyberPress_Supported_Themes {
    /**
     * CyberPress_Supported_Themes constructor.
     */
    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );

        // work only if Gutenberg available.
        if ( function_exists( 'register_block_type' ) ) {
            add_action( 'after_setup_theme', array( $this, 'enqueue_block_editor_styles' ) );
        }
    }

    /**
     * Get Theme Compatibility Style
     */
    public function get_theme_compatibility_style() {
        $result = false;

        switch ( get_template() ) {
            case 'twentytwenty':
                $result = array(
                    'name' => 'cyberpress-twentytwenty',
                    'url'  => cyberpress()->plugin_url . 'assets/css/theme-twentytwenty.min.css',
                );
                break;
            case 'twentynineteen':
                $result = array(
                    'name' => 'cyberpress-twentynineteen',
                    'url'  => cyberpress()->plugin_url . 'assets/css/theme-twentynineteen.min.css',
                );
                break;
            case 'twentyseventeen':
                $result = array(
                    'name' => 'cyberpress-twentyseventeen',
                    'url'  => cyberpress()->plugin_url . 'assets/css/theme-twentyseventeen.min.css',
                );
                break;
            case 'twentysixteen':
                $result = array(
                    'name' => 'cyberpress-twentysixteen',
                    'url'  => cyberpress()->plugin_url . 'assets/css/theme-twentysixteen.min.css',
                );
                break;
            case 'twentyfifteen':
                $result = array(
                    'name' => 'cyberpress-twentyfifteen',
                    'url'  => cyberpress()->plugin_url . 'assets/css/theme-twentyfifteen.min.css',
                );
                break;
        }

        return $result;
    }

    /**
     * Enqueue styles
     */
    public function wp_enqueue_scripts() {
        $theme_compat = $this->get_theme_compatibility_style();
        if ( $theme_compat ) {
            wp_enqueue_style( $theme_compat['name'], $theme_compat['url'], array(), '2.5.6' );
            wp_style_add_data( $theme_compat['name'], 'rtl', 'replace' );
            wp_style_add_data( $theme_compat['name'], 'suffix', '.min' );
        }
    }

    /**
     * Enqueue editor styles
     */
    public function enqueue_block_editor_styles() {
        $theme_compat = $this->get_theme_compatibility_style();
        if ( $theme_compat ) {
            add_editor_style( $theme_compat['url'] );
        }
    }
}

new CyberPress_Supported_Themes();
