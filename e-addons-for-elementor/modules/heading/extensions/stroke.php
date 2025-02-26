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
class Stroke extends Base_Extension {

    public $common_sections_actions = [];    

    public function __construct() {
        parent::__construct();
        
        $this->add_actions();
    }
    public function get_description() {
        return __('Heading outline text for elementor extension', 'e-addons-for-elementor');
    }

    public function get_pid() {
        return 240;
    }

    public function get_icon() {
        return 'eadd-heading-widget-outline';
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
        add_action( 'elementor/element/heading/section_title/after_section_end', [$this, 'add_controls'], 10, 2);
    }
    
    public function add_controls($element, $args) {
        $element_type = $element->get_type();

        $element->start_controls_section(
            'section_outline_heading', [
                'label' => '<i class="eadd-heading-widget-outline eadd-ic-left"></i> '.'<i class="eadd-logo-e-addons eadd-ic-right"></i> '.__('Outline', 'e-addons-for-elementor'),
            ]
        );

        $element->add_control(
            'stroke_width', [
                'label' => __('Width', 'e-addons-for-elementor'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => '',
                ],
                'range' => [
                    
                    'px' => [
                        'min' => 1,
                        'max' => 12,
                        'step' => 1
                    ]
                ],
                
                //-webkit-text-stroke: 2px rgba(0,0,0,1);
                'selectors' => [
                    '{{WRAPPER}} .elementor-heading-title' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $element->add_control(
            'stroke_color',
            [
                'label' => __( 'Stroke Color', 'e-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .elementor-heading-title' => '-webkit-text-stroke-color: {{VALUE}};',
                ],
                'condition' => [
                    'stroke_width!' => ''
                ]
                
            ]
        );
        /*
        $element->add_control(
            'fill_color',
            [
                'label' => __( 'Fill Color', 'e-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                //'alpha' => false,
                'selectors' => [
                    '{{WRAPPER}} .elementor-heading-title' => '-webkit-text-fill-color: {{VALUE}};',
                ],
                'condition' => [
                    'stroke_width!' => '' 
                ]
            ]
        );
        $element->add_control(
            'fill_front',
            [
                'label' => __('Fill in front', 'e-addons-for-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'render_type' => 'template',
                'selectors' => [
                    '{{WRAPPER}} .elementor-heading-title' => 'paint-order: stroke fill;',
                ],
                'condition' => [
                    'fill_color!' => '' 
                ]
            ]
        );
        */
        $element->end_controls_section();
    }

}