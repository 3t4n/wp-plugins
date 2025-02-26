<?php

namespace Wpretro\DocumentLibraryHub;

class Document {
    public function __construct() {
        // Initialize the "Documents" post type and its taxonomies
        add_action( 'init', [ $this, 'register_post_type' ] );
        add_action( 'init', [ $this, 'register_taxonomies' ] );

        // Hook to flush rewrite rules after post type registration
        add_action( 'init', [ $this, 'flush_rewrite_rules' ], 15 );

        // Metabox for the file attachment
        add_action( 'add_meta_boxes', [ $this, 'add_document_file_metabox' ] );
        add_action( 'save_post', [ $this, 'save_document_file_metabox_data' ] );

        // Scripts
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_scripts' ] );
    }

    // Registers the "Documents" post type
    public function register_post_type() {
        $labels = [
            'name'               => __( 'Documents', 'document-library-hub' ),
            'singular_name'      => __( 'Document', 'document-library-hub' ),
            'menu_name'          => __( 'Documents', 'document-library-hub' ),
            'name_admin_bar'     => __( 'Document', 'document-library-hub' ),
            'add_new'            => __( 'Add New', 'document-library-hub' ),
            'add_new_item'       => __( 'Add New Document', 'document-library-hub' ),
            'new_item'           => __( 'New Document', 'document-library-hub' ),
            'edit_item'          => __( 'Edit Document', 'document-library-hub' ),
            'view_item'          => __( 'View Document', 'document-library-hub' ),
            'all_items'          => __( 'All Documents', 'document-library-hub' ),
            'search_items'       => __( 'Search Documents', 'document-library-hub' ),
            'not_found'          => __( 'No documents found.', 'document-library-hub' ),
            'not_found_in_trash' => __( 'No documents found in Trash.', 'document-library-hub' ),
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => [ 'slug' => 'document' ],
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 20,
            'menu_icon'          => 'dashicons-media-document',
            'supports'           => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ],
            'taxonomies'         => [ 'dlhp_document_category', 'dlhp_dlhp_document_tag' ],
        ];

        register_post_type( 'dlhp_document', $args );
    }

    // Registers taxonomies for the "Documents" post type
    public function register_taxonomies() {
        // Register "Document Categories" (hierarchical, like default categories)
        $category_labels = [
            'name'              => __( 'Categories', 'document-library-hub' ),
            'singular_name'     => __( 'Category', 'document-library-hub' ),
            'search_items'      => __( 'Search Categories', 'document-library-hub' ),
            'all_items'         => __( 'All Categories', 'document-library-hub' ),
            'parent_item'       => __( 'Parent Category', 'document-library-hub' ),
            'parent_item_colon' => __( 'Parent Category:', 'document-library-hub' ),
            'edit_item'         => __( 'Edit Category', 'document-library-hub' ),
            'update_item'       => __( 'Update Category', 'document-library-hub' ),
            'add_new_item'      => __( 'Add New Category', 'document-library-hub' ),
            'new_item_name'     => __( 'New Category Name', 'document-library-hub' ),
            'menu_name'         => __( 'Categories', 'document-library-hub' ),
        ];

        $category_args = [
            'hierarchical'      => true,
            'labels'            => $category_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'show_in_rest'      => true,
            'rewrite'           => [ 'slug' => 'document-category' ],
        ];

        register_taxonomy( 'dlhp_document_category', [ 'dlhp_document' ], $category_args );

        // Register "Document Tags" (non-hierarchical, like default tags)
        $tag_labels = [
            'name'              => __( 'Tags', 'document-library-hub' ),
            'singular_name'     => __( 'Tag', 'document-library-hub' ),
            'search_items'      => __( 'Search Tags', 'document-library-hub' ),
            'all_items'         => __( 'All Tags', 'document-library-hub' ),
            'edit_item'         => __( 'Edit Tag', 'document-library-hub' ),
            'update_item'       => __( 'Update Tag', 'document-library-hub' ),
            'add_new_item'      => __( 'Add New Tag', 'document-library-hub' ),
            'new_item_name'     => __( 'New Tag Name', 'document-library-hub' ),
            'menu_name'         => __( 'Tags', 'document-library-hub' ),
        ];

        $tag_args = [
            'hierarchical'      => false,
            'labels'            => $tag_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => [ 'slug' => 'document-tag' ],
        ];

        register_taxonomy( 'dlhp_dlhp_document_tag', [ 'dlhp_document' ], $tag_args );
    }

    // Adds a metabox for the file attachment
    public function add_document_file_metabox() {
        add_meta_box(
            'dlhp_document_file',
            __( 'Document File', 'document-library-hub' ),
            [ $this, 'render_document_file_metabox' ],
            'dlhp_document',
            'side',
            'default'
        );
    }

    // Renders the file attachment metabox
    public function render_document_file_metabox( $post ) {
        wp_nonce_field( 'dlhp_document_file_nonce_action', 'dlhp_document_file_nonce' );
    
        // Get current values from meta
        $file_source = get_post_meta( $post->ID, '_dlhp_document_file_source', true ) ?: 'media';
        $file_url = get_post_meta( $post->ID, '_dlhp_document_file_url', true );
        $external_file_url = get_post_meta( $post->ID, '_dlhp_document_external_url', true );
        $file_size = get_post_meta( $post->ID, '_dlhp_document_file_size', true );
        $file_type = get_post_meta( $post->ID, '_dlhp_document_file_type', true );
    
        // Radio buttons for selecting the file source
        echo '<p><strong>' . esc_html__( 'Select File Source:', 'document-library-hub' ) . '</strong></p>';
        echo '<label><input type="radio" name="dlhp_document_file_source" value="media" ' . checked( 'media', $file_source, false ) . ' /> ' . esc_html__( 'Media Library', 'document-library-hub' ) . '</label><br>';
        echo '<label><input type="radio" name="dlhp_document_file_source" value="external" ' . checked( 'external', $file_source, false ) . ' /> ' . esc_html__( 'External Link', 'document-library-hub' ) . '</label><br><br>';
    
        // File URL field for media library (hidden if "External Link" is selected)
        echo '<div id="media-file-fields" ' . ( 'external' === $file_source ? 'style="display:none;"' : '' ) . '>';
        echo '<input type="url" id="dlhp_document_file_url" name="dlhp_document_file_url" value="' . esc_attr( $file_url ) . '" style="margin-right: 4px;" />';
        echo '<button type="button" class="button" id="upload_file_button">' . esc_html__( 'Upload', 'document-library-hub' ) . '</button>';
        echo '</div>';
    
        // Fields for external link URL, file size, and file type (hidden if "Media Library" is selected)
        echo '<div id="external-file-fields" ' . ( 'media' === $file_source ? 'style="display:none;"' : '' ) . '>';
        echo '<label for="dlhp_document_external_url">' . esc_html__( 'External File Link:', 'document-library-hub' ) . '</label>';
        echo '<input type="url" id="dlhp_document_external_url" name="dlhp_document_external_url" value="' . esc_attr( $external_file_url ) . '" style="width: 100%;" />';
    
        echo '<label for="dlhp_document_file_size">' . esc_html__( 'External File Size:', 'document-library-hub' ) . '</label>';
        echo '<input type="text" id="dlhp_document_file_size" name="dlhp_document_file_size" value="' . esc_attr( $file_size ) . '" style="width: 100%;" />';
    
        echo '<label for="dlhp_document_file_type">' . esc_html__( 'External File Type:', 'document-library-hub' ) . '</label>';
        echo '<input type="text" id="dlhp_document_file_type" name="dlhp_document_file_type" value="' . esc_attr( $file_type ) . '" style="width: 100%;" />';
        echo '</div>';
    }

    // Saves the file attachment or link metabox data
    public function save_document_file_metabox_data( $post_id ) {
        // Check nonce and autosave status
        if ( ! isset( $_POST['dlhp_document_file_nonce'] ) || 
             ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['dlhp_document_file_nonce'] ) ), 'dlhp_document_file_nonce_action' ) || 
             ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) ) {
            return;
        }
    
        // Save file source
        if ( isset( $_POST['dlhp_document_file_source'] ) ) {
            update_post_meta( $post_id, '_dlhp_document_file_source', sanitize_text_field( wp_unslash( $_POST['dlhp_document_file_source'] ) ) );
        }
    
        // Save file URL if source is 'media'
        if ( isset( $_POST['dlhp_document_file_source'] ) && 'media' === $_POST['dlhp_document_file_source'] ) {
            if ( isset( $_POST['dlhp_document_file_url'] ) ) {
                $file_url = esc_url_raw( wp_unslash( $_POST['dlhp_document_file_url'] ) );
                update_post_meta( $post_id, '_dlhp_document_file_url', $file_url );
            }
        }
    
        // Save external file details if source is 'external'
        if ( isset( $_POST['dlhp_document_file_source'] ) && 'external' === $_POST['dlhp_document_file_source'] ) {
            if ( isset( $_POST['dlhp_document_external_url'] ) ) {
                update_post_meta( $post_id, '_dlhp_document_external_url', esc_url_raw( wp_unslash( $_POST['dlhp_document_external_url'] ) ) );
            }
            if ( isset( $_POST['dlhp_document_file_size'] ) ) {
                update_post_meta( $post_id, '_dlhp_document_file_size', sanitize_text_field( wp_unslash( $_POST['dlhp_document_file_size'] ) ) );
            }
            if ( isset( $_POST['dlhp_document_file_type'] ) ) {
                update_post_meta( $post_id, '_dlhp_document_file_type', sanitize_text_field( wp_unslash( $_POST['dlhp_document_file_type'] ) ) );
            }
        }
    }    

    // Enqueues media uploader scripts
    public function enqueue_admin_scripts( $hook ) {
        // Only enqueue on the edit screen for 'dlhp_document' post type
        if ( 'post.php' !== $hook && 'post-new.php' !== $hook ) {
            return;
        }
    
        global $post;
        if ( 'dlhp_document' !== $post->post_type ) {
            return;
        }
    
        wp_enqueue_media();
        wp_enqueue_script(
            'dlhp-document-media-uploader',
            DLHP_PLUGIN_URL . '/assets/js/admin/media-uploader.js',
            [ 'jquery' ],
            DLHP_PLUGIN_VERSION,
            true
        );
    }

    // Flush rewrite rules to prevent 404 errors
    public function flush_rewrite_rules() {
        if ( get_option( 'dlhp_flush_rewrite_rules', false ) ) {
            flush_rewrite_rules();
            delete_option( 'dlhp_flush_rewrite_rules' );
        }
	}
}
