<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ACPGC_user
{
    function __construct()
    {
        add_action('user_register', array($this, 'acpgc_set_initial_score'));
        add_action('wp_login', array($this, 'acpgc_check_and_set_score'), 10, 2);

        add_shortcode('acpgc_user_profile', array($this,'acpgc_user_profile_form'));
        add_action('rest_api_init', array($this,'acpgc_user_profile_registration_route'));
        add_filter('get_avatar', array($this,'acpgc_custom_avatar'), 10, 5);
        add_filter('get_avatar_url', array($this,'acpgc_avatar_url'), 10, 3);

    }

    /**
     * Set the initial 'acpgc_user_score' to 0 for new users.
     *
     * @param int $user_id The user's ID.
     */
    function acpgc_set_initial_score($user_id)
    {
        update_user_meta($user_id, 'acpgc_user_score', 0);
    }

    /**
     * Check if the 'acpgc_user_score' is set for the user.
     * If not, set it to 0.
     *
     * @param string $user_login The username.
     * @param WP_User $user The WP_User object.
     */
    function acpgc_check_and_set_score($user_login, $user)
    {
        $score = get_user_meta($user->ID, 'acpgc_user_score', true);
        if (empty($score)) {
            update_user_meta($user->ID, 'acpgc_user_score', 0);
        }
    }

    /*
     * Get the predictions for the user for the current round
     */
    public static function acpgc_get_user_predictions($user_id, $round_id, $format = 'OBJECT', $key_value = false) {

        global $wpdb;
        $output = [];
        $table = $wpdb->prefix . ACPGC_PREFIX . 'rounds_predictions';
        $sanitized_table = esc_sql($table); // Sanitize the table name

        $user_rounds = $wpdb->get_results($wpdb->prepare( "SELECT * FROM {$sanitized_table} WHERE user_id = %d AND rounds_prediction_round_id = %d", $user_id, $round_id), $format);

        // If the $key_value has been passed to this method
        if ($key_value !== false) {
            foreach ($user_rounds as $question) {
                // Check the format and access the key_value accordingly
                if ($format == 'ARRAY_A' || $format == 'ARRAY_N') {
                    // For associative arrays or numeric arrays, access using array syntax
                    $output_key = $question[$key_value];
                } else {
                    // For objects, access using property syntax
                    $output_key = $question->$key_value;
                }
                $output[$output_key] = $question;
            }
        } else {
            // Output the user rounds prediction straight from the database
            $output = $user_rounds;
        }

        return $output;
    }


    /*
    * Custom Profile page
    */
    function acpgc_user_profile_form() {
        $current_user = wp_get_current_user();

        if(!$current_user){
            return;
        }

        $template = ACPGC_PLUGIN_TEMPLATE_DIR . "/user-profile-form-template.php";

        ob_start();
        include("$template");
        return ob_get_clean();
    }
    function acpgc_user_profile_registration_route() {
        register_rest_route('acpgc/v1', '/update-user', array(
            'methods' => 'POST',
            'callback' => array($this, 'acpgc_handle_custom_update_user'),
            'permission_callback' => '__return_true'
        ));
    }
    function acpgc_handle_custom_update_user(WP_REST_Request $request) {
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );

        $nonce = $request->get_header('X-WP-Nonce');
        if (!wp_verify_nonce($nonce, 'wp_rest')) {
            return array(
                'success' => false,
                'message' => 'Nonce verification failed'
            );
        }

        $first_name = sanitize_text_field($request->get_param('first_name'));
        $last_name = sanitize_text_field($request->get_param('last_name'));
        $email = sanitize_email($request->get_param('email'));
        $current_user = wp_get_current_user();

        // Check if the username or email already exists
        if (email_exists($email) && $current_user->user_email != $email) {
            return array(
                'success' => false,
                'message' => 'A user with the email '. $email .' already exists.'
            );
        }

        $args = array(
            'ID'         => $current_user->ID,
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'user_email' => $email
        );

        $user_id = wp_update_user($args);

        if (is_wp_error($user_id)) {
            return array(
                'success' => false,
                'message' => $user_id->get_error_message()
            );
        }

        $files = $request->get_file_params();

        if (!empty($files['avatar']['name'])) {

            $attach_id = media_handle_upload('avatar', 0);
            if (is_wp_error($attach_id)) {
                return array(
                    'success' => false,
                    'message' => 'There was an issue uploading the avatar.'
                );
            } else {
                // Optionally, associate the avatar with the user.
                update_user_meta($current_user->ID, 'custom_avatar', $attach_id);
            }
        }

        return array(
            'success' => true,
            'message' => 'Update successful',
            'redirect_url' => home_url()
        );
    }

    function  acpgc_custom_avatar($avatar, $id_or_email, $size, $default, $alt) {
        $user = false;

        if (is_numeric($id_or_email)) {
            $id = (int) $id_or_email;
            $user = get_user_by('id', $id);
        } elseif (is_object($id_or_email)) {
            if (!empty($id_or_email->user_id)) {
                $id = (int) $id_or_email->user_id;
                $user = get_user_by('id', $id);
            }
        } else {
            $user = get_user_by('email', $id_or_email);
        }

        if ($user && is_object($user)) {
            $custom_avatar = get_user_meta($user->ID, 'custom_avatar', true);

            if ($custom_avatar) {
                $avatar_url = wp_get_attachment_url($custom_avatar);
                return '<img src="' . esc_url($avatar_url) . '" alt="' . esc_attr($alt) . '" width="' . esc_attr($size) . '" height="' . esc_attr($size) . '">';
            }
        }

        return $avatar;
    }

    function  acpgc_avatar_url($url, $id_or_email, $args) {
        // Check if it's a user ID and not an email address
        if (is_numeric($id_or_email)) {
            $custom_avatar_id = get_user_meta($id_or_email, 'custom_avatar', true);
            if ($custom_avatar_id) {
                $custom_url = wp_get_attachment_url($custom_avatar_id);
                if ($custom_url) {
                    return $custom_url;
                }
            }
        }
        // Fall back to the original URL if no custom avatar is found
        return $url;
    }
}





