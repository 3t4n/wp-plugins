<?php
	if( !defined( 'ABSPATH' ) ){
	    exit;
	}

	function tppostslider_pro_post_register() {
		# Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Tp Post Slider', 'Post Type General Name', 'post-sliders' ),
			'singular_name'       => _x( 'Tp Post Slider', 'Post Type Singular Name', 'post-sliders' ),
			'menu_name'           => __( 'Tp Post Slider ', 'post-sliders' ),
			'parent_item_colon'   => __( 'Parent Slider ', 'post-sliders' ),
			'all_items'           => __( 'All Slider ', 'post-sliders' ),
			'view_item'           => __( 'View Slider ', 'post-sliders' ),
			'add_new_item'        => __( 'Add Post Slider', 'post-sliders' ),
			'add_new'             => __( 'Add Post Slider', 'post-sliders' ),
			'edit_item'           => __( 'Edit Slider ', 'post-sliders' ),
			'update_item'         => __( 'Update Slider ', 'post-sliders' ),
			'search_items'        => __( 'Search Slider ', 'post-sliders' ),
			'not_found'           => __( 'Not Found', 'post-sliders' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'post-sliders' ),
		);

		# Set other options for Custom Post Type
		$args = array(
			'label'               => __( 'postsliders', 'post-sliders' ),
			'description'         => __( 'Slider reviews', 'post-sliders' ),
			'labels'              => $labels,
			'supports'            => array( 'title'),
			'taxonomies'          => array( 'genres' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'menu_icon'		      => 'dashicons-editor-table'
		);
		// Registering your Custom Post Type
		register_post_type( 'tppostpro', $args );
	}
	add_action( 'init', 'tppostslider_pro_post_register', 0 );

	# Carousel Manage Shortcode Column 
	function tppostslider_pro_register_column( $tpscolumns ) {
	 return array_merge( $tpscolumns,
	  array(
	  		'shortcode' 	=> __( 'Shortcode', 'post-sliders' ),
	  		'doshortcode' 	=> __( 'Template Shortcode', 'post-sliders' ))
	   );
	}
	add_filter( 'manage_tppostpro_posts_columns' , 'tppostslider_pro_register_column' );

	function tppostslider_pro_register_column_display( $tppostslider_column, $post_id ) {
		if ( $tppostslider_column == 'shortcode' ) : ?>
		  <input style="background:#ddd" type="text" onClick="this.select();" value="[tppostpro <?php echo 'id=&quot;'.$post_id.'&quot;';?>]" />
		  <?php
		endif;
		if ( $tppostslider_column == 'doshortcode' ) : ?>
			<textarea cols="40" rows="2" style="background:#ddd;" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[tppostpro id='; echo "'".$post_id."']"; echo '"); ?>'; ?></textarea>
			<?php
		endif;
	}
	add_action( 'manage_tppostpro_posts_custom_column' , 'tppostslider_pro_register_column_display', 10, 2 );