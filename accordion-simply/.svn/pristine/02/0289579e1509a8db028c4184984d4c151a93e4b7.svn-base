<?php

	if( !defined( 'ABSPATH' ) ){
	    exit;
	}

	function acrds_post_register() {

		# Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Accordion Simply', 'Post Type General Name', 'accordion-simply' ),
			'singular_name'       => _x( 'Accordion Simply', 'Post Type Singular Name', 'accordion-simply' ),
			'menu_name'           => __( 'Accordion Simply', 'accordion-simply' ),
			'parent_item_colon'   => __( 'Parent Accordion', 'accordion-simply' ),
			'all_items'           => __( 'All Accordion', 'accordion-simply' ),
			'view_item'           => __( 'View Accordion', 'accordion-simply' ),
			'add_new_item'        => __( 'Add Accordion', 'accordion-simply' ),
			'add_new'             => __( 'Add Accordion', 'accordion-simply' ),
			'edit_item'           => __( 'Edit Accordion', 'accordion-simply' ),
			'update_item'         => __( 'Update Accordion', 'accordion-simply' ),
			'search_items'        => __( 'Search Accordion', 'accordion-simply' ),
			'not_found'           => __( 'Not Found', 'accordion-simply' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'accordion-simply' )
		);

		# Set other options for Custom Post Type

		$args = array(
			'label'               => __( 'accordion-simply', 'accordion-simply' ),
			'description'         => __( 'Accordion Simply reviews', 'accordion-simply' ),
			'labels'              => $labels,
			'supports'            => array( 'title','editor' ),
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
		);

		// Registering your Custom Post Type
		register_post_type( 'accordion-simply', $args );

	}
	add_action( 'init', 'acrds_post_register', 0 );

	function acrds_post_taxonomies_register() {
		register_taxonomy( 'acrdscat', 'accordion-simply', array(
			'hierarchical' => true,
			'label' => 'Categories',
			'query_var' => true,
			'rewrite' => true
		));
	}
	add_action( 'init', 'acrds_post_taxonomies_register', 0 );

	# Add Option Page Generate Shortcode
	function acrds_shortcode_submenu_page(){
		add_submenu_page('edit.php?post_type=accordion-simply', __('Generate Shortcode', 'accordion-simply'), __('Generate Shortcode', 'accordions-simply'), 'manage_options', 'post-new.php?post_type=acrdsshortocde');
	}
	add_action('admin_menu', 'acrds_shortcode_submenu_page');


	#Columns Declaration Function
	function acrds_post_columns( $acrds_post_columns ) {

		$order='asc';

		if($_GET['order']=='asc') {
			$order='desc';
		}

		$acrds_post_columns = array(
			"cb" => "<input type=\"checkbox\" />",
			"title" => __('Name', 'acrds'),
			"csp_carousel_catcols" => __('Categories', 'acrds'),
			"date" => __('Date', 'acrds'),
		);

		return $acrds_post_columns;
	}

	#
	function acrds_post_columns_display( $acrds_post_columns, $post_id ) {

		global $post;

		if ( 'csp_carousel_catcols' == $acrds_post_columns ) {

			$terms = get_the_terms( $post_id , 'acrdscat' );
			$count = count($terms);

			if ( $terms ) {
				$i = 0;
				foreach ( $terms as $term ) {
					echo '<a href="'.admin_url( 'edit.php?post_type=accordion-simply&acrdscat='.$term->slug ).'">'.$term->name.'</a>';	
					if($i+1 != $count) {
						echo " , ";
					}
					$i++;
				}
			}
		}
	}

	# Add manage posts columns Filter 
	add_filter( "manage_acrds_posts_columns", "acrds_post_columns" );

	# Add manage posts custom column Action
	add_action( "manage_acrds_posts_custom_column",  "acrds_post_columns_display", 10, 2 );

	# Registering Post Type For Generate Shortcode
	function acrds_shortcode_post_type() {

		# Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'All Shortcodes', 'Post Type General Name' ),
			'singular_name'       => _x( 'Accordion Simply Shortcode', 'Post Type Singular Name' ),
			'menu_name'           => __( 'Accordion Simply Shortcode' ),
			'parent_item_colon'   => __( 'Parent Shortcode' ),
			'all_items'           => __( 'All Shortcodes' ),
			'view_item'           => __( 'View Shortcode' ),
			'add_new_item'        => __( 'Add New Shortcode' ),
			'add_new'             => __( 'Generate Shortcode' ),
			'edit_item'           => __( 'Edit Shortcode' ),
			'update_item'         => __( 'Update Shortcode' ),
			'search_items'        => __( 'Search Shortcode' ),
			'not_found'           => __( 'Not Found' ),
			'not_found_in_trash'  => __( 'Not found in Trash' )
		);

		# Set other options for Custom Post Type...
		$args = array(
			'labels'              => $labels,
			'label'               => __( 'short-codes' ),
			'description'         => __( 'Shortcodes news and reviews' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu' 		  => 'edit.php?post_type=accordion-simply',
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'supports'            => array( 'title' ),
			'menu_icon'		      => 'dashicons-images-alt2'	
		);
		register_post_type( 'acrdsshortocde', $args );
	}
	add_action( 'init', 'acrds_shortcode_post_type', 0 );


	# Carousel Manage Shortcode Column 
	function acrds_add_shortcode_column( $columns ) {
	 return array_merge( $columns, 
	  array(
	  		'shortcode' => __( 'Shortcode', 'accordions-simply' ),
	  		'doshortcode' => __( 'Template Shortcode', 'accordions-simply' ) )
	   );
	}
	add_filter( 'manage_acrdsshortocde_posts_columns' , 'acrds_add_shortcode_column' );


	function acrds_add_posts_shortcode_display( $acrds_shortcode_column, $post_id ) {
	 if ( $acrds_shortcode_column == 'shortcode' ) {
	  ?>
	  <input style="background:#ddd" type="text" onClick="this.select();" value="[acrds_composer <?php echo 'id=&quot;'.$post_id.'&quot;';?>]" />
	  <?php
	}

 	if ( $acrds_shortcode_column == 'doshortcode' ) {
  	?>

  	<textarea cols="40" rows="2" style="background:#ddd;" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[acrds_composer id='; echo "'".$post_id."']"; echo '"); ?>'; ?></textarea>
  	<?php  

 	}
}
add_action( 'manage_acrdsshortocde_posts_custom_column' , 'acrds_add_posts_shortcode_display', 10, 2 );			

