<?php
namespace AMem;

use AMem\Module;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'ADMIN' ) ) :
class ADMIN extends Module {

	public $parent_slug = 'edit.php?post_type=acf-field-group';

	function __construct() {
		$this->inc = __DIR__ . '/';
		$this->name = 'amem/admin';

		add_filter( 'display_post_states', array( $this, 'add_display_post_states' ), 10, 2 );
		add_action( 'admin_notices', array( $this, 'render_notices' ), 1 );

		add_action( 'show_user_profile', array( $this, 'render_custom_user_profile_fields'), 10 );
		add_action( 'edit_user_profile', array( $this, 'render_custom_user_profile_fields'), 10 );

		add_action( 'amem_doaction_install_core_pages', array( $this, 'install_core_pages' ) );
		add_action( 'amem_doaction_not_install_core_pages', array( $this, 'not_install_core_pages' ) );

		// add_action( 'acf/input/admin_footer', array( $this, 'field_group_scripts') );
		add_action( 'admin_init', array( $this, 'install_amem_core_pages'),10 );
	}

	/**
	 *  notice 호출
	 *
	 *  @since   1.0.0
	*/
	function render_notices() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		$this->notices();
	}

	/**
	 *  기본 폼, 페이지 생성을 위한 notice
	 *
	 *  @since   1.0.0
	*/
	function notices() {
		// Re-init options while doing install core pages
		$notice = '';
		if ( current_user_can( 'manage_options' ) && ! get_option( 'amem_default_installed' ) ) {
			$url = add_query_arg(
				array(
					'amem_do_action' => 'install_core_pages',
					'_wpnonce'      => wp_create_nonce( 'install_core_pages' ),
				)
			);
			$not_url = add_query_arg(
				array(
					'amem_do_action' => 'not_install_core_pages',
					'_wpnonce'      => wp_create_nonce( 'install_core_pages' ),
				)
			);
			ob_start();
			?>
			<div class="info amem-admin-notice notice is-dismissible">
				<p>
					<?php
					// translators: %s: Plugin name.
					esc_html_e( 'Advanced Members for ACF needs to create several pages (Registration, Login, Password Reset, Account, Change Password, Delete Account, Logout) to function correctly.', 'advanced-members' );
					?>
				</p>
				<p>
					<a href="<?php echo esc_url( $url ); ?>" class="button button-primary"><?php esc_html_e( 'Create Pages', 'advanced-members' ); ?></a>
					&nbsp;
					<a href="<?php echo esc_url( $not_url ); ?>" class="button button-secondary amem_secondary_dismiss"><?php esc_html_e( 'No thanks', 'advanced-members' ); ?></a>
				</p>
			</div>
			<?php
			$notice = ob_get_clean();
			echo $notice;
		}
		add_action( 'show_user_profile', array( &$this, 'render_custom_user_profile_fields'), 10 );
		add_action( 'edit_user_profile', array( &$this, 'render_custom_user_profile_fields'), 10 );
	}

	/**
	 *  사용자 프로필 Account 폼을 보여줍니다
	 *
	 *  @since   1.0.0
	 *
	 *  @param   WP_User $user 사용자 object
	 */
	function render_custom_user_profile_fields( $user ) {
		// if( amem()->options->get('accform/account_form_showadmin') ) {
		// Removed option and provides hook
		if ( apply_filters( 'amem/account/fields/showadmin', true ) ) {
			$field_groups = $this->get_user_account_field_group($user);
			if( $field_groups ){
				acf_form_data(
					array(
						'screen'     => 'user',
						'post_id'    => 'user_'.$user->ID,
						'validation' => 1,
					)
				);

				$bypass = amem()->fields->predefined_fields();

				echo '<table class="form-table"><tbody>';
				echo '<h2>' . esc_html__('Advanced Members for ACF User Account Fields', 'advanced-members') . '</h2>';
				foreach ( $field_groups as $field_group ) {
					// vars
					$fields = acf_get_fields( $field_group );
					foreach ( $fields as $k => $field ) {
						if ( in_array($field['name'], $bypass) )
							unset($fields[$k]);
					}
					if ( $fields )
						acf_render_fields( $fields, 'user_'. $user->ID , 'tr', $field_group['instruction_placement'] );

				}
				echo '</tbody></table>';
			}
		}
	}

	public function add_display_post_states( $post_states, $post ) {
		foreach ( amem()->config->core_pages as $page_key => $page_value ) {
			$page_id = amem()->options->get( amem()->options->get_core_page_id($page_key) );
			if ( $page_id == $post->ID ) {
				$post_states[ 'amem_' . $page_key ] = sprintf( 'Adv. Members %s', $page_value['label'] );
			}
		}
		return $post_states;
	}

	/**
	 *  사용자의 Account 필드 그룹 전달
	 *
	 *  @since   1.0.0
	 *
	 *  @param   WP_User $user 사용자 object
	 *  @return  array $field_groups 해당하는 form 의 필드그룹
	*/
	function get_user_account_field_group( $user ) {
		$user_roles = $user->roles;
		if (!empty($user_roles)) {
	  	$user_role = array_shift($user_roles);
		}
		$role = $user_role;
		$account_option = amem()->options->options['accform'];
		if( is_array($user_role) ){
			$role = $user_role[0];
		}
		$form_id = isset($account_option['default'])? $account_option['default'] : 0 ;
		if( isset( $account_option['rules'] ) ){
			foreach ($account_option['rules'] as $account_role) {
				if( $role == $account_role['role'] ){
					$form_id = $account_role['value'];
				}
			}
		}

		if( !$form_id ){
			return array();
		}
		$field_group_keys = array();
		$form = amem_get_form( $form_id );
		$field_groups = amem_get_form_field_groups( $form['key'] );
		/*
		foreach ($field_groups as $key => $field_group) {
			// $field_group_keys[$key] = $field_group['key'];
		}
		*/
		return $field_groups;
	}

	public function install_amem_core_pages() {
		if ( !empty($_REQUEST['amem_do_action']) && isset($_REQUEST['_wpnonce']) && wp_verify_nonce( $_REQUEST['_wpnonce'], 'install_core_pages' ) ){
			do_action( 'amem_doaction_'. sanitize_text_field($_REQUEST['amem_do_action']) );
		}
	}
	public function not_install_core_pages() {
		amem()->setup()->not_install_core_pages();
	}

	public function install_core_pages() {
		amem()->setup()->install_default_forms();
	}

	protected $name = 'amem/admin';
}
amem()->register_module('admin', ADMIN::getInstance());

endif; // class_exists check
