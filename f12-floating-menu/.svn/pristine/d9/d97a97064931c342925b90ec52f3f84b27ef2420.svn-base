<?php

namespace forge12\floating_menu {
    if(!defined('ABSPATH')){
        exit();
    }

    /**
     * Class Support
     */
    class Support
    {
        /**
         * @var null
         */
        private static $_instance = null;

        /**
         * @return Support|null
         */
        public static function getInstance(){
            if(self::$_instance == null){
                self::$_instance = new Support();
            }
            return self::$_instance;
        }

        private function __construct()
        {
            $settings = get_option('f12_floating_menu_settings');

            if(is_array($settings) && (isset($settings['support']) && $settings['support'] != 0) || !isset($settings['support'])) {
                add_action('wp_footer', array($this, 'addLink'), 9999);
            }
        }

        public function addLink(){
            ?>
            <noscript><!-- Floating Menu powered By Forge12 Interactive --><a title="WordPress Agentur" href="https://www.forge12.com/">Floating Menu powered by Forge12 Interactive</a></noscript>
            <?php
        }
    }
}