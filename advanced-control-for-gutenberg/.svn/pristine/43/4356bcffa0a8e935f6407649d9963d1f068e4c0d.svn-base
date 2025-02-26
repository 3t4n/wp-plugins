<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://refact.co
 * @since      1.0.0
 *
 * @package    ACFG
 * @subpackage ACFG/admin
 */

namespace Refact\ACFG;

use Refact\ACFG\RuleSet;

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    ACFG
 * @subpackage ACFG/admin
 * @author     Refact <info@refact.co>
 */
class ACFG_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $acfg    The ID of this plugin.
     */
    private $acfg;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string  $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param    string $acfg   The name of this plugin.
     * @param    string $version              The version of this plugin.
     */
    public function __construct( $acfg, $version )
    {

        $this->acfg = $acfg;
        $this->version            = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in ACFG_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The ACFG_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style( 'jquery-ui-sortable' );
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in ACFG_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The ACFG_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script( 'jquery-ui-sortable' );
        wp_enqueue_script(
            $this->acfg,
            plugin_dir_url( __FILE__ ) . 'js/acfg-admin.js',
            array( 'jquery' ),
            $this->version,
            false
        );

        wp_localize_script(
            $this->acfg,
            're_acfg',
            array(
                'endpoint_url' => get_rest_url(
                    null,
                    're_acfg/v1'
                ),
                'nonce'        => wp_create_nonce( 'wp_rest' ),
            )
        );
    }

    /**
     * Add admin menu
     *
     * @since 1.0.0
     * @return void
     */
    public function add_admin_menu()
    {
        add_submenu_page(
            'options-general.php',
            __( 'Advanced Control for Gutenberg', 'advanced-control-for-gutenberg'),
            __( 'Advanced Control for Gutenberg', 'advanced-control-for-gutenberg'),
            'manage_options',
            'acfg',
            array( $this, 'render_dashboard_page' )
        );

        add_submenu_page(
            null,
            __( 'Add Rules', 'advanced-control-for-gutenberg'),
            __( 'Add Rules', 'advanced-control-for-gutenberg'),
            'manage_options',
            'acfg-add-rules',
            array( $this, 'render_add_rule_page' )
        );
    }

    /**
     * Fix admin menu current
     * when we are in add rule page
     * 
     * @since 1.0.0
     * @return void
     */
    public function fix_admin_menu_current() {
        global $plugin_page, $current_screen;
        
        if ( 'settings_page_acfg-add-rules' === $current_screen->id ) {
            $plugin_page = 'acfg';
        }
    }

    /**
     * Add dashboard temolate
     *
     * @since 1.0.0
     * @return void
     */
    public function render_dashboard_page()
    {
        $rules = get_option( ACFG_RULE_OPTION_NAME, array() );
        include_once ACFG_PATH
                    . 'admin/partials/acfg-admin-dashboard.php';
    }

    /**
     * Add rule template
     *
     * @since 1.0.0
     * @return void
     */
    public function render_add_rule_page()
    {
        include_once ACFG_PATH
                    . 'admin/partials/acfg-admin-add-rule.php';
    }

    /**
     * Register endpoints
     *
     * @since 1.0.0
     * @return void
     */
    public function register_rest_routes()
    {
        register_rest_route(
            're_acfg/v1',
            '/save_settings',
            array(
                'methods'             => 'POST',
                'callback'            => array( $this, 'save_settings' ),
                'permission_callback' => array( $this, 'permissions_check' ),
            )
        );

        register_rest_route(
            're_acfg/v1',
            '/delete_ruleset',
            array(
                'methods'             => 'POST',
                'callback'            => array( $this, 'delete_ruleset' ),
                'permission_callback' => array( $this, 'permissions_check' ),
            )
        );

        register_rest_route(
            're_acfg/v1',
            '/clone_ruleset',
            array(
                'methods'             => 'POST',
                'callback'            => array( $this, 'clone_ruleset' ),
                'permission_callback' => array( $this, 'permissions_check' ),
            )
        );

        register_rest_route(
            're_acfg/v1',
            '/sort_ruleset',
            array(
                'methods'             => 'POST',
                'callback'            => array( $this, 'sort_ruleset' ),
                'permission_callback' => array( $this, 'permissions_check' ),
            )
        );

        register_rest_route(
            're_acfg/v1',
            '/search_users',
            array(
                'methods'             => 'POST',
                'callback'            => array( $this, 'search_users' ),
                'permission_callback' => array( $this, 'permissions_check' ),
            )
        );
    }

    /**
     * Check permissions
     *
     * @since 1.0.0
     * @return boolean
     */
    public function permissions_check()
    {
        return current_user_can( 'manage_options' );
    }

    /**
     * Search users
     *
     * @since 1.0.0
     * @param WP_REST_Request $req Request object.
     * @return JSON array
     */
    public function save_settings( $req )
    {
        $current_index       = $req->get_param( 'index' );
        $rule_name           = $req->get_param( 'rule_name' );
        $rule_status         = $req->get_param( 'rule_status' );
        $rule_set            = $req->get_param( 'rule_set' );
        $rule_action         = $req->get_param( 'rule_action' );
        $rule_support_action = $req->get_param( 'rule_support_action' );
        $blocks              = $req->get_param( 'blocks' );
        $categories          = $req->get_param( 'categories' );
        $supports            = $req->get_param( 'supports' );

        if ( empty( $rule_name ) ) {
            return array(
                'success' => false,
                'message' => __( 'Rule name is required', 'advanced-control-for-gutenberg'),
            );
        }

        if ( empty( $rule_set ) ) {
            return array(
                'success' => false,
                'message' => __( 'Rule set is required', 'advanced-control-for-gutenberg'),
            );
        }

        foreach ( $rule_set as $index => $rule ) {
            if ( empty( $rule ) ) {
                return array(
                    'success' => false,
                    'message' => __( 'Rule set is required', 'advanced-control-for-gutenberg'),
                );
            }

            if ( empty( $rule['type'] )
                || empty( $rule['operand'] )
                || empty( $rule['ruleValues'] ) ) {
                return array(
                    'success' => false,
                    'message' => __( 'Please fill all the fields of a rule', 'advanced-control-for-gutenberg'),
                    'index'   => $index,
                );
            }

            if ( ! empty( $rule['ands'] ) ) {
                foreach ( $rule['ands'] as $and_index => $and ) {
                    if ( empty( $and['type'] )
                        || empty( $and['operand'] )
                        || empty( $and['ruleValues'] ) ) {
                        return array(
                            'success'   => false,
                            'message'   => __( 'Please fill all the fields of a rule', 'advanced-control-for-gutenberg'),
                            'index'     => $index,
                            'and_index' => $and_index,
                        );
                    }
                }
            }
        }

        if ( empty( $rule_action ) ) {
            return array(
                'success' => false,
                'message' => __( 'Rule action is required', 'advanced-control-for-gutenberg'),
            );
        }

        if ( 'enable_blocks_by_category' !== $rule_action && 'disable_blocks_by_category' !== $rule_action && empty( $blocks ) ) {
            return array(
                'success' => false,
                'message' => __( 'Blocks are required', 'advanced-control-for-gutenberg'),
            );
        }

        if ( 'enable_settings' === $rule_action
            || 'disable_settings' === $rule_action ) {
            if ( empty( $supports ) ) {
                return array(
                    'success' => false,
                    'message' => __( 'Supports are required', 'advanced-control-for-gutenberg'),
                );
            }
        }

        if ( 'enable_blocks_by_category' === $rule_action
        || 'disable_blocks_by_category' === $rule_action ) {
            if ( empty( $categories ) ) {
                return array(
                    'success' => false,
                    'message' => __( 'Categories are required', 'advanced-control-for-gutenberg'),
                );
            }
        }

        $rules = get_option( ACFG_RULE_OPTION_NAME, array() );

        $changed_index = false;
        if ( '0' === $current_index || ! empty( $current_index ) ) {
            $rules[ $current_index ] = array(
                'rule_name'           => $rule_name,
                'rule_status'         => $rule_status,
                'rule_set'            => $rule_set,
                'rule_action'         => $rule_action,
                'rule_support_action' => $rule_support_action,
                'blocks'              => $blocks,
                'categories'          => $categories,
                'supports'            => $supports,
            );
            $changed_index           = $current_index;
        } else {
            $rules[]       = array(
                'rule_name'           => $rule_name,
                'rule_status'         => $rule_status,
                'rule_set'            => $rule_set,
                'rule_action'         => $rule_action,
                'rule_support_action' => $rule_support_action,
                'blocks'              => $blocks,
                'categories'          => $categories,
                'supports'            => $supports,
            );
            $changed_index = count( $rules ) - 1;
        }

        update_option( ACFG_RULE_OPTION_NAME, $rules, false );

        return array(
            'success' => true,
            'message' => 'Saved successfully',
            'index'   => $changed_index,
        );
    }

    /**
     * Delete a ruleset
     *
     * @since   1.0.0
     * @param   WP_REST_Request $req Request object.
     * @return  JSON                 Response.
     */
    public function delete_ruleset( $req )
    {
        $current_index = $req->get_param( 'index' );
        $rules         = get_option( ACFG_RULE_OPTION_NAME, array() );

        if ( '0' === $current_index || ! empty( $current_index ) ) {
            unset( $rules[ $current_index ] );
        }

        $result = update_option( ACFG_RULE_OPTION_NAME, $rules, false );

        if ( $result ) {
            return array(
                'success' => true,
                'message' => __( 'Deleted successfully', 'advanced-control-for-gutenberg'),
            );
        } else {
            return array(
                'success' => false,
                'message' => __( 'Something went wrong', 'advanced-control-for-gutenberg'),
            );
        }
    }

    /**
     * Clone a ruleset
     *
     * @since   1.0.0
     * @param   WP_REST_Request $req Request object.
     * @return  JSON                 Response.
     */
    public function clone_ruleset( $req )
    {
        $current_index     = intval( $req->get_param( 'index' ) );
        $rules             = get_option(
            ACFG_RULE_OPTION_NAME,
            array()
        );
        $rule              = $rules[ $current_index ];
        $rule['rule_name'] = sprintf(
            // translators: %s: rule name.
            __( 'Copy of %s', 'advanced-control-for-gutenberg'),
            $rule['rule_name']
        );
        // splice in at position 3.
        array_splice( $rules, $current_index, 0, array( $rule ) );
        $result = update_option(
            ACFG_RULE_OPTION_NAME,
            $rules,
            false
        );

        if ( $result ) {
            return array(
                'success' => true,
                'message' => __( 'Cloned successfully', 'advanced-control-for-gutenberg'),
                'nonce'   => wp_create_nonce( 'sg_duplicate_rule' ),
            );
        } else {
            return array(
                'success' => false,
                'message' => __( 'Something went wrong', 'advanced-control-for-gutenberg'),
            );
        }
    }

    /**
     * Sort ruleset
     *
     * @since   1.0.0
     * @param   WP_REST_Request $req Request object.
     * @return  JSON                 Response.
     */
    public function sort_ruleset( $req )
    {
        $final_index   = intval( $req->get_param( 'final_index' ) );
        $current_index = intval( $req->get_param( 'current_index' ) );
        $rules         = get_option(
            ACFG_RULE_OPTION_NAME,
            array()
        );
        $rule          = $rules[ $current_index ];
        unset( $rules[ $current_index ] );

        // splice in at position 3.
        array_splice( $rules, $final_index, 0, array( $rule ) );
        $result = update_option(
            ACFG_RULE_OPTION_NAME,
            $rules,
            false
        );

        if ( $result ) {
            return array(
                'success' => true,
                'message' => __( 'Sorted successfully', 'advanced-control-for-gutenberg'),
            );
        } else {
            return array(
                'success' => false,
                'message' => __( 'Something went wrong', 'advanced-control-for-gutenberg'),
            );
        }
    }

    /**
     * Search users
     *
     * @since   1.0.0
     * @param   WP_REST_Request $req Request object.
     * @return  JSON                 Response.
     */
    public function search_users( $req )
    {
        $query = $req->get_param( 'query' );
        $users = array();
        $displayNames = array();

        if ( empty( $query ) || mb_strlen( $query ) < 3 ) {
            return $users;
        }

        $users_obj = get_users(
            array(
                'search'         => '*' . $query . '*',
                'search_columns' => array(
                    'display_name',
                    'user_login',
                    'user_email',
                    'user_nicename',
                ),
                'number'         => 100,
                'fields'         => array(
                    'ID',
                    'user_login',
                    'user_email',
                    'display_name',
                ),
            )
        );

        // make display names to be unique when appearing in settings page list
        if ( ! empty( $users_obj ) ) {
            foreach ( $users_obj as $user ) {
                $displayName = $user->display_name;
                if (isset($displayNames[$displayName])) {
                    $displayNames[$displayName]++;
                    $displayName .= ' (' . $displayNames[$displayName] . ')';
                } else {
                    $displayNames[$displayName] = 0;
                }
                $users[ $user->ID ] = array(
                    'user_login'   => $user->user_login,
                    'user_email'   => $user->user_email,
                    'display_name' => $displayName,
                );
            }
        }

        return $users;
    }

    /**
     * Filter allowed post types
     *
     * @since   1.0.0
     * @param   array   $blocks WP allowed blocks.
     * @param   WP_Post $post_object Post object.
     * @return  array   filtered blocks.
     */
    public static function allowed_block_types( $blocks, $post_object )
    {
        // Get all registered blocks
        $block_list = \WP_Block_Type_Registry::get_instance()->get_all_registered();

        // Create an array with block keys
        $all_blocks = array_keys($block_list);

        // Get the post type
        $post_type = $post_object->post->post_type;

        // Get the rules
        $rules = get_option(ACFG_RULE_OPTION_NAME, array());

        // Get the rule map
        $rule_map = RuleSet::rule_map($rules, $post_type);

        // If rule map is empty, return the blocks
        if (empty($rule_map)) {
            return $blocks;
        }

        // Get the disallowed blocks
        $disallowed_blocks = RuleSet::action_map($rule_map, 'block', $block_list);

        // If disallowed blocks are empty, return the blocks
        if (empty($disallowed_blocks)) {
            return $blocks;
        }

        // Initialize allowed block types
        $allowed_block_types = $all_blocks;

        // If 'all' exists in the disallowed blocks, remove items preceding it
        if (isset($disallowed_blocks['all'])) {
            $all_position = array_search('all', array_keys($disallowed_blocks));
            $allowed_block_types = $disallowed_blocks['all'] ? $all_blocks : [];
            $disallowed_blocks = array_slice($disallowed_blocks, $all_position + 1);
        }

        // If new disallowed blocks are empty, return the allowed block types
        if(empty($disallowed_blocks)){
            return $allowed_block_types;
        }

        // Update allowed block types based on disallowed blocks
        foreach ($disallowed_blocks as $block_name => $block_value) {
            if ($block_value && !in_array($block_name, $allowed_block_types)) {
                $allowed_block_types[] = $block_name;
            } elseif (!$block_value && in_array($block_name, $allowed_block_types)) {
                $allowed_block_types = array_values(array_diff($allowed_block_types, [$block_name]));
            }
        }

        return $allowed_block_types;
    }


    /**
     * Filter block support
     *
     * @since   1.0.0
     * @param   array $metadata block meta data.
     * @return  array Filtered metadata.
     */
    public static function disallowed_block_support( $metadata )
    {

        if ( !isset( $metadata['supports'] ) ) {
            return $metadata;
        }

        $rules = get_option( ACFG_RULE_OPTION_NAME, array() );

        $rule_map = RuleSet::rule_map( $rules );
        if ( empty( $rule_map ) ) {
            return $metadata;
        }

        $disallowed_blocks = RuleSet::action_map( $rule_map, 'setting' );
        if ( empty( $disallowed_blocks ) ) {
            return $metadata;
        }

        $block_name = $metadata['name'];
        $support = [];
        foreach ($disallowed_blocks as $block_key => $block_support) {
            if ($block_name === 'all') {
                if (strpos($block_key, 'all_') === 0) {
                    $support = array_merge($support, $block_support);
                }
            } else {
                if (strpos($block_key, $block_name . '_') === 0 || strpos($block_key, 'all_') === 0) {
                    $support = array_merge($support, $block_support);
                }
            }
        }

        if(empty($support)){
            return $metadata; 
        }

        foreach ($support as $key => $value) {
            if (stripos($key, ':')) {
                $key_parts = explode(':', $key);
    
                if (stripos($key, ':v:')) {
                    if (count($key_parts) === 3) {
                        if ($value) {
                            $metadata['supports'][$key_parts[0]] = $key_parts[2];
                        } elseif (isset($metadata['supports'][$key_parts[0]])) {
                            $metadata['supports'][$key_parts[0]] = is_array($metadata['supports'][$key_parts[0]])
                                ? $metadata['supports'][$key_parts[0]]
                                : array();
                            $key = array_search($key_parts[2], $metadata['supports'][$key_parts[0]]);
                            if ($key !== false) {
                                unset($metadata['supports'][$key_parts[0]][$key]);
                            }
                        }
                    } elseif (count($key_parts) === 4) {
                        if ($value) {
                            $metadata['supports'][$key_parts[0]][$key_parts[1]] = $key_parts[3];
                        } elseif (isset($metadata['supports'][$key_parts[0]][$key_parts[1]])) {
                            $key = array_search($key_parts[3], $metadata['supports'][$key_parts[0]][$key_parts[1]]);
                            if ($key !== false) {
                                unset($metadata['supports'][$key_parts[0]][$key_parts[1]][$key]);
                            }
                        }
                    }
                } elseif ( count($key_parts) === 2 && isset($metadata['supports'][$key_parts[0]]) ) {
                    if (!is_array($metadata['supports'][$key_parts[0]])) {
                        $metadata['supports'][$key_parts[0]] = array();
                    }
                    $metadata['supports'][$key_parts[0]][$key_parts[1]] = $value;
                } elseif ( count($key_parts) === 3 && isset($metadata['supports'][$key_parts[0]][$key_parts[1]]) ) {
                    if (!is_array($metadata['supports'][$key_parts[0]][$key_parts[1]])) {
                        $metadata['supports'][$key_parts[0]][$key_parts[1]] = array();
                    }
                    $metadata['supports'][$key_parts[0]][$key_parts[1]][$key_parts[2]] = $value;
                } elseif ( count($key_parts) === 4 && isset($metadata['supports'][$key_parts[0]][$key_parts[1]][$key_parts[2]]) ) {
                    if (!is_array($metadata['supports'][$key_parts[0]][$key_parts[1]][$key_parts[2]])) {
                        $metadata['supports'][$key_parts[0]][$key_parts[1]][$key_parts[2]] = array();
                    }
                    $metadata['supports'][$key_parts[0]][$key_parts[1]][$key_parts[2]][$key_parts[3]] = $value;
                }
            } else {
                $metadata['supports'][$key] = $value;
            }
        }

        return $metadata;
    }
}
