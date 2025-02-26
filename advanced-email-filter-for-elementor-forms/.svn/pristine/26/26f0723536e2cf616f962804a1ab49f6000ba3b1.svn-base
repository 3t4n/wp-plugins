<?php
namespace AEFE\Admin\Settings;

use AEFE\Admin\Traits\Section_Header_Renderer;
use AEFE\Admin\Traits\Pattern_Field_Renderer;

class Blacklist_Settings {

    use Section_Header_Renderer, Pattern_Field_Renderer;

    protected $option_name;
    protected $type;

    public function __construct( $option_name, $type ) {
        $this->option_name = $option_name;
        $this->type = $type;
        add_action('admin_init', [$this, 'register_section_and_field'], 20);
    }

    public function register_section_and_field() {
        add_settings_section(
            'aefe_blacklist_section',
            '',
            [ $this, 'render_header' ],
            'aefe-settings'
        );

        add_settings_field(
            'global_blacklist',
            __( 'Blocked Patterns', 'advanced-email-filter-for-elementor-forms' ),
            [ $this, 'render_field' ],
            'aefe-settings',
            'aefe_blacklist_section'
        );
    }

    public function render_header() {
        $this->render_section_header(
            __( 'Global Blocklist Settings', 'advanced-email-filter-for-elementor-forms' ),
            __( 'These patterns will block matching emails from all forms.', 'advanced-email-filter-for-elementor-forms' )
        );
    }

    public function render_field() {
        $this->render_pattern_field( $this->option_name, $this->type );
    }

}