<?php

class MultiManager_WP_REST_API extends WP_REST_Controller {

	/**
	 * Register the routes for the REST-API methods of the controller.
	 */
	public function register_routes() {
		$version   = '1';
		$namespace = 'multimanager-wp/v' . $version;
		$users     = 'users';
		$plugins   = 'plugins';
		$themes    = 'themes';
		$core      = 'core';
		$info      = 'info';

		register_rest_route( $namespace, '/' . $users, array(
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'list_users' ),
				'permission_callback' => array( $this, 'list_users_permissions_check' ),
				'args'                => array(
					'id'           => array(
						'type'        => 'integer',
						'context'     => array( 'embed', 'view', 'edit' ),
						'description' => __( 'Unique identifier for the user.' ),
					),
					'display_name' => array(
						'type'        => 'string',
						'description' => __( 'Filter users by display name.' ),
					),
					'username'     => array(
						'type'        => 'string',
						'default'     => null,
						'description' => __( 'Filter users by username', 'multimanager-wp' ),
					),
					'email'        => array(
						'type'        => 'string',
						'default'     => null,
						'description' => __( 'Filter users by email', 'multimanager-wp' ),
					),
					'roles'        => array(
						'default'     => null,
						'type'        => 'array',
						'description' => __( 'Filter users by role', 'multimanager-wp' ),
					)
				),
			),
		) );
		register_rest_route( $namespace, '/' . $users . '/impersonate', array(
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'impersonate_user' ),
				'permission_callback' => array( $this, 'impersonate_user_permissions_check' ),
				'args'                => array(
					'username' => array(
						'type'        => 'string',
						'description' => __( 'Username to impersonate with', 'multimanager-wp' ),
					),
				),
			),
		) );

		register_rest_route( $namespace, '/' . $users . '/impersonate/token', array(
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'impersonate_user_token' ),
				'permission_callback' => array( $this, 'impersonate_user_token_permissions_check' ),
				'args'                => array(
					'username' => array(
						'type'        => 'string',
						'description' => __( 'Username parameter', 'multimanager-wp' ),
					),
				),
			),
		) );

		register_rest_route( $namespace, '/' . $users . '/impersonate/nonce', array(
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'impersonate_user_nonce' ),
				'permission_callback' => array( $this, 'impersonate_user_nonce_permissions_check' ),
			),
		) );

		register_rest_route( $namespace, '/' . $plugins, array(
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'plugins' ),
				'permission_callback' => array( $this, 'plugins_permission_check' ),
				'args'                => array(
					'browse'   => array(
						'type'        => 'string',
						'description' => __( 'Browse parameter', 'multimanager-wp' ),
					),
					'per_page' => array(
						'type'        => 'integer',
						'description' => __( 'Returned items per page', 'multimanager-wp' ),
					),
					'page'     => array(
						'type'        => 'integer',
						'description' => __( 'Current page number', 'multimanager-wp' ),
					),
					'locale'   => array(
						'type'        => 'string',
						'description' => __( 'Locale of result data', 'multimanager-wp' ),
					),
				),
			),
		) );
		register_rest_route( $namespace, '/' . $plugins . '/upload', array(
			array(
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => array( $this, 'plugins_upload' ),
				'permission_callback' => array( $this, 'plugins_upload_permission_check' ),
				'args'                => array(
					'plugin_file' => array(
						'description' => __( 'Plugin .zip file', 'multimanager-wp' ),
					),
					'activate'    => array(
						'description' => __( 'Activate theme after installation.' ),
						'type'        => 'boolean'
					)
				),
			),
		) );
		register_rest_route( $namespace, '/' . $plugins . '/update', array(
			array(
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => array( $this, 'plugins_update' ),
				'permission_callback' => array( $this, 'plugins_update_permission_check' ),
				'args'                => array(
					'plugins' => array(
						'required'    => true,
						'type'        => 'string|array',
						'description' => __( 'Comma separated plugin slugs or array', 'multimanager-wp' ),
					),
				),
			),
		) );
		register_rest_route( $namespace, '/' . $plugins . '/updates', array(
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'plugins_updates' ),
				'permission_callback' => array( $this, 'plugins_updates_permission_check' ),
			),
		) );

		register_rest_route( $namespace, '/' . $themes, array(
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'themes' ),
				'permission_callback' => array( $this, 'themes_permission_check' ),
				'args'                => array(
					'browse'   => array(
						'type'        => 'string',
						'description' => __( 'Browse parameter', 'multimanager-wp' ),
					),
					'search'   => array(
						'type'        => 'string',
						'description' => __( 'Search criteria parameter', 'multimanager-wp' ),
					),
					'per_page' => array(
						'type'        => 'integer',
						'description' => __( 'Returned items per page', 'multimanager-wp' ),
					),
					'page'     => array(
						'type'        => 'integer',
						'description' => __( 'Current page number', 'multimanager-wp' ),
					),
					'locale'   => array(
						'type'        => 'string',
						'description' => __( 'Locale of result data', 'multimanager-wp' ),
					),
				),
			),
		) );
		register_rest_route( $namespace, '/' . $themes . '/installed', array(
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'installed_themes' ),
				'permission_callback' => array( $this, 'installed_themes_permission_check' ),
			),
		) );
		register_rest_route( $namespace, '/' . $themes . '/install', array(
			array(
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => array( $this, 'install_theme' ),
				'permission_callback' => array( $this, 'install_theme_permission_check' ),
				'args'                => array(
					'slug'     => array(
						'required'    => true,
						'description' => __( 'Stylesheet of the theme.' ),
						'type'        => 'string',
					),
					'activate' => array(
						'description' => __( 'Activate theme after installation.' ),
						'type'        => 'integer',
					),
					'update'   => array(
						'description' => __( 'Update theme to latest version.' ),
						'type'        => 'boolean',
					),
				),
			),
		) );
		register_rest_route( $namespace, '/' . $themes . '/update', array(
			array(
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => array( $this, 'update_themes' ),
				'permission_callback' => array( $this, 'update_themes_permission_check' ),
				'args'                => array(
					'themes' => array(
						'type'        => 'string|array',
						'description' => __( 'Comma separated themes slugs or array', 'multimanager-wp' ),
					),
				),
			),
		) );
		register_rest_route( $namespace, '/' . $themes . '/updates', array(
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'updates_themes' ),
				'permission_callback' => array( $this, 'updates_themes_permission_check' ),
			),
		) );

		register_rest_route( $namespace, '/' . $core, array(
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'core_info' ),
				'permission_callback' => array( $this, 'core_info_permissions_check' ),
			),
		) );
		register_rest_route( $namespace, '/' . $core . '/update', array(
			array(
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => array( $this, 'core_update' ),
				'permission_callback' => array( $this, 'core_update_permissions_check' ),
			),
		) );

		register_rest_route( $namespace, '/' . $info, array(
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'site_info' ),
				'permission_callback' => array( $this, 'site_info_permissions_check' ),
			),
		) );
	}

	/**
	 * List of users
	 *
	 * @param $params
	 *
	 * @return WP_Error|WP_HTTP_Response|WP_REST_Response
	 */
	public function list_users( $params = [] ) {
		//'ID', 'user_login', 'user_email', 'user_url', 'user_nicename', 'display_name'
		$result = $filter_params = $filter_search_columns = [];

		if ( ! empty( $params['roles'] ) ) {
			$params['roles'] = array_map( 'sanitize_text_field', $params['roles'] );
		}

		$filter_params['role__in'] = $params['roles'];

		if ( ! empty( $params['display_name'] ) ) {
			$filter_params['search'] = sanitize_text_field( wp_unslash( $params['display_name'] ) );
			$filter_search_columns[] = 'display_name';
		}

		if ( ! empty( $params['username'] ) ) {
			$filter_params['search'] = sanitize_text_field( wp_unslash( $params['username'] ) );
			$filter_search_columns[] = 'user_login';
		}

		if ( ! empty( $params['email'] ) ) {
			$filter_params['search'] = sanitize_text_field( wp_unslash( $params['email'] ) );
			$filter_search_columns[] = 'user_email';
		}

		if ( ! empty( $params['id'] ) ) {
			$filter_params['search'] = sanitize_text_field( wp_unslash( $params['id'] ) );
			$filter_search_columns[] = 'ID';
		}

		$filter_params['fields']        = 'all';
		$filter_params['search_column'] = $filter_search_columns;

		$site_url = site_url();
		$users    = get_users( $filter_params );

		if ( ! empty( $users ) ) {
			/** @var WP_User $new_user */
			foreach ( $users as $new_user ) {
				$user                 = [];
				$user['id']           = $new_user->ID;
				$user['login']        = $new_user->user_login;
				$user['nicename']     = $new_user->user_nicename;
				$user['nickname']     = $new_user->nickname;
				$user['email']        = $new_user->user_email;
				$user['url']          = $new_user->user_url;
				$user['registered']   = $new_user->user_registered;
				$user['status']       = $new_user->user_status;
				$user['first_name']   = $new_user->first_name;
				$user['last_name']    = $new_user->last_name;
				$user['display_name'] = $new_user->display_name;
				$user['site_url']     = $site_url;
				$user['roles']        = $new_user->roles;
				$user['post_count']   = count_user_posts( $new_user->ID );
				$result[]             = $user;
			}
		}
		if ( ! empty( $params['pluck'] ) ) {
			$result = reset( $result );
		}

		return rest_ensure_response( $result );
	}

	/**
	 * Returns whether the current user has the capability to list users
	 *
	 * @return bool
	 */
	public function list_users_permissions_check() {
		return current_user_can( 'list_users' );
	}

	/**
	 * This method is used to auto-login user with given username
	 *
	 * @param $request
	 *
	 * @return void|WP_Error|WP_HTTP_Response|WP_REST_Response
	 * @see impersonate_user_permissions_check
	 */
	public function impersonate_user( WP_REST_Request $request ) {
		$admin_name = sanitize_text_field( wp_unslash( $request->get_param( 'username' ) ) );

		$result = $this->login( $admin_name );

		if ( $result ) {
			wp_safe_redirect( admin_url() );
			exit;
		}

		$error = new WP_Error( 'impersonate_user_failed', __( 'Auto-login failed!', 'multimanager-wp' ), array( 'status' => 500 ) );
		do_action( 'wp_login_failed', $admin_name, $error );

		return rest_ensure_response( $error );
	}

	/**
	 * Check if the given user can login
	 *
	 * @param WP_REST_Request $request
	 *
	 * @return bool|WP_Error
	 */
	public function impersonate_user_permissions_check( WP_REST_Request $request ) {
		$admin_name = sanitize_text_field( wp_unslash( $request->get_param( 'username' ) ) );
		$user_token = sanitize_text_field( wp_unslash( $request->get_param( 'multi_manager_wp_login_token' ) ) );

		if ( empty( $admin_name ) or empty( $user_token ) ) {
			return new WP_Error(
				'rest_api_no_auth_token',
				'Authorization token not found.', [ 'status' => 403, ]
			);
		}

		return $this->impersonate_token_check( $admin_name, $user_token );
	}

	/**
	 * Generate nonce. Nonce parameter is concatenation of action and username
	 *
	 * @param WP_REST_Request $request
	 *
	 * @return WP_REST_Response
	 */
	public function impersonate_user_nonce( WP_REST_Request $request ) {
		ob_start();
		$action        = sanitize_text_field( wp_unslash( $request->get_param( 'action' ) ) );
		$admin_name    = sanitize_text_field( wp_unslash( $request->get_param( 'admin_name' ) ) );
		$data['nonce'] = wp_create_nonce( $action . ':' . $admin_name );

		wp_cache_flush();
		ob_end_clean();
		return new WP_REST_Response( $data, 200 );
	}

	/**
	 * Returns whether the current user has the capability to create users
	 *
	 * @return bool
	 */
	public function impersonate_user_nonce_permissions_check( $request ) {
		if ( ! wp_is_application_passwords_available() ) {
			return false;
		}

		return current_user_can( 'create_users' );
	}

	/**
	 * Generate login url for given username
	 *
	 * @param WP_REST_Request $request
	 *
	 * @return WP_REST_Response
	 */
	public function impersonate_user_token( WP_REST_Request $request ) {
		$username = sanitize_text_field( wp_unslash( $request->get_param( 'username' ) ) );
		$user     = get_user_by( 'login', $username );

		$login_url = $this->multi_manager_wp_create_login_url( $user );

		return new WP_REST_Response( $login_url );
	}

	/**
	 * Returns whether the current user has the capability to create users
	 *
	 * @param WP_REST_Request $request
	 *
	 * @return bool
	 */
	public function impersonate_user_token_permissions_check( WP_REST_Request $request ) {
		if ( empty( $request['username'] ) ) {
			return false;
		}

		if ( ! wp_is_application_passwords_available() ) {
			return false;
		}

		return current_user_can( 'create_users' );
	}


	/**
	 * List of plugins
	 *
	 *  - `beta`
	 *  - `favorites`
	 *  - `featured`
	 *  - `plugin-information`
	 *  - `popular`
	 *  - `recommended`
	 *  - `search`
	 *  - `upload`
	 *
	 * @param WP_REST_Request $request
	 *
	 * @return WP_Error|WP_HTTP_Response|WP_REST_Response
	 */
	public function plugins( WP_REST_Request $request ) {
		include ABSPATH . 'wp-admin/includes/plugin-install.php';

		$browse   = isset( $request['browse'] ) ? sanitize_text_field( wp_unslash( $request['browse'] ) ) : null;
		$per_page = isset( $request['per_page'] ) ? sanitize_text_field( wp_unslash( $request['per_page'] ) ) : 10;
		$page     = isset( $request['page'] ) ? sanitize_text_field( wp_unslash( $request['page'] ) ) : null;
		$locale   = isset( $request['locale'] ) ? sanitize_text_field( wp_unslash( $request['locale'] ) ) : get_locale();

		$args = array(
			'page'              => $page,
			'per_page'          => $per_page,
			'fields'            => array(
				'last_updated'    => true,
				'icons'           => true,
				'active_installs' => true,
			),
			'locale'            => $locale,
			'installed_plugins' => array(),
			'is_ssl'            => true,
		);

		if ( ! empty( $browse ) ) {
			if ( $browse == 'installed' ) {
				$installed_plugin_info = get_site_transient( 'update_plugins' );

				return rest_ensure_response( $installed_plugin_info );
			}


			if ( $browse == 'search' ) {
				$type = isset( $request['type'] ) ? sanitize_text_field( wp_unslash( $request['type'] ) ) : 'term';
				$term = isset( $request['s'] ) ? sanitize_text_field( wp_unslash( $request['s'] ) ) : '';

				switch ( $type ) {
					case 'tag':
						$args['tag'] = sanitize_title_with_dashes( $term );
						break;
					case 'term':
						$args['search'] = $term;
						break;
					case 'author':
						$args['author'] = $term;
						break;
					default:
						return new WP_Error( 'invalid_type' );
				}
			} else {
				$args['browse'] = $browse;
			}
		}


		$result = plugins_api( 'query_plugins', $args );

		if ( is_wp_error( $result ) ) {
			$result = new WP_Error( 'list_plugins_failed', $result->get_error_message() );
		}

		return rest_ensure_response( $result );
	}

	/**
	 *  Returns whether the current user has the capability to install plugins
	 *
	 * @return bool|WP_Error
	 */
	public function plugins_permission_check() {
		if ( ! current_user_can( 'install_plugins' ) ) {
			return new WP_Error(
				'rest_cannot_install_plugin',
				__( 'Sorry, you are not allowed to install plugins on this site.' ),
				array( 'status' => rest_authorization_required_code() )
			);
		}

		return true;
	}

	/**
	 * @param WP_REST_Request $request
	 *
	 * @return void|WP_Error
	 */
	public function plugins_upload( WP_REST_Request $request ) {
		$file     = $request->get_file_params();
		$activate = sanitize_text_field( wp_unslash( $request->get_param( 'activate' ) ) );


		// Check if the file is a zip file
		if ( $file['plugin_file']['type'] !== 'application/zip' ) {
			return new WP_Error( 'invalid_file_type', 'Invalid file type. Only .zip files are allowed.', array( 'status' => 400 ) );
		}

		if ( ! function_exists( 'wp_handle_upload' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
		}
		$uploaded_file    = isset( $file['plugin_file'] ) ? wp_unslash( $file['plugin_file'] ) : '';
		$upload_overrides = array( 'test_form' => false );

		$move_file = wp_handle_upload( $uploaded_file, $upload_overrides );

		if ( $move_file && ! isset( $move_file['error'] ) ) {
			$tmp_zip_file = $move_file['file'];
		} else {
			return new WP_Error( 'upload_error', 'Unable to upload plugin file.!', array( 'status' => 500 ) );
		}

		// Unzip the plugin file
		$zip = new ZipArchive;
		if ( $zip->open( $tmp_zip_file ) === true ) {
			$zip->extractTo( WP_PLUGIN_DIR );
			$zip->close();
			wp_delete_file( $tmp_zip_file );
		} else {
			return new WP_Error( 'unzip_error', 'Unable to unzip plugin file.', array( 'status' => 500 ) );
		}

		$plugin_name = basename( sanitize_text_field( $file['plugin_file']['name'] ), '.zip' );
		$plugin_name = strtok( $plugin_name, '.' );

		wp_update_plugins();
		wp_cache_flush();
		$all_plugins = get_plugins();
		$slug        = '';

		foreach ( $all_plugins as $file_name => $all_plugin ) {
			if ( strpos( $file_name, $plugin_name ) !== false ) {
				$slug = $file_name;
			}
		}

		if ( empty( $slug ) ) {
			return new WP_Error( 'unable_to_activate_plugin', 'Unable to determine plugin name from uploaded file.', array( 'status' => 400 ) );
		}

		// Activate the plugin
		if ( ! empty( $activate ) ) {
			activate_plugin( $slug );
		}
		$plugin_data = get_plugin_data( WP_PLUGIN_DIR . '/' . $slug );

		// Return success message
		return rest_ensure_response( array(
			'success'     => true,
			'plugin_name' => $plugin_data['Name'],
			'message'     => sprintf( __( 'Plugin %s was successfully uploaded.', 'multimanager-wp' ), $plugin_data['Name'] ),
		) );
	}

	/**
	 * Returns whether the current user has the capability to install plugins
	 *
	 * @return bool|WP_Error
	 */
	public function plugins_upload_permission_check() {
		if ( ! current_user_can( 'install_plugins' ) ) {
			return new WP_Error(
				'rest_cannot_install_plugin',
				__( 'Sorry, you are not allowed to install plugins on this site.' ),
				array( 'status' => rest_authorization_required_code() )
			);
		}

		return true;
	}

	/**
	 * This method returns information about available plugin updates
	 *
	 * @param WP_REST_Request $request
	 *
	 * @return WP_REST_Response
	 */
	public function plugins_updates() {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
		wp_clean_plugins_cache();
		wp_update_plugins();

		$update_plugins = get_site_transient( 'update_plugins' );

		if ( ! $update_plugins || ! isset( $update_plugins->response ) ) {
			return new WP_REST_Response( [] );
		}
		$plugins = [];

		foreach ( get_plugins() as $file => $data ) {
			$data['file']   = $file;
			$data['active'] = is_plugin_active( $file );
			$data['update'] = ! empty( $update_plugins->response[ $file ] ) ? $update_plugins->response[ $file ] : [];

			if ( ! empty( $data['update'] ) ) {
				$plugins[] = array_change_key_case( $data );
			}
		}

		return new WP_REST_Response( $plugins ?: [] );
	}

	/**
	 * Returns whether the current user has the capability to update plugins
	 *
	 * @return bool|WP_Error
	 */
	public function plugins_updates_permission_check() {
		if ( ! current_user_can( 'update_plugins' ) ) {
			return new WP_Error(
				'rest_cannot_update_plugin',
				__( 'Sorry, you are not allowed to install plugins on this site.' ),
				array( 'status' => rest_authorization_required_code() )
			);
		}

		return true;
	}

	/**
	 * Update given plugins slugs.
	 *
	 * @param WP_REST_Request $request
	 *
	 * @return WP_Error|WP_HTTP_Response|WP_REST_Response
	 */
	public function plugins_update( WP_REST_Request $request ) {
		$plugins = $request->get_param( 'plugins' );
		if ( is_array( $plugins ) ) {
			$plugins = array_map( 'sanitize_text_field', $plugins );
		}

		if ( is_string( $plugins ) ) {
			$plugins = array_filter( array_map( 'sanitize_text_field', explode( ',', sanitize_text_field( $plugins ) ) ) );
		}

		$result = $this->bulkUpdatePlugins( $plugins );

		if ( is_array( $result ) ) {
			$result = new WP_REST_Response( $result );
		}

		if ( is_wp_error( $result ) ) {
			$result = new WP_Error( 'plugins_update_failed', $result->get_error_message() );
		}
		wp_update_plugins();

		return rest_ensure_response( $result );
	}

	/**
	 * Returns whether the current user has the capability to update plugins
	 *
	 * @return bool
	 */
	public function plugins_update_permission_check() {
		return current_user_can( 'update_plugins' );
	}


	/**
	 * List of themes for installation. Browse view: 'featured', 'popular', 'updated', 'favorites'.
	 *
	 * @param WP_REST_Request $request
	 *
	 * @return WP_Error|WP_HTTP_Response|WP_REST_Response
	 */
	public function themes( WP_REST_Request $request ) {
		$browse   = isset( $request['browse'] ) ? sanitize_text_field( wp_unslash( $request['browse'] ) ) : null;
		$search   = isset( $request['search'] ) ? sanitize_text_field( wp_unslash( $request['search'] ) ) : null;
		$per_page = isset( $request['per_page'] ) ? sanitize_text_field( wp_unslash( $request['per_page'] ) ) : 10;
		$page     = isset( $request['page'] ) ? sanitize_text_field( wp_unslash( $request['page'] ) ) : 1;
		$locale   = isset( $request['locale'] ) ? sanitize_text_field( wp_unslash( $request['locale'] ) ) : get_locale();

		$args = array(
			'page'     => $page,
			'per_page' => $per_page,
			'fields'   => array(
				'screenshots'    => true,
				'screenshot_url' => true,
				'description'    => true,
				'rating'         => true,
				'parent'         => true,
				'last_updated'   => true,
				'downloaded'     => true,
				'theme_url'      => true,
			),
			'locale'   => $locale,
			'slug'     => array(),
		);

		$args['browse'] = $browse;
		$args['search'] = $search;

		if ( ! function_exists( 'themes_api' ) ) {
			require_once ABSPATH . 'wp-admin/includes/theme.php';
		};
		$result = themes_api( 'query_themes', $args );

		if ( is_wp_error( $result ) ) {
			$result = new WP_Error( 'list_themes_failed', $result->get_error_message() );
		}

		return rest_ensure_response( $result );
	}

	/**
	 * Returns whether the current user has the capability to install themes
	 *
	 * @return bool
	 */
	public function themes_permission_check() {
		return current_user_can( 'install_themes' );
	}

	/**
	 * List of installed themes.
	 *
	 * @param WP_REST_Request $request
	 *
	 * @return WP_Error|WP_HTTP_Response|WP_REST_Response
	 */
	public function installed_themes() {
		if ( ! function_exists( 'get_theme_updates' ) ) {
			include_once ABSPATH . '/wp-admin/includes/update.php';
		}
		$themes        = wp_get_themes();
		$theme_updates = get_theme_updates();

		$installed_themes = array();
		foreach ( $themes as $theme ) {
			$theme_stylesheet   = $theme->get_stylesheet();
			$is_active          = ( $theme_stylesheet == get_stylesheet() );
			$update_available   = isset( $theme_updates[ $theme_stylesheet ] );
			$installed_themes[] = [
				'name'             => $theme->get( 'Name' ),
				'stylesheet'       => $theme_stylesheet,
				'version'          => $theme->get( 'Version' ),
				'status'           => $theme->get( 'Status' ),
				'author'           => $theme->get( 'Author' ),
				'description'      => $theme->get( 'Description' ),
				'screenshot'       => $theme->get_screenshot(),
				'is_active'        => $is_active,
				'update_available' => $update_available,
				'theme_uri'        => $theme->get( 'ThemeURI' ),
				'preview_uri'      => 'https://wp-themes.com/' . $theme_stylesheet,
				'update'           => $update_available ? $theme_updates[ $theme_stylesheet ] : [],
			];
		}

		return rest_ensure_response( $installed_themes );
	}

	/**
	 * Returns whether the current user has the capability to install themes
	 *
	 * @return bool
	 */
	public function installed_themes_permission_check() {
		return current_user_can( 'install_themes' );
	}

	/**
	 * Install concrete theme by given slug.
	 * Activate theme or update already installed one by passing the arguments respectively "activete" and "update".
	 *
	 * @param WP_REST_Request $request
	 *
	 * @return WP_Error|WP_HTTP_Response|WP_REST_Response
	 */
	public function install_theme( WP_REST_Request $request ) {
		include_once ABSPATH . '/wp-admin/includes/class-wp-upgrader.php';
		include_once ABSPATH . '/wp-admin/includes/theme.php';

		$theme_slug    = sanitize_text_field( wp_unslash( $request['slug'] ) );
		$activate      = isset( $request['activate'] ) ? sanitize_text_field( wp_unslash( $request['activate'] ) ) : null;
		$update        = isset( $request['update'] ) ? sanitize_text_field( wp_unslash( $request['update'] ) ) : null;
		$theme_slug    = $stylesheet = preg_replace( '/[^A-z0-9_\-]/', '', wp_unslash( $theme_slug ) );
		$theme         = themes_api( 'theme_information', array( 'slug' => $theme_slug ) );
		$exist         = wp_get_theme( $theme_slug )->exists();
		$download_link = $theme->download_link;

		if ( $exist ) {
			// If theme is already installed we can update or (and) activate it
			if ( $update ) {
				$this->bulkUpdateThemes( [ $stylesheet ] );
				if ( ! $activate ) {
					return new WP_REST_Response( array( 'success' => 'updated' ) );
				}
			}

			if ( $activate ) {
				switch_theme( $theme_slug );

				return new WP_REST_Response( array( 'success' => 'activated' ) );
			}

			return rest_ensure_response( new WP_Error( 'theme_already_installed', 'already_installed' ) );
		}

		// Theme is not installed
		include_once ABSPATH . '/wp-admin/includes/file.php';
		WP_Filesystem();
		$download_file = @download_url( $download_link );

		if ( is_wp_error( $download_file ) ) {
			return new WP_Error( 'download_failed', 'download_failed', $download_file->get_error_message() );
		}

		$themes_path  = WP_CONTENT_DIR . '/themes';
		$unzip_result = unzip_file( $download_file, $themes_path );

		if ( is_wp_error( $unzip_result ) ) {
			return new WP_Error( 'theme_installation_unzip_failed', $unzip_result->get_error_code() );
		}
		if ( file_exists( $download_file ) ) {
			unlink( $download_file );
		}

		$theme_directories = search_theme_directories( true );
		if ( in_array( $theme_slug, array_keys( $theme_directories ) ) ) {
			if ( $activate ) {
				switch_theme( $theme_slug );
			}

			return new WP_REST_Response( array( 'success' => true ) );
		}

		return rest_ensure_response( new WP_Error( 'theme_installation_failed', 'Theme installation failed' ) );
	}

	/**
	 * Returns whether the current user has the capability to install themes
	 *
	 * @return bool
	 */
	public function install_theme_permission_check() {
		return current_user_can( 'install_themes' );
	}

	/**
	 * List of available theme updates.
	 *
	 * @param WP_REST_Request $request
	 *
	 * @return WP_Error|WP_HTTP_Response|WP_REST_Response
	 */
	public function updates_themes( WP_REST_Request $request ) {
		include_once ABSPATH . '/wp-admin/includes/class-wp-upgrader.php';
		include_once ABSPATH . '/wp-admin/includes/update.php';
		wp_update_themes();
		$themes        = wp_get_themes();
		$theme_updates = get_theme_updates();

		$result = [];
		foreach ( $themes as $slug => $theme ) {
			$theme_stylesheet = $theme->get_stylesheet();
			$is_active        = ( $theme_stylesheet == get_stylesheet() );
			$update_available = isset( $theme_updates[ $theme_stylesheet ] );

			if ( $update_available ) {
				$result[] = [
					'name'             => $theme->get( 'Name' ),
					'stylesheet'       => $theme_stylesheet,
					'version'          => $theme->get( 'Version' ),
					'status'           => $theme->get( 'Status' ),
					'author'           => $theme->get( 'Author' ),
					'description'      => $theme->get( 'Description' ),
					'screenshot'       => $theme->get_screenshot(),
					'is_active'        => $is_active,
					'update_available' => true,
					'theme_uri'        => $theme->get( 'ThemeURI' ),
					'preview_uri'      => 'https://wp-themes.com/' . $theme_stylesheet,
					'update'           => $theme_updates[ $theme_stylesheet ]->update,
				];
			}
		}

		return rest_ensure_response( $result );
	}

	/**
	 * Returns whether the current user has the capability to updates themes
	 *
	 * @return bool
	 */
	public function updates_themes_permission_check() {
		return current_user_can( 'update_themes' );
	}

	/**
	 * Update themes
	 *
	 * @param WP_REST_Request $request
	 *
	 * @return WP_Error|WP_HTTP_Response|WP_REST_Response
	 */
	public function update_themes( WP_REST_Request $request ) {
		include_once ABSPATH . '/wp-admin/includes/class-wp-upgrader.php';
		include_once ABSPATH . '/wp-admin/includes/update.php';
		wp_update_themes();

		$themes = $request['themes'];
		if ( is_array( $themes ) ) {
			$themes = array_map( 'sanitize_text_field', $themes );
		}
		if ( is_string( $themes ) ) {
			$themes = array_map( 'trim', explode( ',', sanitize_text_field( $themes ) ) );
		}

		$result = $this->bulkUpdateThemes( $themes );

		if ( is_array( $result ) ) {
			$result = new WP_REST_Response( $result );
		}

		if ( is_wp_error( $result ) ) {
			$result = new WP_Error( 'plugins_update_failed', $result->get_error_message() );
		}
		wp_update_themes();

		return rest_ensure_response( $result );
	}

	/**
	 * Returns whether the current user has the capability to updates themes
	 *
	 * @return bool
	 */
	public function update_themes_permission_check() {
		return current_user_can( 'update_themes' );
	}


	/**
	 * Available core updates information
	 *
	 * @return WP_Error|WP_HTTP_Response|WP_REST_Response
	 */
	public function core_info() {
		if ( ! function_exists( 'get_core_updates' ) ) {
			require_once ABSPATH . 'wp-admin/includes/update.php';
		}

		wp_version_check();
		$updates         = get_core_updates();
		$current_version = get_bloginfo( 'version' );
		$result          = null;

		if ( ! empty( $updates ) ) {
			$result['installed_version'] = $current_version;
			$result                      = array_merge( $result, (array) $updates[0] );
		}

		return rest_ensure_response( $result );
	}

	/**
	 * Update core version
	 *
	 * @return WP_Error|WP_HTTP_Response|WP_REST_Response
	 */
	public function core_update() {
		$this->set_filesystem();
		$result = array();

		include_once ABSPATH . '/wp-admin/includes/update.php';
		include_once ABSPATH . '/wp-admin/includes/class-wp-upgrader.php';
		include_once ABSPATH . '/wp-admin/includes/file.php';
		include_once ABSPATH . '/wp-admin/includes/misc.php';

		$update_in_progress = $this->is_core_updating();
		if ( $update_in_progress ) {
			$result = new WP_Error( 'core_update_in_progress', 'Another update is currently in progress.' );
		} else {
			$result = $this->upgrade_core();
		}


		return rest_ensure_response( $result );
	}

	/**
	 * @return bool
	 */
	public function core_update_permissions_check() {
		return current_user_can( 'update_core' );
	}

	/**
	 * Returns whether the current user has the capability to update core
	 * @return bool
	 */
	public function core_info_permissions_check() {
		return current_user_can( 'update_core' );
	}

	/**
	 * Available site information
	 *
	 * @return WP_Error|WP_HTTP_Response|WP_REST_Response
	 */
	public function site_info() {
		$blog_name = get_bloginfo( 'name' );
		$current_version = get_bloginfo( 'version' );
		$url = get_bloginfo('url');
		$wpurl = get_bloginfo('wpurl');

		$result = [
			'title' => $blog_name,
			'version' => $current_version,
			'home_url' => $url,
			'wp_url' => $wpurl,
			'php_version' => phpversion(),
			'php_handler' => $this->get_php_handler(),
			'path' => ABSPATH,
			'ssl' => $this->get_ssl_certificate_type(),
			'wp_debug' => defined('WP_DEBUG') && WP_DEBUG,
			'mysql' => $this->get_mysql_info()
		];

		return rest_ensure_response( $result );
	}

	/**
	 * Returns whether the current user has the capability to view site information
	 * @return bool
	 */
	public function site_info_permissions_check() {
		return current_user_can( 'update_core' );
	}


	// Private methods
	
	/**
	 * Retrieves the PHP handler.
	 *
	 * @return string PHP handler.
	 */
	private function get_php_handler() {
		return php_sapi_name();
	}

	/**
	 * Retrieves MySQL information.
	 *
	 * @global wpdb $wpdb WordPress database abstraction object.
	 * @return array MySQL information including version, user, database name, host, charset, and collate.
	 */
	private function get_mysql_info() {
		global $wpdb;
		$info = array(
			'version' => $wpdb->get_var("SELECT VERSION()"),
			'user' => $wpdb->dbuser,
			'name' => $wpdb->dbname,
			'host' => $wpdb->dbhost,
			'charset' => defined('DB_CHARSET') ? DB_CHARSET : '',
			'collate' => defined('DB_COLLATE') ? DB_COLLATE : ''
		);
		return $info;
	}

	/**
	 * Retrieves the SSL certificate type, issuer, and validity.
	 *
	 * @return array SSL certificate details or error message.
	 *     - 'certificate_type' (string): The type of the SSL certificate.
	 *     - 'issuer' (string): The issuer of the SSL certificate.
	 *     - 'valid_from' (string): The date and time when the SSL certificate is valid from.
	 *     - 'valid_to' (string): The date and time when the SSL certificate is valid until.
	 *     - 'error' (string): Error message if any issues occur during the process.
	 */	
	private function get_ssl_certificate_type() {
		$url = get_site_url();
		$parsed_url = parse_url($url);
		$host = $parsed_url['host'];

		$stream_context = stream_context_create(array("ssl" => array("capture_peer_cert" => true)));
		$socket_client = @stream_socket_client("ssl://".$host.":443", $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $stream_context);

		if (!$socket_client) {
			return ['error' => "connection_failed" , 'error_msg' => "$host $errstr ($errno)"];
		}

		$context_params = stream_context_get_params($socket_client);
		$cert_resource = $context_params["options"]["ssl"]["peer_certificate"];
		$cert_info = openssl_x509_parse($cert_resource);

		if (!$cert_info) {
			return ['error' => "unable_to_parse_ssl_certificate."];
		}

		date_default_timezone_set('UTC');
		$issuer = $cert_info['issuer']['O'];
		$valid_from = date('Y-m-d H:i:s', $cert_info['validFrom_time_t']);
		$valid_to = date('Y-m-d H:i:s', $cert_info['validTo_time_t']);
		$cert_type = isset($cert_info['extensions']['basicConstraints']) && $cert_info['extensions']['basicConstraints'] == 'CA:FALSE' ? 'end_entity_certificate' : 'ca_certificate';

		return [
			"certificate_type" =>  $cert_type,
			"issuer"  => $issuer,
			"valid_from" => $valid_from,
			"valid_to" => $valid_to
		];
	}

	/**
	 * This method is used to set the authentication cookies based on user ID.
	 *
	 * @param $username
	 *
	 * @return bool
	 */
	private function login( $username ) {
		global $current_user;
		$username = sanitize_text_field( wp_unslash( $username ) );

		if ( isset( $current_user->user_login ) ) {
			if ( $current_user->user_login === $username ) {
				$user_id = wp_validate_auth_cookie();
				if ( isset( $user_id ) and $current_user->ID === $user_id ) {
					return true;
				}

				wp_set_auth_cookie( $current_user->ID );

				return true;
			}
			do_action( 'wp_logout' );
		}

		$user = get_user_by( 'login', $username );

		if ( $user ) {
			delete_user_meta( $user->ID, 'multi_manager_wp_login_token' );
			wp_set_current_user( $user->ID );
			wp_set_auth_cookie( $user->ID );
			// skip wp_login action due to
			// do_action( 'wp_login', $user->user_login, $user );

			return ( is_user_logged_in() and $current_user->user_login === $username );
		}

		return false;
	}

	/**
	 * Compares user login token with previously generated login token
	 *
	 * @param $username
	 * @param $token
	 *
	 * @return bool
	 */
	private function impersonate_token_check( $username, $token ) {
		$user       = get_user_by( 'login', sanitize_text_field( wp_unslash( $username ) ) );
		$user_token = get_user_meta( $user->ID, 'multi_manager_wp_login_token', true );

		if ( hash_equals( $user_token, $token ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Generates user login token and save ot as user meta data
	 *
	 * @param $params
	 *
	 * @return string Impersonate REST-API url with login token as parameter.
	 */
	private function multi_manager_wp_create_login_url( WP_User $user ) {
		$login_url = '';

		if ( $user instanceof WP_User ) {
			$password = wp_generate_password( 16 );
			$token    = sha1( $password );

			update_user_meta( $user->ID, 'multi_manager_wp_login_token', $token );

			wp_schedule_single_event( time() + ( 1 * MINUTE_IN_SECONDS ), 'multi_manager_wp_login_cleanup_expired_tokens', array(
				$user->ID,
				$token
			) );

			$query_args = array(
				'username'                     => $user->user_login,
				'multi_manager_wp_login_token' => $token,
			);
			$login_url  = add_query_arg( $query_args, get_rest_url() . 'multimanager-wp/v1/users/impersonate' );
		}

		return $login_url;
	}

	/**
	 * Check if another core update instance is currently running
	 *
	 * @return bool
	 */
	private function is_core_updating() {
		$option = get_option( 'core_updater.lock' );

		return (bool) $option;
	}

	/**
	 * Helper for bulk themes updates
	 *
	 * @param array $themes
	 *
	 * @return array[]|false
	 */
	private function bulkUpdateThemes( array $themes ) {
		require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
		require_once ABSPATH . 'wp-admin/includes/class-wp-ajax-upgrader-skin.php';
		require_once ABSPATH . 'wp-admin/includes/file.php';

		$current = get_site_transient( 'update_themes' );
		if ( empty( $current ) ) {
			wp_update_themes();
		}

		$skin     = new WP_Ajax_Upgrader_Skin();
		$upgrader = new Theme_Upgrader( $skin );

		return $upgrader->bulk_upgrade( $themes );
	}

	/**
	 * Helper for bulk plugins updates
	 *
	 * @param array $plugins
	 *
	 * @return array|false
	 */
	private function bulkUpdatePlugins( array $plugins ) {
		require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
		require_once ABSPATH . 'wp-admin/includes/class-wp-ajax-upgrader-skin.php';
		require_once ABSPATH . 'wp-admin/includes/file.php';

		wp_update_plugins();
		$skin     = new WP_Ajax_Upgrader_Skin();
		$upgrader = new Plugin_Upgrader( $skin );

		return $upgrader->bulk_upgrade( $plugins );
	}

	/**
	 * Use this method to set FS_METHOD to direct, if $wp_filesystem is not initialized
	 *
	 * @return bool
	 */
	private function set_filesystem() {
		global $wp_filesystem;
		$result = true;

		if ( empty( $wp_filesystem ) ) {
			ob_start();
			include_once ABSPATH . '/wp-admin/includes/file.php';
			$credentials = request_filesystem_credentials( 'direct' );
			ob_end_clean();

			if ( empty( $credentials ) ) {
				if ( ! defined( 'FS_METHOD' ) ) {
					define( 'FS_METHOD', 'direct' );
				}
			}
			$result = \WP_Filesystem( $credentials );
		}

		return $result;
	}

	/**
	 * Update core files
	 *
	 * @return bool
	 */
	private function upgrade_core() {
		global $wp_version;
		$upgraded = false;
		wp_version_check();

		$core_updates = get_core_updates();

		if ( ! empty( $core_updates ) ) {
			foreach ( $core_updates as $core_update ) {
				if ( $core_update->response == 'latest' ) {
					$upgraded = true;
				} elseif ( $core_update->response === 'upgrade' && version_compare( $wp_version, $core_update->current, '<=' ) ) {
					if ( class_exists( '\Core_Upgrader' ) ) {
						$ajax_skin     = new WP_Ajax_Upgrader_Skin();
						$core_upgrader = new \Core_Upgrader( $ajax_skin );
						$upgraded      = @$core_upgrader->upgrade( $core_update );
					}
					break;
				}
			}
		}

		return $upgraded;
	}

	// Cron hook

	/**
	 * Cron to clear generated login tokens
	 *
	 * @param $user_id
	 * @param $token
	 *
	 * @return void
	 */
	public function multi_manager_wp_login_cleanup_login_tokens( $user_id, $token ) {
		delete_user_meta( $user_id, 'multi_manager_wp_login_token', $token );
	}
}