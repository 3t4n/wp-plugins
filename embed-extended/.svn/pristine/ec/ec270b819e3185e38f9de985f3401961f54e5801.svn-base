<?php

/**
 * Administrator panel main class.
 *
 * @since 1.1.0
 */
class Embed_Extended_Admin {
	/**
	 * Constructor.
	 */
	public function __construct() {
		$plugin_basename = Embed_Extended()->basename;

		add_action('admin_menu', [$this, 'admin_menu']);
		add_action('admin_notices', [$this, 'admin_notices']);
		add_action('admin_enqueue_scripts', [$this, 'enqueue_assets']);
		add_action('wp_ajax_embed_extended_notice_dismiss', [$this, 'ajax_notice_dismiss']);

		add_filter('plugin_action_links_' . $plugin_basename, [$this, 'action_links']);
	}

	/**
	 * Register required admin menus.
	 *
	 * @since 1.1.0
	 */
	public function admin_menu() {
		add_submenu_page(
			'options-general.php',
			__('Embed Extended', 'embed-extended'),
			__('Embed Extended', 'embed-extended'),
			'activate_plugins',
			'embed-extended',
			[$this, 'page_settings']
		);
	}

	/**
	 * Add additional plugin action links.
	 *
	 * @since 1.1.0
	 *
	 * @param array $links
	 * @return $links
	 */
	public function action_links($links) {
		$links[] = sprintf(
			'<a href="%1$s">%2$s</a>',
			admin_url('options-general.php?page=embed-extended'),
			__('Settings', 'embed-extended')
		);

		$links[] = sprintf(
			'<a href="%1$s" target="_blank">%2$s</a>',
			'https://wordpress.org/support/plugin/embed-extended/#new-topic-0',
			__('Support', 'embed-extended')
		);

		return $links;
	}

	/**
	 * Settings page initialization.
	 *
	 * @since 1.1.0
	 */
	public function page_settings() {
		new Embed_Extended_Admin_Settings();
	}

	/**
	 * Admin notices.
	 *
	 * @since 1.2.0
	 */
	public function admin_notices() {
		if ((int) get_option('embed_extended_notice_dismiss_greeting')) {
			return;
		}

		$message = __(
			/* translators: %s: Plugin's support forum page URL. */
			'Thank you for installing the <strong>Embed Extended</strong> plugin! Feel free to submit any questions and requests on the plugin\'s <a href="%s" target="_blank">support forum page</a>.',
			'embed-extended'
		);
		?>
		<div class="notice notice-info is-dismissible" data-embed-extended="notice-greeting">
			<p><?php printf($message, 'https://wordpress.org/support/plugin/embed-extended/'); ?></p>
		</div>
		<script type="text/javascript">
			jQuery(function($) {
				var $notice = $('.notice[data-embed-extended=notice-greeting]');
				$notice.on('click', '.notice-dismiss', function() {
					var data = { action: 'embed_extended_notice_dismiss', id: 'greeting' };
					$.post(ajaxurl, data);
				});
			});
		</script>
		<?php
	}

	/**
	 * Load required scripts and stylesheets for admin panel.
	 *
	 * @since 1.2.2
	 */
	public function enqueue_assets() {
		wp_enqueue_script(
			'embed-extended-admin',
			Embed_Extended()->get_js('admin'),
			['jquery'],
			Embed_Extended::VERSION
		);

		wp_localize_script('embed-extended-admin', 'embed_extended_admin', [
			'text_included' => __('included', 'embed-extended'),
			'text_excluded' => __('excluded', 'embed-extended'),
		]);
	}

	/**
	 * Dismiss admin notices.
	 *
	 * @since 1.2.0
	 */
	public function ajax_notice_dismiss() {
		$id = isset($_POST['id']) ? sanitize_key($_POST['id']) : '';

		if ($id) {
			update_option('embed_extended_notice_dismiss_' . $id, 1);
		}

		wp_die();
	}
}
