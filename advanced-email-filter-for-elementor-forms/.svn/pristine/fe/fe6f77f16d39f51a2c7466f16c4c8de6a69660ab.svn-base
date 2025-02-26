<?php
namespace AEFE\Admin;

use AEFE\Admin\Settings\Blacklist_Settings;
use AEFE\Admin\Settings\Whitelist_Settings;
use AEFE\Admin\Settings\Business_Only_Settings;
use AEFE\Admin\Settings\Disposable_Settings;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Filter_Settings {
    const BLACKLIST_OPTION = 'aefe_global_blacklist';
    const WHITELIST_OPTION = 'aefe_global_whitelist';
    const BUSINESS_ONLY_OPTION = 'aefe_business_only';
    const DISPOSABLE_OPTION = 'aefe_block_disposable';

    protected $blacklist_settings;
    protected $whitelist_settings;
    protected $business_only_settings;
    protected $disposable_settings;

    public function __construct() {
        $this->blacklist_settings = new Blacklist_Settings( self::BLACKLIST_OPTION, 'blocklist' );
        $this->whitelist_settings = new Whitelist_Settings( self::WHITELIST_OPTION, 'allowlist' );
        $this->business_only_settings = new Business_Only_Settings( self::BUSINESS_ONLY_OPTION, 'business' );
        $this->disposable_settings = new Disposable_Settings( self::DISPOSABLE_OPTION, 'disposable' );
        
        add_action( 'admin_menu', [ $this, 'add_admin_menu' ] );
        add_action( 'admin_init', [ $this, 'register_settings' ] );
    }

    public function add_admin_menu() {
        add_menu_page(
            __( 'Email Filter Settings', 'advanced-email-filter-for-elementor-forms' ),
            __( 'Email Filter', 'advanced-email-filter-for-elementor-forms' ),
            'manage_options',
            'aefe-settings',
            [ $this, 'render_settings_page' ],
            'dashicons-email-alt'
        );
    }

    public function register_settings() {
        // Register settings
        register_setting( 'aefe_filter_group', self::WHITELIST_OPTION, 'sanitize_text_field' );
        register_setting( 'aefe_filter_group', self::BLACKLIST_OPTION, 'sanitize_text_field' );
        register_setting( 'aefe_filter_group', self::BUSINESS_ONLY_OPTION, 'rest_sanitize_boolean' );
        register_setting( 'aefe_filter_group', self::DISPOSABLE_OPTION, 'rest_sanitize_boolean' );

        // Add custom sanitization
        add_filter( 'sanitize_option_' . self::WHITELIST_OPTION, [ $this, 'sanitize_list' ] );
        add_filter( 'sanitize_option_' . self::BLACKLIST_OPTION, [ $this, 'sanitize_list' ] );

        // Register sections and fields
        $this->whitelist_settings->register_section_and_field();
        $this->blacklist_settings->register_section_and_field();
        $this->business_only_settings->register_section_and_field();
        $this->disposable_settings->register_section_and_field();
    }

    public function sanitize_list( $input ) {
        if ( ! is_string( $input ) ) {
            return '';
        }
        
        $entries = explode( ',', sanitize_text_field( $input ) );
        $cleaned = array_unique( array_filter( array_map( [ $this, 'clean_entry' ], $entries ) ) );
        
        return implode( ',', $cleaned );
    }

    private function clean_entry( $entry ) {
        $clean_entry = trim( strtolower( $entry ) );
        return ! empty( $clean_entry ) ? $clean_entry : null;
    }

    public function render_settings_page() {
        ?>
        <div class="wrap aefe-settings-wrap">
            <h1 class="aefe-title"><?php esc_html_e( 'Advanced Email Filter Settings', 'advanced-email-filter-for-elementor-forms' ); ?></h1>
            
            <div class="aefe-settings-container">
                <form method="post" action="options.php" class="aefe-settings-form">
                    <?php 
                    settings_fields( 'aefe_filter_group' );
                    ?>
                    
                    <div class="aefe-settings-columns">
                        <div class="aefe-settings-main">
                            <?php do_settings_sections( 'aefe-settings' ); ?>
                        </div>
                        
                        <div class="aefe-settings-sidebar">
                            <div class="aefe-info-box">
                                <h3><?php esc_html_e( 'Pattern Help', 'advanced-email-filter-for-elementor-forms' ); ?></h3>
                                <div class="aefe-pattern-examples">
                                    <h4><?php esc_html_e( 'Blocklist Examples:', 'advanced-email-filter-for-elementor-forms' ); ?></h4>
                                    <ul>
                                        <li><code>@spamdomain.com</code> - <?php esc_html_e( 'Block entire domain', 'advanced-email-filter-for-elementor-forms' ); ?></li>
                                        <li><code>*.ru</code> - <?php esc_html_e( 'Block country TLD', 'advanced-email-filter-for-elementor-forms' ); ?></li>
                                        <li><code>temp*</code> - <?php esc_html_e( 'Block emails starting with...', 'advanced-email-filter-for-elementor-forms' ); ?></li>
                                    </ul>
                                    
                                    <h4><?php esc_html_e( 'Allowlist Examples:', 'advanced-email-filter-for-elementor-forms' ); ?></h4>
                                    <ul>
                                        <li><code>@yourcompany.com</code> - <?php esc_html_e( 'Allow your domain', 'advanced-email-filter-for-elementor-forms' ); ?></li>
                                        <li><code>admin@</code> - <?php esc_html_e( 'Allow admin emails', 'advanced-email-filter-for-elementor-forms' ); ?></li>
                                        <li><code>*.trusted.org</code> - <?php esc_html_e( 'Allow subdomains', 'advanced-email-filter-for-elementor-forms' ); ?></li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <?php submit_button( __( 'Save Changes', 'advanced-email-filter-for-elementor-forms' ), 'primary large' ); ?>
                </form>
            </div>
        </div>
        <?php
    }

}