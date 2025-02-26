<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'AL_EXT' ) ) {

	include_once al_ext_config::AL_EXT_TRAIT_DIR . 'al_ext_trait.php';
	include_once al_ext_config::AL_EXT_TRAIT_DIR . 'al_ext_force_trait.php';

	class AL_EXT {

		use al_ext_trait, al_ext_force_trait;

		private $options;

		public function __construct() {
			$this->options = get_option( '_al_ext' );
			if(!$this->options){
				return;
			}
			if ( $this->options['type'] == 1 ) {
				$this->normal_expire();
			} elseif ( $this->options['type'] == 2 ) {
				$this->force_logout();
			} elseif ( $this->options['type'] = 3 ) {
				$this->set_extend_expire();
			}
		}

		public function normal_expire() {
			add_filter( 'auth_cookie_expiration', array( $this, 'login_expire_change' ) );
			add_action( 'wp_logout', array( $this, 'delete_al_ext_cookie' ) );
		}

		public function force_logout() {
			add_filter( 'auth_cookie_expiration', array( $this, 'login_expire_change' ) );
			add_action( 'after_setup_theme', array( $this, 'set_force_al_ext_cookie' ) );
			add_action( 'init', array( $this, 'can_logged_in_extend' ) );
			add_action( 'wp_login', array( $this, 'my_force_login' ) );
			add_action( 'wp_logout', array( $this, 'delete_al_ext_cookie' ) );
		}

		public function set_extend_expire() {
			add_filter( 'auth_cookie_expiration', array( $this, 'login_expire_change' ) );
			add_action( 'after_setup_theme', array( $this, 'set_al_ext_cookie' ) );
			add_action( 'init', array( $this, 'can_logged_in_extend' ) );
			add_action( 'wp_login', array( $this, 'my_login' ) );
			add_action( 'wp_logout', array( $this, 'delete_al_ext_cookie' ) );
		}

		/**
		 *
		 * ログイン期間の設定
		 *
		 * @param $expire
		 *
		 * @return float|int
		 */
		public function login_expire_change( $expire ) {
			if ( isset( $this->options['expire_date'] ) ) {
				return 60 * 60 * 24 * $this->options['expire_date'];
			}

			return 60 * 60 * 24 * al_ext_config::AL_EXT_DEFAULT_EXPIRE_DATE;
		}

		/**
		 * ログインチェック
		 * @throws Exception
		 */
		public function can_logged_in_extend() {
			if ( $this->is_exclude_user() ) {
				return;
			}
			if ( isset( $_COOKIE[ al_ext_config::AL_EXT_TMP_COOKIE ] ) && is_user_logged_in() ) {
				$prev_time    = new DateTime( date( 'Y-m-d H:i:s', $_COOKIE[ al_ext_config::AL_EXT_TMP_COOKIE ] ) );
				$current_time = new DateTime( date( 'Y-m-d H:i:s' ) );
				$diff         = $prev_time->diff( $current_time );
				$time_diff    = $diff->days * 24 * 60 + $diff->h * 60 + $diff->i * 60 + $diff->s;
				$expire       = $this->set_force_expire_time();
				if ( $time_diff > $expire ) {
					wp_logout();
					exit();
				} else {
					$this->create_tmp_cookie();
				}
			}
		}

		/**
		 * 拡張ログアウトの一時Cookieと確認用Cookieを削除
		 */
		public function delete_al_ext_cookie() {
			setcookie( al_ext_config::AL_EXT_REMEMBER_COOKIE, '', time() - 30 );
			setcookie( al_ext_config::AL_EXT_TMP_COOKIE, '', time() - 30 );
			if ( ! empty( $this->options['force_logout_url'] ) ) {
				wp_redirect( esc_url( $this->options['force_logout_url'] ) );
			} else {
				wp_redirect( esc_url( al_ext_config::get_default_logout_url() ) );
			}
		}

		private function set_force_expire_time() {
			if ( isset( $this->options['force_logout'] ) ) {
				return $this->options['force_logout'] * 60;
			}

			return 60 * al_ext_config::AL_EXT_DEFAULT_EXPIRE_TIME;
		}

		private function create_tmp_cookie() {
			//バックグラウンドのHeartbeat APIが実行されたときは一時Cookieを更新しない
			if ( ! wp_doing_ajax() ) {
				$current_time = strtotime( date( 'Y/m/d H:i:s' ) );
				setcookie( al_ext_config::AL_EXT_TMP_COOKIE, $current_time, 0, '/' );
			}
		}

		//自動ログアウト除外ユーザ判定
		private function is_exclude_user(): bool {
			if ( ! is_user_logged_in() ) {
				return false;
			}
			$excludes          = get_option( '_al_ext' )['exclude_users'];
			$current_user_role = wp_get_current_user()->roles[0];
			if ( $excludes[ $current_user_role ] == '1' ) {
				return true;
			}

			return false;
		}

	}

}


