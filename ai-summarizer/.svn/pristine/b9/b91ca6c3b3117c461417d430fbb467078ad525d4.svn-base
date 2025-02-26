<?php


/**
 * AISummarizerAdmin class file
 *
 * @category   Plugin
 * @package    AI_Summarizer
 * @subpackage Admin
 * @license    GPL-2.0+
 * @author     santosh@soboldltd.com
 */

namespace AISummarizer;

use AISummarizer\Factories\ModelFactory;
use WP_Error;

if (! defined('ABSPATH')) exit; // Exit if accessed directly


/**
 * Class AISummarizerAdmin
 *
 * Handles admin settings and configuration for the AI Summarizer plugin.
 *
 * @category Plugin
 * @package  AI_Summarizer
 */
class AISummarizerAdmin
{
    // Define class properties
    protected static $summarizer_spelling;
    protected static $summarize_spelling;

    /**
     * Initializes the admin settings and menu pages.
     *
     * @return void
     */
    public static function AISummarizer_admin_init()
    {
        // Initialize the spelling values once in the class
        self::$summarizer_spelling = \AISummarizer\GlobalFunction\AISummarizer_SpellingHelper::AISummarizer_getSummarizerSpelling();
        self::$summarize_spelling = \AISummarizer\GlobalFunction\AISummarizer_SpellingHelper::AISummarizer_getSummarizeSpelling();

        // Add Admin actions
        add_action('admin_menu', [__CLASS__, 'AISummarizer_addAdminMenu']);
        add_action('admin_init', [__CLASS__, 'AISummarizer_registerSettings']);
        add_action('admin_init', [__CLASS__, 'AISummarizer_saveSettings']);
        add_action('add_meta_boxes', [__CLASS__, 'AISummarizer_addSummarizerMetaBox']);
        add_action('admin_notices', [__CLASS__, 'AISummarizer_displayAdminNotice']);
    }

    /**
     * Adds submenu pages for plugin settings, post types, and widget options.
     *
     * @return void
     */
    public static function AISummarizer_addAdminMenu()
    {
        add_menu_page(
            sprintf(
                // Translators: %s is the Heading.
                __('AI %s', 'ai-summarizer'),
                self::$summarizer_spelling
            ),
            sprintf(
                // Translators: %s is the Heading.
                __('AI %s', 'ai-summarizer'),
                self::$summarizer_spelling
            ),
            'manage_options',
            'ai-summarizer',
            [__CLASS__, 'AISummarizer_renderSettingsPage'],
            'dashicons-analytics'
        );

        add_submenu_page(
            'ai-summarizer',
            __('Post Types Settings', 'ai-summarizer'),
            __('Post Types', 'ai-summarizer'),
            'manage_options',
            'ai-summarizer-post-types',
            [__CLASS__, 'AISummarizer_renderPostTypesPage']
        );

        add_submenu_page(
            'ai-summarizer',
            __('Widget Settings', 'ai-summarizer'),
            __('Widget', 'ai-summarizer'),
            'manage_options',
            'ai-summarizer-widget',
            [__CLASS__, 'AISummarizer_renderWidgetSettingsPage']
        );
    }

    // Handles the rendering of php files
    public static function AISummarizer_masterRender($component)
    {
        include_once plugin_dir_path(__FILE__)  . "components/$component";
    }

    /**
     * Registers plugin settings.
     *
     * @return void
     */
    public static function AISummarizer_registerSettings()
    {
        // AWS configuration
        register_setting('ai_summarizer_settings_group', 'ai_summarizer_configuration');
        register_setting('ai_summarizer_settings_group', 'ai_summarizer_model_type');
        register_setting('ai_summarizer_settings_group', 'ai_summarizer_aws_access_key');
        register_setting('ai_summarizer_settings_group', 'ai_summarizer_aws_secret_key');
        register_setting('ai_summarizer_settings_group', 'ai_summarizer_aws_region');
        register_setting('ai_summarizer_settings_group', 'ai_summarizer_bedrock_model_id');
        register_setting('ai_summarizer_settings_group', 'ai_summarizer_summary_length');


        add_settings_field(
            'ai_summarizer_configuration',
            sprintf(
                // Translators: %s is the summarizer spelling.
                __(
                    'AI %s Configuration',
                    'ai-summarizer'
                ),
                self::$summarizer_spelling
            ),
            function () {
                self::AISummarizer_masterRender('aiSummarizer-configuration.php');
            },
            'ai-summarizer',
            'ai_summarizer_main_section'
        );

        // Add sections for AWS
        add_settings_section(
            'ai_summarizer_main_section',
            __('Model Configuration', 'ai-summarizer'),
            null,
            'ai-summarizer'
        );

        // Add fields
        self::AISummarizer_addModelTypeSettingsFields();
        self::AISummarizer_addPostTypesSettingsFields();
        self::AISummarizer_addWidgetSettingsFields();
    }

    /**
     * Adds model type settings fields.
     *
     * @return void
     */
    private static function AISummarizer_addModelTypeSettingsFields()
    {
        add_settings_field(
            'ai_summarizer_model_type',
            __('Model Type', 'ai-summarizer'),
            function () {
                self::AISummarizer_masterRender('model-types.php');
            },
            'ai-summarizer',
            'ai_summarizer_main_section'
        );

        add_settings_field(
            'ai_summarizer_aws_access_key',
            __('AWS Access Key', 'ai-summarizer'),
            function () {
                self::AISummarizer_masterRender('aws-access-key.php');
            },
            'ai-summarizer',
            'ai_summarizer_main_section'
        );

        add_settings_field(
            'ai_summarizer_aws_secret_key',
            __('AWS Secret Key', 'ai-summarizer'),
            function () {
                self::AISummarizer_masterRender('aws-secret-key.php');
            },
            'ai-summarizer',
            'ai_summarizer_main_section'
        );

        add_settings_field(
            'ai_summarizer_aws_region',
            __('AWS Region', 'ai-summarizer'),
            function () {
                self::AISummarizer_masterRender('aws-regions.php');
            },
            'ai-summarizer',
            'ai_summarizer_main_section'
        );

        add_settings_field(
            'ai_summarizer_bedrock_model_id',
            __('Bedrock Model ID', 'ai-summarizer'),
            function () {
                self::AISummarizer_masterRender('aws-model-ids.php');
            },
            'ai-summarizer',
            'ai_summarizer_main_section'
        );

        add_settings_field(
            'ai_summarizer_summary_length',
            __('Summary length', 'ai-summarizer'),
            function () {
                self::AISummarizer_masterRender('summary-length.php');
            },
            'ai-summarizer',
            'ai_summarizer_main_section'
        );
    }

    /**
     * Adds post types settings fields.
     *
     * @return void
     */
    private static function AISummarizer_addPostTypesSettingsFields()
    {
        register_setting('ai_summarizer_post_types_group', 'ai_summarizer_post_types');

        add_settings_section(
            'ai_summarizer_post_types_section',
            __('Select Post Types', 'ai-summarizer'),
            null,
            'ai-summarizer-post-types'
        );

        add_settings_field(
            'ai_summarizer_post_types',
            __('Post Types', 'ai-summarizer'),
            function () {
                self::AISummarizer_masterRender('post-types.php');
            },
            'ai-summarizer-post-types',
            'ai_summarizer_post_types_section'
        );
    }

    /**
     * Adds widget settings fields.
     *
     * @return void
     */
    private static function AISummarizer_addWidgetSettingsFields()
    {
        register_setting('ai_summarizer_widget_group', 'ai_summarizer_widget_colour');
        register_setting('ai_summarizer_widget_group', 'ai_summarizer_widget_text');
        register_setting('ai_summarizer_widget_group', 'ai_summarizer_summary_speed');
        register_setting('ai_summarizer_widget_group', 'ai_summarizer_widget_text_two');
        register_setting('ai_summarizer_widget_group', 'ai_summarizer_widget_position');
        register_setting('ai_summarizer_widget_group', 'ai_summarizer_widget_visibility');

        add_settings_section(
            'ai_summarizer_widget_section',
            __('Widget Settings', 'ai-summarizer'),
            null,
            'ai-summarizer-widget'
        );

        add_settings_field(
            'ai_summarizer_widget_colour',
            __('Widget Colour', 'ai-summarizer'),
            function () {
                self::AISummarizer_masterRender('widget-colour.php');
            },
            'ai-summarizer-widget',
            'ai_summarizer_widget_section'
        );

        add_settings_field(
            'ai_summarizer_widget_text',
            __('Widget Text', 'ai-summarizer'),
            function () {
                self::AISummarizer_masterRender('widget-text.php');
            },
            'ai-summarizer-widget',
            'ai_summarizer_widget_section'
        );

        add_settings_field(
            'ai_summarizer_summary_speed',
            __('Summary text display speed ', 'ai-summarizer'),
            function () {
                self::AISummarizer_masterRender('display-summary-speed.php');
            },
            'ai-summarizer-widget',
            'ai_summarizer_widget_section'
        );
        add_settings_field(
            'ai_summarizer_widget_text_two',
            __('Widget Text Two', 'ai-summarizer'),
            function () {
                self::AISummarizer_masterRender('widget-text-two.php');
            },
            'ai-summarizer-widget',
            'ai_summarizer_widget_section'
        );

        add_settings_field(
            'ai_summarizer_widget_visibility',
            __('Widget Visibility', 'ai-summarizer'),
            function () {
                self::AISummarizer_masterRender('widget-visibility.php');
            },
            'ai-summarizer-widget',
            'ai_summarizer_widget_section'
        );

        add_settings_field(
            'ai_summarizer_widget_position',
            __('Widget Position', 'ai-summarizer'),
            function () {
                self::AISummarizer_masterRender('widget-position.php');
            },
            'ai-summarizer-widget',
            'ai_summarizer_widget_section'
        );
    }

    /**
     * Renders the main settings page.
     *
     * @return void
     */
    public static function AISummarizer_renderSettingsPage()
    {
?>
        <div class="wrap">
            <h1>
                <?php printf(
                    // Translators: %s is the summarizer spelling.
                    esc_html__('AI %s Settings', 'ai-summarizer'),
                    esc_html(self::$summarizer_spelling)
                );  ?>
            </h1>
            <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                <?php
                settings_fields('ai_summarizer_settings_group');
                do_settings_sections('ai-summarizer');
                submit_button();
                ?>
                <?php wp_nonce_field('ai_summarizer_saveSettings', 'ai_summarizer_nonce'); ?>
            </form>
        </div>
    <?php
    }

    /**
     * Renders the post types settings page.
     *
     * @return void
     */
    public static function AISummarizer_renderPostTypesPage()
    {
    ?>
        <div class="wrap">
            <h1><?php esc_html_e('Post Types Settings', 'ai-summarizer'); ?></h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('ai_summarizer_post_types_group');
                do_settings_sections('ai-summarizer-post-types');
                submit_button();
                ?>
            </form>
        </div>
    <?php
    }

    /**
     * Renders the widget settings page.
     *
     * @return void
     */
    public static function AISummarizer_renderWidgetSettingsPage()
    {
    ?>
        <div class="wrap">
            <h1><?php esc_html_e('Widget Settings', 'ai-summarizer'); ?></h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('ai_summarizer_widget_group');
                do_settings_sections('ai-summarizer-widget');
                submit_button();
                ?>
                <?php wp_nonce_field('ai_summarizer_saveWidgetSettings', 'ai_summarizer_nonce'); ?>
            </form>
        </div>
<?php
    }

    /**
     * Adds a meta box to the post edit screen.
     *
     * @param string $post_type
     *
     * @return void
     */
    public static function AISummarizer_addSummarizerMetaBox($post_type)
    {

        // Get the selected post type from your plugin settings or options
        $selected_post_type = get_option('ai_summarizer_post_types', []);
        $selected_post_type = !empty($selected_post_type) ? explode(',', $selected_post_type) : []; // Split string into array

        // Check if there's more than one post type in the array
        if (count($selected_post_type) !== 1 || !in_array(get_post_type(), $selected_post_type)) {
            return;
        }

        add_meta_box(
            'ai_summarizer_meta_box',
            sprintf(
                // Translators: %s is the summarizer spelling.
                __(
                    'AI %s Configuration',
                    'ai-summarizer'
                ),
                self::$summarizer_spelling
            ),
            function () {
                self::AISummarizer_masterRender('summarizer-meta-box.php');
            },
            $post_type,
            'normal',
            'high'
        );
    }

    public static function AISummarizer_saveSettings()
    {
        // Verify nonce for security
        if (
            !isset(
                $_POST['ai_summarizer_nonce']
            ) ||
            !wp_verify_nonce(
                sanitize_text_field(wp_unslash($_POST['ai_summarizer_nonce'])),
                'ai_summarizer_saveSettings'
            )
        ) {
            return; // Exit if nonce verification fails
        }

        // Sanitize and retrieve the input values
        $aws_access_key = isset($_POST['ai_summarizer_aws_access_key'])
            ? sanitize_text_field(wp_unslash($_POST['ai_summarizer_aws_access_key']))
            : '';

        $aws_secret_key = isset($_POST['ai_summarizer_aws_secret_key'])
            ? sanitize_text_field(wp_unslash($_POST['ai_summarizer_aws_secret_key']))
            : '';

        $aws_region = isset($_POST['ai_summarizer_aws_region'])
            ? sanitize_text_field(wp_unslash($_POST['ai_summarizer_aws_region']))
            : '';

        $bedrock_model_id = isset($_POST['ai_summarizer_bedrock_model_id'])
            ? sanitize_text_field(wp_unslash($_POST['ai_summarizer_bedrock_model_id']))
            : '';

        $model_type = isset($_POST['ai_summarizer_model_type'])
            ? sanitize_text_field(wp_unslash($_POST['ai_summarizer_model_type']))
            : '';

        $ai_summarizer_configuration = isset($_POST['ai_summarizer_configuration'])
            ? sanitize_text_field(wp_unslash($_POST['ai_summarizer_configuration']))
            : '';

        $ai_summarizer_summary_length = isset($_POST['ai_summarizer_summary_length'])
            ? sanitize_text_field(wp_unslash($_POST['ai_summarizer_summary_length']))
            : '';



        // Retrieve the existing values from the database
        $existing_access_key = get_option('ai_summarizer_aws_access_key');
        $existing_secret_key = get_option('ai_summarizer_aws_secret_key');
        $existing_region = get_option('ai_summarizer_aws_region');
        $existing_bedrock_model_id = get_option('ai_summarizer_bedrock_model_id');
        $existing_model_type = get_option('ai_summarizer_model_type');
        $existing_ai_summarizer_configuration = get_option('ai_summarizer_configuration');
        $existing_ai_summarizer_summary_length = get_option('ai_summarizer_summary_length');

        if ($aws_access_key !== $existing_access_key) {
            $aws_access_key = self::AISummarizer_encrypt($aws_access_key);
        }

        if ($aws_secret_key !== $existing_secret_key) {
            $aws_secret_key = self::AISummarizer_encrypt($aws_secret_key);
        }

        // Prepare the config to create the model
        $config = [
            'aws_access_key' => self::AISummarizer_decrypt($aws_access_key),
            'aws_secret_key' => self::AISummarizer_decrypt($aws_secret_key),
            'aws_region'     => $aws_region,
            'model_id'       => $bedrock_model_id
        ];

        $_model = ModelFactory::AISummarizer_create($config);

        // Test the model with a dummy post object
        $postObject = "test this is a test";
        $summary = $_model->AISummarizer_summarize(
            wp_json_encode($postObject),
            $ai_summarizer_summary_length
        );

        if ($summary['success']) {
            // Update options in the database only if the new values are different

            if ($ai_summarizer_summary_length !== $existing_ai_summarizer_summary_length) {
                update_option('ai_summarizer_summary_length', $ai_summarizer_summary_length);
            }
            if ($ai_summarizer_configuration !== $existing_ai_summarizer_configuration) {
                update_option('ai_summarizer_configuration', $ai_summarizer_configuration);
            }
            if ($aws_access_key !== $existing_access_key) {
                update_option('ai_summarizer_aws_access_key', $aws_access_key);
            }
            if ($aws_secret_key !== $existing_secret_key) {
                update_option('ai_summarizer_aws_secret_key', $aws_secret_key);
            }
            if ($aws_region !== $existing_region) {
                update_option('ai_summarizer_aws_region', $aws_region);
            }
            if ($bedrock_model_id !== $existing_bedrock_model_id) {
                update_option('ai_summarizer_bedrock_model_id', $bedrock_model_id);
            }
            if ($model_type !== $existing_model_type) {
                update_option('ai_summarizer_model_type', $model_type);
            }



            // Redirect to the settings page after successful update
            wp_redirect(admin_url('admin.php?page=ai-summarizer'));
            exit;
        } else {
            // Set transient to store the error message
            set_transient('ai_summarizer_admin_notice', 'Failed : ' . $summary['summary'], 30);

            // Do not redirect or halt execution. The notice will display automatically.
            wp_redirect(admin_url('admin.php?page=ai-summarizer'));
            exit;
        }
    }

    // Hook to display the admin notice
    public static function AISummarizer_displayAdminNotice()
    {
        // Check if there's an error message stored
        if ($notice = get_transient('ai_summarizer_admin_notice')) {
            echo '<div class="notice notice-error is-dismissible"><p>' . esc_html($notice) . '</p></div>';

            // Clear the transient after displaying the message
            delete_transient('ai_summarizer_admin_notice');
        }
    }


    /**
     * Encrypts the given data using AES-256-CBC and returns the base64-encoded result.
     *
     * This function uses the encryption key retrieved from the 'ai_summarizer_key' option
     * and the AES-256-CBC algorithm to encrypt the provided data.
     *
     * @param string $data The plaintext data that needs to be encrypted.
     *
     * @return string The base64-encoded encrypted string.
     *
     * @throws Exception If encryption key is missing or the encryption fails.
     */
    private static function AISummarizer_encrypt(string $data): string
    {
        // Fetch the encryption key from WordPress options
        $encryption_key = get_option('ai_summarizer_key');

        if (!$encryption_key) {
            return 'Encryption key not found.';
        }

        // Encrypt the data using AES-256-CBC
        $encrypted_data = openssl_encrypt(
            $data,
            'aes-256-cbc',
            $encryption_key
        );

        if ($encrypted_data === false) {
            return 'Encryption failed.';
        }

        // Return the base64-encoded encrypted data
        return base64_encode($encrypted_data);
    }


    /**
     * Decrypts the given base64-encoded encrypted data using AES-256-CBC.
     *
     * This function retrieves the encryption key from the 'ai_summarizer_key' option and
     * uses it to decrypt the provided base64-encoded encrypted data.
     *
     * @param string $encryptedData The base64-encoded encrypted data that needs to be decrypted.
     *
     * @return string The decrypted plaintext string.
     *
     * @throws Exception If the encryption key is missing or the decryption fails.
     */
    public static function AISummarizer_decrypt(string $encryptedData): string
    {
        // Fetch the encryption key from WordPress options
        $encryption_key = get_option('ai_summarizer_key');

        if (!$encryption_key) {
            return 'Encryption key not found.';
        }

        // Decode the base64-encoded encrypted data
        $encrypted_data = base64_decode($encryptedData);

        if ($encrypted_data === false) {
            return 'Failed to decode base64 data.';
        }

        // Decrypt the data using AES-256-CBC
        $decrypted_data = openssl_decrypt(
            $encrypted_data,
            'aes-256-cbc',
            $encryption_key
        );

        if ($decrypted_data === false) {
            return 'Decryption failed.';
        }

        // Return the decrypted data
        return $decrypted_data;
    }

    /**
     * Determines if a post type can be summarized based on whether it uses
     * the editor or ACF fields for content.
     *
     * @param  string $post_type The post type to check.
     * @return bool True if the post type can be summarized, false otherwise.
     */
    public static function AISummarizer_canPostTypeBeSummarized($post_type)
    {
        // Check if the post type supports the default WordPress editor
        if (post_type_supports($post_type, 'editor')) {
            return true;
        }

        // Check if ACF is active and if the post has relevant ACF fields (dynamic check)
        if (function_exists('get_field_objects')) {
            // Get all ACF fields for the post type (empty if no fields exist)
            $acf_fields = get_field_objects();

            // Check if there are any text-related ACF fields (e.g., 'text', 'textarea', 'wysiwyg')
            if ($acf_fields && self::AISummarizer_hasAcfTextContent($acf_fields)) {
                return true;
            }
        }

        // No summarizable content found
        return false;
    }

    /**
     * Dynamically checks if ACF fields contain relevant text-based content for summarization.
     *
     * @param array $acf_fields The array of ACF fields for the post.
     * @return bool True if relevant content fields exist, false otherwise.
     */
    public static function AISummarizer_hasAcfTextContent($acf_fields)
    {
        foreach ($acf_fields as $field) {
            // Only consider text-based fields for summarization
            if (in_array($field['type'], ['text', 'textarea', 'wysiwyg'])) {
                return true;
            }
        }

        return false;
    }
}
