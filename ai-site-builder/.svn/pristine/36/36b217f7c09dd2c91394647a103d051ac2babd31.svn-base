<?php
/**
 * Plugin Name:       	AI Site Builder
 * Plugin URI: 			https://wpzita.com/
 * Author:           	ThemeHunk
 * Author URI:			https://www.themehunk.com/
 * Version:           	1.0.2
 * Description:       	Introducing Zita Site Builder WordPress Plugin: Unleash Your Creativity with Ease Are you looking to effortlessly craft stunning websites that captivate your audience and leave a lasting impression? Look no further than the Zita Site Builder WordPress Plugin! <a href="https://wpzita.com" rel="nofollow ugc">Zita Site Builder</a> is a powerful and intuitive tool designed to empower both beginners and experienced web designers to create beautiful, functional websites in mere minutes. Whether you’re a business owner, creative professional, or hobbyist, you can create a website that stands out and achieves your goals with AI Site Builder.
 * Text Domain:       	ai-site-builder
 *
 * @package           AISB
 */

//  Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if (defined( 'AI_SITE_BUILDER_PLUGIN_PRO' ) ) return;


define('AI_SITE_BUILDER_PLUGIN', 'ai-site-builder');

define('AI_SITE_BUILDER_PLUGIN_URL', plugin_dir_url(__FILE__));

if ( ! defined( 'AI_SITE_BUILDER_BASE_URL' ) ) {
	define( 'AI_SITE_BUILDER_DIR_PATH', plugin_dir_path(__FILE__ ) );
}

require_once(AI_SITE_BUILDER_DIR_PATH . 'admin/init.php');
require_once(AI_SITE_BUILDER_DIR_PATH . 'core/inc.php');
require_once(AI_SITE_BUILDER_DIR_PATH . 'app/app.php');
require_once AI_SITE_BUILDER_DIR_PATH . 'core/class-core.php';

register_activation_hook( __FILE__, 'ai_site_builder_active_plugin');
register_deactivation_hook( __FILE__, 'ai_site_builder_dactive_plugin');


