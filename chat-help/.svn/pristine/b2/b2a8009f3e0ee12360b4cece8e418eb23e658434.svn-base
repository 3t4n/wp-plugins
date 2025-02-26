<?php if (! defined('ABSPATH')) {
	die;
} // Cannot access directly.
if (! class_exists('Chat_Whatsapp_Field_ta_help')) {
	/**
	 *
	 * Field: help
	 *
	 * @since 1.0.0
	 * @version 1.0.0
	 */
	class Chat_Whatsapp_Field_ta_help extends Chat_Whatsapp_Fields
	{

		/**
		 * Help field constructor.
		 *
		 * @param array  $field The field type.
		 * @param string $value The values of the field.
		 * @param string $unique The unique ID for the field.
		 * @param string $where To where show the output CSS.
		 * @param string $parent The parent args.
		 */
		public function __construct($field, $value = '', $unique = '', $where = '', $parent = '')
		{

			parent::__construct($field, $value, $unique, $where, $parent);
		}

		/**
		 * Render
		 *
		 * @return void
		 */
		public function render()
		{
			echo wp_kses_post($this->field_before());
?>
			<div class="wrap about-wrap chat-help-help">
				<h1><?php esc_html_e('Welcome to Chat Help!', 'chat-help'); ?><span><?php echo esc_html(CHAT_WHATSAPP_VERSION) ?></span></h1>
				<p class="about-text">
					<?php
					esc_html_e('WhatsApp 💬 Chat Help Pro 🔥 Unlimited customer support tool that allows visitors to engage using "WhatsApp" or "WhatsApp Business". WhatsApp button included.', 'chat-help');
					?>
				</p>
				<div class="wp-badge"></div>
					<div class="chat_whatsapp__help--video">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/wdba1v3VFws" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
					</div>

					<div class="chat_whatsapp__help--footer">
						<a class="chat-help-framework-help-button" href="<?php echo esc_url(get_admin_url()) . '/admin.php?page=chat-help'; ?>"><?php echo esc_html__('Go to settings page', 'chat-help') ?></a>
						<a target="_blank" class="chat-help-framework-help-button chat-help-framework-help-button-secondary" href="https://themeatelier.net/downloads/whatsapp-chat-help/"><?php echo esc_html__('Upgrade to pro', 'chat-help') ?></a>
					</div>
				
				<div class="feature-section three-col">
					<div class="col">
						<div class="chat-help-feature chat-help-feature-text-center">
							<h3><i class="icofont-ui-file" aria-hidden="true"></i>
								<?php echo esc_html__('Documentation', 'chat-help') ?>
							</h3>
							<p>
								<?php echo esc_html__('Check out our documentation page and more information about what you can do with Gallery Slider for
								WooCommerce.', 'chat-help') ?>
							</p>
							<a href="https://docs.themeatelier.net/docs/whatsapp-chat-help-pro/overview/"
								target="_blank" class="chat-help-framework-help-button"><?php echo esc_html__('Browse Docs', 'chat-help') ?></a>
						</div>
					</div>

					<div class="col">
						<div class="chat-help-feature chat-help-feature-text-center">
							<h3><i class="icofont-support-faq" aria-hidden="true"></i>
								<?php echo esc_html__('Support', 'chat-help') ?>
							</h3>
							<p>
								<?php echo esc_html__('Need one-to-one assistance? Get in touch with our top-notch support team! We \'d love to help you
								immediately.', 'chat-help') ?>
							</p>
							<a href="https://wordpress.org/support/plugin/chat-help/" target="_blank" class="chat-help-framework-help-button"><?php echo esc_html__('Get Support', 'chat-help') ?></a>
						</div>
					</div>

				</div>

			</div>
<?php
			echo wp_kses_post($this->field_after());
		}
	}
}
