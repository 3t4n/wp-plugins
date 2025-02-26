<?php
/**
 * Plugin Name:       Disable Elements for WPBakery Page Builder
 * Plugin URI:        https://wordpress.org/plugins/disable-elements-for-wpbakery-page-builder/
 * Description:       Adds a new page at WPBakery Page Builder > Disable Elements so you can disable elements not in use.
 * Version:           1.2
 * Requires at least: 6.3
 * Requires PHP:      7.4
 * Author:            WPExplorer
 * Author URI:        https://www.wpexplorer.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       disable-elements-for-wpbakery-page-builder
 * Domain Path:       /languages/
 */

/*
Disable Elements for WPBakery Page Builder is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Disable Elements for WPBakery Page Builder is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Disable Elements for WPBakery Page Builder. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

// Prevent direct access to this file.
defined( 'ABSPATH' ) || exit;

// Main plugin class.
if ( ! class_exists( 'Disable_Elements_For_WPBakery_Page_Builder' ) ) {

	final class Disable_Elements_For_WPBakery_Page_Builder {

		/**
		 * User permission that has access to the settings.
		 */
		protected $user_capability = 'edit_theme_options';

		/**
		 * Initlialize.
		 */
		public function __construct() {
			add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), [ $this, 'add_settings_link' ] );
			add_action( 'init', [ $this, 'admin_init' ] );
			add_action( 'vc_after_init', [ $this, 'maybe_remove_elements' ] );
		}

		/**
		 * Add settings link to plugin dashboard screen.
		 */
		public function add_settings_link( array $links ) {
			if ( is_array( $links ) ) {
				$links = array_merge( [
					'<a href="' . esc_url( admin_url( 'admin.php?page=vc-disable-elements' ) ) . '">' . esc_html__( 'Settings', 'disable-elements-for-wpbakery-page-builder' ) . '</a>',
				], $links );
			}
			return $links;
		}

		/**
		 * Run on admin init.
		 */
		public function admin_init(): void {
			if ( is_plugin_active( 'js_composer/js_composer.php' ) || class_exists( 'WPBMap' ) ) {
				add_action( 'admin_menu', [ $this, 'add_admin_submenu_page' ] );
			}
		}

		/**
		 * Returns the admin page parent slug.
		 */
		private function get_admin_parent_slug(): string {
			return defined( 'VC_PAGE_MAIN_SLUG' ) ? VC_PAGE_MAIN_SLUG : 'vc-general';
		}

		/**
		 * Add submenu page.
		 */
		public function add_admin_submenu_page(): void {
			add_submenu_page(
				$this->get_admin_parent_slug(),
				esc_html__( 'Disable Elements', 'disable-elements-for-wpbakery-page-builder' ),
				esc_html__( 'Disable Elements', 'disable-elements-for-wpbakery-page-builder' ),
				'administrator', // allow admin to decide what "edit_theme_options" roles can edit.
				'vc-disable-elements',
				[ $this, 'admin_page' ]
			);
		}

		/**
		 * Save the list of disabled elements.
		 */
		private function save_option( $value ): void {
			$excluded_elements = [];
			$elements = $this->get_all_elements();
			if ( is_array( $value ) ) {
				foreach ( $elements as $element_id => $element_settings ) {
					if ( ! array_key_exists( $element_id, $value ) ) {
						$excluded_elements[] = $element_id;
					}
				}
			}
			if ( ! $excluded_elements ) {
				delete_option( 'wpex_wpb_disabled_elements' );
			} else {
				update_option( 'wpex_wpb_disabled_elements', $excluded_elements, false );
			}
		}

		/**
		 * Display Admin page.
		 */
		public function admin_page(): void {
			if ( ! current_user_can( $this->user_capability ) ) {
				return;
			}

			$elements = $this->get_all_elements();

			if ( ! $elements ) {
				return;
			}

			if ( array_key_exists( 'wpex_wpb_disabled_elements_nonce_field', $_POST )
				&& wp_verify_nonce( $_POST['wpex_wpb_disabled_elements_nonce_field'], 'wpex_wpb_disabled_elements_nonce_action' )
				&& array_key_exists( 'wpex_wpb_disabled_elements', $_POST )
			) {
				$this->save_option( $_POST['wpex_wpb_disabled_elements'] );
			}

			if ( defined( 'WPB_VC_VERSION' ) && function_exists( 'vc_asset_url' ) ) {
				wp_enqueue_style(
					'js_composer_settings',
					vc_asset_url( 'css/js_composer_settings.min.css' ),
					false,
					WPB_VC_VERSION
				);
			}
			?>

			<div class="wrap vc_settings">

				<h1 style="margin-bottom:15px;"><?php esc_html_e( 'Disable WPBakery Elements', 'disable-elements-for-wpbakery-page-builder' ); ?></h1>
				<p><?php esc_html_e( 'Click on any element below you wish to disable, then hit the save button at the bottom.', 'disable-elements-for-wpbakery-page-builder' ); ?></p>
				<form method="post">
					<div class="vc_ui-settings-roles-role">
						<style>
							.defwpb-elements-table__tr--disabled:not(:hover) { opacity: 0.6; }
							.defwpb-elements-table { max-width: 700px; }
							.defwpb-elements-table thead th:nth-child(2),
							.defwpb-elements-table__tr td:nth-child(2) { text-align: center; }
							.defwpb-elements-table :is(.defwpb-elements-table__tr,label) { cursor: pointer; }
							.defwpb-elements-table__tr:hover label { color: #222; }
							.defwpb-elements-table label { display: flex; align-items: center; font-weight: 600; font-size: 14px; }
						</style>
						<script>
							(function() {
								document.addEventListener('click', event => {
									const tr = event.target.closest('.defwpb-elements-table tr');
									if ( tr && ! event.target.closest('label') && ! event.target.closest('input') ) {
										const trCheckbox = tr.querySelector('input[type="checkbox"]');
										if ( trCheckbox ) {
											trCheckbox.checked = ! trCheckbox.checked;
											trCheckbox.dispatchEvent(new Event('change',{bubbles: true}));
										}
									}
								});
								document.addEventListener('change', event => {
									const checkbox = event.target.closest('.defwpb-elements-table input[type="checkbox"]');
									if ( checkbox ) {
										if ( checkbox.checked ) {
											checkbox.closest('tr').classList.remove('defwpb-elements-table__tr--disabled');
										} else {
											checkbox.closest('tr').classList.add('defwpb-elements-table__tr--disabled');
										}
									}
								} );
							}());
						</script>
						<table class="wp-list-table widefat fixed striped table-view-list defwpb-elements-table">
							<thead>
								<tr>
									<th><?php esc_html_e( 'Element', 'disable-elements-for-wpbakery-page-builder' ); ?></th>
									<th><?php esc_html_e( 'Enabled', 'disable-elements-for-wpbakery-page-builder' ); ?></th>
								</tr>
							</thead>
							<?php
							$enabled_elements = [];
							$disabled_elements = [];
							$user_disabled_elements = self::get_disabled_elements();
							foreach ( $elements as $key => $value ) {
								if ( empty( $value['name'] ) ) {
									continue;
								}
								$element_args = [
									'id'   => $key,
									'name' => $value['name'],
									'icon' => $value['icon'] ?? '',
								];
								if ( in_array( $key, $user_disabled_elements, true ) ) {
									$disabled_elements[ sanitize_key( $value['name'] ) ] = $element_args;
								} else {
									$enabled_elements[ sanitize_key( $value['name'] )  ] = $element_args;
								}
							}
							ksort( $enabled_elements );
							foreach ( $enabled_elements as $element ) {
								$this->render_table_tr( $element, true );
							}
							ksort( $disabled_elements );
							foreach ( $disabled_elements as $element ) {
								$this->render_table_tr( $element, false );
							}
							?>
						</table>
					</div>

					<?php wp_nonce_field( 'wpex_wpb_disabled_elements_nonce_action', 'wpex_wpb_disabled_elements_nonce_field' ); ?>

					<?php submit_button(); ?>

				</form>

			</div>

			<?php
		}

		/**
		 * Renders a table element (row).
		 */
		private function render_table_tr( $element = [], $enabled = true ): void {
			?>
			<tr class="defwpb-elements-table__tr<?php echo $enabled ? '' : ' defwpb-elements-table__tr--disabled'; ?>">
				<td class="vc_row" style="width:auto;">
					<label for="wpex_wpb_disabled_elements[<?php echo esc_attr( $element['id'] ); ?>]">
						<i class="vc_general vc_element-icon <?php echo esc_attr( $element['icon'] ); ?>"></i>
						<div><?php echo esc_html( $element['name'] ); ?></div>
					</label>
				</th>
				<td>
					<input type="checkbox" id="wpex_wpb_disabled_elements[<?php echo esc_attr( $element['id'] ); ?>]" name="wpex_wpb_disabled_elements[<?php echo esc_attr( $element['id'] ); ?>]"<?php checked( $enabled, true, true ); ?>>
				</td>
			</tr>
			<?php
		}

		/**
		 * Returns an array of all WPBakery builder elements.
		 */
		private function get_all_elements(): array {
			$elements = [];
			if ( is_callable( array( 'WPBMap', 'getAllShortCodes' ) ) ) {
				$elements = WPBMap::getAllShortCodes();
				if ( $elements && is_array( $elements ) ) {
					foreach ( $this->get_required_elements() as $element ) {
						unset( $elements[ $element ] );
					}
				}
			}
			return $elements;
		}

		/**
		 * Returns an array of all WPBakery builder elements.
		 */
		private function get_required_elements(): array {
			return [
				'vc_row',
				'vc_row_inner',
				'vc_column',
				'vc_column_inner',
				'vc_section',
				'vc_tta_toggle_section',
				'vc_tta_section',
			];
		}

		/**
		 * Returns an array of all disabled WPBakery builder elements.
		 */
		public static function get_disabled_elements(): array {
			return (array) get_option( 'wpex_wpb_disabled_elements', [] );
		}

		/**
		 * Check if elements can be removed.
		 */
		private function elements_can_be_removed(): bool {
			return ( ! is_admin() || ( isset( $_GET['post'] ) || isset( $_GET['post_type'] ) ) || ( function_exists( 'vc_is_inline' ) && vc_is_inline() ) );
		}

		/**
		 * Remove elements.
		 */
		public function maybe_remove_elements(): void {
			if ( $this->elements_can_be_removed() ) {
				foreach ( self::get_disabled_elements() as $element ) {
					if ( ! in_array( $element, $this->get_required_elements(), true ) ) {
						vc_remove_element( $element );
					}
				}
			}
		}

	}

	new Disable_Elements_For_WPBakery_Page_Builder;

}