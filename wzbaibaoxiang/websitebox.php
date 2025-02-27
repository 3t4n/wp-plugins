<?php  
/*
Plugin Name: 网站百宝箱
Description: 置顶,网页宠物, 哀悼, 禁止复制, 禁止查看源码, 弹幕, WP优化,媒体分类,预加载,定时发布,在线客服, 留言板, 手机客服, 网站背景, 公告, 跑马灯, 水印, 分享, 打赏, 海报图, 广告,数据库管理,图片加载特效。
Version: 1.0.1
Author: 沃之涛科技
Author URI: https://www.rbzzz.com
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

if(!defined('ABSPATH'))exit;
// 声明全局变量
global $wpdb,$websitebox_log;
$websitebox_log = get_option('websitebox_log');
define('WEBSITEBOX_FILE',__FILE__);
define('WEBSITEBOX_VERSION','1.0.1');
define('WEBSITEBOX_NAME',plugin_basename(__FILE__));
define('WEBSITEBOX_URL','http://wp.seohnzz.com');
define('WEBSITEBOX_SALT','seohnzz.com');
require plugin_dir_path( WEBSITEBOX_FILE ) . 'inc/index.php';
require plugin_dir_path( WEBSITEBOX_FILE ) . 'inc/post.php';
require plugin_dir_path( WEBSITEBOX_FILE ) . 'inc/header.php';
require plugin_dir_path( WEBSITEBOX_FILE ) . 'inc/footer.php';
require plugin_dir_path( WEBSITEBOX_FILE ) . 'inc/media.php';
$websitebox_youhua = get_option('websitebox_youhua');
if($websitebox_youhua!==false){
    require plugin_dir_path( WEBSITEBOX_FILE ) . 'inc/youhua.php';
    new websitebox_youhua($websitebox_youhua);
}
$websitebox = new websitebox();
$websitebox_post = new websitebox_post();
new websitebox_foot();
new websitebox_head();
new websitebox_media();








