<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.advancedcustomtypes.io
 * @since      1.0.1
 *
 * @package    ACT_Divi
 * @subpackage ACT_Divi/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.1
 * @package    ACT_Divi
 * @subpackage ACT_Divi/includes
 * @author     Pablo Capello <hola@capellopablo.com>
 */
class ACT_Divi_Taxonomies {



    /**
     * Register custom Taxonomy type: Genres
     *
     * @since    1.0.1
     */
    function register_taxes_genre() {

        $labels = array(
            "name" => __( "Genres", "act-divi" ),
            "singular_name" => __( "genres", "act-divi" ),
        );

        $args = array(
            "label" => __( "Genres", "act-divi" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => array( 'slug' => 'genre', 'with_front' => true, ),
            "show_admin_column" => false,
            "show_in_rest" => true,
            "rest_base" => "genre",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "show_in_quick_edit" => false,
        );
        register_taxonomy( "genre", array( "act_movie" ), $args );
    }


}
