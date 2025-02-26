<?php

namespace EAddonsForElementor\Modules\Shortcode\Widgets;

use Elementor\Controls_Manager;
use EAddonsForElementor\Base\Base_Widget;
use EAddonsForElementor\Core\Utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Elementor Do Shortcode
 *
 * Elementor widget for e-addons
 *
 */
class Do_Shortcode extends Base_Widget {

    public function get_name() {
        return 'e-do-shortcode';
    }    
    
    public function get_title() {
        return __('Do Shortcode', 'e-addons-for-elementor');
    }

    public function get_pid() {
        return 220;
    }

    public function get_description() {
        return __('Apply a WordPress shortcode', 'e-addons-for-elementor');
    }

    public function get_icon() {
        return 'eadd-do-shortcode';
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
                'section_doshortcode', [
                'label' => __('Do Shortcode', 'e-addons-for-elementor'),
            ]
        );
       $this->add_control(
          'doshortcode_string',
          [
             'label'   => __( 'Shortcode', 'e-addons-for-elementor' ),
             'type'    => Controls_Manager::TEXTAREA,
             'description' => 'ex: [gallery ids="66,67,28"]'
          ]
        );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings = $this->get_settings_for_display();
        
        if( $settings['doshortcode_string'] ){
            echo do_shortcode( $settings['doshortcode_string'] );
        }
    }

}
