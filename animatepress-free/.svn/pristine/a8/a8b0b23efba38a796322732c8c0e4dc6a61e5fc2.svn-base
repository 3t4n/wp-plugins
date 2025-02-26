<?php

namespace AnimatePressFree;

use AnimatePressFree\Admin;
use AnimatePressFree\Create;

/**
 * Plugin Name:     AnimatePress Free
 * Plugin URI:      https://www.animatepress.net
 * Description:     Increase user experience on your site with nice pages transitions and other amazing effects. 
 * Version:         1.0.4
 * Author:          AnimatePress
 * Author URI:      https://www.animatepress.net
 * License:         GPL-3.0-or-later
 * License URI:     https://www.gnu.org/licenses/gpl-3.0.html
 * Text domain:     animatepress-free
 * Domain Path:     /languages
 */

// If this file is called directly, abort.
defined('ABSPATH') or die('Something went wrong.');

require_once __DIR__ . '/vendor/autoload.php';

if (!class_exists('AnimatePressFree')) {

  class AnimatePressFree
  {
    /**
     * AnimatePress constructor.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
      define('ANIMATEPRESSFREE_PLUGIN_URL', plugin_dir_url(__FILE__));

      add_action('wp_enqueue_scripts', array($this, 'enqueue_public_scripts'));

      $this->includes();
    }

    /**
     * AnimatePress enqueue scripts.
     *
     * @since 1.0.0
     */
    public function enqueue_public_scripts()
    {
      wp_enqueue_style('animatepress_public_css', ANIMATEPRESSFREE_PLUGIN_URL . 'public/css/animatepress-public.css', array(), '1.0.0');
      wp_enqueue_script('animatepress_public_js', ANIMATEPRESSFREE_PLUGIN_URL . 'public/js/animatepress-public.js', array('jquery'), '1.0.0', true);

      $settingsLinks = array(
        "isActive"                => get_option('animatepress_free_activate'),
        "transitionColor"         => get_option('animatepress_free_transition_color'),
      );
      wp_add_inline_script('animatepress_public_js', 'const ANIMATEPRESSDATA=' . wp_json_encode(array(
        'options' => $settingsLinks,
      )), 'before');
    }

    /**
     * Include admin class
     * 
     * @since 1.0.0
     */
    public function includes()
    {
      include_once(plugin_dir_path(__FILE__) . 'admin/class-animatepress-admin.php');
      include_once(plugin_dir_path(__FILE__) . 'includes/class-animatepress-dom.php');
    }
  }

  $animatepress_free      = new AnimatePressFree();
  $animatepress_admin     = new Admin();
  $animatepress_front     = new Create();
};
