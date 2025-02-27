<?php
/**
 * Agent Post Types
 *
 * Registers post types and taxonomies.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Post types Class.
 */
class CRE_Agent {

    /**
     * instance.
     *
     * @var CRE_Agent
     */
    public static $_instance;

    /**
     * Constructor.
     */
    public function __construct() {

        add_action('init', array($this, 'register_post_types'), 5);
        add_action('manage_agent_posts_custom_column', array($this, 'cre_agent_custom_columns'), 10, 2);

        add_filter('manage_edit-agent_columns', array($this, 'cre_agent_edit_columns'));
    }

    /**
     * Provides instance.
     */
    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Register the custom post type.
     *
     * @link https://developer.wordpress.org/reference/functions/register_post_type/
     */
    public function register_post_types() {

        if ( ! is_blog_installed() || post_type_exists( apply_filters('cre_agent_slug', esc_html__('agent', 'crucial-real-estate') ) ) ) {
            return;
        }

        $custom_post_types = self::cre_agent_post_args();

        foreach ($custom_post_types as $key => $value) {

            $labels = array(
                'name'                  => esc_html_x($value['general_name'], 'Post Type General Name', 'crucial-real-estate'),
                'singular_name'         => esc_html_x($value['singular_name'], 'Post Type Singular Name', 'crucial-real-estate'),
                'menu_name'             => esc_html__($value['menu_name'], 'crucial-real-estate'),
                'name_admin_bar'        => esc_html__($value['singular_name'], 'crucial-real-estate'),
                'archives'              => esc_html__($value['singular_name'] . ' Archives', 'crucial-real-estate'),
                'attributes'            => esc_html__($value['singular_name'] . ' Attributes', 'crucial-real-estate'),
                'parent_item_colon'     => esc_html__('Parent ' . $value['singular_name'] . ':', 'crucial-real-estate'),
                'all_items'             => esc_html__('All ' . $value['general_name'], 'crucial-real-estate'),
                'add_new_item'          => esc_html__('Add New ' . $value['singular_name'], 'crucial-real-estate'),
                'add_new'               => esc_html__('Add New', 'crucial-real-estate'),
                'new_item'              => esc_html__('New ' . $value['singular_name'], 'crucial-real-estate'),
                'edit_item'             => esc_html__('Edit ' . $value['singular_name'], 'crucial-real-estate'),
                'update_item'           => esc_html__('Update ' . $value['singular_name'], 'crucial-real-estate'),
                'view_item'             => esc_html__('View ' . $value['singular_name'], 'crucial-real-estate'),
                'view_items'            => esc_html__('View ' . $value['general_name'], 'crucial-real-estate'),
                'search_items'          => esc_html__('Search ' . $value['singular_name'], 'crucial-real-estate'),
                'not_found'             => esc_html__('Not found', 'crucial-real-estate'),
                'not_found_in_trash'    => esc_html__('Not found in Trash', 'crucial-real-estate'),
                'featured_image'        => esc_html__('Featured Image', 'crucial-real-estate'),
                'set_featured_image'    => esc_html__('Set featured image', 'crucial-real-estate'),
                'remove_featured_image' => esc_html__('Remove featured image', 'crucial-real-estate'),
                'use_featured_image'    => esc_html__('Use as featured image', 'crucial-real-estate'),
                'insert_into_item'      => esc_html__('Insert into ' . $value['singular_name'], 'crucial-real-estate'),
                'uploaded_to_this_item' => esc_html__('Uploaded to this ' . $value['singular_name'], 'crucial-real-estate'),
                'items_list'            => esc_html__($value['general_name'] . ' list', 'crucial-real-estate'),
                'items_list_navigation' => esc_html__($value['general_name'] . ' list navigation', 'crucial-real-estate'),
                'filter_items_list'     => esc_html__('Filter ' . $value['general_name'] . 'list', 'crucial-real-estate'),
            );

            $args = array(
                'label'                 => esc_html__($value['singular_name'] . '', 'crucial-real-estate'),
                'description'           => esc_html__($value['singular_name'] . ' Post Type', 'crucial-real-estate'),
                'labels'                => $labels,
                'supports'              => $value['supports'],
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => $value['show_in_menu'],
                'show_in_rest'          => true,
                'menu_icon'             => $value['dashicon'],
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => $value['show_in_nav_menus'],
                'can_export'            => true,
                'has_archive'           => $value['has_archive'],
                'exclude_from_search'   => $value['exclude_from_search'],
                'publicly_queryable'    => true,
                'capability_type'       => $value['capability_type'],
                'rewrite'               => $value['rewrite'],
            );
            register_post_type($key, $args);
            self::flush_rewrite_rules();
        }
    }

    /**
     * Flush rewrite rules.
     */
    public static function flush_rewrite_rules() {
        flush_rewrite_rules();
    }

    /**
     * Get post types arguments
     *
     * @return array of default settings
     */
    public static function cre_agent_post_args() {

        return array(

            'agent'                    => array(
                'menu_name'             => esc_html__('Agents', 'crucial-real-estate'),
                'singular_name'         => esc_html__('Agent', 'crucial-real-estate'),
                'general_name'          => esc_html__('Agents', 'crucial-real-estate'),
                'dashicon'              => 'dashicons-groups',
                'has_archive'           => false,
                'exclude_from_search'   => true,
                'show_in_nav_menus'     => true,
                'show_in_menu'          => false,
                'capability_type'       => 'post',
                'supports'              => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
                'rewrite'               => array('slug' => apply_filters('cre_agent_slug', esc_html__('agent', 'crucial-real-estate')),'with_front' => false),
            ),
        );
    }

    /**
     * Custom columns for agencies.
     *
     * @param array $columns - Columns array.
     *
     * @return array
     */
    public function cre_agent_edit_columns($columns) {

        $columns = array(
            'cb'               => '<input type="checkbox" />',
            'title'            => esc_html__('Agent', 'crucial-real-estate'),
            'agent-thumbnail'  => esc_html__('Thumbnail', 'crucial-real-estate'),
            'total_properties' => esc_html__('Total Properties', 'crucial-real-estate'),
            'published'        => esc_html__('Published Properties', 'crucial-real-estate'),
            'others'           => esc_html__('Other Properties', 'crucial-real-estate'),
            'date'             => esc_html__('Created', 'crucial-real-estate'),
        );

        /**
         * WPML Support
         */
        if ( defined('ICL_SITEPRESS_VERSION') ) {
            global $sitepress;
            $wpml_columns = new WPML_Custom_Columns($sitepress);
            $columns      = $wpml_columns->add_posts_management_column($columns);
        }

        /**
         * Reverse the array for RTL
         */
        if ( is_rtl() ) {
            $columns = array_reverse($columns);
        }

        return $columns;
    }


    /**
     * Custom column values for agent post type.
     *
     * @param string $column - Name of the column.
     * @param int $agent_id  - ID of the current agent.
     *
     * @since 1.0.0
     */
    public function cre_agent_custom_columns($column, $agent_id) {

        // Switch cases against column names.
        switch ($column) {
            case 'agent-thumbnail':
                if (has_post_thumbnail()) {
                    ?>
                    <a href="<?php the_permalink(); ?>" target="_blank">
                        <?php the_post_thumbnail(array(130, 130)); ?>
                    </a>
                    <?php
                } else {
                    esc_html_e('No Thumbnail', 'crucial-real-estate');
                }
                break;
            // Total properties.
            case 'total_properties':
                $listed_properties = cre_get_agent_properties_count($agent_id);
                echo (!empty($listed_properties)) ? esc_html($listed_properties) : 0;
                break;
            // Total properties.
            case 'published':
                $published_properties = cre_get_agent_properties_count($agent_id, 'publish');
                echo (!empty($published_properties)) ? esc_html($published_properties) : 0;
                break;
            // Published properties.
            case 'others':
                $property_status   = array('pending', 'draft', 'private', 'future');
                $others_properties = cre_get_agent_properties_count($agent_id, $property_status);
                echo (!empty($others_properties)) ? esc_html($others_properties) : 0;
                break;
            // Other properties.
            default:
                break;
        }
    }
}

/**
 * Initialize cre agent class.
 */
function cre_agent() {
    return CRE_Agent::instance();
}
cre_agent();
