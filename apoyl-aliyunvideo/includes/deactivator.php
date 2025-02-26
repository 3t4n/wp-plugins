<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    APOYL_ALIYUNVIDEO
 * @subpackage APOYL_ALIYUNVIDEO/includes
 * @author     凹凸曼 <3201361925@qq.com>
 *
 */
class Apoyl_Aliyunvideo_Deactivator {

	
	public static function deactivate() {
        wp_clear_scheduled_hook('apoyl_aliyunvideo_add_cron_interval');
	}

}
