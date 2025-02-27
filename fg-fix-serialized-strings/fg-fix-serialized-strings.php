<?php
/**
 * Plugin Name: FG Fix Serialized Strings
 * Plugin Uri:  https://wordpress.org/plugins/fg-fix-serialized-strings/
 * Description: Fix the broken serialized strings in the options and postmeta tables
 * Version:     1.2.1
 * Author:      Frédéric GILLES
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

add_action( 'plugins_loaded', 'fgfss_load', 20 );

if ( !function_exists( 'fgfss_load' ) ) {
	function fgfss_load() {
		new fgfss();
	}
}

if ( !class_exists('fgfss', false) ) {
	class fgfss {

		public function __construct() {
			load_plugin_textdomain( 'fg-fix-serialized-strings', false, basename(dirname( __FILE__ )) . '/languages' );
			add_action( 'admin_menu', array(&$this, 'add_menu') );
		}

		/**
		 * Add the menu in WP backend
		 */
		public function add_menu() {
			$menu_title = __('Fix Serialized Strings', 'fg-fix-serialized-strings');
			add_submenu_page( 'tools.php', $menu_title, $menu_title, 'manage_options', 'fg-fix-serialized-strings', array(&$this, 'build_page') );
		}

		/**
		 * Build the tools page
		 */
		public function build_page() {
			if ( isset( $_POST['fix-serialized-strings'] ) ) {
				check_admin_referer('fgfss-fix');
				$this->fix_options_table();
				$this->restore_lost_widgets();
				$this->fix_postmeta_table();
			}
			include(dirname(__FILE__) . '/fg-fix-serialized-strings.tpl.php');
		}

		/**
		 * Fix the postmeta table
		 * 
		 * @since 1.2.0
		 */
		private function fix_postmeta_table() {
			global $wpdb;
			
			$strings_fixed_count = 0;
			$sql = "SELECT meta_id, meta_value FROM $wpdb->postmeta";
			$results = $wpdb->get_results($sql);
			foreach ( $results as $row ) {
				$fixed_string = $this->fix_serialized($row->meta_value);
				if ( $fixed_string != $row->meta_value ) {
					// update the table
					$wpdb->update(
						$wpdb->postmeta,
						array('meta_value' => $fixed_string), // data
						array('meta_id'	=> $row->meta_id) // where
					);
					$strings_fixed_count++;
				}
			}
			$this->display_admin_notice(sprintf(_n('%d string fixed in postmeta table', '%d strings fixed in postmeta table', $strings_fixed_count, 'fg-fix-serialized-strings'), $strings_fixed_count));
		}

		/**
		 * Fix the options table
		 */
		private function fix_options_table() {
			global $wpdb;
			
			$strings_fixed_count = 0;
			$sql = "SELECT option_id, option_value FROM $wpdb->options";
			$results = $wpdb->get_results($sql);
			foreach ( $results as $row ) {
				$fixed_string = $this->fix_serialized($row->option_value);
				if ( $fixed_string != $row->option_value ) {
					// update the table
					$wpdb->update(
						$wpdb->options,
						array('option_value' => $fixed_string), // data
						array('option_id'	=> $row->option_id) // where
					);
					$strings_fixed_count++;
				}
			}
			$this->display_admin_notice(sprintf(_n('%d string fixed in options table', '%d strings fixed in options table', $strings_fixed_count, 'fg-fix-serialized-strings'), $strings_fixed_count));
		}

		/**
		 * Restore the lost text widgets
		 */
		private function restore_lost_widgets() {
			$restored_widgets_count = 0;
			$sidebars_widgets = get_option('sidebars_widgets');
			$text_widgets = get_option('widget_text');
			if ( is_array($text_widgets ) ) {
				foreach ( $text_widgets as $text_id => $text_widget ) {
					if ( is_array($text_widget) ) {
						// test if the text widget exists in the sidebars widgets
						$widget_is_found = false;
						$text_widget_id = 'text-' . $text_id;
						foreach ( $sidebars_widgets as $sidebar_widgets ) {
							if ( is_array($sidebar_widgets) ) {
								if ( array_search($text_widget_id, $sidebar_widgets) !== false ) {
									// the widget is found
									$widget_is_found = true;
									break;
								}
							}
						}
						if ( !$widget_is_found ) {
							// Restore the widget into the inactive widgets
							$sidebars_widgets['wp_inactive_widgets'][] = $text_widget_id;
							update_option('sidebars_widgets', $sidebars_widgets);
							$restored_widgets_count++;
						}
					}
				}
			}
			$this->display_admin_notice(sprintf(_n('%d widget restored', '%d widgets restored', $restored_widgets_count, 'fg-fix-serialized-strings'), $restored_widgets_count));
			if ( $restored_widgets_count > 0 ) {
				$this->display_admin_notice(__('The restored widgets will be found in the inactive widgets section.', 'fg-fix-serialized-strings'));
			}
		}
		
		/**
		 * Display admin notice
		 *
		 * @param string $message Message to display as a notice
		 */
		protected function display_admin_notice($message)	{
			echo '<div class="updated"><p>[fg-fix-serialized-strings] ' . $message . '</p></div>';
		}

		/**
		 * Fix a serialized string
		 * 
		 * @param string $string Original string
		 * @return string Replaced string
		 */
		private function fix_serialized($string) {
			if ( !preg_match('/^[aOs]:/', $string) ) return $string;
			if ( @unserialize($string) !== false ) return $string;
			$string = preg_replace_callback('/\bs:(\d+):"(.*?)"/', array($this, 'fix_str_length'), $string);
			return $string;
		}

		/**
		 * Callback function for replacing the string
		 * 
		 * @param array $matches Matches
		 * @return string Replaced string
		 */
		private function fix_str_length($matches) {
			$string = $matches[2];
			$right_length = strlen($string);
			return 's:' . $right_length . ':"' . $string . '"';
		}
	}
}
