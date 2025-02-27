<?php

class TPUL_Reset_Service {

    public static function get_last_reset_ran() {
        $last_reset_ran = 0;
        $reset_info = get_option('tpul_settings_term_modal_reset_info');
        if (!empty($reset_info)) {
            $last_reset_ran = $reset_info['last_ran'];
        }
        return $last_reset_ran;
    }

    public static function reset() {
        $reset_info = get_option('tpul_settings_term_modal_reset_info');
        if (empty($reset_info)) {
            $reset_info = array();
        }
        $reset_info['last_ran'] = time();
        update_option('tpul_settings_term_modal_reset_info', $reset_info);
    }
}
