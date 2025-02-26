<?php

namespace Optemiz\Dashboard;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class SubTab
 */
if ( ! class_exists( '\Optemiz\Dashboard\SubTab' ) ) {
    class SubTab extends AbstractTab {

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
        public function set($tab_key, $sub_tab_key, $args) {

            //@TODO need to bring default arguments from default method
            $args = wp_parse_args($args, array(
                'label' => __("Initialization"),
                'classes' => [],
            ));

            $this->settings_obj->settings['form']['items'][$tab_key]['tabs'][$sub_tab_key]['menu'] = $args;

            return apply_filters("filter_opt_subtab_{$this->settings_id}_{$tab_key}_{$sub_tab_key}_args", $sub_tab_key, $tab_key, $args );
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

            return apply_filters("filter_opt_subtab_{$this->settings_id}_default_values", $defaults, $this->settings_id);
        }
    }
}
