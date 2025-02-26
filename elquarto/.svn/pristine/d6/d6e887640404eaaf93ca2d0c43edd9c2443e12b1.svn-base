<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://elquarto.com
 * @since      1.0.0
 *
 * @package    ElQuarto
 * @subpackage ElQuarto/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    ElQuarto
 * @subpackage ElQuarto/admin
 * @author     Tango Bravo<pz@tangobravo.com.br>
 */
class ElQuarto_Admin
{
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**     *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $options    Plugin options.
	 */
	private $options;
	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      $plugin_screen_hook_suffix
	 */
	private $plugin_screen_hook_suffix;

	private $option_name = 'elquarto';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{
		$this->options = get_option($this->option_name);
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_admin_tinymce_scripts() { }

	// ADMIN PAGE

	/**
	 * Creates settings page and adds to the settings menu
	 */
	public function elquarto_admin_add_options_page()
	{
		$this->plugin_screen_hook_suffix = add_options_page(
			__('ElQuarto', 'elquarto'),
			__('ElQuarto', 'elquarto'),
			'manage_options',
			$this->plugin_name,
			array($this, $this->option_name . '_display_options_page')
		);
	}

	/**
	 * Renders settings page options
	 */
	public function elquarto_display_options_page()
	{
		include_once 'partials/elquarto-admin-display.php';
	}

	public function elquarto_admin_register_setting()
	{
		register_setting(
			$this->plugin_name,
			$this->option_name,
			array($this, $this->option_name . '_sanitize_options')
		);

		add_settings_section(
			$this->option_name . '_general',
			__('Geral', 'elquarto'),
			array($this, $this->option_name . '_general_cb'),
			$this->plugin_name
		);

		add_settings_field(
			$this->option_name . '_affiliate_id',
			__('Id de Afiliado', 'elquarto'),
			array($this, $this->option_name . '_affiliate_id_cb'),
			$this->plugin_name,
			$this->option_name . '_general',
			array('label_for' => $this->option_name . '[affiliate_id]')
		);
	}

	public function elquarto_general_cb()
	{
		echo '<p>' . __('Configure o seu Id de Afiliado disponibilizado no momento do Cadastro', 'elquarto') . ' </p>';
	}

	public function elquarto_affiliate_id_cb()
	{
		?>
			<fieldset>
				<label>
					<input type="text"
						   name="<?php echo $this->option_name . '[affiliate_id]'; ?>"
						   id="<?php echo $this->option_name . '_affiliate_id' ?>"
						   value="<?php echo (isset($this->options['affiliate_id'])) ? $this->options['affiliate_id'] : '' ?>" >
				</label>
			</fieldset>
		<?php
	}

	public function elquarto_admin_add_settings_link($links)
	{
		$settings_link = '<a href="' . admin_url('options-general.php?page=elquarto') . '">' . __('Settings') . '</a>';
		array_unshift($links, $settings_link);
		return $links;
	}

	// END ADMIN PAGE
}
