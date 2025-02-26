<?php
namespace AEFE\Admin\Settings;

use AEFE\Admin\Traits\Section_Header_Renderer;
use AEFE\Admin\Traits\Pattern_Field_Renderer;

class Whitelist_Settings {

    use Section_Header_Renderer, Pattern_Field_Renderer;

    protected $option_name;
    protected $type;

    public function __construct( $option_name, $type ) {
        $this->option_name = $option_name;
        $this->type = $type;
        add_action('admin_init', [$this, 'register_section_and_field'], 10);
    }

    public function register_section_and_field() {
        add_settings_section(
            'aefe_whitelist_section',
            '',
            [ $this, 'render_header' ],
            'aefe-settings'
        );

        add_settings_field(
            'global_whitelist',
            __( 'Whitelist Patterns', 'advanced-email-filter-for-elementor-forms' ),
            [ $this, 'render_field' ],
            'aefe-settings',
            'aefe_whitelist_section'
        );
    }

    public function render_header() {
        $this->render_section_header(
            __( 'Global Allowlist Settings', 'advanced-email-filter-for-elementor-forms' ),
            __( 'These patterns will override blocklist rules.', 'advanced-email-filter-for-elementor-forms' )
        );
    }

    public function render_field() {
        $this->render_pattern_field( $this->option_name, $this->type );
    }

}