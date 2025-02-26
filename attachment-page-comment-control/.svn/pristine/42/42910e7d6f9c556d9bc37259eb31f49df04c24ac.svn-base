<?php
if (!class_exists('AttachmentPageCommentControl')) :
class AttachmentPageCommentControl {

	var $text_domain_loaded = false;
	var $text_domain = 'attachment-page-comment-control';

	/**
	 * PHP4-style constructor
	 */
	function AttachmentPageCommentControl() {
		if ( function_exists('add_filter') ) {
			add_filter('attachment_fields_to_edit', array(&$this, 'attachment_fields_to_edit'), 10, 2);
			add_filter('attachment_fields_to_save', array(&$this, 'attachment_fields_to_save'), 10, 2);
			add_filter('plugin_row_meta', array(&$this, 'plugin_row_meta'), 10, 2);
		}
	}

	/**
	 * Load the WP textdomain for this plugin (for translations)
	 */
	function load_textdomain() {
		if ($this->text_domain_loaded) return;

		load_plugin_textdomain($this->text_domain, PLUGINDIR.'/'.plugin_basename(dirname(__FILE__)).'/languages', plugin_basename(dirname(__FILE__)).'/languages');
		$this->text_domain_loaded = true;
	}

	/**
	 * Plugin Hook (plugin_row_meta)
	 * This hook requires WP 2.8
	 *
	 * @param array $links
	 * @param string $file
	 * @return array Updated $links
	 */
	function plugin_row_meta($links, $file) {
		if ($file == plugin_basename(dirname(__FILE__).'/plugin.php')) {
			$this->load_textdomain();
			$links[] = '<a href="http://wordpress.org/extend/plugins/attachment-page-comment-control/">' . __('Visit WP.org plugin site', $this->text_domain) . '</a>';
		}
		return $links;
	}

	/**
	 * WP hook (attachment_fields_to_edit)
	 * 
	 * @param array $form_fields
	 * @param object $post
	 * @return array Updated $form_fields variable
	 */
	function attachment_fields_to_edit($form_fields, $post) {
		$this->load_textdomain();

		$name = "attachments[{$post->ID}][comment_status]";
		ob_start(); checked($post->comment_status, 'open'); $checked = ob_get_clean(); // in more recent versions of WP, we can just pass FALSE as a 3rd parameter to "checked"
		$form_fields['comment_status'] = array(
			'label' => __('Allow Comments', $this->text_domain),
			'value' => $post->comment_status,
			'helps' => __('Applies to the attachment page associated with this media.', $this->text_domain),
			'input' => 'html',
			'html' => '<input type="checkbox" value="open" ' . $checked . ' id="' . $name . '" name="' . $name . '" />'
		);
		$name = "attachments[{$post->ID}][ping_status]";
		ob_start(); checked($post->ping_status, 'open'); $checked = ob_get_clean(); // in more recent versions of WP, we can just pass FALSE as a 3rd parameter to "checked"
		$form_fields['ping_status'] = array(
			'label' => __('Allow Pings', $this->text_domain),
			'value' => $post->ping_status,
			'helps' => __('Applies to the attachment page associated with this media.', $this->text_domain),
			'input' => 'html',
			'html' => '<input type="checkbox" value="open" ' . $checked . ' id="' . $name . '" name="' . $name . '" />'
		);

		return $form_fields;
	}

	/**
	 * WP hook (attachment_fields_to_save)
	 * 
	 * @param array $post
	 * @param array $attachment
	 * @return array Updated $post variable
	 */
	function attachment_fields_to_save($post, $attachment) {
		if ($attachment['comment_status'] == 'open') {
			$post['comment_status'] = 'open';
		}
		else {
			$post['comment_status'] = 'closed';
		}
		
		if ($attachment['ping_status'] == 'open') {
			$post['ping_status'] = 'open';
		}
		else {
			$post['ping_status'] = 'closed';
		}

		return $post;
	}
}
endif;