<?php

namespace AWSA_Core\APIs\Settings\Page;

use AWSA_Core\APIs\Settings;

/**
 * Class Settings_Page
 *
 * @version 1.0.0
 * @package AWSA_Core\APIs\Settings\Page
 */
class Display_Page extends Base_Page {

	/**
	 * @var self
	 */
	protected static $instance;

	/**
	 * @param string $page_slug
	 *
	 * @return self
	 */
	public static function instance( string $page_slug = '' ): self {

		$p_slug = !is_null( self::$instance ) ? self::$instance->page_slug : null;
		if ( $page_slug !== $p_slug ) {

			self::$instance = new self( $page_slug );
		}

		return self::$instance;
	}

	/**
	 * Enqueue styles and Scripts
	 */
	public function enqueue(): void {

		$dir_url = plugin_dir_url( __FILE__ );
		wp_enqueue_script( 'awsa-select2', $dir_url . 'select2.min.js', array( 'jquery' ), '1.0.0' );
		wp_enqueue_style( 'awsa-select2', $dir_url . 'select2.min.css', null, '1.0.0' );

		wp_enqueue_script( 'awsa-dropdown-tabs', $dir_url . 'awsa-dropdown-tabs.js', array( 'jquery' ), '1.0.0', true );
		?>
		<script>
			jQuery(document).ready(function ($) {
				$('.awsa-select2').select2();
				$('.awsa-multiselect2').select2();
			});

		</script>
		<?php
	}

	/**
	 * Get nav data in settings page
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function get_nav_data(): array {

		$url      = is_admin() ? admin_url( 'admin.php?page=' . $_GET['page'] ) : '';
		$nav_data = array(
				'general'        => array(
						'url'  => $url,
						'text' => __( 'General', 'awsa-shipping' ),
					//'path' => ''
				),
				'login-register' => array(
						'url'  => esc_url( add_query_arg( 'aw-tab', 'login-register' ), $url ),
						'text' => __( 'Login/Register', 'awsa-shipping' )
					//'path' => ''
				),
				'web_service'    => array(
						'url'  => esc_url( add_query_arg( 'aw-tab', 'web_service' ), $url ),
						'text' => __( 'Web Service', 'awsa-shipping' )
					//'path' => array('path'
				),
				'notifications'  => array(
						'url'  => esc_url( add_query_arg( 'aw-tab', 'notifications' ), $url ),
						'text' => __( 'Notifications', 'awsa-shipping' )
					//'path' => ''
				),
				'sync'           => array(
						'url'  => esc_url( add_query_arg( 'aw-tab', 'sync' ), $url ),
						'text' => __( 'Sync', 'awsa-shipping' )
					//'path' => ''
				),
				'reports'        => array(
						'url'  => esc_url( add_query_arg( 'aw-tab', 'reports' ), $url ),
						'text' => __( 'Reports', 'awsa-shipping' )
					//'path' => ''
				),
		);

		$nav_data = apply_filters( 'awsa_settings_page_nav_data-' . $this->page_slug, $nav_data, $url );

		return $this->get_active_tabs_for_display( $nav_data );
	}

	/**
	 * @param $menus
	 *
	 * @return array
	 */
	public function get_active_tabs_for_display( $menus ): array {

		$groups = $this->get_settings_groups();

		if ( is_array( $groups ) ) {

			foreach ( $menus as $menu_key => $data ) {

				if ( !in_array( $menu_key, $groups, false ) ) {

					unset( $menus[ $menu_key ] );
				}
			}
		}

		return $menus;
	}

	/**
	 * Convert Fields to tr by title
	 *
	 * @return void
	 */
	public function render_fields(): void {

		$fields = $this->get_fields_tab_by_saved_values();
		if ( empty( $fields ) ) {

			return;
		}

		echo '<table class="form-table">';
		foreach ( $fields as $field_id => $field_atts ) {

			$title      = $field_atts['title'] ?? '';
			$type       = $field_atts['type'] ?? '';
			$field_html = Settings\Settings_API::generate_field_html( $field_atts );
			$fullwidth  = $field_atts['fullwidth'] ?? false;

			if ( $fullwidth || 'title' === $type ) {

				echo "<tr>
						<td colspan='2'>{$field_html}</td>
					</tr>";
			} else {

				echo "<tr>
					<th>{$title}</th>
					<td>{$field_html}</td>
				</tr>";
			}
		}
		echo '</table>';
	}

	public function display_settings(): void {

		add_action( 'awsa_settings_page_enqueue', array( $this, 'enqueue' ), 10, 2 );
		add_action( 'awsa_settings_topmenu', array( $this, 'settings_topmenu' ), 10, 2 );
		add_action( 'awsa_display_page_settings', array( $this, 'render_fields' ), 10, 2 );

		$active_tab         = $this->active_tab;
		$settings_page_type = '';

		global $awsa_settings_page_args;
		$awsa_settings_page_args = array(
				'form_id'      => $this->page_slug,
				'settings_box' => array(
						'classes' => array(),
				),
				'topmenu'      => array(
						'nav_data'   => (array) $this->get_nav_data(),
						'active_tab' => $active_tab,
						'classes'    => array(),
				),
				'content'      => array(
						'classes' => array(),
				),
		);

		include __DIR__ . '/template-settings-page.php';
	}

	public function settings_topmenu( $form_id, $topmenu ): void {

		// $form_id
		if ( count( $topmenu['nav_data'] ) > 1 ) {

			$navs_data  = $topmenu['nav_data'];
			$active_nav = $topmenu['active_tab'];

			$navs_data[ $active_nav ]['class'] = !empty( $active_nav ) ? 'nav-tab-active' : '';

			$html = '<div class="nav-tab-wrapper">';
			foreach ( $navs_data as $nav_id => $nav_data ) {

				$class = $nav_data['class'] ?? '';
				$html  .= '<a href="' . $nav_data['url'] . '" class="nav-tab ' . $class . '">' . $nav_data['text'] . '</a>';
			}
			$html .= '</div>';

			echo $html;

		}
	}

}
