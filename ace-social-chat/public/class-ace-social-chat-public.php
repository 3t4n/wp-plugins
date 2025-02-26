<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://acewebx.com
 * @since      1.0.0
 *
 * @package    Ace_Social_Chat
 * @subpackage Ace_Social_Chat/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ace_Social_Chat
 * @subpackage Ace_Social_Chat/public
 * @author     AceWebx Team <developer@acewebx.com>
 */
class Ace_Social_Chat_Public
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
	public function aceEnqueueStyles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ace_Social_Chat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ace_Social_Chat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/ace-social-chat-public.css', array(), $this->version, 'all');
		wp_enqueue_style($this->plugin_name, 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), $this->version, 'all');
		wp_enqueue_style($this->plugin_name . 'googleaips', plugin_dir_url(__FILE__) . 'css/ace-social-chat-google-fonts.css', array(), $this->version, 'all');
		wp_enqueue_style($this->plugin_name . 'fontawesomes-cdn-cdn', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function aceEnqueueScripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ace_Social_Chat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ace_Social_Chat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/ace-social-chat-public.js', array('jquery'), $this->version, false);
	}

	public function aceWhatsAppChatWidget()
	{
		global $product;
		$get_setting_value = get_option('ace-whatsapp-setting-field-M');
		if (isset($get_setting_value)) {
			if (!empty($get_setting_value['ace_whatsapp_hiden_btn']) == 0) :
				if (!empty($get_setting_value['ace_wp_display_home']) != 1) :
					if (!empty($get_setting_value['ace_wp_woocom_button']) == 1 && function_exists('is_product')) :
						if (is_product()) :
							$content = $product->get_title();
							$text = $content . " - " . get_permalink($product->get_id());
							include (__DIR__) . '/partials/ace-social-chat-public-display.php';
						else :
							$text = $get_setting_value['whatsapp_start_chat'];
							$content = $get_setting_value['whatsapp_content'];
							include (__DIR__) . '/partials/ace-social-chat-public-display.php';
						endif;
					else :
						$text = $get_setting_value['whatsapp_start_chat'];
						$content = $get_setting_value['whatsapp_content'];
						include (__DIR__) . '/partials/ace-social-chat-public-display.php';
					endif;
				else :
					if (is_front_page()) :
						include (__DIR__) . '/partials/ace-social-chat-public-display.php';
					endif;
				endif;
			endif;
		}
	}

	public function acePublicPageLoad()
	{
		add_shortcode('ace_wtsp_agent', [$this, 'aceShortSinglePage']);
	}

	public function aceShortSinglePage($argu)
	{	
		ob_start();
		include (__DIR__ . '/partials/ace-social-chat-public-widget.php');
		$widget_content = ob_get_clean();
		return $widget_content;
	}
}
