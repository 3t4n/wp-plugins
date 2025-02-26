<?php
/**
 * Plugin Name: AI Site Search
 * Plugin URI: https://doculytics.ai
 * Description: Enable AI on your WordPress site! Includes AI-powered search bars and conversational chat just (like chatGPT) based on your site's content. To get started: click "Activate" and then click "AI Site Search" in the left side bar to configure.
 * Author: doculytics.ai
 * Version: 1.1.0
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package doculytics-site-search
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Site Search Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/site_search.php';
