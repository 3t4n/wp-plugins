<?php

/**
 * Plexx About Me Widget.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Elementor_Plexx_Aboutme extends \Elementor\Widget_Base {


    /**
     * @return string
     */
    public function get_name() {
        return 'plexx_aboutme';
    }

    /**
     * @return string|null
     */
    public function get_title() {
        return __( 'Plexx About Me', 'themeworm' );
    }

    /**
     * @return string
     */
    public function get_icon() {
        return 'far fa-address-card';
    }

    /**
     * @return array
     */
    public function get_categories() {
        return [ 'plexx-elementor-category' ];
    }

    /**
     * @return array
     */
    public function get_keywords() {
        return ['author', 'plexx', 'about', 'photo', 'link'];
    }

    public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

   }

    /**
     * @return void
     */
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'About Me Settings', 'themeworm' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );



      $this->end_controls_section();

    }


    /**
     * @return void
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
    }



}
