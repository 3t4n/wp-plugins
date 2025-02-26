There are a few environment specific details that need to be setup in order for the acceptance tests to work.

1) The configuration values in the various Codeception config files must match the environment (e.g., database
   credentials, web server URL, etc).

2) wp-config.php should define DB_NAME as 'wordpress_unit_tests' if $_SERVER['HTTP_USER_AGENT'] contains 'BrowserKit'
   or 'Guzzle', so that the test database will be used instead of the live one. For example,


   $codeception_request     = false;  // this is also used in mu-plugins/sandbox-functionality.php
   $codeception_user_agents = array( 'BrowserKit', 'Guzzle' );

   foreach ( $codeception_user_agents as $agent ) {
   	if ( false !== strpos( $_SERVER['HTTP_USER_AGENT'], $agent ) ) {
   		$codeception_request = true;
   		break;
   	}
   }

   define( 'DB_NAME', $codeception_request ? 'wordpress_unit_tests' : 'wp_dev' );


3) There should be an mu-plugin with a `gapup_nonce_expiration` filter callback that returns (int) 5, so that
   we don't have to wait the full 3 minutes during nonce expiration tests. For example,


   /**
    * Expire in 5 seconds when running acceptance tests so don't have to wait forever
    */
   function gapup_nonce_expiration( $expiration ) {
   	global $codeception_request;

   	if ( $codeception_request ) {
   		$expiration = 5;
   	}

   	return $expiration;
   }
   add_filter( 'gapup_nonce_expiration', 'gapup_nonce_expiration' );


Once those are setup, you can `codecept run` from the plugin's root directory.

If the tests are failing after everything is setup correctly, it may be that the WP database needs to be upgraded,
and requests to wp-admin are being redirected to upgrade.php. You can verify that with `codecept run --debug`. If
that happens, you need to run the upgrader manually, then export the database to `tests/_data/wordpress_unit_tests.sql`.
If you do that, make sure that the GA plugin is activated, since the failing tests will deactivate it.
