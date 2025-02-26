<?php
class Team_Post_Type {

        function __construct() {
	    

		// Thumbnail support for Team posts
		add_theme_support( 'post-thumbnails', array( 'team' ) );
		
		// Give the team menu item a unique icon
		add_action( 'admin_head', array( &$this, 'team_icon' ) );


	}
	
public static function team_init() {



	$labels = array(
			'name' => __( 'Team', 'teamposttype' ),
			'singular_name' => __( 'Team Member', 'teamposttype' ),
			'add_new' => __( 'Add New Team Member', 'teamposttype' ),
			'add_new_item' => __( 'Add New Team Member', 'teamposttype' ),
			'edit_item' => __( 'Edit Team Member', 'teamposttype' ),
			'new_item' => __( 'Add New Team Member', 'teamposttype' ),
			'view_item' => __( 'View Team Member', 'teamposttype' ),
			'search_items' => __( 'Search Team', 'teamposttype' ),
			'not_found' => __( 'No team members found', 'teamposttype' ),
			'not_found_in_trash' => __( 'No team members found in trash', 'teamposttype' )
		);
		
		$args = array(
	    	'labels' => $labels,
	    	'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "team"), // Permalinks format
			'menu_position' => 10,
			'has_archive' => false,
			'exclude_from_search' => true
		);
		
		$args = apply_filters('teamposttype_args', $args);
		if( current_theme_supports( 'audemedia_team_cpt' ) ) {
		register_post_type( 'team', $args );
	}

		flush_rewrite_rules();
		
	}
	 
function team_icon() { ?>
	    <style type="text/css" media="screen">
	        #menu-posts-team .wp-menu-image {
	            background: url(<?php echo plugin_dir_url( __FILE__ ); ?>images/team-icon.png) no-repeat 6px 6px !important;
	        }
			#menu-posts-team:hover .wp-menu-image, #menu-posts-team.wp-has-current-submenu .wp-menu-image {
	            background-position:6px -18px !important;
	        }
			#icon-edit.icon32-posts-team {background: url(<?php echo plugin_dir_url( __FILE__ ); ?>images/team-32x32.png) no-repeat;}
	    </style>
	<?php }

}

new Team_Post_Type;