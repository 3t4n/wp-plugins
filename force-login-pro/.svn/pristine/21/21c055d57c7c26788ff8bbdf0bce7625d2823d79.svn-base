# Force Login Pro
A simple WordPress plugin to force login.

[![Build Status](https://travis-ci.org/accessnetworks/force-login-pro.svg?branch=master)](https://travis-ci.org/accessnetworks/force-login-pro)

## Description

Keep your WordPress site secure by requiring all visitors to first login to your site. Simply turn it on and it works out of the box.

### Features

* Multisite Compatible.
* Hooks & Filters for Developers.
* Restricts access to the REST API for authenticated users.
* Translation Ready.
* WordPress Coding Standards compliant.

### Bug Reports
Bug reports can be submitted on [Github](https://github.com/accessnetworks/force-login-pro/issues).

## FAQ

1. How can I specify a URL to redirect to on login?
By default, the plugin sends visitors back to the URL they tried to visit. However, you can set a specific URL to always redirect users to by adding the following filter to your functions.php file.

The URL must be absolute (as in, http://example.com/mypage/). Recommended: home_url( ‘/mypage/’ ).

```php
/**
 * Set the URL to redirect to on login.
 *
 * @return string URL to redirect to on login. Must be absolute.
 */
function my_force_login_pro_redirect() {
  return home_url( '/mypage/' );
}
add_filter( 'force_login_redirect', 'my_force_login_pro_redirect' );
```

2. How can I add exceptions for certain pages, posts or locations?

You can bypass Force Login based on any condition or specify an array of URLs to whitelist by adding either of the following filters to your functions.php file. You may also use the WordPress Conditional Tags.

#### Bypass Force Login

```php
/**
 * Bypass Force Login to allow for exceptions.
 *
 * @param bool $bypass Whether to disable Force Login. Default false.
 * @return bool
 */
function my_forcelogin_bypass( $bypass ) {
  if ( is_single() ) {
    $bypass = true;
  }
  return $bypass;
}
add_filter( 'force_login_bypass', 'my_forcelogin_bypass' );
```
#### Whitelist URLs
Each URL must be absolute (as in, http://example.com/mypage/). Recommended: home_url( ‘/mypage/’ ).

```php
/**
 * Filter Force Login to allow exceptions for specific URLs.
 *
 * @param array $whitelist An array of URLs. Must be absolute.
 * @return array
 */
function my_force_login_pro_whitelist( $whitelist ) {
  $whitelist[] = home_url( '/mypage/' );
  $whitelist[] = home_url( '/2019/03/post-title/' );
  return $whitelist;
}
add_filter( 'force_login_whitelist', 'my_force_login_pro_whitelist' );
```

#### Bypass based on IP Address
Here is an example to whitelist based on IP Address.

```php
/**
 * Bypass Force Login to allow for exceptions.
 *
 * @return bool Whether to disable Force Login. Default false.
 */
function my_force_login_pro_bypass( $bypass ) {
  if ( $_SERVER['REMOTE_ADDR'] == '127.0.0.1' ) {
    $bypass = true;
  }
  return $bypass;
}
add_filter( 'force_login_bypass', 'my_force_login_pro_bypass', 10, 1 );
```

3. How can I add exceptions for dynamic URLs?

4. How do I get the WordPress mobile app to work?
By default, the plugin blocks access to all page URLs; you may need to whitelist the XML-RPC page to allow the WordPress app to access your site for remote publishing.

```php
/**
 * Filter Force Login to allow exceptions for specific URLs.
 *
 * @param array $whitelist An array of URLs. Must be absolute.
 * @return array
 */
function my_force_login_pro_whitelist( $whitelist ) {
  $whitelist[] = site_url( '/xmlrpc.php' );
  return $whitelist;
}
add_filter( 'force_login_whitelist, 'my_force_login_pro_whitelist' );
```

5. How can I enable the REST API? Or a Specific API Endpoint?

You can unblock the rest api by adding this one line to any theme or plugin you may be using:
```
remove_filter( 'rest_authentication_errors', 'force_login_rest_access' );
```

```php
/**
 * Authenticate the JSON API
 *
 * @param WP_Error|mixed $result Error from another authentication handler, null if we should handle it, or another value if not
 * @return WP_Error|boolean|null {@see WP_JSON_Server::check_authentication}
 */
function my_rest_authentication( $result ) {
    if ( $result !== null ) {
        return $result;
    }

   // my custom logic here
   // if ( $condition ) {
   //     $result = true;
   // }

   return $result;
}
add_filter( 'rest_authentication_errors', 'my_rest_authentication' );
```
