<?php

namespace EAddonsForElementor\Modules\Mask\Extensions;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

use EAddonsForElementor\Base\Base_Extension;
use EAddonsForElementor\Core\Controls\Groups\Masking;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Mask extenstion
 *
 * @since 1.0.1
 */
class Video extends Base_Extension {

    public $common_sections_actions = [];    

    public function __construct() {
        parent::__construct();
        
        $this->add_actions();
    }
    public function get_description() {
        return __('Video masking for elementor extension', 'e-addons-for-elementor');
    }

    public function get_pid() {
        return 236;
    }

    public function get_icon() {
        return 'eadd-image-widget-masking';
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
        add_action( 'elementor/element/video/section_image_overlay/after_section_end', [$this, 'add_controls'], 10, 2);
    }
    
    public function add_controls($element, $args) {
        $element_type = $element->get_type();

        $element->start_controls_section(
            'section_mask', [
                'label' => '<i class="eadd-image-widget-masking eadd-ic-left"></i> '.'<i class="eadd-logo-e-addons eadd-ic-right"></i> '.__('Mask', 'e-addons-for-elementor'),
            ]
        );

        $element->add_group_control(
            Masking::get_type(),
            [
                'name' => 'mask',
                'label' => __('Mask','e-addons-for-elementor'),
                'selector' => '{{WRAPPER}} .elementor-custom-embed-image-overlay, {{WRAPPER}} .elementor-video-iframe, {{WRAPPER}} .plyr__video-wrapper',
            ]
        );
        
        $element->end_controls_section();
    }

}
