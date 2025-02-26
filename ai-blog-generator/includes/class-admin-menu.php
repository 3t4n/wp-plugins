<?php
defined('ABSPATH') || exit;

/*
* AI_BLOG_admin_Menu class.
*/
class AI_BLOG_admin_Menu
{
	// Constructor method to initialize actions and filters
	public function __construct(){
		// Adding an action hook to add the custom admin menu in WordPress admin dashboard
		add_action('admin_menu', array($this, 'AI_BLOG_admin_menu'));

		// Adding an action hook to register plugin settings during admin initialization
		add_action('admin_init', array($this, 'AI_BLOG_register_settings')); // Register settings

		// Registering a custom AJAX action for generating blog posts
		add_action('wp_ajax_generate_blog_post', array($this, 'generate_blog_post_callback'));

		// Adding an action hook to handle publishing of blog posts on admin initialization
		add_action('admin_init', array($this, 'AI_BLOG_Publish_blog_post'));

		// Hook to add settings link to the plugin action links
		add_filter('plugin_action_links_'. AI_BLOG_PLUGIN_BASE_NAME, array($this, 'AI_BLOG_plugin_action_links'), 10, 2);
	}

	// Method to create and configure the admin menu
	public function AI_BLOG_admin_menu(){
		// Adds a top-level menu item in the admin dashboard under "AI Blogs"
		// The 'ai-blogs' is the slug used in the URL to access this menu
		add_menu_page(
			__('AI Blogs', 'ai-blog-generator'),				// Page title
			__('AI Blogs', 'ai-blog-generator'),				// Menu title
			'read',					// Required capability to access this menu
			'ai-blogs',				// Slug for the menu item
			array($this, 'ai_blogs_page'), // Callback function to display the menu page
			'dashicons-admin-post',	// Dashicon icon for the menu item
			6						// Position in the menu (lower numbers are higher in the menu)
		);

		// Adds a submenu page for settings under the "AI Blogs" main menu
		add_submenu_page(
			'ai-blogs',								// Parent menu slug
			__('AI Blog Settings', 'ai-blog-generator'),						// Page title
			__('AI Blog Settings', 'ai-blog-generator'),						// Menu title
			'manage_options',						// Required capability for the menu item
			'ai-blog-settings',						// Slug for the submenu item
			array($this, 'ecc_merchant_requests')	// Callback function to display the settings page
		);

		// Adds another submenu page for creating a new AI Blog Post under the "Posts" section
		add_submenu_page(
			'edit.php',						// Parent menu slug (this time it's the Posts section)
			__('Add New AI Post', 'ai-blog-generator'),				// Page title
			__('Add New AI Post', 'ai-blog-generator'),				// Menu title
			'manage_options',				// Required capability for the menu item
			'ai-blogs',						// Slug for the submenu item
			array($this, 'ai_blogs_page')	// Callback function to display the create post page
		);
	}

	public function ai_blogs_page(){
		require_once AI_BLOG_PLUGIN_PATH . 'admin/ai-blogs.php';
	}

	public function ecc_merchant_requests(){
		require_once AI_BLOG_PLUGIN_PATH . 'admin/ai-blog-settings.php';
	}

	public function AI_BLOG_register_settings(){
		// Register a setting group
		register_setting('ai_blog_settings_group', 'ai_blog_options', array(
			'type' => 'array',
			'description' => __('Settings for AI Blog', 'ai-blog-generator'),
			'sanitize_callback' => array($this, 'sanitize_settings'),
			'default' => array(
				'ai_blog_api_url' => '',
				'ai_blog_api_access_token' => '',
			),
		));

		add_settings_section(
			'ai_blog_settings_section',
			__('AI Blog Settings', 'ai-blog-generator'),
			null,
			'ai-blog-settings'
		);

		add_settings_field(
			'ai_blog_api_access_token',
			__('API Access Token:', 'ai-blog-generator'),
			array($this, 'render_api_access_token_field'),
			'ai-blog-settings',
			'ai_blog_settings_section'
		);

		add_settings_field(
			'ai_plugin_license_key',
			__('Licence Key:', 'ai-blog-generator'),
			array($this, 'render_licence_key_field'),
			'ai-blog-settings',
			'ai_blog_settings_section'
		);
	}

	public function render_api_access_token_field(){
		$options = get_option('ai_blog_options');
		$value = isset($options['ai_blog_api_access_token']) ? esc_attr($options['ai_blog_api_access_token']) : '';
		echo '<input type="text" name="ai_blog_options[ai_blog_api_access_token]" value="' . esc_attr($value)  . '" class="regular-text" />
				<a href="https://kudosta.com/blog/how-to-get-the-api-key-for-chatgpt-openai" target="_blank" class="button">'. esc_html__( "Get API Key", "ai-blog-generator" ). '</a>';
	}

	public function render_licence_key_field(){
		$options = get_option('ai_blog_options');
		$value = isset($options['ai_plugin_license_key']) ? esc_attr($options['ai_plugin_license_key']) : '';
		echo '<span class="pro-feature">Pro Feature</span>
				<div class="pro-feature-options">
					<input type="text" name="ai_blog_options[ai_plugin_license_key]" value="' . esc_attr($value)  . '" class="regular-text" />
					<a href="https://kudosta.com/" target="_blank" class="button">'. esc_html__( "Get Licence Key", "ai-blog-generator" ). '</a>
				</div>';
	}

	public function sanitize_settings($input){
		$output = array();
		if (isset($input['ai_blog_api_access_token'])) {
			$output['ai_blog_api_access_token'] = sanitize_text_field($input['ai_blog_api_access_token']);
		}
		if (isset($input['ai_plugin_license_key'])) {
			$output['ai_plugin_license_key'] = sanitize_text_field($input['ai_plugin_license_key']);
		}
		return $output;
	}

	public function generate_blog_post_callback() {
		if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'generate_blog_action')) {
			wp_send_json_error(array(
				'status' => 'error',
				'message' => __('Security check failed. Please try again.', 'ai-blog-generator'),
				'type' => 'security_error'
			));
		}

		$post_words_limit = isset($_REQUEST['post_words_limit']) ? sanitize_text_field(wp_unslash($_REQUEST['post_words_limit'])) : '';
		if ($post_words_limit !== '') {
			$post_args['words_limit'] = $post_words_limit;
		}

		// Get and sanitize 'post_title'
		$post_title = isset($_REQUEST['post_title']) ? sanitize_text_field(wp_unslash($_REQUEST['post_title'])) : '';
		if ($post_title !== '') {
			$post_args['post_title'] = $post_title;
			// Call the API with the sanitized and validated arguments
			$response = self::call_openai_api_to_generate_blog($post_args); // Custom function to call the API
		}

		if ($response && isset($response['success']) && $response['success']) {
			wp_send_json_success(array(
				'status' => 'success',
				'message' => __('Blog post generated successfully! Your content is now ready.', 'ai-blog-generator'),
				'type' => 'success',
				'post_title' => $response['post_title'],
				'post_content' => $response['post_content'],
			));
		} else {
			wp_send_json_error(array(
				'status' => 'error',
				'message' => sprintf(
					// Translators: %s is the error message returned from the API
					__('Failed to generate blog post. Please try again later. %s', 'ai-blog-generator'),
					esc_html(isset($response['message']) ? $response['message'] : __('Unknown error occurred.', 'ai-blog-generator'))
				),
				'type' => 'api_error',
				'details' => isset($response['message']) ? $response['message'] : __('Unknown error occurred.', 'ai-blog-generator')
			));
		}
	}

	public function call_openai_api_to_generate_blog($post_args='') {
		$options = get_option('ai_blog_options');
		$license_key = $options['ai_plugin_license_key'] ?? '';
		$chatgpt_access_token = $options['ai_blog_api_access_token'] ?? '';
		$words_limit = $post_args['words_limit'] ?? 500;
    	$post_title = $post_args['post_title'] ?? '';
		$endpoint = 'https://products.kudosta.com/wp-json/api/licence/plugin-license-key-status';

		if (!$chatgpt_access_token) {
			return array('success' => false, 'message' => 'Missing API credentials.');
		}

		$payload = array(
			'aibgAction' => 'aibgChatOpenAI',
			'license_key' => $license_key,
			'post_args' => array(
				'words_limit' => (int) $words_limit,
				'post_title' => $post_title,
				'chatgpt_access_token' => $chatgpt_access_token,
			),
		);

		$request_args = array(
			'method'  => 'POST',
			'timeout' => 45,
			'headers' => array(
				'Content-Type' => 'application/json',
			),
			'body' => wp_json_encode($payload),
		);

		$response = wp_remote_post($endpoint, $request_args);
		if (is_wp_error($response)) {
			return array('success' => false, 'message' => $response->get_error_message());
		}

		$response = json_decode(wp_remote_retrieve_body($response), true);

		return $response;
	}

	public function AI_BLOG_Publish_blog_post() {

	if (isset($_REQUEST['publish_blog_post'], $_REQUEST['publish_blog_nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['publish_blog_nonce'])), 'publish_blog_action')) {
			$post_title = isset($_REQUEST['ai_blog_post_title']) ? sanitize_text_field(wp_unslash($_REQUEST['ai_blog_post_title'])) : '';
			$post_content = isset($_REQUEST['ai_blog_post_content']) ? wp_kses_post(wp_unslash($_REQUEST['ai_blog_post_content'])) : '';
			$post_categories = isset($_REQUEST['ai_blog_post_categories']) ? sanitize_text_field(wp_unslash($_REQUEST['ai_blog_post_categories'])) : '';

			if (!empty($post_title) && !empty($post_content)) {
				$post_data = array(
					'post_status'  => 'publish',
					'post_type'    => 'post',
					'post_title'   => $post_title,
					'post_content' => $post_content,
					'post_category' => array($post_categories),
				);

				$post_id = wp_insert_post($post_data);

				if ($post_id) {
					echo '<div class="notice notice-success"><p>' . esc_html__('Post created successfully!', 'ai-blog-generator') . '</p></div>';
				} else {
					echo '<div class="notice notice-error"><p>' . esc_html__('Failed to create post.', 'ai-blog-generator') . '</p></div>';
				}
			}
		}
	}

	public function AI_BLOG_plugin_action_links($links, $plugin_file) {
		// Check if the current plugin is our plugin
		if ($plugin_file == AI_BLOG_PLUGIN_BASE_NAME) {
			$settings_link = '<a href="' . admin_url('admin.php?page=ai-blog-settings') . '">'.__('Settings', 'ai-blog-generator').'</a>';
			array_unshift($links, $settings_link);
		}
		return $links;
	}
}

// Instantiate the class
$AI_BLOG_admin_menu = new AI_BLOG_admin_Menu();
?>