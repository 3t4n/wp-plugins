<?php

namespace forge12\floating_menu {
    if (!defined('ABSPATH')) {
        exit;
    }

    /**
     * Dependencies
     */
    require_once('Component.class.php');

    /**
     * Class Component
     */
    class ComponentManager
    {
        /**
         * Store all Components
         * @var array<Component>
         */
        private $components = [];

        /**
         * @var ComponentManager
         */
        private static $_instance;

        /**
         * @return ComponentManager
         */
        public static function getInstance(): ComponentManager{
            if(null === self::$_instance){
                self::$_instance = new ComponentManager();
            }
            return self::$_instance;
        }

        /**
         * UI constructor.
         * @param $slug
         */
        private function __construct()
        {
            $this->load(dirname(dirname(__FILE__)) . '/component', 0);

            add_action('after_setup_theme', [$this, 'doInit']);
        }

        /**
         * Initialize all Components loaded
         */
        public function doInit(){
            foreach($this->components as $Component){
                $Component->init();
            }
        }

        /**
         * Add a new component
         *
         * @param string $component_name
         * @param Component $component_object
         *
         * @return void
         */
        private function add(string $component_name, Component $component_object): void{
            $this->components[$component_name] = $component_object;
        }

        /**
         * Return a given component
         *
         * @param string $component_name
         *
         * @return Component|null
         */
        public function get(string $component_name): ?Component{
            if(!isset($this->components[$component_name])){
                return null;
            }
            return $this->components[$component_name];
        }

        /**
         * Load all components within the Components Directory
         *
         * @param string $directory
         * @param int    $lvl
         *
         * @return void
         */
        private function load(string $directory, int $lvl) : void
        {
            if (is_dir($directory)) {
                $handle = opendir($directory);

                if (!$handle) {
                    return;
                }

                while (false !== ($entry = readdir($handle))) {
                    if ($entry != '.' && $entry != '..') {
                        if (is_dir($directory . '/' . $entry) && $lvl == 0) {
                            $this->load($directory . '/' . $entry, $lvl + 1);
                        } else {
                            if (preg_match('!Controller([a-zA-Z_0-9]+)\.class\.php!', $entry, $match)) {
                                if(isset($match[1])) {
                                    // load the component
                                    require_once($directory . '/' . $entry);
                                    $className =  __NAMESPACE__."\component\Controller" . $match[1];

                                    /** @var \forge12\booking\Component $Component */
                                    $Component = new $className();
                                    $this->add($Component->getName(), $Component);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}