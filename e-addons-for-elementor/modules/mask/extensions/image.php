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
class Image extends Base_Extension {

    public $common_sections_actions = [];    

    public function __construct() {
        parent::__construct();        
        $this->add_actions();
    }
    public function get_description() {
        return __('Image masking for elementor extension', 'e-addons-for-elementor');
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

        add_action( 'elementor/element/image/section_image/after_section_end', [$this, 'add_controls'], 10, 2);
        
        //add_filter('elementor/widget/print_template', array($this, 'mask_print_template'), 11, 2);
        //add_action('elementor/widget/render_content', array($this, 'mask_render_template'), 11, 2);
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
                'selector' => '{{WRAPPER}} .elementor-image img',
            ]
        );
        
        $element->end_controls_section();

        
    }

}
