<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://popupsmart.com
 * @since      1.0.0
 *
 * @package    Pop
 * @subpackage Pop/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Pop
 * @subpackage Pop/public
 * @author     Popupsmart <info@popupsmart.com>
 */
class Pop_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pop_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pop_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/pop-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pop_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pop_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/pop-public.js', array('jquery'), $this->version, false);
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function add_popup()
	{

		$popupsmart_version = 	get_option($this->plugin_name . '-popupsmart-version');


?>
		<?php if ($popupsmart_version == 'v2') {
		?>
			<script type="text/javascript">
				function loadScript() {
					var accountId = "<?php echo get_option($this->plugin_name . '-account-id'); ?>";
					var script = document.createElement('script');
					script.type = 'text/javascript';
					script.src = 'https://cdn.popupsmart.com/bundle.js';
					script.setAttribute('data-id', accountId);
					script.async = true;
					script.defer = true;
					document.body.appendChild(script);
				}

				if (document.readyState === 'complete') {
					loadScript();
				} else {
					document.addEventListener('DOMContentLoaded', loadScript);
				}
			</script>

		<?php
		}
		if ($popupsmart_version == 'v1') {
		?>
			<script type="text/javascript" src="https://apiv2.popupsmart.com/api/Bundle/<?php echo get_option($this->plugin_name . '-account-id'); ?>" async></script>
<?php
		}
	}
}
