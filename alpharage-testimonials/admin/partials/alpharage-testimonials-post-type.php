<?php
/**
 * Provide a Post Type for the plugin
*/

// Register Custom Testimonial
class ALPRT_class_postype_testimonial {


	function __construct(){
         $this->alprt_get_hooks();
	}
    

	function alprt_testimonial_type() {
	         
		$labels = array(
			'name'                  => _x( 'Testimonials', 'Testimonial General Name', 'alpharage-testimonials' ),
			'singular_name'         => _x( 'Testimonial', 'Testimonial Singular Name', 'alpharage-testimonials' ),
			'menu_name'             => __( 'Alpha Testimonials', 'alpharage-testimonials' ),
			'name_admin_bar'        => __( 'Testimonial', 'alpharage-testimonials' ),
			'archives'              => __( 'Testimonial Archives', 'alpharage-testimonials' ),
			'attributes'            => __( 'Testimonial Attributes', 'alpharage-testimonials' ),
			'parent_Testimonial_colon'     => __( 'Parent Testimonial:', 'alpharage-testimonials' ),
			'all_Testimonials'             => __( 'All Testimonials', 'alpharage-testimonials' ),
			'add_new_Testimonial'          => __( 'Add New Testimonial', 'alpharage-testimonials' ),
			'add_new'               => __( 'Add New', 'alpharage-testimonials' ),
			'new_Testimonial'              => __( 'New Testimonial', 'alpharage-testimonials' ),
			'edit_Testimonial'             => __( 'Edit Testimonial', 'alpharage-testimonials' ),
			'update_Testimonial'           => __( 'Update Testimonial', 'alpharage-testimonials' ),
			'view_Testimonial'             => __( 'View Testimonial', 'alpharage-testimonials' ),
			'view_Testimonials'            => __( 'View Testimonials', 'alpharage-testimonials' ),
			'search_Testimonials'          => __( 'Search Testimonial', 'alpharage-testimonials' ),
			'not_found'             => __( 'Not found', 'alpharage-testimonials' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'alpharage-testimonials' ),
			
			'featured_image'        => __( 'Featured Image', 'alpharage-testimonials' ),
			'set_featured_image'    => __( 'Set featured image', 'alpharage-testimonials' ),
			'remove_featured_image' => __( 'Remove featured image', 'alpharage-testimonials' ),
			'use_featured_image'    => __( 'Use as featured image', 'alpharage-testimonials' ),
			'insert_into_Testimonial'      => __( 'Insert into Testimonial', 'alpharage-testimonials' ),
			'uploaded_to_this_Testimonial' => __( 'Uploaded to this Testimonial', 'alpharage-testimonials' ),
			'Testimonials_list'            => __( 'Testimonials list', 'alpharage-testimonials' ),
			'Testimonials_list_navigation' => __( 'Testimonials list navigation', 'alpharage-testimonials' ),
			'filter_Testimonials_list'     => __( 'Filter Testimonials list', 'alpharage-testimonials' ),
		);
		$args = array(
			'label'                 => __( 'Testimonial', 'alpharage-testimonials' ),
			'description'           => __( 'Testimonial Description', 'alpharage-testimonials' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'menu_icon'             => plugin_dir_url( __FILE__ ).'../images/dashicon.png',
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			
			
		);
		register_post_type( 'alprt_testimonial', $args );

	}
	function alprt_custom_Testimonial() {

		$labels = array(
			'name'                       => _x( 'Testimonial Category', 'Testimonial General Name', 'alpharage-testimonials' ),
			'singular_name'              => _x( 'Testimonial Category', 'Testimonial Singular Name', 'alpharage-testimonials' ),
			'menu_name'                  => __( 'Testimonial Category', 'alpharage-testimonials' ),
			'all_Testimonials'                  => __( 'All Testimonials', 'alpharage-testimonials' ),
			'parent_Testimonial'                => __( 'Parent Testimonial', 'alpharage-testimonials' ),
			'parent_Testimonial_colon'          => __( 'Parent Testimonial:', 'alpharage-testimonials' ),
			'new_Testimonial_name'              => __( 'New Testimonial Name', 'alpharage-testimonials' ),
			'add_new_Testimonial'               => __( 'Add New Testimonial', 'alpharage-testimonials' ),
			'edit_Testimonial'                  => __( 'Edit Testimonial', 'alpharage-testimonials' ),
			'update_Testimonial'                => __( 'Update Testimonial', 'alpharage-testimonials' ),
			'view_Testimonial'                  => __( 'View Testimonial', 'alpharage-testimonials' ),
			'separate_Testimonials_with_commas' => __( 'Separate Testimonials with commas', 'alpharage-testimonials' ),
			'add_or_remove_Testimonials'        => __( 'Add or remove Testimonials', 'alpharage-testimonials' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'alpharage-testimonials' ),
			'popular_Testimonials'              => __( 'Popular Testimonials', 'alpharage-testimonials' ),
			'search_Testimonials'               => __( 'Search Testimonials', 'alpharage-testimonials' ),
			'not_found'                  => __( 'Not Found', 'alpharage-testimonials' ),
			'no_terms'                   => __( 'No Testimonials', 'alpharage-testimonials' ),
			'Testimonials_list'                 => __( 'Testimonials list', 'alpharage-testimonials' ),
			'Testimonials_list_navigation'      => __( 'Testimonials list navigation', 'alpharage-testimonials' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			
		);
		register_taxonomy( 'alprt-testicat', array( 'alprt_testimonial' ), $args );

	}

	function alprt_testimonial_meta_boxes() {
	    add_meta_box( 'testi-desig-id', __( 'Testimonial Info', 'alpharage-testimonials' ), array($this,'alprt_testi_display_callback'), 'alprt_testimonial' );
	}


    /**
	 * Meta box display callback.
	 *
	 * @param WP_Post $post Current post object.
	*/



	function alprt_testi_display_callback( $post ) {
	    // Display code/markup goes here. Don't forget to include nonces!
	    // Use get_post_meta to retrieve an existing value from the database.
	        $wp_testi_desig = get_post_meta( $post->ID, '_wp_testi_desig', true );
	        wp_nonce_field( 'myplugin_testimonial_custom_box', 'myplugin_testimonial_custom_box_nonce' );
	 
	        // Display the form, using the current value.
	        ?>
	        
	       <label class="label-text">Designation</label>  <input type="text" id="wp_testi_desig" class="form-control" name="wp_testi_desig" value="<?php echo esc_attr( $wp_testi_desig ); ?>" size="25" />
	        <?php
	}
	/**
	 * Save meta box content.
	 *
	 * @param int $post_id Post ID
	 */
	function alprt_testi_save_meta_box( $post_id ) {
	    // Save logic goes here. Don't forget to include nonce checks!

	    if ( ! isset( $_POST['myplugin_testimonial_custom_box_nonce'] ) ) {
	            return $post_id;
	        }
	 
	        $nonce = $_POST['myplugin_testimonial_custom_box_nonce'];
	 
	        // Verify that the nonce is valid.
	        if ( ! wp_verify_nonce( $nonce, 'myplugin_testimonial_custom_box' ) ) {
	            return $post_id;
	        }
	 
	        /*
	         * If this is an autosave, our form has not been submitted,
	         * so we don't want to do anything.
	         */
	        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
	            return $post_id;
	        }
	 
	        // Check the user's permissions.
	        if ( 'page' == $_POST['post_type'] ) {
	            if ( ! current_user_can( 'edit_page', $post_id ) ) {
	                return $post_id;
	            }
	        } else {
	            if ( ! current_user_can( 'edit_post', $post_id ) ) {
	                return $post_id;
	            }
	        }
	 
	        /* OK, it's safe for us to save the data now. */
	 
	        // Sanitize the user input.
	        $mydata = sanitize_text_field( $_POST['wp_testi_desig'] );
	 
	        // Update the meta field.
	        update_post_meta( $post_id, '_wp_testi_desig', $mydata );
	}
	function alprt_get_hooks()
    {
    	 add_action( 'init', array($this,'alprt_testimonial_type'), 10 );
	     add_action( 'init', array($this,'alprt_custom_Testimonial'), 11 );
	     add_action( 'add_meta_boxes', array($this,'alprt_testimonial_meta_boxes'),12 );
	     add_action( 'save_post',  array($this,'alprt_testi_save_meta_box') );
    }

}
new ALPRT_class_postype_testimonial();
?>