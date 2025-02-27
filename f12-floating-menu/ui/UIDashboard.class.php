<?php

namespace forge12\floating_menu {
    if (!defined('ABSPATH')) {
        exit;
    }

    /**
     * Class UIDashboard
     */
    class UIDashboard extends UIPage
    {
        public function __construct($domain)
        {
            parent::__construct($domain, 'dashboard', 'Dashboard', 0);
        }

        public function getSettings($settings)
        {
            return $settings;
        }

        protected function theSidebar($slug, $page)
        {
            ?>
            <div class="box">
                <h2>
                    <?php _e('Hint:', $this->domain); ?>
                </h2>
                <p>
                    <?php _e("In the table on the left side, you'll find an list containing all Opt-Ins and the required information from your customers. Click on the hash to open aditional informations about the form and the user data. All unconfirmed opt-ins will be deleted after 7 days.", $this->domain); ?>
                </p>
            </div>
            <?php
        }

        protected function theContent($slug, $page, $settings)
        {
            if (!empty($page)) {
                return;
            }
            ?>
            <div class="box">
                <h2>
                    <?php _e('Thanks for using the F12 Floating Menu.','f12_floating_menu'); ?>
                </h2>
                <p>
                    <?php echo sprintf(__('If you have any trouble do not hesitate to take a look on our <a href="%s" target="_blank">community board</a>.'), 'https://forum.forge12.com/'); ?>
                </p>
            </div>
            <?php
        }

        protected function onSave($settings)
        {
            return $settings;
        }
    }
}