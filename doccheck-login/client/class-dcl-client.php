<?php

namespace DCL\Client;

use DCL\Includes\DCL_Base;

/**
 * Client: basic functionality.
 *
 * Defines public facing, basic plugin functionality.
 *
 * @package    DCL\Client
 * @author     antwerpes ag <opensource@antwerpes.com>
 */
class DCL_Client extends DCL_Base {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $plugin_name The ID of this plugin.
	 */
	protected $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $version The current version of this plugin.
	 */
	protected $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function __construct( $plugin_name, $version ) {
		parent::__construct();

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Filter search results.
	 *
	 * If the user is not logged in he should not get
	 * access restricted posts or pages via the search.
	 *
	 * @param   $query
	 *
	 * @return  mixed
	 * @since   1.0.0
	 * @access  public
	 */
	public function dcl_filter_search_results( $query ) {
		if ( (bool) $query->is_search && false === $this->dcl_has_logged_in_user() ) {
			$meta_query = [
				[
					'restrict_access_exists' => [
						'key'     => 'dcl_restrict_access',
						'compare' => 'NOT EXISTS',
					]
				]
			];

			$query->set( 'meta_query', $meta_query );

			if ( ! isset( $query->query_vars['post_type'] ) ) {
				$query->set( 'post_type', [ 'page', 'post' ] );
			}
		}

		return $query;
	}

	/**
	 * Filter menu items.
	 *
	 * If user checked the option, this function will filter
	 * out all access restricted pages from menus.
	 *
	 * @param $items
	 *
	 * @return mixed
	 * @since   1.0.0
	 * @access  public
	 */
	public function dcl_filter_menus( $items ) {
		$filter_menus = (bool) get_option( 'dcl_general_hide_menu_items' );

		if ( $filter_menus && false === $this->dcl_has_logged_in_user() ) {
			foreach ( $items as $key => $item ) {
				$access_restriction = get_post_meta( $item->object_id, 'dcl_restrict_access', true );

				if ( $access_restriction === 'on' ) {
					unset( $items[ $key ] );
				}
			}
		} elseif ( $filter_menus && true === $this->dcl_has_logged_in_user() ) {

			foreach ( $items as $key => $item ) {
				$group_restriction  = get_post_meta( $item->object_id, 'dcl_group_routing', true );
				$access_restriction = get_post_meta( $item->object_id, 'dcl_restrict_access', true );
				$occupation_id      = isset( $_SESSION['pro_id'] ) ? sanitize_text_field( $_SESSION['pro_id'] ) : null;

				if ( $occupation_id != null && $group_restriction != "" && $access_restriction === 'on' ) {


					if ( is_array( $occupation_id ) ) {
						// Sanitize and validate the elements of the array
						$occupation_id = array_map( 'sanitize_text_field', $occupation_id );

						if ( empty( array_intersect( $occupation_id, $group_restriction ) ) ) {

							unset( $items[ $key ] );

						}

					} else {

						if ( ! in_array( $occupation_id, $group_restriction ) ) {
							unset( $items[ $key ] );
						}

					}
				}

			}
		}

		return $items;
	}

	/**
	 * Filter menu items.
	 *
	 * If user checked the option, this function will filter
	 * out all access restricted pages from menus.
	 *
	 * @param  $content
	 *
	 * @return mixed
	 * @since   1.0.0
	 * @access  public
	 */
	public function dcl_restricted_content( $content ) {
		// Check if we're inside the main loop in a single Post.
		if ( ( is_page() || is_singular() ) && in_the_loop() && is_main_query() && isset( $_SESSION['restricted'] ) ) {
			return 'You cannot enter this page, as it is only accessible to particular professions. Click <a href="' . $this->dcl_get_professionals_permalink() . '">here</a> to get back.';
		}

		return $content;
	}

	/**
	 * Access redirect.
	 *
	 * Redirects user to login page if the access is restricted
	 * and there is no cookie to validate that the user is a DocCheck user.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function dcl_access_redirect() {
		global $post;

		// Skip ahead if page is not access restricted
		// or the client is a DocCheck crawler
		// or the user is "logged in" via DocCheck
		if ( false === $this->dcl_is_access_restricted()
		     || $this->dcl_is_client_dc_crawler()
		) {
			return;
		}

		// If the user is "logged in" but a login is also in progress
		// Redirect if necessary
		if ( $this->dcl_has_logged_in_user() ) {
			if ( $this->dcl_login_in_progress() && $this->dcl_is_valid_login_time() ) {
				$this->dcl_do_login();
			} else {

				$occupation_id = isset( $_SESSION['pro_id'] ) ? sanitize_text_field( $_SESSION['pro_id'] ) : null;

				//if routing option is not aktiviert reset the page filtering
				if ( ! get_option( 'dcl_general_profession_routing_active' ) ) {
					update_post_meta( get_the_ID(), 'dcl_group_routing', '' );
					update_post_meta( get_the_ID(), 'dcl_all_group', '' );
				}
				$redirect_url                       = esc_url( $this->dcl_get_restricted_redirect_permalink() );
				$restricted_page_profession_routing = get_post_meta( get_the_ID(), 'dcl_group_routing', true );

				if ( $occupation_id != null && $restricted_page_profession_routing != "" && is_array( $restricted_page_profession_routing ) ) {

					if ( is_array( $occupation_id ) ) {
						// Sanitize and validate the elements of the array
						$occupation_id = array_map( 'sanitize_text_field', $occupation_id );

						if ( ! empty( array_intersect( $occupation_id, $restricted_page_profession_routing ) ) || $restricted_page_profession_routing == "" ) {
							return;
						} else {

							wp_redirect( $redirect_url );
							exit();

						}
					} else {


						if ( in_array( $occupation_id, $restricted_page_profession_routing ) || $restricted_page_profession_routing == "" ) {
							return;
						} else {

							wp_redirect( $redirect_url );
							exit();
						}

					}
				} else {
					return;
				}
			}
		}

		// Do login if requested
		if ( $this->dcl_login_in_progress() ) {
			$this->dcl_do_login();
		}

		// Seems like nothing quite fits,
		// this page should be protected by the DocCheck login
		$this->dcl_redirect_to_login();
	}

	/**
	 * "Login" DocCheck user.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function dcl_do_login() {

		// Check if this request still makes sense
		if ( $this->dcl_is_valid_login_time() ) {

			// Get login id and client secret
			if ( WP_DEBUG ) {
				$login_id      = get_option( 'dcl_general_login_id_debug' );
				$client_secret = get_option( 'dcl_client_secret_debug' );
			} else {
				$login_id      = get_option( 'dcl_general_login_id' );
				$client_secret = get_option( 'dcl_client_secret' );
			}

			$number_of_occupations = get_option( 'dcl_general_add_profession_routing' );
			$occupation_activated  = get_option( 'dcl_general_profession_routing_active' );

			$occupations_routing       = [];
			$occupations_routing_first = [];
			$utm_parameters            = $this->dcl_get_sanitized_utm_parameters();

			if ( empty( $utm_parameters ) ) {
				$redirect_permalink = get_permalink();
			} else {
				$redirect_permalink = add_query_arg( $utm_parameters, get_permalink() );
			}

			if ( $occupation_activated ) {
				$occupations_routing_first = array(
					'occupation_id'       => get_option( 'dcl_general_jobs' ),
					'occupation_redirect' => get_option( 'dcl_general_pages' )
				);

				for ( $i = 0; $i < $number_of_occupations; $i ++ ) {
					$occupations_routing[ $i ] = array(

						'occupation_id'       => get_option( 'dcl_general_jobs' . $i ),
						'occupation_redirect' => get_option( 'dcl_general_pages' . $i )
					);
				}

				array_push( $occupations_routing, $occupations_routing_first );

			}


			// Get login code from request
			$login_code = isset( $_GET['code'] ) ? sanitize_text_field( $_GET['code'] ) : null;

			// get the user occupation_id and parent id
			$occupation_profession_id        = isset( $_GET['dc_profession_id'] ) ? sanitize_text_field( $_GET['dc_profession_id'] ) : null;
			$occupation_profession_parent_id = isset( $_GET['dc_profession_parent_id'] ) ? sanitize_text_field( $_GET['dc_profession_parent_id'] ) : null;

			// Send POST request to DocCheck oauth service
			$response = $this->dcl_request_access_token(
				$login_id,
				$client_secret,
				$login_code
			);

			// @todo: Errorhandling for empty / false response

			session_abort();

			// now open the session with write access
			session_start( [ 'cookie_lifetime' => 86400 ] );
			// Success
			// Received access token
			if ( property_exists( $response, 'access_token' ) ) {
				// Save token to session
				$this->dcl_set_session_token( $response->access_token );

				if ( $occupation_activated ) {
					if ( $occupation_profession_parent_id != null ) {

						if ( $occupation_profession_parent_id === $occupation_profession_id ) {
							$occupation_id = $occupation_profession_id;

							$_SESSION['pro_id'] = $occupation_profession_id;
						} else {
							$occupation_id      = array( $occupation_profession_parent_id, $occupation_profession_id );
							$_SESSION['pro_id'] = array( $occupation_profession_parent_id, $occupation_profession_id );
						}
					} else {
						$_SESSION['pro_id'] = $occupation_profession_id;
					}

					session_write_close();
					session_start( [
						'cookie_lifetime' => 86400,
						'read_and_close'  => true,    // READ ACCESS FAST
					] );
					if ( count( $occupations_routing ) > 0 ) {
						foreach ( $occupations_routing as $item ) {


							if ( is_array( $occupation_id ) ) {

								if ( ! empty( array_intersect( $occupation_id, $item ) ) ) {
									$redirect_permalink = get_permalink( $item['occupation_redirect'] );

									if ( ! empty( $utm_parameters ) ) {
										$redirect_permalink = add_query_arg( $utm_parameters, $redirect_permalink );
									}
								}

							} else {

								if ( in_array( $occupation_id, $item ) ) {
									$redirect_permalink = get_permalink( $item['occupation_redirect'] );

									if ( ! empty( $utm_parameters ) ) {
										$redirect_permalink = add_query_arg( $utm_parameters, $redirect_permalink );
									}
								}

							}
						}
					}
				}

				// Remove parameters from URL
				wp_redirect( $redirect_permalink );

				exit;
			}
		}

		// Error
		// Write to error log and redirect to login page
		if ( isset( $response ) && property_exists( $response, 'error' ) ) {
			error_log( 'DocCheck access token request error: ' . $response->error );
		}

		$this->dcl_redirect_to_login();
		exit();
	}

	/**
	 * "Logout" DocCheck user.
	 *
	 * Kills the session so the user counts as logged out.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function dcl_do_logout() {
		// Sanitize and validate nonce
		$logout_nonce = isset( $_REQUEST['dcl_logout_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['dcl_logout_nonce'] ) ) : '';

		$redirect_url = home_url();

		// If the nonce is okay, remove the logged-in cookie
		if ( wp_verify_nonce( $logout_nonce, 'dcl_logout_nonce' ) ) {
			// Sanitize and validate the redirect URL
			$redirect_url = esc_url( $redirect_url );

			// Destroy the session
			session_abort();

			// Now open the session with write access
			session_start( [ 'cookie_lifetime' => 86400 ] );
			session_destroy();
		}

		// Escape and validate the redirect URL before redirecting
		wp_redirect( esc_url( $redirect_url ) );
		exit();
	}

	/**
	 * Check if there is a login request
	 * that should be processed.
	 *
	 * @return bool
	 * @since   1.0.0
	 */
	private function dcl_login_in_progress() {
		if ( isset( $_GET['dc_timestamp'] ) && isset( $_GET['code'] ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Check login request time.
	 *
	 * Makes sure the time when the request was sent and the current time are not too far apart.
	 * So you can't send a login request repeatedly.
	 *
	 * @return bool
	 * @since   1.0.0
	 */
	private function dcl_is_valid_login_time() {
		$login_timestamp = isset( $_GET['dc_timestamp'] ) ? sanitize_text_field( $_GET['dc_timestamp'] ) : null;
		$refresh_time    = time() - ( 60 * 5 );

		return $login_timestamp >= $refresh_time;
	}


	/**
	 * Request access token from oauth service.
	 *
	 * @param $login_id
	 * @param $client_secret
	 * @param $login_code
	 *
	 * @return array|mixed|object
	 * @since   1.0.0
	 */
	private function dcl_request_access_token( $login_id, $client_secret, $login_code ) {

		$args     = array(
			'method'      => 'POST',
			'timeout'     => 10,
			'httpversion' => '1.1',
			'sslverify'   => false, // Set to true if your server has SSL issues
			'body'        => array(
				'client_id'     => $login_id,
				'client_secret' => $client_secret,
				'code'          => $login_code,
				'grant_type'    => 'authorization_code'
			),
		);
		$response = wp_remote_post( self::DCL_OAUTH_SERVICE, $args );

		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			// Handle the error as needed
		} else {
			// Process the response as needed
			$body = wp_remote_retrieve_body( $response );
			$auth = json_decode( $body );

			return $auth;
		}

	}

	/**
	 * @param $saved_access_token
	 *
	 * @return mixed
	 */
	private function dcl_request_userdata( $saved_access_token ) {
		$args     = array(
			'method'      => 'POST',
			'timeout'     => 10,
			'httpversion' => '1.1',
			'sslverify'   => false, // Set to true if your server has SSL issues
		);
		$response = wp_remote_post( self::DCL_OAUTH_SERVICE_USERDATA . '?access_token=' . $saved_access_token, $args );

		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			// Handle the error as needed
		} else {
			// Process the response as needed
			$body = wp_remote_retrieve_body( $response );
			$auth = json_decode( $body );

			return $auth;
		}
	}


	/**
	 * Request access token validation
	 * from oAuth API.
	 *
	 * @param $saved_access_token
	 *
	 * @return mixed
	 */
	private function dcl_request_token_validation( $saved_access_token ) {

		$args     = array(
			'method'      => 'POST',
			'timeout'     => 10,
			'httpversion' => '1.1',
			'sslverify'   => false, // Set to true if your server has SSL issues
		);
		$response = wp_remote_post( self::DCL_CHECK_TOKEN . '?access_token=' . $saved_access_token, $args );

		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			// Handle the error as needed
		} else {
			// Process the response as needed
			$body = wp_remote_retrieve_body( $response );
			$auth = json_decode( $body );
		}

		return $auth->boolIsValid;
	}


	/**
	 * Redirect to login page.
	 *
	 * @since   1.0.0
	 */
	private function dcl_redirect_to_login() {
		$utm_parameters = $this->dcl_get_sanitized_utm_parameters();

		if ( empty( $utm_parameters ) ) {
			$redirect_url = get_permalink();
		} else {
			$redirect_url = str_replace( '?', '&', add_query_arg( $utm_parameters, get_permalink() ) );
		}

		$login_url = $this->dcl_get_login_permalink( $redirect_url );
		// Set redirect cookie
		$this->dcl_set_session_redirect_url( $redirect_url );
		wp_redirect( $login_url );
	}
}
