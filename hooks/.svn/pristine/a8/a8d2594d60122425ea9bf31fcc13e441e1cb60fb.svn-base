<?php
/**
 * Plugin Name: hooks
 * Plugin URI: https://programming-review.com/
 * Description: Displays info about WordPress actions and filters inside plugins.
 * Author: Dejan Batanjac
 * Author URI: https://programming-review.com
 * Version: 1.1.0
 * Text Domain: hooks-domain
 * Domain Path: languages
 * License: GPLv2 or later

* Plugin "hooks" is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 2 of the License, or
* any later version.
*
* Plugin "hooks" plugin is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with plugin "hooks". If not, see <http://www.gnu.org/licenses/>.
*
* TODO: Improve internalization support.
* TODO: Transform echo into pritntf.
* TODO: Add the @doctype support.
*/

/**
 * WordPress version need to be at least 4.5.
 */
global $wp_version;
if ( version_compare( $wp_version, '4.5', '<' ) ) {
    if ( is_admin() ) {
    require_once ABSPATH . '/wp-admin/includes/plugin.php';
    deactivate_plugins( __FILE__ );
    wp_die( __( 'Hooks requires WordPress 4.5 or higher. The plugin has now disabled itself.' ) );
  }
}

/**
* Make sure we don't have another class like this.
*/
if ( ! class_exists( 'DB_Plugin_Hooks' ) ) :
final class DB_Plugin_Hooks {

  // Constant.
  const SLUG = 'hooks';

  // Constructor.
  function __construct() {

    // Register an activation hook for the plugin.
    register_activation_hook( __FILE__, array( &$this, 'install_hooks' ) );

    // Hook up to the init action.
    add_action( 'init', array( &$this, 'init_hooks' ) );
    add_action( 'admin_menu', array( &$this, 'menu_item' ) );
  }

  function menu_item() {
    add_submenu_page(
        'plugins.php', //tools.php
        'Hooks List',
        'Hooks List',
        'manage_options',
        'hooks',
        array( &$this, 'draw_' )
    );
  } // End function().

  function draw_() {
    echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>';
    echo '<h2>List hooks from the plugins (actions & filters)</h2>';
    echo '<div>Plugins:</div>';

    $path = realpath( WP_PLUGIN_DIR );

    $plugins = array_filter( glob( WP_PLUGIN_DIR . '/*' ), 'is_dir' );
    $singlefileplugins = array_filter( glob( WP_PLUGIN_DIR . '/*.php' ) );

    foreach ( $plugins as $pl ) {

      $pls = str_replace( WP_PLUGIN_DIR . DIRECTORY_SEPARATOR , '', $pl );
      echo '<a href="#' . $pls . '">';
      echo esc_html( $pls );
      echo '</a>';
      echo ', ';
    }
		// Add little distance.
    echo '<hr>';
    echo '<hr>';

    $files = $this->return_files( $path );
    foreach ( $files as $f ) {

      $id = str_replace( WP_PLUGIN_DIR, '', $f );
      $ids = explode( DIRECTORY_SEPARATOR, $id );

      $f1 = str_replace( WP_PLUGIN_DIR, '', $f );
      echo '<a id="' . $ids[1] . '">' . $ids[1] . ':::' . $f1 . '</a>';
      $a = $this->get_actions( $f );

      if ( ! empty( $a ) ) {
        echo '<br><strong>actions:</strong>';
        foreach ( $a as $k => $v ) {
          echo '<br>line:' . $k . ':' . $this->color_me( htmlspecialchars( $v ),'do_action' );
        }
      } // End if().
      else {
				echo '<br> (no actions)';
			}

      $f = $this->get_filters( $f );
      if ( ! empty( $f ) ) {

        echo '<br><strong>filters:</strong>';
        foreach ( $f as $k => $v ) {
          echo '<br>line:' . $k . ':' . $this->color_me( htmlspecialchars( $v ),'apply_filters' );
        }
        echo '<hr>';
      } // End if().
      else {
				echo '<br> (no filters)<hr>';
			}
      echo '</ hr>';
    }
    echo '</div>';
  } // End function().

  function color_me( $text, $what_to_color ) {
    $r = str_replace( $what_to_color, '<span style="color:red">' . $what_to_color . '</span>', $text );
    return $r;
  }

  function return_files( $path ) {
    $files = array();

    $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator( $path ), RecursiveIteratorIterator::LEAVES_ONLY,
    RecursiveIteratorIterator::CATCH_GET_CHILD);
    foreach ( $objects as $name => $object ) {
      if ( 'php' == pathinfo( $name, PATHINFO_EXTENSION ) ) {
        $files[] = $name;
      }
    }
    return $files;
  }

  function get_actions( $filename ) {

      $lines = file( $filename );
      $lines = preg_grep( '/do_action/', $lines );
      return $lines;

  }


  function get_filters( $filename ) {

      $lines = file( $filename );
      $lines = preg_grep( '/apply_filters/', $lines );
      return $lines;
  }


  /**
   * Runs when the plugin is activated.
   */
  function install_hooks() {
    // Info that the plugin is activated.
		update_option( 'DB_Plugin_Hooks', true );
  }

  /**
   * Runs when the plugin is initialized
   */
  function init_hooks() {
    // TODO in future setup localization.
    load_plugin_textdomain( self::SLUG, false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
  }


} // End class{}.
endif;

new DB_Plugin_Hooks();
