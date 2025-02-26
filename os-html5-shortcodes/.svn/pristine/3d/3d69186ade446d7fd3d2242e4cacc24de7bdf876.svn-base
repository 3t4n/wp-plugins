<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Post types
 *
 * Registers post types and taxonomies
 *
 * @class       osHTML5PostTypes
 * @version     1.3
 * @category    Class
 * @author      Offshorent Solutions Pvt Ltd. | Jinesh.P.V
 */
 
if ( ! class_exists( 'osHTML5PostTypes' ) ) :
    
    class osHTML5PostTypes { 
        
        /**
         * Constructor
         */

        public function __construct() { 

            add_action( 'init', array( &$this, 'register_oshtml5_post_types' ) );
            add_filter( 'manage_edit-os-html5_columns', array( &$this, 'oshtml5_edit_columns' ), 10, 2 );
            add_action( 'manage_os-html5_posts_custom_column', array( &$this, 'oshtml5_custom_column' ), 10, 2 );
        }

        /**
         * Register oshtml5 post types.
         */

        public static function register_oshtml5_post_types() {
            
            self::ospt_includes();

            if ( post_type_exists( 'os-html5' ) )
                return;

            $label              =   'OS HTML5';
            $labels = array(
                'name'                  =>  _x( $label, 'post type general name' ),
                'singular_name'        =>   _x( $label, 'post type singular name' ),
                'add_new'               =>  _x( 'Add New', OSHTML5_TEXT_DOMAIN ),
                'add_new_item'          =>  __( 'Add New OS HTML5', OSHTML5_TEXT_DOMAIN ),
                'edit_item'             =>  __( 'Edit OS HTML5', OSHTML5_TEXT_DOMAIN),
                'new_item'              =>  __( 'New OS HTML5' , OSHTML5_TEXT_DOMAIN ),
                'view_item'             =>  __( 'View OS HTML5', OSHTML5_TEXT_DOMAIN ),
                'search_items'          =>  __( 'Search ' . $label ),
                'not_found'             =>  __( 'Nothing found' ),
                'not_found_in_trash'    =>  __( 'Nothing found in Trash' ),
                'parent_item_colon'     =>  ''
            );

            register_post_type( 'os-html5', 
                apply_filters( 'oshtml5_register_post_types',
                    array(
                            'labels'                 => $labels,
                            'public'                 => true,
                            'publicly_queryable'     => true,
                            'show_ui'                => true,
                            'exclude_from_search'    => true,
                            'query_var'              => true,
                            'has_archive'            => false,
                            'hierarchical'           => true,
                            'menu_position'          => 20,
                            'show_in_nav_menus'      => true,
                            'supports'               => array( 'title', 'editor' ),
							'menu_icon'				 => 'dashicons-editor-code'
                        )
                )
            );                              
        }
        
        /**
         * Includes the metabox classes and views
         */
        
        public static function ospt_includes() {
            
            include_once( 'meta-boxes/class.oshtml5.shortcode.php' );
        }

        /**
         * oshtml5 slider edit columns.
         */

        public function oshtml5_edit_columns() {

            $columns = array(
                'cb'                          =>    '<input type="checkbox" />',
                'title'                       =>    'Title',
                'oshtml5-shortcode'        	  =>    'Shortcode',
                'date'                        =>    'Date'
            );

            return $columns;
        }

        /**
         * display oshtml5 slider custom columns.
         */

        public function oshtml5_custom_column( $column, $post_id ) {
			
           switch ( $column ) {
                case 'oshtml5-shortcode':
                    if ( !empty( $post_id ) )
                        echo self::oshtml5_shortcode_creator( $post_id );
                    break;
            }
        }

       /**
        * oshtml5 shortcode creation
        */

        public function oshtml5_shortcode_creator( $post_id ) {
			
            $shortcode = '[oshtml5 id="' . $post_id . '"]';
			
            return '<input type="text" readonly="readonly" id="shortcode_' . $post_id . '" class="shortcode" value="' . esc_attr( $shortcode ) . 
            '">';
        }
    }
endif;

/**
 * Returns the main instance of osHTML5PostTypes to prevent the need to use globals.
 *
 * @since  1.3
 * @return osHTML5PostTypes
 */
 
return new osHTML5PostTypes();
?>