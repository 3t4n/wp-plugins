<?php

/**
 * Plugin Name:       AutoRepl
 * Description:       Powerful and easy no-code chatbot builder
 * Version:           1.0.0
 * Author:            AutoRepl
 * Author URI:        http://AutoRepl.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       AutoRepl
 * Domain Path:       /languages
 */

if (!defined('WPINC')) {
  die();
}

define('AUTOREPL_VERSION', '1.0.0');

function activate_autorepl()
{
  require_once plugin_dir_path(__FILE__) .
    'includes/class-autorepl-activator.php';
  Autorepl_Activator::activate();
}

function deactivate_autorepl()
{
  require_once plugin_dir_path(__FILE__) .
    'includes/class-autorepl-deactivator.php';
    Autorepl_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_autorepl');
register_deactivation_hook(__FILE__, 'deactivate_autorepl');

require plugin_dir_path(__FILE__) . 'includes/class-autorepl.php';

function run_autorepl()
{
  $plugin = new Autorepl();
  $plugin->run();
}
run_autorepl();
