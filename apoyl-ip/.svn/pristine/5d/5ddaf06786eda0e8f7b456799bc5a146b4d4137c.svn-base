<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_IP
 * @subpackage APOYL_IP/public/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
$aid = (int) get_the_ID();
$row = (array) $wpdb->get_row('SELECT * FROM ' . $wpdb->prefix . 'apoyl_ip WHERE postid=' . $aid);

if ($row) {
    if ($arr['openip']) {
        $author .= ' <span style="color:#ccc"> IP: ' . esc_attr($row['ip']) . '</span>';
    }
    if ($arr['openiplocation']) {
        $file = apoyl_ip_file('getiplocation');

        if ($file) {
            include $file;
        } else {
            $author .= ' <span style="color:#ccc">' . esc_attr($arr['ipname']) . ' ' . __('ipceshi', 'apoyl-ip') . '</span>';
        }
    }
}
?>
