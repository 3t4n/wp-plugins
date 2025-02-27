<?php

namespace forge12\floating_menu\component\floatingmenu {

    use forge12\floating_menu\UISettings;

    if (!defined('ABSPATH')) {
        exit;
    }

    /**
     * A unique FloatingMenu Item
     */
    class FloatingMenu
    {
        /**
         * @var \WP_Post
         */
        private $_post;

        /**
         * @var array
         */
        private $_links = array();
        /**
         * @var array
         */
        private $_settings;

        /**
         * Admin constructor.
         */
        public function __construct($post)
        {
            $this->_post = $post;

            $this->initLinks();
            $this->initSettings();
        }

        /**
         * Get the Floating Menu ID
         *
         * @return int
         */
        public function getID(): int
        {
            return $this->_post->ID;
        }

        /**
         * Return the Position of the current Floating Menu
         */
        public function getPosition(): string
        {
            return get_theme_mod($this->_post->post_name . '_position', $this->_settings['position']);
            //return $this->_settings['position'];
        }

        /**
         * Check if the position is a corner position
         *
         * @return bool
         */
        public function isPositionAtCorner(): bool
        {
            $corners = array(
                'upperleft', 'upperright', 'lowerleft', 'bottomright'
            );

            return in_array($this->getPosition(), $corners);
        }

        /**
         * Return the size of the attachment for the current menu
         *
         * @return int
         */
        public function getAttachmentSize(): int
        {
            $value = $this->_settings['attachment_size'];
            if (empty($value) || !is_numeric($value)) {
                $globalSettings = UISettings::getOptions();
                $value = $globalSettings['attachment_size'];
            }

            return (int)$value;
        }

        /**
         * Return the Font Size
         *
         * @return int
         */
        public function getFontSize(): int
        {
            $value = $this->_settings['font_size'];
            if (empty($value) || !is_numeric($value)) {
                $globalSettings = UISettings::getOptions();
                $value = $globalSettings['font_size'];
            }

            return (int)$value;
        }

        /**
         * Return the color for the links as hex code
         *
         * @return string
         */
        public function getLinkColor(): string
        {
            $value = $this->_settings['link_color'];
            if (empty($value)) {
                $globalSettings = UISettings::getOptions();
                $value = $globalSettings['link_color'];
            }

            return $value;
        }

        /**
         * Return the color for the hover of links as hex code
         *
         * @return string
         */
        public function getLinkColorHover(): string
        {
            $value = $this->_settings['link_color_hover'];
            if (empty($value)) {
                $globalSettings = UISettings::getOptions();
                $value = $globalSettings['link_color_hover'];
            }

            return $value;
        }

        /**
         * Return the background color of the icon box
         *
         * @return string
         */
        public function getBackgroundColor(): string
        {
            $value = $this->_settings['background_color'];
            if (empty($value)) {
                $globalSettings = UISettings::getOptions();
                $value = $globalSettings['background_color'];
            }

            return $value;
        }

        /**
         * Return the background color of the icon box
         *
         * @return string
         */
        public function getBackgroundColorHover(): string
        {
            $value = $this->_settings['background_color_hover'];
            if (empty($value)) {
                $globalSettings = UISettings::getOptions();
                $value = $globalSettings['background_color_hover'];
            }

            return $value;
        }

        /**
         * Return the icon padding
         *
         * @return string
         */
        public function getIconPadding(): string
        {
            $value = $this->_settings['icon_padding'];
            if (empty($value)) {
                $globalSettings = UISettings::getOptions();
                $value = $globalSettings['icon_padding'];
            }

            return (int)$value;
        }

        /**
         * Load the Links
         * This can be updated in later versions of the plugins to remove the get_post_meta and use only the get theme mod.
         */
        public function initLinks()
        {
            $links = get_post_meta($this->_post->ID, '_floating_links', true);

            /*
             * Load customizer value
             */
            $value = get_theme_mod($this->_post->post_name . '_floating_links', $links);
            /*
             * Remove the Theme Mod Settings
             */
            $value = '';

            /*
             * If value is an array, this means the default value has been set ($links). Otherwise, it will return a
             * json encoded string set by the customizer.
             */
            if(!is_array($value) && !empty($value)){
                /*
                 * Try to decode the string via json. The output should be an array.
                 */
                $value = json_decode($value, true);

                /*
                 * Only if the result of the json decode is an array, we do set it as the link.
                 */
                if(is_array($value)){
                   $links = $value;
                }
            }

            if (!empty($links)) {
                $this->_links = $links;
            }
        }

        /**
         * Check if the distance animation has been enabled
         *
         * @return bool
         */
        public function isAnimationDistanceEnabled(): bool
        {
            $value = $this->getOption('animation_distance', true);

            if (strcmp($value, 'enabled') === 0) {
                return true;
            } else {
                return false;
            }
        }

        /**
         * Check if the distance animation has been enabled
         *
         * @return bool
         */
        public function isAnimationSlideoutEnabled(): bool
        {
            $value = $this->getOption('animation_slideout', true);

            if (strcmp($value, 'enabled') === 0) {
                return true;
            } else {
                return false;
            }
        }

        /**
         * Get the display settings
         *
         * @return string
         */
        public function getDisplaySetting(): string
        {
            $value = $this->_settings['display_settings'];
            if (strcmp($value, 'default') === 0) {
                $globalSettings = UISettings::getOptions();
                $value = $globalSettings['display_settings'];
            }
            return $value;
        }

        /**
         * Returns if the floating menu should be displayed on tablet devices.
         *
         * @return bool
         */
        public function isVisibleOnDesktopDevices(): bool
        {
            $value = $this->getOption('display_responsive_desktop');
            if (strcmp($value, 'default') === 0) {
                $globalSettings = UISettings::getOptions();
                $value = $globalSettings['display_responsive_desktop'];
            }

            if (strcmp($value, 'visible') === 0) {
                return true;
            }
            return false;
        }

        /**
         * Returns if the floating menu should be displayed on tablet devices.
         *
         * @return bool
         */
        public function isVisibleOnTabletDevices(): bool
        {
            $value = $this->getOption('display_responsive_tablet');
            if (strcmp($value, 'default') === 0) {
                $globalSettings = UISettings::getOptions();
                $value = $globalSettings['display_responsive_tablet'];
            }

            if (strcmp($value, 'visible') === 0) {
                return true;
            }
            return false;
        }

        /**
         * Returns if the floating menu should be displayed on mobile devices.
         *
         * @return bool
         */
        public function isVisibleOnMobileDevices(): bool
        {
            $value = $this->getOption('display_responsive_mobile');
            if (strcmp($value, 'default') === 0) {
                $globalSettings = UISettings::getOptions();
                $value = $globalSettings['display_responsive_mobile'];
            }

            if (strcmp($value, 'visible') === 0) {
                return true;
            }
            return false;
        }

        /**
         * @return array
         */
        public function getDefaultSettings()
        {
            return array(
                'pages_all' => 0,
                'pages_post_type' => array(),
                'pages' => '',
                'position' => '',
                'attachment_size' => 32,
                'link_color' => '',
                'link_color_hover' => '',
                'background_color' => '',
                'background_color_hover' => '',
                'font_size' => 16,
                'icon_padding' => 5,
                'animation_distance' => 'default',
                'animation_slideout' => 'default',
                'display_settings' => 'default',
                'display_responsive_tablet' => 'default',
                'display_responsive_mobile' => 'default',
                'display_responsive_desktop' => 'default',
            );
        }

        /**
         * Load the Settings
         */
        public function initSettings()
        {
            $settings = $this->getDefaultSettings();

            $metadata = get_post_meta($this->_post->ID, '_floating_settings', true);

            if (is_array($metadata)) {
                $settings = array_merge($settings, $metadata);
            }

            $this->_settings = $settings;
        }

        /**
         * @return array
         */
        public function getSettings(): array
        {
            return $this->_settings;
        }

        /**
         * Return an array containing all Post Types for the given floating_menu that should display the menu.
         * @return array
         */
        public function getListOfEnabledPostTypes(){
            $list = $this->getOption('pages_post_type');

            if(!is_array($list)){
                $list = json_decode($list);
            }

            if(!is_array($list)){
                return array();
            }

            return $list;
        }

        /**
         * Return an array of Post Types
         * @return array
         */
        public function getPostTypes(){
            $default_value = $this->getOption('pages_post_type');

            if(!is_array($default_value)) {
                $default_value = json_decode($default_value, true);
            }

            if (!is_array($default_value)) {
                $default_value = [];
            }

            return $default_value;
        }

        /**
         * Use to get an option either by settings or by theme_mod.
         *
         * @param string $key
         * @param bool $use_global - Returns the global value.
         *
         * @return mixed
         * @since v1.3
         *
         */
        public function getOption($key, $use_global = false)
        {
            $default_value = isset($this->_settings[$key]) ? $this->_settings[$key] : '';

            //remove_theme_mod($this->_post->post_name . '_pages_post_type');
            $value = get_theme_mod($this->_post->post_name . '_' . $key, $default_value);

            if (!$use_global) {
                return $value;
            }

            if (!empty($value) && $value !== 'default') {
                return $value;
            }

            $global_settings = UISettings::getOptions();
            $global_value = $global_settings[$key];

            return $global_value;
        }

        /**
         * @return array
         */
        public function getLinks(): array
        {
            return $this->_links;
        }

        /**
         * Check if the current floating menu is visible on the given post id
         *
         * @param \WP_Post $Post
         */
        public function isVisibleOnPost($Post): bool
        {
            /*
             * Check if the "display on all pages" option is active for the given menu.
             */
            if ($this->getOption('pages_all') == 1) {
                return true;
            }

            /*
             * Check if the post type is within the allowed parameters.
             */
            if (in_array($Post->post_type, $this->getListOfEnabledPostTypes())) {
                return true;
            }

            /*
             * Check if the post is within the given ids.
             */
            $pages = explode(',', $this->getOption('pages'));

            return in_array($Post->ID, $pages);
        }
    }
}