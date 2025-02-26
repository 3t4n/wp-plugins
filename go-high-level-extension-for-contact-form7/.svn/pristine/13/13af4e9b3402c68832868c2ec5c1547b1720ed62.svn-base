<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://https://www.ibsofts.com
 * @since      1.0.2
 *
 * @package    GHLCF7
 * @subpackage GHLCF7/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    GHLCF7
 * @subpackage GHLCF7/admin
 * @author     iB Softs <ibsofts@gmail.com>
 */
class GHLCF7_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.2
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.2
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.2
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.2
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ghl_Cf7_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ghl_Cf7_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ghl-cf7-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'select2_css', plugins_url( 'css/select2.min.css', __FILE__ ), '', '1.0' );
		wp_enqueue_style( 'ghlcf7_admin_style', plugins_url( 'css/admin-styles.css', __FILE__ ), '', '1.0' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.2
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ghl_Cf7_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ghl_Cf7_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ghl-cf7-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'select2', plugins_url( 'js/select2.min.js', __FILE__ ) , array('jquery'), '1.0.2', true );
        wp_enqueue_script( 'ghlcf7_admin_script', plugins_url( 'js/admin-scripts.js', __FILE__ ) , array('jquery'), '1.0.2', true );
	}
	

// CF7 After form submission
function ghlcf7_send_form_data_to_api($contact_form) {
    // Get the submitted form data
    $submission = WPCF7_Submission::get_instance();

    $form_id = $contact_form->id();
    if (!$submission) {
        return;
    }
    $posted_data = $submission->get_posted_data();

    $locationId = get_option('ghlcf7_locationId');
    if (!$posted_data) {
        return;
    }

    // Get the mapped values
    $CheckNameFields = get_option('ghlcf7_name_fields', []);
    $CheckEmailValue = get_option('ghlcf7_email_field');
    $CheckPhoneValue = get_option('ghlcf7_phne_field');

    // Dynamically fetch the field name
    $name_field_value = '';
    $email_field_value = '';
    $phone_field_value = '';
    foreach ($posted_data as $key => $value) {
        foreach ($CheckNameFields as $field) {
            if ($key === $field['value']) {
                $name_field_value .= ' ' . $value;
                break;
            }
        }
        if (strcmp($key, $CheckEmailValue) == 0) {
            $email_field_value = $value;
        } elseif (strcmp($key, $CheckPhoneValue) == 0) {
            $phone_field_value = $value;
        }
    }

    // Trim any leading or trailing whitespace
    $name_field_value = trim($name_field_value);

    // If checkbox is checked
    if (get_option('ghlcf7_checkbox_' . $form_id)) {
        $tags = !empty(get_option("ghlcf7_tag_" . $form_id)) ? get_option("ghlcf7_tag_" . $form_id) : get_option("ghlcf7-global-tag-names", "");
        $contact_data = array(
            "locationId" => $locationId,
            'name'       => $name_field_value,
            'email'      => $email_field_value,
            'phone'      => $phone_field_value,
            'tags'       => $tags,
        );

        $ghlcf7_access_token = get_option('ghlcf7_access_token');
        $endpoint = GHLCF7_CONTACT_DATA_API;
        $ghl_version = GHLCF7_CONTACT_DATA_VERSION;

        $request_args = array(
            'body'    => $contact_data,
            'headers' => array(
                'Authorization' => "Bearer {$ghlcf7_access_token}",
                'Version'       => $ghl_version,
            ),
        );

        $response = wp_remote_post($endpoint, $request_args);
        $http_code = wp_remote_retrieve_response_code($response);

        if (200 === $http_code || 201 === $http_code) {
            $body = json_decode(wp_remote_retrieve_body($response));
            $contact = $body->contact;

            return $contact;
        }
    }
}

// Add a custom settings tab for CF7
function ghlcf7_form_settings_tab($panels) {
    $panels['custom_tab'] = array(
        'title'    => __('GHL For CF7', 'go-high-level-extension-for-contact-form7'),
        'callback' => array($this, 'ghlcf7_form_settings_tab_content'),
    );
    return $panels;
}

// Add content to the custom settings tab
function ghlcf7_form_settings_tab_content($post) {
    if ($post->id) {
        require plugin_dir_path(__FILE__) . 'partials/ghl-cf7-form-tag.php';
    }
}

// Save form settings with nonce verification
function ghlcf7_save_form_settings($contact_form) {
    //Verify nonce
    if (!isset($_POST['_wpnonce']) || wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), 'ghlcf7_save_form_settings')) {
        wp_die(esc_html__('Nonce verification failed.', 'go-high-level-extension-for-contact-form7'));
    }
    
    // Retrieve values from the form
    $checkboxValue = isset($_POST['ghlcf7_checkbox']) ? 1 : 0;
    $inputValue = isset($_POST['ghlcf7_tag']) ? sanitize_text_field(wp_unslash($_POST['ghlcf7_tag'])) : '';

    // Update the options for the contact form
    update_option('ghlcf7_checkbox_' . $contact_form->id, $checkboxValue);
    update_option('ghlcf7_tag_' . $contact_form->id, $inputValue);
}
	
}
     