<?php

/**
 * Geetest
 *
 * @copyright Copyright (C) 2012-2022, develop@geetest.com
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3 or higher
 *
 * @wordpress-plugin
 * Plugin Name: Geetest
 * Version:     6.1.1
 * Plugin URI:  https://wordpress.org/plugins/geetest
 * Description: GeeTest CAPTCHA is a user-friendly CAPTCHA with high security and protects your website against malicious bot traffic. The best alternative to reCAPTCHA.
 * Author:      Geetest
 * Author URI: https://www.geetest.com/en/?plugin=wordpress
 * Text Domain: geetest
 * License:     GPL v3
 * Requires at least: 5.8.2
 * WC tested up to: 6.2.2
 * Requires PHP: 7.0
 *
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

define('GEETEST_CAPTCHA_DIR', plugin_dir_path(__FILE__));
defined('GEETEST_CAPTCHA_COMMON_DIR') or define('GEETEST_CAPTCHA_COMMON_DIR', GEETEST_CAPTCHA_DIR . 'common' . '/');
define('GEETEST_CAPTCHA_JS_DIR', plugins_url('geetest') . '/common/' . 'js' . '/');
require_once GEETEST_CAPTCHA_COMMON_DIR.'function.php';
require_once GEETEST_CAPTCHA_COMMON_DIR . 'GeetestLibV4.php';
require_once GEETEST_CAPTCHA_COMMON_DIR . 'GeetestLibV3.php';
require_once 'GeetestActions.php';
$GeetestActions = new GeetestActions();

register_activation_hook(__FILE__, array($GeetestActions, 'geetest_activate'));
register_deactivation_hook(__FILE__, array($GeetestActions, 'geetest_deactivate'));

//未填写id和key错误提醒
add_action('admin_notices', array($GeetestActions, 'missing_keys_notice'));
//设置页面数据格式化的处理
add_action('admin_init', array($GeetestActions,'register_settings_group'));
//添加插件设置页面
add_action('admin_menu', array($GeetestActions, 'geetest_captcha_plugin_setting_page'));
// 插件列表加入设置按钮
add_filter('plugin_action_links', array($GeetestActions, 'geetest_captcha_setting_button'), 10, 2);
//添加注册表单
add_action('register_form', array($GeetestActions,'geetest_captcha_register_form'));
//添加登录表单
add_action('login_form', array($GeetestActions,'geetest_captcha_login_form'));
//添加评论表单
add_filter('comment_form_submit_button', array($GeetestActions,'geetest_captcha_comment_form'), 10, 1);
//添加忘记密码表单
add_action('lostpassword_form', array($GeetestActions,'geetest_captcha_lostpassword_form'));
//添加登录时的钩子
add_filter('wp_authenticate_user', array($GeetestActions, 'verify'), 10, 2);
//添加注册时验证
add_action('registration_errors', array($GeetestActions,'geetest_captcha_register_verify'), 10, 1);
//添加忘记密码时验证
add_action('lostpassword_post', array($GeetestActions,'geetest_captcha_lostpassword_verify'), 10);
//添加评论时验证
add_action('preprocess_comment', array($GeetestActions,'geetest_captcha_comment_verify'));

add_filter('woocommerce_login_credentials', [ $GeetestActions, 'remove_filter_wp_authenticate_user' ]);


//js脚本引入
add_action('admin_enqueue_scripts', array($GeetestActions, 'geetest_captcha_load_js'));
add_action('login_enqueue_scripts', array($GeetestActions, 'geetest_captcha_load_js'));
add_action('wp_enqueue_scripts', array($GeetestActions, 'geetest_captcha_load_js'));
add_action('comment_form_before', array($GeetestActions, 'geetest_captcha_load_js'));


require_once GEETEST_CAPTCHA_COMMON_DIR . 'GeetestBase.php';
