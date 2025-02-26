<?php
/*
Plugin Name: Arbitrage Expert
Description: Cryptocurrency arbitrage expert widget WordPress plugin displays arbitrage opportunities in real time between 9000 crypto coins - bitcoin, ethereum, ripple, litecoin etc.
Version: 2.0.4
Author URI: https://www.arbitrage.expert
Author: Arbitrage Expert Team
*/

include dirname(__FILE__) . '/helpers/arb_template.php';
include dirname(__FILE__) . '/helpers/arb_helpers.php';
include dirname(__FILE__) . '/arb_shortcode.php';
include dirname(__FILE__) . '/arb_widget_iframe.php';

register_activation_hook(__FILE__, 'arb_exp_create_table');
register_deactivation_hook(__FILE__, 'arb_exp_deactivate');
add_action('admin_menu', 'arb_exp_subscriber_admin_menu');
add_action('admin_init', 'arb_exp_admin_settings');
add_action('widgets_init', 'arb_exp_widget_iframe');

function arb_exp_create_table()
{
    global $wpdb;
    $query = "CREATE TABLE IF NOT EXISTS `arb_exp_iframe` (
		`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
		`text` text ,
		`width` varchar(50),
		`height` varchar(50),
		`shortcode` varchar(255),
		`type_iframe` varchar(50) NOT NULL,
		PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $wpdb->query($query);

    $query = "CREATE TABLE IF NOT EXISTS `arb_exp_default` (
		`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
		`text` text ,
		`width` varchar(50) NOT NULL,
		`height` varchar(50) NOT NULL,
		`shortcode` varchar(255),
		`type_iframe` varchar(50) NOT NULL,
		PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $wpdb->query($query);

    $manage = new ARB_EXP_Helpers();
    $manage->arb_exp_insertIframeDefault($manage->text, $manage->width, $manage->height, $manage->shortcode, '0');
    $manage->arb_exp_insertIframeDefault($manage->textSecond, $manage->width, $manage->height, $manage->shortcode, '1');
    $manage->arb_exp_insertIframe($manage->text, $manage->width, $manage->height, $manage->shortcode, '0');
}

function arb_exp_deactivate()
{
    global $wpdb;
    $query = "DROP TABLE IF EXISTS `arb_exp_iframe`";
    $wpdb->query($query);

    $query = "DROP TABLE IF EXISTS `arb_exp_default`";
    $wpdb->query($query);
}


function arb_exp_widget_iframe()
{
    register_widget('ARB_EXP_Widget_iframe');
}


function arb_exp_subscriber_admin_menu()
{
    add_menu_page('Settings', 'Arbitrage', 'manage_options', 'iframe-options', 'arb_exp_plugin_options_menu', 'dashicons-groups');
}

function arb_exp_admin_settings()
{
    register_setting('arb_group', 'arb_subscriber_options', '');

    add_settings_section('arb_subscriber_section_id', 'Settings plugin arb', '', 'iframe-options');

    add_action('admin_enqueue_scripts', 'arb_exp_load_admin_scripts');
}


function arb_exp_load_admin_scripts()
{
    wp_register_style('abr_exp_PluginStylesheet', plugin_dir_url(__FILE__) . '/css/arb_css_admin.css');
    wp_enqueue_style('abr_exp_PluginStylesheet');

    wp_register_script('abr_exp_js_tabs', plugin_dir_url(__FILE__) . '/js/javascript.js');
    wp_enqueue_script('abr_exp_js_tabs');
}


function arb_exp_plugin_options_menu()
{
    $manage = new ARB_EXP_Helpers();
    $view = new ARB_EXP_Templates();
    $iframe = $manage->arb_exp_getIframe();
    $iframeDef = $manage->arb_exp_getIframeDefault(); ?>

    <div class="wrap iframe-admin">
        <h2>Plugin Settings</h2>

        <div class="wrap-iframe">
            <?php $view->arb_exp_constructForm(); ?>
            <button class="add">+</button>
            <button class="add mob">+</button>
            <p class="mob-text">Click + to add another mirror.</p>
        </div>

        <div id="sm_pnres" class="postbox">
            <h3 class="hndle"><span>About this plugin</span></h3>
            <div class="inside">
                <a class="pluginHome" href="https://www.arbitrage.expert">Plugin Homepage</a>
                <a class="pluginHome" href="mailto:admin@exchange.blue">Suggest a Feature</a>
                <a class="pluginSupport" href="https://wordpress.org/support/plugin/arbitrage-expert">Support Forum</a>
                <a class="pluginBugs" href="https://plugins.trac.wordpress.org/query?status=new&status=assigned&status=reopened&component=arbitrage-expert&order=priority">Report a Bug</a>
                <a class="pluginBugs" href="https://wordpress.org/support/plugin/arbitrage-expert/reviews/">If you like the plugin, <br>please give it 5 star rating :)</a>
            </div>
        </div>

        <div class="postbox donate">
            <div class="inside">
                <p>
                    <strong>Donate BTC:</strong> 1JQY6NcQaX1gEu7mLeRxEuQgZnvQm1ecgn<br>
                    <strong>Donate BCH:</strong> qqdqkr0jrsjjjr34h5r9wsjeyts9hygp7vsucm4gvg<br>
                    <strong>Donate ETH:</strong> 0x899407a74e726000677a624DFB8c3f558EDE5Dc9<br>
                </p>
            </div>
        </div>

        <div class="inputs-elem">
            <input id="0" name="0" type="hidden" value="<iframe style='width: 800px; height: 400px;' src='https://www.arbitrage.expert/arbitrage?view_frame=1'></iframe>">
            <input id="1" name="1" type="hidden" value="<iframe style='width: 800px; height: 400px;' src='https://www.arbitrage.expert/arbitrage?view_frame=ext'></iframe>">
        </div>

        <?php
        if ($_POST) {
            if ($manage->arb_exp_updateAllIframe($_POST)) {
                $manage->arb_exp_reloadPage();
            }
        } ?>
    </div>
    <?php
}

?>