<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Advanced_Contact_Form_7_Widget extends Widget_Base {

    public function get_name() {
        return 'advanced-cf7';
    }

    public function get_title() {
        return 'Advanced Contact Form 7';
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    public function get_categories() {
        return [ 'advamentor' ];
    }

    // Registering Controls
    protected function _register_controls() {

        // Registering Post Grid Preset Meta Style Controls
        $this->start_controls_section( 'advanced_cf7_global_controls',
            [
                'label'         => __( 'Form Data', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_CONTENT
            ]
        );

        // Registering Post Grid Global Post Exclude Filter Control
        $this->add_control('advanced_cf7_form_id_control',
            [
                'label'             => __( 'Select Form', 'advamentor' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => false,
                'options'           => advamentor_get_cf7(),
                'description'       => 'Select Form to Embed'
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings   = $this->get_settings_for_display();

        if (!empty($settings['advanced_cf7_form_id_control'])){
            echo do_shortcode( '[contact-form-7 id="'.$settings['advanced_cf7_form_id_control'].'"]' );
        } else {
            echo "Please Select a Form";
        }


    }

}