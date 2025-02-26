<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://munishdhiman.vercel.app/
 * @since      1.1.10
 *
 * @package    Auto_Slug_Translate
 * @subpackage Auto_Slug_Translate/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Auto_Slug_Translate
 * @subpackage Auto_Slug_Translate/admin
 * @author     Munish Dhiman <munishd12@gmail.com>
 */
class Auto_Slug_Translate_Admin {

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
	 * @param    string    $plugin_name       The name of this plugin.
	 * @param    string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/auto-slug-translate-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/auto-slug-translate-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function add_plugin_page() {
        add_options_page(
            'Auto Slug Translate Settings',
            'Auto Slug Translate',
            'manage_options',
            'ast_slug-translate',
            array($this, 'create_admin_page')
        );
    }

    public function create_admin_page() {
        $this->options = get_option('ast_option_name');
        ?>
        <div class="wrap">
            <h1>Auto Slug Translate Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('ast_option_group');
                do_settings_sections('ast_slug-translate');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public function page_init() {
        register_setting(
            'ast_option_group',
            'ast_option_name',
            array($this, 'sanitize')
        );

        add_settings_section(
            'ast_setting_section_id',
            '',
            array($this, 'print_section_info'),
            'ast_slug-translate'
        );

        add_settings_field(
            'ast_select_post_type',
            'Post Types',
            array($this, 'select_post_type_callback'),
            'ast_slug-translate',
            'ast_setting_section_id'
        );

        add_settings_field(
            'ast_google_translate_key',
            'Google Translate API Key',
            array($this, 'google_translate_key_callback'),
            'ast_slug-translate',
            'ast_setting_section_id'
        );

        add_settings_field(
            'ast_translate_from',
            'Translate From',
            array($this, 'translate_from_callback'),
            'ast_slug-translate',
            'ast_setting_section_id'
        );

        add_settings_field(
            'ast_translate_to',
            'Translate To',
            array($this, 'translate_to_callback'),
            'ast_slug-translate',
            'ast_setting_section_id'
        );

    }

    public function sanitize($input) {
        $new_input = array();
        if (isset($input['ast_select_post_type']) && is_array($input['ast_select_post_type'])) {
            foreach ($input['ast_select_post_type'] as $post_type => $value) {
                $new_input['ast_select_post_type'][$post_type] = $value ? 1 : 0;
            }
        }

        if (isset($input['ast_google_translate_key'])) {
            $new_input['ast_google_translate_key'] = sanitize_text_field($input['ast_google_translate_key']);
        }

        if (isset($input['ast_translate_from'])) {
            $new_input['ast_translate_from'] = sanitize_text_field($input['ast_translate_from']);
        }

        if (isset($input['ast_translate_to'])) {
            $new_input['ast_translate_to'] = sanitize_text_field($input['ast_translate_to']);
        }

        return $new_input;
    }

    public function print_section_info() {
        print 'WordPress Slug Translate will automatically generate the English slug based on the translation.:';
    }

    public function select_post_type_callback() {
        $post_types = get_post_types(['public' => true], 'objects');

        if ($post_types) {
            foreach ($post_types as $post_type) {
                printf(
                    '<label><input type="checkbox" id="ast_select_post_type_%1$s" name="ast_option_name[ast_select_post_type][%1$s]" value="1" %2$s /> %3$s </label> &nbsp;&nbsp;&nbsp; ',
                    esc_attr($post_type->name),
                    checked(isset($this->options['ast_select_post_type'][$post_type->name]) && $this->options['ast_select_post_type'][$post_type->name], true, false),
                    esc_html($post_type->label)
                );
            }
        }
    }

    public function google_translate_key_callback() {
        printf(
            '<input type="password" id="ast_google_translate_key" name="ast_option_name[ast_google_translate_key]" value="%s" />
            <p>Create a Google Translate API key and enter it in this field. For instructions on how to obtain an API key, please refer to the
            <a href="https://cloud.google.com/translate/docs/getting-started" target="_blank">Google Translate API documentation</a>.</p>',
            isset($this->options['ast_google_translate_key']) ? esc_attr($this->options['ast_google_translate_key']) : ''
        );
    }

		public function translate_from_callback() {
		    $languages = array(
		        'hi' => 'Hindi',
		        'ur' => 'Urdu',
		        'pa' => 'Punjabi',
		        'ne' => 'Nepali',
		        'bn' => 'Bengali',
		        'mr' => 'Marathi',
		        'te' => 'Telugu',
		        'ta' => 'Tamil',
		        'kn' => 'Kannada',
		        'ml' => 'Malayalam',
		        'gu' => 'Gujarati',
		        'or' => 'Odia',
		    );

		    $selected_language = isset($this->options['ast_translate_from']) ? $this->options['ast_translate_from'] : '';

		    echo '<select id="ast_translate_from" name="ast_option_name[ast_translate_from]">';
		    foreach ($languages as $code => $label) {
		        echo '<option value="' . esc_attr($code) . '" ' . selected($selected_language, $code, false) . '>' . esc_html($label) . '</option>';
		    }
		    echo '</select>';
		}


		public function translate_to_callback() {
		    $languages = array(
		        'en' => 'English',
		        // Add more languages as needed
		    );

		    $selected_language = isset($this->options['ast_translate_to']) ? $this->options['ast_translate_to'] : '';

		    echo '<select id="ast_translate_to" name="ast_option_name[ast_translate_to]">';
		    foreach ($languages as $code => $label) {
		        echo '<option value="' . esc_attr($code) . '" ' . selected($selected_language, $code, false) . '>' . esc_html($label) . '</option>';
		    }
		    echo '</select>';
		}


    // Helper function to generate language options
    private function generate_language_options($languages, $selected) {
        $options = '';
        foreach ($languages as $code => $label) {
            $options .= sprintf(
                '<option value="%s" %s>%s</option>',
                $code,
                selected($selected, $code, false),
                $label
            );
        }
        return $options;
    }

    // Function to translate Hindi to English using Google Translate API
    function translate_hindi_to_english($hindi_text) {
        $this->options = get_option('ast_option_name'); // Initialize $this->options
        $api_key = $this->options['ast_google_translate_key'];

        $languagefrom = $this->options['ast_translate_from'];
        $translateto = $this->options['ast_translate_to'];

        // Prepare the translation API endpoint
        $api_endpoint = 'https://translation.googleapis.com/language/translate/v2';
        // Set the target language to English
        $target_language = $translateto;
        // Build the API request URL
        $api_url = "$api_endpoint?key=$api_key&source=$languagefrom&target=$target_language&q=" . urlencode($hindi_text);
        // Make the API request
        $response = wp_remote_get($api_url);

        // Check if the request was successful
        if (!is_wp_error($response) && $response['response']['code'] == 200) {
            $translated_data = json_decode($response['body'], true);
            // Extract and post-process the translated text
            $translated_text = urldecode($translated_data['data']['translations'][0]['translatedText']);
            $translated_text = sanitize_title(strtolower($translated_text));
            return $translated_text;
        } else {
            // Handle API request error
            return $hindi_text; // Fallback to original slug if translation fails
        }
    }

    // Add a filter to modify the slug during post/page creation or update
    function translate_slug_on_save($data, $postarr) {
        // Check if the post type is selected for translation
        $this->options = get_option('ast_option_name'); // Initialize $this->options
        $selected_post_types = $this->options['ast_select_post_type'];

        if (in_array($data['post_type'], array_keys($selected_post_types))) {
            // Translate the slug to English using Google Translate API
            $translated_slug = $this->translate_hindi_to_english($data['post_title']);
            // Update the slug in the post data
            $data['post_name'] = $translated_slug;
        }

        return $data;
    }

}
