<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    APOYL_ALIYUNVIDEO
 * @subpackage APOYL_ALIYUNVIDEO/cron
 * @author     凹凸曼 <3201361925@qq.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
add_filter('cron_schedules', 'apoyl_aliyunvideo_add_cron_interval');
function apoyl_aliyunvideo_add_cron_interval(){
    $schedules['apoyl_aliyunvideo_two_minutes']=array(
        'interval'=>120,
        'display'=>esc_html__('Synchronize media two minutes'),

    );
    return $schedules;
}

if(!wp_next_scheduled('apoyl_aliyunvideo_add_cron_interval'))
    wp_schedule_event(time(),'apoyl_aliyunvideo_two_minutes','apoyl_aliyunvideo_add_cron_interval');

function apoyl_aliyunvideo_cron_exec(){
    global $wpdb;
    $file = apoyl_aliyunvideo_file('cronexec');
    if ($file) {
        include $file;
    }

}

add_action('apoyl_aliyunvideo_add_cron_interval', 'apoyl_aliyunvideo_cron_exec');
?>