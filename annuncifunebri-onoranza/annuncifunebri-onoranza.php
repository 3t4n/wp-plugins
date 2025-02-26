<?php
/*
Plugin Name: AnnunciFunebri 
Version: 4.5.11
Description: Con questo plugin è possibile visualizzare sul proprio sito gli annunci dell'impresa funebre pubblicati sul sito annuncifunebri.it
Author: Paolo Cantoni per AnnunciFunebri
Author URI: https://www.annuncifunebri.it
*/

if (!defined('ABSPATH')) exit;

setlocale(LC_ALL, "it_IT.utf8");

define('ANNFU_VERSION', '4.5.11');
define('ANNFU_SITE', 'https://www.annuncifunebri.it');
define('ANNFU_SITE_API', 'https://api.annuncifunebri.it');
define('ANNFU_SITE_STATIC', 'https://static.annuncifunebri.it');
define('ANNFU_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('ANNFU_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT', ANNFU_PLUGIN_PATH . 'templates/default/');
define('ANNFU_IMG', ANNFU_PLUGIN_URL . 'img/');
define('ANNFU_MAX_PER_PAGE', 12);
define('ANNFU_FOTO_W_ANNUNCIO', 180);
define('ANNFU_FOTO_H_ANNUNCIO', 216);
define('ANNFU_PAGE_ANNUNCIO', !get_option('annfu_page_annuncio') ? 'annuncio' : get_option('annfu_page_annuncio'));
define('ANNFU_PAGE_ANNUNCI', !get_option('annfu_page_annunci') ? 'annunci-funebri' : get_option('annfu_page_annunci'));
define('ANNFU_PAGE_DIRETTA', !get_option('annfu_page_diretta') ? 'diretta' : get_option('annfu_page_diretta'));
define('ANNFU_PAGE_AF_VERSION', 'af-version');
define('ANNFU_CAROUSEL_RESULTS', 8);
define('ANNFU_CAROUSEL_RESULTS_PER_PAGE', 2);
define('ANNFU_REMOTE_TIMEOUT', 30);
define('ANNFU_CAROUSEL_RESULTS_PLACEHOLDER', !get_option('annfu_ultimi_annunci') ? 8 : get_option('annfu_ultimi_annunci'));
define('ANNFU_CAROUSEL_RESULTS_SLIDE_PLACEHOLDER', !get_option('annfu_ultimi_annunci_per_slide') ? 4 : get_option('annfu_ultimi_annunci_per_slide'));

const ANNFU_GRUPPO_CONCORDIA = [125, 398, 408, 409, 410, 411, 412, 413, 414, 415, 416];
const ANNFU_GRUPPO_CONCORDIA_COF = ['casafunerariacof', 'linzi', 'riccardi', 'pasini', 'pizzolon', 'corona', 'zamberlan', 'severin'];

require_once(plugin_dir_path(__FILE__) . '/functions.inc.php');
require_once(plugin_dir_path(__FILE__) . '/widget.php');

//add_action('init', 'annfu_start_session', -99);
add_action('wp_logout', 'annfu_end_session');
add_action('wp_login', 'annfu_end_session');
add_action('end_session_action', 'annfu_end_session');

add_action('init', 'annfu_rewrite_rules', 10, 0);
add_action('init', 'annfu_rewrite_tag', 10, 0);
add_action('init', 'annfu_add_endpoints');

add_action('init', 'annfu_create_sitemap', 10, 0); //creazione sitemap
add_filter('cron_schedules', 'annfu_cron_schedules'); //creazione cron
if (!wp_get_schedule('annfu_create_sitemap')) {
    add_action('init', 'annfu_cron', 10); //inizializzazione del cron
}

remove_action('wp_head', 'rel_canonical');
add_action('wp_head', 'annfu_head', 1); //caricamento CSS, JS e meta per Facebook
add_filter('query_vars', 'annfu_add_query_vars'); // aggiungo le variabili utili alla rewrite per gli annunci

add_action('template_redirect', 'annfu_remove_seo', -1);
add_action('rest_api_init', 'get_annfu_version');

add_filter('aioseo_conflicting_shortcodes', 'aioseo_filter_conflicting_shortcodes');
add_filter('aioseo_disable_title_rewrites', 'aioseo_change_wordpress_seo_title');
add_filter('aioseo_facebook_tags', 'aioseo_filter_facebook_tags');
add_filter('aioseo_canonical_url', 'aioseo_filter_canonical_url' );
add_filter('aioseo_twitter_tags', 'aioseo_filter_twitter_title' );

add_filter('pre_get_document_title', 'annfu_title', 10, 2);
add_filter('script_loader_tag', 'annfu_script_defer', 10, 2);

add_action('init', 'annfu_annunci_register_shortcode');
add_action('init', 'annfu_annuncio_register_shortcode');
add_action('init', 'annfu_diretta_register_shortcode');
add_action('init', 'annfu_ultimi_annunci_register_shortcode');

add_action('wp_body_open', 'annfu_header');
add_action('wp_footer', 'annfu_footer');

//widget
add_action('widgets_init', 'annfu_widget');

//admin
add_action('admin_menu', 'annfu_menu'); // inserisco il menu
add_action('admin_init', 'annfu_register_settings'); // salvataggio dei dati della form lato admin
add_action('admin_enqueue_scripts', 'annfu_admin_scripts'); // caricamento CSS e JS lato admin
add_action('admin_action_annfu_reset_options', 'annfu_reset_options'); // reset delle opzioni

register_activation_hook(__FILE__, 'annfu_plugin_activation');
register_deactivation_hook(__FILE__, 'annfu_plugin_deactivation');
add_action('upgrader_process_complete', 'annfu_upgrade_completed', 10, 2);