<?php
/**
 * Plugin Name: Product ID Permalink for WooCommerce
 * Plugin URI: http://coolwp.com/product-id-permalink-for-woocommerce.html
 * Description: Change WooCommerce Product Permalink Structure to <code>/product/123.html</code>.
 * Version: 0.9.0
 * Author: suifengtec
 * Author URI:  http://coolwp.com
 * Author Email: support@coolwp.com
 * Requires at least: WP 3.8
 * Tested up to: WP 4.4.1
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('ABSPATH') || exit;

if (!class_exists('PIDP4WC')) {
	final class PIDP4WC {

		protected static $_instance = null;
		public static function instance() {
			if (is_null(self::$_instance)) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}
		public function __clone() {}
		public function __wakeup() {}
		public function __construct() {

			add_action('after_switch_theme', 'flush_rewrite_rules');
			register_deactivation_hook(__FILE__, 'flush_rewrite_rules');
			register_activation_hook(__FILE__, array($this, 'flush_rewrites'));
			add_action('init', array(__CLASS__, 'rewrites_init'));
			add_filter('post_type_link', array(__CLASS__, 'change_post_type_link'), 1, 3);
			if (!is_admin()) {
				add_filter('user_trailingslashit', array(__CLASS__, 'untrailingslash_single'), 10, 2);
			}
		}

		static public function untrailingslash_single($url, $type) {
			if ('single' === $type) {
				return untrailingslashit($url);
			}
			return trailingslashit($url);
		}

		static public function flush_rewrites() {
			self::rewrites_init();
			flush_rewrite_rules();
		}
		/*

			based on http://wordpress.stackexchange.com/questions/33551/how-to-rewrite-uri-of-custom-post-type/33555#33555
		*/
		static public function change_post_type_link($link, $post = 0, $leavename = '') {
			if ($post->post_type == 'product') {
				$link = home_url('product/' . $post->ID . '.html');
				return $link;
			} else {
				return untrailingslashit($link);
			}
		}
		static public function rewrites_init() {
			add_rewrite_rule('^product/([0-9]+).html?', 'index.php?post_type=product&p=$matches[1]', 'top');
		}

	} /*//CLASS*/
	$GLOBALS['PIDP4WC'] = PIDP4WC::instance();
}
?>