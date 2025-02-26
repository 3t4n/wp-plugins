<?php

namespace Wpretro\DocumentLibraryHub;

use Wpretro\DocumentLibraryHub\Document;
use Wpretro\DocumentLibraryHub\Library;
use Wpretro\DocumentLibraryHub\Protection;

class Main {
    public $library_id;
    public $content_settings;
    public $display_settings;
    private $protection;

	public function __construct() {
        new Document();
        Library::init();
        $this->protection = new Protection();

        // Register the shortcode
        add_shortcode( 'doc_hub', [ $this, 'render_library_shortcode' ] );

        // AJAX handler for pagination
        add_action( 'wp_ajax_dlhp_get_documents', [ $this, 'handle_ajax_get_documents' ] );
        add_action( 'wp_ajax_nopriv_dlhp_get_documents', [ $this, 'handle_ajax_get_documents' ] );

        // AJAX handler for folders
        add_action( 'wp_ajax_dlhp_get_documents_by_folder', [ $this, 'handle_ajax_get_documents_by_folder' ] );
        add_action( 'wp_ajax_nopriv_dlhp_get_documents_by_folder', [ $this, 'handle_ajax_get_documents_by_folder' ] );
    }

    public function enqueue_assets() {
        // Main CSS
        wp_enqueue_style( 'dlhp-style', DLHP_PLUGIN_URL . 'assets/css/public/style.css', [], DLHP_PLUGIN_VERSION, 'all' );

        // DataTables CSS
        wp_enqueue_style( 'datatables-style', DLHP_PLUGIN_URL . 'assets/css/public/datatables.min.css', [], '2.1.8' );

        // DataTables JS
        wp_enqueue_script( 'datatables-script', DLHP_PLUGIN_URL . 'assets/js/public/datatables.min.js', [ 'jquery' ], '2.1.8', true );

        // Main JS
        wp_enqueue_script( 'dlhp-script', DLHP_PLUGIN_URL . 'assets/js/public/script.js', [ 'jquery' ], DLHP_PLUGIN_VERSION, true );

        // Localize script
        wp_localize_script( 'dlhp-script', 'dlhp_ajax', [
            'ajax_url'  => esc_url( admin_url( 'admin-ajax.php' ) ),
            'nonce' => wp_create_nonce( 'dlhp_ajax_nonce' )
        ] );
	}

    public function render_library_shortcode( $atts ) {
		if ( is_admin() ) {
			return '';
		}
        
        // Enqueue CSS for this shortcode
        $this->enqueue_assets();

        // Extract and validate attributes
        $atts = shortcode_atts( [ 'id' => null ], $atts, 'doc_hub' );
        $this->library_id = intval( $atts[ 'id' ] );
    
        // Fetch the Library post content
        $library_post = $this->get_library_post( $this->library_id );
        if ( is_wp_error( $library_post ) ) {
            return $library_post; // Return the error message
        }

        $this->content_settings = $library_post[ 'content' ];
        $this->display_settings = $library_post[ 'settings' ];

        $output = '<div class="dlhp-docs">';

        if ( $this->display_settings[ 'documentsLayout' ] === 'grid' &&  $this->display_settings[ 'enableSearch' ] === true ) {
            $output .= $this->render_search_field();
        }

        // Fetch documents or folders based on library settings
        if ( 'none' !== $library_post[ 'settings' ][ 'foldersLayout' ] ) {
			$output .= $this->render_folders( $library_post );
		} else {
			$documents_output = $this->render_documents( $library_post );

			// Handle cases where render_documents returns a string "No documents found"
			if ( is_array( $documents_output ) ) {
                if ( isset( $documents_output[ 'pagination' ] ) ) {
                    $output .= $documents_output[ 'documents' ] . $documents_output[ 'pagination' ];
                } else {
                    $output .= $documents_output[ 'documents' ];
                }
			} elseif ( is_string( $documents_output ) ) {
				$output .= $documents_output;
			}
		}

		$output .= '</div>';

        return $output;
    }

    // Render function for folder/category layout
    private function render_folders( $library_post ) {
        // Get all categories
        $all_categories = get_terms( [
            'taxonomy'   => 'dlhp_document_category',
            'hide_empty' => true,
        ] );

        // Get restricted categories IDs
        $restricted_terms = $this->protection->get_restricted_category_ids();

        // Filter out restricted categories
        $filtered_categories = array_filter( $all_categories, function( $category ) use ( $restricted_terms ) {
            return ! in_array( $category->term_id, $restricted_terms );
        } );

         // If 'includeCategories' is set in settings, use it for further filtering
        if ( ! empty( $library_post[ 'settings' ][ 'includeCategories' ] ) ) {
            $filtered_categories = array_filter( $filtered_categories, function( $category ) use ( $library_post ) {
                return in_array( $category->term_id, $library_post[ 'settings' ][ 'includeCategories' ] );
            } );
        }

        // Build the category hierarchy
        $category_hierarchy = $this->get_category_hierarchy( $filtered_categories );

        ob_start();

        echo '<div class="dlhp-document-folders dlhp-document-folders-' . esc_attr( $library_post[ 'settings' ][ 'foldersLayout' ] ) . '" data-library="' . esc_attr( $this->library_id ) . '">';
        echo '<div class="dlhp-folders-container">' . wp_kses_post( $this->display_categories( $category_hierarchy ) ) . '</div>';
        echo '<div class="dlhp-documents-container"></div>';
        echo '</div>';

        return ob_get_clean();
    }

    // Recursive function to build hierarchy of categories
    private function get_category_hierarchy( $categories, $parent_id = 0 ) {
        $hierarchy = [];

        foreach ( $categories as $category ) {
            if ( $category->parent == $parent_id ) {
                // Recursively find children of this category
                $children = $this->get_category_hierarchy( $categories, $category->term_id );
                $hierarchy[] = [
                    'category' => $category,
                    'children' => $children,
                ];
            }
        }

        return $hierarchy;
    }

    // Function to output categories and their children
    private function display_categories( $categories ) {
        $output = '';

        foreach ( $categories as $item ) {
            $category = $item[ 'category' ];

            $output .= '<div class="dlhp-folder">';
            // SVG icon for the folder
            $output .= '<div class="dlhp-folder-name" data-slug="' . esc_html( $category->slug ) . '">';
            $output .= $this->render_folder_icon();
            $output .= '<span class="dlhp-folder-text">' . esc_html( $category->name ) . '</span>';
            $output .= '</div>';

            // Display child categories if they exist
            if ( ! empty( $item[ 'children' ] ) ) {
                $output .= '<div class="dlhp-child-folders" style="display:none;">';

                // Recursive display of child categories, each with an SVG icon
                foreach ( $item[ 'children' ] as $child_item ) {
                    $output .= '<div class="dlhp-folder">';
                    $output .= '<div class="dlhp-folder-name" data-slug="' . esc_html( $child_item[ 'category' ]->slug ) . '">';
                    $output .= $this->render_folder_icon();
                    $output .= '<span class="dlhp-folder-text">' . esc_html( $child_item[ 'category' ]->name ) . '</span>';
                    $output .= '</div>';

                    // Display any nested child categories recursively
                    if ( ! empty( $child_item[ 'children' ] ) ) {
                        $output .= '<div class="dlhp-child-folders" style="display:none;">';
                        $output .= $this->display_categories( $child_item[ 'children' ] ); // Recursive call for deeper levels
                        $output .= '</div>';
                    }

                    $output .= '</div>'; // Close child folder
                }

                $output .= '</div>'; // Close child folders container
            }

            $output .= '</div>'; // Close main folder
        }

        return $output;
    }

    private function get_library_post( $library_id ) {
        $library_post = get_post( $library_id );
    
        if ( ! $library_post || $library_post->post_type !== 'dlhp_library' ) {
            return '<p>Library not found.</p>';
        }
    
        // Decode JSON settings from Library post content
        $library_settings = json_decode( $library_post->post_content, true );
        if ( empty( $library_settings ) ) {
            return '<p>No valid configuration found for this library.</p>';
        }
    
        return $library_settings;
    }

    public function render_documents( $page = 1, $category = [], $search = '' ) {
        $documents_query = $this->fetch_documents( $page, $category, $search );
    
        $layout = $this->display_settings[ 'documentsLayout' ] ?? 'grid';
    
        switch ( $layout ) {
            case 'table':
                return $this->render_table_layout( $documents_query, $page );
            case 'grid':
            default:
                return $this->render_grid_layout( $documents_query, $page );
        }
    }

    private function render_search_field() {
        $output = '<div class="dlhp-document-search" data-library="' . intval( $this->library_id ) . '">';
        $output .= '<div class="dlhp-search-field-wrap">';
        $output .= '<div class="dlhp-search-field">';
        $output .= '<input type="text" name="document_search" placeholder="' . esc_attr__( 'Search documents...', 'document-library-hub' ) . '" />';
        $output .= '<svg class="dlhp-document-search-icon" width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M15 10.5C15 12.9853 12.9853 15 10.5 15C8.01472 15 6 12.9853 6 10.5C6 8.01472 8.01472 6 10.5 6C12.9853 6 15 8.01472 15 10.5ZM14.1793 15.2399C13.1632 16.0297 11.8865 16.5 10.5 16.5C7.18629 16.5 4.5 13.8137 4.5 10.5C4.5 7.18629 7.18629 4.5 10.5 4.5C13.8137 4.5 16.5 7.18629 16.5 10.5C16.5 11.8865 16.0297 13.1632 15.2399 14.1792L20.0304 18.9697L18.9697 20.0303L14.1793 15.2399Z" fill="#080341"></path> </g></svg>';
        $output .= '</div>';
        $output .= '<span class="dlhp-search-reset" style="display:none;"><svg fill="#000000" width="15px" height="15px" viewBox="0 0 32 32" id="icon" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M18,28A12,12,0,1,0,6,16v6.2L2.4,18.6,1,20l6,6,6-6-1.4-1.4L8,22.2V16H8A10,10,0,1,1,18,26Z"></path><rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>" class="cls-1" width="32" height="32"></rect></g></svg></span>';
        $output .= '</div>';
        $output .= '<div class="dlhp-search-not-found" style="display:none;">' . esc_html__( 'No documents found.', 'document-library-hub' ) . '</div>';
        $output .= '</div>';

        return $output;
    }

    private function render_grid_layout( $documents_query, $page ) {
        if ( ! $documents_query->have_posts() ) {
            return __( 'No documents found.', 'document-library-hub' );
        }
     
        // Main documents container with conditional classes
        $document_classes = 'dlhp-document-items';
        if ( ! empty( $this->display_settings[ 'removeBorder' ] ) ) {
            $document_classes .= ' dlhp-no-border';
        }
        if ( ! empty( $this->display_settings[ 'centerContent' ] ) ) {
            $document_classes .= ' dlhp-center';
        }

        $output = '<div class="' . esc_attr( $document_classes ) . '" data-library="' . esc_attr( $this->library_id ) . '">';
     
        $css = '';

        // CSS Variables
        $css .= ':root {';
        $css .= '--grid-columns-desktop-' . esc_attr( $this->library_id ) . ': ' . esc_attr( $this->display_settings['gridDesktopColumns'] ) . ';';
        $css .= '--grid-columns-tablet-' . esc_attr( $this->library_id ) . ': ' . esc_attr( $this->display_settings['gridTabletColumns'] ) . ';';
        $css .= '--grid-columns-mobile-' . esc_attr( $this->library_id ) . ': ' . esc_attr( $this->display_settings['gridMobileColumns'] ) . ';';
        $css .= '--grid-gap-' . esc_attr( $this->library_id ) . ': ' . esc_attr( $this->display_settings['gridGap'] ) . 'px;';
        
        if ( ! empty( $this->display_settings['backgroundColor'] ) ) {
            $css .= '--document-bg-color-' . esc_attr( $this->library_id ) . ': ' . esc_attr( $this->display_settings['backgroundColor'] ) . ';';
        }

        if ( ! empty( $this->display_settings['titleSize'] ) ) {
            $css .= '--document-title-size-' . esc_attr( $this->library_id ) . ': ' . esc_attr( $this->display_settings['titleSize'] ) . 'px;';
        }
        $css .= '}';

        // Library-specific styles
        $css .= '.dlhp-document-items[data-library="' . esc_attr( $this->library_id ) . '"] .dlhp-document-items-wrap {';
        $css .= 'gap: var(--grid-gap-' . esc_attr( $this->library_id ) . ');';
        $css .= 'grid-template-columns: repeat(var(--grid-columns-desktop-' . esc_attr( $this->library_id ) . '), 1fr);';
        $css .= '}';

        // Media Queries
        $css .= '@media (min-width: 1024px) {';
        $css .= '.dlhp-document-items[data-library="' . esc_attr( $this->library_id ) . '"] .dlhp-document-items-wrap {';
        $css .= 'grid-template-columns: repeat(var(--grid-columns-desktop-' . esc_attr( $this->library_id ) . '), 1fr);';
        $css .= '}';
        $css .= '}';

        $css .= '@media (min-width: 520px) and (max-width: 1023px) {';
        $css .= '.dlhp-document-items[data-library="' . esc_attr( $this->library_id ) . '"] .dlhp-document-items-wrap {';
        $css .= 'grid-template-columns: repeat(var(--grid-columns-tablet-' . esc_attr( $this->library_id ) . '), 1fr);';
        $css .= '}';
        $css .= '}';

        $css .= '@media (max-width: 519px) {';
        $css .= '.dlhp-document-items[data-library="' . esc_attr( $this->library_id ) . '"] .dlhp-document-items-wrap {';
        $css .= 'grid-template-columns: repeat(var(--grid-columns-mobile-' . esc_attr( $this->library_id ) . '), 1fr);';
        $css .= '}';
        $css .= '}';

        $css .= '.dlhp-document-items[data-library="' . esc_attr( $this->library_id ) . '"] .dlhp-document-items-wrap .dlhp-document-item {';
        $css .= 'background-color: var(--document-bg-color-' . esc_attr( $this->library_id ) . ', transparent);';
        $css .= '}';

        $css .= '.dlhp-document-items[data-library="' . esc_attr( $this->library_id ) . '"] .dlhp-document-items-wrap .dlhp-document-title {';
        $css .= 'font-size: var(--document-title-size-' . esc_attr( $this->library_id ) . ', inherit);';
        $css .= '}';

        // Generate a unique handle for the inline styles
        $handle = 'dlhp-library-styles-' . esc_attr( $this->library_id );

        // Add the inline style
        wp_register_style( $handle, false, [], DLHP_PLUGIN_VERSION );
        wp_enqueue_style( $handle );
        wp_add_inline_style( $handle, $css );

        // Loop through documents and render specified items
        $output .= '<div class="dlhp-document-items-wrap">';
     
        if ( $documents_query->have_posts() ) {
            while ( $documents_query->have_posts() ) {
                $documents_query->the_post();
         
                // Fetch file information
                $output .= '<div class="dlhp-document-item">';
         
                // Render each item based on its presence in content_settings
                foreach ( $this->content_settings as $field => $field_settings ) {
                    $output .= $this->render_document_fields( $field, $field_settings );
                }
         
                $output .= '</div>'; // Close document item
            }
            wp_reset_postdata(); // Reset the post data
        }
         
        $output .= '</div>'; // Close document items wrap
        $output .= '</div>'; // Close document items
         
        // Pagination
        $pagination = '<div class="dlhp-pagination pagination">';
     
        $current_url = home_url( add_query_arg( null, null ) );
     
        $pagination .= paginate_links( [
            'total'     => $documents_query->max_num_pages,
            'current'   => $page,
            'format'    => '?paged=%#%', // format for the pagination links
            'prev_text' => __( '&laquo; Previous', 'document-library-hub' ),
            'next_text' => __( 'Next &raquo;', 'document-library-hub' ),
            'add_args'  => false,
            'base'      => $current_url . '?paged=%#%'
        ] );
     
        $pagination .= '</div>';
     
        // Return the documents and pagination
        return [
            'documents' => $output,
            'layout' => 'grid',
            'pagination' => $pagination,
        ];
    }

    private function render_table_layout( $documents_query ) {
        if ( ! $documents_query->have_posts() ) {
            return 'No documents found.';
        }
    
        $output = '<table class="sdl-document-table dlhp-hide" data-config="' . esc_attr( wp_json_encode( $this->display_settings ) ) . '">';
        $output .= '<thead><tr>';
    
        // Render table headers based on content settings
        foreach ( $this->content_settings as $field => $field_settings ) {
            $header_label = $field_settings[ 'settings' ][ 'tableColumnName' ] ?? $field_settings[ 'settings' ][ 'customFieldName' ] ?? ucfirst( $field );
            $output .= '<th>' . esc_html( $header_label ) . '</th>';
        }
    
        $output .= '</tr></thead><tbody>';
    
        // Render table rows
        while ( $documents_query->have_posts() ) {
            $documents_query->the_post();
            $output .= '<tr>';
    
            foreach ( $this->content_settings as $field => $field_settings ) {
                $output .= '<td>' . $this->render_document_fields( $field, $field_settings ) . '</td>';
            }
    
            $output .= '</tr>';
        }
    
        wp_reset_postdata();
        $output .= '</tbody></table></div>';

        // Return the documents
        return [
            'documents' => $output,
            'layout' => 'table',
        ];
    }

    private function fetch_documents( $page = 1, $category = [], $search = '' ) {
        $posts_per_page = $this->display_settings[ 'documentsLayout' ] === 'table' ? $this->display_settings[ 'tableDisplayLimit' ] : $this->display_settings[ 'perPage' ];
    
        // Restricted categories
        $restricted_term_ids = $this->protection->get_restricted_category_ids();
    
        // Query args
        $query_args = [
            'post_type'      => 'dlhp_document',
            'post_status'    => 'publish',
            'posts_per_page' => $posts_per_page ?? 10,
            'orderby'        => $this->display_settings[ 'sort' ] ?? 'menu_order',
            'order'          => $this->display_settings[ 'order' ] ?? 'ASC',
            'paged'          => $page,
        ];
    
        // Tax queries
        $tax_query = [];
    
        if ( ! empty( $restricted_term_ids ) ) {
            $tax_query[] = [
                'taxonomy' => 'dlhp_document_category',
                'field'    => 'term_id',
                'terms'    => $restricted_term_ids,
                'operator' => 'NOT IN',
            ];
        }
    
        if ( ! empty( $this->display_settings[ 'includeCategories' ] ) ) {
            $tax_query[] = [
                'taxonomy' => 'dlhp_document_category',
                'field'    => 'term_id',
                'terms'    => $this->display_settings[ 'includeCategories' ],
                'operator' => 'IN',
            ];
        }
    
        if ( ! empty( $category ) && array_filter( $category ) ) {
            $tax_query[] = [
                'taxonomy' => 'dlhp_document_category',
                'field'    => 'slug',
                'terms'    => $category,
                'operator' => 'IN',
            ];
        }
    
        if ( ! empty( $tax_query ) ) {
            $query_args[ 'tax_query' ] = $tax_query;
        }
    
        if ( ! empty( $search ) ) {
            $query_args[ 's' ] = $search;
        }
    
        // Fetch documents
        return new \WP_Query( $query_args );
    }

    private function render_document_fields( $field, $field_settings ) {
        $output = '';

        switch ( $field ) {
            case 'author':
                $output .= $this->render_author_field( $field_settings );
                break;
    
            case 'content':
                $output .= $this->render_content_field( $field_settings );
                break;
    
            case 'excerpt':
                $output .= $this->render_excerpt_field( $field_settings );
                break;
    
            case 'title':
                $output .= $this->render_title_field( $field_settings );
                break;

            case 'categories':
                $output .= $this->render_categories_field();
                break;

            case 'tags':
                $output .= $this->render_tags_field( $field_settings );
                break;
    
            case 'date':
                $output .= $this->render_date_field( $field_settings );
                break;

            case 'button':
                $output .= $this->render_button_field( $field_settings );
                break;

            case 'fileSize':
                $output .= $this->render_file_size_field( $field_settings );
                break;

            case 'fileType':
                $output .= $this->render_file_type_field( $field_settings );
                break;

            case 'image':
                $output .= $this->render_image_field( $field_settings );
                break;

            case ( strpos( $field, 'customField' ) === 0 ? $field : false ):
                $output .= $this->render_custom_field( $field_settings );
                break;
        
            default:
                break;
        }
        return $output;
    }
    
    private function get_file_info() {
        // Get the file source
        $file_source = get_post_meta( get_the_ID(), '_dlhp_document_file_source', true );

        $file_info = [
            'url' => '',
            'size' => '',
            'type' => '',
        ];
    
        if ( 'media' === $file_source ) {
            $file_info[ 'url' ] = get_post_meta( get_the_ID(), '_dlhp_document_file_url', true );
            
            if ( $file_info[ 'url' ] ) {
                $file_path = get_attached_file( attachment_url_to_postid( $file_info[ 'url' ] ) ); // Get file path from URL
                
                if ( file_exists( $file_path ) ) {
                    // Get file size in KB or MB
                    $file_info[ 'size' ] = size_format( filesize( $file_path ), 2 ); // Format file size (e.g., "1.5 MB")
                    // Extract file extension
                    $file_info[ 'type' ] = pathinfo( $file_path, PATHINFO_EXTENSION ); 
                }
            }
        } elseif ( 'external' === $file_source ) {
            $file_info[ 'url' ] = get_post_meta( get_the_ID(), '_dlhp_document_external_url', true );
            $file_info[ 'size' ] = get_post_meta( get_the_ID(), '_dlhp_document_file_size', true );
            $file_info[ 'type' ] = get_post_meta( get_the_ID(), '_dlhp_document_file_type', true );
        }
    
        return $file_info;
    }
    
    private function render_author_field( $field_settings ) {
        $settings = $field_settings[ 'settings' ] ?? [];
    
        $is_clickable = isset( $settings[ 'clickable' ] ) && $settings[ 'clickable' ] === 'author_posts';
        $author_link = $is_clickable ? esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) : '';
        $author_name = get_the_author();

        return sprintf(
            '<div class="dlhp-document-cell dlhp-document-author">%s</div>',
            $is_clickable ? '<a href="' . $author_link . '">' . esc_html( $author_name ) . '</a>' : esc_html( $author_name )
        );
    }    
    
    private function render_excerpt_field( $field_settings ) {
        $excerpt = get_the_excerpt();
        $limit = isset( $settings[ 'limit' ] ) ? (int) $settings[ 'limit' ] : null;
        $settings = $field_settings[ 'settings' ] ?? [];

        if ( empty( $excerpt ) ) {
            return '<div class="dlhp-document-cell dlhp-document-cell-empty dlhp-document-excerpt"></div>';
        } else {
            // Limit the excerpt length if specified
            if ( $limit ) {
                $excerpt = substr( $excerpt, 0, $limit ) . ( strlen( $excerpt ) > $limit ? '...' : '' );
            }
    
            return '<div class="dlhp-document-cell dlhp-document-excerpt">' . esc_html( $excerpt ) . '</div>';
        }
    }    

    private function render_content_field() {
        $content = get_the_content();
    
        if ( empty( $content ) ) {
            return '<div class="dlhp-document-cell dlhp-document-cell-empty dlhp-document-content"></div>';
        } else {
            return '<div class="dlhp-document-cell dlhp-document-content">' . wp_kses_post( $content ) . '</div>';
        }
    }    

    private function render_categories_field() {
        $terms = get_the_terms( get_the_ID(), 'dlhp_document_category' );
    
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            $term_links = array_map( function( $term ) {
                return '<a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a>';
            }, $terms );
            return '<div class="dlhp-document-cell dlhp-document-category">' . implode( ', ', $term_links ) . '</div>';
        } else {
            return '<div class="dlhp-document-cell dlhp-document-cell-empty dlhp-document-category"></div>';
        }
    }    

    private function render_tags_field( $field_settings ) {
        $terms = get_the_terms( get_the_ID(), 'dlhp_document_tag' );
    
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            $term_links = array_map( function( $term ) {
                return '<a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a>';
            }, $terms );
            return '<div class="dlhp-document-cell dlhp-document-tags">' . implode( ', ', $term_links ) . '</div>';
        } else {
            return '<div class="dlhp-document-cell dlhp-document-cell-empty dlhp-document-tags"></div>';
        }
    }    

    private function render_date_field( $field_settings ) {
        return '<div class="dlhp-document-cell dlhp-document-date">' . get_the_date() . '</div>';
    }
    
    private function render_button_field( $field_settings ) {
        $file_url = $this->get_file_info()[ 'url' ] ?? '';
    
        if ( $field_settings[ 'settings' ][ 'clickable' ] === 'document_post' ) {
            return '<div class="dlhp-document-cell dlhp-document-download"><a href="' . esc_url( get_permalink() ) . '"><svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M17 17H17.01M17.4 14H18C18.9319 14 19.3978 14 19.7654 14.1522C20.2554 14.3552 20.6448 14.7446 20.8478 15.2346C21 15.6022 21 16.0681 21 17C21 17.9319 21 18.3978 20.8478 18.7654C20.6448 19.2554 20.2554 19.6448 19.7654 19.8478C19.3978 20 18.9319 20 18 20H6C5.06812 20 4.60218 20 4.23463 19.8478C3.74458 19.6448 3.35523 19.2554 3.15224 18.7654C3 18.3978 3 17.9319 3 17C3 16.0681 3 15.6022 3.15224 15.2346C3.35523 14.7446 3.74458 14.3552 4.23463 14.1522C4.60218 14 5.06812 14 6 14H6.6M12 15V4M12 15L9 12M12 15L15 12" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></a></div>';
        } elseif ( ! empty( $file_url ) && $field_settings[ 'settings' ][ 'clickable' ] === 'file_url' ) {
            return '<div class="dlhp-document-cell dlhp-document-download"><a href="' . esc_url( $file_url ) . '"><svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M17 17H17.01M17.4 14H18C18.9319 14 19.3978 14 19.7654 14.1522C20.2554 14.3552 20.6448 14.7446 20.8478 15.2346C21 15.6022 21 16.0681 21 17C21 17.9319 21 18.3978 20.8478 18.7654C20.6448 19.2554 20.2554 19.6448 19.7654 19.8478C19.3978 20 18.9319 20 18 20H6C5.06812 20 4.60218 20 4.23463 19.8478C3.74458 19.6448 3.35523 19.2554 3.15224 18.7654C3 18.3978 3 17.9319 3 17C3 16.0681 3 15.6022 3.15224 15.2346C3.35523 14.7446 3.74458 14.3552 4.23463 14.1522C4.60218 14 5.06812 14 6 14H6.6M12 15V4M12 15L9 12M12 15L15 12" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></a></div>';
        } else {
            return '<div class="dlhp-document-cell dlhp-document-cell-empty dlhp-document-download"></div>';
        }
    }    

    private function render_file_size_field( $field_settings ) {
        $file_info = $this->get_file_info();
    
        if ( ! empty( $file_info[ 'size' ] ) ) {
            return '<div class="dlhp-document-cell dlhp-document-file-size">' . esc_html( $file_info[ 'size' ] ) . '</div>';
        } else {
            return '<div class="dlhp-document-cell dlhp-document-cell-empty dlhp-document-file-size"></div>';
        }
    }

    private function render_file_type_field( $field_settings ) {
        $file_info = $this->get_file_info( get_the_ID() );
    
        if ( ! empty( $file_info[ 'type' ] ) ) {
            return '<div class="dlhp-document-cell dlhp-document-file-type">' . esc_html( $file_info[ 'type' ] ) . '</div>';
        } else {
            return '<div class="dlhp-document-cell dlhp-document-cell-empty dlhp-document-file-type"></div>';
        }
    }
    
    private function render_title_field( $field_settings ) {
        $title = get_the_title();
        $get_permalink = get_permalink();
        $file_info = $this->get_file_info( get_the_ID() );
    
        if ( empty( $title ) ) {
            return '<div class="dlhp-document-cell dlhp-document-cell-empty dlhp-document-title"></div>';
        } elseif ( $field_settings[ 'settings' ][ 'clickable' ] === 'none' ) {
            return '<div class="dlhp-document-cell dlhp-document-title">' . $title . '</div>';
        } elseif ( $field_settings[ 'settings' ][ 'clickable' ] === 'document_post' ) {
            return '<div class="dlhp-document-cell dlhp-document-title"><a href="' . esc_url( $get_permalink ) . '">' . esc_html( $title ) . '</a></div>';
        } elseif ( $field_settings[ 'settings' ][ 'clickable' ] === 'file_url' ) {
            if ( ! empty( $file_info[ 'url' ] ) ) {
                return '<div class="dlhp-document-cell dlhp-document-title"><a href="' . esc_url( $file_info[ 'url' ] ) . '">' . esc_html( $title ) . '</a></div>';
            } else {
                return '<div class="dlhp-document-cell dlhp-document-title">' . esc_html( $title ) . '</div>';
            }
        }
    }
    
    private function render_custom_field( $field_settings ) {
        $customFieldName = ! empty( $field_settings[ 'settings' ][ 'customFieldName' ] ) ? esc_html( $field_settings[ 'settings' ][ 'customFieldName' ] ) : '';
    
        if ( ! empty( $customFieldName ) ) {
            $customFieldValue = get_post_meta( get_the_ID(), $customFieldName, true );
            if ( empty( $customFieldValue ) ) {
                return '<div class="dlhp-document-cell dlhp-document-field dlhp-document-cell-empty"></div>';
            } else {
                return '<div class="dlhp-document-cell dlhp-document-field dlhp-document-field-' . esc_attr( $customFieldName ) . '">' . esc_html( $customFieldValue ) . '</div>';
            }
        } else {
            return '<div class="dlhp-document-cell dlhp-document-field dlhp-document-cell-empty"></div>';
        }
    }

    private function render_image_field( $field_settings ) {
        if ( $this->display_settings[ 'documentsLayout' ] === 'table' ) {
            $image_html = get_the_post_thumbnail( get_the_ID(), 'thumbnail' );
        } else {
            $image_html = get_the_post_thumbnail( get_the_ID(), 'medium' );
        }

        $file_info = $this->get_file_info( get_the_ID() );
        $linkTo = $field_settings[ 'settings' ][ 'clickable' ];
    
        if ( isset( $field_settings[ 'settings' ][ 'useIcon' ] ) && $field_settings[ 'settings' ][ 'useIcon' ] ) {
            $icon_html = '';
    
            switch ( strtolower( $file_info[ 'type' ] ) ) {
                case 'mp4':
                    $icon_html = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" enable-background="new 0 0 32 32" xml:space="preserve" width="52px" height="52px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <polygon fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" points="7,28 7,4 19,4 25,10 25,28 "></polygon> <polyline fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" points="19,4 19,10 25,10 "></polyline> <polygon fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" points="19,18 14,21 14,15 "></polygon> </g></svg>';
                    break;
                case 'mpg':
                    $icon_html = '<svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 550.801 550.801" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M287.782,413.949c-5.295,0-8.881,0.512-10.758,1.028v33.993c2.215,0.506,4.946,0.686,8.712,0.686 c13.837,0,22.38-7.014,22.38-18.795C308.116,420.272,300.766,413.949,287.782,413.949z"></path> <path d="M475.084,131.992c-0.021-2.526-0.828-5.021-2.562-6.993L366.324,3.694c-0.031-0.034-0.062-0.045-0.084-0.076 c-0.633-0.707-1.371-1.29-2.151-1.804c-0.232-0.15-0.464-0.285-0.707-0.422c-0.675-0.366-1.392-0.67-2.13-0.892 c-0.201-0.058-0.38-0.14-0.58-0.192C359.87,0.114,359.037,0,358.193,0H97.2C85.282,0,75.6,9.693,75.6,21.601v507.6 c0,11.913,9.682,21.601,21.6,21.601H453.6c11.908,0,21.601-9.688,21.601-21.601V133.202 C475.2,132.796,475.137,132.398,475.084,131.992z M205.767,510.301l-1.706-44.076c-0.52-13.837-1.021-30.58-1.021-47.323h-0.509 c-3.597,14.691-8.375,31.092-12.814,44.587L175.7,508.412h-20.326l-12.295-44.581c-3.755-13.5-7.691-29.9-10.423-44.93h-0.346 c-0.686,15.546-1.194,33.317-2.046,47.661l-2.046,43.738h-24.089l7.348-115.141h34.668l11.274,38.433 c3.586,13.331,7.172,27.675,9.748,41.17h0.506c3.251-13.326,7.172-28.529,10.937-41.339l12.295-38.264h33.993l6.328,115.141 H205.767z M323.314,457.514c-8.881,8.363-22.032,12.129-37.41,12.129c-3.417,0-6.486-0.169-8.886-0.518v41.176h-25.795V396.694 c8.024-1.365,19.301-2.389,35.188-2.389c16.062,0,27.506,3.069,35.194,9.229c7.341,5.801,12.309,15.372,12.309,26.646 C333.914,441.456,330.148,451.017,323.314,457.514z M446.671,505.006c-8.037,2.731-23.235,6.486-38.443,6.486 c-21.01,0-36.208-5.289-46.808-15.546c-10.589-9.903-16.4-24.943-16.221-41.851c0.169-38.264,28.013-60.133,65.76-60.133 c14.86,0,26.314,2.906,31.946,5.638l-5.463,20.841c-6.317-2.732-14.175-4.957-26.821-4.957c-21.694,0-38.095,12.297-38.095,37.235 c0,23.746,14.871,37.758,36.218,37.758c5.975,0,10.758-0.686,12.814-1.703V464.68h-17.771v-20.323h42.878v60.649H446.671z M97.2,366.752V21.601h250.192v110.515c0,5.961,4.842,10.8,10.801,10.8H453.6v223.836H97.2z"></path> <path d="M228.495,160.574c-0.928-0.723-2.17-0.857-3.229-0.341c-1.031,0.493-1.706,1.577-1.706,2.716v128.788 c0,1.14,0.675,2.226,1.706,2.711l1.339,0.311c0.675,0,1.329-0.231,1.89-0.659l100.831-64.383c0.717-0.588,1.149-1.479,1.149-2.392 c0-0.907-0.433-1.788-1.149-2.389L228.495,160.574z"></path> </g> </g> </g></svg>';
                    break;
                case 'wmv':
                    $icon_html = '<svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 571.539 571.539" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M492.985,136.956c-0.033-2.621-0.878-5.204-2.676-7.256L380.118,3.822c-0.033-0.03-0.065-0.046-0.088-0.074 c-0.654-0.739-1.421-1.338-2.232-1.871c-0.239-0.156-0.481-0.301-0.733-0.438c-0.7-0.386-1.434-0.695-2.209-0.925 c-0.21-0.061-0.396-0.15-0.602-0.194C373.421,0.117,372.554,0,371.68,0H100.859C88.504,0,78.446,10.051,78.446,22.412v526.713 c0,12.355,10.058,22.413,22.413,22.413H470.68c12.354,0,22.412-10.058,22.412-22.413V138.211 C493.092,137.79,493.027,137.376,492.985,136.956z M213.201,519.959h-24.516l-8.46-43.064c-1.938-10.112-3.559-19.47-4.751-30.9 h-0.296c-1.784,11.289-3.424,20.788-5.789,30.9l-9.507,43.064h-24.814l-23.745-100.094h24.195l7.576,41.28 c2.229,11.874,4.314,24.811,5.944,34.901h0.306c1.62-10.833,4.008-22.873,6.523-35.19l8.474-40.991h24.067l8.023,42.185 c2.219,11.736,3.855,22.423,5.338,33.564h0.298c1.492-11.142,3.71-22.872,5.801-34.758l8.164-40.991h23.012L213.201,519.959z M336.932,519.959l-1.488-38.32c-0.448-12.02-0.887-26.588-0.887-41.145h-0.448c-3.119,12.772-7.276,27.043-11.142,38.775 l-12.181,39.064h-17.674l-10.689-38.774c-3.261-11.737-6.672-25.987-9.047-39.065h-0.31c-0.588,13.517-1.042,28.972-1.77,41.442 l-1.781,38.017h-20.948l6.384-100.088h30.149l9.795,33.412c3.119,11.579,6.238,24.056,8.471,35.793h0.438 c2.825-11.579,6.248-24.806,9.511-35.941l10.691-33.264h29.562l5.492,100.094H336.932z M426.509,519.959h-26.44l-32.083-100.094 h24.817l12.168,42.321c3.409,11.874,6.533,23.321,8.908,35.803h0.459c2.52-12.033,5.639-23.929,9.052-35.354l12.766-42.77h24.057 L426.509,519.959z M100.859,380.555V22.412h259.615v114.672c0,6.187,5.024,11.207,11.206,11.207h99v232.265H100.859z"></path> <path d="M280.155,123.454c-58.396,0-105.902,47.508-105.902,105.908c0,58.399,47.51,105.907,105.902,105.907 c58.408,0,105.916-47.508,105.916-105.907C386.071,170.961,338.563,123.454,280.155,123.454z M280.155,315.977 c-47.745,0-86.611-38.859-86.611-86.615c0-47.757,38.866-86.611,86.611-86.611c47.762,0,86.622,38.854,86.622,86.611 C366.777,277.118,327.917,315.977,280.155,315.977z"></path> <path d="M248.502,166.308c-1.014,0.465-1.653,1.518-1.653,2.626v124.337c0,1.111,0.639,2.151,1.653,2.621l1.284,0.296 c0.654,0,1.284-0.23,1.813-0.635l97.352-62.164c0.7-0.572,1.116-1.429,1.116-2.312c0-0.875-0.416-1.721-1.116-2.309 l-97.352-62.143C250.717,165.925,249.515,165.796,248.502,166.308z"></path> </g> </g> </g></svg>';
                    break;
                case 'mp3':
                case 'wav':
                    $icon_html = '<svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 31.266 31.266" xml:space="preserve" transform="rotate(0)matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M11.094,0L2.997,8.549v22.717h25.271V0H11.094z M10.38,3.595v3.788H6.793L10.38,3.595z M26.315,29.312H4.952V9.338h7.383 V1.954h13.98V29.312z"></path> <polygon points="11.294,20.375 14.443,20.375 19.974,24.189 19.974,10.267 14.443,14.082 11.294,14.082 "></polygon> </g> </g> </g></svg>';
                case 'pdf':
                    $icon_html = '<svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 550.801 550.801" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M267.342,414.698c-6.613,0-10.884,0.585-13.413,1.165v85.72c2.534,0.586,6.616,0.586,10.304,0.586 c26.818,0.189,44.315-14.576,44.315-45.874C308.738,429.079,292.803,414.698,267.342,414.698z"></path> <path d="M152.837,414.313c-6.022,0-10.104,0.58-12.248,1.16v38.686c2.531,0.58,5.643,0.78,9.903,0.78 c15.757,0,25.471-7.973,25.471-21.384C175.964,421.506,167.601,414.313,152.837,414.313z"></path> <path d="M475.095,131.992c-0.032-2.526-0.833-5.021-2.568-6.993L366.324,3.694c-0.021-0.034-0.062-0.045-0.084-0.076 c-0.633-0.707-1.36-1.29-2.141-1.804c-0.232-0.15-0.475-0.285-0.718-0.422c-0.675-0.366-1.382-0.67-2.13-0.892 c-0.19-0.058-0.38-0.14-0.58-0.192C359.87,0.114,359.037,0,358.203,0H97.2C85.292,0,75.6,9.693,75.6,21.601v507.6 c0,11.913,9.692,21.601,21.6,21.601H453.6c11.908,0,21.601-9.688,21.601-21.601V133.202 C475.2,132.796,475.137,132.398,475.095,131.992z M193.261,463.873c-10.104,9.523-25.072,13.806-42.569,13.806 c-3.882,0-7.391-0.2-10.102-0.58v46.839h-29.35V394.675c9.131-1.55,21.967-2.721,40.047-2.721 c18.267,0,31.292,3.501,40.036,10.494c8.363,6.612,13.985,17.497,13.985,30.322C205.308,445.605,201.042,456.49,193.261,463.873z M318.252,508.392c-13.785,11.464-34.778,16.906-60.428,16.906c-15.359,0-26.238-0.97-33.637-1.94V394.675 c10.887-1.74,25.083-2.721,40.046-2.721c24.867,0,41.004,4.472,53.645,13.995c13.61,10.109,22.164,26.241,22.164,49.37 C340.031,480.4,330.897,497.697,318.252,508.392z M439.572,417.225h-50.351v29.932h47.039v24.11h-47.039v52.671H359.49V392.935 h80.082V417.225z M97.2,366.752V21.601h250.203v110.515c0,5.961,4.831,10.8,10.8,10.8H453.6l0.011,223.836H97.2z"></path> <path d="M386.205,232.135c-0.633-0.059-15.852-1.448-39.213-1.448c-7.319,0-14.691,0.143-21.969,0.417 c-46.133-34.62-83.919-69.267-104.148-88.684c0.369-2.138,0.623-3.828,0.741-5.126c2.668-28.165-0.298-47.179-8.786-56.515 c-5.558-6.101-13.721-8.131-22.233-5.806c-5.286,1.385-15.071,6.513-18.204,16.952c-3.459,11.536,2.101,25.537,16.708,41.773 c0.232,0.246,5.189,5.44,14.196,14.241c-5.854,27.913-21.178,88.148-28.613,117.073c-17.463,9.331-32.013,20.571-43.277,33.465 l-0.738,0.844l-0.477,1.013c-1.16,2.437-6.705,15.087-2.542,25.249c1.901,4.62,5.463,7.995,10.302,9.767l1.297,0.349 c0,0,1.17,0.253,3.227,0.253c9.01,0,31.25-4.735,43.179-48.695l2.89-11.138c41.639-20.239,93.688-26.768,131.415-28.587 c19.406,14.391,38.717,27.611,57.428,39.318l0.611,0.354c0.907,0.464,9.112,4.515,18.721,4.524l0,0 c13.732,0,23.762-8.427,27.496-23.113l0.189-1.004c1.044-8.393-1.065-15.958-6.096-21.872 C407.711,233.281,387.978,232.195,386.205,232.135z M142.812,319.744c-0.084-0.1-0.124-0.194-0.166-0.3 c-0.896-2.157,0.179-7.389,1.761-11.222c6.792-7.594,14.945-14.565,24.353-20.841 C159.598,317.039,146.274,319.603,142.812,319.744z M200.984,122.695L200.984,122.695c-14.07-15.662-13.859-23.427-13.102-26.041 c1.242-4.369,6.848-6.02,6.896-6.035c2.824-0.768,4.538-0.617,6.064,1.058c3.451,3.791,6.415,15.232,5.244,36.218 C202.764,124.557,200.984,122.695,200.984,122.695z M193.714,256.068l0.243-0.928l-0.032,0.011 c7.045-27.593,17.205-67.996,23.047-93.949l0.211,0.201l0.021-0.124c18.9,17.798,47.88,43.831,82.579,70.907l-0.39,0.016 l0.574,0.433C267.279,235.396,228.237,241.84,193.714,256.068z M408.386,265.12c-2.489,9.146-7.277,10.396-11.665,10.396l0,0 c-5.094,0-9.998-2.12-11.116-2.632c-12.741-7.986-25.776-16.688-38.929-25.998c0.105,0,0.2,0,0.316,0 c22.549,0,37.568,1.369,38.158,1.411c3.766,0.14,15.684,1.9,20.82,7.938C407.984,258.602,408.755,261.431,408.386,265.12z"></path> </g> </g> </g></svg>';
                    break;
                case 'doc':
                case 'docx':
                    $icon_html = '<svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 548.291 548.291" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M472.929,131.385c-0.031-2.514-0.839-4.992-2.566-6.96L364.656,3.667c-0.031-0.029-0.062-0.044-0.084-0.07 c-0.63-0.709-1.365-1.284-2.142-1.795c-0.231-0.149-0.463-0.29-0.704-0.42c-0.672-0.37-1.376-0.667-2.121-0.888 c-0.2-0.058-0.377-0.144-0.577-0.186C358.231,0.113,357.4,0,356.561,0H96.757C84.904,0,75.255,9.644,75.255,21.502V526.79 c0,11.854,9.649,21.501,21.502,21.501h354.775c11.853,0,21.503-9.647,21.503-21.501v-394.2 C473.036,132.186,472.971,131.79,472.929,131.385z M165.853,484.783c-9.837,8.18-24.796,12.055-43.09,12.055 c-10.938,0-18.701-0.693-23.959-1.387v-91.708c7.759-1.243,17.87-1.932,28.539-1.932c17.732,0,29.231,3.182,38.223,9.975 c9.705,7.201,15.801,18.698,15.801,35.181C181.367,464.835,174.854,477.171,165.853,484.783z M234.845,497.393 c-27.703,0-43.917-20.926-43.917-47.519c0-27.979,17.867-48.908,45.439-48.908c28.683,0,44.324,21.48,44.324,47.244 C280.697,478.831,262.137,497.393,234.845,497.393z M342.356,479.796c6.373,0,13.438-1.387,17.591-3.044l3.187,16.483 c-3.879,1.932-12.604,4.02-23.959,4.02c-32.289,0-48.908-20.084-48.908-46.688c0-31.864,22.724-49.602,50.977-49.602 c10.939,0,19.255,2.221,22.992,4.158l-4.293,16.761c-4.295-1.806-10.247-3.465-17.733-3.465c-16.767,0-29.785,10.11-29.785,30.888 C312.434,468.017,323.521,479.796,342.356,479.796z M426.587,495.871l-8.451-16.902c-3.464-6.511-5.68-11.361-8.315-16.769h-0.272 c-1.942,5.407-4.295,10.258-7.201,16.769l-7.76,16.902h-24.104l27.013-47.245L371.459,402.5h24.24l8.169,17.044 c2.771,5.671,4.85,10.247,7.064,15.508h0.274c2.216-5.949,4.021-10.111,6.373-15.508l7.895-17.044h24.105l-26.315,45.57 l27.701,47.805h-24.379V495.871z M96.757,365.076V21.502H345.81v110.006c0,5.935,4.819,10.751,10.751,10.751h94.972v222.816 H96.757z"></path> <path d="M129.558,418.011c-4.713,0-7.755,0.42-9.562,0.833v61.09c1.806,0.408,4.713,0.408,7.347,0.408 c19.121,0.143,31.58-10.388,31.58-32.683C159.057,428.268,147.7,418.011,129.558,418.011z"></path> <path d="M235.813,417.738c-14.268,0-22.572,13.574-22.572,31.722c0,18.284,8.59,31.166,22.723,31.166 c14.265,0,22.435-13.574,22.435-31.717C258.394,432.143,250.365,417.738,235.813,417.738z"></path> <g> <path d="M340.372,179.759V118.7H130.729v148.72h61.065v61.057h209.639V179.759H340.372z M191.794,256.67h-50.315V129.451h188.142 v50.308H191.794V256.67z M390.682,317.726H202.545V190.509h188.137V317.726z"></path> <circle cx="233.131" cy="213.354" r="7.166"></circle> <rect x="251.3" y="210.667" width="109.302" height="5.375"></rect> <circle cx="233.131" cy="239.334" r="7.166"></circle> <rect x="251.3" y="236.646" width="109.302" height="5.375"></rect> <circle cx="233.131" cy="267.294" r="7.167"></circle> <rect x="251.3" y="264.604" width="109.302" height="5.375"></rect> <path d="M233.131,286.555c3.956,0,7.166,3.212,7.166,7.172c0,3.952-3.21,7.159-7.166,7.159c-3.958,0-7.165-3.207-7.165-7.159 C225.966,289.767,229.173,286.555,233.131,286.555z"></path> <rect x="251.3" y="291.038" width="109.302" height="5.375"></rect> </g> </g> </g> </g></svg>';
                    break;
                case 'xls':
                case 'xlsx':
                    $icon_html = '<svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 550.801 550.801" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M475.095,131.997c-0.031-2.526-0.828-5.021-2.562-6.992L366.325,3.694c-0.021-0.034-0.053-0.045-0.085-0.076 c-0.633-0.707-1.36-1.29-2.141-1.804c-0.232-0.15-0.464-0.287-0.707-0.422c-0.686-0.366-1.392-0.67-2.13-0.892 c-0.2-0.058-0.38-0.14-0.58-0.192C359.87,0.119,359.048,0,358.204,0H97.2c-11.907,0-21.6,9.693-21.6,21.601v507.6 c0,11.913,9.692,21.601,21.6,21.601h356.4c11.918,0,21.6-9.688,21.6-21.601V133.207 C475.2,132.796,475.137,132.398,475.095,131.997z M201.192,523.221l-12.129-24.258c-4.967-9.345-8.152-16.306-11.928-24.058 h-0.398c-2.787,7.757-6.162,14.713-10.336,24.058l-11.141,24.258h-34.594l38.773-67.807l-37.378-66.213h34.792l11.728,24.458 c3.976,8.153,6.961,14.713,10.149,22.265h0.388c3.185-8.543,5.767-14.513,9.142-22.265l11.34-24.458h34.594l-37.774,65.422 l39.77,68.598H201.192z M336.182,523.221h-83.71V389.212h30.428v108.559h53.282V523.221z M386.87,525.203 c-15.304,0-30.417-3.977-37.969-8.152l6.165-25.049c8.158,4.166,20.683,8.342,33.607,8.342c13.917,0,21.268-5.758,21.268-14.512 c0-8.354-6.365-13.126-22.465-18.89c-22.265-7.752-36.793-20.081-36.793-39.562c0-22.865,19.09-40.368,50.715-40.368 c15.104,0,26.235,3.186,34.193,6.761l-6.761,24.453c-5.368-2.584-14.919-6.36-28.028-6.36c-13.12,0-19.48,5.959-19.48,12.926 c0,8.548,7.552,12.323,24.849,18.884c23.657,8.754,34.794,21.072,34.794,39.962C440.955,506.124,423.663,525.203,386.87,525.203z M97.2,366.758V21.605h250.204v110.516c0,5.962,4.83,10.8,10.8,10.8h95.396l0.011,223.837H97.2z"></path> <path d="M307.353,138.375h-84.148H128.25v40.5v5.4v35.1v5.4v35.1v5.4v40.5h89.548h5.4h84.154h5.399h89.549v-45.9v-35.1v-40.5v-5.4 v-40.5H307.353z M307.353,219.375h-84.148v-35.1h84.148V219.375z M133.65,143.775h84.148v35.1H133.65V143.775z M133.65,184.275 h84.148v35.1H133.65V184.275z M133.65,224.775h84.148v35.1H133.65V224.775z M133.65,300.375v-35.1h84.148v35.1H133.65z M223.204,300.375v-35.1h84.148v35.1H223.204z M396.9,300.375h-84.148v-35.1H396.9V300.375z M396.9,219.375h-84.148v-35.1H396.9 V219.375z M312.752,178.875v-35.1H396.9v35.1H312.752z"></path> </g> </g> </g></svg>';
                    break;
                case 'pptx':
                    $icon_html = '<svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 550.801 550.801" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M475.095,132c-0.032-2.529-0.833-5.023-2.568-6.995L366.324,3.694c-0.021-0.031-0.053-0.042-0.084-0.076 c-0.633-0.707-1.36-1.29-2.141-1.804c-0.232-0.15-0.465-0.285-0.707-0.419c-0.686-0.369-1.393-0.67-2.131-0.892 c-0.2-0.061-0.379-0.14-0.58-0.195C359.87,0.119,359.047,0,358.203,0H97.2C85.292,0,75.6,9.693,75.6,21.601v507.6 c0,11.913,9.692,21.601,21.6,21.601H453.6c11.918,0,21.601-9.688,21.601-21.601V133.207 C475.2,132.804,475.137,132.398,475.095,132z M175.046,463.014c-7.533,7.093-18.673,10.277-31.693,10.277 c-2.892,0-5.508-0.147-7.533-0.442v34.878h-21.848v-96.229c6.805-1.16,16.35-2.03,29.813-2.03c13.608,0,23.295,2.6,29.813,7.811 c6.215,4.925,10.418,13.025,10.418,22.58C184.017,449.413,180.829,457.514,175.046,463.014z M259.14,463.014 c-7.525,7.093-18.674,10.277-31.691,10.277c-2.895,0-5.503-0.147-7.528-0.442v34.878h-21.848v-96.229 c6.803-1.16,16.35-2.03,29.813-2.03c13.608,0,23.301,2.6,29.813,7.811c6.22,4.925,10.415,13.025,10.415,22.58 C268.115,449.413,264.935,457.514,259.14,463.014z M349.756,428.721h-26.631v79.006h-22.148v-79.006h-26.191v-18.526h74.971 V428.721z M415.463,507.727l-8.828-17.655c-3.612-6.803-5.933-11.865-8.68-17.508h-0.285c-2.035,5.643-4.493,10.705-7.53,17.508 l-8.11,17.655h-25.176l28.224-49.349l-27.211-48.184h25.323l8.537,17.798c2.896,5.938,5.068,10.711,7.383,16.211h0.29 c2.32-6.223,4.198-10.568,6.655-16.211l8.248-17.798h25.186l-27.501,47.614l28.936,49.918H415.463z M97.2,366.758V21.605h250.203 v110.519c0,5.961,4.831,10.8,10.8,10.8H453.6l0.011,223.834H97.2z"></path> <path d="M144.946,426.11c-4.485,0-7.533,0.438-9.121,0.87v28.798c1.885,0.438,4.198,0.575,7.383,0.575 c11.723,0,18.966-5.933,18.966-15.916C162.166,431.463,155.941,426.11,144.946,426.11z"></path> <path d="M229.041,426.11c-4.487,0-7.527,0.438-9.115,0.87v28.798c1.886,0.438,4.195,0.575,7.375,0.575 c11.731,0,18.966-5.933,18.966-15.916C246.262,431.463,240.036,426.11,229.041,426.11z"></path> </g> <g> <path d="M199.682,120.021c-51.511,3.482-92.249,46.256-92.249,98.658c0,12.237,2.328,23.905,6.389,34.723l85.86-37.655V120.021z"></path> <path d="M118.141,263.301c16.324,32.233,49.687,54.377,88.291,54.377c33.404,0,62.883-16.596,80.812-41.939l-81.261-50.968 L118.141,263.301z"></path> <path d="M212.425,118.671v94.959l82.54,51.78c7.884-14.212,12.408-30.542,12.408-47.946 C307.373,164.154,265.204,120.814,212.425,118.671z"></path> <rect x="325.804" y="175.922" width="108" height="16.119"></rect> <rect x="325.804" y="216.958" width="108" height="16.118"></rect> <rect x="325.804" y="257.35" width="108" height="16.118"></rect> </g> </g> </g></svg>';
                    break;
                case 'ttf':
                    $icon_html = '<svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 550.801 550.801" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M475.095,131.992c-0.031-2.526-0.833-5.021-2.568-6.993L366.319,3.694c-0.021-0.034-0.053-0.045-0.089-0.076 c-0.628-0.707-1.361-1.29-2.136-1.804c-0.232-0.15-0.465-0.285-0.707-0.422c-0.686-0.366-1.393-0.67-2.136-0.892 c-0.2-0.058-0.374-0.14-0.575-0.192C359.87,0.119,359.037,0,358.198,0H97.2c-11.907,0-21.6,9.693-21.6,21.601v507.6 c0,11.913,9.692,21.601,21.6,21.601h356.4c11.918,0,21.6-9.688,21.6-21.601V133.202 C475.2,132.796,475.137,132.398,475.095,131.992z M225.543,423.131H191.89v99.879h-27.994v-99.879h-33.109v-23.414h94.756V423.131 z M329.822,423.131h-33.655v99.879h-27.991v-99.879h-33.109v-23.414h94.756V423.131z M420.02,422.587h-47.382v28.166h44.265 v22.687h-44.265v49.57h-27.997V399.717h75.368v22.87H420.02z M97.2,366.752V21.601h250.204v110.515c0,5.961,4.83,10.8,10.8,10.8 h95.396l0.011,223.836H97.2z"></path> <g> <path d="M282.509,160.11c-2.893-12.564-5.247-19.111-8.39-23.295c-4.185-6.286-8.638-8.116-28.263-8.116H227.27v128.791 c0,20.685,2.091,23.295,26.958,24.872v7.319h-75.12v-7.319c23.815-1.577,25.914-4.188,25.914-24.872V128.698H188.79 c-21.724,0-26.968,2.097-30.365,8.116c-3.143,4.451-5.244,11.778-8.374,23.295h-7.594c1.308-15.707,2.613-32.724,3.143-47.126 h5.234c3.67,6.022,7.066,6.545,14.396,6.545h103.399c7.069,0,9.163-1.566,13.352-6.545h5.495c0,12.042,1.308,31.158,2.615,46.333 L282.509,160.11z"></path> <path d="M377.252,194.421c-2.88-12.567-5.231-19.111-8.375-23.295c-4.187-6.286-8.643-8.116-28.275-8.116h-18.584v128.791 c0,20.688,2.099,23.298,26.958,24.869v7.325h-75.131v-7.325c23.825-1.571,25.924-4.182,25.924-24.869V163.01h-16.242 c-21.713,0-26.958,2.096-30.364,8.116c-3.143,4.451-5.231,11.778-8.374,23.295h-7.583c1.308-15.709,2.603-32.724,3.132-47.126 h5.245c3.659,6.022,7.069,6.547,14.396,6.547h103.388c7.083,0,9.16-1.566,13.353-6.547h5.5c0,12.042,1.318,31.158,2.627,46.333 L377.252,194.421z"></path> </g> </g> </g> </g></svg>';
                    break;
                case 'psd':
                    $icon_html = '<svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 550.801 550.801" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M374.762,406.076c-6.618,0-10.89,0.591-13.415,1.171v85.714c2.531,0.591,6.612,0.591,10.304,0.591 c26.821,0.19,44.318-14.586,44.318-45.879C416.158,420.462,400.223,406.076,374.762,406.076z"></path> <path d="M475.084,131.986c-0.021-2.525-0.828-5.015-2.562-6.992L366.324,3.684c-0.031-0.029-0.062-0.045-0.084-0.071 c-0.633-0.712-1.371-1.289-2.151-1.803c-0.232-0.15-0.464-0.29-0.707-0.422c-0.675-0.372-1.392-0.669-2.13-0.891 c-0.201-0.058-0.38-0.145-0.58-0.188C359.87,0.114,359.037,0,358.193,0H97.2C85.282,0,75.6,9.688,75.6,21.601v507.6 c0,11.907,9.682,21.601,21.6,21.601H453.6c11.908,0,21.601-9.693,21.601-21.601V133.197 C475.2,132.791,475.137,132.393,475.084,131.986z M195.718,455.256c-10.114,9.524-25.083,13.796-42.57,13.796 c-3.892,0-7.391-0.185-10.114-0.575v46.854H113.68V386.059c9.144-1.551,21.969-2.722,40.046-2.722 c18.27,0,31.295,3.496,40.046,10.494c8.355,6.613,13.988,17.492,13.988,30.317C207.766,436.989,203.494,447.873,195.718,455.256z M258.704,517.262c-14.963,0-29.734-3.893-37.125-7.974l6.03-24.49c7.966,4.082,20.208,8.163,32.843,8.163 c13.608,0,20.802-5.632,20.802-14.186c0-8.163-6.221-12.824-21.956-18.467c-21.769-7.584-35.965-19.628-35.965-38.676 c0-22.359,18.657-39.467,49.572-39.467c14.761,0,25.65,3.111,33.429,6.613l-6.613,23.91c-5.252-2.531-14.575-6.223-27.408-6.223 c-12.825,0-19.048,5.832-19.048,12.635c0,8.369,7.394,12.055,24.298,18.473c23.129,8.554,34.019,20.593,34.019,39.061 C311.576,498.604,294.669,517.262,258.704,517.262z M425.683,499.764c-13.796,11.476-34.784,16.918-60.444,16.918 c-15.356,0-26.24-0.971-33.634-1.951V386.059c10.895-1.751,25.08-2.722,40.046-2.722c24.881,0,41.018,4.472,53.652,13.996 c13.605,10.104,22.159,26.24,22.159,49.37C447.462,471.783,438.317,489.08,425.683,499.764z M97.2,366.747V21.601h250.192v110.51 c0,5.962,4.842,10.8,10.801,10.8H453.6v223.837H97.2z"></path> <path d="M155.282,405.686c-6.02,0-10.104,0.591-12.248,1.171v38.676c2.534,0.591,5.645,0.78,9.917,0.78 c15.747,0,25.471-7.963,25.471-21.379C178.421,412.879,170.058,405.686,155.282,405.686z"></path> <path d="M152.695,191.17l153.929,29.442c1.777,0.34,3.907,0.021,4.709-0.718l58.63-53.66c0,0,3.818-2.292-1.608-3.328 c-5.426-1.036-152.663-29.365-152.663-29.365c-1.804-0.345-3.921-0.021-4.709,0.712l-60.07,54.957 C150.108,189.944,150.902,190.825,152.695,191.17z M220.638,141.837l133.432,25.526l-39.403,36.033l-9.725-1.856 c0.87-7.103,3.075-16.849-8.764-17.761c-13.869-1.065-33.197,9.735-33.197,9.735s8.421-14.747-1.205-25.353 c-9.65-10.607-57.278,14.17-57.278,14.17l-23.253-4.445L220.638,141.837z"></path> <path d="M303.297,170.828c2.452,0.478,4.852,0.807,7.087,1.028c1.909,0.873,4.515,1.677,7.646,2.272 c8.016,1.527,16.295,1.155,18.468-0.838c2.184-1.996-2.553-4.854-10.568-6.387c-3.021-0.58-6.054-0.891-8.796-0.946 c-0.538-0.557-1.55-1.042-2.984-1.311l-2.104-0.406c-2.694-0.514-5.742-0.081-7.219,0.934c-6.813-0.96-12.699-0.917-13.954,0.243 C289.358,166.812,294.922,169.23,303.297,170.828z"></path> <path d="M311.322,266.235l58.641-53.652c0,0,3.818-2.291-1.618-3.333c-1.292-0.242-10.689-2.051-24.179-4.648l-26.832,24.543 c-3.032,2.776-7.087,3.19-9.229,3.19c-1.055,0-2.141-0.098-3.174-0.29l-124.211-23.768l-29.813,27.271 c-0.804,0.738,0,1.614,1.793,1.965l153.919,29.441C308.401,267.295,310.521,266.971,311.322,266.235z"></path> <path d="M372.806,256.305c-1.297-0.243-10.689-2.051-24.179-4.648l-26.831,24.535c-3.038,2.784-7.088,3.201-9.229,3.201 c-1.055,0-2.142-0.105-3.175-0.301L185.171,255.33l-29.813,27.274c-0.794,0.733,0,1.614,1.793,1.962l153.918,29.437 c1.793,0.348,3.908,0.021,4.726-0.717l58.624-53.652C374.425,259.638,378.242,257.344,372.806,256.305z"></path> </g> </g> </g></svg>';
                    break;
                case 'jpeg':
                case 'jpg':
                    $icon_html = '<svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 550.801 550.801" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M475.095,131.992c-0.032-2.526-0.844-5.021-2.579-6.993L366.324,3.694c-0.031-0.034-0.062-0.045-0.084-0.076 c-0.633-0.707-1.371-1.29-2.151-1.804c-0.232-0.15-0.464-0.285-0.707-0.422c-0.675-0.366-1.382-0.67-2.13-0.892 c-0.201-0.058-0.38-0.14-0.58-0.192C359.87,0.114,359.037,0,358.193,0H97.2C85.292,0,75.6,9.693,75.6,21.601v507.6 c0,11.913,9.692,21.601,21.6,21.601H453.6c11.908,0,21.601-9.688,21.601-21.601V133.202 C475.2,132.796,475.137,132.398,475.095,131.992z M183.271,473.312c0,37.314-17.89,50.34-46.651,50.34 c-6.803,0-15.747-1.165-21.576-3.111l3.309-23.909c4.082,1.36,9.326,2.341,15.159,2.341c12.445,0,20.216-5.643,20.216-26.051 v-82.413h29.544V473.312z M289.997,461.458c-10.114,9.523-25.083,13.795-42.57,13.795c-3.892,0-7.391-0.189-10.114-0.58v46.85 h-29.352V392.26c9.141-1.561,21.966-2.721,40.043-2.721c18.27,0,31.298,3.496,40.046,10.494 c8.358,6.612,13.99,17.486,13.99,30.322C302.041,443.18,297.77,454.069,289.997,461.458z M430.344,515.489 c-9.133,3.111-26.436,7.389-43.743,7.389c-23.898,0-41.206-6.028-53.245-17.683c-12.056-11.279-18.668-28.381-18.468-47.629 c0.189-43.538,31.867-68.418,74.824-68.418c16.923,0,29.943,3.301,36.351,6.418l-6.218,23.715 c-7.193-3.111-16.132-5.633-30.518-5.633c-24.68,0-43.337,13.996-43.337,42.378c0,27.016,16.906,42.957,41.207,42.957 c6.803,0,12.244-0.785,14.575-1.951v-27.4h-20.218v-23.13h48.789V515.489z M97.2,366.752V21.601h250.192v110.515 c0,5.961,4.842,10.8,10.801,10.8H453.6v223.836H97.2z"></path> <path d="M249.56,411.888c-6.02,0-10.101,0.58-12.248,1.171v38.675c2.534,0.58,5.646,0.78,9.917,0.78 c15.746,0,25.471-7.973,25.471-21.378C272.7,419.08,264.336,411.888,249.56,411.888z"></path> <g> <path d="M246.04,243.448C202.906,200.301,161.077,367.2,161.077,367.2h143.759C304.836,367.2,289.195,286.622,246.04,243.448z"></path> <path d="M350.673,287.978c-30.575,7.82-45.837,79.223-45.837,79.223h103.096C393.937,331.426,376.787,281.296,350.673,287.978z"></path> </g> <path d="M161.088,204.989c14.773,0,26.747-11.965,26.747-26.747c0-14.778-11.973-26.733-26.747-26.733 c-14.797,0-26.768,11.955-26.768,26.733C134.32,193.024,146.291,204.989,161.088,204.989z"></path> <path d="M323.293,222.184c5.4,0,10.452-0.557,14.945-1.464c5.231,2.247,11.591,3.592,18.51,3.592 c17.671,0,32.015-8.651,32.015-19.312c0-10.671-14.338-19.316-32.015-19.316c-6.645,0-12.793,1.215-17.919,3.301 c-2.089-2.02-4.915-3.301-8.042-3.301h-4.636c-5.938,0-10.642,4.498-11.316,10.251c-14.354,1.49-24.976,6.669-24.976,12.873 C289.854,216.201,304.82,222.184,323.293,222.184z"></path> </g> </g> </g></svg>';
                    break;
                case 'png':
                    $icon_html = '<svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 550.801 550.801" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M151.951,414.103c-5.677,0-9.526,0.554-11.541,1.107v36.492c2.381,0.554,5.313,0.732,9.352,0.732 c14.851,0,24.026-7.524,24.026-20.171C173.794,420.884,165.905,414.103,151.951,414.103z"></path> <polygon points="353.668,141.89 353.711,141.906 353.711,141.89 "></polygon> <path d="M475.095,131.992c-0.032-2.526-0.844-5.021-2.568-6.993L366.324,3.694c-0.021-0.034-0.053-0.045-0.084-0.076 c-0.633-0.707-1.36-1.29-2.141-1.804c-0.232-0.15-0.465-0.285-0.707-0.422c-0.686-0.366-1.393-0.67-2.131-0.892 c-0.2-0.058-0.379-0.14-0.59-0.192C359.87,0.114,359.037,0,358.203,0H97.2C85.292,0,75.6,9.693,75.6,21.601v507.6 c0,11.913,9.692,21.601,21.6,21.601H453.6c11.908,0,21.601-9.688,21.601-21.601V133.202 C475.2,132.796,475.137,132.398,475.095,131.992z M190.107,460.867c-9.537,8.986-23.657,13.025-40.165,13.025 c-3.673,0-6.982-0.189-9.537-0.554v44.196h-27.696V395.582c8.617-1.466,20.725-2.568,37.779-2.568 c17.23,0,29.531,3.296,37.776,9.903c7.881,6.229,13.204,16.501,13.204,28.608C201.479,443.623,197.445,453.906,190.107,460.867z M321.616,517.535h-29.341l-26.412-47.682c-7.349-13.205-15.412-29.152-21.477-43.644l-0.538,0.18 c0.738,16.326,1.094,33.744,1.094,53.915v37.23h-25.671V393.932h32.643l25.684,45.293c7.325,13.025,14.671,28.424,20.161,42.367 h0.554c-1.841-16.321-2.384-33.012-2.384-51.532v-36.123h25.687V517.535L321.616,517.535z M449.086,511.851 c-8.617,2.933-24.943,6.972-41.27,6.972c-22.55,0-38.887-5.685-50.251-16.695c-11.364-10.632-17.613-26.769-17.429-44.925 c0.18-41.075,30.08-64.552,70.601-64.552c15.958,0,28.255,3.111,34.304,6.048l-5.864,22.376 c-6.797-2.933-15.229-5.316-28.803-5.316c-23.282,0-40.891,13.205-40.891,39.973c0,25.497,15.957,40.532,38.887,40.532 c6.417,0,11.554-0.728,13.753-1.835v-25.861h-19.074v-21.821h46.032v65.105H449.086z M97.2,366.752V21.601h250.203v77.69h6.75 v42.599h42.156v1.026h57.29l0.011,223.836H97.2z"></path> <polygon points="184.328,269.687 226.178,269.687 226.178,227.093 184.022,227.093 184.022,184.491 226.178,184.491 226.178,141.89 184.022,141.89 184.022,99.291 141.42,99.291 141.42,141.89 183.579,141.89 183.579,184.491 141.42,184.491 141.42,227.093 183.579,227.093 183.579,269.687 141.739,269.687 141.739,312.293 183.898,312.293 183.898,354.887 226.481,354.887 226.481,312.293 184.328,312.293 "></polygon> <polygon points="269.401,269.687 311.249,269.687 311.249,227.093 269.093,227.093 269.093,184.491 311.249,184.491 311.249,141.89 269.093,141.89 269.093,99.291 226.481,99.291 226.481,141.89 268.64,141.89 268.64,184.491 226.481,184.491 226.481,227.093 268.64,227.093 268.64,269.687 226.8,269.687 226.8,312.293 268.958,312.293 268.958,354.887 311.555,354.887 311.555,312.293 269.401,312.293 "></polygon> <path d="M311.555,141.89h42.113c-3.691-1.716-6.265-5.432-6.265-9.774V99.291h-35.849V141.89z"></path> <path d="M353.711,141.906v42.585h-42.156v42.602h42.156v42.594H311.86v42.602h42.167v42.599h42.593v-42.599h-42.15v-42.602h41.84 v-42.594h-42.156v-42.602h42.156v-41.575h-38.106C356.59,142.916,355.082,142.539,353.711,141.906z"></path> </g> </g> </g></svg>';
                    break;
                case 'gif':
                    $icon_html = '<svg width="52px" height="52px" viewBox="0 0 48 48" version="1" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 48 48" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <polygon fill="#90CAF9" points="40,45 8,45 8,3 30,3 40,13"></polygon> <polygon fill="#E1F5FE" points="38.5,14 29,14 29,4.5"></polygon> <polygon fill="#1565C0" points="21,23 14,33 28,33"></polygon> <polygon fill="#1976D2" points="28,26.4 23,33 33,33"></polygon> <circle fill="#1976D2" cx="31.5" cy="24.5" r="1.5"></circle> </g></svg>';
                    break;
                case 'zip':
                    $icon_html = '<svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 550.801 550.801" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M475.095,131.992c-0.032-2.526-0.833-5.021-2.568-6.993L366.324,3.694c-0.021-0.034-0.053-0.045-0.084-0.076 c-0.633-0.707-1.36-1.29-2.141-1.804c-0.232-0.15-0.465-0.285-0.707-0.422c-0.686-0.366-1.393-0.67-2.131-0.892 c-0.2-0.058-0.379-0.14-0.58-0.192C359.87,0.114,359.047,0,358.203,0H97.2C85.292,0,75.6,9.693,75.6,21.601v507.6 c0,11.913,9.692,21.601,21.6,21.601H453.6c11.918,0,21.601-9.688,21.601-21.601V133.202 C475.2,132.796,475.137,132.398,475.095,131.992z M243.599,523.494H141.75v-15.936l62.398-89.797v-0.785h-56.565v-24.484h95.051 v17.106l-61.038,88.636v0.771h62.002V523.494z M292.021,523.494h-29.744V392.492h29.744V523.494z M399.705,463.44 c-10.104,9.524-25.069,13.796-42.566,13.796c-3.893,0-7.383-0.19-10.104-0.58v46.849h-29.352V394.242 c9.134-1.561,21.958-2.721,40.036-2.721c18.277,0,31.292,3.491,40.046,10.494c8.354,6.607,13.996,17.486,13.996,30.322 C411.761,445.163,407.479,456.053,399.705,463.44z M97.2,366.752V21.601h129.167v-3.396h32.756v3.396h88.28v110.515 c0,5.961,4.831,10.8,10.8,10.8H453.6l0.011,223.836H97.2z"></path> <path d="M359.279,413.87c-6.033,0-10.114,0.586-12.245,1.171v38.676c2.521,0.585,5.632,0.785,9.914,0.785 c15.736,0,25.46-7.979,25.46-21.378C382.408,421.063,374.045,413.87,359.279,413.87z"></path> <rect x="259.124" y="39.918" width="32.756" height="13.516"></rect> <rect x="226.368" y="21.601" width="32.756" height="10.125"></rect> <rect x="226.368" y="60.146" width="32.756" height="13.516"></rect> <rect x="259.124" y="82.274" width="32.756" height="13.518"></rect> <rect x="259.124" y="124.983" width="32.756" height="13.516"></rect> <rect x="226.368" y="103.275" width="32.756" height="13.516"></rect> <path d="M259.124,149.537c-23.193,0-34.225,18.792-34.225,41.99l-7.765,70.348c0,23.198,18.792,42.003,41.984,42.003 c23.19,0,41.974-18.805,41.974-42.003l-7.741-70.348C293.361,168.334,282.318,149.537,259.124,149.537z M273.04,285.431h-27.799 v-58.728h27.799V285.431z"></path> </g> </g> </g></svg>';
                    break;
                case 'xml':
                    $icon_html = '<svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 550.801 550.801" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M475.084,131.986c-0.021-2.525-0.828-5.015-2.562-6.992L366.324,3.684c-0.031-0.029-0.062-0.045-0.084-0.071 c-0.633-0.712-1.371-1.289-2.151-1.803c-0.232-0.15-0.464-0.29-0.707-0.422c-0.675-0.372-1.392-0.669-2.13-0.891 c-0.201-0.058-0.38-0.145-0.58-0.188C359.87,0.114,359.037,0,358.193,0H97.2C85.282,0,75.6,9.688,75.6,21.601v507.6 c0,11.907,9.682,21.601,21.6,21.601H453.6c11.908,0,21.601-9.693,21.601-21.601V133.197 C475.2,132.791,475.137,132.393,475.084,131.986z M177.504,510.543l-10.676-21.331c-4.369-8.211-7.162-14.328-10.481-21.151 h-0.345c-2.447,6.823-5.424,12.94-9.094,21.151l-9.79,21.331h-30.406l34.077-59.611l-32.854-58.197h30.586l10.304,21.494 c3.499,7.172,6.117,12.941,8.92,19.575h0.346c2.797-7.509,5.065-12.751,8.037-19.575l9.967-21.494h30.409l-33.212,57.507 l34.965,60.302H177.504z M323.989,510.543l-1.751-45.099c-0.527-14.164-1.055-31.292-1.055-48.421h-0.517 c-3.67,15.035-8.563,31.815-13.109,45.621l-14.333,45.969h-20.812l-12.579-45.615c-3.839-13.807-7.857-30.586-10.666-45.975 h-0.345c-0.696,15.905-1.226,34.088-2.101,48.764l-2.089,44.751h-24.647l7.522-117.814h35.479l11.538,39.335 c3.671,13.626,7.341,28.308,9.956,42.119h0.527c3.322-13.627,7.341-29.184,11.19-42.293l12.583-39.161h34.783l6.465,117.814 h-26.04V510.543z M444.087,510.543H370.49V392.734h26.747v95.438h46.85V510.543z M453.6,366.747H97.2V21.601h250.192v110.51 c0,5.962,4.842,10.8,10.801,10.8H453.6V366.747z"></path> <polygon points="118.078,234.885 180.415,263.844 180.415,250.08 133.273,229.429 133.273,229.166 180.415,208.518 180.415,194.751 118.078,223.71 "></polygon> <polygon points="376.829,208.518 425.018,229.166 425.018,229.429 376.829,250.08 376.829,263.844 439.167,235.272 439.167,223.322 376.829,194.751 "></polygon> <path d="M277.383,154.916c-41.08,0-74.382,33.302-74.382,74.379c0,41.077,33.302,74.382,74.382,74.382 s74.377-33.305,74.377-74.382C351.76,188.217,318.463,154.916,277.383,154.916z M305.337,184.438l5.321-3.56 c0,0-2.236-5.729-1.856-8.537c1.287-0.628,6.528,2.122,10.953,6.781c-2.979,11.093-9.972,9.77-9.972,9.77 S304.668,188.769,305.337,184.438z M260.502,249.93c-0.33,1.661-2.333,5.664-3.663,8.321c-1.329,2.661-1.993,3.665-3.667,4.994 c-1.667,1.35-2.655,3.665-2.655,3.665l-0.335,5.656c0,0,0.654,4.669,1.653,6.336c0.996,1.655-3.565,11.574-3.565,11.574 c-2.895-0.574-4.503-3.928-5.508-6.575c-1.005-2.674-2.328-4.093-1.993-7.077c0.335-3.001-2.587-4.583-3.576-6.246 c-0.991-1.686-2.331-4-2.331-5.664c0-1.669-3.657-4.002-3.657-4.002s-6.663-2.996-7.662-4.319c-1-1.334-2.01-7.011-2.334-9.326 c-0.34-2.323,0.994-8.316,0.994-8.316s2.689-2.02,1-3.667c-1.669-1.661-1.988-6.004-1.988-6.004l-3-3.322c0,0-2.339-3.33-2.668-5 c-0.334-1.663,0-2.663,0.335-4.329c0.33-1.674-0.665-4.662-0.665-6.32c12.443-30.504,33.302-37.621,33.302-37.621l1.669,6.977 c0,0-3.662,1.004-5.647,0.345c-2.009-0.669-3.02-0.669-3.02-0.669l-2.652,3.657c0,0-1.015,2.336-1.345,3.67 s0.665,3.322,0.665,3.322s4.657,0.335,4.657-0.994c0-1.334-0.654-1.999-0.654-1.999l-0.67-2.331c0,0,3.02-1.669,10.982-1.012 c7.994,0.675,5.007,6.331,8.345,7.675c3.331,1.332-2.679,5.988-4.008,8.646c-1.329,2.666-3.327-3.333-3.327-3.333 s1.999-2.305-1.326-2.993c-3.333-0.651-5.537,5.996-3.853,5.671c1.659-0.329,3.518,1.793,3.177,3.449 c-0.334,1.669-0.334,1.54-1.999,5.197c-1.664,3.66-5.281,6.371-5.281,6.371s-1.701-1.037-0.717,0.967 c1.021,1.994-0.33,6.653-0.33,7.987c0,1.323-3.997-2.334-4.651-5.672c-0.68-3.309-4.577-0.424-5.906-0.084 c-1.334,0.34-3.765-0.58-4.406-2.231c-0.68-1.674-6.681,3.32-8.351,4.314c-1.656,1.004-0.981,3.673,1.669,2.339 c2.663-1.334,4.991-0.335,4.332,2.344c-0.659,2.645-3.317,0.999-2.993,2.645c0.33,1.664,2.993,3.333,3.652,5.672 c0.669,2.32,7.008,0.335,9.001-0.67c1.991-1.01,7.657-1.999,8.316,0.67c0.691,2.666,7.003,3.649,9.329,4.308 c2.339,0.669,7,1.004,9.671,3.667C265.502,243.264,260.854,248.261,260.502,249.93z M275.484,172.007 c-0.338,3.338-5.65,7.657-4.989,9.002c0.669,1.345,0,7.037-4.659,2.035c-4.665-4.994-9.337-6.689-8.991-10.033 c0.082-0.665,4.822-1.706,4.898-2.874c7.062-6.565,18.339-5.215,19.203-3.66C278.923,169.776,275.822,168.674,275.484,172.007z M333.345,194.369c4.503,7.726,11.085,28.334,8.653,32.015c-1.461-0.659-2.689-1.208-2.689-1.208h-8.886l5.321,6.226 c0,0,2.578,3.778,6.228,3.536c-2.404,27.849-25.645,45.736-25.645,45.736c-3.549-3.555-1.771-6.65-1.771-6.65l0.996-5.342 l0.564-8.985c0,0,0-9.313-8.886-4.892c-9.545,2.437-5.568,2.437-15.203,3.104c-9.656,0.67-8.058-19.686-8.058-19.686 c0-30.473,23.366-7.475,23.366-7.475c13.331,8.867,15.108-7.354,15.108-7.354l9.761-3.538l0.887-4.448l-1.419-6.204l-14.186-5.854 c0,0-1.366,4.608,2.272,10.275c0,0-1.213,6.436-4.197,4.772l-8.222-4.129c0,0-2.769-1.2-7.203,1.474 c-4.451,2.655-11.976-0.132-11.976-0.132s0.611-4.464,5.283-6.782l3.818-2.521c0,0-1.002-4.559-0.127-8.105 c0.876-3.549,2.447-0.442,5.991-3.111c3.549-2.649,5.996,5.216,11.316,4.333c5.321-0.891,2.669-1.777,6.229-3.549 c3.56-1.777,6.217,3.549,6.217,3.549l7.088,0.883C333.978,200.312,332.87,192.288,333.345,194.369z"></path> </g> </g> </g></svg>';
                    break;
                case 'txt':
                default:
                    $icon_html = '<svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 550.801 550.801" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M475.095,131.992c-0.032-2.526-0.844-5.021-2.579-6.993L366.324,3.694c-0.031-0.034-0.062-0.045-0.084-0.076 c-0.633-0.707-1.371-1.29-2.151-1.804c-0.232-0.15-0.464-0.285-0.707-0.422c-0.675-0.366-1.382-0.67-2.13-0.892 c-0.201-0.058-0.38-0.14-0.58-0.192C359.87,0.114,359.037,0,358.193,0H97.2C85.292,0,75.6,9.693,75.6,21.601v507.6 c0,11.913,9.692,21.601,21.6,21.601H453.6c11.908,0,21.601-9.688,21.601-21.601V133.202 C475.2,132.796,475.137,132.398,475.095,131.992z M210.558,418.605h-35.764v106.128h-29.734V418.605h-35.184v-24.874h100.683 V418.605z M298.814,524.733l-11.855-23.714c-4.856-9.134-7.973-15.937-11.662-23.52h-0.388 c-2.724,7.583-6.022,14.386-10.104,23.52l-10.887,23.714h-33.827L258,458.452l-36.547-64.727h34.016l11.476,23.91 c3.881,7.963,6.803,14.381,9.911,21.769h0.391c3.101-8.358,5.632-14.19,8.933-21.769l11.085-23.91h33.824l-36.936,63.946 l38.876,67.062H298.814z M440.923,418.605h-35.765v106.128h-29.742V418.605h-35.189v-24.874h100.686v24.874H440.923z M97.2,366.752V21.601h250.192v110.515c0,5.961,4.842,10.8,10.801,10.8H453.6v223.836H97.2z"></path> <path d="M174.351,148.269h119.812c3.966,0,7.203-3.225,7.203-7.198s-3.237-7.193-7.203-7.193H174.351 c-3.977,0-7.193,3.22-7.193,7.193S170.374,148.269,174.351,148.269z"></path> <path d="M370.797,191.432H174.161c-3.974,0-7.193,3.217-7.193,7.192c0,3.974,3.219,7.198,7.193,7.198h196.636 c3.976,0,7.203-3.225,7.203-7.198C378,194.648,374.772,191.432,370.797,191.432z"></path> <path d="M370.797,248.58H174.161c-3.974,0-7.193,3.217-7.193,7.198c0,3.974,3.219,7.198,7.193,7.198h196.636 c3.976,0,7.203-3.225,7.203-7.198C378,251.796,374.772,248.58,370.797,248.58z"></path> <path d="M370.797,307.099H174.161c-3.974,0-7.193,3.223-7.193,7.198c0,3.977,3.219,7.193,7.193,7.193h196.636 c3.976,0,7.203-3.217,7.203-7.193C378,310.321,374.772,307.099,370.797,307.099z"></path> </g> </g> </g></svg>';
                    break;
            }
    
            if ( $linkTo === 'none' ) {
                return '<div class="dlhp-document-cell dlhp-document-icon">' . $icon_html . '</div>';
            } elseif ( $linkTo === 'document_post' ) {
                return '<div class="dlhp-document-cell dlhp-document-icon"><a href="' . esc_url( get_permalink() ) . '">' . $icon_html . '</a></div>';
            } elseif ( $linkTo === 'file_url' && ! empty( $file_info[ 'url' ] ) ) {
                return '<div class="dlhp-document-cell dlhp-document-icon"><a href="' . esc_url( $file_info[ 'url' ] ) . '">' . $icon_html . '</a></div>';
            } else {
                return '<div class="dlhp-document-cell dlhp-document-icon">' . $icon_html . '</div>';
            }
        } elseif ( empty( $image_html ) ) {
            return '<div class="dlhp-document-cell dlhp-document-cell-empty dlhp-document-img"></div>';
        } elseif ( $linkTo === 'none' ) {
            return '<div class="dlhp-document-cell dlhp-document-img">' . $image_html . '</div>';
        } elseif ( $linkTo === 'document_post' ) {
            return '<div class="dlhp-document-cell dlhp-document-img"><a href="' . esc_url( get_permalink() ) . '">' . $image_html . '</a></div>';
        } elseif ( $linkTo === 'file_url' && ! empty( $file_info[ 'url' ] ) ) {
            return '<div class="dlhp-document-cell dlhp-document-img"><a href="' . esc_url( $file_info[ 'url' ] ) . '">' . $image_html . '</a></div>';
        } else {
            return '<div class="dlhp-document-cell dlhp-document-img">' . $image_html . '</div>';
        }
    }    

    private function render_folder_icon() { 
        return '<svg class="dlhp-folder-icon dlhp-folder-icon-closed" width="34px" height="34px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#000000" d="M128 192v640h768V320H485.76L357.504 192H128zm-32-64h287.872l128.384 128H928a32 32 0 0 1 32 32v576a32 32 0 0 1-32 32H96a32 32 0 0 1-32-32V160a32 32 0 0 1 32-32z"></path></g></svg>
                <svg class="dlhp-folder-icon dlhp-folder-icon-open" style="display:none;" width="34px" height="34px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#000000" d="M878.08 448H241.92l-96 384h636.16l96-384zM832 384v-64H485.76L357.504 192H128v448l57.92-231.744A32 32 0 0 1 216.96 384H832zm-24.96 512H96a32 32 0 0 1-32-32V160a32 32 0 0 1 32-32h287.872l128.384 128H864a32 32 0 0 1 32 32v96h23.04a32 32 0 0 1 31.04 39.744l-112 448A32 32 0 0 1 807.04 896z"></path></g></svg>';
    }

    public function handle_ajax_get_documents() {
        // Verify nonce for security
        if ( ! isset( $_POST[ 'dlhp_nonce' ] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ 'dlhp_nonce' ] ) ), 'dlhp_ajax_nonce' ) ) {
            wp_send_json_error( 'Invalid nonce' );
            wp_die();
        }
    
        // Set default values for the POST variables, unslash and sanitize
        $category = isset( $_POST[ 'category' ] ) ? sanitize_text_field( wp_unslash( $_POST[ 'category' ] ) ) : '';
        $this->library_id = isset( $_POST[ 'library_id' ] ) ? intval( wp_unslash( $_POST[ 'library_id' ] ) ) : 0;
        $page = isset( $_POST[ 'page' ] ) ? intval( wp_unslash( $_POST[ 'page' ] ) ) : 1;
        $search = isset( $_POST[ 'searchQuery' ] ) ? sanitize_text_field( wp_unslash( $_POST[ 'searchQuery' ] ) ) : '';
    
        // Fetch the Library post content
        $library_post = $this->get_library_post( $this->library_id );
        
        if ( is_wp_error( $library_post ) ) {
            wp_send_json_error( $library_post );
            wp_die();
        } else {
            $this->content_settings = $library_post[ 'content' ];
            $this->display_settings = $library_post[ 'settings' ];
        }
    
        // Fetch documents based on library settings
        $documents_output = $this->render_documents( $page, [ $category ], $search );
    
        // Send the documents and pagination back
        wp_send_json_success( $documents_output );
        wp_die();
    }
    
    public function handle_ajax_get_documents_by_folder() {
        // Verify nonce for security
        if ( ! isset( $_POST[ 'dlhp_nonce' ] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ 'dlhp_nonce' ] ) ), 'dlhp_ajax_nonce' ) ) {
            wp_send_json_error( 'Invalid nonce' );
            wp_die();
        }
    
        // Set default values for the POST variables
        $category = isset( $_POST[ 'category' ] ) ? sanitize_text_field( wp_unslash( $_POST[ 'category' ] ) ) : '';
        $this->library_id = isset( $_POST[ 'library_id' ] ) ? intval( wp_unslash( $_POST[ 'library_id' ] ) ) : 0;
        $page = isset( $_POST[ 'page' ] ) ? intval( wp_unslash( $_POST[ 'page' ] ) ) : 1;
    
        // Fetch the Library post content
        $library_post = $this->get_library_post( $this->library_id );
        if ( is_wp_error( $library_post ) ) {
            wp_send_json_error( $library_post );
            wp_die();
        } else {
            $this->content_settings = $library_post[ 'content' ];
            $this->display_settings = $library_post[ 'settings' ];
        }
    
        // Fetch documents based on the selected folder and library settings
        $documents_output = $this->render_documents( $page, [ $category ] );
    
        // Send the documents back as JSON response
        wp_send_json_success( $documents_output );
        wp_die();
    }    
}