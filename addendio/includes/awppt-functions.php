<?php
/**
 * @copyright   Copyright (c) 2015, Addendio.com
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */ 


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );



//Search Plugins Page
require_once  dirname(__FILE__) . '/awppt-search-plugins-page.php';

//Search Themes Page
require_once  dirname(__FILE__) . '/awppt-search-themes-page.php';


//We add the menus for searching plugins and Themes
add_action( 'admin_menu', 'awppt_menu', 9 );

function awppt_menu() {
	
	global $awppt_plugins_page;
	global $awppt_themes_page;
	global $submenu;
	
	$awppt_plugins_page = add_plugins_page( 'Search Plugins with Addendio', 'Search Plugins', 'manage_options', 'addendio-search-plugins', 'awpp_search_plugins');
	$awppt_themes_page = add_theme_page( 'Search Themes with Addendio', 'Search Themes', 'manage_options', 'addendio-search-themes', 'awpp_search_themes');
	
}
 

//=================================================================================================================

add_action( 'admin_menu', 'awppt_add_admin_menu' );


function awppt_add_admin_menu(  ) { 

	add_options_page( 'Addendio', 'Addendio', 'manage_options', 'awppt_addendio_settings', 'awppt_options_page' );

}

add_action( 'admin_init', 'awppt_settings_init' );

function awppt_settings_init(  ) { 

	register_setting( 'pluginPage', 'awppt_settings' );

	add_settings_section(
		'awppt_pluginPage_section', 
		__( 'Results', 'addendio' ), 
		'awppt_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'awppt_show_only_wp', 
		__( 'Only show results from WordPress.org', 'addendio' ), 
		'awppt_show_only_wp_render', 
		'pluginPage', 
		'awppt_pluginPage_section' 
	);

}


function awppt_show_only_wp_render(  ) { 

	$options = get_option( 'awppt_settings' );
	
	$awppt_show_only_wp_value = 'no';
	
	if(is_array($options) ) {
	$awppt_show_only_wp_value = $options['awppt_show_only_wp'];
	}
	
	?>
	<input type="checkbox" name="awppt_settings[awppt_show_only_wp]" <?php checked( $awppt_show_only_wp_value,'yes' ); ?> value="yes">
	<?php
	
}


function awppt_get_show_only_wp(){
	
$options = get_option( 'awppt_settings' );

	$awppt_show_only_wp_value = false;

	if(is_array($options) && $options['awppt_show_only_wp'] == 'yes' ) {

	
		$awppt_show_only_wp_value = true;

	}

	return $awppt_show_only_wp_value;
	
}


function awppt_settings_section_callback(  ) { 

	//echo __( 'This section description', 'addendio' );

}


function awppt_options_page(  ) { 

	?>
	<h2><?php echo __( 'Addendio Settings', 'addendio' );?></h2>

	<form action='options.php' method='post'>
		
		
		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>
		
	</form>
	<?php

}



//=================================================================================================================
// Reorders the submenu for plugins, sets Search New Plugins in #2 position

add_filter( 'custom_menu_order', 'awppt_custom_plugins_submenu_order' );

function awppt_custom_plugins_submenu_order( $menu_ord ) 
    {
        global $submenu;

		$current_position = array_search ( 'addendio-search-plugins', array_column ( $submenu['plugins.php'] , 2 ) );
		$submenu['plugins.php'] = array_values ( $submenu['plugins.php'] );
		
    	addplus_array_move ( $submenu['plugins.php'] , $current_position, 1 );
   		
    }

// Reorders the submenu for themes, sets Search New Themes in #2 position

	add_filter( 'custom_menu_order', 'awppt_custom_themes_submenu_order' );

	function awppt_custom_themes_submenu_order( $menu_ord ) 
	{
		global $submenu;
		
		$current_position = array_search ( 'addendio-search-themes', array_column( $submenu['themes.php'],2 ) );
		$submenu['themes.php'] = array_values( $submenu['themes.php'] );
	
		addplus_array_move( $submenu['themes.php'] , $current_position, 1);
	}

// Move Array element to new position
	function addplus_array_move( &$array , $oldpos , $newpos ) {
    
	    if ( $oldpos == $newpos ) { return; }
	    array_splice( $array , max ( $newpos , 0 ) , 0 , array_splice ( $array , max ( $oldpos , 0 ) , 1 ) );
		
	}
//===================================================================================================================
// We load the scripts for the search of plugins and themes
add_action( 'admin_enqueue_scripts', 'awppt_load_addendio_pages' );	

function awppt_load_addendio_pages($hook){

	global $awppt_plugins_page;
	global $awppt_themes_page;

	
	//=======================================================================================================================================
	// PLUGINS SEARCH PAGE
	// only if user is admin and is on the right page, we load what we need


	if(current_user_can('manage_options') && is_admin() && ( $hook == $awppt_plugins_page || $hook == $awppt_themes_page ) ) {
		
		
	$addendio_plus_url = ' https://addendio.com/downloads/addendio-plus/';	

	//CSS	
	wp_enqueue_style( 'awppt-bootstrap-css', AWPPT_PLUGIN_URL .'assets/css/bootstrap.min.css' , array(), '3.2.0');
	wp_enqueue_style( 'awppt-fontawseome-css', AWPPT_PLUGIN_URL .'assets/css/font-awesome.css' , array(), '4.5.0');
	wp_enqueue_style( 'awppt-ins-css', AWPPT_PLUGIN_URL .'assets/css/addendio.min.css' , array(), '1.0.0');
	add_thickbox();


	//JS
	wp_enqueue_script( 'awppt_bootstrap_js', AWPPT_PLUGIN_URL.'assets/js/bootstrap.min.js', array('jquery'), '3.2.0', true);
	wp_enqueue_script( 'awppt_ins', AWPPT_PLUGIN_URL.'assets/js/addendio.min.js', false, '1.1.0', true);
		
	}


	if(is_admin() && current_user_can('manage_options') && $hook == $awppt_plugins_page ) {	
	
	//CSS	
	wp_enqueue_style( 'awppt-addp-css', AWPPT_PLUGIN_URL .'assets/css/addp.css' , array(), '1.0.0');

	//JS
	wp_enqueue_script( 'awppt_addp', AWPPT_PLUGIN_URL . 'assets/js/addp'.ADDENDIO_LITE_ENV.'.min.js',false,'1.0.0', true);

	// We pass some variables to the JS app in order to improve results	
	$plugins_installed = 	awppt_get_plugins_installed ();
	
	wp_localize_script('awppt_addp', 'awppt_addp_vars',  
													array ( 
															'show_only_wp' => awppt_get_show_only_wp() , 
															'awppt_admin_folder' => AWPPT_ADMIN_FOLDER ,
															'awppt_plugin_url' => AWPPT_PLUGIN_URL ,
															'plugins_installed' => $plugins_installed ,
															'addendio_plus_url' => $addendio_plus_url ,
															'blog_language' => get_locale() ,
													) );
		
	} 
	
	//=======================================================================================================================================
	// THEMES SEARCH PAGE
	// only if user is admin and is on the right page, we load what we need
	
	if(is_admin() && current_user_can('manage_options') && $hook == $awppt_themes_page ) {	

	//CSS	
	wp_enqueue_style( 'awppt-addt-css', AWPPT_PLUGIN_URL .'assets/css/addt.css' , array(), '1.0.0');

	//JS
	wp_enqueue_script( 'awppt_addt', AWPPT_PLUGIN_URL . 'assets/js/addt'.ADDENDIO_LITE_ENV.'.min.js',false,'1.0.0', true);

	// We pass some variables to the JS app in order to improve results	
	$themes_installed = awppt_get_themes_installed ();
	
	wp_localize_script('awppt_addt', 'awppt_addp_vars',  
													array ( 
															'show_only_wp' => awppt_get_show_only_wp() , 
															'awppt_admin_folder' => AWPPT_ADMIN_FOLDER ,
															'awppt_plugin_url' => AWPPT_PLUGIN_URL ,
															'themes_installed' => $themes_installed ,
															'addendio_plus_url' => $addendio_plus_url,
															'blog_language' => get_locale() ,
													) );
	
	}
	
}



function awppt_get_plugins_installed() {

	//We get the list of plugins installed in order to check against the search so the user can see if 
	//the plugin is already installed directly in the results...
	
	//Un-comment for debugging...
	//print("<pre>".print_r(get_plugins(),true)."</pre>");

		$all_plugins = get_plugins();
		$all_plugins_keys = array_keys($all_plugins);
		
		$plugins = array();
	
		$loopCtr = 0;
		foreach ($all_plugins as $plugin_item) {

			 // Get our Plugin data variables
			 $plugin_root_file   = $all_plugins_keys[$loopCtr];
			$arr = explode("/", $plugin_root_file, 2);
			$plugins[] .= $arr[0];
			
			//Uncomment for debugging if needed
			/*
			$slug = $arr[0];
			$plugin_title       = $plugin_item['Title'];
			$plugin_version     = $plugin_item['Version'];
			$plugin_status      = is_plugin_active($plugin_root_file) ? 'active' : 'inactive';
			echo $loopCtr.'-'.$plugin_root_file .'   -   SLUG  = '. $slug.'<br>';
			*/
		$loopCtr++;
		}
	
	return $plugins;
}


function awppt_get_themes_installed() {

	$themes = wp_get_themes();
	
	$theme_slugs = array_keys($themes);
	
	return $theme_slugs;
}

//================================================================================================
// FREEMIUS RELATED FUNCTIONS

    function add_fs_custom_connect_message(
        $message,
        $user_first_name,
        $plugin_title,
        $user_login,
        $site_link,
        $freemius_link
    ) {
        return sprintf(
            __fs( 'hey-x' ) . '<br>' .
            __( 'In order to enjoy all our features and functionality, %s needs to connect your user, %s at %s, to %s', 'addendio' ),
            $user_first_name,
            '<b>' . $plugin_title . '</b>',
            '<b>' . $user_login . '</b>',
            $site_link,
            $freemius_link
        );
    }

    add_fs()->add_filter('connect_message', 'add_fs_custom_connect_message', 10, 6);


   function add_fs_connect_message_on_update (
        $message,
        $user_first_name,
        $plugin_title,
        $user_login,
        $site_link,
        $freemius_link
    ) {
        return sprintf(
            __fs( 'hey-x' ) . '<br>' .
            __( 'We added a few tricks, please help us improve, %s needs to connect your user, %s at %s, to %s', 'addendio' ),
            $user_first_name,
            '<b>' . $plugin_title . '</b>',
            '<b>' . $user_login . '</b>',
            $site_link,
            $freemius_link
        );
    }

    add_fs()->add_filter('connect_message_on_update ', 'add_fs_connect_message_on_update', 10, 6);








