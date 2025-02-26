<?php

// Remove widgets //

function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
        remove_meta_box( 'ai_dashboard_widget', 'dashboard', 'normal');
        remove_meta_box( 'welcome-panel', 'dashboard', 'normal');
        remove_meta_box( 'dashboardb_range', 'dashboard', 'normal');		
}
add_action( 'admin_init', 'remove_dashboard_meta' );

function hide_welcome() {
   echo "<style type='text/css' media='screen'>
		#welcome-panel {
			display: none!important;
		}
     </style>";
}
add_action('admin_head', 'hide_welcome');

function hide_profile() {
   echo "<style type='text/css' media='screen'>
		form#your-profile > table.form-table:first-of-type,
		form#your-profile > h3:first-of-type {
			display: none!important;
		}
     </style>";
}
add_action('admin_head', 'hide_profile');

function aquila_admin_css() {
   echo "<style type='text/css' media='screen'>
#wpadminbar #wp-admin-bar-wp-logo>.ab-item, 
#wpadminbar #wp-admin-bar-wp-logo .ab-sub-wrapper,
body.role-editor #adminmenu li.toplevel_page_wpcf7,
body.role-editor #adminmenu li#menu-tools,
#footer-upgrade,
label[for='wp_welcome_panel-hide']
  {
	display: none!important;
}
#wp-admin-bar-wp-logo {
	background: url( " . plugins_url( '/images/aqlFull.png', __FILE__ ) . " )!important;
	width: 156px;
	height: 15px;
	position: relative;
	float: left;
	background-size: contain!important;
	background-repeat: no-repeat!important;
	background-position: center center!important;
	margin: 10px 2px!important;
}
body.wp-admin #wp-admin-bar-wp-logo {
	width: 156px;
	height: 20px;
	margin: 10px 2px!important;
}
body.folded.wp-admin #wp-admin-bar-wp-logo, body.auto-fold.wp-admin #wp-admin-bar-wp-logo {
	background: url( " . plugins_url( '/images/aqlMiniWhite.png', __FILE__ ) . " )!important;
	width: 28px;
	margin: 4px 4px!important;
	background-size: contain!important;
	background-repeat: no-repeat!important;
	background-position: center center!important;
	height: 25px;
}
@media screen and (max-width:782px){
	#wp-admin-bar-wp-logo {
		width: 156px;
		height: 25px;
		margin: 13px 2px 0px 2px !important;
	}
	body.folded.wp-admin #wp-admin-bar-wp-logo, body.auto-fold.wp-admin #wp-admin-bar-wp-logo {
		width: 35px;
		margin: 4px 4px!important;
		height: 40px;
	}
}
     </style>
	 ";
}
add_action('admin_head', 'aquila_admin_css');
add_action('wp_head', 'aquila_admin_css');

// End remove widgets //

/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function add_welcome_widget() {

	wp_add_dashboard_widget(
                 'welcome-to-aquila',         // Widget slug.
                 'Welcome to Aquila',         // Title.
                 'add_welcome_widget_function' // Display function.
        );
}
add_action( 'wp_dashboard_setup', 'add_welcome_widget' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function add_welcome_widget_function() {

	// Display whatever it is you want to show.
	echo "	
	<p class='about-description'>Welcome to Aquila from <a href='http://designbymito.com' target='_blank' >design by Mito</a>.</p>
	";
}

function add_role_to_body($classes) {
global $current_user;
$user_role = array_shift($current_user->roles);
$classes .= 'role-'. $user_role;
return $classes;
}
//add_filter('body_class','add_role_to_body');
add_filter('admin_body_class', 'add_role_to_body');

// Credit //

function credit_mito() {
   echo "<style type='text/css' media='screen'>
		#footer-left #footer-thankyou,
		#contextual-help-link-wrap {
			display: none;
		}
		#footer-left:after {
			content: 'design by Mito';
		}
     </style>";
}
add_action('admin_head', 'credit_mito');

// End Credit //

// Remove "How are you" //

function aquila_adminbar_appearance() {
	global $wp_admin_bar;
	$user_id      = get_current_user_id();
	$avatar = get_avatar( $user_id, 16 );
	$wp_admin_bar->add_menu( array(
		'id'        => 'my-account',
		'title'     => ' ' . $avatar )
	);
}
add_action( 'wp_before_admin_bar_render', 'aquila_adminbar_appearance' );

// End Remove "How are you" //


?>