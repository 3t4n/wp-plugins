<?php

namespace AWSA_Core\APIs\Settings\Page;

use AWSA_Core\APIs\Settings;

/**
 * Class Base_Page
 *
 * @since   1.0.0
 * @package AWSA_Core\APIs\Settings\Page
 */
class Base_Page {

	/**
	 * @var string
	 */
	public $page_slug;

	/**
	 * @var array
	 */
	public $atts;

	/**
	 * @var string
	 */
	public $active_tab;

	/**
	 * All settings fields
	 *
	 * @var array
	 */
	private $fields;

	/**
	 * All settings groups
	 *
	 * @var array
	 */
	private $settings_groups;

	/**
	 * All Settings
	 *
	 * @var array
	 */
	private $settings = array();

	public function __construct( $page_slug = '' ) {

		$this->init( $page_slug );

		if ( is_admin() ) {

			$this->atts['title'] = get_admin_page_title();
		}

		// require_once (plugin_dir_path(__FILE__).'functions.php');
	}

	/**
	 * @param string $page_slug
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function init( $page_slug = '' ): void {

		$this->get_page_slug( $page_slug );
		$this->active_tab = $_REQUEST['aw-tab'] ?? 'general';// key($nav_data)
		$this->include_addons();
	}

	/**
	 * @param $page_slug
	 *
	 * @since 1.0.0
	 * @return string
	 */
	public function get_page_slug( $page_slug ): string {

		if ( isset( $_REQUEST['aw-page_slug'] ) ) {

			$this->page_slug = $_REQUEST['aw-page_slug'];
		} elseif ( !empty( $page_slug ) ) {

			$this->page_slug = $page_slug;
		} else {

			$this->page_slug = $_REQUEST['page'];
		}

		return $this->page_slug;
	}

	/**
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function include_addons(): void {

		$addons = (array) apply_filters( 'awsa_settings_page_' . $this->page_slug . '_addons', array() );

		foreach ( $addons as $addon ) {

			add_filter( 'awsa_settings_fields_by_group-' . $this->page_slug, $addon . '::get_settings_fields', 10, 2 );
		}
	}

	/**
	 * Get settings fields by group
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function get_fields_by_group(): array {

		return apply_filters( 'awsa_settings_fields_by_group-' . $this->page_slug, array() );
	}

	/**
	 * Get settings groups
	 *
	 * @return array
	 */
	public function get_settings_groups(): array {

		return array_keys( $this->get_fields_by_group() );
	}

	/**
	 * Get settings fields for current_tab
	 *
	 * @since 1.0.0
	 * @return null|array
	 */
	public function get_fields_tab(): ?array {

		if ( empty( $this->fields ) ) {

			$this->fields = $this->get_fields_by_group();
		}

		return $this->fields[ $this->active_tab ] ?? null;

	}

	/**
	 * Get fields for current tab by saved values
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function get_fields_tab_by_saved_values(): array {

		$fields = $this->get_fields_tab();
		if ( empty( $fields ) ) {

			return array();
		}

		$settings = $this->get_settings();
		foreach ( $fields as $field_id => $field ) {

			$group = $field['option_group'] ?? false;
			if ( !$group ) {

				continue;
			}

			$key = $field['option_key'] ?? null;

			if ( !is_null( $key ) ) {

				$value = $settings[ $group ][ $key ] ?? null;
			} else {

				$value = $settings[ $group ] ?? null;
			}

			$fields[ $field_id ]['value'] = $value;
		}

		return $fields;
	}

	/**
	 * Get settings group keys
	 *
	 * @since 1.0.0
	 * @return array|null
	 */
	public function get_settings_group_keys(): ?array {

		if ( empty( $this->settings_groups ) ) {

			$fields                = $this->get_fields_tab();
			$this->settings_groups = is_array( $fields ) ? array_column( $fields, 'option_group' ) : null;
		}

		return $this->settings_groups;
	}

	/**
	 * Get all settings
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function get_settings(): array {

		$keys = $this->get_settings_group_keys();
		if ( !is_array( $keys ) ) {

			return array();
		}

		foreach ( $keys as $key ) {

			$this->settings[ $key ] = Settings\Settings::instance()->get_settings( $key );
		}

		return $this->settings;
	}

}
