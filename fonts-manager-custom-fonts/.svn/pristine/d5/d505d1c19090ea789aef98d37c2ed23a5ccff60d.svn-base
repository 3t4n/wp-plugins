<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * @wordpress-plugin
 * Plugin Name:       Fonts Manager | Custom Fonts
 * Description:       This plugin allows you to easily apply custom fonts to your site. Just assign custom fonts to elements and fonts will be applied to elements as per assignment. Also, work in WordPress TinyMCE editor.No coding is required.
 * Version:           1.2
 * Author:            wisdomlogix
 * Author URI:        https://wisdomlogix.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fonts-manager-custom-fonts
 */

define('FMCF_DIR_PATH', dirname(__FILE__) . '/');
define('FMCF_DIR_URL', plugin_dir_url(__FILE__));
define('FMCF_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define('FMCF_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
$fmcfUploadDir         = wp_upload_dir();
define('FMCF_UPLOAD_DIR', $fmcfUploadDir['basedir']);
define('FMCF_UPLOAD_PATH', $fmcfUploadDir['basedir'].'/fontsplugincustomfonts/');
define('FMCF_UPLOAD_URL', $fmcfUploadDir['baseurl'].'/fontsplugincustomfonts/');
define('FMCF_UPLOAD_CSS_PATH', FMCF_UPLOAD_PATH.'fmcf.css');
define('FMCF_UPLOAD_CSS_URL', FMCF_UPLOAD_URL.'fmcf.css');
define('FMCF_UPLOAD_ADMIN_CSS_PATH', FMCF_UPLOAD_PATH.'fmcf-admin.css');
define('FMCF_UPLOAD_ADMIN_CSS_URL', FMCF_UPLOAD_URL.'fmcf-admin.css');
$GLOBALS['fmcfPredefinedFntArr'] = array(1 => 'satisfy',2 => 'shadowsintolight',3 => 'opensans',4 => 'poppins',5=>'alkatra',6=>'brunoace',7=>'rubikgemstones',8=>'kablammo',9=>'akronim',10=>'greatvibes');

$GLOBALS['fmcfSetFieldColorArr'] = array(0 => 'h1',1 => 'h2',2 => 'h3',3 => 'h4',4 => 'h5',5 => 'h6',6 => 'p', 7 => 'a', 8 => 'b', 9 => 'body', 10 => 'span',11 => 'ul',12 => 'li', 13 => 'ol', 14 => 'i', 15 => 'em', 16 => 'table',17 => 'tr', 18 => 'td', 19 => 'th',20 => 'small', 21 => 'u', 22 => 'strike', 23 => 'center',24 => 'marquee',25 => 'title',26 => 'strong',27 => 'label');

require 'includes/fmcf-config.php';