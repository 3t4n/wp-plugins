<?php
/**
 * Plugin Name: Neville Extensions
 * Plugin URI: http://www.acosmin.com/theme/neville/
 * Description: Adds front page sections (Instagram, Ads), a post title design option and other extensions to Neville WordPress theme.
 * Version: 1.0.0
 * Author: acosmin
 * Author URI: http://www.acosmin.com/
 * Text Domain: neville-extensions
 * Domain Path: /languages
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Constants
 */
define( 'NEVILLEX_VERSION',        '1.0.0'                                               );
define( 'NEVILLEX_PLUGIN_DIR',     plugin_dir_path( __FILE__ )                           );
define( 'NEVILLEX_PLUGIN_URL',     plugin_dir_url( __FILE__ )                            );
define( 'NEVILLEX_PLUGIN_FILE',    __FILE__                                              );
define( 'NEVILLEX_INC_DIR',        NEVILLEX_PLUGIN_DIR . trailingslashit( 'inc' )        );
define( 'NEVILLEX_SECTIONS_DIR',   NEVILLEX_PLUGIN_DIR . trailingslashit( 'sections' )   );
define( 'NEVILLEX_WIDGETS_DIR',    NEVILLEX_PLUGIN_DIR . trailingslashit( 'widgets' )    );
define( 'NEVILLEX_MODULES_DIR',    NEVILLEX_PLUGIN_DIR . trailingslashit( 'modules' )    );
define( 'NEVILLEX_CUSTOMIZER_DIR', NEVILLEX_PLUGIN_DIR . trailingslashit( 'customizer' ) );

/**
 * Require some files
 */
require_once( NEVILLEX_INC_DIR . 'helper-functions.php' );
require_once( NEVILLEX_INC_DIR . 'sanitization.php'     );
require_once( NEVILLEX_INC_DIR . 'enqueue-backend.php'  );

require_once( NEVILLEX_MODULES_DIR . 'title-design/init.php' );

require_once( NEVILLEX_WIDGETS_DIR . 'base.php' );
require_once( NEVILLEX_WIDGETS_DIR . 'init.php' );

require_once( NEVILLEX_PLUGIN_DIR . '/settings-pages/instagram.php' );

require_once( NEVILLEX_SECTIONS_DIR . 'init.php' );

require_once( NEVILLEX_CUSTOMIZER_DIR . 'init.php' );

/**
 * Load files only if the theme or parent theme
 * name is `Neville`
 */
if( nevillex_theme_check() ) {}
