<?php

namespace goodblocks;

/**
 * Class that will load all of the blocks.
 *
 * @class Scripts
 */
class Scripts {
    private $plugin_domain;
    private $plugin_version;

    /**
	 * Scripts constructor.
	 *
	 * @since 1.0.1
     * 
	 * @access public
	 */
	public function __construct($plugin_domain, $plugin_version) {
        $this->plugin_domain = $plugin_domain;
        $this->plugin_version = $plugin_version;

        add_action( 'admin_enqueue_scripts', array( $this, 'gbpe_register_admin_scripts') );
        add_action( 'block_categories_all', array( $this, 'gbpe_register_blocks_categories') );
        add_action( 'enqueue_block_assets', array( $this, 'gbpe_enqueue_gutenberg_scripts' ) );
	}

    /**
     * Load the admin scripts and styles
     *
     * @since 1.0.1
     *
     * @return void
     */
    public function gbpe_register_admin_scripts() {
        wp_enqueue_style( $this->plugin_domain . '-style', plugin_dir_url( __DIR__ ) . 'assets/back.css', array(), filemtime( plugin_dir_path( __DIR__ ) . 'assets/back.css' ) );
		wp_enqueue_script( $this->plugin_domain . '-script',  plugin_dir_url( __DIR__ ) . 'assets/admin.js', array(),  filemtime( plugin_dir_path( __DIR__ ) . 'assets/admin.js' ), array( 'strategy' => 'defer', 'in_footer' => false ) );

		wp_localize_script(  $this->plugin_domain . '-script', $this->plugin_domain, array(
			'ajaxurl' 		=> admin_url('admin-ajax.php'), 
			'ajaxnonce' 	=> wp_create_nonce( 'ajaxsubmit' ), 
		));
    }

    /**
     * Create category for your blocks.
     *
     * @param $categories
     *
     * @return array|mixed
     */
    function gbpe_register_blocks_categories( $categories ) {
        $category_slugs = wp_list_pluck( $categories, 'slug' );

        return in_array( $this->plugin_domain, $category_slugs, true ) ? $categories : array_merge(
            $categories,
            array(
                array(
                    'slug'  => $this->plugin_domain, // goodblocks
                    'title' => __( 'Good Blocks by Projects Engine', $this->plugin_domain ),
                ),
            )
        );
    }
    
    /**
     * Load the gutenberg scripts and styles.
     *
     * @return void
     */
    function gbpe_enqueue_gutenberg_scripts() {
        // Register the block scripts.
        wp_enqueue_script( $this->plugin_domain . '-blocks', plugin_dir_url( __DIR__ )  . 'assets/gutenberg.js', array( 'wp-edit-post', 'wp-element', 'wp-components', 'wp-plugins', 'wp-data', 'wp-i18n', 'lodash', 'wp-dom-ready' ), $this->plugin_version, false );

        // Register the front-end stylesheet.
        // The style is for both front-end and back-end.
        wp_enqueue_style( $this->plugin_domain . '-blocks', plugin_dir_url( __DIR__ ) . 'assets/blocks.css', array(), $this->plugin_version );
    }
}