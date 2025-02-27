<?php
/*
Plugin Name: Redirect Login to WooCommerce "My account" Page
Plugin URI: https://wordpress.org/plugins/woo-wp-login/
Description: Redirects wp-login.php page to default WooCommerce "My account" page, IF WooCommerce is installed AND active. 
Text Domain: woo-wp-login
Version: 3.0.4
Author: Machine Pro SEO <support@machineproseo.com>
Author URI: https://www.machineproseo.com
*/

if (!defined('ABSPATH')) {
  exit();
}

if ((!function_exists('is_admin') || !is_admin()) && (!function_exists('get_blog_status') || (function_exists('get_current_blog_id') && empty(get_blog_status(get_current_blog_id(), 'deleted')))) && function_exists('is_plugin_active') && is_plugin_active('woocommerce/woocommerce.php')) {
	add_action('init', function() {
		if (function_exists('home_url') && function_exists('wc_get_page_permalink')) {
			$myaccount = wc_get_page_permalink('myaccount');
			if (home_url() !== $myaccount) {
				function woo_wp_login_redirect( $redirect_url, $pagenow = null, $redirect_to = null ) {
					if (false !== parse_url($redirect_url)) {
						if (!$pagenow) {
							global $pagenow;
						}
						if ('wp-login.php' === $pagenow) {
							echo '<form id="woo_wp_login" method="post" action="' . esc_url($redirect_url) . '" style="display: none;">';
							$redirect_to_parsed = parse_url($redirect_to);
							if (false !== $redirect_to_parsed && !empty($redirect_to_parsed['query'])) {
								parse_str($redirect_to_parsed['query'], $redirect_to_get);
								foreach ($redirect_to_get as $get_name => $get_value) {
									if (isset($_GET[$get_name])) {
										unset($_GET[$get_name]);
									}
								}
							}
							if (!empty($redirect_to)) {
								echo '<input type="hidden" name="redirect-to" value="' . esc_url(add_query_arg(array_map('urlencode', $_GET), $redirect_to)) . '">';
							}
							if (!empty($_POST)) {
								foreach ($_POST as $key => $value) {
									if ('redirect-to' !== $key || empty($redirect_to)) {
										echo '<input type="hidden" name="' . esc_attr($key) . '" value="' . esc_attr($value) . '">';
									}
								}
							}
							echo '</form>';
							echo '<script type="text/javascript">document.getElementById("woo_wp_login").submit();</script>';
						}
						if (!isset($_GET['action']) || 'logout' !== $_GET['action']) {
							$redirect_url = add_query_arg(array('redirect-to' => ( !empty($redirect_to) ? $redirect_to : false )), $redirect_url);
							header('refresh:0.1;url=' . esc_url($redirect_url));
							exit();
						}
					}
				}

				function woo_wp_login_account() {
					$redirect_to = ( !empty($_POST['redirect-to']) ? sanitize_text_field($_POST['redirect-to']) : ( !empty($_GET['redirect-to']) ? sanitize_text_field($_GET['redirect-to']) : ( !empty($_GET['redirect_to']) ? sanitize_text_field($_GET['redirect_to']) : '' ) ) );
					if (!empty($redirect_to)) {
						echo '<input type="hidden" name="redirect-to" value="' . esc_url($redirect_to) . '">';
					}
				}
				add_action('woocommerce_login_form', 'woo_wp_login_account');
				add_action('woocommerce_register_form', 'woo_wp_login_account');

				function woo_wp_login( $user_login = null, $user = null ) {
					$myaccount_redirect = ( !empty($_POST['redirect-to']) ? sanitize_text_field($_POST['redirect-to']) : ( !empty($_GET['redirect-to']) ? sanitize_text_field($_GET['redirect-to']) : ( !empty($_GET['redirect_to']) ? sanitize_text_field($_GET['redirect_to']) : '' ) ) );
					if (!empty($myaccount_redirect)) {
						if (!$user) {
							$user = wp_get_current_user();
						}
						if (!is_user_logged_in() && $user && property_exists($user, 'ID') && $user->ID > 0) {
							wp_set_current_user($user->ID, $user);
							wp_set_auth_cookie($user->ID);
						}
						$unset_get = false;
						$redirect_to_parsed = parse_url($myaccount_redirect);
						if (false !== $redirect_to_parsed && !empty($redirect_to_parsed['query'])) {
							parse_str($redirect_to_parsed['query'], $unset_get);
						}
						if (!empty($unset_get)) {
							foreach (array_keys($unset_get) as $get_key) {
								unset($_GET[$get_key]);
							}
						}
						if (wp_safe_redirect(esc_url_raw(add_query_arg(array_merge(array_map('urlencode', array_filter(array_merge($_GET, array('redirect-to' => false, 'redirect_to' => false, 'reauth' => false)))), array('redirect-to' => false, 'redirect_to' => false, 'reauth' => false)), $myaccount_redirect)))) {
							exit();
						}
					}
				}
				add_action('wp_login', 'woo_wp_login', 999, 2);

				add_action('user_register', function( $user_id ) {
					if (is_numeric($user_id)) {
						$user_id = (int) $user_id;
						if ($user_id > 0) {
							$user_login = null;
							$user = get_user_by('id', $user_id);
							if ($user && property_exists($user, 'user_login')) {
								$user_login = $user->user_login;
							}
							wp_set_current_user($user_id, ( $user_login ? $user_login : '' ));
							wp_set_auth_cookie($user_id);
							do_action('wp_login', $user_login, $user);
						}
					}
				});

				global $pagenow;
				$action_array = array_unique(array_merge(((array) apply_filters('woo_wp_login_actions', array())), array('logout', 'rp', 'resetpass', 'resetpassword', 'enter_recovery_mode', 'confirm_admin_email')));
				if ('wp-login.php' == $pagenow && (!isset($_POST['log']) || !isset($_POST['pwd'])) && (!isset($_GET['action']) || !in_array($_GET['action'], $action_array)) && !isset($_REQUEST['interim-login'])) {
					if (isset($_GET['action']) && 'lostpassword' === $_GET['action']) {
						$redirect_url = add_query_arg(array_map('urlencode', array_filter(array_merge($_GET, array('action' => false)))), wc_get_endpoint_url('lost-password'));
						woo_wp_login_redirect($redirect_url, $pagenow);
					} else {
						$redirect_to = ( !empty($_GET['redirect_to']) ? sanitize_text_field($_GET['redirect_to']) : '' );
						$redirect_url = add_query_arg(array_map('urlencode', array_filter(array_merge($_GET, array('loggedout' => false, 'reauth' => false, 'redirect_to' => false)))), $myaccount);
						woo_wp_login_redirect($redirect_url, $pagenow, $redirect_to);
					}
				}
			}
		}
	});
}
