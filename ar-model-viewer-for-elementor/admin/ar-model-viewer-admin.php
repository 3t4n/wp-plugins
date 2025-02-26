<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Main AR Model Viewer Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class AR_Model_Viewer_Admin
{

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct()
	{

		$this->init();
	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init()
	{

		add_action('add_meta_boxes', [$this, 'add_custom_meta_box']);
		add_action('save_post', [$this, 'ar_model_viewer_meta_box_save']);

		wp_register_script('ar-model-viewer', plugins_url('../js/ar-model-viewer-admin.js', __FILE__),  array('jquery'), WP_DEBUG ? time() : AR_Model_Viewer::VERSION);
		wp_enqueue_script('ar-model-viewer');

		add_filter('plugin_action_links_ar-model-viewer-for-elementor/ar-model-viewer.php', array($this, 'add_plugin_action_link'));
	}

	public function add_plugin_action_link($links)
	{
		$url = 'https://bitbute.tech/ar-model-viewer';
		// Create the link.
		$settings_link = "<a href='$url' target='_blank' style='color: #93003c; text-shadow: 1px 1px 1px #eee; font-weight: 700;'>" . __('Buy Pro', 'ar-model-viewer') . '</a>'; // Adds the link to the end of the array.
		array_push(
			$links,
			$settings_link
		);
		return $links;
	}


	function add_custom_meta_box()
	{
		$screens = ['product'];
		foreach ($screens as $screen) {
			add_meta_box(
				'ar_model_viewer_box_id',                 // Unique ID
				'AR Model Viewer',      // Box title
				[$this, 'ar_model_viewer_content'],  // Content callback, must be of type callable
				$screen,                            // Post type
				"side",
				"low"
			);
		}
	}

	function ar_model_viewer_meta_box_save($post_id)
	{
		// Bail if we're doing an auto save
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

		// if our nonce isn't there, or we can't verify it, bail
		if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'ar_model_viewer_file_meta_box_nonce')) return;

		// if our current user can't edit this post, bail
		// RETURNS False for some reason
		// if (!current_user_can('edit_post')) return;

		if (isset($_POST['ar_model_viewer_file'])) {
			if (empty($_POST['ar_model_viewer_file'])) {
				delete_post_meta($post_id, 'ar_model_viewer_file_id');
				$count = $this->get_uploaded_count();
				if ($count > 0) {
					$this->update_products([]);
				}
			} else {
			$post_ids = get_option('ar_model_viewer_upload_products', []);
			if (empty($post_ids) || in_array($post_id, $post_ids) != false) {
					update_post_meta($post_id, 'ar_model_viewer_file_id', $_POST['ar_model_viewer_file']);
					$this->update_products([$post_id]);
				} else {
					wp_die('You have reached the maximum number of 3D model uploads. Please upgrade to the pro version to upload more models.');
				}
			}
		}
	}


	public function ar_model_viewer_content($post)
	{
		$attachment_id = get_post_meta($post->ID, 'ar_model_viewer_file_id', true);
		if (!empty($attachment_id) || $this->allow_upload()) {
			$att_src = wp_get_attachment_url($attachment_id);
			wp_nonce_field('ar_model_viewer_file_meta_box_nonce', 'meta_box_nonce');
			echo '<div id="ar-model-viewer-post-metabox" data-src= "' . $att_src . '" data-id= "' . $attachment_id . '">';
			echo "</div>";
			echo '<input type="hidden" name="ar_model_viewer_file" id="ar-product-3d-model" value="' . $attachment_id . '" />';
		} else {
			echo __('Max 3D Model upload limit reached', 'ar-model-viewer'). '.<br />';
			echo __('Please buy Pro version to upload more models', 'ar-model-viewer') . '.';
		}

		$buy_pro_text = __('Buy Pro', 'ar-model-viewer');
		$buy_pro = '<div class="ar-feedback-section" style="margin-top:10px"> <a href="https://bitbute.tech/ar-model-viewer/" target="_blank">'. $buy_pro_text . '</a> </div>';
		echo $buy_pro;
	}

	public function allow_upload()
	{
		return $this->get_uploaded_count() < 1;
	}

	public function get_uploaded_count()
	{
		return sizeof(get_option('ar_model_viewer_upload_products', []));
	}

	public function update_products($post_ids)
	{
		update_option('ar_model_viewer_upload_products', $post_ids);
	}
}
