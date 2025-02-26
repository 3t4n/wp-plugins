<?php
/**
 * Plugin Name: Amazing Neo Brands
 * Plugin URI:  https://github.com/andropplelab/amazing-neo
 * Description: Amazing Neo Social and Brands icon widget.
 * Version: 2.0
 * Author: Amazing Neo™
 * Author URI: https://www.amazingneo.com/
 * Text Domain: amazing-neo-brands
 * Domain Path: /languages
 *
 * License: GNU General Public License v2.0 (or later)
 * License URI: https://www.opensource.org/licenses/gpl-license.php
 * 
 * @package amazing-neo-brands
 */

add_action( 'plugins_loaded', 'amazing_neo_brands_load_textdomain' );
/**
 * Load textdomain
 */
function amazing_neo_brands_load_textdomain() {
	load_plugin_textdomain( 'amazing-neo-brands', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}

class Amazing_Neo_Brands_Widget extends WP_Widget {

	/**
	 * Plugin version for enqueued static resources.
	 *
	 * @var string
	 */
	protected $version = '1.0';

	/**
	 * Default widget values.
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Default widget values.
	 *
	 * @var array
	 */
	protected $sizes;

	/**
	 * Default widget profile values.
	 *
	 * @var array
	 */
	protected $profiles;

	/**
	 * Array of widget instance IDs. Used to generate CSS.
	 *
	 * @var array
	 */
	protected $amazing_neo_brands_active_instances;

	/**
	 * Controls custom css output.
	 *
	 * @var bool
	 */
	protected $disable_css_output;

	/**
	 * Constructor method.
	 *
	 * Set some global values and create widget.
	 */
	function __construct() {

		/**
		 * Filter for default widget option values.
		 *
		 * @since 1.0
		 *
		 * @param array $defaults Default widget options.
		 */
		$this->defaults = apply_filters( 'amazing_neo_brands_default_styles', array(
			'title'                  => '',
			'new_window'             => 0,
			'size'                   => 36,
			'border_radius'          => 3,
			'border_width'           => 0,
			'border_color'           => '#ffffff',
			'border_color_hover'     => '#ffffff',
			'icon_color'             => '#6f6f6f',
			'icon_color_hover'       => '#5a5a5a',
			'background_color'       => '#ffffff',
			'background_color_hover' => '#f9f9f9',
			'alignment'              => 'alignleft',
			'500px'        => '',
			'acrobat-reader'        => '',
			'adobe'        => '',
			'airbnb'        => '',
			'alarb'        => '',
			'algolia'        => '',
			'alipay'        => '',
			'alnoor'        => '',
			'amazingneo'        => '',
			'amazon-pay-card'        => '',
			'amazon-pay'        => '',
			'amazon'        => '',
			'american-express-card'        => '',
			'android-alt'        => '',
			'android'        => '',
			'angular'        => '',
			'app-store-circle'        => '',
			'app-store-square'        => '',
			'app-store'        => '',
			'apple-pay-card'        => '',
			'apple-pay'        => '',
			'apple'        => '',
			'aws'        => '',
			'backbone'        => '',
			'bank-card'        => '',
			'behance-circle'        => '',
			'behance-square'        => '',
			'behance'        => '',
			'bitbucket'        => '',
			'blackberry'        => '',
			'blogger-circle'        => '',
			'blogger-square'        => '',
			'blogger'        => '',
			'bootstrap-alt'        => '',
			'bootstrap'        => '',
			'buffer-circle'        => '',
			'buffer-square'        => '',
			'buffer'        => '',
			'buysellads-circle'        => '',
			'buysellads-square'        => '',
			'buysellads'        => '',
			'cakephp'        => '',
			'cc-diners-club'        => '',
			'cc-discover'        => '',
			'centos'        => '',
			'chrome'        => '',
			'cisco'        => '',
			'cloudflare'        => '',
			'codeigniter'        => '',
			'codepen-circle'        => '',
			'codepen-square'        => '',
			'codepen'        => '',
			'coffeescript'        => '',
			'css3-alt'        => '',
			'css3'        => '',
			'dash'        => '',
			'deviantart-circle'        => '',
			'deviantart-square'        => '',
			'deviantart'        => '',
			'digital-ocean'        => '',
			'docker'        => '',
			'dogecoin'        => '',
			'dotnet'        => '',
			'dribbble-circle'        => '',
			'dribbble-square'        => '',
			'dribbble'        => '',
			'dropbox-circle'        => '',
			'dropbox-square'        => '',
			'dropbox'        => '',
			'drupal'        => '',
			'ebay'        => '',
			'edge-legacy'        => '',
			'elementor-square'        => '',
			'elementor'        => '',
			'ethereum'        => '',
			'etherium'        => '',
			'evernote-circle'        => '',
			'evernote-square'        => '',
			'evernote'        => '',
			'facebook-circle'        => '',
			'facebook-messenger'        => '',
			'facebook-square'        => '',
			'facebook'        => '',
			'feedly-circle'        => '',
			'feedly-square'        => '',
			'feedly'        => '',
			'figma'        => '',
			'firebase'        => '',
			'firefox-browser'        => '',
			'firefox'        => '',
			'flickr-circle'        => '',
			'flickr-square'        => '',
			'flickr'        => '',
			'flipboard'        => '',
			'flutter'        => '',
			'foursquare-circle'        => '',
			'foursquare-square'        => '',
			'foursquare'        => '',
			'free-code-camp'        => '',
			'freebsd'        => '',
			'git-alt'        => '',
			'git-square'        => '',
			'git'        => '',
			'github-alt'        => '',
			'github-circle'        => '',
			'github-square'        => '',
			'github'        => '',
			'gitkraken'        => '',
			'gitlab-alt'        => '',
			'gitlab'        => '',
			'google-drive'        => '',
			'google-pay'        => '',
			'google-play'        => '',
			'google-plus-circle'        => '',
			'google-plus'        => '',
			'google-wallet'        => '',
			'google'        => '',
			'googleplus-square'        => '',
			'grunt'        => '',
			'gulp'        => '',
			'hashnode'        => '',
			'html5-alt'        => '',
			'html5'        => '',
			'hubspot'        => '',
			'instagram-circle'        => '',
			'instagram-square'        => '',
			'instagram'        => '',
			'intercom'        => '',
			'internet'        => '',
			'invision'        => '',
			'ionic'        => '',
			'iota'        => '',
			'itunes-note'        => '',
			'itunes'        => '',
			'java'        => '',
			'jcb-card'        => '',
			'jira'        => '',
			'joomla'        => '',
			'js'        => '',
			'jsfiddle'        => '',
			'laravel-alt'        => '',
			'laravel'        => '',
			'lastfm-circle'        => '',
			'lastfm-square'        => '',
			'lastfm'        => '',
			'less'        => '',
			'line'        => '',
			'linkedin-circle'        => '',
			'linkedin-in'        => '',
			'linkedin-square'        => '',
			'linux'        => '',
			'litecoin'        => '',
			'magento'        => '',
			'mailchimp'        => '',
			'mastercard-card'        => '',
			'maxcdn'        => '',
			'meetup'        => '',
			'microblog'        => '',
			'microsoft'        => '',
			'mix'        => '',
			'mixcloud'        => '',
			'mollie-card'        => '',
			'monero'        => '',
			'mongodb'        => '',
			'myspace-circle'        => '',
			'myspace-square'        => '',
			'myspace'        => '',
			'mysql'        => '',
			'namecoin'        => '',
			'nem'        => '',
			'neo'        => '',
			'node'        => '',
			'nodejs'        => '',
			'nop-commerce'        => '',
			'npm'        => '',
			'odnoklassniki-square'        => '',
			'odnoklassniki'        => '',
			'oldemployer-circle'        => '',
			'oldemployer-square'        => '',
			'oldemployer'        => '',
			'omisego'        => '',
			'opencart'        => '',
			'opera'        => '',
			'paypal-card'        => '',
			'paypal-circle'        => '',
			'paypal-square'        => '',
			'paypal'        => '',
			'paystack-card'        => '',
			'peercoin'        => '',
			'periscope'        => '',
			'phoenix-framework'        => '',
			'phoenix-squadron'        => '',
			'php'        => '',
			'pinterest-circle'        => '',
			'pinterest-p'        => '',
			'pinterest-square'        => '',
			'pinterest'        => '',
			'playstation'        => '',
			'product-hunt-circle'        => '',
			'product-hunt-square'        => '',
			'product-hunt'        => '',
			'python'        => '',
			'qq'        => '',
			'qtum'        => '',
			'razorpay-card'        => '',
			'react'        => '',
			'reddit-alien'        => '',
			'reddit-circle'        => '',
			'reddit-square'        => '',
			'redhat'        => '',
			'ripple'        => '',
			'rss-circle'        => '',
			'rss-square'        => '',
			'rss'        => '',
			'safari'        => '',
			'salesforce'        => '',
			'sass-alt'        => '',
			'sass'        => '',
			'shopify-circle'        => '',
			'shopify-square'        => '',
			'shopify'        => '',
			'shopware'        => '',
			'sketch'        => '',
			'skrill-card'        => '',
			'skype-circle'        => '',
			'skype-square'        => '',
			'skype'        => '',
			'slack'        => '',
			'snapchat-circle'        => '',
			'snapchat-square'        => '',
			'snapchat'        => '',
			'soundcloud'        => '',
			'spotify-circle'        => '',
			'spotify-square'        => '',
			'spotify'        => '',
			'stack-exchange'        => '',
			'stackoverflow'        => '',
			'steam-circle'        => '',
			'steam-square'        => '',
			'steam'        => '',
			'stratis'        => '',
			'stripe-card'        => '',
			'stumbleupon'        => '',
			'swift-circle'        => '',
			'swift-square'        => '',
			'swift'        => '',
			'symfony'        => '',
			'telegram'        => '',
			'tether'        => '',
			'tiktok'        => '',
			'trello'        => '',
			'tron'        => '',
			'tumblr-circle'        => '',
			'tumblr-square'        => '',
			'tumblr'        => '',
			'twitter-circle'        => '',
			'twitter-square'        => '',
			'twitter'        => '',
			'ubuntu'        => '',
			'umbraco'        => '',
			'unity'        => '',
			'ups'        => '',
			'viber'        => '',
			'vimeo-circle'        => '',
			'vimeo-v'        => '',
			'vimeo'        => '',
			'vine-circle'        => '',
			'vine-square'        => '',
			'vine'        => '',
			'visa-card'        => '',
			'vk-circle'        => '',
			'vk-square'        => '',
			'vk'        => '',
			'vmware'        => '',
			'vuejs'        => '',
			'waves'        => '',
			'waze'        => '',
			'wechat-circle'        => '',
			'wechat-square'        => '',
			'wechat'        => '',
			'weibo'        => '',
			'western-union-card'        => '',
			'whatsapp-circle'        => '',
			'whatsapp-square'        => '',
			'whatsapp'        => '',
			'wikipedia'        => '',
			'windows'        => '',
			'wix'        => '',
			'wordpress-alt'        => '',
			'wordpress-circle'        => '',
			'wordpress'        => '',
			'worldcoin'        => '',
			'wpbeginner'        => '',
			'xamarin'        => '',
			'xbox'        => '',
			'xing-circle'        => '',
			'xing-square'        => '',
			'xing'        => '',
			'xtrabytes'        => '',
			'yahoo-alt'        => '',
			'yahoo-circle'        => '',
			'yahoo-square'        => '',
			'yahoo'        => '',
			'yelp-circle'        => '',
			'yelp-square'        => '',
			'yelp'        => '',
			'yoast'        => '',
			'youtube-alt'        => '',
			'youtube-circle'        => '',
			'youtube-square'        => '',
			'youtube'        => '',
			'zcash'        => '',
		) );

		/**
		 * Filter for social profile choices.
		 *
		 * @since 1.0
		 *
		 * @param array widget options.
		 */
		$this->profiles = apply_filters( 'amazing-neo-brands_default_profiles', array(
			'500px' => array(
				'label'   => __( '500px', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( '500px', __( '500px', 'amazing-neo-brands' ) ),
			),
			'acrobat-reader' => array(
				'label'   => __( 'acrobat-reader', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'acrobat-reader', __( 'acrobat-reader', 'amazing-neo-brands' ) ),
			),
			'adobe' => array(
				'label'   => __( 'adobe', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'adobe', __( 'adobe', 'amazing-neo-brands' ) ),
			),
			'airbnb' => array(
				'label'   => __( 'airbnb', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'airbnb', __( 'airbnb', 'amazing-neo-brands' ) ),
			),
			'alarb' => array(
				'label'   => __( 'alarb', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'alarb', __( 'alarb', 'amazing-neo-brands' ) ),
			),
			'algolia' => array(
				'label'   => __( 'algolia', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'algolia', __( 'algolia', 'amazing-neo-brands' ) ),
			),
			'alipay' => array(
				'label'   => __( 'alipay', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'alipay', __( 'alipay', 'amazing-neo-brands' ) ),
			),
			'alnoor' => array(
				'label'   => __( 'alnoor', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'alnoor', __( 'alnoor', 'amazing-neo-brands' ) ),
			),
			'amazingneo' => array(
				'label'   => __( 'amazingneo', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'amazingneo', __( 'amazingneo', 'amazing-neo-brands' ) ),
			),
			'amazon-pay-card' => array(
				'label'   => __( 'amazon-pay-card', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'amazon-pay-card', __( 'amazon-pay-card', 'amazing-neo-brands' ) ),
			),
			'amazon-pay' => array(
				'label'   => __( 'amazon-pay', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'amazon-pay', __( 'amazon-pay', 'amazing-neo-brands' ) ),
			),
			'amazon' => array(
				'label'   => __( 'amazon', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'amazon', __( 'amazon', 'amazing-neo-brands' ) ),
			),
			'american-express-card' => array(
				'label'   => __( 'american-express-card', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'american-express-card', __( 'american-express-card', 'amazing-neo-brands' ) ),
			),
			'android-alt' => array(
				'label'   => __( 'android-alt', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'android-alt', __( 'android-alt', 'amazing-neo-brands' ) ),
			),
			'android' => array(
				'label'   => __( 'android', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'android', __( 'android', 'amazing-neo-brands' ) ),
			),
			'angular' => array(
				'label'   => __( 'angular', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'angular', __( 'angular', 'amazing-neo-brands' ) ),
			),
			'app-store-circle' => array(
				'label'   => __( 'app-store-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'app-store-circle', __( 'app-store-circle', 'amazing-neo-brands' ) ),
			),
			'app-store-square' => array(
				'label'   => __( 'app-store-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'app-store-square', __( 'app-store-square', 'amazing-neo-brands' ) ),
			),
			'app-store' => array(
				'label'   => __( 'app-store', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'app-store', __( 'app-store', 'amazing-neo-brands' ) ),
			),
			'apple-pay-card' => array(
				'label'   => __( 'apple-pay-card', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'apple-pay-card', __( 'apple-pay-card', 'amazing-neo-brands' ) ),
			),
			'apple-pay' => array(
				'label'   => __( 'apple-pay', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'apple-pay', __( 'apple-pay', 'amazing-neo-brands' ) ),
			),
			'apple' => array(
				'label'   => __( 'apple', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'apple', __( 'apple', 'amazing-neo-brands' ) ),
			),
			'aws' => array(
				'label'   => __( 'aws', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'aws', __( 'aws', 'amazing-neo-brands' ) ),
			),
			'backbone' => array(
				'label'   => __( 'backbone', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'backbone', __( 'backbone', 'amazing-neo-brands' ) ),
			),
			'bank-card' => array(
				'label'   => __( 'bank-card', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'bank-card', __( 'bank-card', 'amazing-neo-brands' ) ),
			),
			'behance-circle' => array(
				'label'   => __( 'behance-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'behance-circle', __( 'behance-circle', 'amazing-neo-brands' ) ),
			),
			'behance-square' => array(
				'label'   => __( 'behance-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'behance-square', __( 'behance-square', 'amazing-neo-brands' ) ),
			),
			'behance' => array(
				'label'   => __( 'behance', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'behance', __( 'behance', 'amazing-neo-brands' ) ),
			),
			'bitbucket' => array(
				'label'   => __( 'bitbucket', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'bitbucket', __( 'bitbucket', 'amazing-neo-brands' ) ),
			),
			'blackberry' => array(
				'label'   => __( 'blackberry', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'blackberry', __( 'blackberry', 'amazing-neo-brands' ) ),
			),
			'blogger-circle' => array(
				'label'   => __( 'blogger-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'blogger-circle', __( 'blogger-circle', 'amazing-neo-brands' ) ),
			),
			'blogger-square' => array(
				'label'   => __( 'blogger-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'blogger-square', __( 'blogger-square', 'amazing-neo-brands' ) ),
			),
			'blogger' => array(
				'label'   => __( 'blogger', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'blogger', __( 'blogger', 'amazing-neo-brands' ) ),
			),
			'bootstrap-alt' => array(
				'label'   => __( 'bootstrap-alt', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'bootstrap-alt', __( 'bootstrap-alt', 'amazing-neo-brands' ) ),
			),
			'bootstrap' => array(
				'label'   => __( 'bootstrap', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'bootstrap', __( 'bootstrap', 'amazing-neo-brands' ) ),
			),
			'buffer-circle' => array(
				'label'   => __( 'buffer-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'buffer-circle', __( 'buffer-circle', 'amazing-neo-brands' ) ),
			),
			'buffer-square' => array(
				'label'   => __( 'buffer-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'buffer-square', __( 'buffer-square', 'amazing-neo-brands' ) ),
			),
			'buffer' => array(
				'label'   => __( 'buffer', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'buffer', __( 'buffer', 'amazing-neo-brands' ) ),
			),
			'buysellads-circle' => array(
				'label'   => __( 'buysellads-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'buysellads-circle', __( 'buysellads-circle', 'amazing-neo-brands' ) ),
			),
			'buysellads-square' => array(
				'label'   => __( 'buysellads-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'buysellads-square', __( 'buysellads-square', 'amazing-neo-brands' ) ),
			),
			'buysellads' => array(
				'label'   => __( 'buysellads', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'buysellads', __( 'buysellads', 'amazing-neo-brands' ) ),
			),
			'cakephp' => array(
				'label'   => __( 'cakephp', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'cakephp', __( 'cakephp', 'amazing-neo-brands' ) ),
			),
			'cc-diners-club' => array(
				'label'   => __( 'cc-diners-club', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'cc-diners-club', __( 'cc-diners-club', 'amazing-neo-brands' ) ),
			),
			'cc-discover' => array(
				'label'   => __( 'cc-discover', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'cc-discover', __( 'cc-discover', 'amazing-neo-brands' ) ),
			),
			'centos' => array(
				'label'   => __( 'centos', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'centos', __( 'centos', 'amazing-neo-brands' ) ),
			),
			'chrome' => array(
				'label'   => __( 'chrome', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'chrome', __( 'chrome', 'amazing-neo-brands' ) ),
			),
			'cisco' => array(
				'label'   => __( 'cisco', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'cisco', __( 'cisco', 'amazing-neo-brands' ) ),
			),
			'cloudflare' => array(
				'label'   => __( 'cloudflare', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'cloudflare', __( 'cloudflare', 'amazing-neo-brands' ) ),
			),
			'codeigniter' => array(
				'label'   => __( 'codeigniter', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'codeigniter', __( 'codeigniter', 'amazing-neo-brands' ) ),
			),
			'codepen-circle' => array(
				'label'   => __( 'codepen-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'codepen-circle', __( 'codepen-circle', 'amazing-neo-brands' ) ),
			),
			'codepen-square' => array(
				'label'   => __( 'codepen-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'codepen-square', __( 'codepen-square', 'amazing-neo-brands' ) ),
			),
			'codepen' => array(
				'label'   => __( 'codepen', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'codepen', __( 'codepen', 'amazing-neo-brands' ) ),
			),
			'coffeescript' => array(
				'label'   => __( 'coffeescript', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'coffeescript', __( 'coffeescript', 'amazing-neo-brands' ) ),
			),
			'css3-alt' => array(
				'label'   => __( 'css3-alt', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'css3-alt', __( 'css3-alt', 'amazing-neo-brands' ) ),
			),
			'css3' => array(
				'label'   => __( 'css3', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'css3', __( 'css3', 'amazing-neo-brands' ) ),
			),
			'dash' => array(
				'label'   => __( 'dash', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'dash', __( 'dash', 'amazing-neo-brands' ) ),
			),
			'deviantart-circle' => array(
				'label'   => __( 'deviantart-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'deviantart-circle', __( 'deviantart-circle', 'amazing-neo-brands' ) ),
			),
			'deviantart-square' => array(
				'label'   => __( 'deviantart-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'deviantart-square', __( 'deviantart-square', 'amazing-neo-brands' ) ),
			),
			'deviantart' => array(
				'label'   => __( 'deviantart', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'deviantart', __( 'deviantart', 'amazing-neo-brands' ) ),
			),
			'digital-ocean' => array(
				'label'   => __( 'digital-ocean', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'digital-ocean', __( 'digital-ocean', 'amazing-neo-brands' ) ),
			),
			'docker' => array(
				'label'   => __( 'docker', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'docker', __( 'docker', 'amazing-neo-brands' ) ),
			),
			'dogecoin' => array(
				'label'   => __( 'dogecoin', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'dogecoin', __( 'dogecoin', 'amazing-neo-brands' ) ),
			),
			'dotnet' => array(
				'label'   => __( 'dotnet', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'dotnet', __( 'dotnet', 'amazing-neo-brands' ) ),
			),
			'dribbble-circle' => array(
				'label'   => __( 'dribbble-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'dribbble-circle', __( 'dribbble-circle', 'amazing-neo-brands' ) ),
			),
			'dribbble-square' => array(
				'label'   => __( 'dribbble-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'dribbble-square', __( 'dribbble-square', 'amazing-neo-brands' ) ),
			),
			'dribbble' => array(
				'label'   => __( 'dribbble', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'dribbble', __( 'dribbble', 'amazing-neo-brands' ) ),
			),
			'dropbox-circle' => array(
				'label'   => __( 'dropbox-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'dropbox-circle', __( 'dropbox-circle', 'amazing-neo-brands' ) ),
			),
			'dropbox-square' => array(
				'label'   => __( 'dropbox-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'dropbox-square', __( 'dropbox-square', 'amazing-neo-brands' ) ),
			),
			'dropbox' => array(
				'label'   => __( 'dropbox', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'dropbox', __( 'dropbox', 'amazing-neo-brands' ) ),
			),
			'drupal' => array(
				'label'   => __( 'drupal', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'drupal', __( 'drupal', 'amazing-neo-brands' ) ),
			),
			'ebay' => array(
				'label'   => __( 'ebay', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'ebay', __( 'ebay', 'amazing-neo-brands' ) ),
			),
			'edge-legacy' => array(
				'label'   => __( 'edge-legacy', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'edge-legacy', __( 'edge-legacy', 'amazing-neo-brands' ) ),
			),
			'elementor-square' => array(
				'label'   => __( 'elementor-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'elementor-square', __( 'elementor-square', 'amazing-neo-brands' ) ),
			),
			'elementor' => array(
				'label'   => __( 'elementor', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'elementor', __( 'elementor', 'amazing-neo-brands' ) ),
			),
			'ethereum' => array(
				'label'   => __( 'ethereum', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'ethereum', __( 'ethereum', 'amazing-neo-brands' ) ),
			),
			'etherium' => array(
				'label'   => __( 'etherium', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'etherium', __( 'etherium', 'amazing-neo-brands' ) ),
			),
			'evernote-circle' => array(
				'label'   => __( 'evernote-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'evernote-circle', __( 'evernote-circle', 'amazing-neo-brands' ) ),
			),
			'evernote-square' => array(
				'label'   => __( 'evernote-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'evernote-square', __( 'evernote-square', 'amazing-neo-brands' ) ),
			),
			'evernote' => array(
				'label'   => __( 'evernote', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'evernote', __( 'evernote', 'amazing-neo-brands' ) ),
			),
			'facebook-circle' => array(
				'label'   => __( 'facebook-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'facebook-circle', __( 'facebook-circle', 'amazing-neo-brands' ) ),
			),
			'facebook-messenger' => array(
				'label'   => __( 'facebook-messenger', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'facebook-messenger', __( 'facebook-messenger', 'amazing-neo-brands' ) ),
			),
			'facebook-square' => array(
				'label'   => __( 'facebook-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'facebook-square', __( 'facebook-square', 'amazing-neo-brands' ) ),
			),
			'facebook' => array(
				'label'   => __( 'facebook', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'facebook', __( 'facebook', 'amazing-neo-brands' ) ),
			),
			'feedly-circle' => array(
				'label'   => __( 'feedly-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'feedly-circle', __( 'feedly-circle', 'amazing-neo-brands' ) ),
			),
			'feedly-square' => array(
				'label'   => __( 'feedly-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'feedly-square', __( 'feedly-square', 'amazing-neo-brands' ) ),
			),
			'feedly' => array(
				'label'   => __( 'feedly', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'feedly', __( 'feedly', 'amazing-neo-brands' ) ),
			),
			'figma' => array(
				'label'   => __( 'figma', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'figma', __( 'figma', 'amazing-neo-brands' ) ),
			),
			'firebase' => array(
				'label'   => __( 'firebase', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'firebase', __( 'firebase', 'amazing-neo-brands' ) ),
			),
			'firefox-browser' => array(
				'label'   => __( 'firefox-browser', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'firefox-browser', __( 'firefox-browser', 'amazing-neo-brands' ) ),
			),
			'firefox' => array(
				'label'   => __( 'firefox', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'firefox', __( 'firefox', 'amazing-neo-brands' ) ),
			),
			'flickr-circle' => array(
				'label'   => __( 'flickr-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'flickr-circle', __( 'flickr-circle', 'amazing-neo-brands' ) ),
			),
			'flickr-square' => array(
				'label'   => __( 'flickr-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'flickr-square', __( 'flickr-square', 'amazing-neo-brands' ) ),
			),
			'flickr' => array(
				'label'   => __( 'flickr', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'flickr', __( 'flickr', 'amazing-neo-brands' ) ),
			),
			'flipboard' => array(
				'label'   => __( 'flipboard', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'flipboard', __( 'flipboard', 'amazing-neo-brands' ) ),
			),
			'flutter' => array(
				'label'   => __( 'flutter', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'flutter', __( 'flutter', 'amazing-neo-brands' ) ),
			),
			'foursquare-circle' => array(
				'label'   => __( 'foursquare-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'foursquare-circle', __( 'foursquare-circle', 'amazing-neo-brands' ) ),
			),
			'foursquare-square' => array(
				'label'   => __( 'foursquare-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'foursquare-square', __( 'foursquare-square', 'amazing-neo-brands' ) ),
			),
			'foursquare' => array(
				'label'   => __( 'foursquare', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'foursquare', __( 'foursquare', 'amazing-neo-brands' ) ),
			),
			'free-code-camp' => array(
				'label'   => __( 'free-code-camp', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'free-code-camp', __( 'free-code-camp', 'amazing-neo-brands' ) ),
			),
			'freebsd' => array(
				'label'   => __( 'freebsd', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'freebsd', __( 'freebsd', 'amazing-neo-brands' ) ),
			),
			'git-alt' => array(
				'label'   => __( 'git-alt', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'git-alt', __( 'git-alt', 'amazing-neo-brands' ) ),
			),
			'git-square' => array(
				'label'   => __( 'git-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'git-square', __( 'git-square', 'amazing-neo-brands' ) ),
			),
			'git' => array(
				'label'   => __( 'git', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'git', __( 'git', 'amazing-neo-brands' ) ),
			),
			'github-alt' => array(
				'label'   => __( 'github-alt', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'github-alt', __( 'github-alt', 'amazing-neo-brands' ) ),
			),
			'github-circle' => array(
				'label'   => __( 'github-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'github-circle', __( 'github-circle', 'amazing-neo-brands' ) ),
			),
			'github-square' => array(
				'label'   => __( 'github-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'github-square', __( 'github-square', 'amazing-neo-brands' ) ),
			),
			'github' => array(
				'label'   => __( 'github', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'github', __( 'github', 'amazing-neo-brands' ) ),
			),
			'gitkraken' => array(
				'label'   => __( 'gitkraken', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'gitkraken', __( 'gitkraken', 'amazing-neo-brands' ) ),
			),
			'gitlab-alt' => array(
				'label'   => __( 'gitlab-alt', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'gitlab-alt', __( 'gitlab-alt', 'amazing-neo-brands' ) ),
			),
			'gitlab' => array(
				'label'   => __( 'gitlab', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'gitlab', __( 'gitlab', 'amazing-neo-brands' ) ),
			),
			'google-drive' => array(
				'label'   => __( 'google-drive', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'google-drive', __( 'google-drive', 'amazing-neo-brands' ) ),
			),
			'google-pay' => array(
				'label'   => __( 'google-pay', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'google-pay', __( 'google-pay', 'amazing-neo-brands' ) ),
			),
			'google-play' => array(
				'label'   => __( 'google-play', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'google-play', __( 'google-play', 'amazing-neo-brands' ) ),
			),
			'google-plus-circle' => array(
				'label'   => __( 'google-plus-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'google-plus-circle', __( 'google-plus-circle', 'amazing-neo-brands' ) ),
			),
			'google-plus' => array(
				'label'   => __( 'google-plus', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'google-plus', __( 'google-plus', 'amazing-neo-brands' ) ),
			),
			'google-wallet' => array(
				'label'   => __( 'google-wallet', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'google-wallet', __( 'google-wallet', 'amazing-neo-brands' ) ),
			),
			'google' => array(
				'label'   => __( 'google', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'google', __( 'google', 'amazing-neo-brands' ) ),
			),
			'googleplus-square' => array(
				'label'   => __( 'googleplus-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'googleplus-square', __( 'googleplus-square', 'amazing-neo-brands' ) ),
			),
			'grunt' => array(
				'label'   => __( 'grunt', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'grunt', __( 'grunt', 'amazing-neo-brands' ) ),
			),
			'gulp' => array(
				'label'   => __( 'gulp', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'gulp', __( 'gulp', 'amazing-neo-brands' ) ),
			),
			'hashnode' => array(
				'label'   => __( 'hashnode', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'hashnode', __( 'hashnode', 'amazing-neo-brands' ) ),
			),
			'html5-alt' => array(
				'label'   => __( 'html5-alt', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'html5-alt', __( 'html5-alt', 'amazing-neo-brands' ) ),
			),
			'html5' => array(
				'label'   => __( 'html5', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'html5', __( 'html5', 'amazing-neo-brands' ) ),
			),
			'hubspot' => array(
				'label'   => __( 'hubspot', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'hubspot', __( 'hubspot', 'amazing-neo-brands' ) ),
			),
			'instagram-circle' => array(
				'label'   => __( 'instagram-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'instagram-circle', __( 'instagram-circle', 'amazing-neo-brands' ) ),
			),
			'instagram-square' => array(
				'label'   => __( 'instagram-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'instagram-square', __( 'instagram-square', 'amazing-neo-brands' ) ),
			),
			'instagram' => array(
				'label'   => __( 'instagram', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'instagram', __( 'instagram', 'amazing-neo-brands' ) ),
			),
			'intercom' => array(
				'label'   => __( 'intercom', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'intercom', __( 'intercom', 'amazing-neo-brands' ) ),
			),
			'internet' => array(
				'label'   => __( 'internet', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'internet', __( 'internet', 'amazing-neo-brands' ) ),
			),
			'invision' => array(
				'label'   => __( 'invision', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'invision', __( 'invision', 'amazing-neo-brands' ) ),
			),
			'ionic' => array(
				'label'   => __( 'ionic', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'ionic', __( 'ionic', 'amazing-neo-brands' ) ),
			),
			'iota' => array(
				'label'   => __( 'iota', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'iota', __( 'iota', 'amazing-neo-brands' ) ),
			),
			'itunes-note' => array(
				'label'   => __( 'itunes-note', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'itunes-note', __( 'itunes-note', 'amazing-neo-brands' ) ),
			),
			'itunes' => array(
				'label'   => __( 'itunes', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'itunes', __( 'itunes', 'amazing-neo-brands' ) ),
			),
			'java' => array(
				'label'   => __( 'java', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'java', __( 'java', 'amazing-neo-brands' ) ),
			),
			'jcb-card' => array(
				'label'   => __( 'jcb-card', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'jcb-card', __( 'jcb-card', 'amazing-neo-brands' ) ),
			),
			'jira' => array(
				'label'   => __( 'jira', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'jira', __( 'jira', 'amazing-neo-brands' ) ),
			),
			'joomla' => array(
				'label'   => __( 'joomla', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'joomla', __( 'joomla', 'amazing-neo-brands' ) ),
			),
			'js' => array(
				'label'   => __( 'js', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'js', __( 'js', 'amazing-neo-brands' ) ),
			),
			'jsfiddle' => array(
				'label'   => __( 'jsfiddle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'jsfiddle', __( 'jsfiddle', 'amazing-neo-brands' ) ),
			),
			'laravel-alt' => array(
				'label'   => __( 'laravel-alt', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'laravel-alt', __( 'laravel-alt', 'amazing-neo-brands' ) ),
			),
			'laravel' => array(
				'label'   => __( 'laravel', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'laravel', __( 'laravel', 'amazing-neo-brands' ) ),
			),
			'lastfm-circle' => array(
				'label'   => __( 'lastfm-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'lastfm-circle', __( 'lastfm-circle', 'amazing-neo-brands' ) ),
			),
			'lastfm-square' => array(
				'label'   => __( 'lastfm-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'lastfm-square', __( 'lastfm-square', 'amazing-neo-brands' ) ),
			),
			'lastfm' => array(
				'label'   => __( 'lastfm', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'lastfm', __( 'lastfm', 'amazing-neo-brands' ) ),
			),
			'less' => array(
				'label'   => __( 'less', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'less', __( 'less', 'amazing-neo-brands' ) ),
			),
			'line' => array(
				'label'   => __( 'line', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'line', __( 'line', 'amazing-neo-brands' ) ),
			),
			'linkedin-circle' => array(
				'label'   => __( 'linkedin-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'linkedin-circle', __( 'linkedin-circle', 'amazing-neo-brands' ) ),
			),
			'linkedin-in' => array(
				'label'   => __( 'linkedin-in', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'linkedin-in', __( 'linkedin-in', 'amazing-neo-brands' ) ),
			),
			'linkedin-square' => array(
				'label'   => __( 'linkedin-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'linkedin-square', __( 'linkedin-square', 'amazing-neo-brands' ) ),
			),
			'linux' => array(
				'label'   => __( 'linux', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'linux', __( 'linux', 'amazing-neo-brands' ) ),
			),
			'litecoin' => array(
				'label'   => __( 'litecoin', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'litecoin', __( 'litecoin', 'amazing-neo-brands' ) ),
			),
			'magento' => array(
				'label'   => __( 'magento', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'magento', __( 'magento', 'amazing-neo-brands' ) ),
			),
			'mailchimp' => array(
				'label'   => __( 'mailchimp', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'mailchimp', __( 'mailchimp', 'amazing-neo-brands' ) ),
			),
			'mastercard-card' => array(
				'label'   => __( 'mastercard-card', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'mastercard-card', __( 'mastercard-card', 'amazing-neo-brands' ) ),
			),
			'maxcdn' => array(
				'label'   => __( 'maxcdn', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'maxcdn', __( 'maxcdn', 'amazing-neo-brands' ) ),
			),
			'meetup' => array(
				'label'   => __( 'meetup', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'meetup', __( 'meetup', 'amazing-neo-brands' ) ),
			),
			'microblog' => array(
				'label'   => __( 'microblog', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'microblog', __( 'microblog', 'amazing-neo-brands' ) ),
			),
			'microsoft' => array(
				'label'   => __( 'microsoft', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'microsoft', __( 'microsoft', 'amazing-neo-brands' ) ),
			),
			'mix' => array(
				'label'   => __( 'mix', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'mix', __( 'mix', 'amazing-neo-brands' ) ),
			),
			'mixcloud' => array(
				'label'   => __( 'mixcloud', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'mixcloud', __( 'mixcloud', 'amazing-neo-brands' ) ),
			),
			'mollie-card' => array(
				'label'   => __( 'mollie-card', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'mollie-card', __( 'mollie-card', 'amazing-neo-brands' ) ),
			),
			'monero' => array(
				'label'   => __( 'monero', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'monero', __( 'monero', 'amazing-neo-brands' ) ),
			),
			'mongodb' => array(
				'label'   => __( 'mongodb', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'mongodb', __( 'mongodb', 'amazing-neo-brands' ) ),
			),
			'myspace-circle' => array(
				'label'   => __( 'myspace-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'myspace-circle', __( 'myspace-circle', 'amazing-neo-brands' ) ),
			),
			'myspace-square' => array(
				'label'   => __( 'myspace-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'myspace-square', __( 'myspace-square', 'amazing-neo-brands' ) ),
			),
			'myspace' => array(
				'label'   => __( 'myspace', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'myspace', __( 'myspace', 'amazing-neo-brands' ) ),
			),
			'mysql' => array(
				'label'   => __( 'mysql', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'mysql', __( 'mysql', 'amazing-neo-brands' ) ),
			),
			'namecoin' => array(
				'label'   => __( 'namecoin', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'namecoin', __( 'namecoin', 'amazing-neo-brands' ) ),
			),
			'nem' => array(
				'label'   => __( 'nem', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'nem', __( 'nem', 'amazing-neo-brands' ) ),
			),
			'neo' => array(
				'label'   => __( 'neo', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'neo', __( 'neo', 'amazing-neo-brands' ) ),
			),
			'node' => array(
				'label'   => __( 'node', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'node', __( 'node', 'amazing-neo-brands' ) ),
			),
			'nodejs' => array(
				'label'   => __( 'nodejs', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'nodejs', __( 'nodejs', 'amazing-neo-brands' ) ),
			),
			'nop-commerce' => array(
				'label'   => __( 'nop-commerce', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'nop-commerce', __( 'nop-commerce', 'amazing-neo-brands' ) ),
			),
			'npm' => array(
				'label'   => __( 'npm', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'npm', __( 'npm', 'amazing-neo-brands' ) ),
			),
			'odnoklassniki-square' => array(
				'label'   => __( 'odnoklassniki-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'odnoklassniki-square', __( 'odnoklassniki-square', 'amazing-neo-brands' ) ),
			),
			'odnoklassniki' => array(
				'label'   => __( 'odnoklassniki', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'odnoklassniki', __( 'odnoklassniki', 'amazing-neo-brands' ) ),
			),
			'oldemployer-circle' => array(
				'label'   => __( 'oldemployer-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'oldemployer-circle', __( 'oldemployer-circle', 'amazing-neo-brands' ) ),
			),
			'oldemployer-square' => array(
				'label'   => __( 'oldemployer-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'oldemployer-square', __( 'oldemployer-square', 'amazing-neo-brands' ) ),
			),
			'oldemployer' => array(
				'label'   => __( 'oldemployer', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'oldemployer', __( 'oldemployer', 'amazing-neo-brands' ) ),
			),
			'omisego' => array(
				'label'   => __( 'omisego', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'omisego', __( 'omisego', 'amazing-neo-brands' ) ),
			),
			'opencart' => array(
				'label'   => __( 'opencart', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'opencart', __( 'opencart', 'amazing-neo-brands' ) ),
			),
			'opera' => array(
				'label'   => __( 'opera', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'opera', __( 'opera', 'amazing-neo-brands' ) ),
			),
			'paypal-card' => array(
				'label'   => __( 'paypal-card', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'paypal-card', __( 'paypal-card', 'amazing-neo-brands' ) ),
			),
			'paypal-circle' => array(
				'label'   => __( 'paypal-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'paypal-circle', __( 'paypal-circle', 'amazing-neo-brands' ) ),
			),
			'paypal-square' => array(
				'label'   => __( 'paypal-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'paypal-square', __( 'paypal-square', 'amazing-neo-brands' ) ),
			),
			'paypal' => array(
				'label'   => __( 'paypal', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'paypal', __( 'paypal', 'amazing-neo-brands' ) ),
			),
			'paystack-card' => array(
				'label'   => __( 'paystack-card', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'paystack-card', __( 'paystack-card', 'amazing-neo-brands' ) ),
			),
			'peercoin' => array(
				'label'   => __( 'peercoin', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'peercoin', __( 'peercoin', 'amazing-neo-brands' ) ),
			),
			'periscope' => array(
				'label'   => __( 'periscope', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'periscope', __( 'periscope', 'amazing-neo-brands' ) ),
			),
			'phoenix-framework' => array(
				'label'   => __( 'phoenix-framework', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'phoenix-framework', __( 'phoenix-framework', 'amazing-neo-brands' ) ),
			),
			'phoenix-squadron' => array(
				'label'   => __( 'phoenix-squadron', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'phoenix-squadron', __( 'phoenix-squadron', 'amazing-neo-brands' ) ),
			),
			'php' => array(
				'label'   => __( 'php', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'php', __( 'php', 'amazing-neo-brands' ) ),
			),
			'pinterest-circle' => array(
				'label'   => __( 'pinterest-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'pinterest-circle', __( 'pinterest-circle', 'amazing-neo-brands' ) ),
			),
			'pinterest-p' => array(
				'label'   => __( 'pinterest-p', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'pinterest-p', __( 'pinterest-p', 'amazing-neo-brands' ) ),
			),
			'pinterest-square' => array(
				'label'   => __( 'pinterest-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'pinterest-square', __( 'pinterest-square', 'amazing-neo-brands' ) ),
			),
			'pinterest' => array(
				'label'   => __( 'pinterest', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'pinterest', __( 'pinterest', 'amazing-neo-brands' ) ),
			),
			'playstation' => array(
				'label'   => __( 'playstation', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'playstation', __( 'playstation', 'amazing-neo-brands' ) ),
			),
			'product-hunt-circle' => array(
				'label'   => __( 'product-hunt-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'product-hunt-circle', __( 'product-hunt-circle', 'amazing-neo-brands' ) ),
			),
			'product-hunt-square' => array(
				'label'   => __( 'product-hunt-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'product-hunt-square', __( 'product-hunt-square', 'amazing-neo-brands' ) ),
			),
			'product-hunt' => array(
				'label'   => __( 'product-hunt', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'product-hunt', __( 'product-hunt', 'amazing-neo-brands' ) ),
			),
			'python' => array(
				'label'   => __( 'python', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'python', __( 'python', 'amazing-neo-brands' ) ),
			),
			'qq' => array(
				'label'   => __( 'qq', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'qq', __( 'qq', 'amazing-neo-brands' ) ),
			),
			'qtum' => array(
				'label'   => __( 'qtum', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'qtum', __( 'qtum', 'amazing-neo-brands' ) ),
			),
			'razorpay-card' => array(
				'label'   => __( 'razorpay-card', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'razorpay-card', __( 'razorpay-card', 'amazing-neo-brands' ) ),
			),
			'react' => array(
				'label'   => __( 'react', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'react', __( 'react', 'amazing-neo-brands' ) ),
			),
			'reddit-alien' => array(
				'label'   => __( 'reddit-alien', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'reddit-alien', __( 'reddit-alien', 'amazing-neo-brands' ) ),
			),
			'reddit-circle' => array(
				'label'   => __( 'reddit-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'reddit-circle', __( 'reddit-circle', 'amazing-neo-brands' ) ),
			),
			'reddit-square' => array(
				'label'   => __( 'reddit-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'reddit-square', __( 'reddit-square', 'amazing-neo-brands' ) ),
			),
			'redhat' => array(
				'label'   => __( 'redhat', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'redhat', __( 'redhat', 'amazing-neo-brands' ) ),
			),
			'ripple' => array(
				'label'   => __( 'ripple', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'ripple', __( 'ripple', 'amazing-neo-brands' ) ),
			),
			'rss-circle' => array(
				'label'   => __( 'rss-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'rss-circle', __( 'rss-circle', 'amazing-neo-brands' ) ),
			),
			'rss-square' => array(
				'label'   => __( 'rss-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'rss-square', __( 'rss-square', 'amazing-neo-brands' ) ),
			),
			'rss' => array(
				'label'   => __( 'rss', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'rss', __( 'rss', 'amazing-neo-brands' ) ),
			),
			'safari' => array(
				'label'   => __( 'safari', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'safari', __( 'safari', 'amazing-neo-brands' ) ),
			),
			'salesforce' => array(
				'label'   => __( 'salesforce', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'salesforce', __( 'salesforce', 'amazing-neo-brands' ) ),
			),
			'sass-alt' => array(
				'label'   => __( 'sass-alt', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'sass-alt', __( 'sass-alt', 'amazing-neo-brands' ) ),
			),
			'sass' => array(
				'label'   => __( 'sass', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'sass', __( 'sass', 'amazing-neo-brands' ) ),
			),
			'shopify-circle' => array(
				'label'   => __( 'shopify-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'shopify-circle', __( 'shopify-circle', 'amazing-neo-brands' ) ),
			),
			'shopify-square' => array(
				'label'   => __( 'shopify-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'shopify-square', __( 'shopify-square', 'amazing-neo-brands' ) ),
			),
			'shopify' => array(
				'label'   => __( 'shopify', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'shopify', __( 'shopify', 'amazing-neo-brands' ) ),
			),
			'shopware' => array(
				'label'   => __( 'shopware', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'shopware', __( 'shopware', 'amazing-neo-brands' ) ),
			),
			'sketch' => array(
				'label'   => __( 'sketch', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'sketch', __( 'sketch', 'amazing-neo-brands' ) ),
			),
			'skrill-card' => array(
				'label'   => __( 'skrill-card', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'skrill-card', __( 'skrill-card', 'amazing-neo-brands' ) ),
			),
			'skype-circle' => array(
				'label'   => __( 'skype-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'skype-circle', __( 'skype-circle', 'amazing-neo-brands' ) ),
			),
			'skype-square' => array(
				'label'   => __( 'skype-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'skype-square', __( 'skype-square', 'amazing-neo-brands' ) ),
			),
			'skype' => array(
				'label'   => __( 'skype', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'skype', __( 'skype', 'amazing-neo-brands' ) ),
			),
			'slack' => array(
				'label'   => __( 'slack', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'slack', __( 'slack', 'amazing-neo-brands' ) ),
			),
			'snapchat-circle' => array(
				'label'   => __( 'snapchat-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'snapchat-circle', __( 'snapchat-circle', 'amazing-neo-brands' ) ),
			),
			'snapchat-square' => array(
				'label'   => __( 'snapchat-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'snapchat-square', __( 'snapchat-square', 'amazing-neo-brands' ) ),
			),
			'snapchat' => array(
				'label'   => __( 'snapchat', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'snapchat', __( 'snapchat', 'amazing-neo-brands' ) ),
			),
			'soundcloud' => array(
				'label'   => __( 'soundcloud', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'soundcloud', __( 'soundcloud', 'amazing-neo-brands' ) ),
			),
			'spotify-circle' => array(
				'label'   => __( 'spotify-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'spotify-circle', __( 'spotify-circle', 'amazing-neo-brands' ) ),
			),
			'spotify-square' => array(
				'label'   => __( 'spotify-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'spotify-square', __( 'spotify-square', 'amazing-neo-brands' ) ),
			),
			'spotify' => array(
				'label'   => __( 'spotify', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'spotify', __( 'spotify', 'amazing-neo-brands' ) ),
			),
			'stack-exchange' => array(
				'label'   => __( 'stack-exchange', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'stack-exchange', __( 'stack-exchange', 'amazing-neo-brands' ) ),
			),
			'stackoverflow' => array(
				'label'   => __( 'stackoverflow', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'stackoverflow', __( 'stackoverflow', 'amazing-neo-brands' ) ),
			),
			'steam-circle' => array(
				'label'   => __( 'steam-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'steam-circle', __( 'steam-circle', 'amazing-neo-brands' ) ),
			),
			'steam-square' => array(
				'label'   => __( 'steam-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'steam-square', __( 'steam-square', 'amazing-neo-brands' ) ),
			),
			'steam' => array(
				'label'   => __( 'steam', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'steam', __( 'steam', 'amazing-neo-brands' ) ),
			),
			'stratis' => array(
				'label'   => __( 'stratis', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'stratis', __( 'stratis', 'amazing-neo-brands' ) ),
			),
			'stripe-card' => array(
				'label'   => __( 'stripe-card', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'stripe-card', __( 'stripe-card', 'amazing-neo-brands' ) ),
			),
			'stumbleupon' => array(
				'label'   => __( 'stumbleupon', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'stumbleupon', __( 'stumbleupon', 'amazing-neo-brands' ) ),
			),
			'swift-circle' => array(
				'label'   => __( 'swift-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'swift-circle', __( 'swift-circle', 'amazing-neo-brands' ) ),
			),
			'swift-square' => array(
				'label'   => __( 'swift-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'swift-square', __( 'swift-square', 'amazing-neo-brands' ) ),
			),
			'swift' => array(
				'label'   => __( 'swift', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'swift', __( 'swift', 'amazing-neo-brands' ) ),
			),
			'symfony' => array(
				'label'   => __( 'symfony', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'symfony', __( 'symfony', 'amazing-neo-brands' ) ),
			),
			'telegram' => array(
				'label'   => __( 'telegram', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'telegram', __( 'telegram', 'amazing-neo-brands' ) ),
			),
			'tether' => array(
				'label'   => __( 'tether', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'tether', __( 'tether', 'amazing-neo-brands' ) ),
			),
			'tiktok' => array(
				'label'   => __( 'tiktok', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'tiktok', __( 'tiktok', 'amazing-neo-brands' ) ),
			),
			'trello' => array(
				'label'   => __( 'trello', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'trello', __( 'trello', 'amazing-neo-brands' ) ),
			),
			'tron' => array(
				'label'   => __( 'tron', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'tron', __( 'tron', 'amazing-neo-brands' ) ),
			),
			'tumblr-circle' => array(
				'label'   => __( 'tumblr-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'tumblr-circle', __( 'tumblr-circle', 'amazing-neo-brands' ) ),
			),
			'tumblr-square' => array(
				'label'   => __( 'tumblr-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'tumblr-square', __( 'tumblr-square', 'amazing-neo-brands' ) ),
			),
			'tumblr' => array(
				'label'   => __( 'tumblr', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'tumblr', __( 'tumblr', 'amazing-neo-brands' ) ),
			),
			'twitter-circle' => array(
				'label'   => __( 'twitter-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'twitter-circle', __( 'twitter-circle', 'amazing-neo-brands' ) ),
			),
			'twitter-square' => array(
				'label'   => __( 'twitter-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'twitter-square', __( 'twitter-square', 'amazing-neo-brands' ) ),
			),
			'twitter' => array(
				'label'   => __( 'twitter', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'twitter', __( 'twitter', 'amazing-neo-brands' ) ),
			),
			'ubuntu' => array(
				'label'   => __( 'ubuntu', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'ubuntu', __( 'ubuntu', 'amazing-neo-brands' ) ),
			),
			'umbraco' => array(
				'label'   => __( 'umbraco', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'umbraco', __( 'umbraco', 'amazing-neo-brands' ) ),
			),
			'unity' => array(
				'label'   => __( 'unity', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'unity', __( 'unity', 'amazing-neo-brands' ) ),
			),
			'ups' => array(
				'label'   => __( 'ups', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'ups', __( 'ups', 'amazing-neo-brands' ) ),
			),
			'viber' => array(
				'label'   => __( 'viber', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'viber', __( 'viber', 'amazing-neo-brands' ) ),
			),
			'vimeo-circle' => array(
				'label'   => __( 'vimeo-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'vimeo-circle', __( 'vimeo-circle', 'amazing-neo-brands' ) ),
			),
			'vimeo-v' => array(
				'label'   => __( 'vimeo-v', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'vimeo-v', __( 'vimeo-v', 'amazing-neo-brands' ) ),
			),
			'vimeo' => array(
				'label'   => __( 'vimeo', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'vimeo', __( 'vimeo', 'amazing-neo-brands' ) ),
			),
			'vine-circle' => array(
				'label'   => __( 'vine-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'vine-circle', __( 'vine-circle', 'amazing-neo-brands' ) ),
			),
			'vine-square' => array(
				'label'   => __( 'vine-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'vine-square', __( 'vine-square', 'amazing-neo-brands' ) ),
			),
			'vine' => array(
				'label'   => __( 'vine', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'vine', __( 'vine', 'amazing-neo-brands' ) ),
			),
			'visa-card' => array(
				'label'   => __( 'visa-card', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'visa-card', __( 'visa-card', 'amazing-neo-brands' ) ),
			),
			'vk-circle' => array(
				'label'   => __( 'vk-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'vk-circle', __( 'vk-circle', 'amazing-neo-brands' ) ),
			),
			'vk-square' => array(
				'label'   => __( 'vk-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'vk-square', __( 'vk-square', 'amazing-neo-brands' ) ),
			),
			'vk' => array(
				'label'   => __( 'vk', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'vk', __( 'vk', 'amazing-neo-brands' ) ),
			),
			'vmware' => array(
				'label'   => __( 'vmware', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'vmware', __( 'vmware', 'amazing-neo-brands' ) ),
			),
			'vuejs' => array(
				'label'   => __( 'vuejs', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'vuejs', __( 'vuejs', 'amazing-neo-brands' ) ),
			),
			'waves' => array(
				'label'   => __( 'waves', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'waves', __( 'waves', 'amazing-neo-brands' ) ),
			),
			'waze' => array(
				'label'   => __( 'waze', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'waze', __( 'waze', 'amazing-neo-brands' ) ),
			),
			'wechat-circle' => array(
				'label'   => __( 'wechat-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'wechat-circle', __( 'wechat-circle', 'amazing-neo-brands' ) ),
			),
			'wechat-square' => array(
				'label'   => __( 'wechat-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'wechat-square', __( 'wechat-square', 'amazing-neo-brands' ) ),
			),
			'wechat' => array(
				'label'   => __( 'wechat', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'wechat', __( 'wechat', 'amazing-neo-brands' ) ),
			),
			'weibo' => array(
				'label'   => __( 'weibo', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'weibo', __( 'weibo', 'amazing-neo-brands' ) ),
			),
			'western-union-card' => array(
				'label'   => __( 'western-union-card', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'western-union-card', __( 'western-union-card', 'amazing-neo-brands' ) ),
			),
			'whatsapp-circle' => array(
				'label'   => __( 'whatsapp-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'whatsapp-circle', __( 'whatsapp-circle', 'amazing-neo-brands' ) ),
			),
			'whatsapp-square' => array(
				'label'   => __( 'whatsapp-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'whatsapp-square', __( 'whatsapp-square', 'amazing-neo-brands' ) ),
			),
			'whatsapp' => array(
				'label'   => __( 'whatsapp', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'whatsapp', __( 'whatsapp', 'amazing-neo-brands' ) ),
			),
			'wikipedia' => array(
				'label'   => __( 'wikipedia', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'wikipedia', __( 'wikipedia', 'amazing-neo-brands' ) ),
			),
			'windows' => array(
				'label'   => __( 'windows', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'windows', __( 'windows', 'amazing-neo-brands' ) ),
			),
			'wix' => array(
				'label'   => __( 'wix', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'wix', __( 'wix', 'amazing-neo-brands' ) ),
			),
			'wordpress-alt' => array(
				'label'   => __( 'wordpress-alt', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'wordpress-alt', __( 'wordpress-alt', 'amazing-neo-brands' ) ),
			),
			'wordpress-circle' => array(
				'label'   => __( 'wordpress-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'wordpress-circle', __( 'wordpress-circle', 'amazing-neo-brands' ) ),
			),
			'wordpress' => array(
				'label'   => __( 'wordpress', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'wordpress', __( 'wordpress', 'amazing-neo-brands' ) ),
			),
			'worldcoin' => array(
				'label'   => __( 'worldcoin', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'worldcoin', __( 'worldcoin', 'amazing-neo-brands' ) ),
			),
			'wpbeginner' => array(
				'label'   => __( 'wpbeginner', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'wpbeginner', __( 'wpbeginner', 'amazing-neo-brands' ) ),
			),
			'xamarin' => array(
				'label'   => __( 'xamarin', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'xamarin', __( 'xamarin', 'amazing-neo-brands' ) ),
			),
			'xbox' => array(
				'label'   => __( 'xbox', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'xbox', __( 'xbox', 'amazing-neo-brands' ) ),
			),
			'xing-circle' => array(
				'label'   => __( 'xing-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'xing-circle', __( 'xing-circle', 'amazing-neo-brands' ) ),
			),
			'xing-square' => array(
				'label'   => __( 'xing-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'xing-square', __( 'xing-square', 'amazing-neo-brands' ) ),
			),
			'xing' => array(
				'label'   => __( 'xing', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'xing', __( 'xing', 'amazing-neo-brands' ) ),
			),
			'xtrabytes' => array(
				'label'   => __( 'xtrabytes', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'xtrabytes', __( 'xtrabytes', 'amazing-neo-brands' ) ),
			),
			'yahoo-alt' => array(
				'label'   => __( 'yahoo-alt', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'yahoo-alt', __( 'yahoo-alt', 'amazing-neo-brands' ) ),
			),
			'yahoo-circle' => array(
				'label'   => __( 'yahoo-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'yahoo-circle', __( 'yahoo-circle', 'amazing-neo-brands' ) ),
			),
			'yahoo-square' => array(
				'label'   => __( 'yahoo-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'yahoo-square', __( 'yahoo-square', 'amazing-neo-brands' ) ),
			),
			'yahoo' => array(
				'label'   => __( 'yahoo', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'yahoo', __( 'yahoo', 'amazing-neo-brands' ) ),
			),
			'yelp-circle' => array(
				'label'   => __( 'yelp-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'yelp-circle', __( 'yelp-circle', 'amazing-neo-brands' ) ),
			),
			'yelp-square' => array(
				'label'   => __( 'yelp-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'yelp-square', __( 'yelp-square', 'amazing-neo-brands' ) ),
			),
			'yelp' => array(
				'label'   => __( 'yelp', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'yelp', __( 'yelp', 'amazing-neo-brands' ) ),
			),
			'yoast' => array(
				'label'   => __( 'yoast', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'yoast', __( 'yoast', 'amazing-neo-brands' ) ),
			),
			'youtube-alt' => array(
				'label'   => __( 'youtube-alt', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'youtube-alt', __( 'youtube-alt', 'amazing-neo-brands' ) ),
			),
			'youtube-circle' => array(
				'label'   => __( 'youtube-circle', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'youtube-circle', __( 'youtube-circle', 'amazing-neo-brands' ) ),
			),
			'youtube-square' => array(
				'label'   => __( 'youtube-square', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'youtube-square', __( 'youtube-square', 'amazing-neo-brands' ) ),
			),
			'youtube' => array(
				'label'   => __( 'youtube', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'youtube', __( 'youtube', 'amazing-neo-brands' ) ),
			),
			'zcash' => array(
				'label'   => __( 'zcash', 'amazing-neo-brands' ),
				'pattern' => $this->get_icon_markup( 'zcash', __( 'zcash', 'amazing-neo-brands' ) ),
			),

		) );

		/**
		 * Filter to disable output of custom CSS.
		 *
		 * Setting this to true in your child theme will:
		 *  - Stop output of inline custom icon CSS.
		 *  - Stop styling options showing in Amazing Neo Brands widget settings.
		 *
		 * The intent if enabling is that your theme will provide CSS for all
		 * widget areas, instead of allowing people to set their own icon
		 * styles. You should consider mentioning in theme documentation that
		 * Amazing Neo Brands widget settings will not display styling
		 * options, as your theme styles icons instead.
		 *
		 * @since 1.0
		 *
		 * @param bool $disable_css_output True if custom CSS should be disabled.
		 */
		$this->disable_css_output = apply_filters( 'amazing_neo_brands_disable_custom_css', false );

		$widget_ops = array(
			'classname'   => 'amazing-neo-brands',
			'description' => __( 'Displays select social icons.', 'amazing-neo-brands' ),
		);

		$control_ops = array(
			'id_base' => 'amazing-neo-brands',
		);

		$this->amazing_neo_brands_active_instances = array();

		parent::__construct( 'amazing-neo-brands', __( 'Amazing Neo /Brands Social Icons', 'amazing-neo-brands' ), $widget_ops, $control_ops );

		/** Enqueue scripts and styles */
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_css' ) );

		/** Load CSS in <head> */
		add_action( 'wp_footer', array( $this, 'css' ) );

		/** Load color picker */
		add_action( 'admin_enqueue_scripts', array( $this, 'load_color_picker' ) );
		add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );

	}

	/**
	 * Color Picker.
	 *
	 * Enqueue the color picker script.
	 *
	 */
	function load_color_picker( $hook ) {
		if( 'widgets.php' != $hook )
			return;
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_script( 'underscore' );
	}

	/**
	 * Print scripts.
	 *
	 * Reference https://core.trac.wordpress.org/attachment/ticket/25809/color-picker-widget.php
	 *
	 */
	function print_scripts() {
		?>
		<script>
			( function( $ ){
				function initColorPicker( widget ) {
					widget.find( '.amazing-color-picker' ).wpColorPicker( {
						change: function ( event ) {
							var $picker = $( this );
							_.throttle(setTimeout(function () {
								$picker.trigger( 'change' );
							}, 5), 250);
						},
						width: 235,
					});
				}

				function onFormUpdate( event, widget ) {
					initColorPicker( widget );
				}

				$( document ).on( 'widget-added widget-updated', onFormUpdate );

				$( document ).ready( function() {
					$( '#widgets-right .widget:has(.amazing-color-picker)' ).each( function () {
						initColorPicker( $( this ) );
					} );
				} );
			}( jQuery ) );
		</script>
		<?php
	}

	/**
	 * Widget Form.
	 *
	 * Outputs the widget form that allows users to control the output of the widget.
	 *
	 */
	function form( $instance ) {
		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'amazing-neo-brands' ); ?></label> <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" /></p>
		<p><label><input id="<?php echo $this->get_field_id( 'new_window' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'new_window' ); ?>" value="1" <?php checked( 1, $instance['new_window'] ); ?>/> <?php esc_html_e( 'Open links in new window?', 'amazing-neo-brands' ); ?></label></p>

		<?php if ( ! $this->disable_css_output ) { ?>
			<p><label for="<?php echo $this->get_field_id( 'size' ); ?>"><?php _e( 'Icon Size', 'amazing-neo-brands' ); ?>:</label> <input id="<?php echo $this->get_field_id( 'size' ); ?>" name="<?php echo $this->get_field_name( 'size' ); ?>" type="text" value="<?php echo esc_attr( $instance['size'] ); ?>" size="3" />px</p>
			<p><label for="<?php echo $this->get_field_id( 'border_radius' ); ?>"><?php _e( 'Icon Border Radius:', 'amazing-neo-brands' ); ?></label> <input id="<?php echo $this->get_field_id( 'border_radius' ); ?>" name="<?php echo $this->get_field_name( 'border_radius' ); ?>" type="text" value="<?php echo esc_attr( $instance['border_radius'] ); ?>" size="3" />px</p>
			<p><label for="<?php echo $this->get_field_id( 'border_width' ); ?>"><?php _e( 'Border Width:', 'amazing-neo-brands' ); ?></label> <input id="<?php echo $this->get_field_id( 'border_width' ); ?>" name="<?php echo $this->get_field_name( 'border_width' ); ?>" type="text" value="<?php echo esc_attr( $instance['border_width'] ); ?>" size="3" />px</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'alignment' ); ?>"><?php _e( 'Alignment', 'amazing-neo-brands' ); ?>:</label>
				<select id="<?php echo $this->get_field_id( 'alignment' ); ?>" name="<?php echo $this->get_field_name( 'alignment' ); ?>">
					<option value="alignleft" <?php selected( 'alignright', $instance['alignment'] ) ?>><?php _e( 'Align Left', 'amazing-neo-brands' ); ?></option>
					<option value="aligncenter" <?php selected( 'aligncenter', $instance['alignment'] ) ?>><?php _e( 'Align Center', 'amazing-neo-brands' ); ?></option>
					<option value="alignright" <?php selected( 'alignright', $instance['alignment'] ) ?>><?php _e( 'Align Right', 'amazing-neo-brands' ); ?></option>
				</select>
			</p>
			<hr style="background: #ccc; border: 0; height: 1px; margin: 20px 0;" />
			<p><label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php _e( 'Icon Color:', 'amazing-neo-brands' ); ?></label><br /> <input id="<?php echo $this->get_field_id( 'icon_color' ); ?>" name="<?php echo $this->get_field_name( 'icon_color' ); ?>" type="text" class="amazing-color-picker" data-default-color="<?php echo esc_attr( $this->defaults['icon_color'] ); ?>" value="<?php echo esc_attr( $instance['icon_color'] ); ?>" size="6" /></p>
			<p><label for="<?php echo $this->get_field_id( 'background_color_hover' ); ?>"><?php _e( 'Icon Hover Color:', 'amazing-neo-brands' ); ?></label><br /> <input id="<?php echo $this->get_field_id( 'icon_color_hover' ); ?>" name="<?php echo $this->get_field_name( 'icon_color_hover' ); ?>" type="text" class="amazing-color-picker" data-default-color="<?php echo esc_attr( $this->defaults['icon_color_hover'] ); ?>" value="<?php echo esc_attr( $instance['icon_color_hover'] ); ?>" size="6" /></p>
			<p><label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php _e( 'Background Color:', 'amazing-neo-brands' ); ?></label><br /> <input id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" type="text" class="amazing-color-picker" data-default-color="<?php echo esc_attr( $this->defaults['background_color'] ); ?>" value="<?php echo esc_attr( $instance['background_color'] ); ?>" size="6" /></p>
			<p><label for="<?php echo $this->get_field_id( 'background_color_hover' ); ?>"><?php _e( 'Background Hover Color:', 'amazing-neo-brands' ); ?></label><br /> <input id="<?php echo $this->get_field_id( 'background_color_hover' ); ?>" name="<?php echo $this->get_field_name( 'background_color_hover' ); ?>" type="text" class="amazing-color-picker" data-default-color="<?php echo esc_attr( $this->defaults['background_color_hover'] ); ?>" value="<?php echo esc_attr( $instance['background_color_hover'] ); ?>" size="6" /></p>
			<p><label for="<?php echo $this->get_field_id( 'border_color' ); ?>"><?php _e( 'Border Color:', 'amazing-neo-brands' ); ?></label><br /> <input id="<?php echo $this->get_field_id( 'border_color' ); ?>" name="<?php echo $this->get_field_name( 'border_color' ); ?>" type="text" class="amazing-color-picker" data-default-color="<?php echo esc_attr( $this->defaults['border_color'] ); ?>" value="<?php echo esc_attr( $instance['border_color'] ); ?>" size="6" /></p>
			<p><label for="<?php echo $this->get_field_id( 'border_color_hover' ); ?>"><?php _e( 'Border Hover Color:', 'amazing-neo-brands' ); ?></label><br /> <input id="<?php echo $this->get_field_id( 'border_color_hover' ); ?>" name="<?php echo $this->get_field_name( 'border_color_hover' ); ?>" type="text" class="amazing-color-picker" data-default-color="<?php echo esc_attr( $this->defaults['border_color_hover'] ); ?>" value="<?php echo esc_attr( $instance['border_color_hover'] ); ?>" size="6" /></p>
			<hr style="background: #ccc; border: 0; height: 1px; margin: 20px 0;" />
		<?php } ?>
		<?php
		foreach ( (array) $this->profiles as $profile => $data ) {
			printf( '<p><label for="%s">%s:</label></p>', esc_attr( $this->get_field_id( $profile ) ), esc_attr( $data['label'] ) );
			printf( '<p><input type="text" id="%s" name="%s" value="%s" class="widefat" />', esc_attr( $this->get_field_id( $profile ) ), esc_attr( $this->get_field_name( $profile ) ), $instance[ $profile ] );
			printf( '</p>' );
		}
	}

	/**
	 * Form validation and sanitization.
	 *
	 * Runs when you save the widget form. Allows you to validate or sanitize widget options before they are saved.
	 *
	 */
	function update( $newinstance, $oldinstance ) {

		// Fields that can be transparent if their values are unset.
		$can_be_transparent = array(
			'background_color',
			'background_color_hover',
			'border_color',
			'border_color_hover',
		);

		foreach ( $newinstance as $key => $value ) {
			/** Border radius and Icon size must not be empty, must be a digit */
			if ( ( 'border_radius' == $key || 'size' == $key ) && ( '' == $value || ! ctype_digit( $value ) ) ) {
				$newinstance[ $key ] = 0;
			}
			if ( ( 'border_width' == $key || 'size' == $key ) && ( '' == $value || ! ctype_digit( $value ) ) ) {
				$newinstance[ $key ] = 0;
			}
			/** Accept empty colors for permitted keys. */
			elseif ( in_array( $key, $can_be_transparent, true ) && '' == trim( $value ) ) {
				$newinstance[ $key ] = '';
			}
			/** Validate hex code colors */
			elseif ( strpos( $key, '_color' ) && 0 == preg_match( '/^#(([a-fA-F0-9]{3}$)|([a-fA-F0-9]{6}$))/', $value ) ) {
				$newinstance[ $key ] = $oldinstance[ $key ];
			}
			/** Sanitize Profile URIs */
			elseif ( array_key_exists( $key, (array) $this->profiles ) && ! is_email( $value ) && ! 'phone' === $key ) {
				$newinstance[ $key ] = esc_url( $newinstance[ $key ] );
			}
		}
		return $newinstance;
	}

	/**
	 * Widget Output.
	 *
	 * Outputs the actual widget on the front-end based on the widget options the user selected.
	 *
	 */
	function widget( $args, $instance ) {
		extract( $args );
		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		echo $before_widget;
			if ( ! empty( $instance['title'] ) )
				echo $before_title . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $after_title;
			$output = '';
			$profiles = (array) $this->profiles;
			foreach ( $profiles as $profile => $data ) {
				if ( empty( $instance[ $profile ] ) )
					continue;
				$new_window = $instance['new_window'] ? 'target="_blank" rel="noopener noreferrer"' : '';
				if ( is_email( $instance[ $profile ] ) || false !== strpos( $instance[ $profile ], 'mailto:' ) )
					$new_window = '';
				if ( is_email( $instance[ $profile ] ) ) {
					$output .= sprintf( $data['pattern'], 'mailto:' . esc_attr( antispambot( $instance[ $profile ] ) ), $new_window );
				} elseif ( 'phone' === $profile ) {
					$output .= sprintf( $data['pattern'], 'tel:' . esc_attr( antispambot( $instance[ $profile ] ) ), $new_window );
				} else {
					$output .= sprintf( $data['pattern'], esc_url( $instance[ $profile ] ), $new_window );
				}
			}

			if ( $output ) {
				$output = str_replace( '{WIDGET_INSTANCE_ID}', $this->number, $output );
				printf( '<ul class="%s">%s</ul>', $instance['alignment'], $output );
			}

		echo $after_widget;

		$this->amazing_neo_brands_active_instances[] = $this->number;

	}

	function enqueue_css() {

		/**
		 * Filter the plugin stylesheet location.
		 *
		 * @since 1.0
		 *
		 * @param string $cssfile The full path to the stylesheet.
		 */
		$cssfile = apply_filters( 'amazing_neo_brands_stylesheet', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );

		wp_enqueue_style( 'amazing-neo-brands-font', esc_url( $cssfile ), array(), $this->version, 'all' );

		if ( ! function_exists( 'is_amp_endpoint' ) || ( function_exists( 'is_amp_endpoint' ) && ! is_amp_endpoint() ) ) {
			wp_enqueue_script('svg-x-use', plugin_dir_url(__FILE__) . 'assets/js/svgxuse.js', array(), '1.1.21' );
		}
	}

	/**
	 * Custom CSS.
	 *
	 * Outputs custom CSS to control the look of the icons.
	 */
	function css() {

		/** Pull widget settings, merge with defaults */
		$all_instances = $this->get_settings();

		$css = '';

		foreach ( $this->amazing_neo_brands_active_instances as $instance_id ) {
			// Skip if info for this instance does not exist - this should never happen.
			if ( ! isset( $all_instances[ $instance_id ] ) || $this->disable_css_output ) {
				continue;
			}

			$instance = wp_parse_args( $all_instances[ $instance_id ], $this->defaults );

			$font_size    = round( (int) $instance['size'] / 2 );
			$icon_padding = round( (int) $font_size / 2 );

			// Treat empty background and border colors as transparent.
			$instance['background_color']       = $instance['background_color'] ?: 'transparent';
			$instance['border_color']           = $instance['border_color'] ?: 'transparent';
			$instance['background_color_hover'] = $instance['background_color_hover'] ?: 'transparent';
			$instance['border_color_hover']     = $instance['border_color_hover'] ?: 'transparent';

			/** The CSS to output */
			$css .= '
			#amazing-neo-brands-' . $instance_id . ' ul li a,
			#amazing-neo-brands-' . $instance_id . ' ul li a:hover,
			#amazing-neo-brands-' . $instance_id . ' ul li a:focus {
				background-color: ' . $instance['background_color'] . ' !important;
				border-radius: ' . $instance['border_radius'] . 'px;
				color: ' . $instance['icon_color'] . ' !important;
				border: ' . $instance['border_width'] . 'px ' . $instance['border_color'] . ' solid !important;
				font-size: ' . $font_size . 'px;
				padding: ' . $icon_padding . 'px;
			}

			#amazing-neo-brands-' . $instance_id . ' ul li a:hover,
			#amazing-neo-brands-' . $instance_id . ' ul li a:focus {
				background-color: ' . $instance['background_color_hover'] . ' !important;
				border-color: ' . $instance['border_color_hover'] . ' !important;
				color: ' . $instance['icon_color_hover'] . ' !important;
			}

			#amazing-neo-brands-' . $instance_id . ' ul li a:focus {
				outline: 1px dotted ' . $instance['background_color_hover'] . ' !important;
			}';

		}

		// Minify a bit.
		$css = str_replace( "\t", '', $css );
		$css = str_replace( array( "\n", "\r" ), ' ', $css );

		echo '<style type="text/css" media="screen">' . $css . '</style>';

	}

	/**
	 * Construct the markup for each icon
	 *
	 * @param string The lowercase icon name for use in tag attributes.
	 * @param string The plain text icon label.
	 *
	 * @return string The full markup for the given icon.
	 */
	function get_icon_markup( $icon, $label ) {
		$markup = '<li class="amazing-neo-brands-' . $icon . '"><a href="%s" %s>';
		$markup .= '<svg role="img" class="social-' . $icon . '" aria-labelledby="social-' . $icon . '-{WIDGET_INSTANCE_ID}">';
		$markup .= '<title id="social-' . $icon . '-{WIDGET_INSTANCE_ID}' . '">' . $label . '</title>';
		$markup .= '<use xlink:href="' . esc_attr( plugin_dir_url( __FILE__ ) . 'assets/icons/amazing-neo-brands-2.0.0.svg#social-' . $icon ) . '"></use>';
		$markup .= '</svg></a></li>';

		/**
		 * Filter the icon markup HTML.
		 *
		 * @since 1.0
		 *
		 * @param string $markup The full HTML markup for a single icon.
		 * @param string $icon The lowercase icon name used in tag attributes.
		 * @param string $label The plain text icon label.
		 */
		return apply_filters( 'amazing_neo_brands_icon_html', $markup, $icon, $label );
	}

	/**
	 * Remove option when uninstalling the plugin.
	 *
	 * @since 1.0
	 */
	public static function plugin_uninstall() {
		delete_option( 'widget_amazing-neo-brands' );
	}


}

register_uninstall_hook( __FILE__, array( 'Amazing_Neo_Brands_Widget', 'plugin_uninstall' ) );
add_action( 'widgets_init', 'ssiw_load_widget' );
/**
 * Widget Registration.
 *
 * Register Amazing Neo Brands widget.
 *
 */
function ssiw_load_widget() {

	register_widget( 'Amazing_Neo_Brands_Widget' );

}
