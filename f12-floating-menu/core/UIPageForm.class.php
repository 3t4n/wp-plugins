<?php

namespace forge12\floating_menu {
    if (!defined('ABSPATH')) {
        exit;
    }

    abstract class UIPageForm extends UIPage
    {
        /**
         * define if the button for the submit should be displayed or not.
         * if hidden, the wp_nonce will also be removed. Ensure you handle
         * the save process on your own. The onSave function will still be called
         *
         * @var bool
         */
        private $hide_submit_button = false;

        /**
         * @return mixed
         */
        protected function maybeSave()
        {
            if (isset($_POST['f12_floating_menu_settings_nonce']) && wp_verify_nonce($_POST['f12_floating_menu_settings_nonce'], 'f12_floating_menu_settings_action')) {
                $settings = array();

                $settings = apply_filters('f12-' . $this->slug . '-settings', $settings);

                $settings = apply_filters('f12_ui_' . $this->slug . '_before_on_save', $settings);

                $settings = $this->onSave($settings);

                $settings = apply_filters('f12_ui_' . $this->slug . '_after_on_save', $settings);

                update_option('f12-' . $this->slug . '-settings', $settings);

                Messages::getInstance()->add(__('Settings updated', $this->domain), 'success');
            }
        }

        /**
         * Option to hide the submit button
         *
         * @param bool $hide
         *
         * @return void
         */
        protected function hideSubmitButton($hide)
        {
            $this->hide_submit_button = $hide;
        }

        /**
         * Returns true if the button should be hidden.
         *
         * @return bool
         */
        protected function isSubmitButtonHidden()
        {
            return $this->hide_submit_button;
        }

        /**
         * Update the settings and return them
         *
         * @param $settings
         *
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

            $settings = array();
            $settings = apply_filters('f12-' . $this->slug . '-settings', $settings);

            echo Messages::getInstance()->getAll();
            ?>
            <div class="box">
                <form action="" method="post">
                    <?php
                    do_action('f12_floating_menu_ui_' . $page . '_before_content', $settings);
                    $this->theContent($slug, $page, $settings);
                    do_action('f12_floating_menu_ui_' . $page . '_after_content', $settings);


                    if (!$this->isSubmitButtonHidden()):
                        wp_nonce_field('f12_floating_menu_settings_action', 'f12_floating_menu_settings_nonce');
                        ?>
                        <input type="submit" name="floatingmenu-settings-submit" class="button"
                               value=" <?php _e('Save', $this->domain); ?>"/>
                    <?php endif; ?>
                </form>
            </div>
            <?php
        }
    }
}