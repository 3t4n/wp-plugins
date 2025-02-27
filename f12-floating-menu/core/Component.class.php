<?php
namespace forge12\floating_menu {
    /**
     * Abstract class for the components
     */
    abstract class Component{
        /**
         * @return string The component name.
         */
        public abstract function getName(): string;

        /**
         * @return void
         */
        protected abstract function onInit():void;

        /**
         * Run to initialize the component
         * @return void
         */
        public function init(): void{
            $this->onInit();
        }
    }
}