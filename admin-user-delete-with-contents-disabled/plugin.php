<?php
/*
Plugin Name: Admin User Delete With Contents Disabled
Plugin URI: https://github.com/3rd-cloud/WPPlugin_AdminUserDeleteWithContentsDisabled
Description: ユーザー削除時に「すべてのコンテンツを消去します。」を選択できなくすることで、誤って記事やメディアライブラリのファイルをまとめて削除する事故を防ぎます。
Author: Yuji Mikumo
Author URI: https://github.com/3rd-cloud/
Version: 1.1
License: GPL2
*/
/*
Admin User Delete With Contents Disabled is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Admin User Delete With Contents Disabled is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Admin User Delete With Contents Disabled. If not, see https://github.com/3rd-cloud/WPPlugin_AdminUserDeleteWithContentsDisabled/blob/main/LICENSE.
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WPAdmin_User_Delete_Disabled' ) ) {
    class WPAdmin_User_Delete_Disabled {
        private $textdomain = 'wpadmin-user-delete-disabled';

        public function __construct() {
            global $pagenow;

            load_textdomain( $this->textdomain, __DIR__ . '/languages/plugin-' . get_locale() . '.mo');

            if ( is_admin() && 'users.php' === $pagenow && strpos( $_SERVER["REQUEST_URI"], 'action=delete' ) ) {
                add_action( 'after_setup_theme', array( $this, 'action_after_setup_theme' ), 10000 );
                add_action( 'shutdown', array( $this, 'action_shutdown' ), 10000 );
                add_action( 'admin_notices', array( $this, 'action_admin_notices' ), 10000 );
            }
        }

        public function action_after_setup_theme() {
            ob_start( function ( $buffer_html ) {
                $target_tag  = '/(<label)(>.*?<input.+?type="radio".+?id="delete_option0".+?)(?:value="delete")(.*?>)/';
                $replace_tag = '$1 style="color: #c0c0c0;"$2value="delete_disabled" disabled$3';
                $buffer_html = preg_replace( $target_tag, $replace_tag, $buffer_html, 1 );
                return $buffer_html;
            });
        }

        public function action_shutdown() {
            if ( ob_get_length() ) {
                ob_end_flush();
            }
        }

        public function action_admin_notices() {
            $message = __( 'Plugin', $this->textdomain )
                     .  ' : Admin User Delete With Contents Disabled<br />'
                     . __( "'Delete all content.' is changed to a setting that cannot be selected.", $this->textdomain );
            echo '<div class="updated"><p>' . $message . '</p></div>';
        }
    }
}

new WPAdmin_User_Delete_Disabled();
