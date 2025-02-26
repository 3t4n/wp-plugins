<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<p><?php printf(esc_html__('Hello %s%s%s ( not you? %sLog out%s )', 'ambikly'), '<strong>', esc_html($display_name), '</strong>', '<a href="' . esc_url(wp_login_url()) . '">', '</a>') ?></p>
<p><?php echo esc_html__("From your account dashboard, you can easily view your recent orders, manage payments, and update your password or account settings.", "ambikly"); ?></p>