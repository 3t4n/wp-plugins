<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'AL_EXT_SETTING' ) ) {


	class AL_EXT_SETTING {

		public function __construct() {
			add_action( 'admin_menu', array( $this, 'add_pages' ) );
		}

		public function add_pages() {
			add_menu_page(
				'ログアウト拡張',
				'Auto Logout Extended',
				'level_8',
				__FILE__,
				array(
					$this,
					'show_option_page'
				),
				''
			);
		}

		public function show_option_page() {
			$update_option = filter_input( INPUT_POST, '_al_ext', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY );
			if ( ! empty( $update_option ) ) {
				check_admin_referer( 'al_ext_options', '_al_ext_nonce' );
				update_option( '_al_ext', $update_option );
				include al_ext_config::AL_EXT_TEMPLATE_DIR . 'success.php';
			}
			$opt                = get_option( '_al_ext' );
			$al_ext_type        = $this->set_al_ext_parameter( $opt, 'type', al_ext_config::AL_EXT_DEFAULT_LOGOUT_TYPE );
			$expire_date        = $this->set_al_ext_parameter( $opt, 'expire_date', al_ext_config::AL_EXT_DEFAULT_EXPIRE_DATE );
			$force_logout       = $this->set_al_ext_parameter( $opt, 'force_logout', al_ext_config::AL_EXT_DEFAULT_EXPIRE_TIME );
			$force_logout_url   = $this->set_al_ext_parameter( $opt, 'force_logout_url', '' );
			$default_logout_url = al_ext_config::get_default_logout_url();
			$exclude_users      = $this->create_exclude_user_data();
			include al_ext_config::AL_EXT_TEMPLATE_DIR . 'al_ext_form.php';
		}

		private function set_al_ext_parameter( $opt, $target, $default ) {
			if ( isset( $opt[ $target ] ) && ! empty( $opt[ $target ] ) ) {
				return $opt[ $target ];
			} else {
				return $default;
			}
		}

		private function create_exclude_user_data(): array {
			return array(
				'administrator' => '管理者',
				'editor'        => '編集者',
				'author'        => '投稿者',
				'contributor'   => '寄稿者',
				'subscriber'    => '購読者',
			);
		}

		private function check_exclude_user( $user_role ) {
			$opt = get_option( '_al_ext' );
			if ( ! isset( $opt['exclude_users'] ) ) {
				return;
			}
			foreach ( $opt['exclude_users'] as $user => $role ) {
				if ( $user_role == $user ) {
					return $role;
				}
			}
		}

	}

}