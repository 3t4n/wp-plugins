<?php 
	/*
		Plugin Name: Discourage Search Engines by URL
		Description: Allows you to discourage search engines by url to prevent you from forgetting to turn it off going between development and live instances.
		Version: 0.2.1
		Author: Storm Rockwell
		Author URI: http://www.stormrockwell.com
		License: GPL2v2
		
		Discourage Search Engines by URL is free software: you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation, either version 2 of the License, or
		any later version.
		 
		Discourage Search Engines by URL is distributed in the hope that it will be useful,
		but WITHOUT ANY WARRANTY; without even the implied warranty of
		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
		GNU General Public License for more details.
		 
		You should have received a copy of the GNU General Public License
		along with Discourage Search Engines by URL. If not, see https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html.
	*/

	if ( ! class_exists( 'Discourage_Search_Engines_By_Url' ) ) {

		class Discourage_Search_Engines_By_Url {
			public $title = '';
			public $menu_title = '';

			/**
			 * Constructor
			 */
			public function __construct() {

				$this->title = __( 'Discourage Search Engines by URL', 'discourage-search-engines-by-url' );
				$this->menu_title = __( 'DSE by URL', 'discourage-search-engines-by-url' );

				add_action( 'wp_head', array( $this, 'add_meta_to_head' ) );

				if ( ! get_option( 'dseburl_hide_icon' ) ) {
					add_action( 'admin_bar_menu', array( $this, 'add_admin_bar_icon' ), 100 );
				}

				add_action( 'admin_init', array( $this, 'register_fields' ) );

				add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'add_settings_link' ) );

			}

			/**
			 * Register Fields
			 * register backend fields for the settings page
			 */
			public function register_fields() {

				register_setting( 'reading', 'dseburl_url' );
				add_settings_field(
					'dseburl_url',
					'<label for="dseburl_url">' . __( 'Discorage Search Engines if URL contains', 'discourage-search-engines-by-url' ) . '</label>',
					array( $this, 'url_field_html' ),
					'reading'
				);

				register_setting( 'reading', 'dseburl_hide_icon' );
				add_settings_field(
					'dseburl_hide_icon',
					'<label for="dseburl_hide_icon">' . __( 'Search Engine Visibility Icon', 'discourage-search-engines-by-url' ) . '</label>',
					array( $this, 'hide_icon_field_html' ),
					'reading'
				);

			}

			/**
			 * URL Field HTML
			 * html for the URL field
			 */
			public function url_field_html() {

				$value = get_option( 'dseburl_url' );
				echo '<textarea id="dseburl_url" name="dseburl_url" cols="40" rows="4" placeholder="staging.google.com">' . esc_attr( $value ) . '</textarea>';
				echo '<p class="description">' . __( 'One domain per line. Be specific as possible', 'discourage-search-engines-by-url' ) . '</p>';
				echo '<p class="description">';
				printf( 
					/* translators: %s: current home url */
					__( 'Current home url: "%s"', 'discourage-search-engines-by-url' ), 
					home_url() 
				) . '</p>';
				
				if ( ! get_option( 'blog_public' ) ) {
					echo '<p style="color: #f00">' . __( '"Search Engine Visibility" need to be unchecked for this plugin to work properly', 'discourage-search-engines-by-url' ) . '</p>';
				}

			}

			/**
			 * Hide Icon Field HTML
			 * html for the icon field
			 */
			public function hide_icon_field_html() {
				
				$value = get_option( 'dseburl_hide_icon' );

				echo '<input id="dseburl_hide_icon" name="dseburl_hide_icon" type="checkbox" ' . checked( 'on', $value, false ) . ' /> ';
				echo __( 'Check to disable the icon that appears in the admin bar.', 'discourage-search-engines-by-url' );

			}

			/**
			 * Add Admin Bar Icon
			 * adds the plugin icon to the admin bar
			 * @param WP_Admin_Bar $bar 
			 */
			public function add_admin_bar_icon( WP_Admin_Bar $bar ) {

    			$style = 'padding: 6px 0; ';
    			$alt = '';
    			if ( ! $this->is_page_indexable() || ! get_option( 'blog_public' ) ) {
    				$style .= 'color: #bb2525; ';
    				$alt = __( 'This page isn\'t indexable', 'discourage-search-engines-by-url' );
    			} else {
    				$style .= 'color: #4d8c3e; ';
    				$alt = __( 'This page is indexable', 'discourage-search-engines-by-url' );
    			}

				$bar->add_menu( array(
			        'id'     => 'dseburl',
			        'title'  => '<div class="dashicons-visibility dashicons-before dashicons-dashboard" style="' . $style . '"></div>',
			        'href'   => get_admin_url( null, 'options-reading.php' ),
			    ) );

    			$bar->add_group( array(
					'id'     => 'dseburl-group',
					'parent' => 'dseburl',
				) );

				$bar->add_menu( array(
					'id'     => 'dseburl-subitem',
					'title'  => $alt,
					'parent' => 'dseburl-group',
				) );

			}

			/**
			 * Add Meta to head
			 * adds the meta robots to the head of the document
			 */
			public function add_meta_to_head() {

				if ( ! $this->is_page_indexable() ) {
					echo '<meta name="robots" content="noindex, nofollow, noodp">' . "\n";
				}

			}

			/**
			 * Is Page Indexable
			 * checks to see if the current page is indexable
			 * @return boolean is/ins't indexable
			 */
			public function is_page_indexable() {
				global $wp;

				$urls = get_option( 'dseburl_url' );
				$urls_array = explode( PHP_EOL, $urls );

				$current_url = home_url( add_query_arg( array(), $wp->request ) );

				if ( array_key_exists( 0, $urls_array ) ) {
					$trimmed = trim( $urls_array[0] );
					if ( ! empty( $trimmed ) ) {
						foreach ( $urls_array as $url ) {
							$url = trim( $url );
							if ( false !== strpos( $current_url, $url ) ) {
								return false;
							}
						}
					}
				}

				return true;

			}

			/**
			 * Add Settings Link
			 * @param array $links links that appear in the plugin row
			 */
			public function add_settings_link( $links ) {
			    $links[] = '<a href="' . get_admin_url( null, 'options-reading.php' ) . '">Settings</a>';
			    return $links;
			}

		}

		new Discourage_Search_Engines_By_Url;

	}