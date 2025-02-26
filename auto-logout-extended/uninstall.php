<?php
// WP_UNINSTALL_PLUGINが定義されているかチェック
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

// オプション設定の削除
delete_option( '_al_ext' );
