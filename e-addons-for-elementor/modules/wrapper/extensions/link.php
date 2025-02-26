<?php

namespace EAddonsForElementor\Modules\Wrapper\Extensions;

use EAddonsForElementor\Core\Utils;
use EAddonsForElementor\Base\Base_Extension;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Hide extenstion
 *
 * @since 1.0.1
 */
class Link extends Base_Extension {

    //public static $commons = [];

    public function __construct() {
        parent::__construct();
        $this->add_actions();
        
    }

    public function get_name() {
        return 'link';
    }

    public function get_pid() {
        return 1039;
    }

    public function get_icon() {
        return 'eadd-rowcolumn-link';
    }
    
    /**
     * Add Actions
     *
     * @access private
     */
    protected function add_actions() {
        
        /*add_action('elementor/element/before_section_end', function($element, $section_id, $args) {                
            if ($section_id == 'e_section_' . $this->get_name() . '_advanced') {                        
                if (!in_array($element->get_type(), self::$commons)) {
                    $control_exist = $element->get_controls('e_wrapper_link');
                    if (empty($control_exist)) {
                        $this->add_controls($element, $args);
                        self::$commons[] = $element->get_type();
                    }
                }
            }
        }, 10, 3);*/

        foreach ($this->common_sections_actions as $common_sections_action) {
            $el_type = $common_sections_action['element'];
            //var_dump($el_type);
            
            add_action('elementor/element/' . $el_type . '/e_section_' . $this->get_name() . '_advanced/before_section_end', [$this, 'add_controls'], 20, 2);
            
            if ($el_type != 'common') {
                add_action("elementor/frontend/" . $el_type . "/before_render", [$this, '_before']);
                add_action("elementor/frontend/" . $el_type . "/after_render", [$this, '_after']);
            }

        }

    }

    public function _before($element) {
        $setting = $element->get_settings('e_wrapper_link');
        if (!empty($setting)) {
            ob_start();
        }
    }

    public function _after($element) {
        $setting = $element->get_settings('e_wrapper_link');        
        if (!empty($setting)) {
            
            $content = ob_get_clean();
            $settings = $element->get_settings_for_display();
            if (!empty($settings['e_wrapper_link_url']['url'])) {                
                $tag = 'div';
                if ($element->get_type() == 'section') {
                    $tag = !empty($settings['html_tag']) ? $settings['html_tag'] : 'section';
                }
                $tmp = explode('</'.$tag.'>', $content);
                if (count($tmp) > 1) {
                    $is_external = !empty($settings['e_wrapper_link_url']['is_external']) ? ' target="_blank"' : '';
                    $nofollow = !empty($settings['e_wrapper_link_url']['nofollow']) ? ' rel="nofollow"' : '';
                    $custom_attributes = !empty($settings['e_wrapper_link_url']['custom_attributes']) ? ' '.$settings['e_wrapper_link_url']['custom_attributes'] : '';
                    $once = !empty($settings['e_wrapper_link_once']) ? ' onclick="jQuery(this).remove();"' : '';
                    $tmp[count($tmp) - 2] .= '<a class="elementor-wrapper-link" href="' . $settings['e_wrapper_link_url']['url'] . '"'.$is_external.$nofollow.$custom_attributes.$once.'>&nbsp;</a>';
                    $content = implode('</'.$tag.'>', $tmp);
                }
            }
            echo $content;
        }
    }

    /**
     * Add Controls
     *
     * @since 0.5.5
     *
     * @access private
     */
    public function add_controls($element, $args = array()) {

        $element->add_control(
                'e_wrapper_link', [
            'label' => __('Enable Wrapper Link', 'elementor'),
            'type' => Controls_Manager::SWITCHER,
            'selectors' => [
                '{{WRAPPER}}' => 'position: relative;',
                '{{WRAPPER}} .elementor-wrapper-link' => 'display: block; position: absolute; left: 0; top: 0; width: 100%; height: 100%;',
            ]
                ]
        );

        $element->add_control(
                'e_wrapper_link_url', [
            'label' => __('Link', 'elementor'),
            'type' => Controls_Manager::URL,
            'condition' => [
                'e_wrapper_link!' => '',
            ],
                ]
        );
        
        $element->add_control(
                'e_wrapper_link_once', [
            'label' => __('Remove after click', 'elementor'),
            'type' => Controls_Manager::SWITCHER,
            'condition' => [
                'e_wrapper_link!' => '',
            ],
                ]
        );
    }

}
