<?php

namespace DCL\Admin;

use DCL\Includes\DCL_Base;

/**
 * Admin.
 *
 * Plugin action links.
 *
 * @package    DCL\Admin
 * @author     antwerpes ag <opensource@antwerpes.com>
 */
class DCL_Admin extends DCL_Base {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	protected $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	protected $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param   string $plugin_name The name of this plugin.
	 * @param   string $version The version of this plugin.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function __construct( $plugin_name, $version ) {
		parent::__construct();

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Add action links for plugin overview.
	 *
	 * @param   $links
	 *
	 * @return  array
	 * @since   1.0.0
	 * @access  private
	 */
	function dcl_add_action_links( $links ) {
		$dcl_links = [
			'<a href="' . admin_url( 'options-general.php?page=doccheck-login' ) . '">' . esc_html__( 'Settings' ) . '</a>',
		];

		return array_merge( $dcl_links, $links );
	}
}
