<?php
/**
 * Plugin Name: Anti clickjack plugin
 * Plugin URI: http://www.rogierlankhorst.com/anti-clickjack-plugin
 * Description: Plugin to prevent your site from being clickjacked
 * Version: 1.0.2
 * Text Domain: rldh-anticlickjack
 * Domain Path: /lang
 * Author: Rogier Lankhorst
 * Author URI: http://www.rogierlankhorst.com
 * License: GPL2
 */

/*  Copyright 2014  Rogier Lankhorst  (email : rogier@rogierlankhorst.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA


*/
defined('ABSPATH') or die("you do not have acces to this page!");

class rlac_anticlickjac {
    public $plugin_url;

    public function __construct()
    {
        $this->plugin_url = trailingslashit(WP_PLUGIN_URL).trailingslashit(dirname(plugin_basename(__FILE__)));
        add_action('init', array($this, 'load_translation'));
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue_assets'));
        add_action('wp_head', array($this,'include_anticlickjack_style'));
    }

    public function load_translation()
    {
        load_plugin_textdomain('rlac-anticlickjack', FALSE, dirname(plugin_basename(__FILE__)).'/lang/');
    }

    public function enqueue_assets()
    {
        wp_enqueue_script( "rlac-anticlickjack", $this->plugin_url."js/script.js","",'1.0.0', true );
    }

    public function include_anticlickjack_style() {
        ?>
        <style id="antiClickjack">body{display:none !important;}</style>
        <?php
    }
}

$rlac_anticlickjac = new rlac_anticlickjac();
