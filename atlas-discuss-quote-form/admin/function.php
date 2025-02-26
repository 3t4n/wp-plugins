<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class ADForm {
     
    /**
     * Constructor. Called when plugin is initialised
     */
    function atlas_discuss_form_post_type() {
		$labels = array(
			'name'                  => _x( 'Discuss Forms', 'Post Type General Name', 'atlas-discuss-form-demo' ),
			'singular_name'         => _x( 'Discuss Form', 'Post Type Singular Name', 'atlas-discuss-form-demo' ),
			'menu_name'             => __( 'Discuss Form', 'atlas-discuss-form-demo' ),
			'name_admin_bar'        => __( 'Discuss Form', 'atlas-discuss-form-demo' ),
			'archives'              => __( 'Item Archives', 'atlas-discuss-form-demo' ),
			'parent_item_colon'     => __( 'Parent Item:', 'atlas-discuss-form-demo' ),
			'all_items'             => __( 'All Discuss Forms', 'atlas-discuss-form-demo' ),
			'add_new_item'          => __( 'Add New Discuss Form', 'atlas-discuss-form-demo' ),
			'add_new'               => __( 'Add New', 'atlas-discuss-form-demo' ),
			'new_item'              => __( 'New Form', 'atlas-discuss-form-demo' ),
			'edit_item'             => __( 'Edit Form', 'atlas-discuss-form-demo' ),
			'update_item'           => __( 'Update Form', 'atlas-discuss-form-demo' ),
			'view_item'             => __( 'View Form', 'atlas-discuss-form-demo' ),
			'search_items'          => __( 'Search Form', 'atlas-discuss-form-demo' ),
			'not_found'             => __( 'Form Not found', 'atlas-discuss-form-demo' ),
			'not_found_in_trash'    => __( 'Form  Not found in Trash', 'atlas-discuss-form-demo' ),
			'featured_image'        => __( 'Featured Image', 'atlas-discuss-form-demo' ),
			'set_featured_image'    => __( 'Set featured image', 'atlas-discuss-form-demo' ),
			'remove_featured_image' => __( 'Remove featured image', 'atlas-discuss-form-demo' ),
			'use_featured_image'    => __( 'Use as featured image', 'atlas-discuss-form-demo' ),
			'insert_into_item'      => __( 'Insert into item', 'atlas-discuss-form-demo' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'atlas-discuss-form-demo' ),
			'items_list'            => __( 'Items list', 'atlas-discuss-form-demo' ),
			'items_list_navigation' => __( 'Items list navigation', 'atlas-discuss-form-demo' ),
			'filter_items_list'     => __( 'Filter items list', 'atlas-discuss-form-demo' ),
		);
		$args = array(
			'label'                 => __( 'Post Type', 'atlas-discuss-form-demo' ),
			'description'           => __( 'Post Type Description', 'atlas-discuss-form-demo' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-media-text',
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => false,
			'capability_type'       => 'page',
		);
		register_post_type( 'atlas_discuss_form', $args );

	}
	
	function my_edit_atlas_discuss_form_columns( $columns ) {

		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __('Title','atlas-discuss-form-demo'),
			'shortcode' => __('Shortcode','atlas-discuss-form-demo'),
			'author' => __('Author','atlas-discuss-form-demo'),			
			'date' => __('Date','atlas-discuss-form-demo')	
		);
		return $columns;
	}

	function column_shortcode( $item ) {
		$shortcodes = array( $item->shortcode() );

		$output = '';

		foreach ( $shortcodes as $shortcode ) {
			$output .= "\n" . '<span class="shortcode"><input type="text"'
				. ' onfocus="this.select();" readonly="readonly"'
				. ' value="' . 'esc_attr( $shortcode )' . '"'
				. ' class="large-text code" /></span>';
		}

		return trim( $output );
	}

	function my_manage_atlas_discuss_form_columns( $column, $post_id ) {
		global $post;
		switch( $column ) {
			/* If displaying the 'shortcode' column. */
			case 'shortcode' :
				/* Get the post meta. */
				$shortcode = '[atlas-discuss-form-demo id="'.$post_id.'" title="'.$post->post_title.'"]';
				/* If no duration is found, output a default message. */
				$output = "\n" . '<span class="shortcode"><input type="text"'
				. ' onfocus="this.select();" readonly="readonly"'
				. ' value="' . esc_attr( $shortcode ) . '"'
				. ' class="large-text code" /></span>';

					printf( __( '%s' ), $output );
				break;
			/* Just break out of the switch statement for everything else. */
			default :
				break;
		}
	}

    function __construct() {
        add_action( 'init', array( $this, 'atlas_discuss_form_post_type') );  
        add_filter( 'manage_edit-atlas_discuss_form_columns', array( $this,'my_edit_atlas_discuss_form_columns') ) ;
        add_action( 'manage_atlas_discuss_form_posts_custom_column', array( $this,'my_manage_atlas_discuss_form_columns'), 10, 2 );
        add_action( 'edit_form_after_title', array( $this,'top_form_edit'), 10, 10);
    }
    
    // Add shortcode Below Title. 
	function top_form_edit( $post ) {
	    if( 'atlas_discuss_form' == $post->post_type )

  			if ($post->post_status == 'publish') 
  			{	
  				$page = get_page( $post->ID );        
		        $shortcode = '[atlas-discuss-form-demo id="'.$post->ID.'" title="'.$post->post_title.'"]';
				/* If no duration is found, output a default message. */
				$output = "<p>\n <label for='atlas-discuss-form-shortode'>Copy this shortcode and paste it into your post, page, or text widget content:</label>";

				$output .= "\n" . '<span class="shortcode"><input type="text"'
				. ' onfocus="this.select();" readonly="readonly"'
				. ' value="' . esc_attr( $shortcode ) . '"'
				. ' class="large-text code" /></span></p>';
					printf( __( '%s' ), $output );
			}		
	}



} 
$adForm = new ADForm;