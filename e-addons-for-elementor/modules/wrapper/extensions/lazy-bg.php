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
class Lazy_Bg extends Base_Extension {

    public $common_sections_actions = [];

    public function __construct() {
        parent::__construct();
        $this->add_actions();
    }

    public function get_name() {
        return 'lazy_background_image';
    }

    public function get_pid() {
        return 3328;
    }

    public function get_icon() {
        return 'eadd-lazybg';
    }

    /**
     * Add Actions
     *
     * @access private
     */
    protected function add_actions() {
        //if (!\Elementor\Plugin::$instance->editor->is_edit_mode()) {
        if (!Utils::is_preview()) {
            add_action('elementor/frontend/the_content', [$this, 'elementor_frontend_the_content']);       
            add_action( 'wp_head', [$this, '_enqueue_styles'] );
        }
        add_action('elementor/element/section/section_background/before_section_end', array($this, 'add_controls'), 10, 2);
    }

    /**
     * Add Controls
     *
     * @since 0.5.5
     *
     * @access private
     */
    public function add_controls($element, $args) {
        $element->add_control(
                'e_wrapper_lazy_bg', [
            'label' => '<i class="eadd-logo-e-addons"></i> ' . __('Enable Image Lazy Load', 'elementor'),
            'type' => Controls_Manager::SWITCHER,
            'selectors' => [
                '{{WRAPPER}}.e_lazy_bg:not(.elementor-motion-effects-element-type-background)' => 'background-image: none !important',
            ]
                ]
        );
    }
    
    /**
     * output inline style to set background-image property to none with !important modifier
     *
     * @since    1.0.0
     */
    public function _enqueue_styles() {

        if (is_admin())
            return;
        if (!( is_singular() ))
            return;
        
        ob_start();
        ?>
        <style>
            .e_lazy_bg:not(.elementor-motion-effects-element-type-background) {
                background-image: none !important;
            }
        </style>
        <?php
        echo trim(ob_get_clean());
    }

    /**
     * insert our lazyload class into Elementor HTML for all section and column DOM objects .
     *
     * @since    1.0.0
     */
    public function elementor_frontend_the_content($content) {
        $count = 0;
        $content = preg_replace([
            '/(elementor-section\s)/m',
            '/(elementor-column-wrap)/m',
            '/(elementor-flip-box__front)/m',
            '/(elementor-flip-box__back)/m',
            '/(swiper-slide-bg)/m',
                ], ' $1 e_lazy_bg ', $content, -1, $count);
        if ($count) {
            wp_enqueue_script('e-addons-extended-lazy-bg');
        }
        return $content;
    }

}
