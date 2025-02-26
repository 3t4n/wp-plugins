<?php
namespace Wp_Administration_Style;

defined('ABSPATH') or die();

/**
 * Plugin Name:                       استایل مدیریت وردپرس
 * Description:                       رابط کاربری و تجربه کاربری داشبورد مدیریت وردپرس را بهبود می‌بخشد.
 * Version:                           7.4.2
 * Tested up to:                      6.7
 * Requires at least:                 5.0
 * Requires PHP:                      7.4
 * Author:                            بابک فرخوپاک
 * Author URI:                        https://babakfp.ir
 * License:                           GPLv3 or later
 * License URI:                       https://www.gnu.org/licenses/gpl-3.0.html
 * Tags:                              Farsi, فونت, فارسی, داشبورد, پیشخوان
 * Text Domain:                       wp-administration-style
 */

define('WP_ADMINISTRATION_STYLE', [
    'VERSION' => '7.4.2',
    'PATH' => plugin_dir_path(__FILE__),
    'URL' => plugin_dir_url(__FILE__),
]);

require_once WP_ADMINISTRATION_STYLE['PATH'] . 'includes/core.php';
