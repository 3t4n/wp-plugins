<?php

/*
 * This class unhooks Google Authenticator's normal login form workflow, and replaces it with one that separates
 * the 2FA token request into a second step, so that only users who have 2FA enabled will be prompted for it.
 *
 * The process flows like this:
 * 1) A user enters a valid username and password
 * 2) If they don't have 2FA enabled, of if they're using an application password, they're logged in like normal
 *    and skip the remaining steps.
 *    If they do have 2FA enabled, they continue to the next step.
 * 3) We create a nonce and store it in their usermeta
 * 4) Before they are logged in and sent auth cookies, we redirect them to a form prompting them for the 2FA
 *    token. The nonce is passed in the URL parameters.
 * 5) If they supply the correct nonce and token, we log them in and redirect them to their original destination.
 */

/**
 * Class Google_Authenticator_Per_User_Prompt
 */
class Google_Authenticator_Per_User_Prompt {
	protected $is_using_application_password;
	const ERROR_EXPIRED_NONCE = 100;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->is_using_application_password = false;

		add_action( 'init', array( $this, 'register_hook_callbacks' ), 11 );	// have to run after Google Authenticator has registered its callbacks
	}

	/*
	 * Register callback methods for WordPress hooks
	 */
	public function register_hook_callbacks() {
		// Remove Google Authenticator's callbacks
		remove_action( 'login_form',          array( GoogleAuthenticator::$instance, 'loginform' ) );
		remove_filter( 'authenticate',        array( GoogleAuthenticator::$instance, 'check_otp' ), 50 );

		// Register our callbacks
		add_filter( 'authenticate',           array( $this, 'validate_application_password' ), 10, 3 );    // before username/password check and email/password check
		add_filter( 'authenticate',           array( $this, 'maybe_prompt_for_token' ), 25, 3 );           // after username/password check and email/password check, but before cookie check
		add_action( 'login_form_gapup_token', array( $this, 'prompt_for_token' ) );
		add_filter( 'wp_login_errors',        array( $this, 'get_login_error_message' ) );
	}

	/**
	 * Checks if the submitted password was a valid application password.
	 *
	 * This is basically copied from GoogleAuthenticator::check_opt(), so it'll need to be kept in sync if changes
	 * are ever made over there. See process_token_form() for why this is necessary, instead of just relying on
	 * check_otp().
	 *
	 * This is called by the 'authenticate' filter, while WordPress is processing a submitted username/password
	 * from the login form.
	 *
	 * @todo Google Authenticator started migrating from sha1() to wp_hash_password() in r830429-plugins.
	 * Once it removes SHA1 support, then you should do the same here.
	 *
	 * @param mixed  $user
	 * @param string $username_or_email
	 * @param string $attempted_password_plaintext
	 *
	 * @return bool
	 */
	public function validate_application_password( $user, $username_or_email, $attempted_password_plaintext ) {
		if ( ! $this->is_application_password_context() ) {
			return $user;
		}

		/*
		 * From Core's perspective, a user entering a valid application password is just entering an invalid
		 * password, so $user will be `null`. We need to fetch the user from the username/email so that we can
		 * check if the application password is valid.
		 */
		$user = $this->get_user_by_name_or_email( $username_or_email );

		// Check application password
		if ( isset( $user->ID ) && 'enabled' == trim( get_user_option( 'googleauthenticator_pwdenabled', $user->ID ) ) ) {
			$valid_password_hash           = json_decode( get_user_option( 'googleauthenticator_passwords', $user->ID ) );
			$valid_password_hash           = trim( $valid_password_hash->{'password'} );
			$attempted_password_plaintext  = strtoupper( str_replace( ' ', '', $attempted_password_plaintext ) );

			if ( hash_equals( sha1( $attempted_password_plaintext ), $valid_password_hash ) || wp_check_password( $attempted_password_plaintext, $valid_password_hash ) ) {
				$this->is_using_application_password = true;
				return $user;
			}
		}

		return null;
	}

	/**
	 * Determine if the current request is appropriate for application passwords
	 *
	 * @return bool
	 */
	protected function is_application_password_context() {
		$xml_rpc_request = defined( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST;
		$app_request     = defined( 'APP_REQUEST'    ) && APP_REQUEST;

		return ( $xml_rpc_request || $app_request );
	}

	/**
	 * Get a user from their username or e-mail address
	 *
	 * @param string $username_or_email
	 *
	 * @return false|WP_User
	 */
	protected function get_user_by_name_or_email( $username_or_email ) {
		$user = get_user_by( 'login', $username_or_email );

		if ( ! $user ) {
			$user = get_user_by( 'email', $username_or_email );
		}

		return $user;
	}

	/**
	 * Redirects the user to the token prompt if they have 2FA enabled.
	 *
	 * If they don't have 2FA enabled, this does nothing and they proceed to the Administration Panels like normal
	 * Login attempts with an application password are also allowed to bypass 2FA.
	 *
	 * This is called during the authenticate filter, after the user has entered a username/password.
	 *
	 * @param mixed  $user
	 * @param string $username_or_email
	 * @param string $attempted_password
	 *
	 * @return mixed
	 */
	public function maybe_prompt_for_token( $user, $username_or_email, $attempted_password ) {
		if ( is_a( $user, 'WP_User' ) ) {	// they entered a valid username/email/password
			if ( 'enabled' == trim( get_user_option( 'googleauthenticator_enabled', $user->ID ) ) && ! $this->is_using_application_password ) {
				$login_nonce  = $this->create_login_nonce( $user->ID );
				$redirect_url = sprintf(
					'%s?action=gapup_token&user_id=%d&gapup_login_nonce=%s%s%s',
					wp_login_url(),
					$user->ID,
					$login_nonce['nonce'],
					isset( $_REQUEST['redirect_to'] ) ? '&redirect_to=' . urlencode( $_REQUEST['redirect_to'] ) : '',
					isset( $_REQUEST['rememberme']  ) ? '&remember_me=' . sanitize_text_field( $_REQUEST['rememberme'] ) : ''
				);

				wp_safe_redirect( $redirect_url );
				die();
			}
		}

		return $user;
	}

	/**
	 * Creates a nonce when the user successfully logs in with a username and password.
	 *
	 * If they later supply this when entering a correct 2FA token, then we can know that they previously logged
	 * in with a correct username/password.
	 *
	 * @param $user_id
	 * @return array|bool
	 */
	protected function create_login_nonce( $user_id ) {
		$login_nonce = array(
			'nonce'      => wp_hash( $user_id . wp_rand() . microtime(), 'nonce' ),
			'expiration' => time() + apply_filters( 'gapup_nonce_expiration', MINUTE_IN_SECONDS )
		);

		update_user_meta( $user_id, 'gapup_login_nonce', $login_nonce );

		return $login_nonce;
	}

	/**
	 * Renders the form that prompts the user for their 2FA token, and handles the submitted form.
	 *
	 * Is called during the login_form_gapup_token action, when the user is redirect to the
	 * [login_url]?action=gapup_token screen, after entering a correct username/password.
	 *
	 * The user can also access this by directly visiting [login_url]?action=gapup_token&user_id=[id], which would
	 * let them attempt to bypass entering a username/password, so we detect that they didn't provide a valid
	 * nonce and redirect them back to the login screen.
	 */
	public function prompt_for_token() {
		$redirect_to = isset( $_REQUEST['redirect_to'] ) ? $_REQUEST['redirect_to'] : '';
		$remember_me = isset( $_REQUEST['remember_me'] ) ? sanitize_text_field( $_REQUEST['remember_me'] ) : '';
		$action_url  = add_query_arg( array( 'action' => 'gapup_token' ), wp_login_url( $redirect_to ) );
		$action_url  = add_query_arg( array( 'remember_me' => $remember_me ), $action_url );

		if ( ! isset( $_REQUEST['user_id'] ) || ! isset( $_REQUEST['gapup_login_nonce'] ) ) {
			return;
		}

		$user = get_user_by( 'id', absint( $_REQUEST['user_id'] ) );

		if ( ! $user ) {
			return;
		}

		$error_message = $this->process_token_form( $_POST, $user );

		require_once( dirname( __FILE__ ) . '/views/token-prompt.php' );
		exit();
	}

	/**
	 * Process the submitted 2FA token form.
	 *
	 * The user's submitted password isn't passed to check_otp() because we would need a way to securely store it
	 * in plaintext between the time it was entered and when we use it here. Because of this, check_otp() won't
	 * authenticate application passwords, so we're checking for those in maybe_prompt_for_token() instead.
	 *
	 * @param  array   $form
	 * @param  WP_User $user
	 * @return string  The error that occurred during processing, if any
	 */
	protected function process_token_form( $form, $user ) {
		$error_message = '';

		if ( isset( $form['gapup_token_prompt'] ) ) {
			$user = GoogleAuthenticator::$instance->check_otp( $user, $user->user_login, null );

			if ( is_a( $user, 'WP_User' ) ) {
				$error_message = $this->login_user( $user );
			} elseif ( is_wp_error( $user ) ) {
				/** @var $user WP_Error */
				$error_message = $user->get_error_message();
			} else {
				$error_message = '<strong>ERROR:</strong> Token could not be validated';
			}
		}

		return $error_message;
	}

	/**
	 * Logs the user in.
	 *
	 * This is called after the user has successfully entered a token.
	 *
	 * @param null|WP_User|WP_Error $user
	 *
	 * @return string
	 */
	protected function login_user( $user ) {
		$credentials = array( 'user_login' => $user->user_login );

		if ( ! empty ( $_REQUEST['remember_me'] ) ) {
			$credentials['remember'] = sanitize_text_field( $_REQUEST['remember_me'] );
		}

		remove_action( 'wp_login',  array( $this, 'maybe_prompt_for_token' ), 10 );     // otherwise the user would be logged out and redirected back to the token form
		add_action( 'authenticate', array( $this, 'verify_original_login' ), 40, 3 );   // after username/password and cookie checks
		$user = wp_signon( $credentials );
		remove_action( 'authenticate', array( $this, 'verify_original_login' ), 40 );

		if ( is_a( $user, 'WP_User' ) ) {
			$redirect_url = isset( $_REQUEST['redirect_to'] ) ? $_REQUEST['redirect_to'] : admin_url();
			wp_safe_redirect( $redirect_url );
			die();
		} elseif( is_wp_error( $user ) ) {	// will only get here if another plugin has an 'authenticate' filter running after ours
			return $user->get_error_message();
		} else {
			return '<strong>ERROR:</strong> Login attempt failed.';
		}
	}

	/**
	 * Verifies that the user logged in with a valid username/password earlier in their login attempt.
	 *
	 * If we didn't do this, someone could just visit the 2FA form directly, then enter a correct 2FA token and
	 * bypass the username/password check. We're intentionally not checking if the $user passed in is already a
	 * WP_User, because they shouldn't be submitting a username/password or have auth cookies at this point in
	 * the process.
	 *
	 * This is called after the user enters a correct 2FA token.
	 *
	 * Note: If there's ever a vulnerability with this, rather than fixing it, it might be better to refactor the
	 * plugin to ask for the regular password and OTP on the same screen, see my comment in
	 * https://github.com/julien731/WP-Google-Authenticator/issues/11.
	 *
	 * @param mixed  $user
	 * @param string $username
	 * @param string $password
	 *
	 * @return WP_User or redirect to login screen
	 */
	public function verify_original_login( $user, $username, $password ) {
		/*
		 * Unlike in most `authenticate` callbacks, here $username is guaranteed to be the username (and not the
		 * e-mail address) because the credentials are setup in $this->login_user().
		 *
		 * Therefore, unlike other callbacks, we don't need to check attempt getting the user by name and email.
		 */
		$user = get_user_by( 'login', $username );

		if ( $this->verify_login_nonce( $user->ID, $_POST['gapup_login_nonce'] ) ) {
			return $user;
		} else {
			$redirect_url = sprintf(
				'%s?gapup_error=%s%s',
				wp_login_url(),
				self::ERROR_EXPIRED_NONCE,
				isset( $_REQUEST['redirect_to'] ) ? '&redirect_to=' . urlencode( $_REQUEST['redirect_to'] ) : ''
			);

			wp_safe_redirect( $redirect_url );
			die();
		}
	}

	/**
	 * Verify the user submitted nonce.
	 *
	 * It must match the one we gave them when they logged in, and it can't have expired since we issued it.
	 *
	 * See note in verify_original_login() about handling any future vulnerabilities.
	 *
	 * @param  int    $user_id
	 * @param  string $attempted_nonce
	 * @return bool
	 */
	protected function verify_login_nonce( $user_id, $attempted_nonce ) {
		$login_nonce = get_user_meta( $user_id, 'gapup_login_nonce', true );
		$valid       = false;

		if ( isset( $login_nonce['nonce'] ) && hash_equals( $attempted_nonce, $login_nonce['nonce'] ) ) {
			if ( time() < $login_nonce['expiration'] ) {
				delete_user_meta( $user_id, 'gapup_login_nonce' );    // so it can only be used once
				$valid = true;
			}
		}

		return $valid;
	}

	/**
	 * Adds error messages to the username/password screen when they were passed by URL parameters.
	 *
	 * @param  WP_Error $errors
	 * @return WP_Error
	 */
	public function get_login_error_message( $errors ) {
		$code = isset( $_REQUEST['gapup_error'] ) ? $_REQUEST['gapup_error'] : null;

		switch( $code ) {
			case self::ERROR_EXPIRED_NONCE:
				$errors->add( 'gapup_' . self::ERROR_EXPIRED_NONCE, '<strong>ERROR:</strong> Your login nonce has expired. Please log in again.' );
			break;
		}

		return $errors;
	}
} // end Google_Authenticator_Per_User_Prompt
