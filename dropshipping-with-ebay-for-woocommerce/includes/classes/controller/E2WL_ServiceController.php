<?php
/**
 * Description of E2WL_ServiceController
 *
 * @author Andrey
 * 
 * @autoload: e2wl_init
 */

if (!class_exists('E2WL_ServiceController')) {

    class E2WL_ServiceController {

        private $system_message_update_period = 7200; //60*60*2;

        public function __construct() {

            $system_message_last_update = intval(e2wl_get_setting('system_message_last_update'));
            if (!$system_message_last_update || $system_message_last_update < time()) {
                e2wl_set_setting('system_message_last_update', time() + $this->system_message_update_period);

                $request = e2wl_remote_get('http://ma-group5.com/api/v1/system_message.php');
                if (!is_wp_error($request) && intval($request['response']['code']) == 200) {
                    $system_message = json_decode($request['body'], true);
                    e2wl_set_setting('system_message', $system_message);
                }
            }
        }

    }

}