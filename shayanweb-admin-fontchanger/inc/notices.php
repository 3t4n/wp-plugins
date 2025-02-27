<?php
if (!defined('ABSPATH')){
	exit; // Exit if accessed directly.
}
//
//
// shayanweb fontchanger: options notice
function shayanweb_fontchanger_options_notice(){
	if (get_option('shayanweb_fontchanger_options_adminnotice_ignore_options')!== 'true') {
		echo '<div class="notice notice-info shayanweb-admin-notice" style="font-size:15px"><p style="font-size:15px;line-height:2.2">'.
		__('<strong>🟣 افزونه‌ی تغییر فونت شایان وب:</strong> تبریک! فونت پیشخوان وردپرس شما تغییر کرد.😍✅ سپاس از استفاده از این افزونه؛ حتما تنظیمات افزونه‌ی تغییر فونت شایان وب را بررسی کنید!'.
		' <div style="margin-top:10px;display:block"><a target="_blank" class="button button-primary" href="'.admin_url('options-general.php?page=shayanweb-fontchanger-options').'">مشاهده‌ی تنظیمات افزونه</a>' .
		' | <a class="button button-secondary" href="?shweb-ignore-notice-options">انجام دادم / عدم نمایش مجدد این پیام</a></div>' .
		'</p></div>','shayanweb-admin-fontchanger');
	}
}
add_action('admin_notices','shayanweb_fontchanger_options_notice');
//
// ignore notice
function shayanweb_fontchanger_options_adminnotice_ignore_options(){
	if (isset($_GET['shweb-ignore-notice-options'])) {
		update_option('shayanweb_fontchanger_options_adminnotice_ignore_options','true');
	}
}
add_action('admin_init','shayanweb_fontchanger_options_adminnotice_ignore_options');
