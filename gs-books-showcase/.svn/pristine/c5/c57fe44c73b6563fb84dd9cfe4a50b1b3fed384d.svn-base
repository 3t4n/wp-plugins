<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

class Integration_Gutenberg {

	private static $_instance = null;
    public static function get_instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;        
    }

    public function __construct() {
        add_action( 'init', [ $this, 'load_block_script' ] );
        add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_block_editor_assets' ] );
    }

    public function enqueue_block_editor_assets() {		
		// Register Styles
		plugin()->scripts->wp_enqueue_style_all( 'public' );		
		// Register Scripts
        plugin()->scripts->wp_enqueue_script_all( 'public' );
    }

    public function load_block_script() {

        wp_add_inline_style( 'wp-block-editor', $this->get_block_css() );
        wp_register_script( 'gs-books-block', GS_BOOKS_PLUGIN_URI . '/includes/integrations/assets/gutenberg/gutenberg-widget.min.js', ['wp-blocks', 'wp-editor'], GS_BOOKS_VERSION );
        
        $gs_books_block = array(
            'select_shortcode'        => __( 'Select Shortcode', 'gsbookshowcase' ),
            'edit_description_text'   => __( 'Edit this shortcode', 'gsbookshowcase' ),
            'edit_link_text'          => __( 'Edit', 'gsbookshowcase' ),
            'create_description_text' => __( 'Create new shortcode', 'gsbookshowcase' ),
            'create_link_text'        => __( 'Create', 'gsbookshowcase' ),
            'edit_link'               => admin_url( "edit.php?post_type=gs_bookshowcase&page=gs-books-shortcode#/shortcode/" ),
            'create_link'             => admin_url( 'edit.php?post_type=gs_bookshowcase&page=gs-books-shortcode#/shortcode' ),
            'gsbooks_shortcodes'      => $this->get_shortcode_list()
		);
		wp_localize_script( 'gs-books-block', 'gs_books_block', $gs_books_block );

        register_block_type( 'gsbooks/shortcodes', array(
            'editor_script' => 'gs-books-block',
            'attributes' => [
                'shortcode' => [
                    'type'    => 'string',
                    'default' => $this->get_default_item()
                ],
                'align' => [
                    'type'=> 'string',
                    'default'=> 'wide'
                ]
            ],
            'render_callback' => [$this, 'shortcodes_dynamic_render_callback']
        ));

    }

    public function shortcodes_dynamic_render_callback( $block_attributes ) {
        $shortcode_id = ( ! empty($block_attributes) && ! empty($block_attributes['shortcode']) ) ? absint( $block_attributes['shortcode'] ) : $this->get_default_item();
        return do_shortcode( sprintf( '[gs_bookshowcase id="%u"]', esc_attr($shortcode_id) ) );
    }

    public function get_block_css() {

        ob_start(); ?>
    
        .gs-bookshowcase--toolbar {
            padding: 20px;
            border: 1px solid #1f1f1f;
            border-radius: 2px;
        }

        .gs-bookshowcase--toolbar label {
            display: block;
            margin-bottom: 6px;
            margin-top: -6px;
        }

        .gs-bookshowcase--toolbar select {
            width: 250px;
            max-width: 100% !important;
            line-height: 42px !important;
        }

        .gs-bookshowcase--toolbar .gs-books-block--des {
            margin: 10px 0 0;
            font-size: 16px;
        }

        .gs-bookshowcase--toolbar .gs-books-block--des span {
            display: block;
        }

        .gs-bookshowcase--toolbar p.gs-books-block--des a {
            margin-left: 4px;
        }
    
        <?php return ob_get_clean();
    
    }

    protected function get_shortcode_list() {
        return get_shortcodes();
    }

    protected function get_default_item() {
        $shortcodes = get_shortcodes();
        if ( !empty($shortcodes) ) {
            return $shortcodes[0]['id'];
        }
        return '';
    }

}
