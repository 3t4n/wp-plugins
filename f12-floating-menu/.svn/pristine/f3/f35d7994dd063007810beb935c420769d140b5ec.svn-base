<?php

namespace forge12\floating_menu\component\floatingmenu {
    if (!defined('ABSPATH')) {
        exit;
    }

	/**
	 * Dependencies
	 */
	require_once('MetaBoxFloatingMenuItems.class.php');
	require_once('MetaBoxFloatingMenuSettings.class.php');

    /**
     * Class PostType
     */
    class PostTypeFloatingMenu
    {
        /**
         * Admin constructor.
         */
        public function __construct()
        {
            add_action('init', [$this, '_registerPostType']);

			$MetaBoxFloatingMenuItems = new MetaBoxFloatingMenuItems();
            $MetaBoxFloatingMenuSettings = new MetaBoxFloatingMenuSettings();
        }

        /**
         * Register the post type
         */
        public function _registerPostType(): void
        {
            $args = [
                'public' => true,
                'label' => __('Floating Menu', 'f12_floating_menu'),
                'menu_icon' => 'dashicons-menu',
                'show_in_menu' => true,
                'menu_position' => null,
                'supports' => ['title', 'revision']
            ];

            register_post_type('floating_menu', $args);
        }
    }
}