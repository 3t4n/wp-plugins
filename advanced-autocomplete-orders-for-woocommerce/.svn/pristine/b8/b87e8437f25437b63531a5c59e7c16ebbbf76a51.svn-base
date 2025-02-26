<?php

namespace Optemiz\Dashboard;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class Header
 */
if ( ! class_exists( '\Optemiz\Dashboard\Header' ) ) {
    class Header {
    
        /**
         * Settings id.
         *
         * @var string
         */
        public $settings_id;

        /**
         * Settings object.
         *
         * @var Settings
         */
        public $settings_obj;
    
        /**
         * Field constructor.
         *
         */
        public function __construct($settings_id, $settings) {
            $this->settings_id  = $settings_id;
            $this->settings_obj = $settings;
        }
    
        /**
         * Set header arguments.
         *
         * @return array
         */
        public function set($args) {
    
            //@TODO need to bring default arguments from default method
            $args = wp_parse_args($args, [
                'icon_url' => 'http://optemiz.com/',
                'heading' => __('Optemiz Settings Framework'),
                'url' => 'http://optemiz.com/',
                'classes' => [],
                'big_icon_url' => '',
                'version' => '1.0.0',
                'control_panel_label' => '',
                'buttons' => [
                    'upgrade_to_pro' => [
                        'text' => __("Upgrade to pro"),
                        'url' => 'http://optemiz.com/',
                        'icon_url' => 'http://optemiz.com/',
                    ],
                ]
            ]);
    
            $this->settings_obj->settings['header'] = $args;
    
            return apply_filters("filter_opt_header_{$this->settings_id}_args", $args );
        }
    
        /**
         * Returns Field's Default Value.
         *
         * @return array
         */
        protected function defaults() {
            $defaults = array(
                'label' => __("Initialization"),
                'classes' => [],
            );
    
            return apply_filters("filter_opt_header_{$this->settings_id}_default_values", $defaults, $this->settings_id);
        }
    }
}
