<?php
/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that
 * also follow WordPress Coding Standards and PHP best practices.
 *
 * @package   AdsOptimal
 * @author    team@adsoptimal.com
 * @license   GPL-2.0+
 * @link      http://www.adsoptimal.com
 * @copyright 2014 AdsOptimal (Under Social Nation Inc)
 *
 * @wordpress-plugin
 * Plugin Name:       AdsOptimal - Mobile Ad
 * Plugin URI:        http://www.adsoptimal.com
 * Description:       AdsOptimal offers innovative ad unit, designed and optimized for mobile sites. We make the ad load faster and make it easier on various smart devices. We also offers desktop ad unit that can be enabled by just simple clicks.
 * Version:           1.4.4
 * Author:            team@adsoptimal.com
 * Author URI:        http://www.adsoptimal.com/company
 * Text Domain:       adsoptimal-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/AdsOptimal/adsoptimal-wordpress-plugin
 * WordPress-Plugin-Boilerplate: v2.6.1
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-adsoptimal.php` with the name of the plugin's class file
 *
 */
require_once( plugin_dir_path( __FILE__ ) . 'public/class-adsoptimal.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 * @TODO:
 *
 * - replace Plugin_Name with the name of the class defined in
 *   `class-adsoptimal.php`
 */
register_activation_hook( __FILE__, array( 'AdsOptimal', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'AdsOptimal', 'deactivate' ) );

/*
 * @TODO:
 *
 * - replace Plugin_Name with the name of the class defined in
 *   `class-adsoptimal.php`
 */
add_action('plugins_loaded', array('AdsOptimal', 'get_instance'));
add_action('wp_head', 'adsoptimal_script_head');

add_action('loop_start', 'adsoptimal_loop_start');
add_action('loop_end', 'adsoptimal_loop_end');
add_filter('the_content', 'adsoptimal_content');

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-adsoptimal-admin.php` with the name of the plugin's admin file
 * - replace Plugin_Name_Admin with the name of the class defined in
 *   `class-adsoptimal-admin.php`
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-adsoptimal-admin.php' );
	add_action( 'plugins_loaded', array( 'AdsOptimal_Admin', 'get_instance' ) );

}

function adsoptimal_script_head() {
	if (get_option('adsoptimal_settings', '') != '') {
		$object = json_decode(rawurldecode(get_option('adsoptimal_settings', '{"jscode": ""}')), true);
		if ($object && array_key_exists('jscode', $object)) {
			echo $object['jscode'];
		}
	}
	if (get_option('adsoptimal_enable_desktop_ad', 'false') == 'true') {
		?>
<script type='text/javascript'>
(function(w) {
w.MobileMonetizer=w.MobileMonetizer||{}; var t={ID:'<?php echo get_option('adsoptimal_publisher_id', '') ?>'};
for(var a in t) w.MobileMonetizer[a]=t[a];
var d=document,h=d.getElementsByTagName('head')[0],j=d.createElement('script');
j.setAttribute('src','//www.adsoptimal.com/advertisement/manual.js');
h.appendChild(j);
})(window);
</script>
		<?php
	}
}

function adsoptimal_loop_start(&$wp_query) {
	if (get_option('adsoptimal_enable_desktop_ad', 'false') == 'false') return;
	if (get_option('adsoptimal_top_ad_type', '') == '') return;
	if (is_single() && get_option('adsoptimal_enable_post_ad', 'true') == 'false') return;
	if (!is_single() && get_option('adsoptimal_enable_page_ad', 'true') == 'false') return;
	
	global $wp_the_query;
	if (($wp_query === $wp_the_query) && !is_admin() && !is_feed() && !is_robots() && !is_trackback()) {
		$size = split('x', get_option('adsoptimal_top_ad_type', ''));
		echo '<div style="text-align:'.get_option('adsoptimal_top_ad_alignment', 'center').'; padding: 15px 0;"><div class="adsoptimal-slot" style="width: '.$size[0].'px; height: '.$size[1].'px; display: inline-block;"></div></div>';
	}
}
function adsoptimal_loop_end(&$wp_query) {
	if (get_option('adsoptimal_enable_desktop_ad', 'false') == 'false') return;
	if (get_option('adsoptimal_footer_ad_type', '') == '') return;
	if (is_single() && get_option('adsoptimal_enable_post_ad', 'true') == 'false') return;
	if (!is_single() && get_option('adsoptimal_enable_page_ad', 'true') == 'false') return;
	
	global $wp_the_query;
	if (($wp_query === $wp_the_query) && !is_admin() && !is_feed() && !is_robots() && !is_trackback()) {
		$size = split('x', get_option('adsoptimal_footer_ad_type', ''));
		echo '<div style="text-align:'.get_option('adsoptimal_footer_ad_alignment', 'center').'; padding: 15px 0;"><div class="adsoptimal-slot" style="width: '.$size[0].'px; height: '.$size[1].'px; display: inline-block;"></div></div>';
	}
}

class SharedParams {
	public $countWord = 0;
	public $foundDot = false;
	public $insertCount = 0;
	public $targetAt = 100;
	function __construct() {
		$this->targetAt = intval(get_option('adsoptimal_content_ad_every', '100'));
	}
}
function addContentAd(DOMNode $domNode, $sharedParams) {
	foreach ($domNode->childNodes as $node)
	{
		if ($sharedParams->insertCount >= 2) return;
		
		if ($node->nodeType == XML_TEXT_NODE) {
			$splitedText = split(' ', $node->nodeValue);
			for ($i=0; $i<count($splitedText); $i++) {
				$sharedParams->countWord += 1;
				if ($sharedParams->countWord >= $sharedParams->targetAt) {
					if ($sharedParams->foundDot) {
						$splitedText[$i] = '[ADSOPTIMAL_AD_TAG]'.$splitedText[$i];
						$sharedParams->insertCount += 1;
						$sharedParams->countWord = 0;
						$sharedParams->foundDot = false;
					}
					elseif (strpos($splitedText[$i], '.') !== false) {
						$sharedParams->foundDot = true;
					}
				}
			}
			$node->nodeValue = join(' ', $splitedText);
		}
		
		if($node->hasChildNodes()) {
			addContentAd($node, $sharedParams);
		}
	}    
}

function adsoptimal_content($content = '') {
	if (get_option('adsoptimal_enable_desktop_ad', 'false') == 'false') return $content;
	if (get_option('adsoptimal_content_ad_type', '') == '') return $content;
	if (is_single() && get_option('adsoptimal_enable_post_ad', 'true') == 'false') return $content;
	if (!is_single() && get_option('adsoptimal_enable_page_ad', 'true') == 'false') return $content;
	if (!is_single()) return $content;
	
	if (!is_admin() && !is_feed() && !is_robots() && !is_trackback()) {
		$size = split('x', get_option('adsoptimal_content_ad_type', ''));
		$adHtml = '<div style="text-align:'.get_option('adsoptimal_content_ad_alignment', 'center').'; padding: 15px 0;"><div class="adsoptimal-slot" style="width: '.$size[0].'px; height: '.$size[1].'px; display: inline-block;"></div></div>';
		
		$sharedParams = new SharedParams();
		$dom = new DOMDocument();
		$libxml_previous_state = libxml_use_internal_errors(true);
		$dom->loadHTML('<?xml encoding="utf-8" ?><div>'.$content.'</div>');
		libxml_clear_errors();
		libxml_use_internal_errors($libxml_previous_state);
		addContentAd($dom, $sharedParams);
		
		$html = $dom->saveHTML();
		$html = str_replace('[ADSOPTIMAL_AD_TAG]', $adHtml, $html);
		
		return $html;
	}
	else return $content;
}
?>