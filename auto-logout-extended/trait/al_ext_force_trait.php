<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
if ( ! trait_exists( 'al_ext_force_trait' ) ) {

	/**
	 * 自動ログアウト
	 * Trait al_ext_force_trait
	 */

	trait al_ext_force_trait {

		/**
		 * 自動ログアウトの一時Cookie作成
		 */
		public function set_force_al_ext_cookie() {
			//自動ログアウト除外ユーザの判定
			if($this->is_exclude_user()){
				return;
			}
			//ログイン＋一時Cookieが存在する場合、一時Cookieを更新する
			if ( isset( $_COOKIE[ al_ext_config::AL_EXT_TMP_COOKIE ] ) && is_user_logged_in() ) {
				$this->create_tmp_cookie();
			}
		}

		/**
		 * 自動ログアウトのログイン：remembermeを元に一時Cookieを作成
		 */
		public function my_force_login() {
			if ( isset( $_POST['rememberme'] ) ) {
				//一時ログインCookieを生成
				$this->create_tmp_cookie();
			}
		}

	}

}