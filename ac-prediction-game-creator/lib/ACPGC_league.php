<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ACPGC_league
{
    function __construct()
    {
        // Other constructor code
        add_action('template_redirect', array($this, 'acpgc_league_check_invite'));

        add_action( 'init', array($this, 'acpgc_league_cpt'), 10, 2 );
        add_action( 'init', array($this, 'acpgc_league_cf'), 10, 2 );

        //Register the shortcode
        add_shortcode('acpgc_league', array($this, 'acpgc_league_sc'));
        add_shortcode('acpgc_create_league', array($this, 'acpgc_league_create_sc'));

        add_filter('single_template', [$this, 'acpgc_league_templates']);
        add_filter('template_include', [$this, 'acpgc_league_templates']);

        add_filter( 'enter_title_here', function($title){  $title =  ( 'acpgc_league' == get_current_screen()->post_type ) ? 'Choice' : $title; return $title;  }, 10, 2 );

        add_action( 'init', array($this, 'acpgc_create_league'), 10, 2 );

    }

    public function acpgc_league_cpt() {

        //Leagues
        $labels = array(
            'name' => _x('Leagues', 'post type general name', 'ac-prediction-game-creator'),
            'singular_name' => _x('League', 'post type singular name', 'ac-prediction-game-creator'),
            'add_new' => _x('Add New', 'League', 'ac-prediction-game-creator'),
            'add_new_item' => __('Add New League', 'ac-prediction-game-creator'),
            'edit_item' => __('Edit League', 'ac-prediction-game-creator'),
            'new_item' => __('New League', 'ac-prediction-game-creator'),
            'all_items' => __('All Leagues', 'ac-prediction-game-creator'),
            'view_item' => __('View League', 'ac-prediction-game-creator'),
            'search_items' => __('Search Leagues', 'ac-prediction-game-creator'),
            'not_found' => __('No Leagues found', 'ac-prediction-game-creator'),
            'not_found_in_trash' => __('No Leagues found in the trash', 'ac-prediction-game-creator'),
            'parent_item_colon' => '',
            'menu_name' => __('Leagues', 'ac-prediction-game-creator')
        );

        $args = array(
            'labels' => $labels,
            'menu_icon' => 'dashicons-awards',
            'description' => 'Leagues created',
            'public' => true,
            'menu_position' => 20,
            'supports' => array('title','thumbnail','revisions'),
            'has_archive' => true,
            'publicly_queryable' => true,
            'rewrite' => ['slug' => 'user-leagues'],
        );
        register_post_type('acpgc_league', $args);

    }

    public function acpgc_league_cf(){

        if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array(
                'key' => 'group_league_settings',
                'title' => 'League Settings',
                'fields' => array(
                    array(
                        'key' => 'field_league_active',
                        'label' => 'League Active',
                        'name' => 'League_active',
                        'aria-label' => '',
                        'type' => 'true_false',
                        'instructions' => 'Set to inactive to hide this league',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => 'Enable this league ',
                        'default_value' => 1,
                        'ui_on_text' => 'Active',
                        'ui_off_text' => 'Inactive',
                        'ui' => 1,
                    ),
                    array(
                        'key' => 'field_league_members',
                        'label' => 'League Members',
                        'name' => 'league_members',
                        'type' => 'user',
                        'role' => array('all'), //Or specify roles
                        'multiple' => 1,  // Allow multiple users to be selected
                    ),
                    array(
                        'key' => 'field_league_owner',
                        'label' => 'League Owner',
                        'name' => 'league_owner',
                        'type' => 'user',
                        'role' => array('all'),  //Or specify roles
                    )
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'acpgc_league',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'acf_after_title',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
                'show_in_rest' => 0,
            ));


        endif;


    }

    public function acpgc_league_sc($atts = [], $content = null, $tag = '')
    {
        global $wpdb;

        $current_user_id = get_current_user_id();

        // Define the table name safely
        $table_name = $wpdb->prefix . 'usermeta';
        $sanitized_table = esc_sql($table_name);
        $meta_key = 'acpgc_user_score';


        // Prepare and execute the query
        $users = $wpdb->get_results($wpdb->prepare("SELECT user_id, CAST(meta_value AS UNSIGNED) as score 
            FROM {$sanitized_table}
            WHERE meta_key = %s
            ORDER BY score DESC", $meta_key), OBJECT);

        // Annotate each user object with their ranking and display name
        foreach ($users as $index => $user) {
            $user->ranking = esc_html(absint($index)) + 1;
            $userdata = get_userdata($user->user_id);
            $user->display_name = esc_html($userdata->display_name);

            if ($user->user_id == $current_user_id) {
                $current_user = $user;
                $current_user_rank = esc_html(absint($user->ranking));
            }
        }

        // Find the position of the current user
        $current_user_position = 0;
        foreach ($users as $index => $user) {
            if ($user->user_id == $current_user_id) {
                $current_user_position = esc_html(absint($index));
                break;
            }
        }

        // Get 3 users above and 3 users below the current user
        $users_above = array_slice($users, max(0, $current_user_position - 3), 3);
        $users_below = array_slice($users, $current_user_position + 1, 3);

        // Top of the league - first 5 users
        $top_of_league = array_slice($users, 0, 5);

        // Bottom of the league - last 5 users
        $bottom_of_league = array_slice($users, -5);

        // Annotate these with their display names and rankings
        foreach ($top_of_league as $user) {
            $userdata = get_userdata($user->user_id);
            $user->display_name = esc_html($userdata->display_name);
        }

        foreach ($bottom_of_league as $user) {
            $userdata = get_userdata($user->user_id);
            $user->display_name = esc_html($userdata->display_name);
        }

        // Current user info
        $current_user = $users[$current_user_position] ?? null;

        // Set the template paths and escape them
        $template_row = esc_url(ACPGC_PLUGIN_TEMPLATE_DIR . "/league-row-template.php");
        $template_header = esc_url(ACPGC_PLUGIN_TEMPLATE_DIR . "/league-table-header.php");
        $template_footer = esc_url(ACPGC_PLUGIN_TEMPLATE_DIR . "/league-table-footer.php");

        // Create league table output
        $output = '';

        // Include table header template for "Top of the League"
        $league_heading = esc_html("Top of the League");
        $mod_class = esc_attr("--top-of-league");
        $output .= acpgc_template_with_vars($template_header, ['league_heading' => $league_heading, 'mod_class' => $mod_class]);

        // Populate table body for "Top of the League"
        $output .= '<tbody>';
        $i = 0;
        foreach ($top_of_league as $user) {
            $i++;
            $state_class_odd_even = esc_attr(($i % 2 === 0) ? 'is-row-even' : 'is-row-odd');
            $state_class_count = esc_attr('is-row-' . $i);
            $state_class = esc_attr($state_class_count . ' ' . $state_class_odd_even);
            $output .= acpgc_template_with_vars($template_row, ['user' => $user, 'state_class' => $state_class, 'mod_class' => $mod_class]);
        }
        $output .= '</tbody>';
        $output .= acpgc_template_with_vars($template_footer); // Include table footer

        // Include table header template for "Your League Position"
        $league_heading = esc_html("Your League Position");
        $mod_class = esc_attr("--users-position");
        $output .= acpgc_template_with_vars($template_header, ['league_heading' => $league_heading, 'mod_class' => $mod_class]);
        $output .= '<tbody>';

        // Users above the current user
        $i = 0;
        foreach ($users_above as $user) {
            $i++;
            $state_class_odd_even = esc_attr(($i % 2 === 0) ? 'is-row-even' : 'is-row-odd');
            $state_class_count = esc_attr('is-row-' . $i);
            $state_class = esc_attr($state_class_count . ' ' . $state_class_odd_even);
            $output .= acpgc_template_with_vars($template_row, ['user' => $user, 'state_class' => $state_class, 'mod_class' => $mod_class]);
        }

        // Current user row
        $i++;
        $state_class_odd_even = esc_attr(($i % 2 === 0) ? 'is-row-even' : 'is-row-odd');
        $state_class_count = esc_attr('is-row-' . $i);
        $state_class = esc_attr($state_class_count . ' ' . $state_class_odd_even . ' is-current-user');
        $output .= acpgc_template_with_vars($template_row, ['user' => $current_user, 'state_class' => $state_class, 'mod_class' => $mod_class]);

        // Users below the current user
        foreach ($users_below as $user) {
            $i++;
            $state_class_odd_even = esc_attr(($i % 2 === 0) ? 'is-row-even' : 'is-row-odd');
            $state_class_count = esc_attr('is-row-' . $i);
            $state_class = esc_attr($state_class_count . ' ' . $state_class_odd_even);
            $output .= acpgc_template_with_vars($template_row, ['user' => $user, 'state_class' => $state_class, 'mod_class' => $mod_class]);
        }
        $output .= '</tbody>';
        $output .= acpgc_template_with_vars($template_footer); // Include table footer

        // Include table header template for "Bottom of the League"
        $league_heading = esc_html("Bottom of the League");
        $mod_class = esc_attr("--bottom-of-league");
        $output .= acpgc_template_with_vars($template_header, ['league_heading' => $league_heading, 'mod_class' => $mod_class]);

        // Populate table body for "Bottom of the League"
        $output .= '<tbody>';
        foreach ($bottom_of_league as $user) {
            $i++;
            $state_class_odd_even = esc_attr(($i % 2 === 0) ? 'is-row-even' : 'is-row-odd');
            $state_class_count = esc_attr('is-row-' . $i);
            $state_class = esc_attr($state_class_count . ' ' . $state_class_odd_even);
            $output .= acpgc_template_with_vars($template_row, ['user' => $user, 'state_class' => $state_class, 'mod_class' => $mod_class]);
        }
        $output .= '</tbody>';
        $output .= acpgc_template_with_vars($template_footer); // Include table footer

        return $output;
    }

    public function acpgc_league_create_sc() {

        // Point to your template file's location
        $template_path = ACPGC_PLUGIN_TEMPLATE_DIR  . '/create-league-template.php';

        if (is_user_logged_in()) {
            return acpgc_template_with_vars($template_path);
        } else {
            return 'You must be logged in to create a league.';
        }
    }

    public function acpgc_create_league()
    {
        if(isset($_REQUEST['acpgc_create_league']))
        {

            if (!isset($_REQUEST['acpgc_create_league_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['acpgc_create_league_nonce'])), 'acpgc_create_league_action')) {
                wp_die('Security check failed');
            }


            // Check if league_name is set in the request and sanitize it
            $league_name = isset($_REQUEST['league_name']) ? sanitize_text_field(wp_unslash($_REQUEST['league_name'])) : '';

            // Proceed only if league_name is not empty
            if (empty($league_name))
            {
                // Handle the case where league_name is not provided
                return;
            }

            // Get the current user ID
            $current_user_id = get_current_user_id();

            // Create league post
            $league_id = wp_insert_post([
                'post_type' => 'acpgc_league',
                'post_status' => 'publish',
                'post_title' => $league_name,
                // add more fields here
            ]);

            // Set the current user as the member and owner
            if ($league_id)
            {
                update_field('league_members', [$current_user_id], $league_id); // array as you may add more users later
                update_field('league_owner', $current_user_id, $league_id);

                // Handle file upload
                if (!function_exists('media_handle_upload')) {
                    require_once(ABSPATH . 'wp-admin/includes/image.php');
                    require_once(ABSPATH . 'wp-admin/includes/file.php');
                    require_once(ABSPATH . 'wp-admin/includes/media.php');
                }

                // Check if the file upload is set and has no errors before proceeding
                if ( isset( $_FILES['feature_image'] ) && isset( $_FILES['feature_image']['error'] ) && $_FILES['feature_image']['error'] == UPLOAD_ERR_OK ) {
                    $attach_id = media_handle_upload('feature_image', $league_id);

                    if ( is_wp_error( $attach_id ) ) {
                        // There was an error uploading the image.
                    } else {
                        // Set the uploaded image as the post's featured image
                        set_post_thumbnail( $league_id, $attach_id );
                    }
                }
                // Redirect to a success page or the new league's page
                wp_redirect(get_permalink($league_id));
                exit;
            } else
            {
                // Handle the error, e.g., redirect to an error page
                // Ensure you define $error_page_id somewhere or replace it with a known error page ID
                wp_redirect(get_permalink($error_page_id));
                exit;
            }
        }
    }

    public function acpgc_league_templates($template) {
        global $post;
        $template_path = "";

        if (!$post) {
            return $template;
        }

        if ($post->post_type === 'acpgc_league') {
            $template_path = ACPGC_PLUGIN_TEMPLATE_DIR . '/league-template.php';
        }
        if (is_post_type_archive('acpgc_league')) {
            $template_path = ACPGC_PLUGIN_DIR . '/archive-acpgc_league.php';
        }

        if (file_exists($template_path)) {
            return $template_path;
        }

        return $template;
    }

    public function acpgc_league_check_invite() {
        global $post, $wpdb;

        if ($post && $post->post_type === 'acpgc_league') {
            if (isset($_GET['invite_token']) && isset($_GET['league_id'])) {
                // Validate and sanitize input values
                $token = sanitize_text_field(wp_unslash($_GET['invite_token']));
                $league_id = intval($_GET['league_id']);

                // SQL query to get the email based on the token and league_id
                $table_name = $wpdb->prefix . ACPGC_PREFIX . 'league_invites';
                $sanitized_table_name = esc_sql($table_name); // Sanitize the table name
                $result = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$sanitized_table_name} WHERE `invite_token` = %s AND `league_id` = %d", $token, $league_id));

                $current_user = wp_get_current_user();

                // Verify the token and league_id match a database record
                if ($result) {
                    $retrieved_email = $result->email;

                    if (is_user_logged_in()) {
                        if ($current_user->user_email === $retrieved_email) {
                            set_transient("acpgc_added_to_league_{$current_user->ID}", get_the_title($league_id), 60);

                            // SQL to delete the invite from the table
                            $wpdb->delete($table_name, ['id' => $result->id]);

                            // Get existing league members
                            $existing_members = get_field('league_members', $league_id);

                            // Add current user to the array of existing members
                            $existing_members[] = $current_user->ID;

                            // Update the custom field with the new array of members
                            update_field('league_members', $existing_members, $league_id);
                        } else {
                            set_transient("acpgc_invalid_token_{$current_user->ID}", 'Sorry, the link you clicked is not valid', 60);
                        }
                    } else {
                        // The user is not logged in, so store the invite token in a cookie
                        setcookie('invite_token', $token, time() + 3600, '/');
                        setcookie('league_id', $league_id, time() + 3600, '/');

                        // Redirect to login with the invite details
                        $redirect_to = '';
                        if (isset($_SERVER['REQUEST_URI'])) {
                            $redirect_to = add_query_arg(array(
                                'redirect_to' => urlencode(esc_url_raw(wp_unslash($_SERVER['REQUEST_URI']))),
                                'reason'      => 'not_logged_in',
                            ), wp_login_url());
                        }

                        if ($redirect_to) {
                            wp_redirect($redirect_to);
                            exit;
                        }
                    }
                } else {
                    // Invalid token or league ID, show an error message
                    set_transient("acpgc_invalid_token_{$current_user->ID}", 'Sorry, the link you clicked is no longer valid', 60);
                }
            }
        }
    }


}



