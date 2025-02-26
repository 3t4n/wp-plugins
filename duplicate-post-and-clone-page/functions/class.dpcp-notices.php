<?php
defined('ABSPATH') || exit;
class DPCPAdminNotice
{
    const NOTICE_FIELD = 'dpcp_admin_notice_message';

    public function display_admin_notice()
    {
        $option = get_option(self::NOTICE_FIELD);
        $message = isset($option['message']) ? $option['message'] : false;
        $noticeLevel = !empty($option['notice-level']) ? $option['notice-level'] : 'notice-error';

        if ($message) {
            echo "<div class='notice " . esc_html($noticeLevel) . " is-dismissible'><p>" . wp_kses_post($message) . "</p></div>";
            delete_option(self::NOTICE_FIELD);
        }
    }

    public static function display_error($message)
    {
        self::update_option($message, 'notice-error');
    }

    public static function display_warning($message)
    {
        self::update_option($message, 'notice-warning');
    }

    public static function display_info($message)
    {
        self::update_option($message, 'notice-info');
    }

    public static function display_success($message)
    {
        self::update_option($message, 'notice-success');
    }

    protected static function update_option($message, $noticeLevel)
    {
        update_option(self::NOTICE_FIELD, [
            'message' => $message,
            'notice-level' => $noticeLevel
        ]);
    }
}
