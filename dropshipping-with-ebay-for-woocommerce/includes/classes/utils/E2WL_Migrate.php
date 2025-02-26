<?php

/**
 * Description of E2WL_Migrate
 *
 * @author Andrey
 *
 * @autoload: e2wl_init
 */

if (!class_exists('E2WL_Migrate')) {

    class E2WL_Migrate
    {
        public function __construct()
        {
            $this->migrate();
        }

        public function migrate()
        {
            $cur_version = get_option('e2wl_db_version', '');

            if (version_compare($cur_version, "1.1.0", '<')) {
                $this->migrate_to_110();
            }

            if (version_compare($cur_version, "1.2.0", '<')) {
                $this->migrate_to_120();
            }

            if (version_compare($cur_version, "1.2.4", '<')) {
                $this->migrate_to_124();
            }

            if (version_compare($cur_version, E2WL()->version, '<')) {
                update_option('e2wl_db_version', E2WL()->version);
            }
        }

        private function migrate_to_110()
        {
            error_log('migrate to 1.1.0');

            e2wl_set_setting('api_endpoint', 'https://api.ali2woo.com/ebay/v1/');
        }

        private function migrate_to_120()
        {
            error_log('migrate to 1.2.0');
            E2WL_Account::getInstance()->use_custom_account(true);
        }

        private function migrate_to_124()
        {
            error_log('migrate to 1.2.4');

            e2wl_set_setting('api_endpoint', 'https://api.ali2woo.com/ebay/v1/');
        }
    }
}
