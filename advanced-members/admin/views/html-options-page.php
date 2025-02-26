<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
?>
<div class="wrap acf-settings-wrap">

	<h1><?php echo esc_html($page_title); ?></h1>

	<form id="post" method="post" name="post">

		<?php
		global $wp_roles;

		if ( ! isset( $wp_roles ) ) {
			$wp_roles = new WP_Roles();
		}
		$all_roles = $wp_roles->roles;
		$roles = array();
		foreach ($all_roles as $key => $role) {
			$roles[$key] = translate_user_role( $role['name'] );
		}

		// Re-initialize updated options
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
			amem()->options->init(true);

		$pages = array(
			0 => __('&mdash; Select a Page &mdash;', 'advanced-members')
		);
		foreach (get_pages(array(
			'sort_column' => 'post_title',
			'sort_order' => 'ASC',
		)) as $page ) {
			$pages[$page->ID] = $page->post_title;
		};

		$account_forms = array(
			0 => __('Not Selected', 'advanced-members')
		);
		foreach ( get_posts(array(
				'post_type' => 'amem-form',
				'numberposts' => -1,
				'sort_column' => 'post_title',
				'sort_order' => 'ASC',
				'meta_query' => array(
						array(
								'key' => 'amem_form_select_type',
								'value' => 'account',
								'compare' => '=',
						),
				),
		)) as $form ){
			$account_forms[$form->ID] = $form->post_title;
		};

		$redirections = [
			'registration' 	=> [
				'label' 				=> __( 'Registration', 'advanced-members' ),
				'choices' 			=> ['redirect_home', 'redirect_url'],
				'action' 				=> _x( 'registered.', 'user_action', 'advanced-members' ),
			],
			'login' 				=> [
				'label' 				=> __( 'Login', 'advanced-members' ),
				'choices' 			=> ['redirect_home', 'redirect_admin', 'refresh', 'redirect_url'],
				'action' 				=> _x( 'logged in.', 'user_action', 'advanced-members' ),
			],
			'logout' 				=> [
				'label' 				=> __( 'Logout', 'advanced-members' ),
				'choices' 			=> ['redirect_home', 'redirect_url'],
				'action' 				=> _x( 'logged out.', 'user_action', 'advanced-members' ),
			],
			'account_delete' => [
				'label' 				=> __( 'Delete Account', 'advanced-members' ),
				'choices' 			=> ['redirect_home', 'redirect_login', 'redirect_register', 'redirect_url'],
				'action' 				=> _x( 'delete account.', 'user_action', 'advanced-members' ),
			],
		];

		$choices = [
			'redirect_home' 		=> __( 'Go to Homepage', 'advanced-members' ),
			'refresh' 					=> __( 'Refresh active page', 'advanced-members' ),
			'redirect_admin' 		=> __( 'Go to Admin page', 'advanced-members' ),
			'redirect_login' 		=> __( 'Go to Login page', 'advanced-members' ),
			'redirect_register' => __( 'Go to Registration page', 'advanced-members' ),
			'redirect_url' 			=> __( 'Redirect to URL', 'advanced-members' ),
		];

		$is_first = true;

		wp_nonce_field( 'amem_options_update', 'option_update_nonce', false );

		?>

		<div id="poststuff" class="poststuff">

			<div id="post-body" class="metabox-holder columns-<?php echo 1 == get_current_screen()->get_columns() ? '1' : '2'; ?>">

				<div id="postbox-container-1" class="postbox-container">

					<?php do_meta_boxes( 'amem_options_page', 'side', null ); ?>

				</div>

				<div id="postbox-container-2" class="postbox-container">
					<div class="inside">
					<?php
					foreach ( $tabs as $tab_key => $tab_label ) {
						acf_render_field_wrap(
							array(
								'type'  => 'tab',
								'label' => $tab_label,
								// 'key'   => 'amem_settings_tabs',
								// acf_ui_options_page_tabs does not exists in ACF 6.2.0(acf-input.js)
								'key'		=> 'acf_field_group_settings_tabs',//'acf_ui_options_page_tabs',
								'settings-type' => $tab_key,

							)
						);

						$wrapper_class = str_replace( '_', '-', $tab_key );

						echo '<div class="field-group-settings-tab amem-' . esc_attr( $wrapper_class ) . '-settings">';

						switch ( $tab_key ) {
							case 'general':
								echo '<h3>' . esc_html__( 'Advanced Members for ACF Pages', 'advanced-members' ) . '</h3>';
								foreach (amem()->config->core_pages as $page_key => $page_value) {
									$page_id = amem()->options->get_core_page_id($page_key);
									// if ( $page_id && $page_key == 'account' ) {
									// 	$instructions = __('Edit form link for account is \'Default Account Form\' set form Account Forms settings.', 'advanced-members');
									// } else {
										$instructions = null;
									// }
									acf_render_field_wrap(
										array(
											'type'         => 'select',
											'name'         => $page_id,
											'key'          => $page_id,
											'prefix'       => 'amem_options',
											'value'        => amem()->options->get($page_id),
											'label'        => $page_value['label'],
											'choices'      => $pages,
											'hide_search'  => false,
											'instructions' => $instructions,
										),
										'div',
										'field',
										true
									);
								}
								acf_render_field_wrap( array( 'type' => 'seperator' ) );
								echo '<h3>' . esc_html__( 'General Settings', 'advanced-members' ) . '</h3>';
								acf_render_field_wrap(
									array(
										'type'         => 'true_false',
										'name'         => 'ajax_submit',
										'key'          => 'ajax_submit',
										'prefix'       => 'amem_options',
										'value'        => amem()->options->get('ajax_submit'),
										'label'        => __( 'AJAX Submit', 'advanced-members' ),
										'instructions' => __( 'Enable/disable AJAX form submit instead of page load. This option is overridden by Form and Shorcode option.', 'advanced-members' ),
										// 'message'			 => __( 'Enable/disable AJAX form submit instead of page load.', 'advanced-members' )
										'default'      => true,
										'default_value' => 0,
										'ui'           => 1,
									),
									'div'
								);
								acf_render_field_wrap(
									array(
										'type'         => 'true_false',
										'name'         => 'load_theme',
										'key'          => 'load_theme',
										'prefix'       => 'amem_options',
										'value'        => amem()->options->get('load_theme', true),
										'label'        => __( 'Load default style', 'advanced-members' ),
										'instructions' => __( 'Enable/disable loading default CSS style.', 'advanced-members' ),
										'default_value' => '1',
										'ui'           => 1,
									),
									'div'
								);
							break;
							case 'account':
								echo '<h3>' . esc_html__( 'Account Form Settings', 'advanced-members' ) . '</h3>';
								// acf_render_field_wrap(
								// 	array(
								// 		'type'         => 'true_false',
								// 		'name'         => 'account_form_showadmin',
								// 		'key'          => 'account_form_showadmin',
								// 		'prefix'       => 'amem_options[accform]',
								// 		'value'        => amem()->options->get('accform/account_form_showadmin'),
								// 		'label'        => __( 'User Profile', 'advanced-members' ),
								// 		'instructions' => __( 'Enable/disable used on the User Profile edit', 'advanced-members' ),
								// 		'default'      => true,
								// 		'ui'           => 1,
								// 	),
								// 	'div'
								// );
								acf_render_field_wrap(
									array(
										'type'         => 'true_false',
										'name'         => 'show_current_passwd',
										'key'          => 'show_current_passwd',
										'prefix'       => 'amem_options[account]',
										'value'        => amem()->options->get('account/show_current_passwd'),
										'label'        => __( 'Current Password on Account', 'advanced-members' ),
										'instructions' => __( 'Show current password confirm field on general account page', 'advanced-members' ),
										'default'      => true,
										'ui'           => 1,
									),
									'div'
								);
								// acf_render_field_wrap(
								// 	array(
								// 		'type'         => 'true_false',
								// 		'name'         => 'use_password',
								// 		'key'          => 'use_password',
								// 		'prefix'       => 'amem_options[account]',
								// 		'value'        => amem()->options->get('account/use_password'),
								// 		'label'        => __( 'Account Password Change', 'advanced-members' ),
								// 		'instructions' => __( 'Enable/disable the Password Change for account. <code>[advanced-members-account tab="password"]</code>', 'advanced-members' ),
								// 		'default'      => true,
								// 		'ui'           => 1,
								// 	),
								// 	'div'
								// );
								// acf_render_field_wrap(
								// 	array(
								// 		'type'         => 'true_false',
								// 		'name'         => 'use_delete',
								// 		'key'          => 'use_delete',
								// 		'prefix'       => 'amem_options[account]',
								// 		'value'        => amem()->options->get('account/use_delete'),
								// 		'label'        => __( 'Account Deletion', 'advanced-members' ),
								// 		'instructions' => __( 'Enable/disable the Delete account for account. <code>[advanced-members-account tab="delete"]</code>', 'advanced-members' ),
								// 		'default'      => true,
								// 		'ui'           => 1,
								// 	),
								// 	'div'
								// );

								acf_render_field_wrap( array( 'type' => 'seperator' ) );
								echo '<h3>' . esc_html__( 'Account Form by User Roles', 'advanced-members' ) . '</h3>';
								acf_render_field_wrap(
									array(
										'type'         => 'select',
										'name'         => 'default',
										'key'          => 'default',
										'prefix'       => 'amem_options[accform]',
										'value'        => amem()->options->get('accform/default'),
										'label'        => __( 'Default Account Form', 'advanced-members' ),
										'choices'      => $account_forms,
										'hide_search'  => false,
									),
									'div',
									'field'
								);
								$view_args = array(
									'ruletab'	=> 'accform',
									'roles'		=> $roles,
									'forms'		=> $account_forms,
									'group' 	=> array(),

								);
								if( !empty( amem()->options->get('accform/rules') ) ) {
									$view_args['group'] = amem()->options->get('accform/rules');
								}
								amem_get_view( __DIR__ . '/html-options-rule-fields.php', $view_args );
								/*
								foreach ($roles as $role_key => $role_label) {
									acf_render_field_wrap(
										array(
											'type'         => 'select',
											'name'         => $role_key,
											'key'          => $role_key,
											'prefix'       => 'amem_options[accform]',
											'value'        => amem()->options->get('accform/role_key'),
											'label'        => $role_label,
											'choices'      => $account_forms,
											'hide_search'  => false,
										),
										'div',
										'field'
									);
								}
								*/
							
							acf_render_field_wrap( array( 'type' => 'seperator' ) );
							echo '<h3>' . esc_html__( 'Delete Account', 'advanced-members' ) . '</h3>';

							acf_render_field_wrap(
								array(
									'type'         => 'textarea',
									'name'         => 'delete_account_text',
									'key'          => 'delete_account_text',
									'prefix'       => 'amem_options[account]',
									'value'        => amem()->options->get('account/delete_account_text'),
									'label'        => __( 'Account Deletion Custom Text', 'advanced-members' ),
									'instructions' => __( 'This is custom text that will be displayed to users before they delete their accounts from your site.', 'advanced-members' ),
									'conditions' => array(
										'field' => 'use_delete',
										'operator' => '==',
										'value' => '1',
									),
								),
								'div',
								'field'
							);
							acf_render_field_wrap(
								array(
									'type'         => 'text',
									'name'         => 'delete_account_label',
									'key'          => 'delete_account_label',
									'prefix'       => 'amem_options[account]',
									'value'        => amem()->options->get('account/delete_account_label'),
									'label'        => __( 'Account Deletion Confirmation Label', 'advanced-members' ),
									'instructions' => __( 'This is label that will be displayed right of account deletion agree check.', 'advanced-members' ),
									'conditions' => array(
										'field' => 'use_delete',
										'operator' => '==',
										'value' => '1',
									),
								),
								'div',
								'field'
							);
							break;
							case 'redirects':
							echo '<h3>' . esc_html__( 'Redirection Settings', 'advanced-members' ) . '</h3>';

							foreach( $redirections as $act => $data ) {
								$_choices = array_intersect_key(
							    $choices,
							    array_flip($data['choices']) // keys to be extracted
								);
								/* translators: form action names string */
								$instuction = sprintf( __( 'Set a url to redirect user after they %s', 'advanced-members' ), $data['action'] );
								acf_render_field_wrap(
									[
										'type'         => 'select',
										'name'         => '_after_' . $act,
										'key'          => '_after_' . $act,
										'prefix'       => 'amem_options[redirect]',
										'value'        => amem()->options->get('redirect/_after_' . $act),
										'label'        => $data['label'],
										'choices'      => $_choices,
										'hide_search'  => false,
									],
									'div',
									'field'
								);
								acf_render_field_wrap(
									[
										'type'         => 'text',
										'name'         => $act . '_redirect_url',
										'key'          => $act . '_redirect_url',
										'prefix'       => 'amem_options[redirect]',
										'value'        => amem()->options->get('redirect/' . $act . '_redirect_url'),
										'label'        => __( 'Set Custom Redirect URL', 'advanced-members' ),
										'instructions' => $instuction,
										'conditions' 	 => [
											[
												'field'    => '_after_' . $act,
												'operator' => '==',
												'value'    => 'redirect_url',
											],
										],
									],
									'div',
									'field'
								);
							}
							acf_render_field_wrap( array( 'type' => 'seperator' ) );
							echo '<h3>' . esc_html__( 'User role redirection settings', 'advanced-members' ) . '</h3>';
							acf_render_field_wrap(
								array(
									'type'         => 'true_false',
									'name'         => 'apply_roles_redirection',
									'key'          => 'apply_roles_redirection',
									'prefix'       => 'amem_options[roles]',
									'value'        => amem()->options->get('roles/apply_roles_redirection'),
									'label'        => __( 'Enable redirection by role', 'advanced-members' ),
									'instructions' => __( 'Enable/disable used on the redirection by role', 'advanced-members' ),
									'default'      => true,
									'ui'           => 1,
									'wrapper'			 => [ 'class' => 'amem-field-toggle-group' ],
									'data' 				 => ['toggle-target' => '.role-redirection-table'],
								),
								'div'
							);
							$view_args = array(
								'all_roles' 					=> $all_roles,
								'redirections'				=> $redirections,
								'choices'							=> $choices,
								'table_wrap_class'		=> amem()->options->get('roles/apply_roles_redirection', true) ? '' : ' acf-hidden'
							);
							amem_get_view( __DIR__ . '/html-options-roles-redirection.php', $view_args );

							break;
							case 'email':
								// $email_key = empty( $_GET['email'] ) ? '' : sanitize_key( $_GET['email'] );
								$email_notifications = amem()->config->email_notifications;
								if( $email_notifications ){
									$view_args = array(
										'email_notifications' => $email_notifications,
										'email_options'				=> amem()->options->get_emails(),
									);
									amem_get_view( __DIR__ . '/html-options-list-email.php', $view_args );
								}
							break;
							case 'adminbar':
							// acf_render_field_wrap(
							// 	array(
							// 		'type'         => 'true_false',
							// 		'name'         => 'global',
							// 		'key'          => 'global',
							// 		'prefix'       => 'amem_options[adminbar]',
							// 		'value'        => amem()->options->get('adminbar/global'),
							// 		'label'        => __( 'Disable Admin Bar', 'advanced-members' ),
							// 		'instructions' => __( 'Admin bar on frontend is disabled when this option is on', 'advanced-members' ),
							// 		'default'      => true,
							// 		'ui'           => 1,
							// 	),
							// 	'div'
							// );
							// acf_render_field_wrap(
							// 	array(
							// 		'type'         => 'true_false',
							// 		'name'         => 'by_roles',
							// 		'key'          => 'by_roles',
							// 		'prefix'       => 'amem_options[adminbar]',
							// 		'value'        => amem()->options->get('adminbar/by_roles'),
							// 		'label'        => __( 'Enable admin bar visibility by role', 'advanced-members' ),
							// 		'instructions' => __( 'Enable/disable show/hide admin bar by role', 'advanced-members' ),
							// 		'default'      => true,
							// 		'ui'           => 1,
							// 		'wrapper'			 => [ 'class' => 'amem-field-toggle-group' ],
							// 		'data' 				 => ['toggle-target' => '.amem-settings-role-adminbar'],
							// 	),
							// 	'div'
							// );

							$choices = [
								'' => __( 'Use global rule', 'advanced-members' ),
								'show' => __( 'Show', 'advanced-members' ),
								'hide' => __( 'Hide', 'advanced-members' ),
							];

							echo '<h3>' . esc_html__( 'Select role to disable admin bar', 'advanced-members' ) . '</h3>';
							echo '<div class="amem-settings-role-adminbar">' . PHP_EOL;
							foreach ($all_roles as $key => $role) {
								acf_render_field_wrap(
									[
										'type'         => 'true_false',
										'name'         => $key,
										'key'          => $key,
										'prefix'       => 'amem_options[adminbar][roles]',
										'value'        => amem()->options->get('adminbar/roles/'.$key),
										'label' 			 => $role['name'],
										// 'choices'      => $choices,
										'instructions' => null,
										'default_value' => 0,
										// 'ui' => 1,
									],
									'div',
									'field'
								);
							}
							echo '</div>';
							break;
						}

						do_action( "amem/settings/render_settings_tab/{$tab_key}" );
						echo '</div>';
					}

					?>
					</div>
				</div>
			</div>

			<br class="clear">

		</div>

	</form>

</div>
