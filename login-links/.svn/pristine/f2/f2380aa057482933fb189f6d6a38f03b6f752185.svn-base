<?php

class LLLinkAutoLogin {
	public static function listenLoginAttempts() {
		if ( 
			defined('DOING_AJAX') && DOING_AJAX ||
			defined('REST_REQUEST') && REST_REQUEST ||
			defined('DOING_CRON') && DOING_CRON ||
			is_admin()
		) {
			return;
		}
		
		if( ( $token = self::parseLoginToken() ) === false ) {
			return;
		}

		add_action( 'init', function() use ( $token ) {
			try {
				self::loginUserByLinkToken( $token );
			} catch (Exception $e) {
				die(esc_html($e->getMessage()));
			}
		}, PHP_INT_MIN, 0 );
	}

	private static function loginUserByLinkToken( $token ) {
		$link = LLLoginLink::getByToken( $token );
		if( ! $link ) {
			return;
		}

		$user_id = $link->getUserId();

		if ( is_user_logged_in() ) {
			$current_user = wp_get_current_user();
			if ( $current_user->ID == $user_id ) {
				return;
			}
		}
	
		if( $link->isExpired() ) {
			wp_die( 'Link is expired.' );
		}
	
		if ( $user_id ) {
			$user = self::loginUserById( $user_id );
			if ( is_a( $user, 'WP_User' ) ) {
				wp_set_current_user( $user->ID, $user->user_login );
				wp_set_auth_cookie( $user->ID );
				if ( is_user_logged_in() ) {
					global $wp;
					$parameterPrefix = LLLoginLink::getParameterPrefix();
					$key = $parameterPrefix . $token;
					LLLoginLink::incrementLoginsUsed( $link->id );
					do_action('ll_link_login_user_success', $link, $user);
					wp_redirect( remove_query_arg( $key, home_url( $wp->request ) ) );
					die();
				}
			} else {
				wp_die( 'Couldn\'t login user' );
			}
		} else {
			wp_die( 'Invalid token.' );
		}
	}

	public static function loginUserById( $user_id ) {
		if ( is_user_logged_in() ) {
			wp_logout();
		}
	
		add_filter( 'authenticate', ['LLLinkAutoLogin','allowProgrammaticLogin'], PHP_INT_MAX, 3 );
	
		if( filter_var( $user_id, FILTER_VALIDATE_INT ) !== false ) {
			$user = get_user_by('ID', $user_id);
			$user_login = $user->user_login;
		} else {
			die( 'User ID is wrong' );
		}
	
		if ( ! $user ) {
			die( 'User with login or ID ' . esc_html($user_login) . ' doesn\'t exist' );
		}
		
		$user = wp_signon( array( 'user_login' => $user_login, 'remember' => true ) );
		remove_filter( 'authenticate', ['LLLinkAutoLogin','allowProgrammaticLogin'], PHP_INT_MAX, 3 );
	
		if ( is_a( $user, 'WP_User' ) ) {
			wp_set_current_user( $user->ID, $user->user_login );
			if ( is_user_logged_in() ) {
				return $user;
			}
		}
	
		return false;
	}

	public static function allowProgrammaticLogin( $user, $username, $password ) {
		return get_user_by( 'login', $username );
	}

	private static function parseLoginToken() {
		$token = null;
		$parameterPrefix = LLLoginLink::getParameterPrefix();

		foreach ($_GET as $rawKey => $value) {
			$key = sanitize_text_field($rawKey);

			if ( strpos( $key, $parameterPrefix ) !== 0 ) {
				continue;
			}

			$token = substr( $key, strlen( $parameterPrefix ) );

			if ( empty( $token ) ) {
				continue;
			} else {
				return $token;
			}
		}
		return false;
	}
}
