<?php

namespace EAddonsForElementor\Modules\Heading\Extensions;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

use EAddonsForElementor\Base\Base_Extension;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Heading extenstion
 *
 * @since 1.0.1
 */
class Masking extends Base_Extension {

    public $common_sections_actions = [];    

    public function __construct() {
        parent::__construct();
        
        $this->add_actions();
    }
    public function get_description() {
        return __('Heading masking text for elementor extension', 'e-addons-for-elementor');
    }

    public function get_pid() {
        return 239;
    }

    public function get_icon() {
        return 'eadd-heading-widget-masking';
    }
    public function get_script_depends() {        
        return [];
    }

    /**
     * Add Actions
     *
     * @access private
     */
    protected function add_actions() {
        add_action( 'elementor/element/heading/section_title/after_section_end', [$this, 'add_controls'], 22, 2);
    }
    
    public function add_controls($element, $args) {
        $element_type = $element->get_type();

        $element->start_controls_section(
            'section_masking_heading', [
                'label' => '<i class="eadd-heading-widget-masking eadd-ic-left"></i> '.'<i class="eadd-logo-e-addons eadd-ic-right"></i> '.__('Image Masking', 'e-addons-for-elementor'),
                'condition' => [
                    'splitting_type' => '',
                ],
            ]
        );
        $element->add_control(
            'enable_masking',
            [
                'label' => __( 'Enable', 'e-addons-for-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-heading-title' => '-webkit-background-clip: text; -webkit-text-fill-color: transparent;'
                ]
                
            ]
        );
        $element->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background_masking',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .elementor-heading-title',
                'condition' => [
                    'enable_masking' => 'yes',
                ],
            ]
        );
        
        $element->end_controls_section();
    }

}