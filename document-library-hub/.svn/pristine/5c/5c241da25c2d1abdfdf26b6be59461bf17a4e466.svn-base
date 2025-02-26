<?php

namespace Wpretro\DocumentLibraryHub;

class Library {
    // Initialize the class and hook into WordPress actions
    public static function init() {
        add_action( 'init', [ __CLASS__, 'register_library_post_type' ] );
        add_action( 'add_meta_boxes', [ __CLASS__, 'add_library_builder_meta_box' ] );
        add_action( 'save_post', [ __CLASS__, 'save_library_configuration' ] );
        add_action( 'admin_enqueue_scripts', [ __CLASS__, 'enqueue_library_builder_assets' ] );

        // Hook for custom columns
        add_filter( 'manage_dlhp_library_posts_columns', [ __CLASS__, 'add_shortcode_column' ] );
        add_action( 'manage_dlhp_library_posts_custom_column', [ __CLASS__, 'display_shortcode_column' ], 10, 2 );
        add_filter( 'manage_edit-dlhp_library_columns', [ __CLASS__, 'remove_date_column' ] );
    }

    // Register the Document Library post type
    public static function register_Library_post_type() {
        $labels = [
            'name'               => __( 'Libraries', 'document-library-hub' ),
            'singular_name'      => __( 'Library', 'document-library-hub' ),
            'menu_name'          => __( 'Libraries', 'document-library-hub' ),
            'add_new'            => __( 'Add New', 'document-library-hub' ),
            'add_new_item'       => __( 'Add New Library', 'document-library-hub' ),
            'edit_item'          => __( 'Edit Library', 'document-library-hub' ),
            'new_item'           => __( 'New Library', 'document-library-hub' ),
            'view_item'          => __( 'View Library', 'document-library-hub' ),
            'search_items'       => __( 'Search Libraries', 'document-library-hub' ),
            'not_found'          => __( 'No libraries found', 'document-library-hub' ),
            'not_found_in_trash' => __( 'No libraries found in Trash', 'document-library-hub' ),
        ];
    
        $args = [
            'labels'             => $labels,
            'public'             => false,
            'show_ui'            => true,
            'show_in_menu'       => 'edit.php?post_type=dlhp_document',
            'supports'           => [ 'title' ],
            'menu_position'      => 20,
			'capability_type' => 'post',
        	'map_meta_cap' => true,
        ];
    
        register_post_type( 'dlhp_library', $args);
    }

    // Add a meta box for library builder interface
    public static function add_library_builder_meta_box() {
        add_meta_box(
            'dlhp_library_builder',
            __( 'Library Builder', 'document-library-hub' ),
            [ __CLASS__, 'render_library_builder_meta_box' ],
            'dlhp_library',
            'normal',
            'high'
        );

        add_meta_box(
            'dlhp_library_shortcode',
            __( 'Library Shortcode', 'document-library-hub' ),
            [ __CLASS__, 'render_library_shortcode_meta_box' ],
            'dlhp_library',
            'side',
            'high'
        );
    }

    // Render the library builder meta box content
    public static function render_library_builder_meta_box( $post ) {
        // Fetch the Library post content to get JSON options
        if ( ! $post || $post->post_type !== 'dlhp_library' ) {
            return '<p>Library not found.</p>';
        }

        // Container for React app
        echo '<div id="dlhp-library-builder-app"></div>';  

        // Nonce for saving data
        wp_nonce_field( 'dlhp_save_library', 'dlhp_library_nonce' );
    }

    // Render the shortcode meta box content
    public static function render_library_shortcode_meta_box( $post ) {
        if ( ! $post || $post->post_type !== 'dlhp_library' ) {
            return;
        }

        // Display the shortcode with the post ID
        echo '<p>' . esc_html__( 'Copy the shortcode below to display this library:', 'document-library-hub' ) . '</p>';
        echo '<input type="text" readonly style="width:100%; background:#f0f0f1;" value="[doc_hub id=\'' . esc_attr( $post->ID ) . '\']" />';
    }

    // Save the library configuration when post is saved 
    public static function save_library_configuration( $post_id ) {
        // Check nonce for security
        if ( ! isset( $_POST['dlhp_library_nonce'] ) || 
            ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['dlhp_library_nonce'] ) ), 'dlhp_save_library' ) ) {
            return;
        }

        // Don't autosave to avoid overwriting library unintentionally
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        // Check user permissions
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        // Unslash and sanitize the library data
        $library_data = isset( $_POST['dlhp_library_data'] ) ? wp_kses_post( wp_unslash( $_POST['dlhp_library_data'] ) ) : '';

        // Temporarily remove the action to avoid infinite loop
        remove_action( 'save_post', [ __CLASS__, 'save_library_configuration' ] );

        // Save as post content
        $post_content = $library_data;
        wp_update_post( [
            'ID'           => $post_id,
            'post_content' => $post_content,
        ], true );

        // Re-add the action after update
        add_action( 'save_post', [ __CLASS__, 'save_library_configuration' ] );
    }

    // Register assets for library builder
    public static function enqueue_library_builder_assets( $hook ) {
		global $post;
	
		// Only load scripts on the Document Library edit screen
		if ( $hook === 'post.php' || $hook === 'post-new.php' ) {
			if ( $post->post_type === 'dlhp_library' ) {

                // Fetch document categories
                $categories = get_terms( [
                    'taxonomy'   => 'dlhp_document_category',
                    'hide_empty' => false,
                ]);

                $category_data = [];
                foreach ( $categories as $category ) {
                    $category_data[] = [
                        'id'   => $category->term_id,
                        'name' => $category->name,
                        'slug' => $category->slug,
                    ];
                }

                // Fetch saved data directly
                $saved_data = json_decode( $post->post_content, true );
                $saved_data = ! empty( $saved_data ) ? $saved_data : [];

                wp_enqueue_style(
                    'dlhp-library-builder-style', 
                    DLHP_PLUGIN_URL . '/assets/css/admin/library-builder.css',
                    [],
                    DLHP_PLUGIN_VERSION,
                    'all' 
                );
				
				wp_enqueue_script(
					'dlhp-library-builder-script',
					DLHP_PLUGIN_URL . '/assets/build/js/library-builder.js',
					[ 'wp-element', 'wp-api-fetch' ],
					DLHP_PLUGIN_VERSION,
					true
				);

                wp_localize_script( 
                    'dlhp-library-builder-script', 
                    'LibraryBuilderData',
                    [ 'categories' => $category_data ]
                );

                wp_add_inline_script(
                    'dlhp-library-builder-script',
                    'var dlhpLibraryData = ' . wp_json_encode( $saved_data ) . ';',
                    'before'
                );
			}
		}
	}

    // Add Shortcode column to the list of columns
    public static function add_shortcode_column( $columns ) {
        $columns['shortcode'] = __( 'Shortcode', 'document-library-hub' );
        return $columns;
    }

    // Display content for the Shortcode column
    public static function display_shortcode_column( $column, $post_id ) {
        if ( 'shortcode' === $column ) {
            echo '<input style="background:#f0f0f1;" type="text" value="' . esc_attr( '[doc_hub id="' . $post_id . '"]' ) . '">';
        }
    }

    // Remove the Date column from the Library post type
    public static function remove_date_column( $columns ) {
        if ( isset( $columns[ 'date' ] ) ) {
            unset( $columns[ 'date' ] );
        }
        return $columns;
    }
}
