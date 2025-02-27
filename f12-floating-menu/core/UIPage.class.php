<?php

namespace forge12\floating_menu {
    if (!defined('ABSPATH')) {
        exit;
    }

    abstract class UIPage
    {
        /**
         * @var string
         */
        protected $domain;
        /**
         * @var string
         */
        protected $slug;
        /**
         * @var string
         */
        protected $title;
        /**
         * @var string
         */
        protected $class;
        /**
         * @var int
         */
        protected $position = 0;

        /**
         * Constructor
         * @param UI $UI
         * @param string $domain
         */
        public function __construct($domain, $slug, $title, $position = 10, $class = '')
        {
            $this->domain = $domain;
            $this->slug = $slug;
            $this->title = $title;
            $this->class = $class;
            $this->position = $position;

            add_filter($slug.'_settings', array($this, 'getSettings'));
        }

        public function hideInMenu()
        {
            return false;
        }

        public function getPosition()
        {
            return $this->position;
        }

        public function isDashboard()
        {
            return $this->getPosition() == 0;
        }

        public function getDomain()
        {
            return $this->domain;
        }

        public function getSlug()
        {
            return $this->slug;
        }

        public function getTitle()
        {
            return __($this->title, $this->domain);
        }

        public function getClass()
        {
            return $this->class;
        }

        /**
         * @param $settings
         * @return mixed
         */
        public abstract function getSettings($settings);

        /**
         * @param string $slug - The WordPress Slug
         * @param string $page - The Name of the current Page e.g.: license
         * @return void
         */
        protected abstract function theSidebar($slug, $page);

        /**
         * @param string $slug - The WordPress Slug
         * @param string $page - The Name of the current Page e.g.: license
         * @return void
         */
        protected abstract function theContent($slug, $page, $settings);

        /**
         * @return mixed
         */
        protected function maybeSave()
        {
            if (isset($_POST[$this->slug.'_settings_nonce']) && wp_verify_nonce($_POST[$this->slug.'_settings_nonce'], $this->slug.'_settings_action')) {
                $settings = apply_filters($this->slug.'_settings', array());

                $settings = apply_filters($this->slug . '_before_on_save', $settings);

                $settings = $this->onSave($settings);

                $settings = apply_filters($this->slug . '_after_on_save', $settings);

                update_option($this->slug.'_settings', $settings);

                Messages::getInstance()->add(__('Settings updated', $this->domain), 'success');
            }
        }

        /**
         * Update the settings and return them
         * @param $settings
         * @return array
         */
        protected abstract function onSave($settings);

        /**
         * @return void
         * @private WordPress HOOK
         */
        public function renderContent($slug, $page)
        {
            if ($this->slug != $page) {
                return;
            }
            $this->maybeSave();

            $settings = apply_filters($this->slug.'_settings', array());

            echo Messages::getInstance()->getAll();
            ?>
            <div class="box">
                <form action="" method="post">
                    <?php
                    do_action($this->slug.'_ui_' . $page . '_before_content', $settings);
                    $this->theContent($slug, $page, $settings);
                    do_action($this->slug.'_ui_' . $page . '_after_content', $settings);
                    wp_nonce_field($this->slug.'_settings_action', $this->slug.'_settings_nonce');

                    ?>
                    <input type="submit" name="<?php esc_attr_e($this->slug);?>-settings-submit" class="button"
                           value=" <?php _e('Save', $this->domain); ?>"/>
                </form>
            </div>
            <?php
        }

        /**
         * @param string $slug
         * @param string $page
         * @return void
         * @private WordPress Hook
         */
        public function renderSidebar($slug, $page)
        {
            if ($this->slug != $page) {
                return;
            }
            $this->theSidebar($slug, $page);
        }
    }
}