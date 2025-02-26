<?php

namespace Optemiz\Dashboard;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class Sidebar
 */
if ( ! class_exists( '\Optemiz\Dashboard\Sidebar' ) ) {
    class Sidebar {
    
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
            $default_args = [
                'box_classes' => [],
                'items' => [
                    [
                        'icon_url' => '',
                        'type' => 'review',
                        'label' => __('Show your love'),
                        'content' => __('We love to have you in the Optemiz family. We are making it more awesome everyday.'),
                        'buttons' => [
                            [
                                'button_label' => __('Rate Us'),
                                'button_url' => 'https://optemiz.com',
                                'button_classes' => ['opt-right-side-bar-span'],
                            ]
                        ],
                    ],
                    [
                        'icon_url' => '',
                        'type' => 'documentation',
                        'label' => __('Documentation'),
                        'content' => __('Get started spending some time with the documentation to get familiar with Optemiz. Build awesome websites for you or your clients with ease.'),
                        'buttons' => [
                            [
                                'button_label' => __('Let\'s Explore'),
                                'button_url' => 'https://optemiz.com',
                                'button_classes' => ['opt-right-side-bar-span'],
                            ]
                        ],
                    ],
                    [
                        'icon_url' => '',
                        'type' => 'support',
                        'label' => __('Need Help'),
                        'content' => __('Stuck with something? Get help from the community Optemiz Forum or Facebook Community. In case of emerhency, Initiate live chat at the Optemiz website.'),
                        'buttons' => [
                            [
                                'button_label' => __('Let\'s Explore'),
                                'button_url' => 'https://optemiz.com',
                                'button_classes' => ['opt-right-side-bar-span'],
                            ]
                        ],
                    ],
                    [
                        'icon_url' => '',
                        'type' => 'subscribe',
                        'label' => __('Subscribe to Newsletter'),
                        'content' => __('Subscribe to our mailing list for get any news of Our plugins and activities.'),
                        'buttons' => [
                            [
                                'button_label' => __('Subscribe'),
                                'button_url' => 'https://optemiz.com',
                                'button_classes' => ['opt-right-side-bar-span'],
                            ]
                        ],
                    ],
                ]
            ];
    
            $args = wp_parse_args($args, $default_args);
    
            $this->settings_obj['sidebar'] = $args;
    
            return apply_filters("filter_opt_sidebar_{$this->settings_id}_args", $args );
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
    
            return apply_filters("filter_opt_sidebar_{$this->settings_id}_default_values", $defaults, $this->settings_id);
        }
    }
}
