<?php

/**
 * Fired during plugin activation
 *
 * @link       https://profiles.wordpress.org/thebootstrapthemes/
 * @since      1.0.0
 *
 * @package    The_Bootstrap_Themes_Companion
 * @subpackage The_Bootstrap_Themes_Companion/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    The_Bootstrap_Themes_Companion
 * @subpackage The_Bootstrap_Themes_Companion/includes
 * @author     thebootstrapthemes <a@gmail.com>
 */
class The_Bootstrap_Themes_Companion_Activator {

	/**
   * Check if an item exists out there in the "ether".
   *
   * @param string $url - preferably a fully qualified URL
   * @return boolean - true if it is out there somewhere
   */
  static function url_exists($url) {
    if (($url == '') || ($url == null)) {
        return false;
    }

    if ( strpos( $url, home_url() ) !== false ) {
      $args = array(
        'method' => 'GET',
        'timeout' => 45,
        'redirection' => 5,
        'httpversion' => '1.0',
        'blocking' => true,
        'sslverify' => false,
        'headers' => array(),
        'cookies' => array(
          SECURE_AUTH_COOKIE => isset($_COOKIE[SECURE_AUTH_COOKIE]) ? $_COOKIE[SECURE_AUTH_COOKIE] : null,
          AUTH_COOKIE => isset($_COOKIE[AUTH_COOKIE]) ? $_COOKIE[AUTH_COOKIE] : null,
          LOGGED_IN_COOKIE => isset($_COOKIE[LOGGED_IN_COOKIE]) ? $_COOKIE[LOGGED_IN_COOKIE] : null,
        )
      );
    } else {
      $args = array();
    }

    $response = wp_remote_get( $url, $args);
    $code = wp_remote_retrieve_response_code( $response );
    $body = wp_remote_retrieve_body( $response );
    $body = wp_unslash( $body );

    if ( strpos( $body, 'id="error-page"' ) !== false ) {
      return false;
    }
    $accepted_status_codes = array( 200, 301 );
    if ( ! is_wp_error( $response ) && in_array( wp_remote_retrieve_response_code( $response ), $accepted_status_codes ) ) {
      return true;
    }
    return false;
  }

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		add_option('the_bootstrap_themes_companion_do_activation_redirect', true);
	}

	public static function redirect() {
		if ( get_option('the_bootstrap_themes_companion_do_activation_redirect', false) ) {
	    delete_option('the_bootstrap_themes_companion_do_activation_redirect');
	    
	    if(!isset($_GET['activate-multi'])) {
	      $template_slug = get_option('template');
			  if ( strpos( $template_slug, '-pro' ) !== false ) {
			    $template_slug = str_replace( '-pro', '', $template_slug );
			  }

			  $url = add_query_arg(
			    array(
			        'page' => $template_slug
			    ),
			    admin_url('themes.php')
			  );

			  // Check url exists
			  // Don't forget to exit() because wp_redirect doesn't exit automatically
			  if ( self::url_exists( $url ) ) {
			  	exit( wp_redirect( $url ) );
			  } else {
			  	exit( wp_redirect( admin_url('plugins.php') ) );
			  }
	    }
	  }
	}

}
