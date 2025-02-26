<?php

/**
 * Affilicode-Tag-Setting
 *
 * Plugin Name: Affilicode-Tag-Setting
 * Plugin URI:https://ja.wordpress.org/plugins/affilicode-tag-setting
 * Description: 固定ページと投稿ページにアフィリコード・システムで発行したタグの設定が可能になります。
 * Version: 1.0.1
 * Author: leafworks
 * Author URI: https://www.leafworks.jp/
 */

require_once("tag-hook.php");
require_once("tag-input.php");
require_once("save.php");
require_once("show.php");

add_action("admin_menu", "affilicode_tag_hook");
add_action("save_post", "affilicode_save_h");
add_action("save_post", "affilicode_save_b");
add_action("wp_head", "affilicode_show_h");
add_action("wp_footer", "affilicode_show_b");
