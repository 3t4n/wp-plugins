<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.daisycon.com
 * @since      1.0.0
 *
 * @package    Daisycon_Woocommerce
 * @subpackage Daisycon_Woocommerce/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Daisycon_Woocommerce
 * @subpackage Daisycon_Woocommerce/admin
 * @author     daisycon
 */
class Daisycon_Woocommerce_Admin
{

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
	 * The text domain
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $text -domain
	 */
	protected $text_domain = 'daisycon-woocommerce';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version     The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct(string $plugin_name, string $version)
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{
		wp_enqueue_script(
			$this->plugin_name,
			plugin_dir_url(__FILE__) . 'assets/daisycon-woocommerce-admin.js',
			['jquery'],
			$this->version,
			false
		);
	}

	/**
	 * Register the Stylesheets for the admin area
	 *
	 * @since    1.6.0
	 */
	public function enqueue_styles()
	{
		wp_enqueue_style(
			$this->plugin_name,
			plugin_dir_url(__FILE__) . 'assets/daisycon-woocommerce-admin.css',
			$this->version,
			false
		);
	}

	/**
	 * Add the custom cc option to the WooCommerce product
	 */
	public function daisycon_add_custom_cc_option()
	{
		echo '<div class="options_group">';
			woocommerce_wp_text_input([
				'id'          => '_daisycon_cc',
				'label'       => 'Daisycon Pixel Commission Code',
				'desc_tip'    => 'true',
				'description' => 'Enter the Daisycon Pixel Commission Code here.',
			]);
		echo '</div>';
	}

	/**
	 * Save the custom cc option value
	 *
	 * @param $product_id
	 *
	 * @return int|bool
	 */
	public function daisycon_save_custom_cc_option($product_id)
	{
		if (!$product_id)
		{
			return false;
		}

		$daisycon_cc_field = (isset($_POST['_daisycon_cc'])) ? $_POST['_daisycon_cc'] : '';

		return update_post_meta($product_id, '_daisycon_cc', esc_attr($daisycon_cc_field));
	}

	/**
	 * Add the custom cc column to the quick edit
	 *
	 * @return void
	 */
	public function daisycon_cc_quick_edit()
	{
		echo sprintf(
			'<div class="inline-edit-group daisycon_cc_quick_edit">
                    <label>
                        <span class="title">%s</span>
                        <span class="input-text-wrap">
                            <input type="text" name="daisycon_cc" class="text daisycon_cc_quick_edit_input" value="test" />
                        </span>
                    </label>
                </div>',
			'Daisycon Pixel Commission Code'
		);
	}

	/**
	 * Save the custom cc value from the quick edit
	 */
	public function daisycon_cc_quick_edit_save()
	{
		if (true === isset($_POST['post_ID']) && true === isset($_POST['daisycon_cc'])) {
			$product_id = (int)$_POST['post_ID'];
			$daisycon_cc_field = $_POST['daisycon_cc'];

			update_post_meta(esc_attr($product_id), '_daisycon_cc', esc_attr($daisycon_cc_field));
		}
	}

	/**
	 * Add the current value in a hidden input
	 *
	 * @param $column
	 * @param $post_id
	 */
	public function daisycon_cc_quick_edit_value($column, $post_id)
	{
		if ($column == 'name') {
			echo '<div class="hidden daisycon_cc_inline"'
				. ' id="daisycon_cc_inline_' . esc_attr($post_id) .'"'
				. '>'
				. htmlentities(get_post_meta($post_id, '_daisycon_cc', true))
				. '</div>';
		}
	}

}
