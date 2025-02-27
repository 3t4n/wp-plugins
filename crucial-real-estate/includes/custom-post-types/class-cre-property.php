<?php
/**
 * Property Post Types
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
class CRE_Property {

    /**
     * instance.
     *
     * @var CRE_Property
     */
    public static $_instance;

    /**
     * Constructor.
     */
    public function __construct() {

        add_action('init', array($this, 'register_post_types'), 5);
        add_action( 'init', array( $this, 'register_taxonomies' ), 0 );
        add_action('manage_property_posts_custom_column', array($this, 'cre_property_custom_columns'), 10, 2);
        add_action('restrict_manage_posts', array($this, 'cre_properties_filter_fields_admin'));
        add_action('pre_get_posts', array($this, 'cre_properties_filter_admin'));
        add_action('pre_get_posts', array($this, 'cre_price_orderby'));

        add_filter('manage_edit-property_columns', array($this, 'cre_property_edit_columns'));
        add_filter('manage_edit-property_sortable_columns', array($this, 'cre_sortable_price_column'));

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
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    public function register_post_types() {

        if ( ! is_blog_installed() || post_type_exists( apply_filters('cre_property_slug', esc_html__('property', 'crucial-real-estate') ) ) ) {
            return;
        }

        $custom_post_types = self::cre_property_post_args();

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
                'hierarchical'          => true,
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
                'menu_position'         => 5,
                'query_var'             => true,
            );
            register_post_type($key, $args);
            self::flush_rewrite_rules();
        }
    }

    /**
     * Register a taxonomy, post_types_categories for the post types.
     *
     * @link https://codex.wordpress.org/Function_Reference/register_taxonomy
     */
    public function register_taxonomies() {

        if ( ! is_blog_installed() ) {
            return;
        }

        // Add new taxonomy, make it hierarchical
        $custom_taxonomy_types = self::cre_property_taxonomy_args();

        if ( $custom_taxonomy_types ) {

            foreach ( $custom_taxonomy_types as $key =>  $value ) {

                if ( 'category' == $value['hierarchical'] ) {

                    // Add new taxonomy, make it hierarchical (like categories)
                    $labels = array(
                        'name'              => esc_html_x( $value['general_name'], 'taxonomy general name', 'crucial-real-estate' ),
                        'singular_name'     => esc_html_x( $value['singular_name'], 'taxonomy singular name', 'crucial-real-estate' ),
                        'search_items'      => esc_html__( 'Search ' . $value['general_name'], 'crucial-real-estate' ),
                        'all_items'         => esc_html__( 'All ' . $value['general_name'], 'crucial-real-estate' ),
                        'parent_item'       => esc_html__( 'Parent ' . $value['general_name'], 'crucial-real-estate' ),
                        'parent_item_colon' => esc_html__( 'Parent ' . $value['general_name'] .':', 'crucial-real-estate' ),
                        'edit_item'         => esc_html__( 'Edit ' . $value['general_name'] , 'crucial-real-estate' ),
                        'update_item'       => esc_html__( 'Update '  . $value['general_name'] , 'crucial-real-estate' ),
                        'add_new_item'      => esc_html__( 'Add New ' . $value['general_name'], 'crucial-real-estate' ),
                        'new_item_name'     => esc_html__( 'New ' . $value['general_name'] .' Name', 'crucial-real-estate' ),
                        'menu_name'         => esc_html__( $value['general_name'], 'crucial-real-estate' ),
                    );

                    $args = array(
                        'hierarchical'      => true,
                        'labels'            => $labels,
                        'show_ui'           => true,
                        'show_in_menu'      => 'crucial-real-estate',
                        'show_admin_column' => true,
                        'show_in_nav_menus' => true,
                        'show_in_rest'      => true,
                        'rewrite'           => array( 'slug' => $value['slug'], 'hierarchical' => true, 'with_front' => false ),
                    );
                    register_taxonomy( $key, $value['post_type'], $args );

                }

                if ( 'tag' == $value['hierarchical'] ) {

                    $labels = array(
                        'name'                       => esc_html_x( $value['general_name'], 'taxonomy general name', 'crucial-real-estate' ),
                        'singular_name'              => esc_html_x( $value['singular_name'], 'taxonomy singular name', 'crucial-real-estate' ),
                        'search_items'               => esc_html__( 'Search ' . $value['general_name'], 'crucial-real-estate' ),
                        'popular_items'              => esc_html__( 'Popular ' .$value['general_name'], 'crucial-real-estate' ),
                        'all_items'                  => esc_html__( 'All ' . $value['general_name'], 'crucial-real-estate' ),
                        'parent_item'                => null,
                        'parent_item_colon'          => null,
                        'edit_item'                  => esc_html__( 'Edit ' .$value['singular_name'], 'crucial-real-estate' ),
                        'update_item'                => esc_html__( 'Update '. $value['singular_name'], 'crucial-real-estate' ),
                        'add_new_item'               => esc_html__( 'Add New ' .$value['singular_name'], 'crucial-real-estate' ),
                        'new_item_name'              => esc_html__( 'New ' . $value['singular_name'] . ' Name', 'crucial-real-estate' ),
                        'separate_items_with_commas' => esc_html__( 'Separate ' . strtolower($value['general_name'] ) . ' with commas', 'crucial-real-estate' ),
                        'add_or_remove_items'        => esc_html__( 'Add or remove ' . strtolower($value['general_name'] ), 'crucial-real-estate' ),
                        'choose_from_most_used'      => esc_html__( 'Choose from the most used '. strtolower($value['general_name'] ), 'crucial-real-estate' ),
                        'not_found'                  => esc_html__( 'No ' . strtolower($value['general_name'] ) . ' found.', 'crucial-real-estate' ),
                        'menu_name'                  => esc_html__( $value['general_name'], 'crucial-real-estate' ),
                    );

                    $args = array(
                        'hierarchical'      => false,
                        'labels'            => $labels,
                        'show_ui'           => true,
                        'show_admin_column' => true,
                        'show_in_nav_menus' => true,
                        'show_in_rest'      => true,
                        'rewrite'           => array( 'slug' => $value['slug'], 'hierarchical' => true, 'with_front' => false ),
                    );
                    register_taxonomy( $key, $value['post_type'], $args );

                }

            }

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
    public static function cre_property_post_args() {

        return array(
            'property'                    => array(
                'menu_name'             => esc_html__('Properties', 'crucial-real-estate'),
                'singular_name'         => esc_html__('Property', 'crucial-real-estate'),
                'general_name'          => esc_html__('Properties', 'crucial-real-estate'),
                'dashicon'              => 'dashicons-building',
                'has_archive'           => true,
                'exclude_from_search'   => false,
                'show_in_nav_menus'     => false,
                'show_in_menu'          => 'crucial-real-estate',
                'capability_type'       => 'post',
                'supports'              => array('title','editor','thumbnail','revisions','author','page-attributes','excerpt','comments'),
                'rewrite'               => array('slug' => apply_filters('cre_property_slug', esc_html__('property', 'crucial-real-estate')), 'with_front' => false),
            ),
        );
    }

    /**
     * Get taxonomy types arguments
     *
     * @return array of default settings
     */
    public static function cre_property_taxonomy_args() {

        return array(
            'property-feature' => array(
                'hierarchical'      => 'category',
                'slug'              => 'property-feature',
                'singular_name'     => esc_html__('Property Feature', 'crucial-real-estate'),
                'general_name'	    => esc_html__('Property Features', 'crucial-real-estate'),
                'post_type'         => array( 'property' ),
            ),
            'property-type' => array(
                'hierarchical'      => 'category',
                'slug'              => 'property-type',
                'singular_name'     => esc_html__('Property Type', 'crucial-real-estate'),
                'general_name'	    => esc_html__('Property Types', 'crucial-real-estate'),
                'post_type'         => array( 'property' ),
            ),
            'property-location' => array(
                'hierarchical'      => 'category',
                'slug'              => 'property-location',
                'singular_name'     => esc_html__('Property Location', 'crucial-real-estate'),
                'general_name'	    => esc_html__('Property Locations', 'crucial-real-estate'),
                'post_type'         => array( 'property' ),
            ),
            'property-status' => array(
                'hierarchical'      => 'category',
                'slug'              => 'property-status',
                'singular_name'     => esc_html__('Property Status', 'crucial-real-estate'),
                'general_name'	    => esc_html__('Property Statuses', 'crucial-real-estate'),
                'post_type'         => array( 'property' ),
            ),
        );
    }

    /**
     * Custom columns for properties
     *
     * @param array $columns - Columns array.
     *
     * @return array
     */
    public function cre_property_edit_columns($columns) {

        $columns = array(
            'cb'                 => '<input type="checkbox" />',
            'title'              => esc_html__('Property Title', 'crucial-real-estate'),
            'property-thumbnail' => esc_html__('Thumbnail', 'crucial-real-estate'),
            'city'               => esc_html__('Location', 'crucial-real-estate'),
            'type'               => esc_html__('Type', 'crucial-real-estate'),
            'status'             => esc_html__('Status', 'crucial-real-estate'),
            'price'              => esc_html__('Price', 'crucial-real-estate'),
            'id'                 => esc_html__('Property ID', 'crucial-real-estate'),
            'date'               => esc_html__('Publish Time', 'crucial-real-estate'),
        );

        // WPML Support
        if (defined('ICL_SITEPRESS_VERSION')) {
            global $sitepress;
            $wpml_columns = new WPML_Custom_Columns($sitepress);
            $columns      = $wpml_columns->add_posts_management_column($columns);
        }

        // Reverse the array for RTL
        if (is_rtl()) {
            $columns = array_reverse($columns);
        }

        return $columns;
    }

    /**
     * Property custom columns
     *
     * @param $column
     */
    public function cre_property_custom_columns($column) {
        global $post;
        switch ($column) {
            case 'property-thumbnail':
                if (has_post_thumbnail($post->ID)) {
                    ?>
                    <a href="<?php the_permalink(); ?>" target="_blank">
                        <?php the_post_thumbnail(array(130, 130)); ?>
                    </a>
                    <?php
                } else {
                    esc_html_e('No Thumbnail', 'crucial-real-estate');
                }
                break;
            case 'id':
                $Prop_id = get_post_meta($post->ID, 'cre_property_id', true);
                if (!empty($Prop_id)) {
                    echo esc_html($Prop_id);
                } else {
                    esc_html_e('NA', 'crucial-real-estate');
                }
                break;

            case 'city':
                echo self::cre_admin_taxonomy_terms($post->ID, 'property-location', 'property');
                break;

            case 'type':
                echo self::cre_admin_taxonomy_terms($post->ID, 'property-type', 'property');
                break;
            case 'status':
                echo self::cre_admin_taxonomy_terms($post->ID, 'property-status', 'property');
                break;
            case 'price':
                cre_property_price();
                break;
        }
    }


    /**
     * Add custom filter fields for properties on admin
     */
    public function cre_properties_filter_fields_admin() {

        global $post_type;
        if ($post_type == 'property') {

            // Property Location Dropdown Option
            $prop_city_args = array(
                'show_option_all' => esc_html__('All Property Locations', 'crucial-real-estate'),
                'orderby'         => 'name',
                'order'           => 'ASC',
                'name'            => 'property_city_admin_filter',
                'taxonomy'        => 'property-location'
            );
            if (isset($_GET['property_city_admin_filter'])) {
                $prop_city_args['selected'] = sanitize_text_field($_GET['property_city_admin_filter']);
            }
            wp_dropdown_categories($prop_city_args);

            // Property Type Dropdown Option
            $prop_type_args = array(
                'show_option_all' => esc_html__('All Property Types', 'crucial-real-estate'),
                'orderby'         => 'name',
                'order'           => 'ASC',
                'name'            => 'property_type_admin_filter',
                'taxonomy'        => 'property-type'
            );
            if (isset($_GET['property_type_admin_filter'])) {
                $prop_type_args['selected'] = sanitize_text_field($_GET['property_type_admin_filter']);
            }
            wp_dropdown_categories($prop_type_args);

            // Property Status Dropdown Option
            $prop_status_args = array(
                'show_option_all' => esc_html__('All Property Statuses', 'crucial-real-estate'),
                'orderby'         => 'name',
                'order'           => 'ASC',
                'name'            => 'property_status_admin_filter',
                'taxonomy'        => 'property-status'
            );
            if (isset($_GET['property_status_admin_filter'])) {
                $prop_status_args['selected'] = sanitize_text_field($_GET['property_status_admin_filter']);
            }
            wp_dropdown_categories($prop_status_args);

            // User Dropdown Option
            $user_args = array(
                'show_option_all'   => esc_html__('All Users', 'crucial-real-estate'),
                'orderby'           => 'display_name',
                'order'             => 'ASC',
                'name'              => 'author_admin_filter',
                'capability'        => array( 'edit_posts' ),
                'include_selected'  => true
            );
            // Capability queries were only introduced in WP 5.9.
            if ( version_compare( $GLOBALS['wp_version'], '5.9', '<' ) ) {
                $user_args['who'] = 'authors';
                unset( $user_args['capability'] );
            }
            wp_dropdown_users($user_args);

            // Property ID Input Option
            $value_escaped = '';
            if (isset($_GET['prop_id_admin_filter']) && !empty($_GET['prop_id_admin_filter'])) {
                $value_escaped = sanitize_text_field($_GET['prop_id_admin_filter']);
            }
            ?>
            <input id="prop_id_admin_filter" type="text" name="prop_id_admin_filter" placeholder="<?php esc_html_e('Property ID', 'crucial-real-estate'); ?>" value="<?php echo esc_attr($value_escaped); ?>">
            <?php
        }
    }

    /**
     * Restrict the properties by the chosen filters
     *
     * @param $query
     */
    public function cre_properties_filter_admin($query) {

        global $post_type, $pagenow;

        //if we are currently on the edit screen of the property post-type listings
        if ($pagenow == 'edit.php' && $post_type == 'property') {

            $tax_query  = array();
            $meta_query = array();

            // Property ID Filter
            if (isset($_GET['prop_id_admin_filter']) && !empty($_GET['prop_id_admin_filter'])) {

                $meta_query[] = array(
                    'key'     => 'cre_property_id',
                    'value'   => sanitize_text_field($_GET['prop_id_admin_filter']),
                    'compare' => 'LIKE',
                );
            }

            // Property Status Filter
            if (isset($_GET['property_status_admin_filter']) && !empty($_GET['property_status_admin_filter'])) {

                //get the desired property status
                $property_status = sanitize_text_field($_GET['property_status_admin_filter']);

                //if the property status is not 0 (which means all)
                if ($property_status != 0) {
                    $tax_query[] = array(
                        'taxonomy' => 'property-status',
                        'field'    => 'ID',
                        'terms'    => esc_html($property_status)
                    );
                }
            }

            // Property Type Filter
            if (isset($_GET['property_type_admin_filter']) && !empty($_GET['property_type_admin_filter'])) {

                //get the desired property type
                $property_type = sanitize_text_field($_GET['property_type_admin_filter']);

                //if the property type is not 0 (which means all)
                if ($property_type != 0) {

                    $tax_query[] = array(
                        'taxonomy' => 'property-type',
                        'field'    => 'ID',
                        'terms'    => esc_html($property_type)
                    );
                }
            }

            // Property Location Filter
            if (isset($_GET['property_city_admin_filter']) && !empty($_GET['property_city_admin_filter'])) {

                //get the desired property location
                $property_city = sanitize_text_field($_GET['property_city_admin_filter']);

                //if the property location is not 0 (which means all)
                if ($property_city != 0) {
                    $tax_query[] = array(
                        'taxonomy' => 'property-location',
                        'field'    => 'ID',
                        'terms'    => esc_html($property_city)
                    );
                }
            }

            // Property Author Filter
            if (isset($_GET['author_admin_filter']) && !empty($_GET['author_admin_filter'])) {

                //set the query variable for 'author' to the desired value
                $author_id = sanitize_text_field($_GET['author_admin_filter']);

                //if the author is not 0 (meaning all)
                if ($author_id != 0) {
                    $query->query_vars['author'] = esc_html($author_id);
                }
            }

            if (!empty($meta_query)) {
                $query->query_vars['meta_query'] = $meta_query;
            }

            if (!empty($tax_query)) {
                $query->query_vars['tax_query'] = $tax_query;
            }
        }
    }

    /**
     * Make property price column sortable
     *
     * @param $columns
     *
     * @return mixed
     */
    public function cre_sortable_price_column($columns) {
        $columns['price'] = esc_html__('Price', 'crucial-real-estate');

        return $columns;
    }

    /**
     * Sort properties based on price
     *
     * @param $query
     */
    public function cre_price_orderby($query) {
        global $post_type, $pagenow;

        //if we are currently on the edit screen of the property post-type listings
        if ($pagenow == 'edit.php' && $post_type == 'property') {
            $orderby = $query->get('orderby');
            if ('price' == $orderby) {
                $query->set('meta_key', 'cre_property_price');
                $query->set('orderby', 'meta_value_num');
            }
        }
    }

    /**
     * Comma separated taxonomy terms with admin side links.
     *
     * @param  int $post_id      - Post ID.
     * @param  string $taxonomy  - Taxonomy name.
     * @param  string $post_type - Post type.
     *
     * @return string|bool
     * @since  1.0.0
     */
    public static function cre_admin_taxonomy_terms($post_id, $taxonomy, $post_type) {

        $terms = get_the_terms($post_id, $taxonomy);

        if (!empty($terms)) {
            $out = array();
            /* Loop through each term, linking to the 'edit posts' page for the specific term. */
            foreach ($terms as $term) {
                $out[] = sprintf(
                    '<a href="%s">%s</a>',
                    esc_url(
                        add_query_arg(
                            array(
                                'post_type' => esc_html($post_type),
                                $taxonomy   => esc_html($term->slug),
                            ),
                            'edit.php'
                        )
                    ),
                    esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'display'))
                );
            }

            /* Join the terms, separating them with a comma. */

            return join(', ', $out);
        }

        return false;
    }
}

/**
 * Initialize cre agent class.
 */
function cre_property() {
    return CRE_Property::instance();
}
cre_property();