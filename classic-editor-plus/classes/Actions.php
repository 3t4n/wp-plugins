<?php
namespace YCE;

class Actions
{
	public function __construct()
	{
		$this->init();
	}

	public function init()
	{
		add_action('admin_post_yceSaveSettings', array($this, 'saveSettings'));
	}

	public function saveSettings()
	{
		if (!isset($_POST[YCE_ADMIN_POST_NONCE]) || !wp_verify_nonce($_POST[YCE_ADMIN_POST_NONCE], 'YCE_ADMIN_POST_NONCE')) {
			_e('Sorry, your nonce did not verify.', YCE_LANG);die();
		}
		update_option('classic-editor-replace', sanitize_text_field($_POST['classic-editor-replace']));
		update_option('classic-editor-allow-users', sanitize_text_field($_POST['classic-editor-allow-users']));

		wp_redirect(admin_url().'admin.php?page='.YCE_MAIN_PAGE_KEY);
	}
}

new Actions();