<?php

namespace EAddonsForElementor\Modules\Wrapper\Extensions;

use EAddonsForElementor\Base\Base_Extension;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Hide extenstion
 *
 * @since 1.0.1
 */
class Col_Fix extends Base_Extension {

    public $common_sections_actions = [];    

    public function __construct() {
        parent::__construct();
        $this->add_actions();
    }

    public function get_pid() {
        return 3324;
    }

    public function get_icon() {
        return 'eadd-colfix-extension';
    }
    
    /**
     * Add Actions
     *
     * @access public
     */
    public function add_actions() {
        add_action('elementor/element/section/section_layout/before_section_end', array($this, 'add_controls'), 10, 2);
    }

    /**
     * Add "Auto Columns Alignment" setting to section.
     *
     * @param \Elementor\Elements_Base $element
     * @param array $args
     */
    public function add_controls($element, $args) {
        $element->add_control(
                'fix_columns_alignment',
                array(
                    'type' => Controls_Manager::SWITCHER,
                    'label' => '<i class="eadd-logo-e-addons"></i> '.__('Columns Alignment Fix', 'e-addons-for-elementor'),
                    'description' => __('It will remove the "weird" columns gap added by Elementor on the left and right side of each section (when `Columns Gap` is active). This helps you to have consistent content width without having to manually readjust it everytime you create sections with `Columns Gap`', 'e-addons-for-elementor'),
                    'separator' => 'before',
                    'selectors' => [
                        '{{WRAPPER}}' => 'overflow-x: hidden;',
                        '{{WRAPPER}} > .elementor-column-gap-default > .elementor-row' => 'width: calc(100% + 20px); margin-left: -10px; margin-right: -10px;',
                        '{{WRAPPER}} > .elementor-column-gap-narrow > .elementor-row' => 'width: calc(100% + 10px); margin-left: -5px; margin-right: -5px;',
                        '{{WRAPPER}} > .elementor-column-gap-extended > .elementor-row' => 'width: calc(100% + 30px); margin-left: -15px; margin-right: -15px;',
                        '{{WRAPPER}} > .elementor-column-gap-wide > .elementor-row' => 'width: calc(100% + 40px); margin-left: -20px; margin-right: -20px;',
                        '{{WRAPPER}} > .elementor-column-gap-wider > .elementor-row' => 'width: calc(100% + 60px); margin-left: -30px; margin-right: -30px;',
                    ],
                )
        );
    }

}
