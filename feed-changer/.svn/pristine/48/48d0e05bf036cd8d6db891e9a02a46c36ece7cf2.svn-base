<?php
/*
 * Plugin Name: Feed Changer
 * Plugin URI: http://wp-master.ir/
 * Description:  Feed Changer
 * Version: 0.3
 * Author: wp-master.ir
 * Author URI: http://wp-master.ir/
 * Requires PHP: 7.0
 * Text Domain: FeedChanger
 * Domain Path: /languages
 */
if (!defined('ABSPATH')) {
    die("اللهم صل علی محمد و آل محمد و عجل فرجهم");
}
/**
 * Changes:
 * 0.3:   initial version
 *
 */

/*
* Defines
*/
define('_FeedChanger_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('_FeedChanger_PATH', plugin_dir_url(__FILE__));

/**
 * Redirect to settings page after plugin activation
 */
register_activation_hook(__FILE__, function () {
    add_option('FeedChanger_init_redirect_after_activation_option', true);


});
add_action('init', function () {

    if (get_option('FeedChanger_init_redirect_after_activation_option', false)) {
        delete_option('FeedChanger_init_redirect_after_activation_option');
        exit(wp_redirect(admin_url('options-general.php?page=FeedChanger-options')));
    }
});


/*
* load plugin language
*/
add_action('plugins_loaded', '_FeedChanger_lang');
function _FeedChanger_lang()
{
    load_plugin_textdomain('FeedChanger', false, dirname(plugin_basename(__FILE__)) . DIRECTORY_SEPARATOR . 'languages');
}

__('Feed Changer', 'FeedChanger');

/**
 * Admin panel menu
 */
require_once 'simple-class-options.php';

global $feedChanger_opt;
$feedChanger_opt['settings'] = feedChanger_opts();

if ($feedChanger_opt['settings']['FeedChanger_main_feed_enable'] != 'yes') {
    //Disable RSS Feeds functions
    feedChanger_feed_switch_off();
    //Remove feed link from header
    remove_action('wp_head', 'feed_links_extra', 3); //Extra feeds such as category feeds
    remove_action('wp_head', 'feed_links', 2); // General feeds: Post and Comment Feed

}


function feedChanger_disable_feed()
{
    global $feedChanger_opt;
    if (!isset($_GET['feedChanger']) || $_GET['feedChanger'] != $feedChanger_opt['settings']['FeedChanger_feed_string']) {
        $err = (trim($feedChanger_opt['settings']['FeedChanger_die_error']) == '') ? __('No feed available', 'FeedChanger') : $feedChanger_opt['settings']['FeedChanger_die_error'];
        wp_die(esc_html($err));
    }

}


function feedChanger_feed_switch_off()
{
    //Disable RSS Feeds functions
    add_action('do_feed', 'feedChanger_disable_feed', 1);
    add_action('do_feed_rdf', 'feedChanger_disable_feed', 1);
    add_action('do_feed_rss', 'feedChanger_disable_feed', 1);
    add_action('do_feed_rss2', 'feedChanger_disable_feed', 1);
    add_action('do_feed_atom', 'feedChanger_disable_feed', 1);
    add_action('do_feed_rss2_comments', 'feedChanger_disable_feed', 1);
    add_action('do_feed_atom_comments', 'feedChanger_disable_feed', 1);


}

function feedChanger_wp_kses($html)
{
    return wp_kses($html, ['img' => ['class' => [], 'src' => [], 'width' => [], 'style' => []], 'button' => ['id' => [], 'class' => [], 'name' => []], 'option' => ['value' => [], 'selected' => []], 'select' => ['name' => [], 'class' => [], 'option' => []], 'span' => ['id' => [], 'class' => [], 'data-current-id' => [], 'title' => []], 'strong' => ['class' => []], 'ul' => [], 'div' => ['id' => [], 'class' => []], 'p' => ['class' => []], 'label' => ['class' => []], 'br' => [], 'input' => ['checked' => [], 'type' => [], 'value' => [], 'name' => []], 'hr' => [], 'h3' => [], 'h4' => [], 'li' => ['data-tab-id' => [], 'class' => []], 'a' => ['target' => [], 'href' => []]]);
}

function feedChanger_make_random_secret($n = 15)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}


function feedChanger_opts()
{
    $defaults = array('FeedChanger_main_feed_enable' => false, 'FeedChanger_changed_feed_enable' => 'yes', 'FeedChanger_feed_string' => '', 'FeedChanger_die_error' => __('No feed available', 'FeedChanger'));

    $feedChanger = get_option('feedChanger', $defaults);

    if (empty($feedChanger['FeedChanger_feed_string'])) {
        $feedChanger['FeedChanger_feed_string'] = feedChanger_make_random_secret();
        update_option('feedChanger', $feedChanger);
    }

    return $feedChanger;
}
