<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ACPGC_predictionGame
{

    private $repeated_fields = array();
    private $repeated_groups = array();
    private $repeated_groups_data = array();


    function __construct() {

        add_action( 'admin_notices', array( $this, 'acpgc_check_acf'), 11 );
        add_action( 'wp_enqueue_scripts',  array( $this, 'acpgc_enqueue_frontend_styles'), 11 );
        add_action( 'wp_enqueue_scripts',  array( $this, 'acpgc_enqueue_frontend_scripts'), 11 );
        add_action( 'admin_enqueue_scripts',  array( $this, 'acpgc_enqueue_admin_styles'), 11 );
        add_action( 'admin_enqueue_scripts',  array( $this, 'acpgc_enqueue_admin_scripts'), 11 );
        add_action( 'wp_ajax_acpgc_ajax_admin', array( $this, 'acpgc_ajax_admin' ) );
        add_action( 'wp_ajax_acpgc_nopriv_ajax_admin', array( $this, 'acpgc_ajax_admin' ) );

        new ACPGC_auth();

        new ACPGC_user();

        new ACPGC_userDashboard();

        new ACPGC_round();

        new ACPGC_question();

        new ACPGC_choice();

        new ACPGC_league();

        add_action( 'template_redirect', array( $this, 'acpgc_redirect_guest' ) );

        if (isset($_REQUEST['make_nominations'])) {
            if (
                !isset($_REQUEST['acpgc_submit_nominations_nonce']) ||
                !wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['acpgc_submit_nominations_nonce'])), 'acpgc_submit_nominations_action')
            ) {
                wp_die('Security check failed');
            }

            add_action('init', array($this, 'acpgc_submit_nominations'), 10, 2);
        }

    }

    public static function acpgc_check_acf() {
        if ( ! is_plugin_active( 'advanced-custom-fields/acf.php' ) ) {
            ?>
            <div class="notice notice-error is-dismissible">
                <p><?php esc_html_e( 'AC Prediction Game Creator requires Advanced Custom Fields to be installed and active.', 'ac-prediction-game-creator' ); ?></p>
            </div>
            <?php
        }
    }


    /**
     *
     * Load the admin styles
     *
     */
    public static function acpgc_enqueue_admin_styles( $hook_suffix ){

        // Define the path to the CSS file.
        $css_path = plugins_url('assets/css/acpgc-admin-styles.css', __FILE__);
        wp_register_style('acpgc-admin-styles', $css_path, '', ACPGC_VERSION);
        // Enqueue the CSS file.
        wp_enqueue_style('acpgc-admin-styles');


    }
    /**
     *
     * Load the frontend styles
     *
     */
    public static function acpgc_enqueue_frontend_styles( $hook_suffix ){

        // Define the path to the CSS file.
        $css_path = acpgc_plugin_url('assets/css/acpgc-styles.css');
        wp_register_style('acpgc-styles', $css_path, '', ACPGC_VERSION);

        // Enqueue the CSS file.
        wp_enqueue_style('acpgc-styles', $css_path);
    }
    /**
     *
     * Load the admin scripts if this is a acpgc-admin page
     *
     */
    public static function acpgc_enqueue_admin_scripts( $hook_suffix ) {

        global $post;
        if( $hook_suffix == 'toplevel_page_acpgc-admin' )
        {
            wp_register_script('acpgc-scripts-admin', acpgc_plugin_url('assets/js/scripts_admin.js'), array('jquery'), ACPGC_VERSION, true);
        }
        $data = array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 'acpgc-admin-nonce' )
        );
        wp_localize_script( 'acpgc-scripts-admin', 'acpgc_admin', $data );
        wp_enqueue_script('acpgc-scripts-admin');

        if ($hook_suffix == 'post-new.php' || $hook_suffix == 'post.php') {
            if ('acpgc_round' === $post->post_type) {
                wp_register_script('acpgc-scripts-admin-rounds',  acpgc_plugin_url('assets/js/scripts_admin_round.js'), array('jquery'), ACPGC_VERSION, true);
                wp_enqueue_script('acpgc-scripts-admin-rounds');
            }
        }

    }

    /**
     *
     * Load the front end scripts
     *
     */
    public static function acpgc_enqueue_frontend_scripts( $hook_suffix ) {
        global $post;

        if (!$post) {
            return;
        }

        wp_register_script('acpgc-scripts', acpgc_plugin_url( 'assets/js/scripts.js' ),array('jquery'), ACPGC_VERSION,true);

        wp_localize_script('acpgc-scripts', 'acpgc', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'posturl' => get_permalink($post->ID),
            'postid' => $post->ID,
            'root' => esc_url_raw(rest_url()),
            'nonce' => wp_create_nonce('wp_rest'),
            'updateusernonce' => wp_create_nonce('update-user'),
            'send_invitenonce' => wp_create_nonce('acpgc_send_invite_action') // New nonce for sending league invites

        ));

        wp_enqueue_script('acpgc-scripts');
    }


    /**
     *
     * redirect the unauthenticated
     *
     */
    function acpgc_redirect_guest() {
        global $post;

        if ($post && $post->post_content) {
            $short_code_tags = ['acpgc_rounds', 'acpgc_league', 'acpgc_user_dash', 'acpgc_user_profile', 'acpgc_create_league'];

            foreach ($short_code_tags as $tag) {
                if ( has_shortcode($post->post_content, $tag) ) {
                    if ( ! is_user_logged_in() ) {
                        if ( isset( $_SERVER['REQUEST_URI'] ) ) { // Check if REQUEST_URI is set
                            // Sanitize and encode the REQUEST_URI
                            $sanitized_uri = sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) );

                            // Build the redirect URL with proper encoding and escaping
                            $redirect_url = add_query_arg( array(
                                'redirect_to' => urlencode( $sanitized_uri ),
                                'reason'      => 'not_logged_in'
                            ), wp_login_url() );

                            // Perform the redirection
                            wp_redirect( $redirect_url );
                            exit; // Always call exit after wp_redirect
                        }
                    }

                }
            }
        }

        if ( is_post_type_archive( 'acpgc_league' ) && !is_user_logged_in() ) {
            if ( isset( $_SERVER['REQUEST_URI'] ) ) { // Check if REQUEST_URI is set
                // Sanitize and encode the REQUEST_URI
                $sanitized_uri = sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) );

                // Build the redirect URL with proper encoding and escaping
                $redirect_url = add_query_arg( array(
                    'redirect_to' => urlencode( $sanitized_uri ),
                    'reason'      => 'not_logged_in'
                ), wp_login_url() );

                // Perform the redirection
                wp_redirect( $redirect_url );
                exit; // Always call exit after wp_redirect
            }
        }

    }


    /**
     *
     * redirect submit your nominations
     *
     */
    function acpgc_submit_nominations() {

        // Verify nonce first.
        if (
            !isset($_POST['acpgc_submit_nominations_nonce']) ||
            !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['acpgc_submit_nominations_nonce'])), 'acpgc_submit_nominations_action')
        ) {
            wp_die('Security check failed'); // Or handle the error as appropriate
        }


        global $wpdb;

        // rounds_predictions Table
        $table = $wpdb->prefix . ACPGC_PREFIX . 'rounds_predictions';
        $sanitized_table = esc_sql( $table ); // Escape the table name safely

        $questions_data = [];



        if ( isset( $_POST['acpgc_questions'] ) && is_array( $_POST['acpgc_questions'] ) ) {
            // Sanitize the entire array structure first
            $sanitized_questions = acpgc_sanitize_array( wp_unslash( $_POST['acpgc_questions'] ) );
            $questions_data = array();

            foreach ( $sanitized_questions as $question ) {
                $sanitized_question = array();

                if ( is_array( $question ) ) {
                    foreach ( $question as $key => $value ) {
                        // Sanitize each value based on its expected type
                        if ( $key == 'acpgc_choice_id' || $key == 'acpgc_question_id' || $key == 'acpgc_round_id' ) {
                            $sanitized_question[ $key ] = esc_html(absint( $value )); // Sanitize as an integer
                        } else {
                            $sanitized_question[ $key ] = sanitize_text_field( $value ); // Sanitize as text
                        }
                    }
                }

                // Append the sanitized sub-array to the main array
                $questions_data[] = $sanitized_question;
            }
        }



        $current_round = isset($_POST['acpgc_round_id']) ? intval($_POST['acpgc_round_id']) : 0;

        $user_id = get_current_user_id();
        $user_rounds = ACPGC_user::acpgc_get_user_predictions($user_id, $current_round);
        $voted = false;

        if (empty($user_rounds)) {
            $feedback_message = ''; // Initialize the feedback message
            foreach ($questions_data as $question) {

                // Sanitize the question data
                $round_id = isset($question['acpgc_round_id']) ? intval($question['acpgc_round_id']) : 0;
                $question_id = isset($question['acpgc_question_id']) ? intval($question['acpgc_question_id']) : 0;
                $choice_id = isset($question['acpgc_choice_id']) ? intval($question['acpgc_choice_id']) : 0;

                // Check if a choice is selected before inserting data
                if (!empty($choice_id)) {



                    $result = $wpdb->query( $wpdb->prepare("INSERT INTO {$sanitized_table} (user_id, rounds_prediction_round_id, rounds_prediction_question_id, rounds_prediction_choice_id, created_at, updated_at) VALUES (%d, %d, %d, %d, %s, %s)",
                        $user_id,
                        $round_id,
                        $question_id,
                        $choice_id,
                        current_time( 'mysql' ),
                        current_time( 'mysql' )
                    )); // Execute the query
                } else {
                    $feedback_message = 'Please select an option for all questions.';
                    $feedback_type = 'error';
                    // Set the feedback message as a transient
                    set_transient('acpgc_feedback_message', $feedback_message, 30); // Change 30 to the desired duration in seconds
                    set_transient('acpgc_feedback_type', $feedback_type, 30); // Change 30 to the desired duration in seconds
                    return false;
                }
            }
            ACPGC_round::acpgc_update_user_rounds_predicted($user_id, $current_round);
            $feedback_message = 'Your predictions have been saved. Good luck with your guesses!';
            $feedback_type = 'success';

            // Set the feedback message as a transient
            set_transient('acpgc_feedback_message', $feedback_message, 30); // Change 30 to the desired duration in seconds
            set_transient('acpgc_feedback_type', $feedback_type, 30); // Change 30 to the desired duration in seconds

        } else {
            $voted = true;
        }
    }


    /**
     *
     * Ajax admin
     *
     */
    function acpgc_ajax_admin(){
        check_ajax_referer( 'acpgc-admin-nonce', 'nonce' );

        try {
            new ACPGC_userScore();

        } catch( Exception $e ) {
            wp_send_json_error( $e->getMessage() );
            die();
        }
        wp_send_json_success();
        die();

    }

}
