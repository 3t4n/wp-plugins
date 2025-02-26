<?php
/**
 * Functions used for Block Data
 *
 * @package ShopCred
 */

namespace ShopCred;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Block_Manager {

    /**
     * 
     * Static property to hold all blocks names in an array
     * 
     * @access public
     * @static
     * 
     * 
     */
    public static $all_feature_array;

    /**
     * 
     * Static property to hold default settings for the database
     * 
     * @access public
     * @static
     * 
     * 
     */
    public static $all_feature_settings;
    /**
     * 
     * Static property that consits all active blocks
     * 
     * @access public
     * @static
     * 
     * 
     */
    public static $is_activated_feature;

    /**
     * 
     * Static property that consists all the default block array
     * 
     * @access public
     * @static
     * 
     * @return array
     */
    public static $default_widgets = [];

	/**
	 * Initialize
	 */
	public static function init() {
        self::widget_manager();
        self::activated_features();
    }


    public static function widget_manager() {
        if ( false ) {
            self::$default_widgets = apply_filters( 'spc_add_blocks', self::blocks_map_free() );
        } else {
            self::$default_widgets = self::blocks_map_free();
        }
    }

    /**
     * This function returns true for all activated widgets
     *
    * @since  1.0.0
    */
    public static function activated_features() {
        self::$all_feature_array = array_keys( self::$default_widgets );
        self::$all_feature_settings  = array_fill_keys( self::$all_feature_array, true );
        self::$is_activated_feature = get_option( 'spc_save_settings', self::$all_feature_settings );
    }

    /**
     * 
     * Initiate Elements name from folder created inside elements
     * 
     * @since 1.0.0
     */
    public static function blocks_map_free() {

        return [
            'spc/woo-product'  => [
                'title'  => __( 'Woo Product', 'shopcred' ),
                'value'  => 'spc/woo-product',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ], 
        ];

    }
}

Block_Manager::init();
