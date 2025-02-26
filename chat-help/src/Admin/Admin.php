<?php

/**
 * The admin-facing functionality of the plugin.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package chat-help
 * @subpackage chat-help/src/Admin
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\ChatWhatsapp\Admin;

use ThemeAtelier\ChatWhatsapp\Admin\Views\Options;
use ThemeAtelier\ChatWhatsapp\Admin\TADiscountPage\TADiscountPage;
use ThemeAtelier\ChatWhatsapp\Admin\DBUpdates;

/**
 * The admin class
 */
class Admin
{

	/**
	 * The slug of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_slug   The slug of this plugin.
	 */
	private $plugin_slug;

	/**
	 * The min of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $min   The slug of this plugin.
	 */
	private $min;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The class constructor.
	 *
	 * @param string $plugin_slug The slug of the plugin.
	 * @param string $version Current version of the plugin.
	 */
	function __construct($plugin_slug, $version)
	{
		$this->plugin_slug = $plugin_slug;
		$this->version     = $version;
		$this->min         = defined('WP_DEBUG') && WP_DEBUG ? '' : '.min';
		Options::options('cwp_option');
		add_action('admin_menu', array($this, 'add_plugin_page'));
		new TADiscountPage();
		new DBUpdates();
	}



	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public static function enqueue_scripts($hook)
	{
		if ('whatsapp-chat_page_chat-help-help' == $hook) {

            wp_enqueue_style('chat-whatsapp-help');
        }
		wp_enqueue_style('admin');
	}

	public function add_plugin_page()
	{
		// This page will be under "Settings"
		add_menu_page(
			esc_html__('WhatsApp Chat', 'chat-help'),
			esc_html__('WhatsApp Chat', 'chat-help'),
			'manage_options',
			'chat-help',
			array($this, 'chat_help_settings'),
			'dashicons-whatsapp',
			9
		);

		do_action('chat_help_before_upgrade_pro_menu');
		add_submenu_page('chat-help', __('👑 Upgrade to Pro!', 'chat-help'), sprintf('<span class="chat-help-get-pro-text">%s</span>', __('👑 Upgrade to Pro!', 'chat-help')), 'manage_options', 'https://themeatelier.net/downloads/whatsapp-chat-help/');
		do_action('chat_help_after_upgrade_pro_menu');
	}

	/**
	 * Options page callback
	 */
	public function chat_help_settings() {}

	public function chat_help_get_help_callback()
	{
?>
		<div class="wrap">
			<div class="chat-whatsapp-help-wrapper">
				<div class="chat_whatsapp__help--header">
					<h3><?php echo esc_html__('Chat Help', 'chat-help') ?> <span><?php echo esc_html(CHAT_WHATSAPP_VERSION) ?></span></h3>
					<?php echo wp_kses_post('Thank you for installing <strong>Chat Help</strong> plugin! This video will help you get started with the plugin.', 'chat-help') ?>
				</div>

				<div class="chat_whatsapp__help--video">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/OrnL0DSvjeE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				</div>

				<div class="chat_whatsapp__help--footer">
					<a class="button button-primary" href="<?php echo esc_url(get_admin_url()) . '/admin.php?page=chat-help'; ?>"><?php echo esc_html__('Go to settings page', 'chat-help') ?></a>
					<a target="_blank" class="button button-secondary" href="https://themeatelier.net/downloads/whatsapp-chat-help/"><?php echo esc_html__('Upgrade to pro', 'chat-help') ?></a>
				</div>

			</div>
		</div>
<?php }

}
