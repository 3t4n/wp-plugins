<?php

namespace Optemiz\Dashboard;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class Tab
 */
if ( ! class_exists( '\Optemiz\Dashboard\Tab' ) ) {
	class Tab extends AbstractTab {

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
		 * Set Tab.
		 *
		 * @return array
		 */
		public function set($key, $args) {

			$defaults = array(
				'label' => __("General"),
				'classes' => [],
			);

			//@TODO need to bring default arguments from default method
			$args = wp_parse_args($args, $defaults);

			$this->settings_obj->settings['form']['items'][$key]['menu'] = $args;

			return apply_filters("filter_opt_tab_{$this->settings_id}_args", $defaults, $this->settings_id);
		}

		/**
		 * Returns Field's Default Value.
		 *
		 * @return array
		 */
		protected function defaults() {
			$defaults = array(
				'label' => __("General"),
				'classes' => [],
			);

			return apply_filters("filter_opt_tab_{$this->settings_id}_default_values", $defaults, $this->settings_id);
		}
	}
}
