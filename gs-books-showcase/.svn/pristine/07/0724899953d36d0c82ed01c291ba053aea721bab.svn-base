<?php

namespace GS_BOOKS;

use function GS_BOOKS_PRO\is_pro_valid;

defined( 'ABSPATH' ) || exit;

class Hooks {

    public function __construct() {
        add_filter( 'template_include', [ $this, 'gs_books_single_template' ], -1 );
        add_filter( 'template_include', [ $this, 'gs_books_archive_template' ], -1 );
        add_filter( 'taxonomy_template', [ $this, 'gs_books_author_archive' ] );
        add_action( 'init', [ $this, 'gs_books_flush_rewrite' ] );
        add_action( 'admin_menu', array( $this, 'register_sub_menu'), 5 );
        add_action( 'admin_menu', array( $this, 'register_sub_menu_bulk_import'), 30 );
		add_action( 'in_admin_header', array( $this, 'remove_admin_notices' ) );
        add_filter( 'plugin_row_meta', array( $this, 'pluginsRowMeta' ), 10, 2 );
        add_action( 'plugins_loaded', array( $this, 'gs_book_showcase_plugin_loaded' ) );
    }

    public function gs_books_single_template( $single_template ) {
    
        if ( is_singular( 'gs_bookshowcase' ) ) {
			if ( is_pro_active() && is_pro_valid() ) {
				$single_template = TemplateLoader::locate_template( 'singles/gs-book-template-single-pro.php' );
			} else {
				$single_template = TemplateLoader::locate_template( 'singles/gs-book-template-single.php' );
			}
        }

        return $single_template;
    }

    public function gs_books_archive_template( $archive_template ) {

        if ( is_post_type_archive( 'gs_bookshowcase' ) ) {
            get_header(); ?>
            <div class="gs-containeer gs-archive-container">
                <h1 class="arc-title"><?php the_archive_title(); ?></h1>
            </div>
            <?php get_footer();
        }

        return $archive_template;
    }

    public function gs_books_author_archive( $template ) {
        // Check if the current page is an author archive
        $prefs = plugin()->builder->_get_shortcode_pref( false );
        $prefs = apply_filters( 'gs_books_author_archive_template', $prefs );

        if ( is_tax( 'gsb_author' ) ) {

            if( $prefs['at_style'] === 'at_style_one' ) {
                $custom_template = TemplateLoader::locate_template( 'authors/gsb-author-single-style-01.php' );
            } 
            if( $prefs['at_style'] === 'at_style_two' ) {
                $custom_template = TemplateLoader::locate_template( 'authors/gsb-author-single-style-02.php' );
            }
            if( $prefs['at_style'] === 'at_style_three' ) {
                $custom_template = TemplateLoader::locate_template( 'authors/gsb-author-single-style-03.php' );
            }
            
            // If the custom template exists, use it
            if ( file_exists( $custom_template ) ) {
                return $custom_template;
            }
        }

        $default_template = TemplateLoader::locate_template( 'partials/gs-taxonomy-default.php' );
        
        // Otherwise, return the default template
        return $default_template;
    }

    /**
	 * Removed all admin notices from the shortcode builder page.
	 *
	 * @since 1.2.11
	 */
	public function remove_admin_notices() {
		global $parent_file;
        if ( $parent_file != 'edit.php?post_type=gs_bookshowcase' ) return;

		remove_all_actions( 'network_admin_notices' );
		remove_all_actions( 'user_admin_notices' );
		remove_all_actions( 'admin_notices' );
		remove_all_actions( 'all_admin_notices' );		
	}

    public function gs_books_flush_rewrite() {
        if ( ! get_option( 'GS_book_permalinks_flushed' ) ) {
            flush_rewrite_rules();
            update_option( 'GS_book_permalinks_flushed', 1 );
        }
    }

    public function register_sub_menu() {
        add_submenu_page(
            'edit.php?post_type=gs_bookshowcase', 'Taxonomies', 'Taxonomies', 'publish_pages', 'gs-books-shortcode#/taxonomies', array( plugin()->builder, 'view' )
        );
    }

    public function register_sub_menu_bulk_import() {
		add_submenu_page(
            'edit.php?post_type=gs_bookshowcase', 'Bulk Import', 'Bulk Import', 'publish_pages', 'gs-books-shortcode#/bulk-import', array( plugin()->builder, 'view' )
        );
    }

	public function pluginsRowMeta( $fields, $file ) {
		if ( 'gs-books-showcase/gs-bookshowcase.php' !== $file ) {
			return $fields;
		}

		echo '<style>
			.gsbookshowcase-rate-stars {
				display: inline-block;
				color: #ffb900;
				position: relative;
				top: 3px;
			}

			.gsbookshowcase-rate-stars svg {
				fill:#ffb900;
			}

			.gsbookshowcase-rate-stars svg:hover {
				fill:#ffb900;
			}

			.gsbookshowcase-rate-stars svg:hover ~ svg { 
				fill:none;
			}
		</style>';

		$plugin_rate   = 'https://wordpress.org/support/plugin/gs-books-showcase/reviews/?rate=5#new-post';
		$plugin_filter = 'https://wordpress.org/support/plugin/gs-books-showcase/reviews/?filter=5';
		$svg_xmlns     = 'https://www.w3.org/2000/svg';
		$svg_icon      = '';

		for ( $i = 0; $i < 5; $i++ ) {
			$svg_icon .= "<svg
							xmlns='" . esc_url( $svg_xmlns ) . "'
							width='15' height='15' viewBox='0 0 24 24'
							fill='none' stroke='currentColor'
							stroke-width='2' stroke-linecap='round'
							stroke-linejoin='round' class='feather feather-star'
						><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/>
						</svg>";
		}

		// Set icon for thumbsup.
		$fields[] = '<a href="' . esc_url( $plugin_filter ) . '" target="_blank">
						<span class="dashicons dashicons-thumbs-up"></span>' . __( 'Vote!', 'gsbookshowcase' ) . '</a>';

		// Set icon for 5-star reviews. v1.1.22
		$fields[] = sprintf(
			'<a href="%s" target="_blank" title="%s">
			<i class="gsbookshowcase-rate-stars">%s</i>
		</a>',
			esc_url( $plugin_rate ),
			esc_html__( 'Rate', 'gsbookshowcase' ),
			$svg_icon
		);

		return $fields;
	}
    
    // Plugin On Loaded
	public function gs_book_showcase_plugin_loaded() {
		$this->gs_book_showcase_plugin_update_version();
		plugin()->builder->maybe_create_shortcodes_table();
	}

    public function gs_book_showcase_plugin_update_version() {
		if ( GS_BOOKS_VERSION !== get_option( 'gs_books_plugin_version' ) ) {
			update_option( 'gs_books_plugin_version', GS_BOOKS_VERSION );
			return true;
		}
		return false;
	}
}