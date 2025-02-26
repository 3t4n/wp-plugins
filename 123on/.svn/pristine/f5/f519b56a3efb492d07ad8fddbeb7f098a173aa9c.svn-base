<?php
namespace p123on;

/**
 * Scripts and Styles Class
 */
class Assets {

    function __construct() {

        if ( is_admin() ) {
            add_action( 'admin_enqueue_scripts', [ $this, 'p123on_register' ], 5 );
        } else {
            add_action( 'wp_enqueue_scripts', [ $this, 'p123on_register' ], 5 );
        }

    }

    /**
     * Register our app scripts and styles
     *
     * @return void
     */
    public function p123on_register() {
        $this->p123on_register_scripts( $this->p123on_get_scripts() );
        $this->p123on_register_styles( $this->p123on_get_styles() );

        register_block_type('cm/video-on', [
            'editor_script' => 'p123on-gutenberg',
        ]);
    }

    /**
     * Register scripts
     *
     * @param  array $scripts
     *
     * @return void
     */
    private function p123on_register_scripts( $scripts ) {
        foreach ( $scripts as $handle => $script ) {
            $deps      = isset( $script['deps'] ) ? $script['deps'] : false;
            $in_footer = isset( $script['in_footer'] ) ? $script['in_footer'] : false;
            $version   = isset( $script['version'] ) ? $script['version'] : P123ON_VERSION;

            wp_register_script( $handle, $script['src'], $deps, $version, $in_footer );
        }
    }

    /**
     * Register styles
     *
     * @param  array $styles
     *
     * @return void
     */
    public function p123on_register_styles( $styles ) {
        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_register_style( $handle, $style['src'], $deps, P123ON_VERSION );
        }
    }

    /**
     * Get all registered scripts
     *
     * @return array
     */
    public function p123on_get_scripts() {
        $prefix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '.min' : '';

        $scripts = [
            'p123on-runtime' => [
                'src'       => P123ON_ASSETS . '/js/runtime.js',
                'version'   => filemtime( P123ON_PATH . '/assets/js/runtime.js' ),
                'in_footer' => true
            ],
            'p123on-vendor' => [
                'src'       => P123ON_ASSETS . '/js/vendors.js',
                'version'   => filemtime( P123ON_PATH . '/assets/js/vendors.js' ),
                'in_footer' => true
            ],
            'p123on-frontend' => [
                'src'       => P123ON_ASSETS . '/js/frontend.js',
                'deps'      => [ 'jquery', 'p123on-vendor', 'p123on-runtime' ],
                'version'   => filemtime( P123ON_PATH . '/assets/js/frontend.js' ),
                'in_footer' => true
            ],
            'p123on-admin' => [
                'src'       => P123ON_ASSETS . '/js/admin.js',
                'deps'      => [ 'jquery', 'p123on-vendor', 'p123on-runtime' ],
                'version'   => filemtime( P123ON_PATH . '/assets/js/admin.js' ),
                'in_footer' => true
            ],
            'p123on-gutenberg' => [
                'src'       => P123ON_ASSETS . '/js/gutenberg.js',
                'deps'      => ['p123on-vendor', 'p123on-runtime', 'wp-blocks', 'wp-editor', 'wp-element' ],
                'version'   => filemtime( P123ON_PATH . '/assets/js/gutenberg.js' )
            ],
        ];

        return $scripts;
    }

    /**
     * Get registered styles
     *
     * @return array
     */
    public function p123on_get_styles() {

        $styles = [
            'p123on-style' => [
                'src' =>  P123ON_ASSETS . '/css/style.css'
            ],
            'p123on-frontend' => [
                'src' =>  P123ON_ASSETS . '/css/frontend.css'
            ],
            'p123on-admin' => [
                'src' =>  P123ON_ASSETS . '/css/admin.css'
            ],
        ];

        return $styles;
    }

}
