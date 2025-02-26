<?php

namespace Wpretro\DocumentLibraryHub;

class Protection {
    private $filter_in_progress = false;

	public function __construct() {
        // Add fields to dlhp_document_category taxonomy
        add_action( 'dlhp_document_category_add_form_fields', [ $this, 'add_protection_fields' ] );
        add_action( 'dlhp_document_category_edit_form_fields', [ $this, 'edit_protection_fields' ] );

        // Save role selections
        add_action( 'created_dlhp_document_category', [ $this, 'save_protection_fields' ] );
        add_action( 'edited_dlhp_document_category', [ $this, 'save_protection_fields' ] );

        // Restrict content visibility on category archive pages
        add_action( 'pre_get_posts', [ $this, 'restrict_document_access_on_archive' ] );

        // Restrict content when filtering terms and queries
        add_filter( 'get_terms_args', [ $this, 'filter_protected_categories' ], 10, 2 );
        //add_action( 'pre_get_posts', [ $this, 'exclude_protected_documents_in_custom_queries' ] );

        // Restrict content visibility on single document pages
        add_action( 'template_redirect', [ $this, 'restrict_document_access_on_single' ] );

        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_scripts' ] );
    }

    // Enqueue scripts on the document category add/edit pages.
    public function enqueue_admin_scripts( $hook_suffix ) {
        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Nonce not required for simple taxonomy detection
        if ( isset( $_GET['taxonomy'] ) ) {
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Nonce not required for simple taxonomy detection
            $taxonomy = sanitize_text_field( wp_unslash( $_GET['taxonomy'] ) );

            // Verify the nonce (if applicable).
            if ( 'dlhp_document_category' === $taxonomy ) {
                wp_enqueue_script(
                    'dlhp-protection-fields',
                    DLHP_PLUGIN_URL . 'assets/js/admin/protection-fields.js',
                    [ 'jquery' ],
                    DLHP_PLUGIN_VERSION,
                    true
                );
            }
        }
    }

    // Add fields to the Add New Category form
    public function add_protection_fields() {
        $roles = wp_roles()->roles;
        wp_nonce_field( 'save_protection_fields', '_dlhp_protection_nonce' );

        ?>
        <div class="form-field term-group">
            <label for="restrict_access">
                <input type="checkbox" name="restrict_access" id="restrict_access" value="1">
                <?php esc_html_e( 'Restrict Access', 'document-library-hub' ); ?>
            </label>
            <p class="description"><?php esc_html_e( 'Check to restrict access to this category.', 'document-library-hub' ); ?></p>
        </div>
        <div class="form-field term-group" id="protected_roles_field" style="display: none;">
            <label for="protected_roles"><?php esc_html_e( 'Allowed Roles', 'document-library-hub' ); ?></label>
            <select name="protected_roles[]" id="protected_roles" multiple="multiple">
                <?php foreach ( $roles as $role_key => $role ) : ?>
                    <option value="<?php echo esc_attr( $role_key ); ?>"><?php echo esc_html( $role[ 'name' ] ); ?></option>
                <?php endforeach; ?>
            </select>
            <p class="description"><?php esc_html_e( 'Select roles that are allowed to view this category.', 'document-library-hub' ); ?></p>
        </div>
        <?php
    }

    // Add fields to the Edit Category form
    public function edit_protection_fields( $term ) {
        $roles = wp_roles()->roles;
        $restrict_access = get_term_meta( $term->term_id, '_dlhp_restrict_access', true );
        $protected_roles = get_term_meta( $term->term_id, '_dlhp_protected_roles', true );
        wp_nonce_field( 'save_protection_fields', '_dlhp_protection_nonce' );

        ?>
        <tr class="form-field term-group-wrap">
            <th scope="row"><label for="restrict_access"><?php esc_html_e( 'Restrict Access', 'document-library-hub' ); ?></label></th>
            <td>
                <input type="checkbox" name="restrict_access" id="restrict_access" value="1" <?php checked( $restrict_access, 1 ); ?>>
                <span class="description"><?php esc_html_e( 'Check to restrict access to this category.', 'document-library-hub' ); ?></span>
            </td>
        </tr>
        <tr class="form-field term-group-wrap" id="protected_roles_field" style="<?php echo $restrict_access ? '' : 'display: none;'; ?>">
            <th scope="row"><label for="protected_roles"><?php esc_html_e( 'Allowed Roles', 'document-library-hub' ); ?></label></th>
            <td>
                <select name="protected_roles[]" id="protected_roles" multiple="multiple">
                    <?php foreach ( $roles as $role_key => $role ) : ?>
                        <option value="<?php echo esc_attr( $role_key ); ?>" <?php selected( in_array( $role_key, (array) $protected_roles ) ); ?>><?php echo esc_html( $role[ 'name' ] ); ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="description"><?php esc_html_e( 'Select roles that are allowed to view this category.', 'document-library-hub' ); ?></p>
            </td>
        </tr>
        <?php
    }

    // Save fields when a category is created or updated
    public function save_protection_fields( $term_id ) {
        if ( ! isset( $_POST[ '_dlhp_protection_nonce' ] ) || 
                ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ '_dlhp_protection_nonce' ] ) ), 'save_protection_fields' ) ) {
            return;
        }
        // Save restrict_access checkbox value
        $restrict_access = isset( $_POST[ 'restrict_access' ] ) ? 1 : 0;
        update_term_meta( $term_id, '_dlhp_restrict_access', $restrict_access );

        // Save selected roles if restrict_access is enabled
        if ( $restrict_access && isset( $_POST[ 'protected_roles' ] ) ) {
            update_term_meta( 
                $term_id, 
                '_dlhp_protected_roles', 
                array_map( 'sanitize_text_field', wp_unslash( $_POST[ 'protected_roles' ] ) ) 
            );
        } else {
            delete_term_meta( $term_id, '_dlhp_protected_roles' );
        }        
    }

    // Restrict document access on category archive pages by role
    public function restrict_document_access_on_archive( $query ) {
        if ( ! is_admin() && $query->is_main_query() && ( $query->is_tax( 'dlhp_document_category' ) || $query->is_tax( 'dlhp_document_tag' ) || is_search() ) ) {
            $user = wp_get_current_user();
            $restricted_terms = [];
            $allowed_terms = [];
    
            // Fetch all dlhp_document_category terms
            $terms = get_terms( [ 'taxonomy' => 'dlhp_document_category', 'hide_empty' => false ] );
    
            foreach ( $terms as $term ) {
                $restrict_access = get_term_meta( $term->term_id, '_dlhp_restrict_access', true );
                $protected_roles = get_term_meta( $term->term_id, '_dlhp_protected_roles', true );
    
                if ( $restrict_access ) {
                    if ( $protected_roles && array_intersect( $user->roles, (array) $protected_roles ) ) {
                        // User has access to this restricted category
                        $allowed_terms[] = $term->term_id;
                    } else {
                        // User does NOT have access to this restricted category
                        $restricted_terms[] = $term->term_id;
                    }
                } else {
                    // Category is public, so include it in allowed terms
                    $allowed_terms[] = $term->term_id;
                }
            }
    
            // If there are restricted terms, ensure they are removed from the allowed list
            if ( ! empty( $restricted_terms ) ) {
                $query->set( 'tax_query', [
                    [
                        'taxonomy' => 'dlhp_document_category',
                        'field'    => 'term_id',
                        'terms'    => $restricted_terms,
                        'operator' => 'NOT IN',
                    ],
                ] );
            } elseif ( empty( $allowed_terms ) ) {
                // If no access to any categories, restrict all posts
                $query->set( 'post__in', [ 0 ] ); // Return no posts
            }
        }
    }

    // Restrict document access on single document pages by role
    public function restrict_document_access_on_single() {
        if ( is_singular( 'dlhp_document' ) ) {
            $user = wp_get_current_user();
            $post_id = get_the_ID();
            $terms = wp_get_post_terms( $post_id, 'dlhp_document_category' );
    
            foreach ( $terms as $term ) {
                $restrict_access = get_term_meta( $term->term_id, '_dlhp_restrict_access', true );
                $protected_roles = get_term_meta( $term->term_id, '_dlhp_protected_roles', true );
    
                if ( $restrict_access ) {
                    // Check if the user has access based on protected roles
                    if ( $protected_roles && ! array_intersect( $user->roles, (array) $protected_roles ) ) {
                        // User does NOT have access to this protected category, redirect immediately
                        wp_redirect( home_url( '/404' ) );
                        exit;
                    }
                }
            }
    
            // If we exit the loop without any restriction, the user has access to the document
        }
    }

    // Filter to exclude protected categories in `get_terms`
    public function filter_protected_categories( $args, $taxonomies ) {
        if ( is_admin() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
            return $args;
        }

        if ( is_singular( 'dlhp_document' ) ) {
            return $args;
        }

        // Avoid filtering if it's already in progress
        if ( isset( $this->filter_in_progress ) && $this->filter_in_progress ) {
            return $args;
        }

        $this->filter_in_progress = true;

        // Get restricted category IDs
        $restricted_terms = $this->get_restricted_category_ids();
        // Exclude restricted categories from the terms query
        if ( ! empty( $restricted_terms ) ) {
            $args[ 'exclude' ] = $restricted_terms;
        }

        $this->filter_in_progress = false;

        return $args;
    }
    
    public function exclude_protected_documents_in_custom_queries( $query ) {
        // Skip for admin, main query on taxonomy pages, and single document views
        if ( is_admin() || $query->is_tax( 'dlhp_document_category' ) || $query->is_singular( 'dlhp_document' ) ) {
            return;
        }

        // Check for custom flag to avoid applying filter to this query
        if ( $query->get( 'skip_filter' ) ) {
            return;
        }

        // Prevent recursion with a custom flag
        if ( $query->get( 'protected_documents_filtered' ) ) {
            return;
        }
        $query->set( 'protected_documents_filtered', true );

        // Get current user info and initialize restricted term array
        $user = wp_get_current_user();
        $restricted_term_ids = [];

        // Retrieve all terms in the 'dlhp_document_category' taxonomy, including protected ones
        $terms = get_terms( [
            'taxonomy'         => 'dlhp_document_category',
            'hide_empty'       => false,
            'include_protected' => true,
        ] );

        // Collect IDs of restricted terms for users without access
        foreach ( $terms as $term ) {
            $restrict_access = get_term_meta( $term->term_id, '_dlhp_restrict_access', true );
            $protected_roles = get_term_meta( $term->term_id, '_dlhp_protected_roles', true );

            // Check if user lacks access based on role restrictions
            if ( $restrict_access && ! array_intersect( $user->roles, (array) $protected_roles ) ) {
                $restricted_term_ids[] = $term->term_id;
            }
        }

        // Apply tax query to exclude restricted terms if any are found
        if ( ! empty( $restricted_term_ids ) ) {
            $tax_query = (array) $query->get( 'tax_query' ); // Ensure tax_query is an array
            $tax_query[] = [
                'taxonomy' => 'dlhp_document_category',
                'field'    => 'term_id',
                'terms'    => $restricted_term_ids,
                'operator' => 'NOT IN',
            ];
            $query->set( 'tax_query', $tax_query );
        }
    }

    // Get IDs of restricted categories for the current user
    public function get_restricted_category_ids() {
        $user = wp_get_current_user();
        $restricted_term_ids = [];

        // Retrieve all terms in the 'dlhp_document_category' taxonomy, including protected ones
        $terms = get_terms( [
            'taxonomy'         => 'dlhp_document_category',
            'hide_empty'       => false,
            'include_protected' => true,
        ] );

        // Collect IDs of restricted terms for non-eligible users
        foreach ( $terms as $term ) {
            $restrict_access = get_term_meta( $term->term_id, '_dlhp_restrict_access', true );
            $protected_roles = get_term_meta( $term->term_id, '_dlhp_protected_roles', true );

            // If access is restricted and the user lacks necessary roles, add term ID to restricted list
            if ( $restrict_access && ! array_intersect( $user->roles, (array) $protected_roles ) ) {
                $restricted_term_ids[] = $term->term_id;
            }
        }

        return $restricted_term_ids;
    }
}