<?php
/**
 * Plugin Name: Attach Excel Invoice WOOC - WPSHARE247
 * Plugin URI: https://wpshare247.com/
 * Description: Cho phép tạo file excel có nội dung hóa đơn gửi đính kèm khi gửi email đặt hàng.
 * Version: 1.1
 * Author: Wpshare247.com
 * Author URI: https://wpshare247.com
 * Text Domain: wpshare247-attach-excel-invoice-wooc
 * Domain Path: /languages/
 * Requires at least: 4.9
 * Requires PHP: 5.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WPSHARE247_AEIWOOC', __FILE__ );
define( 'WPSHARE247_AEIWOOC_PLUGIN_DIR', untrailingslashit( dirname( WPSHARE247_AEIWOOC ) ) );
define( 'WPSHARE247_AEIWOOC_PLUGIN_INC_DIR', WPSHARE247_AEIWOOC_PLUGIN_DIR . '/inc' );
require_once WPSHARE247_AEIWOOC_PLUGIN_INC_DIR . '/define.php';
require_once WPSHARE247_AEIWOOC_PLUGIN_INC_DIR . '/utils.php';
require_once WPSHARE247_AEIWOOC_PLUGIN_INC_DIR . '/class.helper.php';
require_once WPSHARE247_AEIWOOC_PLUGIN_INC_DIR . '/class.setting.page.php';

if( Aeiwooc::is_woocommerce_active() ){
	require_once WPSHARE247_AEIWOOC_PLUGIN_INC_DIR . '/theme_functions.php';
}
