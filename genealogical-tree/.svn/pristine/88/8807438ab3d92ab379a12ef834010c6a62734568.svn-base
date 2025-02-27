<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wordpress.org/plugins/genealogical-tree
 * @since      1.0.0
 *
 * @package    Genealogical_Tree
 * @subpackage Genealogical_Tree/admin/inc
 */
namespace Zqe\Inc;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Genealogical_Tree
 * @subpackage Genealogical_Tree/admin/inc
 * @author     ak devs <akdevs.fr@gmail.com>
 */
class Genealogical_Tree_Admin_Family_Group {
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      \Zqe\Genealogical_Tree    $plugin    The ID of this plugin.
     */
    private $plugin;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin       The name of this plugin.
     */
    public function __construct( $plugin ) {
        $this->plugin = $plugin;
    }

    /**
     * Family group validation notice handler.
     *
     * @since    1.0.0
     */
    public function family_group_validation_notice_handler() {
        $errors = get_option( 'family_group_validation' );
        if ( $errors ) {
            echo '<div class="error"><p>' . esc_html( $errors ) . '</p></div>';
        }
        update_option( 'family_group_validation', false );
    }

    /**
     * It updates the `can_use_by_allowed_group` meta field of all members in a family group when the
     * family group is updated
     *
     * @param  mixed $term_id The ID of the term you want to update.
     *
     * @return void
     *
     * @since    1.0.0
     */
    public function update_family_group( $term_id ) {
    }

    /**
     * It creates a family group.
     *
     * @param  mixed $term_id The ID of the term that was just created.
     *
     * @since    1.0.0
     */
    public function create_family_group( $term_id ) {
        if ( gt_fs()->is_not_paying() ) {
            $terms = get_terms( array(
                'taxonomy'   => 'gt-family-group',
                'hide_empty' => false,
            ) );
            if ( count( $terms ) > 1 ) {
                wp_delete_term( $term_id, 'gt-family-group' );
                echo '<a href="' . esc_attr( gt_fs()->get_upgrade_url() ) . '">' . esc_html__( 'Upgrade Now!', 'genealogical-tree' ) . '</a> to create more family group. If you are on trial you will able to create multiple family group after trial.';
                die;
            }
        }
        $this->generate_default_page( $term_id );
    }

    /**
     * It creates a new page with the title "Family Tree - [Family Group Name]" and sets the page's content
     * to blank
     *
     * @param  int $family_group_id The ID of the family group you want to create a tree for.
     *
     * @return int The ID of the newly created page.
     *
     * @since    1.0.0
     */
    public function generate_default_page( $family_group_id ) {
        $family_group_obj = get_term( $family_group_id );
        $family_group_name = $family_group_obj->name;
        $my_post = array(
            'post_title'   => wp_strip_all_tags( 'Family Tree - ' . $family_group_name ),
            'post_content' => '',
            'post_status'  => 'publish',
            'post_author'  => get_current_user_id(),
            'post_type'    => 'gt-tree',
        );
        $tree_page = wp_insert_post( $my_post );
        if ( $tree_page ) {
            update_post_meta( $tree_page, 'tree', array(
                'family' => $family_group_id,
            ) );
            update_term_meta( $family_group_id, 'tree_page', $tree_page );
            update_term_meta( $family_group_id, 'created_by', get_current_user_id() );
        }
        return $tree_page;
    }

    /**
     * Generate page for family on ajax request.
     *
     * @since    1.0.0
     */
    public function generate_default_tree() {
        if ( isset( $_POST['nonce'] ) && wp_verify_nonce( sanitize_key( wp_unslash( $_POST['nonce'] ) ), 'gt_ajax_nonce' ) ) {
            $family_group_id = ( isset( $_POST['family_id'] ) ? sanitize_text_field( wp_unslash( $_POST['family_id'] ) ) : array() );
            $tree_page = get_term_meta( $family_group_id, 'tree_page', true );
            if ( $family_group_id && !get_post( $tree_page ) ) {
                return $this->generate_default_page( $family_group_id );
            }
        }
    }

    /**
     * Set the submenu as active/current while anywhere in your Custom Post Type ( member ).
     *
     * @param string $parent_file The parent file.
     *
     * @return string
     *
     * @since    1.0.0
     */
    public function set_family_group_current_menu( $parent_file ) {
        global $submenu_file, $current_screen, $pagenow;
        if ( 'gt-member' === $current_screen->post_type ) {
            if ( 'edit-tags.php' === $pagenow || 'term.php' === $pagenow ) {
                $submenu_file = 'edit-tags.php?taxonomy=gt-family-group&post_type=' . $current_screen->post_type;
                $parent_file = 'genealogical-tree';
            }
        }
        return $parent_file;
    }

    /**
     * Filters the terms displayed for the 'gt-family-group' taxonomy.
     *
     * This function restricts the displayed terms for the 'gt-family-group' taxonomy
     * to only those created by the current user, unless the user has elevated permissions
     * (e.g., manager, editor, or administrator).
     *
     * References:
     * - WordPress `get_terms_args` filter: 
     *   https://developer.wordpress.org/reference/hooks/get_terms_args/
     * - WordPress `get_terms()` function:
     *   https://developer.wordpress.org/reference/functions/get_terms/
     * - WordPress `current_user_can()` function:
     *   https://developer.wordpress.org/reference/functions/current_user_can/
     * - WordPress `is_admin()` function:
     *   https://developer.wordpress.org/reference/functions/is_admin/
     *
     * @param array $args       The arguments passed to `get_terms()`.
     * @param array $taxonomies The taxonomies being queried.
     *
     * @return array The modified arguments for the term query.
     *
     * @since 1.0.0
     */
    public function gt_family_group_filter( $args, $taxonomies ) {
        // Check if we are filtering the 'gt-family-group' taxonomy and the user lacks special permissions.
        if ( in_array( 'gt-family-group', $taxonomies, true ) && !(current_user_can( 'gt_manager' ) || current_user_can( 'editor' ) || current_user_can( 'administrator' )) ) {
            // Restrict terms to those created by the current user in the admin area.
            if ( is_admin() ) {
                $args['meta_key'] = 'created_by';
                // Key for the term meta field storing the creator's ID.
                $args['meta_value'] = get_current_user_id();
                // Filter terms by the current user's ID.
            }
        }
        return $args;
        // Return the modified arguments.
    }

    /**
     * It adds a meta box to the family group taxonomy.
     *
     * @return void
     *
     * @since    1.0.0
     */
    public function add_family_group_meta() {
        $fields = array(array(
            'label'    => esc_html__( 'Default Tree', 'genealogical-tree' ),
            'id'       => 'tree_page',
            'desc'     => esc_html__( 'Each family group should have a default tree. Default thrre will be display with member name on family tree or member page based on settings', 'genealogical-tree' ),
            'type'     => 'callback',
            'callback' => array($this, 'default_tree'),
            'editOnly' => true,
        ), array(
            'label'    => esc_html__( 'Possible Roots', 'genealogical-tree' ),
            'desc'     => esc_html__( 'Our plugin can calculate possible roots on a family group, Possible root is like who dont have any parents.', 'genealogical-tree' ),
            'id'       => 'possible_roots',
            'type'     => 'callback',
            'callback' => array($this, 'possible_roots'),
            'editOnly' => true,
        ), array(
            'label'    => esc_html__( 'Members Page', 'genealogical-tree' ),
            'desc'     => esc_html__( 'This page is archive page of member os family group.', 'genealogical-tree' ),
            'id'       => 'members_page',
            'type'     => 'callback',
            'callback' => array($this, 'members_page'),
            'editOnly' => true,
        ));
        new \Zqe\Wp_Term_Meta('gt-family-group', 'gt-member', $fields);
    }

    /**
     * It displays a button that links to the members page of the family group
     *
     * @param  array $field The field's value.
     *
     * @return string
     *
     * @since    1.0.0
     */
    public function members_page( $field ) {
        $term = ( isset( $field['term'] ) && $field['term'] ? (object) $field['term'] : null );
        if ( $term ) {
            ob_start();
            ?>
			<p>
				<a class="button" target="_blank" href="<?php 
            echo esc_attr( get_term_link( $term, 'gt-family-group' ) );
            ?>">
				<?php 
            esc_html_e( 'View Members Page.', 'genealogical-tree' );
            ?> 
				</a>
			</p>
			<?php 
        } else {
            ?>
			<p><?php 
            esc_html_e( 'Will be display on edit page.', 'genealogical-tree' );
            ?> </p>
			<?php 
        }
        return ob_get_clean();
    }

    /**
     * Generates a button or dropdown to select or generate a default tree for a family group.
     *
     * @param array $field The field's value, containing the term object.
     *
     * @return string The HTML markup for the default tree button or dropdown.
     *
     * @since 1.0.0
     */
    public function default_tree( $field ) {
        // Validate and sanitize the term.
        $term = ( isset( $field['term'] ) && $field['term'] instanceof \WP_Term ? $field['term'] : null );
        $term = ( isset( $field['term'] ) && $field['term'] ? (object) $field['term'] : null );
        if ( !$term || empty( $term->term_id ) ) {
            return '<p>' . esc_html__( 'Will be displayed on the edit page.', 'genealogical-tree' ) . '</p>';
        }
        // Retrieve the tree page and all tree pages associated with the term.
        $tree_page = $this->get_post_type_tree_by_term_meta( $term );
        $tree_pages = $this->get_post_type_tree_by_term( $term );
        print_r( $tree_page );
        // Start output buffering.
        ob_start();
        // Display the generate button if no tree pages exist.
        if ( empty( $tree_pages ) ) {
            ?>
			<button data-id="<?php 
            echo esc_attr( $term->term_id );
            ?>" class="button generate_default_tree">
				<?php 
            esc_html_e( 'Generate Default Tree', 'genealogical-tree' );
            ?>
			</button>
			<?php 
        }
        // Display the dropdown if tree pages exist.
        if ( !empty( $tree_pages ) ) {
            ?>
			<select name="tree_page">
				<option value=""><?php 
            esc_html_e( 'Select Default Tree', 'genealogical-tree' );
            ?></option>
				<?php 
            foreach ( $tree_pages as $page ) {
                ?>
					<?php 
                $tree = get_post_meta( $page->ID, 'tree', true );
                $is_family_tree = isset( $tree['family'] ) && (int) $tree['family'] === (int) $term->term_id;
                if ( $is_family_tree ) {
                    ?>
						<option value="<?php 
                    echo esc_attr( $page->ID );
                    ?>" <?php 
                    selected( $page->ID, $tree_page );
                    ?>>
							<?php 
                    echo esc_html( $page->post_title );
                    ?>
						</option>
					<?php 
                }
                ?>
				<?php 
            }
            ?>
			</select>
			<?php 
        }
        // Display the "View Tree" button if a default tree page exists.
        if ( $tree_page ) {
            ?>
			<a target="_blank" class="button" href="<?php 
            echo esc_url( get_the_permalink( $tree_page ) );
            ?>">
				<?php 
            esc_html_e( 'View Tree', 'genealogical-tree' );
            ?>
			</a>
			<?php 
        }
        // Return the buffered output.
        return ob_get_clean();
    }

    /**
     * It displays a list of possible roots for a given family
     *
     * @param  array $field The field's value.
     *
     * @return void
     *
     * @since    1.0.0
     */
    public function possible_roots( $field ) {
        $term = ( isset( $field['term'] ) && $field['term'] ? (object) $field['term'] : null );
        if ( $term ) {
            $tree_page = $this->get_post_type_tree_by_term_meta( $term );
            if ( $tree_page ) {
                // TODO: Add member id
                echo do_shortcode( '[gt-tree-list family=' . $term->term_id . ']' );
            } else {
                echo esc_html__( 'To view possibles first generate / set default tree', 'genealogical-tree' );
            }
        } else {
            echo esc_html__( 'Will be display on edit page.', 'genealogical-tree' );
        }
    }

    /**
     * Returns the ID of the tree page associated with a given term.
     *
     * @param  object $term The term object.
     *
     * @return int|false The ID of the tree page or false if not found or invalid.
     *
     * @since 1.0.0
     */
    public function get_post_type_tree_by_term_meta( $term ) {
        // Ensure the term object is valid.
        if ( !is_object( $term ) || empty( $term->term_id ) ) {
            return false;
        }
        // Get the tree page ID from term metadata.
        $tree_page = get_term_meta( (int) $term->term_id, 'tree_page', true );
        // Validate the post exists.
        if ( !$tree_page || !get_post( (int) $tree_page ) ) {
            return false;
        }
        return (int) $tree_page;
    }

    /**
     * Returns an array of tree pages associated with a specific term.
     *
     * @param  object $term The term object.
     *
     * @return array An array of WP_Post objects representing the tree pages.
     *
     * @since 1.0.0
     */
    public function get_post_type_tree_by_term( $term ) {
        // Ensure the term object is valid.
        if ( !is_object( $term ) || empty( $term->term_id ) ) {
            return array();
        }
        // Query tree pages associated with the term ID.
        $query = new \WP_Query(array(
            'post_type'      => 'gt-tree',
            'posts_per_page' => -1,
            'meta_query'     => array(array(
                'key'     => 'tree',
                'value'   => $term->term_id,
                'compare' => 'LIKE',
            )),
        ));
        // Return an empty array if no posts are found.
        if ( empty( $query->posts ) || !is_array( $query->posts ) ) {
            return array();
        }
        // Filter the pages to ensure valid family trees.
        $tree_pages = array_filter( $query->posts, function ( $page ) use($term) {
            $tree = get_post_meta( $page->ID, 'tree', true );
            return isset( $tree['family'] ) && (int) $tree['family'] === (int) $term->term_id;
        } );
        return $tree_pages;
    }

}
