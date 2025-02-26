<?php

namespace AIContentWriter;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * The main plugin class.
 *
 * @since 1.0.0
 * @package AI Content Writer
 */
class Plugin {

	/**
	 * Plugin file path.
	 *
	 * @var string
	 */
	protected $file;

	/**
	 * Plugin version.
	 *
	 * @var string
	 */
	protected $version = '1.0.0';

	/**
	 * The single instance of the class.
	 *
	 * @since 1.0.0
	 * @var self
	 */
	public static $instance;

	/**
	 * Gets the single instance of the class.
	 * This method is used to create a new instance of the class.
	 *
	 * @param string $file The plugin file path.
	 * @param string $version The plugin version.
	 *
	 * @since 1.0.0
	 * @return static
	 */
	final public static function create( $file, $version = '1.0.0' ) {
		if ( null === self::$instance ) {
			self::$instance = new static( $file, $version );
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 *
	 * @param string $file The plugin file path.
	 * @param string $version The plugin version.
	 *
	 * @since 1.0.0
	 */
	public function __construct( $file, $version ) {
		$this->file    = $file;
		$this->version = $version;
		$this->define_constants();
		$this->includes();
		$this->init_hooks();
	}

	/**
	 * Define the plugin constants.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function define_constants() {
		define( 'AICW_VERSION', $this->version );
		define( 'AICW_FILE', $this->file );
		define( 'AICW_PATH', plugin_dir_path( $this->file ) );
		define( 'AICW_URL', plugin_dir_url( $this->file ) );
		define( 'AICW_ASSETS_URL', AICW_URL . 'assets/' );
	}

	/**
	 * Include the required files.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function includes() {
		require_once __DIR__ . '/functions.php';
		// Require the deprecated functions file.
		require_once __DIR__ . '/deprecated.php';
	}

	/**
	 * Initialize the plugin hooks.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function init_hooks() {
		register_activation_hook( AICW_FILE, array( $this, 'activate' ) );
		add_filter( 'plugin_action_links_' . plugin_basename( AICW_FILE ), array( $this, 'action_links' ) );
		add_action( 'admin_notices', array( $this, 'display_flash_notices' ), 12 );
		add_action( 'init', array( $this, 'init' ), 0 );
	}

	/**
	 * Add action links to the plugin.
	 *
	 * @param array $links The plugin action links.
	 *
	 * @since 1.0.0
	 * @return array The modified plugin action links.
	 */
	public function action_links( $links ) {
		$action_links = array(
			'settings' => sprintf(
				/* translators: %1$s: Settings URL, %2$s: Settings text */
				'<a href="%1$s">%2$s</a>',
				esc_url( admin_url( 'admin.php?page=aicw-settings' ) ),
				esc_html__( 'Settings', 'ai-content-writer' )
			),
		);

		return array_merge( $action_links, $links );
	}

	/**
	 * Activate the plugin.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function activate() {
		update_option( 'aicw_version', AICW_VERSION );
	}

	/**
	 * Add a flash notice.
	 *
	 * @param string  $notice Notice message.
	 * @param string  $type This can be "info", "warning", "error" or "success", "success" as default.
	 * @param boolean $dismissible Whether the notice is-dismissible or not.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function flash_notice( $notice = '', $type = 'success', $dismissible = true ) {
		$notices          = get_option( 'aicw_flash_notices', array() );
		$dismissible_text = ( $dismissible ) ? 'is-dismissible' : '';

		// Add new notice.
		array_push(
			$notices,
			array(
				'notice'      => $notice,
				'type'        => $type,
				'dismissible' => $dismissible_text,
			)
		);

		// Update the notices array.
		update_option( 'aicw_flash_notices', $notices );
	}

	/**
	 * Display flash notices after that, remove the option to prevent notices being displayed forever.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function display_flash_notices() {
		$notices = get_option( 'aicw_flash_notices', array() );

		foreach ( $notices as $notice ) {
			printf(
				'<div class="notice notice-%1$s %2$s"><p>%3$s</p></div>',
				esc_attr( $notice['type'] ),
				esc_attr( $notice['dismissible'] ),
				esc_html( $notice['notice'] ),
			);
		}

		// Reset options to prevent notices being displayed forever.
		if ( ! empty( $notices ) ) {
			delete_option( 'aicw_flash_notices', array() );
		}
	}

	/**
	 * Initialize the plugin.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function init() {
		// Load admin classes.
		if ( is_admin() ) {
			new Admin\Admin();
			new Admin\Actions();
		}
	}

	/**
	 * Generate content with the help of Open AI API.
	 * This method is used to generate content based on the user input configurations and settings.
	 *
	 * @param array $prompt_data The prompt data to generate content.
	 *
	 * @since 1.0.0
	 * @return string|\WP_Error The generated content.
	 */
	public function generate_content( $prompt_data ) {
		// Retrieve API key from settings.
		$api_key = get_option( 'aicw_gemini_api_key' );
		if ( empty( $api_key ) ) {
			return new \WP_Error( 'aicw_api_key_not_set', esc_html__( 'Please configure the API settings. A valid Gemini API key is required to generate the content.', 'ai-content-writer' ) );
		}

		// Define the API URL.
		// https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent.
		$url = 'https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent';

		// The data payload to send to the Gemini API.
		$data = array(
			'contents' => array(
				array(
					'role'  => 'user',
					'parts' => array(
						$prompt_data,
					),
				),
			),
		);

		// Set up the arguments for the request.
		$args = array(
			'body'        => wp_json_encode( $data ),
			'headers'     => array(
				'Content-Type'   => 'application/json',
				'x-goog-api-key' => $api_key,
			),
			'method'      => 'POST',
			'data_format' => 'body',
			'timeout'     => 300,
		);

		// Make the request.
		$response = wp_remote_post( $url, $args );

		// Check if the request returned an error.
		if ( is_wp_error( $response ) ) {
			// Handle the error appropriately.
			$error_msg = $response->get_error_message();
			return new \WP_Error( 'api_error', $error_msg );
		}

		// Get the response body.
		$body = wp_remote_retrieve_body( $response );

		// Decode the JSON response.
		$result = json_decode( $body, true );

		// Handle the response data.
		if ( isset( $result['candidates'][0]['content']['parts'][0]['text'] ) ) {
			$generated_text = $result['candidates'][0]['content']['parts'][0]['text'];
			return $generated_text;
		} else {
			// Handle the case where the response does not contain the expected data.
			return new \WP_Error( 'unexpected_api_response', esc_html__( 'An unexpected error occurred while generating the content.', 'ai-content-writer' ) );
		}
	}

	/**
	 * Generate content with the help of ChatGPT Open AI API.
	 * This method is used to generate content based on the user input configurations and settings.
	 *
	 * @param array $prompt_data The prompt data to generate openAI content.
	 *
	 * @since 1.0.0
	 * @return string|\WP_Error The generated content.
	 */
	public function generate_openai_content( $prompt_data ) {
		$api_secret_key = isset( $prompt_data['secret_key'] ) ? $prompt_data['secret_key'] : '';

		// Bail if the API Secret key is not set.
		if ( empty( $api_secret_key ) ) {
			return new \WP_Error( 'aicw_api_secret_key_not_set', esc_html__( 'Please configure the API settings. A valid ChatGPT OpenAI API key is required to generate the content.', 'ai-content-writer' ) );
		}

		$prompt = isset( $prompt_data['prompt'] ) ? $prompt_data['prompt'] : '';

		if ( empty( $prompt ) ) {
			return new \WP_Error( 'aicw_prompt_not_set', esc_html__( 'Please provide a prompt to generate the content.', 'ai-content-writer' ) );
		}

		$system_tone      = isset( $prompt_data['system_tone'] ) ? $prompt_data['system_tone'] : esc_html__( 'You are an expert SEO content writer. Generate factually accurate, engaging, and well-structured articles optimized for readability and search engines.', 'ai-content-writer' );
		$max_tokens       = isset( $prompt_data['max_tokens'] ) ? $prompt_data['max_tokens'] : 1000;
		$temperature      = isset( $prompt_data['temperature'] ) ? $prompt_data['temperature'] : 0.7;
		$chatgpt_ai_model = get_option( 'aicw_chatgpt_ai_model', 'gpt-3.5-turbo' );

		// Define the API URL.
		$api_url = 'https://api.openai.com/v1/chat/completions';

		// The data payload to send to the OpenAI API.
		$data = array(
			'model'             => $chatgpt_ai_model,
			'messages'          => array(
				array(
					'role'    => 'system',
					'content' => $system_tone,
				),
				array(
					'role'    => 'user',
					'content' => $prompt,
				),
			),
			'max_tokens'        => $max_tokens,
			'temperature'       => $temperature,
			'top_p'             => 1,
			'frequency_penalty' => 0,
			'presence_penalty'  => 0,
		);

		// Set up the arguments for the request.
		$args = array(
			'headers' => array(
				'Content-Type'  => 'application/json',
				'Authorization' => 'Bearer ' . $api_secret_key,
			),
			'body'    => wp_json_encode( $data ),
			'timeout' => 300,
		);

		// Make the request.
		$response = wp_remote_post( $api_url, $args );

		// Check if the request returned an error.
		if ( is_wp_error( $response ) ) {
			$error_msg = $response->get_error_message();
			return new \WP_Error( 'api_error', $error_msg );
		}

		// Get the response body.
		$body = wp_remote_retrieve_body( $response );

		// Decode the JSON response.
		$result = json_decode( $body, true );

		// Check if the response contains the expected data.
		if ( ! isset( $result['choices'][0]['message']['content'] ) ) {
			return new \WP_Error( 'unexpected_api_response', esc_html__( 'An unexpected error occurred while generating the content.', 'ai-content-writer' ) );
		}

		// Return the generated content.
		return $result['choices'][0]['message']['content'];
	}

	/**
	 * Generate image with the help of Pexels API.
	 *
	 * @param string $query The query to search images.
	 *
	 * @since 1.0.0
	 * @return array|\WP_Error The images array.
	 */
	public function generate_images( $query ) {
		// Retrieve the Pexels API key.
		$api_key = get_option( 'aicw_pexels_api_key' );

		if ( empty( $api_key ) ) {
			return new \WP_Error( 'aicw_api_key_not_set', esc_html__( 'Please configure the API settings. A valid Pexels API key is required to generate the images.', 'ai-content-writer' ) );
		}

		// Define the API URL.
		$url = 'https://api.pexels.com/v1/search?query=' . rawurlencode( $query ) . '&per_page=20';

		// Set up the arguments for the request.
		$args = array(
			'headers' => array(
				'Authorization' => $api_key,
			),
		);

		// Make the request.
		$response = wp_remote_get( $url, $args );

		// Check if the request returned an error.
		if ( is_wp_error( $response ) ) {
			// Handle the error appropriately.
			return new \WP_Error( 'api_error', $response->get_error_message() );
		}

		// Get the response body.
		$body = wp_remote_retrieve_body( $response );

		// Decode the JSON response.
		$data = json_decode( $body, true );

		// Handle the response data.
		if ( isset( $data['photos'] ) && ! empty( $data['photos'] ) ) {
			return $data['photos'];
		} else {
			// Handle the case where the response does not contain the expected data.
			return new \WP_Error( 'unexpected_api_response', esc_html__( 'An unexpected error occurred while generating the images.', 'ai-content-writer' ) );
		}
	}
}
