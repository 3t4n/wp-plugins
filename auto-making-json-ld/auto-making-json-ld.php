<?php
/**
 * Plugin Name: auto making JSON-LD
 * Plugin URI: https://richynokurashi.com/lp/jsonld_setting/
 * Description: 構造化データを自動生成します。（最終更新日時：2024/11/04)
 * Version: 4.4.9
 * Author: Richeal
 * Author URI:  https://richynokurashi.com
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */
if ( ! defined( 'ABSPATH' ) ) exit;

if(!defined('autoMakingJSONLD'))        define('autoMakingJSONLD', plugin_dir_path(__FILE__));
if(!defined('autoMakingJSONLD_url'))    define('autoMakingJSONLD_url', plugin_dir_url(__FILE__));

require_once(autoMakingJSONLD.'initialize.php');