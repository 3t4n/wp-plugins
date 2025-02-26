<?php

namespace Optemiz\Dashboard;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class Field
 */
if ( ! class_exists( '\Optemiz\Dashboard\Field' ) ) {
    class Field {

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
         * Set Sub Tab.
         *
         * @return array
         */
        public function set($tab_key, $sub_tab_key, $fields) {
            $this->settings_obj->settings['form']['items'][$tab_key]['tabs'][$sub_tab_key]['fields'] = $fields;
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
    
            return apply_filters("filter_opt_field_{$this->settings_id}_default_values", $defaults, $this->settings_id);
        }
    }
}
