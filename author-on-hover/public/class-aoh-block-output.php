<?php

/**
 * The block-facing functionality of the plugin.
 *
 * @link       https://forhad.net
 * @since      1.0.0
 *
 * @package    AOH_Author_On_Hover
 * @subpackage AOH_Author_On_Hover/public
 */

/**
 * The block-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the block-facing stylesheet and JavaScript.
 *
 * @package    AOH_Author_On_Hover
 * @subpackage AOH_Author_On_Hover/public
 * @author     Forhad <need@forhad.net>
 */
class AOH_Block_Public_Output {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

    /**
     * Register blocks and facing output.
     */
	public function aoh_render_block_core() {

        $asset_file = include( AOH_DIR_PATH_FILE . 'build/index.asset.php' );
    
        wp_register_script( 'aoh-block-esnext', AOH_DIR_URL_FILE . 'build/index.js', $asset_file['dependencies'], $asset_file['version'] );
    
        wp_register_style( 'aoh-editor', AOH_DIR_URL_FILE . 'admin/css/aoh-editor.css', array( 'wp-edit-blocks' ), AOH_AUTHOR_ON_HOVER_VERSION );
    
        $blocks = array(
            'aoh-blocks/user' => array(
                'title'      => 'User',
                'attributes' => array(
                    'id'           => array(
                        'type' => 'string',
                    ),
                ),
            ),
            'aoh-blocks/profile' => array(
                'title'      => 'Profile',
                'attributes' => array(
                    'id'           => array(
                        'type' => 'string',
                    ),
                ),
            ),
        );

        foreach ( $blocks as $block_name => $block_data ) {
            register_block_type(
                $block_name,
                array(
                    'api_version'     => 3,
                    'editor_script'   => 'aoh-block-esnext',
                    'attributes'      => $block_data['attributes'],
                    'editor_style'    => 'aoh-editor',
                )
            );
        }
    }
}
