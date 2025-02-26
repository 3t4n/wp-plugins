<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
if ( ! trait_exists( 'al_ext_trait' ) ) {

	/**
	 * 拡張ログアウト
	 * Trait al_ext_trait
	 */
	trait al_ext_trait {
		/**
		 * 拡張ログアウトの一時Cookie作成
		 */
		public function set_al_ext_cookie() {
			//自動ログアウト除外ユーザの判定
			if ( $this->is_exclude_user() ) {
				return;
			}
			if ( is_user_logged_in() ) {
				//rememberme cookieが存在する場合は一時Cookieを作成する
				if ( isset( $_COOKIE[ al_ext_config::AL_EXT_REMEMBER_COOKIE ] )
				     && ! isset( $_COOKIE[ al_ext_config::AL_EXT_TMP_COOKIE ] ) ) {
					$this->create_tmp_cookie();
				}
			}
		}

		/**
		 * 拡張ログアウト時のログイン：remembermeを元に一時Cookieを作成
		 */
		public function my_login() {
			//ログイン継続のチェックがあれば、Cookieに保存する
			if ( isset( $_POST['rememberme'] ) ) {
				$this->create_remember_cookie();
				//一時ログインCookieを生成
				$this->create_tmp_cookie();
			} else {
				setcookie( al_ext_config::AL_EXT_REMEMBER_COOKIE, '', time() - 30 );
			}
		}

		private function create_remember_cookie() {
			$expire = $this->set_remember_cookie_expire_time();
			setcookie( al_ext_config::AL_EXT_REMEMBER_COOKIE, 'al_ext_remember', $expire, '/' );
		}

		private function set_remember_cookie_expire_time() {
			if ( isset( $this->options['expire_date'] ) ) {
				return time() + 60 * 60 * 24 * $this->options['expire_date'];
			}

			return time() + 60 * 60 * 24 * al_ext_config::AL_EXT_DEFAULT_EXPIRE_DATE;
		}

	}
}