<?php  
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Sirve_Manager_Columns{

    private static $_instance = null;
    public static function instance(){
        if( is_null( self::$_instance ) ){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    function __construct(){
		// Template type column.
		add_action( 'manage_sirve_posts_columns', [ $this, 'manage_columns' ] );
		add_action( 'manage_sirve_posts_custom_column', [ $this, 'columns_content' ], 10, 2 );	
        
        // Sirve Tag List Column
		add_action( 'manage_edit-sirve_tag_columns', [ $this, 'manage_columns_tag' ] );
		add_action( 'manage_sirve_tag_custom_column', [ $this, 'columns_content_tag' ], 10, 3 );

        // Sirve Event List Column
		add_action( 'manage_edit-sirve_event_columns', [ $this, 'manage_columns_event' ] );
		add_action( 'manage_sirve_event_custom_column', [ $this, 'columns_content_event' ], 10, 3 );
    }

    // Manage Post Table columns
	public function manage_columns( $columns ) {

		$column_date 	= $columns['date'];
		unset( $columns['date'] );

		$columns['shortcode'] 	    = esc_html__('Shortcode', 'sirve');
		$columns['date'] 		    = esc_html( $column_date );
		return $columns;
	}

    //Manage Columns Content
    public function columns_content( $column_name, $post_id ) {
        if( $column_name === 'shortcode' ){
            echo esc_html__( '[sirve id="' . $post_id . '"]', 'sirve' );
        }
    }

    //Tag Columns
    public function manage_columns_tag( $columns ){

        $column_count	= $columns['posts'];
		unset( $columns['posts'] );

		$columns['shortcode'] 	    = esc_html__('Shortcode', 'sirve');
        $columns['posts'] 		    = esc_html( $column_count );

		return $columns;
    }

    public function columns_content_tag( $string, $column_name, $post_id ) {
        if( $column_name === 'shortcode' ){

            echo esc_html__( '[sirve tags="' . get_term_by('id', $post_id, 'sirve_tag')->slug. '"]', 'sirve' );
        }
    }

    //Event Columns
    public function manage_columns_event( $columns ){

        $column_count	= $columns['posts'];
		unset( $columns['posts'] );

		$columns['shortcode'] 	    = esc_html__('Shortcode', 'sirve');
        $columns['posts'] 		    = esc_html( $column_count );

		return $columns;
    }

    public function columns_content_event( $string, $column_name, $post_id ) {
        if( $column_name === 'shortcode' ){

            echo esc_html__( '[sirve event="' . get_term_by('id', $post_id, 'sirve_event')->slug. '"]', 'sirve' );
        }
    }
}
Sirve_Manager_Columns::instance();