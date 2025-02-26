<?php
namespace AMem;

use AMem\Module;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AMEM_ADMIN_FORMS' ) ) :
class ADMIN_FORMS extends Module {

	protected $name = 'amem/admin_forms';
	/**
	 * The admin body class used for the screen.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public $screen = '';

	function __construct() {
		add_action( 'current_screen', array( $this, 'current_screen' ) );
		// Actions
		add_action( 'admin_init', array( $this, 'add_fields_meta_box' ), 10, 0 );
		add_filter( 'acf/prepare_field/name=amem_form_shortcode_message', array( $this, 'display_form_shortcode' ), 10, 1 );
		add_action( 'save_post', array( $this, 'update_form_status'), 30, 3 );
		add_filter( 'add_post_metadata', array( $this, 'should_add_form_key_meta' ), 10, 3 );
		add_action( 'acf/init', array( $this, 'register_fields' ), 10, 0 );
		add_action( 'restrict_manage_posts', array( $this, 'add_custom_meta_filter_dropdown'), 10);

		add_filter( 'bulk_actions-edit-amem-form', array( $this, 'admin_table_bulk_actions') );
		add_filter( 'restrict_manage_posts', array( $this, 'remove_custom_post_type_filter') );

		// initialize on post edit screens
		add_action( 'load-post.php', array( $this, 'initialize' ) );
		add_action( 'load-post-new.php', array( $this, 'initialize' ) );

		// add_filter('handle_bulk_actions-edit-amem-form', array( $this, 'remove_custom_post_type_actions') );


		add_filter( 'get_user_option_screen_layout_amem-form', array( $this, 'screen_layout' ), 10, 1 );
	}

	/**
	 *  불필요한 필터 제거
	 *
	 *  @since   1.0.0
	*/
	public function remove_custom_post_type_filter() {
		global $typenow;

		if ('amem-form' === $typenow) { // 'your_custom_post_type'은 실제 사용하는 Custom Post Type의 이름으로 대체
			remove_all_filters('months_dropdown_results'); // 원하는 필터를 제거합니다.
		}
	}

	/**
	 *  목록 에서 불필요한 필터링
	 *
	 *  @since   1.0.0
	 *  @param $actions
	 *  @return $actions
	*/
	public function admin_table_bulk_actions( $actions ) {
		// unset($actions['edit']);
		// unset($actions['trash']);
		return $actions;
	}

	/**
	 *  Advanced Members for ACF post type 관리
	 *
	 *  @since   1.0.0
	 *  @param $screen
	 */
	public function current_screen( $screen ) {
		$current_screen = get_current_screen();

		if ( ! $current_screen ) {
			return false;
		}elseif ('edit-amem-form' != $current_screen->id && 'amem-form' != $current_screen->id) {
			return false;
		}
		/*
		amem_get_view( __DIR__ . '/views/form-top-navigation.php' );

		if ( 'amem-form' == $current_screen->id ) {
			add_action( 'in_admin_header', array( $this, 'in_admin_header' ) );
			$this->screen = 'single';
		}elseif ( 'edit-amem-form' == $current_screen->id ) {
			// add_action( 'in_admin_header', array( $this, 'in_admin_header' ) );
			$this->screen = 'list';
		}else{
			return false;
		}
		*/

		if ( isset( $screen->post_type ) && $screen->post_type == 'amem-form' ) {
			if ( isset( $screen->base ) && 'edit' === $screen->base ) {
				$this->screen = 'list';
			}
			add_action( 'in_admin_header', array( $this, 'in_admin_header' ) );
			// add_filter( 'admin_footer_text', array( $this, 'admin_footer_text' ) );
			// add_filter( 'update_footer', array( $this, 'admin_footer_version_text' ) );
			// $this->setup_help_tab();
			// $this->maybe_show_import_from_cptui_notice();
		}

		add_filter( 'pre_get_posts', array( $this, 'type_filter'), 10, 1);
		add_action( 'admin_body_class', array( $this, 'admin_body_class' ) );
		add_action( 'admin_menu', array( $this, 'admin_menu' ), 20 );
		add_filter( 'manage_amem-form_posts_columns', array( $this, 'admin_table_columns' ), 10, 1 );
		add_action( 'manage_amem-form_posts_custom_column', array( $this, 'admin_table_columns_html' ), 10, 2 );

		add_filter( 'post_row_actions', array( $this, 'remove_quick_edit'), 10, 1 );

		if ( !isset($_REQUEST['post_status']) || sanitize_key($_REQUEST['post_status']) !== 'trash' ) { // phpcs:disable WordPress.Security.NonceVerification -- already verified by ACF
			add_filter( 'page_row_actions', array( $this, 'page_row_actions' ), 10, 2 );
		}
	}

	/**
	 * amem-form post type 폼 유형에 따른 필터링 추가
	 *
	 * @since   1.0.0
	 */
	function add_custom_meta_filter_dropdown() {
	global $typenow;
	// 특정 포스트 타입에 대해서만 필터링 옵션 추가 (예: 'post', 'page' 등)
	if ($typenow === 'amem-form') {
		?>
		<select name="form_type">
			<option value=""><?php esc_html_e('Show all', 'advanced-members') ?></option>
			<option value="login"<?php echo (isset($_GET['form_type']) && 'login' == sanitize_key($_GET['form_type']) ? ' selected' : '') // phpcs:disable WordPress.Security.NonceVerification -- already verified by ACF ?>><?php esc_html_e('Login Forms', 'advanced-members') ?></option>
			<option value="registration"<?php echo (isset($_GET['form_type']) && 'registration' == sanitize_key($_GET['form_type']) ? ' selected' : '') // phpcs:disable WordPress.Security.NonceVerification -- already verified by ACF ?>><?php esc_html_e('Registration Forms', 'advanced-members') ?></option>
						<option value="account"<?php echo (isset($_GET['form_type']) && 'account' == sanitize_key($_GET['form_type']) ? ' selected' : '') // phpcs:disable WordPress.Security.NonceVerification -- already verified by ACF ?>><?php esc_html_e('Account Forms', 'advanced-members') ?></option>
			<!-- 필터 옵션을 추가하려는 만큼 <option> 태그를 추가합니다. -->
		</select>
		<?php
	}
	}

	/**
	 * 추가된 필터링 에 대한 쿼리 변환
	 *
	 * @since   1.0.0
	 * @param array $query
	 * @return array $query
	 */
	function type_filter( $query ) {
		if( isset($_REQUEST['form_type']) && !empty($_REQUEST['form_type']) ) { // phpcs:disable WordPress.Security.NonceVerification -- already verified by ACF
			$meta_query = array(
			  'key' => 'amem_form_select_type',
			  'value' => sanitize_key($_REQUEST['form_type']), // phpcs:disable WordPress.Security.NonceVerification -- already verified by ACF
			  'compare' => '=',
		  );

		  // 메타 쿼리를 설정하여 사용자 목록을 필터링합니다.
		  $query->set('meta_query', array($meta_query));
		}
		return $query;
	}

	/**
	 * FORM 편집화면 레이아웃을 1열 로 적용
	 *
	 * @param int $columns 레이아웃 column 수.
	 *
	 * @return int
	 */
	public function screen_layout( $columns = 0 ) {
		return 1;
	}

	/**
	 * amem-form post type 에 메타박스를 추가
	 *
	 * @since 1.0.0
	 *
	 */
	function add_fields_meta_box() {
		add_meta_box( 'amem-field-group-fields', __( 'Fields', 'advanced-members' ), array( $this, 'fields_meta_box_callback' ), 'amem-form', 'normal', 'default', null );
	}

	/**
	 * FORM metabox callback
	 * 현재 폼 과 연결된 필드 그룹 과 필드 리스트
	 *
	 * @since 1.0.0
	 *
	 */
	function fields_meta_box_callback() {
		global $post;
		$form = amem_get_form( $post->ID );

		// Get field groups for the current form
		$field_groups = amem_get_form_field_groups( $form['key'] );
		?>
		<div class="advanced-members-field">
			<div class="advanced-members-label">
				<p class="description"><?php esc_html_e( 'Add fields by setting the location of your fields group to this form.', 'advanced-members' ); ?></p>
			</div>
			<div class="advanced-members-input">
				<table class="widefat acf-field-group-table">
					<thead>
						<tr>
							<th scope="col"><?php esc_html_e( 'Label', 'advanced-members' ) ?></th>
							<th scope="col"><?php esc_html_e( 'Name', 'advanced-members' ) ?></th>
							<th scope="col"><?php esc_html_e( 'Type', 'advanced-members' ) ?></th>
							<?php do_action( 'amem/acf_field_group_th' , $form , $field_groups )?>
						</tr>
					</thead>
					<tbody>
						<?php if ( ! empty( $field_groups ) ) : ?>
							<?php foreach ( $field_groups as $field_group ) : ?>
								<?php
									// Get all fields for this field group
									$fields = acf_get_fields( $field_group );
								?>
								<tr class="field-group-heading">
									<td colspan="<?php echo esc_attr( apply_filters('amem/acf_field_group_colspan', 3 , $form , $field_groups ) ); ?>">
										<a href="<?php echo esc_url( get_edit_post_link( $field_group['ID'] ) ); ?>"><?php echo esc_html($field_group['title']); ?></a>
									</td>
								</tr>
								<?php foreach ( $fields as $field ) : ?>
									<tr>
										<td><?php echo esc_html($field['label']); ?></td>
										<td><?php echo esc_html($field['name']); ?></td>
										<td><?php echo esc_html( acf_get_field_type_label( $field['type'] ) ); ?></td>
										<?php do_action( 'amem/acf_forfield_group_td' , $form , $field )?>
									</tr>
								<?php endforeach; ?>
							<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="3">
									<?php esc_html_e( 'No field groups connected to this form', 'advanced-members' ); ?>
								</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
				<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=acf-field-group' ) ); ?>" class="button">
					<?php esc_html_e( 'Create field group', 'advanced-members' ); ?>
				</a>
			</div>
		</div>
		<?php
	}

	/**
	 * 설정 페이지 필드 등록
	 *
	 * @since 1.0.0
	 */
	function register_fields() {
		$form_ajax = amem()->options->get('ajax_submit');

		$general_fields = [
			// General Tab
			array (
				'key' 								=> 'field_amem_form_general_tab',
				'label' 							=> __( 'General', 'advanced-members' ),
				'name' 								=> '',
				'type' 								=> 'tab',
				'instructions' 				=> '',
				'required' 						=> 0,
				'conditional_logic' 	=> 0,
				'wrapper' 						=> array (
					'width' 		=> '',
					'class' 		=> '',
					'id' 				=> '',
				),
				'placement' 					=> 'top',
				'endpoint' 						=> 0,
			),

			array(
				'key' 								=> 'field_amem_form_shortcode_message',
				'label' 							=> __( 'Shortcode', 'advanced-members' ),
				'name' 								=> 'amem_form_shortcode_message',
				'type' 								=> 'message',
			),
			array(
				'key' 								=> 'field_amem_form_select_type',
				'name' 								=> 'amem_form_select_type',
				// 'type' 								=> 'button_group',
				'type' 								=> 'radio',
				'layout' 							=> 'horizontal',
				'label' 							=> __( 'Form Type', 'advanced-members' ),
				'default'   					=> 'registration',
				'choices'         		=> array(
					'registration'	=> __( 'Registration Form', 'advanced-members' ),
					'login' 				=> __( 'Login Form', 'advanced-members' ),
					'account'				=> __( 'Account Form', 'advanced-members' ),
				),
			),
			array(
				'key' 								=> 'field_amem_form_ajax_override',
				'name' 								=> 'amem_form_ajax_override',
				'type' 								=> 'true_false',
				'label' 							=> __( 'Override Global AJAX setting', 'advanced-members' ),
				'default'   					=> 0,
				'default_value' 			=> 0,
				'instructions' 				=> __( 'Override Global AJAX option and force apply Form AJAX setting', 'advanced-members' ),
				// 'message' 						=> __( 'Enable/disable AJAX form submit instead of page load.', 'advanced-members' ),
				'ui' => 1,
			),
			array(
				'key' 								=> 'field_amem_form_ajax',
				'name' 								=> 'amem_form_ajax',
				'type' 								=> 'true_false',
				'label' 							=> __( 'AJAX Submit', 'advanced-members' ),
				'default'   					=> 0,
				'default_value' 			=> 0,
				'instructions' 				=> __( 'Enable/disable AJAX form submit instead of page load. This overrides global option and overridden by shortcode attribute ajax="0"', 'advanced-members' ),
				// 'message' 						=> __( 'Enable/disable AJAX form submit instead of page load.', 'advanced-members' ),
				'ui' => 1,
				'conditions'   				=> array(
					'field'    => 'field_amem_form_ajax_override',
					'operator' => '==',
					'value'    => '1',
				),
			),
			// array(
			// 	'key' 								=> 'field_amem_form_redirect_override',
			// 	'name' 								=> 'amem_form_redirect_override',
			// 	'type' 								=> 'true_false',
			// 	'label' 							=> __( 'Override Global Redirection setting', 'advanced-members' ),
			// 	'default'   					=> 0,
			// 	'default_value' 			=> 0,
			// 	'instructions' 				=> __( 'Override Global redirection option and force apply form redirection setting', 'advanced-members' ),
			// 	'ui' => 1,
			// ),
		];

		$login_fields = [
			// [
			// 	'type'								=> 'select',
			// 	'name'								=> 'amem_form_after_login',
			// 	'key'          				=> 'field_amem_form_after_login',
			// 	'prefix'       				=> 'amem_form',
			// 	'label'        				=> __( 'Action to be taken after login', 'advanced-members' ),
			// 	'instructions' 				=> __( 'Select what happens when a user with this role logins to your site', 'advanced-members' ),
			// 	'default'      				=> 1,
			// 	'choices'         		=> array(
			// 		'redirect_home'			=> __( 'Go to Homepage', 'advanced-members' ),
			// 		'redirect_admin'			=> __( 'Go to Admin page', 'advanced-members' ),
			// 		'redirect_url' 			=> __( 'Redirect to URL', 'advanced-members' ),
			// 		'refresh'						=> __( 'Refresh active page', 'advanced-members' ),
			// 	),
			// 	'conditions'   				=> [
			// 		[
			// 			'field'    => 'field_amem_form_select_type',
			// 			'operator' => '==',
			// 			'value'    => 'login',
			// 		],
			// 		[
			// 			'field'    => 'field_amem_form_redirect_override',
			// 			'operator' => '==',
			// 			'value'    => '1',
			// 		]
			// 	],
			// ],
			// [
			// 	'type'         				=> 'text',
			// 	'name'         				=> 'amem_form_login_redirect_url',
			// 	'key'          				=> 'field_amem_form_login_redirect_url',
			// 	'prefix'       				=> 'amem_form',
			// 	'label'        				=> __( 'Set Custom Redirect URL', 'advanced-members' ),
			// 	'instructions' 				=> __( 'Set a url to redirect this user role to after they login with their account', 'advanced-members' ),
			// 	'conditions'   				=> [
			// 		[
			// 			'field'    => 'field_amem_form_select_type',
			// 			'operator' => '==',
			// 			'value'    => 'login',
			// 		],
			// 		[
			// 			'field'    => 'field_amem_form_login_rd_override',
			// 			'operator' => '==',
			// 			'value'    => '1',
			// 		],
			// 		[
			// 			'field'    => 'field_amem_form_after_login',
			// 			'operator' => '==',
			// 			'value'    => 'redirect_url',
			// 		],
			// 	],
			// ],
			// show rememberme
			array(
				'type'         				=> 'true_false',
				'name'         				=> 'amem_form_login_rememberme',
				'key'          				=> 'field_amem_form_login_rememberme',
				'prefix'       				=> 'amem_form',
				'label'        				=> __( 'Show &quot;Remember Me&quot;', 'advanced-members' ),
				'instructions' 				=> __( 'Allow users to choose If they want to stay signed in even after closing the browser.', 'advanced-members' ),
				// 'default_value' => 1,
				'ui' => 1,
				'conditions'   				=> array(
					array(
						'field'    => 'field_amem_form_select_type',
						'operator' => '==',
						'value'    => 'login',
					),
				),
			),
			// show forgot password
			array(
				'type'         				=> 'true_false',
				'name'         				=> 'amem_form_login_password_reset',
				'key'          				=> 'field_amem_form_login_password_reset',
				'prefix'       				=> 'amem_form',
				'label'        				=> __( 'Forgot Password Link', 'advanced-members' ),
				'instructions' 				=> __( 'Show the forgot password link in login form', 'advanced-members' ),
				'ui' => 1,
				// 'default_value' => 1,
				'conditions'   				=> array(
					array(
						'field'    => 'field_amem_form_select_type',
						'operator' => '==',
						'value'    => 'login',
					),
				),
			),
			array(
				'type'         				=> 'true_false',
				'name'         				=> 'amem_form_login_extra_button',
				'key'          				=> 'field_amem_form_login_extra_button',
				'prefix'       				=> 'amem_form',
				'label'        				=> __( 'Extra Button', 'advanced-members' ),
				'instructions' 				=> __( 'Use secondary button on login form.', 'advanced-members' ),
				'ui' => 1,
				'conditions'   				=> array(
					array(
						'field'    => 'field_amem_form_select_type',
						'operator' => '==',
						'value'    => 'login',
					),
				),
			),

			// extra button text
			array(
				'type'         				=> 'text',
				'name'         				=> 'amem_form_login_extra_text',
				'key'          				=> 'field_amem_form_login_extra_text',
				'prefix'       				=> 'amem_form',
				'label'        				=> __( 'Extra Button Text', 'advanced-members' ),
				'instructions' 				=> __( 'Extra button text on login form. Leave empty for &quot;Register&quot;', 'advanced-members' ),
				'conditions'   				=> array(
					array(
						'field'    => 'field_amem_form_select_type',
						'operator' => '==',
						'value'    => 'login',
					),
					array(
						'field'    => 'field_amem_form_login_extra_button',
						'operator' => '==',
						'value'    => '1',
					),
				),
			),
			// extra button url
			array(
				'type'         				=> 'text',
				'name'         				=> 'amem_form_login_extra_url',
				'key'          				=> 'field_amem_form_login_extra_url',
				'prefix'       				=> 'amem_form',
				'label'        				=> __( 'Extra Button URL', 'advanced-members' ),
				'instructions' 				=> __( 'Extra button url. Leave empty for use Registration page url', 'advanced-members' ),
				'conditions'   				=> array(
					array(
						'field'    => 'field_amem_form_select_type',
						'operator' => '==',
						'value'    => 'login',
					),
					array(
						'field'    => 'field_amem_form_login_extra_button',
						'operator' => '==',
						'value'    => '1',
					),
				),
			),
		];

		$registration_fields = [
			// array(
			// 	'type'								=> 'select',
			// 	'name'								=> 'amem_form_after_registration',
			// 	'key'          				=> 'field_amem_form_after_registration',
			// 	'prefix'       				=> 'amem_form',
			// 	'label'        				=> __( 'Action to be taken after registration', 'advanced-members' ),
			// 	'instructions' 				=> __( 'Select what action is taken after a person registers on your site. Depending on the status you can redirect them to their profile, a custom url or show a custom message', 'advanced-members' ),
			// 	'default'      				=> 1,
			// 	'choices'         		=> array(
			// 		'redirect_home'			=> __( 'Go to Homepage', 'advanced-members' ),
			// 		// 'success_message'		=> __( 'Show Custom Message', 'advanced-members' ),
			// 		'redirect_url' 			=> __( 'Redirect to URL', 'advanced-members' ),
			// 	),
			// 	'conditions'   				=> array(
			// 		[
			// 			'field'    => 'field_amem_form_select_type',
			// 			'operator' => '==',
			// 			'value'    => 'registration',
			// 		],
			// 		[
			// 			'field'    => 'field_amem_form_redirect_override',
			// 			'operator' => '==',
			// 			'value'    => '1',
			// 		]
			// 	),
			// ),
			// array(
			// 	'type'         				=> 'text',
			// 	'name'         				=> 'amem_form_registration_redirect_url',
			// 	'key'          				=> 'field_amem_form_registration_redirect_url',
			// 	'prefix'       				=> 'amem_form',
			// 	'label'        				=> __( 'Set Custom Redirect URL', 'advanced-members' ),
			// 	'conditions'   				=> array(
			// 		array(
			// 			'field'    => 'field_amem_form_select_type',
			// 			'operator' => '==',
			// 			'value'    => 'registration',
			// 		),
			// 		array(
			// 			'field'    => 'field_amem_form_after_registration',
			// 			'operator' => '==',
			// 			'value'    => 'redirect_url',
			// 		),
			// 	),
			// ),
			array(
				'type'         				=> 'select',
				'name'         				=> 'amem_form_regist_role',
				'key'          				=> 'field_amem_form_regist_role',
				'prefix'       				=> 'amem_form',
				'label'        				=> __( 'Registration Role', 'advanced-members' ),
				'instructions' 				=> __( 'The role assigned upon registration through this sign-up form.', 'advanced-members' ),
				'multiple'     				=> false,
				'default'							=> 'subscriber',
				'allow_null'   				=> 1,
				'ui'           				=> 1,
				// 'hide_search'  				=> true,
				'choices'         		=> $this->get_user_role_chice( array('administrator')),
				'conditions'   				=> [
					[
						'field'    => 'field_amem_form_select_type',
						'operator' => '==',
						'value'    => 'registration',
					],
				],
			),
			array(
				'type'								=> 'select',
				'name'								=> 'amem_form_regist_status',
				'key'          				=> 'field_amem_form_regist_status',
				'prefix'       				=> 'amem_form',
				'label'        				=> __( 'Registration Status', 'advanced-members' ),
				'instructions' 				=> __( 'Select what action is taken after a person registers on your site. Depending on the status you can redirect them to their profile, a custom url or show a custom message', 'advanced-members' ),
				'default'      				=> 1,
				'default_value' => 'mailcheck',
				'choices'         		=> array(
					'approve'						=> __( 'Auto Approve', 'advanced-members' ),
					'mailcheck' 				=> __( 'Require Email Activation', 'advanced-members' ),
				),
				'conditions'   				=> array(
					'field'    => 'field_amem_form_select_type',
					'operator' => '==',
					'value'    => 'registration',
				),
			),
			array(
				'type'         				=> 'textarea',
				'name'         				=> 'amem_form_registration_show_message',
				'key'          				=> 'field_amem_form_registration_show_message',
				'prefix'       				=> 'amem_form',
				'label'        				=> __( 'The custom message', 'advanced-members' ),
				'default_value'				=> __('Thank you for registering. Before you can login we need you to activate your account by clicking the activation link in the email we just sent you.', 'advanced-members'),
				'conditions'   				=> array(
					array(
						'field'    => 'field_amem_form_select_type',
						'operator' => '==',
						'value'    => 'registration',
					),
					array(
						'field'    => 'field_amem_form_after_registration',
						'operator' => '==',
						'value'    => 'success_message',
					),
				),
			),
		];

		$account_fields = [];
		// if ( amem()->options->get('account/use_delete') ) {
			// $account_fields[] = array(
			// 	'type'								=> 'select',
			// 	'name'								=> 'amem_form_after_account_delete',
			// 	'key'          				=> 'field_amem_form_after_account_delete',
			// 	'prefix'       				=> 'amem_form',
			// 	'label'        				=> __( 'Action to be taken after account deletion', 'advanced-members' ),
			// 	'instructions' 				=> __( 'Select what action is taken after account deletion.', 'advanced-members' ),
			// 	'default'      				=> 1,
			// 	'choices'         		=> array(
			// 		'redirect_home'			=> __( 'Go to Homepage', 'advanced-members' ),
			// 		'redirect_login' 		=> __( 'Go to Login page', 'advanced-members' ),
			// 		'redirect_register' => __( 'Go to Registration page', 'advanced-members' ),
			// 		// 'success_message'		=> __( 'Show Custom Message', 'advanced-members' ),
			// 		'redirect_url' 			=> __( 'Redirect to URL', 'advanced-members' ),
			// 	),
			// 	'conditions'   				=> array(
			// 		[
			// 			'field'    => 'field_amem_form_select_type',
			// 			'operator' => '==',
			// 			'value'    => 'account',
			// 		],
			// 		[
			// 			'field'    => 'field_amem_form_redirect_override',
			// 			'operator' => '==',
			// 			'value'    => '1',
			// 		]
			// 	),
			// );
			// $account_fields[] = array(
			// 	'type'         				=> 'text',
			// 	'name'         				=> 'amem_form_account_delete_redirect_url',
			// 	'key'          				=> 'field_amem_form_account_delete_redirect_url',
			// 	'prefix'       				=> 'amem_form',
			// 	'label'        				=> __( 'Set Custom Redirect URL', 'advanced-members' ),
			// 	'conditions'   				=> array(
			// 		array(
			// 			'field'    => 'field_amem_form_select_type',
			// 			'operator' => '==',
			// 			'value'    => 'account',
			// 		),
			// 		array(
			// 			'field'    => 'field_amem_form_after_account_delete',
			// 			'operator' => '==',
			// 			'value'    => 'redirect_url',
			// 		),
			// 	),
			// );
			// $account_fields[] = array(
			// 	'type'         				=> 'textarea',
			// 	'name'         				=> 'amem_form_account_deleted_message',
			// 	'key'          				=> 'field_amem_form_account_deleted_message',
			// 	'prefix'       				=> 'amem_form',
			// 	'label'        				=> __( 'Account deleted message', 'advanced-members' ),
			// 	'default_value'				=> __( 'Your account has been deleted and no longer exists on the site.', 'advanced-members'),
			// 	'conditions'   				=> array(
			// 		array(
			// 			'field'    => 'field_amem_form_select_type',
			// 			'operator' => '==',
			// 			'value'    => 'account',
			// 		),
			// 		array(
			// 			'field'    => 'field_amem_form_after_account_delete',
			// 			'operator' => '==',
			// 			'value'    => 'success_message',
			// 		),
			// 	),
			// );
		// }

		$account_fields[] = array(
			'type'         				=> 'message',
			'name'         				=> 'amem_form_account_unset_fields',
			'key'          				=> 'field_amem_form_account_unset_fields',
			'prefix'       				=> 'amem_form',
			'disabled' => true,
			'readonly' => true,
			'label'        				=> __( 'Unset Fields', 'advanced-members' ),
			'message' => __( 'Advanced Members for ACF will unset username, user email, user password fields and show them with core fields.', 'advanced-members' ),
			'conditions'   				=> array(
				array(
					'field'    => 'field_amem_form_select_type',
					'operator' => '==',
					'value'    => 'account',
				),
			),
		);

		$submit_text = __( 'Submit', 'advanced-members' );
		if ( !empty($_GET['post'])) {
			// $form_type = get_field( 'amem_form_select_type', (int) $_GET['post'] );
			$form_type = get_post_meta( (int) $_GET['post'], 'amem_form_select_type', true );
			switch ( $form_type ) {
				case 'login':
				$submit_text = __( 'Login', 'advanced-members' );
				break;
				case 'registration':
				$submit_text = __( 'Register', 'advanced-members' );
				break;
				case 'account':
				$submit_text = __( 'Update Account', 'advanced-members' );
				break;
				default:
				break;
			}
		}
		$general_fields_more = [
			// array (
			// 	'key' 								=> 'field_amem_form_description',
			// 	'label' 							=> __( 'Description', 'advanced-members' ),
			// 	'name' 								=> 'amem_form_description',
			// 	'type' 								=> 'textarea',
			// 	'instructions' 				=> '',
			// 	'required' 						=> 0,
			// 	'conditional_logic' 	=> 0,
			// 	'wrapper' 						=> array (
			// 		'width' 	=> '',
			// 		'class' 	=> '',
			// 		'id' 			=> '',
			// 	),
			// 	'default_value' 			=> '',
			// 	'tabs' 								=> 'all',
			// 	'toolbar' 						=> 'full',
			// 	'media_upload' 				=> 1,
			// ),
			array(
				'type'         				=> 'text',
				'name'         				=> 'amem_form_submit_text',
				'key'          				=> 'field_amem_form_submit_text',
				'prefix'       				=> 'amem_form',
				'label'        				=> __( 'Submit Button Text', 'advanced-members' ),
				'instructions' 				=> __( 'Submit button text. Leave empty for use default text.', 'advanced-members' ),
				'placeholder' 				=> $submit_text,
				// 'conditions'   				=> array(
				// 	'field'    => 'field_amem_form_select_type',
				// 	'operator' => '!=',
				// 	'value'    => 'account',
				// ),
			),
		];


		$general_tab = array_merge( $general_fields, $login_fields, $registration_fields, $account_fields, $general_fields_more );
		/* 차후 탭 확장용
		$visibility_tab = [
			// Visivility Tab
			array (
				'key' 								=> 'field_amem_form_visibility_tab',
				'label' 							=> __( 'Visibility', 'advanced-members' ),
				'name' 								=> '',
				'type' 								=> 'tab',
				'instructions' 				=> '',
				'required' 						=> 0,
				'conditional_logic' 	=> 0,
				'wrapper' 						=> array (
					'width' 	=> '',
					'class' 	=> '',
					'id' 			=> '',
				),
				'placement' 					=> 'left',
				'endpoint' 						=> 0,
			),

			array (
				'key' => 'field_amem_form_num_of_submissions',
				'label' => __( 'Number of submissions', 'advanced-members' ),
				'name' => 'amem_form_num_of_submissions',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'default_value' => 0,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
				'readonly' => true,
			),
			array (
				'key' => 'field_form_num_of_views',
				'label' => __( 'Number of times viewed', 'advanced-members' ),
				'name' => 'form_num_of_views',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'default_value' => 0,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
				'readonly' => true,
			),
		];

		$fields = array_merge($general_tab, $visibility_tab);
		*/
		$fields = $general_tab;//array_merge($general_tab);
		$settings_field_group = array (
			'key' 		=> 'members-form-settings',
			'title' 	=> __( 'Form settings', 'advanced-members' ),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'amem-form',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'field',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
			'fields' => $fields
		);

		$settings_field_group = apply_filters( 'amem/member_form/settings_fields', $settings_field_group );
		acf_add_local_field_group( $settings_field_group );
	}

	/**
	 *  User Role 목록을 반환
	 *
	 *  @since   1.0.0
	 *  @param array $unset role 목록에서 unset 할 role 목록
	 *  @return array $roles
	 */
	function get_user_role_chice( $unset = array() ) {
		global $wp_roles;

		$all_roles = $wp_roles->roles;
		$roles = array();
		foreach ($all_roles as $key => $role) {
			$roles[$key] = translate_user_role($role['name']);
		}

		foreach ($unset as $unsetkey) {
			unset($roles[$unsetkey]);
		}
		return $roles;
	}

	/**
	 *  admin_menu
	 *
	 *  @since   1.0.0
	 */
	function admin_menu() {
	}

	/**
	 * Admin body class 에 class 를 추가
	 *
	 * @since 1.0.0
	 *
	 * @param string $classes 기본 classes
	 * @return string 목록 및 편집 화면에 추가할 class
	 */
	public function admin_body_class( $classes ) {
		$classes .= ' amem-admin-page';
		if( $this->screen == 'list'){
			$classes .= ' amem-form-list';
		}
		return $classes;
	}

	/**
	 * Stops new form keys from being saved to a form post if a key already exists.
	 * Some plugins that duplicate posts will cause trouble as forms will end up with multiple form keys.
	 *
	 * @since 1.0.0
	 * @param bool $check
	 * @param int $object_id
	 * @param string $meta_key
	 * @return bool $check
	 */
	function should_add_form_key_meta( $check, $object_id, $meta_key ) {
		if ( 'form_key' !== $meta_key ) {
			return $check;
		}

		// If a form key already exists, we don't want to save another one
		if ( metadata_exists( 'post', $object_id, $meta_key ) ) {
			return false;
		}
		return $check;
	}

	/**
	 * Form 의 상태를 저장시 publish 로 저장
	 *
	 * @since 1.0.0
	 * @param number $post_id
	 * @param object $post
	 * @param bool $update
	 */
	function update_form_status( $post_id, $post, $update ) {
		if( 'amem-form' === $post->post_type && ! get_post_meta( $post->ID, 'form_key', true ) ){
			$form_key = 'form_' . uniqid();
			update_post_meta( $post->ID, 'form_key', $form_key );
		}

		if ( 'amem-form' === $post->post_type && !wp_is_post_autosave($post_id) && 'draft' == $post->post_status ) {
			// if (  && 'trash' != $post->post_status ) {
				wp_update_post(array(
			  'ID' => $post_id,
			  'post_status' => 'publish'
		  ));

			// }
		}
	}


	/**
	 * amem_form_shortcode_message 필드에서 보여줄 숏코드 를 반환
	 *
	 * @since 1.0.0
	 * @param   array $field The columns array.
	 * @return array $field
	 */
	function display_form_shortcode( $field ) {
		global $post;
		if ( $post ) {
			$code = sprintf( '[advanced-members form="%s"]', $post->ID );
			$message = '<code><span class="copyable">' . $code . '</span></code>';
			$field['message'] = $message;
		}

		return $field;
	}

	/**
	 * Admin 목록 에 column 추가
	 *
	 * @since   1.0.0
	 *
	 * @param   array $columns The columns array.
	 * @return  array
	 */
	public function admin_table_columns( $_columns ) {
		$columns = array(
			'cb'              	=> $_columns['cb'],
			'title'           	=> $_columns['title'],
			'amem-id' 					=> __( 'ID', 'advanced-members' ),
			'amem-field_group'	=> __( 'Field Group', 'advanced-members' ),
			'amem-type'       	=> __( 'Type', 'advanced-members' ),
			'amem-shortcode'		=> __( 'Shortcode', 'advanced-members' ),
		);
		return $columns;
	}

	/**
	 * Admin 목록 추가된 column 의 값
	 *
	 * @since   1.0.0
	 *
	 * @param string $column_name The name of the column to display.
	 * @param array  $form_id  Form ID.
	 */
	public function admin_table_columns_html( $column_name, $form_id ) {

		switch ( $column_name ) {
			case 'amem-id':
				echo esc_html($form_id);
			break;

			case 'amem-field_group':
				$form = amem_get_form( $form_id );
				$field_groups = amem_get_form_field_groups( $form['key'] );
				if( empty( $field_groups ) ){
					esc_html_e('No connected field groups' , 'advanced-members');
				}else{
					foreach ( $field_groups as $key => $field_group ) {
						echo sprintf('%3$s<a href="%1$s">%2$s</a>', esc_url( get_edit_post_link( $field_group['ID'] ) ), esc_html($field_group['title']), $key > 0 ? ' ,' : ''  );
					}
				}
			break;

			case 'amem-type':
				$amem_types = amem_form_types('core');
				$type = get_post_meta( $form_id, 'amem_form_select_type', true );
				echo ( isset($amem_types[$type]) ? esc_html($amem_types[$type]) : '' );
				if( $regist_role = get_post_meta( $form_id, 'amem_form_regist_role', true ) ){
					echo sprintf('[%s]', esc_html(amem_get_role_label($regist_role)) );
				}
			break;

			case 'amem-shortcode':
				$code = sprintf( '[advanced-members form="%s"]', esc_attr($form_id) );
				echo '<code><span class="copyable">' . $code . '</span></code>';
			break;
		}
	}

	/**
	 * Admin 상단에 ACF 네비게이션 을 보여준다
	 *
	 * @since   1.0.0
	 */
	function in_admin_header() {
		global $acf_page_title, $post_type_object;

		$_acf_page_title = $acf_page_title;
		// $_post_type_object = $post_type_object;

		// $acf_page_title = $post_type_object = null;
		$acf_page_title = false;
		acf_get_view( 'global/navigation' );

		$acf_page_title = $_acf_page_title;
		// $post_type_object = $_post_type_object;

		$screen = get_current_screen();
		if ( isset( $screen->base ) ) {
			if ( 'post' === $screen->base )
				acf_get_view( 'global/form-top' );
			elseif ( 'edit' === $screen->base )
				acf_get_view( 'global/header' );
		}

		do_action( 'acf/in_admin_header' );
		do_action( 'amem/in_admin_header' );
		// amem_get_view( __DIR__ . '/views/form-top-navigation.php' );

		// $screen = get_current_screen();
		// if ( isset( $screen->base ) && 'post' === $screen->base ) {
		// 	amem_get_view( __DIR__ . '/views/form-top.php' );
		// }

		// do_action( 'amem/in_admin_header' );
	}

	/**
	 *  불필요한 메타박스 제거
	 *
	 *  @since   1.0.0
	 */
	function initialize() {
		remove_meta_box( 'submitdiv', 'amem-form', 'side' );
	}

	/**
	 * 마우스 오버 메뉴 Quick Edit 버튼 제거
	 *
	 * @since   1.0.0
	 *
	 * @param   array   $actions
	 */
	function remove_quick_edit( $actions ) {
		global $post;

	if ('amem-form' === $post->post_type) {
		unset($actions['inline hide-if-no-js']);
	}

	return $actions;
	}

	/**
	 * Form 복사하기 퀵 메뉴 - 사용안함 삭제예정
	 *
	 * @since   1.0.0
	 *
	 * @param   array   $actions The array of actions HTML.
	 * @param   WP_Post $post The post.
	 * @return  array $actions
	 */
	 public function page_row_actions( $actions, $post ) {
		return $actions;
		// Remove "Quick Edit" action.
		unset( $actions['inline'], $actions['inline hide-if-no-js'] );

		$duplicate_action_url = '';

		// Append "Duplicate" action.
		if ( 'amem-form' === $this->post_type ) {
			$duplicate_action_url = $this->get_admin_url( '&acfduplicate=' . $post->ID . '&_wpnonce=' . wp_create_nonce( 'bulk-posts' ) );
		}

		$actions['acfduplicate'] = '<a href="' . esc_url( $duplicate_action_url ) . '" aria-label="' . esc_attr__( 'Duplicate this item', 'advanced-members' ) . '">' . __( 'Duplicate', 'advanced-members' ) . '</a>';

		// Append the "Activate" or "Deactivate" actions.
		$activate_deactivate_action = 'acfdeactivate';
		$deactivate_action_url      = $this->get_admin_url( '&acfdeactivate=' . $post->ID . '&_wpnonce=' . wp_create_nonce( 'bulk-posts' ) );
		$actions['acfdeactivate']   = '<a href="' . esc_url( $deactivate_action_url ) . '" aria-label="' . esc_attr__( 'Deactivate this item', 'advanced-members' ) . '">' . __( 'Deactivate', 'advanced-members' ) . '</a>';

		// Return actions in custom order.
		$order = array( 'edit', 'acfduplicate', $activate_deactivate_action, 'trash' );

		return array_merge( array_flip( $order ), $actions );
	}

	public function get_admin_url( $params = '' ) {
		return admin_url( "edit.php?post_type=amem-form{$params}" );
	}

}

amem()->register_module('admin/forms', ADMIN_FORMS::getInstance());

endif; // class_exists check
