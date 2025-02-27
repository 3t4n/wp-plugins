<?php

namespace forge12\floating_menu\component\floatingmenu {
    if (!defined('ABSPATH')) {
        exit;
    }

    /**
     * Manage the Floating Menus
     */
    class FloatingMenuManager
    {
        /**
         * @var FloatingMenuManager|null
         */
        private static $_instance = null;

        /**
         * @return FloatingMenuManager
         */
        public static function getInstance(): FloatingMenuManager
        {
            if (null === self::$_instance) {
                self::$_instance = new FloatingMenuManager();
            }
            return self::$_instance;
        }

        /**
         * Return a list of all published Floating Menus
         * @param WP_Post $post
         * @return array<FloatingMenu>
         */
        public function getListForPostID($post): array
        {
            $posts = get_posts(array(
                'post_type' => 'floating_menu',
                'numberposts' => -1,
            ));

            $result = array();
            foreach ($posts as /** @var \WP_Post $FloatingMenuPost */ $FloatingMenuPost) {
                $FloatingMenu = new FloatingMenu($FloatingMenuPost);
                if ($FloatingMenu->isVisibleOnPost($post)) {
                    $result[] = $FloatingMenu;
                }
            }

            return $result;
        }

        /**
         * Return a list of all published Floating Menus
         * @return array
         */
        public function getList(): array
        {
            $posts = get_posts(array(
                'post_type' => 'floating_menu'
            ));

            $result = array();
            foreach ($posts as /** @var \WP_Post $Post */ $Post) {
                $result[] = new FloatingMenu($Post);
            }

            return $result;
        }
    }
}