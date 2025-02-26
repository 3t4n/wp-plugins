<?php
/**
 * Apermo Tidy Gutenberg
 *
 * @author      Christoph Daum
 * @copyright   2018 Christoph Daum
 * @license     GPL-2.0+
 * @package     apermo-tidy-gutenberg
 *
 * @wordpress-plugin
 * Plugin Name: Apermo Tidy Gutenberg
 * Plugin URI:  https://wordpress.org/plugins/apermo-tidy-gutenberg/
 * Version:     1.0.1
 * Description: Removes the ability to use the color pickers on Gutenberg. More to come later.
 * Author:      Christoph Daum
 * Author URI:  https://christoph-daum.de
 * Text Domain: apermo-tidy-gutenberg
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Apermo Tidy Gutenberg
 * Copyright (C) 2018, Christoph Daum - c.daum@apermo.de
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'You shall not pass' );
}

if ( ! is_admin() ) {
	return;
}

if ( ! defined( 'GUTENBERG_VERSION' ) ) {
	add_action( 'admin_notices', function () {
		?>
		<div class="notice notice-warning is-dismissible">
			<p><strong><?php esc_html_e( 'Apermo Gutenberg:', 'apermo-tidy-gutenberg' ); ?></strong> <?php echo esc_html_x( '"Gutenberg" is disabled.', 'Will be shown as admin notice if Gutenberg is not active.', 'apermo-tidy-gutenberg' ); ?></p>
		</div>
		<?php
	} );
	return;
}

/**
 * Class ApermoTidyGutenberg
 */
class ApermoTidyGutenberg {
	/**
	 * ApermoTidyGutenberg constructor.
	 */
	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'gutenberg_theme_support' ], 99 );
	}

	/**
	 * Inits the Theme Support functions.
	 */
	public function gutenberg_theme_support() {
		// Special thanks to @luehrsen for hinting me on this.
		add_theme_support( 'disable-custom-colors' );
		add_theme_support( 'editor-color-palette', [] );
	}
}

// Run boy, run!
add_action( 'plugins_loaded', function () {
	new ApermoTidyGutenberg();
} );
