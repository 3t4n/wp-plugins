<?php
namespace Admintosh\Inc;
 /**
  * 
  * @package    Admintosh
  * @version    1.0.0
  * @author     wpmobo
  * @Websites: http://wpmobo.com
  *
  */
 
 class Hide_Login {

    protected $options;

    protected $isWPLoginPHP;
    
    public function __construct() {

        $this->options = get_option( ADMINTOSH_OPTION_NAME );

        $get_options = $this->options;


        if( empty( $this->options['login_slug'] ) ) {
            return;
        }

        add_action( 'plugins_loaded', [ $this, 'plugins_loaded' ], 9999 );
        add_action( 'wp_loaded', [ $this, 'wp_loaded' ]  );
        add_filter('site_url', array($this, 'site_url'), 10, 4);
        
    }


    public function plugins_loaded() {

        global $pagenow;

        $request = parse_url(rawurldecode($_SERVER['REQUEST_URI']));

        if( ( strpos(rawurldecode($_SERVER['REQUEST_URI']), 'wp-login.php') !== false || (isset($request['path']) && untrailingslashit($request['path']) === site_url('wp-login', 'relative')) )  && !is_admin() ) {

            $this->isWPLoginPHP = true;
            $pagenow = 'index.php';
        }

        if ( ( isset($request['path']) && untrailingslashit($request['path']) === home_url($this->newLoginSlug(), 'relative') ) || ( !get_option('permalink_structure') && isset( $_GET[$this->newLoginSlug()] ) && empty( $_GET[$this->newLoginSlug()] ) ) ) {

            $_SERVER['SCRIPT_NAME'] = $this->newLoginSlug();

             $pagenow = 'wp-login.php';

        }


    }

    public function wp_loaded() {

        global $pagenow;

        $request = parse_url( rawurldecode( $_SERVER['REQUEST_URI'] ) );

        if( !( isset($_GET['action']) && $_GET['action'] === 'postpass' && isset($_POST['post_password']) ) ) {

            if (is_admin() && !is_user_logged_in() && !defined('WP_CLI') && !defined('DOING_AJAX') && !defined('DOING_CRON') && $pagenow !== 'admin-post.php' && $request['path'] !== '/wp-admin/options.php') {
                wp_safe_redirect($this->newRedirectUrl());
                die();
            }

            if (!is_user_logged_in() && isset($_GET['wc-ajax']) && $pagenow === 'profile.php') {
                wp_safe_redirect($this->newRedirectUrl());
                die();
            }

            if (!is_user_logged_in() && isset($request['path']) && $request['path'] === '/wp-admin/options.php') {
                header('Location: ' . $this->newRedirectUrl());
                die;
            }

            //
            if ($pagenow === 'wp-login.php') {

                global $error, $interim_login, $action, $user_login;

                $redirect_to = admin_url();

                $requested_redirect_to = '';
                if (isset($_REQUEST['redirect_to'])) {
                    $requested_redirect_to = $_REQUEST['redirect_to'];
                }

                if (is_user_logged_in()) {
                    $user = wp_get_current_user();
                    if (!isset($_REQUEST['action'])) {
                        $logged_in_redirect = apply_filters('adtosh_logged_in_redirect', $redirect_to, $requested_redirect_to, $user);
                        wp_safe_redirect($logged_in_redirect);
                        die();
                    }
                }

                @require_once ABSPATH . 'wp-login.php';

                die;

            } elseif ( $this->isWPLoginPHP == true  ) {


                 if (
                        ($referer = wp_get_referer())
                        && strpos($referer, 'wp-activate.php') !== false
                        && ($referer = parse_url($referer))
                        && !empty($referer['query'])
                    ) {

                        parse_str($referer['query'], $referer);

                        @require_once WPINC . '/ms-functions.php';

                        if (
                            !empty($referer['key'])
                            && ($result = wpmu_activate_signup($referer['key']))
                            && is_wp_error($result)
                            && ($result->get_error_code() === 'already_active'
                                || $result->get_error_code() === 'blog_taken')
                        ) {

                            wp_safe_redirect($this->newRedirectUrl()
                                . (!empty($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : ''));

                            die;

                        }

                    }

               wp_safe_redirect($this->newRedirectUrl());
                die();
            }

        }

    }
    

    public function newLoginUrl() {
        return home_url('/').$this->newLoginSlug();
    }

    public function newLoginSlug() {
        return !empty( $this->options['login_slug'] ) ? sanitize_text_field( $this->options['login_slug'] ) : sanitize_text_field( 'wp-admin' );
    }

    public function newRedirectUrl() {
        $slug = !empty( $this->options['redirection_page_slug'] ) ? $this->options['redirection_page_slug'] : '404';
        return home_url( sanitize_text_field( $slug ) );
    }


    public function site_url( $url, $path, $scheme, $blog_id ) {

        global $pagenow;

        $origin_url = $url;

        if (strpos($url, 'wp-login.php?action=postpass') !== false) {
            return $url;
        }

        if (is_multisite() && 'install.php' === $pagenow) {
            return $url;
        }
        
        if( strpos($url, 'wp-login.php') !== false && strpos(wp_get_referer(), 'wp-login.php') === false ) {


            $args = explode('?', $url);

            if (isset($args[1])) {

                parse_str($args[1], $args);

                if (isset($args['login'])) {
                    $args['login'] = rawurlencode($args['login']);
                }

                $url = add_query_arg( $args, $this->newLoginUrl() );

            } else {
                $url = $this->newLoginUrl();
            }

        }

        if( isset($_POST['post_password']) ) {
            global $current_user;
            if (!is_user_logged_in() && is_wp_error(wp_authenticate_username_password(null, $current_user->user_login, $_POST['post_password']))) {
                return $origin_url;
            }
        }

        return $url;

    }


}

