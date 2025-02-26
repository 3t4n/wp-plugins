<?php

	if( !defined( 'ABSPATH' ) ){
	    exit;
	}

	function atmswc_register_post_type() {		

		# Set UI labels for Custom Postatmswcpe
		$labels = array(
			'name'                => _x( 'Advanced Team Showcase', 'Post Type General Name' ),
			'singular_name'       => _x( 'Advanced Team Showcase', 'Post Type Singu lar Name' ),
			'menu_name'           => __( 'Advanced Team Showcase' ),
			'parent_item_colon'   => __( 'Parent Team Showcase' ),
			'all_items'           => __( 'All Team Showcase' ),
			'view_item'           => __( 'View Team Showcase' ),
			'add_new_item'        => __( 'Add New Team Showcase' ),
			'add_new'             => __( 'Add Team Showcase' ),
			'edit_item'           => __( 'Edit Team Showcase' ),
			'update_item'         => __( 'Update Team Showcase' ),
			'search_items'        => __( 'Search Team Showcase' ),
			'not_found'           => __( 'Not Found' ),
			'not_found_in_trash'  => __( 'Not found in Trash' )
		);
		
		# Set other options for Custom Post Type...
		$args = array(
			'labels'              => $labels,
			'label'               => __( 'team-showcase' ),
			'description'         => __( 'Team Showcase news and reviews' ),
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
			'supports'            => array( 'title', 'thumbnail', 'editor' ),
			'menu_icon'		      => 'dashicons-businessman'	
		);
		register_post_type( 'atmswc', $args );	
	}
	add_action( 'init', 'atmswc_register_post_type', 0 );


	 function atmswc_add_submenu_items(){
	  add_submenu_page('edit.php?post_type=atmswc', __('New Options', 'atmswc'), __('New Options', 'atmswc'), 'manage_options', 'post-new.php?post_type=atmswc_options');
	 }
	 add_action( 'admin_menu', 'atmswc_add_submenu_items' );


	 function atmswc_shortcode_generator_type() {

	  // Set UI labels for Custom Post Type
	  $labels = array(
	   'name'                	=> _x( 'Team Showcase Options', 'Post Type General Name', 'atmswc' ),
	   'singular_name'       	=> _x( 'Team Showcase Options', 'Post Type Singular Name', 'atmswc' ),
	   'menu_name'           	=> __( 'Team Showcase Options', 'atmswc' ),
	   'parent_item_colon'   	=> __( 'Parent Shortcode', 'atmswc' ),
	   'all_items'           	=> __( 'All Options', 'atmswc' ),
	   'view_item'          	=> __( 'View Options', 'atmswc' ),
	   'add_new_item'        	=> __( 'Genarate Options', 'atmswc' ),
	   'add_new'             	=> __( 'Genarate New Options', 'atmswc' ),
	   'edit_item'           	=> __( 'Edit Team Showcase Options', 'atmswc' ),
	   'update_item'         	=> __( 'Update Team Showcase Options', 'atmswc' ),
	   'search_items'        	=> __( 'Search Team Showcase Options', 'atmswc' ),
	   'not_found'           	=> __( 'Not Found', 'atmswc' ),
	   'not_found_in_trash'  	=> __( 'Not found in Trash', 'atmswc' ),
	  );

	  // Set other options for Custom Post Type
	  $args = array(
	   'label'               	=> __( 'Team Showcase Options', 'atmswc' ),
	   'description'         	=> __( 'Options news and reviews', 'atmswc' ),
	   'labels'              	=> $labels,
	   'supports'            	=> array( 'title' ),
	   'hierarchical'        	=> false,
	   'public'              	=> true,
	   'show_ui'             	=> true,
	   'show_in_menu'     	 	=> 'edit.php?post_type=atmswc',
	   'show_in_nav_menus'   	=> true,
	   'show_in_admin_bar'   	=> true,
	   'menu_position'       	=> 5,
	   'can_export'          	=> true,
	   'has_archive'         	=> true,
	   'exclude_from_search' 	=> false,
	   'publicly_queryable'  	=> true,
	   'capability_type'     	=> 'page',
	  );

	  // Registering your Custom Post Type
	  register_post_type( 'atmswc_options', $args );

	}
	add_action( 'init', 'atmswc_shortcode_generator_type');

	function atmswc_categories_taxonomies()
	{
		 register_taxonomy( 'atmswc_cat', 'atmswc', array(
		  'hierarchical' 	=> true,
		  'label' 			=> 'Team Department',
		  'query_var' 		=> true,
		  'rewrite' 		=> true
		 ));
	}
	 
	add_action( 'init', 'atmswc_categories_taxonomies', 0);

	function atmswc_add_shortcode_column( $atmswc_options_columns ) {

		return array_merge( $atmswc_options_columns, 
	  		array( 
	  			'shortcode'   => __( 'Shortcode', 'atmswc' ),
	  			'doshortcode' => __( 'Template Shortcode', 'atmswc' ) )
	   		);

	}
	add_filter( 'manage_atmswc_options_posts_columns' , 'atmswc_add_shortcode_column' );


	function atmswc_add_posts_shortcode_display( $atmswc_options_columns, $post_id ) {

		 if ( $atmswc_options_columns == 'shortcode' ){
		  ?>
		  <input style="background:#ddd;" type="text" onClick="this.select();" value="[team_builder <?php echo 'id=&quot;'.$post_id.'&quot;';?>]" />
		  <?php 

		}

	 	if ( $atmswc_options_columns == 'doshortcode' ){
	  	?>
	  	<textarea cols="40" rows="2" style="background:#ddd;" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[team_builder id='; echo "'".$post_id."']"; echo '"); ?>'; ?></textarea>
	  	<?php  
	  
	 	}
	}		
	add_action( 'manage_atmswc_options_posts_custom_column' , 'atmswc_add_posts_shortcode_display', 10, 2 );



function atmswc_columns_proversion( $atmswc_columns_proversion ){
  
  $order = 'asc';
  if( $_GET['order'] == 'asc' ) {
   $order = 'desc';
  }
  
  $atmswc_columns_proversion = array(
   "cb" => "<input type=\"checkbox\" />",
   "thumbnail" => __('Image', 'atmswc'),
   "title" => __('Name', 'atmswc'),
   "designation" => __('Designation', 'atmswc'),
   "email" => __('Email', 'atmswc'),
   "atmswccategories" => __('Categories', 'atmswc'),
   "date" => __('Date', 'atmswc'),
  );

  return $atmswc_columns_proversion;

 }
 
 /*----------------------------------------------------------------------
  Team Showcase Value Function
 ----------------------------------------------------------------------*/
 function atmswc_columns_proversion_display( $atmswc_columns_proversion, $post_id ){
  
	  global $post;
	  $width  = (int) 80;
	  $height = (int) 80;
	  
	  if ( 'thumbnail' == $atmswc_columns_proversion ) {
	   
	   if ( has_post_thumbnail($post_id) ) {
	    $thumbnail_id   = get_post_meta( $post_id, '_thumbnail_id', true );
	    $thumb 			= wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
	    echo $thumb;
	   }
	   else 
	   {
	    echo __('None');
	   }

	}
	  if ( 'designation' == $atmswc_columns_proversion ) {
	   echo get_post_meta($post_id, 'atmswc_designation', true);
	  }
	  if ( 'email' == $atmswc_columns_proversion ) {
	   echo get_post_meta($post_id, 'atmswc_email', true);
	  }
	  
	  if ( 'atmswccategories' == $atmswc_columns_proversion ) {
	   
	   $terms = get_the_terms( $post_id , 'atmswc_cat');
	   $count = count( $terms );
	   
	   if ( $terms ){
	    
	    $i = 0;
	    foreach ( $terms as $term ) {
	     echo '<a href="'.admin_url( 'edit.php?post_type=atmswc&atmswc_cat='.$term->slug ).'">'.$term->name.'</a>'; 
	     
	     if( $i+1 != $count ) {
	      echo " , ";
	     }
	     $i++;
	    }
	    
	   }
	}
 }
 
 /*----------------------------------------------------------------------
  Add manage_atmswc_posts_columns Filter 
 ----------------------------------------------------------------------*/
 add_filter( "manage_atmswc_posts_columns", "atmswc_columns_proversion" );
 
 /*----------------------------------------------------------------------
  Add manage_atmswc_posts_custom_column Action
 ----------------------------------------------------------------------*/
 add_action( "manage_atmswc_posts_custom_column",  "atmswc_columns_proversion_display", 10, 2 );